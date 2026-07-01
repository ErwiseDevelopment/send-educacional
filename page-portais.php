<?php
/*
Template Name: Módulo - Portais Integrados
*/
get_header(); ?>

<main class="min-h-screen">

    <section class="bg-slate-900 pt-32 pb-24 border-b border-slate-800 relative overflow-hidden text-center">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#475569 1px, transparent 1px); background-size: 24px 24px;"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-purple-600/20 blur-[100px] rounded-full pointer-events-none z-0"></div>
        
        <div class="container mx-auto px-6 max-w-4xl relative z-10">
            <div class="flex justify-center items-center space-x-2 text-sm text-slate-400 mb-6 font-medium uppercase tracking-widest">
                <a href="<?php echo home_url(); ?>" class="hover:text-purple-400 transition">Início</a>
                <span>/</span>
                <span class="text-purple-500">Módulos</span>
            </div>

            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800 border border-slate-700 shadow-sm text-xs font-semibold text-purple-400 mb-6 uppercase tracking-wider">
                <span class="flex h-2 w-2 rounded-full bg-purple-500 animate-pulse"></span>
                Acesso Web e Mobile
            </div>

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 tracking-tight reveal">
                A sua instituição na <span class="gtext">palma da mão</span> de quem importa.
            </h1>
            
            <p class="text-xl text-slate-400 leading-relaxed max-w-2xl mx-auto">
                Conecte alunos, professores e polos de EAD em um ambiente digital intuitivo, rápido e totalmente integrado à sua secretaria e ao seu financeiro.
            </p>
        </div>
    </section>

    <section class="relative z-20 -mt-8">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="glass rounded-2xl p-8 flex flex-col md:flex-row justify-around items-center divide-y md:divide-y-0 md:divide-x divide-white/10">
                <div class="text-center p-4 w-full">
                    <p class="text-3xl font-extrabold gtext mb-1">100%</p>
                    <p class="text-sm font-semibold text-slate-400 uppercase tracking-wide">Responsivo</p>
                </div>
                <div class="text-center p-4 w-full">
                    <p class="text-3xl font-extrabold gtext mb-1">Zero</p>
                    <p class="text-sm font-semibold text-slate-400 uppercase tracking-wide">Atraso na Sincronização</p>
                </div>
                <div class="text-center p-4 w-full">
                    <p class="text-3xl font-extrabold gtext mb-1">Self-Service</p>
                    <p class="text-sm font-semibold text-slate-400 uppercase tracking-wide">Para Alunos e Professores</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="prose prose-lg prose-invert max-w-none text-center mb-16">
                <?php
                while ( have_posts() ) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>

            <div class="mb-16 text-center max-w-3xl mx-auto reveal">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Uma experiência digital sem fricção</h2>
                <p class="text-lg text-slate-400">Reduza drasticamente o volume de atendimentos no balcão da faculdade. Com os portais do Send Educacional, cada usuário tem autonomia para resolver suas pendências de onde estiver.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="flex flex-col p-8 glass glass-hover rounded-3xl transition-all group reveal">
                    <div class="w-16 h-16 bg-white/5 border border-white/10 text-purple-300 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7M5 9.8v4.4M19 9.8v4.4"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Portal do Aluno</h3>
                    <p class="text-slate-400 leading-relaxed mb-6">O centro de comando do estudante. Autonomia total para acompanhar a vida acadêmica e financeira sem precisar ligar para a secretaria.</p>

                    <ul class="space-y-3 mt-auto border-t border-white/10 pt-6">
                        <li class="flex items-start text-sm text-slate-300 font-medium"><svg class="w-5 h-5 mr-3 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Boletim, notas e faltas em tempo real.</li>
                        <li class="flex items-start text-sm text-slate-300 font-medium"><svg class="w-5 h-5 mr-3 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Emissão de 2ª via de boletos e código Pix.</li>
                        <li class="flex items-start text-sm text-slate-300 font-medium"><svg class="w-5 h-5 mr-3 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Abertura de requerimentos online (Ex: atestados).</li>
                        <li class="flex items-start text-sm text-slate-300 font-medium"><svg class="w-5 h-5 mr-3 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Rematrícula e aceite de contrato com 1 clique.</li>
                    </ul>
                </div>

                <div class="flex flex-col p-8 bg-purple-900 rounded-3xl border border-purple-800 hover:shadow-2xl transition-all group relative overflow-hidden shadow-xl transform lg:-translate-y-4">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-purple-500 rounded-full blur-3xl opacity-20 -mr-10 -mt-10"></div>
                    <div class="w-16 h-16 bg-purple-800 text-purple-300 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-sm relative z-10 border border-purple-700/50">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="absolute top-0 right-0 bg-fuchsia-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg rounded-tr-3xl uppercase tracking-wider">Favorito dos Docentes</div>
                    <h3 class="text-2xl font-bold text-white mb-4 relative z-10">Portal do Professor</h3>
                    <p class="text-purple-100 leading-relaxed mb-6 relative z-10">Facilite a rotina do seu corpo docente. Um diário escolar intuitivo que elimina o papel e sincroniza instantaneamente com a secretaria acadêmica.</p>
                    
                    <ul class="space-y-3 mt-auto border-t border-purple-800 pt-6 relative z-10">
                        <li class="flex items-start text-sm text-purple-50 font-medium"><svg class="w-5 h-5 mr-3 text-fuchsia-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Lançamento de notas por turma ou individual.</li>
                        <li class="flex items-start text-sm text-purple-50 font-medium"><svg class="w-5 h-5 mr-3 text-fuchsia-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Chamada (frequência) fácil via smartphone.</li>
                        <li class="flex items-start text-sm text-purple-50 font-medium"><svg class="w-5 h-5 mr-3 text-fuchsia-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Lançamento de conteúdo programático da aula.</li>
                        <li class="flex items-start text-sm text-purple-50 font-medium"><svg class="w-5 h-5 mr-3 text-fuchsia-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Gestão e aprovação de justificativas de ausência.</li>
                    </ul>
                </div>

                <div class="flex flex-col p-8 glass glass-hover rounded-3xl transition-all group reveal">
                    <div class="w-16 h-16 bg-white/5 border border-white/10 text-purple-300 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Portal Polo (Parceiros)</h3>
                    <p class="text-slate-400 leading-relaxed mb-6">Fundamental para instituições com ensino à distância (EAD). Dê aos seus coordenadores de polo a visibilidade que eles precisam para escalar captações.</p>

                    <ul class="space-y-3 mt-auto border-t border-white/10 pt-6">
                        <li class="flex items-start text-sm text-slate-300 font-medium"><svg class="w-5 h-5 mr-3 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Gestão isolada de alunos por unidade/polo.</li>
                        <li class="flex items-start text-sm text-slate-300 font-medium"><svg class="w-5 h-5 mr-3 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Acompanhamento de repasses e comissões.</li>
                        <li class="flex items-start text-sm text-slate-300 font-medium"><svg class="w-5 h-5 mr-3 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Relatórios locais de inadimplência e evasão.</li>
                        <li class="flex items-start text-sm text-slate-300 font-medium"><svg class="w-5 h-5 mr-3 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Intermediação de documentos do aluno.</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-900 text-center relative overflow-hidden">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-purple-900 opacity-40 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 rounded-full bg-blue-900 opacity-30 blur-3xl"></div>
        
        <div class="container mx-auto px-6 max-w-3xl relative z-10">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6">Modernize a experiência da sua comunidade acadêmica.</h2>
            <p class="text-lg text-slate-400 mb-10">Descubra na prática como os portais do Send Educacional são fáceis de usar, tanto no computador quanto na tela do celular.</p>
            <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="gbtn text-white px-10 py-4 rounded-xl font-extrabold text-lg transition-all hover:scale-105">
                Ver os Portais em Ação
            </button>
        </div>
    </section>

</main>

<?php get_footer(); ?>