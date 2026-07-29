<?php
/**
 * "Qual é o seu desafio hoje?" — busca sobre o catálogo de módulos.
 *
 * A ideia veio do site do RD Station, onde o campo é praticamente uma busca
 * decorativa. Aqui ele tem substância: o tema já descreve mais de 350
 * funcionalidades reais, divididas por segmento (ver inc/modulos.php). Então
 * quem digita "rematrícula", "inadimplência" ou "certificado" recebe de volta
 * qual módulo resolve aquilo, em qual segmento, com o link para a página.
 *
 * O índice é montado no servidor e vai inteiro para a página: são poucos
 * quilobytes depois do gzip, e evita uma ida ao servidor a cada tecla.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Achata o catálogo dos três segmentos num índice de busca.
 *
 * Uma mesma funcionalidade pode existir em mais de um segmento (cobrança
 * existe nos três). Nesse caso ela aparece uma vez só, guardando em quais
 * segmentos está, para o resultado não repetir três linhas iguais.
 */
function se_busca_indice() {
	static $cache = null;
	if ( $cache !== null ) {
		return $cache;
	}

	$segmentos = se_segmentos();
	$por_texto = array();

	foreach ( $segmentos as $slug => $seg ) {
		foreach ( se_modulos_segmento( $slug ) as $mod ) {
			foreach ( $mod['itens'] as $item ) {
				$chave = se_busca_normaliza( $item );

				if ( ! isset( $por_texto[ $chave ] ) ) {
					$por_texto[ $chave ] = array(
						't' => $item,          // texto da funcionalidade
						'm' => $mod['nome'],   // módulo que a contém
						's' => array(),        // segmentos em que existe
					);
				}

				$por_texto[ $chave ]['s'][] = $slug;
			}
		}
	}

	$cache = array_values( $por_texto );
	return $cache;
}

/** Minúsculas sem acento, para a busca não depender de o visitante acentuar. */
function se_busca_normaliza( $texto ) {
	$texto = mb_strtolower( (string) $texto, 'UTF-8' );
	$de    = array( 'á','à','â','ã','ä','é','ê','ë','í','ï','ó','ô','õ','ö','ú','ü','ç','ñ' );
	$para  = array( 'a','a','a','a','a','e','e','e','i','i','o','o','o','o','u','u','c','n' );
	return str_replace( $de, $para, $texto );
}

/** Os atalhos que aparecem embaixo do campo, um por segmento. */
function se_busca_sugestoes() {
	return array(
		'rematrícula em lote',
		'inadimplência',
		'certificado',
		'Censo',
		'boletim',
		'evasão',
		'diploma digital',
		'assinatura de contrato',
	);
}

/**
 * O bloco inteiro: campo, sugestões e área de resultado.
 */
