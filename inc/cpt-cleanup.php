<?php
/**
 * Limpeza de conteúdo órfão (temporário).
 *
 * Re-registra, SOMENTE no painel (wp-admin), qualquer Custom Post Type que
 * tenha posts no banco mas não seja mais registrado pelo tema/plugin ativo —
 * por exemplo o CPT "solucoes" herdado do antigo tema Send Solutions. Assim os
 * posts órfãos voltam a aparecer no menu do WordPress para você EXCLUIR os que
 * não usa mais.
 *
 * Roda só no admin (is_admin) → não afeta o front-end, as URLs públicas nem os
 * sitemaps. É uma ferramenta temporária: depois da limpeza, este arquivo pode
 * ser removido do tema.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', function () {
	if ( ! is_admin() ) return;

	global $wpdb;

	$core = array(
		'post', 'page', 'attachment', 'revision', 'nav_menu_item',
		'custom_css', 'customize_changeset', 'oembed_cache', 'user_request',
		'wp_block', 'wp_template', 'wp_template_part', 'wp_global_styles',
		'wp_navigation', 'wp_font_family', 'wp_font_face',
		'acf-field', 'acf-field-group', 'acf-post-type', 'acf-taxonomy',
	);

	$tipos = $wpdb->get_col( "SELECT DISTINCT post_type FROM {$wpdb->posts}" );
	if ( empty( $tipos ) ) return;

	foreach ( $tipos as $tipo ) {
		if ( in_array( $tipo, $core, true ) ) continue;
		if ( post_type_exists( $tipo ) ) continue; // já registrado por tema/plugin ativo

		register_post_type( $tipo, array(
			'labels'          => array(
				'name'          => ucfirst( $tipo ) . ' (antigo)',
				'singular_name' => ucfirst( $tipo ) . ' (antigo)',
				'menu_name'     => ucfirst( $tipo ) . ' (antigo)',
			),
			'public'          => false,   // não cria URLs públicas novas
			'publicly_queryable' => false,
			'show_ui'         => true,    // aparece no painel para gerenciar/excluir
			'show_in_menu'    => true,
			'menu_icon'       => 'dashicons-archive',
			'menu_position'   => 58,
			'supports'        => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
			'has_archive'     => false,
			'rewrite'         => false,
			'capability_type' => 'post',
		) );
	}
}, 99 );
