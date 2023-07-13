<main class="default-transition" style="opacity: 5;">
<div class="container-fluid library-app">
	<div class="row">
		<div class="col-12">
			<div class="mb-3">
				<h1>Libreria de Documentos</h1>				
				<nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
					<ol class="breadcrumb pt-0">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url('index.php/general') ?>">Doc. Generales</a></li>						
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

						<div class="form-group position-relative error-l-50"><label>Nombre:</label> 
						<input type="text" id="txtNombre" name="txtNombre" autocomplete="off" class="form-control" required="">
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
						<button type="button" id="guardar" class="btn btn-primary mb-0">Guardar</button>

					</form>
				</div>
			</div>
		</div>		
	</div>
</div>


<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
</main>