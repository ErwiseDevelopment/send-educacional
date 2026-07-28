<?php
/*
Template Name: Sobre Nós - Send Solutions
*/
get_header(); ?>

<main class="min-h-screen">

    <section class="sup-escura pt-32 pb-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#3a3b58 1px, transparent 1px); background-size: 32px 32px;"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-600/20 blur-[120px] rounded-full"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/20 txt-link text-[11px] font-bold mb-8 uppercase tracking-[0.2em]">
                Desde 1994 transformando processos
            </div>
            <h1 class="reveal text-5xl md:text-7xl font-black txt-forte mb-8 tracking-tighter leading-tight">
                Experiência que gera <br>
                <span class="gtext">resultados reais.</span>
            </h1>
            <p class="text-xl txt max-w-3xl mx-auto leading-relaxed font-light">
                Há mais de 30 anos, a Send Solutions desenvolve sistemas robustos para indústrias, comércios e serviços. Hoje, aplicamos toda essa bagagem para revolucionar a gestão educacional.
            </p>
        </div>
    </section>

    <section class="py-24 overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-20">
                <div class="w-full lg:w-1/2 relative">
                    <div class="absolute -top-10 -left-10 w-40 h-40 bg-blue-600/10 rounded-full -z-10"></div>
                    <?php
                    // Numa página que fala de três décadas de história, foto de banco
                    // de imagem trabalha contra o argumento. Se o cliente subir a foto
                    // real do time no Personalizar, ela entra aqui; enquanto não subir,
                    // mostramos a linha do tempo, nunca um escritório genérico.
                    $sobre_foto = se_foto_time_id();
                    if ( $sobre_foto ) : ?>
                        <div class="relative z-10 rounded-[3rem] overflow-hidden cardring">
                            <?php echo wp_get_attachment_image( $sobre_foto, 'large', false, array(
                                'class' => 'w-full h-auto transform hover:scale-105 transition-transform duration-700',
                                'alt'   => 'Time da Send Solutions',
                            ) ); ?>
                        </div>
                    <?php else : ?>
                        <div class="relative z-10 glass rounded-[3rem] p-10 cardring">
                            <p class="text-xs font-bold uppercase tracking-widest txt-link mb-8">A linha do tempo</p>
                            <ol class="space-y-7 relative">
                                <span class="absolute left-[13px] top-2 bottom-2 w-px bg-gradient-to-b from-blue-500/50 to-violet-500/20" aria-hidden="true"></span>
                                <?php foreach ( array(
                                    array( '1994', 'Nasce a Send Solutions', 'Sistemas de gestão para indústria, comércio e serviços.' ),
                                    array( '2019', 'A Send entra em educação', 'A bagagem de ERP passa a ser aplicada à gestão de instituições de ensino.' ),
                                    array( 'Hoje', 'Três segmentos atendidos', 'Ensino superior, educação básica e média, e cursos com venda online.' ),
                                ) as $marco ) {
                                    printf(
                                        '<li class="relative pl-12">
                                            <span class="absolute left-0 top-0.5 w-7 h-7 rounded-full igrad ring-4 ring-[#050741]"></span>
                                            <span class="block text-2xl font-extrabold gtext leading-none">%s</span>
                                            <span class="block font-bold txt-forte mt-2">%s</span>
                                            <span class="block txt text-sm leading-relaxed mt-1">%s</span>
                                        </li>',
                                        esc_html( $marco[0] ), esc_html( $marco[1] ), esc_html( $marco[2] )
                                    );
                                } ?>
                            </ol>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="w-full lg:w-1/2">
                    <h2 class="reveal text-4xl font-extrabold txt-forte mb-6 tracking-tight">O Próximo Passo: <br><span class="gtext">Send Educacional</span></h2>
                    <div class="space-y-6 txt text-lg leading-relaxed">
                        <p>Ao longo das décadas, fornecemos informações gerenciais para empresas de vários portes, focando em rentabilidade e controle. Em <strong>2019</strong>, decidimos levar essa inteligência para o setor de ensino.</p>
                        <p>O <strong>Send Educacional</strong> nasceu não apenas como um software, mas como um sistema de gestão completo. Unificamos o ERP Acadêmico com consultoria personalizada para garantir que cada instituição receba exatamente o que precisa.</p>

                        <div class="glass flex items-center gap-6 p-6 rounded-3xl mt-8">
                            <div class="gbtn txt-forte p-4 rounded-2xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold txt-forte text-sm uppercase">Implantação Consultiva</h4>
                                <p class="text-sm txt leading-tight">Levantamento de processos real antes de qualquer configuração.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 relative">
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div class="glass glass-hover reveal p-10 rounded-[2.5rem] group hover:-translate-y-2 transition-all duration-300">
                    <div class="w-14 h-14 bg-bloco border linha txt-link rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold txt-forte mb-4">Missão</h3>
                    <p class="txt text-sm leading-relaxed">Transformar o cenário educacional através de tecnologias avançadas, fornecendo ferramentas que garantam a evolução contínua das instituições.</p>
                </div>

                <div class="glass glass-hover reveal p-10 rounded-[2.5rem] group hover:-translate-y-2 transition-all duration-300">
                    <div class="w-14 h-14 bg-bloco border linha txt-link rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold txt-forte mb-4">Visão</h3>
                    <p class="txt text-sm leading-relaxed">Ser o sistema de gestão de referência no Brasil, reconhecido pela robustez técnica e pelo atendimento humano e dedicado.</p>
                </div>

                <div class="glass glass-hover reveal p-10 rounded-[2.5rem] group hover:-translate-y-2 transition-all duration-300">
                    <div class="w-14 h-14 bg-bloco border linha txt-link rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold txt-forte mb-4">Valores</h3>
                    <p class="txt text-sm leading-relaxed">Ética, comprometimento com o cliente, inovação tecnológica constante e foco absoluto em resultados operacionais.</p>
                </div>

            </div>
        </div>

        <div class="container mx-auto px-6 py-24 text-center">
            <h2 class="reveal text-3xl font-bold txt-forte mb-6">Pronto para transformar sua instituição?</h2>
            <button onclick="abrirDemo()" class="gbtn txt-forte px-10 py-4 rounded-2xl font-bold text-lg transition-all hover:scale-105">
                Solicitar Demonstração Gratuita
            </button>
        </div>
    </section>

</main>

<?php get_footer(); ?>