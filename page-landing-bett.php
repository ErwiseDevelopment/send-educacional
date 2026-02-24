<?php
/**
 * Template Name: LP Bett Educar (Premium Bento Grid)
 * Description: Landing page de alta conversão, design Apple/SaaS, focada em visitantes da feira.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piloto Automático | Send Educacional</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-brand-dark { background-color: #0c1126; }
        .bg-dots-light { background-image: radial-gradient(#cbd5e1 1px, transparent 1px); background-size: 24px 24px; }
        
        /* Glassmorphism premium */
        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
    </style>
    
    <?php wp_head(); ?>
</head>
<body class="bg-slate-50 text-slate-800 antialiased relative overflow-x-hidden">

    <div class="fixed inset-0 bg-dots-light opacity-60 pointer-events-none z-0"></div>
    <div class="absolute top-[-10%] left-1/2 -translate-x-1/2 w-[1000px] h-[600px] bg-gradient-to-r from-blue-400/20 via-indigo-400/20 to-fuchsia-400/20 blur-[120px] rounded-full pointer-events-none z-0"></div>

    <header class="fixed top-0 w-full z-50 glass-panel border-b border-slate-200/50 transition-all duration-300">
        <div class="max-w-6xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-xl flex items-center justify-center text-white font-black text-xl shadow-lg">S</div>
                <span class="text-2xl font-black tracking-widest uppercase text-slate-900">Send</span>
            </div>
            <div class="hidden md:flex items-center gap-6">
                <a href="https://wa.me/5511937049755" target="_blank" class="text-sm font-bold text-slate-500 hover:text-blue-600 transition">Dúvidas? Chame no WhatsApp</a>
                <a href="#agendar" class="bg-slate-900 hover:bg-black text-white px-6 py-2.5 rounded-full font-bold text-sm shadow-lg transition-transform hover:-translate-y-0.5">Agendar Reunião</a>
            </div>
        </div>
    </header>

    <main class="relative z-10 pt-32">
        <section class="max-w-5xl mx-auto px-6 pt-12 pb-16 text-center">
            <div class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-white border border-blue-100 text-blue-700 text-xs font-bold tracking-widest uppercase mb-8 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                Bem-vindo, Visitante Bett Educar
            </div>
            
            <h1 class="text-5xl md:text-7xl font-black text-slate-900 leading-[1.1] mb-6 tracking-tight">
                A sua instituição <br class="hidden md:block">no <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-fuchsia-600">Piloto Automático.</span>
            </h1>
            
            <p class="text-lg md:text-xl text-slate-500 mb-10 max-w-3xl mx-auto leading-relaxed font-medium">
                O ecossistema definitivo que cruza dados, prevê a evasão escolar com IA e automatiza suas secretarias acadêmica e financeira.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#agendar" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-black text-lg py-4 px-10 rounded-full shadow-[0_10px_20px_-10px_rgba(37,99,235,0.6)] hover:shadow-[0_15px_30px_-10px_rgba(37,99,235,0.8)] hover:-translate-y-1 transition-all duration-300">
                    DIAGNÓSTICO GRATUITO
                </a>
                <a href="#sistema" class="w-full sm:w-auto bg-white border-2 border-slate-200 hover:border-slate-300 text-slate-700 font-bold text-lg py-3.5 px-8 rounded-full transition-all duration-300">
                    Ver como funciona
                </a>
            </div>
        </section>

        <section id="sistema" class="max-w-5xl mx-auto px-6 pb-20">
            <div class="bg-white/80 p-3 rounded-[2rem] shadow-2xl border border-slate-200 relative transform rotate-[-1deg] hover:rotate-0 transition-transform duration-500">
                <div class="bg-slate-900 rounded-[1.5rem] overflow-hidden relative group">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dashboard-mockup.png" alt="Dashboard de Retenção Send" class="w-full h-auto object-cover opacity-90 group-hover:opacity-100 transition-opacity">
                    
                    <div class="absolute bottom-0 w-full h-32 bg-gradient-to-t from-slate-900 to-transparent flex items-end justify-center pb-6">
                        <p class="text-white font-bold text-sm bg-slate-900/50 backdrop-blur px-6 py-2 rounded-full border border-slate-700">
                            Dashboard de Retenção e Alertas de IA
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-wrap justify-center gap-x-12 gap-y-6 mt-12 pt-10 border-t border-slate-200/60">
                <div class="text-center">
                    <div class="text-3xl font-black text-slate-800">+30</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-1">Anos de Mercado</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-black text-slate-800">+3.000</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-1">Alunos Processados</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-black text-emerald-600">100%</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-1">Nível de Aprovação</div>
                </div>
            </div>
        </section>

        <section class="max-w-6xl mx-auto px-6 pb-24">
            <div class="text-center mb-16">
                <span class="text-fuchsia-600 font-black text-sm tracking-widest uppercase mb-2 block">O Motor Operacional</span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900">Muito mais do que imprimir boletos.</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="md:col-span-2 bg-gradient-to-br from-slate-900 to-blue-950 p-8 rounded-3xl shadow-lg relative overflow-hidden text-white group">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/20 blur-3xl rounded-full"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-blue-600/30 rounded-xl flex items-center justify-center text-2xl mb-6 border border-blue-500/50">🧠</div>
                        <h3 class="text-2xl font-black mb-3">Retenção Preditiva com IA</h3>
                        <p class="text-slate-300 font-medium leading-relaxed max-w-md mb-8">
                            A evasão é silenciosa. Nosso algoritmo cruza faltas, notas e acessos ao AVA para gerar alertas de risco <strong>antes</strong> que o aluno desista do curso. Salve matrículas ativamente.
                        </p>
                        <div class="inline-flex items-center gap-3 bg-emerald-500/20 text-emerald-400 font-bold px-4 py-2 rounded-full text-sm border border-emerald-500/30">
                            ↓ Redução de até 40% na Inadimplência
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-200 hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-2xl mb-6">💳</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Financeiro Automático</h3>
                    <p class="text-sm text-slate-600 font-medium leading-relaxed mb-6">
                        Régua de cobrança automatizada, portal self-service para renegociação de dívidas, conciliação PIX imediata e emissão de NF-e.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-200 hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-2xl mb-6">🎓</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Acadêmico & MEC</h3>
                    <p class="text-sm text-slate-600 font-medium leading-relaxed">
                        Gerencie a burocracia pesada num clique. Emissão de Diploma Digital, diários eletrônicos e geração instantânea do Arquivo Censo INEP e ENADE.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-200 hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center text-2xl mb-6">📱</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Portais e App Mobile</h3>
                    <p class="text-sm text-slate-600 font-medium leading-relaxed">
                        A escola na palma da mão. Alunos e professores acessam notas, boletos e abrem requerimentos (SLA) de qualquer lugar, reduzindo filas na secretaria.
                    </p>
                </div>

                <div class="bg-slate-100 p-8 rounded-3xl shadow-inner border border-slate-200 flex flex-col justify-center">
                    <h3 class="text-lg font-black text-slate-800 mb-4">Hub de Conexões Nativo</h3>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-white py-3 px-2 rounded-lg text-center text-[10px] font-bold text-slate-600 uppercase shadow-sm border border-slate-200">Moodle AVA</div>
                        <div class="bg-white py-3 px-2 rounded-lg text-center text-[10px] font-bold text-slate-600 uppercase shadow-sm border border-slate-200">PIX Getnet</div>
                        <div class="bg-white py-3 px-2 rounded-lg text-center text-[10px] font-bold text-slate-600 uppercase shadow-sm border border-slate-200">Acervo Digital</div>
                        <div class="bg-white py-3 px-2 rounded-lg text-center text-[10px] font-bold text-slate-600 uppercase shadow-sm border border-slate-200">CRM Dynamics</div>
                    </div>
                </div>

            </div>
        </section>

        <section id="agendar" class="bg-brand-dark py-24 px-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/10 blur-[100px] rounded-full pointer-events-none"></div>

            <div class="max-w-5xl mx-auto flex flex-col lg:flex-row gap-16 items-center relative z-10">
                
                <div class="flex-1 text-white">
                    <div class="inline-block bg-emerald-500/20 text-emerald-400 font-bold text-xs tracking-widest uppercase mb-6 px-3 py-1.5 rounded-full border border-emerald-500/30">
                        Implantação Zero Trauma
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black mb-6 leading-tight">O Desafio do <br>Caixa Cego.</h2>
                    <p class="text-lg text-slate-300 mb-6 font-medium leading-relaxed">
                        Quanto dinheiro a sua instituição perdeu no último semestre por falhas manuais de cobrança e evasão silenciosa?
                    </p>
                    <p class="text-slate-400 mb-10 leading-relaxed">
                        Nós não vendemos "software de prateleira". Nossa implantação é nível <strong>Boutique</strong>: migramos seus dados, treinamos sua equipe e estancamos sua perda financeira.
                    </p>
                    
                    <ul class="space-y-4 text-sm font-bold text-slate-200">
                        <li class="flex items-center gap-3">
                            <span class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center text-white">✓</span>
                            Adequação total à LGPD e hospedagem Cloud.
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center text-white">✓</span>
                            Suporte humanizado por especialistas.
                        </li>
                    </ul>
                </div>

                <div class="w-full lg:w-[450px] bg-white p-8 md:p-10 rounded-3xl shadow-[0_20px_50px_-15px_rgba(0,0,0,0.5)]">
                    <h3 class="text-2xl font-black text-slate-900 mb-2">Fale com a Diretoria</h3>
                    <p class="text-sm text-slate-500 font-medium mb-8">Reserve seu diagnóstico gratuito.</p>
                    
                    <form action="#" method="POST" class="space-y-5">
                        <div>
                            <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-wider mb-1.5">Nome Completo</label>
                            <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all font-medium" placeholder="Ex: João Silva" required>
                        </div>
                        <div>
                            <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-wider mb-1.5">Cargo na Instituição</label>
                            <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all font-medium" placeholder="Ex: Reitor, Diretor TI" required>
                        </div>
                        <div>
                            <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-wider mb-1.5">WhatsApp Corporativo</label>
                            <input type="tel" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all font-medium" placeholder="(11) 90000-0000" required>
                        </div>
                        <button type="submit" class="w-full bg-slate-900 hover:bg-black text-white font-black text-base py-4 rounded-xl mt-2 shadow-lg hover:shadow-xl transition-all hover:-translate-y-0.5">
                            SOLICITAR DEMONSTRAÇÃO
                        </button>
                        <p class="text-center text-[10px] text-slate-400 font-medium mt-4">
                            Seus dados estão seguros. Não enviamos spam.
                        </p>
                    </form>
                </div>

            </div>
        </section>
        
        <footer class="bg-slate-950 text-center py-8 border-t border-slate-800">
            <p class="text-xs text-slate-500 font-medium">© <?php echo date('Y'); ?> Send Solutions. Solidez e tecnologia desde 1996.</p>
        </footer>
    </main>

    <a href="https://wa.me/5511937049755?text=Ol%C3%A1!+Estou+na+Bett+Educar,+li+o+folder+e+gostaria+de+saber+mais+sobre+o+Send+Educacional." 
       target="_blank" 
       class="fixed bottom-6 right-6 bg-[#25D366] hover:bg-[#128C7E] text-white p-4 rounded-full shadow-[0_10px_20px_rgba(37,211,102,0.4)] hover:-translate-y-1 transition-all duration-300 z-50 flex items-center justify-center group">
        
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 0C5.383 0 0 5.383 0 12.031c0 2.645.688 5.127 1.944 7.291L.484 24l4.821-1.428A11.97 11.97 0 0012.031 24c6.648 0 12.031-5.383 12.031-12.031C24.062 5.383 18.679 0 12.031 0zm0 22.016c-2.196 0-4.249-.575-6.002-1.574l-.43-.255-3.18.941.956-3.111-.28-.445C1.866 15.82 1.157 13.987 1.157 12.031c0-5.999 4.876-10.875 10.874-10.875 5.998 0 10.874 4.876 10.874 10.875 0 5.999-4.876 10.875-10.874 10.875zm5.968-8.158c-.328-.164-1.937-.959-2.238-1.07-.301-.109-.521-.164-.739.164-.219.328-.847 1.07-.104 1.289.263.219.525.273.853.109.328-.164 1.381-.508 2.052-1.306.518-.614.868-1.026.966-1.289.098-.263.049-.492-.115-.656-.164-.164-.328-.328-.492-.492-.164-.164-.219-.328-.328-.546-.109-.219-.055-.41.027-.574.082-.164.739-1.782 1.012-2.438.263-.635.531-.546.739-.557.197-.011.421-.011.64-.011.219 0 .574.082.875.438.301.355 1.149 1.121 1.149 2.734 0 1.613 1.176 3.171 1.34 3.39.164.219 2.31 3.522 5.594 4.939 2.232.962 2.975.821 3.491.688.59-.148 1.937-.793 2.21-1.558.273-.765.273-1.422.191-1.558-.082-.136-.301-.219-.629-.383z"></path></svg>
        
        <span class="absolute right-16 bg-slate-900 text-white text-xs font-bold py-2 px-4 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap shadow-lg">
            Me chame no WhatsApp
        </span>
    </a>

    <?php wp_footer(); ?>
</body>
</html>