<?php
/**
 * Material rico: o ebook "12 perguntas antes de trocar o sistema de gestão".
 *
 * A oferta existe para um momento específico: o visitante que já leu a página
 * do segmento, já viu o convite de demonstração três vezes e não clicou. Ele
 * não está pronto para falar com um consultor, mas está avaliando trocar de
 * sistema. Pedir "fale com a gente" de novo não muda a resposta; oferecer o
 * roteiro de perguntas, sim.
 *
 * Por isso o popup é de SAÍDA, e não por tempo: ele só aparece quando a pessoa
 * demonstrou que está indo embora.
 *
 * O PDF vive em assets/materiais, junto com o HTML de onde foi gerado.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/** Metadados do material. Fonte única: página, popup e e-mail leem daqui. */
function se_material() {
	return array(
		'slug'      => 'trocar-de-sistema',
		'titulo'    => '12 perguntas antes de trocar o sistema de gestão',
		'chamada'   => 'O roteiro que separa uma proposta honesta de uma promessa vaga',
		'resumo'    => 'Um guia de 8 páginas para conduzir a migração sem parar a secretaria no meio do período letivo. As doze perguntas para fazer a todo fornecedor, com a resposta que tranquiliza e o sinal de alerta de cada uma.',
		'formato'   => 'PDF, 8 páginas',
		'arquivo'   => get_template_directory_uri() . '/assets/materiais/send-12-perguntas-antes-de-trocar-de-sistema.pdf',
		'destaques' => array(
			'O que exatamente vai ser migrado, e o que fica para trás',
			'Como conferir se os títulos em aberto chegam com o mesmo saldo',
			'Em que ponto do calendário letivo a virada deve acontecer',
			'Quanto custa de verdade, somando implantação e treinamento',
		),
	);
}

/**
 * Formulário do material.
 *
 * Quatro campos e o consentimento. O formulário de demonstração pede porte,
 * cargo e WhatsApp porque ali a pessoa quer ser abordada. Aqui ela quer um
 * PDF: cada campo a mais custa conversão sem devolver informação que o
 * comercial vá usar hoje.
 *
 * @param string $ctx Sufixo dos ids, o formulário aparece duas vezes na página.
 */
function se_material_form( $ctx = 'pagina' ) {
	$m = se_material();
	?>
	<form class="se-material-form" data-ctx="<?php echo esc_attr( $ctx ); ?>">
		<div class="grid sm:grid-cols-2 gap-3">
			<div>
				<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="mat-nome-<?php echo esc_attr( $ctx ); ?>">Nome</label>
				<input type="text" id="mat-nome-<?php echo esc_attr( $ctx ); ?>" name="nome" required
				       class="se-campo w-full rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-colors">
			</div>
			<div>
				<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="mat-email-<?php echo esc_attr( $ctx ); ?>">E-mail</label>
				<input type="email" id="mat-email-<?php echo esc_attr( $ctx ); ?>" name="email" required
				       class="se-campo w-full rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-colors">
			</div>
			<div>
				<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="mat-inst-<?php echo esc_attr( $ctx ); ?>">Instituição</label>
				<input type="text" id="mat-inst-<?php echo esc_attr( $ctx ); ?>" name="instituicao" required
				       class="se-campo w-full rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-colors">
			</div>
			<div>
				<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="mat-seg-<?php echo esc_attr( $ctx ); ?>">Tipo de instituição</label>
				<select id="mat-seg-<?php echo esc_attr( $ctx ); ?>" name="segmento_slug" required
				        class="se-campo se-select w-full rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-colors">
					<option value="">Selecione</option>
					<?php foreach ( se_segmentos() as $slug => $s ) : ?>
						<option value="<?php echo esc_attr( $slug ); ?>"><?php echo esc_html( $s['nome'] ); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<label class="flex items-start gap-2.5 mt-4 cursor-pointer">
			<input type="checkbox" name="consentimento" value="1" required class="se-check mt-0.5">
			<span class="text-[12px] txt-fraco leading-snug">
				Autorizo a Send Educacional a enviar o material e entrar em contato.
				Os dados são tratados conforme a
				<a href="<?php echo esc_url( home_url( '/privacidade' ) ); ?>" class="txt-link underline" target="_blank" rel="noopener">Política de Privacidade</a>.
			</span>
		</label>

		<button type="submit" class="gbtn txt-forte w-full font-bold px-6 py-3.5 rounded-xl mt-4 transition-all hover:-translate-y-0.5">
			Receber o material
		</button>

		<p class="se-material-erro hidden text-[12px] font-semibold mt-3" style="color:#ab080d"></p>

		<div class="se-material-ok hidden mt-4 rounded-xl p-4" style="background:rgba(74,120,176,.10);border:1px solid rgba(74,120,176,.28)">
			<p class="text-sm font-bold txt-forte mb-1">Pronto. O material está liberado.</p>
			<p class="text-[12px] txt mb-3">Também mandamos o link para o seu e-mail.</p>
			<a class="se-material-link inline-flex items-center gap-2 text-sm font-bold txt-link" href="<?php echo esc_url( $m['arquivo'] ); ?>" download>
				Baixar o PDF
				<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3"></path></svg>
			</a>
		</div>
	</form>
	<?php
}

