<?php
/**
 * Semeadura de conteúdo — páginas de segmento, categorias e artigos.
 *
 * Template PHP faz deploy pelo Git; página e post NÃO — eles vivem no banco.
 * Sem isto, subir o tema em produção deixaria os três templates novos sem
 * nenhuma página apontando para eles.
 *
 * Regras que valem aqui:
 * - Idempotente: procura pelo slug antes de criar.
 * - Só cria UMA vez cada item (marca em `se_conteudo_semeado`). Se alguém
 *   apagar a página depois, ela NÃO volta sozinha na próxima atualização.
 * - Nunca sobrescreve conteúdo que já existe: o cliente pode editar à vontade.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/** Roda no fim do carregamento do admin, barato e sem travar o front. */
function se_semear_conteudo() {
	if ( ! is_admin() || wp_doing_ajax() || ! current_user_can( 'edit_pages' ) ) {
		return;
	}

	$feito = get_option( 'se_conteudo_semeado', array() );
	if ( ! is_array( $feito ) ) {
		$feito = array();
	}

	$antes = $feito;

	$feito = se_semear_paginas_segmento( $feito );
	$feito = se_semear_artigos( $feito );

	if ( $feito !== $antes ) {
		update_option( 'se_conteudo_semeado', $feito, false );
	}
}
add_action( 'admin_init', 'se_semear_conteudo' );

/**
 * Cria a página de cada segmento com o template certo.
 * O slug bate com o nome do arquivo (page-<slug>.php), então o WordPress já
 * escolhe o template sozinho — o _wp_page_template é só cinto de segurança.
 */
function se_semear_paginas_segmento( $feito ) {
	foreach ( se_segmentos() as $slug => $s ) {
		$chave = 'pagina:' . $slug;
		if ( ! empty( $feito[ $chave ] ) ) {
			continue;
		}

		$existente = get_page_by_path( $slug );
		if ( $existente ) {
			$feito[ $chave ] = (int) $existente->ID;
			continue;
		}

		$id = wp_insert_post( array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => $s['nome'],
			'post_name'    => $slug,
			'post_content' => '', // o conteúdo mora no template
			'meta_input'   => array(
				'_wp_page_template' => 'page-' . $slug . '.php',
			),
		), true );

		if ( ! is_wp_error( $id ) ) {
			$feito[ $chave ] = (int) $id;
		}
	}

	return $feito;
}

/** Categoria do blog por segmento, para o conteúdo alimentar as três portas. */
function se_categoria_segmento( $slug ) {
	$mapa = array(
		'ensino-superior'  => 'Ensino Superior',
		'educacao-basica'  => 'Educação Básica',
		'cursos-online'    => 'Cursos Online',
	);

	if ( ! isset( $mapa[ $slug ] ) ) {
		return 0;
	}

	$termo = get_term_by( 'slug', $slug, 'category' );
	if ( $termo ) {
		return (int) $termo->term_id;
	}

	$novo = wp_insert_term( $mapa[ $slug ], 'category', array( 'slug' => $slug ) );
	return is_wp_error( $novo ) ? 0 : (int) $novo['term_id'];
}

/** Publica um artigo de venda para cada segmento. */
function se_semear_artigos( $feito ) {
	foreach ( se_artigos_semente() as $slug_post => $art ) {
		$chave = 'post:' . $slug_post;
		if ( ! empty( $feito[ $chave ] ) ) {
			continue;
		}

		$existente = get_page_by_path( $slug_post, OBJECT, 'post' );
		if ( $existente ) {
			$feito[ $chave ] = (int) $existente->ID;
			continue;
		}

		$cat = se_categoria_segmento( $art['segmento'] );

		$id = wp_insert_post( array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'post_title'     => $art['titulo'],
			'post_name'      => $slug_post,
			'post_excerpt'   => $art['resumo'],
			'post_content'   => $art['conteudo'],
			'post_category'  => $cat ? array( $cat ) : array(),
		), true );

		if ( ! is_wp_error( $id ) ) {
			$feito[ $chave ] = (int) $id;
		}
	}

	return $feito;
}

