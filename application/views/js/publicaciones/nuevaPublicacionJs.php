<link href="<?= base_url("assets/js/vendor/quill/quill.snow.css") ?>" rel="stylesheet">
<script src="<?= base_url('assets/js/vendor/quill/quill.min.js') ?>"></script>
<script>
	$(document).ready(function () {
		$("#nombre-pagina").text('Nueva Publicación');
	});
	const toolbarOptions = [
		[{'size': ['small', false, 'large']}],
		['bold', 'italic', 'underline', 'strike'],
		[{'list': 'ordered'}, {'list': 'bullet'}, {'list': 'check'}],
		[{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
		[{'direction': 'rtl'}],
	];
	const quill = new Quill("#idDescripcion", {
		modules: {
			toolbar: toolbarOptions
		},
		theme: 'snow',
		placeholder: 'Escriba el contenido de la nueva publicación....'
	});
	$("#formGuardarPublicacion").on("submit", function (e) {
		e.preventDefault();
		let descripcion = quill.root.innerHTML.trim();
		let formData = new FormData(this);
		formData.append('descripcion', descripcion);
		$.ajax({
			type: "POST",
			url: "<?= base_url('index.php/guardarPublicacion') ?>",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function (response) {
				let parsed = JSON.parse(response);
				console.log(parsed);
				if (parsed.status) {
					Swal.fire({
						type: parsed.type,
						title: "Información",
						text: parsed.text,
						allowOutsideClick: false,
						confirmButtonText: "Aceptar"
					}).then(() => {
						if (parsed.status) {
							location.href = '<?= base_url('index.php/publicacion') ?>';
						}
					});
				}
			}
		})
	})
</script>
