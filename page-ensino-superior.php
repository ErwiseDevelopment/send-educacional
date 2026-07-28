<?php
/*
Template Name: Segmento - Ensino Superior
*/
$se_seg = se_segmento( 'ensino-superior' );
$se_cor = $se_seg['cor'];
get_header(); ?>

<main class="relative text-white overflow-hidden" style="background:#030429">

    <section class="relative pt-36 pb-16">
        <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[900px] h-[420px] rounded-full blur-[140px] pointer-events-none" style="background:<?php echo esc_attr( $se_cor ); ?>2e"></div>

        <div class="container mx-auto px-6 max-w-4xl text-center relative z-10">
            <div class="flex justify-center items-center gap-2 text-xs text-slate-400 mb-7 font-semibold uppercase tracking-widest">
                <a href="<?php echo esc_url( home_url() ); ?>" class="hover:text-white transition">Início</a>
                <span aria-hidden="true">/</span>
                <span style="color:<?php echo esc_attr( $se_cor ); ?>">Ensino Superior</span>
            </div>

            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full glass text-[11px] font-bold uppercase tracking-widest mb-7" style="color:<?php echo esc_attr( $se_cor ); ?>">
                <span class="w-2 h-2 rounded-full" style="background:<?php echo esc_attr( $se_cor ); ?>"></span>
                Faculdades · Centros universitários · EAD e polos
            </span>

            <h1 class="titulo text-[2.5rem] md:text-[4.4rem] leading-[0.99] tracking-tightest mb-6">
                Do processo seletivo ao <span class="gtext">diploma digital</span>, sem trocar de sistema
            </h1>

            <p class="text-lg md:text-xl text-slate-400 leading-relaxed max-w-2xl mx-auto mb-9">
                Secretaria acadêmica, financeiro, AVA próprio e gestão de polos numa plataforma só — com o Censo INEP, o ENADE, o diploma digital e o livro de registro acompanhando a regulação do MEC sem correria de última hora.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <button data-track="cta-hero-ensino-superior" onclick="abrirDemo('ensino-superior')" class="gbtn text-white font-bold px-8 py-4 rounded-2xl text-lg w-full sm:w-auto transition-all hover:-translate-y-0.5">Solicitar demonstração</button>
                <a href="#catalogo" class="w-full sm:w-auto px-8 py-4 rounded-2xl text-lg font-semibold text-white glass hover:bg-white/10 transition">Ver o catálogo completo</a>
            </div>
            <p class="text-slate-500 text-sm mt-5">Demonstração gratuita · sem compromisso · com um especialista em ensino superior</p>
        </div>
    </section>

    <!-- ================= REGULAÇÃO ================= -->
    <section class="relative py-16">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-10 reveal">
                <span class="font-bold tracking-widest uppercase text-xs" style="color:<?php echo esc_attr( $se_cor ); ?>">Regulação sem susto</span>
                <h2 class="titulo text-[2rem] md:text-4xl leading-[1.04] mt-4">O que a sua IES precisa entregar, já dentro do sistema</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 reveal">
                <?php foreach ( array(
                    array( 'Censo INEP', 'Exportação no layout do Censo da Educação Superior, com os dados de aluno, docente e curso já consistidos.' ),
                    array( 'ENADE', 'Identificação e inscrição dos alunos habilitados, com acompanhamento de quem já regularizou.' ),
                    array( 'Diploma digital', 'Emissão e registro no padrão das portarias do MEC, com assinatura e livro de registro.' ),
                    array( 'Recredenciamento', 'Documentação, atas e histórico organizados no GED, prontos para a visita in loco.' ),
                ) as $r ) {
                    printf(
                        '<div class="glass glass-hover rounded-3xl p-7"><div class="w-11 h-11 rounded-xl flex items-center justify-center mb-5" style="background:%s22;border:1px solid %s55"><svg class="w-5 h-5" style="color:%s" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div><h3 class="titulo-mini text-white text-lg mb-2">%s</h3><p class="text-slate-400 text-sm leading-relaxed">%s</p></div>',
                        esc_attr( $se_cor ), esc_attr( $se_cor ), esc_attr( $se_cor ), esc_html( $r[0] ), esc_html( $r[1] )
                    );
                } ?>
            </div>
        </div>
    </section>

    <!-- ================= CATÁLOGO COMPLETO DE MÓDULOS ================= -->
    <?php se_bloco_modulos( 'ensino-superior', $se_cor ); ?>

    <!-- ================= AVA ================= -->
    <section class="relative py-20">
        <div class="container mx-auto px-6 max-w-6xl grid lg:grid-cols-2 gap-14 items-center reveal">
            <div>
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full glass text-[11px] font-bold uppercase tracking-widest mb-5" style="color:<?php echo esc_attr( $se_cor ); ?>">AVA próprio</span>
                <h2 class="titulo text-[2rem] md:text-4xl leading-[1.04] mb-5">O ambiente de aula é nosso, e conversa com o acadêmico</h2>
                <p class="text-lg text-slate-400 leading-relaxed mb-6">
                    O Send Educacional tem AVA próprio, desenvolvido pela Send: a aula, o material e a avaliação ficam no mesmo sistema do acadêmico e do financeiro, e a nota cai direto no histórico — sem exportar, sem reimportar e sem o professor lançar duas vezes. O acesso do aluno ao ambiente também é o que alimenta o alerta de evasão.
                </p>
                <ul class="space-y-3 mb-8">
                    <?php foreach ( array(
                        'AVA próprio: aula, material, avaliação e nota no mesmo login do aluno.',
                        'Quem já usa outro ambiente de aula não precisa migrar junto: a integração existe.',
                        'Relatório de últimos acessos, que alimenta o alerta de evasão.',
                    ) as $li ) {
                        printf( '<li class="flex items-start gap-3 text-slate-300"><svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color:%s" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>%s</li>', esc_attr( $se_cor ), esc_html( $li ) );
                    } ?>
                </ul>
                <button data-track="cta-ava-superior" onclick="abrirDemo('ensino-superior')" class="gbtn text-white font-bold px-7 py-3.5 rounded-2xl transition-all hover:-translate-y-0.5">Ver o AVA na demonstração</button>
            </div>

            <div class="glass rounded-3xl p-8 cardring">
                <p class="text-xs font-bold uppercase tracking-widest mb-6" style="color:<?php echo esc_attr( $se_cor ); ?>">A jornada acadêmica, ponta a ponta</p>
                <ol class="space-y-5">
                    <?php
                    $es_jornada = array(
                        array( 'Processo seletivo', 'Inscrição, prova e classificação online.' ),
                        array( 'Matrícula com assinatura', 'Contrato eletrônico, sem papel na secretaria.' ),
                        array( 'Vida acadêmica', 'Diário, notas, frequência, DPs e requerimentos.' ),
                        array( 'Financeiro', 'Mensalidade, bolsa, acordo e régua de cobrança.' ),
                        array( 'Aula no AVA', 'Conteúdo e avaliação, com nota indo para o histórico.' ),
                        array( 'Colação e diploma', 'Diploma digital emitido e registrado no livro.' ),
                    );
                    foreach ( $es_jornada as $n => $j ) {
                        printf(
                            '<li class="flex items-start gap-4"><span class="w-8 h-8 rounded-xl flex items-center justify-center text-sm font-extrabold text-white flex-shrink-0" style="background:linear-gradient(135deg,%s,#080b6c)">%d</span><span><span class="block font-bold text-white text-sm">%s</span><span class="block text-slate-400 text-sm leading-snug mt-0.5">%s</span></span></li>',
                            esc_attr( $se_cor ), $n + 1, esc_html( $j[0] ), esc_html( $j[1] )
                        );
                    }
                    ?>
                </ol>
            </div>
        </div>
    </section>

    <!-- ================= PERGUNTAS ================= -->
    <section class="relative py-20">
        <div class="container mx-auto px-6 max-w-3xl">
            <h2 class="titulo text-[2rem] md:text-4xl leading-[1.04] text-center mb-12 reveal">Perguntas que sempre aparecem</h2>
            <div class="space-y-3 reveal">
                <?php
                $es_faq = array(
                    array( 'Já usamos outro ambiente de aula. Precisamos migrar?', 'Não precisa. O Send tem AVA próprio, e ele é o caminho que recomendamos porque a nota cai direto no histórico. Mas trocar o ambiente de aula não é condição para implantar o acadêmico e o financeiro: existe integração com o LMS que a IES já usa, inclusive Moodle, e a migração fica para quando fizer sentido.' ),
                    array( 'A IES tem EAD com vários polos. O sistema separa?', 'Separa. Curso, turma, tutoria, repasse e indicadores são por polo, com o portal do polo à parte, e a mantenedora enxerga tudo consolidado.' ),
                    array( 'Como fica o diploma digital?', 'A emissão e o registro seguem o padrão das portarias do MEC, com assinatura digital e livro de registro dentro do próprio sistema — não é um serviço externo contratado à parte.' ),
                    array( 'Quanto tempo leva a implantação?', 'Depende do porte e de quanta informação vem do sistema antigo. O caminho é sempre levantamento de processos, importação da base, configuração dos períodos letivos e treinamento por setor, com consultor conduzindo. Numa IES de porte médio isso costuma se organizar em alguns meses, não em semanas — e a gente prefere dizer isso antes.' ),
                    array( 'Perdemos o histórico acadêmico do sistema atual?', 'Não. Importar histórico, matrículas e títulos financeiros faz parte da implantação, e a virada só acontece depois que os dados conferem com os seus relatórios.' ),
                );
                foreach ( $es_faq as $f ) {
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
                <h2 class="titulo text-[2.2rem] md:text-5xl leading-[1.03] mb-5">Uma demonstração com os processos da sua IES</h2>
                <p class="text-lg text-slate-400 max-w-2xl mx-auto mb-8">A gente parte do seu processo seletivo, da sua secretaria e da sua cobrança — e mostra onde cada um deles vive dentro do sistema.</p>
                <button data-track="cta-final-ensino-superior" onclick="abrirDemo('ensino-superior')" class="gbtn text-white font-bold px-9 py-4 rounded-2xl text-lg transition-all hover:-translate-y-0.5">Solicitar demonstração</button>
                <p class="text-slate-500 text-sm mt-4">Gratuita · sem compromisso · com um especialista em ensino superior</p>
            </div>

            <div class="mt-14 reveal">
                <p class="text-center text-sm font-bold uppercase tracking-widest text-slate-400 mb-5">Sua operação é outra?</p>
                <?php se_bloco_segmentos( 'ensino-superior' ); ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
