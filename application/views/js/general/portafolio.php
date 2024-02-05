<script>
    $(document).ready(function(){

        $('#catGestion').DataTable();
        buscar();

        // Manejar el evento de cambio en los checkboxes
	    $(".form-check-input").change(function() {
	        updateMedals();
	        updateClearFiltersButton(); // Actualizar visibilidad del botón "Limpiar Filtros"

	        buscar(); // Filtrar automáticamente al cambiar las categorías
	    });

	    // Manejar el evento de limpiar filtros
	    $("#clearFilters").click(function() {
	        $(".form-check-input").prop('checked', false);
	        updateMedals();
	        updateClearFiltersButton(); // Actualizar visibilidad del botón "Limpiar Filtros"

	        buscar();
	    });

	    // Inicializar las medallas al cargar la página
	    updateMedals();
	    updateClearFiltersButton(); // Actualizar visibilidad del botón "Limpiar Filtros"



});

function updateClearFiltersButton() {
    // Mostrar el botón "Limpiar Filtros" si hay filtros seleccionados, ocultarlo de lo contrario
    var hasSelectedFilters = $(".form-check-input:checked").length > 0;
    $("#clearFilters").toggle(hasSelectedFilters);
}


function updateMedals() {
    // Limpiar medallas anteriores
    $("#medalContainer").empty();

      $(".form-check-input:checked").each(function() {
        var categoryId = $(this).val();
        var categoryLabel = $("#category" + categoryId).next('.category_label').text();

        // Agregar la descripción como medalla
        $("#medalContainer").append('<span class="badge bg-secondary">' + categoryLabel + '</span> ');
    });


}


    $('#searchButton').click(function(){
        buscar();
    });

    function buscar() {
    	 var selectedCategories = [];

	    // Obtener los IDs de las categorías seleccionadas
	    $(".form-check-input:checked").each(function() {
	        selectedCategories.push($(this).val());
	    });

	    console.log(selectedCategories);
        var table = $("#catImagenes").DataTable({
	  	"ajax": {
				"url": "filtrarImagenes",
				"type": "POST",
                "data": {
                	categorias: selectedCategories.join(',')
                }
			},
			"stateSave": false,
			"serverSide": true,
			"processing": true,
			"info": false,
			"searching": false,
			"paging": false,
			"sort":true,
			"destroy": true,
			"pageable": false,
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
	            {
	                "data": "Imagen",
	                "render": function (data, type, row) {
	                    // Agregar un div de fila para cada grupo de 4 imágenes
	                    if (type === 'display') {
	                        return '<div class="image-group">' + data + '</div>';
	                    }
	                    return data;
	                }
	            }
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