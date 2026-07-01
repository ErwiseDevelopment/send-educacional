<?php get_header(); ?>

<style>
    .glass-card { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.5); }
    .bg-grid-pattern { background-image: radial-gradient(#e5e7eb 1px, transparent 1px); background-size: 24px 24px; }
    .tab-active { border-bottom: 2px solid #2563eb; color: #1e3a8a; font-weight: 700; }
    
    /* EFEITO DE SCROLL NOS DASHBOARDS */
    .scroll-image { 
        object-position: top; 
        transition: object-position 8s ease-in-out; 
    }
    .scroll-container:hover .scroll-image { 
        object-position: bottom; 
    }
</style>

<main class="overflow-hidden bg-slate-50">

    <section class="relative pt-32 pb-40 overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-50 z-0"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-blue-500/20 blur-[100px] rounded-full pointer-events-none z-0"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-slate-200 shadow-sm text-sm font-semibold text-slate-700 mb-8 hover:shadow-md transition cursor-pointer" onclick="document.getElementById('demo-modal').classList.remove('hidden')">
                <span class="flex h-2 w-2 rounded-full bg-blue-600 animate-pulse"></span>
                Conheça o novo módulo de CRM Educacional <span class="text-blue-600">&rarr;</span>
            </div>

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-slate-900 tracking-tight mb-8 max-w-5xl mx-auto leading-[1.1]">
                O ERP Educacional Definitivo para <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Instituições de Excelência</span>
            </h1>

            <p class="text-xl text-slate-600 mb-10 max-w-3xl mx-auto leading-relaxed">
                Integre acadêmico, financeiro e captação em um ecossistema inteligente. Reduza a inadimplência e automatize processos com a segurança de quem tem 30 anos de mercado.
            </p>

            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-4 rounded-xl font-bold text-lg transition-all shadow-[0_8px_30px_rgb(37,99,235,0.3)] hover:shadow-[0_8px_30px_rgb(37,99,235,0.5)] hover:-translate-y-1">
                    Solicitar Demonstração
                </button>
                <a href="#ecossistema" class="px-10 py-4 rounded-xl font-bold text-lg text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 transition-all shadow-sm">
                    Explorar Módulos
                </a>
            </div>
        </div>

        <div class="container mx-auto px-6 relative mt-20 z-20">
            <div class="relative max-w-5xl mx-auto">
                <div class="absolute -inset-1 bg-gradient-to-b from-blue-500 to-indigo-600 rounded-3xl blur-xl opacity-30"></div>
                
                <div class="relative bg-white rounded-2xl shadow-2xl border border-slate-200/60 overflow-hidden aspect-[16/10] md:aspect-[16/9] group scroll-container cursor-ns-resize">
                    <div class="h-12 border-b border-slate-100 bg-slate-50/50 flex items-center px-4 gap-2 relative z-10">
                        <div class="w-3 h-3 rounded-full bg-slate-300"></div>
                        <div class="w-3 h-3 rounded-full bg-slate-300"></div>
                        <div class="w-3 h-3 rounded-full bg-slate-300"></div>
                    </div>
                    
                    <div class="w-full h-[calc(100%-3rem)] bg-slate-100 relative overflow-hidden">
                        <img src="<?php echo home_url('/wp-content/uploads/2026/03/dash-academico-1.png'); ?>" alt="Dashboard Acadêmico" class="w-full h-full object-cover scroll-image">
                        
                        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 bg-slate-900/80 text-white text-[10px] font-bold uppercase tracking-widest px-5 py-2.5 rounded-full backdrop-blur-md opacity-100 group-hover:opacity-0 transition-opacity duration-500 pointer-events-none flex items-center gap-2 shadow-lg">
                            <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            Passe o mouse para rolar
                        </div>
                    </div>
                </div>

                <div class="absolute -left-10 bottom-20 bg-white p-4 rounded-2xl shadow-xl border border-slate-100 glass-card hidden md:flex items-center gap-4 animate-[bounce_5s_infinite]">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-semibold uppercase">Mensalidade</p>
                        <p class="text-sm font-bold text-slate-800">Paga via Pix</p>
                    </div>
                </div>

                <div class="absolute -right-8 top-20 bg-white p-4 rounded-2xl shadow-xl border border-slate-100 glass-card hidden md:flex items-center gap-4 animate-[bounce_6s_infinite]">
                     <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-semibold uppercase">Nova Matrícula</p>
                        <p class="text-sm font-bold text-slate-800">Contrato Assinado</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-blue-900 py-12 relative z-30 -mt-10">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-blue-800/50">
                <div>
                    <p class="text-4xl font-extrabold text-white mb-1">30+</p>
                    <p class="text-blue-200 text-sm uppercase tracking-wider font-semibold">Anos de Experiência</p>
                </div>
                <div>
                    <p class="text-4xl font-extrabold text-white mb-1">100%</p>
                    <p class="text-blue-200 text-sm uppercase tracking-wider font-semibold">Aderência ao MEC</p>
                </div>
                <div>
                    <p class="text-4xl font-extrabold text-white mb-1">Zero</p>
                    <p class="text-blue-200 text-sm uppercase tracking-wider font-semibold">Papelada</p>
                </div>
                <div>
                    <p class="text-4xl font-extrabold text-white mb-1">Nuvem</p>
                    <p class="text-blue-200 text-sm uppercase tracking-wider font-semibold">Ou Servidor Local</p>
                </div>
            </div>
        </div>
    </section>

    <section id="ecossistema" class="pt-32 pb-24">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="mb-16 md:flex justify-between items-end">
                <div class="max-w-2xl">
                    <h2 class="text-indigo-600 font-bold tracking-wide uppercase text-sm mb-3">Módulos Integrados</h2>
                    <h3 class="text-4xl font-extrabold text-slate-900 tracking-tight">Um ecossistema completo para a gestão acadêmica.</h3>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="col-span-1 md:col-span-2 bg-white rounded-3xl p-10 border border-slate-200 shadow-sm hover:shadow-xl transition-shadow relative overflow-hidden flex flex-col justify-between group">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-full blur-3xl -mr-10 -mt-10 transition-transform group-hover:scale-110"></div>
                    <div class="relative z-10 w-full md:w-3/4">
                        <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path></svg>
                        </div>
                        <h4 class="text-3xl font-bold text-slate-900 mb-4">Secretaria Acadêmica</h4>
                        <p class="text-slate-600 text-lg mb-6">Automatize desde a captação até a colação de grau. Emissão de diploma digital, histórico escolar e matrículas sem intervenção manual.</p>
                    </div>
                    <div class="relative z-10 mt-6">
                        <a href="<?php echo home_url('/gestao-academica'); ?>" class="inline-flex items-center justify-center bg-blue-50 hover:bg-blue-600 text-blue-700 hover:text-white font-bold py-3 px-8 rounded-xl transition-colors duration-300">
                            Conhecer o Módulo Acadêmico &rarr;
                        </a>
                    </div>
                </div>

                <div class="col-span-1 bg-gradient-to-br from-indigo-800 to-blue-900 rounded-3xl p-10 shadow-lg text-white relative overflow-hidden hover:shadow-2xl transition-shadow hover:-translate-y-1 flex flex-col justify-between">
                    <div class="absolute bottom-0 right-0 w-40 h-40 bg-white opacity-5 rounded-full blur-2xl"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center mb-6 backdrop-blur-md border border-white/20">
                            <svg class="w-8 h-8 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h4 class="text-2xl font-bold mb-4">Gestão Financeira</h4>
                        <p class="text-indigo-100 text-lg mb-8 leading-relaxed">Controle total de inadimplência com régua de cobrança via SMS. Acordos automáticos e NFs integradas.</p>
                    </div>
                    <div class="relative z-10 mt-auto">
                        <a href="<?php echo home_url('/gestao-financeira'); ?>" class="block text-center bg-white text-indigo-900 font-bold py-3 px-6 rounded-xl w-full hover:bg-indigo-50 transition">
                            Ver Módulo Financeiro
                        </a>
                    </div>
                </div>

                <div class="col-span-1 bg-white rounded-3xl p-10 border border-slate-200 shadow-sm hover:shadow-xl transition-shadow flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900 mb-3">Portais AVA Integrados</h4>
                        <p class="text-slate-600 mb-6">Portal do Aluno, Professor e Polos EAD. Lançamento de notas, diários e requerimentos em tempo real.</p>
                    </div>
                    <a href="<?php echo home_url('/portais'); ?>" class="text-purple-600 font-bold hover:text-purple-800 flex items-center gap-2 transition">
                        Explorar os Portais <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>

                <div class="col-span-1 md:col-span-2 bg-slate-900 rounded-3xl p-10 shadow-lg text-white border border-slate-800 flex items-center overflow-hidden relative">
                    <div class="relative z-10 w-full md:w-1/2 pr-6">
                        <h4 class="text-2xl font-bold mb-4">Biblioteca & GED</h4>
                        <p class="text-slate-400 mb-6">Gestão Eletrônica de Documentos para adequação fiscal e acadêmica, aliado ao controle completo de acervo.</p>
                        <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="text-blue-400 font-semibold hover:text-blue-300 flex items-center gap-2">Solicitar demonstração <span aria-hidden="true">&rarr;</span></button>
                    </div>
                    <div class="hidden md:block absolute right-0 top-1/2 -translate-y-1/2 w-1/2 h-[120%] bg-slate-800 rounded-l-3xl border-l border-y border-slate-700/50 p-4 transform rotate-3">
                        <div class="w-full h-full bg-slate-900 rounded-xl border border-slate-700 flex flex-col items-center justify-center gap-3 text-slate-600">
                            <svg class="w-16 h-16 text-blue-500 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 2v4.586a1 1 0 00.293.707l4.586 4.586"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 12h2a2 2 0 002-2v0a2 2 0 00-2-2h-1.172a2 2 0 01-1.712-1.027A2.998 2.998 0 0016.5 5h0a3 3 0 00-2.828 2h0a3 3 0 00-.828 2"></path>
                            </svg>
                            <span class="text-sm font-medium text-blue-400/80 uppercase tracking-wider">Documentos 100% Digitalizados</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white border-y border-slate-100">
      
            
            <?php get_template_part('inc/inc-carrossel-integracoes'); ?>
        </div>
    </section>

    <section class="py-24 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#3b82f6 1px, transparent 1px); background-size: 40px 40px;"></div>
        <div class="absolute top-0 right-0 -mr-40 -mt-40 w-[500px] h-[500px] bg-blue-600 rounded-full blur-[150px] opacity-20"></div>
        <div class="absolute bottom-0 left-0 -ml-40 -mb-40 w-[500px] h-[500px] bg-emerald-600 rounded-full blur-[150px] opacity-10"></div>

        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-sm font-bold uppercase tracking-widest mb-4">
                    <span class="relative flex h-3 w-3">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500"></span>
                    </span>
                    Em constante evolução
                </div>
                <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6">Expanda sua escola com <span class="text-blue-500">Inteligência</span></h2>
                <p class="text-slate-400 max-w-2xl mx-auto text-lg">
                    Vá além da gestão burocrática. Atraia novos alunos e zere a evasão escolar com os novos módulos de crescimento do Send Educacional.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <div class="bg-slate-800/60 backdrop-blur-md p-10 rounded-[2.5rem] border border-slate-700 hover:border-blue-500 hover:shadow-2xl hover:shadow-blue-500/20 transition-all group relative">
                    <div class="absolute -top-4 right-8 bg-gradient-to-r from-blue-600 to-cyan-500 text-white text-xs font-black px-4 py-2 rounded-full uppercase tracking-widest shadow-lg shadow-blue-500/30 transform group-hover:scale-110 transition-transform inline-flex items-center gap-1.5">
                        <svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor"><path d="M13 2 4.5 13H11l-1 9 8.5-11H12l1-9z"></path></svg> Novidade
                    </div>
                    
                    <div class="w-16 h-16 bg-blue-500/20 border border-blue-500/30 rounded-2xl flex items-center justify-center mb-8">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">CRM Educacional</h3>
                    <p class="text-slate-400 leading-relaxed mb-8">
                        Assuma o controle do seu funil de captação. Acompanhe cada lead desde o primeiro clique no site, automatize agendamentos e aumente radicalmente suas taxas de conversão de novas matrículas.
                    </p>
                    <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="inline-flex items-center font-bold text-blue-400 hover:text-blue-300 transition-colors">
                        Conhecer o CRM <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>

                <div class="bg-slate-800/60 backdrop-blur-md p-10 rounded-[2.5rem] border border-slate-700 hover:border-emerald-500 hover:shadow-2xl hover:shadow-emerald-500/20 transition-all group relative">
                    <div class="absolute -top-4 right-8 bg-gradient-to-r from-emerald-500 to-teal-400 text-white text-xs font-black px-4 py-2 rounded-full uppercase tracking-widest shadow-lg shadow-emerald-500/30 transform group-hover:scale-110 transition-transform inline-flex items-center gap-1.5">
                        <svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor"><path d="M13 2 4.5 13H11l-1 9 8.5-11H12l1-9z"></path></svg> Lançamento
                    </div>

                    <div class="w-16 h-16 bg-emerald-500/20 border border-emerald-500/30 rounded-2xl flex items-center justify-center mb-8">
                        <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 01-2 2h22a2 2 0 01-2-2v-13a2 2 0 00-2-2h-2a2 2 0 00-2 2v13m-10-10V7a2 2 0 00-2-2H9a2 2 0 00-2 2v10"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Retenção de Alunos</h3>
                    <p class="text-slate-400 leading-relaxed mb-8">
                        Não seja pego de surpresa. Nossa ferramenta cruza dados de frequência, notas e financeiro para criar alertas de risco de evasão, permitindo que você atue antes do aluno pedir transferência.
                    </p>
                    <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="inline-flex items-center font-bold text-emerald-400 hover:text-emerald-300 transition-colors">
                        Saber mais sobre Retenção <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>

            </div>
        </div>
    </section>

    <section class="py-24 bg-white border-y border-slate-100">
        <div class="container mx-auto px-6 max-w-6xl text-center">
            <h2 class="text-3xl font-extrabold text-slate-900 mb-4">Feito para quem constrói a educação</h2>
            <p class="text-lg text-slate-600 mb-12">Interfaces adaptadas para a realidade e as necessidades de cada departamento.</p>
            
            <div class="flex flex-wrap justify-center gap-4 mb-12 border-b border-slate-200">
                <button class="px-6 py-4 text-lg font-semibold text-slate-500 hover:text-blue-600 tab-btn tab-active" data-target="tab-direcao">Para a Direção</button>
                <button class="px-6 py-4 text-lg font-semibold text-slate-500 hover:text-blue-600 tab-btn" data-target="tab-secretaria">Para a Secretaria</button>
                <button class="px-6 py-4 text-lg font-semibold text-slate-500 hover:text-blue-600 tab-btn" data-target="tab-financeiro">Para o Financeiro</button>
            </div>

            <div id="tab-direcao" class="tab-content text-left grid lg:grid-cols-2 gap-12 items-center animate-[fadeIn_0.5s_ease-in-out]">
                <div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Visão 360º da Instituição</h3>
                    <p class="text-slate-600 text-lg mb-6">Dashboards gerenciais com KPIs em tempo real. Controle a evasão, acompanhe desistentes e atue rapidamente nos alunos com risco de cancelamento baseando-se em dados precisos.</p>
                </div>
                <div class="bg-slate-100 rounded-2xl aspect-[16/10] border border-slate-200 shadow-xl overflow-hidden group scroll-container cursor-ns-resize">
                    <img src="<?php echo home_url('/wp-content/uploads/2026/03/dash-evasao-1.png'); ?>" alt="Dashboard Direção e Evasão" class="w-full h-full object-cover scroll-image">
                </div>
            </div>

            <div id="tab-secretaria" class="tab-content text-left grid lg:grid-cols-2 gap-12 items-center hidden animate-[fadeIn_0.5s_ease-in-out]">
                <div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Controle Acadêmico Total</h3>
                    <p class="text-slate-600 text-lg mb-6">Acompanhe em tempo real as matrículas ativas, novos calouros e veteranos. Filtre por período e tenha o controle da sua base de estudantes a um clique de distância.</p>
                </div>
                <div class="bg-slate-100 rounded-2xl aspect-[16/10] border border-slate-200 shadow-xl overflow-hidden group scroll-container cursor-ns-resize">
                    <img src="<?php echo home_url('/wp-content/uploads/2026/03/dash-academico-1.png'); ?>" alt="Dashboard Secretaria" class="w-full h-full object-cover scroll-image">
                </div>
            </div>

            <div id="tab-financeiro" class="tab-content text-left grid lg:grid-cols-2 gap-12 items-center hidden animate-[fadeIn_0.5s_ease-in-out]">
                <div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Alta Performance de Caixa</h3>
                    <p class="text-slate-600 text-lg mb-6">Diga adeus às planilhas. Monitore o faturamento, os valores a receber e controle os índices de inadimplência de forma cirúrgica com nossos painéis financeiros detalhados.</p>
                </div>
                <div class="bg-slate-100 rounded-2xl aspect-[16/10] border border-slate-200 shadow-xl overflow-hidden group scroll-container cursor-ns-resize">
                    <img src="<?php echo home_url('/wp-content/uploads/2026/03/dash-financeiro-1.png'); ?>" alt="Dashboard Financeiro" class="w-full h-full object-cover scroll-image">
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Por que as instituições estão mudando para o Send?</h2>
                <p class="text-lg text-slate-600">Chega de remendos. Veja a diferença entre usar sistemas defasados e ter um ecossistema inteligente.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 md:gap-0 relative">
                <div class="bg-red-50/50 border border-red-100 rounded-3xl md:rounded-r-none p-10 relative z-0 md:pr-16 shadow-inner">
                    <h3 class="text-xl font-bold text-red-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        O Jeito Antigo
                    </h3>
                    <ul class="space-y-4 text-red-800/80">
                        <li class="flex items-start"><span class="mr-3 font-bold text-red-400">✕</span> Filas imensas na secretaria durante a matrícula.</li>
                        <li class="flex items-start"><span class="mr-3 font-bold text-red-400">✕</span> Cobrança feita manualmente, gerando alta inadimplência.</li>
                        <li class="flex items-start"><span class="mr-3 font-bold text-red-400">✕</span> Risco de multas no MEC por documentos perdidos ou físicos.</li>
                        <li class="flex items-start"><span class="mr-3 font-bold text-red-400">✕</span> Vários sistemas diferentes que não conversam entre si.</li>
                    </ul>
                </div>

                <div class="bg-white rounded-3xl p-10 relative z-10 border border-blue-100 shadow-[0_20px_50px_rgba(37,99,235,0.1)] md:-ml-8 transform md:scale-105">
                    <div class="absolute top-0 right-0 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-bl-lg rounded-tr-2xl uppercase tracking-wider">A Escolha Certa</div>
                    <h3 class="text-2xl font-bold text-blue-900 mb-6 flex items-center">
                        <svg class="w-7 h-7 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Com o Send Educacional
                    </h3>
                    <ul class="space-y-5 text-slate-700 font-medium">
                        <li class="flex items-start"><svg class="w-6 h-6 mr-3 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Matrícula 100% digital com assinatura eletrônica validada.</li>
                        <li class="flex items-start"><svg class="w-6 h-6 mr-3 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Régua de cobrança automática e pagamentos por Pix com baixa instantânea.</li>
                        <li class="flex items-start"><svg class="w-6 h-6 mr-3 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Adequação total às Portarias do MEC e Diploma Digital nativo.</li>
                        <li class="flex items-start"><svg class="w-6 h-6 mr-3 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Tudo centralizado: do portal do aluno até a contabilidade da instituição.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-900 relative overflow-hidden text-white">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#475569 1px, transparent 1px); background-size: 24px 24px;"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6">Segurança e estabilidade para os dados da sua instituição</h2>
                    <p class="text-slate-400 text-lg mb-8 leading-relaxed">Não brinque com os dados dos seus alunos. A infraestrutura do Send Educacional é construída sobre os pilares mais rígidos de segurança da informação.</p>
                    
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700 backdrop-blur-sm">
                            <div class="w-10 h-10 bg-blue-500/20 text-blue-400 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <h4 class="font-bold mb-2">100% LGPD</h4>
                            <p class="text-sm text-slate-400">Criptografia de ponta a ponta e gestão de permissões de usuários estrita.</p>
                        </div>
                        <div class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700 backdrop-blur-sm">
                            <div class="w-10 h-10 bg-green-500/20 text-green-400 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <h4 class="font-bold mb-2">Conformidade MEC</h4>
                            <p class="text-sm text-slate-400">Atualizações automáticas sempre que uma nova portaria é lançada.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-800 p-10 rounded-3xl border border-slate-700 shadow-2xl">
                    <h3 class="text-2xl font-bold mb-2">Medo de trocar de sistema?</h3>
                    <p class="text-slate-400 mb-8">Nosso processo de migração é guiado e silencioso. Sua operação não para.</p>
                    <div class="space-y-6">
                        <div class="flex">
                            <div class="flex flex-col items-center mr-5">
                                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center font-bold text-sm">1</div>
                                <div class="w-px h-full bg-slate-700 mt-2"></div>
                            </div>
                            <div class="pb-6">
                                <h4 class="text-lg font-bold text-white">Análise e Extração de Dados</h4>
                                <p class="text-sm text-slate-400 mt-1">Nossa equipe de TI analisa o banco de dados do seu sistema antigo e prepara a estrutura.</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex flex-col items-center mr-5">
                                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center font-bold text-sm">2</div>
                                <div class="w-px h-full bg-slate-700 mt-2"></div>
                            </div>
                            <div class="pb-6">
                                <h4 class="text-lg font-bold text-white">Migração Segura</h4>
                                <p class="text-sm text-slate-400 mt-1">Importamos alunos, notas, histórico e dados financeiros sem perda de informações.</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex flex-col items-center mr-5">
                                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center font-bold text-sm">3</div>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-white">Treinamento da sua Equipe</h4>
                                <p class="text-sm text-slate-400 mt-1">Sessões ao vivo com secretaria, financeiro e professores para garantir adoção de 100%.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <section class="relative py-20 bg-white">
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-[#1e3a8a]" style="clip-path: ellipse(70% 100% at 50% 100%);"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-6xl mx-auto bg-gradient-to-r from-blue-700 to-indigo-800 rounded-[2rem] p-10 md:p-16 shadow-[0_20px_50px_rgba(30,58,138,0.3)] text-center md:text-left flex flex-col md:flex-row items-center justify-between gap-10 overflow-hidden relative">
                
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-20 -mt-20 blur-3xl"></div>

                <div class="relative z-10 max-w-2xl">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white mb-6 leading-tight">
                        Sua instituição pronta para o <span class="text-blue-300">próximo nível.</span>
                    </h2>
                    <p class="text-blue-100 text-lg md:text-xl opacity-90">
                        Junte-se a dezenas de gestores que escolheram a eficiência e a segurança do Send Educacional.
                    </p>
                </div>

                <div class="relative z-10 flex-shrink-0">
                    <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="bg-white text-blue-900 hover:bg-blue-50 px-10 py-5 rounded-2xl font-extrabold text-xl transition-all shadow-xl hover:scale-105 active:scale-95">
                        Começar agora
                    </button>
                    <p class="text-blue-200 text-sm mt-4 text-center opacity-75 font-medium">
                        Demonstração gratuita e rápida
                    </p>
                </div>
            </div>
        </div>
    </section>

</main>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Abas de Personas
        const personaBtns = document.querySelectorAll('.tab-btn');
        const personaContents = document.querySelectorAll('.tab-content');

        personaBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                personaBtns.forEach(b => {
                    b.classList.remove('tab-active', 'border-blue-600', 'text-blue-800');
                    b.classList.add('text-slate-500');
                });
                personaContents.forEach(c => c.classList.add('hidden'));

                btn.classList.add('tab-active', 'border-blue-600', 'text-blue-800');
                btn.classList.remove('text-slate-500');
                const targetId = btn.getAttribute('data-target');
                document.getElementById(targetId).classList.remove('hidden');
            });
        });
    });
</script>

<?php get_footer(); ?>