<?php
/**
 * Mega menu do cabeçalho.
 *
 * Estrutura em três faixas, no padrão que o mercado de SaaS usa: coluna de
 * categorias à esquerda, painel de itens no centro e trilho de destaques à
 * direita, com um rodapé de atalhos.
 *
 * A navegação principal passou a viver AQUI, em código, e não mais no
 * Aparência > Menus: um menu de administrador não consegue expressar título,
 * descrição, ícone e agrupamento por aba sem virar uma gambiarra de classes
 * CSS em item de menu. O preço é que incluir uma entrada nova exige editar
 * este arquivo — em troca, desktop e celular saem sempre do mesmo lugar.
 *
 * @see se_segmentos() — os três segmentos continuam com fonte única própria.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Resolve a URL de uma página aceitando mais de um slug possível.
 *
 * Local e produção divergiram em dois casos (financeiro/gestao-financeira e
 * biblioteca/biblioteca-e-ged) e isso já rendeu link quebrado no rodapé.
 * Aqui a primeira página que existir de verdade ganha.
 *
 * @param string|string[] $slugs
 */
function se_url_pagina( $slugs ) {
	foreach ( (array) $slugs as $slug ) {
		$pagina = get_page_by_path( $slug );
		if ( $pagina && $pagina->post_status === 'publish' ) {
			return get_permalink( $pagina );
		}
	}

	// Nenhuma das páginas existe. Devolve vazio de propósito: se_menu_limpar()
	// tira a entrada do menu em vez de publicar um link que dá 404.
	return '';
}

/**
 * Poda o menu: some com item cuja página não existe naquela instalação e com
 * aba que ficou sem nenhum item.
 *
 * Local e produção nunca tiveram exatamente o mesmo conjunto de páginas
 * (assinatura, bi, captacao e seguranca só existem em produção). Em vez de
 * manter uma lista paralela para cada ambiente, o menu se ajusta ao que
 * realmente está publicado.
 */
function se_menu_limpar( $mega ) {
	foreach ( $mega as $i => $entrada ) {

		// Painel de colunas: poda item por item e some com a coluna vazia.
		if ( ! empty( $entrada['colunas'] ) ) {
			foreach ( $entrada['colunas'] as $j => $col ) {

				if ( ! empty( $col['destaque'] ) ) {
					if ( empty( $col['url'] ) ) {
						unset( $mega[ $i ]['colunas'][ $j ] );
					}
					continue;
				}

				$col['itens'] = array_values( array_filter( $col['itens'], function ( $item ) {
					return ! empty( $item['url'] );
				} ) );

				if ( $col['itens'] || ! empty( $col['posts'] ) ) {
					$mega[ $i ]['colunas'][ $j ] = $col;
				} else {
					unset( $mega[ $i ]['colunas'][ $j ] );
				}
			}
			$mega[ $i ]['colunas'] = array_values( $mega[ $i ]['colunas'] );
			if ( ! $mega[ $i ]['colunas'] ) {
				unset( $mega[ $i ] );
			}
			continue;
		}

		if ( empty( $entrada['abas'] ) ) {
			if ( isset( $entrada['url'] ) && $entrada['url'] === '' ) {
				unset( $mega[ $i ] );
			}
			continue;
		}

		foreach ( $entrada['abas'] as $j => $aba ) {
			$aba['itens'] = array_values( array_filter( $aba['itens'], function ( $item ) {
				return ! empty( $item['url'] );
			} ) );

			if ( ! $aba['itens'] ) {
				unset( $mega[ $i ]['abas'][ $j ] );
				continue;
			}

			// A aba apontava para uma página ausente: usa o primeiro item que sobrou.
			if ( empty( $aba['url'] ) ) {
				$aba['url'] = $aba['itens'][0]['url'];
			}

			$mega[ $i ]['abas'][ $j ] = $aba;
		}

		$mega[ $i ]['abas'] = array_values( $mega[ $i ]['abas'] );
		if ( ! $mega[ $i ]['abas'] ) {
			unset( $mega[ $i ] );
			continue;
		}

		// Mesma poda no trilho e no rodapé.
		if ( ! empty( $entrada['trilho'] ) ) {
			foreach ( $entrada['trilho'] as $k => $bloco ) {
				if ( empty( $bloco['links'] ) ) {
					continue;
				}
				$bloco['links'] = array_values( array_filter( $bloco['links'], function ( $l ) {
					return ! empty( $l[1] );
				} ) );
				if ( $bloco['links'] ) {
					$mega[ $i ]['trilho'][ $k ] = $bloco;
				} else {
					unset( $mega[ $i ]['trilho'][ $k ] );
				}
			}
			$mega[ $i ]['trilho'] = array_values( $mega[ $i ]['trilho'] );
		}

		if ( ! empty( $entrada['rodape'] ) ) {
			$mega[ $i ]['rodape'] = array_values( array_filter( $entrada['rodape'], function ( $r ) {
				return ! empty( $r[1] );
			} ) );
		}
	}

	return array_values( $mega );
}

