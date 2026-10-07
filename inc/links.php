<?php
/**
 * Página /links, o "link na bio" do Instagram.
 *
 * Página solta, sem cabeçalho nem rodapé do site: quem toca no link da bio
 * está no celular e quer escolher um caminho em um toque. Fica fora do
 * sitemap curado e sai com noindex, porque só faz sentido vindo do perfil.
 *
 * Mesmo esquema do /sitemap.xml e /llms.txt (inc/seo.php): intercepta cedo no
 * template_redirect, entrega a página e encerra. CSS inline, sem depender do
 * build do Tailwind.
 *
 * Os links internos levam utm_source=instagram&utm_medium=links&utm_campaign=bio,
 * então a visita aparece com a origem certa no Send Analytics.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/** O caminho pedido é /links ou /links/ (na raiz do site ou da subpasta)? */
function se_links_e_a_rota() {
	$uri  = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
	$path = (string) wp_parse_url( $uri, PHP_URL_PATH );
	if ( '' === $path ) return false;

	$base = untrailingslashit( (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH ) );
	return (bool) preg_match( '#^' . preg_quote( $base, '#' ) . '/links/?$#i', $path );
}

/** URL interna com a UTM da bio. */
function se_links_url( $caminho, $ancora = '' ) {
	$url = add_query_arg(
		array(
			'utm_source'   => 'instagram',
			'utm_medium'   => 'links',
			'utm_campaign' => 'bio',
		),
		home_url( $caminho )
	);
	return $ancora !== '' ? $url . '#' . $ancora : $url;
}

/** Os botões, na ordem em que aparecem. */
function se_links_itens() {
	return array(
		array(
			'titulo'    => 'Diagnóstico gratuito',
			'sub'       => 'Raio-X da rematrícula e 12 perguntas antes de trocar de sistema',
			'url'       => se_links_url( '/diagnosticos/' ),
			'track'     => 'links-diagnostico',
			'destaque'  => true,
			'icone'     => '<path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>',
		),
		array(
			'titulo'    => 'Agende uma demonstração',
			'sub'       => 'Um especialista mostra o sistema rodando com a sua rotina',
			'url'       => se_links_url( '/', 'demonstracao' ),
			'track'     => 'links-demonstracao',
			'destaque'  => false,
			'icone'     => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/><path d="M9 16l2 2 4-4"/>',
		),
		array(
			'titulo'    => 'Conheça o sistema',
			'sub'       => 'Acadêmico, financeiro, captação, AVA e portais em um lugar só',
			'url'       => se_links_url( '/' ),
			'track'     => 'links-sistema',
			'destaque'  => false,
			'icone'     => '<rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/>',
		),
		array(
			'titulo'    => 'Blog',
			'sub'       => 'Gestão escolar, captação e retenção na prática',
			'url'       => se_links_url( '/blog/' ),
			'track'     => 'links-blog',
			'destaque'  => false,
			'icone'     => '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/><path d="M9 7h7M9 11h5"/>',
		),
	);
}

/** Registra a visita no Send Analytics (o registro padrão roda depois do exit). */
function se_links_registrar_visita() {
	if ( ! function_exists( 'se_analytics_should_skip' ) || se_analytics_should_skip() ) return;

	se_analytics_record( array(
		'event_type'   => 'view',
		'page_url'     => isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '',
		'page_title'   => 'Links (bio do Instagram)',
		'referer'      => isset( $_SERVER['HTTP_REFERER'] ) ? esc_url_raw( wp_unslash( $_SERVER['HTTP_REFERER'] ) ) : '',
		'utm_source'   => isset( $_GET['utm_source'] ) ? sanitize_text_field( wp_unslash( $_GET['utm_source'] ) ) : 'instagram',
		'utm_medium'   => isset( $_GET['utm_medium'] ) ? sanitize_text_field( wp_unslash( $_GET['utm_medium'] ) ) : 'bio',
		'utm_campaign' => isset( $_GET['utm_campaign'] ) ? sanitize_text_field( wp_unslash( $_GET['utm_campaign'] ) ) : '',
	) );
}

