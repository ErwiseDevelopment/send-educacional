<?php
// Evita acesso direto
if (!defined('ABSPATH')) exit;

// ========================================================
// MÓDULOS DO TEMA (métricas + atualização via Git)
// ========================================================
require_once get_template_directory() . '/inc/tracking.php';

/* -------------------------------------------------------------------------
 * Auto-update do tema via GitHub (plugin-update-checker) — mesmo esquema do
 * tema salvatorianos. Suba um commit na branch `main` com a "Version" do
 * style.css maior que a instalada e o WordPress mostra o aviso de atualização
 * em 1 clique (Painel > Atualizações). Repo privado: precisa da constante
 * MEU_GH_TOKEN definida no wp-config.php.
 * ---------------------------------------------------------------------- */
$send_puc_loader = get_template_directory() . '/plugin-update-checker/plugin-update-checker.php';
if ( is_readable( $send_puc_loader ) ) {
	require $send_puc_loader;

	$send_theme_slug = basename( get_template_directory() ); // send-educacional

	$send_update_checker = \YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker(
		'https://github.com/ErwiseDevelopment/' . $send_theme_slug . '/',
		get_template_directory() . '/functions.php',
		$send_theme_slug,
		1
	);
	$send_update_checker->setBranch( 'main' );

	if ( defined( 'MEU_GH_TOKEN' ) && MEU_GH_TOKEN ) {
		$send_update_checker->setAuthentication( MEU_GH_TOKEN );
	}

	foreach ( array( 'load-update-core.php', 'load-themes.php' ) as $send_puc_hook ) {
		add_action( $send_puc_hook, array( $send_update_checker, 'checkForUpdates' ) );
	}

	unset( $send_puc_loader, $send_theme_slug, $send_puc_hook );
}

function send_educacional_setup() {
    // Adiciona suporte a tag <title> e imagens destacadas
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // Registra posições de menu no painel do WordPress
    register_nav_menus(array(
        'menu-principal' => 'Menu Principal',
        'menu-rodape' => 'Menu Rodapé'
    ));
}
add_action('after_setup_theme', 'send_educacional_setup');