/** Ícones do menu, em traço, no mesmo peso do resto do site. */
function se_menu_icone( $nome ) {
	$icones = array(
		'academico'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5 2.5 9 12 13.5 21.5 9 12 4.5z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M6 11v5c0 1.2 2.7 2.8 6 2.8s6-1.6 6-2.8v-5"></path>',
		'escola'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V8l7-4 7 4v13"></path><path stroke-linecap="round" stroke-linejoin="round" d="M10 21v-5h4v5"></path>',
		'monitor'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 5.5a2 2 0 012-2h14a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2v-9z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M9 20.5h6M12 16.5v4"></path>',
		'dinheiro'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.7 0-3 .9-3 2s1.3 2 3 2 3 .9 3 2-1.3 2-3 2m0-8V7m0 9v1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
		'documento'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.6a1 1 0 01.7.3l5.4 5.4a1 1 0 01.3.7V19a2 2 0 01-2 2z"></path>',
		'assinatura'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"></path><path stroke-linecap="round" stroke-linejoin="round" d="M18.5 2.5a2.1 2.1 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>',
		'pessoas'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.4-1.9M17 20H7m10 0v-2c0-.7-.1-1.3-.4-1.9M7 20H2v-2a3 3 0 015.4-1.9M7 20v-2c0-.7.1-1.3.4-1.9m0 0a5 5 0 019.2 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>',
		'escudo'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.6-4A12 12 0 0112 2.9 12 12 0 013.4 6 12 12 0 003 9c0 5.6 3.8 10.3 9 11.6 5.2-1.3 9-6 9-11.6 0-1-.1-2-.4-3z"></path>',
		'funil'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 5h16M7 10h10M10 15h4M11 19h2"></path>',
		'grafico'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l-4 2v11M9 19l6-3M9 19H5M15 16V5l4-2v11l-4 2z"></path>',
		'pasta'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"></path>',
		'celular'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M8 3h8a2 2 0 012 2v14a2 2 0 01-2 2H8a2 2 0 01-2-2V5a2 2 0 012-2z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M11 18h2"></path>',
		'artigo'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h9l5 5v11a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h8M8 16h5"></path>',
		'ajuda'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.2 9a3.8 3.8 0 117.4 1.2c-.5 1.5-2.6 2-2.6 3.8M12 17.5h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
		'apresentacao'=> '<path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16v11H4z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v5M8 20h8M12 4V2"></path>',
		'predio'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16M3 21h18M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5h4v5"></path>',
		'cadeado'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>',
	);

	return isset( $icones[ $nome ] ) ? $icones[ $nome ] : $icones['documento'];
}

/**
 * A árvore inteira do menu. Cada entrada de topo é ou um link simples
 * ('url') ou um painel ('abas' + 'trilho' + 'rodape').
 */
function se_menu_mega() {
	static $cache = null;
	if ( $cache === null ) {
		$cache = se_menu_limpar( se_menu_mega_bruto() );
	}
	return $cache;
}

