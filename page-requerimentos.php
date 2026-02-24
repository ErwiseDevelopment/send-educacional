<?php
/*
Template Name: Módulo - Gestão de Requerimentos e Protocolos
*/
get_header(); ?>

<main class="bg-slate-50 min-h-screen">

    <section class="bg-slate-900 pt-32 pb-24 border-b border-slate-800 relative overflow-hidden text-center">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#475569 1px, transparent 1px); background-size: 24px 24px;"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-orange-600/20 blur-[120px] rounded-full pointer-events-none z-0"></div>
        
        <div class="container mx-auto px-6 max-w-5xl relative z-10">
            <div class="flex justify-center items-center space-x-2 text-sm text-slate-400 mb-6 font-medium uppercase tracking-widest">
                <a href="<?php echo home_url(); ?>" class="hover:text-orange-400 transition">Início</a>
                <span>/</span>
                <span class="text-orange-500">O Ecossistema de Atendimento</span>
            </div>

            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800 border border-slate-700 shadow-sm text-xs font-semibold text-orange-400 mb-6 uppercase tracking-wider">
                <span class="flex h-2 w-2 rounded-full bg-orange-500 animate-pulse"></span>
                Helpdesk Acadêmico Nativo
            </div>

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-white mb-8 tracking-tighter leading-[1.1]">
                SLA sob controle. <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-amber-400">O fim dos protocolos perdidos.</span>
            </h1>
            
            <p class="text-xl text-slate-400 leading-relaxed max-w-3xl mx-auto font-light">
                Substitua dezenas de e-mails e papéis por fluxos de trabalho inteligentes. Crie requerimentos personalizados, defina prazos rígidos por equipe e garanta que o aluno tenha respostas ágeis e rastreáveis.
            </p>
        </div>
    </section>

    <section class="relative z-20 -mt-8">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-8 flex flex-col md:flex-row justify-around items-center divide-y md:divide-y-0 md:divide-x divide-slate-100">
                <div class="text-center p-4 w-full">
                    <p class="text-3xl font-extrabold text-orange-600 mb-1">Workflow</p>
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Fluxos Automatizados</p>
                </div>
                <div class="text-center p-4 w-full">
                    <p class="text-3xl font-extrabold text-orange-600 mb-1">SLA</p>
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Gestão de Prazos (SLA)</p>
                </div>
                <div class="text-center p-4 w-full">
                    <p class="text-3xl font-extrabold text-orange-600 mb-1">360º</p>
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Performance por Equipe</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 relative z-20">
        <div class="container mx-auto px-6 max-w-7xl">
            
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-slate-900 mb-4 tracking-tight">Atendimento Nível Enterprise</h2>
                <p class="text-lg text-slate-500">Esqueça tickets em softwares genéricos. Nosso módulo é construído no coração dos dados do aluno.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-orange-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-orange-50 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-orange-100 transition-colors"></div>
                    <div class="w-16 h-16 bg-orange-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Workflow Inteligente</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Construção visual de Fluxo de Requerimento</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Criação ilimitada de Tipos de Requerimentos</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Roteamento automático entre Áreas e Departamentos</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Separação de atendimento por Turnos operacionais</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Painel Kanban em tempo real (Em Processamento)</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Parametrização completa de exigências e anexos</li>
                    </ul>
                </div>

                <div class="bg-slate-900 rounded-[2.5rem] border border-slate-700 p-10 shadow-2xl hover:border-amber-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-amber-600/20 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-amber-600/30 transition-colors"></div>
                    <div class="w-16 h-16 bg-amber-500 text-white rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-white mb-6">Controle de SLA</h3>
                    <ul class="space-y-4 text-amber-100 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-amber-400 mt-0.5">✓</span> Definição de Service Level Agreement (SLA) por tipo</li>
                        <li class="flex items-start gap-3"><span class="text-amber-400 mt-0.5">✓</span> Alertas de quebra de prazos institucionais</li>
                        <li class="flex items-start gap-3"><span class="text-amber-400 mt-0.5">✓</span> Relatório de Acompanhamento de SLA (Atrasos/No Prazo)</li>
                        <li class="flex items-start gap-3"><span class="text-amber-400 mt-0.5">✓</span> Relatório de Requerimentos Pendentes Críticos</li>
                        <li class="flex items-start gap-3"><span class="text-amber-400 mt-0.5">✓</span> Priorização visual de tickets na fila de atendimento</li>
                        <li class="flex items-start gap-3"><span class="text-amber-400 mt-0.5">✓</span> Bloqueio de avanço de etapa sem resolução técnica</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-orange-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-orange-50 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-orange-100 transition-colors"></div>
                    <div class="w-16 h-16 bg-orange-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Atendimento ao Aluno</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Abertura de protocolos diretamente pelo Portal do Aluno</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Histórico de interações e chat com a secretaria</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Upload seguro de anexos e documentos exigidos</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Notificações transparentes de mudança de status</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Centralização do Atendimento ao Aluno em tela única</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Relatório de Atendimento Diário para coordenadores</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-amber-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="w-16 h-16 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Comunicação Ativa</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-amber-500 mt-0.5">✓</span> Configuração ilimitada de Layouts de E-mail</li>
                        <li class="flex items-start gap-3"><span class="text-amber-500 mt-0.5">✓</span> Disparo automático por mudança de etapa no fluxo</li>
                        <li class="flex items-start gap-3"><span class="text-amber-500 mt-0.5">✓</span> Personalização por Tipo de E-mail Institucional</li>
                        <li class="flex items-start gap-3"><span class="text-amber-500 mt-0.5">✓</span> Variáveis dinâmicas (Nome do aluno, protocolo, etc.)</li>
                        <li class="flex items-start gap-3"><span class="text-amber-500 mt-0.5">✓</span> Fim do atendimento "invisível" — o aluno sempre sabe onde está seu pedido.</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-orange-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="w-16 h-16 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Produtividade de Equipes</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Cadastro e gestão de Equipes Multidisciplinares</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Atribuição de permissões por Áreas de atuação</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Relatório Analítico de Performance por Equipe</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Identificação de gargalos operacionais (qual setor atrasa mais)</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Distribuição equilibrada de lista de requerimentos</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-amber-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="w-16 h-16 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Relatórios & BI</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-amber-500 mt-0.5">✓</span> Visão Gerencial: Relatório de Fluxos Específicos</li>
                        <li class="flex items-start gap-3"><span class="text-amber-500 mt-0.5">✓</span> Exportação de Relatório de Atendimento Diário</li>
                        <li class="flex items-start gap-3"><span class="text-amber-500 mt-0.5">✓</span> Visão Consolidada de Requerimentos Pendentes</li>
                        <li class="flex items-start gap-3"><span class="text-amber-500 mt-0.5">✓</span> Auditoria completa de todas as mudanças de status</li>
                        <li class="flex items-start gap-3"><span class="text-amber-500 mt-0.5">✓</span> Cruzamento de eficiência entre Departamentos vs. Polos</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <section class="py-32 bg-slate-900 text-center relative overflow-hidden">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[500px] h-[500px] rounded-full bg-orange-600/20 blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[500px] h-[500px] rounded-full bg-amber-600/20 blur-[120px]"></div>
        
        <div class="container mx-auto px-6 max-w-4xl relative z-10">
            <h2 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tighter">Eleve a régua do <span class="text-orange-400">Atendimento ao Aluno.</span></h2>
            <p class="text-xl text-slate-400 mb-12 font-light leading-relaxed">
                Pare de perder tempo procurando protocolos físicos ou e-mails esquecidos. Transforme sua secretaria numa operação digital orientada a SLA e resultados.
            </p>
            <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="bg-orange-500 text-white px-12 py-5 rounded-2xl font-black text-xl transition-all shadow-2xl shadow-orange-500/30 hover:scale-105 hover:bg-orange-600 flex items-center justify-center gap-3 mx-auto">
                Transformar meu Atendimento
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>
    </section>

</main>

<?php get_footer(); ?>