<main class="default-transition" style="opacity: 5;">
    <div class="container-fluid library-app">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <h1>Librería de Documentos</h1>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/gestiones') ?>">Gestiones</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-4">
                <h5 class="mb-4">Carga de documentos</h5>
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="mb-4">Subir documento</h5>
                        <form class="needs-validation tooltip-label-right" id="formDocumento" novalidate="">
                            <?php echo form_hidden('txtId', $datos[0]["IdGestion"]); ?>
                            <div class="form-group position-relative">
                                <label>Nombre:</label>
                                <input type="text" id="txtNombre" name="txtNombre" class="form-control" required="">
                            </div>
                            <div class="form-group position-relative">
                                <label>Detalles</label>
                                <textarea id="txtDescripcion" name="txtDescripcion" class="form-control" rows="2" required=""></textarea>
                            </div>
                            <div class="form-group position-relative">
                                <label>Archivo</label>
                                <input type="file" name="archivo" id="archivo" class="form-control" required="true" />
                            </div>
                            <div class="form-group position-relative">
                                <label>Área:</label>
                                <select id="selectArea" name="selectArea" class="custom-select" required="">
                                    <option value=""></option>
                                    <option value="1">Informática</option>
                                    <option value="2">Recursos Humanos</option>
                                    <option value="3">Contabilidad</option>
                                </select>
                            </div>
                            <button type="button" id="guardar" class="btn btn-primary btn-block">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-8 list">
                <h4 class="mb-4">Documentos en esta Sub Gestión</h4>
                <div class="row">
                    <?php
                    if (count($documentos) == 0) {
                        echo '<div class="col-12 text-center py-5 text-muted">
                                <i class="simple-icon-drawer text-large"></i>
                                <h4 class="mt-3">Sin archivos actualmente...</h4>
                              </div>';
                    }
                    foreach ($documentos as $key) {
                        echo '
                        <div class="col-12 mb-3">
                            <div class="card d-flex flex-row shadow-sm border-0">
                                <a target="_blank" class="d-flex align-self-center ml-3 p-3 bg-light rounded" href="' . base_url('/uploads/') . $key["Url"] . '.' . $key["Tipo"] . '" title="Descargar">
                                    <i class="iconsminds-download-from-cloud text-primary text-xlarge"></i>
                                </a>

                                <div class="d-flex flex-grow-1 min-width-zero">
                                    <div class="card-body align-self-center d-flex flex-column justify-content-between min-width-zero">
                                        
                                        <div class="mb-2">
                                            <a href="' . base_url("index.php/editarDocumento/") . $key["IdDocumento"] . '">
                                                <h5 class="list-item-heading mb-1 font-weight-bold text-truncate text-primary">' . $key["Nombre"] . '</h5>
                                            </a>
                                            <div class="text-muted text-small">
                                                <span><i class="simple-icon-calendar mr-1"></i> Creado: ' . rtrim($key["FechaCrea"], '.000') . '</span>
                                                <span class="ml-3"><i class="simple-icon-refresh mr-1"></i> Act: ' . rtrim($key["FechaEdita"], '.000') . '</span>
                                            </div>
                                        </div>

                                        <div class="d-flex mt-2 pt-2 border-top">
                                            <a class="btn btn-outline-secondary btn-xs mr-2 px-3" href="' . base_url("index.php/verHistorial/") . $key["IdDocumento"] . '">
                                                <i class="simple-icon-clock mr-1"></i> Historial
                                            </a>
                                            <a class="btn btn-outline-danger btn-xs px-3" href="javascript:void(0)" onclick="confirmarEliminar(' . $key["IdDocumento"] . ')">
                                                <i class="simple-icon-trash mr-1"></i> Borrar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function confirmarEliminar(id) {
        if (confirm('¿Estás seguro de que deseas eliminar este archivo?')) {
            $.ajax({
                url: '<?php echo base_url("index.php/eliminarDocumentoGestion/"); ?>' + id,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    console.log("Respuesta recibida:", response);

                    if (response && response[0]) {
                        alert(response[0].mensaje);

                        if (response[0].retorno == 1 || response[0].retorno == "1") {
                            location.reload();
                        }
                    } else {
                        alert("El servidor respondió, pero el formato es incorrecto.");
                        console.log(response);
                    }
                },
                error: function(xhr, status, error) {
                    console.log("STATUS:", status);
                    console.log("ERROR:", error);
                    console.log("RESPUESTA DEL SERVIDOR:", xhr.responseText);
                    alert("Error en la comunicación con el servidor.");
                }
            });
        }
    }
</script>