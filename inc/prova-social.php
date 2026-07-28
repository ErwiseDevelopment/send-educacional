<?php
/**
 * Prova social, logos de clientes e depoimentos.
 *
 * O site não tinha NENHUMA prova social: nem logo, nem depoimento, nem case.
 * Num produto em que a objeção nº 1 é medo de migração, isso é o que mais
 * custa conversão. Aqui fica a estrutura pronta; o conteúdo é preenchido em
 * Aparência > Personalizar > "Prova social", porque logo e depoimento de
 * cliente só entram no ar com autorização, não é coisa para inventar no
 * código. Enquanto os campos estiverem vazios, a seção simplesmente não sai.
 *
 * @see se_bloco_prova_social()
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/** Quantos espaços de logo e de depoimento existem no Personalizar. */
const SE_PS_LOGOS       = 8;
const SE_PS_DEPOIMENTOS = 3;

/** Logos preenchidos (IDs de anexo). */
function se_ps_logos() {
	$logos = array();
	for ( $i = 1; $i <= SE_PS_LOGOS; $i++ ) {
		$id = (int) get_theme_mod( 'se_ps_logo_' . $i, 0 );
		if ( $id ) {
			$logos[] = array(
				'id'   => $id,
				'nome' => trim( (string) get_theme_mod( 'se_ps_logo_nome_' . $i, '' ) ),
			);
		}
	}
	return $logos;
}

/** Depoimentos preenchidos (texto é obrigatório; o resto é opcional). */
function se_ps_depoimentos() {
	$deps = array();
	for ( $i = 1; $i <= SE_PS_DEPOIMENTOS; $i++ ) {
		$texto = trim( (string) get_theme_mod( 'se_ps_dep_texto_' . $i, '' ) );
		if ( $texto === '' ) {
			continue;
		}
		$deps[] = array(
			'texto'      => $texto,
			'autor'      => trim( (string) get_theme_mod( 'se_ps_dep_autor_' . $i, '' ) ),
			'cargo'      => trim( (string) get_theme_mod( 'se_ps_dep_cargo_' . $i, '' ) ),
			'instituicao'=> trim( (string) get_theme_mod( 'se_ps_dep_inst_' . $i, '' ) ),
		);
	}
	return $deps;
}

/** Tem alguma coisa para mostrar? */
function se_ps_tem_conteudo() {
	return se_ps_logos() || se_ps_depoimentos();
}

/**
 * A seção de prova social. Não imprime nada se ninguém preencheu, melhor
 * ausência do que uma seção vazia com "seus clientes aqui".
 */
function se_bloco_prova_social() {
	$logos = se_ps_logos();
	$deps  = se_ps_depoimentos();

	if ( ! $logos && ! $deps ) {
		return;
	}

	$titulo = trim( (string) get_theme_mod( 'se_ps_titulo', 'Instituições que já rodam no Send' ) );
	?>
	<section class="relative z-10 py-20">
		<div class="container mx-auto px-6 max-w-6xl">

			<?php if ( $logos ) : ?>
				<div class="text-center mb-10 reveal">
					<p class="text-sm font-bold uppercase tracking-widest text-slate-400"><?php echo esc_html( $titulo ); ?></p>
				</div>
				<div class="flex flex-wrap items-center justify-center gap-x-10 gap-y-8 mb-16 reveal">
					<?php foreach ( $logos as $l ) :
						$img = wp_get_attachment_image(
							$l['id'],
							'medium',
							false,
							array(
								'class' => 'h-10 md:h-12 w-auto object-contain opacity-70 hover:opacity-100 transition-opacity',
								'alt'   => $l['nome'] !== '' ? $l['nome'] : '',
							)
						);
						if ( $img ) {
							echo $img; // phpcs:ignore WordPress.Security.EscapeOutput
						}
					endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ( $deps ) : ?>
				<div class="grid gap-5 <?php echo count( $deps ) >= 3 ? 'md:grid-cols-3' : ( count( $deps ) === 2 ? 'md:grid-cols-2' : 'max-w-2xl mx-auto' ); ?> reveal">
					<?php foreach ( $deps as $d ) : ?>
						<figure class="glass glass-hover rounded-3xl p-8 flex flex-col">
							<svg class="w-8 h-8 text-blue-400/50 mb-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9.6 6.4C6.5 7.9 4.8 10.6 4.8 14v3.6h6.4V11H8.4c.2-1.4 1-2.4 2.4-3l-1.2-1.6zm8.4 0c-3.1 1.5-4.8 4.2-4.8 7.6v3.6h6.4V11h-2.8c.2-1.4 1-2.4 2.4-3L18 6.4z"/></svg>
							<blockquote class="text-slate-300 leading-relaxed flex-grow"><?php echo esc_html( $d['texto'] ); ?></blockquote>
							<?php if ( $d['autor'] !== '' || $d['instituicao'] !== '' ) : ?>
								<figcaption class="mt-6 pt-5 border-t border-white/10">
									<?php if ( $d['autor'] !== '' ) : ?>
										<span class="block text-sm font-bold text-white"><?php echo esc_html( $d['autor'] ); ?></span>
									<?php endif; ?>
									<span class="block text-xs text-slate-400 mt-0.5">
										<?php echo esc_html( trim( $d['cargo'] . ( $d['cargo'] !== '' && $d['instituicao'] !== '' ? ' · ' : '' ) . $d['instituicao'] ) ); ?>
									</span>
								</figcaption>
							<?php endif; ?>
						</figure>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

		</div>
	</section>
	<?php
}

