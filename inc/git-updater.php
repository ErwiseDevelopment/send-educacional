<?php
/**
 * Atualização automática do tema via Git.
 *
 * O tema é um repositório Git (origin: ErwiseDevelopment/send-educacional).
 * Este módulo permite atualizar o tema puxando do Git de três formas:
 *   1) Botão manual em Aparência > Atualização (Git);
 *   2) Rotina diária (wp-cron) quando ligada;
 *   3) Webhook protegido por segredo (para disparar no "git push" do GitHub).
 *
 * Modelo de deploy: "git fetch + git reset --hard origin/<branch>" — o servidor
 * fica idêntico ao repositório (edições locais no tema são descartadas).
 *
 * Requisitos no servidor: função exec()/shell_exec() habilitada e o binário "git"
 * disponível. Sem isso, o painel mostra um aviso e nada é executado.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SE_GIT_CRON_HOOK', 'se_git_autoupdate_event' );

/** Diretório do tema (raiz do repositório). */
function se_git_dir() {
	return get_template_directory();
}

/** exec()/shell_exec() estão disponíveis? */
function se_git_shell_enabled() {
	if ( ! function_exists( 'exec' ) && ! function_exists( 'shell_exec' ) ) return false;
	$disabled = array_map( 'trim', explode( ',', (string) ini_get( 'disable_functions' ) ) );
	return ! in_array( 'exec', $disabled, true ) || ! in_array( 'shell_exec', $disabled, true );
}

/** É um repositório Git de verdade? */
function se_git_is_repo() {
	return is_dir( se_git_dir() . '/.git' );
}

/** Está tudo pronto para operar? */
function se_git_ready() {
	return se_git_shell_enabled() && se_git_is_repo();
}

/**
 * Roda "git <args>" dentro do tema e devolve [saida, codigo, ok].
 * $args é uma string fixa (sem entrada do usuário).
 */
function se_git( $args ) {
	$dir = escapeshellarg( se_git_dir() );
	// HOME ajuda o git a achar config/known_hosts em alguns servidores.
	$cmd = 'git -C ' . $dir . ' ' . $args . ' 2>&1';

	$output = '';
	$code   = 1;

	if ( function_exists( 'exec' ) ) {
		$lines = array();
		exec( $cmd, $lines, $code );
		$output = implode( "\n", $lines );
	} elseif ( function_exists( 'shell_exec' ) ) {
		$output = (string) shell_exec( $cmd );
		$code   = 0; // shell_exec não devolve código
	}

	return array( 'output' => trim( $output ), 'code' => (int) $code, 'ok' => ( 0 === (int) $code ) );
}

/** Branch atual (ex.: main). */
function se_git_branch() {
	$r = se_git( 'rev-parse --abbrev-ref HEAD' );
	return $r['ok'] && $r['output'] ? $r['output'] : 'main';
}

/** Resumo do commit atual. */
function se_git_current_commit() {
	$r = se_git( 'log -1 --pretty=%h%x1f%s%x1f%cd --date=format-local:%d/%m/%Y%%20%H:%M' );
	if ( ! $r['ok'] || ! $r['output'] ) return null;
	$parts = explode( "\x1f", $r['output'] );
	return array(
		'hash'    => isset( $parts[0] ) ? $parts[0] : '',
		'subject' => isset( $parts[1] ) ? $parts[1] : '',
		'date'    => isset( $parts[2] ) ? str_replace( '%20', ' ', $parts[2] ) : '',
	);
}

/** Quantos commits atrás do remoto (após um fetch). */
function se_git_behind() {
	$branch = se_git_branch();
	$r = se_git( 'rev-list --count HEAD..origin/' . escapeshellarg( $branch ) );
	return $r['ok'] ? (int) $r['output'] : 0;
}

/**
 * Executa a atualização: fetch + reset --hard origin/<branch>.
 * Devolve array com o log de cada passo.
 */
function se_git_update() {
	if ( ! se_git_ready() ) {
		return array( 'ok' => false, 'log' => 'git/shell indisponível no servidor.' );
	}
	$branch = se_git_branch();
	$log    = array();

	$fetch = se_git( 'fetch --all --prune' );
	$log[] = '$ git fetch --all --prune' . "\n" . $fetch['output'];
	if ( ! $fetch['ok'] ) {
		return array( 'ok' => false, 'log' => implode( "\n\n", $log ) );
	}

	$reset = se_git( 'reset --hard origin/' . escapeshellarg( $branch ) );
	$log[] = '$ git reset --hard origin/' . $branch . "\n" . $reset['output'];

	$ok = $reset['ok'];
	update_option( 'se_git_last_run', current_time( 'mysql' ) );
	update_option( 'se_git_last_log', implode( "\n\n", $log ) );

	// A versão do tema pode ter mudado: limpa caches de temas.
	if ( function_exists( 'wp_clean_themes_cache' ) ) wp_clean_themes_cache();

	return array( 'ok' => $ok, 'log' => implode( "\n\n", $log ) );
}

/* ============================================================
 *  CRON (rotina diária opcional)
 * ============================================================ */