/**
 * Recebe o lead do material.
 *
 * Reaproveita o registro de consentimento e a mesma conta de CRM do formulário
 * de demonstração, mas cria a negociação com o prefixo [MATERIAL]: quem chegou
 * por aqui NÃO pediu contato comercial, e o time precisa enxergar isso na
 * lista antes de ligar.
 */
add_action( 'wp_ajax_se_material_lead', 'se_material_lead' );
add_action( 'wp_ajax_nopriv_se_material_lead', 'se_material_lead' );

function se_material_lead() {
	$nome  = isset( $_POST['nome'] ) ? sanitize_text_field( wp_unslash( $_POST['nome'] ) ) : '';
	$email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$inst  = isset( $_POST['instituicao'] ) ? sanitize_text_field( wp_unslash( $_POST['instituicao'] ) ) : '';
	$slug  = isset( $_POST['segmento_slug'] ) ? sanitize_key( $_POST['segmento_slug'] ) : '';
	$ctx   = isset( $_POST['contexto'] ) ? sanitize_key( $_POST['contexto'] ) : 'pagina';

	if ( empty( $_POST['consentimento'] ) ) {
		wp_send_json_error( 'É preciso autorizar o envio para continuar.' );
	}
	if ( ! is_email( $email ) ) {
		wp_send_json_error( 'Confira o e-mail informado.' );
	}
	if ( $nome === '' || $inst === '' ) {
		wp_send_json_error( 'Preencha nome e instituição.' );
	}

	$segmentos = se_segmentos();
	if ( ! isset( $segmentos[ $slug ] ) ) {
		wp_send_json_error( 'Selecione o tipo de instituição.' );
	}

	$m   = se_material();
	$seg = $segmentos[ $slug ];

	se_registrar_consentimento( $email, $nome, $seg['form_valor'] );

	// O e-mail com o link é o que dá valor ao endereço informado: sem ele, o
	// visitante pode digitar qualquer coisa e mesmo assim baixar o arquivo.
	$assunto = 'Seu material: ' . $m['titulo'];
	$corpo   = sprintf(
		"Olá, %s.\n\nSegue o material que você pediu no site:\n%s\n\n%s\n\nQualquer dúvida, é só responder este e-mail.\n\nSend Educacional\n%s\n",
		$nome, $m['arquivo'], $m['resumo'], home_url( '/' )
	);
	wp_mail( $email, $assunto, $corpo, array( 'Content-Type: text/plain; charset=UTF-8' ) );

	$token = defined( 'SE_RD_CRM_TOKEN' ) ? SE_RD_CRM_TOKEN : '699cbb3b8057d8001d350178';

	wp_remote_post( 'https://crm.rdstation.com/api/v1/deals', array(
		'headers'   => array( 'Content-Type' => 'application/json' ),
		'timeout'   => 15,
		'sslverify' => se_ssl_verify(),
		'body'      => wp_json_encode( array(
			'token' => $token,
			'deal'  => array(
				'name' => sprintf( '[MATERIAL][%s] %s', $seg['curto'], $inst ),
			),
			'contacts' => array(
				array(
					'name'   => $nome,
					'emails' => array( array( 'email' => $email ) ),
				),
			),
		) ),
	) );

	// Entra no painel do próprio tema, junto das visitas e cliques, para dar
	// para ver de onde o material converte: página ou popup de saída.
	if ( function_exists( 'se_analytics_record' ) ) {
		se_analytics_record( array(
			'event_type' => 'lead',
			'label'      => 'material:' . $m['slug'] . ':' . $ctx,
			'page_url'   => isset( $_POST['origem'] ) ? esc_url_raw( wp_unslash( $_POST['origem'] ) ) : '',
		) );
	}

	wp_send_json_success( array( 'arquivo' => $m['arquivo'] ) );
}

