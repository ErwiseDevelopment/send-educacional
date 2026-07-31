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

		// ------------------------------------------ OS TRÊS, TROCAR HOJE
		// Único com três alternativas e com resultado FECHADO até o cadastro.
		// As outras entregam de graça porque servem a quem ainda está longe da
		// compra; esta é o diagnóstico completo do sistema atual, com a resposta
		// técnica ponto a ponto, e vale o dado de contato.
		//
		// As alternativas não são sim e não: são o estado real da rotina. "Existe,
		// mas por fora" é a resposta mais comum do mercado e é justamente a que
		// revela a costura, então precisa ter peso próprio.
		'12-perguntas-antes-de-trocar-de-sistema' => array(
			'tipo'        => 'quiz',
			'formato'     => 'abc',
			'exige_lead'  => true,
			'segmento'    => '',
			'material'    => 'material-trocar-de-sistema',
			'limite'      => 12,
			'rotulo_recs' => 'O que o Send Educacional entrega nativo nesses pontos',
			'nome'        => '12 perguntas para mudar de sistema hoje',
			'titulo'      => 'O que o seu sistema atual não faz?',
			'chamada'     => 'Doze perguntas técnicas, três alternativas cada. No fim, o que o Send Educacional entrega nativo em cada ponto que ficou em aberto.',
			'resumo'      => 'A maioria das instituições não tem um sistema ruim: tem um sistema incompleto, com o resto costurado em planilha, serviço de terceiro e retrabalho da secretaria. Estas doze perguntas mostram onde está a costura, e o que existiria nativo no lugar dela.',
			'perguntas'   => array(
				array(
					'p'   => 'Como a instituição capta e acompanha quem ainda não é aluno?',
					'ops' => array(
						array( 't' => 'CRM dentro do próprio sistema de gestão', 'peso' => 0 ),
						array( 't' => 'CRM separado, planilha ou caderno de contatos', 'peso' => 1 ),
						array( 't' => 'Não há acompanhamento estruturado de interessados', 'peso' => 2 ),
					),
					'r' => 'O Send Educacional tem CRM nativo: funil de leads, campanhas e recuperação de matrícula. O interessado que vira aluno não é redigitado, ele já entra como matrícula com o histórico da conversa junto.',
				),
				array(
					'p'   => 'Como o contrato de matrícula é assinado?',
					'ops' => array(
						array( 't' => 'Assinatura eletrônica dentro do próprio sistema', 'peso' => 0 ),
						array( 't' => 'Assinatura eletrônica, mas em serviço contratado à parte', 'peso' => 1 ),
						array( 't' => 'Impresso, assinado presencialmente na secretaria', 'peso' => 2 ),
					),
					'r' => 'A assinatura eletrônica é parte do fluxo: o contrato sai do cadastro do aluno, é assinado com validade jurídica e trilha de auditoria, e a primeira parcela é gerada em seguida, sem ninguém lançar de novo.',
				),
				array(
					'p'   => 'Como a cobrança acontece hoje?',
					'ops' => array(
						array( 't' => 'Régua automática, com boleto, Pix e acordo no mesmo sistema', 'peso' => 0 ),
						array( 't' => 'O boleto sai do sistema, mas o lembrete e a cobrança são manuais', 'peso' => 1 ),
						array( 't' => 'A cobrança é feita por fora, em planilha ou pelo banco', 'peso' => 2 ),
					),
					'r' => 'A régua de cobrança é nativa: boleto, Pix, recorrência, acordo e aviso automático antes e depois do vencimento. É o módulo por trás da queda de inadimplência medida no cliente em produção.',
				),
				array(
					'p'   => 'Onde a aula e a avaliação online acontecem?',
					'ops' => array(
						array( 't' => 'No mesmo sistema, com a nota caindo direto no histórico', 'peso' => 0 ),
						array( 't' => 'Em um AVA separado, com a nota importada depois', 'peso' => 1 ),
						array( 't' => 'Não existe ambiente online, o material vai por outro canal', 'peso' => 2 ),
					),
					'r' => 'O AVA é desenvolvido pela própria Send e nasce dentro do sistema: aula, material e avaliação no mesmo lugar do acadêmico, e a nota cai direto no histórico. Quem já usa Moodle e não quer mexer agora tem integração nos dois sentidos.',
				),
				array(
					'p'   => 'Como o aluno e a família acompanham notas, documentos e cobrança?',
					'ops' => array(
						array( 't' => 'Portal e aplicativo com o mesmo login do sistema', 'peso' => 0 ),
						array( 't' => 'Portal limitado, e o resto vai por e-mail ou WhatsApp', 'peso' => 1 ),
						array( 't' => 'Tudo passa pela secretaria, no balcão ou no telefone', 'peso' => 2 ),
					),
					'r' => 'Portal e aplicativo de aluno, família, docente e polo com o mesmo login, na web e no celular, com a marca da instituição. A conversa com a família sai do WhatsApp pessoal de quem atende.',
				),
				array(
					'p'   => 'Como a instituição percebe que um aluno está prestes a sair?',
					'ops' => array(
						array( 't' => 'O sistema aponta risco cruzando nota, frequência e financeiro', 'peso' => 0 ),
						array( 't' => 'Alguém percebe, olhando relatórios separados', 'peso' => 1 ),
						array( 't' => 'A gente descobre quando o aluno não rematricula', 'peso' => 2 ),
					),
					'r' => 'O módulo de retenção cruza nota, frequência e situação financeira para apontar risco de evasão antes de o aluno sumir, com registro das tratativas por aluno.',
				),
				array(
					'p'   => 'Como sai o documento final: diploma ou certificado?',
					'ops' => array(
						array( 't' => 'Nativo do sistema, no padrão exigido e com registro', 'peso' => 0 ),
						array( 't' => 'Parte no sistema, parte em processo paralelo', 'peso' => 1 ),
						array( 't' => 'Fora do sistema, em editor de texto ou serviço de terceiro', 'peso' => 2 ),
					),
					'r' => 'Diploma digital no padrão MEC, com XML assinado e livro de registro, no ensino superior. Nos cursos livres, certificado emitido sozinho ao fim do curso, com validação pública.',
				),
				array(
					'p'   => 'Como o aluno pede uma declaração, uma revisão ou uma segunda via?',
					'ops' => array(
						array( 't' => 'Vira protocolo no sistema, com prazo e responsável', 'peso' => 0 ),
						array( 't' => 'Por e-mail ou formulário, e alguém controla numa lista', 'peso' => 1 ),
						array( 't' => 'No balcão ou no WhatsApp de quem estiver disponível', 'peso' => 2 ),
					),
					'r' => 'A Central de Requerimentos transforma o pedido em protocolo com prazo, responsável e histórico. O aluno acompanha pelo portal, e a secretaria deixa de ser o sistema de controle.',
				),
				array(
					'p'   => 'Como o Censo é fechado?',
					'ops' => array(
						array( 't' => 'A exportação sai pronta do sistema', 'peso' => 0 ),
						array( 't' => 'Sai do sistema, mas precisa de ajuste manual antes de enviar', 'peso' => 1 ),
						array( 't' => 'É montado na mão, com equipe dedicada na época', 'peso' => 2 ),
					),
					'r' => 'A exportação do Censo sai do sistema. Na instituição em produção, o que era processo manual com equipe interna virou um arquivo e uma pessoa.',
				),
				array(
					'p'   => 'Como a mantenedora enxerga os números da operação?',
					'ops' => array(
						array( 't' => 'Painel em tempo real, com o mesmo dado do acadêmico', 'peso' => 0 ),
						array( 't' => 'Relatórios exportados e consolidados em planilha', 'peso' => 1 ),
						array( 't' => 'Cada setor manda o seu número, e eles nem sempre batem', 'peso' => 2 ),
					),
					'r' => 'O painel de indicadores lê o mesmo dado do acadêmico e do financeiro, então a mantenedora e a secretaria param de discutir qual número está certo.',
				),
				array(
					'p'   => 'Onde ficam a conciliação bancária e o resultado financeiro?',
					'ops' => array(
						array( 't' => 'No mesmo financeiro que emite a cobrança do aluno', 'peso' => 0 ),
						array( 't' => 'Em um sistema contábil separado, alimentado por exportação', 'peso' => 1 ),
						array( 't' => 'Em planilha, conferida no fim do mês', 'peso' => 2 ),
					),
					'r' => 'Conciliação bancária, contas a pagar e a receber e DRE ficam no mesmo financeiro que emite a cobrança do aluno, sem exportar nada para fechar o mês.',
				),
				array(
					'p'   => 'Onde estão os documentos digitalizados dos alunos?',
					'ops' => array(
						array( 't' => 'No sistema, com busca por aluno', 'peso' => 0 ),
						array( 't' => 'Em pastas na rede ou na nuvem, fora do sistema', 'peso' => 1 ),
						array( 't' => 'Em papel, no arquivo físico da secretaria', 'peso' => 2 ),
					),
					'r' => 'A Biblioteca e o GED guardam o documento digitalizado com busca por nome do aluno, o que evita manter o sistema antigo ligado só para consulta e encurta o atendimento de segunda via.',
				),
			),
			// Faixa por PONTOS (0 a 24), não por quantidade de lacunas: um "existe,
			// mas por fora" pesa menos que um "não existe", e a leitura precisa
			// refletir isso.
			'faixas' => array(
				array( 'ate' => 5,  'titulo' => 'O seu sistema cobre quase tudo.',
					'texto' => 'Sobrou pouca coisa de fora, e trocar de sistema por causa disso raramente compensa. Vale olhar os pontos abaixo e decidir se eles atrapalham o suficiente.' ),
				array( 'ate' => 13, 'titulo' => 'Você está costurando o resto por fora.',
					'texto' => 'Parte do que a instituição precisa não existe no sistema, e alguém resolve isso com planilha, serviço de terceiro ou digitação em dobro. É o custo que não aparece na mensalidade do fornecedor, mas aparece na folha da secretaria.' ),
				array( 'ate' => 24, 'titulo' => 'Metade da operação vive fora do sistema.',
					'texto' => 'Não é sinal de fornecedor ruim: é sinal de que aqueles módulos não existem ali, e a instituição foi preenchendo os buracos como deu. O problema é que cada buraco tem um custo, um responsável e um dado que não conversa com o resto.' ),
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

/**
 * Põe os dois formatos de quiz na mesma estrutura.
 *
 * O quiz binário nasceu com 'perguntas' de texto simples, dois rótulos comuns a
 * todas e as respostas num array separado. O de alternativas nasceu já com a
 * pergunta, as opções e a resposta juntas. Em vez de dois motores, um
 * conversor: o binário é só um caso de duas alternativas, peso 0 e peso 1.
 *
 * @return array<int,array{p:string,ops:array,r:string}>
 */
function se_ferramenta_normaliza( $f ) {
	$saida = array();

	foreach ( $f['perguntas'] as $i => $perg ) {

		// Formato novo: já vem pronto.
		if ( is_array( $perg ) ) {
			$saida[] = array(
				'p'   => $perg['p'],
				'ops' => $perg['ops'],
				'r'   => isset( $perg['r'] ) ? $perg['r'] : '',
			);
			continue;
		}

		$saida[] = array(
			'p'   => $perg,
			'ops' => array(
				array( 't' => $f['rotulos'][0], 'peso' => 0 ),
				array( 't' => $f['rotulos'][1], 'peso' => 1 ),
			),
			'r'   => isset( $f['recomendacoes'][ $i ] ) ? $f['recomendacoes'][ $i ] : '',
		);
	}

	return $saida;
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
	$telefone  = isset( $_POST['telefone'] ) ? sanitize_text_field( wp_unslash( $_POST['telefone'] ) ) : '';
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
	// Só as ferramentas fechadas exigem telefone; nas abertas ele nem aparece.
	if ( ! empty( $f['exige_lead'] ) && strlen( preg_replace( '/\D/', '', $telefone ) ) < 10 ) {
		wp_send_json_error( 'Informe um telefone com DDD.' );
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

	// A RD recusa o telefone quando vem com 'type'; só o número passa.
	$contato = array(
		'name'   => $nome,
		'emails' => array( array( 'email' => $email ) ),
	);
	if ( $telefone !== '' ) {
		$contato['phones'] = array( array( 'phone' => $telefone ) );
	}

	wp_remote_post( 'https://crm.rdstation.com/api/v1/deals', array(
		'headers'   => array( 'Content-Type' => 'application/json' ),
		'timeout'   => 15,
		'sslverify' => se_ssl_verify(),
		'body'      => wp_json_encode( array(
			'token' => $token,
			'deal'  => array(
				'name' => sprintf( '[DIAGNÓSTICO][%s] %s · %s', $seg['curto'], $inst, $resultado ),
			),
			'contacts' => array( $contato ),
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

/**
 * Formulário da ferramenta.
 *
 * Dois modos. Em porta = false ele é opcional e vem DEPOIS do resultado, que já
 * está na tela. Em porta = true ele é a condição para ver o resultado, e aí o
 * telefone entra como obrigatório: quem aceita esse acordo é lead de verdade,
 * e o time precisa conseguir ligar.
 */
function se_ferramenta_form( $slug, $pede_segmento = false, $porta = false ) {
	?>
	<form class="se-fer-form<?php echo $porta ? ' se-fer-form-porta' : ' mt-8 pt-8 regra'; ?>" data-ferramenta="<?php echo esc_attr( $slug ); ?>">
		<?php if ( ! $porta ) : ?>
			<p class="text-[11px] font-bold uppercase tracking-widest txt-fraco mb-2">Opcional</p>
			<h3 class="titulo-mini text-xl txt-forte leading-snug mb-1.5">Quer o resultado por e-mail?</h3>
			<p class="text-[13px] txt leading-relaxed mb-5">
				Seu diagnóstico já está aí em cima e não vai a lugar nenhum. Se quiser guardar,
				mandamos por e-mail a versão completa, com a recomendação de todos os pontos em
				aberto, não só dos três que aparecem na tela.
			</p>
		<?php endif; ?>

		<div class="grid sm:grid-cols-2 gap-3">
			<div>
				<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="fer-nome-<?php echo esc_attr( $slug ); ?>">Nome</label>
				<input type="text" id="fer-nome-<?php echo esc_attr( $slug ); ?>" name="nome" required class="se-campo w-full rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-colors">
			</div>
			<div>
				<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="fer-email-<?php echo esc_attr( $slug ); ?>">E-mail</label>
				<input type="email" id="fer-email-<?php echo esc_attr( $slug ); ?>" name="email" required class="se-campo w-full rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-colors">
			</div>
			<?php if ( $porta ) : ?>
			<div>
				<label class="block text-[11px] font-bold uppercase tracking-widest txt-fraco mb-1.5" for="fer-tel-<?php echo esc_attr( $slug ); ?>">Telefone ou WhatsApp</label>
				<input type="tel" id="fer-tel-<?php echo esc_attr( $slug ); ?>" name="telefone" required inputmode="tel" placeholder="(11) 90000-0000"
				       class="se-campo w-full rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-colors">
			</div>
			<?php endif; ?>
			<div<?php echo ( $pede_segmento || $porta ) ? '' : ' class="sm:col-span-2"'; ?>>
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
				<?php echo $porta ? 'Ver o meu diagnóstico' : 'Receber o diagnóstico'; ?>
			</button>
			<?php if ( ! $porta ) : ?>
				<button type="button" onclick="abrirDemo()" class="bloco txt-forte font-bold px-6 py-3.5 rounded-xl transition-colors">
					Ver isso rodando no sistema
				</button>
			<?php endif; ?>
		</div>

		<?php if ( $porta ) : ?>
			<p class="txt-fraco text-[12px] mt-4 leading-snug">
				O resultado aparece na hora, nesta mesma tela, e também vai para o seu e-mail.
			</p>
		<?php endif; ?>

		<p class="se-fer-erro hidden text-[12px] font-semibold mt-3" style="color:#ab080d"></p>
		<p class="se-fer-ok hidden text-[13px] font-semibold mt-4 txt-forte">
			Enviado. O diagnóstico está a caminho do seu e-mail.
		</p>
	</form>
	<?php
}
