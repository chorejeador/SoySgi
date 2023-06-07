<script>

	let tabla;
    $(document).ready(function(){
        //alert("asdad");
    });



    /*$("#filtro").select2({
			placeholder: ' Buscar Usuario',
			allowClear: true,
			ajax: {
				url: '<?php echo base_url("index.php/filtrarUsuarios")?>',
				dataType: 'json',
				type: "POST",
				quietMillis: 100,
				data: function (term) {
					console.log(term.term);
					return {
						filtro: term.term
					};
				},
				results: function (data) {
					let res = [];
					for(let i  = 0 ; i < data.length; i++) {
						res.push({id:data[i].IdUsuario, text:'('+data[i].IdUsuario+') '+data[i].Nombre});
						$("#campo").append('<input type="hidden" name="" id="'+data[i].IdUsuario+'txtpeso" class="form-control" value="'+data[i].IdUsuario+'">');
					}
					return {
						results: res
					}
				},
				cache: true
			}
	}).trigger('change.select2');*/

    $("#filtro").select2({
            placeholder: 'Buscar...',
            allowClear: true,
                ajax: {
                    url: '<?php echo base_url("index.php/filtrarUsuarios")?>',
                    dataType: 'json',
                    type: "POST",
                    quietMillis: 100,
                    data: function (params) {
                        let queryParameters = {
                            filtro: params.term
                        }

                        return queryParameters;
                    },
                    processResults: function (data) {
                        let res = [];
                        for(let i  = 0 ; i < data.length; i++) {
                            res.push({id:data[i].IdUsuario, text:data[i].Nombres});
                        }
                        return {
                            results: res
                        }
                    },
                    cache: true
                }
            }
    ).trigger('change.select2');

	//$( "#filtro option:selected" ).val();

	var $eventSelect = $("#filtro");
	$eventSelect.on("change", function (e) {	    
	    console.log($("#filtro option:selected").val())
	    tabla = $("#tblPermisos").DataTable({
				"ajax": {
					"url": "cargarPermisosUsuarios",
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
				"searching": false,
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
					//{"data" : "IdPermiso"},
					{"data" : "Nombre","class":"text-center"},
					{"data" : "Descripcion"},
					{"data" : "Opcion"},
				]
			});
	});

	function asignar(idPermiso,IdUsuario) {
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
		  			url: "asignarPermiso",
		  			type: "POST",
		  			data: {
		  				idPermiso : idPermiso,
		  				idUsuario : IdUsuario
		  			},
		  			success: function(data){
						let obj = jQuery.parseJSON(data);
						$.each(obj, function (index, value) {
							swal({
			  					type: value["tipo"],
			  					text: value["mensaje"]
			  				}).then(result =>{
			  					location.reload();
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
        /*globalFunction({
			"id": this.id,
			"mensaje" : 'prueba',
			"tipo" : 'error'
		});*/

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
</script>