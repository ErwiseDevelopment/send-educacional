<?php
/**
 * Métricas do site — registro de visitas e cliques (primeira parte, sem serviços externos).
 *
 * - Grava PAGEVIEWS no servidor (template_redirect), fora do admin e de robôs.
 * - Grava CLIQUES via beacon nos elementos com [data-track] (js/se-tracking.js).
 * - Painel em "Send Analytics" no menu do WordPress.
 * - Privacidade (LGPD): não guarda IP nem nome; o visitante é um hash diário irreversível.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SE_ANALYTICS_DB_VERSION', '1.0.0' );

/** Nome da tabela de eventos. */
function se_analytics_table() {
	global $wpdb;
	return $wpdb->prefix . 'se_analytics';
}

/**
 * Cria/atualiza a tabela. Roda ao ativar o tema e quando a versão muda.
 */
function se_analytics_install() {
	global $wpdb;
	$table   = se_analytics_table();
	$charset = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$table} (
		id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
		event_type VARCHAR(10) NOT NULL DEFAULT 'view',
		page_url VARCHAR(255) NOT NULL DEFAULT '',
		page_title VARCHAR(255) NOT NULL DEFAULT '',
		referer VARCHAR(255) NOT NULL DEFAULT '',
		label VARCHAR(190) NOT NULL DEFAULT '',
		utm_source VARCHAR(100) NOT NULL DEFAULT '',
		utm_medium VARCHAR(100) NOT NULL DEFAULT '',
		utm_campaign VARCHAR(100) NOT NULL DEFAULT '',
		device VARCHAR(12) NOT NULL DEFAULT '',
		visitor CHAR(40) NOT NULL DEFAULT '',
		created_at DATETIME NOT NULL,
		PRIMARY KEY  (id),
		KEY event_type (event_type),
		KEY created_at (created_at),
		KEY visitor (visitor)
	) {$charset};";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( $sql );
	update_option( 'se_analytics_db_version', SE_ANALYTICS_DB_VERSION );
}
add_action( 'after_switch_theme', 'se_analytics_install' );

/** Garante a tabela mesmo sem reativar o tema. */
function se_analytics_maybe_upgrade() {
	if ( get_option( 'se_analytics_db_version' ) !== SE_ANALYTICS_DB_VERSION ) {
		se_analytics_install();
	}
}
add_action( 'admin_init', 'se_analytics_maybe_upgrade' );

/** Deve ignorar este acesso? (admin logado, robô ou requisição de sistema) */
function se_analytics_should_skip() {
	if ( is_admin() || wp_doing_ajax() || wp_doing_cron() ) return true;
	if ( ( defined( 'REST_REQUEST' ) && REST_REQUEST ) || ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) ) return true;
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) return true; // não polui com a própria equipe
	$ua = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : '';
	if ( $ua === '' ) return true;
	if ( preg_match( '/bot|crawl|spider|slurp|bing|google|facebook|whatsapp|telegram|preview|monitor|curl|wget|python|headless|lighthouse|pingdom|uptime/i', $ua ) ) return true;
	return false;
}

/** Hash diário do visitante — sem armazenar IP. */
function se_analytics_visitor_hash() {
	$ip = isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : '';
	if ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
		$parts = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );
		$ip = trim( $parts[0] );
	}
	$ua   = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : '';
	$salt = defined( 'NONCE_SALT' ) ? NONCE_SALT : 'se-analytics';
	return sha1( $ip . '|' . $ua . '|' . gmdate( 'Y-m-d' ) . '|' . $salt );
}

/** Desktop x mobile a partir do user-agent. */
function se_analytics_device() {
	$ua = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : '';
	return preg_match( '/Mobile|Android|iPhone|iPad|iPod|Opera Mini|IEMobile/i', $ua ) ? 'mobile' : 'desktop';
}

