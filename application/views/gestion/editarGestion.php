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
    <div class="app-menu">
        <div class="p-4 h-100">
            <div class="scroll ps">
                <p class="text-muted text-small">Estado</p>
                <ul class="list-unstyled mb-5">
                    <li class="active"><a href="#"><i class="simple-icon-refresh"></i> <?php echo $datos[0]["Estado"];?> <span
                                class="float-right"></span></a></li>
                    <li><a href="#"><i class="simple-icon-check"></i> Documentos en este Proceso <span
                                class="float-right"><?php echo $datos[0]["cantidad"]; ?></span></a></li>
                </ul>
                <p class="text-muted text-small">Estado</p>
                <ul class="list-unstyled mb-5">
                    <li>
                        <div class="custom-control custom-checkbox mb-2"><input type="checkbox"  disabled checked class="custom-control-input"
                                id="category1"> <label class="custom-control-label" for="category1"><?php echo $datos[0]["Estado"]; ?></label>
                        </div>
                    </li>                                
                </ul>
                <p class="text-muted text-small">Etiquetas</p>
                <div>
                    <p class="d-sm-inline-block mb-1"><a href="#"><span
                                class="badge badge-pill badge-outline-primary mb-1">GESTIONES</span></a></p>                    
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                </div>
            </div>
        </div><a class="app-menu-button d-inline-block d-xl-none" href="#"><i class="simple-icon-options"></i></a>
    </div>
</main>