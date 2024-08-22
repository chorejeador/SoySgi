<link href="<?= base_url("assets/js/vendor/quill/quill.snow.css") ?>" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/js/vendor/dropzone/dropzone.css') ?>" type="text/css">
<script src="<?= base_url('assets/js/vendor/quill/quill.min.js') ?>"></script>
<script src="<?= base_url('assets/js/vendor/dropzone/dropzone-min.js') ?>"></script>
<script>
	Dropzone.autoDiscover = false;
	window.addEventListener('DOMContentLoaded', function () {
		document.getElementById('nombre-pagina').textContent = 'Nueva Publicación';
		const toolbarOptions = [
			[{'size': ['small', false, 'large']}],
			['bold', 'italic', 'underline', 'strike'],
			[{'list': 'ordered'}, {'list': 'bullet'}, {'list': 'check'}],
			[{'indent': '-1'}, {'indent': '+1'}],
			[{'direction': 'rtl'}],
		];
		const quill = new Quill("#idDescripcion", {
			modules: {
				toolbar: toolbarOptions
			},
			theme: 'snow',
			placeholder: 'Escriba el contenido de la nueva publicación....'
		});
		const myDropzone = new Dropzone(".my-dropzone", {
			url: "<?= base_url('index.php/guardarPublicacion') ?>",
			acceptedFiles: 'image/*',
			autoProcessQueue: false,
		});
		document.getElementById('btnGuardar').addEventListener('click', function () {
			if (!validateForm()) return;
			const data = new FormData();
			data.append("txtTitulo", document.getElementById("txtTitulo").value);
			data.append("txtSubtitulo", document.getElementById("txtSubtitulo").value);
			data.append("descripcion", quill.root.innerHTML.trim());

			myDropzone.files.forEach(function (file, index) {
				data.append('file[]', file);
			});
			$.ajax({
				type: "POST",
				url: "<?= base_url('index.php/guardarPublicacion') ?>",
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				success: function (response) {
					const parsed = JSON.parse(response);
					Swal.fire({
						type: parsed.type,
						title: "Información",
						text: parsed.text,
						allowOutsideClick: false,
						confirmButtonText: "Aceptar"
					}).then(() => {
						if (parsed.status) {
							window.location.href = '<?= base_url('index.php/publicacion') ?>';
						}
					});
				},
				error: function (xhr, status, error) {
					Swal.fire({
						type: "error",
						title: "Error",
						text: "Ocurrió un error al guardar la publicación.",
						allowOutsideClick: false,
						confirmButtonText: "Aceptar"
					});
				}
			});
		});

		function validateForm() {
			const titulo = document.getElementById("txtTitulo").value;
			const subtitulo = document.getElementById("txtSubtitulo").value;
			const descripcion = quill.root.innerHTML.trim();

			if (!titulo || !subtitulo || !descripcion) {
				Swal.fire({
					type: "warning",
					title: "Campos obligatorios",
					text: "Por favor complete todos los campos obligatorios.",
					confirmButtonText: "Aceptar"
				});
				return false;
			}
			return true;
		}
	})

</script>
