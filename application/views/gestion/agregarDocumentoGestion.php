<main class="default-transition" style="opacity: 5;">
<div class="container-fluid library-app">
	<div class="row">
		<div class="col-12">
			<div class="mb-3">
				<h1>Libreria de Documentos</h1>
				<!--<div class="text-zero top-right-button-container"><button type="button"
						class="btn btn-primary btn-lg top-right-button mr-1">GUARDAR</button>
					<div class="btn-group">
						<div class="btn btn-primary btn-lg pl-4 pr-0 check-button"><label
								class="custom-control custom-checkbox mb-0 d-inline-block"><input type="checkbox"
									class="custom-control-input" id="checkAll"> <span
									class="custom-control-label"></span></label></div><button type="button"
							class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle
								Dropdown</span></button>
						<div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a> <a
								class="dropdown-item" href="#">Another action</a></div>
					</div>
				</div>-->
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
			<h5 class="mb-5">Carga de documentos</h5>
			<div class="card mb-4">
				<div class="card-body">
					<h5 class="mb-4">Subir documento</h5>
					<form class="needs-validation tooltip-label-right" id="formDocumento" novalidate="">
						
						<?php echo form_hidden('txtId',$datos[0]["IdGestion"]);?>

						<div class="form-group position-relative error-l-50"><label>Nombre:</label> 
						<input type="text" id="txtNombre" name="txtNombre" class="form-control" required="">
							<div class="invalid-tooltip">Nombre is required!</div>
						</div>						
						<div class="form-group position-relative error-l-50"><label>Detalles</label> 
						<textarea id="txtDescripcion" name="txtDescripcion" class="form-control" rows="2" required=""></textarea>
							<div class="invalid-tooltip">Detalle es requerido!</div>
						</div>
						<div class="form-group position-relative error-l-50"><label>Archivo</label> 
								<input type="file" name="archivo" id="archivo"  class="form-control" rows="2" required="true"/>
							<div class="invalid-tooltip">Detalle es requerido!</div>
						</div>				
						<div class="form-group position-relative error-l-50"><label>Area:</label> 
							<select id="selectArea" name="selectArea" name="selectArea" class="custom-select" required="">
								<option value=""></option>
								<option value="1">Informática</option>
								<option value="2">Recursos Humanos</option>
								<option value="3">Contabilidad</option>
							</select>
							<div class="invalid-tooltip">Area es requerida!</div>
						</div>					
						<button type="button" id="guardar" class="btn btn-primary mb-0">Guardar</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-12 col-xl-8 list disable-text-selection" data-check-all="checkAll">
            <div class="d-inline-block"><h5 class="d-inline">Documentos en esta Gestión</h5></div>
			<div class="row">

                <?php
				if (count($documentos) == 0) {
					echo '<div class="col-12" data-check-all="checkAll"><br><br>
								<h4 class="align-middle d-inline-block">Sin archivos actualmente...</h4>
								</div>';
				}
                    foreach ($documentos as $key) {
                        echo '
                        <div class="col-xxl-12 col-xl-6 col-12">
                            <div class="card d-flex flex-row mb-4 media-thumb-container">
								<a target="_blank" class="d-flex align-self-center media-thumbnail-icon" href="'.base_url('/uploads/').$key["Url"].'.'.$key["Tipo"].'">
									<i class="iconsminds-data-download"></i>
								</a>
                                <div class="d-flex flex-grow-1 min-width-zero">
                                    <div
                                        class="card-body align-self-center d-flex flex-column justify-content-between min-width-zero align-items-lg-center">
                                        <a  href="'.base_url("index.php/editarDocumento/").$key["IdDocumento"].'" class="w-100">
                                            <p class="list-item-heading mb-1 ">'.$key["Nombre"].'</p>
                                        </a>
                                        <p class="mb-1 text-muted text-small w-100 ">Creado: '.rtrim($key["FechaCrea"],'.000').'</p>
										<p class="mb-1 text-muted text-small w-100 ">Actualizado: '.rtrim($key["FechaEdita"],'.000').'</p>
										<a class="list-item-heading mb-0  w-100 w-xs-100 mt-0" href="'.base_url("index.php/verHistorial/").$key["IdDocumento"].'">
											<i class="iconsminds-check heading-icon"></i> <span class="align-middle d-inline-block">Ver historial</span>
										</a>
                                    </div>
                                    <div class="pl-1 align-self-center">
										<label class="custom-control custom-checkbox mb-0">
											<input type="checkbox" class="custom-control-input"> 
											<span class="custom-control-label"></span>
										</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                ?>			
								
			</div>
		</div>
	</div>
</div>


<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
</main>