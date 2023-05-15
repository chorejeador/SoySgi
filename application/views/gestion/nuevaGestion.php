<main class="default-transition" style="opacity: 1;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h1>Creación de Gestión</h1>
				<nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
					<ol class="breadcrumb pt-0">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url('index.php/gestiones');?>">Lista de Gestiones</a></li>
					</ol>
				</nav>
				<div class="separator mb-3"></div>
			</div>
		</div>
		<div class="row">
            <div class="col-12 col-lg-12 mb-3">
                <h5 class="mb-5">Nueva gestión</h5>
                <div class="card mb-4">
                    <div class="card-body">
                        <form class="needs-validation tooltip-label-right" novalidate="">
                            <div class="form-group position-relative error-l-50">
								<label>Descripción de la gestion: *</label> 
								<input type="text" id="txtDescripcion" class="form-control" required="">
								<div class="invalid-tooltip">Descripción es requerida!</div>
								<br>								
								<label>Siglas: *</label> 
								<input type="text" id="siglas" class="form-control" required="" placeholder="E 01">
								<div class="invalid-tooltip">Sigla es requerida!</div>
								<br>								
								<label>Proceso al que pertenece:</label> 
                                <select id="selectProceso" class="form-control">
									<?php if ($idProcesoParam == null) {
										echo '<option label="Seleccione el proceso al que esta gestión pertenece:" disabled selected></option>';
									} ?>                                    
									<?php
										foreach ($procesos as $key ) {
											if ($idProcesoParam != null) {
												if ($idProcesoParam == $key["IdProceso"]) {
													echo '<option value="'.$key["IdProceso"].'" selected>'.$key["Descripcion"].'</option>';
												}
											}else{
												echo '<option value="'.$key["IdProceso"].'">'.$key["Descripcion"].'</option>';
											}
										}
									?>
                                </select>
                            </div>
							<div>
                            	<button type="button" id="btnGuardar" class="btn btn-primary mb-0">Guardar</button>
								<a href="<?php echo base_url('index.php/gestiones') ?>" class="btn btn-danger mb-0">Cancelar</a>
							</div>
                        </form>
                    </div>
                </div>
            </div>
            
		</div>
        
	</div>
</main>