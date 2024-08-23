<link rel="stylesheet" href="<?= base_url('assets/js/vendor/venoBox/venobox.css') ?>">
<script src="<?= base_url('assets/js/vendor/jquery-3.3.1.min.js') ?>"></script>
<script src="<?= base_url('assets/js/vendor/venoBox/venobox.min.js') ?>"></script>
<script>
	$(document).ready(function () {
		const numCols = 3;
		const masonryCon = document.querySelector('.boxes-con');
		const list = document.querySelectorAll('.boxes');

		for (var i = 1; i <= numCols; i++) {
			let elem = document.createElement('div');
			elem.classList.add('sub');
			elem.classList.add('box' + i);
			masonryCon.appendChild(elem);
		}

		const thearray = [...Array(numCols).keys()];
		const themainarray = [];
		let timesBy;

		if (list.length % numCols === 0) {
			timesBy = Math.floor(list.length / numCols);
		} else {
			timesBy = Math.ceil(list.length / numCols);
		}

		for (var j = 0; j < timesBy; j++) {
			themainarray.push(...thearray);
		}

		const subs = document.querySelectorAll('.sub');

		for (var b = 0; b < Math.min(themainarray.length, list.length); b++) {
			const sub = subs[themainarray[b]];
			const item = list[b];
			if (sub && item) {
				sub.appendChild(item);
			} else {
				console.warn('Elemento no válido:', sub, item);
			}
		}

		function pageWidth() {
			return window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
		}

		const width = pageWidth();
		$('.venobox').venobox({
			numeration: true,
			infinigall: true,
			share: true,
			spinner: 'rotating-plane',
			fitView: true,
			zoom: true
		});
	});


</script>
