<?php
/*
Template Name: Política de Privacidade
*/
get_header(); ?>

<main class="min-h-screen pt-32 pb-20">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="glass reveal p-8 md:p-12 rounded-[2.5rem]">
            <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-8">Política de Privacidade e <span class="gtext">LGPD</span></h1>

            <div class="prose prose-invert max-w-none text-slate-300 space-y-6 text-sm md:text-base leading-relaxed">
                <p>A <strong>Send Educacional</strong>, em conformidade com a Lei Geral de Proteção de Dados (Lei nº 13.709/2018), reafirma seu compromisso com a transparência e segurança no tratamento das suas informações.</p>

                <h2 class="text-xl font-bold text-white pt-4">1. Coleta de Dados</h2>
                <p>Coletamos informações através de nossos formulários de contato e demonstração, incluindo nome, e-mail, cargo, instituição e volume de alunos. Esses dados são utilizados exclusivamente para identificar seu perfil e oferecer uma solução personalizada.</p>

                <h2 class="text-xl font-bold text-white pt-4">2. Finalidade do Tratamento</h2>
                <p>Os dados coletados são utilizados para:</p>
                <ul class="list-disc pl-5 space-y-2">
                    <li>Realizar demonstrações do software solicitadas pelo usuário;</li>
                    <li>Enviar comunicações estratégicas sobre gestão escolar e atualizações do sistema;</li>
                    <li>Melhorar a experiência de navegação através de cookies de análise.</li>
                </ul>

                <h2 class="text-xl font-bold text-white pt-4">3. Segurança e Armazenamento</h2>
                <p>Utilizamos protocolos de segurança modernos para garantir que seus dados não sejam acessados, alterados ou destruídos por terceiros não autorizados.</p>

                <h2 class="text-xl font-bold text-white pt-4">4. Seus Direitos</h2>
                <p>Você pode, a qualquer momento, solicitar o acesso, retificação ou exclusão permanente de seus dados através do e-mail: <strong>contato@sendeducacional.com.br</strong>.</p>

                <p class="text-xs text-slate-400 mt-10">Última atualização: <?php echo date('d/m/Y'); ?></p>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>