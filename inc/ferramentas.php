<?php
/**
 * Ferramentas de diagnóstico.
 *
 * Três peças interativas, uma por momento de compra:
 *
 *   raio-x-rematricula      educação básica, janela de agosto a novembro
 *   prontidao-regulatoria   ensino superior, gatilho de Censo, ENADE e diploma
 *   calculadora-inadimplencia  os dois, e a única que fala em reais
 *
 * A lógica das três é a mesma: a pessoa se autodiagnostica. Ninguém precisa
 * dizer que o sistema dela é ruim, ela chega sozinha na conclusão respondendo
 * perguntas sobre a própria rotina. É a versão em página da pergunta que abre
 * a conversa comercial: "o que a secretaria ainda faz fora do sistema hoje?"
 *
 * Diferença de fluxo em relação ao material rico: aqui o RESULTADO vem antes
 * do formulário. O valor é a resposta na tela, e cobrar o e-mail para mostrá-la
 * mataria a peça. O e-mail é pedido depois, para levar o diagnóstico por
 * escrito e a recomendação por segmento.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/** Catálogo das ferramentas. Página, menu e handler leem daqui. */
function se_ferramentas() {
	return array(

		// ------------------------------------------------- EDUCAÇÃO BÁSICA
		'raio-x-rematricula' => array(
			'tipo'      => 'quiz',
			'segmento'  => 'educacao-basica',
			'nome'      => 'Raio-X da Rematrícula',
			'titulo'    => 'A sua rematrícula está pronta para agosto?',
			'chamada'   => 'Dez perguntas, dois minutos. No fim você recebe uma nota e três recomendações.',
			'resumo'    => 'A rematrícula define a receita do ano inteiro e acontece com toda a base ao mesmo tempo. Na maioria das escolas ela roda em três lugares diferentes: o contrato sai de um, a assinatura de outro e a cobrança de um terceiro. Este raio-x mostra onde está o seu vazamento.',
			'rotulos'   => array( 'Sim, já é assim', 'Ainda não' ),
			'perguntas' => array(
				'O contrato de rematrícula é gerado pelo sistema, já preenchido com os dados do aluno e do responsável?',
				'A família assina digitalmente, sem precisar ir até a escola?',
				'A primeira parcela do ano seguinte é gerada automaticamente, no mesmo sistema da matrícula?',
				'Você consegue ver agora, em tempo real, quantas famílias já rematricularam?',
				'A lista de quem ainda não renovou se atualiza sozinha, sem alguém montar planilha?',
				'Existe régua de cobrança automática, com lembrete antes do vencimento e aviso depois?',
				'O aluno com pendência financeira é identificado antes de a rematrícula ser confirmada?',
				'Bolsas, descontos de irmão e convênios são aplicados pelo sistema, sem controle por fora?',
				'A família resolve tudo pelo celular, sem passar na secretaria?',
				'No fim do processo sai um relatório de quantos alunos saíram, por série e por turma?',
			),
			'faixas' => array(
				array( 'ate' => 2, 'titulo' => 'Sua rematrícula está bem resolvida.',
					'texto' => 'O processo está em pé e a secretaria não está apagando incêndio. As lacunas que sobraram são pontuais, e valem uma conversa só se atrapalharem em agosto.' ),
				array( 'ate' => 5, 'titulo' => 'Meio caminho. E o meio é o que dói.',
					'texto' => 'Parte da rematrícula já está no sistema e parte ainda é feita na mão. Esse é o cenário que mais consome a secretaria, porque exige conferir os dois lados e ninguém confia inteiramente em nenhum.' ),
				array( 'ate' => 10, 'titulo' => 'A rematrícula está sendo feita na mão.',
					'texto' => 'Contrato, assinatura e cobrança estão em lugares diferentes, e a escola só vai descobrir quantas famílias perdeu quando as aulas começarem. É o vazamento de receita mais caro e mais silencioso do calendário escolar.' ),
			),
			'recomendacoes' => array(
				0 => 'Gere o contrato de rematrícula a partir do cadastro do aluno. Contrato redigitado é onde entram os erros de nome, CPF e valor, e cada erro volta como retrabalho da secretaria.',
				1 => 'Assinatura digital tira a fila da secretaria e encurta o prazo de decisão da família. É a mudança que mais reduz o tempo total da rematrícula.',
				2 => 'Contrato assinado e primeira parcela precisam sair do mesmo lugar. Quando são dois sistemas, alguém concilia na mão e a inadimplência começa no primeiro mês.',
				3 => 'Sem número em tempo real, a escola planeja o ano seguinte no escuro. Acompanhamento diário do percentual renovado muda a conversa com a mantenedora.',
				4 => 'A lista de quem não renovou é a lista de ligações da semana. Se ela é montada na mão, ela atrasa, e quem atrasa perde a família para outra escola.',
				5 => 'Régua de cobrança automática resolve a maior parte do atraso sem ninguém ligar. Cobrança manual só alcança quem já está muito atrasado.',
				6 => 'Rematricular aluno com pendência sem saber é assumir a dívida para o ano seguinte. O bloqueio precisa ser do sistema, não da memória de quem atende.',
				7 => 'Desconto controlado em planilha é o item que mais gera divergência de valor entre o contrato e o boleto, e a família percebe antes da escola.',
				8 => 'Se a família precisa ir até a escola, o prazo da rematrícula passa a depender da agenda dela. No celular, a renovação acontece à noite e no fim de semana.',
				9 => 'Sem relatório de saída por série e turma, a escola não sabe onde perdeu. E o que não é medido em novembro vira surpresa em fevereiro.',
			),
		),

		// -------------------------------------------------- ENSINO SUPERIOR
		'prontidao-regulatoria' => array(
			'tipo'      => 'quiz',
			'segmento'  => 'ensino-superior',
			'nome'      => 'Checklist de Prontidão Regulatória',
			'titulo'    => 'Quanto da sua obrigação regulatória sai do sistema?',
			'chamada'   => 'Doze itens. Para cada um, responda se ele sai pronto do sistema ou se é montado na mão.',
			'resumo'    => 'Toda IES entrega Censo, ENADE e diploma. A diferença entre uma instituição tranquila e uma instituição em risco é quanto disso sai pronto do sistema e quanto depende de alguém montar na planilha, sempre na semana do prazo.',
			'rotulos'   => array( 'Sai do sistema', 'É montado na mão' ),
			'perguntas' => array(
				'Censo da Educação Superior: o arquivo do INEP sai pronto do sistema?',
				'Inscrição de ingressantes no ENADE, com o enquadramento correto por curso?',
				'Diploma digital no padrão MEC, com XML assinado e registro?',
				'Livro de registro de diplomas, atualizado e consultável?',
				'Histórico escolar completo, com aproveitamento de estudos e dependências?',
				'Integralização curricular do aluno, calculada pelo sistema?',
				'Atas e documentação de colação de grau?',
				'Documentos para recredenciamento e avaliação in loco do MEC?',
				'Carga horária de estágio e de atividades complementares?',
				'Declarações e certidões pedidas na secretaria, emitidas na hora?',
				'Acervo acadêmico digitalizado, com busca por aluno?',
				'Relatórios exigidos pela mantenedora, com o mesmo dado do acadêmico?',
			),
			'faixas' => array(
				array( 'ate' => 2, 'titulo' => 'Sua operação está pronta.',
					'texto' => 'Quase tudo sai do sistema, e o que não sai é pontual. A secretaria trabalha com prazo, não com pânico, e o risco de irregularidade é baixo.' ),
				array( 'ate' => 5, 'titulo' => 'Você depende de gente nas horas erradas.',
					'texto' => 'Uma parte relevante das obrigações é montada na mão, sempre na semana do prazo. Funciona enquanto as mesmas pessoas estiverem lá e nada mudar de regra.' ),
				array( 'ate' => 12, 'titulo' => 'O risco regulatório está concentrado em pessoas.',
					'texto' => 'A maior parte do que o MEC e o INEP exigem é remontada manualmente a cada ciclo. Cada mudança de portaria vira projeto, e um erro de enquadramento não aparece agora: aparece na colação de grau do aluno.' ),
			),
			'recomendacoes' => array(
				0  => 'Censo montado na mão é o item que mais consome a secretaria no ano, e o erro só aparece meses depois, na janela de correção.',
				1  => 'Erro de enquadramento no ENADE gera irregularidade do aluno, e a irregularidade trava a colação de grau dele.',
				2  => 'Diploma digital fora do sistema obriga a refazer processo a cada nova portaria. Nativo, a mudança de regra é atualização, não projeto.',
				3  => 'Livro de registro desatualizado é achado clássico de avaliação in loco, e é dos mais fáceis de evitar.',
				4  => 'Histórico incompleto é o que trava a migração de sistema mais tarde, e é o que mais volta como retrabalho na secretaria.',
				5  => 'Integralização calculada na mão gera aluno que cola grau sem cumprir carga, ou que fica retido sem precisar.',
				6  => 'Colação sem documentação amarrada ao acadêmico é risco direto no recredenciamento.',
				7  => 'Documentação dispersa vira risco de conceito na avaliação. É a conversa que o mantenedor não adia.',
				8  => 'Estágio e atividades complementares fora do sistema aparecem no fim do curso, quando não dá mais para corrigir.',
				9  => 'Declaração emitida na hora é o que tira a fila da secretaria em época de matrícula.',
				10 => 'Acervo sem busca por aluno significa manter o sistema antigo ligado para sempre, só para consulta.',
				11 => 'Relatório da mantenedora com dado diferente do acadêmico é o que faz a diretoria desconfiar dos dois.',
			),
		),

		// ----------------------------------------- OS TRÊS, ANTES DE TROCAR
		// Versão em tela do ebook. As doze perguntas são para fazer AO
		// FORNECEDOR, então a pergunta aqui não é se a instituição faz, é se
		// ela já tem a resposta. O que devolvemos em cada lacuna é o que uma
		// boa resposta precisa conter, que é a parte do guia que vale na
		// reunião.
		'12-perguntas-antes-de-trocar-de-sistema' => array(
			'tipo'      => 'quiz',
			'segmento'  => '',
			'material'  => 'material-trocar-de-sistema',
			'nome'      => '12 perguntas antes de trocar de sistema',
			'titulo'    => 'Você já tem as doze respostas do seu fornecedor?',
			'chamada'   => 'Marque só o que já foi respondido com informação concreta, não com intenção.',
			'resumo'    => 'Quase todo desastre de migração é previsível: ele aparece nas respostas que o fornecedor dá, ou deixa de dar, antes de assinar. Faça as doze para todos os que estiver avaliando, inclusive o atual. Perguntas iguais tornam propostas comparáveis.',
			'rotulos'   => array( 'Já tenho essa resposta', 'Ainda não perguntei' ),
			'perguntas' => array(
				'O que exatamente vai ser migrado da sua base, e o que fica para trás?',
				'Quem responde pelo histórico dos alunos que já se formaram ou evadiram?',
				'Os títulos financeiros em aberto chegam do outro lado com o mesmo saldo?',
				'Quem vai levantar as regras que hoje só existem na cabeça de quem opera?',
				'Em que ponto do calendário letivo a virada acontece?',
				'Quem treina cada setor, e quando?',
				'O sistema atende à regulação do seu segmento, item por item?',
				'O que acontece com as integrações que já funcionam hoje?',
				'O aluno vai perder acesso a alguma coisa na virada?',
				'Quanto custa de verdade, somando implantação, migração e treinamento?',
				'Como é o suporte depois que a implantação termina?',
				'Se um dia você quiser sair, como leva os seus dados?',
			),
			'faixas' => array(
				array( 'ate' => 2, 'titulo' => 'Você está conduzindo a escolha.',
					'texto' => 'A maior parte das respostas já está na mesa, e isso muda quem controla a negociação. O que falta dá para cobrir numa conversa.' ),
				array( 'ate' => 6, 'titulo' => 'Faltam respostas justamente nas partes caras.',
					'texto' => 'O que está em aberto costuma ser escopo de dados, custo total e suporte, que são os três itens mais caros de renegociar depois de assinado.' ),
				array( 'ate' => 12, 'titulo' => 'A decisão está sendo tomada no escuro.',
					'texto' => 'Sem essas respostas por escrito, o que existe é uma promessa. Não é sinal de fornecedor ruim: é sinal de que a conversa ainda não aconteceu, e ela precisa acontecer antes da assinatura, não depois.' ),
			),
			'recomendacoes' => array(
				0  => 'Uma boa resposta é uma planilha de escopo, item a item, com o que entra, o que não entra e o que entra parcialmente, assinada antes do contrato. "Migramos tudo" não é resposta.',
				1  => 'Uma boa resposta traz o acervo histórico para o sistema novo, ou digitalizado com busca por aluno. Manter o sistema antigo ligado só para consulta é custo recorrente que ninguém colocou na conta.',
				2  => 'Uma boa resposta é conciliação título a título, com relatório de divergências antes da virada. Conferência por amostragem não pega diferença de centavo, e ela reaparece no boleto do aluno.',
				3  => 'Uma boa resposta é uma etapa formal de levantamento, com um consultor entrevistando cada setor e devolvendo por escrito. Formulário para a instituição preencher sozinha não funciona: quem opera não sabe que a regra dele é exceção.',
				4  => 'Uma boa resposta amarra o cronograma ao seu calendário letivo, não à agenda comercial do fornecedor, e diz o que acontece se atrasar.',
				5  => 'Uma boa resposta é treinamento por setor, com material que fica e uma pessoa de referência nos primeiros dias de operação real.',
				6  => 'Uma boa resposta cita as obrigações do seu segmento sem você precisar explicar, e mostra a tela onde cada exportação é gerada.',
				7  => 'Uma boa resposta lista as integrações nativas e diz o que acontece com as que não têm equivalente. "Integramos com qualquer coisa via API" quer dizer que existe projeto, e ele não está no preço.',
				8  => 'Uma boa resposta tem portal e aplicativo prontos antes da virada, com comunicado pronto e período de convivência entre os dois acessos.',
				9  => 'Uma boa resposta dá o custo total de doze e de trinta e seis meses, separando o que é uma vez só do que é recorrente.',
				10 => 'Uma boa resposta tem canal definido, prazo por gravidade e diz quem atende. Peça para falar com um cliente atual antes de assinar.',
				11 => 'Uma boa resposta é uma cláusula de portabilidade no contrato: formato, prazo e custo. Constrangimento com esta pergunta já é a resposta.',
			),
		),

		// ---------------------------------------------------------- OS DOIS
		'calculadora-inadimplencia' => array(
			'tipo'     => 'calculadora',
			'segmento' => '',
			'nome'     => 'Calculadora de inadimplência',
			'titulo'   => 'Quanto a inadimplência custa na sua instituição?',
			'chamada'  => 'Quatro campos. O resultado sai em reais, por mês e por ano.',
			'resumo'   => 'Inadimplência costuma ser discutida em percentual, e percentual não dói. Em reais, a conversa muda: é o valor que a instituição já entregou em aula, já pagou em folha e não recebeu.',
		),
	);
}

