<?php
/**
 * Página comum, e o fallback de todas as páginas sem template próprio.
 *
 * Este arquivo estava VAZIO (0 bytes). Como o WordPress usa page.php sempre que
 * não encontra um page-<slug>.php, qualquer página fora da lista de templates
 * abria completamente em branco. Em produção isso derrubava /captacao,
 * /assinatura, /bi e /seguranca, todas linkadas no menu.
 *
 * O fallback tem três caminhos, nesta ordem:
 *
 *   1. a página tem conteúdo no editor -> renderiza o conteúdo;
 *   2. o slug bate com um módulo do catálogo -> monta a página a partir dele,
 *      com a lista de funcionalidades por segmento (o conteúdo já existe em
 *      inc/modulos.php, não faz sentido a página ficar vazia);
 *   3. nenhum dos dois -> ao menos título, caminho de volta e demonstração,
 *      nunca uma tela branca.
 */

get_header();

$se_slug   = get_post_field( 'post_name', get_the_ID() );
$se_modulo = function_exists( 'se_modulo_por_url' ) ? se_modulo_por_url( $se_slug ) : null;
$se_texto  = trim( (string) get_post_field( 'post_content', get_the_ID() ) );
?>

<main>

	<section class="sup-escura se-artigo-topo pt-28 pb-14" style="background:linear-gradient(135deg,#1f3184,#030429)">
		<span class="se-capa-grade" aria-hidden="true"></span>
		<div class="container mx-auto px-6 max-w-4xl relative z-10">
			<?php if ( $se_modulo ) : ?>
				<span class="se-artigo-selo inline-block px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-widest">
					Módulo da plataforma
				</span>
			<?php endif; ?>

			<h1 class="titulo text-[2rem] md:text-[2.75rem] leading-[1.05] txt-forte mt-5 mb-4">
				<?php echo esc_html( $se_modulo ? $se_modulo['nome'] : get_the_title() ); ?>
			</h1>

			<?php if ( $se_modulo ) : ?>
				<p class="text-lg txt leading-relaxed max-w-2xl"><?php echo esc_html( $se_modulo['resumo'] ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<section class="py-16">
		<div class="container mx-auto px-6 max-w-4xl">

			<?php if ( $se_texto ) : ?>
				<div class="prose prose-lg prose-slate max-w-none prose-headings:font-bold prose-headings:text-slate-900 prose-a:text-blue-700">
					<?php the_content(); ?>
				</div>
			<?php endif; ?>

			<?php if ( $se_modulo ) : ?>
				<?php
				// A mesma funcionalidade costuma existir nos três segmentos com
				// recortes diferentes. Mostrar por segmento evita prometer à
				// escola o que só existe no superior.
				$se_i = 0;
				foreach ( $se_modulo['segmentos'] as $se_seg_slug => $se_itens ) :
					$se_seg = se_segmento( $se_seg_slug );
					if ( ! $se_seg ) { continue; }
					$se_i++;
					?>
					<div class="<?php echo $se_i > 1 ? 'mt-12 pt-12 regra' : ( $se_texto ? 'mt-12' : '' ); ?>">
						<div class="flex items-center gap-3 mb-5">
							<span class="w-3 h-3 rounded-full shrink-0" style="background:<?php echo esc_attr( $se_seg['cor_bloco'] ); ?>"></span>
							<h2 class="titulo-mini text-xl txt-forte"><?php echo esc_html( $se_seg['nome'] ); ?></h2>
							<span class="txt-fraco text-[12px] font-semibold"><?php echo (int) count( $se_itens ); ?> funcionalidades</span>
						</div>

						<ul class="grid sm:grid-cols-2 gap-x-8 gap-y-2.5">
							<?php foreach ( $se_itens as $se_item ) : ?>
								<li class="flex items-start gap-2.5 text-[15px] txt leading-snug">
									<svg class="w-4 h-4 shrink-0 mt-1 txt-link" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
									<?php echo esc_html( $se_item ); ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endforeach; ?>

			<?php elseif ( ! $se_texto ) : ?>
				<?php // Sem conteúdo e sem módulo: a página existe, então ao menos oferece saída. ?>
				<p class="txt text-lg leading-relaxed max-w-2xl">
					Esta página faz parte da plataforma Send Educacional. Enquanto o conteúdo dela
					não está publicado, o caminho mais curto para ver isto funcionando é a
					apresentação da plataforma ou uma conversa de trinta minutos com um
					especialista do seu segmento.
				</p>
			<?php endif; ?>

			<div class="regra mt-14 pt-10 flex flex-col sm:flex-row gap-3">
				<button onclick="abrirDemo()" class="gbtn txt-forte font-bold px-7 py-3.5 rounded-xl transition-all hover:-translate-y-0.5">
					Ver na prática
				</button>
				<?php $se_url_apre = se_url_pagina( 'apresentacao' ); ?>
				<?php if ( $se_url_apre ) : ?>
					<a href="<?php echo esc_url( $se_url_apre ); ?>" class="bloco txt-forte font-bold px-7 py-3.5 rounded-xl transition-colors inline-flex items-center justify-center">
						Ver a plataforma completa
					</a>
				<?php endif; ?>
			</div>

		</div>
	</section>

</main>

<?php get_footer(); ?>
