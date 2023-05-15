<main class="default-transition" style="opacity: 5;">
<div class="container-fluid library-app">
	<div class="row">
		<div class="col-12">
			<div class="mb-3">
				<h1>Edición del archivo: <?php echo $datos[0]["Nombre"]; ?></h1>				
				<nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
					<ol class="breadcrumb pt-0">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url('index.php/gestiones') ?>">Lista de gestiones</a></li>						
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
					<h5 class="">Subir documento</h5>
					<h6 class="mb-4 text-warning">Al subir un documento se desabilitara el actual y se guardara un historial.</h6>
					<form class="needs-validation tooltip-label-right" id="formDocumento" novalidate="">
						
						<?php echo form_hidden('txtId',$datos[0]["IdDocumento"]);?>
						<?php echo form_hidden('txtIdGestion',$datos[0]["IdGestion"]);?>
						<?php echo form_hidden('txtIdPadre',$datos[0]["IdPadre"]);?>

						<div class="form-group position-relative error-l-50"><label>Nombre:</label> 
						<input type="text" id="txtNombre" name="txtNombre" value="<?php echo $datos[0]["Nombre"]; ?>" class="form-control" required="">
							<div class="invalid-tooltip">Nombre is required!</div>
						</div>						
						<div class="form-group position-relative error-l-50"><label>Detalles</label> 
						<textarea id="txtDescripcion"  name="txtDescripcion" class="form-control" rows="2" required=""><?php echo $datos[0]["Descripcion"]; ?></textarea>
							<div class="invalid-tooltip">Detalle es requerido!</div>
						</div>
						<div class="form-group position-relative error-l-50"><label>Archivo</label> 
								<input type="file" name="archivo" id="archivo"  class="form-control" rows="2" required="true"/>
							<div class="invalid-tooltip">Detalle es requerido!</div>
						</div>				
						<div class="form-group position-relative error-l-50"><label>Area:</label> 
							<select id="selectArea" name="selectArea"  name="selectArea" class="custom-select" required="">								
								<?php 
									foreach($areas as $key){
										$selected = '';
										if ($datos[0]["IdArea"] == $key["IdArea"]) {
											$selected = 'selected';
										}
										echo '<option value="'.$key["IdArea"].'" "'.$selected.'">'.$key["Descripcion"].'</option>';
									}
									
								?>
								
							</select>
							<div class="invalid-tooltip">Area es requerida!</div>
						</div>					
						<button type="button" id="guardar" class="btn btn-primary mb-0">Guardar</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-12 col-xl-8 list disable-text-selection" data-check-all="checkAll">
            <div class="d-inline-block"><h5 class="d-inline iconsminds-file-clipboard-file---text">Historial de archivos</h5></div>
			<div class="row">
			<div class="col-12 mt-4">
				<div class="list disable-text-selection" data-check-all="checkAll">	
				<?php
				if (count($documentos) == 0) {
					echo '<div class="col-12" data-check-all="checkAll"><br><br>
								<h4 class="align-middle d-inline-block">Sin archivos actualmente...</h4>
								</div>';
				}
                    foreach ($documentos as $key) {
                        echo '
                        <div class="col-xxl-7 col-xl-6 col-12">
                            <div class="card d-flex flex-row mb-4 media-thumb-container">
								<a class="d-flex align-self-center media-thumbnail-icon" href="Apps.MediaLibrary.ViewFolder.html"><i class="iconsminds-folder-open"></i></a>
                                <div class="d-flex flex-grow-1 min-width-zero">
                                    <div
                                        class="card-body align-self-center d-flex flex-column justify-content-between min-width-zero align-items-lg-center">
                                        <a href="'.base_url("index.php/verDocumento").'" class="w-100">
                                            <p class="list-item-heading mb-1 ">'.$key["Nombre"].'</p>
                                        </a>
                                        <p class="mb-1 text-muted text-small w-100 ">Creado: '.rtrim($key["FechaCrea"],'.000').'</p>
										<p class="mb-1 text-muted text-small w-100 ">Actualizado: '.rtrim($key["FechaEdita"],'.000').'</p>                              
										<a class="list-item-heading mb-0  w-100 w-xs-100 mt-0" href="#">
											<i class="iconsminds-check heading-icon"></i> <span class="align-middle d-inline-block">Ver historial</span>
										</a>
                                    </div>
                                    <div class="pl-1 align-self-center"><label
                                            class="custom-control custom-checkbox mb-0"><input type="checkbox"
                                                class="custom-control-input"> <span class="custom-control-label"></span></label>
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
	</div>
	<div class="row">
		<div class="col-12 col-xl-8 offset-0 offset-xl-4">
			<nav class="mt-4 mb-3">
				<ul class="pagination justify-content-center mb-0">
					<li class="page-item"><a class="page-link first" href="#"><i
								class="simple-icon-control-start"></i></a></li>
					<li class="page-item"><a class="page-link last" href="#"><i class="simple-icon-control-end"></i></a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>


<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
</main>