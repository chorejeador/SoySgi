<main class="default-transition" style="opacity: 1;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h1>Creación de Proceso</h1>
				<nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
					<ol class="breadcrumb pt-0">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url('index.php/procesos');?>">Lista de Procesos</a></li>
					</ol>
				</nav>
				<div class="separator mb-5"></div>
			</div>
		</div>
		<div class="row">
            <div class="col-12 col-lg-12 mb-5">
                <h5 class="mb-5">Nuevo proceso</h5>
                <div class="card mb-4">
                    <div class="card-body">                        
                        <form class="needs-validation tooltip-label-right" novalidate="">
                            <div class="form-group position-relative error-l-50"><label>Descripción</label> 
							<input type="text" id="txtDescripcion" class="form-control" required="">
							<div class="invalid-tooltip">Descripción es requerida!</div>
                            </div>
							<div>
                            <button type="button" id="btnGuardar" class="btn btn-primary mb-0">Guardar</button>
							<a href="<?php echo base_url('index.php/procesos') ?>" class="btn btn-danger mb-0">Cancelar</a>
							</div>
                        </form>
                    </div>
                </div>
            </div>
            
		</div>
        
	</div>
</main>