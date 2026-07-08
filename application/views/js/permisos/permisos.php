<script>
	let idDocumentoGlobal = 0;
	let tabla;
	let tablaUsuarios;

	$(document).ready(function() {
		cargarDocumentos();
	});

	$("#filtro").on("change", function() {
		cargarDocumentos();
	});

	$("#btnFiltrar").on("click", function() {
		cargarDocumentos();
	});

	$(document).on('change', '#checkAllUsers', function() {
		$('.user-checkbox').prop('checked', $(this).is(':checked'));
	});

	function cargarDocumentos() {
		if ($.fn.DataTable.isDataTable('#tblPermisos')) {
			$('#tblPermisos').DataTable().destroy();
		}

		tabla = $("#tblPermisos").DataTable({
			ajax: {
				url: "cargarDocumentosPermiso",
				type: "POST",
				data: {
					filtro: $("#filtro").val()
				},
				error: function(xhr) {
					console.log("ERROR tblPermisos:");
					console.log(xhr.responseText);
				}
			},
			responsive: false,
			info: true,
			sort: true,
			destroy: true,
			searching: true,
			paginate: false,
			lengthMenu: [
				[10, 20, 50, 100, -1],
				[10, 20, 50, 100, "Todo"]
			],
			order: [
				[0, "asc"]
			],
			language: {
				info: "Registro _START_ a _END_ de _TOTAL_ entradas",
				infoEmpty: "Registro 0 a 0 de 0 entradas",
				zeroRecords: "No se encontro coincidencia",
				infoFiltered: "(filtrado de _MAX_ registros en total)",
				emptyTable: "NO HAY DATOS DISPONIBLES",
				lengthMenu: "_MENU_ ",
				search: '<i class="fa fa-search"></i>',
				paginate: {
					first: "Primera",
					last: "Última",
					next: "Siguiente",
					previous: "Anterior"
				}
			},
			columns: [{
					data: "Tipo"
				},
				{
					data: "Nombre",
					class: "text-center"
				},
				{
					data: "Descripcion"
				},
				{
					data: "Opcion"
				}
			]
		});
	}

	function asignar(IdUsuario, estado, idDocumento) {
		swal({
			title: "¿Esta seguro?",
			text: "¿Desea modificar este permiso para el usuario?",
			type: "question",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Aceptar",
			cancelButtonText: "Cancelar",
			allowOutsideClick: false
		}).then(result => {
			if (result.value) {
				$.ajax({
					url: "asignarPermisoDocumento",
					type: "POST",
					data: {
						idDocumento: idDocumento,
						idUsuario: IdUsuario,
						tipo: $("#filtro").val(),
						estado: estado
					},
					success: function(data) {
						let obj = jQuery.parseJSON(data);

						$.each(obj, function(index, value) {
							let sms = value["mensaje"];
							let tipo = value["tipo"];

							new swal({
								text: sms,
								type: tipo,
								allowOutsideClick: false
							}).then(function() {
								if ($.fn.DataTable.isDataTable('#tblUsuarios')) {
									$('#tblUsuarios').DataTable().ajax.reload(null, false);
								}
								$('#checkAllUsers').prop('checked', false);
							});
						});
					},
					error: function(xhr) {
						console.log("ERROR asignar:");
						console.log(xhr.responseText);
						swal({
							type: "error",
							text: "Ocurrio un error inesperado en el servidor"
						});
					}
				});
			}
		});
	}

	function ver(id) {
		idDocumentoGlobal = id;

		if ($.fn.DataTable.isDataTable('#tblUsuarios')) {
			$('#tblUsuarios').DataTable().destroy();
		}

		const myModal = new bootstrap.Modal(document.getElementById('myModal'));

		tablaUsuarios = $("#tblUsuarios").DataTable({
			ajax: {
				url: "cargarUsuariosDocumentos",
				type: "POST",
				data: {
					id: id,
					tipo: $("#filtro").val()
				},
				error: function(xhr) {
					console.log("ERROR tblUsuarios:");
					console.log(xhr.responseText);
				}
			},
			responsive: false,
			info: true,
			sort: true,
			destroy: true,
			searching: true,
			paginate: false,
			lengthMenu: [
				[10, 20, 50, 100, -1],
				[10, 20, 50, 100, "Todo"]
			],
			order: [
				[0, "asc"]
			],
			language: {
				info: "Registro _START_ a _END_ de _TOTAL_ entradas",
				infoEmpty: "Registro 0 a 0 de 0 entradas",
				zeroRecords: "No se encontro coincidencia",
				infoFiltered: "(filtrado de _MAX_ registros en total)",
				emptyTable: "NO HAY DATOS DISPONIBLES",
				lengthMenu: "_MENU_ ",
				search: '<i class="fa fa-search"></i>',
				paginate: {
					first: "Primera",
					last: "Última",
					next: "Siguiente",
					previous: "Anterior"
				}
			},
			columns: [{
					data: "Nombre",
					render: function(data) {
						if (!data) return "";

						return data.toLowerCase().replace(/\b\w/g, function(l) {
							return l.toUpperCase();
						});
					}
				},
				{
					data: "Area",
					class: "text-center"
				},
				{
					data: "Descripcion"
				},
				{
					data: "Opcion"
				}
			]
		});

		myModal.show();
	}

	$(document).on('click', '#btnMasivo', function() {
		var tipo = $("#filtro").val();
		var seleccionados = [];

		$('.user-checkbox:checked').each(function() {
			seleccionados.push($(this).val());
		});

		if (idDocumentoGlobal == 0) {
			alert("No se detectó el documento.");
			return;
		}

		if (seleccionados.length === 0) {
			alert("Selecciona usuarios primero");
			return;
		}

		$.ajax({
			url: "<?php echo base_url('index.php/procesar_masivo'); ?>",
			type: "POST",
			dataType: "json",
			data: {
				usuarios: seleccionados,
				documento: idDocumentoGlobal,
				tipo: tipo
			},
			success: function(res) {
				if (res.tipo === "success") {
					alert(res.mensaje);

					if ($.fn.DataTable.isDataTable('#tblUsuarios')) {
						$('#tblUsuarios').DataTable().ajax.reload(null, false);
					}

					$('#checkAllUsers').prop('checked', false);
				} else {
					alert(res.mensaje || "No se pudieron asignar los permisos.");
				}
			},
			error: function(xhr) {
				console.log("ERROR MASIVO:");
				console.log(xhr.responseText);
				alert("Error al procesar permisos masivos");
			}
		});
	});



	$(document).on('click', '#btnRevocarMasivo', function() {
		var tipo = $("#filtro").val();
		var seleccionados = [];

		$('.user-checkbox:checked').each(function() {
			seleccionados.push($(this).val());
		});

		if (idDocumentoGlobal == 0) {
			alert("No se detectó el documento.");
			return;
		}

		if (seleccionados.length === 0) {
			alert("Selecciona usuarios primero");
			return;
		}

		$.ajax({
			url: "<?php echo base_url('index.php/revocar_masivo'); ?>",
			type: "POST",
			dataType: "json",
			data: {
				usuarios: seleccionados,
				documento: idDocumentoGlobal,
				tipo: tipo
			},
			success: function(res) {
				if (res.tipo === "success") {
					alert(res.mensaje);

					if ($.fn.DataTable.isDataTable('#tblUsuarios')) {
						$('#tblUsuarios').DataTable().ajax.reload(null, false);
					}

					$('#checkAllUsers').prop('checked', false);
				} else {
					alert(res.mensaje || "No se pudieron revocar los permisos.");
				}
			},
			error: function(xhr) {
				console.log("ERROR REVOCAR MASIVO:");
				console.log(xhr.responseText);
				alert("Error al revocar permisos masivos");
			}
		});
	});
</script>