/**
 * Ferramentas de diagnóstico (ver inc/ferramentas.php).
 *
 * Carregado só nas páginas que têm ferramenta. Depende de window.SE_FER,
 * injetado pelo PHP com a URL do admin-ajax.
 *
 * Um motor só para os dois formatos de quiz: o PHP normaliza tudo em pergunta,
 * alternativas com peso e a resposta da lacuna, então aqui não existe "binário"
 * nem "A, B e C", existe uma lista de alternativas.
 */
(function () {
	var caixa = document.querySelector('.se-fer');
	if (!caixa) return;

	var AJAX = (window.SE_FER && window.SE_FER.ajax) || '/wp-admin/admin-ajax.php';
	var resumoEnvio = { resultado: '', detalhe: '' };
	var mostrarResultado = null;

	var LETRAS = ['A', 'B', 'C', 'D'];

	/* ------------------------------------------------------------- quiz */
	var bruto = caixa.getAttribute('data-dados');
	if (bruto) {
		var d = JSON.parse(bruto);
		var respostas = [];
		var i = 0;

		var elInicio = caixa.querySelector('.se-fer-inicio');
		var elJogo   = caixa.querySelector('.se-fer-jogo');
		var elPorta  = caixa.querySelector('.se-fer-porta');
		var elRes    = caixa.querySelector('.se-fer-resultado');
		var elPerg   = caixa.querySelector('.se-fer-pergunta');
		var elOps    = caixa.querySelector('.se-fer-ops');
		var elAtual  = caixa.querySelector('.se-fer-atual');
		var elFill   = caixa.querySelector('.se-fer-barra-fill');
		var elVoltar = caixa.querySelector('.se-fer-voltar');

		var desenha = function () {
			var q = d.perguntas[i];
			elPerg.textContent = q.p;
			elAtual.textContent = i + 1;
			elFill.style.width = ((i / d.total) * 100) + '%';
			elVoltar.classList.toggle('hidden', i === 0);

			elOps.innerHTML = '';
			q.ops.forEach(function (op, k) {
				var b = document.createElement('button');
				b.type = 'button';
				b.className = 'se-fer-op';
				/* A alternativa já escolhida fica marcada quando a pessoa volta:
				   sem isso, voltar parece ter apagado a resposta. */
				if (respostas[i] === k) b.classList.add('se-fer-op-sel');

				var letra = document.createElement('span');
				letra.className = 'se-fer-letra';
				letra.textContent = LETRAS[k] || (k + 1);

				var texto = document.createElement('span');
				texto.className = 'se-fer-op-txt';
				texto.textContent = op.t;

				b.appendChild(letra);
				b.appendChild(texto);
				b.addEventListener('click', function () {
					respostas[i] = k;
					i++;
					if (i >= d.total) { finaliza(); return; }
					desenha();
				});
				elOps.appendChild(b);
			});
		};

		var faixaDe = function (pontos) {
			for (var k = 0; k < d.faixas.length; k++) {
				if (pontos <= d.faixas[k].ate) return d.faixas[k];
			}
			return d.faixas[d.faixas.length - 1];
		};

		var pinta = function () {
			var abertos = [];
			var pontos = 0;

			respostas.forEach(function (escolha, idx) {
				var op = d.perguntas[idx].ops[escolha];
				var peso = op ? (op.peso || 0) : 0;
				pontos += peso;
				if (peso > 0) abertos.push({ idx: idx, peso: peso, escolha: op ? op.t : '' });
			});

			var faixa = faixaDe(pontos);
			caixa.querySelector('.se-fer-nota-num').textContent = abertos.length;
			caixa.querySelector('.se-fer-faixa-titulo').textContent = faixa.titulo;
			caixa.querySelector('.se-fer-faixa-texto').textContent = faixa.texto;

			var alvo = caixa.querySelector('.se-fer-recs');
			alvo.innerHTML = '';

			if (abertos.length) {
				var titulo = document.createElement('p');
				titulo.className = 'text-[11px] font-bold uppercase tracking-widest txt-link mb-4';
				titulo.textContent = d.rotuloRecs || 'O que fazer com o que ficou em aberto';
				alvo.appendChild(titulo);

				/* O limite vem da ferramenta: em diagnóstico de rotina, lista de
				   dez cansa e a terceira já é menos urgente; no diagnóstico do
				   sistema atual, a lista completa é o que a pessoa veio ver. */
				var limite = d.limite || 3;
				/* Maior peso primeiro: o que não existe vem antes do que existe
				   por fora. */
				abertos.slice().sort(function (a, b) { return b.peso - a.peso; })
					.slice(0, limite).forEach(function (item) {
						var bloco = document.createElement('div');
						bloco.className = 'se-fer-rec';

						var p1 = document.createElement('p');
						p1.className = 'text-sm txt-forte font-bold leading-snug mb-1';
						p1.textContent = d.perguntas[item.idx].p;

						var p0 = document.createElement('p');
						p0.className = 'text-[12px] txt-fraco leading-snug mb-1.5';
						p0.textContent = 'Sua resposta: ' + item.escolha;

						var p2 = document.createElement('p');
						p2.className = 'text-[13px] txt leading-relaxed';
						p2.textContent = d.perguntas[item.idx].r;

						bloco.appendChild(p1);
						bloco.appendChild(p0);
						bloco.appendChild(p2);
						alvo.appendChild(bloco);
					});

				if (abertos.length > limite) {
					var resto = document.createElement('p');
					resto.className = 'txt-fraco text-[12px] mt-4';
					resto.textContent = 'Outros ' + (abertos.length - limite) +
						' pontos em aberto vão no diagnóstico completo por e-mail.';
					alvo.appendChild(resto);
				}
			} else {
				var vazio = document.createElement('div');
				vazio.className = 'se-fer-rec';
				var pv = document.createElement('p');
				pv.className = 'text-sm txt leading-relaxed';
				pv.textContent = 'Nenhum ponto em aberto. Se quiser, use o diagnóstico como registro do que já está resolvido.';
				vazio.appendChild(pv);
				alvo.appendChild(vazio);
			}

			resumoEnvio.resultado = abertos.length + ' de ' + d.total + ' em aberto. ' + faixa.titulo;
			resumoEnvio.detalhe = abertos.length
				? abertos.map(function (item) {
					return '- ' + d.perguntas[item.idx].p + '\n  Resposta: ' + item.escolha +
						'\n  ' + d.perguntas[item.idx].r;
				}).join('\n\n')
				: 'Nenhum ponto em aberto.';

			return abertos.length;
		};

		mostrarResultado = function () {
			if (elPorta) elPorta.classList.add('hidden');
			elRes.classList.remove('hidden');
			elRes.scrollIntoView({ behavior: 'smooth', block: 'start' });
		};

		var finaliza = function () {
			var abertos = pinta();
			elJogo.classList.add('hidden');

			/* Ferramenta fechada: o resultado já está montado, mas fica atrás do
			   cadastro. A quantidade aparece na porta de propósito, é ela que
			   dá motivo para preencher. */
			if (d.exigeLead && elPorta) {
				var num = elPorta.querySelector('.se-fer-porta-num');
				if (num) num.textContent = abertos;
				elPorta.classList.remove('hidden');
				elPorta.scrollIntoView({ behavior: 'smooth', block: 'start' });
				return;
			}

			mostrarResultado();
		};

		caixa.querySelector('.se-fer-comecar').addEventListener('click', function () {
			elInicio.classList.add('hidden');
			elJogo.classList.remove('hidden');
			desenha();
		});

		elVoltar.addEventListener('click', function () {
			if (i > 0) { i--; desenha(); }
		});

		caixa.querySelector('.se-fer-refazer').addEventListener('click', function () {
			respostas = [];
			i = 0;
			elRes.classList.add('hidden');
			elJogo.classList.remove('hidden');
			desenha();
			caixa.scrollIntoView({ behavior: 'smooth', block: 'start' });
		});
	}

	/* ----------------------------------------------------- calculadora */
	if (caixa.classList.contains('se-calc')) {
		var alunos = document.getElementById('calc-alunos');
		var ticket = document.getElementById('calc-ticket');
		var taxa   = document.getElementById('calc-taxa');
		var dias   = document.getElementById('calc-dias');

		var reais = function (v) {
			return v.toLocaleString('pt-BR', {
				style: 'currency', currency: 'BRL', maximumFractionDigits: 0
			});
		};

		var calcula = function () {
			var n  = Math.max(1, parseFloat(alunos.value) || 0);
			var t  = Math.max(0, parseFloat(ticket.value) || 0);
			var p  = parseFloat(taxa.value) / 100;
			var dd = parseFloat(dias.value);

			var mes = n * t * p;
			var ano = mes * 12;

			/* Quanto fica parado a qualquer momento, considerando o atraso
			   médio: é o dinheiro que a instituição já entregou em aula e
			   ainda não recebeu. */
			var parado = mes * (dd / 30);

			document.getElementById('calc-taxa-val').textContent = taxa.value;
			document.getElementById('calc-dias-val').textContent = dias.value;
			document.getElementById('calc-mes').textContent = reais(mes);
			document.getElementById('calc-ano').textContent = reais(ano);
			document.getElementById('calc-recup').textContent = reais(ano * 0.45);
			document.getElementById('calc-equivale').textContent =
				reais(parado) + ' parados a qualquer momento, com ' + dias.value +
				' dias de atraso médio. No ano, equivale a ' +
				(t > 0 ? Math.round(ano / t) : 0) + ' mensalidades que não entraram.';

			resumoEnvio.resultado = reais(ano) + ' por ano em inadimplência';
			resumoEnvio.detalhe =
				n + ' alunos, mensalidade média ' + reais(t) + ', ' +
				taxa.value + '% de inadimplência, ' + dias.value + ' dias de atraso médio.\n' +
				'Parado por mês: ' + reais(mes) + '\nNo ano: ' + reais(ano);
		};

		[alunos, ticket, taxa, dias].forEach(function (el) {
			el.addEventListener('input', calcula);
		});
		calcula();
	}

	/* ---------------------------------------------------------- envio */
	var form = caixa.querySelector('.se-fer-form');
	if (!form) return;

	var ehPorta = form.classList.contains('se-fer-form-porta');

	form.addEventListener('submit', function (e) {
		e.preventDefault();

		var btn    = form.querySelector('button[type=submit]');
		var erro   = form.querySelector('.se-fer-erro');
		var ok     = form.querySelector('.se-fer-ok');
		var rotulo = btn.textContent;

		erro.classList.add('hidden');
		btn.disabled = true;
		btn.textContent = 'Enviando...';

		var dados = new FormData(form);
		dados.append('action', 'se_ferramenta_lead');
		dados.append('ferramenta', form.getAttribute('data-ferramenta'));
		dados.append('resultado', resumoEnvio.resultado);
		dados.append('detalhe', resumoEnvio.detalhe);
		dados.append('origem', location.pathname);

		fetch(AJAX, { method: 'POST', body: dados })
			.then(function (r) { return r.json(); })
			.then(function (r) {
				btn.disabled = false;
				btn.textContent = rotulo;
				if (!r.success) {
					erro.textContent = r.data || 'Não foi possível enviar. Tente de novo.';
					erro.classList.remove('hidden');
					return;
				}

				/* Na porta, o prêmio é o resultado, não uma mensagem de
				   obrigado: some com o formulário e abre o diagnóstico. */
				if (ehPorta && mostrarResultado) {
					mostrarResultado();
					return;
				}

				form.querySelectorAll('.grid, label, button[type=submit]').forEach(function (el) {
					el.classList.add('hidden');
				});
				ok.classList.remove('hidden');
			})
			.catch(function () {
				btn.disabled = false;
				btn.textContent = rotulo;
				erro.textContent = 'Falha de conexão. Tente de novo.';
				erro.classList.remove('hidden');
			});
	});
})();
