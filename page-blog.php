<?php 
// page-blog.php - Template do Portal de Conteúdo (Compacto, Elegante e com Filtro AJAX)
get_header(); 
?>

<main class="bg-slate-50 min-h-screen pb-20">

    <?php 
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $is_first_page = ( $paged === 1 );
    ?>

    <section class="pt-28 pb-12 bg-[#1e3a8a] relative overflow-hidden text-center">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>
        
        <div class="container mx-auto px-6 relative z-10 max-w-4xl">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">
                Portal de Conteúdo
            </h1>
            <p class="text-base text-blue-200 mb-8">
                Estratégias valiosas para se destacar no mercado, combater a evasão e tornar sua gestão escolar de alta performance.
            </p>

            <form id="form-busca-blog" class="relative shadow-xl" onsubmit="return false;">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="search" id="input-busca-blog" class="w-full pl-12 pr-28 py-3 rounded-xl border-0 focus:ring-4 focus:ring-blue-500/30 text-slate-900 font-medium outline-none" placeholder="O que você quer aprender hoje?">
                <button type="submit" class="absolute inset-y-1.5 right-1.5 bg-blue-600 hover:bg-blue-700 text-white font-bold px-5 rounded-lg transition-colors text-sm">
                    Buscar
                </button>
            </form>
        </div>
    </section>

    <div class="container mx-auto px-6 max-w-6xl mt-10">
        
        <?php if ( $is_first_page ) : ?>

            <?php 
                $destaques = new WP_Query([
                    'post_type'           => 'post',
                    'posts_per_page'      => 4,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => true,
                    'orderby'             => 'date',
                    'order'               => 'DESC'
                ]);

            $post_ids_destaque = []; 

            if ( $destaques->have_posts() ) :
            ?>
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-12">
                    
                    <?php 
                    $contador = 0;
                    while ( $destaques->have_posts() ) : $destaques->the_post(); 
                        $contador++;
                        $post_ids_destaque[] = get_the_ID();
                        $categoria = get_the_category();
                        $nome_categoria = !empty($categoria) ? $categoria[0]->name : 'Blog';
                    ?>
                        
                        <?php if ( $contador === 1 ) : ?>
                            <div class="lg:col-span-7 group">
                                <a href="<?php the_permalink(); ?>" class="block bg-white rounded-[1.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:border-blue-200 transition-all overflow-hidden h-full flex flex-col">
                                    <div class="w-full h-64 md:h-80 bg-slate-200 overflow-hidden relative">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-700']); ?>
                                        <?php endif; ?>
                                        <div class="absolute top-4 left-4 bg-blue-600 text-white text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-widest">
                                            Em Destaque
                                        </div>
                                    </div>
                                    <div class="p-6 md:p-8 flex flex-col flex-grow">
                                        <span class="text-blue-600 font-bold uppercase tracking-wider text-xs mb-2"><?php echo $nome_categoria; ?></span>
                                        <h2 class="text-2xl font-extrabold text-slate-900 group-hover:text-blue-600 transition-colors mb-3 leading-tight">
                                            <?php the_title(); ?>
                                        </h2>
                                        <p class="text-slate-600 text-sm mb-6 line-clamp-2">
                                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                        </p>
                                        <div class="mt-auto flex items-center justify-between border-t border-slate-100 pt-4">
                                            <div class="flex items-center gap-2">
                                                <?php echo get_avatar( get_the_author_meta('ID'), 28, '', '', ['class' => 'w-7 h-7 rounded-full'] ); ?>
                                                <span class="text-slate-900 font-bold text-xs"><?php the_author(); ?></span>
                                            </div>
                                            <span class="text-slate-400 text-xs font-semibold">
                                                <?php echo get_the_date('d M, Y'); ?>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="lg:col-span-5 flex flex-col gap-4">
                                <h3 class="text-base font-bold text-slate-900 border-b border-slate-200 pb-2">Artigos em Alta</h3>

                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>" class="flex bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all overflow-hidden group h-28">
                                <div class="w-1/3 h-full bg-slate-200 overflow-hidden flex-shrink-0 relative">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500']); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="w-2/3 p-4 flex flex-col justify-center">
                                    <span class="text-blue-600 font-bold uppercase tracking-wider text-[9px] mb-1"><?php echo $nome_categoria; ?></span>
                                    <h4 class="text-sm font-bold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug line-clamp-2 mb-1">
                                        <?php the_title(); ?>
                                    </h4>
                                    <span class="text-slate-400 text-[10px] font-semibold mt-auto"><?php echo get_the_date('d M, Y'); ?></span>
                                </div>
                            </a>
                        <?php endif; ?>
                        
                    <?php endwhile; wp_reset_postdata(); ?>
                    
                    </div> 
                </div> 
            <?php endif; ?>

            <div class="flex items-center gap-3 overflow-x-auto pb-4 mb-10 scrollbar-hide border-b border-slate-200" id="filtro-blog">
                <span class="font-bold text-slate-400 text-xs uppercase tracking-widest whitespace-nowrap">Filtrar:</span>
                
                <button data-categoria="all" class="btn-filtro px-4 py-1.5 rounded-full bg-slate-800 text-white font-bold text-xs whitespace-nowrap shadow-sm transition-colors">
                    Todos
                </button>
                
                <?php
                $categories = get_categories(['hide_empty' => true]);
                foreach($categories as $category) {
                    echo '<button data-categoria="' . $category->term_id . '" class="btn-filtro px-4 py-1.5 rounded-full bg-white border border-slate-200 text-slate-600 font-bold text-xs hover:border-blue-500 hover:text-blue-600 whitespace-nowrap transition-colors">' . esc_html($category->name) . '</button>';
                }
                ?>
            </div>

            <div class="mb-12 bg-[#1e3a8a] rounded-3xl flex flex-col md:flex-row items-center justify-between overflow-hidden shadow-xl relative max-w-5xl mx-auto">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent to-[#162b66]"></div>
                
                <div class="relative z-10 p-8 md:p-10 md:w-2/3">
                    <h3 class="text-2xl md:text-3xl font-extrabold text-white mb-2">Escolha crescer hoje com o Send!</h3>
                    <p class="text-blue-100 text-sm md:text-base mb-6 max-w-lg">
                        Tenha uma instituição de alta performance com o melhor ecossistema de gestão escolar.
                    </p>
                    <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="bg-[#00d68f] hover:bg-[#00c080] text-slate-900 px-6 py-3 rounded-lg font-bold text-sm transition-transform hover:-translate-y-1 shadow-md">
                        Agende uma demonstração grátis!
                    </button>
                </div>

                    <div class="relative md:w-1/3 w-full flex justify-center items-end overflow-visible">

                        <div class="relative w-64 h-64 -mb-14">

                            <div class="absolute inset-0 translate-y-10 scale-95 rounded-full bg-black/40 blur-3xl"></div>

                            <img 
                                src="<?php echo get_template_directory_uri(); ?>/src/img/pessoa.png"
                                alt="Especialista Send"
                                class="relative w-full h-full object-contain drop-shadow-[0_40px_40px_rgba(0,0,0,0.45)]"
                            />

                        </div>

                    </div>

            </div>

        <?php endif; ?>

        <h2 class="text-xl font-bold text-slate-900 mb-6">Mais Recentes</h2>

        <div id="posts-grid" class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 min-h-[400px]">
            <?php 
            if ( have_posts() ) :
                while ( have_posts() ) : the_post(); 
                    if ( isset($post_ids_destaque) && in_array(get_the_ID(), $post_ids_destaque) ) continue;
                    $categoria = get_the_category();
                    $nome_categoria = !empty($categoria) ? $categoria[0]->name : 'Artigo';
            ?>
                <article class="col-span-1 group flex flex-col bg-white rounded-[1.5rem] border border-slate-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all overflow-hidden animate-[fadeIn_0.5s_ease-in-out]">
                    <a href="<?php the_permalink(); ?>" class="block w-full h-48 bg-slate-200 overflow-hidden relative">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-700']); ?>
                        <?php endif; ?>
                    </a>
                    <div class="p-6 flex flex-col flex-grow">
                        <span class="text-blue-600 font-bold uppercase tracking-wider text-[9px] mb-2 block">
                            <?php echo $nome_categoria; ?>
                        </span>
                        <a href="<?php the_permalink(); ?>">
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors mb-2 leading-snug">
                                <?php the_title(); ?>
                            </h3>
                        </a>
                        <p class="text-slate-500 text-xs mb-4 line-clamp-3 leading-relaxed">
                            <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                        </p>
                        
                        <div class="mt-auto flex items-center justify-between border-t border-slate-50 pt-4">
                            <span class="text-slate-400 text-[10px] font-semibold">
                                <?php echo get_the_date('d M, Y'); ?>
                            </span>
                            <a href="<?php the_permalink(); ?>" class="text-blue-600 font-bold text-[11px] flex items-center gap-1 group-hover:text-blue-800">Ler artigo &rarr;</a>
                        </div>
                    </div>
                </article>
            <?php 
                endwhile; 
            else : 
            ?>
                <div class="col-span-full text-center py-16 bg-white rounded-3xl border border-slate-100">
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Nenhum artigo encontrado</h3>
                </div>
            <?php endif; ?>
        </div>

        <div class="flex justify-center mb-16" id="paginacao-blog">
            <div class="inline-flex bg-white rounded-xl shadow-sm border border-slate-200 p-1.5 gap-1 font-bold text-sm">
                <?php 
                echo paginate_links(array(
                    'prev_text' => '&larr; Voltar',
                    'next_text' => 'Próxima &rarr;',
                    'type'      => 'plain',
                    'before_page_number' => '<span class="px-3 py-1.5 hover:bg-slate-100 rounded-lg transition-colors text-slate-600 block">',
                    'after_page_number'  => '</span>',
                )); 
                ?>
            </div>
            <style>
                .page-numbers.current .px-3 { background-color: #1e3a8a; color: white; border-radius: 0.5rem; }
                .page-numbers.current .px-3:hover { background-color: #1e3a8a; }
            </style>
        </div>

    </div>

    <section class="bg-blue-50 py-16 border-t border-blue-100">
        <div class="container mx-auto px-6 max-w-3xl text-center">
            <div class="w-12 h-12 bg-white shadow-sm rounded-xl flex items-center justify-center mx-auto mb-4 text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <h2 class="text-2xl font-extrabold text-slate-900 mb-3">Inscreva-se em nossa newsletter</h2>
            <p class="text-slate-600 text-sm mb-6">
                Acesse, em primeira mão, nossos principais artigos e materiais educativos diretamente no seu e-mail.
            </p>
            
           <form id="form-newsletter" class="flex flex-col sm:flex-row gap-3 max-w-xl mx-auto mb-4" onsubmit="assinarNewsletter(event)">
                <input type="email" id="email_newsletter" placeholder="Seu melhor e-mail corporativo" required class="flex-grow px-5 py-3 rounded-lg border border-slate-200 focus:outline-none focus:border-blue-500 text-sm">
                <button type="submit" id="btn_newsletter" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-lg transition-colors text-sm shadow-md">
                    Cadastre-se!
                </button>
            </form>
            <p id="msg_newsletter" class="hidden text-green-600 font-bold text-sm mt-2 transition-all">
                <span class="inline-flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                    Inscrição realizada com sucesso!
                </span>
            </p>
        </div>
    </section>

</main>
<script>

function assinarNewsletter(e) {
    e.preventDefault();
    
    const btn = document.getElementById('btn_newsletter');
    const email = document.getElementById('email_newsletter').value;
    const msg = document.getElementById('msg_newsletter');

    btn.disabled = true;
    btn.innerHTML = 'Enviando...';

    // Monta os dados para o AJAX
    const dados = new URLSearchParams({
        action: 'registrar_newsletter_rd',
        email: email
    });

    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: dados
    }).finally(() => {
        // Feedback visual para o usuário
        btn.innerHTML = 'Cadastrado!';
        btn.classList.replace('bg-blue-600', 'bg-green-600');
        btn.classList.replace('hover:bg-blue-700', 'hover:bg-green-700');
        msg.classList.remove('hidden');
        document.getElementById('email_newsletter').value = ''; // Limpa o campo
    });
}

document.addEventListener('DOMContentLoaded', function() {
    const botoesFiltro = document.querySelectorAll('.btn-filtro');
    const formBusca = document.getElementById('form-busca-blog');
    const inputBusca = document.getElementById('input-busca-blog');
    const postsGrid = document.getElementById('posts-grid');
    const paginacao = document.getElementById('paginacao-blog');
    const ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';

    // Função central para chamar os posts
    function buscarPosts(categoriaID, termoBusca = '') {
        // Coloca um "Spinner" de carregamento
        postsGrid.innerHTML = `
            <div class="col-span-1 md:col-span-3 flex justify-center items-center py-20">
                <svg class="animate-spin h-10 w-10 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
            </div>
        `;
        
        if(paginacao) paginacao.style.display = 'none';

        const formData = new FormData();
        formData.append('action', 'filtrar_posts_blog');
        formData.append('categoria', categoriaID);
        formData.append('busca', termoBusca); // Envia o texto da busca

        fetch(ajaxUrl, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(html => {
            postsGrid.innerHTML = html;
        });
    }

    // Evento 1: Clique nos botões de Categoria
    botoesFiltro.forEach(botao => {
        botao.addEventListener('click', function() {
            botoesFiltro.forEach(b => {
                b.classList.remove('bg-slate-800', 'text-white');
                b.classList.add('bg-white', 'text-slate-600');
            });
            this.classList.remove('bg-white', 'text-slate-600');
            this.classList.add('bg-slate-800', 'text-white');

            // Limpa o campo de busca quando clica em categoria
            if(inputBusca) inputBusca.value = '';

            const categoriaID = this.getAttribute('data-categoria');
            buscarPosts(categoriaID, '');
        });
    });

    // Evento 2: Envio do Formulário de Busca
    if(formBusca) {
        formBusca.addEventListener('submit', function(e) {
            e.preventDefault(); // Impede a página de recarregar
            
            const termo = inputBusca.value;
            
            // Reseta a cor dos botões para "Todos"
            botoesFiltro.forEach(b => {
                b.classList.remove('bg-slate-800', 'text-white');
                b.classList.add('bg-white', 'text-slate-600');
            });
            document.querySelector('[data-categoria="all"]').classList.add('bg-slate-800', 'text-white');

            buscarPosts('all', termo);
            
            // Rola a tela suavemente para a grade de posts
            postsGrid.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    }
});
</script>

<?php get_footer(); ?>