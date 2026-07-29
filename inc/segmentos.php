<?php
/**
 * Os três segmentos que o Send Educacional atende.
 *
 * Fonte única de verdade: a bifurcação da home, as páginas de cada segmento,
 * o formulário de demonstração (cargos e porte mudam conforme o segmento) e o
 * seeder de páginas leem tudo daqui. Mexer em um rótulo aqui muda o site
 * inteiro de uma vez, era exatamente o que faltava quando o site só falava
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
			'resumo'    => 'Processo seletivo, secretaria acadêmica, Censo INEP, colação de grau, diploma digital e gestão de polos, com a regulação do MEC acompanhada de perto.',
			'cor'       => '#7296c1', // sobre fundo escuro (contraste 6.5)
			'cor_clara' => '#4a627d', // sobre fundo claro (contraste 6.3)
			'cor_bloco' => '#080b6c', // bloco chapado (branco sobre ele: 16.5)
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
			'resumo'    => 'Matrícula e rematrícula, diário de classe, boletim, mensalidade e comunicação com a família no mesmo sistema, sem vocabulário de faculdade e sem planilha paralela.',
			'cor'       => '#56b2cb', // sobre fundo escuro (contraste 8.2)
			'cor_clara' => '#387484', // sobre fundo claro (contraste 5.3)
			'cor_bloco' => '#335298', // bloco chapado (branco sobre ele: 7.5)
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
			'resumo'    => 'Venda do curso com pagamento na hora, aula no AVA próprio, avaliação online e certificado emitido sozinho, sem juntar checkout, plataforma de aula e planilha de certificado.',
			'cor'       => '#8f92e8', // sobre fundo escuro (contraste 7.1)
			'cor_clara' => '#5d5f97', // sobre fundo claro (contraste 5.9)
			'cor_bloco' => '#4a78b0', // bloco chapado (branco sobre ele: 4.6)
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
			<p class="md:col-span-3 text-center text-sm font-bold uppercase tracking-widest txt mb-1"><?php echo esc_html( $titulo ); ?></p>
		<?php endif; ?>
		<?php foreach ( $segmentos as $slug => $s ) : ?>
			<?php
			// Bloco de cor chapada, não cartão de vidro: é a escolha principal da
			// home e precisa ter peso. O texto vai no azul profundo da marca
			// porque branco sobre estes tons não passa de 3:1 de contraste.
			?>
			<a href="<?php echo esc_url( se_segmento_url( $slug ) ); ?>"
			   data-track="segmento-<?php echo esc_attr( $slug ); ?>"
			   class="se-bloco-seg group"
			   style="background:<?php echo esc_attr( $s['cor_bloco'] ); ?>">
				<span class="se-bloco-seg-icone">
					<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><?php echo $s['icone']; // phpcs:ignore WordPress.Security.EscapeOutput ?></svg>
				</span>
				<h3 class="titulo-mini text-[1.35rem] leading-[1.15] mb-2"><?php echo esc_html( $s['nome'] ); ?></h3>
				<p class="text-[14.5px] leading-relaxed opacity-80 mb-5 flex-grow"><?php echo esc_html( $s['titulo'] ); ?></p>
				<span class="inline-flex items-center gap-1.5 text-sm font-bold border-b border-current pb-0.5 group-hover:gap-3 transition-all">
					Ver a solução <span aria-hidden="true">&rarr;</span>
				</span>
			</a>
		<?php endforeach; ?>
	</div>
	<?php
}

/**
 * Comparativo dos três segmentos, lado a lado.
 *
 * Até aqui, quem quisesse comparar precisava abrir três páginas e ir e voltar.
 * A tabela responde de uma vez as perguntas que separam os segmentos: quem
 * decide a compra, quem regula, o que sai no fim e como se mede o porte.
 */
