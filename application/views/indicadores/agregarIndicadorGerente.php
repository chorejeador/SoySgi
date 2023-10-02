<main class="default-transition ml-4" style="opacity: 5;">
<div class="container-fluid library-app">
	<div class="row">
		<div class="col-12">
			<div class="mb-3">
				<h1>Mis inicadores</h1>				
				<nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
					<ol class="breadcrumb pt-0">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url('index.php/misIndicadores') ?>">Mis indicadores</a></li>						
					</ol>
				</nav>
			</div>
			
			<div class="separator mb-5"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-xl-12">
			<h5 class="mb-5">Carga de documentos</h5>
			<div class="card mb-4">
				<div class="card-body">
					<h5 class="mb-4">Subir documento</h5>
					<form class="needs-validation tooltip-label-right" id="formDocumento" novalidate="">						
						<div class="form-group">
						    <label for="meses">Selecciona un mes:</label>
						    <select class="form-control" id="meses" name="mes">
						        <option value="1">Enero</option>
						        <option value="2">Febrero</option>
						        <option value="3">Marzo</option>
						        <option value="4">Abril</option>
						        <option value="5">Mayo</option>
						        <option value="6">Junio</option>
						        <option value="7">Julio</option>
						        <option value="8">Agosto</option>
						        <option value="9">Septiembre</option>
						        <option value="10">Octubre</option>
						        <option value="11">Noviembre</option>
						        <option value="12">Diciembre</option>
						    </select>
						</div>
						<div class="form-group">
						    <label for="anio">Selecciona un año:</label>
						    <select class="form-control" id="anio" name="anio">
						        <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
						        <option value="<?php echo date('Y')+1; ?>"><?php echo date('Y')+1; ?></option>
						    </select>
						</div>
						<div class="form-group position-relative error-l-50">

							<div class="form-group position-relative error-l-50"><label>Nombre:</label> 
						<input type="text" id="txtNombre" name="txtNombre" autocomplete="off" class="form-control" required="">
							
						</div>						
						<div class="form-group position-relative error-l-50"><label>Detalles</label> 
						<textarea id="txtDescripcion" name="txtDescripcion" class="form-control" rows="2" required=""></textarea>
							
						</div>
						<div class="form-group position-relative error-l-50"><label>Archivo</label> 
								<input type="file" name="archivo" id="archivo"  class="form-control" rows="2" required="true"/>
							
						</div>
						<button type="button" id="guardar" class="btn btn-primary mb-0">Guardar</button>

					</form>
				</div>
			</div>
		</div>		
	</div>
</div>


<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
</main>