/** Insere um evento na tabela. */
function se_analytics_record( $args ) {
	global $wpdb;
	$defaults = array(
		'event_type' => 'view',
		'page_url' => '', 'page_title' => '', 'referer' => '', 'label' => '',
		'utm_source' => '', 'utm_medium' => '', 'utm_campaign' => '',
		'device' => se_analytics_device(),
		'visitor' => se_analytics_visitor_hash(),
		'created_at' => current_time( 'mysql' ),
	);
	$row = array_merge( $defaults, $args );

	// Corta nos limites das colunas.
	foreach ( array( 'page_url' => 255, 'page_title' => 255, 'referer' => 255, 'label' => 190,
		'utm_source' => 100, 'utm_medium' => 100, 'utm_campaign' => 100 ) as $col => $max ) {
		$row[ $col ] = mb_substr( (string) $row[ $col ], 0, $max );
	}

	$wpdb->insert(
		se_analytics_table(),
		$row,
		array( '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s' )
	);
}

/**
 * Registra a VISITA no servidor (sem depender de JavaScript).
 */
function se_analytics_track_view() {
	if ( se_analytics_should_skip() ) return;

	$uri   = isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
	$title = '';
	if ( function_exists( 'wp_get_document_title' ) ) {
		$title = wp_strip_all_tags( wp_get_document_title() );
	}

	se_analytics_record( array(
		'event_type'   => 'view',
		'page_url'     => $uri,
		'page_title'   => $title,
		'referer'      => isset( $_SERVER['HTTP_REFERER'] ) ? esc_url_raw( wp_unslash( $_SERVER['HTTP_REFERER'] ) ) : '',
		'utm_source'   => isset( $_GET['utm_source'] ) ? sanitize_text_field( wp_unslash( $_GET['utm_source'] ) ) : '',
		'utm_medium'   => isset( $_GET['utm_medium'] ) ? sanitize_text_field( wp_unslash( $_GET['utm_medium'] ) ) : '',
		'utm_campaign' => isset( $_GET['utm_campaign'] ) ? sanitize_text_field( wp_unslash( $_GET['utm_campaign'] ) ) : '',
	) );
}
add_action( 'template_redirect', 'se_analytics_track_view', 20 );

/**
 * Endpoint dos cliques (beacon do front-end).
 */
function se_analytics_track_click() {
	// Nonce leve: evita disparo casual de terceiros, sem quebrar visitantes reais.
	if ( isset( $_POST['nonce'] ) && ! wp_verify_nonce( $_POST['nonce'], 'se_analytics' ) ) {
		wp_die( '', '', array( 'response' => 204 ) );
	}
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {
		wp_die( '', '', array( 'response' => 204 ) );
	}

	$label = isset( $_POST['label'] ) ? sanitize_text_field( wp_unslash( $_POST['label'] ) ) : '';
	$page  = isset( $_POST['page'] ) ? esc_url_raw( wp_unslash( $_POST['page'] ) ) : '';
	$title = isset( $_POST['title'] ) ? sanitize_text_field( wp_unslash( $_POST['title'] ) ) : '';

	if ( $label !== '' ) {
		se_analytics_record( array(
			'event_type' => 'click',
			'label'      => $label,
			'page_url'   => $page,
			'page_title' => $title,
		) );
	}
	wp_die( '', '', array( 'response' => 204 ) );
}
add_action( 'wp_ajax_se_track_click', 'se_analytics_track_click' );
add_action( 'wp_ajax_nopriv_se_track_click', 'se_analytics_track_click' );

/**
 * Carrega o coletor de cliques no front-end.
 */
