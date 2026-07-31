<?php
/**
 * Desenho das ferramentas de diagnóstico (ver inc/ferramentas.php).
 *
 * Uma pergunta por vez, de propósito: dez perguntas empilhadas numa página só
 * parecem formulário e são abandonadas na terceira. Uma por vez, com barra de
 * progresso, é a mesma quantidade de trabalho e termina.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/** Cabeçalho comum das três páginas. */
function se_ferramenta_topo( $f ) {
	$seg = $f['segmento'] ? se_segmento( $f['segmento'] ) : null;
	$cor = $seg ? $seg['cor_bloco'] : '#1f3184';
	?>
	<section class="sup-escura se-artigo-topo pt-28 pb-14"
	         style="background:linear-gradient(135deg,<?php echo esc_attr( $cor ); ?>,#030429)">
		<span class="se-capa-grade" aria-hidden="true"></span>
		<div class="container mx-auto px-6 max-w-4xl text-center relative z-10">
			<span class="se-artigo-selo inline-block px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-widest">
				Diagnóstico gratuito<?php echo $seg ? ' · ' . esc_html( $seg['curto'] ) : ' · qualquer segmento'; ?>
			</span>
			<h1 class="titulo text-[2rem] md:text-[2.75rem] leading-[1.05] txt-forte mt-5 mb-4">
				<?php echo esc_html( $f['titulo'] ); ?>
			</h1>
			<p class="text-lg txt leading-relaxed max-w-2xl mx-auto">
				<?php echo esc_html( $f['chamada'] ); ?>
			</p>
		</div>
	</section>
	<?php
}

