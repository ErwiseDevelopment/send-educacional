<div id="demo-modal" class="hidden fixed inset-0 z-[100] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity" onclick="document.getElementById('demo-modal').classList.add('hidden')"></div>

        <div class="relative inline-block align-middle bg-white rounded-[2.5rem] text-left shadow-2xl transform transition-all sm:my-8 sm:max-w-xl sm:w-full overflow-hidden border border-slate-100">
            
            <button onclick="document.getElementById('demo-modal').classList.add('hidden')" class="absolute top-8 right-8 text-slate-400 hover:text-slate-600 transition-colors z-20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div class="px-10 pt-12 pb-12">
                <div class="mb-10 text-center md:text-left">
                    <h3 class="text-3xl font-extrabold text-slate-900 tracking-tight" id="modal-title">Agendar demonstração</h3>
                    <p class="text-slate-500 mt-2 font-medium">Preencha os campos para filtrarmos o melhor consultor para você.</p>
                </div>
                
                <form id="form-conversao" class="grid grid-cols-1 md:grid-cols-2 gap-6" onsubmit="enviarLead(event)">
                    
                    <div style="display:none;">
                        <input type="text" id="hp_username">
                    </div>

                    <div class="relative col-span-2">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-slate-400 absolute -top-2 left-4 bg-white px-2 z-10">Nome Completo</label>
                        <input type="text" id="lead_nome" required class="w-full border-2 border-slate-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-blue-600 transition-all bg-slate-50/50 font-medium text-slate-800">
                    </div>

                    <div class="relative col-span-2">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-slate-400 absolute -top-2 left-4 bg-white px-2 z-10">Nome da Instituição</label>
                        <input type="text" id="lead_instituicao" required class="w-full border-2 border-slate-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-blue-600 transition-all bg-slate-50/50 font-medium text-slate-800">
                    </div>

                    <div class="relative col-span-2 md:col-span-1">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-slate-400 absolute -top-2 left-4 bg-white px-2 z-10">WhatsApp</label>
                        <input type="tel" id="lead_whatsapp" required class="w-full border-2 border-slate-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-blue-600 transition-all bg-slate-50/50 font-medium text-slate-800" placeholder="(11) 99999-9999">
                    </div>

                    <div class="relative col-span-2 md:col-span-1">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-slate-400 absolute -top-2 left-4 bg-white px-2 z-10">E-mail</label>
                        <input type="email" id="lead_email" required class="w-full border-2 border-slate-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-blue-600 transition-all bg-slate-50/50 font-medium text-slate-800" placeholder="e-mail@escola.com">
                    </div>

                    <div class="relative col-span-2 md:col-span-1">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-slate-400 absolute -top-2 left-4 bg-white px-2 z-10">Seu Cargo</label>
                        <select id="lead_cargo" required class="w-full border-2 border-slate-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-blue-600 transition-all bg-slate-50/50 font-medium text-slate-800 appearance-none">
                            <option value="" disabled selected>Selecione...</option>
                            <option value="Diretor / Mantenedor">Diretor / Mantenedor</option>
                            <option value="Coordenador">Coordenador</option>
                            <option value="Secretário(a)">Secretário(a)</option>
                            <option value="TI / Gestor">TI / Gestor</option>
                        </select>
                    </div>

                    <div class="relative col-span-2 md:col-span-1">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-slate-400 absolute -top-2 left-4 bg-white px-2 z-10">Qtd. de Alunos</label>
                        <select id="lead_alunos" required class="w-full border-2 border-slate-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-blue-600 transition-all bg-slate-50/50 font-medium text-slate-800 appearance-none">
                            <option value="" disabled selected>Selecione...</option>
                            <option value="Até 200">Até 200</option>
                            <option value="201 a 500">201 a 500</option>
                            <option value="501 a 1000">501 a 1000</option>
                            <option value="Mais de 1000">Mais de 1000</option>
                        </select>
                    </div>

                    <button type="submit" id="btn_enviar" class="col-span-2 bg-blue-600 text-white font-extrabold py-5 rounded-[1.5rem] hover:bg-blue-700 transition-all shadow-xl shadow-blue-500/30 flex justify-center items-center gap-3 text-lg group">
                        <span>Falar com um Especialista</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                    
                    <p class="col-span-2 text-[10px] text-slate-400 text-center uppercase tracking-widest font-bold mt-2">
                        <span class="inline-flex items-center justify-center gap-1.5">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Dados protegidos pela LGPD
                        </span>
                    </p>
                </form>

                <div id="sucesso_container" class="hidden text-center py-10 animate-[fadeIn_0.5s]">
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

<script>
    function enviarLead(e) {
    e.preventDefault();
    
    if(document.getElementById('hp_username').value !== "") return;

    // Buscando na hora exata do clique para garantir que não seja null
    const btn = document.getElementById('btn_enviar');
    const formContainer = document.getElementById('form-conversao');
    const sucessoContainer = document.getElementById('sucesso_container');

    const dados = {
        nome: document.getElementById('lead_nome')?.value || '',
        instituicao: document.getElementById('lead_instituicao')?.value || '',
        cargo: document.getElementById('lead_cargo')?.value || '',
        alunos: document.getElementById('lead_alunos')?.value || '',
        whatsapp: document.getElementById('lead_whatsapp')?.value || '',
        email: document.getElementById('lead_email')?.value || '',
        action: 'registrar_lead_crm'
    };

    btn.disabled = true;
    btn.innerHTML = 'Enviando...';

    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
        body: new URLSearchParams(dados)
    }).finally(() => {
        // Proteção extra: só executa se o elemento existir
        if(formContainer) formContainer.classList.add('hidden');
        if(sucessoContainer) sucessoContainer.classList.remove('hidden');

        const texto = `Olá! Meu nome é ${dados.nome}, sou ${dados.cargo} na instituição ${dados.instituicao}. Temos cerca de ${dados.alunos} alunos e gostaria de uma demonstração.`;
        const zapUrl = `https://api.whatsapp.com/send?phone=5511937049755&text=${encodeURIComponent(texto)}`;

        setTimeout(() => {
            window.open(zapUrl, '_blank');
            document.getElementById('demo-modal')?.classList.add('hidden');
        }, 1200);
    });
}
</script>