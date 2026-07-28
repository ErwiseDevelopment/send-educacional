<?php
/**
 * Desenho do mega menu (desktop e celular) a partir de se_menu_mega().
 *
 * O painel do desktop é irmão da barra, não filho dela: assim ele ocupa a
 * largura inteira da tela sem depender do alinhamento do item que o abriu.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/** <svg> curtinho para os ícones do menu. */
function se_menu_svg( $nome, $classe = 'w-5 h-5', $estilo = '' ) {
	printf(
		'<svg class="%s" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"%s>%s</svg>',
		esc_attr( $classe ),
		$estilo ? ' style="' . esc_attr( $estilo ) . '"' : '',
		se_menu_icone( $nome ) // phpcs:ignore WordPress.Security.EscapeOutput
	);
}

/** A barra de itens de topo (só o gatilho; o painel sai depois). */
function se_menu_barra_desktop() {
	$mega = se_menu_mega();
	?>
	<nav class="hidden lg:flex items-center gap-1 min-w-0" aria-label="Navegação principal">
		<?php foreach ( $mega as $item ) :
			$id = 'mega-' . $item['chave'];

			if ( empty( $item['abas'] ) && empty( $item['colunas'] ) ) : ?>
				<a href="<?php echo esc_url( $item['url'] ); ?>" class="se-nav-link"><?php echo esc_html( $item['rotulo'] ); ?></a>
			<?php else : ?>
				<button type="button"
				        class="se-nav-link se-mega-btn"
				        data-mega="<?php echo esc_attr( $item['chave'] ); ?>"
				        aria-expanded="false"
				        aria-controls="<?php echo esc_attr( $id ); ?>">
					<?php echo esc_html( $item['rotulo'] ); ?>
					<svg class="se-chevron w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
				</button>
			<?php endif;
		endforeach; ?>
	</nav>
	<?php
}

/** Os painéis, um por item de topo que tenha abas. */
function se_menu_paineis_desktop() {
	foreach ( se_menu_mega() as $item ) {
		if ( ! empty( $item['colunas'] ) ) {
			se_menu_painel_colunas( $item );
		} elseif ( ! empty( $item['abas'] ) ) {
			se_menu_painel( $item );
		}
	}
}


/**
 * Painel simples, em colunas. Para conjuntos pequenos (os três segmentos, os
 * seis links de recursos), a estrutura de abas + trilho + rodapé só produzia
 * repetição: o mesmo destino aparecia até seis vezes no mesmo painel.
 */
