<script>
	// const BASE_URL = "https://localhost/SoySgi/";

	document.addEventListener('contextmenu', e => {
		e.preventDefault();
	});
	document.addEventListener('keydown', function (e) {

		if (e.ctrlKey && ['u'].includes(e.key.toLowerCase())) {
			e.preventDefault();
			if (e.key === 'u') {
				e.preventDefault();

			}
			return
		}

		if (
			(e.ctrlKey && ['s', 'p'].includes(e.key.toLowerCase())) ||
			e.key === 'F12'
		) {
			e.preventDefault();
			if (e.key === 'F12') {

			}
		}
	});


	document.addEventListener('DOMContentLoaded', () => {
		const backButton = document.getElementById('backButton');
		const menu = document.getElementById('documentMenu');
		const iframe = document.getElementById('pdfIframe');

		menu.addEventListener('click', e => {
			const item = e.target.closest('a[data-file]');
			if (!item) return;
			e.preventDefault();
			const file = item.getAttribute('data-file');
			const url = `${BASE_URL}assets/pdfjs/web/viewer.html?file=${BASE_URL}index.php/obtenerPdf/${file}#disableDownload=true`;
			iframe.src = url;

			menu.querySelectorAll('a').forEach(el => el.classList.remove('active'));
			item.classList.add('active');
		});


		const printButton = document.getElementById('printButton');
		if (printButton) {
			printButton.style.display = 'none';
		} else {
			console.warn('El botón de impresión no existe, pero se forzará su ocultamiento.');
			const hiddenButton = document.createElement('button');
			hiddenButton.id = 'printButton';
			hiddenButton.style.display = 'none';
			document.body.appendChild(hiddenButton);
		}

		backButton.addEventListener('click', () => {
			// Redirige siempre a la vista docGeneral
			const url = backButton.getAttribute('data-back-url');
			window.location.href = url;
		});

	})
</script>