/**
 * Os três artigos iniciais — um por porta de entrada.
 * São textos de venda, mas com o pé no chão: descrevem o problema operacional
 * e como o sistema resolve, sem promessa que a implantação não sustente.
 */
function se_artigos_semente() {
	return array(

		'como-vender-curso-online-pagamento-avaliacao-certificado' => array(
			'segmento' => 'cursos-online',
			'titulo'   => 'Como vender curso online sem virar operador de três sistemas',
			'resumo'   => 'Checkout num lugar, aula em outro e certificado no editor de imagem: o custo escondido de operar curso online com ferramentas soltas — e como fechar o ciclo de venda, avaliação e certificado num sistema só.',
			'conteudo' => '
<p>Quase toda operação de curso online começa igual: uma ferramenta de checkout para receber, uma plataforma para hospedar a aula e um editor de imagem para montar o certificado. Funciona nos primeiros cem alunos. Depois disso, alguém da equipe passa a gastar boa parte da semana ligando um sistema no outro.</p>

<h2>O custo que ninguém coloca na planilha</h2>
<p>O gasto não está na assinatura das ferramentas. Está no trabalho manual que aparece entre elas:</p>
<ul>
<li>Conferir o pagamento e liberar o acesso do aluno na mão.</li>
<li>Lembrar de bloquear quem cancelou a assinatura — e descobrir, meses depois, que ninguém bloqueou.</li>
<li>Anotar nota de prova em planilha, sem que ela vá parar em lugar nenhum.</li>
<li>Montar certificado um a um, sempre que alguém pede por e-mail.</li>
<li>Não conseguir responder uma pergunta simples: quantos alunos compraram, começaram e concluíram?</li>
</ul>
<p>Nada disso é falha de quem executa. É consequência de ter três bancos de dados que não se conhecem.</p>

<h2>Os três pontos que precisam conversar</h2>

<h3>1. Pagamento que libera o acesso sozinho</h3>
<p>O aluno escolhe o curso, paga com Pix, cartão ou boleto, e a matrícula é criada no mesmo segundo em que o pagamento confirma. Na assinatura recorrente vale o inverso também: se a cobrança falha e o prazo passa, o acesso é bloqueado sem ninguém precisar lembrar. Cupom, parcelamento e nota fiscal fazem parte do mesmo fluxo.</p>

<h3>2. Avaliação que vira histórico</h3>
<p>Prova, questionário e atividade ficam dentro da própria aula. A questão objetiva é corrigida na hora da entrega; a dissertativa vai para a fila do tutor. Em qualquer um dos casos, a nota entra no histórico do aluno — não numa planilha paralela. É o que permite, depois, olhar progresso e conclusão por turma sem montar relatório à mão.</p>

<h3>3. Certificado emitido por regra, não por pedido</h3>
<p>Você define o que é concluir: carga horária cumprida, nota mínima, percentual de progresso ou tudo isso junto. Quando o aluno bate a regra, o certificado sai sozinho, com a sua marca, a carga horária e um código único. Esse código tem uma página pública de validação, que é o que uma empresa consulta quando o seu aluno apresenta o certificado numa entrevista.</p>
<p>Vale ser honesto sobre o que isso é e o que não é: certificado de curso livre não é diploma e não substitui formação regulada. O que ele entrega é rastreabilidade — e é exatamente isso que dá credibilidade à sua escola.</p>

<h2>O que muda no dia a dia</h2>
<p>Com as três etapas no mesmo sistema, a operação deixa de ser reativa. A equipe para de liberar acesso, lançar nota e montar certificado, e passa a olhar o que importa: quantos compraram, quantos começaram, onde a turma trava e quantos chegam ao fim. É a diferença entre operar a ferramenta e operar o negócio.</p>

<p><strong>Quer ver isso com o seu curso?</strong> Na demonstração a gente percorre a jornada inteira usando um curso real da sua operação — venda, aula, prova e certificado — em vez de uma apresentação genérica.</p>
',
		),

		'sistema-de-gestao-escolar-o-que-muda-na-educacao-basica' => array(
			'segmento' => 'educacao-basica',
			'titulo'   => 'Sistema de gestão escolar: o que muda de verdade na educação básica',
			'resumo'   => 'Rematrícula em mutirão, boletim digitado duas vezes e inadimplência descoberta tarde demais. Um olhar prático sobre onde a escola perde tempo — e o que um sistema realmente resolve.',
			'conteudo' => '
<p>Escola não é faculdade pequena. Quem já tentou usar um sistema de ensino superior numa escola de educação básica sabe: o vocabulário não bate, o fluxo não bate e a secretaria acaba mantendo a planilha de sempre por baixo do sistema novo.</p>

<h2>Três lugares onde a escola perde tempo</h2>

<h3>A rematrícula vira mutirão</h3>
<p>Todo fim de ano a mesma cena: fila na secretaria, contrato impresso, assinatura a caneta e alguém conferindo desconto aluno por aluno. A escola sabe fazer — só faz caro demais.</p>
<p>O caminho é gerar os contratos em lote, por série ou por turma, com reajuste, bolsa e desconto aplicados por regra em vez de um a um. O responsável assina do celular, e a secretaria cuida só da exceção. O ganho concreto não é o contrato digital: é a direção conseguir ver, em dezembro, quem já assinou, quem abriu e não assinou e quem nem abriu — a tempo de fazer alguma coisa a respeito.</p>

<h3>O boletim é digitado duas vezes</h3>
<p>Professor entrega a nota em papel ou planilha, e alguém redigita no fechamento do bimestre. Além do retrabalho, é onde o erro entra. Com diário de classe digital, a nota e a frequência são lançadas uma vez, na origem, e o boletim, a ficha individual e o conselho de classe se montam a partir dali.</p>
<p>Educação infantil entra no mesmo fluxo, com conceito e parecer descritivo por campo de experiência — não é preciso adaptar um formato de ensino médio para a turma de quatro anos.</p>

<h3>A inadimplência aparece tarde</h3>
<p>Sem régua de cobrança, a escola costuma descobrir o atraso quando ele já tem três meses. E aí a conversa com a família é muito mais difícil. Uma régua automática avisa no vencimento, no terceiro dia, no décimo — pelo canal que a família usa — e deixa a exceção para o atendimento humano, que é onde ele rende.</p>

<h2>Regulação de escola é outra história</h2>
<p>Educação básica não responde ao MEC do mesmo jeito que uma IES. Quem regula é o Conselho Estadual ou Municipal de Educação e a Secretaria de Educação, e o que a escola precisa entregar é outro conjunto de coisas: Censo Escolar no layout do Educacenso, documentação e histórico no padrão da rede, controle de dias letivos e reposição no calendário.</p>
<p>Some a isso a LGPD com dado de menor de idade, que exige perfil por função, registro de acesso e consentimento do responsável. Um sistema pensado só para faculdade não cobre isso — e a escola acaba resolvendo com processo manual.</p>

<h2>A família como parte da operação</h2>
<p>Boa parte das ligações que chegam na secretaria são coisas que o responsável resolveria sozinho: segunda via de boleto, boletim, falta, comunicado. Um portal e um app que respondam isso desafogam a secretaria mais do que qualquer contratação — e melhoram a percepção da escola, porque a família para de depender do horário do atendimento.</p>

<h2>Como avaliar uma troca de sistema</h2>
<p>Duas perguntas separam proposta boa de proposta bonita:</p>
<ul>
<li><strong>Quem faz a migração da base?</strong> Histórico, matrículas e títulos financeiros precisam vir junto. Se a resposta for "vocês exportam e importam", a conta vai cair na sua secretaria.</li>
<li><strong>Como é o treinamento?</strong> Manual em PDF não é treinamento. Cada setor da escola usa uma parte diferente do sistema e precisa ser treinado no que faz.</li>
</ul>

<p><strong>Quer ver com a rotina da sua escola?</strong> A demonstração parte da sua rematrícula, do seu boletim e da sua cobrança — não de uma escola fictícia.</p>
',
		),

		'trocar-sistema-de-gestao-academica-sem-parar-a-ies' => array(
			'segmento' => 'ensino-superior',
			'titulo'   => 'Trocar o sistema de gestão acadêmica sem parar a IES',
			'resumo'   => 'Medo de migração é a objeção número um de qualquer mantenedor — e é uma objeção legítima. O que precisa estar combinado antes de virar a chave numa faculdade.',
			'conteudo' => '
<p>Toda IES que pensa em trocar de sistema esbarra no mesmo receio, e ele é legítimo: se a migração der errado, quem paga o preço é a secretaria acadêmica no meio do período letivo. Vale mais discutir isso abertamente do que fingir que a troca é indolor.</p>

<h2>O que realmente trava uma migração</h2>
<p>Não é o software novo. É o que fica para trás:</p>
<ul>
<li><strong>Histórico acadêmico incompleto.</strong> Anos de aproveitamento de estudos, dependências e adaptações que só existem no sistema antigo — às vezes só na cabeça de quem opera.</li>
<li><strong>Títulos financeiros em aberto.</strong> Acordos, bolsas, FIES e PROUNI que precisam chegar do outro lado com o mesmo saldo.</li>
<li><strong>Regras que ninguém documentou.</strong> Toda IES tem exceções de cálculo de nota, de frequência e de desconto que não estão em lugar nenhum.</li>
</ul>
<p>Uma implantação séria começa por levantar isso, não por configurar tela.</p>

<h2>A ordem que funciona</h2>
<ol>
<li><strong>Levantamento de processos.</strong> Como a sua IES faz hoje, com quem opera cada etapa. É aqui que as regras não documentadas aparecem.</li>
<li><strong>Importação da base.</strong> Alunos, histórico, cursos, matrizes e títulos financeiros. Sem isso, não há virada.</li>
<li><strong>Conferência contra os seus relatórios.</strong> A base nova precisa bater com o que a sua secretaria e o seu financeiro já usam. Enquanto não bate, não se vira a chave.</li>
<li><strong>Configuração dos períodos letivos.</strong> Calendário, matrizes curriculares, regras de aprovação e de dependência.</li>
<li><strong>Treinamento por setor.</strong> Secretaria, financeiro, coordenação e TI usam partes diferentes do sistema.</li>
</ol>
<p>Numa IES de porte médio isso se organiza em alguns meses, não em algumas semanas. Quem promete duas semanas está deixando uma dessas etapas de fora — normalmente a terceira.</p>

<h2>E o AVA?</h2>
<p>É a pergunta mais comum de quem já roda no Moodle. A resposta prática: não é preciso migrar o ambiente de aula junto com o acadêmico. O Send Educacional tem AVA próprio, desenvolvido pela Send, em que a aula, o material e a avaliação ficam no mesmo sistema do acadêmico e do financeiro — e a nota cai direto no histórico. Para a IES que prefere manter o Moodle por ora, existe sincronização bidirecional: turmas, matrículas e notas passam nos dois sentidos.</p>
<p>Migrar tudo de uma vez é uma opção, não um requisito. Separar as duas decisões costuma reduzir bastante o risco da virada.</p>

<h2>A regulação não espera a migração</h2>
<p>Censo INEP, ENADE, diploma digital e recredenciamento seguem o calendário deles, independentemente do seu projeto interno. Por isso a data da virada precisa ser escolhida olhando esse calendário — e não só a agenda da TI. Um bom cronograma de implantação já nasce desviando das janelas críticas do seu ano letivo.</p>

<h2>Perguntas para fazer a qualquer fornecedor</h2>
<ul>
<li>Quem executa a importação da base — vocês ou nós?</li>
<li>Como e contra o quê os dados migrados são conferidos antes da virada?</li>
<li>O diploma digital é nativo ou é um serviço externo contratado à parte?</li>
<li>O que acontece com o Moodle que já usamos?</li>
<li>Quem treina cada setor, e por quanto tempo depois da virada vocês ficam por perto?</li>
</ul>

<p><strong>Quer conversar sobre a sua migração?</strong> A demonstração parte dos processos da sua IES — processo seletivo, secretaria e cobrança — e não de uma apresentação padrão.</p>
',
		),
	);
}
