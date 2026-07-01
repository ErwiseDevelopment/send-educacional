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

                    <div class="grid" style="grid-template-columns:158px 1fr;">
                        <div class="bg-slate-900 py-4 px-3 flex flex-col gap-1">
                            <div class="flex items-center gap-2 px-2 mb-3">
                                <div class="w-7 h-7 rounded-lg igrad text-white font-extrabold flex items-center justify-center text-xs">S</div>
                                <span class="text-white text-[12px] font-bold tracking-tight">Send<span class="text-slate-500 font-medium"> Edu</span></span>
                            </div>
                            <?php
                            $fp_nav = array( 'Painel' => true, 'Secretaria' => false, 'Acadêmico' => false, 'Financeiro' => false, 'AVA' => false, 'Relatórios' => false );
                            foreach ( $fp_nav as $fp_label => $fp_on ) {
                                printf(
                                    '<span class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-[11px] font-semibold %s"><span class="w-3.5 h-3.5 rounded %s"></span>%s</span>',
                                    $fp_on ? 'bg-blue-600 text-white' : 'text-slate-400',
                                    $fp_on ? 'bg-white/40' : 'bg-white/10',
                                    esc_html( $fp_label )
                                );
                            }
                            ?>
                        </div>

                        <div class="p-5 md:p-6 text-left bg-white">
                            <div class="flex items-center justify-between mb-5">
                                <div>
                                    <p class="text-sm md:text-base font-extrabold text-slate-900 tracking-tight">Painel acadêmico</p>
                                    <p class="text-[11px] text-slate-400 font-medium">Faculdade Exemplo · período 2026.1</p>
                                </div>
                                <div class="hidden sm:flex gap-1.5 text-[11px] font-semibold">
                                    <span class="px-3 py-1.5 rounded-lg bg-blue-600 text-white">2026.1</span>
                                    <span class="px-3 py-1.5 rounded-lg bg-slate-100 text-slate-500">2025.2</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
                                <div class="rounded-xl border border-slate-100 p-3">
                                    <p class="text-[10px] font-semibold text-slate-400 uppercase tracking-wide">Matrículas 2026.1</p>
                                    <p class="text-lg font-extrabold text-slate-900 leading-tight">1.284</p>
                                    <span class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald-600"><svg class="w-2.5 h-2.5" viewBox="0 0 10 10" fill="currentColor"><path d="M5 1 9 8 1 8Z"></path></svg> 12%</span>
                                </div>
                                <div class="rounded-xl border border-slate-100 p-3">
                                    <p class="text-[10px] font-semibold text-slate-400 uppercase tracking-wide">Inadimplência</p>
                                    <p class="text-lg font-extrabold text-slate-900 leading-tight">4,2%</p>
                                    <span class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald-600"><svg class="w-2.5 h-2.5" viewBox="0 0 10 10" fill="currentColor"><path d="M5 9 1 2 9 2Z"></path></svg> 1,8pp</span>
                                </div>
                                <div class="rounded-xl border border-slate-100 p-3">
                                    <p class="text-[10px] font-semibold text-slate-400 uppercase tracking-wide">Risco de evasão</p>
                                    <p class="text-lg font-extrabold text-slate-900 leading-tight">37</p>
                                    <span class="inline-flex items-center gap-1 text-[10px] font-bold text-amber-600">alunos</span>
                                </div>
                                <div class="rounded-xl border border-slate-100 p-3">
                                    <p class="text-[10px] font-semibold text-slate-400 uppercase tracking-wide">Rematrícula</p>
                                    <p class="text-lg font-extrabold text-slate-900 leading-tight">86%</p>
                                    <span class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald-600"><svg class="w-2.5 h-2.5" viewBox="0 0 10 10" fill="currentColor"><path d="M5 1 9 8 1 8Z"></path></svg> concluída</span>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-3 gap-3">
                                <div class="md:col-span-2 rounded-xl border border-slate-100 p-3">
                                    <div class="flex items-center justify-between mb-2.5">
                                        <p class="text-[10px] font-semibold text-slate-400 uppercase tracking-wide">Últimas matrículas</p>
                                        <span class="text-[10px] font-semibold text-blue-600">ver todas</span>
                                    </div>
                                    <div class="space-y-2">
                                        <?php
                                        $fp_matriculas = array(
                                            array( 'Ana Beatriz Rocha', 'Direito', 'Noite', 'Confirmada', 'bg-emerald-50 text-emerald-600' ),
                                            array( 'Lucas Martins', 'Análise e Desenv. de Sistemas', 'EAD', 'Aguardando', 'bg-amber-50 text-amber-600' ),
                                            array( 'Marina Alves', 'Enfermagem', 'Manhã', 'Confirmada', 'bg-emerald-50 text-emerald-600' ),
                                            array( 'Rafael Souza', 'Administração', 'Noite', 'Contrato', 'bg-blue-50 text-blue-600' ),
                                        );
                                        foreach ( $fp_matriculas as $m ) {
                                            printf(
                                                '<div class="flex items-center gap-2 text-[11px]">
                                                    <span class="w-6 h-6 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center font-bold text-[10px] shrink-0">%s</span>
                                                    <span class="font-semibold text-slate-700 w-24 truncate">%s</span>
                                                    <span class="text-slate-400 flex-1 truncate hidden sm:block">%s</span>
                                                    <span class="text-slate-400 w-10 hidden sm:block">%s</span>
                                                    <span class="px-2 py-0.5 rounded-full font-bold %s">%s</span>
                                                </div>',
                                                esc_html( mb_substr( $m[0], 0, 1 ) ),
                                                esc_html( $m[0] ), esc_html( $m[1] ), esc_html( $m[2] ), $m[4], esc_html( $m[3] )
                                            );
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="rounded-xl border border-slate-100 p-3">
                                    <div class="flex items-center gap-1.5 mb-2.5">
                                        <span class="px-1.5 py-0.5 rounded bg-indigo-50 text-indigo-600 text-[9px] font-bold uppercase tracking-wide">AVA</span>
                                        <p class="text-[10px] font-semibold text-slate-400 uppercase tracking-wide">a corrigir</p>
                                    </div>
                                    <div class="space-y-2">
                                        <?php
                                        $fp_ava = array( array( 'Cálculo I', '12' ), array( 'Anatomia', '8' ), array( 'Prog. Orient. a Objetos', '5' ) );
                                        foreach ( $fp_ava as $a ) {
                                            printf(
                                                '<div class="flex items-center justify-between gap-2 text-[11px]"><span class="text-slate-600 font-medium truncate">%s</span><span class="w-6 h-5 rounded bg-indigo-600 text-white font-bold flex items-center justify-center text-[10px] shrink-0">%s</span></div>',
                                                esc_html( $a[0] ), esc_html( $a[1] )
                                            );
                                        }
                                        ?>
                                    </div>
                                    <div class="mt-3 pt-2 border-t border-slate-100 text-[10px] font-semibold text-indigo-600">Abrir diário de classe</div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    $fp_modulos = array( 'Processo seletivo', 'Secretaria acadêmica', 'Diário de classe', 'Rematrícula online', 'Financeiro & DRE', 'Portal do aluno', 'Portal do docente', 'Portal do coordenador', 'Gestão de polos EAD', 'AVA nativo', 'Diploma digital', 'CRM & Captação', 'Biblioteca & GED', 'BI & Indicadores' );
                    foreach ( $fp_modulos as $fp_mod ) {
                        printf( '<span class="px-4 py-2 rounded-full glass text-slate-300 text-sm font-semibold">%s</span>', esc_html( $fp_mod ) );
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== MÓDULOS NOVOS (crescimento) ===================== -->
    <section class="relative z-10 py-24">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-14 reveal">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-300 text-xs font-bold uppercase tracking-widest mb-4">
                    <span class="relative flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span></span>
                    Em constante evolução
                </div>
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight">Os módulos mais novos para <span class="gtext">crescer e reter</span></h2>
                <p class="text-slate-400 max-w-2xl mx-auto text-lg mt-4">Além do dia a dia da gestão: ferramentas para captar, ensinar e reter alunos, desenvolvidas pela própria Send.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6 reveal">
                <div class="glass glass-hover rounded-3xl p-9 relative">
                    <span class="absolute -top-3 right-8 text-white text-[10px] font-black px-3 py-1.5 rounded-full uppercase tracking-widest inline-flex items-center gap-1.5" style="background:linear-gradient(100deg,#7c3aed,#c026d3)"><svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor"><path d="M13 2 4.5 13H11l-1 9 8.5-11H12l1-9z"></path></svg> Novidade</span>
                    <div class="w-14 h-14 rounded-2xl bg-violet-500/15 border border-violet-500/30 flex items-center justify-center mb-6"><svg class="w-7 h-7 text-violet-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h14a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M9 20h6M12 16v4"></path><path fill="currentColor" stroke="none" d="M10 7.5l4 2.5-4 2.5v-5z"></path></svg></div>
                    <h3 class="text-2xl font-bold text-white mb-3">AVA nativo</h3>
                    <p class="text-slate-400 leading-relaxed mb-7">Ambiente de aula desenvolvido pela própria Send: aulas, avaliações e notas dentro do mesmo sistema do acadêmico e do financeiro — sem depender de Moodle.</p>
                    <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="inline-flex items-center gap-2 font-bold text-violet-300 hover:text-white transition">Conhecer o AVA <span aria-hidden="true">&rarr;</span></button>
                </div>

                <div class="glass glass-hover rounded-3xl p-9 relative">
                    <span class="absolute -top-3 right-8 gbtn text-white text-[10px] font-black px-3 py-1.5 rounded-full uppercase tracking-widest inline-flex items-center gap-1.5"><svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor"><path d="M13 2 4.5 13H11l-1 9 8.5-11H12l1-9z"></path></svg> Novidade</span>
                    <div class="w-14 h-14 rounded-2xl bg-blue-500/15 border border-blue-500/30 flex items-center justify-center mb-6"><svg class="w-7 h-7 text-blue-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M4 4v6l6 4-6 4v2h16v-2l-6-4 6-4V4"></path></svg></div>
                    <h3 class="text-2xl font-bold text-white mb-3">CRM &amp; Captação</h3>
                    <p class="text-slate-400 leading-relaxed mb-7">Acompanhe cada lead desde o primeiro clique no site, organize o funil de captação e recupere matrículas que ficaram pelo caminho.</p>
                    <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="inline-flex items-center gap-2 font-bold text-blue-300 hover:text-white transition">Conhecer o CRM <span aria-hidden="true">&rarr;</span></button>
                </div>

                <div class="glass glass-hover rounded-3xl p-9 relative">
                    <span class="absolute -top-3 right-8 text-white text-[10px] font-black px-3 py-1.5 rounded-full uppercase tracking-widest inline-flex items-center gap-1.5" style="background:linear-gradient(100deg,#10b981,#14b8a6)"><svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor"><path d="M13 2 4.5 13H11l-1 9 8.5-11H12l1-9z"></path></svg> Lançamento</span>
                    <div class="w-14 h-14 rounded-2xl bg-emerald-500/15 border border-emerald-500/30 flex items-center justify-center mb-6"><svg class="w-7 h-7 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 10-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 000-7.78z"></path></svg></div>
                    <h3 class="text-2xl font-bold text-white mb-3">Retenção de Alunos</h3>
                    <p class="text-slate-400 leading-relaxed mb-7">A ferramenta cruza frequência, notas e financeiro e gera alertas de risco de evasão — para você agir antes de o aluno pedir transferência.</p>
                    <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="inline-flex items-center gap-2 font-bold text-emerald-300 hover:text-white transition">Saber mais sobre retenção <span aria-hidden="true">&rarr;</span></button>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== PERSONAS (telas reais) ===================== -->
    <section class="relative z-10 py-24">
        <div class="container mx-auto px-6 max-w-6xl text-center">
            <div class="mb-12 reveal">
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">Feito para quem constrói a educação</h2>
                <p class="text-lg text-slate-400">Cada setor enxerga a instituição pela tela que faz sentido para o seu trabalho.</p>
            </div>

            <div class="flex flex-wrap justify-center gap-6 mb-12 border-b border-white/10">
                <button class="px-5 py-4 text-lg font-semibold tabx tab-active" data-target="tab-direcao">Para a Direção</button>
                <button class="px-5 py-4 text-lg font-semibold tabx" data-target="tab-secretaria">Para a Secretaria</button>
                <button class="px-5 py-4 text-lg font-semibold tabx" data-target="tab-financeiro">Para o Financeiro</button>
            </div>

            <div id="tab-direcao" class="tab-content text-left grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-bold text-white mb-4">Visão 360º da instituição</h3>
                    <p class="text-slate-400 text-lg">Dashboards gerenciais com KPIs em tempo real. Acompanhe a evasão, veja quem está com risco de cancelar e atue cedo, com base em dados e não em achismo.</p>
                </div>
                <div class="glass rounded-2xl aspect-[16/10] overflow-hidden cardring">
                    <img src="<?php echo home_url('/wp-content/uploads/2026/03/dash-evasao-1.png'); ?>" alt="Dashboard Direção e Evasão" class="w-full h-full object-cover object-top">
                </div>
            </div>

            <div id="tab-secretaria" class="tab-content text-left grid lg:grid-cols-2 gap-12 items-center hidden">
                <div>
                    <h3 class="text-2xl font-bold text-white mb-4">Controle acadêmico total</h3>
                    <p class="text-slate-400 text-lg">Acompanhe em tempo real as matrículas ativas, novos calouros e veteranos. Filtre por período e tenha o controle da sua base de estudantes a um clique de distância.</p>
                </div>
                <div class="glass rounded-2xl aspect-[16/10] overflow-hidden cardring">
                    <img src="<?php echo home_url('/wp-content/uploads/2026/03/dash-academico-1.png'); ?>" alt="Dashboard Secretaria" class="w-full h-full object-cover object-top">
                </div>
            </div>

            <div id="tab-financeiro" class="tab-content text-left grid lg:grid-cols-2 gap-12 items-center hidden">
                <div>
                    <h3 class="text-2xl font-bold text-white mb-4">Alta performance de caixa</h3>
                    <p class="text-slate-400 text-lg">Deixe as planilhas para trás. Acompanhe faturamento, valores a receber e os índices de inadimplência com precisão, direto nos painéis financeiros.</p>
                </div>
                <div class="glass rounded-2xl aspect-[16/10] overflow-hidden cardring">
                    <img src="<?php echo home_url('/wp-content/uploads/2026/03/dash-financeiro-1.png'); ?>" alt="Dashboard Financeiro" class="w-full h-full object-cover object-top">
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
