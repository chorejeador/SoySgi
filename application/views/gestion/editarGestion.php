<main class="default-transition" style="opacity: 1;">
    
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12">
                <h1>Editar Gestión</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/gestiones');?>">Lista de Gestión</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/procesos');?>">Lista de Procesos</a></li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row app-row">
            <div class="col-12 col-lg-12 mb-5">
                <h5 class="mb-5">Nueva Gestión</h5>
                <div class="card mb-4">
                    <div class="card-body">                        
                        <form class="needs-validation tooltip-label-right" novalidate="">
                            <div class="form-group position-relative error-l-50"><label>Sigla</label> 
                                <input type="text" id="txtSigla" class="form-control" value="<?php echo $datos[0]["Sigla"]; ?>">
                                <div class="invalid-tooltip">Sigla es requerida!</div>
                            </div>
                            <div class="form-group position-relative error-l-50"><label>Descripción</label> 
                                <input type="text" id="txtDescripcion" class="form-control" required="" value="<?php echo $datos[0]["Descripcion"];?>" >
                                <div class="invalid-tooltip">Descripción es requerida!</div>
                            </div>
                            <label>Proceso al que pertenece:</label> 
                                <select id="selectProceso" class="form-control">                                
                                <?php 
                                    foreach ($procesos as $key ) {
                                        $selected = '';
                                        if ($key["IdProceso"] == $datos[0]["IdProceso"]) {
                                            $selected = 'selected';
                                        }
                                        echo '<option value="'.$key["IdProceso"].'" '.$selected.' >'.$key["Descripcion"].'</option>';
                                    }
                                ?>                                    
                            </select>
                            <div class="mb-4">   
                            <?php echo $datos[0]["Estado"];?>                        
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="radioActivo" value="ACTIVO" <?php if ($datos[0]["Estado"] == 'ACTIVO') {echo 'checked';}?> name="customRadio" class="custom-control-input"> 
                                    <label class="custom-control-label" for="radioActivo">Activo</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" value="INACTIVO" <?php if ($datos[0]["Estado"] == 'INACTIVO') {echo 'checked';}?> name="customRadio" class="custom-control-input"> 
                                    <label class="custom-control-label" for="customRadio2">Inactivo</label>
                                </div>
                            </div>
                            <div>
                            <button type="button" id="btnGuardar" class="btn btn-primary mb-0">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
        </div>        
    </div>
    
</main>