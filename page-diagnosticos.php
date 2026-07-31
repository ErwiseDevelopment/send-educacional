<?php
/**
 * Índice dos diagnósticos.
 *
 * O menu tinha uma entrada por diagnóstico e ficou grande demais. Aqui eles
 * moram todos juntos, e o menu volta a ter um link só. O destaque na home
 * continua, porque lá o visitante não está procurando, está passando.
 *
 * Template ligado ao slug diagnosticos (ver inc/paginas.php).
 */

get_header();
$se_diags = se_ferramentas();
?>

<main>

	<section class="sup-escura se-artigo-topo pt-28 pb-14" style="background:linear-gradient(135deg,#1f3184,#030429)">
		<span class="se-capa-grade" aria-hidden="true"></span>
		<div class="container mx-auto px-6 max-w-4xl text-center relative z-10">
			<span class="se-artigo-selo inline-block px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-widest">
				Gratuito, sem falar com ninguém
			</span>
			<h1 class="titulo text-[2rem] md:text-[2.75rem] leading-[1.05] txt-forte mt-5 mb-4">
				Diagnósticos
			</h1>
			<p class="text-lg txt leading-relaxed max-w-2xl mx-auto">
				Quatro diagnósticos sobre a operação da sua instituição. Você responde em
				dois minutos e recebe o resultado com o que fazer em cada ponto que ficar
				em aberto.
			</p>
		</div>
	</section>

	<section class="py-16">
		<div class="container mx-auto px-6 max-w-5xl">

			<div class="grid md:grid-cols-2 gap-6">
				<?php foreach ( $se_diags as $slug => $f ) :
					$url = se_ferramenta_url( $slug );
					if ( ! $url ) { continue; }
					$seg  = $f['segmento'] ? se_segmento( $f['segmento'] ) : null;
					$cor  = $seg ? $seg['cor_bloco'] : '#1f3184';
					$qtd  = $f['tipo'] === 'calculadora' ? '4 campos' : count( $f['perguntas'] ) . ' perguntas';
					?>
					<a href="<?php echo esc_url( $url ); ?>" class="glass glass-hover rounded-[1.5rem] overflow-hidden flex flex-col group">
						<span class="block h-2" style="background:<?php echo esc_attr( $cor ); ?>"></span>
						<span class="p-7 flex flex-col flex-grow">
							<span class="flex items-center gap-2 mb-3">
								<span class="text-[10px] font-bold uppercase tracking-widest txt-link">
									<?php echo $seg ? esc_html( $seg['curto'] ) : 'Qualquer segmento'; ?>
								</span>
								<span class="txt-fraco text-[10px]">·</span>
								<span class="text-[10px] font-bold uppercase tracking-widest txt-fraco"><?php echo esc_html( $qtd ); ?></span>
							</span>

							<span class="block titulo-mini text-xl txt-forte leading-snug mb-2 group-hover-link transition-colors">
								<?php echo esc_html( $f['nome'] ); ?>
							</span>
							<span class="block text-sm txt leading-relaxed mb-5"><?php echo esc_html( $f['chamada'] ); ?></span>

							<span class="mt-auto inline-flex items-center gap-1.5 text-sm font-bold txt-link">
								Fazer o diagnóstico <span aria-hidden="true">&rarr;</span>
							</span>
						</span>
					</a>
				<?php endforeach; ?>
			</div>

			<?php
			// O guia em PDF fica ao lado dos diagnósticos: é o material que a
			// pessoa leva para a reunião depois de descobrir onde está o buraco.
			$se_mat_url = se_url_pagina( 'material-trocar-de-sistema' );
			if ( $se_mat_url ) :
				$se_mat = se_material();
				?>
				<a href="<?php echo esc_url( $se_mat_url ); ?>" class="bloco rounded-2xl p-6 mt-6 flex items-start gap-5 transition-colors hover:border-blue-400">
					<span class="marca-icone w-12 h-12 shrink-0">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h9l5 5v11a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h8M8 16h5"></path></svg>
					</span>
					<span>
						<span class="block text-[10px] font-bold uppercase tracking-widest txt-fraco mb-1.5">Material em PDF</span>
						<span class="block titulo-mini text-lg txt-forte leading-snug mb-1.5"><?php echo esc_html( $se_mat['titulo'] ); ?></span>
						<span class="block text-sm txt leading-snug"><?php echo esc_html( $se_mat['chamada'] ); ?></span>
					</span>
				</a>
			<?php endif; ?>

			<div class="regra mt-12 pt-8 max-w-2xl">
				<p class="text-[11px] font-bold uppercase tracking-widest txt-link mb-2">Como funciona</p>
				<p class="txt leading-relaxed">
					Nenhum diagnóstico julga a sua instituição, e nenhum compara a Send com o
					seu fornecedor atual. Eles só descrevem a rotina de hoje e mostram o que
					existiria pronto no lugar de cada coisa que hoje é feita à mão. Se nada
					fizer sentido para você, o resultado ainda serve de registro do que já
					está resolvido.
				</p>
			</div>

		</div>
	</section>

</main>

<?php get_footer(); ?>