/** Quiz: intro, perguntas uma a uma e resultado. */
function se_ferramenta_quiz( $slug ) {
	$f = se_ferramenta( $slug );
	if ( ! $f ) {
		return;
	}

	se_ferramenta_topo( $f );
	?>
	<section class="py-14">
		<div class="container mx-auto px-6 max-w-3xl">
			<div class="se-fer glass rounded-[1.75rem] p-7 md:p-10 cardring"
			     data-ferramenta="<?php echo esc_attr( $slug ); ?>"
			     data-dados="<?php echo esc_attr( wp_json_encode( array(
					'nome'    => $f['nome'],
					'rotulos' => $f['rotulos'],
					'total'   => count( $f['perguntas'] ),
					'faixas'  => $f['faixas'],
					'recomendacoes' => $f['recomendacoes'],
					// Quantas recomendações cabem na tela antes de cansar. O
					// diagnóstico do sistema atual mostra todas, porque ali a
					// lista completa é o conteúdo.
					'limite'        => isset( $f['limite'] ) ? (int) $f['limite'] : 3,
					'rotuloRecs'    => isset( $f['rotulo_recs'] ) ? $f['rotulo_recs'] : '',
					'perguntas'     => $f['perguntas'],
			     ) ) ); ?>">

				<?php // Passo 1: o convite. Explica o porquê antes de pedir a primeira resposta. ?>
				<div class="se-fer-inicio">
					<p class="txt leading-relaxed"><?php echo esc_html( $f['resumo'] ); ?></p>
					<button type="button" class="se-fer-comecar gbtn txt-forte font-bold px-7 py-3.5 rounded-xl mt-7 transition-all hover:-translate-y-0.5">
						Começar o diagnóstico
					</button>
					<p class="txt-fraco text-[12px] mt-3">
						<?php echo (int) count( $f['perguntas'] ); ?> perguntas, cerca de dois minutos. Sem cadastro para ver o resultado.
					</p>
				</div>

				<?php // Passo 2: uma pergunta por vez. ?>
				<div class="se-fer-jogo hidden">
					<div class="flex items-center justify-between mb-2">
						<span class="text-[11px] font-bold uppercase tracking-widest txt-fraco">
							Pergunta <span class="se-fer-atual">1</span> de <?php echo (int) count( $f['perguntas'] ); ?>
						</span>
						<button type="button" class="se-fer-voltar text-[12px] font-bold txt-link hover-forte transition hidden">Voltar</button>
					</div>
					<div class="se-fer-barra"><span class="se-fer-barra-fill"></span></div>

					<p class="se-fer-pergunta text-xl md:text-2xl titulo-mini txt-forte leading-snug mt-7 mb-7"></p>

					<div class="grid sm:grid-cols-2 gap-3">
						<button type="button" class="se-fer-op" data-valor="1"><?php echo esc_html( $f['rotulos'][0] ); ?></button>
						<button type="button" class="se-fer-op" data-valor="0"><?php echo esc_html( $f['rotulos'][1] ); ?></button>
					</div>
				</div>

				<?php // Passo 3: resultado, antes de pedir qualquer dado. ?>
				<div class="se-fer-resultado hidden">
					<div class="flex items-start gap-5">
						<div class="se-fer-nota shrink-0">
							<span class="se-fer-nota-num">0</span>
							<span class="se-fer-nota-de">de <?php echo (int) count( $f['perguntas'] ); ?></span>
						</div>
						<div>
							<p class="text-[11px] font-bold uppercase tracking-widest txt-link mb-1.5">Pontos em aberto</p>
							<h2 class="se-fer-faixa-titulo titulo text-2xl md:text-3xl leading-[1.1] txt-forte mb-3"></h2>
							<p class="se-fer-faixa-texto txt leading-relaxed"></p>
						</div>
					</div>

					<div class="se-fer-recs mt-9"></div>

					<?php
					// O arquivo vai DIRETO, sem passar pela página com
					// formulário. Quem acabou de responder doze perguntas já
					// pagou o pedágio; pedir cadastro de novo para entregar o
					// mesmo conteúdo é cobrar duas vezes pela mesma coisa.
					if ( ! empty( $f['material'] ) && function_exists( 'se_material' ) ) :
						$m_irmao = se_material(); ?>
							<a href="<?php echo esc_url( $m_irmao['arquivo'] ); ?>" download class="bloco rounded-2xl p-5 mt-8 flex items-start gap-4 transition-colors hover:border-blue-400">
								<span class="marca-icone w-11 h-11 shrink-0">
									<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h9l5 5v11a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h8M8 16h5"></path></svg>
								</span>
								<span>
									<span class="block text-sm font-bold txt-forte mb-1">Leve as doze impressas para a reunião</span>
									<span class="block text-[13px] txt leading-relaxed">
										O guia em PDF traz cada pergunta com a resposta que tranquiliza, o sinal
										de alerta e uma página de checklist para ir marcando na conversa.
									</span>
									<span class="inline-flex items-center gap-1.5 text-[13px] font-bold txt-link mt-2">
										Baixar o PDF agora, sem formulário <span aria-hidden="true">&darr;</span>
									</span>
								</span>
							</a>
					<?php endif; ?>

					<?php se_ferramenta_form( $slug, $f['segmento'] === '' ); ?>

					<button type="button" class="se-fer-refazer text-[12px] font-bold txt-fraco hover-forte transition mt-6">
						Refazer o diagnóstico
					</button>
				</div>

			</div>
		</div>
	</section>
	<?php
}

/**
 * Calculadora de inadimplência.
 *
 * Não fala em preço do Send em momento nenhum: os quatro campos são da
 * instituição e o resultado é o custo dela. A referência de queda é a medida
 * no cliente em produção, rotulada como referência e não como promessa.
 */
