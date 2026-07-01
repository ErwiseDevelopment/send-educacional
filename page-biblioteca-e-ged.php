<?php
/*
Template Name: Módulo - Biblioteca & GED
*/
get_header(); ?>

<main class="min-h-screen">

    <section class="bg-slate-900 pt-32 pb-24 border-b border-slate-800 relative overflow-hidden text-center">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#475569 1px, transparent 1px); background-size: 24px 24px;"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-blue-600/20 blur-[100px] rounded-full pointer-events-none z-0"></div>
        
        <div class="container mx-auto px-6 max-w-4xl relative z-10">
            <div class="flex justify-center items-center space-x-2 text-sm text-slate-400 mb-6 font-medium uppercase tracking-widest">
                <a href="<?php echo home_url(); ?>" class="hover:text-blue-400 transition text-[11px]">Início</a>
                <span class="text-[10px]">/</span>
                <span class="text-blue-500 text-[11px]">Módulos</span>
            </div>

            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight reveal">
                Biblioteca & <span class="gtext">GED Digital</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-400 mb-10 max-w-2xl mx-auto leading-relaxed">
                Gestão Eletrônica de Documentos com validade jurídica e controle completo de acervo físico em uma única plataforma.
            </p>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="flex items-center gap-4 mb-12">
                <div class="h-8 w-1 bg-blue-600 rounded-full"></div>
                <h2 class="text-3xl font-bold text-white tracking-tight reveal">Gestão de Documentos (GED)</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="glass glass-hover p-8 rounded-[2rem] transition-all group reveal">
                    <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center text-blue-300 mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Importação e Armazenamento</h3>
                    <p class="text-slate-400 leading-relaxed text-sm">Centralize todos os documentos da instituição em nuvem segura, com organização automática por pastas e categorias.</p>
                </div>

                <div class="glass glass-hover p-8 rounded-[2rem] transition-all group reveal">
                    <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center text-blue-300 mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Assinatura Digital</h3>
                    <p class="text-slate-400 leading-relaxed text-sm">Formalize contratos e documentos acadêmicos com validade jurídica, eliminando a necessidade de impressões e deslocamentos.</p>
                </div>

                <div class="glass glass-hover p-8 rounded-[2rem] transition-all group reveal">
                    <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center text-blue-300 mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Consulta e Validação</h3>
                    <p class="text-slate-400 leading-relaxed text-sm">Ferramentas de busca avançada e validação de autenticidade para garantir a integridade dos dados institucionais.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white/[.02]">
        <div class="container mx-auto px-6">
            <div class="flex items-center gap-4 mb-12">
                <div class="h-8 w-1 bg-indigo-600 rounded-full"></div>
                <h2 class="text-3xl font-bold text-white tracking-tight reveal">Biblioteca Física</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="glass p-6 rounded-3xl reveal">
                    <h4 class="font-bold text-white mb-2 flex items-center gap-2">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full"></span> Acervo
                    </h4>
                    <p class="text-slate-400 text-sm leading-relaxed">Cadastro detalhado de exemplares, controle de autores e categorização inteligente do acervo.</p>
                </div>

                <div class="glass p-6 rounded-3xl reveal">
                    <h4 class="font-bold text-white mb-2 flex items-center gap-2">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full"></span> Circulação
                    </h4>
                    <p class="text-slate-400 text-sm leading-relaxed">Gestão de empréstimos e devoluções com notificações automáticas para alunos e professores.</p>
                </div>

                <div class="glass p-6 rounded-3xl reveal">
                    <h4 class="font-bold text-white mb-2 flex items-center gap-2">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full"></span> Operacional
                    </h4>
                    <p class="text-slate-400 text-sm leading-relaxed">Geração de etiquetas para organização física e sistema automático de cobrança de multas por atraso.</p>
                </div>

                <div class="glass p-6 rounded-3xl reveal">
                    <h4 class="font-bold text-white mb-2 flex items-center gap-2">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full"></span> Análises
                    </h4>
                    <p class="text-slate-400 text-sm leading-relaxed">Relatórios gerenciais completos sobre o uso da biblioteca e status de toda a documentação GED.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-900 text-center relative overflow-hidden">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-blue-900 opacity-40 blur-3xl"></div>
        
        <div class="container mx-auto px-6 max-w-3xl relative z-10">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6">Sua instituição 100% digital e organizada</h2>
            <p class="text-lg text-slate-400 mb-10">Agende uma conversa com nossos consultores e descubra como otimizar sua gestão acadêmica.</p>
            <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="gbtn text-white px-10 py-4 rounded-2xl font-bold text-lg transition-all hover:scale-105">
                Solicitar Demonstração
            </button>
        </div>
    </section>

</main>

<?php get_footer(); ?>