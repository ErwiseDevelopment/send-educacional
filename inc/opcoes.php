<?php
/**
 * Opções do tema (Aparência > Personalizar > Send Educacional).
 *
 * Centraliza o WhatsApp/telefone, o e-mail comercial e a logo, que antes
 * estavam escritos direto nos templates. Os defaults são os valores atuais
 * do site, então nada muda até alguém editar no Personalizar.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/** Só os dígitos do WhatsApp, no formato que a API espera (55 + DDD + número). */
function se_whatsapp_num() {
	$num = get_theme_mod( 'se_whatsapp_num', '5511934194219' );
	$num = preg_replace( '/\D/', '', (string) $num );
	return $num !== '' ? $num : '5511934194219';
}

/** Telefone como aparece na tela, ex.: (11) 93419-4219. */
function se_whatsapp_label() {
	$label = trim( (string) get_theme_mod( 'se_whatsapp_label', '(11) 93419-4219' ) );
	if ( $label !== '' ) {
		return $label;
	}

	// Sem rótulo definido: formata a partir dos dígitos (tira o 55 do país).
	$num = se_whatsapp_num();
	$nac = ( strpos( $num, '55' ) === 0 ) ? substr( $num, 2 ) : $num;
	if ( strlen( $nac ) === 11 ) {
		return sprintf( '(%s) %s-%s', substr( $nac, 0, 2 ), substr( $nac, 2, 5 ), substr( $nac, 7 ) );
	}
	if ( strlen( $nac ) === 10 ) {
		return sprintf( '(%s) %s-%s', substr( $nac, 0, 2 ), substr( $nac, 2, 4 ), substr( $nac, 6 ) );
	}
	return $num;
}

/** Link pronto do WhatsApp, com mensagem opcional já codificada. */
function se_whatsapp_link( $texto = '' ) {
	$url = 'https://api.whatsapp.com/send?phone=' . se_whatsapp_num();
	if ( $texto !== '' ) {
		$url .= '&text=' . rawurlencode( $texto );
	}
	return $url;
}

/** E-mail comercial exibido no rodapé. */
function se_email_contato() {
	$email = trim( (string) get_theme_mod( 'se_email_contato', 'comercial@sendsolutions.com.br' ) );
	return $email !== '' ? $email : 'comercial@sendsolutions.com.br';
}

/** URL da logo (versão branca, usada no cabeçalho e no rodapé). */
function se_logo_url() {
	$logo = trim( (string) get_theme_mod( 'se_logo', '' ) );
	return $logo !== '' ? $logo : get_template_directory_uri() . '/assets/img/logo-branco.png';
}

/**
 * Largura/altura reais da logo, para o navegador reservar o espaço certo.
 * Retorna null quando não dá para descobrir (aí sai sem os atributos, e o
 * tamanho fica só por CSS — melhor do que declarar uma proporção errada).
 */
function se_logo_dimensoes() {
	$logo = trim( (string) get_theme_mod( 'se_logo', '' ) );

	if ( $logo === '' ) {
		return array( 989, 240 ); // logo que vem no tema
	}

	$id = attachment_url_to_postid( $logo );
	if ( ! $id ) {
		// URLs de miniatura/-scaled às vezes não batem com o anexo original
		$limpo = preg_replace( '/-(scaled|\d+x\d+)(\.[a-z]+)$/i', '$2', $logo );
		$id    = $limpo !== $logo ? attachment_url_to_postid( $limpo ) : 0;
	}
	if ( ! $id ) {
		return null;
	}

	$src = wp_get_attachment_image_src( $id, 'full' );
	return ( $src && ! empty( $src[1] ) && ! empty( $src[2] ) ) ? array( (int) $src[1], (int) $src[2] ) : null;
}

/** Atributos width/height da logo, prontos para colar na tag <img>. */
function se_logo_dimensoes_attr() {
	$dim = se_logo_dimensoes();
	return $dim ? sprintf( ' width="%d" height="%d"', $dim[0], $dim[1] ) : '';
}

/** Altura da logo no cabeçalho, em px (o rodapé usa um pouco mais). */
function se_logo_altura() {
	$h = (int) get_theme_mod( 'se_logo_altura', 48 );
	return ( $h >= 24 && $h <= 160 ) ? $h : 48;
}

/**
 * Regra de tamanho da logo. Fica no wp_head porque o valor vem do
 * Personalizar e o Tailwind é compilado — não dá para gerar classe na hora.
 */
function se_logo_css() {
	// Mantém a mesma relação do layout original: 44/48 no cabeçalho e 48/56 no rodapé.
	$d  = se_logo_altura();                    // cabeçalho, desktop
	$m  = max( 24, (int) round( $d * 0.92 ) ); // cabeçalho, celular
	$fd = $d + 8;                              // rodapé, desktop
	$fm = $m + 4;                              // rodapé, celular

	printf(
		'<style id="se-logo-size">.se-logo{height:%dpx}.se-logo-rodape{height:%dpx}@media(min-width:768px){.se-logo{height:%dpx}.se-logo-rodape{height:%dpx}}</style>' . "\n",
		$m,
		$fm,
		$d,
		$fd
	);
}
add_action( 'wp_head', 'se_logo_css', 20 );

/** Registra a seção "Send Educacional" no Personalizar. */
function se_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'se_geral', array(
		'title'       => 'Send Educacional',
		'priority'    => 20,
		'description' => 'Logo, WhatsApp e e-mail usados no cabeçalho, no rodapé e nos botões flutuantes do site.',
	) );

	$wp_customize->add_setting( 'se_logo', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'se_logo', array(
		'label'       => 'Logo (fundo transparente, versão branca)',
		'description' => 'Aparece no cabeçalho e no rodapé. Deixe vazio para usar a logo que vem no tema. '
			. 'Envie a imagem já recortada, sem sobra transparente em volta: o tamanho é medido pela altura '
			. 'do arquivo inteiro, então uma moldura vazia faz a marca aparecer pequena.',
		'section'     => 'se_geral',
	) ) );

	$wp_customize->add_setting( 'se_logo_altura', array(
		'default'           => 48,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'se_logo_altura', array(
		'label'       => 'Altura da logo no cabeçalho (px)',
		'description' => 'Padrão 48. No celular sai 20% menor e no rodapé 8px maior, automaticamente.',
		'section'     => 'se_geral',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 24, 'max' => 160, 'step' => 2 ),
	) );

	$wp_customize->add_setting( 'se_whatsapp_num', array(
		'default'           => '5511934194219',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'se_whatsapp_num', array(
		'label'       => 'WhatsApp (só números, com 55 + DDD)',
		'description' => 'Ex.: 5511934194219. É o número de todos os links de WhatsApp do site.',
		'section'     => 'se_geral',
		'type'        => 'text',
	) );

	$wp_customize->add_setting( 'se_whatsapp_label', array(
		'default'           => '(11) 93419-4219',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'se_whatsapp_label', array(
		'label'       => 'Telefone como aparece no rodapé',
		'description' => 'Ex.: (11) 93419-4219. Deixe vazio para formatar sozinho a partir do número acima.',
		'section'     => 'se_geral',
		'type'        => 'text',
	) );

	$wp_customize->add_setting( 'se_email_contato', array(
		'default'           => 'comercial@sendsolutions.com.br',
		'sanitize_callback' => 'sanitize_email',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'se_email_contato', array(
		'label'   => 'E-mail comercial (rodapé)',
		'section' => 'se_geral',
		'type'    => 'email',
	) );
}
add_action( 'customize_register', 'se_customize_register' );
