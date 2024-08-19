<main class="default-transition" style="opacity: 1;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h1>Listado de publicaciones</h1>
				<div class="separator mb-5"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-lg-12">
				<div class="card mb-4">
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								<h5 class="mb-4">Filtros</h5>
								<div class="d-flex justify-content-between">
									<input type="text" class="form-control mx-4" id="filtro" placeholder="Descripción"/>
									<button id="btnBuscar" class="btn btn-outline-primary">Buscar</button>
								</div>
							</div>
							<div class="col-6">
								<div class="text-center mt-5">
									<a href="<?= base_url('index.php/nuevapublicacion') ?>"
									   class="btn btn-outline-success btn-editar" id="btnNueva">Nueva Publicación</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 mb-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Resultados</h5>
						<table id="idPublicaiones" class="table table-bordered">
							<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Título</th>
								<th scope="col">Estado</th>
								<th scope="col">Fecha Creación</th>
								<th scope="col">Última Actualización</th>
								<th scope="col">Editar</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>
