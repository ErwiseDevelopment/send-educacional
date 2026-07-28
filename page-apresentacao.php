<?php
/**
 * Template Name: Página de Apresentação
 * Description: Página institucional de apresentação do Send Educacional (hero escuro, módulos, resultados e implantação).
 */

if ( ! defined( 'ABSPATH' ) ) exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.47.0/tabler-icons.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<script>tailwind.config={theme:{extend:{
      colors:{
        slate:{50:'#f7f7f9',100:'#ededf0',200:'#d9d9df',300:'#b8b9c3',400:'#8b8c9d',500:'#6d6d83',600:'#54546d',700:'#3a3b58',800:'#212243',900:'#121336',950:'#07082c'},
        blue:{50:'#f1f4f9',100:'#e2e9f2',200:'#c5d4e6',300:'#96b1d1',400:'#7296c1',500:'#5883b6',600:'#4a78b0',700:'#335298',800:'#1f3184',900:'#080b6c',950:'#050746'},
        indigo:{50:'#f0f0f6',100:'#e1e2ed',200:'#c4c4dc',300:'#9799c1',400:'#7576ad',500:'#4d4f95',600:'#2b2d81',700:'#080b6c',800:'#060956',900:'#050741',950:'#030429'},
        violet:{50:'#f0f0f6',100:'#e1e2ed',200:'#c4c4dc',300:'#9799c1',400:'#7576ad',500:'#4d4f95',600:'#2b2d81',700:'#080b6c',800:'#060956',900:'#050741',950:'#030429'},
        emerald:{400:'#56b2cb',500:'#3f97b3',600:'#2f7e98'}
      },
      fontFamily:{sans:['Poppins','sans-serif']}
    }}}</script>