function se_menu_painel_colunas( $item ) {
	$colunas = $item['colunas'];
	$n       = count( $colunas );
	?>
	<div id="<?php echo esc_attr( 'mega-' . $item['chave'] ); ?>"
	     class="se-mega-painel hidden absolute left-0 right-0 top-full"
	     data-painel="<?php echo esc_attr( $item['chave'] ); ?>">

		<div class="border-t linha bg-[#050741] shadow-[0_40px_80px_-30px_rgba(3,4,41,.9)]">
			<div class="container mx-auto px-6 max-w-7xl py-9">
				<div class="grid gap-8 <?php echo $n >= 3 ? 'md:grid-cols-3' : 'md:grid-cols-2'; ?>">
					<?php foreach ( $colunas as $col ) : ?>

						<?php if ( ! empty( $col['destaque'] ) ) : // cartão de segmento ?>
							<a href="<?php echo esc_url( $col['url'] ); ?>" class="se-mega-card group">
								<span class="se-mega-item-icone w-11 h-11 mb-4" style="color:<?php echo esc_attr( $col['cor'] ); ?>">
									<?php se_menu_svg( $col['icone'], 'w-[22px] h-[22px]' ); ?>
								</span>
								<span class="titulo-mini block txt-forte text-lg leading-tight mb-2"><?php echo esc_html( $col['titulo'] ); ?></span>
								<span class="block text-[13.5px] txt leading-relaxed mb-4"><?php echo esc_html( $col['descricao'] ); ?></span>
								<span class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-4"><?php echo esc_html( $col['publico'] ); ?></span>
								<span class="mt-auto inline-flex items-center gap-1.5 text-sm font-bold txt-link group-hover-forte transition-colors">
									<?php echo esc_html( $col['cta'] ); ?> <span aria-hidden="true">&rarr;</span>
								</span>
							</a>

						<?php else : ?>
							<div>
								<p class="text-[10px] font-bold uppercase tracking-widest txt-fraco mb-4"><?php echo esc_html( $col['titulo'] ); ?></p>
								<div class="space-y-4">
									<?php foreach ( $col['itens'] as $sub ) : ?>
										<a href="<?php echo esc_url( $sub['url'] ); ?>"
										   <?php echo ! empty( $sub['externo'] ) ? 'target="_blank" rel="noopener"' : ''; ?>
										   class="se-mega-item">
											<span class="se-mega-item-icone txt-link">
												<?php se_menu_svg( isset( $sub['icone'] ) ? $sub['icone'] : 'documento', 'w-[18px] h-[18px]' ); ?>
											</span>
											<span class="min-w-0">
												<span class="block text-sm font-semibold txt-forte leading-snug"><?php echo esc_html( $sub['nome'] ); ?></span>
												<?php if ( ! empty( $sub['desc'] ) ) : ?>
													<span class="block text-[12.5px] txt leading-snug mt-1"><?php echo esc_html( $sub['desc'] ); ?></span>
												<?php endif; ?>
											</span>
										</a>
									<?php endforeach; ?>
								</div>

								<?php if ( ! empty( $col['posts'] ) ) :
									$recentes = se_menu_posts_recentes();
									if ( $recentes ) : ?>
										<div class="mt-5 pt-4 border-t linha space-y-2.5">
											<?php foreach ( $recentes as $p ) : ?>
												<a href="<?php echo esc_url( $p['url'] ); ?>" class="block group">
													<span class="block text-[12.5px] font-semibold txt group-hover-forte transition-colors leading-snug"><?php echo esc_html( wp_trim_words( $p['titulo'], 8 ) ); ?></span>
												</a>
											<?php endforeach; ?>
										</div>
									<?php endif;
								endif; ?>
							</div>
						<?php endif; ?>

					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
}

