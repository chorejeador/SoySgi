<script type="module">
	import {obtenerLenguaje, renderEstado} from "<?php echo base_url('assets/js/utils/dataTable.js'); ?>";
	import {mensaje, mensajeConfirmacion} from "<?php echo base_url('assets/js/utils/mensajes.js'); ?>";

	const carpetaSelect = $('#selectCarpeta');
	let table;

	function toggleResponsiveWrapper() {
		const wrapper = document.getElementById('catGestion');
		if (window.innerWidth < 1140) {

			wrapper.classList.add('table-responsive');
		} else {

			wrapper.classList.remove('table-responsive');
		}
	}

	window.addEventListener('load', toggleResponsiveWrapper);
	window.addEventListener('resize', toggleResponsiveWrapper);

	// Inicializamos Select2
	carpetaSelect.select2({
		placeholder: "Seleccione una carpeta",
		allowClear: true,
		width: '100%',
		dropdownParent: $('#modalDocumento'),
	});

	function renderEditar(data, type, row) {
		return `
    <a href="#" class="btn btn-primary btn-sm text-uppercase btn-editar btn-fixed-width d-flex align-items-center justify-content-center"
       style="width: 120px; height: 40px; text-align: center; gap: 10px;"
       data-id="${row.IdDocumento}" data-estado="${row.estado || ''}">
      <i class="fa fa-edit"></i><span>Editar</span>
    </a>`;
	}


	function validarGuardar() {
		const modalNombre = $('#nombre').val().trim();
		const selectCarpeta = $('#selectCarpeta').val();
		const archivo = document.getElementById('archivoPdf');
		const $archivoInput = $('#archivoPdf');

		if (modalNombre.length < 5) {
			mensaje("warning", "El nombre es obligatorio y debe tener al menos 5 caracteres.");
			return false;
		}

		if (!selectCarpeta) {
			mensaje("warning", "Debes seleccionar una carpeta.");
			return false;
		}

		// Detecta si hay un archivo cargado o uno precargado (vista previa)
		const archivosCargados = archivo.files.length;
		const tieneVistaPrevia = $archivoInput.data('fileinput')?.initialPreview?.length > 0;

		if (archivosCargados === 0 && !tieneVistaPrevia) {
			mensaje("warning", "Debes seleccionar un archivo.");
			return false;
		}

		return true;
	}

	function cerrarSwal() {
		setTimeout(function () {
			Swal.close();
		}, 1000);
	}

	function guardarDocumento() {

		const documentoPdf = document.querySelector('#archivoPdf');

		const formData = new FormData()
		formData.append('nombre', document.querySelector('#nombre').value)
		formData.append('descripcion', document.querySelector('#descripcion').value)
		formData.append('idCarpeta', carpetaSelect.val())

		formData.append('archivoPdf', documentoPdf.files[0])

		console.log([...formData.entries()]);
		$.ajax({
			url: "guardarDocGeneral",
			type: "POST",
			dataType: "json",
			processData: false,
			contentType: false,
			data: formData,
			success: function (response) {
				// const data = JSON.parse(response);
				mensaje("success", response.success);
				buscarYActualizar();
				cerrarSwal();
				$('#modalDocumento').modal('hide');

			},
			error: function (xhr, status, error) {
				console.error("Error al guardar el documento:", error);
				mensaje("error", "Error al guardar el documento.");
			}
		});
	}

	function initGuardar() {
		$('#btnModalGuardar').click(function () {
			if (!validarGuardar()) return;
			Swal.fire({
				title: '¿Estás seguro?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Sí',
				cancelButtonText: 'No'
			}).then(result => {
				if (result.value) guardarDocumento();
			});
		});
	}

	function actualizarDocumento() {
		const documentoPdf = document.querySelector('#archivoPdf');

		const formData = new FormData()
		formData.append('nombre', document.querySelector('#nombre').value)
		formData.append('descripcion', document.querySelector('#descripcion').value)
		formData.append('idCarpeta', carpetaSelect.val())
		formData.append('idDocumento', document.querySelector('#idDocumento').value)

		formData.append('archivoPdf', documentoPdf.files[0])

		$.ajax({
			url: "actualizarDocGeneral",
			type: "POST",
			dataType: "json",
			processData: false,
			contentType: false,
			data: formData,
			success: function (response) {
				// const data = JSON.parse(response);
				mensaje("success", response.success);
				buscarYActualizar();
				cerrarSwal();
				$('#modalDocumento').modal('hide');
			},
			error: function (xhr, status, error) {
				let errorMsg = "";
				try {
					const response = JSON.parse(xhr.responseText);
					if (response.error) {
						errorMsg = response.error;
					}
				} catch (e) {
					console.warn("No se pudo parsear el error JSON:", e);
				}

				console.error("Error al actualizar el documento:", errorMsg);
				mensaje("error", errorMsg); // usa tu función de alerta personalizada
			}

		});
	}

	function initActualizar() {
		$('#btnModalEditar').click(function () {
			if (!validarGuardar()) return;
			Swal.fire({
				title: '¿Desea actualizar los datos?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Sí',
				cancelButtonText: 'No'
			}).then(result => {
				if (result.value) actualizarDocumento();
			});
		});
	}

	function initModal() {
		$('#btnCrear').click(function () {
			$('#modalDocumento').modal('show');
			$('#formDocumento')[0].reset();
			carpetaSelect.val(null).trigger('change'); // limpiamos select2

			mostrarBtnActualizar(false)
		});
		initGuardar()
		initActualizar()
	}

	/**
	 * Llena el <select> con datos y refresca Select2.
	 * @param {jQuery} $select
	 * @param {Array} data
	 * @param {string} valueKey
	 * @param {string} labelKey
	 * @param {string} placeholder
	 */
	function actualizarSelect($select, data, valueKey, labelKey, placeholder) {
		$select.empty().append(`<option value="">${placeholder}</option>`);
		data.forEach(item => {
			$select.append(new Option(item[labelKey], item[valueKey]));
		});
		$select.val(null).trigger('change');
	}

	function getCarpetas() {
		$.ajax({
			url: "getCarpetas",
			type: "GET",
			success: function (res) {
				actualizarSelect(carpetaSelect, res.data, 'id', 'Nombre', 'Seleccione una carpeta');
			},
			error: function (xhr, status, error) {
				console.error("Error al cargar las carpetas:", error);
			}
		});
	}

	function initFileInput() {
		$('#archivoPdf').fileinput({
			theme: 'fas',
			showUpload: false,
			showRemove: false,
			language: 'es',
			browseLabel: 'Seleccionar…',
			removeLabel: 'Eliminar',
			msgPlaceholder: 'Arrastra o selecciona un PDF',
			msgSelected: '{n} archivo seleccionado',
			overwriteInitial: true,
			initialPreviewAsData: true,
			initialPreviewFileType: 'pdf',          // opcional; para que la librería lo reconozca
			allowedFileExtensions: ['pdf']          // ← **solo PDF**
		});
		$('.kv-file-remove').remove();
	}

	function buscarYActualizar() {
		$.ajax({
			url: "generalSearch",
			type: "POST",
			data: {filtro: $('#filtro').val()},
			success: function (response) {
				const datos = (typeof response === 'string'
					? JSON.parse(response)
					: response).data;

				// Agrupar manualmente
				const grupos = {};

				datos.forEach(item => {
					item.IdCarpeta = parseInt(item.IdCarpeta, 10);
					if (!grupos[item.IdCarpeta]) {
						grupos[item.IdCarpeta] = {
							nombre: item.NombreCarpeta.trim(),
							items: []
						};
					}
					grupos[item.IdCarpeta].items.push(item);
				});

				const datosConEncabezados = [];

				const idsOrdenados = Object.keys(grupos)
					.sort((a, b) => grupos[a].nombre.localeCompare(grupos[b].nombre));

				for (const id of idsOrdenados) {
					const grupo = grupos[id];
					datosConEncabezados.push({
						__isGroup: true,
						NombreCarpeta: grupo.nombre,
						total: grupo.items.length,
						// ...si quieres, aquí pones defaultContent para las columnas:
						Nombre: '', Descripcion: '', FechaCrea: '',
						FechaEdita: '', Ver: '', Opcion: ''
					});
					datosConEncabezados.push(...grupo.items);
				}

				// Vaciar y llenar la tabla
				table.clear().rows.add(datosConEncabezados).draw();
				$('#catGestion thead').show();
			}
		});
	}

	function mostrarBtnActualizar(b) {
		if (b) {
			$('#btnModalGuardar').hide();
			$('#btnModalEditar').show();
		} else {
			$('#btnModalGuardar').show();
			$('#btnModalEditar').hide();
		}
	}


	document.addEventListener("DOMContentLoaded", function () {
		initModal()
		initFileInput()
		getCarpetas()

		table = $('#catGestion').DataTable({
			data: [],
			ordering: false,    // ← desactiva todo reordenamiento
			columns: [
				{data: 'Nombre', defaultContent: ''},
				{data: 'Descripcion', defaultContent: ''},
				{data: 'FechaCrea', defaultContent: ''},
				{data: 'FechaEdita', defaultContent: ''},
				{data: 'Ver', orderable: false, searchable: false, defaultContent: ''},
				{data: null, render: renderEditar, orderable: false, searchable: false},
				{data: 'Opcion', orderable: false, searchable: false, defaultContent: ''}
			],
			language: obtenerLenguaje(),
			// ya no pones `order: [[…]]`
			drawCallback: function () {
				const api = this.api();
				const rows = api.rows({page: 'current'}).nodes();
				const data = api.rows({page: 'current'}).data();

				data.each((row, i) => {
					if (row.__isGroup) {
						$(rows[i]).before(`
          <tr class="group-header text-white" style="background: #01498D">
            <td colspan="7" style="font-weight:bold;">
              📁 ${row.NombreCarpeta}
              <span class="badge badge-light">${row.total}</span>
            </td>
          </tr>`);
						$(rows[i]).hide(); // oculta la fila “vacía” de DataTables
					}
				});
			}
		});

		$('form.form-inline').on('submit', e => {
			e.preventDefault();
			buscarYActualizar();
		});
		$('#btnBuscar').on('click', buscarYActualizar);

		document.addEventListener("click", e => {
			const btn = e.target.closest(".btn-accion");
			if (btn) {
				e.preventDefault();
				baja(btn.dataset.id, btn.dataset.estado);
			}
		});

		buscarYActualizar();

		$(document).on('click', '.btn-editar', function () {
			const id = $(this).data('id');
			$('#idDocumento').val(id);

			$.ajax({
				url: "getDocumentoById",
				type: "GET",
				data: {id},
				success: function (response) {
					const data = JSON.parse(response);

					mostrarBtnActualizar(true)

					$('#archivoPdf').fileinput('destroy');

					$('#modalDocumento').modal('show');
					$('#nombre').val(data.Nombre);
					$('#descripcion').val(data.Descripcion);
					$('#selectCarpeta').val(data.IdCarpeta).trigger('change');

					const pdfUrl = "<?php echo base_url('/uploads/docs/'); ?>" + data.Url + data.Tipo;

					$('#archivoPdf').fileinput({
						showRemove: false,
						language: 'es',
						browseLabel: 'Seleccionar…',
						removeLabel: 'Eliminar',
						msgPlaceholder: 'Arrastra o selecciona una imagen',
						msgSelected: '{n} archivo(s) seleccionado(s)',
						theme: 'fas',
						showUpload: false,
						overwriteInitial: true,
						allowedFileExtensions: ['pdf'],
						initialPreview: pdfUrl ? [pdfUrl] : [],
						initialPreviewAsData: true,
						initialPreviewFileType: 'pdf',
						initialPreviewConfig: pdfUrl
							? [{caption: data.Nombre, size: 1234, width: "120px", url: pdfUrl, key: 1}]
							: []
					})
					$('.kv-file-remove').remove();

				},
				error: function (xhr, status, error) {
					console.error("Error al cargar el documento:", error);
				}
			});
		});

		$('#modalDocumento').on('hidden.bs.modal', function () {
			$('#formDocumento')[0].reset();
			carpetaSelect.val(null).trigger('change');
			$('#archivoPdf').fileinput('destroy');
			initFileInput();
		});


		function baja(id, estado) {
			$.ajax({
				url: "<?php echo base_url('index.php/bajaDocumentoGeneral'); ?>",
				type: "POST",
				data: {id, estado},
				success: function (data) {
					$.each(JSON.parse(data), (i, v) => {
						swal({text: v.mensaje, icon: v.tipo, allowOutsideClick: false})
							.then(() => {
								if (v.tipo === 'success') buscarYActualizar();
							});
					});
				},
				error: function (xhr, status, error) {
					console.error("Error en baja:", error);
				}
			});
		}
	});
</script>
