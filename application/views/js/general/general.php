<script>
    $(document).ready(function(){
        $('#catGestion').DataTable();
        buscar();
    });

    $('#btnBuscar').click(function(){
        buscar();
    });


    function buscar() {
        var table = $("#catGestion").DataTable({
	  	"ajax": {
				"url": "generalSearch",
				"type": "POST",
                "data": {
                    filtro: $('#filtro').val()
                }
			},
			"stateSave": false,
			"serverSide": true,
			"processing": true,
			"info": true,
			"sort":true,
			"destroy": true,
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
				"search": '',
				"loadingRecords": "",
				"processing": "Procesando datos  <i class='fa fa-spin fa-refresh'></i>",
				"paginate": {
					"first": "Primera",
					"last": "Última ",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			},
			"columns": [
				{"data" : "IdDocumento"},
				{"data" : "Nombre"},
                {"data" : "Descripcion"},
				{"data" : "FechaCrea"},				
                {"data" : "FechaEdita"},
				{"data" : "Ver"},
				{"data" : "Opcion"}
				
               
			]
		});	
    }


    function baja(id,estado) {
    	$.ajax({
						url: "<?php echo base_url("index.php/bajaDocumentoGeneral")?>",
						type: "POST",
						data: {
							id: id,
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
									if (tipo == 'success') {
										location.reload();	
									}									
								});
							});						
						},
						error: function(request, status, error){
							
				}
			});
    }
</script>