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

	// Só deve existir UM sitemap: o curado em /sitemap.xml.
	// Qualquer sitemap automático (RankMath: sitemap_index.xml, page-sitemap.xml…)
	// é redirecionado para ele.
	if ( preg_match( '#(sitemap_index|[a-z]+-sitemap)\.xml$#i', $path ) ) {
		wp_safe_redirect( home_url( '/sitemap.xml' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'se_seo_maybe_serve_file', 0 );

// Desliga o sitemap nativo do WordPress — deixamos só o /sitemap.xml curado.
add_filter( 'wp_sitemaps_enabled', '__return_false' );

/**
 * Título da home. Vinha do "slogan" do site ("Seu ERP Acadêmico completo"),
 * que é vocabulário de ensino superior: diretor de escola e dono de curso
 * online não se reconhecem nele. Como o slogan é conteúdo de banco e não
 * viaja pelo Git, o título fica aqui — assim vale nas três instalações.
 *
 * Vale só para a HOME. Os títulos das páginas internas continuam com quem
 * cuida deles hoje (RankMath), para não atropelar o trabalho de SEO.
 */
function se_titulo_home_texto() {
	return 'Send Educacional — Sistema de gestão para faculdades, escolas e cursos online';
}

/** Instalação sem plugin de SEO: monta pelas partes nativas. */
function se_titulo_home_partes( $partes ) {
	if ( is_front_page() ) {
		$partes = array( 'title' => se_titulo_home_texto() );
	}
	return $partes;
}
add_filter( 'document_title_parts', 'se_titulo_home_partes' );

/**
 * Com plugin de SEO no ar, o filtro das partes nem chega a rodar: o RankMath
 * (e o Yoast) curto-circuitam em `pre_get_document_title`. Prioridade alta
 * para ser o último a falar — e só na home.
 */
function se_titulo_home_curto_circuito( $titulo ) {
	return is_front_page() ? se_titulo_home_texto() : $titulo;
}
add_filter( 'pre_get_document_title', 'se_titulo_home_curto_circuito', 99999 );
add_filter( 'rank_math/frontend/title', 'se_titulo_home_curto_circuito', 99999 );

/**
 * Meta description por página. O site não tinha nenhuma — quem escolhia o
 * trecho do resultado de busca era o Google, a partir do primeiro texto que
 * encontrasse na página.
 */
function se_descricao_da_pagina() {
	$descricoes = array(
		'ensino-superior' => 'Sistema de gestão para faculdades e centros universitários: processo seletivo, secretaria acadêmica, financeiro, AVA próprio, Censo INEP e diploma digital numa plataforma só.',
		'educacao-basica' => 'Sistema de gestão escolar para educação infantil, fundamental e ensino médio: matrícula e rematrícula, diário de classe, boletim, mensalidade e app para a família.',
		'cursos-online'   => 'Plataforma para vender curso online: pagamento por Pix e cartão, aula no AVA próprio, avaliação online corrigida na hora e certificado emitido automaticamente.',
	);

	$desc = '';

	if ( is_front_page() ) {
		$desc = 'Send Educacional: sistema de gestão para instituições de ensino — ensino superior, educação básica e média, e cursos com venda online. Uma plataforma só, do primeiro contato ao certificado.';
	} elseif ( is_page() ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		if ( isset( $descricoes[ $slug ] ) ) {
			$desc = $descricoes[ $slug ];
		}
	} elseif ( is_singular( 'post' ) ) {
		$desc = get_the_excerpt();
	}

	$desc = trim( wp_strip_all_tags( (string) $desc ) );
	return $desc === '' ? '' : wp_html_excerpt( $desc, 300, '' );
}

/** Preenche a descrição do RankMath só quando ele não tem uma própria. */
function se_descricao_rank_math( $desc ) {
	return trim( (string) $desc ) === '' ? se_descricao_da_pagina() : $desc;
}
add_filter( 'rank_math/frontend/description', 'se_descricao_rank_math', 99999 );

/** Já existe um plugin de SEO cuidando das meta tags? */
function se_tem_plugin_seo() {
	return defined( 'RANK_MATH_VERSION' )
		|| defined( 'WPSEO_VERSION' )
		|| defined( 'SEOPRESS_VERSION' )
		|| defined( 'AIOSEO_VERSION' )
		|| defined( 'SLIM_SEO_VERSION' );
}

/** Sem plugin de SEO, imprimimos a tag nós mesmos (evita descrição duplicada). */
function se_meta_description() {
	if ( se_tem_plugin_seo() ) {
		return;
	}

	$desc = se_descricao_da_pagina();
	if ( $desc === '' ) {
		return;
	}

	printf( '<meta name="description" content="%s">' . "\n", esc_attr( $desc ) );
}
add_action( 'wp_head', 'se_meta_description', 1 );

/**
 * A versão do WordPress na meta "generator" é informação de graça para quem
 * procura instalação vulnerável. Sai do <head> e dos feeds.
 */
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

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