function se_ferramenta_calculadora( $slug ) {
	$f = se_ferramenta( $slug );
	if ( ! $f ) {
		return;
	}

	se_ferramenta_topo( $f );
	?>
	<section class="py-14">
		<div class="container mx-auto px-6 max-w-5xl">
			<div class="se-fer se-calc glass rounded-[1.75rem] p-7 md:p-10 cardring" data-ferramenta="<?php echo esc_attr( $slug ); ?>">
				<p class="txt leading-relaxed max-w-2xl"><?php echo esc_html( $f['resumo'] ); ?></p>

				<div class="grid lg:grid-cols-2 gap-10 mt-8">

					<div class="space-y-5">
						<div>
							<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="calc-alunos">Alunos ativos</label>
							<input type="number" id="calc-alunos" min="1" step="1" value="500" class="se-campo w-full rounded-xl px-4 py-3 focus:outline-none transition-colors">
						</div>
						<div>
							<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="calc-ticket">Mensalidade média cobrada, em reais</label>
							<input type="number" id="calc-ticket" min="1" step="10" value="900" class="se-campo w-full rounded-xl px-4 py-3 focus:outline-none transition-colors">
						</div>
						<div>
							<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="calc-taxa">
								Inadimplência hoje: <span id="calc-taxa-val" class="txt-forte">8</span>%
							</label>
							<input type="range" id="calc-taxa" min="1" max="40" step="1" value="8" class="se-range w-full">
						</div>
						<div>
							<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="calc-dias">
								Atraso médio: <span id="calc-dias-val" class="txt-forte">45</span> dias
							</label>
							<input type="range" id="calc-dias" min="5" max="180" step="5" value="45" class="se-range w-full">
						</div>
						<p class="txt-fraco text-[12px] leading-snug">
							Nada aqui é enviado para a gente enquanto você não pedir. A conta roda
							no seu navegador.
						</p>
					</div>

					<div>
						<div class="sup-escura rounded-2xl p-7" style="background:linear-gradient(135deg,#1f3184,#080b6c)">
							<p class="text-[11px] font-bold uppercase tracking-widest txt-fraco">Parado por mês</p>
							<p class="numero text-4xl md:text-5xl txt-forte leading-none mt-1.5" id="calc-mes">R$ 0</p>

							<div class="regra mt-6 pt-6">
								<p class="text-[11px] font-bold uppercase tracking-widest txt-fraco">No ano</p>
								<p class="numero text-3xl txt-forte leading-none mt-1.5" id="calc-ano">R$ 0</p>
							</div>

							<div class="regra mt-6 pt-6">
								<p class="text-[11px] font-bold uppercase tracking-widest txt-fraco">Equivale a</p>
								<p class="text-sm txt mt-1.5 leading-relaxed" id="calc-equivale"></p>
							</div>
						</div>

						<div class="bloco rounded-2xl p-6 mt-4">
							<p class="text-[11px] font-bold uppercase tracking-widest txt-link mb-2">Uma referência, não uma promessa</p>
							<p class="text-sm txt leading-relaxed">
								Na instituição de 5.000 alunos que roda o Send Educacional em produção,
								a inadimplência caiu <span class="txt-forte font-bold">45%</span> depois que
								a régua de cobrança passou a viver no mesmo sistema do acadêmico.
								Na sua conta, uma queda desse tamanho seria
								<span class="txt-forte font-bold" id="calc-recup">R$ 0</span> por ano.
							</p>
							<p class="txt-fraco text-[12px] mt-3 leading-snug">
								É o resultado de uma instituição, não uma média de mercado, e depende da
								política de cobrança de cada uma.
							</p>
						</div>
					</div>
				</div>

				<?php se_ferramenta_form( $slug, true ); ?>
			</div>
		</div>
	</section>
	<?php
}

/** Rodapé comum: as outras ferramentas e o caminho para a demonstração. */
function se_ferramenta_rodape( $slug_atual ) {
	$outras = array_filter( se_ferramentas(), function ( $k ) use ( $slug_atual ) {
		return $k !== $slug_atual;
	}, ARRAY_FILTER_USE_KEY );

	if ( ! $outras ) {
		return;
	}
	?>
	<section class="py-16 regra">
		<div class="container mx-auto px-6 max-w-5xl">
			<p class="text-[11px] font-bold uppercase tracking-widest txt-link mb-2">Outros diagnósticos</p>
			<h2 class="titulo text-[1.7rem] md:text-3xl leading-[1.06] mb-8">Continue pelo que dói mais</h2>

			<div class="grid md:grid-cols-2 gap-5">
				<?php foreach ( $outras as $slug => $f ) :
					$url = se_ferramenta_url( $slug );
					if ( ! $url ) { continue; }
					$seg = $f['segmento'] ? se_segmento( $f['segmento'] ) : null;
					?>
					<a href="<?php echo esc_url( $url ); ?>" class="glass glass-hover rounded-2xl p-6 block">
						<span class="text-[10px] font-bold uppercase tracking-widest txt-link">
							<?php echo $seg ? esc_html( $seg['curto'] ) : 'Qualquer segmento'; ?>
						</span>
						<h3 class="titulo-mini text-lg txt-forte mt-2 mb-1.5"><?php echo esc_html( $f['nome'] ); ?></h3>
						<p class="text-sm txt leading-snug"><?php echo esc_html( $f['chamada'] ); ?></p>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php
}