function se_analytics_enqueue() {
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) return;
	wp_enqueue_script(
		'se-tracking',
		get_template_directory_uri() . '/js/se-tracking.js',
		array(),
		SE_ANALYTICS_DB_VERSION,
		true
	);
	wp_localize_script( 'se-tracking', 'SE_TRACK', array(
		'ajax'  => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'se_analytics' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'se_analytics_enqueue' );

/* ============================================================
 *  PAINEL NO ADMIN
 * ============================================================ */

function se_analytics_admin_menu() {
	add_menu_page(
		'Send Analytics',
		'Send Analytics',
		'manage_options',
		'se-analytics',
		'se_analytics_render_dashboard',
		'dashicons-chart-area',
		58
	);
}
add_action( 'admin_menu', 'se_analytics_admin_menu' );

function se_analytics_render_dashboard() {
	global $wpdb;
	$table = se_analytics_table();

	$range = isset( $_GET['range'] ) ? absint( $_GET['range'] ) : 30;
	if ( ! in_array( $range, array( 7, 30, 90 ), true ) ) $range = 30;
	$since = gmdate( 'Y-m-d 00:00:00', strtotime( "-{$range} days", current_time( 'timestamp' ) ) );

	$exists = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table ) );
	if ( $exists !== $table ) {
		echo '<div class="wrap"><h1>Send Analytics</h1><div class="notice notice-warning"><p>A tabela de métricas ainda não foi criada. Reative o tema para gerá-la.</p></div></div>';
		return;
	}

	$views    = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$table} WHERE event_type='view' AND created_at >= %s", $since ) );
	$clicks   = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$table} WHERE event_type='click' AND created_at >= %s", $since ) );
	$visitors = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(DISTINCT visitor) FROM {$table} WHERE event_type='view' AND created_at >= %s", $since ) );
	$mobile   = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$table} WHERE event_type='view' AND device='mobile' AND created_at >= %s", $since ) );
	$mobile_pct = $views > 0 ? round( $mobile / $views * 100 ) : 0;

	$by_day = $wpdb->get_results( $wpdb->prepare(
		"SELECT DATE(created_at) d, COUNT(*) c FROM {$table} WHERE event_type='view' AND created_at >= %s GROUP BY DATE(created_at) ORDER BY d ASC",
		$since
	), OBJECT_K );

	$top_pages = $wpdb->get_results( $wpdb->prepare(
		"SELECT page_url, page_title, COUNT(*) c FROM {$table} WHERE event_type='view' AND created_at >= %s GROUP BY page_url ORDER BY c DESC LIMIT 12",
		$since
	) );

	$top_clicks = $wpdb->get_results( $wpdb->prepare(
		"SELECT label, COUNT(*) c FROM {$table} WHERE event_type='click' AND created_at >= %s GROUP BY label ORDER BY c DESC LIMIT 12",
		$since
	) );

	$top_ref = $wpdb->get_results( $wpdb->prepare(
		"SELECT referer, COUNT(*) c FROM {$table} WHERE event_type='view' AND referer <> '' AND created_at >= %s GROUP BY referer ORDER BY c DESC LIMIT 8",
		$since
	) );

	$max_day = 1;
	foreach ( $by_day as $r ) { if ( (int) $r->c > $max_day ) $max_day = (int) $r->c; }

	$base = admin_url( 'admin.php?page=se-analytics' );
	?>
	<div class="wrap">
		<h1 style="margin-bottom:4px;">Send Analytics</h1>
		<p style="color:#666;margin-top:0;">Visitas e cliques do site — dados próprios, sem cookies de terceiros. Visitante identificado por hash diário (LGPD).</p>

		<p>
			<?php foreach ( array( 7 => 'Últimos 7 dias', 30 => 'Últimos 30 dias', 90 => 'Últimos 90 dias' ) as $r => $lbl ) : ?>
				<a class="button <?php echo $range === $r ? 'button-primary' : ''; ?>" href="<?php echo esc_url( add_query_arg( 'range', $r, $base ) ); ?>"><?php echo esc_html( $lbl ); ?></a>
			<?php endforeach; ?>
		</p>

		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:16px;margin:18px 0;">
			<?php
			$cards = array(
				array( 'Visitas (pageviews)', number_format_i18n( $views ), '#2563eb' ),
				array( 'Visitantes únicos', number_format_i18n( $visitors ), '#7c3aed' ),
				array( 'Cliques monitorados', number_format_i18n( $clicks ), '#0ea5e9' ),
				array( 'Tráfego mobile', $mobile_pct . '%', '#16a34a' ),
			);
			foreach ( $cards as $c ) : ?>
				<div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:18px 20px;box-shadow:0 1px 2px rgba(0,0,0,.04);">
					<div style="font-size:12px;text-transform:uppercase;letter-spacing:.05em;color:#94a3b8;font-weight:700;"><?php echo esc_html( $c[0] ); ?></div>
					<div style="font-size:30px;font-weight:800;color:<?php echo esc_attr( $c[2] ); ?>;line-height:1.2;margin-top:6px;"><?php echo esc_html( $c[1] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>

		<div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:18px 20px;margin-bottom:20px;">
			<h2 style="margin-top:0;font-size:14px;color:#334155;">Visitas por dia</h2>
			<div style="display:flex;align-items:flex-end;gap:4px;height:150px;border-bottom:1px solid #eef2f7;padding-top:10px;">
				<?php
				for ( $i = $range - 1; $i >= 0; $i-- ) {
					$day = gmdate( 'Y-m-d', strtotime( "-{$i} days", current_time( 'timestamp' ) ) );
					$c   = isset( $by_day[ $day ] ) ? (int) $by_day[ $day ]->c : 0;
					$h   = $max_day > 0 ? max( 2, round( $c / $max_day * 130 ) ) : 2;
					printf(
						'<div title="%s: %d visita(s)" style="flex:1;min-width:3px;height:%dpx;border-radius:4px 4px 0 0;background:linear-gradient(180deg,#60a5fa,#4f46e5);opacity:.85;"></div>',
						esc_attr( date_i18n( 'd/m', strtotime( $day ) ) ), $c, $h
					);
				}
				?>
			</div>
			<div style="display:flex;justify-content:space-between;font-size:11px;color:#94a3b8;margin-top:6px;">
				<span><?php echo esc_html( date_i18n( 'd/m', strtotime( $since ) ) ); ?></span>
				<span>hoje</span>
			</div>
		</div>

		<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
			<div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:18px 20px;">
				<h2 style="margin-top:0;font-size:14px;color:#334155;">Páginas mais vistas</h2>
				<table class="widefat striped" style="border:0;">
					<thead><tr><th>Página</th><th style="width:80px;text-align:right;">Visitas</th></tr></thead>
					<tbody>
					<?php if ( $top_pages ) : foreach ( $top_pages as $p ) : ?>
						<tr>
							<td><strong><?php echo esc_html( $p->page_title ?: '(sem título)' ); ?></strong><br><span style="color:#94a3b8;font-size:11px;"><?php echo esc_html( urldecode( $p->page_url ) ); ?></span></td>
							<td style="text-align:right;font-weight:700;"><?php echo number_format_i18n( $p->c ); ?></td>
						</tr>
					<?php endforeach; else : ?>
						<tr><td colspan="2" style="color:#94a3b8;">Ainda sem dados no período.</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>

			<div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:18px 20px;">
				<h2 style="margin-top:0;font-size:14px;color:#334155;">Cliques por elemento</h2>
				<table class="widefat striped" style="border:0;">
					<thead><tr><th>Elemento (data-track)</th><th style="width:80px;text-align:right;">Cliques</th></tr></thead>
					<tbody>
					<?php if ( $top_clicks ) : foreach ( $top_clicks as $c ) : ?>
						<tr><td><code><?php echo esc_html( $c->label ); ?></code></td><td style="text-align:right;font-weight:700;"><?php echo number_format_i18n( $c->c ); ?></td></tr>
					<?php endforeach; else : ?>
						<tr><td colspan="2" style="color:#94a3b8;">Nenhum clique monitorado ainda. Adicione <code>data-track="nome"</code> nos botões.</td></tr>
					<?php endif; ?>
					</tbody>
				</table>

				<?php if ( $top_ref ) : ?>
					<h2 style="font-size:14px;color:#334155;margin-top:22px;">Origem das visitas (referer)</h2>
					<table class="widefat striped" style="border:0;">
						<tbody>
						<?php foreach ( $top_ref as $r ) : ?>
							<tr><td style="font-size:12px;"><?php echo esc_html( $r->referer ); ?></td><td style="text-align:right;width:70px;font-weight:700;"><?php echo number_format_i18n( $r->c ); ?></td></tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php
}