/** Uma ferramenta pelo slug, ou null. */
function se_ferramenta( $slug ) {
	$todas = se_ferramentas();
	return isset( $todas[ $slug ] ) ? $todas[ $slug ] : null;
}

/** URL da página da ferramenta, vazia se a página não existir. */
function se_ferramenta_url( $slug ) {
	return se_url_pagina( $slug );
}

/**
 * Recebe o lead de uma ferramenta.
 *
 * Vai para o CRM com o prefixo [DIAGNÓSTICO] e com o resultado no nome da
 * negociação. Quem chega por aqui não pediu contato comercial, mas trouxe
 * junto o número que mede a própria dor, e é isso que o time precisa ver
 * antes de ligar.
 */
add_action( 'wp_ajax_se_ferramenta_lead', 'se_ferramenta_lead' );
add_action( 'wp_ajax_nopriv_se_ferramenta_lead', 'se_ferramenta_lead' );

function se_ferramenta_lead() {
	$slug = isset( $_POST['ferramenta'] ) ? sanitize_key( $_POST['ferramenta'] ) : '';
	$f    = se_ferramenta( $slug );
	if ( ! $f ) {
		wp_send_json_error( 'Ferramenta desconhecida.' );
	}

	$nome      = isset( $_POST['nome'] ) ? sanitize_text_field( wp_unslash( $_POST['nome'] ) ) : '';
	$email     = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$inst      = isset( $_POST['instituicao'] ) ? sanitize_text_field( wp_unslash( $_POST['instituicao'] ) ) : '';
	$resultado = isset( $_POST['resultado'] ) ? sanitize_text_field( wp_unslash( $_POST['resultado'] ) ) : '';
	$detalhe   = isset( $_POST['detalhe'] ) ? sanitize_textarea_field( wp_unslash( $_POST['detalhe'] ) ) : '';

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
	$seg_slug  = $f['segmento'];
	if ( $seg_slug === '' ) {
		$seg_slug = isset( $_POST['segmento_slug'] ) ? sanitize_key( $_POST['segmento_slug'] ) : '';
		if ( ! isset( $segmentos[ $seg_slug ] ) ) {
			wp_send_json_error( 'Selecione o tipo de instituição.' );
		}
	}
	$seg = $segmentos[ $seg_slug ];

	se_registrar_consentimento( $email, $nome, $seg['form_valor'] );

	$corpo = sprintf(
		"Olá, %s.\n\nSegue o resultado do %s, respondido no nosso site.\n\n%s\n\n%s\n\nSe quiser ver qualquer um desses pontos rodando no sistema, é só responder este e-mail que a gente marca 30 minutos.\n\nSend Educacional\n%s\n",
		$nome, $f['nome'], $resultado, $detalhe, home_url( '/' )
	);
	wp_mail( $email, 'Seu resultado: ' . $f['nome'], $corpo, array( 'Content-Type: text/plain; charset=UTF-8' ) );

	$token = defined( 'SE_RD_CRM_TOKEN' ) ? SE_RD_CRM_TOKEN : '699cbb3b8057d8001d350178';

	wp_remote_post( 'https://crm.rdstation.com/api/v1/deals', array(
		'headers'   => array( 'Content-Type' => 'application/json' ),
		'timeout'   => 15,
		'sslverify' => se_ssl_verify(),
		'body'      => wp_json_encode( array(
			'token' => $token,
			'deal'  => array(
				'name' => sprintf( '[DIAGNÓSTICO][%s] %s · %s', $seg['curto'], $inst, $resultado ),
			),
			'contacts' => array(
				array(
					'name'   => $nome,
					'emails' => array( array( 'email' => $email ) ),
				),
			),
		) ),
	) );

	if ( function_exists( 'se_analytics_record' ) ) {
		se_analytics_record( array(
			'event_type' => 'lead',
			'label'      => 'ferramenta:' . $slug,
			'page_url'   => isset( $_POST['origem'] ) ? esc_url_raw( wp_unslash( $_POST['origem'] ) ) : '',
		) );
	}

	wp_send_json_success();
}

