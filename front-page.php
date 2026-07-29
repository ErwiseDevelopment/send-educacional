<?php get_header(); ?>

<style>
    /* camadas de ambiente (aurora + grade) fixas atrás de tudo */
    .aurora { position:absolute; inset:0; z-index:0; pointer-events:none; overflow:hidden; }
    .aurora::before, .aurora::after { content:""; position:absolute; border-radius:50%; filter:blur(130px); opacity:.55; }
    .aurora::before { width:620px; height:620px; background:#96b1d1; top:-200px; left:-140px; animation:drift1 20s ease-in-out infinite; }
    .aurora::after  { width:520px; height:520px; background:#c5d4e6; top:120px; right:-160px; animation:drift2 24s ease-in-out infinite; }
    @keyframes drift1 { 0%,100%{transform:translate(0,0)} 50%{transform:translate(120px,90px)} }
    @keyframes drift2 { 0%,100%{transform:translate(0,0)} 50%{transform:translate(-110px,120px)} }
    .gridmask { position:absolute; inset:0; z-index:0; pointer-events:none;
        background-image:linear-gradient(rgba(8,11,108,.05) 1px,transparent 1px),linear-gradient(90deg,rgba(8,11,108,.05) 1px,transparent 1px);
        background-size:54px 54px;
        -webkit-mask-image:radial-gradient(100% 55% at 50% 0,#000,transparent 78%); mask-image:radial-gradient(100% 55% at 50% 0,#000,transparent 78%); }

    .gbtn  { background:linear-gradient(100deg,#4a78b0,#1f3184); box-shadow:0 10px 30px -8px rgba(8,11,108,.75); }
    .gbtn:hover { background:linear-gradient(100deg,#5883b6,#2b2d81); box-shadow:0 16px 42px -8px rgba(8,11,108,.95); }
    .glass-hover { transition:transform .3s ease, border-color .3s ease, box-shadow .3s ease; }

    .floaty  { animation:floaty 6s ease-in-out infinite; }
    .floaty2 { animation:floaty 7.5s ease-in-out infinite; }
    @keyframes floaty { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-10px)} }

    .reveal { opacity:0; transform:translateY(18px); transition:opacity .7s ease, transform .7s ease; }
    .reveal.in { opacity:1; transform:none; }

    .mqo { overflow:hidden; -webkit-mask-image:linear-gradient(90deg,transparent,#000 12%,#000 88%,transparent); mask-image:linear-gradient(90deg,transparent,#000 12%,#000 88%,transparent); }
    .mq { display:flex; gap:46px; white-space:nowrap; animation:mq 28s linear infinite; }
    @keyframes mq { from{transform:translateX(0)} to{transform:translateX(-50%)} }

    .tabx { color:#8b8c9d; border-bottom:2px solid transparent; }
    .tabx.tab-active { color:#fff; border-bottom-color:#1f3184; }

    .sys-donut { width:74px; height:74px; border-radius:50%; background:conic-gradient(#4a78b0 0 94%, #212243 94% 100%); display:flex; align-items:center; justify-content:center; position:relative; }
    .sys-donut::after { content:""; position:absolute; width:48px; height:48px; border-radius:50%; background:#050741; }

    @media (prefers-reduced-motion:reduce){
        .reveal{opacity:1;transform:none;transition:none}
        .floaty,.floaty2,.mq,.aurora::before,.aurora::after{animation:none}
    }
</style>

<main class="relative overflow-hidden">

    <!-- ===================== HERO ===================== -->
    <section class="sup-clara-2 relative z-10 pt-24 pb-24 overflow-hidden">
        <div class="aurora"></div>
        <div class="gridmask"></div>
        <div class="container mx-auto px-6 text-center max-w-5xl relative z-10">
            <h1 class="titulo text-[2.9rem] md:text-[5.2rem] leading-[0.97] tracking-tightest mb-7">
                Toda a gestão da sua<br class="hidden md:block"> instituição de ensino em <span class="gtext">um só sistema</span>
            </h1>

            <p class="text-lg md:text-xl txt max-w-2xl mx-auto leading-relaxed mb-9">
                Matrícula, secretaria, financeiro, sala de aula e o <span class="txt-forte font-semibold">AVA próprio</span> numa plataforma só, configurada para o seu segmento, com o suporte de quem faz software de gestão há 33 anos.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <button onclick="abrirDemo()" class="gbtn txt-forte font-bold px-8 py-4 rounded-2xl text-lg w-full sm:w-auto transition-all hover:-translate-y-0.5">Solicitar demonstração</button>
                <a href="#segmentos" class="w-full sm:w-auto px-8 py-4 rounded-2xl text-lg font-semibold txt-forte glass hover:bg-white/10 transition">Ver a solução do meu segmento</a>
            </div>
            <p class="txt-fraco text-sm mt-5">Demonstração gratuita · sem compromisso · feita por um especialista do seu segmento</p>
        </div>

        <!-- ===== BIFURCAÇÃO: a home é a porta de três públicos diferentes ===== -->
        <div id="segmentos" class="container mx-auto px-6 max-w-5xl mt-14 reveal scroll-mt-24">
            <p class="text-center text-sm font-bold uppercase tracking-widest txt mb-5">Onde você trabalha?</p>
            <?php se_bloco_segmentos(); ?>
        </div>

        <!-- tela do sistema (clara) sobre o hero escuro -->
        <div class="container mx-auto px-6 relative mt-16 max-w-5xl reveal">
            <div class="relative">
                <div class="absolute -inset-x-10 -top-8 bottom-0 bg-gradient-to-b from-blue-600/40 to-blue-900/10 blur-3xl rounded-[3rem]"></div>

                <div class="sup-escura sup-escura-2 relative rounded-2xl overflow-hidden border linha cardring">
                    <div class="h-11 flex items-center px-4 gap-2 border-b linha bg-black/25">
                        <span class="w-3 h-3 rounded-full bg-slate-600"></span>
                        <span class="w-3 h-3 rounded-full bg-slate-600"></span>
                        <span class="w-3 h-3 rounded-full bg-slate-600"></span>
                        <span class="mx-auto text-[11px] txt font-semibold bg-bloco border linha rounded-full px-4 py-1">app.sendeducacional.com.br</span>
                    </div>
                    <div class="p-5 md:p-6 text-left">
                        <div class="flex items-center justify-between mb-5">
                            <div class="flex items-center gap-2.5">
                                <span class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:linear-gradient(135deg,#4a78b0,#080b6c)"><svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5 3 9l9 4 9-4-9-4z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M7 11v4c0 1 2.5 2.5 5 2.5s5-1.5 5-2.5v-4"></path></svg></span>
                                <span class="txt-forte font-extrabold text-sm tracking-tight">SEND <span class="txt-fraco font-medium">EDUCACIONAL</span></span>
                                <span class="hidden sm:inline text-slate-600">|</span>
                                <span class="hidden sm:inline txt text-sm font-semibold">Faculdade Exemplo</span>
                                <span class="hidden md:inline text-[9px] uppercase tracking-widest font-bold txt-fraco border linha rounded-full px-2 py-0.5">Dados ilustrativos</span>
                            </div>
                            <div class="flex items-center gap-2 text-[11px]">
                                <span class="hidden sm:block txt font-medium">Coordenação</span>
                                <span class="w-6 h-6 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600"></span>
                            </div>
                        </div>

                        <p class="text-[10px] uppercase tracking-wide txt-fraco font-bold mb-2.5">Mais acessados</p>
                        <div class="grid grid-cols-3 sm:grid-cols-6 gap-2 mb-5">
                            <?php
                            $fp_atalhos = array(
                                array( 'Secretaria', '#4a78b0' ), array( 'Financeiro', '#56b2cb' ), array( 'Contas a receber', '#22c55e' ),
                                array( 'Contrato', '#6366f1' ), array( 'Documentos', '#2b2d81' ), array( 'Retenção', '#06b6d4' ),
                            );
                            foreach ( $fp_atalhos as $t ) {
                                printf(
                                    '<div class="rounded-lg bg-white/[.03] border linha p-2.5 text-center"><span class="w-7 h-7 mx-auto rounded-md flex items-center justify-center mb-1.5" style="background:%s22;border:1px solid %s44"><span class="w-3 h-3 rounded-sm" style="background:%s"></span></span><span class="text-[9px] txt font-semibold block truncate">%s</span></div>',
                                    $t[1], $t[1], $t[1], esc_html( $t[0] )
                                );
                            }
                            ?>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <?php
                            $fp_grupos = array(
                                array( 'Financeiro', '#56b2cb', array( 'Financeiro Gerencial', 'Contas a Receber', 'Contas a Pagar', 'Fluxo de Caixa' ) ),
                                array( 'Acadêmico', '#4a78b0', array( 'Secretaria', 'Retenção', 'Requerimentos', 'Biblioteca' ) ),
                                array( 'Gestão', '#2b2d81', array( 'Contrato', 'Documentos', 'Assinaturas', 'GED' ) ),
                            );
                            foreach ( $fp_grupos as $g ) {
                                $rows = '';
                                foreach ( $g[2] as $item ) {
                                    $rows .= sprintf(
                                        '<div class="flex items-center justify-between rounded-lg bg-white/[.03] px-2.5 py-1.5 text-[11px] txt"><span class="flex items-center gap-2 truncate"><span class="w-3.5 h-3.5 rounded" style="background:%s33"></span>%s</span><svg class="w-3 h-3 text-slate-600 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5h5v5M19 5l-8 8M9 5H5v14h14v-4"></path></svg></div>',
                                        $g[1], esc_html( $item )
                                    );
                                }
                                printf(
                                    '<div class="rounded-xl bg-white/[.02] border linha p-3"><p class="text-[10px] uppercase tracking-wide txt font-bold mb-2 flex items-center gap-1.5"><span class="w-2 h-2 rounded-full" style="background:%s"></span>%s</p><div class="space-y-1.5">%s</div></div>',
                                    $g[1], esc_html( $g[0] ), $rows
                                );
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="floaty hidden md:flex absolute -left-8 bottom-14 items-center gap-3 glass rounded-2xl px-4 py-3">
                    <div class="w-9 h-9 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg></div>
                    <div class="text-left"><p class="text-[10px] txt font-bold uppercase">Mensalidade</p><p class="text-sm font-bold txt-forte">Paga via Pix</p></div>
                </div>
                <div class="floaty2 hidden md:flex absolute -right-6 top-20 items-center gap-3 glass rounded-2xl px-4 py-3">
                    <div class="w-9 h-9 rounded-full bg-blue-500/20 txt-link flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-3-3v6M4 6h16M4 6a1 1 0 011-1h14a1 1 0 011 1M4 6v12a1 1 0 001 1h14a1 1 0 001-1V6"></path></svg></div>
                    <div class="text-left"><p class="text-[10px] txt font-bold uppercase">Diploma</p><p class="text-sm font-bold txt-forte">Digital emitido</p></div>
                </div>
            </div>
        </div>

    </section>

    <!-- ===================== QUAL E O SEU DESAFIO ===================== -->
    <?php se_bloco_busca_desafio(); ?>

    <section class="relative z-10">
        <!-- marquee -->
        <div class="relative z-10 mt-16 border-t linha py-6 mqo">
            <div class="mq txt-fraco text-sm font-semibold uppercase tracking-widest">
                <span>MEC</span><span>Censo Escolar</span><span>Diploma Digital</span><span>Certificado online</span><span>Pix</span><span>Getnet</span><span>Santander</span><span>WhatsApp</span><span>Asaas</span><span>LGPD</span><span>Polos EAD</span>
                <span>MEC</span><span>Censo Escolar</span><span>Diploma Digital</span><span>Certificado online</span><span>Pix</span><span>Getnet</span><span>Santander</span><span>WhatsApp</span><span>Asaas</span><span>LGPD</span><span>Polos EAD</span>
            </div>
        </div>
    </section>

    <!-- ===================== NÚMEROS ===================== -->
    <section class="relative z-10 py-16">
        <?php // Filete no lugar de caixa: quatro cartões iguais viravam mais uma grade. ?>
        <div class="container mx-auto px-6 max-w-6xl reveal">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-y-8 md:gap-x-10">
                <?php
                // Cada número aqui precisa aguentar ser checado. "33 anos" é da Send
                // Solutions, não de educação, dizer os dois evita a leitura errada.
                $fp_stats = array(
                    array( '33', 'anos de mercado', 'Send Solutions · em educação desde 2019' ),
                    array( '20+', 'módulos integrados', 'na mesma plataforma, com o mesmo dado' ),
                    array( '150+', 'funcionalidades nativas', 'entre acadêmico, financeiro e atendimento' ),
                    array( '3', 'segmentos atendidos', 'superior · básica e média · cursos online' ),
                );
                foreach ( $fp_stats as $s ) {
                    printf(
                        '<div class="faixa-item">
                            <div class="numero text-5xl md:text-6xl txt-forte leading-none">%s</div>
                            <p class="titulo-mini txt-forte text-base mt-3">%s</p>
                            <p class="txt-fraco text-[13px] mt-1.5 leading-snug">%s</p>
                        </div>',
                        esc_html( $s[0] ), esc_html( $s[1] ), esc_html( $s[2] )
                    );
                }
                ?>
            </div>

            <p class="regra mt-12 pt-6 text-sm txt-fraco leading-relaxed max-w-3xl">
                <span class="txt font-semibold">Conformidade regulatória por segmento.</span>
                MEC, Censo INEP e diploma digital no ensino superior. Conselhos de Educação, Secretarias e Censo Escolar na educação básica. LGPD nos três.
            </p>
        </div>
    </section>

    <!-- ===================== AVA NATIVO ===================== -->
    <section id="ava" class="relative z-10 py-24">
        <div class="container mx-auto px-6 max-w-6xl grid lg:grid-cols-2 gap-14 items-center reveal">
            <div>
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/30 txt-link text-xs font-bold uppercase tracking-widest mb-6">
                    <span class="relative flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span></span>
                    Novidade
                </div>
                <h2 class="titulo text-[2.2rem] md:text-5xl leading-[1.02] mb-6">A aula acontece <span class="gtext">dentro do sistema</span>, não ao lado dele.</h2>
                <p class="text-lg txt leading-relaxed mb-8">Desenvolvemos o nosso próprio Ambiente Virtual de Aprendizagem: aula, material e avaliação ficam no mesmo sistema do acadêmico e do financeiro, e a nota cai direto no histórico sem ninguém reimportar planilha. O aluno estuda, é avaliado e vê a nota sem trocar de ambiente. A coordenação enxerga acesso, progresso e desempenho no mesmo lugar em que enxerga a matrícula e a mensalidade.</p>
                <button onclick="abrirDemo()" class="gbtn txt-forte font-bold px-7 py-3.5 rounded-2xl transition-all hover:-translate-y-0.5">Ver o AVA na demonstração</button>
            </div>
            <div class="glass rounded-3xl p-7 md:p-9 cardring">
                <p class="text-xs font-bold uppercase tracking-widest txt-link mb-6">O que o AVA próprio entrega</p>
                <ul class="space-y-4">
                    <?php
                    $ava_itens = array(
                        'Aulas e materiais organizados por disciplina.',
                        'Atividades, quiz e avaliações online.',
                        'Fórum e mensagens entre aluno e professor.',
                        'Notas que caem direto no acadêmico, sem reimportar.',
                        '100% web e mobile, com a marca da instituição.',
                        'Sem integração frágil com sistema externo.',
                    );
                    foreach ( $ava_itens as $item ) {
                        printf(
                            '<li class="flex items-start gap-3 txt-forte"><svg class="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>%s</li>',
                            esc_html( $item )
                        );
                    }
                    ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- ===================== MÓDULOS (bento) ===================== -->
    <section id="ecossistema" class="relative z-10 py-24">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-14 reveal">
                <span class="txt-link font-bold tracking-widest uppercase text-xs">Ecossistema integrado</span>
                <h2 class="titulo text-[2.2rem] md:text-5xl leading-[1.03] mt-4">Todos os setores no mesmo sistema</h2>
                <p class="text-lg txt mt-4 max-w-2xl mx-auto">Da primeira conversa com o aluno até a conclusão do curso, com os dados conversando de ponta a ponta, no ensino superior, na escola e no curso online.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 reveal">
                <div class="md:col-span-2 glass glass-hover rounded-3xl p-9 flex flex-col justify-between">
                    <div class="md:w-3/4">
                        <div class="w-14 h-14 rounded-2xl bg-bloco border linha flex items-center justify-center mb-6"><svg class="w-7 h-7 txt-link" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7M5 11v5c0 1 3 3 7 3s7-2 7-3v-5"></path></svg></div>
                        <h3 class="titulo-mini text-2xl txt-forte mb-3">Secretaria Acadêmica</h3>
                        <p class="txt leading-relaxed mb-6">Do processo seletivo à colação de grau: matrícula e rematrícula online, diário de classe, histórico, diploma digital e adequação às portarias do MEC.</p>
                    </div>
                    <a href="<?php echo home_url('/gestao-academica'); ?>" class="inline-flex items-center gap-2 font-bold txt-link hover-forte transition">Conhecer o módulo acadêmico <span aria-hidden="true">&rarr;</span></a>
                </div>

                <div class="glass glass-hover rounded-3xl p-9 flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-bloco border linha flex items-center justify-center mb-6"><svg class="w-7 h-7 txt-link" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V7m0 9v1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <h3 class="titulo-mini text-xl txt-forte mb-3">Gestão Financeira</h3>
                        <p class="txt leading-relaxed mb-6">Boletos, Pix e régua de cobrança automática, acordos, DRE e notas fiscais. A inadimplência fica sob controle, do lançamento ao caixa.</p>
                    </div>
                    <a href="<?php echo home_url('/financeiro'); ?>" class="inline-flex items-center gap-2 font-bold txt-link hover-forte transition">Ver módulo financeiro <span aria-hidden="true">&rarr;</span></a>
                </div>

                <div class="glass glass-hover rounded-3xl p-9 flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-bloco border linha flex items-center justify-center mb-6"><svg class="w-7 h-7 txt-link" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2h-4m-6 4h6"></path></svg></div>
                        <h3 class="titulo-mini text-xl txt-forte mb-3">Portais + AVA próprio</h3>
                        <p class="txt leading-relaxed mb-6">Portais do aluno, do docente e do coordenador, com gestão de polos EAD e o AVA próprio junto: notas, diário, requerimentos e aulas no mesmo login.</p>
                    </div>
                    <a href="<?php echo home_url('/portais'); ?>" class="inline-flex items-center gap-2 font-bold txt-link hover-forte transition">Explorar os portais <span aria-hidden="true">&rarr;</span></a>
                </div>

                <div class="md:col-span-2 glass glass-hover rounded-3xl p-9 flex items-center gap-6">
                    <div class="w-14 h-14 rounded-2xl bg-bloco border linha flex items-center justify-center shrink-0"><svg class="w-7 h-7 txt-link" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg></div>
                    <div>
                        <h3 class="titulo-mini text-xl txt-forte mb-2">Biblioteca &amp; GED</h3>
                        <p class="txt leading-relaxed">Gestão eletrônica de documentos para adequação fiscal e acadêmica, com controle completo de acervo. Documentos 100% digitalizados.</p>
                    </div>
                </div>
            </div>

            <!-- todos os módulos -->
            <div class="mt-12 reveal">
                <p class="text-center text-sm font-semibold txt mb-5">E ainda mais de <span class="font-bold txt-forte">20 módulos</span> na mesma plataforma</p>
                <div class="flex flex-wrap justify-center gap-2.5">
                    <?php
                    $fp_modulos = array( 'Processo seletivo', 'Matrícula & rematrícula', 'Assinatura digital', 'Secretaria acadêmica', 'Diário de classe', 'Financeiro & DRE', 'Portal do aluno', 'Portal do docente', 'Portal do coordenador', 'Gestão de polos EAD', 'AVA próprio', 'Diploma digital', 'CRM & Captação', 'Retenção de alunos', 'Biblioteca & GED', 'BI & Indicadores' );
                    foreach ( $fp_modulos as $fp_mod ) {
                        printf( '<span class="px-4 py-2 rounded-full glass txt text-sm font-semibold">%s</span>', esc_html( $fp_mod ) );
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== COMPARATIVO DOS SEGMENTOS ===================== -->
    <?php se_bloco_comparativo(); ?>

    <!-- ===================== JORNADA COMPLETA ===================== -->
    <section class="relative z-10 py-24">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16 reveal">
                <span class="txt-link font-bold tracking-widest uppercase text-xs">Uma plataforma, a jornada inteira</span>
                <h2 class="titulo text-[2.2rem] md:text-5xl leading-[1.03] mt-4">Da captação à <span class="gtext">conclusão</span>, sem trocar de sistema</h2>
                <p class="txt max-w-2xl mx-auto text-lg mt-4">Matrícula com assinatura digital, secretaria, financeiro, AVA e a emissão do documento final. Cada etapa já conversa com a próxima, sem planilha nem sistema paralelo.</p>
            </div>

            <div class="relative reveal">
                <div class="hidden lg:block absolute top-7 left-[8%] right-[8%] h-px bg-gradient-to-r from-blue-500/40 via-violet-500/40 to-fuchsia-500/40"></div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-x-4 gap-y-8">
                    <?php
                    $fp_jornada = array(
                        array( 'Captação & CRM', 'Funil de leads, campanhas e recuperação de matrículas.', '<path stroke-linecap="round" stroke-linejoin="round" d="M4 5h16M7 10h10M10 15h4M11 19h2"></path>', false ),
                        array( 'Matrícula & Assinatura', '100% digital, com contrato assinado eletronicamente.', '<path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"></path><path stroke-linecap="round" stroke-linejoin="round" d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>', false ),
                        array( 'Secretaria', 'Diário de classe, histórico, rematrícula e documentos.', '<path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7M5 11v5c0 1 3 3 7 3s7-2 7-3v-5"></path>', false ),
                        array( 'Financeiro', 'Boletos, Pix, régua de cobrança, acordos e DRE.', '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V7m0 9v1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>', false ),
                        array( 'AVA próprio', 'Aulas, materiais e avaliações online, no mesmo sistema.', '<path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h14a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M9 20h6M12 16v4"></path><path fill="currentColor" stroke="none" d="M10 7.5l4 2.5-4 2.5v-5z"></path>', true ),
                        array( 'Diploma ou certificado', 'Diploma digital no padrão do MEC; certificado com validação nos cursos livres.', '<path stroke-linecap="round" stroke-linejoin="round" d="M12 15a4 4 0 100-8 4 4 0 000 8z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M8.5 13.5 7 21l5-2.5L17 21l-1.5-7.5"></path>', false ),
                    );
                    foreach ( $fp_jornada as $j ) {
                        $classe = $j[3] ? 'marca-icone marca-icone-cheio' : 'marca-icone';
                        $badge = $j[3] ? '<span class="absolute -top-2 -right-2 text-[8px] font-black uppercase tracking-wider txt-forte px-1.5 py-0.5 rounded-full" style="background:linear-gradient(100deg,#080b6c,#2b2d81)">Novo</span>' : '';
                        printf(
                            '<div class="text-center px-1">
                                <div class="relative w-14 h-14 mx-auto mb-4 z-10 %s">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">%s</svg>
                                    %s
                                </div>
                                <h4 class="text-sm font-bold txt-forte leading-tight">%s</h4>
                                <p class="text-[12px] txt mt-1 leading-snug">%s</p>
                            </div>',
                            $classe, $j[2], $badge, esc_html( $j[0] ), esc_html( $j[1] )
                        );
                    }
                    ?>
                </div>
            </div>

            <div class="mt-14 text-center reveal">
                <button onclick="abrirDemo()" class="gbtn txt-forte font-bold px-8 py-4 rounded-2xl transition-all hover:-translate-y-0.5">Ver a plataforma completa</button>
                <p class="txt-fraco text-sm mt-3">Mais de 20 módulos, do primeiro contato ao documento final.</p>
            </div>
        </div>
    </section>

    <!-- ===================== TELAS REAIS DO SISTEMA ===================== -->
    <section class="relative z-10 py-24">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-12 reveal">
                <span class="txt-link font-bold tracking-widest uppercase text-xs">A rotina real, dentro do sistema</span>
                <h2 class="titulo text-[2.2rem] md:text-5xl leading-[1.03] mt-4">Feito para quem constrói a educação</h2>
                <p class="text-lg txt mt-4 max-w-2xl mx-auto">As telas do Send Educacional, reproduzidas aqui com dados ilustrativos: indicadores em tempo real, filtros por período e curso, e a operação inteira sob controle.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-center reveal">
                <div>
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full glass text-xs font-bold uppercase tracking-widest txt-link mb-5">Central de assinaturas</div>
                    <h3 class="titulo text-2xl md:text-3xl txt-forte mb-4">Contratos e assinaturas digitais, sob controle</h3>
                    <p class="txt text-lg mb-6">Do envio à assinatura concluída: acompanhe cada contrato por período letivo, curso, modalidade e status. A distribuição é em tempo real, com busca por aluno ou matrícula.</p>
                    <ul class="space-y-3">
                        <?php foreach ( array(
                            'Assinatura digital validada, e registro de contrato assinado internamente.',
                            'Distribuição por status: em assinatura, concluído, recusado, cancelado.',
                            'Filtros por período, curso, modalidade e situação acadêmica.',
                        ) as $li ) {
                            printf( '<li class="flex items-start gap-3 txt"><svg class="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>%s</li>', esc_html( $li ) );
                        } ?>
                    </ul>
                    <button onclick="abrirDemo()" class="mt-7 gbtn txt-forte font-bold px-7 py-3.5 rounded-2xl transition-all hover:-translate-y-0.5">Ver na demonstração</button>
                </div>

                <div class="sup-escura rounded-2xl overflow-hidden border linha cardring">
                    <div class="h-10 flex items-center px-4 gap-2 border-b linha bg-black/25">
                        <span class="w-2.5 h-2.5 rounded-full bg-slate-600"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-slate-600"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-slate-600"></span>
                        <span class="mx-auto text-[11px] txt font-semibold bg-bloco border linha rounded-full px-4 py-1">app.sendeducacional.com.br/assinaturas</span>
                    </div>
                    <div class="p-4 md:p-5">
                        <p class="text-sm font-extrabold txt-forte mb-3">Central de assinaturas</p>
                        <div class="grid grid-cols-2 gap-3 mb-3">
                            <div class="rounded-xl bg-white/[.03] border linha p-3"><p class="text-[10px] txt font-semibold">Concluídos</p><p class="text-2xl font-extrabold txt-forte mt-1">3.692</p></div>
                            <div class="rounded-xl bg-white/[.03] border linha p-3"><p class="text-[10px] txt font-semibold">Assinados internamente</p><p class="text-2xl font-extrabold txt-forte mt-1">389</p></div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 mb-3">
                            <div class="rounded-xl bg-white/[.03] border linha p-3">
                                <p class="text-[10px] txt font-semibold mb-2">Distribuição por status</p>
                                <div class="flex items-center gap-3">
                                    <div class="sys-donut shrink-0"><span class="relative z-10 text-xs font-bold txt-forte">94%</span></div>
                                    <div class="space-y-1 text-[10px] txt">
                                        <div class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-blue-500"></span>Concluído <span class="txt-fraco">3.692</span></div>
                                        <div class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-amber-400"></span>Em assinatura <span class="txt-fraco">217</span></div>
                                        <div class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-rose-500"></span>Recusado <span class="txt-fraco">10</span></div>
                                        <div class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-slate-500"></span>Cancelado <span class="txt-fraco">1</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-xl bg-white/[.03] border linha p-3">
                                <p class="text-[10px] txt font-semibold mb-2">Assinaturas por período</p>
                                <div class="space-y-1.5">
                                    <?php
                                    $fp_per = array( array( 'EAD Grad. 2026.2', 92 ), array( 'EAD Grad. 2026.1', 64 ), array( 'Graduação 2026.1', 44 ), array( 'Pós 2026.1', 28 ), array( 'Semi 2026.2', 14 ) );
                                    foreach ( $fp_per as $p ) {
                                        printf( '<div class="flex items-center gap-2 text-[9px]"><span class="w-20 txt truncate">%s</span><div class="flex-1 h-1.5 rounded bg-bloco"><div class="h-full rounded bg-blue-500" style="width:%d%%"></div></div></div>', esc_html( $p[0] ), (int) $p[1] );
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-xl bg-white/[.03] border linha overflow-hidden">
                            <div class="grid gap-2 px-3 py-2 text-[9px] uppercase txt-fraco font-bold border-b linha" style="grid-template-columns:1.5fr 1.4fr .8fr .9fr;">
                                <span>Aluno</span><span>Curso / período</span><span>Situação</span><span>Status</span>
                            </div>
                            <?php
                            $fp_ass = array(
                                array( 'Ana Beatriz Rocha', 'EAD · Gestão Comercial 2026.2', 'Pré-matrícula', '#7296c1', 'Em assinatura', '#f59e0b' ),
                                array( 'Lucas Martins', 'ADS 2026.2', 'Pré-matrícula', '#7296c1', 'Em assinatura', '#f59e0b' ),
                                array( 'Marina Alves', 'Enfermagem 2026.2', 'Cursando', '#7296c1', 'Concluído', '#22c55e' ),
                                array( 'Rafael Souza', 'Administração 2026.2', 'Pré-matrícula', '#7296c1', 'Concluído', '#22c55e' ),
                                array( 'Camila Ferreira', 'Ciências Contábeis 2026.2', 'Cursando', '#7296c1', 'Concluído', '#22c55e' ),
                                array( 'Bruno Almeida', 'Comércio Exterior 2026.2', 'Pré-matrícula', '#7296c1', 'Em assinatura', '#f59e0b' ),
                            );
                            foreach ( $fp_ass as $r ) {
                                printf(
                                    '<div class="grid gap-2 px-3 py-2 text-[10px] items-center border-b border-white/[.03]" style="grid-template-columns:1.5fr 1.4fr .8fr .9fr;"><span class="txt-forte font-semibold truncate">%s</span><span class="txt truncate">%s</span><span class="justify-self-start px-1.5 py-0.5 rounded text-[8px] font-bold" style="background:%s22;color:%s">%s</span><span class="justify-self-start px-1.5 py-0.5 rounded text-[8px] font-bold" style="background:%s22;color:%s">%s</span></div>',
                                    esc_html( $r[0] ), esc_html( $r[1] ), $r[3], $r[3], esc_html( $r[2] ), $r[5], $r[5], esc_html( $r[4] )
                                );
                            }
                            ?>
                        </div>
                        <p class="text-[10px] txt-fraco text-center mt-3 uppercase tracking-widest font-bold">Dados ilustrativos</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== DIFERENCIAIS ===================== -->
    <?php /* Eram seis cartões idênticos, o pior sintoma de "grade repetida".
             Aqui a seção tem um dominante à esquerda e a lista à direita, em
             filete, sem caixa. */ ?>
    <section class="relative z-10 py-28">
        <div class="container mx-auto px-6 max-w-6xl grid lg:grid-cols-12 gap-x-16 gap-y-12">

            <div class="lg:col-span-5 reveal">
                <div class="fixa">
                    <span class="txt-link font-bold tracking-widest uppercase text-xs">Por que o Send</span>
                    <h2 class="titulo text-[2.6rem] md:text-6xl leading-[0.98] mt-5 mb-6">
                        Seis motivos,<br>e nenhum deles<br>é <span class="gtext">o preço</span>.
                    </h2>
                    <p class="text-lg txt leading-relaxed mb-8 max-w-sm">
                        Sistema barato que exige três planilhas por fora sai caro. O que a gente vende é a operação inteira num lugar só, com quem responde quando dá problema.
                    </p>
                    <button onclick="abrirDemo()" class="gbtn txt-forte font-bold px-7 py-3.5 rounded-2xl transition-all hover:-translate-y-0.5">Ver na prática</button>
                </div>
            </div>

            <div class="lg:col-span-7 grid sm:grid-cols-2 gap-x-10 gap-y-10 reveal">
                <?php
                $fp_dif = array(
                    array( 'AVA próprio', 'O ambiente de aula é desenvolvido pela própria Send e nasce integrado ao acadêmico e ao financeiro: a nota da avaliação já entra no histórico do aluno.' ),
                    array( 'Uma plataforma, não remendos', 'Do primeiro contato ao documento final no mesmo sistema, com os dados conversando de ponta a ponta.' ),
                    array( 'Dados que não se perdem', 'A nota da avaliação cai no histórico e a cobrança no financeiro, sem reimportar planilha nem digitar duas vezes.' ),
                    array( 'Conformidade por segmento', 'MEC, Censo e diploma digital no superior. Conselhos, Secretarias e Censo Escolar na educação básica. Cada um com o que a sua rede exige.' ),
                    array( 'Implantação conduzida', 'Levantamento de processos, importação da base e treinamento por setor, com um consultor junto. Não um manual em PDF.' ),
                    array( '33 anos de mercado', 'Nascido dentro da Send Solutions, com a estabilidade de quem faz software de gestão há três décadas.' ),
                );
                foreach ( $fp_dif as $n => $d ) {
                    printf(
                        '<div class="marco">
                            <span class="marco-num">%02d</span>
                            <h3 class="titulo-mini txt-forte text-xl mb-2.5">%s</h3>
                            <p class="txt leading-relaxed text-[15px]">%s</p>
                        </div>',
                        $n + 1, esc_html( $d[0] ), esc_html( $d[1] )
                    );
                }
                ?>
            </div>
        </div>
    </section>

    <!-- ===================== JEITO ANTIGO x SEND ===================== -->
    <section class="relative z-10 py-24">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="text-center mb-14 reveal">
                <h2 class="titulo text-[2.2rem] md:text-5xl leading-[1.03] mb-4">Por que as instituições estão mudando</h2>
                <p class="text-lg txt">Chega de remendos. A diferença entre sistemas defasados e um ecossistema integrado.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-5 reveal">
                <div class="glass rounded-3xl p-9">
                    <h3 class="text-lg font-bold txt mb-6 flex items-center gap-2"><span class="w-6 h-6 rounded-full bg-red-500/15 text-red-400 flex items-center justify-center"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path></svg></span> O jeito antigo</h3>
                    <ul class="space-y-4 txt">
                        <?php foreach ( array( 'Filas na secretaria durante a matrícula.', 'Cobrança manual gerando inadimplência.', 'Multas no MEC por documentos físicos perdidos.', 'Vários sistemas que não conversam entre si.' ) as $x ) {
                            printf( '<li class="flex gap-3"><svg class="w-5 h-5 text-red-400/70 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path></svg>%s</li>', esc_html( $x ) );
                        } ?>
                    </ul>
                </div>
                <div class="sup-escura rounded-3xl p-9 relative overflow-hidden" style="background:#080b6c">
                    <div class="absolute -top-10 -right-10 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>
                    <h3 class="text-lg font-bold txt-forte mb-6 flex items-center gap-2 relative z-10"><span class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg></span> Com o Send Educacional</h3>
                    <ul class="space-y-4 relative z-10 font-medium txt-forte">
                        <?php foreach ( array( 'Matrícula 100% digital com assinatura validada.', 'Régua de cobrança automática e Pix instantâneo.', 'Adequação ao MEC e diploma digital nativo.', 'Tudo num lugar: do portal do aluno à contabilidade.' ) as $y ) {
                            printf( '<li class="flex gap-3"><svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>%s</li>', esc_html( $y ) );
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== SEGURANÇA + MIGRAÇÃO ===================== -->
    <section class="relative z-10 py-24">
        <div class="container mx-auto px-6 max-w-6xl grid lg:grid-cols-2 gap-14 items-center reveal">
            <div>
                <span class="txt-link font-bold tracking-widest uppercase text-xs">Segurança &amp; implantação</span>
                <h2 class="titulo text-[2rem] md:text-4xl leading-[1.04] mt-4 mb-5">Medo de trocar de sistema? A gente conduz.</h2>
                <p class="txt text-lg mb-8 leading-relaxed">Migração guiada e silenciosa: sua operação não para, nem no meio do semestre. E os dados dos seus alunos ficam sob criptografia e conformidade com a LGPD.</p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="glass rounded-2xl p-5">
                        <div class="w-10 h-10 rounded-lg bg-blue-500/15 txt-link flex items-center justify-center mb-3"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg></div>
                        <h4 class="font-bold txt-forte mb-1">100% LGPD</h4>
                        <p class="text-sm txt">Criptografia e permissões de usuário estritas.</p>
                    </div>
                    <div class="glass rounded-2xl p-5">
                        <div class="w-10 h-10 rounded-lg bg-emerald-500/15 text-emerald-600 flex items-center justify-center mb-3"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg></div>
                        <h4 class="font-bold txt-forte mb-1">Conformidade MEC</h4>
                        <p class="text-sm txt">Atualizações a cada nova portaria.</p>
                    </div>
                </div>
            </div>

            <div class="glass rounded-3xl p-8 md:p-10 cardring">
                <div class="space-y-6">
                    <?php
                    $fp_etapas = array(
                        array( '1', 'Análise e extração de dados', 'Mapeamos o banco do sistema atual e preparamos a estrutura.' ),
                        array( '2', 'Migração segura', 'Importamos alunos, notas, histórico e financeiro sem perda.' ),
                        array( '3', 'Treinamento da equipe', 'Sessões ao vivo com secretaria, financeiro e professores.' ),
                    );
                    $fp_total = count( $fp_etapas );
                    foreach ( $fp_etapas as $i => $e ) {
                        $line = ( $i < $fp_total - 1 ) ? '<div class="w-px flex-1 bg-white/10 mt-2"></div>' : '';
                        printf(
                            '<div class="flex gap-5"><div class="flex flex-col items-center"><div class="marca-passo w-9 h-9 text-sm shrink-0">%s</div>%s</div><div class="pb-2"><h4 class="text-lg font-bold txt-forte">%s</h4><p class="text-sm txt mt-1">%s</p></div></div>',
                            esc_html( $e[0] ), $line, esc_html( $e[1] ), esc_html( $e[2] )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== PROVA SOCIAL ===================== -->
    <?php se_bloco_prova_social(); ?>

    <!-- ===================== BLOG ===================== -->
    <?php
    // O blog existia mas não aparecia na home. Como o conteúdo alimenta as três
    // portas, ele precisa estar visível para quem chega pela home.
    $fp_posts = new WP_Query( array(
        'post_type'           => 'post',
        'posts_per_page'      => 3,
        'post_status'         => 'publish',
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ) );
    if ( $fp_posts->have_posts() ) : ?>
    <section class="relative z-10 py-20">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="flex flex-wrap items-end justify-between gap-4 mb-10 reveal">
                <div>
                    <span class="txt-link font-bold tracking-widest uppercase text-xs">Conteúdo</span>
                    <h2 class="titulo text-[2rem] md:text-4xl leading-[1.05] mt-3">Comunicação Send Educacional</h2>
                </div>
                <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="inline-flex items-center gap-2 font-bold txt-link hover-forte transition">Ver toda a comunicação <span aria-hidden="true">&rarr;</span></a>
            </div>

            <div class="grid md:grid-cols-3 gap-5 reveal">
                <?php while ( $fp_posts->have_posts() ) : $fp_posts->the_post();
                    $fp_cats = get_the_category();
                    ?>
                    <article class="group flex flex-col glass glass-hover rounded-3xl overflow-hidden">
                        <?php // Sem imagem destacada entra a capa da marca, na cor do segmento. ?>
                        <a href="<?php the_permalink(); ?>" class="block overflow-hidden">
                            <?php se_capa_post( 'medium_large', 'h-40' ); ?>
                        </a>
                        <div class="p-7 flex flex-col flex-grow">
                            <?php if ( $fp_cats ) : ?>
                                <span class="txt-link font-bold uppercase tracking-wider text-[10px] mb-2.5"><?php echo esc_html( $fp_cats[0]->name ); ?></span>
                            <?php endif; ?>
                            <h3 class="text-lg font-bold txt-forte leading-snug mb-3 group-hover-link transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="txt text-sm leading-relaxed mb-5"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="mt-auto inline-flex items-center gap-1.5 text-sm font-bold txt-link group-hover-forte transition">Ler artigo <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php endif; wp_reset_postdata(); ?>

    <!-- ===================== CTA FINAL ===================== -->
    <section class="relative z-10 pb-28 pt-4">
        <div class="container mx-auto px-6 max-w-6xl reveal">
            <div class="sup-escura relative overflow-hidden rounded-[2.5rem] px-8 py-16 md:p-20 text-center" style="background:linear-gradient(120deg,#335298,#1f3184 55%,#080b6c)">
                <div class="absolute -top-16 -right-16 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-16 -left-16 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
                <h2 class="titulo relative z-10 text-[2.2rem] md:text-5xl txt-forte mb-5 leading-[1.03]">Veja o Send rodando na realidade da sua instituição.</h2>
                <p class="relative z-10 text-blue-100 text-lg max-w-2xl mx-auto mb-9">Agende uma demonstração gratuita. Um especialista do seu segmento mostra os módulos que fazem sentido para a sua operação.</p>
                <button onclick="abrirDemo()" class="relative z-10 bg-white text-blue-700 hover:bg-blue-50 px-10 py-5 rounded-2xl font-extrabold text-lg transition-all hover:scale-105">Solicitar demonstração</button>
                <p class="relative z-10 text-blue-200 text-sm mt-4">Gratuita e sem compromisso</p>
            </div>
        </div>
    </section>

</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // reveal on scroll
        var io = new IntersectionObserver(function (es) {
            es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
        }, { threshold: .12 });
        document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });

        // abas de personas
        var btns = document.querySelectorAll('.tab-content');
        document.querySelectorAll('[data-target]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                document.querySelectorAll('.tabx').forEach(function (b) { b.classList.remove('tab-active'); });
                btns.forEach(function (c) { c.classList.add('hidden'); });
                btn.classList.add('tab-active');
                var t = document.getElementById(btn.getAttribute('data-target'));
                if (t) t.classList.remove('hidden');
            });
        });
    });
</script>

<?php get_footer(); ?>
