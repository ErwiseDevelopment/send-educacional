<?php
/*
Template Name: Módulo - Gestão de Retenção e Sucesso
*/
get_header(); ?>

<main class="bg-slate-50 min-h-screen">

    <section class="bg-slate-900 pt-32 pb-24 border-b border-slate-800 relative overflow-hidden text-center">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#475569 1px, transparent 1px); background-size: 24px 24px;"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-violet-600/20 blur-[120px] rounded-full pointer-events-none z-0"></div>
        
        <div class="container mx-auto px-6 max-w-5xl relative z-10">
            <div class="flex justify-center items-center space-x-2 text-sm text-slate-400 mb-6 font-medium uppercase tracking-widest">
                <a href="<?php echo home_url(); ?>" class="hover:text-violet-400 transition">Início</a>
                <span>/</span>
                <span class="text-violet-500">O Ecossistema de Retenção</span>
            </div>

            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800 border border-slate-700 shadow-sm text-xs font-semibold text-violet-400 mb-6 uppercase tracking-wider">
                <span class="flex h-2 w-2 rounded-full bg-violet-500 animate-pulse"></span>
                Sucesso do Aluno & Prevenção de Evasão
            </div>

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-white mb-8 tracking-tighter leading-[1.1]">
                Preveja a evasão <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-400 to-fuchsia-400">antes que ela aconteça.</span>
            </h1>
            
            <p class="text-xl text-slate-400 leading-relaxed max-w-3xl mx-auto font-light">
                O Send Educacional cruza dados acadêmicos, financeiros e de engajamento no AVA para alertar a sua equipe sobre alunos em risco. Estanque a perda de alunos com inteligência e ação rápida.
            </p>
        </div>
    </section>

    <section class="relative z-20 -mt-8">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-8 flex flex-col md:flex-row justify-around items-center divide-y md:divide-y-0 md:divide-x divide-slate-100">
                <div class="text-center p-4 w-full">
                    <p class="text-3xl font-extrabold text-violet-600 mb-1">Preditivo</p>
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Algoritmo de Risco</p>
                </div>
                <div class="text-center p-4 w-full">
                    <p class="text-3xl font-extrabold text-violet-600 mb-1">360º</p>
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Visão do Engajamento</p>
                </div>
                <div class="text-center p-4 w-full">
                    <p class="text-3xl font-extrabold text-violet-600 mb-1">Ação</p>
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Régua de Resgate</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 relative z-20">
        <div class="container mx-auto px-6 max-w-7xl">
            
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-slate-900 mb-4 tracking-tight">O Fim das Surpresas no Final do Semestre</h2>
                <p class="text-lg text-slate-500">Transforme dados isolados em estratégias ativas de permanência estudantil.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-violet-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-violet-50 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-violet-100 transition-colors"></div>
                    <div class="w-16 h-16 bg-violet-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Matriz de Risco</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Algoritmo de identificação de alunos em risco</li>
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Monitoramento de acessos e inatividade no Moodle</li>
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Alertas automáticos de excesso de faltas</li>
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Mapeamento de quedas bruscas de rendimento (Notas)</li>
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Cruzamento de inadimplência com risco acadêmico</li>
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Painel semafórico (Alto, Médio e Baixo risco)</li>
                    </ul>
                </div>

                <div class="bg-slate-900 rounded-[2.5rem] border border-slate-700 p-10 shadow-2xl hover:border-fuchsia-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-fuchsia-600/20 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-fuchsia-600/30 transition-colors"></div>
                    <div class="w-16 h-16 bg-fuchsia-500 text-white rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-white mb-6">Intervenção e Suporte</h3>
                    <ul class="space-y-4 text-fuchsia-100 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-fuchsia-400 mt-0.5">✓</span> Abertura de protocolos de intervenção pedagógica</li>
                        <li class="flex items-start gap-3"><span class="text-fuchsia-400 mt-0.5">✓</span> Histórico completo de atendimentos do aluno</li>
                        <li class="flex items-start gap-3"><span class="text-fuchsia-400 mt-0.5">✓</span> Registro de encaminhamentos psicológicos e tutorias</li>
                        <li class="flex items-start gap-3"><span class="text-fuchsia-400 mt-0.5">✓</span> Acionamento automático do coordenador de curso</li>
                        <li class="flex items-start gap-3"><span class="text-fuchsia-400 mt-0.5">✓</span> Workflow de resgate (Contato telefônico/WhatsApp)</li>
                        <li class="flex items-start gap-3"><span class="text-fuchsia-400 mt-0.5">✓</span> Feedback de sucesso ou falha na retenção</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-violet-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-violet-50 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-violet-100 transition-colors"></div>
                    <div class="w-16 h-16 bg-violet-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Régua de Relacionamento</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Disparo automatizado de e-mails motivacionais</li>
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Notificação de saudade (Falta de acesso ao portal)</li>
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Comunicação direcionada por Segmento/Polo</li>
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Campanhas financeiras exclusivas para retenção</li>
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Pesquisas de satisfação (NPS Acadêmico)</li>
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Integração total com o Send Mensageria</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-fuchsia-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="w-16 h-16 bg-fuchsia-100 text-fuchsia-600 rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Funil de Rematrícula</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-fuchsia-500 mt-0.5">✓</span> Acompanhamento em tempo real das rematrículas</li>
                        <li class="flex items-start gap-3"><span class="text-fuchsia-500 mt-0.5">✓</span> Gestão de pendências que bloqueiam a renovação</li>
                        <li class="flex items-start gap-3"><span class="text-fuchsia-500 mt-0.5">✓</span> Alertas de alunos "Elegíveis, porém não rematriculados"</li>
                        <li class="flex items-start gap-3"><span class="text-fuchsia-500 mt-0.5">✓</span> Metas de retenção parametrizadas por Polo/Campus</li>
                        <li class="flex items-start gap-3"><span class="text-fuchsia-500 mt-0.5">✓</span> Ranking de Polos com maior taxa de sucesso</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-violet-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="w-16 h-16 bg-violet-100 text-violet-600 rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Gestão de Evasão Real</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Fluxo de aprovação para solicitações de trancamento</li>
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Painel de motivos de cancelamento (Diagnóstico)</li>
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Entrevista de desligamento integrada ao sistema</li>
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Campanhas automáticas de Reingresso ("Volte a estudar")</li>
                        <li class="flex items-start gap-3"><span class="text-violet-500 mt-0.5">✓</span> Relatório de perdas financeiras por evasão</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-fuchsia-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="w-16 h-16 bg-fuchsia-100 text-fuchsia-600 rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">BI de Sucesso</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-fuchsia-600 mt-0.5">✓</span> Dashboard executivo de Churn (Evasão) Acadêmico</li>
                        <li class="flex items-start gap-3"><span class="text-fuchsia-600 mt-0.5">✓</span> Gráficos de retenção cruzados por Curso e Turma</li>
                        <li class="flex items-start gap-3"><span class="text-fuchsia-600 mt-0.5">✓</span> Mapa de calor de acessos e engajamento</li>
                        <li class="flex items-start gap-3"><span class="text-fuchsia-600 mt-0.5">✓</span> Taxa de conversão das ações de resgate do time</li>
                        <li class="flex items-start gap-3"><span class="text-fuchsia-600 mt-0.5">✓</span> Histórico e projeção de permanência estudantil</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <section class="py-32 bg-slate-900 text-center relative overflow-hidden">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[500px] h-[500px] rounded-full bg-violet-600/20 blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[500px] h-[500px] rounded-full bg-fuchsia-600/20 blur-[120px]"></div>
        
        <div class="container mx-auto px-6 max-w-4xl relative z-10">
            <h2 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tighter">Um aluno retido vale <span class="text-violet-400">mais que uma nova matrícula.</span></h2>
            <p class="text-xl text-slate-400 mb-12 font-light leading-relaxed">
                Pare de perder alunos silenciosamente. Descubra como o módulo de Retenção do Send Educacional transforma dados operacionais em estratégias ativas de permanência.
            </p>
            <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="bg-violet-600 text-white px-12 py-5 rounded-2xl font-black text-xl transition-all shadow-2xl shadow-violet-500/30 hover:scale-105 hover:bg-violet-500 flex items-center justify-center gap-3 mx-auto">
                Blindar a Retenção da Minha Instituição
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>
    </section>

</main>

<?php get_footer(); ?>