/**
 * Carrega o JS só nas páginas que têm ferramenta.
 *
 * São três páginas num site de vinte e uma: não faz sentido o resto do site
 * baixar o motor do diagnóstico.
 */
function se_ferramentas_assets() {
	if ( ! is_page() ) {
		return;
	}

	global $post;
	if ( ! $post || ! se_ferramenta( $post->post_name ) ) {
		return;
	}

	$ver = wp_get_theme()->get( 'Version' );
	wp_enqueue_script(
		'se-ferramentas',
		get_template_directory_uri() . '/js/se-ferramentas.js',
		array(), $ver, true
	);
	wp_add_inline_script(
		'se-ferramentas',
		'window.SE_FER=' . wp_json_encode( array( 'ajax' => admin_url( 'admin-ajax.php' ) ) ) . ';',
		'before'
	);
}
add_action( 'wp_enqueue_scripts', 'se_ferramentas_assets' );

/**
 * Bloco das ferramentas na home.
 *
 * Elas só existiam no menu, em Recursos, atrás de dois cliques. São a coisa
 * mais útil que o site oferece para quem ainda não quer falar com ninguém,
 * então precisam estar no caminho de quem só rola a home.
 */
function se_bloco_ferramentas() {
	$lista = array();
	foreach ( se_ferramentas() as $slug => $f ) {
		$url = se_ferramenta_url( $slug );
		if ( $url ) {
			$f['url']  = $url;
			$f['slug'] = $slug;
			$lista[]   = $f;
		}
	}

	if ( ! $lista ) {
		return;
	}
	?>
	<section class="relative z-10 py-20">
		<div class="container mx-auto px-6 max-w-6xl">

			<div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-10 reveal">
				<div class="max-w-2xl">
					<span class="txt-link font-bold tracking-widest uppercase text-xs">Antes de falar com a gente</span>
					<h2 class="titulo text-[2rem] md:text-4xl leading-[1.04] mt-4">
						Descubra sozinho onde está o seu problema
					</h2>
					<p class="txt text-lg mt-4 leading-relaxed">
						Quatro diagnósticos gratuitos, respondidos em dois minutos. O resultado
						aparece na hora, sem cadastro, e serve mesmo que você nunca fale com a Send.
					</p>
				</div>
			</div>

			<div class="grid md:grid-cols-2 gap-5 reveal">
				<?php foreach ( $lista as $f ) :
					$seg = $f['segmento'] ? se_segmento( $f['segmento'] ) : null;
					?>
					<a href="<?php echo esc_url( $f['url'] ); ?>" class="glass glass-hover rounded-2xl p-6 md:p-7 flex items-start gap-5 group">
						<span class="marca-icone w-12 h-12 shrink-0">
							<?php if ( $f['tipo'] === 'calculadora' ) : ?>
								<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6M9 11h.01M12 11h.01M15 11h.01M9 15h.01M12 15h.01M15 15h.01M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"></path></svg>
							<?php else : ?>
								<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M4 6a2 2 0 012-2h12a2 2 0 012 2v13a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"></path></svg>
							<?php endif; ?>
						</span>
						<span class="min-w-0">
							<span class="block text-[10px] font-bold uppercase tracking-widest txt-link mb-1.5">
								<?php echo $seg ? esc_html( $seg['curto'] ) : 'Qualquer segmento'; ?>
							</span>
							<span class="block titulo-mini text-lg txt-forte leading-snug mb-1.5 group-hover-link transition-colors">
								<?php echo esc_html( $f['nome'] ); ?>
							</span>
							<span class="block text-sm txt leading-snug"><?php echo esc_html( $f['chamada'] ); ?></span>
						</span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php
}
