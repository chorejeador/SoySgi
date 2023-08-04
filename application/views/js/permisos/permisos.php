<script>

	let idDocumentoGlobal;

	let tabla;
	let tablaUsuarios;
    $(document).ready(function(){
        cargarDocumentos();
    });


	var $eventSelect = $("#filtro");
	$eventSelect.on("change", function (e) {	    
	    cargarDocumentos();
	});

	function cargarDocumentos() {
		console.log($("#filtro option:selected").val())
	    tabla = $("#tblPermisos").DataTable({
				"ajax": {
					"url": "cargarDocumentosPermiso",
					"type": "POST",
					"data":{
						id: $("#filtro option:selected").val()
					}
				},
				//"processing": true,
				"responsive": false,
				"info": true,
				"sort": true,
				"destroy": true,
				"searching": true,
				"paginate": false,
				"lengthMenu": [
					[10,20,50,100, -1],
					[10,20,50,100, "Todo"]
				],
				"order": [
					[0, "asc"]
				],
				"language": {
					"info": "Registro _START_ a _END_ de _TOTAL_ entradas",
					"infoEmpty": "Registro 0 a 0 de 0 entradas",
					"zeroRecords": "No se encontro coincidencia",
					"infoFiltered": "(filtrado de _MAX_ registros en total)",
					"emptyTable": "NO HAY DATOS DISPONIBLES",
					"lengthMenu": '_MENU_ ',
					"search": '<i class="fa fa-search"></i>',					
					"paginate": {
						"first": "Primera",
						"last": "Última ",
						"next": "Siguiente",
						"previous": "Anterior"
					}
				},
				"columns": [
					{"data" : "Tipo"},
					{"data" : "Nombre","class":"text-center"},
					{"data" : "Descripcion"},
					{"data" : "Opcion"},
				]
			});
	}

	function asignar(IdUsuario,estado) {

		
		swal({
		    title: "¿Esta seguro?",
		    text: "¿Desea modificar este permiso para el usuario?",
		    type: 'question',
		    showCancelButton: true,
		    confirmButtonColor: '#3085d6',
		    cancelButtonColor: '#d33',
		    confirmButtonText: "Aceptar",
		    cancelButtonText: "Cancelar",
		    allowOutsideClick: false
		  }).then(result =>{
		  	if (result.value) {
		  		$.ajax({
		  			url: "asignarPermisoDocumento",
		  			type: "POST",
		  			data: {
		  				idDocumento : idDocumentoGlobal,
		  				idUsuario : IdUsuario,
		  				tipo: $("#filtro").val(),
		  				estado: estado
		  			},
		  			success: function(data){
						let obj = jQuery.parseJSON(data);
						$.each(obj, function (index, value) {							
							sms = value["mensaje"];
							tipo = value["tipo"];
							new swal({
								text: sms,
								type: tipo,
								allowOutsideClick: false
							}).then(function () {
								//location.reload();
								ver(idDocumentoGlobal);
							});
						});						
					},
		  			error: function(){
		  				swal({
		  					type: "error",
		  					text: "Ocurrio Un Error Inesperado En El Servidor"
		  				}).then(result =>{
		  					//location.reload();
		  				});
		  			}
		  		});
		  	}
		  });
	}

    $('#btnGuardar').click(function(){
		let bandera = true;

		if ($('#txtDescripcion').val().length<4) {
			alert("error");
			bandera = false
		}

		if (bandera) {
			$.ajax({
						url: "<?php echo base_url("index.php/guardarEditarProceso")?>",
						type: "POST",
						data: {
							descripcion: $('#txtDescripcion').val(),
							id: 0,
							estado: $( "#radioActivo:checked" ).length
						},
						success: function(data){
							let obj = jQuery.parseJSON(data);
							$.each(obj, function (index, value) {
								sms = value["mensaje"];
								tipo = value["tipo"];

								new swal({
									text: sms,
									type: tipo,
									allowOutsideClick: false
								}).then(function () {
									//location.reload();
								});
							});
						},
						error: function(request, status, error){
							
				}
			});
		}

    })

	function ver(id) {
		idDocumentoGlobal = id;
		const myModal = new bootstrap.Modal(document.getElementById('myModal'));
		myModal.hide();
		tablaUsuarios = $("#tblUsuarios").DataTable({
				"ajax": {
					"url": "cargarUsuariosDocumentos",
					"type": "POST",
					"data":{
						id: id,
						tipo: $("#filtro").val()
					}
				},
				"responsive": false,
				"info": true,
				"sort": true,
				"destroy": true,
				"searching": true,
				"paginate": false,
				"lengthMenu": [
					[10,20,50,100, -1],
					[10,20,50,100, "Todo"]
				],
				"order": [
					[0, "asc"]
				],
				"language": {
					"info": "Registro _START_ a _END_ de _TOTAL_ entradas",
					"infoEmpty": "Registro 0 a 0 de 0 entradas",
					"zeroRecords": "No se encontro coincidencia",
					"infoFiltered": "(filtrado de _MAX_ registros en total)",
					"emptyTable": "NO HAY DATOS DISPONIBLES",
					"lengthMenu": '_MENU_ ',
					"search": '<i class="fa fa-search"></i>',					
					"paginate": {
						"first": "Primera",
						"last": "Última ",
						"next": "Siguiente",
						"previous": "Anterior"
					}
				},
				"columns": [
					{"data" : "Nombre"},
					{"data" : "Area","class":"text-center"},
					{"data" : "Descripcion"},
					{"data" : "Opcion"},
				]
		});
		myModal.show();
	}

	$('.modal-footer .btn-secondary').click(function() {
        $('#myModal').modal('hide');
    });

    $('#myModal').on('hidden.bs.modal', function () {
        $('#myModal').modal('hide');
      });
</script>
