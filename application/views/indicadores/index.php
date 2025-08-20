<main class="default-transition ml-4" style="opacity: 1;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h1>Indicadores</h1>
				<div class="separator mb-5"></div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-lg-12">
				<div class="card mb-4">
					<div class="card-body">
						<h5 class="mb-4">Filtros</h5>
						<div class="row">
							<div class="col-md-8">
								<!-- Form principal: input + buscar + filtros -->
								<form class="form-inline" onsubmit="event.preventDefault();">
									<label class="sr-only" for="filtro">Descripción</label>
									<input type="text" class="form-control mb-2 mr-sm-2" id="filtro" placeholder="Descripción">
									<button type="button" id="btnBuscar" class="btn btn-sm btn-outline-primary mb-2">Buscar</button>

									<!-- Botón abrir panel de filtros -->
									<button type="button" id="btnFiltro" class="btn btn-sm btn-outline-secondary mb-2 ml-2">
										<i class="simple-icon-equalizer"></i>&nbsp;Filtros
									</button>
								</form>
							</div>

							<div class="col-md-4">
								<div class="text-md-right mb-2">
									<a type="button" href="<?php echo base_url('index.php/agregarIndicadorGerente') ?>" class="btn btn-sm btn-outline-primary">Agregar Indicadores</a>
								</div>
							</div>
						</div> <!-- .row filtros -->
					</div>
				</div>
			</div>

			<div class="col-lg-12 col-md-12 mb-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Resultados</h5>

						<table id="tblDocumentos" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th scope="col">Año</th>
								<th scope="col">Mes</th>
								<th scope="col">Nombre</th>
								<th scope="col">Descripción</th>
								<th scope="col">Fecha Creación</th>
								<th scope="col">Fecha Edición</th>
								<th scope="col">Descargar</th>
								<!-- TH oculto: debe existir para que columns tenga la misma longitud -->
								<th class="d-none">Area</th>
							</tr>
							</thead>
							<tbody></tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- SIDEBAR FILTROq -->
	<div id="sidebarFilter" class="offcanvas-custom" aria-hidden="true">
		<div class="offcanvas-header">
			<h5 class="mb-0">Filtrar por Área</h5>
			<button id="closeSidebar" class="close" type="button">&times;</button>
		</div>
		<div class="offcanvas-body">
			<div id="areasList" class="mb-3">
				<p class="text-muted">Cargando áreas...</p>
			</div>

			<div class="d-flex justify-content-between">
				<button id="btnClearFilters" class="btn btn-sm btn-light">Limpiar</button>
				<div>
					<button id="btnApplyFilters" class="btn btn-sm btn-primary">Aplicar</button>
				</div>
			</div>
		</div>
	</div>

	<div id="offcanvasBackdrop" class="offcanvas-backdrop d-none"></div>

	<style>
		/* Offcanvas simple */
		.offcanvas-custom { position: fixed; top: 0; right: -360px; width: 360px; height: 100%; background: #fff; box-shadow: -8px 0 24px rgba(0,0,0,0.15); z-index: 1050; transition: right .28s ease; display:flex; flex-direction:column; }
		.offcanvas-custom.open { right: 0; }
		.offcanvas-header { padding: 16px; border-bottom: 1px solid #eee; display:flex; justify-content:space-between; align-items:center; }
		.offcanvas-body { padding: 16px; overflow:auto; flex:1; }
		.offcanvas-backdrop { position: fixed; inset: 0; background: rgba(0,0,0,0.4); z-index: 1040; }
		.area-item { display:flex; align-items:center; margin-bottom:8px; }
		.area-item input { margin-right:8px; }
		/* Mejora visual para fila de grupo (RowGroup) */
		.dt-rowgroup { background-color: #007bff !important; color: #fff !important; font-weight:600; padding: .5rem .75rem; }
	</style>

</main>