/** Foto real do time (página Sobre). Vazio = mostra o bloco desenhado do tema. */
function se_foto_time_id() {
	return (int) get_theme_mod( 'se_foto_time', 0 );
}

/** Registra a seção "Prova social" no Personalizar. */
function se_ps_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'se_prova_social', array(
		'title'       => 'Prova social',
		'priority'    => 21,
		'description' => 'Logos de clientes e depoimentos que aparecem na home. '
			. 'Só publique logo e depoimento com autorização por escrito da instituição. '
			. 'Campo vazio não aparece no site.',
	) );

	$wp_customize->add_setting( 'se_ps_titulo', array(
		'default'           => 'Instituições que já rodam no Send',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'se_ps_titulo', array(
		'label'   => 'Título acima dos logos',
		'section' => 'se_prova_social',
		'type'    => 'text',
	) );

	for ( $i = 1; $i <= SE_PS_LOGOS; $i++ ) {
		$wp_customize->add_setting( 'se_ps_logo_' . $i, array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'se_ps_logo_' . $i, array(
			'label'     => sprintf( 'Logo %d', $i ),
			'section'   => 'se_prova_social',
			'mime_type' => 'image',
		) ) );

		$wp_customize->add_setting( 'se_ps_logo_nome_' . $i, array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( 'se_ps_logo_nome_' . $i, array(
			'label'       => sprintf( 'Nome da instituição %d', $i ),
			'description' => 'Usado no texto alternativo da imagem (acessibilidade e SEO).',
			'section'     => 'se_prova_social',
			'type'        => 'text',
		) );
	}

	for ( $i = 1; $i <= SE_PS_DEPOIMENTOS; $i++ ) {
		$wp_customize->add_setting( 'se_ps_dep_texto_' . $i, array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( 'se_ps_dep_texto_' . $i, array(
			'label'       => sprintf( 'Depoimento %d, texto', $i ),
			'description' => 'Deixe vazio para não exibir este depoimento.',
			'section'     => 'se_prova_social',
			'type'        => 'textarea',
		) );

		foreach ( array(
			'autor' => 'quem falou (nome)',
			'cargo' => 'cargo',
			'inst'  => 'instituição',
		) as $campo => $rotulo ) {
			$wp_customize->add_setting( 'se_ps_dep_' . $campo . '_' . $i, array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'refresh',
			) );
			$wp_customize->add_control( 'se_ps_dep_' . $campo . '_' . $i, array(
				'label'   => sprintf( 'Depoimento %d, %s', $i, $rotulo ),
				'section' => 'se_prova_social',
				'type'    => 'text',
			) );
		}
	}

	$wp_customize->add_setting( 'se_foto_time', array(
		'default'           => 0,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'se_foto_time', array(
		'label'       => 'Foto real do time (página Sobre)',
		'description' => 'Numa página que fala de três décadas de história, foto de banco de imagem trabalha contra o argumento. '
			. 'Sem foto enviada, entra um bloco desenhado com a linha do tempo, nunca uma foto genérica.',
		'section'     => 'se_prova_social',
		'mime_type'   => 'image',
	) ) );
}
add_action( 'customize_register', 'se_ps_customize_register' );