function se_bloco_comparativo() {
	$segmentos = se_segmentos();

	$linhas = array(
		'Para quem é' => array(
			'ensino-superior' => 'Faculdades, centros universitários e institutos, com ou sem EAD',
			'educacao-basica' => 'Escolas de educação infantil, fundamental e ensino médio',
			'cursos-online'   => 'Escolas de curso livre, profissionalizante e treinamento corporativo',
		),
		'Quem decide a compra' => array(
			'ensino-superior' => 'Mantenedora e reitoria, com a TI avaliando junto',
			'educacao-basica' => 'Mantenedora e direção, com a secretaria opinando',
			'cursos-online'   => 'Fundador ou head de operações, decisão rápida',
		),
		'Quem regula' => array(
			'ensino-superior' => 'MEC: Censo INEP, ENADE, portarias de diploma e recredenciamento',
			'educacao-basica' => 'Conselhos e Secretarias de Educação, mais o Censo Escolar',
			'cursos-online'   => 'Não há órgão regulador do curso livre. Vale a LGPD e o Código do Consumidor',
		),
		'O que sai no fim' => array(
			'ensino-superior' => 'Diploma digital, registrado em livro próprio',
			'educacao-basica' => 'Histórico escolar e certificado de conclusão da etapa',
			'cursos-online'   => 'Certificado com código único e página pública de validação',
		),
		'Como o porte é medido' => array(
			'ensino-superior' => 'Alunos matriculados por período letivo',
			'educacao-basica' => 'Alunos por série e por unidade',
			'cursos-online'   => 'Alunos ativos e turmas por ano',
		),
		'O que costuma doer' => array(
			'ensino-superior' => 'Evasão, inadimplência e prazo de entrega ao MEC',
			'educacao-basica' => 'Mutirão de rematrícula e boletim digitado duas vezes',
			'cursos-online'   => 'Liberar acesso na mão e emitir certificado um a um',
		),
	);
	?>
	<section class="relative z-10 py-24">
		<div class="container mx-auto px-6 max-w-6xl">

			<div class="text-center mb-12 reveal">
				<span class="txt-link font-bold tracking-widest uppercase text-xs">Lado a lado</span>
				<h2 class="titulo text-[2.2rem] md:text-5xl leading-[1.03] mt-4">Em que os três segmentos são diferentes</h2>
				<p class="text-lg txt mt-4 max-w-2xl mx-auto">
					A plataforma é a mesma. O que muda é o vocabulário, quem regula e o que sai no fim.
				</p>
			</div>

			<div class="overflow-x-auto reveal">
				<table class="se-comparativo">
					<thead>
						<tr>
							<th scope="col"><span class="sr-only">Critério</span></th>
							<?php foreach ( $segmentos as $slug => $s ) : ?>
								<th scope="col">
									<a href="<?php echo esc_url( se_segmento_url( $slug ) ); ?>" class="block group">
										<span class="se-comparativo-tag" style="background:<?php echo esc_attr( $s['cor_bloco'] ); ?>"><?php echo esc_html( $s['curto'] ); ?></span>
										<span class="titulo-mini block txt-forte text-base mt-3 leading-tight group-hover-link transition-colors"><?php echo esc_html( $s['nome'] ); ?></span>
									</a>
								</th>
							<?php endforeach; ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $linhas as $criterio => $valores ) : ?>
							<tr>
								<th scope="row"><?php echo esc_html( $criterio ); ?></th>
								<?php foreach ( $segmentos as $slug => $s ) : ?>
									<td><?php echo esc_html( isset( $valores[ $slug ] ) ? $valores[ $slug ] : '' ); ?></td>
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

			<p class="text-center txt-fraco text-sm mt-8 reveal">
				Ainda em dúvida sobre onde a sua instituição se encaixa?
				<button type="button" onclick="abrirDemo()" class="txt-link hover-forte font-semibold transition-colors">Conte a sua operação para um especialista</button>.
			</p>
		</div>
	</section>
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
