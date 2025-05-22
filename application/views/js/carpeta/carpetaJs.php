<script type="module">
	import {obtenerLenguaje, renderEstado} from "<?php echo base_url('assets/js/utils/dataTable.js'); ?>";
	import {mensaje, mensajeConfirmacion} from "<?php echo base_url('assets/js/utils/mensajes.js'); ?>";

	let table;
	let modalCarpeta = $('#modalCarpeta');
	let filtro = $('#filtro');

	function toggleResponsiveWrapper() {
		const wrapper = document.getElementById('tableCarpetas');
		if (window.innerWidth < 1020) {

			wrapper.classList.add('table-responsive');
		} else {

			wrapper.classList.remove('table-responsive');
		}
	}

	// Ejecutar al cargar y cuando se cambia el tamaño de la ventana
	window.addEventListener('load', toggleResponsiveWrapper);
	window.addEventListener('resize', toggleResponsiveWrapper);

	function validarGuardar() {
		var modalNombre = $('#nombre').val() || "";
		if (modalNombre === "" || modalNombre.length < 5) {
			mensaje("warning", "El nombre de la carpeta es obligatorio y debe tener al menos 5 caracteres.");
			return false;
		}
		return true;
	}


	function cerrarSwal() {
		setTimeout(function () {
			Swal.close();
		}, 1000);
	}

	function guardarCarpeta() {
		$.ajax({
			url: "guardarCarpeta",
			type: "POST",
			dataType: "json",
			data: {nombre: $('#nombre').val()},
			success: function (data) {
				mensaje("success", "La carpeta se ha creado correctamente.",
					true)

				table.ajax.reload();
				modalCarpeta.modal('hide');

				cerrarSwal()
			},
			error: function (xhr, status, error) {
				console.error("Error al guardar la carpeta:", error);
				mensaje("error", "Error al guardar la carpeta.");
			}
		});
	}

	function initGuardar() {
		$('#btnModalGuardar').click(function () {

			if (!validarGuardar()) return;

			Swal.fire({
				title: '¿Estás seguro?',
				tye: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Sí',
				cancelButtonText: 'No'
			}).then((result) => {
				if (result.value) guardarCarpeta()
			});
		});
	}

	function editarCarpeta() {
		const data = {
			id: $('#idCarpeta').val(),
			nombre: $('#nombre').val(),
		};

		$.ajax({
			url: "editarCarpeta",
			type: "POST",
			dataType: "json",
			data: {data},
			success: function (response) {
				if (response.success) {
					mensaje("success", response.success);

					table.ajax.reload();
					modalCarpeta.modal('hide');

					cerrarSwal()
				} else {
					mensaje("error", response.error || "Error desconocido.");
				}
			},
			error: function () {
				mensaje("error", "Error al guardar la carpeta.");
			}
		});
	}

	function initEditar() {
		$('#btnModalEditar').click(function () {
			if (!validarGuardar()) return;

			Swal.fire({
				title: '¿Estás seguro?',
				tye: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Sí',
				cancelButtonText: 'No'
			}).then((result) => {
				if (result.value) editarCarpeta()

			});

		})
	}

	function initModal() {

		$('#btnCrear').click(function () {
			$('#modalCarpeta').modal('show');

			$('#formCarpeta')[0].reset();

			$('#btnModalGuardar').show();
			$('#btnModalEditar').hide();

		});

		initGuardar()
		initEditar()
	}

	function renderBoton(data, type, row) {
		if (row.Estado === 1) {
			return `<button class="btn btn-success btn-accion" data-id="${row.id}" data-estado="Activo">Activo</button>`;
		} else {
			return `<button class="btn btn-danger btn-accion" data-id="${row.id}" data-estado="Inactivo">Inactivo</button>`;
		}
	}

	function renderFechaEdita(data, type, row) {
		if (row.FechaEdita === null) {
			return `No disponible`;
		} else {
			return `${row.FechaEdita}`;
		}
	}

	function renderEditar(data, type, row) {
		return `
		<button class="btn btn-primary  editar-carpeta"
			data-id="${row.id}"
			data-estado="${row.Estado}"
			data-nombre="${row.Nombre}"
		>Editar</button>
	`;
	}


	function initDatatable() {
		table = $("#tableCarpetas").DataTable({

			ajax: {
				url: "getCarpetas",
				type: "GET",
			},
			stateSave: false,
			serverSide: false,
			processing: true,
			info: true,
			sort: true,
			lengthMenu: [
				[10, 20, 50, 100, -1],
				[10, 20, 50, 100, "Todo"]
			],
			order: [
				[3, "desc"]
			],
			language: obtenerLenguaje(),
			dom: 'lrtip',
			searching: true,
			columns: [
				{data: "Nombre"},
				{data: "Descripcion"},
				{data: "Estado", render: renderEstado},
				{data: "FechaCrea"},
				{data: "FechaEdita", render: renderFechaEdita},
				{data: "Editar", render: renderEditar},
				{data: "Opciones", render: renderBoton}
			]
		});


		filtro.on('keyup', function () {
			const valor = $(this).val();
			table.search(valor).draw();
		});


		$(document).on('click', '.editar-carpeta', function () {
			const id = $(this).data('id');
			const estado = $(this).data('estado');
			const nombre = $(this).data('nombre');

			// Rellenar campos del modal
			$('#idCarpeta').val(id);
			$('#estado').val(estado);
			$('#nombre').val(nombre);

			$('#btnModalGuardar').hide();
			$('#btnModalEditar').show();

			// Mostrar modal
			$('#modalCarpeta').modal('show');
		});


		$(document).on('click', '.btn-accion', function () {
			const id = $(this).data('id');
			let estado = $(this).data('estado');
			estado = estado === "Activo" ? 0 : 1;
			const mensajeEstado = estado === 1 ? "Activo" : "Inactivo";

			Swal.fire({
				title: '¿Estás seguro?',
				text: `Cambiar el estado a ${mensajeEstado}`,
				tye: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Sí, cambiar',
				cancelButtonText: 'No, cancelar'
			}).then((result) => {
				if (result.value) {
					const data = {
						id: id,
						estado: estado
					};
					$.ajax({
						url: "editarCarpeta",
						type: "POST",
						dataType: "json",
						data: {data},
						success: function (response) {
							if (response.success) {
								mensaje("success", response.success);
								table.ajax.reload();

								cerrarSwal()
							} else {
								mensaje("error", response.error || "Error desconocido.");
							}
						},
						error: function () {
							mensaje("error", "Error al cambiar el estado.");
						}
					});
				}
			});
		});


	}

	document.addEventListener('DOMContentLoaded', () => {
		initModal();

		initDatatable();
	});

</script>
