<script>

        $('#guardar').click(function(){

            
            
            let nombre = $('#txtNombre').val();
            let descripcion = $('#txtDescripcion').val();            
            let archivo = $('#archivo').val();

            let bandera = true;
        
            if($('#archivo').val() != ''){
                let imagen = document.getElementById('archivo').files[0];
                let extensiones = imagen.name.split('.').pop().toLowerCase();
                if(jQuery.inArray(extensiones,['xls','xlsx']) == -1){
                    new swal({
                        text: "Solo se permiten las siguientes extensiones: (xls, xlsx)",
                        type: "error",
                        allowOutsideClick: false
                    }); bandera = false;
                }
            }
            if($('#archivo').val() == ''){
                new swal({
                        text: "Seleccione un archivo",
                        type: "error",
                        allowOutsideClick: false
                    }); bandera = false;
            }
            if (nombre.length <= 5) {
                new swal({
                        text: "Nombre demasiado corto (5 caracteres mínimo)",
                        type: "error",
                        allowOutsideClick: false
                    }); bandera = false;
            }
            if (nombre.length <= 5) {
                new swal({
                        text: "Descripción requerida (5 caracteres mínimo)",
                        type: "error",
                        allowOutsideClick: false
                    }); bandera = false;
            }

            if (bandera) {

                var data = new FormData(document.getElementById("formDocumento"));
                $.ajax({
                        url: "<?php echo base_url("index.php/subirArchivoMisIndicadores")?>",
                        type: "POST",
                        enctype: 'multipart/form-data',
                        contentType:false,
                        cache: false,
                        processData: false,
                        async:true,
                        data: data,
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
									window.location.href = "<?php echo base_url('index.php/misIndicadores'); ?>";
								});
                            });
                        },
                    error: function(request, status, error){
                    }
                });
            }
        });

        function baja(argument) {
            alert(argument);
        }

</script>