<?php
/**
 * Catálogo completo de módulos, por segmento.
 *
 * A base é o que já estava escrito nas páginas de módulo do próprio site
 * (Gestão Acadêmica, Financeiro, Requerimentos, Retenção), não é lista
 * inventada. O que muda de um segmento para o outro é o vocabulário e o
 * recorte: a mesma capacidade de "rematrícula em lote" se chama período e
 * turma numa faculdade, série e turma numa escola, e turma/trilha num curso
 * online. Uma escola não tem colação de grau; um curso livre não tem Censo.
 *
 * Cada categoria é renderizada como bloco editorial (ver se_bloco_modulos),
 * não como mais uma grade de cartões.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * @param string $slug ensino-superior | educacao-basica | cursos-online
 * @return array<int,array{chave:string,nome:string,resumo:string,icone:string,url:string,itens:string[]}>
 */
function se_modulos_segmento( $slug ) {
	$catalogo = array(

		// =====================================================================
		'ensino-superior' => array(

			array(
				'chave'  => 'captacao',
				'nome'   => 'Processo seletivo e captação',
				'resumo' => 'Do primeiro contato do candidato à matrícula assinada, sem planilha de inscritos no meio.',
				'icone'  => 'funil',
				'url'    => 'captacao',
				'itens'  => array(
					'Vestibular e inscrição online',
					'Prova agendada e prova online',
					'Ingresso por ENEM e transferência externa',
					'Classificação e lista de aprovados',
					'Funil de captação com etapas configuráveis',
					'Gestão de campanhas de matrícula e captação',
					'Recuperação de inscritos que não concluíram',
					'Conversão de inscrito em matriculado sem redigitar',
					'CRM Dynamics: captura de candidatos',
					'CRM Dynamics: retorno automático de vínculo',
					'Configurações completas de WebService',
					'Relatório de origem e desempenho por campanha',
				),
			),

			array(
				'chave'  => 'secretaria',
				'nome'   => 'Secretaria acadêmica',
				'resumo' => 'O núcleo da operação: matrícula, notas, frequência, histórico e documentos com valor legal.',
				'icone'  => 'academico',
				'url'    => 'gestao-academica',
				'itens'  => array(
					'Gestão de matrículas e rematrículas',
					'Rematrículas em lote por período ou turma',
					'Lançamento e revisão de notas por turma',
					'Programação de dependências (DPs)',
					'Adaptação curricular e aproveitamento de estudos',
					'Justificativa de faltas em massa',
					'Painel de faltas justificadas e documentações',
					'Finalização automática de disciplinas',
					'Planos de ensino e calendário de provas',
					'Histórico escolar atualizado em tempo real',
					'Controle de integralização curricular',
					'Fechamento mensal geral de alunos',
					'Trancamento, cancelamento e reingresso',
					'Configuração paramétrica de documentos',
					'Auditoria do sistema e log de troca de grades',
				),
			),

			array(
				'chave'  => 'regulacao',
				'nome'   => 'Regulação, MEC e diploma',
				'resumo' => 'O que o órgão regulador cobra, gerado a partir do dado que já está no sistema.',
				'icone'  => 'escudo',
				'url'    => 'gestao-academica',
				'itens'  => array(
					'Geração nativa do arquivo do Censo INEP',
					'Gestão completa do ENADE',
					'Controle de alunos cancelados pelo INEP',
					'Expedição e emissão de diploma digital',
					'Livro de registro de diplomas integrado',
					'Gestão e programação de colação de grau',
					'Documentação organizada para recredenciamento',
					'Atas, portarias e histórico no GED',
				),
			),

			array(
				'chave'  => 'estrutura',
				'nome'   => 'Estrutura acadêmica e pessoas',
				'resumo' => 'A instituição inteira modelada: campus, cursos, grades, professores e departamentos.',
				'icone'  => 'predio',
				'url'    => 'gestao-academica',
				'itens'  => array(
					'Estrutura multi-campus e múltiplos turnos',
					'Grade completa de cursos e disciplinas',
					'Áreas de conhecimento e calendário acadêmico',
					'Gestão de professores, disponibilidade e jornada',
					'Painel de funcionários, cargos e departamentos',
					'Controle de fornecedores e revendedores',
					'Perfis e permissões por área de atuação',
					'Cadastro e gestão de equipes multidisciplinares',
				),
			),

			array(
				'chave'  => 'financeiro',
				'nome'   => 'Financeiro da IES',
				'resumo' => 'Do lançamento da mensalidade ao caixa, com a inadimplência aparecendo antes de virar prejuízo.',
				'icone'  => 'dinheiro',
				'url'    => array( 'financeiro', 'gestao-financeira' ),
				'itens'  => array(
					'Régua de cobrança automatizada',
					'Pagamentos online: cartão, Pix e boleto',
					'Conciliação instantânea de Pix via Getnet',
					'Geração de arquivos de remessa e retorno',
					'Financeiro individualizado do aluno',
					'Lançamento de cobranças avulsas',
					'Atualização dinâmica de índices financeiros',
					'Cálculo automático de juros e multas',
					'Portal self-service de renegociação para o aluno',
					'Programação parametrizada de negociações',
					'Histórico e gestão centralizada de acordos',
					'Bloqueio e desbloqueio acadêmico via financeiro',
					'Monitoramento ativo de alunos inadimplentes',
					'Observações e histórico por parcela',
					'Fluxo de caixa integrado: a receber x a pagar',
					'Classificação gerencial via plano de contas',
					'Rateio por centro de custo e unidade',
					'Baixa automatizada de pagamentos efetuados',
					'Gestão de fornecedores e prestadores de serviço',
					'Alertas sistêmicos de vencimento de obrigações',
				),
			),

			array(
				'chave'  => 'bolsas',
				'nome'   => 'Bolsas, convênios e descontos',
				'resumo' => 'FIES, PROUNI, convênio de empresa e bolsa institucional com regra, não com exceção manual.',
				'icone'  => 'assinatura',
				'url'    => array( 'financeiro', 'gestao-financeira' ),
				'itens'  => array(
					'Gestão e aprovação sistêmica de convênios',
					'Parametrização de categorias de desconto',
					'Planos de desconto padrão e descontos avulsos',
					'Gestão de planos com 100% de desconto (bolsistas)',
					'Planos financeiros personalizados por curso',
					'Controle de FIES e PROUNI',
					'Módulo de metas e previsão de orçamento',
				),
			),

			array(
				'chave'  => 'fiscal',
				'nome'   => 'Nota fiscal e obrigações',
				'resumo' => 'Emissão automática vinculada ao pagamento, com o CNPJ certo em cada campus.',
				'icone'  => 'documento',
				'url'    => array( 'financeiro', 'gestao-financeira' ),
				'itens'  => array(
					'Emissão 100% automática de notas fiscais',
					'Transmissão direta para as prefeituras',
					'Emissão vinculada à liquidação do pagamento',
					'Tratamento de múltiplos CNPJs e campus',
					'Relatório de notas emitidas e canceladas',
					'Conformidade com as regras tributárias locais',
				),
			),

			array(
				'chave'  => 'ead',
				'nome'   => 'EAD, polos e AVA',
				'resumo' => 'O ambiente de aula desenvolvido pela Send e a operação de polo com repasse e meta.',
				'icone'  => 'monitor',
				'url'    => 'portais',
				'itens'  => array(
					'AVA próprio: aula, material e avaliação no mesmo sistema',
					'Inscrição de matrículas e cursos no AVA',
					'Lista de tarefas e avaliações direto do AVA',
					'Relatório de últimos acessos ao ambiente de aula',
					'Sincronização de trancamentos e cancelamentos',
					'Logs e notificações de integração em tempo real',
					'Integração com o LMS que a IES já usa',
					'Atendimento dedicado a polos (EAD)',
					'Automação completa de repasses financeiros',
					'Cupons e regras customizadas para repasse a polos',
					'Visão geral financeira por polo (franquia)',
					'Relatórios de polo analítico e sintético',
					'Monitoramento de inadimplência por unidade',
					'Relatórios de alunos com convênio e polos',
				),
			),

			array(
				'chave'  => 'requerimentos',
				'nome'   => 'Requerimentos e atendimento',
				'resumo' => 'A secretaria virtual: protocolo com prazo, responsável e o aluno sabendo onde está o pedido.',
				'icone'  => 'ajuda',
				'url'    => 'requerimentos',
				'itens'  => array(
					'Secretaria virtual para o aluno, 24h',
					'Construção visual de fluxo de requerimento',
					'Criação ilimitada de tipos de requerimento',
					'Roteamento automático entre áreas e departamentos',
					'Separação de atendimento por turnos operacionais',
					'Painel Kanban em tempo real',
					'Parametrização de exigências e anexos',
					'Definição de SLA por tipo de requerimento',
					'Alertas de quebra de prazos institucionais',
					'Relatório de SLA: no prazo x atrasos',
					'Priorização visual de tickets na fila',
					'Bloqueio de avanço de etapa sem resolução',
					'Histórico de interações e chat com a secretaria',
					'Upload seguro de anexos e documentos exigidos',
					'Notificações de mudança de status',
					'Envio e validação de atividades complementares',
					'Identificação de gargalos por setor',
					'Relatório analítico de performance por equipe',
					'Auditoria completa das mudanças de status',
				),
			),

			array(
				'chave'  => 'retencao',
				'nome'   => 'Retenção e evasão',
				'resumo' => 'O aluno em risco aparece antes de sumir, cruzando nota, frequência, acesso e financeiro.',
				'icone'  => 'pessoas',
				'url'    => 'retencao',
				'itens'  => array(
					'Algoritmo de identificação de alunos em risco',
					'Painel semafórico: alto, médio e baixo risco',
					'Monitoramento de acessos e inatividade',
					'Alertas automáticos de excesso de faltas',
					'Mapeamento de quedas bruscas de rendimento',
					'Cruzamento de inadimplência com risco acadêmico',
					'Abertura de protocolos de intervenção pedagógica',
					'Acionamento automático do coordenador de curso',
					'Workflow de resgate por telefone e WhatsApp',
					'Registro de encaminhamentos e tutorias',
					'Histórico completo de atendimentos do aluno',
					'Feedback de sucesso ou falha na retenção',
					'Acompanhamento em tempo real das rematrículas',
					'Alerta de elegíveis não rematriculados',
					'Gestão de pendências que bloqueiam a renovação',
					'Fluxo de aprovação para solicitações de trancamento',
					'Entrevista de desligamento integrada',
					'Painel de motivos de cancelamento',
					'Campanhas automáticas de reingresso',
					'Metas de retenção por polo ou campus',
					'Pesquisas de satisfação (NPS acadêmico)',
					'Relatório de perdas financeiras por evasão',
				),
			),

			array(
				'chave'  => 'documentos',
				'nome'   => 'Documentos, biblioteca e assinatura',
				'resumo' => 'O dossiê do aluno digitalizado e o contrato assinado eletronicamente, com trilha de auditoria.',
				'icone'  => 'pasta',
				'url'    => array( 'biblioteca', 'biblioteca-e-ged' ),
				'itens'  => array(
					'GED: dossiê do aluno digitalizado',
					'Gestão de contratos e assinaturas digitais',
					'Guarda de contratos assinados com trilha de auditoria',
					'Biblioteca e controle completo de acervo',
					'Empréstimo, reserva e devolução',
					'Busca por aluno, curso, turma ou período',
					'Configuração ilimitada de layouts de e-mail',
					'Mensageria com variáveis dinâmicas',
					'Mural de recados institucional',
					'Histórico centralizado de comunicações',
				),
			),

			array(
				'chave'  => 'bi',
				'nome'   => 'BI, indicadores e segurança',
				'resumo' => 'O painel que a mantenedora abre, e o controle de quem pode ver o quê.',
				'icone'  => 'grafico',
				'url'    => 'bi',
				'itens'  => array(
					'Visões gerenciais e painel Query Viewer',
					'Configurações de visões personalizadas (BI)',
					'Dashboard executivo de evasão',
					'Análise dinâmica de recebimentos',
					'Apuração de valor líquido por competência e categoria',
					'Gráficos de retenção por curso e turma',
					'Mapa de calor de acessos e engajamento',
					'Cruzamento financeiro com rematrícula',
					'Indicadores por curso, turno e polo',
					'Perfis e permissões granulares',
					'Autenticação em dois fatores (2FA)',
					'Registro de acesso à base, para a LGPD',
				),
			),
		),

		// =====================================================================
		'educacao-basica' => array(

			array(
				'chave'  => 'captacao',
				'nome'   => 'Captação e matrícula nova',
				'resumo' => 'Da visita da família à assinatura do contrato, com o funil visível para a direção.',
				'icone'  => 'funil',
				'url'    => 'captacao',
				'itens'  => array(
					'Formulário de interesse e agendamento de visita',
					'Funil de captação por série pretendida',
					'Lista de espera e controle de vagas por turma',
					'Campanhas de matrícula com origem rastreada',
					'Ficha de matrícula online preenchida pela família',
					'Contrato gerado com o plano e os descontos certos',
					'Assinatura eletrônica pelo responsável',
					'Conversão de interessado em matriculado sem redigitar',
					'Relatório de conversão por campanha e por série',
				),
			),

			array(
				'chave'  => 'secretaria',
				'nome'   => 'Secretaria escolar',
				'resumo' => 'Matrícula, enturmação, transferência e documento, com o histórico escolar saindo pronto.',
				'icone'  => 'academico',
				'url'    => 'gestao-academica',
				'itens'  => array(
					'Matrícula e rematrícula online',
					'Rematrícula em lote por série ou turma',
					'Campanha de rematrícula com painel de adesão ao vivo',
					'Enturmação e remanejamento de alunos',
					'Transferência de entrada e de saída',
					'Ficha do aluno com saúde, alergias e autorizações',
					'Cadastro de responsáveis legal e financeiro',
					'Histórico escolar e declarações',
					'Configuração paramétrica de documentos',
					'Controle de dias letivos e reposição',
					'Calendário escolar por segmento e por unidade',
					'Auditoria e log de alterações',
				),
			),

			array(
				'chave'  => 'sala',
				'nome'   => 'Sala de aula e avaliação',
				'resumo' => 'O professor lança uma vez, na origem. O boletim, a ficha e o conselho se montam sozinhos.',
				'icone'  => 'documento',
				'url'    => 'gestao-academica',
				'itens'  => array(
					'Diário de classe digital',
					'Chamada e registro de frequência',
					'Lançamento de notas por bimestre ou trimestre',
					'Conceito e parecer descritivo na educação infantil',
					'Campos de experiência da BNCC na infantil',
					'Boletim e ficha individual do aluno',
					'Conselho de classe com registro de decisões',
					'Recuperação paralela e recuperação final',
					'Progressão parcial e dependência',
					'Plano de aula e conteúdo programático',
					'Calendário de provas e trabalhos',
					'Ocorrências disciplinares e pedagógicas',
					'Justificativa de faltas em massa',
					'Fechamento de período com trava de nota',
				),
			),

			array(
				'chave'  => 'conformidade',
				'nome'   => 'Censo Escolar e conformidade',
				'resumo' => 'Educação básica não responde ao MEC como uma faculdade: quem cobra é o Conselho e a Secretaria.',
				'icone'  => 'escudo',
				'url'    => 'gestao-academica',
				'itens'  => array(
					'Exportação dos dados no formato do Educacenso',
					'Dados de matrícula, turma e docente já consistidos',
					'Documentação no padrão do Conselho Estadual ou Municipal',
					'Histórico e transferência no padrão da rede',
					'Controle de carga horária e dias letivos',
					'Consentimento do responsável registrado (LGPD)',
					'Registro de acesso a dado de menor de idade',
				),
			),

			array(
				'chave'  => 'financeiro',
				'nome'   => 'Financeiro da escola',
				'resumo' => 'Mensalidade, material, contraturno e uniforme na mesma conta. A inadimplência aparece cedo.',
				'icone'  => 'dinheiro',
				'url'    => array( 'financeiro', 'gestao-financeira' ),
				'itens'  => array(
					'Mensalidade, material didático e taxas',
					'Contraturno, integral e atividades extras',
					'Boleto, Pix e cartão recorrente',
					'Conciliação instantânea de Pix via Getnet',
					'Régua de cobrança automatizada',
					'Cálculo automático de juros e multas',
					'Portal de renegociação para o responsável',
					'Histórico e gestão centralizada de acordos',
					'Monitoramento ativo de inadimplentes',
					'Financeiro individualizado por aluno e por responsável',
					'Lançamento de cobranças avulsas',
					'Fluxo de caixa integrado: a receber x a pagar',
					'Rateio por centro de custo e por unidade',
					'Gestão de fornecedores e prestadores',
					'Baixa automatizada de pagamentos',
					'DRE e classificação por plano de contas',
				),
			),

			array(
				'chave'  => 'bolsas',
				'nome'   => 'Bolsas, descontos e convênios',
				'resumo' => 'Desconto de irmão, bolsa social e convênio de empresa aplicados por regra, não um a um.',
				'icone'  => 'assinatura',
				'url'    => array( 'financeiro', 'gestao-financeira' ),
				'itens'  => array(
					'Parametrização de categorias de desconto',
					'Desconto de irmão e de pagamento antecipado',
					'Bolsa parcial e bolsa integral',
					'Convênio com empresas e entidades',
					'Planos financeiros por série',
					'Reajuste anual aplicado por regra',
					'Relatório de renúncia de receita por bolsa',
				),
			),

			array(
				'chave'  => 'fiscal',
				'nome'   => 'Nota fiscal e obrigações',
				'resumo' => 'Emissão automática, incluindo o informe de pagamento que a família pede em março.',
				'icone'  => 'documento',
				'url'    => array( 'financeiro', 'gestao-financeira' ),
				'itens'  => array(
					'Emissão 100% automática de notas fiscais',
					'Transmissão direta para a prefeitura',
					'Emissão vinculada à liquidação do pagamento',
					'Informe de pagamento anual para o imposto de renda',
					'Tratamento de múltiplos CNPJs e unidades',
					'Relatório de notas emitidas e canceladas',
				),
			),

			array(
				'chave'  => 'familia',
				'nome'   => 'Família, aluno e comunicação',
				'resumo' => 'O que hoje vira ligação para a secretaria, o responsável resolve sozinho pelo app.',
				'icone'  => 'celular',
				'url'    => 'portais',
				'itens'  => array(
					'App e portal do responsável',
					'Portal do aluno, com acesso por idade',
					'Boletim, faltas e ocorrências em tempo real',
					'Segunda via de boleto sem ligar na escola',
					'Comunicados com confirmação de leitura',
					'Agenda, calendário e cardápio',
					'Autorização de saída e de passeio',
					'Mural da turma e recados do professor',
					'Mensageria com variáveis dinâmicas',
					'Histórico centralizado de comunicações',
					'Atendimento e protocolo pela secretaria virtual',
					'Upload de documento pedido pela escola',
				),
			),

			array(
				'chave'  => 'aula-online',
				'nome'   => 'Ambiente de aula e material',
				'resumo' => 'AVA próprio para lição de casa, material complementar e avaliação online.',
				'icone'  => 'monitor',
				'url'    => 'portais',
				'itens'  => array(
					'AVA próprio, no mesmo login do portal',
					'Material complementar por disciplina e turma',
					'Lição de casa com entrega online',
					'Avaliação online com correção da parte objetiva',
					'Nota da avaliação caindo direto no diário',
					'Acompanhamento de acesso e de entrega',
					'Integração com o ambiente de aula já em uso',
				),
			),

			array(
				'chave'  => 'retencao',
				'nome'   => 'Retenção e rematrícula',
				'resumo' => 'A escola descobre quem não vai voltar em outubro, não em fevereiro.',
				'icone'  => 'pessoas',
				'url'    => 'retencao',
				'itens'  => array(
					'Risco de não rematrícula por aluno',
					'Cruzamento de nota, frequência e inadimplência',
					'Painel semafórico por série e turma',
					'Alerta de elegíveis que ainda não renovaram',
					'Gestão de pendências que travam a renovação',
					'Fila de contato para a coordenação',
					'Registro de tratativas com a família',
					'Motivo de saída categorizado',
					'Entrevista de desligamento',
					'Campanha de retorno de ex-aluno',
					'Pesquisa de satisfação com a família (NPS)',
					'Relatório de perda de receita por evasão',
				),
			),

			array(
				'chave'  => 'documentos',
				'nome'   => 'Documentos, biblioteca e arquivo',
				'resumo' => 'A pasta do aluno digitalizada, com busca por nome, turma ou ano.',
				'icone'  => 'pasta',
				'url'    => array( 'biblioteca', 'biblioteca-e-ged' ),
				'itens'  => array(
					'GED: documento do aluno digitalizado',
					'Guarda de contratos assinados',
					'Histórico e transferência sem papel',
					'Biblioteca e controle de acervo',
					'Empréstimo, reserva e devolução',
					'Busca por aluno, turma ou ano letivo',
					'Registro de acesso ao documento',
				),
			),

			array(
				'chave'  => 'bi',
				'nome'   => 'Direção, indicadores e segurança',
				'resumo' => 'O painel da mantenedora: ocupação de vagas, inadimplência e desempenho, unidade a unidade.',
				'icone'  => 'grafico',
				'url'    => 'bi',
				'itens'  => array(
					'Painel de indicadores da escola',
					'Ocupação de vagas e projeção do ano',
					'Inadimplência por série e por unidade',
					'Desempenho por turma e por disciplina',
					'Evasão e risco de não rematrícula',
					'Consolidado da mantenedora com várias unidades',
					'Relatórios prontos para reunião de conselho',
					'Perfis e permissões por função',
					'Autenticação em dois fatores (2FA)',
					'Registro de acesso à base, para a LGPD',
				),
			),
		),

		// =====================================================================
		'cursos-online' => array(

			array(
				'chave'  => 'catalogo',
				'nome'   => 'Catálogo e oferta',
				'resumo' => 'O que você vende, como está embalado e por quanto. Tudo configurável sem pedir para o TI.',
				'icone'  => 'pasta',
				'url'    => 'cursos-online',
				'itens'  => array(
					'Catálogo de cursos com ementa e carga horária',
					'Curso avulso, combo e trilha de formação',
					'Turma com data de início e turma sempre aberta',
					'Pré-venda e lista de espera',
					'Página de venda por curso',
					'Preço promocional com data de início e fim',
					'Curso gratuito para captação de lead',
					'Controle de vagas por turma',
				),
			),

			array(
				'chave'  => 'pagamento',
				'nome'   => 'Pagamento e checkout',
				'resumo' => 'O aluno paga e entra. Se a assinatura cai, o acesso fecha sem ninguém precisar lembrar.',
				'icone'  => 'dinheiro',
				'url'    => array( 'financeiro', 'gestao-financeira' ),
				'itens'  => array(
					'Checkout com Pix, cartão de crédito e boleto',
					'Conciliação instantânea de Pix via Getnet',
					'Assinatura recorrente mensal e anual',
					'Parcelamento com juros configuráveis',
					'Cupom de desconto com regra e validade',
					'Campanha promocional por período',
					'Liberação automática do acesso na confirmação',
					'Bloqueio automático quando a assinatura falha',
					'Régua de cobrança automatizada',
					'Portal de renegociação para o aluno',
					'Cálculo automático de juros e multas',
					'Reembolso e cancelamento com registro',
					'Nota fiscal emitida junto com o pagamento',
					'Transmissão direta para a prefeitura',
					'Fluxo de caixa e DRE da operação',
				),
			),

			array(
				'chave'  => 'ava',
				'nome'   => 'Aula no AVA próprio',
				'resumo' => 'Vídeo, material e trilha de progresso dentro do mesmo sistema da venda.',
				'icone'  => 'monitor',
				'url'    => 'portais',
				'itens'  => array(
					'AVA próprio, desenvolvido pela Send',
					'Aula em vídeo com controle de progresso',
					'Material complementar para download',
					'Trilha com liberação por etapa concluída',
					'Retomar de onde parou, no celular ou no computador',
					'Fórum e mensagens entre aluno e tutor',
					'Aviso e comunicado por turma',
					'Ambiente com a marca da sua escola',
					'Relatório de acesso e de progresso por aluno',
					'Integração com o ambiente de aula já em uso',
				),
			),

			array(
				'chave'  => 'avaliacao',
				'nome'   => 'Avaliação online',
				'resumo' => 'Prova dentro da aula, corrigida na hora, com a nota entrando no histórico do aluno.',
				'icone'  => 'escudo',
				'url'    => 'cursos-online',
				'itens'  => array(
					'Banco de questões reaproveitável entre cursos',
					'Questão de múltipla escolha com correção automática',
					'Questão dissertativa com correção do tutor',
					'Questionário de fixação por módulo',
					'Tentativas, tempo limite e nota mínima',
					'Embaralhamento de questões e alternativas',
					'Nota registrada no histórico, sem planilha à parte',
					'Fila de correção para a equipe',
					'Relatório de desempenho por questão',
					'Recuperação e nova tentativa configurável',
				),
			),

			array(
				'chave'  => 'certificado',
				'nome'   => 'Certificado e validação',
				'resumo' => 'Bateu a regra, o certificado sai sozinho, com código público para quem contrata poder conferir.',
				'icone'  => 'academico',
				'url'    => 'cursos-online',
				'itens'  => array(
					'Regra de conclusão configurável por curso',
					'Emissão automática, sem passar pelo suporte',
					'Modelo com a marca e a assinatura da escola',
					'Carga horária e conteúdo programático no verso',
					'Código único por certificado',
					'Página pública de validação do código',
					'Segunda via pelo portal do aluno',
					'Revogação de certificado com registro',
					'Relatório de certificados emitidos por período',
				),
			),

			array(
				'chave'  => 'alunos',
				'nome'   => 'Alunos e atendimento',
				'resumo' => 'A base de quem comprou, em que pé está e o que já pediu para o suporte.',
				'icone'  => 'pessoas',
				'url'    => 'requerimentos',
				'itens'  => array(
					'Cadastro único do aluno entre cursos',
					'Histórico de compras e de conclusões',
					'Portal do aluno web e mobile',
					'Abertura de chamado pelo portal',
					'SLA por tipo de solicitação',
					'Histórico de interações e chat',
					'Upload de documento quando exigido',
					'Notificação de mudança de status',
					'Turmas corporativas com gestor da empresa',
					'Relatório de progresso para o RH contratante',
				),
			),

			array(
				'chave'  => 'marketing',
				'nome'   => 'Captação e recuperação',
				'resumo' => 'De onde vem quem compra, e o que fazer com quem chegou até o checkout e não pagou.',
				'icone'  => 'funil',
				'url'    => 'captacao',
				'itens'  => array(
					'Funil de captação com etapas configuráveis',
					'Origem do lead rastreada por campanha',
					'Recuperação de checkout abandonado',
					'Campanha para quem comprou e não começou',
					'Campanha de retorno de ex-aluno',
					'Mensageria com variáveis dinâmicas',
					'Pesquisa de satisfação (NPS)',
					'Relatório de conversão por campanha',
				),
			),

			array(
				'chave'  => 'engajamento',
				'nome'   => 'Engajamento e conclusão',
				'resumo' => 'Quem comprou e não voltou é o seu maior custo escondido. Aqui ele aparece.',
				'icone'  => 'grafico',
				'url'    => 'retencao',
				'itens'  => array(
					'Alerta de aluno sem acesso há X dias',
					'Painel semafórico de risco de abandono',
					'Ponto do curso em que a turma trava',
					'Taxa de conclusão por curso e por turma',
					'Disparo automático de lembrete de aula',
					'Campanha de resgate por e-mail e WhatsApp',
					'Registro de tratativas por aluno',
					'Motivo de cancelamento categorizado',
					'Relatório de perda de receita por cancelamento',
				),
			),

			array(
				'chave'  => 'bi',
				'nome'   => 'Indicadores e segurança',
				'resumo' => 'Um painel só com venda, progresso, conclusão e inadimplência.',
				'icone'  => 'grafico',
				'url'    => 'bi',
				'itens'  => array(
					'Faturamento por curso, turma e período',
					'Receita recorrente e cancelamentos',
					'Conversão da página de venda ao pagamento',
					'Progresso e conclusão por coorte',
					'Inadimplência da carteira de assinantes',
					'Visões personalizadas de relatório',
					'Perfis e permissões por função',
					'Autenticação em dois fatores (2FA)',
					'Registro de acesso à base, para a LGPD',
				),
			),
		),
	);

	return isset( $catalogo[ $slug ] ) ? $catalogo[ $slug ] : array();
}

