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
				"url": "gestionSearch",
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
				{"data" : "IdGestion"},
				{"data" : "Descripcion"},
                {"data" : "Estado"},
				{"data" : "FechaCrea"},				
                {"data" : "FechaEdita"},
				{"data" : "Editar"},
				{"data" : "AgregarDocumento"}
                
               
			]
		});	
    }
</script>