<?php
/**
 * Os três segmentos que o Send Educacional atende.
 *
 * Fonte única de verdade: a bifurcação da home, as páginas de cada segmento,
 * o formulário de demonstração (cargos e porte mudam conforme o segmento) e o
 * seeder de páginas leem tudo daqui. Mexer em um rótulo aqui muda o site
 * inteiro de uma vez — era exatamente o que faltava quando o site só falava
 * com ensino superior.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * @return array<string,array> Chave = slug da página.
 */
function se_segmentos() {
	return array(

		'ensino-superior' => array(
			'nome'      => 'Ensino Superior',
			'curto'     => 'Superior',
			'titulo'    => 'Faculdades, centros universitários e EAD',
			'resumo'    => 'Processo seletivo, secretaria acadêmica, Censo INEP, colação de grau, diploma digital e gestão de polos — com a regulação do MEC acompanhada de perto.',
			'cor'       => '#3b82f6',
			'publico'   => 'Mantenedores, reitorias, secretaria acadêmica e TI',
			// Rótulos usados no formulário
			'form_valor'   => 'Ensino superior',
			'cargos'       => array( 'Mantenedor(a) / Diretor(a)', 'Reitoria / Pró-reitoria', 'Coordenação de curso', 'Secretaria acadêmica', 'Financeiro', 'TI / Gestor(a) de sistemas' ),
			'porte_rotulo' => 'Qtd. de alunos',
			'porte'        => array( 'Até 500', '501 a 1.500', '1.501 a 3.000', '3.001 a 6.000', 'Mais de 6.000' ),
			'icone'        => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5 2.5 9 12 13.5 21.5 9 12 4.5z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M6 11v5c0 1.2 2.7 2.8 6 2.8s6-1.6 6-2.8v-5M20 10v5"></path>',
			// Nome + ícone: o mega menu do cabeçalho monta os cartões a partir daqui.
			'destaques' => array(
				array( 'nome' => 'Processo seletivo e vestibular online', 'icone' => 'funil' ),
				array( 'nome' => 'Censo INEP e ENADE sem retrabalho',     'icone' => 'grafico' ),
				array( 'nome' => 'Diploma digital e livro de registro',   'icone' => 'academico' ),
				array( 'nome' => 'Gestão de polos e turmas EAD',          'icone' => 'predio' ),
			),
		),

		'educacao-basica' => array(
			'nome'      => 'Educação Básica e Ensino Médio',
			'curto'     => 'Básica e Média',
			'titulo'    => 'Escolas de educação infantil, fundamental e ensino médio',
			'resumo'    => 'Matrícula e rematrícula, diário de classe, boletim, mensalidade e comunicação com a família no mesmo sistema — sem vocabulário de faculdade e sem planilha paralela.',
			'cor'       => '#14b8a6',
			'publico'   => 'Mantenedores, direção pedagógica, secretaria escolar e financeiro',
			'form_valor'   => 'Educação básica e ensino médio',
			'cargos'       => array( 'Mantenedor(a) / Diretor(a)', 'Direção pedagógica', 'Coordenação pedagógica', 'Secretaria escolar', 'Financeiro', 'TI / Gestor(a) de sistemas' ),
			'porte_rotulo' => 'Qtd. de alunos',
			'porte'        => array( 'Até 200', '201 a 500', '501 a 1.000', '1.001 a 2.000', 'Mais de 2.000' ),
			'icone'        => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V8l7-4 7 4v13"></path><path stroke-linecap="round" stroke-linejoin="round" d="M10 21v-5h4v5M9.5 10.5h5"></path>',
			'destaques' => array(
				array( 'nome' => 'Rematrícula em lote por série e turma', 'icone' => 'assinatura' ),
				array( 'nome' => 'Diário, boletim e conselho de classe',  'icone' => 'documento' ),
				array( 'nome' => 'Mensalidade, material e contraturno',   'icone' => 'dinheiro' ),
				array( 'nome' => 'Comunicação com a família por app',     'icone' => 'celular' ),
			),
		),

		'cursos-online' => array(
			'nome'      => 'Cursos e Venda Online',
			'curto'     => 'Cursos Online',
			'titulo'    => 'Cursos livres, profissionalizantes e corporativos',
			'resumo'    => 'Venda do curso com pagamento na hora, aula no AVA próprio, avaliação online e certificado emitido sozinho — sem juntar checkout, plataforma de aula e planilha de certificado.',
			'cor'       => '#a855f7',
			'publico'   => 'Fundadores, head de operações, produto e marketing',
			'form_valor'   => 'Cursos e venda online',
			'cargos'       => array( 'Fundador(a) / Sócio(a)', 'Head de operações', 'Gestor(a) de produto / conteúdo', 'Marketing', 'Financeiro', 'TI / Gestor(a) de sistemas' ),
			'porte_rotulo' => 'Alunos ativos hoje',
			'porte'        => array( 'Ainda vou lançar', 'Até 100', '101 a 500', '501 a 2.000', 'Mais de 2.000' ),
			'icone'        => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 5.5a2 2 0 012-2h14a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2v-9z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M9 20.5h6M12 16.5v4"></path><path fill="currentColor" stroke="none" d="M10.3 7.6l4 2.4-4 2.4V7.6z"></path>',
			'destaques' => array(
				array( 'nome' => 'Checkout com Pix, cartão e recorrência',   'icone' => 'dinheiro' ),
				array( 'nome' => 'Aula no AVA próprio, sem plugin extra',    'icone' => 'monitor' ),
				array( 'nome' => 'Avaliação online com correção automática', 'icone' => 'escudo' ),
				array( 'nome' => 'Certificado com código de validação',      'icone' => 'academico' ),
			),
		),
	);
}

