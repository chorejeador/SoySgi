<main class="default-transition" style="opacity: 1;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h1 class="text-black" id="nombre-pagina"></h1>
				<div class="separator mb-5"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-lg-12 mb-5">
				<div class="card mb-4 shadow-lg">
					<div class="card-body">
						<div class="form-group">
							<label class="form-label">Título de la publicación </label>
							<input name="txtTitulo" type="text" id="txtTitulo" class="form-control"
								   placeholder="El título que llevará la publicación" required>
						</div>
						<div class="form-group">
							<label class="form-label">Subtitulo de la publicación</label>
							<input type="text" name="txtSubtitulo" class="form-control" id="txtSubtitulo"
								   placeholder="El subtítulo es una breve explicación de la publicación." required/>
						</div>
						<div class="form-group">
							<label class="form-label">Descripción</label>
							<div id="idDescripcion" style="height: 300px"></div>
						</div>
						<div class="drop_zone">
							<label class="form-label">Ingrese las imágenes a postear</label>
							<div class="my-dropzone">
								<div class="dz-message" data-dz-message>
									  <span>Arrastra y suelta acá las imágenes,
										<a class="btn-choose-file btn-link" id="btn-upload">o click para buscar</a>
									  </span>
								</div>
							</div>
						</div>
						<div class="form-group">
						</div>
						<div class="d-none mb-4" id="idContenedorImagen">
							<h3>Imagen actual</h3>
							<div class="text-center" style="width: 400px; height: auto;">
								<img src="" class="img-fluid" id="idImagen"/>
							</div>
						</div>
						<div>
							<button id="btnGuardar" class="btn btn-primary mb-0">Guardar</button>
							<a href="<?php echo base_url('index.php/publicacion') ?>" class="btn btn-danger mb-0">Cancelar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

