<?php 
// 404.php - Página de Erro (Não Encontrada)
get_header(); 
?>

<main class="bg-slate-50 min-h-screen flex items-center justify-center py-20 relative overflow-hidden">
    
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#94a3b8 1px, transparent 1px); background-size: 32px 32px;"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-blue-500/10 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="container mx-auto px-6 relative z-10 text-center max-w-3xl">
        
        <div class="relative inline-block mb-8">
            <h1 class="text-9xl md:text-[12rem] font-black text-transparent bg-clip-text bg-gradient-to-b from-blue-600 to-indigo-900 leading-none tracking-tighter drop-shadow-xl">
                404
            </h1>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-white/20 blur-md rounded-full -z-10"></div>
        </div>

        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">
            Ops! Perdemo-nos no caminho.
        </h2>
        <p class="text-lg text-slate-600 mb-10 max-w-xl mx-auto leading-relaxed">
            A página que tentou aceder não existe, foi movida ou o link está incorreto. Mas não se preocupe, pode encontrar o que precisa abaixo.
        </p>

        <div class="max-w-xl mx-auto mb-12">
            <form role="search" method="get" action="<?php echo home_url( '/' ); ?>" class="relative shadow-lg rounded-2xl group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="search" name="s" class="w-full pl-12 pr-6 py-4 rounded-2xl border-2 border-slate-100 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 text-slate-900 font-medium transition-all" placeholder="Pesquisar artigos, módulos ou novidades...">
            </form>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="<?php echo home_url(); ?>" class="w-full sm:w-auto px-8 py-4 rounded-xl font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 hover:shadow-md transition-all flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Voltar à Página Inicial
            </a>
            
            <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="w-full sm:w-auto px-8 py-4 rounded-xl font-bold text-white bg-blue-600 hover:bg-blue-700 shadow-[0_8px_30px_rgb(37,99,235,0.3)] hover:-translate-y-1 transition-all flex items-center justify-center gap-2">
                Falar com um Especialista
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
            </button>
        </div>

    </div>
</main>

<?php get_footer(); ?>