function se_git_cron_handler() {
	if ( ! get_option( 'se_git_autoupdate' ) ) return;
	if ( ! se_git_ready() ) return;
	se_git( 'fetch --all --prune' );
	if ( se_git_behind() > 0 ) {
		se_git_update();
	}
}
add_action( SE_GIT_CRON_HOOK, 'se_git_cron_handler' );

/** Liga/desliga o agendamento conforme a opção. */
function se_git_sync_schedule() {
	$enabled   = (bool) get_option( 'se_git_autoupdate' );
	$scheduled = wp_next_scheduled( SE_GIT_CRON_HOOK );
	if ( $enabled && ! $scheduled ) {
		wp_schedule_event( time() + 3600, 'daily', SE_GIT_CRON_HOOK );
	} elseif ( ! $enabled && $scheduled ) {
		wp_unschedule_event( $scheduled, SE_GIT_CRON_HOOK );
	}
}
add_action( 'update_option_se_git_autoupdate', 'se_git_sync_schedule' );
add_action( 'add_option_se_git_autoupdate', 'se_git_sync_schedule' );

// Limpa o agendamento se o tema for trocado.
add_action( 'switch_theme', function () {
	$ts = wp_next_scheduled( SE_GIT_CRON_HOOK );
	if ( $ts ) wp_unschedule_event( $ts, SE_GIT_CRON_HOOK );
} );

/* ============================================================
 *  WEBHOOK (dispara no push do GitHub)
 * ============================================================ */

function se_git_webhook_secret() {
	$secret = get_option( 'se_git_webhook_secret' );
	if ( ! $secret ) {
		$secret = wp_generate_password( 24, false );
		update_option( 'se_git_webhook_secret', $secret );
	}
	return $secret;
}

function se_git_webhook_url() {
	return add_query_arg( 'secret', se_git_webhook_secret(), rest_url( 'se-theme/v1/git-pull' ) );
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'se-theme/v1', '/git-pull', array(
		'methods'             => 'POST',
		'permission_callback' => function ( $request ) {
			$sent = $request->get_param( 'secret' );
			if ( ! $sent ) $sent = $request->get_header( 'x_se_secret' );
			return $sent && hash_equals( se_git_webhook_secret(), (string) $sent );
		},
		'callback'            => function () {
			$res = se_git_update();
			return new WP_REST_Response( array(
				'ok'  => $res['ok'],
				'log' => $res['log'],
			), $res['ok'] ? 200 : 500 );
		},
	) );
} );

/* ============================================================
 *  PÁGINA NO ADMIN (Aparência > Atualização via Git)
 * ============================================================ */

function se_git_admin_menu() {
	add_theme_page(
		'Atualização do Tema (Git)',
		'Atualização (Git)',
		'manage_options',
		'se-git-updater',
		'se_git_render_page'
	);
}
add_action( 'admin_menu', 'se_git_admin_menu' );

/** Processa os botões do painel. */
function se_git_handle_post() {
	if ( ! current_user_can( 'manage_options' ) ) wp_die( 'Sem permissão.' );
	check_admin_referer( 'se_git_action' );

	$action = isset( $_POST['se_git_action'] ) ? sanitize_key( $_POST['se_git_action'] ) : '';
	$notice = '';

	if ( 'update' === $action ) {
		$res    = se_git_update();
		$notice = ( $res['ok'] ? 'ok:Tema atualizado a partir do Git.' : 'err:Falha ao atualizar.' ) . "\n" . $res['log'];
	} elseif ( 'check' === $action ) {
		if ( se_git_ready() ) {
			se_git( 'fetch --all --prune' );
			$behind = se_git_behind();
			$notice = 'ok:' . ( $behind > 0 ? "Há {$behind} atualização(ões) disponível(is) no Git." : 'O tema já está na versão mais recente.' );
		} else {
			$notice = 'err:git/shell indisponível no servidor.';
		}
	} elseif ( 'toggle_auto' === $action ) {
		update_option( 'se_git_autoupdate', isset( $_POST['se_git_autoupdate'] ) ? 1 : 0 );
		$notice = 'ok:Preferência de atualização automática salva.';
	} elseif ( 'regen_secret' === $action ) {
		delete_option( 'se_git_webhook_secret' );
		se_git_webhook_secret();
		$notice = 'ok:Novo segredo de webhook gerado.';
	}

	set_transient( 'se_git_notice_' . get_current_user_id(), $notice, 60 );
	wp_safe_redirect( admin_url( 'themes.php?page=se-git-updater' ) );
	exit;
}
add_action( 'admin_post_se_git_action', 'se_git_handle_post' );