/** Formulário do fim da ferramenta. O resultado já está na tela. */
function se_ferramenta_form( $slug, $pede_segmento = false ) {
	?>
	<form class="se-fer-form mt-8 pt-8 regra" data-ferramenta="<?php echo esc_attr( $slug ); ?>">
		<p class="text-[11px] font-bold uppercase tracking-widest txt-fraco mb-2">Opcional</p>
		<h3 class="titulo-mini text-xl txt-forte leading-snug mb-1.5">Quer o resultado por e-mail?</h3>
		<p class="text-[13px] txt leading-relaxed mb-5">
			Seu diagnóstico já está aí em cima e não vai a lugar nenhum. Se quiser guardar,
			mandamos por e-mail a versão completa, com a recomendação de todos os pontos em
			aberto, não só dos três que aparecem na tela.
		</p>

		<div class="grid sm:grid-cols-2 gap-3">
			<div>
				<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="fer-nome-<?php echo esc_attr( $slug ); ?>">Nome</label>
				<input type="text" id="fer-nome-<?php echo esc_attr( $slug ); ?>" name="nome" required class="se-campo w-full rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-colors">
			</div>
			<div>
				<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="fer-email-<?php echo esc_attr( $slug ); ?>">E-mail</label>
				<input type="email" id="fer-email-<?php echo esc_attr( $slug ); ?>" name="email" required class="se-campo w-full rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-colors">
			</div>
			<div<?php echo $pede_segmento ? '' : ' class="sm:col-span-2"'; ?>>
				<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="fer-inst-<?php echo esc_attr( $slug ); ?>">Instituição</label>
				<input type="text" id="fer-inst-<?php echo esc_attr( $slug ); ?>" name="instituicao" required class="se-campo w-full rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-colors">
			</div>
			<?php if ( $pede_segmento ) : ?>
			<div>
				<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="fer-seg-<?php echo esc_attr( $slug ); ?>">Tipo de instituição</label>
				<select id="fer-seg-<?php echo esc_attr( $slug ); ?>" name="segmento_slug" required class="se-campo se-select w-full rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-colors">
					<option value="">Selecione</option>
					<?php foreach ( se_segmentos() as $s_slug => $s ) : ?>
						<option value="<?php echo esc_attr( $s_slug ); ?>"><?php echo esc_html( $s['nome'] ); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<?php endif; ?>
		</div>

		<label class="flex items-start gap-2.5 mt-4 cursor-pointer">
			<input type="checkbox" name="consentimento" value="1" required class="se-check mt-0.5">
			<span class="text-[12px] txt-fraco leading-snug">
				Autorizo a Send Educacional a enviar o resultado e entrar em contato. Os dados são
				tratados conforme a
				<a href="<?php echo esc_url( home_url( '/privacidade' ) ); ?>" class="txt-link underline" target="_blank" rel="noopener">Política de Privacidade</a>.
			</span>
		</label>

		<div class="flex flex-col sm:flex-row gap-3 mt-5">
			<button type="submit" class="gbtn txt-forte font-bold px-6 py-3.5 rounded-xl transition-all hover:-translate-y-0.5">
				Receber o diagnóstico
			</button>
			<button type="button" onclick="abrirDemo()" class="bloco txt-forte font-bold px-6 py-3.5 rounded-xl transition-colors">
				Ver isso rodando no sistema
			</button>
		</div>

		<p class="se-fer-erro hidden text-[12px] font-semibold mt-3" style="color:#ab080d"></p>
		<p class="se-fer-ok hidden text-[13px] font-semibold mt-4 txt-forte">
			Enviado. O diagnóstico está a caminho do seu e-mail.
		</p>
	</form>
	<?php
}
