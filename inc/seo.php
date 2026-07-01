<?php
/**
 * SEO / descoberta — serve /llms.txt e /sitemap.xml a partir do tema.
 *
 * Assim os arquivos versionam e fazem deploy junto com o tema (Git/PUC),
 * sem precisar subir nada na raiz do servidor. Funciona tanto na raiz do
 * domínio (produção) quanto em subpasta (localhost), porque casa o final
 * do caminho da requisição.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Intercepta cedo (template_redirect, prioridade 0) e entrega o arquivo do tema.
 */
function se_seo_maybe_serve_file() {
	if ( is_admin() ) return;

	$uri  = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
	$path = (string) wp_parse_url( $uri, PHP_URL_PATH );
	if ( '' === $path ) return;

	$rotas = array(
		'#/llms\.txt$#i'    => array( 'seo/llms.txt', 'text/plain; charset=UTF-8' ),
		'#/sitemap\.xml$#i' => array( 'seo/sitemap.xml', 'application/xml; charset=UTF-8' ),
	);

	foreach ( $rotas as $regex => $info ) {
		if ( preg_match( $regex, $path ) ) {
			$file = get_template_directory() . '/' . $info[0];
			if ( ! is_readable( $file ) ) return;

			if ( ! headers_sent() ) {
				status_header( 200 );
				header( 'Content-Type: ' . $info[1] );
				header( 'Cache-Control: public, max-age=3600' );
			}
			readfile( $file );
			exit;
		}
	}
}
add_action( 'template_redirect', 'se_seo_maybe_serve_file', 0 );

/**
 * Aponta o sitemap no robots.txt virtual do WordPress.
 */
function se_seo_robots_txt( $output, $public ) {
	if ( $public ) {
		$output .= "\nSitemap: " . home_url( '/sitemap.xml' ) . "\n";
	}
	return $output;
}
add_filter( 'robots_txt', 'se_seo_robots_txt', 10, 2 );