function se_links_servir() {
	if ( is_admin() || ! se_links_e_a_rota() ) return;

	se_links_registrar_visita();

	if ( ! headers_sent() ) {
		status_header( 200 );
		header( 'Content-Type: text/html; charset=UTF-8' );
		header( 'X-Robots-Tag: noindex' );
	}

	$logo   = function_exists( 'se_logo_url' ) ? se_logo_url() : get_template_directory_uri() . '/assets/img/logo-branco.png';
	$zap    = function_exists( 'se_whatsapp_link' )
		? se_whatsapp_link( 'Olá! Vim pelo Instagram e quero conhecer o Send Educacional.' )
		: 'https://api.whatsapp.com/send?phone=5511934194219';
	$itens  = se_links_itens();
	$rastro = function_exists( 'se_analytics_should_skip' ) && ! ( is_user_logged_in() && current_user_can( 'manage_options' ) );
	?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="robots" content="noindex">
<meta name="theme-color" content="#030429">
<title>Send Educacional | Links</title>
<meta name="description" content="Gestão completa para escolas, faculdades e cursos.">
<link rel="icon" href="<?php echo esc_url( get_site_icon_url( 64, get_template_directory_uri() . '/assets/img/logo-icone.png' ) ); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0}
html{-webkit-text-size-adjust:100%}
body{
	min-height:100vh;min-height:100dvh;
	font-family:'Poppins',system-ui,-apple-system,'Segoe UI',sans-serif;
	color:#b8b9c3;background:#030429;
	background-image:
		radial-gradient(120% 60% at 50% -10%,rgba(74,120,176,.38),transparent 60%),
		radial-gradient(80% 50% at 100% 100%,rgba(8,11,108,.55),transparent 70%);
	background-attachment:fixed;
	-webkit-font-smoothing:antialiased;
}
.pagina{
	max-width:480px;margin:0 auto;
	padding:calc(40px + env(safe-area-inset-top)) 16px calc(32px + env(safe-area-inset-bottom));
	display:flex;flex-direction:column;min-height:100vh;min-height:100dvh;
}
.topo{text-align:center;margin-bottom:28px}
.topo img{display:block;height:46px;width:auto;max-width:220px;margin:0 auto 16px;object-fit:contain}
.topo p{font-size:15px;line-height:1.45;color:#d4d6e2;font-weight:500;max-width:300px;margin:0 auto}
.lista{list-style:none;display:flex;flex-direction:column;gap:12px}
.cartao{
	display:flex;align-items:center;gap:14px;
	min-height:76px;padding:16px 16px 16px 14px;border-radius:18px;
	text-decoration:none;color:#fff;
	background:rgba(74,120,176,.09);
	border:1px solid rgba(150,177,209,.20);
	box-shadow:0 1px 0 0 rgba(255,255,255,.06) inset;
	transition:transform .2s ease,border-color .2s ease,background .2s ease;
	-webkit-tap-highlight-color:transparent;
}
.cartao:hover,.cartao:focus-visible{transform:translateY(-2px);border-color:rgba(150,177,209,.55);background:rgba(74,120,176,.16)}
.cartao:active{transform:scale(.985)}
.cartao:focus-visible{outline:2px solid #96b1d1;outline-offset:3px}
.cartao.destaque{
	background:linear-gradient(100deg,#4a78b0,#1f3184);
	border-color:rgba(150,177,209,.45);
	box-shadow:0 14px 34px -12px rgba(8,11,108,.95),0 1px 0 0 rgba(255,255,255,.18) inset;
}
.cartao.destaque:hover,.cartao.destaque:focus-visible{background:linear-gradient(100deg,#5883b6,#2b2d81)}
.icone{
	flex:0 0 44px;width:44px;height:44px;border-radius:12px;
	display:flex;align-items:center;justify-content:center;
	background:linear-gradient(135deg,#4a78b0,#080b6c);color:#fff;
}
.destaque .icone{background:rgba(255,255,255,.16)}
.icone svg{width:22px;height:22px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
.texto{flex:1;min-width:0}
.texto strong{display:block;font-size:16.5px;font-weight:700;line-height:1.25;letter-spacing:-.01em;color:#fff}
.texto span{display:block;margin-top:3px;font-size:13px;line-height:1.4;color:#c3c8db}
.destaque .texto span{color:#e3e9f6}
.seta{flex:0 0 18px;width:18px;height:18px;fill:none;stroke:#96b1d1;stroke-width:2.2;stroke-linecap:round;stroke-linejoin:round}
.destaque .seta{stroke:#fff}
.zap{
	display:inline-flex;align-items:center;justify-content:center;gap:8px;
	margin:26px auto 0;padding:10px 16px;border-radius:999px;
	font-size:14px;font-weight:600;color:#d4d6e2;text-decoration:none;
	border:1px solid rgba(150,177,209,.22);
}
.zap:hover,.zap:focus-visible{color:#fff;border-color:rgba(150,177,209,.55)}
.zap svg{width:18px;height:18px;fill:#25d366}
.rodape{margin-top:auto;padding-top:28px;text-align:center;font-size:12px;color:#8b8c9d}
.rodape a{color:#96b1d1;text-decoration:none}
@media (prefers-reduced-motion:reduce){.cartao{transition:none}.cartao:hover{transform:none}}
</style>
</head>
<body>
<main class="pagina">
	<header class="topo">
		<img src="<?php echo esc_url( $logo ); ?>" alt="Send Educacional" width="190" height="46">
		<p>Gestão completa para escolas, faculdades e cursos</p>
	</header>

	<ul class="lista">
		<?php foreach ( $itens as $item ) : ?>
		<li>
			<a class="cartao<?php echo $item['destaque'] ? ' destaque' : ''; ?>" href="<?php echo esc_url( $item['url'] ); ?>" data-track="<?php echo esc_attr( $item['track'] ); ?>">
				<span class="icone" aria-hidden="true"><svg viewBox="0 0 24 24"><?php echo $item['icone']; // SVG fixo do próprio tema. ?></svg></span>
				<span class="texto">
					<strong><?php echo esc_html( $item['titulo'] ); ?></strong>
					<span><?php echo esc_html( $item['sub'] ); ?></span>
				</span>
				<svg class="seta" viewBox="0 0 24 24" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>

	<a class="zap" href="<?php echo esc_url( $zap ); ?>" target="_blank" rel="noopener" data-track="links-whatsapp">
		<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17.47 14.38c-.3-.15-1.75-.86-2.02-.96-.27-.1-.47-.15-.67.15-.2.3-.77.96-.94 1.16-.17.2-.35.22-.64.07-.3-.15-1.25-.46-2.38-1.47-.88-.79-1.47-1.76-1.65-2.06-.17-.3-.02-.46.13-.6.13-.14.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.61-.92-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.21 3.07.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.7.63.71.22 1.36.19 1.87.12.57-.09 1.75-.72 2-1.41.25-.7.25-1.29.17-1.41-.07-.13-.27-.2-.57-.35zM12.04 21.8h-.01a9.87 9.87 0 0 1-5.03-1.38l-.36-.21-3.74.98 1-3.65-.24-.37a9.86 9.86 0 0 1-1.51-5.26c0-5.45 4.44-9.88 9.9-9.88a9.83 9.83 0 0 1 6.99 2.9 9.82 9.82 0 0 1 2.89 6.99c0 5.45-4.44 9.88-9.89 9.88zm8.41-18.3A11.81 11.81 0 0 0 12.04 0C5.5 0 .16 5.33.16 11.89c0 2.1.55 4.14 1.59 5.94L.06 24l6.3-1.65a11.88 11.88 0 0 0 5.68 1.45h.01c6.55 0 11.89-5.33 11.89-11.89 0-3.18-1.24-6.16-3.49-8.41z"/></svg>
		Falar no WhatsApp
	</a>

	<footer class="rodape">
		<a href="<?php echo esc_url( se_links_url( '/' ) ); ?>">sendeducacional.com.br</a>
	</footer>
</main>
<?php if ( $rastro ) : ?>
<script>var SE_TRACK=<?php echo wp_json_encode( array( 'ajax' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce( 'se_analytics' ) ) ); ?>;</script>
<script src="<?php echo esc_url( get_template_directory_uri() . '/js/se-tracking.js?ver=' . ( defined( 'SE_ANALYTICS_DB_VERSION' ) ? SE_ANALYTICS_DB_VERSION : '1' ) ); ?>" defer></script>
<?php endif; ?>
</body>
</html>
	<?php
	exit;
}
add_action( 'template_redirect', 'se_links_servir', 0 );