/**
 * Popup de saída.
 *
 * Regras, todas de propósito:
 * - só no desktop, com mouse de verdade. No celular não existe intenção de
 *   saída confiável, e interstitial que cobre o conteúdo é penalizado na busca;
 * - só nas páginas de segmento e de módulo, onde a pessoa está avaliando;
 * - uma vez a cada 30 dias por navegador;
 * - nunca junto do banner de cookies, que já ocupa a base da tela.
 */
function se_material_popup() {
	if ( ! is_page() ) {
		return;
	}

	// Fora: a home (a pessoa mal chegou), a apresentação (já é a demonstração),
	// a própria página do material (oferecer o que ela está pedindo) e as
	// páginas legais, onde interromper é falta de educação.
	if ( is_front_page()
		|| is_page( 'apresentacao' )
		|| is_page( 'material-trocar-de-sistema' )
		|| is_page( array( 'privacidade', 'obrigado' ) ) ) {
		return;
	}

	$m = se_material();
	?>
	<div id="se-material-popup" class="hidden fixed inset-0 z-[95]" role="dialog" aria-modal="true" aria-labelledby="se-material-titulo">
		<div class="absolute inset-0 bg-slate-950/60 backdrop-blur-sm" data-fechar-material></div>

		<div class="relative min-h-full flex items-center justify-center p-4">
			<div class="sup-clara relative w-full max-w-3xl rounded-[1.75rem] overflow-hidden shadow-2xl grid md:grid-cols-2">

				<?php // Coluna da oferta: a capa do material, no mesmo desenho da capa dos artigos. ?>
				<div class="sup-escura relative p-8 flex flex-col justify-between" style="background:linear-gradient(135deg,#080b6c,#030429)">
					<span class="se-capa-grade" aria-hidden="true"></span>
					<div class="relative">
						<span class="se-artigo-selo inline-block px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest"><?php echo esc_html( $m['formato'] ); ?></span>
						<h3 id="se-material-titulo" class="titulo text-2xl leading-tight txt-forte mt-4"><?php echo esc_html( $m['titulo'] ); ?></h3>
						<p class="text-sm txt mt-3 leading-relaxed"><?php echo esc_html( $m['chamada'] ); ?></p>
					</div>
					<ul class="relative mt-6 space-y-2">
						<?php foreach ( $m['destaques'] as $d ) : ?>
							<li class="flex items-start gap-2 text-[12px] txt leading-snug">
								<svg class="w-4 h-4 shrink-0 mt-0.5 txt-link" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
								<?php echo esc_html( $d ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="p-8">
					<p class="text-[11px] font-bold uppercase tracking-widest txt-link mb-2">Antes de você ir</p>
					<h4 class="titulo-mini text-lg txt-forte leading-snug mb-1">Leve o roteiro de perguntas</h4>
					<p class="text-[13px] txt leading-relaxed mb-5">
						Sem falar com ninguém agora. O material vai para o seu e-mail e o download
						libera na hora.
					</p>
					<?php se_material_form( 'popup' ); ?>
				</div>

				<button type="button" data-fechar-material aria-label="Fechar"
				        class="absolute top-4 right-4 w-9 h-9 rounded-full flex items-center justify-center txt-fraco hover-forte transition-colors" style="background:rgba(3,4,41,.06)">
					<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
				</button>
			</div>
		</div>
	</div>
	<?php
}
add_action( 'wp_footer', 'se_material_popup' );

/** JS do formulário (usado nos dois lugares) e do gatilho de saída. */
function se_material_js() {
	if ( is_admin() ) {
		return;
	}
	?>
	<script>
	(function () {
		var AJAX = <?php echo wp_json_encode( admin_url( 'admin-ajax.php' ) ); ?>;

		// ---------------------------------------------------------- formulário
		document.addEventListener('submit', function (e) {
			var f = e.target;
			if (!f.classList || !f.classList.contains('se-material-form')) return;
			e.preventDefault();

			var btn  = f.querySelector('button[type=submit]');
			var erro = f.querySelector('.se-material-erro');
			var ok   = f.querySelector('.se-material-ok');
			var rotulo = btn.textContent;

			erro.classList.add('hidden');
			btn.disabled = true;
			btn.textContent = 'Enviando...';

			var dados = new FormData(f);
			dados.append('action', 'se_material_lead');
			dados.append('contexto', f.getAttribute('data-ctx') || 'pagina');
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
					// Some com os campos e mostra o download: a pessoa ja deu o
					// que a gente pediu, nao faz sentido continuar pedindo.
					f.querySelectorAll('.grid, label, button[type=submit]').forEach(function (el) {
						el.classList.add('hidden');
					});
					ok.classList.remove('hidden');
					var link = ok.querySelector('.se-material-link');
					if (r.data && r.data.arquivo) link.setAttribute('href', r.data.arquivo);
					window.open(link.getAttribute('href'), '_blank', 'noopener');
				})
				.catch(function () {
					btn.disabled = false;
					btn.textContent = rotulo;
					erro.textContent = 'Falha de conexão. Tente de novo.';
					erro.classList.remove('hidden');
				});
		});

		// ------------------------------------------------------ popup de saída
		var popup = document.getElementById('se-material-popup');
		if (!popup) return;

		var CHAVE = 'se-material-visto';
		var DIAS  = 30;

		function jaViu() {
			try {
				var t = parseInt(localStorage.getItem(CHAVE) || '0', 10);
				return t && (Date.now() - t) < DIAS * 86400000;
			} catch (e) { return true; }
		}
		function marcar() {
			try { localStorage.setItem(CHAVE, String(Date.now())); } catch (e) {}
		}
		function fechar() {
			popup.classList.add('hidden');
			document.body.style.overflow = '';
		}
		function abrir() {
			if (jaViu()) return;
			// O banner de cookies ja ocupa a base da tela: duas interrupcoes
			// ao mesmo tempo e o caminho mais curto para ninguem ler nenhuma.
			var cookies = document.getElementById('cookie-banner');
			if (cookies && !cookies.classList.contains('hidden')) return;

			marcar();
			popup.classList.remove('hidden');
			document.body.style.overflow = 'hidden';
			var campo = popup.querySelector('input[name=nome]');
			if (campo) campo.focus();
		}

		popup.addEventListener('click', function (e) {
			if (e.target.closest('[data-fechar-material]')) fechar();
		});

		// Abertura manual, para conferir o popup sem ter de simular a saída do
		// mouse (e sem esperar 30 dias para ele voltar a aparecer):
		// no console, seMaterialAbrir().
		window.seMaterialAbrir = function () {
			try { localStorage.removeItem(CHAVE); } catch (e) {}
			abrir();
		};
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && !popup.classList.contains('hidden')) fechar();
		});

		// Intencao de saida so faz sentido com mouse. No toque nao existe
		// "sair pelo topo da janela", e o popup viraria interrupcao aleatoria.
		var temMouse = window.matchMedia('(hover:hover) and (pointer:fine)').matches;
		if (!temMouse || window.innerWidth < 1024 || jaViu()) return;

		document.addEventListener('mouseout', function (e) {
			if (e.relatedTarget || e.clientY > 6) return;
			abrir();
		});
	})();
	</script>
	<?php
}
add_action( 'wp_footer', 'se_material_js', 20 );
