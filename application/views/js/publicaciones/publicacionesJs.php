<script src="<?= base_url('assets/js/vendor/moment.min.js') ?>"></script>
<script>
	$(document).ready(function () {
		$('#idPublicaiones').DataTable();
		buscar();
	});

	$('#btnBuscar').click(function () {
		buscar();
	});

	function buscar() {
		var table = $("#idPublicaiones").DataTable({
			"ajax": function (data, callback, settings) {
				$.ajax({
					url: "<?php echo base_url('index.php/getPublicaciones')?>",
					type: "POST",
					data: {
						filtro: $("#filtro").val()
					},
					success: function (result) {
						let parsed = JSON.parse(result);
						let response = {
							draw: data.draw,
							recordsTotal: parsed.length,
							recordsFiltered: parsed.length,
							data: parsed
						};
						callback(response);
					},
					error: function (xhr, error, thrown) {
						console.error('Error en la petición AJAX: ', error);
					}
				});
			},
			"stateSave": false,
			"serverSide": false,
			"processing": true,
			"destroy": true,
			"order": [[4,'desc']],
			"columns": [
				{data: "Id", render: RenderId},
				{data: "Titulo"},
				{data: "Estado", render: RenderEstado},
				{data: "FechaCrea", render: RenderFecha},
				{data: "FechaEdita", render: RenderFecha},
				{data: "Id", render: RenderEdita}
			],
		});

	}
	function RenderId(data, type, row, meta){
		return meta.row + meta.settings._iDisplayStart + 1;
	}
	function RenderFecha(data, type, row) {
		let fecha = data ?? row.FechaCrea;
		return moment(fecha, 'YYYY-MM-DD HH:mm:ss').format('DD-MM-YYYY HH:mm:ss');
	}

	function RenderEstado(data, type, row) {
		let estado = data ? 'badge-success' : 'badge-warning';
		let text = data ? 'Activo' : 'Inactivo';
		return `<span class="badge ${estado}">${text}</span>`;
	}

	function RenderEdita(data, type, row) {
		let btnEstado = row.Estado ? `<button class="btn btn-sm btn-primary btn-cambiarEstado" id="btn-${data}" data-id="${data}" data-estado="${row.Estado}">Desactivar</button>`
			: `<button class="btn btn-sm btn-warning btn-cambiarEstado" id="btn-${data}" data-id="${data}" data-estado="${row.Estado}">Activar</button>`;
		return `${btnEstado} <button class="btn btn-sm btn-info btn-editar" id="btn-${data}" data-id="${data}">Editar publicación</button>`;
	}

	$("#idPublicaiones").on("click", ".btn-editar", function () {
		let id = $(this).data('id');
		location.href = `<?= base_url('index.php/actualizarPublicacion') ?>/${id}`;
	});
	$("#idPublicaiones").on("click", ".btn-cambiarEstado", function () {
		let id = $(this).data('id');
		let estado = !$(this).data('estado');
		$.ajax({
			type: "POST",
			url: "<?= base_url('index.php/cambiarEstadoPublicacion') ?>",
			data: {
				id,
				estado
			},
			success: function (response) {
				let parsed = JSON.parse(response);
				Swal.fire({
					type: parsed.type,
					title: "Información",
					title: parsed.mensaje
				}).then(() => {
					buscar();
				});
			}
		});
	});
</script>
