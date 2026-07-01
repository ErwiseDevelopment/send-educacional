<?php get_header(); ?>

<style>
    .ink { background:#070b18; }
    /* camadas de ambiente (aurora + grade) fixas atrás de tudo */
    .aurora { position:fixed; inset:0; z-index:0; pointer-events:none; overflow:hidden; }
    .aurora::before, .aurora::after { content:""; position:absolute; border-radius:50%; filter:blur(130px); opacity:.45; }
    .aurora::before { width:620px; height:620px; background:#2563eb; top:-160px; left:-120px; animation:drift1 20s ease-in-out infinite; }
    .aurora::after  { width:520px; height:520px; background:#7c3aed; top:180px; right:-140px; animation:drift2 24s ease-in-out infinite; }
    @keyframes drift1 { 0%,100%{transform:translate(0,0)} 50%{transform:translate(120px,90px)} }
    @keyframes drift2 { 0%,100%{transform:translate(0,0)} 50%{transform:translate(-110px,120px)} }
    .gridmask { position:fixed; inset:0; z-index:0; pointer-events:none;
        background-image:linear-gradient(rgba(148,163,184,.06) 1px,transparent 1px),linear-gradient(90deg,rgba(148,163,184,.06) 1px,transparent 1px);
        background-size:54px 54px;
        -webkit-mask-image:radial-gradient(100% 55% at 50% 0,#000,transparent 78%); mask-image:radial-gradient(100% 55% at 50% 0,#000,transparent 78%); }

    .gtext { background:linear-gradient(100deg,#60a5fa,#818cf8 45%,#c084fc); -webkit-background-clip:text; background-clip:text; color:transparent; }
    .gbtn  { background:linear-gradient(100deg,#2563eb,#6d4bef); box-shadow:0 10px 30px -8px rgba(79,70,229,.6); }
    .gbtn:hover { box-shadow:0 16px 42px -8px rgba(79,70,229,.9); }
    .glass { background:rgba(255,255,255,.04); border:1px solid rgba(255,255,255,.09); backdrop-filter:blur(10px); -webkit-backdrop-filter:blur(10px); }
    .glass-hover { transition:transform .3s ease, border-color .3s ease, box-shadow .3s ease; }
    .glass-hover:hover { transform:translateY(-4px); border-color:rgba(96,165,250,.45); box-shadow:0 30px 60px -30px rgba(37,99,235,.55); }
    .cardring { box-shadow:0 1px 0 0 rgba(255,255,255,.06) inset, 0 40px 90px -40px rgba(2,6,23,.95); }
    .igrad { background:linear-gradient(135deg,#3b82f6,#7c3aed); }

    .fp-dash { background:#fff; border-radius:16px; overflow:hidden; border:1px solid rgba(15,23,42,.08); }

    .floaty  { animation:floaty 6s ease-in-out infinite; }
    .floaty2 { animation:floaty 7.5s ease-in-out infinite; }
    @keyframes floaty { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-10px)} }

    .reveal { opacity:0; transform:translateY(18px); transition:opacity .7s ease, transform .7s ease; }
    .reveal.in { opacity:1; transform:none; }

    .mqo { overflow:hidden; -webkit-mask-image:linear-gradient(90deg,transparent,#000 12%,#000 88%,transparent); mask-image:linear-gradient(90deg,transparent,#000 12%,#000 88%,transparent); }
    .mq { display:flex; gap:46px; white-space:nowrap; animation:mq 28s linear infinite; }
    @keyframes mq { from{transform:translateX(0)} to{transform:translateX(-50%)} }

    .tabx { color:#94a3b8; border-bottom:2px solid transparent; }
    .tabx.tab-active { color:#fff; border-bottom-color:#6d4bef; }

    @media (prefers-reduced-motion:reduce){
        .reveal{opacity:1;transform:none;transition:none}
        .floaty,.floaty2,.mq,.aurora::before,.aurora::after{animation:none}
    }
</style>

<main class="ink relative text-white overflow-hidden">
    <div class="aurora"></div>
    <div class="gridmask"></div>

    <!-- ===================== HERO ===================== -->
    <section class="relative z-10 pt-36 pb-24">
        <div class="container mx-auto px-6 text-center max-w-5xl">
            <a href="#ava" class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full glass text-xs font-semibold text-slate-300 mb-8 hover:text-white transition">
                <span class="relative flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-400"></span></span>
                Novo: AVA nativo, sem depender de Moodle
                <span class="text-slate-500">&rarr;</span>
            </a>

            <h1 class="text-[2.7rem] md:text-7xl font-extrabold tracking-tight leading-[1.03] mb-7">
                Toda a gestão da sua<br class="hidden md:block"> instituição em <span class="gtext">um só sistema</span>
            </h1>

            <p class="text-lg md:text-xl text-slate-400 max-w-2xl mx-auto leading-relaxed mb-9">
                Do processo seletivo ao diploma digital: acadêmico, financeiro, secretaria e o <span class="text-white font-semibold">AVA nativo</span> em uma só plataforma — adequada ao MEC, com o suporte de quem tem 33 anos de mercado.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="gbtn text-white font-bold px-8 py-4 rounded-2xl text-lg w-full sm:w-auto transition-all hover:-translate-y-0.5">Solicitar demonstração</button>
                <a href="#ecossistema" class="w-full sm:w-auto px-8 py-4 rounded-2xl text-lg font-semibold text-white glass hover:bg-white/10 transition">Explorar módulos</a>
            </div>
            <p class="text-slate-500 text-sm mt-5">Demonstração gratuita · sem compromisso · feita por um especialista</p>
        </div>

        <!-- tela do sistema (clara) sobre o hero escuro -->
        <div class="container mx-auto px-6 relative mt-16 max-w-5xl reveal">
            <div class="relative">
                <div class="absolute -inset-x-10 -top-8 bottom-0 bg-gradient-to-b from-blue-500/40 to-violet-600/10 blur-3xl rounded-[3rem]"></div>

                <div class="relative fp-dash cardring">
                    <div class="h-11 border-b border-slate-100 bg-slate-50 flex items-center px-4 gap-2">
                        <span class="w-3 h-3 rounded-full bg-slate-300"></span>
                        <span class="w-3 h-3 rounded-full bg-slate-300"></span>
                        <span class="w-3 h-3 rounded-full bg-slate-300"></span>
                        <span class="mx-auto text-[11px] text-slate-400 font-semibold bg-white border border-slate-100 rounded-full px-4 py-1">app.sendeducacional.com.br</span>
                    </div>

                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sistema-painel.png" alt="Painel do Send Educacional — todos os módulos em um só lugar" class="w-full block" loading="lazy">
                </div>

                <div class="floaty hidden md:flex absolute -left-8 bottom-14 items-center gap-3 glass rounded-2xl px-4 py-3">
                    <div class="w-9 h-9 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg></div>
                    <div class="text-left"><p class="text-[10px] text-slate-400 font-bold uppercase">Mensalidade</p><p class="text-sm font-bold text-white">Paga via Pix</p></div>
                </div>
                <div class="floaty2 hidden md:flex absolute -right-6 top-20 items-center gap-3 glass rounded-2xl px-4 py-3">
                    <div class="w-9 h-9 rounded-full bg-blue-500/20 text-blue-300 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-3-3v6M4 6h16M4 6a1 1 0 011-1h14a1 1 0 011 1M4 6v12a1 1 0 001 1h14a1 1 0 001-1V6"></path></svg></div>
                    <div class="text-left"><p class="text-[10px] text-slate-400 font-bold uppercase">Diploma</p><p class="text-sm font-bold text-white">Digital emitido</p></div>
                </div>
            </div>
        </div>

        <!-- marquee -->
        <div class="relative z-10 mt-16 border-t border-white/10 py-6 mqo">
            <div class="mq text-slate-500 text-sm font-semibold uppercase tracking-widest">
                <span>MEC</span><span>Diploma Digital</span><span>Pix</span><span>Getnet</span><span>Santander</span><span>WhatsApp</span><span>Asaas</span><span>LGPD</span><span>Polos EAD</span>
                <span>MEC</span><span>Diploma Digital</span><span>Pix</span><span>Getnet</span><span>Santander</span><span>WhatsApp</span><span>Asaas</span><span>LGPD</span><span>Polos EAD</span>
            </div>
        </div>
    </section>

    <!-- ===================== NÚMEROS ===================== -->
    <section class="relative z-10 py-16">
        <div class="container mx-auto px-6 max-w-6xl grid grid-cols-2 md:grid-cols-4 gap-4 reveal">
            <?php
            $fp_stats = array(
                array( '33', 'Anos de mercado' ),
                array( '20+', 'Módulos integrados' ),
                array( '3.000', 'Alunos em produção' ),
                array( '100%', 'Aderência ao MEC' ),
            );
            foreach ( $fp_stats as $s ) {
                printf(
                    '<div class="glass rounded-2xl p-6 text-center"><div class="text-4xl md:text-5xl font-extrabold gtext tracking-tight">%s</div><p class="text-slate-400 text-xs font-semibold uppercase tracking-wide mt-2">%s</p></div>',
                    esc_html( $s[0] ), esc_html( $s[1] )
                );
            }
            ?>
        </div>
    </section>

    <!-- ===================== AVA NATIVO ===================== -->
    <section id="ava" class="relative z-10 py-24">
        <div class="container mx-auto px-6 max-w-6xl grid lg:grid-cols-2 gap-14 items-center reveal">
            <div>
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/30 text-blue-300 text-xs font-bold uppercase tracking-widest mb-6">
                    <span class="relative flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span></span>
                    Novidade
                </div>
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight leading-tight mb-6">O AVA agora é <span class="gtext">nativo</span> — não de terceiros.</h2>
                <p class="text-lg text-slate-400 leading-relaxed mb-8">Desenvolvemos o nosso próprio Ambiente Virtual de Aprendizagem. Aulas, materiais e avaliações online ficam dentro do mesmo sistema do acadêmico e do financeiro — o aluno não troca de ambiente e as notas caem direto no histórico, sem reimportar nada.</p>
                <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="gbtn text-white font-bold px-7 py-3.5 rounded-2xl transition-all hover:-translate-y-0.5">Ver o AVA na demonstração</button>
            </div>
            <div class="glass rounded-3xl p-7 md:p-9 cardring">
                <p class="text-xs font-bold uppercase tracking-widest text-blue-300 mb-6">O que o AVA nativo entrega</p>
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
                            '<li class="flex items-start gap-3 text-slate-200"><svg class="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>%s</li>',
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
                <span class="text-blue-400 font-bold tracking-widest uppercase text-xs">Ecossistema integrado</span>
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight mt-4">Do processo seletivo ao diploma digital</h2>
                <p class="text-lg text-slate-400 mt-4 max-w-2xl mx-auto">Todos os setores da instituição no mesmo sistema, com os dados conversando de ponta a ponta.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 reveal">
                <div class="md:col-span-2 glass glass-hover rounded-3xl p-9 flex flex-col justify-between">
                    <div class="md:w-3/4">
                        <div class="w-14 h-14 igrad rounded-2xl flex items-center justify-center mb-6"><svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7"></path></svg></div>
                        <h3 class="text-2xl font-bold text-white mb-3">Secretaria Acadêmica</h3>
                        <p class="text-slate-400 leading-relaxed mb-6">Do processo seletivo à colação de grau: matrícula e rematrícula online, diário de classe, histórico, diploma digital e adequação às portarias do MEC.</p>
                    </div>
                    <a href="<?php echo home_url('/gestao-academica'); ?>" class="inline-flex items-center gap-2 font-bold text-blue-300 hover:text-white transition">Conhecer o módulo acadêmico <span aria-hidden="true">&rarr;</span></a>
                </div>

                <div class="glass glass-hover rounded-3xl p-9 flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center mb-6"><svg class="w-7 h-7 text-blue-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V7m0 9v1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <h3 class="text-xl font-bold text-white mb-3">Gestão Financeira</h3>
                        <p class="text-slate-400 leading-relaxed mb-6">Boletos, Pix e régua de cobrança automática, acordos, DRE e notas fiscais — inadimplência sob controle, do lançamento ao caixa.</p>
                    </div>
                    <a href="<?php echo home_url('/gestao-financeira'); ?>" class="inline-flex items-center gap-2 font-bold text-blue-300 hover:text-white transition">Ver módulo financeiro <span aria-hidden="true">&rarr;</span></a>
                </div>

                <div class="glass glass-hover rounded-3xl p-9 flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center mb-6"><svg class="w-7 h-7 text-violet-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2h-4m-6 4h6"></path></svg></div>
                        <h3 class="text-xl font-bold text-white mb-3">Portais + AVA nativo</h3>
                        <p class="text-slate-400 leading-relaxed mb-6">Portais do aluno, do docente e do coordenador, com gestão de polos EAD e o AVA nativo junto: notas, diário, requerimentos e aulas no mesmo login.</p>
                    </div>
                    <a href="<?php echo home_url('/portais'); ?>" class="inline-flex items-center gap-2 font-bold text-blue-300 hover:text-white transition">Explorar os portais <span aria-hidden="true">&rarr;</span></a>
                </div>

                <div class="md:col-span-2 glass glass-hover rounded-3xl p-9 flex items-center gap-6">
                    <div class="w-14 h-14 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0"><svg class="w-7 h-7 text-blue-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg></div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Biblioteca &amp; GED</h3>
                        <p class="text-slate-400 leading-relaxed">Gestão eletrônica de documentos para adequação fiscal e acadêmica, com controle completo de acervo — documentos 100% digitalizados.</p>
                    </div>
                </div>
            </div>

            <!-- todos os módulos -->
            <div class="mt-12 reveal">
                <p class="text-center text-sm font-semibold text-slate-400 mb-5">E ainda mais de <span class="font-bold text-white">20 módulos</span> na mesma plataforma</p>
                <div class="flex flex-wrap justify-center gap-2.5">
                    <?php
                    $fp_modulos = array( 'Processo seletivo', 'Matrícula & rematrícula', 'Assinatura digital', 'Secretaria acadêmica', 'Diário de classe', 'Financeiro & DRE', 'Portal do aluno', 'Portal do docente', 'Portal do coordenador', 'Gestão de polos EAD', 'AVA nativo', 'Diploma digital', 'CRM & Captação', 'Retenção de alunos', 'Biblioteca & GED', 'BI & Indicadores' );
                    foreach ( $fp_modulos as $fp_mod ) {
                        printf( '<span class="px-4 py-2 rounded-full glass text-slate-300 text-sm font-semibold">%s</span>', esc_html( $fp_mod ) );
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== JORNADA COMPLETA ===================== -->
    <section class="relative z-10 py-24">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16 reveal">
                <span class="text-blue-400 font-bold tracking-widest uppercase text-xs">Uma plataforma, a jornada inteira</span>
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight mt-4">Da captação ao <span class="gtext">diploma digital</span>, sem trocar de sistema</h2>
                <p class="text-slate-400 max-w-2xl mx-auto text-lg mt-4">Matrícula com assinatura digital, secretaria, financeiro, AVA e diploma — cada etapa já conversa com a próxima, sem planilha nem sistema paralelo.</p>
            </div>

            <div class="relative reveal">
                <div class="hidden lg:block absolute top-7 left-[8%] right-[8%] h-px bg-gradient-to-r from-blue-500/40 via-violet-500/40 to-fuchsia-500/40"></div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-x-4 gap-y-8">
                    <?php
                    $fp_jornada = array(
                        array( 'Captação & CRM', 'Funil de leads, campanhas e recuperação de matrículas.', '<path stroke-linecap="round" stroke-linejoin="round" d="M4 5h16M7 10h10M10 15h4M11 19h2"></path>', false ),
                        array( 'Matrícula & Assinatura', '100% digital, com contrato assinado eletronicamente.', '<path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"></path><path stroke-linecap="round" stroke-linejoin="round" d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>', false ),
                        array( 'Secretaria acadêmica', 'Diário de classe, histórico, rematrícula e documentos.', '<path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7M5 11v5c0 1 3 3 7 3s7-2 7-3v-5"></path>', false ),
                        array( 'Financeiro', 'Boletos, Pix, régua de cobrança, acordos e DRE.', '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V7m0 9v1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>', false ),
                        array( 'AVA nativo', 'Aulas, materiais e avaliações online — sem Moodle.', '<path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h14a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M9 20h6M12 16v4"></path><path fill="currentColor" stroke="none" d="M10 7.5l4 2.5-4 2.5v-5z"></path>', true ),
                        array( 'Diploma digital', 'Emissão nativa, adequada às portarias do MEC.', '<path stroke-linecap="round" stroke-linejoin="round" d="M12 15a4 4 0 100-8 4 4 0 000 8z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M8.5 13.5 7 21l5-2.5L17 21l-1.5-7.5"></path>', false ),
                    );
                    foreach ( $fp_jornada as $j ) {
                        $bg    = $j[3] ? 'linear-gradient(135deg,#7c3aed,#c026d3)' : 'linear-gradient(135deg,#3b82f6,#7c3aed)';
                        $badge = $j[3] ? '<span class="absolute -top-2 -right-2 text-[8px] font-black uppercase tracking-wider text-white px-1.5 py-0.5 rounded-full" style="background:linear-gradient(100deg,#7c3aed,#c026d3)">Novo</span>' : '';
                        printf(
                            '<div class="text-center px-1">
                                <div class="relative w-14 h-14 mx-auto rounded-2xl flex items-center justify-center mb-4 z-10 ring-4 ring-[#070b18]" style="background:%s">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">%s</svg>
                                    %s
                                </div>
                                <h4 class="text-sm font-bold text-white leading-tight">%s</h4>
                                <p class="text-[12px] text-slate-400 mt-1 leading-snug">%s</p>
                            </div>',
                            $bg, $j[2], $badge, esc_html( $j[0] ), esc_html( $j[1] )
                        );
                    }
                    ?>
                </div>
            </div>

            <div class="mt-14 text-center reveal">
                <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="gbtn text-white font-bold px-8 py-4 rounded-2xl transition-all hover:-translate-y-0.5">Ver a plataforma completa</button>
                <p class="text-slate-500 text-sm mt-3">Mais de 20 módulos, do primeiro contato ao diploma.</p>
            </div>
        </div>
    </section>

    <!-- ===================== TELAS REAIS DO SISTEMA ===================== -->
    <section class="relative z-10 py-24">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-12 reveal">
                <span class="text-blue-400 font-bold tracking-widest uppercase text-xs">A rotina real, dentro do sistema</span>
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight mt-4">Feito para quem constrói a educação</h2>
                <p class="text-lg text-slate-400 mt-4 max-w-2xl mx-auto">Telas de verdade do Send Educacional: indicadores em tempo real, filtros por período e curso, e a operação inteira sob controle.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-center reveal">
                <div>
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full glass text-xs font-bold uppercase tracking-widest text-blue-300 mb-5">Central de assinaturas</div>
                    <h3 class="text-2xl md:text-3xl font-bold text-white mb-4">Contratos e assinaturas digitais, sob controle</h3>
                    <p class="text-slate-400 text-lg mb-6">Do envio à assinatura concluída: acompanhe cada contrato por período letivo, curso, modalidade e status — com distribuição em tempo real e busca por aluno ou matrícula.</p>
                    <ul class="space-y-3">
                        <?php foreach ( array(
                            'Assinatura digital validada — e registro de contrato assinado internamente.',
                            'Distribuição por status: em assinatura, concluído, recusado, cancelado.',
                            'Filtros por período, curso, modalidade e situação acadêmica.',
                        ) as $li ) {
                            printf( '<li class="flex items-start gap-3 text-slate-300"><svg class="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>%s</li>', esc_html( $li ) );
                        } ?>
                    </ul>
                    <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="mt-7 gbtn text-white font-bold px-7 py-3.5 rounded-2xl transition-all hover:-translate-y-0.5">Ver na demonstração</button>
                </div>

                <div class="rounded-2xl overflow-hidden border border-white/10 bg-slate-950 cardring">
                    <div class="h-10 flex items-center px-4 gap-2 border-b border-white/10 bg-slate-900/70">
                        <span class="w-2.5 h-2.5 rounded-full bg-slate-600"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-slate-600"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-slate-600"></span>
                        <span class="mx-auto text-[11px] text-slate-400 font-semibold bg-white/5 border border-white/10 rounded-full px-4 py-1">app.sendeducacional.com.br/assinaturas</span>
                    </div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sistema-assinaturas.png" alt="Central de assinaturas do Send Educacional" class="w-full max-h-[560px] object-cover object-top block" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== JEITO ANTIGO x SEND ===================== -->
    <section class="relative z-10 py-24">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="text-center mb-14 reveal">
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">Por que as instituições estão mudando</h2>
                <p class="text-lg text-slate-400">Chega de remendos. A diferença entre sistemas defasados e um ecossistema integrado.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-5 reveal">
                <div class="glass rounded-3xl p-9">
                    <h3 class="text-lg font-bold text-slate-300 mb-6 flex items-center gap-2"><span class="w-6 h-6 rounded-full bg-red-500/15 text-red-400 flex items-center justify-center"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path></svg></span> O jeito antigo</h3>
                    <ul class="space-y-4 text-slate-400">
                        <?php foreach ( array( 'Filas na secretaria durante a matrícula.', 'Cobrança manual gerando inadimplência.', 'Multas no MEC por documentos físicos perdidos.', 'Vários sistemas que não conversam entre si.' ) as $x ) {
                            printf( '<li class="flex gap-3"><svg class="w-5 h-5 text-red-400/70 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path></svg>%s</li>', esc_html( $x ) );
                        } ?>
                    </ul>
                </div>
                <div class="rounded-3xl p-9 relative overflow-hidden" style="background:linear-gradient(135deg,#1d4ed8,#6d28d9)">
                    <div class="absolute -top-10 -right-10 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>
                    <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2 relative z-10"><span class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg></span> Com o Send Educacional</h3>
                    <ul class="space-y-4 relative z-10 font-medium text-white">
                        <?php foreach ( array( 'Matrícula 100% digital com assinatura validada.', 'Régua de cobrança automática e Pix instantâneo.', 'Adequação ao MEC e diploma digital nativo.', 'Tudo num lugar: do portal do aluno à contabilidade.' ) as $y ) {
                            printf( '<li class="flex gap-3"><svg class="w-5 h-5 text-emerald-300 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>%s</li>', esc_html( $y ) );
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
                <span class="text-blue-400 font-bold tracking-widest uppercase text-xs">Segurança &amp; implantação</span>
                <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight mt-4 mb-5">Medo de trocar de sistema? A gente conduz.</h2>
                <p class="text-slate-400 text-lg mb-8 leading-relaxed">Migração guiada e silenciosa: sua operação não para, nem no meio do semestre. E os dados dos seus alunos ficam sob criptografia e conformidade com a LGPD.</p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="glass rounded-2xl p-5">
                        <div class="w-10 h-10 rounded-lg bg-blue-500/15 text-blue-300 flex items-center justify-center mb-3"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg></div>
                        <h4 class="font-bold text-white mb-1">100% LGPD</h4>
                        <p class="text-sm text-slate-400">Criptografia e permissões de usuário estritas.</p>
                    </div>
                    <div class="glass rounded-2xl p-5">
                        <div class="w-10 h-10 rounded-lg bg-emerald-500/15 text-emerald-300 flex items-center justify-center mb-3"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg></div>
                        <h4 class="font-bold text-white mb-1">Conformidade MEC</h4>
                        <p class="text-sm text-slate-400">Atualizações a cada nova portaria.</p>
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
                            '<div class="flex gap-5"><div class="flex flex-col items-center"><div class="w-9 h-9 rounded-full igrad flex items-center justify-center font-bold text-sm text-white shrink-0">%s</div>%s</div><div class="pb-2"><h4 class="text-lg font-bold text-white">%s</h4><p class="text-sm text-slate-400 mt-1">%s</p></div></div>',
                            esc_html( $e[0] ), $line, esc_html( $e[1] ), esc_html( $e[2] )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== CTA FINAL ===================== -->
    <section class="relative z-10 pb-28 pt-4">
        <div class="container mx-auto px-6 max-w-6xl reveal">
            <div class="relative overflow-hidden rounded-[2.5rem] px-8 py-16 md:p-20 text-center" style="background:linear-gradient(120deg,#1d4ed8,#4f46e5 55%,#7c3aed)">
                <div class="absolute -top-16 -right-16 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-16 -left-16 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
                <h2 class="relative z-10 text-3xl md:text-5xl font-extrabold text-white mb-5 leading-tight">Veja o Send rodando na realidade da sua instituição.</h2>
                <p class="relative z-10 text-blue-100 text-lg max-w-2xl mx-auto mb-9">Agende uma demonstração gratuita. Um especialista mostra os módulos que fazem sentido para o porte da sua escola.</p>
                <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="relative z-10 bg-white text-blue-700 hover:bg-blue-50 px-10 py-5 rounded-2xl font-extrabold text-lg transition-all hover:scale-105">Solicitar demonstração</button>
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
