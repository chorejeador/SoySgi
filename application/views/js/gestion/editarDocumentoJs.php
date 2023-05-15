<script>

        $('#guardar').click(function(){
            
            let nombre = $('#txtNombre').val();
            let descripcion = $('#txtDescripcion').val();
            let area = $('#selectArea').val();
            let archivo = $('#archivo').val();

            let bandera = true;
        
            if($('#archivo').val() != ''){
                let imagen = document.getElementById('archivo').files[0];
                let extensiones = imagen.name.split('.').pop().toLowerCase();
                if(jQuery.inArray(extensiones,['pdf','jpeg','jpg','xls','xlsx','doc','docx','png']) == -1){
                    alert('Solo se permiten las siguientes extensiones: (pdf, jpeg, jpg, xls, xlsx, doc, docx, png)'); bandera = false;
                }
            }
            if($('#archivo').val() == ''){
                alert("Seleccione un archivo");bandera = false;
            }

            if (nombre.length <= 5) {
                alert("Nombre demasiado corto (5 caracteres mínimo)");bandera = false;
            }
            if (nombre.length <= 5) {
                alert("Descripción requerida (5 caracteres mínimo)");bandera = false;
            }
            if (area== '') {
                alert("Seleccione un area");bandera = false;
            }

            if (bandera) {                
                
                var data = new FormData(document.getElementById("formDocumento"));
                $.ajax({
                        url: "<?php echo base_url("index.php/guardarDocumentoEditar")?>",
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
									//location.reload();
								});
                            });						
                        },
                    error: function(request, status, error){
                    }
                });
            }
        });

</script>