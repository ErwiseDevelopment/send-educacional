<?php
/**
 * Capa dos artigos.
 *
 * A maioria dos posts não tem imagem destacada, e isso por si só não é um
 * problema: o que estraga a página é a INCONSISTÊNCIA, uns cartões com foto e
 * outros com um retângulo cinza vazio. Aqui, quando não há imagem, desenhamos
 * uma capa da marca em vez de deixar o buraco.
 *
 * A cor sai da categoria do post. Como as categorias do blog usam os mesmos
 * slugs dos segmentos (ensino-superior, educacao-basica, cursos-online), a
 * capa já nasce dizendo para quem aquele artigo é.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Cor de fundo da capa, a partir da categoria.
 *
 * @return array{0:string,1:string,2:string} cor base, cor do degradê, rótulo
 */
function se_capa_cor( $post_id = null ) {
	$cats = get_the_category( $post_id ?: get_the_ID() );
	$slug = $cats ? $cats[0]->slug : '';
	$nome = $cats ? $cats[0]->name : 'Artigo';

	$seg = se_segmento( $slug );
	if ( $seg ) {
		// Mesmo azul do bloco daquele segmento, para o artigo e a solução
		// falarem a mesma língua visual.
		return array( $seg['cor_bloco'], '#030429', $nome );
	}

	// Categoria fora dos três segmentos: azul da marca.
	return array( '#1f3184', '#030429', $nome );
}

/** Símbolo da marca usado dentro do selo da capa. */
function se_capa_simbolo() {
	return '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5 2.5 9 12 13.5 21.5 9 12 4.5z"></path>'
		. '<path stroke-linecap="round" stroke-linejoin="round" d="M6 11v5c0 1.2 2.7 2.8 6 2.8s6-1.6 6-2.8v-5"></path>';
}

/**
 * Desenha a capa da marca.
 *
 * @param string $altura Classes de altura do bloco (ex.: 'h-48').
 * @param string $porte  'mini' (sem rótulo, selo menor), 'normal' ou 'grande'.
 */
function se_capa_desenhada( $altura = 'h-48', $porte = 'normal' ) {
	list( $cor, $fundo, $rotulo ) = se_capa_cor();
	$classe = 'se-capa ' . $altura . ( $porte === 'mini' ? ' se-capa-mini' : '' );
	$selo   = 'se-capa-marca' . ( $porte === 'grande' ? ' se-capa-marca-g' : '' );
	?>
	<div class="<?php echo esc_attr( $classe ); ?>"
	     style="background:linear-gradient(135deg,<?php echo esc_attr( $cor ); ?>,<?php echo esc_attr( $fundo ); ?>)"
	     aria-hidden="true">
		<span class="se-capa-grade"></span>
		<svg class="<?php echo esc_attr( $selo ); ?>" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><?php echo se_capa_simbolo(); // phpcs:ignore ?></svg>
		<?php if ( $porte !== 'mini' ) : ?>
			<span class="se-capa-rotulo"><?php echo esc_html( $rotulo ); ?></span>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Capa do post: a imagem destacada quando existe, senão a capa desenhada.
 *
 * @param string $tamanho Tamanho da imagem do WordPress.
 * @param string $altura  Classes de altura do bloco (ex.: 'h-48').
 * @param string $porte   'mini', 'normal' ou 'grande'.
 */
function se_capa_post( $tamanho = 'medium_large', $altura = 'h-48', $porte = 'normal' ) {
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( $tamanho, array(
			'class' => 'w-full ' . $altura . ' object-cover group-hover:scale-105 transition-transform duration-700',
		) );
		return;
	}

	se_capa_desenhada( $altura, $porte );
}

/** A mesma capa, em versão grande, para o topo do artigo. */
function se_capa_post_grande() {
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto md:h-[420px] object-cover' ) );
		return;
	}

	se_capa_desenhada( 'h-56 md:h-[320px]', 'grande' );
}