/** Um segmento pelo slug, ou null. */
function se_segmento( $slug ) {
	$todos = se_segmentos();
	return isset( $todos[ $slug ] ) ? $todos[ $slug ] : null;
}

/** URL da página do segmento. */
function se_segmento_url( $slug ) {
	return home_url( '/' . $slug );
}

/**
 * A bifurcação de três caminhos. Sai na home logo abaixo do H1 e no rodapé
 * das páginas de segmento, para quem entrou na porta errada.
 *
 * @param string $atual  Slug do segmento em que o visitante já está (some da lista).
 * @param string $titulo Título opcional acima dos cartões.
 */
function se_bloco_segmentos( $atual = '', $titulo = '' ) {
	$segmentos = se_segmentos();
	if ( $atual && isset( $segmentos[ $atual ] ) ) {
		unset( $segmentos[ $atual ] );
	}
	?>
	<div class="grid gap-4 <?php echo count( $segmentos ) === 3 ? 'md:grid-cols-3' : 'md:grid-cols-2'; ?>">
		<?php if ( $titulo ) : ?>
			<p class="md:col-span-3 text-center text-sm font-bold uppercase tracking-widest text-slate-400 mb-1"><?php echo esc_html( $titulo ); ?></p>
		<?php endif; ?>
		<?php foreach ( $segmentos as $slug => $s ) : ?>
			<a href="<?php echo esc_url( se_segmento_url( $slug ) ); ?>"
			   data-track="segmento-<?php echo esc_attr( $slug ); ?>"
			   class="group glass glass-hover rounded-3xl p-6 text-left flex flex-col">
				<span class="w-12 h-12 rounded-2xl flex items-center justify-center mb-4 shrink-0"
				      style="background:<?php echo esc_attr( $s['cor'] ); ?>22;border:1px solid <?php echo esc_attr( $s['cor'] ); ?>55">
					<svg class="w-6 h-6" style="color:<?php echo esc_attr( $s['cor'] ); ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><?php echo $s['icone']; // phpcs:ignore WordPress.Security.EscapeOutput ?></svg>
				</span>
				<h3 class="text-lg font-bold text-white mb-1.5 leading-tight"><?php echo esc_html( $s['nome'] ); ?></h3>
				<p class="text-slate-400 text-sm leading-relaxed mb-4 flex-grow"><?php echo esc_html( $s['titulo'] ); ?></p>
				<span class="inline-flex items-center gap-1.5 text-sm font-bold text-blue-300 group-hover:text-white transition">
					Ver a solução <span aria-hidden="true">&rarr;</span>
				</span>
			</a>
		<?php endforeach; ?>
	</div>
	<?php
}

/**
 * Opções de cargo e de porte que o formulário usa, no formato que o JS espera.
 * Fica aqui para o modal não repetir a lista (e não sair do ar de novo).
 */
function se_segmentos_para_js() {
	$saida = array();
	foreach ( se_segmentos() as $slug => $s ) {
		$saida[ $slug ] = array(
			'rotulo'       => $s['form_valor'],
			'cargos'       => $s['cargos'],
			'porte_rotulo' => $s['porte_rotulo'],
			'porte'        => $s['porte'],
		);
	}
	return $saida;
}
