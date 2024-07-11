<script>
	$('#btnGuardar').click(function () {

		const showError = (message) => {
			new swal({
				text: message,
				type: "error",
				allowOutsideClick: false
			});
		}

		const validateField = (selector, nombre) => {
			const field = $(selector);
			const value = field.val();
			const fieldType = field.attr('type');

			if (value.length === 0) {
				showError(`El campo ${nombre} no puede estar vacío`);
				return false;
			}

			if (fieldType !== 'file' && value.length < 4) {
				showError(`El campo ${nombre} es demasiado corto`);
				return false;
			}

			// Validar si es un campo de tipo file
			if (fieldType === 'file') {
				const file = field[0].files[0];
				if (!file) {
					showError(`El campo ${nombre} debe contener un archivo`);
					return false;
				}
				// Opcional: Validar tamaño o tipo del archivo
				const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
				const fileExtension = file.name.split('.').pop().toLowerCase();
				if (!allowedExtensions.includes(fileExtension)) {
					showError(`El campo ${nombre} debe ser un archivo de imagen (jpg, jpeg, png, gif)`);
					return false;
				}
			}

			return true;
		}

		if (!validateField('#txtTitulo', 'título')) return;
		if (!validateField('#txtDescripcion', 'descripción')) return;
		if (!validateField('#imagen', 'imagen')) return;

		var formData = new FormData(document.getElementById("formGuardarPublicacion"));
		// console.log(formData.get('imagen'));
		// Para ver los archivos en consola
		for (let [key, value] of formData.entries()) {
			if (key === 'imagen[]') {
				console.log(key, value);
			}
		}

		$.ajax({
			url: "<?php echo base_url('index.php/guardarPublicacion')?>",
			type: "POST",
			enctype: 'multipart/form-data',
			cache: false,
			processData: false,
			contentType: false,
			data: formData,
			success: function (data) {
				let obj = jQuery.parseJSON(data);
				$.each(obj, function (index, value) {
					sms = value["mensaje"];
					tipo = value["tipo"];

					new swal({
						text: sms,
						type: tipo,
						allowOutsideClick: false
					}).then(function (value) {
						location.reload();
					});
				});
			},
			error: function (request, status, error) {
				swal({
					text: "Error: " + request.responseText,
					type: "error",
					allowOutsideClick: false
				});
			}
		});

	});

</script>
