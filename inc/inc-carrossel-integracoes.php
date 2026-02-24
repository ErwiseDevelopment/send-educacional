<?php
/**
 * Componente: Hub de Integrações
 * Local: inc/inc-carrossel-integracoes.php
 */
?>

<style>
    /* Estilo do Topo do Hub */
    .hub-header {
        text-align: center;
        margin-bottom: 20px;
        padding: 0 20px;
    }

    .hub-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        background: #eff6ff;
        border: 1px solid #dbeafe;
        border-radius: 99px;
        color: #2563eb;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 16px;
    }

    .hub-title {
        font-size: 32px;
        font-weight: 900;
        color: #0f172a;
        letter-spacing: -1px;
        line-height: 1.1;
    }

    .hub-subtitle {
        color: #64748b;
        max-width: 600px;
        margin: 12px auto 0;
        font-size: 16px;
        line-height: 1.5;
    }

    /* Estrutura do Marquee */
    .marquee-wrapper {
        position: relative;
        overflow: hidden;
        background: white;
        padding: 20px 0 60px;
    }

    .marquee-wrapper::before,
    .marquee-wrapper::after {
        content: "";
        position: absolute;
        top: 0;
        width: 150px;
        height: 100%;
        z-index: 2;
        pointer-events: none;
    }

    .marquee-wrapper::before { left: 0; background: linear-gradient(to right, white, transparent); }
    .marquee-wrapper::after { right: 0; background: linear-gradient(to left, white, transparent); }

    .marquee-track {
        display: flex;
        width: max-content;
        gap: 24px;
        animation: marquee-scroll 40s linear infinite;
    }

    .marquee-track:hover { animation-play-state: paused; }

    @keyframes marquee-scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .integration-card {
        flex-shrink: 0;
        width: 200px;
        height: 110px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        border: 1px solid #f1f5f9;
        border-radius: 1.5rem;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        filter: grayscale(100%);
        padding: 20px;
    }

    .integration-card:hover {
        filter: grayscale(0%);
        background: white;
        border-color: #dbeafe;
        box-shadow: 0 15px 30px -10px rgba(37, 99, 235, 0.1);
        transform: translateY(-5px);
    }

    .integration-logo {
        max-width: 100%;
        
        object-fit: contain;
    }
</style>

<div class="hub-header">
    <div class="hub-badge">
        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 12h3v9h6v-6h4v6h6v-9h3L12 2z"/></svg>
        Ecossistema Conectado
    </div>
    <h2 class="hub-title">Hub de <span style="color: #2563eb;">Integrações</span></h2>
    <p class="hub-subtitle">
        O Send Educacional conecta-se nativamente com as melhores ferramentas do mercado para potencializar a sua gestão.
    </p>
</div>

<div class="marquee-wrapper">
    <div class="marquee-track">
        
        <?php 
        $integracoes = [
            'Marktel'          => 'marktel',
            'Asaas'            => 'asaas',
            'Biblioteca a+'    => 'biblioteca',
            'Aluno Digital'    => 'aluno',
            'Getnet'           => 'getnet',
            'CRM Educacional'  => 'crm',
            'Moodle'           => 'moodle',
            'Contracktor'      => 'contracktor',
            'Whatsapp'         => 'whatsapp'
        ];

        $img_path = get_template_directory_uri() . '/src/img/';

        for ($i = 0; $i < 2; $i++) :
            foreach ($integracoes as $nome => $slug) : ?>
                <div class="integration-card group">
                    <img src="<?php echo $img_path . $slug . '.png'; ?>" 
                         alt="<?php echo $nome; ?>" 
                         class="integration-logo"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    
                    <span class="hidden text-slate-400 group-hover:text-blue-600 font-black text-[10px] uppercase tracking-tighter text-center">
                        <?php echo $nome; ?>
                    </span>
                </div>
            <?php endforeach; 
        endfor; ?>

        <div class="integration-card !bg-blue-600 !border-none !filter-none cursor-pointer group shadow-lg shadow-blue-200" 
             onclick="document.getElementById('demo-modal').classList.remove('hidden')">
            <div class="text-white flex flex-col items-center">
                <svg class="w-6 h-6 mb-1 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <span class="text-[9px] font-black uppercase tracking-widest text-center">Sua<br>Integração</span>
            </div>
        </div>

    </div>
</div>