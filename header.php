<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" async src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/f6a85af9-2d97-40e4-8ae5-c237e1855b05-loader.js" ></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-[#070b18] text-slate-200 font-sans antialiased'); ?>>

<?php $se_home = is_front_page(); ?>
<header id="se-header" class="<?php echo $se_home ? 'absolute top-0 left-0 right-0 z-50' : 'sticky top-0 z-50 bg-[#070b18]/85 backdrop-blur-md border-b border-white/10'; ?>">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center gap-4">
       <div class="flex flex-col items-start justify-center shrink-0">
            <a href="<?php echo home_url(); ?>" class="flex items-center gap-2.5 transition-transform hover:scale-105">
                <img src="<?php echo esc_url( se_logo_url() ); ?>" alt="Send Educacional"<?php echo se_logo_dimensoes_attr(); ?> class="se-logo w-auto object-contain">
            </a>
       </div>

        <?php // Mega menu: a estrutura mora em inc/menu.php, não no Aparência > Menus. ?>
        <?php se_menu_barra_desktop(); ?>

        <div class="flex items-center space-x-3 md:space-x-4 relative shrink-0">

            <?php // Abaixo de lg o menu vira botão: sem ele, os segmentos ficariam inalcançáveis no celular. ?>
            <button id="btn-menu-mobile" class="lg:hidden text-slate-200 hover:text-white p-2 -ml-2" aria-label="Abrir menu" aria-expanded="false" aria-controls="menu-mobile">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16"></path></svg>
            </button>

            <button onclick="abrirDemo()" class="hidden md:inline-flex bg-blue-800 hover:bg-blue-900 text-white px-5 py-2.5 rounded-md font-bold text-sm transition-colors shadow-sm">
                Solicitar demonstração
            </button>

            <?php // Abaixo de sm o botão sai da barra e reaparece dentro do menu: senão a linha não cabe em 390px. ?>
            <div class="relative hidden sm:block">
                <button id="btn-area-cliente" class="flex items-center gap-2 border-2 border-blue-500 text-blue-600 bg-white hover:bg-blue-50 px-4 py-2 rounded-md font-bold text-sm transition-colors">
                    Área do Cliente
                    <svg class="w-4 h-4 fill-current transform transition-transform duration-200" id="seta-dropdown" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>

                <div id="menu-area-cliente" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-[0_10px_40px_rgba(0,0,0,0.1)] border border-gray-100 z-50 overflow-hidden transform origin-top-right transition-all opacity-0 scale-95">
                    <ul class="py-2 text-sm text-blue-900 font-bold">
                        
                        <div class="border-b border-gray-100 mx-4 my-1"></div>
                        
                        <li>
                            <a href="https://help.sendsolutions.com.br/"  target="_blank" class="flex justify-between items-center px-5 py-3 hover:bg-slate-50 transition-colors">
                                Documentação do sistema
                                <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                            </a>
                        </li>
                        
                        <div class="border-b border-gray-100 mx-4 my-1"></div>
                        
                        <li>
                            <a href="https://aplicacao.sendsolutions.com.br/TimeSheet/timesheet.login.aspx" class="flex justify-between items-center px-5 py-3 hover:bg-slate-50 transition-colors">
                                Suporte
                                <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php se_menu_paineis_desktop(); ?>

    <div id="menu-mobile" class="hidden lg:hidden border-t border-white/10 bg-[#070b18] se-menu-mobile-rolagem">
        <div class="container mx-auto px-6 py-5">
            <?php se_menu_mobile(); ?>
            <button onclick="abrirDemo()" class="mt-5 w-full gbtn text-white font-bold px-5 py-3.5 rounded-xl text-sm">
                Solicitar demonstração
            </button>

            <div class="sm:hidden mt-5 pt-5 border-t border-white/10">
                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-3">Área do Cliente</p>
                <a href="https://help.sendsolutions.com.br/" target="_blank" rel="noopener" class="block py-2 text-sm font-semibold text-slate-300 hover:text-white transition-colors">Documentação do sistema</a>
                <a href="https://aplicacao.sendsolutions.com.br/TimeSheet/timesheet.login.aspx" class="block py-2 text-sm font-semibold text-slate-300 hover:text-white transition-colors">Suporte</a>
            </div>
        </div>
    </div>
</header>
<script>
document.addEventListener('DOMContentLoaded', function() {

    /* ============ MEGA MENU ============
       Abre no hover em quem tem mouse e no clique em todo mundo — quem navega
       por toque ou teclado não fica sem acesso. */
    var header   = document.getElementById('se-header');
    var gatilhos = Array.prototype.slice.call(document.querySelectorAll('.se-mega-btn'));
    var paineis  = Array.prototype.slice.call(document.querySelectorAll('.se-mega-painel'));
    var temMouse = window.matchMedia('(hover:hover) and (pointer:fine)').matches;
    var abertoEm = null;
    var timerFechar = null;

    function painelDe(chave) {
        return document.querySelector('.se-mega-painel[data-painel="' + chave + '"]');
    }

    function fecharMega() {
        paineis.forEach(function (p) { p.classList.add('hidden'); });
        gatilhos.forEach(function (b) {
            b.setAttribute('aria-expanded', 'false');
            b.classList.remove('se-nav-ativo');
        });
        abertoEm = null;
        if (header) header.classList.remove('se-header-solido');
    }

    function abrirMega(chave) {
        clearTimeout(timerFechar);
        if (abertoEm === chave) return;
        fecharMega();
        var painel = painelDe(chave);
        if (!painel) return;
        painel.classList.remove('hidden');
        gatilhos.forEach(function (b) {
            if (b.getAttribute('data-mega') === chave) {
                b.setAttribute('aria-expanded', 'true');
                b.classList.add('se-nav-ativo');
            }
        });
        abertoEm = chave;
        if (header) header.classList.add('se-header-solido');
    }

    gatilhos.forEach(function (btn) {
        var chave = btn.getAttribute('data-mega');

        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            if (abertoEm === chave) { fecharMega(); } else { abrirMega(chave); }
        });

        if (temMouse) {
            btn.addEventListener('mouseenter', function () { abrirMega(chave); });
        }
        // Teclado: chegar no item já mostra o painel correspondente.
        btn.addEventListener('focus', function () { abrirMega(chave); });
    });

    if (temMouse && header) {
        // Um respiro antes de fechar: o ponteiro passa por fora ao descer da
        // barra para o painel, e fechar na hora deixaria o menu inalcançável.
        header.addEventListener('mouseleave', function () {
            timerFechar = setTimeout(fecharMega, 180);
        });
        header.addEventListener('mouseenter', function () { clearTimeout(timerFechar); });
    }

    document.addEventListener('click', function (e) {
        if (abertoEm && header && !header.contains(e.target)) fecharMega();
    });

    document.addEventListener('keydown', function (e) {
        if (e.key !== 'Escape' || !abertoEm) return;
        var chave = abertoEm;
        fecharMega();
        var btn = document.querySelector('.se-mega-btn[data-mega="' + chave + '"]');
        if (btn) btn.focus();
    });

    // Troca de aba dentro do painel (a coluna da esquerda).
    document.querySelectorAll('.se-mega-painel').forEach(function (painel) {
        var abas = Array.prototype.slice.call(painel.querySelectorAll('.se-aba'));

        function selecionar(chave) {
            abas.forEach(function (a) {
                var ativa = a.getAttribute('data-aba') === chave;
                a.classList.toggle('se-aba-ativa', ativa);
                a.setAttribute('aria-selected', ativa ? 'true' : 'false');
            });
            painel.querySelectorAll('.se-pane').forEach(function (p) {
                p.classList.toggle('hidden', p.getAttribute('data-pane') !== chave);
            });
        }

        abas.forEach(function (aba, i) {
            var chave = aba.getAttribute('data-aba');
            aba.addEventListener('mouseenter', function () { selecionar(chave); });
            aba.addEventListener('focus', function () { selecionar(chave); });
            aba.addEventListener('click', function (e) { e.preventDefault(); selecionar(chave); });
            aba.addEventListener('keydown', function (e) {
                if (e.key !== 'ArrowDown' && e.key !== 'ArrowUp') return;
                e.preventDefault();
                var proxima = abas[(i + (e.key === 'ArrowDown' ? 1 : abas.length - 1)) % abas.length];
                if (proxima) proxima.focus();
            });
        });
    });

    /* ============ MENU DO CELULAR ============ */
    var btnMenuMobile = document.getElementById('btn-menu-mobile');
    var menuMobile = document.getElementById('menu-mobile');
    if (btnMenuMobile && menuMobile) {
        btnMenuMobile.addEventListener('click', function () {
            var aberto = !menuMobile.classList.toggle('hidden');
            btnMenuMobile.setAttribute('aria-expanded', aberto ? 'true' : 'false');
        });
    }

    document.querySelectorAll('.se-acc-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var painel = btn.nextElementSibling;
            if (!painel) return;
            var aberto = !painel.classList.toggle('hidden');
            btn.setAttribute('aria-expanded', aberto ? 'true' : 'false');
            btn.classList.toggle('se-acc-aberto', aberto);
        });
    });

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