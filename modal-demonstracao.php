<?php
/**
 * Modal de demonstração, porta única de conversão do site.
 *
 * O campo "Tipo de instituição" é o primeiro por um motivo: o site atende três
 * segmentos e sem ele é impossível rotear o lead para o consultor certo.
 * Cargo e porte mudam conforme o segmento escolhido (as listas vêm de
 * inc/segmentos.php, para não haver duas verdades).
 */
if ( ! defined( 'ABSPATH' ) ) exit;

$md_segmentos = se_segmentos();
?>
<div id="demo-modal" class="hidden fixed inset-0 z-[100] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity" onclick="fecharDemo()"></div>

        <div class="relative inline-block align-middle bg-white rounded-[2.5rem] text-left shadow-2xl transform transition-all sm:my-8 sm:max-w-xl sm:w-full overflow-hidden border border-slate-100">

            <button onclick="fecharDemo()" class="absolute top-8 right-8 text-slate-400 hover:text-slate-600 transition-colors z-20" aria-label="Fechar">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div class="px-8 md:px-10 pt-12 pb-12">
                <div class="mb-8 text-center md:text-left">
                    <h3 class="text-3xl font-extrabold text-slate-900 tracking-tight" id="modal-title">Agendar demonstração</h3>
                    <p class="text-slate-500 mt-2 font-medium">Comece pelo tipo de instituição: é assim que direcionamos você ao consultor daquele segmento.</p>
                </div>

                <form id="form-conversao" class="grid grid-cols-1 md:grid-cols-2 gap-6" onsubmit="enviarLead(event)">

                    <div style="display:none;" aria-hidden="true">
                        <input type="text" id="hp_username" tabindex="-1" autocomplete="off">
                    </div>

                    <!-- SEGMENTO: sem ele não há como rotear o lead -->
                    <fieldset class="col-span-2">
                        <legend class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-3">Tipo de instituição</legend>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                            <?php foreach ( $md_segmentos as $md_slug => $md_s ) : ?>
                                <label class="lead-seg-opt relative flex flex-col justify-center cursor-pointer rounded-2xl border-2 border-slate-100 bg-slate-50/50 px-4 py-3.5 transition-all hover:border-slate-200">
                                    <input type="radio" name="lead_segmento" value="<?php echo esc_attr( $md_slug ); ?>" required class="sr-only peer">
                                    <span class="text-sm font-bold text-slate-800 leading-tight"><?php echo esc_html( $md_s['curto'] ); ?></span>
                                    <span class="text-[11px] text-slate-500 leading-snug mt-0.5"><?php echo esc_html( $md_s['publico'] ); ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </fieldset>

                    <div class="relative col-span-2">
                        <label for="lead_nome" class="text-[10px] font-bold uppercase tracking-widest text-slate-400 absolute -top-2 left-4 bg-white px-2 z-10">Nome completo</label>
                        <input type="text" id="lead_nome" required class="w-full border-2 border-slate-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-blue-600 transition-all bg-slate-50/50 font-medium text-slate-800">
                    </div>

                    <div class="relative col-span-2">
                        <label for="lead_instituicao" class="text-[10px] font-bold uppercase tracking-widest text-slate-400 absolute -top-2 left-4 bg-white px-2 z-10" id="rot_instituicao">Nome da instituição</label>
                        <input type="text" id="lead_instituicao" required class="w-full border-2 border-slate-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-blue-600 transition-all bg-slate-50/50 font-medium text-slate-800">
                    </div>

                    <div class="relative col-span-2 md:col-span-1">
                        <label for="lead_whatsapp" class="text-[10px] font-bold uppercase tracking-widest text-slate-400 absolute -top-2 left-4 bg-white px-2 z-10">WhatsApp</label>
                        <input type="tel" id="lead_whatsapp" required class="w-full border-2 border-slate-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-blue-600 transition-all bg-slate-50/50 font-medium text-slate-800" placeholder="(11) 99999-9999">
                    </div>

                    <div class="relative col-span-2 md:col-span-1">
                        <label for="lead_email" class="text-[10px] font-bold uppercase tracking-widest text-slate-400 absolute -top-2 left-4 bg-white px-2 z-10">E-mail</label>
                        <input type="email" id="lead_email" required class="w-full border-2 border-slate-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-blue-600 transition-all bg-slate-50/50 font-medium text-slate-800" placeholder="voce@suainstituicao.com.br">
                    </div>

                    <div class="relative col-span-2 md:col-span-1">
                        <label for="lead_cargo" class="text-[10px] font-bold uppercase tracking-widest text-slate-400 absolute -top-2 left-4 bg-white px-2 z-10">Seu cargo</label>
                        <select id="lead_cargo" required class="w-full border-2 border-slate-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-blue-600 transition-all bg-slate-50/50 font-medium text-slate-800 appearance-none">
                            <option value="" disabled selected>Escolha o segmento antes</option>
                        </select>
                    </div>

                    <div class="relative col-span-2 md:col-span-1">
                        <label for="lead_alunos" class="text-[10px] font-bold uppercase tracking-widest text-slate-400 absolute -top-2 left-4 bg-white px-2 z-10" id="rot_alunos">Porte</label>
                        <select id="lead_alunos" required class="w-full border-2 border-slate-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-blue-600 transition-all bg-slate-50/50 font-medium text-slate-800 appearance-none">
                            <option value="" disabled selected>Escolha o segmento antes</option>
                        </select>
                    </div>

                    <!-- Consentimento de verdade: selo não é base legal. -->
                    <label class="col-span-2 flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" id="lead_lgpd" required class="mt-0.5 w-5 h-5 shrink-0 rounded-md border-2 border-slate-200 text-blue-600 focus:ring-blue-500 focus:ring-offset-0">
                        <span class="text-xs text-slate-500 leading-relaxed">
                            Autorizo a Send a usar os dados acima para entrar em contato comigo sobre o Send Educacional, conforme a
                            <a href="<?php echo esc_url( home_url( '/privacidade' ) ); ?>" target="_blank" rel="noopener" class="text-blue-600 font-semibold underline">Política de Privacidade</a>.
                            Posso pedir a exclusão a qualquer momento.
                        </span>
                    </label>

                    <button type="submit" id="btn_enviar" class="col-span-2 bg-blue-600 text-white font-extrabold py-5 rounded-[1.5rem] hover:bg-blue-700 transition-all shadow-xl shadow-blue-500/30 flex justify-center items-center gap-3 text-lg group">
                        <span>Falar com um especialista</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </form>

                <div id="sucesso_container" class="hidden text-center py-10 animate-[fadeIn_0.5s]">
                    <p id="aviso_registro" class="hidden text-sm text-amber-500 font-bold mb-4">
                        Não conseguimos registrar seus dados automaticamente, mas seu contato não se perdeu: estamos te levando direto para o especialista.
                    </p>
                    <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <h3 class="text-3xl font-bold text-slate-900">Perfeito!</h3>
                    <p class="text-slate-600 mt-3">Estamos te redirecionando para o consultor especialista...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .lead-seg-opt:has(input:checked) { border-color:#4a78b0; background:#f1f4f9; box-shadow:0 0 0 4px rgba(37,99,235,.12); }
    .lead-seg-opt input:focus-visible + span { outline:2px solid #4a78b0; outline-offset:2px; }
</style>

<script>
(function () {
    var SEGMENTOS = <?php echo wp_json_encode( se_segmentos_para_js() ); ?>;

    function preencher(select, opcoes, placeholder) {
        select.innerHTML = '';
        var vazio = document.createElement('option');
        vazio.value = '';
        vazio.disabled = true;
        vazio.selected = true;
        vazio.textContent = placeholder;
        select.appendChild(vazio);
        opcoes.forEach(function (o) {
            var op = document.createElement('option');
            op.value = o;
            op.textContent = o;
            select.appendChild(op);
        });
    }

    // Cargo e porte só fazem sentido depois do segmento: uma escola não tem
    // "Secretaria acadêmica" e um curso online não conta aluno em faixas de IES.
    function aplicarSegmento(slug) {
        var s = SEGMENTOS[slug];
        if (!s) return;

        preencher(document.getElementById('lead_cargo'), s.cargos, 'Selecione...');
        preencher(document.getElementById('lead_alunos'), s.porte, 'Selecione...');
        document.getElementById('rot_alunos').textContent = s.porte_rotulo;
        document.getElementById('rot_instituicao').textContent =
            slug === 'cursos-online' ? 'Nome da escola ou empresa' : 'Nome da instituição';
    }

    document.addEventListener('change', function (e) {
        if (e.target && e.target.name === 'lead_segmento') aplicarSegmento(e.target.value);
    });

    /** Abre o modal. Passe o slug do segmento para já vir marcado. */
    window.abrirDemo = function (slug) {
        var modal = document.getElementById('demo-modal');
        if (!modal) return;
        if (slug) {
            var radio = modal.querySelector('input[name="lead_segmento"][value="' + slug + '"]');
            if (radio && !radio.checked) { radio.checked = true; aplicarSegmento(slug); }
        }
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    };

    window.fecharDemo = function () {
        var modal = document.getElementById('demo-modal');
        if (!modal) return;
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    };

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') window.fecharDemo();
    });

    window.enviarLead = function (e) {
        e.preventDefault();

        if (document.getElementById('hp_username').value !== '') return;

        var btn = document.getElementById('btn_enviar');
        var formContainer = document.getElementById('form-conversao');
        var sucessoContainer = document.getElementById('sucesso_container');
        var marcado = document.querySelector('input[name="lead_segmento"]:checked');
        var slug = marcado ? marcado.value : '';

        var dados = {
            nome: document.getElementById('lead_nome').value || '',
            instituicao: document.getElementById('lead_instituicao').value || '',
            segmento: SEGMENTOS[slug] ? SEGMENTOS[slug].rotulo : '',
            segmento_slug: slug,
            cargo: document.getElementById('lead_cargo').value || '',
            alunos: document.getElementById('lead_alunos').value || '',
            porte_rotulo: SEGMENTOS[slug] ? SEGMENTOS[slug].porte_rotulo : '',
            whatsapp: document.getElementById('lead_whatsapp').value || '',
            email: document.getElementById('lead_email').value || '',
            consentimento: document.getElementById('lead_lgpd').checked ? '1' : '',
            action: 'registrar_lead_crm'
        };

        btn.disabled = true;
        btn.innerHTML = 'Enviando...';

        fetch('<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams(dados)
        }).then(function (r) {
            return r.ok ? r.json() : { success: false };
        }).catch(function () {
            return { success: false };
        }).then(function (resposta) {
            // O lead não pode ser perdido: mesmo se o CRM recusar, seguimos para o
            // WhatsApp, mas avisando, em vez de fingir que deu tudo certo.
            if (!resposta || resposta.success !== true) {
                var aviso = document.getElementById('aviso_registro');
                if (aviso) aviso.classList.remove('hidden');
            }

            if (formContainer) formContainer.classList.add('hidden');
            if (sucessoContainer) sucessoContainer.classList.remove('hidden');

            var texto = 'Olá! Meu nome é ' + dados.nome + ', sou ' + dados.cargo + ' em ' + dados.instituicao +
                ' (' + dados.segmento + '). ' + dados.porte_rotulo + ': ' + dados.alunos + '. Gostaria de uma demonstração.';
            var zapUrl = 'https://api.whatsapp.com/send?phone=<?php echo esc_js( se_whatsapp_num() ); ?>&text=' + encodeURIComponent(texto);

            setTimeout(function () {
                window.open(zapUrl, '_blank');
                window.fecharDemo();
            }, 1200);
        });
    };
})();
</script>
