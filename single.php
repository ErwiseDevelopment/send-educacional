<?php 
// single.php - Template para Posts Individuais do Blog
get_header(); 
?>

<main class="bg-slate-50 min-h-screen pb-20">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <section class="pt-32 pb-12 bg-white border-b border-slate-100">
        <div class="container mx-auto px-6 max-w-4xl text-center">
            
            <div class="mb-6 inline-flex">
                <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                    <?php 
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo esc_html( $categories[0]->name );   
                    } else {
                        echo 'Blog';
                    }
                    ?>
                </span>
            </div>

            <h1 class="text-3xl md:text-5xl font-extrabold text-slate-900 mb-6 leading-tight tracking-tight">
                <?php the_title(); ?>
            </h1>

            <div class="flex items-center justify-center gap-4 text-slate-500 text-sm font-medium">
                <div class="flex items-center gap-2">
                    <?php echo get_avatar( get_the_author_meta('ID'), 40, '', '', ['class' => 'w-10 h-10 rounded-full'] ); ?>
                    <span class="text-slate-900 font-bold">
                        <?php echo esc_html( get_the_author_meta('nickname') ); ?>
                    </span>
                 </span>
                </div>
                <span>•</span>
                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('d \d\e F \d\e Y'); ?></time>
                <span>•</span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <?php echo esc_html(send_reading_time()); ?>

                </span>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="flex flex-col lg:flex-row gap-12">
                
                <article class="w-full lg:w-2/3">
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="mb-12 rounded-[2rem] overflow-hidden shadow-xl shadow-slate-200/50">
                            <?php the_post_thumbnail('large', ['class' => 'w-full h-auto md:h-[450px] object-cover hover:scale-105 transition-transform duration-700']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="prose prose-lg prose-slate max-w-none prose-headings:font-bold prose-headings:text-slate-900 prose-a:text-blue-600 hover:prose-a:text-blue-500 prose-img:rounded-2xl">
                        <?php the_content(); ?>
                    </div>

                    <div class="mt-12 pt-8 border-t border-slate-200 flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="flex flex-wrap gap-2">
                            <?php 
                            $post_tags = get_the_tags();
                            if ( $post_tags ) {
                                foreach( $post_tags as $tag ) {
                                    echo '<a href="' . get_tag_link($tag->term_id) . '" class="bg-slate-100 text-slate-500 px-3 py-1 rounded-md text-sm font-semibold hover:bg-slate-200 transition-colors">#' . $tag->name . '</a>';
                                }
                            }
                            ?>
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <span class="text-sm font-bold text-slate-400 uppercase tracking-widest">Compartilhe</span>
                            <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>" target="_blank" class="w-10 h-10 bg-green-50 text-green-600 rounded-full flex items-center justify-center hover:bg-green-500 hover:text-white transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg></a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                        </div>
                    </div>
                </article>

                <aside class="w-full lg:w-1/3">
                    <div class="sticky top-32 space-y-6">
                        
                        <div class="bg-gradient-to-br from-blue-700 to-indigo-900 rounded-[2rem] p-8 text-white shadow-2xl shadow-blue-900/20 relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -mr-10 -mt-10"></div>
                            
                            <h3 class="text-2xl font-extrabold mb-3 leading-tight">Gostou desse conteúdo?</h3>
                            <p class="text-blue-100 mb-6 text-sm leading-relaxed">
                                Descubra como o <strong class="text-white">Send Educacional</strong> pode automatizar a gestão da sua escola e reduzir a inadimplência hoje mesmo.
                            </p>
                            
                            <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="w-full bg-white text-blue-900 font-bold py-4 rounded-xl hover:bg-blue-50 transition-colors shadow-lg flex justify-center items-center gap-2">
                                Agendar Demonstração <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                            
                            <p class="text-[10px] text-blue-200 text-center uppercase tracking-widest font-bold mt-4">100% Gratuito e sem compromisso</p>
                        </div>

                        

                    </div>
                </aside>

            </div>
        </div>
    </section>

    <section class="container mx-auto px-6 max-w-6xl mt-10">
        <div class="bg-blue-50 rounded-[3rem] p-10 md:p-16 border border-blue-100 flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Pronto para o próximo passo?</h2>
                <p class="text-slate-600 text-lg">Pare de perder tempo com processos manuais. Fale com nossos consultores.</p>
            </div>
            <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="flex-shrink-0 bg-blue-600 text-white px-10 py-5 rounded-2xl font-bold text-lg hover:bg-blue-700 transition-transform hover:-translate-y-1 shadow-xl shadow-blue-500/30">
                Falar com Especialista
            </button>
        </div>
    </section>

    <section class="container mx-auto px-6 max-w-6xl mt-24">
        <h3 class="text-2xl font-bold text-slate-900 mb-8 border-b border-slate-200 pb-4">Continue lendo</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            // Busca 3 posts da mesma categoria
            $related = new WP_Query([
                'category__in'   => wp_get_post_categories($post->ID),
                'posts_per_page' => 3,
                'post__not_in'   => [$post->ID]
            ]);

            if( $related->have_posts() ) { 
                while( $related->have_posts() ) { 
                    $related->the_post(); 
            ?>
                <a href="<?php the_permalink(); ?>" class="group block">
                    <div class="rounded-2xl overflow-hidden mb-4 bg-slate-200 aspect-[16/10]">
                        <?php if(has_post_thumbnail()) {
                            the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-500']);
                        } ?>
                    </div>
                    <span class="text-blue-600 text-xs font-bold uppercase tracking-wider mb-2 block">
                        <?php $cats = get_the_category(); echo $cats[0]->name; ?>
                    </span>
                    <h4 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug mb-2">
                        <?php the_title(); ?>
                    </h4>
                    <p class="text-sm text-slate-500 line-clamp-2">
                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                    </p>
                </a>
            <?php 
                }
                wp_reset_postdata();
            } 
            ?>
        </div>
    </section>

    <?php endwhile; endif; ?>

</main>

<style>
    .prose h2 { font-size: 2rem; font-weight: 800; margin-top: 2.5rem; margin-bottom: 1rem; color: #0f172a; }
    .prose h3 { font-size: 1.5rem; font-weight: 700; margin-top: 2rem; margin-bottom: 1rem; color: #1e293b; }
    .prose p { margin-bottom: 1.5rem; line-height: 1.8; color: #475569; font-size: 1.125rem; }
    .prose ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.5rem; color: #475569; font-size: 1.125rem; }
    .prose li { margin-bottom: 0.5rem; }
    .prose blockquote { border-left: 4px solid #2563eb; padding-left: 1.5rem; font-style: italic; color: #64748b; margin: 2rem 0; font-size: 1.25rem; }
    .prose img { border-radius: 1rem; margin: 2rem auto; box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1); }
    
    /* NOVA REGRA PARA LINKS: Deixa o texto azul, em negrito e com sublinhado ao passar o mouse */
    .prose a { color: #2563eb; font-weight: 600; text-decoration: none; transition: color 0.2s ease-in-out; }
    .prose a:hover { color: #1d4ed8; text-decoration: underline; }
</style>

<?php get_footer(); ?>