function send_educacional_scripts() {
    // Carrega a fonte Inter
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap', false);
    
    // Carrega o CSS principal gerado pelo Tailwind (style.css na raiz)
    wp_enqueue_style('send-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'send_educacional_scripts');

// Adiciona classes do Tailwind nas <li> do menu
function send_adicionar_classes_li_menu($classes, $item, $args) {
    if($args->theme_location == 'menu-principal') {
        $classes[] = 'group';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'send_adicionar_classes_li_menu', 1, 3);

// Adiciona classes do Tailwind nos <a> do menu
function send_adicionar_classes_a_menu($atts, $item, $args) {
    if($args->theme_location == 'menu-principal') {
        $atts['class'] = 'text-slate-600 hover:text-blue-600 font-semibold text-sm uppercase tracking-wide transition-colors';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'send_adicionar_classes_a_menu', 1, 3);

// ========================================================
// FILTRO AJAX DO BLOG E BUSCA (Mesma tela)
// ========================================================
add_action('wp_ajax_filtrar_posts_blog', 'enviar_posts_filtrados');
add_action('wp_ajax_nopriv_filtrar_posts_blog', 'enviar_posts_filtrados');

function enviar_posts_filtrados() {
    $categoria = isset($_POST['categoria']) ? sanitize_text_field($_POST['categoria']) : 'all';
    $busca = isset($_POST['busca']) ? sanitize_text_field($_POST['busca']) : '';

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 9,
        'post_status'    => 'publish',
    );

    // Adiciona o filtro de categoria se não for "Todos"
    if ($categoria !== 'all') {
        $args['cat'] = intval($categoria);
    }

    // Adiciona o filtro de busca de texto se o usuário digitou algo
    if (!empty($busca)) {
        $args['s'] = $busca;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $cat = get_the_category();
            $nome_categoria = !empty($cat) ? $cat[0]->name : 'Artigo';
            ?>
            <article class="col-span-1 group flex flex-col bg-white rounded-[1.5rem] border border-slate-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all overflow-hidden animate-[fadeIn_0.5s_ease-in-out]">
                <a href="<?php the_permalink(); ?>" class="block w-full h-48 bg-slate-200 overflow-hidden relative">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-700']); ?>
                    <?php endif; ?>
                </a>
                <div class="p-6 flex flex-col flex-grow">
                    <span class="text-blue-600 font-bold uppercase tracking-wider text-[9px] mb-2 block">
                        <?php echo esc_html($nome_categoria); ?>
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
        wp_reset_postdata();
    else :
        ?>
        <div class="col-span-full text-center py-16 bg-white rounded-[1.5rem] border border-slate-100">
            <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-2">Nenhum resultado encontrado</h3>
            <p class="text-slate-500 text-sm">Não encontramos artigos para "<strong><?php echo esc_html($busca); ?></strong>". Tente outras palavras.</p>
        </div>
        <?php
    endif;

    wp_die();
}

function blog_apenas_posts($query) {
    if (!is_admin() && $query->is_main_query() && is_page_template('page-blog.php')) {
        $query->set('post_type', 'post');
    }
}
add_action('pre_get_posts', 'blog_apenas_posts');


function send_reading_time($post_id = null, $wpm = 200) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $content = get_post_field('post_content', $post_id);

    if (!$content) {
        return 'Leitura de 1 min';
    }

    // Remove HTML
    $text = wp_strip_all_tags($content);

    // Conta palavras (funciona bem em PT-BR com acentos)
    $word_count = preg_match_all('/\p{L}+/u', $text, $matches);

    // (Opcional) Conta imagens e adiciona tempo por imagem
    $image_count = substr_count($content, '<img');
    $extra_time_images = ($image_count * 12) / 60; // 12s por imagem

    $minutes = ceil(($word_count / $wpm) + $extra_time_images);
    $minutes = max(1, $minutes);

    return "Leitura de {$minutes} min";
}

add_action('wp_ajax_registrar_lead_crm', 'registrar_lead_crm');
add_action('wp_ajax_nopriv_registrar_lead_crm', 'registrar_lead_crm');

function registrar_lead_crm() {
    $token = '699cbb3b8057d8001d350178'; 

    // 1. Captura os dados (com proteção)
    $nome      = isset($_POST['nome']) ? sanitize_text_field($_POST['nome']) : 'Sem Nome';
    $inst      = isset($_POST['instituicao']) ? sanitize_text_field($_POST['instituicao']) : '';
    $cargo     = isset($_POST['cargo']) ? sanitize_text_field($_POST['cargo']) : '';
    $alunos    = isset($_POST['alunos']) ? sanitize_text_field($_POST['alunos']) : '';
    $whatsapp  = isset($_POST['whatsapp']) ? sanitize_text_field($_POST['whatsapp']) : '';
    $email     = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';

    // 2. Monta o contato de forma inteligente (Só adiciona se não for vazio)
    $contato = [
        'name' => $nome
    ];

    if (!empty($email)) {
        $contato['emails'] = [['email' => $email]];
    }

    if (!empty($whatsapp)) {
        // O SEGREDO: Apenas enviamos o "phone". 
        // Se mandarmos o 'type' => 'whatsapp' a RD dá erro!
        $contato['phones'] = [['phone' => $whatsapp]]; 
    }

    // 3. Monta o corpo para a RD Station
    $body = [
        'token' => $token,
        'deal' => [
            'name' => "Lead Site: " . $inst,
            'deal_custom_fields' => [
                ['custom_field_id' => '699cb33251a49a0014c80b10', 'value' => $cargo],
                ['custom_field_id' => '699cb33c280ca7001a9ef2f2', 'value' => $inst],
                ['custom_field_id' => '699cb35b4121da0017ff3887', 'value' => $alunos]
            ]
        ],
        'contacts' => [$contato] // Passa a nossa variável inteligente
    ];

    $response = wp_remote_post('https://crm.rdstation.com/api/v1/deals', [
        'headers'     => ['Content-Type' => 'application/json'],
        'body'        => json_encode($body),
        'method'      => 'POST',
        'timeout'     => 15,
        'sslverify'   => false // ESSENCIAL para localhost
    ]);

    $code = wp_remote_retrieve_response_code($response);
    
    if ( is_wp_error( $response ) || ($code < 200 || $code > 299) ) {
        wp_send_json_error('Erro na API');
    } else {
        wp_send_json_success();
    }
}


add_action('wp_ajax_registrar_newsletter_rd', 'registrar_newsletter_rd');
add_action('wp_ajax_nopriv_registrar_newsletter_rd', 'registrar_newsletter_rd');

function registrar_newsletter_rd() {
    $api_key = '699cbb3b8057d8001d350178'; // Colocaremos a chave aqui depois
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';

    if (empty($email)) {
        wp_send_json_error('E-mail vazio');
    }

    $body = [
        'event_type'   => 'CONVERSION',
        'event_family' => 'CDP',
        'payload'      => [
            'conversion_identifier' => 'newsletter-blog', // Identificador da Newsletter
            'email'                 => $email
        ]
    ];

    wp_remote_post('https://api.rd.services/platform/conversions?api_key=' . $api_key, [
        'headers'     => ['Content-Type' => 'application/json'],
        'body'        => wp_json_encode($body),
        'method'      => 'POST',
        'timeout'     => 10,
        'sslverify'   => false // Para o Localhost
    ]);

    wp_send_json_success();
}