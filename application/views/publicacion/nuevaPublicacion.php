<main class="default-transition" style="opacity: 1;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h1>Nueva Publicación</h1>
				<nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
					<ol class="breadcrumb pt-3">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url('index.php/publicacion'); ?>">Lista de
								publicaciones</a></li>
					</ol>
				</nav>
				<div class="separator mb-5"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-lg-12 mb-5">
				<h5 class="mb-5">Nuevo</h5>
				<div class="card mb-4">
					<div class="card-body">
						<form id="formGuardarPublicacion" class="needs-validation tooltip-label-right" novalidate=""
							  enctype='multipart/form-data'>

							<div class="form-group position-relative error-l-50"><label>Título </label>
								<input name="txtTitulo" type="text" id="txtTitulo" class="form-control" required="">
								<div class="invalid-tooltip">El campo es requerido!</div>
							</div>

							<div class="form-group position-relative error-l-50"><label>Descripción</label>
								<textarea name="txtDescripcion" class="form-control" id="txtDescripcion"
										  rows="3"></textarea>
								<div class="invalid-tooltip">El campo es requerido!</div>
							</div>


							<div class="form-group">
								<label for="formControl">Ingrese las imágenes a postear</label>
								<input accept="image/*" type="file" class="form-control-file" id="imagen" name="imagen[]"
									   multiple
								>
							</div>

							<!--							fin-->
							<div>
								<button type="button" id="btnGuardar" class="btn btn-primary mb-0">Guardar</button>
								<a href="<?php echo base_url('index.php/publicacion') ?>" class="btn btn-danger mb-0">Cancelar</a>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>

	</div>
</main>
