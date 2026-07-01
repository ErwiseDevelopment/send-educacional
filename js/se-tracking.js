/**
 * Coletor de cliques do site (parte visível do tracking).
 * As visitas são gravadas no servidor; aqui tratamos só os cliques.
 *
 * Marca automaticamente:
 *  - qualquer elemento com [data-track="nome"]  -> usa esse nome
 *  - links (<a>) sem data-track                 -> "link: <texto ou destino>"
 *  - botões (<button>) sem data-track           -> "botao: <texto>"
 */
(function () {
	if (typeof window.SE_TRACK === 'undefined') return;

	function label(el) {
		var t = el.closest('[data-track]');
		if (t) return t.getAttribute('data-track');

		var a = el.closest('a');
		if (a) {
			var txt = (a.textContent || '').trim().replace(/\s+/g, ' ').slice(0, 60);
			var href = a.getAttribute('href') || '';
			if (/^https?:\/\//i.test(href)) {
				try { href = new URL(href).host; } catch (e) {}
			}
			return 'link: ' + (txt || href);
		}

		var b = el.closest('button');
		if (b) {
			var bt = (b.textContent || '').trim().replace(/\s+/g, ' ').slice(0, 60);
			return 'botao: ' + (bt || 'sem-rotulo');
		}
		return null;
	}

	function send(name) {
		var payload = new URLSearchParams({
			action: 'se_track_click',
			nonce: SE_TRACK.nonce,
			label: name,
			page: location.pathname + location.search,
			title: document.title
		});

		if (navigator.sendBeacon) {
			var blob = new Blob([payload.toString()], { type: 'application/x-www-form-urlencoded' });
			if (navigator.sendBeacon(SE_TRACK.ajax, blob)) return;
		}
		// Fallback quando sendBeacon não está disponível.
		fetch(SE_TRACK.ajax, {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
			body: payload.toString(),
			keepalive: true
		}).catch(function () {});
	}

	document.addEventListener('click', function (e) {
		var name = label(e.target);
		if (name) send(name);
	}, true);
})();