function se_menu_painel( $item ) {
	$id = 'mega-' . $item['chave'];
	?>
	<div id="<?php echo esc_attr( $id ); ?>"
	     class="se-mega-painel hidden absolute left-0 right-0 top-full"
	     data-painel="<?php echo esc_attr( $item['chave'] ); ?>">

		<div class="border-t linha bg-[#050741] shadow-[0_40px_80px_-30px_rgba(2,6,23,.9)]">
			<div class="container mx-auto px-6 max-w-7xl py-8">
				<div class="grid grid-cols-12 gap-8">

					<!-- coluna de categorias -->
					<div class="col-span-3">
						<div class="flex flex-col gap-1" role="tablist" aria-orientation="vertical">
							<?php foreach ( $item['abas'] as $i => $aba ) : ?>
								<button type="button"
								        role="tab"
								        class="se-aba<?php echo $i === 0 ? ' se-aba-ativa' : ''; ?>"
								        data-aba="<?php echo esc_attr( $aba['chave'] ); ?>"
								        aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
								        aria-controls="pane-<?php echo esc_attr( $item['chave'] . '-' . $aba['chave'] ); ?>">
									<span class="se-aba-icone" style="color:<?php echo esc_attr( $aba['cor'] ); ?>">
										<?php se_menu_svg( $aba['icone'], 'w-5 h-5' ); ?>
									</span>
									<span class="flex-1 text-left"><?php echo esc_html( $aba['rotulo'] ); ?></span>
									<svg class="w-4 h-4 opacity-50 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
								</button>
							<?php endforeach; ?>
						</div>
					</div>

					<!-- painel central -->
					<div class="col-span-6 min-w-0">
						<?php foreach ( $item['abas'] as $i => $aba ) : ?>
							<div id="pane-<?php echo esc_attr( $item['chave'] . '-' . $aba['chave'] ); ?>"
							     role="tabpanel"
							     class="se-pane<?php echo $i === 0 ? '' : ' hidden'; ?>"
							     data-pane="<?php echo esc_attr( $aba['chave'] ); ?>">

								<div class="pb-5 mb-5 border-b linha max-w-lg">
									<h3 class="titulo-mini text-lg txt-forte"><?php echo esc_html( $aba['titulo'] ); ?></h3>
									<p class="text-sm txt leading-relaxed mt-1.5"><?php echo esc_html( $aba['descricao'] ); ?></p>
								</div>

								<div class="grid sm:grid-cols-2 gap-x-8 gap-y-5">
									<?php foreach ( $aba['itens'] as $sub ) : ?>
										<a href="<?php echo esc_url( $sub['url'] ); ?>"
										   <?php echo ! empty( $sub['externo'] ) ? 'target="_blank" rel="noopener"' : ''; ?>
										   class="se-mega-item">
											<span class="se-mega-item-icone" style="color:<?php echo esc_attr( $aba['cor'] ); ?>">
												<?php se_menu_svg( isset( $sub['icone'] ) ? $sub['icone'] : 'documento', 'w-[18px] h-[18px]' ); ?>
											</span>
											<span class="min-w-0">
												<span class="block text-sm font-semibold txt-forte leading-snug"><?php echo esc_html( $sub['nome'] ); ?></span>
												<?php if ( ! empty( $sub['desc'] ) ) : ?>
													<span class="block text-[12.5px] txt leading-snug mt-1"><?php echo esc_html( $sub['desc'] ); ?></span>
												<?php endif; ?>
											</span>
										</a>
									<?php endforeach; ?>
								</div>

								<?php
								if ( ! empty( $aba['posts'] ) ) {
									$recentes = se_menu_posts_recentes();
									if ( $recentes ) : ?>
										<div class="mt-6 pt-5 border-t linha">
											<p class="text-[10px] font-bold uppercase tracking-widest txt-fraco mb-3">Publicados agora</p>
											<div class="grid sm:grid-cols-3 gap-3">
												<?php foreach ( $recentes as $p ) : ?>
													<a href="<?php echo esc_url( $p['url'] ); ?>" class="se-mega-post">
														<?php if ( $p['categoria'] ) : ?>
															<span class="block text-[9px] font-bold uppercase tracking-wider txt-link mb-1.5"><?php echo esc_html( $p['categoria'] ); ?></span>
														<?php endif; ?>
														<span class="block text-[12.5px] font-semibold txt-forte leading-snug"><?php echo esc_html( wp_trim_words( $p['titulo'], 9 ) ); ?></span>
													</a>
												<?php endforeach; ?>
											</div>
										</div>
									<?php endif;
								}

								if ( ! empty( $aba['rodape'] ) ) : ?>
									<p class="mt-6 text-[11px] uppercase tracking-widest font-bold txt-fraco"><?php echo esc_html( $aba['rodape'] ); ?></p>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>

					<!-- trilho de destaques -->
					<div class="col-span-3 border-l linha pl-8">
						<?php foreach ( $item['trilho'] as $bloco ) : ?>
							<?php if ( ! empty( $bloco['card'] ) ) : ?>
								<div class="rounded-2xl border linha bg-bloco p-5 mb-4 last:mb-0">
									<p class="text-sm font-bold txt-forte leading-snug"><?php echo esc_html( $bloco['titulo'] ); ?></p>
									<p class="text-[12.5px] txt leading-relaxed mt-1.5 mb-4"><?php echo esc_html( $bloco['texto'] ); ?></p>
									<button type="button" onclick="abrirDemo()" class="w-full gbtn txt-forte text-[12.5px] font-bold px-4 py-2.5 rounded-xl transition-transform hover:-translate-y-0.5">
										<?php echo esc_html( $bloco['cta'] ); ?>
									</button>
								</div>
							<?php else : ?>
								<div class="mb-6 last:mb-0">
									<p class="text-[10px] font-bold uppercase tracking-widest txt-fraco mb-3"><?php echo esc_html( $bloco['titulo'] ); ?></p>
									<?php foreach ( $bloco['links'] as $l ) : ?>
										<a href="<?php echo esc_url( $l[1] ); ?>" class="group flex items-center justify-between gap-2 py-2 text-sm font-semibold txt hover-forte transition-colors">
											<?php echo esc_html( $l[0] ); ?>
											<svg class="w-3.5 h-3.5 opacity-40 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
										</a>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>

				</div>
			</div>

			<?php if ( ! empty( $item['rodape'] ) ) : ?>
				<div class="border-t linha bg-bloco">
					<div class="container mx-auto px-6 max-w-7xl py-3.5 flex flex-wrap items-center gap-x-10 gap-y-2">
						<?php foreach ( $item['rodape'] as $r ) :
							$eh_demo = ( $r[1] === '#demo' );
							$tag     = $eh_demo ? 'button' : 'a';
							printf(
								'<%1$s %2$s class="inline-flex items-center gap-2 text-[12.5px] font-bold txt hover-forte transition-colors">',
								$tag,
								$eh_demo ? 'type="button" onclick="abrirDemo()"' : 'href="' . esc_url( $r[1] ) . '"'
							);
							se_menu_svg( $r[2], 'w-4 h-4 opacity-60' );
							echo esc_html( $r[0] );
							printf( '</%s>', $tag );
						endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php
}

