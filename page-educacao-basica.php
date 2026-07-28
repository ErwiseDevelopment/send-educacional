<?php
/*
Template Name: Segmento - Educação Básica e Ensino Médio
*/
$se_seg = se_segmento( 'educacao-basica' );
$se_cor = $se_seg['cor'];
get_header(); ?>

<main class="relative text-white overflow-hidden" style="background:#070b18">

    <section class="relative pt-36 pb-16">
        <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[900px] h-[420px] rounded-full blur-[140px] pointer-events-none" style="background:<?php echo esc_attr( $se_cor ); ?>2e"></div>

        <div class="container mx-auto px-6 max-w-4xl text-center relative z-10">
            <div class="flex justify-center items-center gap-2 text-xs text-slate-400 mb-7 font-semibold uppercase tracking-widest">
                <a href="<?php echo esc_url( home_url() ); ?>" class="hover:text-white transition">Início</a>
                <span aria-hidden="true">/</span>
                <span style="color:<?php echo esc_attr( $se_cor ); ?>">Educação Básica e Média</span>
            </div>

            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full glass text-[11px] font-bold uppercase tracking-widest mb-7" style="color:<?php echo esc_attr( $se_cor ); ?>">
                <span class="w-2 h-2 rounded-full" style="background:<?php echo esc_attr( $se_cor ); ?>"></span>
                Infantil · Fundamental I e II · Ensino Médio
            </span>

            <h1 class="text-[2.4rem] md:text-6xl font-extrabold tracking-tight leading-[1.05] mb-6">
                A secretaria, o financeiro e a sala de aula <span class="gtext">no mesmo sistema</span>
            </h1>

            <p class="text-lg md:text-xl text-slate-400 leading-relaxed max-w-2xl mx-auto mb-9">
                Matrícula e rematrícula, diário de classe, boletim, mensalidade e comunicação com a família — sem planilha paralela e sem a secretaria digitando a mesma informação três vezes. Feito para escola, com o vocabulário da escola.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <button data-track="cta-hero-educacao-basica" onclick="abrirDemo('educacao-basica')" class="gbtn text-white font-bold px-8 py-4 rounded-2xl text-lg w-full sm:w-auto transition-all hover:-translate-y-0.5">Solicitar demonstração</button>
                <a href="#rotina" class="w-full sm:w-auto px-8 py-4 rounded-2xl text-lg font-semibold text-white glass hover:bg-white/10 transition">Ver a rotina da escola</a>
            </div>
            <p class="text-slate-500 text-sm mt-5">Demonstração gratuita · sem compromisso · com um especialista em educação básica</p>
        </div>
    </section>

    <!-- ================= AS DORES ================= -->
    <section class="relative py-16">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="glass rounded-[2rem] p-8 md:p-10 reveal">
                <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-6 text-center">Se isso acontece na sua escola, é sistema, não é equipe</p>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    <?php foreach ( array(
                        array( 'Rematrícula é um mutirão', 'Duas semanas de fila na secretaria todo fim de ano, contrato impresso e assinado a caneta.' ),
                        array( 'Boletim montado à mão', 'Professor entrega nota em papel ou planilha e alguém redigita tudo no fechamento do bimestre.' ),
                        array( 'Cobrança que ninguém acompanha', 'A escola só descobre a inadimplência quando ela já virou três meses de atraso.' ),
                        array( 'Família ligando para tudo', 'Boletim, segunda via de boleto, falta e comunicado passam todos pela secretaria, um a um.' ),
                    ) as $d ) {
                        printf(
                            '<div><div class="w-10 h-10 rounded-xl bg-rose-500/10 border border-rose-500/25 text-rose-300 flex items-center justify-center mb-4"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.3 3.9L1.8 18a2 2 0 001.7 3h17a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z"></path></svg></div><h3 class="font-bold text-white text-sm mb-2">%s</h3><p class="text-slate-400 text-sm leading-relaxed">%s</p></div>',
                            esc_html( $d[0] ), esc_html( $d[1] )
                        );
                    } ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= MÓDULOS DA ESCOLA ================= -->
    <section id="rotina" class="relative py-20">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-14 reveal">
                <span class="font-bold tracking-widest uppercase text-xs" style="color:<?php echo esc_attr( $se_cor ); ?>">A rotina inteira da escola</span>
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight mt-4">Da matrícula ao boletim, sem retrabalho</h2>
                <p class="text-lg text-slate-400 mt-4 max-w-2xl mx-auto">Cada setor lança a informação uma vez só — e ela aparece pronta para o próximo.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 reveal">
                <?php
                $eb_mods = array(
                    array(
                        'Secretaria escolar',
                        array(
                            'Matrícula e rematrícula online',
                            'Rematrícula em lote por série e turma',
                            'Contrato com assinatura eletrônica',
                            'Enturmação e transferência',
                            'Ficha do aluno, saúde e responsáveis',
                            'Declarações e histórico escolar',
                        ),
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.6a1 1 0 01.7.3l5.4 5.4a1 1 0 01.3.7V19a2 2 0 01-2 2z"></path>',
                    ),
                    array(
                        'Sala de aula',
                        array(
                            'Diário de classe digital',
                            'Chamada e registro de frequência',
                            'Lançamento de notas por bimestre',
                            'Boletim e ficha individual',
                            'Conselho de classe e parecer descritivo',
                            'Recuperação e progressão parcial',
                        ),
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M8 8h8M8 12h5M9 22h6"></path>',
                    ),
                    array(
                        'Financeiro da escola',
                        array(
                            'Mensalidade, material e contraturno',
                            'Boleto, Pix e cartão recorrente',
                            'Bolsa, desconto e convênio',
                            'Régua de cobrança automática',
                            'Acordo de renegociação',
                            'Fluxo de caixa e DRE da escola',
                        ),
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.7 0-3 .9-3 2s1.3 2 3 2 3 .9 3 2-1.3 2-3 2m0-8V7m0 9v1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
                    ),
                    array(
                        'Família e aluno',
                        array(
                            'App e portal do responsável',
                            'Boletim, faltas e ocorrências em tempo real',
                            'Segunda via de boleto sem ligar na escola',
                            'Comunicados e circulares com confirmação de leitura',
                            'Agenda, calendário e cardápio',
                            'Autorização de saída e de passeio',
                        ),
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.4-1.9M17 20H7m10 0v-2c0-.7-.1-1.3-.4-1.9M7 20H2v-2a3 3 0 015.4-1.9M7 20v-2c0-.7.1-1.3.4-1.9m0 0a5 5 0 019.2 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>',
                    ),
                    array(
                        'Direção e coordenação',
                        array(
                            'Painel de indicadores da escola',
                            'Evasão e risco de não rematrícula',
                            'Desempenho por turma e por disciplina',
                            'Inadimplência por série',
                            'Ocupação de vagas e projeção do ano',
                            'Relatórios prontos para a mantenedora',
                        ),
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l-4 2v11M9 19l6-3M9 19H5M15 16V5l4-2v11l-4 2z"></path>',
                    ),
                    array(
                        'Documentos e arquivo',
                        array(
                            'GED: documento do aluno digitalizado',
                            'Histórico e transferência sem papel',
                            'Biblioteca e controle de acervo',
                            'Guarda de contratos assinados',
                            'Busca por aluno, turma ou ano',
                            'Registro de acesso, para a LGPD',
                        ),
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"></path>',
                    ),
                );
                foreach ( $eb_mods as $m ) {
                    $itens = '';
                    foreach ( $m[1] as $i ) {
                        $itens .= sprintf(
                            '<li class="flex items-start gap-2.5 text-sm text-slate-400"><svg class="w-4 h-4 flex-shrink-0 mt-0.5" style="color:%s" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>%s</li>',
                            esc_attr( $se_cor ), esc_html( $i )
                        );
                    }
                    printf(
                        '<div class="glass glass-hover rounded-3xl p-8">
                            <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-6" style="background:%s22;border:1px solid %s55"><svg class="w-6 h-6" style="color:%s" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">%s</svg></div>
                            <h3 class="text-lg font-bold text-white mb-5">%s</h3>
                            <ul class="space-y-2.5">%s</ul>
                        </div>',
                        esc_attr( $se_cor ), esc_attr( $se_cor ), esc_attr( $se_cor ), $m[2],
                        esc_html( $m[0] ), $itens
                    );
                }
                ?>
            </div>
        </div>
    </section>

    <!-- ================= REMATRÍCULA ================= -->
    <section class="relative py-20">
        <div class="container mx-auto px-6 max-w-6xl grid lg:grid-cols-2 gap-12 items-center reveal">
            <div>
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full glass text-[11px] font-bold uppercase tracking-widest mb-5" style="color:<?php echo esc_attr( $se_cor ); ?>">Campanha de rematrícula</span>
                <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight mb-5">A rematrícula sem o mutirão de dezembro</h2>
                <p class="text-lg text-slate-400 leading-relaxed mb-6">
                    A escola abre a campanha, o sistema gera o contrato de cada aluno com o valor e o desconto certos, e o responsável assina do celular. A secretaria só cuida da exceção — não da fila inteira.
                </p>
                <ul class="space-y-3 mb-8">
                    <?php foreach ( array(
                        'Geração em lote por série, turma ou situação financeira.',
                        'Contrato com assinatura eletrônica, sem impressão nem reconhecimento de firma.',
                        'Reajuste, bolsa e desconto aplicados por regra, não um a um.',
                        'Painel ao vivo de quem já assinou, quem abriu e quem nem olhou.',
                    ) as $li ) {
                        printf( '<li class="flex items-start gap-3 text-slate-300"><svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color:%s" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>%s</li>', esc_attr( $se_cor ), esc_html( $li ) );
                    } ?>
                </ul>
                <button data-track="cta-rematricula" onclick="abrirDemo('educacao-basica')" class="gbtn text-white font-bold px-7 py-3.5 rounded-2xl transition-all hover:-translate-y-0.5">Ver a campanha na demonstração</button>
            </div>

            <div class="rounded-2xl overflow-hidden border border-white/10 cardring" style="background:#0a0f1e">
                <div class="h-10 flex items-center px-4 gap-2 border-b border-white/10 bg-slate-900/70">
                    <span class="w-2.5 h-2.5 rounded-full bg-slate-600"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-slate-600"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-slate-600"></span>
                    <span class="mx-auto text-[11px] text-slate-400 font-semibold bg-white/5 border border-white/10 rounded-full px-4 py-1">app.sendeducacional.com.br/rematricula</span>
                </div>
                <div class="p-5">
                    <p class="text-sm font-extrabold text-white mb-3">Rematrícula 2027 &middot; Escola Exemplo</p>
                    <div class="grid grid-cols-3 gap-3 mb-4">
                        <?php foreach ( array(
                            array( 'Contratos enviados', '412' ),
                            array( 'Assinados', '318' ),
                            array( 'Sem resposta', '94' ),
                        ) as $k ) {
                            printf( '<div class="rounded-xl bg-white/[.03] border border-white/5 p-3"><p class="text-[10px] text-slate-400 font-semibold">%s</p><p class="text-2xl font-extrabold text-white mt-1">%s</p></div>', esc_html( $k[0] ), esc_html( $k[1] ) );
                        } ?>
                    </div>
                    <div class="rounded-xl bg-white/[.03] border border-white/5 p-4 mb-4">
                        <p class="text-[10px] text-slate-400 font-semibold mb-3">Adesão por série</p>
                        <div class="space-y-2">
                            <?php foreach ( array(
                                array( '1º ao 5º ano', 89 ), array( '6º ao 9º ano', 76 ), array( '1ª série EM', 71 ), array( '2ª série EM', 68 ), array( '3ª série EM', 54 ),
                            ) as $p ) {
                                printf(
                                    '<div class="flex items-center gap-2 text-[10px]"><span class="w-24 text-slate-400 truncate">%s</span><div class="flex-1 h-1.5 rounded bg-white/5"><div class="h-full rounded" style="width:%d%%;background:%s"></div></div><span class="w-8 text-right text-slate-500 font-semibold">%d%%</span></div>',
                                    esc_html( $p[0] ), (int) $p[1], esc_attr( $se_cor ), (int) $p[1]
                                );
                            } ?>
                        </div>
                    </div>
                    <p class="text-[10px] text-slate-500 text-center uppercase tracking-widest font-bold">Dados ilustrativos</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= CONFORMIDADE ================= -->
    <section class="relative py-16">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="glass rounded-[2rem] p-8 md:p-10 reveal">
                <div class="grid md:grid-cols-3 gap-8 items-start">
                    <div class="md:col-span-1">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5" style="background:<?php echo esc_attr( $se_cor ); ?>22;border:1px solid <?php echo esc_attr( $se_cor ); ?>55">
                            <svg class="w-6 h-6" style="color:<?php echo esc_attr( $se_cor ); ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.6-4A12 12 0 0112 2.9 12 12 0 013.4 6 12 12 0 003 9c0 5.6 3.8 10.3 9 11.6 5.2-1.3 9-6 9-11.6 0-1-.1-2-.4-3z"></path></svg>
                        </div>
                        <h2 class="text-2xl font-extrabold tracking-tight mb-3">Regulação de escola é outra</h2>
                        <p class="text-slate-400 leading-relaxed">Educação básica não responde ao MEC do mesmo jeito que uma faculdade: quem regula é o Conselho Estadual ou Municipal de Educação e a Secretaria de Educação. O sistema fala essa língua.</p>
                    </div>
                    <div class="md:col-span-2 grid sm:grid-cols-2 gap-4">
                        <?php foreach ( array(
                            array( 'Censo Escolar (INEP)', 'Exportação dos dados de matrícula, turma e docente no formato do Educacenso.' ),
                            array( 'Conselhos e Secretarias', 'Documentação, histórico e transferência no padrão exigido na sua rede.' ),
                            array( 'Carga horária e dias letivos', 'Calendário escolar com controle de dias letivos e reposição.' ),
                            array( 'LGPD com dado de menor', 'Perfis por função, registro de acesso e consentimento do responsável.' ),
                        ) as $c ) {
                            printf(
                                '<div class="rounded-2xl bg-white/[.03] border border-white/5 p-5"><h4 class="font-bold text-white text-sm mb-2">%s</h4><p class="text-slate-400 text-sm leading-relaxed">%s</p></div>',
                                esc_html( $c[0] ), esc_html( $c[1] )
                            );
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= PERGUNTAS ================= -->
    <section class="relative py-20">
        <div class="container mx-auto px-6 max-w-3xl">
            <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-center mb-12 reveal">Perguntas que sempre aparecem</h2>
            <div class="space-y-3 reveal">
                <?php
                $eb_faq = array(
                    array( 'O sistema não é feito para faculdade?', 'A plataforma é a mesma, mas a configuração é outra. Numa escola você trabalha com série e turma, bimestre, boletim, conselho de classe e responsável financeiro — não com período letivo, disciplina isolada e colação de grau. É assim que a implantação entrega.' ),
                    array( 'A escola tem educação infantil com parecer descritivo. Funciona?', 'Funciona. Além de nota numérica, o sistema aceita conceito e parecer descritivo por campo de experiência, com o boletim saindo no formato certo para cada etapa.' ),
                    array( 'E se a escola tem mais de uma unidade?', 'Cada unidade tem a própria secretaria, o próprio financeiro e os próprios indicadores, e a mantenedora vê tudo consolidado num painel só.' ),
                    array( 'Quanto tempo demora para implantar?', 'Depende do tamanho da escola e de quanta informação vem de sistema antigo. O caminho é sempre o mesmo: levantamento dos processos, importação da base, configuração do ano letivo e treinamento por setor — com um consultor conduzindo, não um manual em PDF.' ),
                    array( 'Vamos perder o histórico do sistema antigo?', 'Não. A importação da base de alunos, do histórico e dos títulos financeiros faz parte da implantação. O ano letivo só vira quando os dados conferem.' ),
                );
                foreach ( $eb_faq as $f ) {
                    printf(
                        '<details class="group glass rounded-2xl px-6 py-5">
                            <summary class="flex items-center justify-between cursor-pointer list-none font-bold text-white">%s<svg class="w-5 h-5 text-slate-500 group-open:rotate-45 transition-transform flex-shrink-0 ml-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg></summary>
                            <p class="text-slate-400 leading-relaxed mt-4">%s</p>
                        </details>',
                        esc_html( $f[0] ), esc_html( $f[1] )
                    );
                }
                ?>
            </div>
        </div>
    </section>

    <!-- ================= CTA + OUTROS SEGMENTOS ================= -->
    <section class="relative py-20">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="glass rounded-[2.5rem] p-10 md:p-14 text-center cardring reveal">
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-5">Uma demonstração com a rotina da sua escola</h2>
                <p class="text-lg text-slate-400 max-w-2xl mx-auto mb-8">Sem apresentação genérica: a gente pega a sua rematrícula, o seu boletim e a sua cobrança e mostra como ficam dentro do sistema.</p>
                <button data-track="cta-final-educacao-basica" onclick="abrirDemo('educacao-basica')" class="gbtn text-white font-bold px-9 py-4 rounded-2xl text-lg transition-all hover:-translate-y-0.5">Solicitar demonstração</button>
                <p class="text-slate-500 text-sm mt-4">Gratuita · sem compromisso · com um especialista em educação básica</p>
            </div>

            <div class="mt-14 reveal">
                <p class="text-center text-sm font-bold uppercase tracking-widest text-slate-400 mb-5">Sua operação é outra?</p>
                <?php se_bloco_segmentos( 'educacao-basica' ); ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
