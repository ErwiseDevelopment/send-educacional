<?php
/**
 * Página do material rico.
 *
 * O popup de saída é oportunista: aparece para quem já ia embora. Esta página
 * é o endereço fixo do material, o que dá para linkar no menu, no rodapé de um
 * artigo, num e-mail ou numa campanha. Sem ela, a oferta só existiria por
 * acaso.
 *
 * Template ligado ao slug material-trocar-de-sistema (ver inc/paginas.php).
 */

get_header();
$m = se_material();
?>

<main>

	<section class="sup-escura relative overflow-hidden pt-28 pb-20"
	         style="background:linear-gradient(135deg,#080b6c,#030429)">
		<span class="se-capa-grade" aria-hidden="true"></span>

		<div class="container mx-auto px-6 max-w-6xl relative z-10">
			<div class="grid lg:grid-cols-12 gap-12 items-start">

				<div class="lg:col-span-7">
					<span class="se-artigo-selo inline-block px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-widest">
						Material gratuito · <?php echo esc_html( $m['formato'] ); ?>
					</span>

					<h1 class="titulo text-[2.2rem] md:text-5xl leading-[1.03] txt-forte mt-5 mb-5">
						<?php echo esc_html( $m['titulo'] ); ?>
					</h1>

					<p class="text-lg txt leading-relaxed max-w-2xl mb-8">
						<?php echo esc_html( $m['resumo'] ); ?>
					</p>

					<div class="regra pt-7">
						<p class="text-[11px] font-bold uppercase tracking-widest txt-link mb-4">O que você vai encontrar</p>
						<ul class="grid sm:grid-cols-2 gap-x-8 gap-y-3">
							<?php foreach ( $m['destaques'] as $d ) : ?>
								<li class="flex items-start gap-2.5 text-sm txt leading-snug">
									<svg class="w-4 h-4 shrink-0 mt-0.5 txt-link" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
									<?php echo esc_html( $d ); ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<?php
					// Nem todo mundo quer baixar PDF. Quem prefere responder na
					// hora tem o mesmo roteiro em tela, sem formulário antes.
					$url_tela = se_url_pagina( '12-perguntas-antes-de-trocar-de-sistema' );
					if ( $url_tela ) : ?>
						<a href="<?php echo esc_url( $url_tela ); ?>" class="inline-flex items-center gap-2 text-sm font-bold txt-link hover-forte transition mt-8">
							Prefere responder agora, na tela? Faça o diagnóstico
							<span aria-hidden="true">&rarr;</span>
						</a>
					<?php endif; ?>

					<p class="text-sm txt-fraco mt-6 max-w-xl leading-relaxed">
						Escrito para quem decide: mantenedores, reitoria, direção e secretaria.
						Serve para ensino superior, educação básica e cursos livres, porque as
						doze perguntas valem para qualquer fornecedor, inclusive o seu atual.
					</p>
				</div>

				<div class="lg:col-span-5">
					<div class="sup-clara rounded-[1.75rem] p-7 md:p-8 shadow-2xl">
						<h2 class="titulo-mini text-xl txt-forte leading-snug mb-1">Receber o material</h2>
						<p class="text-[13px] txt leading-relaxed mb-6">
							O download libera na hora e o link também vai para o seu e-mail.
						</p>
						<?php se_material_form( 'pagina' ); ?>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section class="py-20">
		<div class="container mx-auto px-6 max-w-3xl text-center">
			<p class="text-[11px] font-bold uppercase tracking-widest txt-link mb-3">Depois de ler</p>
			<h2 class="titulo text-[1.8rem] md:text-4xl leading-[1.05] mb-4">
				Faça as doze perguntas para a gente também
			</h2>
			<p class="txt text-lg leading-relaxed mb-8">
				A demonstração é feita por um especialista do seu segmento, com as suas
				rotinas na tela. Se quiser, leve o roteiro impresso e vá marcando.
			</p>
			<button onclick="abrirDemo()" class="gbtn txt-forte font-bold px-8 py-4 rounded-2xl transition-all hover:-translate-y-0.5">
				Agendar demonstração
			</button>
		</div>
	</section>

</main>

<?php get_footer(); ?>