/** A árvore como está escrita, antes da poda. */
function se_menu_mega_bruto() {
	$demo = home_url( '/apresentacao' );

	// ---- Segmentos: são três. Painel com abas, trilho e rodapé para três
	// itens gerava seis links para a mesma página; aqui é um item por coluna.
	$colunas_segmentos = array();
	foreach ( se_segmentos() as $slug => $s ) {
		$colunas_segmentos[] = array(
			'destaque'  => true,
			'icone'     => ( $slug === 'ensino-superior' ? 'academico' : ( $slug === 'educacao-basica' ? 'escola' : 'monitor' ) ),
			'cor'       => $s['cor'],
			'titulo'    => $s['nome'],
			'descricao' => $s['resumo'],
			'publico'   => $s['publico'],
			'cta'       => 'Ver a solução',
			'url'       => se_segmento_url( $slug ),
		);
	}

	return array(

		array(
			'chave'   => 'segmentos',
			'rotulo'  => 'Segmentos',
			'layout'  => 'colunas',
			'colunas' => $colunas_segmentos,
		),

		array(
			'chave'  => 'modulos',
			'rotulo' => 'Módulos',
			'abas'   => array(
				array(
					'chave'     => 'academico',
					'rotulo'    => 'Acadêmico',
					'icone'     => 'academico',
					'cor'       => '#4a78b0',
					'titulo'    => 'Secretaria e vida acadêmica',
					'descricao' => 'Matrícula, notas, histórico e documentos — a informação lançada uma vez só, na origem.',
					'cta'       => 'Ver gestão acadêmica',
					'url'       => se_url_pagina( 'gestao-academica' ),
					'itens'     => array(
						array( 'nome' => 'Gestão Acadêmica', 'desc' => 'Matrícula, rematrícula, notas, histórico e diploma digital', 'url' => se_url_pagina( 'gestao-academica' ), 'icone' => 'academico' ),
						array( 'nome' => 'Central de Requerimentos', 'desc' => 'Protocolos do aluno com prazo e responsável definidos', 'url' => se_url_pagina( 'requerimentos' ), 'icone' => 'documento' ),
						array( 'nome' => 'Biblioteca & GED', 'desc' => 'Documento do aluno digitalizado e controle de acervo', 'url' => se_url_pagina( array( 'biblioteca', 'biblioteca-e-ged' ) ), 'icone' => 'pasta' ),
					),
				),
				array(
					'chave'     => 'financeiro',
					'rotulo'    => 'Financeiro',
					'icone'     => 'dinheiro',
					'cor'       => '#56b2cb',
					'titulo'    => 'Cobrança sob controle',
					'descricao' => 'Do lançamento ao caixa: boleto, Pix, recorrência, acordo e contrato assinado.',
					'cta'       => 'Ver gestão financeira',
					'url'       => se_url_pagina( array( 'financeiro', 'gestao-financeira' ) ),
					'itens'     => array(
						array( 'nome' => 'Gestão Financeira', 'desc' => 'Boleto, Pix, régua de cobrança, acordos e DRE', 'url' => se_url_pagina( array( 'financeiro', 'gestao-financeira' ) ), 'icone' => 'dinheiro' ),
						array( 'nome' => 'Assinatura & Contratos', 'desc' => 'Contrato eletrônico com validade e trilha de auditoria', 'url' => se_url_pagina( 'assinatura' ), 'icone' => 'assinatura' ),
					),
				),
				array(
					'chave'     => 'aula',
					'rotulo'    => 'Aluno e sala de aula',
					'icone'     => 'monitor',
					'cor'       => '#2b2d81',
					'titulo'    => 'O ambiente de quem estuda',
					'descricao' => 'AVA próprio, portais e app — com o acesso do aluno alimentando o alerta de evasão.',
					'cta'       => 'Ver portais e AVA',
					'url'       => se_url_pagina( 'portais' ),
					'itens'     => array(
						// Os dois itens levavam à mesma página; viraram um só.
						array( 'nome' => 'Portais, app e AVA', 'desc' => 'Aluno, família, docente e polo no mesmo login — web e celular', 'url' => se_url_pagina( 'portais' ), 'icone' => 'monitor' ),
						array( 'nome' => 'Retenção de Alunos', 'desc' => 'Risco de evasão cruzando nota, frequência e financeiro', 'url' => se_url_pagina( 'retencao' ), 'icone' => 'pessoas' ),
					),
				),
				array(
					'chave'     => 'dados',
					'rotulo'    => 'Captação e dados',
					'icone'     => 'funil',
					'cor'       => '#f59e0b',
					'titulo'    => 'Entrada de aluno e indicadores',
					'descricao' => 'Do primeiro contato ao painel da mantenedora, com a base protegida.',
					'cta'       => 'Ver CRM e captação',
					'url'       => se_url_pagina( 'captacao' ),
					'itens'     => array(
						array( 'nome' => 'CRM & Captação', 'desc' => 'Funil de leads, campanhas e recuperação de matrículas', 'url' => se_url_pagina( 'captacao' ), 'icone' => 'funil' ),
						array( 'nome' => 'BI & Indicadores', 'desc' => 'Evasão, faturamento e desempenho em tempo real', 'url' => se_url_pagina( 'bi' ), 'icone' => 'grafico' ),
						array( 'nome' => 'Segurança & LGPD', 'desc' => 'Perfis, 2FA e registro de acesso à base', 'url' => se_url_pagina( 'seguranca' ), 'icone' => 'cadeado' ),
					),
				),
			),
			'trilho' => array(
				array(
					'card'   => true,
					'titulo' => 'Já usa outro sistema?',
					'texto'  => 'A migração da base entra na implantação, conduzida por um consultor.',
					'cta'    => 'Conversar sobre a migração',
					'acao'   => 'demo',
				),
			),
		),

		array(
			'chave'   => 'recursos',
			'rotulo'  => 'Recursos',
			'layout'  => 'colunas',
			// Seis links no total. Antes eram abas + trilho + rodapé para isto.
			'colunas' => array(
				array(
					'titulo' => 'Conteúdo',
					'itens'  => array(
						array( 'nome' => 'Blog', 'desc' => 'Artigos por segmento, do superior ao curso livre', 'url' => home_url( '/blog' ), 'icone' => 'artigo' ),
						array( 'nome' => 'Visão geral da plataforma', 'desc' => 'A apresentação completa, módulo a módulo', 'url' => $demo, 'icone' => 'apresentacao' ),
					),
					'posts'  => true, // últimos artigos publicados
				),
				array(
					'titulo' => 'Já é cliente',
					'itens'  => array(
						array( 'nome' => 'Central de Ajuda', 'desc' => 'Documentação do sistema, passo a passo', 'url' => 'https://help.sendsolutions.com.br/', 'icone' => 'ajuda', 'externo' => true ),
						array( 'nome' => 'Suporte', 'desc' => 'Abertura e acompanhamento de chamados', 'url' => 'https://aplicacao.sendsolutions.com.br/TimeSheet/timesheet.login.aspx', 'icone' => 'escudo', 'externo' => true ),
					),
				),
				array(
					'titulo' => 'A empresa',
					'itens'  => array(
						array( 'nome' => 'Sobre nós', 'desc' => 'Software de gestão desde 1994, em educação desde 2019', 'url' => home_url( '/sobre' ), 'icone' => 'predio' ),
						array( 'nome' => 'Política de Privacidade', 'desc' => 'Como tratamos os dados, conforme a LGPD', 'url' => home_url( '/privacidade' ), 'icone' => 'cadeado' ),
					),
				),
			),
		),
	);
}

/** Os 3 artigos mais recentes, para o painel de Recursos. */
function se_menu_posts_recentes() {
	$posts = get_posts( array(
		'numberposts'      => 3,
		'post_status'      => 'publish',
		'suppress_filters' => false,
	) );

	$saida = array();
	foreach ( $posts as $p ) {
		$cats     = get_the_category( $p->ID );
		$saida[]  = array(
			'titulo'    => get_the_title( $p ),
			'url'       => get_permalink( $p ),
			'categoria' => $cats ? $cats[0]->name : '',
		);
	}
	return $saida;
}