/** Quantos módulos e quantas funcionalidades o segmento tem. */
function se_modulos_contagem( $slug ) {
	$modulos = se_modulos_segmento( $slug );
	$itens   = 0;
	foreach ( $modulos as $m ) {
		$itens += count( $m['itens'] );
	}
	return array( 'modulos' => count( $modulos ), 'itens' => $itens );
}

/**
 * O catálogo completo, em bloco editorial.
 *
 * De propósito NÃO é mais uma grade de cartões: é uma lista por categoria,
 * separada por filete, com a coluna da esquerda acompanhando a rolagem. Um
 * catálogo de cem itens dentro de cartõezinhos vira ruído.
 */
function se_bloco_modulos( $slug, $cor ) {
	$modulos = se_modulos_segmento( $slug );
	if ( ! $modulos ) {
		return;
	}
	$conta = se_modulos_contagem( $slug );
	?>
	<section id="catalogo" class="relative py-24 scroll-mt-20">
		<div class="container mx-auto px-6 max-w-6xl">

			<div class="grid lg:grid-cols-12 gap-x-16 gap-y-10 mb-16 reveal">
				<div class="lg:col-span-6">
					<span class="font-bold tracking-widest uppercase text-xs" style="color:<?php echo esc_attr( $cor ); ?>">Catálogo completo</span>
					<h2 class="titulo text-[2.2rem] md:text-5xl leading-[1.02] mt-5">
						Tudo o que entra<br>na sua operação
					</h2>
				</div>
				<div class="lg:col-span-6 flex flex-col justify-end">
					<p class="text-lg text-slate-400 leading-relaxed">
						Não é uma lista de promessas: é o que já está no sistema, agrupado por área.
						<span class="text-white font-semibold"><?php echo (int) $conta['modulos']; ?> módulos</span> e
						<span class="text-white font-semibold"><?php echo (int) $conta['itens']; ?> funcionalidades</span>
						configuradas para este segmento, a implantação liga o que faz sentido para o seu porte.
					</p>
				</div>
			</div>

			<div class="space-y-0">
				<?php foreach ( $modulos as $i => $m ) :
					$url = se_url_pagina( $m['url'] );
					?>
					<div class="se-mod-bloco grid lg:grid-cols-12 gap-x-16 gap-y-6 py-10 regra reveal">

						<div class="lg:col-span-4">
							<div class="fixa">
								<div class="flex items-start gap-3.5">
									<span class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0"
									      style="background:<?php echo esc_attr( $cor ); ?>1f;border:1px solid <?php echo esc_attr( $cor ); ?>4d">
										<svg class="w-5 h-5" style="color:<?php echo esc_attr( $cor ); ?>" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><?php echo se_menu_icone( $m['icone'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?></svg>
									</span>
									<div>
										<h3 class="titulo-mini text-white text-xl leading-tight"><?php echo esc_html( $m['nome'] ); ?></h3>
										<span class="text-[11px] font-bold uppercase tracking-widest text-slate-500 mt-1.5 block"><?php echo count( $m['itens'] ); ?> funcionalidades</span>
									</div>
								</div>
								<p class="text-slate-400 text-[15px] leading-relaxed mt-4"><?php echo esc_html( $m['resumo'] ); ?></p>

								<div class="flex flex-wrap items-center gap-x-6 gap-y-2 mt-4">
									<?php if ( $url ) : ?>
										<a href="<?php echo esc_url( $url ); ?>" class="inline-flex items-center gap-1.5 text-sm font-bold text-blue-300 hover:text-white transition-colors">Ver o módulo <span aria-hidden="true">&rarr;</span></a>
									<?php endif; ?>
									<?php // No celular a lista inteira soma quase vinte telas: aqui ela abre sob demanda. ?>
									<button type="button" class="se-mod-abre lg:hidden inline-flex items-center gap-1.5 text-sm font-bold text-slate-300 hover:text-white transition-colors" aria-expanded="false">
										<span class="se-mod-rotulo">Ver as <?php echo count( $m['itens'] ); ?> funcionalidades</span>
										<svg class="se-chevron w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
									</button>
								</div>
							</div>
						</div>

						<div class="lg:col-span-8">
							<ul class="se-mod-lista grid sm:grid-cols-2 gap-x-8 gap-y-2.5">
								<?php foreach ( $m['itens'] as $item ) : ?>
									<li class="flex items-start gap-2.5 text-[14.5px] text-slate-300 leading-snug">
										<svg class="w-4 h-4 shrink-0 mt-[3px]" style="color:<?php echo esc_attr( $cor ); ?>" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
										<?php echo esc_html( $item ); ?>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="regra pt-10 mt-2 flex flex-wrap items-center justify-between gap-6 reveal">
				<p class="text-slate-400 max-w-lg leading-relaxed">
					Nenhuma instituição usa tudo no primeiro dia. Na demonstração a gente marca o que faz sentido para o seu porte e mostra só isso rodando.
				</p>
				<button onclick="abrirDemo('<?php echo esc_attr( $slug ); ?>')" class="gbtn text-white font-bold px-7 py-3.5 rounded-2xl transition-all hover:-translate-y-0.5 shrink-0">Montar a minha lista</button>
			</div>

		</div>
	</section>

	<script>
	(function () {
		// Desktop mostra o catálogo inteiro; no celular cada módulo abre sob
		// demanda. Sai fechado só quando há JS, sem ele, tudo continua visível.
		var telaPequena = window.matchMedia('(max-width: 1023px)');

		function aplicar() {
			document.querySelectorAll('#catalogo .se-mod-lista').forEach(function (lista) {
				var bloco = lista.closest('.se-mod-bloco');
				var botao = bloco ? bloco.querySelector('.se-mod-abre') : null;
				if (!botao) return;
				if (telaPequena.matches) {
					lista.classList.add('hidden');
					botao.setAttribute('aria-expanded', 'false');
					botao.classList.remove('se-acc-aberto');
				} else {
					lista.classList.remove('hidden');
				}
			});
		}

		document.querySelectorAll('#catalogo .se-mod-abre').forEach(function (botao) {
			botao.addEventListener('click', function () {
				var bloco = botao.closest('.se-mod-bloco');
				var lista = bloco ? bloco.querySelector('.se-mod-lista') : null;
				if (!lista) return;
				var aberto = !lista.classList.toggle('hidden');
				botao.setAttribute('aria-expanded', aberto ? 'true' : 'false');
				botao.classList.toggle('se-acc-aberto', aberto);
				var rotulo = botao.querySelector('.se-mod-rotulo');
				if (rotulo) rotulo.textContent = aberto ? 'Esconder' : rotulo.dataset.abrir;
			});
			var rotulo = botao.querySelector('.se-mod-rotulo');
			if (rotulo) rotulo.dataset.abrir = rotulo.textContent;
		});

		aplicar();
		telaPequena.addEventListener('change', aplicar);
	})();
	</script>
	<?php
}