<style>
  :root{ --ink:#030429; }
  body{ font-family:'Poppins',sans-serif; }
  .ink{ background:var(--ink); }
  .grid-mask{ background-image:linear-gradient(rgba(148,163,184,.07) 1px,transparent 1px),linear-gradient(90deg,rgba(148,163,184,.07) 1px,transparent 1px); background-size:48px 48px; -webkit-mask-image:radial-gradient(110% 90% at 50% 0,#000 30%,transparent 72%); mask-image:radial-gradient(110% 90% at 50% 0,#000 30%,transparent 72%); }
  .glow{ background:radial-gradient(60% 60% at 50% 0,rgba(59,130,246,.35),transparent 70%),radial-gradient(40% 50% at 80% 20%,rgba(139,92,246,.25),transparent 70%); }
  .gtext{ background:linear-gradient(100deg,#96b1d1,#7296c1 45%,#4a78b0); -webkit-background-clip:text; background-clip:text; color:transparent; }
  .gbtn{ background:linear-gradient(100deg,#4a78b0,#1f3184); box-shadow:0 10px 30px -8px rgba(8,11,108,.75); color:#fff; }
  .gbtn:hover{ box-shadow:0 14px 38px -8px rgba(8,11,108,.95); color:#fff; }
  .ap-seg-opt:has(input:checked){ border-color:#4a78b0; background:#f1f4f9; box-shadow:0 0 0 3px rgba(37,99,235,.12); }
  .card-ring{ box-shadow:0 1px 0 0 rgba(255,255,255,.06) inset,0 30px 60px -30px rgba(2,6,23,.8); }
  .floaty{ animation:floaty 6s ease-in-out infinite; }
  .floaty2{ animation:floaty 7s ease-in-out infinite; }
  @keyframes floaty{ 0%,100%{transform:translateY(0)} 50%{transform:translateY(-10px)} }
  .dash{ background:#050741; border-radius:18px; overflow:hidden; border:1px solid rgba(150,177,209,.18); }
  .dbar{ height:42px; display:flex; align-items:center; gap:8px; padding:0 16px; background:#030429; border-bottom:1px solid rgba(255,255,255,.08); }
  .dot{ width:11px;height:11px;border-radius:50%; }
  .durl{ margin:0 auto; font-size:11px; color:#b8b9c3; background:rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.12); border-radius:999px; padding:4px 16px; font-weight:600; }
  .dbody{ display:grid; grid-template-columns:64px 1fr; min-height:330px; }
  .dside{ background:#030429; border-right:1px solid rgba(255,255,255,.07); padding:16px 0; display:flex; flex-direction:column; align-items:center; gap:18px; }
  .dside .smark{ width:34px;height:34px;border-radius:10px; background:linear-gradient(135deg,#4a78b0,#080b6c); color:#fff; font-weight:800; display:flex;align-items:center;justify-content:center; }
  .dside i{ width:20px;height:20px;border-radius:6px;background:rgba(255,255,255,.12); display:block; }
  .dside i.on{ background:#7296c1; }
  .dmain{ padding:18px 20px; }
  .kpi{ border:1px solid rgba(255,255,255,.09); border-radius:14px; padding:12px 14px; background:rgba(255,255,255,.035); }
  .kpi .v{ font-size:20px; font-weight:800; color:#fff; letter-spacing:-.02em; }
  .kpi .l{ font-size:10.5px; font-weight:600; color:#8b8c9d; text-transform:uppercase; letter-spacing:.06em; }
  .chip{ font-size:10px;font-weight:700;padding:2px 7px;border-radius:999px; display:inline-flex; align-items:center; gap:3px; }
  .bars{ display:flex; align-items:flex-end; gap:9px; height:90px; }
  .bars span{ flex:1; border-radius:6px 6px 0 0; background:linear-gradient(180deg,#7296c1,#4a78b0); opacity:.9; }
  .donut{ width:104px;height:104px;border-radius:50%; background:conic-gradient(#4a78b0 0 46%,#7296c1 46% 72%,#56b2cb 72% 88%,#3a3b58 88% 100%); display:flex;align-items:center;justify-content:center; }
  .donut::after{ content:"";width:62px;height:62px;border-radius:50%;background:#050741; }
  .lg-dot{ width:9px;height:9px;border-radius:3px;display:inline-block; }
  .mqo{ overflow:hidden; }
  .mq{ display:flex; gap:40px; white-space:nowrap; animation:mq 22s linear infinite; }
  @keyframes mq{ from{transform:translateX(0)} to{transform:translateX(-50%)} }
  .reveal{ opacity:0; transform:translateY(16px); transition:opacity .7s ease,transform .7s ease; }
  .reveal.in{ opacity:1; transform:none; }
  @media (prefers-reduced-motion: reduce){ .reveal{opacity:1;transform:none;transition:none} .floaty,.floaty2,.mq{animation:none} }
</style>
<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-white text-slate-800 antialiased overflow-x-hidden' ); ?>>

<!-- ===================== HERO (dark) ===================== -->
<section class="sup-escura ink relative overflow-hidden">
  <div class="absolute inset-0 grid-mask"></div>
  <div class="absolute inset-0 glow pointer-events-none"></div>

  <!-- nav -->
  <header class="relative z-20 max-w-6xl mx-auto px-6 h-20 flex items-center justify-between">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2.5">
      <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-violet-600 flex items-center justify-center font-extrabold txt-forte">S</div>
      <span class="font-extrabold text-lg tracking-tight">Send <span class="txt font-medium">Educacional</span></span>
    </a>
    <div class="hidden md:flex items-center gap-7 text-sm font-medium txt">
      <a href="#modulos" class="hover-forte transition">Módulos</a>
      <a href="#ava" class="hover-forte transition">AVA</a>
      <a href="#prova" class="hover-forte transition">Resultados</a>
      <button type="button" onclick="abrirDemo()" data-track="nav-demo" class="gbtn txt-forte font-semibold px-5 py-2.5 rounded-full text-sm">Solicitar demonstração</button>
    </div>
  </header>

  <div class="relative z-10 max-w-6xl mx-auto px-6 pt-16 pb-10 text-center">
    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-bloco border linha text-xs font-semibold txt mb-7 backdrop-blur">
      <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> 33 anos de mercado · uma plataforma, toda a gestão
    </div>
    <h1 class="text-[2.6rem] md:text-7xl font-extrabold tracking-tight leading-[1.04] mb-6">
      Toda a gestão da sua<br class="hidden md:block"> instituição em <span class="gtext">um só sistema</span>
    </h1>
    <p class="text-lg md:text-xl txt max-w-2xl mx-auto leading-relaxed mb-9">
      Acadêmico, financeiro, contratos, CRM, BI e <span class="txt-forte font-semibold">AVA próprio</span>, integrados em uma única plataforma, sem depender de sistemas terceiros.
    </p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
      <button type="button" onclick="abrirDemo()" data-track="hero-demo" class="gbtn txt-forte font-bold px-8 py-4 rounded-2xl text-lg w-full sm:w-auto transition-all hover:-translate-y-0.5">Solicitar demonstração</button>
      <a href="#modulos" data-track="hero-modulos" class="w-full sm:w-auto px-8 py-4 rounded-2xl text-lg font-semibold txt-forte bg-bloco border linha hover:bg-white/10 transition backdrop-blur">Ver os módulos</a>
    </div>
    <p class="txt-fraco text-sm mt-5">Demonstração gratuita · sem compromisso · feita por um especialista</p>
  </div>

  <!-- dashboard sintético -->
  <div class="relative z-10 max-w-5xl mx-auto px-6 pb-0">
    <div class="relative">
      <div class="absolute -inset-x-10 -top-6 bottom-0 bg-gradient-to-b from-blue-500/30 to-violet-600/10 blur-3xl rounded-[3rem]"></div>
      <div class="sup-escura relative dash card-ring">
        <div class="dbar">
          <span class="dot" style="background:#3a3b58"></span><span class="dot" style="background:#3a3b58"></span><span class="dot" style="background:#3a3b58"></span>
          <span class="durl">app.sendeducacional.com.br</span>
          <span class="hidden sm:inline text-[9px] uppercase tracking-widest font-bold txt-fraco border linha rounded-full px-2 py-0.5">Dados ilustrativos</span>
        </div>
        <div class="dbody">
          <div class="dside">
            <div class="smark">S</div>
            <i class="on"></i><i></i><i></i><i></i><i></i>
          </div>
          <div class="dmain">
            <div class="flex items-center justify-between mb-4">
              <div class="text-left">
                <div class="text-[15px] font-extrabold txt-forte tracking-tight">Visão geral</div>
                <div class="text-[11px] txt font-medium">Resumo do mês · 2026</div>
              </div>
              <div class="hidden sm:flex gap-1.5 text-[11px] font-semibold">
                <span class="px-3 py-1.5 rounded-lg bg-blue-600 text-white">Acadêmico</span>
                <span class="px-3 py-1.5 rounded-lg bg-bloco txt">Financeiro</span>
                <span class="px-3 py-1.5 rounded-lg bg-bloco txt">Evasão</span>
              </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5 mb-4">
              <div class="kpi text-left"><div class="l mb-1">Matrículas</div><div class="v">1.284</div><span class="chip" style="background:rgba(52,211,153,.16);color:#6ee7b7"><i class="ti ti-trending-up"></i> 12%</span></div>
              <div class="kpi text-left"><div class="l mb-1">Inadimplência</div><div class="v">4,2%</div><span class="chip" style="background:rgba(52,211,153,.16);color:#6ee7b7"><i class="ti ti-trending-down"></i> 1,8pp</span></div>
              <div class="kpi text-left"><div class="l mb-1">Risco evasão</div><div class="v">37</div><span class="chip" style="background:rgba(251,191,36,.16);color:#fcd34d">alunos</span></div>
              <div class="kpi text-left"><div class="l mb-1">Receita</div><div class="v">R$2,4M</div><span class="chip" style="background:rgba(52,211,153,.16);color:#6ee7b7"><i class="ti ti-trending-up"></i> 8%</span></div>
            </div>
            <div class="grid md:grid-cols-3 gap-3">
              <div class="md:col-span-2 kpi text-left">
                <div class="l mb-3">Matrículas por mês</div>
                <div class="bars"><span style="height:42%"></span><span style="height:55%"></span><span style="height:48%"></span><span style="height:70%"></span><span style="height:62%"></span><span style="height:85%"></span><span style="height:100%"></span></div>
              </div>
              <div class="kpi text-left">
                <div class="l mb-3">Cursos</div>
                <div class="flex items-center gap-3">
                  <div class="donut"></div>
                  <div class="space-y-1.5 text-[11px] txt font-medium">
                    <div><span class="lg-dot" style="background:#4a78b0"></span> Graduação</div>
                    <div><span class="lg-dot" style="background:#7296c1"></span> EAD</div>
                    <div><span class="lg-dot" style="background:#56b2cb"></span> Pós</div>
                    <div><span class="lg-dot" style="background:#3a3b58"></span> Técnico</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- floating accent cards -->
      <div class="floaty hidden md:flex absolute -left-8 bottom-16 items-center gap-3 rounded-2xl px-4 py-3 shadow-xl border border-white/12 bg-[#050741]">
        <div class="w-9 h-9 rounded-full bg-emerald-400/15 text-emerald-600 flex items-center justify-center"><i class="ti ti-check text-lg"></i></div>
        <div class="text-left"><p class="text-[10px] txt font-bold uppercase">Mensalidade</p><p class="text-sm font-bold txt-forte">Paga via Pix</p></div>
      </div>
      <div class="floaty2 hidden md:flex absolute -right-6 top-24 items-center gap-3 rounded-2xl px-4 py-3 shadow-xl border border-white/12 bg-[#050741]">
        <div class="w-9 h-9 rounded-full bg-blue-400/15 txt-link flex items-center justify-center"><i class="ti ti-signature text-lg"></i></div>
        <div class="text-left"><p class="text-[10px] txt font-bold uppercase">Matrícula</p><p class="text-sm font-bold txt-forte">Contrato assinado</p></div>
      </div>
    </div>
  </div>

  <!-- marquee integrações -->
  <div class="relative z-10 mt-16 border-t linha py-6 mqo">
    <div class="mq txt-fraco text-sm font-semibold uppercase tracking-widest">
      <span>Getnet</span><span>Pix</span><span>Santander</span><span>WhatsApp</span><span>Asaas</span><span>Diploma Digital</span><span>MEC</span><span>LGPD</span>
      <span>Getnet</span><span>Pix</span><span>Santander</span><span>WhatsApp</span><span>Asaas</span><span>Diploma Digital</span><span>MEC</span><span>LGPD</span>
    </div>
  </div>
</section>

<!-- ===================== STATS ===================== -->
<section class="bg-white py-16 border-b border-slate-100">
  <div class="max-w-6xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-6 text-center reveal">
    <div><div class="text-4xl md:text-5xl font-extrabold tracking-tight gtext">33</div><p class="txt-fraco text-sm font-semibold uppercase tracking-wide mt-1">Anos de mercado</p><p class="txt text-xs mt-1">Send Solutions · em educação desde 2019</p></div>
    <div><div class="text-4xl md:text-5xl font-extrabold tracking-tight gtext">20+</div><p class="txt-fraco text-sm font-semibold uppercase tracking-wide mt-1">Módulos integrados</p><p class="txt text-xs mt-1">na mesma plataforma</p></div>
    <div><div class="text-4xl md:text-5xl font-extrabold tracking-tight gtext">3</div><p class="txt-fraco text-sm font-semibold uppercase tracking-wide mt-1">Segmentos atendidos</p><p class="txt text-xs mt-1">superior · básica e média · cursos online</p></div>
    <div><div class="text-4xl md:text-5xl font-extrabold tracking-tight gtext">24/7</div><p class="txt-fraco text-sm font-semibold uppercase tracking-wide mt-1">Suporte de parceiro</p><p class="txt text-xs mt-1">implantação conduzida por consultor</p></div>
  </div>
</section>

<!-- ===================== O QUE É ===================== -->
<section class="bg-white py-28">
  <div class="max-w-3xl mx-auto px-6 text-center reveal">
    <span class="text-blue-700 font-bold tracking-widest uppercase text-xs">O que é o Send Educacional</span>
    <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 tracking-tight mt-4 mb-6 leading-tight">Um sistema único no lugar de vários que não conversam.</h2>
    <p class="text-lg txt-fraco leading-relaxed mb-5">A maioria das instituições usa um sistema para o acadêmico, outro para o financeiro, uma planilha para a cobrança e um portal à parte para o aluno, e gasta tempo costurando tudo na mão. O Send reúne essa operação inteira em <span class="text-slate-800 font-semibold">uma só plataforma</span>, com os dados integrados de ponta a ponta.</p>
    <p class="text-lg txt-fraco leading-relaxed">Nascido em 2019 dentro da <span class="text-slate-800 font-semibold">Send Solutions</span> (33 anos de mercado), é mantido sempre atualizado conforme o MEC e as mudanças fiscais. Até o <span class="text-slate-800 font-semibold">ambiente de aula (AVA) é desenvolvido pela própria Send</span>, e não um sistema de terceiros costurado por fora.</p>
  </div>
</section>

<!-- ===================== AVA (novidade) ===================== -->
<section id="ava" class="sup-escura ink relative txt-forte overflow-hidden py-28">
  <div class="absolute inset-0 glow opacity-70 pointer-events-none"></div>
  <div class="relative z-10 max-w-6xl mx-auto px-6 grid lg:grid-cols-2 gap-14 items-center reveal">
    <div>
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/30 txt-link text-xs font-bold uppercase tracking-widest mb-6">
        <span class="relative flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span></span> Novidade
      </div>
      <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight leading-tight mb-6">O AVA agora é <span class="gtext">nosso</span>, não de terceiros.</h2>
      <p class="text-lg txt leading-relaxed mb-8">Desenvolvemos o nosso próprio <span class="txt-forte font-semibold">Ambiente Virtual de Aprendizagem</span>. Aulas, conteúdo e avaliações online ficam dentro do mesmo sistema do acadêmico e do financeiro, o aluno não troca de ambiente e a nota cai direto no histórico.</p>
      <button type="button" onclick="abrirDemo()" data-track="ava-demo" class="gbtn txt-forte font-bold px-7 py-3.5 rounded-2xl transition-all hover:-translate-y-0.5">Ver o AVA na demonstração</button>
    </div>
    <div class="bg-white/[.04] border linha rounded-3xl p-7 md:p-9 backdrop-blur card-ring">
      <p class="text-xs font-bold uppercase tracking-widest txt-link mb-5">O que o AVA próprio entrega</p>
      <ul class="space-y-3.5 text-[15px]">
        <li class="flex items-start gap-3 txt-forte"><i class="ti ti-circle-check text-emerald-400 text-lg shrink-0"></i> Aulas e materiais organizados por disciplina.</li>
        <li class="flex items-start gap-3 txt-forte"><i class="ti ti-circle-check text-emerald-400 text-lg shrink-0"></i> Atividades, quiz e avaliações online.</li>
        <li class="flex items-start gap-3 txt-forte"><i class="ti ti-circle-check text-emerald-400 text-lg shrink-0"></i> Fórum e mensagens entre aluno e professor.</li>
        <li class="flex items-start gap-3 txt-forte"><i class="ti ti-circle-check text-emerald-400 text-lg shrink-0"></i> Notas que caem direto no acadêmico, sem reimportar.</li>
        <li class="flex items-start gap-3 txt-forte"><i class="ti ti-circle-check text-emerald-400 text-lg shrink-0"></i> 100% web e mobile, com a marca da instituição.</li>
        <li class="flex items-start gap-3 txt-forte"><i class="ti ti-circle-check text-emerald-400 text-lg shrink-0"></i> Sem integração frágil com sistema externo.</li>
      </ul>
    </div>
  </div>
</section>

<!-- ===================== JEITO ANTIGO x SEND ===================== -->
<section class="bg-slate-50 py-28">
  <div class="max-w-5xl mx-auto px-6">
    <div class="text-center mb-14 reveal">
      <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 tracking-tight mb-4">Por que as instituições estão mudando</h2>
      <p class="text-lg txt-fraco">Chega de remendos. A diferença entre sistemas defasados e um ecossistema integrado.</p>
    </div>
    <div class="grid md:grid-cols-2 gap-5 reveal">
      <div class="bg-white rounded-3xl p-9 border border-slate-200">
        <h3 class="text-lg font-bold txt mb-6 flex items-center gap-2"><span class="w-6 h-6 rounded-full bg-red-50 text-red-500 flex items-center justify-center"><i class="ti ti-x text-sm"></i></span> O jeito antigo</h3>
        <ul class="space-y-4 txt-fraco">
          <li class="flex gap-3"><i class="ti ti-x text-red-300 shrink-0 mt-0.5"></i> Filas na secretaria durante a matrícula.</li>
          <li class="flex gap-3"><i class="ti ti-x text-red-300 shrink-0 mt-0.5"></i> Cobrança manual gerando inadimplência.</li>
          <li class="flex gap-3"><i class="ti ti-x text-red-300 shrink-0 mt-0.5"></i> Multas no MEC por documentos físicos perdidos.</li>
          <li class="flex gap-3"><i class="ti ti-x text-red-300 shrink-0 mt-0.5"></i> Vários sistemas que não conversam entre si.</li>
        </ul>
      </div>
      <div class="rounded-3xl p-9 txt-forte relative overflow-hidden" style="background:linear-gradient(135deg,#335298,#080b6c)">
        <div class="absolute -top-10 -right-10 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>
        <h3 class="text-lg font-bold mb-6 flex items-center gap-2 relative z-10"><span class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center"><i class="ti ti-check text-sm"></i></span> Com o Send Educacional</h3>
        <ul class="space-y-4 relative z-10 font-medium">
          <li class="flex gap-3"><i class="ti ti-check text-emerald-600 shrink-0 mt-0.5"></i> Matrícula 100% digital com assinatura validada.</li>
          <li class="flex gap-3"><i class="ti ti-check text-emerald-600 shrink-0 mt-0.5"></i> Régua de cobrança automática e Pix instantâneo.</li>
          <li class="flex gap-3"><i class="ti ti-check text-emerald-600 shrink-0 mt-0.5"></i> Adequação ao MEC e diploma digital nativo.</li>
          <li class="flex gap-3"><i class="ti ti-check text-emerald-600 shrink-0 mt-0.5"></i> Tudo num lugar: do portal do aluno à contabilidade.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ===================== MÓDULOS (bento) ===================== -->
<section id="modulos" class="bg-white py-28">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-14 reveal">
      <span class="text-blue-700 font-bold tracking-widest uppercase text-xs">Módulos integrados</span>
      <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 tracking-tight mt-4">Um ecossistema completo</h2>
      <p class="text-lg txt-fraco mt-4 max-w-2xl mx-auto">20+ módulos, todos no mesmo sistema. Os marcados como <span class="font-bold text-blue-700">Novo</span> são os mais recentes, desenvolvidos pela Send.</p>
    </div>
    <div id="grid-modulos" class="grid grid-cols-2 md:grid-cols-4 gap-4 reveal"></div>
  </div>
</section>

<!-- ===================== RESULTADOS ===================== -->
<section id="prova" class="sup-escura ink relative txt-forte overflow-hidden py-28">
  <div class="absolute inset-0 glow opacity-60 pointer-events-none"></div>
  <div class="relative z-10 max-w-6xl mx-auto px-6 reveal">
    <div class="text-center mb-14">
      <span class="txt-link font-bold tracking-widest uppercase text-xs">Resultados na prática</span>
      <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight mt-4 mb-5 leading-tight">Uma faculdade de 3.000 alunos<br class="hidden md:block"> roda a operação inteira no Send.</h2>
      <p class="text-lg txt max-w-2xl mx-auto">Acadêmico, financeiro, contratos, portal do aluno e BI, em um só sistema, com implantação estruturada e suporte de parceiro 24/7.</p>
    </div>

    <!-- métricas em destaque -->
    <div class="grid lg:grid-cols-3 gap-4 mb-4">
      <div class="relative overflow-hidden rounded-3xl p-9 flex flex-col justify-between min-h-[220px]" style="background:linear-gradient(150deg,#335298,#080b6c)">
        <div class="absolute -top-12 -right-12 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>
        <div class="relative z-10">
          <div class="text-6xl md:text-7xl font-extrabold tracking-tighter leading-none">3.000</div>
          <p class="text-blue-100 font-semibold mt-3 text-lg">alunos com a operação 100% no Send</p>
        </div>
        <div class="relative z-10 flex items-center gap-2 mt-6 txt text-sm font-medium"><span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> Em produção, todos os dias</div>
      </div>
      <div class="lg:col-span-2 grid grid-cols-2 gap-4">
        <div class="bg-white/[.04] border linha rounded-3xl p-7 flex flex-col justify-center"><div class="text-4xl md:text-5xl font-extrabold gtext">20+</div><p class="txt text-sm font-semibold mt-1">Módulos integrados</p></div>
        <div class="bg-white/[.04] border linha rounded-3xl p-7 flex flex-col justify-center"><div class="text-4xl md:text-5xl font-extrabold gtext">~6 meses</div><p class="txt text-sm font-semibold mt-1">Da assinatura ao go-live</p></div>
        <div class="bg-white/[.04] border linha rounded-3xl p-7 flex flex-col justify-center"><div class="text-4xl md:text-5xl font-extrabold gtext">33 anos</div><p class="txt text-sm font-semibold mt-1">De mercado (Send Solutions)</p></div>
        <div class="bg-white/[.04] border linha rounded-3xl p-7 flex flex-col justify-center"><div class="text-4xl md:text-5xl font-extrabold gtext">100%</div><p class="txt text-sm font-semibold mt-1">Aderência ao MEC</p></div>
      </div>
    </div>

    <!-- transformações antes -> depois -->
    <div class="grid md:grid-cols-3 gap-4 mb-4">
      <div class="bg-white/[.04] border linha rounded-3xl p-7">
        <div class="flex items-center gap-2 text-emerald-400 text-sm font-bold mb-4"><i class="ti ti-trending-down text-lg"></i> Inadimplência</div>
        <div class="flex items-baseline gap-2.5"><span class="txt-fraco line-through text-lg font-bold">alta</span><i class="ti ti-arrow-right txt-fraco"></i><span class="text-3xl font-extrabold gtext">até −40%</span></div>
        <p class="txt text-sm mt-3">Régua de cobrança automática + Pix com baixa instantânea.</p>
      </div>
      <div class="bg-white/[.04] border linha rounded-3xl p-7">
        <div class="flex items-center gap-2 txt-link text-sm font-bold mb-4"><i class="ti ti-clock text-lg"></i> Matrícula</div>
        <div class="flex items-baseline gap-2.5"><span class="txt-fraco line-through text-lg font-bold">dias</span><i class="ti ti-arrow-right txt-fraco"></i><span class="text-3xl font-extrabold gtext">minutos</span></div>
        <p class="txt text-sm mt-3">100% digital, com contrato assinado eletronicamente.</p>
      </div>
      <div class="bg-white/[.04] border linha rounded-3xl p-7">
        <div class="flex items-center gap-2 text-violet-400 text-sm font-bold mb-4"><i class="ti ti-users text-lg"></i> Secretaria</div>
        <div class="flex items-baseline gap-2.5"><span class="txt-fraco line-through text-lg font-bold">filas</span><i class="ti ti-arrow-right txt-fraco"></i><span class="text-3xl font-extrabold gtext">self-service</span></div>
        <p class="txt text-sm mt-3">Aluno resolve 2ª via, requerimentos e rematrícula sozinho.</p>
      </div>
    </div>

    <!-- depoimento -->
    <div class="rounded-3xl p-9 md:p-11 bg-white/[.04] border linha flex flex-col md:flex-row items-start gap-6">
      <i class="ti ti-quote text-5xl txt-link/60 shrink-0"></i>
      <div>
        <p class="text-xl md:text-2xl font-medium leading-relaxed text-slate-100">“Hoje a faculdade inteira roda em um sistema só. A secretaria parou de apagar incêndio e a inadimplência caiu de verdade.”</p>
        <p class="txt mt-4 font-semibold">· Coordenação de TI <span class="txt-fraco font-normal">· instituição parceira com 3.000 alunos</span></p>
      </div>
    </div>
  </div>
</section>

<!-- ===================== MIGRAÇÃO (timeline) ===================== -->
<section class="bg-slate-50 py-28">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-16 reveal">
      <span class="text-blue-700 font-bold tracking-widest uppercase text-xs">Implantação guiada</span>
      <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 tracking-tight mt-4 mb-4">Medo de trocar de sistema? A gente conduz.</h2>
      <p class="text-lg txt-fraco max-w-2xl mx-auto">Migração silenciosa em ~6 meses. Sua operação não para, nem no meio do semestre.</p>
    </div>

    <div class="relative reveal">
      <div class="hidden md:block absolute top-9 left-[16%] right-[16%] h-1 rounded-full bg-gradient-to-r from-blue-500 via-indigo-500 to-violet-500 opacity-30"></div>
      <div class="grid md:grid-cols-3 gap-8">

        <div class="relative flex flex-col items-center">
          <div class="w-[72px] h-[72px] rounded-2xl bg-gradient-to-br from-blue-500 to-violet-600 txt-forte flex items-center justify-center shadow-lg shadow-blue-500/30 mb-6 relative z-10 ring-8 ring-slate-50">
            <i class="ti ti-database-export text-3xl"></i>
          </div>
          <div class="bg-white rounded-3xl border border-slate-100 p-7 shadow-[0_20px_50px_-30px_rgba(2,6,23,.4)] w-full text-left hover:-translate-y-1 transition-transform">
            <div class="flex items-center gap-2 mb-3">
              <span class="text-[11px] font-bold txt-forte px-2.5 py-1 rounded-full" style="background:linear-gradient(100deg,#4a78b0,#080b6c)">Etapa 1</span>
              <span class="text-[11px] font-bold txt uppercase tracking-wide">Semanas 1 a 6</span>
            </div>
            <h4 class="text-lg font-bold text-slate-900 mb-2">Levantamento &amp; migração</h4>
            <p class="txt-fraco text-sm leading-relaxed mb-4">Mapeamos o sistema atual e importamos alunos, notas, histórico e financeiro sem perda.</p>
            <ul class="space-y-2 text-sm text-slate-600 font-medium">
              <li class="flex items-center gap-2"><i class="ti ti-circle-check text-blue-700"></i> Análise do banco atual</li>
              <li class="flex items-center gap-2"><i class="ti ti-circle-check text-blue-700"></i> Importação validada</li>
            </ul>
          </div>
        </div>

        <div class="relative flex flex-col items-center">
          <div class="w-[72px] h-[72px] rounded-2xl bg-gradient-to-br from-indigo-500 to-violet-600 txt-forte flex items-center justify-center shadow-lg shadow-indigo-500/30 mb-6 relative z-10 ring-8 ring-slate-50">
            <i class="ti ti-adjustments-alt text-3xl"></i>
          </div>
          <div class="bg-white rounded-3xl border border-slate-100 p-7 shadow-[0_20px_50px_-30px_rgba(2,6,23,.4)] w-full text-left hover:-translate-y-1 transition-transform">
            <div class="flex items-center gap-2 mb-3">
              <span class="text-[11px] font-bold txt-forte px-2.5 py-1 rounded-full" style="background:linear-gradient(100deg,#4a78b0,#080b6c)">Etapa 2</span>
              <span class="text-[11px] font-bold txt uppercase tracking-wide">Semanas 6 a 16</span>
            </div>
            <h4 class="text-lg font-bold text-slate-900 mb-2">Configuração &amp; treinamento</h4>
            <p class="txt-fraco text-sm leading-relaxed mb-4">Parametrizamos as regras da sua instituição e treinamos cada setor ao vivo.</p>
            <ul class="space-y-2 text-sm text-slate-600 font-medium">
              <li class="flex items-center gap-2"><i class="ti ti-circle-check text-blue-700"></i> Regras acadêmicas e financeiras</li>
              <li class="flex items-center gap-2"><i class="ti ti-circle-check text-blue-700"></i> Secretaria, financeiro e professores</li>
            </ul>
          </div>
        </div>

        <div class="relative flex flex-col items-center">
          <div class="w-[72px] h-[72px] rounded-2xl bg-gradient-to-br from-violet-500 to-fuchsia-600 txt-forte flex items-center justify-center shadow-lg shadow-violet-500/30 mb-6 relative z-10 ring-8 ring-slate-50">
            <i class="ti ti-rocket text-3xl"></i>
          </div>
          <div class="bg-white rounded-3xl border border-slate-100 p-7 shadow-[0_20px_50px_-30px_rgba(2,6,23,.4)] w-full text-left hover:-translate-y-1 transition-transform">
            <div class="flex items-center gap-2 mb-3">
              <span class="text-[11px] font-bold txt-forte px-2.5 py-1 rounded-full" style="background:linear-gradient(100deg,#080b6c,#2b2d81)">Etapa 3</span>
              <span class="text-[11px] font-bold txt uppercase tracking-wide">Mês ~6</span>
            </div>
            <h4 class="text-lg font-bold text-slate-900 mb-2">Go-live acompanhado</h4>
            <p class="txt-fraco text-sm leading-relaxed mb-4">Entramos no ar com suporte dedicado nas primeiras semanas de operação.</p>
            <ul class="space-y-2 text-sm text-slate-600 font-medium">
              <li class="flex items-center gap-2"><i class="ti ti-circle-check text-blue-700"></i> Acompanhamento diário</li>
              <li class="flex items-center gap-2"><i class="ti ti-circle-check text-blue-700"></i> Suporte de parceiro 24/7</li>
            </ul>
          </div>
        </div>

      </div>
    </div>

    <div class="mt-12 flex justify-center reveal">
      <div class="inline-flex items-center gap-3 txt-forte px-7 py-4 rounded-2xl font-bold shadow-lg" style="background:linear-gradient(100deg,#4a78b0,#080b6c)">
        <i class="ti ti-shield-check text-xl"></i> Do contrato ao go-live em ~6 meses, sem parar a operação.
      </div>
    </div>
  </div>
</section>

<!-- ===================== CTA FINAL ===================== -->
<section class="bg-white pb-28 pt-4">
  <div class="max-w-6xl mx-auto px-6">
    <div class="relative overflow-hidden rounded-[2.5rem] px-8 py-16 md:p-20 text-center" style="background:linear-gradient(120deg,#335298,#1f3184 55%,#080b6c)">
      <div class="absolute -top-16 -right-16 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
      <div class="absolute -bottom-16 -left-16 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
      <h2 class="relative z-10 text-3xl md:text-5xl font-extrabold txt-forte mb-5 leading-tight">Veja o Send rodando na sua realidade.</h2>
      <p class="relative z-10 text-blue-100 text-lg max-w-2xl mx-auto mb-9">Agende uma demonstração gratuita. Um especialista mostra os módulos que fazem sentido para o porte da sua instituição.</p>
      <button type="button" onclick="abrirDemo()" data-track="cta-final" class="relative z-10 bg-white text-blue-700 hover:bg-blue-50 px-10 py-5 rounded-2xl font-extrabold text-lg transition-all hover:scale-105">Solicitar demonstração</button>
      <p class="relative z-10 text-blue-200 text-sm mt-4">Gratuita e sem compromisso</p>
    </div>
  </div>
</section>

<footer class="sup-escura ink text-center py-10 border-t linha">
  <p class="text-sm txt-fraco">© <?php echo esc_html( date_i18n( 'Y' ) ); ?> Send Solutions · Send Educacional &nbsp;|&nbsp; <a href="mailto:comercial@sendsolutions.com.br" class="hover:txt transition">comercial@sendsolutions.com.br</a></p>
</footer>

<!-- ===================== MODAL ===================== -->
<div id="demo-modal" class="hidden fixed inset-0 z-[100] overflow-y-auto" role="dialog" aria-modal="true" aria-labelledby="demo-modal-title">
  <div class="flex items-center justify-center min-h-screen p-4">
    <div class="sup-escura fixed inset-0 bg-slate-950/70 backdrop-blur-md" onclick="fecharDemo()"></div>
    <div class="relative bg-white rounded-[2rem] shadow-2xl w-full max-w-xl overflow-hidden">
      <button type="button" onclick="fecharDemo()" aria-label="Fechar" class="absolute top-6 right-6 txt hover:text-slate-600 z-10">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
      </button>
      <div class="px-9 pt-10 pb-9">
        <h3 id="demo-modal-title" class="text-2xl font-extrabold text-slate-900 tracking-tight">Agendar demonstração</h3>
        <p class="txt-fraco mt-1.5 mb-7 text-sm font-medium">Comece pelo tipo de instituição: é assim que direcionamos você ao consultor daquele segmento.</p>
        <form id="form-apresentacao" class="grid grid-cols-1 md:grid-cols-2 gap-4" onsubmit="enviarLeadApresentacao(event)">
          <div class="hidden"><input type="text" id="ap_hp" autocomplete="off" tabindex="-1"></div>

          <fieldset class="col-span-2">
            <legend class="text-[10px] font-bold uppercase tracking-widest txt mb-2.5">Tipo de instituição</legend>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
              <?php foreach ( se_segmentos() as $ap_slug => $ap_s ) : ?>
                <label class="ap-seg-opt flex flex-col justify-center cursor-pointer rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-3 transition-all hover:border-slate-300">
                  <input type="radio" name="ap_segmento" value="<?php echo esc_attr( $ap_slug ); ?>" required class="sr-only">
                  <span class="text-sm font-bold text-slate-800 leading-tight"><?php echo esc_html( $ap_s['curto'] ); ?></span>
                  <span class="text-[11px] txt-fraco leading-snug mt-0.5"><?php echo esc_html( $ap_s['publico'] ); ?></span>
                </label>
              <?php endforeach; ?>
            </div>
          </fieldset>

          <input id="ap_nome" required placeholder="Nome completo" class="col-span-2 border border-slate-200 rounded-xl px-4 py-3.5 bg-slate-50 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500">
          <input id="ap_instituicao" required placeholder="Nome da instituição" class="col-span-2 border border-slate-200 rounded-xl px-4 py-3.5 bg-slate-50 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500">
          <input id="ap_whatsapp" required placeholder="WhatsApp" class="col-span-2 md:col-span-1 border border-slate-200 rounded-xl px-4 py-3.5 bg-slate-50 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500">
          <input id="ap_email" type="email" required placeholder="E-mail" class="col-span-2 md:col-span-1 border border-slate-200 rounded-xl px-4 py-3.5 bg-slate-50 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500">
          <select id="ap_cargo" required class="col-span-2 md:col-span-1 border border-slate-200 rounded-xl px-4 py-3.5 bg-slate-50 font-medium txt-fraco focus:outline-none focus:ring-2 focus:ring-blue-500/40"><option value="" disabled selected>Escolha o segmento antes</option></select>
          <select id="ap_alunos" required class="col-span-2 md:col-span-1 border border-slate-200 rounded-xl px-4 py-3.5 bg-slate-50 font-medium txt-fraco focus:outline-none focus:ring-2 focus:ring-blue-500/40"><option value="" disabled selected>Escolha o segmento antes</option></select>

          <label class="col-span-2 flex items-start gap-3 cursor-pointer">
            <input type="checkbox" id="ap_lgpd" required class="mt-0.5 w-5 h-5 shrink-0 rounded-md border-2 border-slate-200 text-blue-700 focus:ring-blue-500 focus:ring-offset-0">
            <span class="text-xs txt-fraco leading-relaxed">
              Autorizo a Send a usar os dados acima para entrar em contato comigo sobre o Send Educacional, conforme a
              <a href="<?php echo esc_url( home_url( '/privacidade' ) ); ?>" target="_blank" rel="noopener" class="text-blue-700 font-semibold underline">Política de Privacidade</a>.
              Posso pedir a exclusão a qualquer momento.
            </span>
          </label>

          <button type="submit" id="ap_btn" data-track="modal-enviar" class="col-span-2 gbtn txt-forte font-extrabold py-4 rounded-2xl text-lg mt-1">Falar com um especialista</button>
        </form>
        <div id="ap_sucesso" class="hidden text-center py-8">
          <p id="ap_aviso" class="hidden text-sm text-amber-500 font-bold mb-4">Não conseguimos registrar seus dados automaticamente, mas seu contato não se perdeu: estamos te levando direto para o especialista.</p>
          <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-5"><i class="ti ti-check text-3xl"></i></div>
          <h3 class="text-2xl font-bold text-slate-900">Recebemos seu contato.</h3>
          <p class="txt-fraco mt-2">Estamos te levando para o WhatsApp de um especialista...</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- WhatsApp flutuante -->
<a href="<?php echo esc_url( se_whatsapp_link( 'Olá! Estou na apresentação do Send Educacional e gostaria de falar com um especialista.' ) ); ?>"
   target="_blank" rel="noopener noreferrer" data-track="whatsapp-float"
   class="fixed bottom-6 right-6 z-[90] bg-[#25D366] txt-forte p-4 rounded-full shadow-[0_10px_30px_rgba(37,211,102,.45)] hover:-translate-y-1 transition-all" aria-label="Falar no WhatsApp">
  <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/></svg>
</a>

<script>
  var AP_AJAX = <?php echo wp_json_encode( admin_url( 'admin-ajax.php' ) ); ?>;
  var AP_ZAP  = <?php echo wp_json_encode( se_whatsapp_num() ); ?>;

  function abrirDemo(){ document.getElementById('demo-modal').classList.remove('hidden'); }
  function fecharDemo(){ document.getElementById('demo-modal').classList.add('hidden'); }
  document.addEventListener('keydown', function(e){ if(e.key === 'Escape') fecharDemo(); });

  // Catálogo de módulos (bento)
  var modulos = [
    ['AVA · Ambiente de aula próprio','Aulas, conteúdo e avaliações online, desenvolvido pela Send, integrado ao acadêmico.','Novo','ti-school'],
    ['CRM & Captação','Funil de captação, campanhas e recuperação de matrículas.','Novo','ti-filter'],
    ['Retenção de Alunos','Alertas de risco de evasão por notas, frequência e financeiro.','Novo','ti-shield-heart'],
    ['Secretaria Acadêmica','Matrícula, notas, histórico, diploma digital e MEC.','','ti-certificate'],
    ['Gestão Financeira','Boletos, Pix, recorrência e régua de cobrança.','','ti-cash'],
    ['Portal do Aluno e Professor','Notas, boletos, diário e requerimentos no celular.','','ti-device-mobile'],
    ['Assinatura & Contratos','Contratos e mandatos com assinatura validada.','','ti-signature'],
    ['Biblioteca & GED','Gestão de documentos e controle de acervo.','','ti-folders'],
    ['BI & Indicadores','Dashboards de evasão, faturamento e desempenho.','','ti-chart-bar'],
    ['Segurança & LGPD','Permissões granulares, 2FA e conformidade LGPD.','','ti-lock']
  ];
  document.getElementById('grid-modulos').innerHTML = modulos.map(function(m,i){
    var feat = (i===0) ? ' md:col-span-2' : '';
    var badge = m[2] ? '<span class="absolute top-5 right-5 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full txt-forte" style="background:linear-gradient(100deg,#4a78b0,#080b6c)">'+m[2]+'</span>' : '';
    return '<div class="group relative bg-white rounded-3xl p-7 border border-slate-200 hover:border-blue-300 hover:shadow-[0_24px_60px_-30px_rgba(37,99,235,.5)] hover:-translate-y-1 transition-all'+feat+'">'
      + badge
      + '<div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 txt-forte" style="background:linear-gradient(135deg,#4a78b0,#080b6c)"><i class="ti '+m[3]+' text-2xl"></i></div>'
      + '<h4 class="text-lg font-bold text-slate-900 mb-2">'+m[0]+'</h4>'
      + '<p class="txt-fraco text-sm leading-relaxed">'+m[1]+'</p>'
      + '</div>';
  }).join('');

  // Cargo e porte dependem do segmento, mesma tabela do resto do site.
  var AP_SEGMENTOS = <?php echo wp_json_encode( se_segmentos_para_js() ); ?>;

  function apPreencher(select, opcoes){
    select.innerHTML = '';
    var vazio = document.createElement('option');
    vazio.value = ''; vazio.disabled = true; vazio.selected = true; vazio.textContent = 'Selecione...';
    select.appendChild(vazio);
    opcoes.forEach(function(o){
      var op = document.createElement('option');
      op.value = o; op.textContent = o;
      select.appendChild(op);
    });
  }

  document.addEventListener('change', function(e){
    if (!e.target || e.target.name !== 'ap_segmento') return;
    var s = AP_SEGMENTOS[e.target.value];
    if (!s) return;
    apPreencher(document.getElementById('ap_cargo'), s.cargos);
    apPreencher(document.getElementById('ap_alunos'), s.porte);
    document.getElementById('ap_instituicao').placeholder =
      e.target.value === 'cursos-online' ? 'Nome da escola ou empresa' : 'Nome da instituição';
  });

  // Envio do lead (RD Station + redireciona ao WhatsApp), mesmo endpoint do site
  function enviarLeadApresentacao(e){
    e.preventDefault();
    if (document.getElementById('ap_hp').value !== '') return; // honeypot
    var btn = document.getElementById('ap_btn');
    var marcado = document.querySelector('input[name="ap_segmento"]:checked');
    var slug = marcado ? marcado.value : '';
    var seg = AP_SEGMENTOS[slug] || { rotulo: '', porte_rotulo: 'Porte' };

    var dados = {
      action: 'registrar_lead_crm',
      nome: document.getElementById('ap_nome').value || '',
      instituicao: document.getElementById('ap_instituicao').value || '',
      segmento: seg.rotulo,
      segmento_slug: slug,
      cargo: document.getElementById('ap_cargo').value || '',
      alunos: document.getElementById('ap_alunos').value || '',
      porte_rotulo: seg.porte_rotulo,
      whatsapp: document.getElementById('ap_whatsapp').value || '',
      email: document.getElementById('ap_email').value || '',
      consentimento: document.getElementById('ap_lgpd').checked ? '1' : ''
    };
    btn.disabled = true; btn.textContent = 'Enviando...';

    fetch(AP_AJAX, { method:'POST', headers:{'Content-Type':'application/x-www-form-urlencoded'}, body:new URLSearchParams(dados) })
      .then(function(r){ return r.ok ? r.json() : { success:false }; })
      .catch(function(){ return { success:false }; })
      .then(function(resposta){
        // Não fingir sucesso: se o CRM recusou, o lead segue para o WhatsApp com aviso.
        if (!resposta || resposta.success !== true) {
          var aviso = document.getElementById('ap_aviso');
          if (aviso) aviso.classList.remove('hidden');
        }
        document.getElementById('form-apresentacao').classList.add('hidden');
        document.getElementById('ap_sucesso').classList.remove('hidden');
        var msg = 'Olá! Meu nome é '+dados.nome+', sou '+dados.cargo+' em '+dados.instituicao+' ('+dados.segmento+'). '+dados.porte_rotulo+': '+dados.alunos+'. Gostaria de uma demonstração do Send Educacional.';
        setTimeout(function(){ window.open('https://api.whatsapp.com/send?phone='+AP_ZAP+'&text='+encodeURIComponent(msg), '_blank'); fecharDemo(); }, 1200);
      });
  }

  // reveal on scroll
  var io = new IntersectionObserver(function(es){ es.forEach(function(e){ if(e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target);} }); },{threshold:.12});
  document.querySelectorAll('.reveal').forEach(function(el){ io.observe(el); });
</script>
<?php wp_footer(); ?>
</body>
</html>
