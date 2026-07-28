<?php
/*
Template Name: Segmento - Cursos e Venda Online
*/
$se_seg  = se_segmento( 'cursos-online' );
$se_cor  = $se_seg['cor'];
get_header(); ?>

<main class="relative text-white overflow-hidden" style="background:#030429">

    <section class="relative pt-36 pb-16">
        <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[900px] h-[420px] rounded-full blur-[140px] pointer-events-none" style="background:<?php echo esc_attr( $se_cor ); ?>2e"></div>

        <div class="container mx-auto px-6 max-w-4xl text-center relative z-10">
            <div class="flex justify-center items-center gap-2 text-xs text-slate-400 mb-7 font-semibold uppercase tracking-widest">
                <a href="<?php echo esc_url( home_url() ); ?>" class="hover:text-white transition">Início</a>
                <span aria-hidden="true">/</span>
                <span style="color:<?php echo esc_attr( $se_cor ); ?>"><?php echo esc_html( $se_seg['nome'] ); ?></span>
            </div>

            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full glass text-[11px] font-bold uppercase tracking-widest mb-7" style="color:<?php echo esc_attr( $se_cor ); ?>">
                <span class="w-2 h-2 rounded-full" style="background:<?php echo esc_attr( $se_cor ); ?>"></span>
                Cursos livres, profissionalizantes e corporativos
            </span>

            <h1 class="titulo text-[2.5rem] md:text-[4.4rem] leading-[0.99] tracking-tightest mb-6">
                Venda o curso, dê a aula, aplique a prova e <span class="gtext">emita o certificado</span>, no mesmo sistema.
            </h1>

            <p class="text-lg md:text-xl text-slate-400 leading-relaxed max-w-2xl mx-auto mb-9">
                Hoje quase todo mundo junta três ferramentas: um checkout, uma plataforma de aula e uma planilha para os certificados. O Send Educacional resolve as três coisas em um só lugar: o aluno paga, estuda, é avaliado e recebe o certificado sem ninguém precisar conferir nada à mão.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <button data-track="cta-hero-cursos-online" onclick="abrirDemo('cursos-online')" class="gbtn text-white font-bold px-8 py-4 rounded-2xl text-lg w-full sm:w-auto transition-all hover:-translate-y-0.5">Quero ver funcionando</button>
                <a href="#como-funciona" class="w-full sm:w-auto px-8 py-4 rounded-2xl text-lg font-semibold text-white glass hover:bg-white/10 transition">Como funciona</a>
            </div>
            <p class="text-slate-500 text-sm mt-5">Demonstração gratuita · sem compromisso · conduzida por quem já implantou</p>
        </div>
    </section>

    <!-- ================= OS TRÊS PILARES ================= -->
    <section id="como-funciona" class="relative py-20">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-14 reveal">
                <span class="font-bold tracking-widest uppercase text-xs" style="color:<?php echo esc_attr( $se_cor ); ?>">Pagamento · Avaliação · Certificado</span>
                <h2 class="titulo text-[2.2rem] md:text-5xl leading-[1.03] mt-4">Os três pontos que costumam quebrar</h2>
                <p class="text-lg text-slate-400 mt-4 max-w-2xl mx-auto">São eles que fazem operação de curso online virar trabalho manual. Aqui os três já vêm resolvidos e conversando entre si.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-5 reveal">
                <?php
                $co_pilares = array(
                    array(
                        'Pagamento na hora',
                        'O aluno escolhe o curso e paga sem sair do ambiente. A matrícula é liberada no mesmo segundo em que o pagamento confirma.',
                        array(
                            'Pix, cartão de crédito e boleto',
                            'Assinatura recorrente e parcelamento',
                            'Cupom de desconto e campanha promocional',
                            'Liberação automática do acesso ao curso',
                            'Bloqueio automático quando a assinatura cai',
                            'Nota fiscal de serviço emitida junto',
                        ),
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M7 14h4"></path>',
                    ),
                    array(
                        'Avaliação online',
                        'Prova, questionário e atividade dentro da própria aula. Correção objetiva na hora, nota registrada no histórico do aluno sem digitação.',
                        array(
                            'Banco de questões reaproveitável',
                            'Múltipla escolha com correção automática',
                            'Questão dissertativa com correção do tutor',
                            'Tentativas, tempo limite e nota mínima',
                            'Progresso e frequência de acesso por aluno',
                            'Nota cai direto no histórico, sem planilha à parte',
                        ),
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"></path><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path><path stroke-linecap="round" stroke-linejoin="round" d="M9 5a2 2 0 012-2h2a2 2 0 012 2v0a1 1 0 01-1 1h-4a1 1 0 01-1-1z"></path>',
                    ),
                    array(
                        'Certificado automático',
                        'Bateu a regra de conclusão, o certificado sai sozinho, com código de validação para o aluno provar que é verdadeiro e para você conferir depois.',
                        array(
                            'Regra de conclusão configurável',
                            'Emissão automática, sem pedido de suporte',
                            'Modelo com a marca da sua escola',
                            'Código único e página pública de validação',
                            'Carga horária e conteúdo programático no verso',
                            'Segunda via pelo próprio portal do aluno',
                        ),
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M12 14a4 4 0 100-8 4 4 0 000 8z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M8.5 12.8L7 21l5-2.6L17 21l-1.5-8.2"></path>',
                    ),
                );
                foreach ( $co_pilares as $p ) {
                    $itens = '';
                    foreach ( $p[2] as $i ) {
                        $itens .= sprintf(
                            '<li class="flex items-start gap-2.5 text-sm text-slate-300"><svg class="w-4 h-4 flex-shrink-0 mt-0.5" style="color:%s" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>%s</li>',
                            esc_attr( $se_cor ), esc_html( $i )
                        );
                    }
                    printf(
                        '<div class="glass glass-hover rounded-3xl p-8 flex flex-col">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6" style="background:%s22;border:1px solid %s55"><svg class="w-7 h-7" style="color:%s" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">%s</svg></div>
                            <h3 class="titulo-mini text-xl text-white mb-3">%s</h3>
                            <p class="text-slate-400 leading-relaxed mb-6">%s</p>
                            <ul class="space-y-2.5 mt-auto">%s</ul>
                        </div>',
                        esc_attr( $se_cor ), esc_attr( $se_cor ), esc_attr( $se_cor ), $p[3],
                        esc_html( $p[0] ), esc_html( $p[1] ), $itens
                    );
                }
                ?>
            </div>
        </div>
    </section>

    <!-- ================= A JORNADA ================= -->
    <section class="relative py-20">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-14 reveal">
                <span class="font-bold tracking-widest uppercase text-xs" style="color:<?php echo esc_attr( $se_cor ); ?>">Do clique ao certificado</span>
                <h2 class="titulo text-[2.2rem] md:text-5xl leading-[1.03] mt-4">Sem ninguém no meio do caminho</h2>
                <p class="text-slate-400 max-w-2xl mx-auto text-lg mt-4">Cada etapa entrega a próxima automaticamente. Ninguém da sua equipe precisa liberar acesso, lançar nota ou montar certificado.</p>
            </div>

            <div class="relative reveal">
                <div class="hidden lg:block absolute top-7 left-[8%] right-[8%] h-px" style="background:linear-gradient(90deg,<?php echo esc_attr( $se_cor ); ?>55,#4a78b055)"></div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-x-4 gap-y-8">
                    <?php
                    $co_jornada = array(
                        array( 'Página de venda', 'Catálogo de cursos com preço, ementa e carga horária.' ),
                        array( 'Checkout', 'Pix, cartão ou recorrência, com cupom e parcelamento.' ),
                        array( 'Acesso liberado', 'Matrícula criada no ato da confirmação do pagamento.' ),
                        array( 'Aula no AVA', 'Vídeo, material e trilha de progresso no ambiente próprio.' ),
                        array( 'Avaliação', 'Prova online corrigida na hora, nota no histórico.' ),
                        array( 'Certificado', 'Emitido sozinho, com código público de validação.' ),
                    );
                    foreach ( $co_jornada as $n => $j ) {
                        printf(
                            '<div class="text-center px-1">
                                <div class="relative w-14 h-14 mx-auto rounded-2xl flex items-center justify-center mb-4 z-10 ring-4 ring-[#030429] text-white font-extrabold" style="background:linear-gradient(135deg,%s,#4a78b0)">%d</div>
                                <h4 class="text-sm font-bold text-white leading-tight">%s</h4>
                                <p class="text-[12px] text-slate-400 mt-1 leading-snug">%s</p>
                            </div>',
                            esc_attr( $se_cor ), $n + 1, esc_html( $j[0] ), esc_html( $j[1] )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= MOCKUP DO CERTIFICADO ================= -->
    <section class="relative py-20">
        <div class="container mx-auto px-6 max-w-6xl grid lg:grid-cols-2 gap-12 items-center reveal">
            <div>
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full glass text-[11px] font-bold uppercase tracking-widest mb-5" style="color:<?php echo esc_attr( $se_cor ); ?>">Certificado</span>
                <h2 class="titulo text-[2rem] md:text-4xl leading-[1.04] mb-5">O certificado que ninguém precisa montar</h2>
                <p class="text-lg text-slate-400 leading-relaxed mb-6">
                    Certificado emitido no momento em que o aluno cumpre a regra de conclusão que você definiu, carga horária, nota mínima, progresso ou tudo isso junto. Sai com a sua marca, com a carga horária e com um código único.
                </p>
                <ul class="space-y-3 mb-8">
                    <?php foreach ( array(
                        'Página pública de validação: quem contrata o seu aluno confere o código e vê que é verdadeiro.',
                        'Sem fila de suporte pedindo segunda via, o aluno baixa sozinho pelo portal.',
                        'Modelo configurável por curso: você define layout, assinatura e o que aparece no verso.',
                    ) as $li ) {
                        printf( '<li class="flex items-start gap-3 text-slate-300"><svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color:%s" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>%s</li>', esc_attr( $se_cor ), esc_html( $li ) );
                    } ?>
                </ul>
                <button data-track="cta-certificado" onclick="abrirDemo('cursos-online')" class="gbtn text-white font-bold px-7 py-3.5 rounded-2xl transition-all hover:-translate-y-0.5">Ver o certificado na demonstração</button>
            </div>

            <div class="rounded-2xl overflow-hidden border border-white/10 cardring" style="background:#050741">
                <div class="h-10 flex items-center px-4 gap-2 border-b border-white/10 bg-slate-900/70">
                    <span class="w-2.5 h-2.5 rounded-full bg-slate-600"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-slate-600"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-slate-600"></span>
                    <span class="mx-auto text-[11px] text-slate-400 font-semibold bg-white/5 border border-white/10 rounded-full px-4 py-1">validar.suaescola.com.br/certificado</span>
                </div>
                <div class="p-5">
                    <div class="rounded-xl border border-white/10 bg-white/[.03] p-6 text-center mb-4">
                        <p class="text-[10px] uppercase tracking-[0.25em] text-slate-500 font-bold mb-3">Certificado de conclusão</p>
                        <p class="text-lg font-extrabold text-white">Aluno Exemplo da Silva</p>
                        <p class="text-sm text-slate-400 mt-1 mb-4">concluiu o curso <span class="text-slate-200 font-semibold">Gestão Financeira na Prática</span></p>
                        <div class="grid grid-cols-3 gap-3 text-left border-t border-white/10 pt-4">
                            <div><p class="text-[9px] uppercase text-slate-500 font-bold">Carga horária</p><p class="text-sm font-bold text-white">40h</p></div>
                            <div><p class="text-[9px] uppercase text-slate-500 font-bold">Nota final</p><p class="text-sm font-bold text-white">8,7</p></div>
                            <div><p class="text-[9px] uppercase text-slate-500 font-bold">Conclusão</p><p class="text-sm font-bold text-white">14/03/2026</p></div>
                        </div>
                    </div>
                    <div class="rounded-xl border p-4 flex items-center gap-3" style="border-color:<?php echo esc_attr( $se_cor ); ?>44;background:<?php echo esc_attr( $se_cor ); ?>14">
                        <svg class="w-8 h-8 flex-shrink-0" style="color:<?php echo esc_attr( $se_cor ); ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <p class="text-sm font-bold text-white">Certificado válido</p>
                            <p class="text-[11px] text-slate-400 font-mono">código EX-4K7P-9QB2-2026</p>
                        </div>
                    </div>
                    <p class="text-[10px] text-slate-500 text-center mt-4 uppercase tracking-widest font-bold">Dados ilustrativos</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= COMPARATIVO ================= -->
    <section class="relative py-20">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="text-center mb-12 reveal">
                <h2 class="titulo text-[2.2rem] md:text-5xl leading-[1.03]">Três ferramentas ou <span class="gtext">uma só</span></h2>
                <p class="text-lg text-slate-400 mt-4">A conta que ninguém faz: o tempo que a sua equipe gasta ligando um sistema no outro.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-5 reveal">
                <div class="glass rounded-3xl p-8 border-rose-500/25">
                    <p class="text-xs font-bold uppercase tracking-widest text-rose-300 mb-5">Com ferramentas separadas</p>
                    <ul class="space-y-3.5">
                        <?php foreach ( array(
                            'Checkout num lugar, aula em outro, certificado no Canva.',
                            'Alguém confere o pagamento e libera o acesso na mão.',
                            'Nota da prova em planilha, sem histórico do aluno.',
                            'Certificado pedido por e-mail, feito um a um.',
                            'Aluno que cancelou continua com acesso liberado.',
                            'Nenhum relatório que junte venda, conclusão e evasão.',
                        ) as $x ) {
                            printf( '<li class="flex items-start gap-3 text-sm text-slate-400"><svg class="w-4 h-4 text-rose-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>%s</li>', esc_html( $x ) );
                        } ?>
                    </ul>
                </div>
                <div class="glass rounded-3xl p-8" style="border-color:<?php echo esc_attr( $se_cor ); ?>44">
                    <p class="text-xs font-bold uppercase tracking-widest mb-5" style="color:<?php echo esc_attr( $se_cor ); ?>">Com o Send Educacional</p>
                    <ul class="space-y-3.5">
                        <?php foreach ( array(
                            'Venda, aula, avaliação e certificado no mesmo sistema.',
                            'Pagamento confirmado libera o acesso sozinho.',
                            'Nota da prova entra no histórico do aluno na hora.',
                            'Certificado emitido automaticamente, com validação pública.',
                            'Assinatura cancelada bloqueia o acesso sem ninguém lembrar.',
                            'Um painel só: venda, progresso, conclusão e inadimplência.',
                        ) as $x ) {
                            printf( '<li class="flex items-start gap-3 text-sm text-slate-300"><svg class="w-4 h-4 flex-shrink-0 mt-0.5" style="color:%s" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>%s</li>', esc_attr( $se_cor ), esc_html( $x ) );
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= CATÁLOGO COMPLETO DE MÓDULOS ================= -->
    <?php se_bloco_modulos( 'cursos-online', $se_cor ); ?>

    <!-- ================= PERGUNTAS ================= -->
    <section class="relative py-20">
        <div class="container mx-auto px-6 max-w-3xl">
            <h2 class="titulo text-[2rem] md:text-4xl leading-[1.04] text-center mb-12 reveal">Perguntas que sempre aparecem</h2>
            <div class="space-y-3 reveal">
                <?php
                $co_faq = array(
                    array( 'Preciso de curso reconhecido pelo MEC para usar?', 'Não. Este módulo atende curso livre, profissionalizante e treinamento corporativo, que não dependem de reconhecimento do MEC. Se a sua operação também tem curso regulado, ele roda no mesmo sistema, na parte de ensino superior.' ),
                    array( 'Dá para vender assinatura, e não só curso avulso?', 'Sim. Você configura curso avulso, combo, trilha e assinatura recorrente. Na recorrência, o acesso é liberado e bloqueado conforme o pagamento, sem ninguém precisar acompanhar.' ),
                    array( 'A prova é corrigida sozinha?', 'A questão objetiva sim, na hora em que o aluno entrega. A dissertativa vai para a fila do tutor, com a nota entrando no histórico assim que ele corrige.' ),
                    array( 'O certificado tem validade?', 'Certificado de curso livre não é diploma, e a gente não vende isso como se fosse. O que ele tem é rastreabilidade: código único, página pública de validação e a carga horária e o conteúdo registrados, que é o que uma empresa checa quando o seu aluno apresenta o certificado.' ),
                    array( 'Já uso uma plataforma. Dá para migrar os alunos?', 'Dá. A implantação inclui a importação da sua base de alunos, cursos e histórico de conclusão. A migração é conduzida por um consultor, sem parar a venda.' ),
                );
                foreach ( $co_faq as $f ) {
                    printf(
                        '<details class="group glass rounded-2xl px-6 py-5">
                            <summary class="flex items-center justify-between cursor-pointer list-none font-bold text-white">%s<svg class="w-5 h-5 text-slate-500 group-open:rotate-45 transition-transform flex-shrink-0 ml-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg></summary>
                            <p class="text-slate-400 leading-relaxed mt-4">%s</p>
                        </details>',
                        esc_html( $f[0] ), esc_html( $f[1] )
                    );
                }
                ?>
            </div>
        </div>
    </section>

    <!-- ================= CTA + OUTROS SEGMENTOS ================= -->
    <section class="relative py-20">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="glass rounded-[2.5rem] p-10 md:p-14 text-center cardring reveal">
                <h2 class="titulo text-[2.2rem] md:text-5xl leading-[1.03] mb-5">Mostre o seu fluxo, a gente mostra o sistema</h2>
                <p class="text-lg text-slate-400 max-w-2xl mx-auto mb-8">Na demonstração a gente pega o seu curso de verdade e percorre a jornada inteira: venda, aula, prova e certificado. Sem apresentação genérica.</p>
                <button data-track="cta-final-cursos-online" onclick="abrirDemo('cursos-online')" class="gbtn text-white font-bold px-9 py-4 rounded-2xl text-lg transition-all hover:-translate-y-0.5">Solicitar demonstração</button>
                <p class="text-slate-500 text-sm mt-4">Gratuita · sem compromisso · com um especialista do segmento</p>
            </div>

            <div class="mt-14 reveal">
                <p class="text-center text-sm font-bold uppercase tracking-widest text-slate-400 mb-5">Sua operação é outra?</p>
                <?php se_bloco_segmentos( 'cursos-online' ); ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
