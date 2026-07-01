<?php
/*
Template Name: Página de Módulos (Catálogo)
*/
get_header(); ?>

<main class="min-h-screen">

    <section class="bg-slate-900 pt-32 pb-20 relative overflow-hidden text-center">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#475569 1px, transparent 1px); background-size: 24px 24px;"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-blue-600/20 blur-[100px] rounded-full pointer-events-none z-0"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <h1 class="reveal text-4xl md:text-6xl font-black text-white mb-6 tracking-tight">
                Ecossistema <span class="gtext">Send Educacional</span>
            </h1>
            <p class="text-xl text-slate-400 max-w-2xl mx-auto leading-relaxed font-light">
                Tudo o que sua instituição precisa em um único lugar. Módulos nativamente integrados para uma gestão 360º de alta performance.
            </p>
        </div>
    </section>

    <section class="py-24 relative z-10">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <div class="glass glass-hover reveal p-10 rounded-[2.5rem] transition-all duration-300 group flex flex-col">
                    <div class="w-14 h-14 bg-white/5 border border-white/10 text-blue-300 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-all">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4 tracking-tight">Gestão Acadêmica</h3>
                    <p class="text-slate-400 mb-8 leading-relaxed text-sm flex-grow">
                        Secretaria digital completa, controle de matrículas, emissão de diploma digital, integração AVA e total conformidade com as exigências do MEC.
                    </p>
                    <a href="<?php echo home_url('/gestao-academica'); ?>" class="inline-flex items-center font-bold text-blue-300 hover:text-blue-200 group-hover:translate-x-1 transition-transform">
                        Conhecer módulo <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <div class="glass glass-hover reveal p-10 rounded-[2.5rem] transition-all duration-300 group flex flex-col">
                    <div class="w-14 h-14 bg-white/5 border border-white/10 text-blue-300 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-all">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4 tracking-tight">Gestão Financeira</h3>
                    <p class="text-slate-400 mb-8 leading-relaxed text-sm flex-grow">
                        Combate à inadimplência com régua de cobrança automática, conciliação PIX instantânea, repasse para polos e emissão automática de NF-e.
                    </p>
                    <a href="<?php echo home_url('/gestao-financeira'); ?>" class="inline-flex items-center font-bold text-blue-300 hover:text-blue-200 group-hover:translate-x-1 transition-transform">
                        Conhecer módulo <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <div class="glass glass-hover reveal p-10 rounded-[2.5rem] transition-all duration-300 group flex flex-col">
                    <div class="w-14 h-14 bg-white/5 border border-white/10 text-blue-300 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-all">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4 tracking-tight">Central de Requerimentos</h3>
                    <p class="text-slate-400 mb-8 leading-relaxed text-sm flex-grow">
                        Helpdesk acadêmico nativo. Automatize fluxos de trabalho (workflows), controle prazos (SLA) de atendimento e elimine processos no papel.
                    </p>
                    <a href="<?php echo home_url('/requerimentos'); ?>" class="inline-flex items-center font-bold text-blue-300 hover:text-blue-200 group-hover:translate-x-1 transition-transform">
                        Conhecer módulo <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <div class="glass glass-hover reveal p-10 rounded-[2.5rem] transition-all duration-300 group flex flex-col">
                    <div class="w-14 h-14 bg-white/5 border border-white/10 text-blue-300 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-all">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477-4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4 tracking-tight">Biblioteca & GED</h3>
                    <p class="text-slate-400 mb-8 leading-relaxed text-sm flex-grow">
                        Acervo digital e físico integrados. Realize empréstimos automatizados e armazene a documentação dos alunos com validade jurídica (GED).
                    </p>
                    <a href="<?php echo home_url('/biblioteca-e-ged'); ?>" class="inline-flex items-center font-bold text-blue-300 hover:text-blue-200 group-hover:translate-x-1 transition-transform">
                        Conhecer módulo <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <div class="glass glass-hover reveal p-10 rounded-[2.5rem] transition-all duration-300 group flex flex-col">
                    <div class="w-14 h-14 bg-white/5 border border-white/10 text-blue-300 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-all">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4 tracking-tight">Portais e App Mobile</h3>
                    <p class="text-slate-400 mb-8 leading-relaxed text-sm flex-grow">
                        A instituição na palma da mão. Professores lançam notas e alunos consultam frequências, boletos e o Educacional Chat via aplicativo.
                    </p>
                    <a href="<?php echo home_url('/portais'); ?>" class="inline-flex items-center font-bold text-blue-300 hover:text-blue-200 group-hover:translate-x-1 transition-transform">
                        Conhecer módulo <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <div class="glass glass-hover reveal p-10 rounded-[2.5rem] transition-all duration-300 group flex flex-col">
                    <div class="w-14 h-14 bg-white/5 border border-white/10 text-blue-300 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-all">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 01-2 2h22a2 2 0 01-2-2v-13a2 2 0 00-2-2h-2a2 2 0 00-2 2v13m-10-10V7a2 2 0 00-2-2H9a2 2 0 00-2 2v10"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4 tracking-tight">BI & Visões Gerenciais</h3>
                    <p class="text-slate-400 mb-8 leading-relaxed text-sm flex-grow">
                        Dashboards inteligentes (Query Viewer) para tomada de decisão em tempo real, cobrindo orçamentos, fechamentos e desempenho acadêmico.
                    </p>
                    <div class="inline-flex items-center font-bold text-slate-400 mt-auto">
                        Módulo Nativo no ERP
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-32 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#3b82f6 1px, transparent 1px); background-size: 40px 40px;"></div>
        <div class="absolute top-1/2 left-0 w-96 h-96 bg-fuchsia-600/20 blur-[120px] rounded-full transform -translate-y-1/2"></div>
        <div class="absolute top-1/2 right-0 w-96 h-96 bg-blue-600/20 blur-[120px] rounded-full transform -translate-y-1/2"></div>
        
        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="text-center mb-20">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-800 border border-slate-700 text-blue-400 font-bold tracking-[0.2em] text-[10px] uppercase mb-6">
                    Módulos Avançados de Crescimento
                </span>
                <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight">Capte novos alunos. <span class="gtext">Blinde os atuais.</span></h2>
                <p class="text-slate-400 max-w-2xl mx-auto text-lg font-light leading-relaxed">
                    Não seja apenas um administrador. Utilize o poder dos nossos algoritmos para escalar suas matrículas e zerar sua taxa de evasão escolar.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                
                <div class="bg-slate-800/40 backdrop-blur-md p-10 md:p-12 rounded-[3rem] border border-slate-700 hover:border-blue-500 hover:bg-slate-800 transition-all duration-500 group flex flex-col">
                    <div class="w-16 h-16 bg-blue-500/20 border border-blue-500/30 rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-blue-900/50">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-3xl font-extrabold text-white mb-4">CRM de Captação</h3>
                    <p class="text-slate-400 leading-relaxed mb-8 flex-grow">
                        Gerencie todo o funil de vendas, desde o primeiro lead no site até a assinatura da matrícula. Controle visitas, integre com ferramentas de marketing e automatize o contato comercial.
                    </p>
                    <a href="<?php echo home_url('/captacao'); ?>" class="inline-flex items-center font-bold text-blue-400 hover:text-blue-300 group-hover:translate-x-1 transition-transform">
                        Conhecer o CRM <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

                <div class="bg-slate-800/40 backdrop-blur-md p-10 md:p-12 rounded-[3rem] border border-slate-700 hover:border-violet-500 hover:bg-slate-800 transition-all duration-500 group flex flex-col">
                    <div class="w-16 h-16 bg-violet-500/20 border border-violet-500/30 rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-violet-900/50">
                        <svg class="w-8 h-8 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-3xl font-extrabold text-white mb-4">Retenção e Sucesso</h3>
                    <p class="text-slate-400 leading-relaxed mb-8 flex-grow">
                        Preveja a evasão antes que ela aconteça. Nosso algoritmo cruza dados acadêmicos, financeiros e engajamento no AVA para alertar sua equipe sobre alunos em risco.
                    </p>
                    <a href="<?php echo home_url('/retencao'); ?>" class="inline-flex items-center font-bold text-violet-400 hover:text-violet-300 group-hover:translate-x-1 transition-transform">
                        Conhecer módulo de Retenção <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section class="py-24">
        <?php get_template_part('inc/inc-carrossel-integracoes'); ?>
    </section>

</main>

<?php get_footer(); ?>