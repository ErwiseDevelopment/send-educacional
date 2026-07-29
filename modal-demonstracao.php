<?php
/**
 * Modal de demonstração, porta única de conversão do site.
 *
 * O campo "Tipo de instituição" é o primeiro por um motivo: o site atende três
 * segmentos e sem ele é impossível rotear o lead para o consultor certo.
 * Cargo e porte mudam conforme o segmento escolhido (as listas vêm de
 * inc/segmentos.php, para não haver duas verdades).
 *
 * Visual: o modal abria como um cartão branco anônimo, sem nada que dissesse
 * que era o mesmo site. Agora tem a faixa da marca no topo, com a logo, e usa
 * os mesmos campos e botões do resto das páginas.
 */
if ( ! defined( 'ABSPATH' ) ) exit;

$md_segmentos = se_segmentos();
?>
<div id="demo-modal" class="hidden fixed inset-0 z-[100] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="flex items-center justify-center min-h-screen p-4 sm:p-6">
        <div class="fixed inset-0 se-modal-fundo" onclick="fecharDemo()"></div>

        <div class="sup-clara relative w-full sm:max-w-lg rounded-[1.75rem] text-left overflow-hidden se-modal-caixa">

            <!-- faixa da marca: é o que diz, de cara, que você continua no Send -->
            <div class="sup-escura relative px-7 pt-7 pb-6" style="background:#080b6c">
                <div class="absolute -top-16 -right-12 w-52 h-52 rounded-full blur-3xl pointer-events-none" style="background:rgba(74,120,176,.6)"></div>

                <button onclick="fecharDemo()" class="absolute top-5 right-5 z-20 w-9 h-9 rounded-full flex items-center justify-center txt hover-forte transition-colors" style="background:rgba(255,255,255,.14)" aria-label="Fechar">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <img src="<?php echo esc_url( se_logo_url() ); ?>" alt="Send Educacional" class="h-7 w-auto object-contain relative z-10 mb-5">

                <h3 class="titulo text-[1.6rem] leading-tight relative z-10" id="modal-title">Agendar demonstração</h3>
                <p class="txt text-[14px] leading-relaxed mt-2 relative z-10 max-w-sm">
                    Comece pelo tipo de instituição: é assim que direcionamos você ao consultor daquele segmento.
                </p>
            </div>

            <div class="px-7 py-7">
                <form id="form-conversao" class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-5" onsubmit="enviarLead(event)">

                    <div style="display:none;" aria-hidden="true">
                        <input type="text" id="hp_username" tabindex="-1" autocomplete="off">
                    </div>

                    <fieldset class="col-span-2">
                        <legend class="se-rotulo mb-2.5">Tipo de instituição</legend>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                            <?php foreach ( $md_segmentos as $md_slug => $md_s ) : ?>
                                <label class="se-seg-opt">
                                    <input type="radio" name="lead_segmento" value="<?php echo esc_attr( $md_slug ); ?>" required class="sr-only">
                                    <span class="se-seg-marca" style="background:<?php echo esc_attr( $md_s['cor_bloco'] ); ?>"></span>
                                    <span class="block text-[13.5px] font-bold txt-forte leading-tight"><?php echo esc_html( $md_s['curto'] ); ?></span>
                                    <span class="block text-[11px] txt-fraco leading-snug mt-1"><?php echo esc_html( $md_s['publico'] ); ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </fieldset>

                    <div class="col-span-2">
                        <label for="lead_nome" class="se-rotulo">Nome completo</label>
                        <input type="text" id="lead_nome" required class="se-campo w-full rounded-xl px-4 py-3 mt-1.5 focus:outline-none transition-colors">
                    </div>

                    <div class="col-span-2">
                        <label for="lead_instituicao" class="se-rotulo" id="rot_instituicao">Nome da instituição</label>
                        <input type="text" id="lead_instituicao" required class="se-campo w-full rounded-xl px-4 py-3 mt-1.5 focus:outline-none transition-colors">
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="lead_whatsapp" class="se-rotulo">WhatsApp</label>
                        <input type="tel" id="lead_whatsapp" required placeholder="(11) 99999-9999" class="se-campo w-full rounded-xl px-4 py-3 mt-1.5 focus:outline-none transition-colors">
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="lead_email" class="se-rotulo">E-mail</label>
                        <input type="email" id="lead_email" required placeholder="voce@suainstituicao.com.br" class="se-campo w-full rounded-xl px-4 py-3 mt-1.5 focus:outline-none transition-colors">
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="lead_cargo" class="se-rotulo">Seu cargo</label>
                        <select id="lead_cargo" required class="se-campo se-select w-full rounded-xl px-4 py-3 mt-1.5 focus:outline-none transition-colors">
                            <option value="" disabled selected>Escolha o segmento antes</option>
                        </select>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="lead_alunos" class="se-rotulo" id="rot_alunos">Porte</label>
                        <select id="lead_alunos" required class="se-campo se-select w-full rounded-xl px-4 py-3 mt-1.5 focus:outline-none transition-colors">
                            <option value="" disabled selected>Escolha o segmento antes</option>
                        </select>
                    </div>

                    <label class="col-span-2 flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" id="lead_lgpd" required class="se-check mt-0.5 shrink-0">
                        <span class="text-[12.5px] txt-fraco leading-relaxed">
                            Autorizo a Send a usar os dados acima para entrar em contato comigo sobre o Send Educacional, conforme a
                            <a href="<?php echo esc_url( home_url( '/privacidade' ) ); ?>" target="_blank" rel="noopener" class="txt-link font-semibold underline">Política de Privacidade</a>.
                            Posso pedir a exclusão a qualquer momento.
                        </span>
                    </label>

                    <button type="submit" id="btn_enviar" class="col-span-2 gbtn font-bold py-4 rounded-xl flex justify-center items-center gap-2.5 text-[15px] group transition-all hover:-translate-y-0.5">
                        <span>Falar com um especialista</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>

                    <p class="col-span-2 text-center text-[11px] txt-fraco -mt-1">
                        Gratuita e sem compromisso. Respondemos em até um dia útil.
                    </p>
                </form>

                <div id="sucesso_container" class="hidden text-center py-8 animate-[fadeIn_0.5s]">
                    <p id="aviso_registro" class="hidden text-sm text-amber-600 font-bold mb-4">
                        Não conseguimos registrar seus dados automaticamente, mas seu contato não se perdeu: estamos te levando direto para o especialista.
                    </p>
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-5" style="background:rgba(74,120,176,.14)">
                        <svg class="w-8 h-8 txt-link" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <h3 class="titulo text-2xl">Perfeito!</h3>
                    <p class="txt mt-2">Estamos te redirecionando para o consultor especialista...</p>
                </div>
            </div>
        </div>
    </div>
</div>

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