function se_bloco_busca_desafio() {
	$segmentos = se_segmentos();
	$meta      = array();
	foreach ( $segmentos as $slug => $s ) {
		$meta[ $slug ] = array(
			'n' => $s['curto'],
			// O bloco vive em superfície clara: aqui vale a variante escura da
			// cor do segmento. A 'cor' normal foi calculada para fundo escuro e
			// dava 3.07 de contraste no selo, abaixo do mínimo para texto miúdo.
			'c' => $s['cor_clara'],
			'u' => se_segmento_url( $slug ) . '#catalogo',
		);
	}
	?>
	<?php // O id é o destino do buscador que vive no menu (ver se_menu_busca_desafio). ?>
	<section id="desafio" class="relative z-10 py-20 scroll-mt-28">
		<div class="container mx-auto px-6 max-w-4xl">
			<div class="glass rounded-[2rem] p-8 md:p-12 cardring reveal">

				<div class="text-center mb-8">
					<h2 class="titulo text-[2rem] md:text-[2.75rem] leading-[1.05] mb-3">Qual é o seu desafio hoje?</h2>
					<p class="txt text-lg leading-relaxed max-w-xl mx-auto">
						Escreva o que trava a sua operação. A gente mostra qual módulo resolve e em qual segmento ele está configurado.
					</p>
				</div>

				<div class="relative max-w-2xl mx-auto">
					<label for="se-busca" class="sr-only">Descreva o seu desafio</label>
					<div class="flex flex-col sm:flex-row gap-2.5">
						<div class="relative flex-1">
							<svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 txt-fraco pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.2-5.2M17 10a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
							<input type="search" id="se-busca" autocomplete="off"
							       placeholder="Ex.: rematrícula, inadimplência, certificado"
							       class="se-campo w-full rounded-2xl pl-12 pr-4 py-4 focus:outline-none transition-colors">
						</div>
						<button type="button" id="se-busca-demo" onclick="abrirDemo()" class="gbtn txt-forte font-bold px-7 py-4 rounded-2xl transition-all hover:-translate-y-0.5 shrink-0">
							Falar com um especialista
						</button>
					</div>

					<div class="flex flex-wrap items-center gap-2 mt-4" id="se-busca-sugestoes">
						<span class="text-[11px] font-bold uppercase tracking-widest txt-fraco mr-1">Comuns:</span>
						<?php foreach ( se_busca_sugestoes() as $s ) : ?>
							<button type="button" class="se-chip" data-termo="<?php echo esc_attr( $s ); ?>"><?php echo esc_html( $s ); ?></button>
						<?php endforeach; ?>
					</div>

					<div id="se-busca-resultado" class="mt-6 hidden" aria-live="polite"></div>
				</div>

			</div>
		</div>
	</section>

	<script>
	(function () {
		function normaliza(t) {
			return t.toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '');
		}

		var INDICE = <?php echo wp_json_encode( se_busca_indice() ); ?>;
		// O texto de busca e montado aqui, e nao no servidor: mandar a versao
		// normalizada junto dobrava o tamanho do indice na pagina.
		INDICE.forEach(function (it) {
			it.bt = normaliza(it.t);  // texto da funcionalidade
			it.bm = normaliza(it.m);  // nome do modulo
		});
		var SEG    = <?php echo wp_json_encode( $meta ); ?>;

		var campo  = document.getElementById('se-busca');
		var saida  = document.getElementById('se-busca-resultado');
		if (!campo || !saida) return;

		function buscar(termo) {
			var q = normaliza(termo).trim();
			if (q.length < 3) return [];

			// Ordem de relevancia: quem casa no comeco de uma palavra da propria
			// funcionalidade vem antes de quem casa no meio, e ambos vem antes de
			// quem so casou pelo nome do modulo. Sem isso, buscar "certificado"
			// devolvia primeiro qualquer item do modulo "Certificado e validacao".
			function peso(it) {
				var p = it.bt.indexOf(q);
				if (p === 0 || (p > 0 && it.bt[p - 1] === ' ')) return 0;
				if (p > 0) return 1;
				var m = it.bm.indexOf(q);
				if (m === 0 || (m > 0 && it.bm[m - 1] === ' ')) return 2;
				if (m > 0) return 3;
				return -1;
			}

			var achados = [];
			for (var i = 0; i < INDICE.length; i++) {
				var w = peso(INDICE[i]);
				if (w >= 0) achados.push({ item: INDICE[i], peso: w });
			}
			achados.sort(function (a, b) { return a.peso - b.peso; });

			// Intercala por segmento. O ensino superior tem quase o dobro de
			// itens do que os outros dois, entao sem isto ele tomava as seis
			// linhas e um diretor de escola nunca via a resposta dele.
			var filas = {};
			achados.forEach(function (a) {
				var seg = a.item.s[0];
				(filas[seg] = filas[seg] || []).push(a.item);
			});

			var chaves = Object.keys(filas), saida = [], i = 0;
			while (saida.length < 6 && chaves.length) {
				var k = chaves[i % chaves.length];
				if (filas[k].length) {
					saida.push(filas[k].shift());
					i++;
				} else {
					chaves.splice(i % chaves.length, 1);
				}
			}
			return saida;
		}

		function selo(slug) {
			var s = SEG[slug];
			if (!s) return '';
			return '<a href="' + s.u + '" class="se-selo" style="color:' + s.c + ';border-color:' + s.c + '55;background:' + s.c + '1f">' + s.n + '</a>';
		}

		function desenhar(termo) {
			var r = buscar(termo);

			if (normaliza(termo).trim().length < 3) {
				saida.classList.add('hidden');
				saida.innerHTML = '';
				return;
			}

			if (!r.length) {
				saida.classList.remove('hidden');
				saida.innerHTML =
					'<div class="regra pt-6 text-center">' +
					'<p class="txt">Não achamos nada com <strong class="txt-forte">' +
					termo.replace(/[<>&]/g, '') + '</strong> no catálogo.</p>' +
					'<p class="txt-fraco text-sm mt-2">Pode ser que exista com outro nome. Conte o caso para um especialista e a gente confere junto.</p>' +
					'<button type="button" onclick="abrirDemo()" class="mt-5 gbtn txt-forte font-bold px-6 py-3 rounded-xl text-sm">Descrever o meu caso</button>' +
					'</div>';
				return;
			}

			var html = '<div class="regra pt-6"><p class="text-[11px] font-bold uppercase tracking-widest txt-fraco mb-4">' +
				r.length + (r.length === 1 ? ' resultado' : ' resultados') + ' no catálogo</p><div class="space-y-3">';

			r.forEach(function (it) {
				var selos = it.s.map(selo).join('');
				html += '<div class="se-resultado">' +
					'<div class="min-w-0">' +
						'<p class="txt-forte font-semibold leading-snug">' + it.t + '</p>' +
						'<p class="txt text-[13px] mt-1">Módulo: <span class="txt">' + it.m + '</span></p>' +
					'</div>' +
					'<div class="flex flex-wrap gap-1.5 shrink-0">' + selos + '</div>' +
				'</div>';
			});

			html += '</div></div>';
			saida.innerHTML = html;
			saida.classList.remove('hidden');
		}

		var timer = null;
		campo.addEventListener('input', function () {
			clearTimeout(timer);
			timer = setTimeout(function () { desenhar(campo.value); }, 120);
		});

		document.querySelectorAll('#se-busca-sugestoes .se-chip').forEach(function (chip) {
			chip.addEventListener('click', function () {
				campo.value = chip.getAttribute('data-termo');
				campo.focus();
				desenhar(campo.value);
			});
		});

		// Chegou pelo buscador do menu (/?desafio=termo): preenche, busca e
		// leva a pessoa ate o resultado, senao ela cai no topo da home sem
		// entender por que o campo la embaixo ja esta preenchido.
		var doUrl = new URLSearchParams(location.search).get('desafio');
		if (doUrl) {
			campo.value = doUrl;
			desenhar(doUrl);
			requestAnimationFrame(function () {
				document.getElementById('desafio').scrollIntoView({ behavior: 'smooth', block: 'start' });
			});
		}
	})();
	</script>
	<?php
}
