<script>
	$(document).ready(function(){
        //alert("asdad");
	});

	$('#btnGuardar').click(function(){
		let bandera = true;

		if ($('#txtDescripcion').val().length<4) {
			alert("error descripcion demasiado corta");
			bandera = false
		}
		if ($('#selectProceso').val() == null) {
			new swal({
				text: "Seleccione un proceso",
				type: "error",
				allowOutsideClick: false
			}).then(function () {
			});
			bandera = false
		}

		if ($('#siglas').val() == null) {
			new swal({
				text: "Digite una sigla",
				type: "error",
				allowOutsideClick: false
			}).then(function () {
			});
			bandera = false
		}


		if (bandera) {
			$.ajax({
				url: "<?php echo base_url("index.php/guardarGestion")?>",
				type: "POST",
				data: {
					descripcion: $('#txtDescripcion').val(),
					idProceso: $('#selectProceso').val(),
					siglas: $('#siglas').val(),
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
						}).then(function (value) {							
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