/** Acordeão do celular, com os mesmos dados. */
function se_menu_mobile() {
	?>
	<nav class="flex flex-col" aria-label="Navegação principal (celular)">
		<?php foreach ( se_menu_mega() as $item ) :
			if ( ! empty( $item['colunas'] ) ) : ?>
				<div class="border-b linha">
					<button type="button" class="se-acc-btn w-full flex items-center justify-between py-3.5 text-sm font-bold uppercase tracking-wide txt-forte" aria-expanded="false">
						<?php echo esc_html( $item['rotulo'] ); ?>
						<svg class="se-chevron w-4 h-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
					</button>
					<div class="se-acc-painel hidden pb-4">
						<?php foreach ( $item['colunas'] as $col ) : ?>
							<?php if ( ! empty( $col['destaque'] ) ) : ?>
								<a href="<?php echo esc_url( $col['url'] ); ?>" class="flex items-center gap-2.5 py-2.5">
									<span style="color:<?php echo esc_attr( $col['cor'] ); ?>"><?php se_menu_svg( $col['icone'], 'w-[18px] h-[18px]' ); ?></span>
									<span class="text-sm font-bold txt-forte"><?php echo esc_html( $col['titulo'] ); ?></span>
								</a>
							<?php else : ?>
								<div class="mb-3 last:mb-0">
									<p class="text-[10px] font-bold uppercase tracking-widest txt-fraco mb-1.5 mt-2"><?php echo esc_html( $col['titulo'] ); ?></p>
									<?php foreach ( $col['itens'] as $sub ) : ?>
										<a href="<?php echo esc_url( $sub['url'] ); ?>"
										   <?php echo ! empty( $sub['externo'] ) ? 'target="_blank" rel="noopener"' : ''; ?>
										   class="block py-1.5 text-[13px] txt hover-forte transition-colors"><?php echo esc_html( $sub['nome'] ); ?></a>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
				<?php continue;
			endif;

			if ( empty( $item['abas'] ) ) : ?>
				<a href="<?php echo esc_url( $item['url'] ); ?>" class="py-3 text-sm font-bold uppercase tracking-wide txt-forte hover-forte border-b linha"><?php echo esc_html( $item['rotulo'] ); ?></a>
				<?php continue;
			endif; ?>

			<div class="border-b linha">
				<button type="button" class="se-acc-btn w-full flex items-center justify-between py-3.5 text-sm font-bold uppercase tracking-wide txt-forte" aria-expanded="false">
					<?php echo esc_html( $item['rotulo'] ); ?>
					<svg class="se-chevron w-4 h-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
				</button>

				<div class="se-acc-painel hidden pb-4">
					<?php foreach ( $item['abas'] as $aba ) : ?>
						<div class="mb-4 last:mb-0">
							<a href="<?php echo esc_url( $aba['url'] ); ?>" class="flex items-center gap-2.5 mb-2.5">
								<span style="color:<?php echo esc_attr( $aba['cor'] ); ?>"><?php se_menu_svg( $aba['icone'], 'w-[18px] h-[18px]' ); ?></span>
								<span class="text-sm font-bold txt-forte"><?php echo esc_html( $aba['rotulo'] ); ?></span>
							</a>
							<div class="pl-[30px] flex flex-col">
								<?php foreach ( $aba['itens'] as $sub ) : ?>
									<a href="<?php echo esc_url( $sub['url'] ); ?>"
									   <?php echo ! empty( $sub['externo'] ) ? 'target="_blank" rel="noopener"' : ''; ?>
									   class="py-1.5 text-[13px] txt hover-forte transition-colors"><?php echo esc_html( $sub['nome'] ); ?></a>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</nav>
	<?php
}
