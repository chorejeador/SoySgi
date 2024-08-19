<link href="<?= base_url("assets/js/vendor/quill/quill.snow.css") ?>" rel="stylesheet">
<script src="<?= base_url('assets/js/vendor/quill/quill.min.js') ?>"></script>
<script>
	$(document).ready(function () {
		const id = inicializarValores();
		const quill = new Quill("#idDescripcion", {
			modules: {
				toolbar: toolbarOptions
			},
			theme: 'snow',
			placeholder: 'Escriba el contenido de la nueva publicación....',
		});
		$("#formGuardarPublicacion").on('submit', function (e) {
			e.preventDefault();
			let descripcion = quill.root.innerHTML.trim();
			let formData = new FormData(this);
			formData.append('descripcion', descripcion);
			formData.append('id', id);
			$.ajax({
				type: "POST",
				url: "<?= base_url('index.php/actualizarInformacionPublicacion') ?>",
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
		});
	});

	const toolbarOptions = [
		[{'size': ['small', false, 'large']}],
		['bold', 'italic', 'underline', 'strike'],
		[{'list': 'ordered'}, {'list': 'bullet'}, {'list': 'check'}],
		[{'indent': '-1'}, {'indent': '+1'}],
		[{'direction': 'rtl'}],
	];

	function inicializarValores() {
		$("#nombre-pagina").text('Editar publicación');
		let publicacion = <?php echo json_encode($publicacion, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;

		$("#txtTitulo").val(publicacion.Titulo);
		$("#txtSubtitulo").val(publicacion.Subtitulo);

		let img = document.getElementById('idImagen');
		img.src = '../../uploads/Publicaciones/' + publicacion.ImagePath;
		$("#idContenedorImagen").removeClass('d-none');

		let descripcion = document.getElementById('idDescripcion');
		descripcion.innerHTML = publicacion.Descripcion;

		return publicacion.Id;
	}


</script>
