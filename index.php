<?php
/**
 * Fallback de listagem: busca nativa, arquivo de categoria, de autor e de data.
 *
 * Era um arquivo com o título "Padrão" e nada mais, o que fazia a busca do
 * WordPress (/?s=termo) devolver uma página praticamente vazia. A listagem da
 * Comunicação tem template próprio (page-blog.php) com filtro por AJAX, mas a
 * busca nativa continua alcançável por link externo e por buscador.
 */

get_header();

if ( is_search() ) {
	$se_olho   = 'Busca';
	$se_titulo = sprintf( 'Resultados para "%s"', get_search_query() );
} elseif ( is_category() || is_tax() ) {
	$se_olho   = 'Comunicação';
	$se_titulo = single_term_title( '', false );
} elseif ( is_author() ) {
	$se_olho   = 'Autor';
	$se_titulo = get_the_author();
} elseif ( is_archive() ) {
	$se_olho   = 'Comunicação';
	$se_titulo = get_the_archive_title();
} else {
	$se_olho   = 'Comunicação';
	$se_titulo = 'Artigos';
}
?>

<main>

	<section class="sup-escura se-artigo-topo pt-28 pb-12" style="background:linear-gradient(135deg,#1f3184,#030429)">
		<span class="se-capa-grade" aria-hidden="true"></span>
		<div class="container mx-auto px-6 max-w-4xl relative z-10">
			<span class="se-artigo-selo inline-block px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-widest">
				<?php echo esc_html( $se_olho ); ?>
			</span>
			<h1 class="titulo text-[2rem] md:text-[2.5rem] leading-[1.05] txt-forte mt-5">
				<?php echo esc_html( $se_titulo ); ?>
			</h1>
			<?php if ( have_posts() ) : ?>
				<p class="txt mt-3">
					<?php
					global $wp_query;
					printf(
						esc_html( _n( '%s artigo encontrado', '%s artigos encontrados', (int) $wp_query->found_posts, 'send-educacional' ) ),
						number_format_i18n( (int) $wp_query->found_posts )
					);
					?>
				</p>
			<?php endif; ?>
		</div>
	</section>

	<section class="py-14">
		<div class="container mx-auto px-6 max-w-6xl">

			<?php if ( have_posts() ) : ?>
				<div class="grid md:grid-cols-3 gap-6">
					<?php while ( have_posts() ) : the_post(); ?>
						<article class="group flex flex-col glass glass-hover rounded-[1.5rem] overflow-hidden">
							<a href="<?php the_permalink(); ?>" class="block w-full overflow-hidden">
								<?php se_capa_post( 'medium_large', 'h-44' ); ?>
							</a>
							<div class="p-6 flex flex-col flex-grow">
								<h2 class="text-lg font-bold txt-forte leading-snug mb-2 group-hover-link transition-colors">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<p class="txt text-sm leading-relaxed mb-4"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
								<span class="mt-auto txt-fraco text-[11px] font-semibold"><?php echo esc_html( get_the_date( 'd M, Y' ) ); ?></span>
							</div>
						</article>
					<?php endwhile; ?>
				</div>

				<?php
				$se_links = paginate_links( array(
					'prev_text' => '&larr; Voltar',
					'next_text' => 'Próxima &rarr;',
					'type'      => 'plain',
					'before_page_number' => '<span class="px-3 py-1.5 rounded-lg transition-colors txt block">',
					'after_page_number'  => '</span>',
				) );
				?>
				<?php if ( $se_links ) : ?>
					<div class="flex justify-center mt-12">
						<div class="inline-flex glass rounded-xl p-1.5 gap-1 font-bold text-sm"><?php echo $se_links; // phpcs:ignore ?></div>
					</div>
				<?php endif; ?>

			<?php else : ?>
				<?php // Busca vazia é um beco: sai daqui com um caminho, não com um aviso. ?>
				<div class="glass rounded-[1.5rem] p-8 md:p-10 max-w-2xl">
					<h2 class="titulo-mini text-xl txt-forte mb-2">Nada encontrado por aqui</h2>
					<p class="txt leading-relaxed mb-6">
						Se você procurava uma funcionalidade do sistema, a busca do catálogo cobre
						as mais de trezentas que existem hoje, e diz em qual segmento cada uma
						está configurada.
					</p>
					<div class="flex flex-col sm:flex-row gap-3">
						<a href="<?php echo esc_url( home_url( '/#desafio' ) ); ?>" class="gbtn txt-forte font-bold px-6 py-3.5 rounded-xl transition-all hover:-translate-y-0.5 inline-flex items-center justify-center">
							Buscar no catálogo
						</a>
						<a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="bloco txt-forte font-bold px-6 py-3.5 rounded-xl transition-colors inline-flex items-center justify-center">
							Ver a Comunicação
						</a>
					</div>
				</div>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
