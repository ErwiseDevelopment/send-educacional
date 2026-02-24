<?php
/*
Template Name: Módulo - Gestão Acadêmica (Completo)
*/
get_header(); ?>

<main class="bg-slate-50 min-h-screen">

    <section class="bg-slate-900 pt-32 pb-24 border-b border-slate-800 relative overflow-hidden text-center">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#475569 1px, transparent 1px); background-size: 24px 24px;"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-blue-600/20 blur-[120px] rounded-full pointer-events-none z-0"></div>
        
        <div class="container mx-auto px-6 max-w-5xl relative z-10">
            <div class="flex justify-center items-center space-x-2 text-sm text-slate-400 mb-6 font-medium uppercase tracking-widest">
                <a href="<?php echo home_url(); ?>" class="hover:text-blue-400 transition">Início</a>
                <span>/</span>
                <span class="text-blue-500">O Ecossistema Acadêmico</span>
            </div>

            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800 border border-slate-700 shadow-sm text-xs font-semibold text-blue-400 mb-6 uppercase tracking-wider">
                <span class="flex h-2 w-2 rounded-full bg-blue-500 animate-pulse"></span>
                Mais de 80 funcionalidades nativas
            </div>

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-white mb-8 tracking-tighter leading-[1.1]">
                O poder de controlar <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">absolutamente tudo.</span>
            </h1>
            
            <p class="text-xl text-slate-400 leading-relaxed max-w-3xl mx-auto font-light">
                Esqueça os sistemas que fazem "apenas o básico". Desenvolvemos uma plataforma que mapeia 100% da vida acadêmica, desde o CRM e AVA até o Censo INEP e a emissão do Diploma Digital.
            </p>
        </div>
    </section>

    <section class="py-24 relative z-20">
        <div class="container mx-auto px-6 max-w-7xl">
            
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-slate-900 mb-4 tracking-tight">O Fim das Planilhas Paralelas</h2>
                <p class="text-lg text-slate-500">Conheça o arsenal completo que a sua Secretaria Acadêmica terá à disposição.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-blue-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-blue-100 transition-colors"></div>
                    <div class="w-16 h-16 bg-blue-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Matrículas & Notas</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-blue-500 mt-0.5">✓</span> Gestão de Matrículas e Rematrículas</li>
                        <li class="flex items-start gap-3"><span class="text-blue-500 mt-0.5">✓</span> Rematrículas em lote (por Período/Turma)</li>
                        <li class="flex items-start gap-3"><span class="text-blue-500 mt-0.5">✓</span> Lançamento e Revisão de Notas de Turmas</li>
                        <li class="flex items-start gap-3"><span class="text-blue-500 mt-0.5">✓</span> Programação de Dependências (DPs)</li>
                        <li class="flex items-start gap-3"><span class="text-blue-500 mt-0.5">✓</span> Justificativa de Faltas em Massa</li>
                        <li class="flex items-start gap-3"><span class="text-blue-500 mt-0.5">✓</span> Finalização automática de Disciplinas</li>
                        <li class="flex items-start gap-3"><span class="text-blue-500 mt-0.5">✓</span> Planos de Ensino e Calendário de Provas</li>
                        <li class="flex items-start gap-3"><span class="text-blue-500 mt-0.5">✓</span> Gestão de Contratos e Assinaturas Digitais</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-emerald-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-emerald-100 transition-colors"></div>
                    <div class="w-16 h-16 bg-emerald-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">MEC, Censo e Diplomas</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Geração nativa do Arquivo Censo INEP</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Gestão Completa do ENADE</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Controle de alunos Cancelados pelo INEP</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Expedição e Emissão de Diploma Digital</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Livro de Registro de Diplomas Integrado</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Gestão e Programação de Colação de Grau</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Histórico Escolar atualizado em tempo real</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Auditoria do Sistema e Log de Troca de Grades</li>
                    </ul>
                </div>

                <div class="bg-slate-900 rounded-[2.5rem] border border-slate-700 p-10 shadow-2xl hover:border-indigo-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-indigo-600/20 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-indigo-600/30 transition-colors"></div>
                    <div class="w-16 h-16 bg-indigo-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-white mb-6">AVA & Integrações</h3>
                    <ul class="space-y-4 text-indigo-100 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-indigo-400 mt-0.5">✓</span> Sincronização Bidirecional Moodle</li>
                        <li class="flex items-start gap-3"><span class="text-indigo-400 mt-0.5">✓</span> Inscrição de Matrículas e Cursos no AVA</li>
                        <li class="flex items-start gap-3"><span class="text-indigo-400 mt-0.5">✓</span> Logs e Notificações de Integração em tempo real</li>
                        <li class="flex items-start gap-3"><span class="text-indigo-400 mt-0.5">✓</span> Relatório de Últimos Acessos ao Moodle</li>
                        <li class="flex items-start gap-3"><span class="text-indigo-400 mt-0.5">✓</span> Sincronização de Trancamentos e Cancelamentos</li>
                        <li class="flex items-start gap-3"><span class="text-indigo-400 mt-0.5">✓</span> CRM Dynamics: Captura de Candidatos</li>
                        <li class="flex items-start gap-3"><span class="text-indigo-400 mt-0.5">✓</span> CRM Dynamics: Retorno Automático de Vínculo</li>
                        <li class="flex items-start gap-3"><span class="text-indigo-400 mt-0.5">✓</span> Configurações completas de WebService</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-orange-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="w-16 h-16 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Gestão Institucional</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Estrutura Multi-Campus e Múltiplos Turnos</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Grade Completa de Cursos e Disciplinas</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Áreas de Conhecimento e Calendário Acadêmico</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Painel de Funcionários, Cargos e Departamentos</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Gestão de Professores, Disponibilidade e Jornada</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Controle de Fornecedores e Revendedores</li>
                        <li class="flex items-start gap-3"><span class="text-orange-500 mt-0.5">✓</span> Configuração Paramétrica de Documentos</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-purple-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Atendimento & Portal</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-purple-500 mt-0.5">✓</span> Secretaria Virtual para o Aluno (24h)</li>
                        <li class="flex items-start gap-3"><span class="text-purple-500 mt-0.5">✓</span> Abertura e Triagem de Solicitações e Protocolos</li>
                        <li class="flex items-start gap-3"><span class="text-purple-500 mt-0.5">✓</span> Envio e Validação de Atividades Complementares</li>
                        <li class="flex items-start gap-3"><span class="text-purple-500 mt-0.5">✓</span> Atendimento Dedicado a Polos (EAD)</li>
                        <li class="flex items-start gap-3"><span class="text-purple-500 mt-0.5">✓</span> Histórico Centralizado de Comunicações</li>
                        <li class="flex items-start gap-3"><span class="text-purple-500 mt-0.5">✓</span> Mural de Recados Institucional</li>
                        <li class="flex items-start gap-3"><span class="text-purple-500 mt-0.5">✓</span> Envio Automático de Mensageria (E-mails Dinâmicos)</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-pink-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="w-16 h-16 bg-pink-100 text-pink-600 rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Relatórios (BI)</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-pink-500 mt-0.5">✓</span> Visões Gerenciais e Painel Query Viewer</li>
                        <li class="flex items-start gap-3"><span class="text-pink-500 mt-0.5">✓</span> Fechamento Mensal Geral de Alunos</li>
                        <li class="flex items-start gap-3"><span class="text-pink-500 mt-0.5">✓</span> Controle de Integralização Curricular</li>
                        <li class="flex items-start gap-3"><span class="text-pink-500 mt-0.5">✓</span> Lista de Tarefas e Avaliações Direto do AVA</li>
                        <li class="flex items-start gap-3"><span class="text-pink-500 mt-0.5">✓</span> Relatórios de Alunos com Convênio e Polos</li>
                        <li class="flex items-start gap-3"><span class="text-pink-500 mt-0.5">✓</span> Monitoramento de Motivos de Evasão / Trancamento</li>
                        <li class="flex items-start gap-3"><span class="text-pink-500 mt-0.5">✓</span> Painel de Faltas Justificadas e Documentações</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <section class="py-32 bg-slate-900 text-center relative overflow-hidden">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[500px] h-[500px] rounded-full bg-blue-600/20 blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[500px] h-[500px] rounded-full bg-indigo-600/20 blur-[120px]"></div>
        
        <div class="container mx-auto px-6 max-w-4xl relative z-10">
            <h2 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tighter">Pronto para operar no <span class="text-blue-500">nível máximo?</span></h2>
            <p class="text-xl text-slate-400 mb-12 font-light leading-relaxed">
                Nenhum outro sistema no mercado oferece esta profundidade de gestão acadêmica com implantação consultiva. Agende uma conversa técnica e desafie os nossos especialistas.
            </p>
            <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="bg-blue-600 text-white px-12 py-5 rounded-2xl font-black text-xl transition-all shadow-2xl shadow-blue-500/30 hover:scale-105 hover:bg-blue-500 flex items-center justify-center gap-3 mx-auto">
                Quero conhecer na prática
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>
    </section>

</main>

<?php get_footer(); ?>