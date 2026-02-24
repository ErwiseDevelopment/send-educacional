<?php
/*
Template Name: Módulo - Gestão Financeira (Completo)
*/
get_header(); ?>

<main class="bg-slate-50 min-h-screen">

    <section class="bg-slate-900 pt-32 pb-24 border-b border-slate-800 relative overflow-hidden text-center">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#475569 1px, transparent 1px); background-size: 24px 24px;"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-emerald-600/20 blur-[120px] rounded-full pointer-events-none z-0"></div>
        
        <div class="container mx-auto px-6 max-w-5xl relative z-10">
            <div class="flex justify-center items-center space-x-2 text-sm text-slate-400 mb-6 font-medium uppercase tracking-widest">
                <a href="<?php echo home_url(); ?>" class="hover:text-emerald-400 transition">Início</a>
                <span>/</span>
                <span class="text-emerald-500">O Ecossistema Financeiro</span>
            </div>

            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800 border border-slate-700 shadow-sm text-xs font-semibold text-emerald-400 mb-6 uppercase tracking-wider">
                <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Inadimplência sob controle absoluto
            </div>

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-white mb-8 tracking-tighter leading-[1.1]">
                O fluxo de caixa da sua <br>instituição no <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400">piloto automático.</span>
            </h1>
            
            <p class="text-xl text-slate-400 leading-relaxed max-w-3xl mx-auto font-light">
                Muito além de faturamento. Uma engenharia financeira completa que engloba Contas a Pagar e Receber, Régua de Cobrança, Repasse de Polos e Emissão de Notas Fiscais com zero esforço manual.
            </p>
        </div>
    </section>

    <section class="relative z-20 -mt-8">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-8 flex flex-col md:flex-row justify-around items-center divide-y md:divide-y-0 md:divide-x divide-slate-100">
                <div class="text-center p-4 w-full">
                    <p class="text-3xl font-extrabold text-emerald-600 mb-1">360º</p>
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Pagar & Receber Integrados</p>
                </div>
                <div class="text-center p-4 w-full">
                    <p class="text-3xl font-extrabold text-emerald-600 mb-1">Zero</p>
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Digitação de NF-e</p>
                </div>
                <div class="text-center p-4 w-full">
                    <p class="text-3xl font-extrabold text-emerald-600 mb-1">Self-Service</p>
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Acordos e Negociações</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 relative z-20">
        <div class="container mx-auto px-6 max-w-7xl">
            
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-slate-900 mb-4 tracking-tight">Pare de correr atrás de pagamentos</h2>
                <p class="text-lg text-slate-500">Transforme a sua equipe financeira de "cobradores" em analistas estratégicos de receita e despesa.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-emerald-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-emerald-100 transition-colors"></div>
                    <div class="w-16 h-16 bg-emerald-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Contas a Receber</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Régua de Cobrança Automatizada (Notificações)</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Pagamentos Online Integrados (Cartão/PIX/Boleto)</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Conciliação Instantânea PIX via GETNET</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Geração de Arquivos para Cobrança (Remessa/Retorno)</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Financeiro Individualizado do Aluno</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Lançamento de Cobranças Avulsas</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-500 mt-0.5">✓</span> Atualização Dinâmica de Índices Financeiros</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-rose-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-rose-50 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-rose-100 transition-colors"></div>
                    <div class="w-16 h-16 bg-rose-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Contas a Pagar</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-rose-500 mt-0.5">✓</span> Gestão de Fornecedores e Prestadores de Serviço</li>
                        <li class="flex items-start gap-3"><span class="text-rose-500 mt-0.5">✓</span> Rateio detalhado por Centro de Custo e Unidade</li>
                        <li class="flex items-start gap-3"><span class="text-rose-500 mt-0.5">✓</span> Alertas sistêmicos de vencimento de obrigações</li>
                        <li class="flex items-start gap-3"><span class="text-rose-500 mt-0.5">✓</span> Geração de arquivo remessa de pagamento em lote</li>
                        <li class="flex items-start gap-3"><span class="text-rose-500 mt-0.5">✓</span> Classificação gerencial via Plano de Contas</li>
                        <li class="flex items-start gap-3"><span class="text-rose-500 mt-0.5">✓</span> Baixa automatizada de pagamentos efetuados</li>
                        <li class="flex items-start gap-3"><span class="text-rose-500 mt-0.5">✓</span> Fluxo de Caixa integrado (Receber vs. Pagar)</li>
                    </ul>
                </div>

                <div class="bg-slate-900 rounded-[2.5rem] border border-slate-700 p-10 shadow-2xl hover:border-emerald-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-emerald-600/20 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-emerald-600/30 transition-colors"></div>
                    <div class="w-16 h-16 bg-emerald-500 text-white rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-white mb-6">Acordos & Negociações</h3>
                    <ul class="space-y-4 text-emerald-100 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-emerald-400 mt-0.5">✓</span> Programação Parametrizada de Negociações</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-400 mt-0.5">✓</span> Portal Self-Service de Renegociação para o Aluno</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-400 mt-0.5">✓</span> Cálculo Automático de Juros e Multas</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-400 mt-0.5">✓</span> Histórico e Gestão Centralizada de Acordos</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-400 mt-0.5">✓</span> Bloqueio/Desbloqueio Acadêmico via Financeiro</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-400 mt-0.5">✓</span> Observações e Histórico por Parcela</li>
                        <li class="flex items-start gap-3"><span class="text-emerald-400 mt-0.5">✓</span> Monitoramento Ativo de Alunos Inadimplentes</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-cyan-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-50 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-cyan-100 transition-colors"></div>
                    <div class="w-16 h-16 bg-cyan-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Automação Fiscal (NF-e)</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-cyan-500 mt-0.5">✓</span> Emissão 100% Automática de Notas Fiscais</li>
                        <li class="flex items-start gap-3"><span class="text-cyan-500 mt-0.5">✓</span> Transmissão Direta para as Prefeituras</li>
                        <li class="flex items-start gap-3"><span class="text-cyan-500 mt-0.5">✓</span> Emissão vinculada à liquidação do pagamento</li>
                        <li class="flex items-start gap-3"><span class="text-cyan-500 mt-0.5">✓</span> Tratamento de Múltiplos CNPJs/Campus</li>
                        <li class="flex items-start gap-3"><span class="text-cyan-500 mt-0.5">✓</span> Relatório de Notas Emitidas e Canceladas</li>
                        <li class="flex items-start gap-3"><span class="text-cyan-500 mt-0.5">✓</span> Conformidade total com regras tributárias locais</li>
                        <li class="flex items-start gap-3"><span class="text-cyan-500 mt-0.5">✓</span> Fim do retrabalho e digitação manual</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-indigo-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="w-16 h-16 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Polos & Repasses</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-indigo-500 mt-0.5">✓</span> Automação Completa de Repasses Financeiros</li>
                        <li class="flex items-start gap-3"><span class="text-indigo-500 mt-0.5">✓</span> Cupons e Regras Customizadas para Repasse a Polos</li>
                        <li class="flex items-start gap-3"><span class="text-indigo-500 mt-0.5">✓</span> Visão Geral Financeira por Polo (Franquia)</li>
                        <li class="flex items-start gap-3"><span class="text-indigo-500 mt-0.5">✓</span> Relatórios de Polo Analítico (Detalhamento)</li>
                        <li class="flex items-start gap-3"><span class="text-indigo-500 mt-0.5">✓</span> Relatórios de Polo Sintético (Consolidado)</li>
                        <li class="flex items-start gap-3"><span class="text-indigo-500 mt-0.5">✓</span> Monitoramento de Inadimplência por Unidade</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-pink-400 transition-all duration-500 group relative overflow-hidden">
                    <div class="w-16 h-16 bg-pink-100 text-pink-600 rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Bolsas & Convênios</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-pink-500 mt-0.5">✓</span> Gestão e Aprovação Sistêmica de Convênios</li>
                        <li class="flex items-start gap-3"><span class="text-pink-500 mt-0.5">✓</span> Parametrização de Categorias de Desconto</li>
                        <li class="flex items-start gap-3"><span class="text-pink-500 mt-0.5">✓</span> Planos de Desconto Padrão e Descontos Avulsos</li>
                        <li class="flex items-start gap-3"><span class="text-pink-500 mt-0.5">✓</span> Gestão de Planos com 100% de Desconto (Bolsistas)</li>
                        <li class="flex items-start gap-3"><span class="text-pink-500 mt-0.5">✓</span> Planos Financeiros personalizados por Curso</li>
                        <li class="flex items-start gap-3"><span class="text-pink-500 mt-0.5">✓</span> Gestão de Campanhas de Matrícula e Captação</li>
                    </ul>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 p-10 shadow-lg shadow-slate-200/50 hover:border-blue-500 transition-all duration-500 group relative overflow-hidden">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-8 shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-6">BI & Orçamento</h3>
                    <ul class="space-y-4 text-slate-600 text-sm font-medium">
                        <li class="flex items-start gap-3"><span class="text-blue-600 mt-0.5">✓</span> Módulo de Metas e Previsão de Orçamento</li>
                        <li class="flex items-start gap-3"><span class="text-blue-600 mt-0.5">✓</span> Configurações de Visões Personalizadas (BI)</li>
                        <li class="flex items-start gap-3"><span class="text-blue-600 mt-0.5">✓</span> Análise Dinâmica de Recebimentos (Query Financeiro)</li>
                        <li class="flex items-start gap-3"><span class="text-blue-600 mt-0.5">✓</span> Apuração de Valor Líquido por Competência</li>
                        <li class="flex items-start gap-3"><span class="text-blue-600 mt-0.5">✓</span> Apuração de Valor Líquido por Categoria</li>
                        <li class="flex items-start gap-3"><span class="text-blue-600 mt-0.5">✓</span> Cruzamento Financeiro com Acompanhamento de Rematrícula</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <section class="py-32 bg-slate-900 text-center relative overflow-hidden">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[500px] h-[500px] rounded-full bg-emerald-600/20 blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[500px] h-[500px] rounded-full bg-teal-600/20 blur-[120px]"></div>
        
        <div class="container mx-auto px-6 max-w-4xl relative z-10">
            <h2 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tighter">Acabe com a fuga de receitas <span class="text-emerald-500">hoje mesmo.</span></h2>
            <p class="text-xl text-slate-400 mb-12 font-light leading-relaxed">
                Nossos consultores vão mostrar exatamente como o Send Educacional substitui processos manuais por regras inteligentes, reduzindo a sua inadimplência nos primeiros meses.
            </p>
            <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="bg-emerald-500 text-slate-900 px-12 py-5 rounded-2xl font-black text-xl transition-all shadow-2xl shadow-emerald-500/30 hover:scale-105 hover:bg-emerald-400 flex items-center justify-center gap-3 mx-auto">
                Solicitar Demonstração Gratuita
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>
    </section>

</main>

<?php get_footer(); ?>