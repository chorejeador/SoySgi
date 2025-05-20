<main class="default-transition" style="opacity: 1;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h1>Administración de Carpetas</h1>
				<nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
					<!--				todo ver esto despues-->
					<ol class="breadcrumb pt-0">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url('index.php/nuevoProcesos'); ?>">Nuevo
								Proceso</a></li>
					</ol>
				</nav>
				<div class="separator mb-5"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-lg-12">
				<div class="card mb-4">
					<div class="card-body">
						<h5 class="mb-4">Filtros</h5>
						<form class="form-inline"><label class="sr-only" for="filtro">Name</label>
							<input type="text" class="form-control mb-2 mr-sm-2" id="filtro" placeholder="Descripción">
							<button type="button" id="btnBuscar" class="btn btn-sm btn-outline-primary mb-2">Buscar
							</button>

							<div class="ml-3">
								<button type="button" id="btnCrear" class=" btn btn-sm btn-outline-primary mb-2">Crear
								</button>

							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 mb-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Resultados</h5>
						<table id="tableCarpetas" class="table table-bordered">
							<thead>
							<tr>
								<th scope="col">Nombre</th>
								<th scope="col">Descripción</th>
								<th scope="col">Estado</th>
								<th scope="col">Fecha Creación</th>
								<th scope="col">Última Actualización</th>
								<th scope="col">Editar</th>
								<th scope="col">Acción</th>
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


<!-- Modal -->
<div class="modal fade" id="modalCarpeta" tabindex="-1" role="dialog" aria-labelledby="modalCarpetaLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalCarpetaLabel">Formulario de Carpeta</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formCarpeta">
					<div class="form-group">
						<label for="nombre">Nombre</label>

						<input type="text" class="form-control" id="nombre" name="nombre"
							   placeholder="Ingrese el nombre">
					</div>

					<input type="hidden" id="idCarpeta" name="idCarpeta">

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="btnModalGuardar">Guardar</button>
				<button type="button" class="btn btn-primary" id="btnModalEditar">Actualizar</button>

			</div>
		</div>
	</div>
</div>

<script>

</script>
