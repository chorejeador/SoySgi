<link href="<?= base_url("assets/js/vendor/quill/quill.snow.css") ?>" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/js/vendor/dropzone/dropzone.css') ?>" type="text/css">
<script src="<?= base_url('assets/js/vendor/quill/quill.min.js') ?>"></script>
<script src="<?= base_url('assets/js/vendor/dropzone/dropzone-min.js') ?>"></script>
<script>
	window.addEventListener('DOMContentLoaded', function () {
		const publicacionId = inicializarValores();

		const quill = new Quill("#idDescripcion", {
			modules: {toolbar: getToolbarOptions()},
			theme: 'snow',
			placeholder: 'Escriba el contenido de la nueva publicación....',
		});

		const myDropzone = new Dropzone(".my-dropzone", {
			url: "<?= base_url('index.php/guardarPublicacion') ?>",
			acceptedFiles: 'image/*',
			autoProcessQueue: false,
		});

		document.getElementById('btnGuardar').addEventListener('click', function () {
			if (!validateForm(quill)) return;

			const data = new FormData();
			const titulo = document.getElementById("txtTitulo").value;
			const subtitulo = document.getElementById("txtSubtitulo").value;

			data.append("txtTitulo", titulo);
			data.append("txtSubtitulo", subtitulo);
			data.append("descripcion", quill.root.innerHTML.trim());
			data.append('id', publicacionId);

			myDropzone.files.forEach(file => {
				data.append('file[]', file);
			});

			$.ajax({
				type: "POST",
				url: "<?= base_url('index.php/actualizarInformacionPublicacion') ?>",
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				success: function (response) {
					handleResponse(response);
				},
				error: function () {
					Swal.fire({
						icon: "error",
						title: "Error",
						text: "Ocurrió un error al guardar la publicación.",
						allowOutsideClick: false,
						confirmButtonText: "Aceptar"
					});
				}
			});
		});
	});

	function getToolbarOptions() {
		return [
			[{'size': ['small', false, 'large']}],
			['bold', 'italic', 'underline', 'strike'],
			[{'list': 'ordered'}, {'list': 'bullet'}, {'list': 'check'}],
			[{'indent': '-1'}, {'indent': '+1'}],
			[{'direction': 'rtl'}],
		];
	}

	function inicializarValores() {
		$("#nombre-pagina").text('Editar publicación');
		const publicacion = <?= json_encode($publicacion, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
		const imagenes = <?= json_encode($imagenes) ?>;

		document.getElementById("txtTitulo").value = publicacion.Titulo;
		document.getElementById("txtSubtitulo").value = publicacion.Subtitulo;

		const contImagen = document.getElementById('imagenes');
		const imgHTML = imagenes.map(element => `
			<div class="col-1">
				<img class="img-fluid border shadow" src="../../uploads/Publicaciones/${element.Path}" />
				<a href="javascript:void(0)" class="text-danger btn-eliminar" onclick="eliminarImagen('${element.Path}')">Eliminar</a>
			</div>
		`).join('');

		contImagen.innerHTML = imgHTML;
		$("#idContenedorImagen").removeClass('d-none');
		document.getElementById('idDescripcion').innerHTML = publicacion.Descripcion;

		return publicacion.Id;
	}

	function eliminarImagen(name) {
		$.post("<?= base_url('index.php/eliminarImagen') ?>", {name: name})
			.done((response)=>{
				handleResponse(response);
			});
	}

	function validateForm(quill) {
		const titulo = document.getElementById("txtTitulo").value;
		const subtitulo = document.getElementById("txtSubtitulo").value;
		const descripcion = quill.root.innerHTML.trim();

		if (!titulo || !subtitulo || !descripcion) {
			Swal.fire({
				icon: "warning",
				title: "Campos obligatorios",
				text: "Por favor complete todos los campos obligatorios.",
				confirmButtonText: "Aceptar"
			});
			return false;
		}
		return true;
	}

	function handleResponse(response) {
		const parsed = JSON.parse(response);
		Swal.fire({
			type: parsed.type,
			title: "Información",
			text: parsed.text,
			allowOutsideClick: false,
			confirmButtonText: "Aceptar"
		}).then(() => {
			if (parsed.status) {
				location.reload();
			}
		});
	}
</script>
