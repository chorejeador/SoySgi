<main class="default-transition" style="opacity: 1;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Nueva sub Gestión</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">                        
                        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/gestiones');?>">Lista de Sub Gestiones</a></li>
                    </ol>
                </nav>
                <div class="separator mb-3"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12 mb-3">
                <h5 class="mb-5">Nueva sub gestión</h5>
                <div class="card mb-4">
                    <div class="card-body">
                        <form class="needs-validation tooltip-label-right" novalidate="">
                            <div class="form-group position-relative error-l-50">
                                <label>Descripción de  gestion padre: *</label> 
                                <input type="text" readonly class="form-control" value="<?php echo $datos[0]["DescripcionPadre"]; ?>">
                                <div class="invalid-tooltip">Descripción es requerida!</div>
                                <br>
                                <label>Descripción de la sub gestión: *</label> 
                                <input type="text" id="txtDescripcion" value="<?php echo $datos[0]["Descripcion"]; ?>" class="form-control" required="">
                                <div class="invalid-tooltip">Descripción es requerida!</div>
                                <br>
                                <label>Siglas: *</label> 
                                <input type="text" id="txtSigla" value="<?php echo $datos[0]["Sigla"]; ?>" class="form-control" required="" placeholder="Ejem. E 01">
                                <div class="invalid-tooltip">Sigla es requerida!</div>
                                <br>
                                <label>Gestión al que pertenece:</label> 
                                <select id="selectProceso" class="form-control">                                    
                                    <?php
                                        foreach ($gestiones as $key ) {
                                            $selected = '';
                                            if ($datos[0]["IdGestion"] == $key["IdGestion"]) {
                                                $selected = 'selected';
                                            }
                                            echo '<option value="'.$key["IdGestion"].'" '.$selected.'>'.$key["Descripcion"].'</option>';
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
                            </div>
                            <div>
                                <button type="button" id="btnGuardar" class="btn btn-primary mb-0">Guardar</button>
                                <a href="<?php echo base_url('index.php/subGestiones') ?>" class="btn btn-danger mb-0">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</main>