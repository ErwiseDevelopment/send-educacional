<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" async src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/f6a85af9-2d97-40e4-8ae5-c237e1855b05-loader.js" ></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-gray-50 text-gray-800 font-sans'); ?>>

<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
       <div class="flex flex-col items-start justify-center">
            <a href="<?php echo home_url(); ?>" class="block transition-transform hover:scale-105">
                <img 
                    src="<?php echo home_url('/wp-content/uploads/2026/03/3-1-e1771525969584.png'); ?>" 
                    alt="Send Educacional" 
                    width="473" 
                    height="207" 
                    class="h-12 md:h-14 w-auto object-contain"
                >
            </a>
       </div>
        
        <nav class="hidden md:flex items-center">
            <?php
            wp_nav_menu(array(
                'theme_location'  => 'menu-principal',
                'container'       => false, // Remove a div em volta
                'menu_class'      => 'flex space-x-8', // Classes na <ul>
                'fallback_cb'     => false // Não mostra menu feio se não houver menu criado
            ));
            ?>
        </nav>

        <div class="flex items-center space-x-3 md:space-x-4 relative">
            
            <button onclick="document.getElementById('demo-modal').classList.remove('hidden')" class="hidden md:inline-flex bg-blue-800 hover:bg-blue-900 text-white px-5 py-2.5 rounded-md font-bold text-sm transition-colors shadow-sm">
                Solicitar demonstração
            </button>

            <div class="relative">
                <button id="btn-area-cliente" class="flex items-center gap-2 border-2 border-blue-500 text-blue-600 bg-white hover:bg-blue-50 px-4 py-2 rounded-md font-bold text-sm transition-colors">
                    Área do Cliente
                    <svg class="w-4 h-4 fill-current transform transition-transform duration-200" id="seta-dropdown" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>

                <div id="menu-area-cliente" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-[0_10px_40px_rgba(0,0,0,0.1)] border border-gray-100 z-50 overflow-hidden transform origin-top-right transition-all opacity-0 scale-95">
                    <ul class="py-2 text-sm text-blue-900 font-bold">
                        
                        <div class="border-b border-gray-100 mx-4 my-1"></div>
                        
                        <li>
                            <a href="https://help.sendsolutions.com.br/" class="flex justify-between items-center px-5 py-3 hover:bg-slate-50 transition-colors">
                                Documentação do sistema
                                <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                            </a>
                        </li>
                        
                        <div class="border-b border-gray-100 mx-4 my-1"></div>
                        
                        <li>
                            <a href="https://aplicacao.sendsolutions.com.br/" class="flex justify-between items-center px-5 py-3 hover:bg-slate-50 transition-colors">
                                Suporte
                                <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnAreaCliente = document.getElementById('btn-area-cliente');
    const menuAreaCliente = document.getElementById('menu-area-cliente');
    const setaDropdown = document.getElementById('seta-dropdown');

    if(btnAreaCliente && menuAreaCliente) {
        // Toggle do menu ao clicar no botão
        btnAreaCliente.addEventListener('click', function(e) {
            e.stopPropagation();
            
            // Alterna a visibilidade
            menuAreaCliente.classList.toggle('hidden');
            
            // Pequeno delay para a animação de opacidade funcionar após remover o 'hidden'
            setTimeout(() => {
                menuAreaCliente.classList.toggle('opacity-0');
                menuAreaCliente.classList.toggle('scale-95');
                menuAreaCliente.classList.toggle('opacity-100');
                menuAreaCliente.classList.toggle('scale-100');
            }, 10);

            // Gira a setinha
            setaDropdown.classList.toggle('rotate-180');
        });

        // Fecha o menu se clicar fora dele
        document.addEventListener('click', function(e) {
            if (!btnAreaCliente.contains(e.target) && !menuAreaCliente.contains(e.target)) {
                if (!menuAreaCliente.classList.contains('hidden')) {
                    menuAreaCliente.classList.add('opacity-0', 'scale-95');
                    menuAreaCliente.classList.remove('opacity-100', 'scale-100');
                    setaDropdown.classList.remove('rotate-180');
                    
                    // Espera a animação terminar para aplicar o display:none
                    setTimeout(() => {
                        menuAreaCliente.classList.add('hidden');
                    }, 200);
                }
            }
        });
    }
});
</script>