function se_git_render_page() {
	$ready   = se_git_ready();
	$commit  = $ready ? se_git_current_commit() : null;
	$branch  = $ready ? se_git_branch() : '—';
	$remote  = $ready ? se_git( 'remote get-url origin' ) : array( 'output' => '—' );
	$auto    = (bool) get_option( 'se_git_autoupdate' );
	$last    = get_option( 'se_git_last_run' );
	$notice  = get_transient( 'se_git_notice_' . get_current_user_id() );
	delete_transient( 'se_git_notice_' . get_current_user_id() );
	?>
	<div class="wrap">
		<h1>Atualização do Tema (Git)</h1>
		<p style="color:#666;max-width:820px;">
			Mantém o tema <strong>Send Educacional</strong> sincronizado com o repositório Git.
			A atualização faz <code>git fetch</code> + <code>git reset --hard</code> na branch de produção,
			deixando o servidor idêntico ao repositório.
		</p>

		<?php if ( $notice ) :
			$is_err = strpos( $notice, 'err:' ) === 0;
			$body   = preg_replace( '/^(ok|err):/', '', $notice );
			$lines  = explode( "\n", $body, 2 );
			?>
			<div class="notice <?php echo $is_err ? 'notice-error' : 'notice-success'; ?> is-dismissible" style="max-width:820px;">
				<p><strong><?php echo esc_html( $lines[0] ); ?></strong></p>
				<?php if ( ! empty( $lines[1] ) ) : ?>
					<pre style="white-space:pre-wrap;background:#0b1020;color:#cbd5e1;padding:12px;border-radius:8px;overflow:auto;max-height:260px;"><?php echo esc_html( trim( $lines[1] ) ); ?></pre>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! $ready ) : ?>
			<div class="notice notice-warning" style="max-width:820px;">
				<p>
					<?php if ( ! se_git_is_repo() ) : ?>
						A pasta do tema não é um repositório Git (<code>.git</code> ausente). Faça o deploy do tema via <code>git clone</code> para habilitar as atualizações.
					<?php else : ?>
						As funções <code>exec()/shell_exec()</code> parecem desabilitadas neste servidor, então a atualização automática não pode rodar. Você ainda pode atualizar pelo painel de temas do WordPress.
					<?php endif; ?>
				</p>
			</div>
		<?php endif; ?>

		<table class="widefat" style="max-width:820px;margin-top:12px;">
			<tbody>
				<tr><td style="width:200px;"><strong>Repositório</strong></td><td><code><?php echo esc_html( $remote['output'] ); ?></code></td></tr>
				<tr><td><strong>Branch</strong></td><td><code><?php echo esc_html( $branch ); ?></code></td></tr>
				<tr><td><strong>Commit instalado</strong></td><td>
					<?php if ( $commit ) : ?>
						<code><?php echo esc_html( $commit['hash'] ); ?></code> — <?php echo esc_html( $commit['subject'] ); ?><br>
						<span style="color:#94a3b8;"><?php echo esc_html( $commit['date'] ); ?></span>
					<?php else : ?>—<?php endif; ?>
				</td></tr>
				<?php if ( $last ) : ?>
					<tr><td><strong>Última atualização</strong></td><td><?php echo esc_html( mysql2date( 'd/m/Y H:i', $last ) ); ?></td></tr>
				<?php endif; ?>
			</tbody>
		</table>

		<div style="display:flex;gap:10px;margin:18px 0;">
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<?php wp_nonce_field( 'se_git_action' ); ?>
				<input type="hidden" name="action" value="se_git_action">
				<input type="hidden" name="se_git_action" value="check">
				<button type="submit" class="button" <?php disabled( ! $ready ); ?>>Verificar atualizações</button>
			</form>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" onsubmit="return confirm('Atualizar o tema agora? Alterações locais não commitadas no tema serão descartadas.');">
				<?php wp_nonce_field( 'se_git_action' ); ?>
				<input type="hidden" name="action" value="se_git_action">
				<input type="hidden" name="se_git_action" value="update">
				<button type="submit" class="button button-primary" <?php disabled( ! $ready ); ?>>Buscar e atualizar agora</button>
			</form>
		</div>

		<h2>Atualização automática (diária)</h2>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<?php wp_nonce_field( 'se_git_action' ); ?>
			<input type="hidden" name="action" value="se_git_action">
			<input type="hidden" name="se_git_action" value="toggle_auto">
			<label style="display:inline-flex;align-items:center;gap:8px;">
				<input type="checkbox" name="se_git_autoupdate" value="1" <?php checked( $auto ); ?>>
				Verificar o Git uma vez por dia e atualizar sozinho quando houver novidade.
			</label>
			<p><button type="submit" class="button">Salvar preferência</button></p>
		</form>

		<h2>Webhook de deploy (opcional)</h2>
		<p style="max-width:820px;color:#666;">
			Configure este endereço como <em>webhook</em> de <code>push</code> no GitHub (content-type
			<code>application/json</code>) para que cada envio para a branch atualize o tema na hora.
		</p>
		<p><input type="text" readonly value="<?php echo esc_attr( se_git_webhook_url() ); ?>" style="width:100%;max-width:820px;font-family:monospace;" onclick="this.select();"></p>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" onsubmit="return confirm('Gerar um novo segredo? O endereço antigo deixa de funcionar.');">
			<?php wp_nonce_field( 'se_git_action' ); ?>
			<input type="hidden" name="action" value="se_git_action">
			<input type="hidden" name="se_git_action" value="regen_secret">
			<button type="submit" class="button">Gerar novo segredo</button>
		</form>
	</div>
	<?php
}
