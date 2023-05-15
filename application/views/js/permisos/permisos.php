<script>
    $(document).ready(function(){
        //alert("asdad");
    });

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
							id: <?php echo $datos[0]["IdProceso"];?>,
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