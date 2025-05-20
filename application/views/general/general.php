<main class="default-transition" style="opacity: 1;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h1>Listado de Gestiones</h1>
				<nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
					<ol class="breadcrumb pt-0">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
					</ol>
				</nav>
				<div class="separator mb-5"></div>
			</div>
		</div>
		<div class="row">
        <div class="col-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-2">Filtros</h5>
                        <form class="form-inline">
                                <label class="sr-only" for="filtro">Name</label>
                                <input type="text"class="form-control mb-2 mr-sm-2" id="filtro" placeholder="Digite la descripción">
                                <button type="button" id="btnBuscar" class="btn btn-sm btn-outline-primary mb-2">Buscar</button>

							<button type="button" id="btnCrear"
								class="btn btn-sm btn-outline-primary mb-2 ml-3">
									Crear
							</button>

                        </form>
                    </div>
                </div>
            </div>

        
	</div>

		<div class="row">

			<div class="col-12 col-lg-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Recursos</h5>
						<table id="catGestion" class="table table-bordered  table-hover">

							<thead class="thead-light">
							<tr>
								<th scope="col" class="py-3">Nombre</th>
								<th scope="col" class="py-3">Descripción</th>
								<th scope="col" class="py-3">Fecha Creación</th>
								<th scope="col" class="py-3">Última Actualización</th>
								<th scope="col" class="py-3">Ver</th>
								<th scope="col" class="py-3">Editar</th>
								<th scope="col" class="py-3">Acción</th>
							</tr>
							</thead>
							<tbody>

							</tbody>
						</table>

					</div>
				</div>

			</div>
		</div>
</main>


<!-- Modal -->
<div class="modal fade" id="modalDocumento" tabindex="-1" role="dialog" aria-labelledby="modalDocumentoLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDocumentoLabel">Formulario de Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formDocumento" class="needs-validation form-sistema-update"
					  action="" novalidate
					  method="post"
					  enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="nombre">Nombre<span style="color: red;">*</span></label>
                        <input type="text" class="form-control mb-4" id="nombre" name="nombre" placeholder="Ingrese el nombre">

                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control mb-4" id="descripcion" name="descripcion" placeholder="Ingrese una descripcion">

                        <label for="selectCarpeta">Carpeta<span style="color: red;">*</span></label>
                        <select id="selectCarpeta" class="form-control select-carpeta" name="selectCarpeta"></select>

						<div class=" mt-3">
							<label for="archivoPdf" class="form-label">Archivo PDF<span style="color: red;">*</span></label>
							<input
								type="file"
								name="archivoPdf"
								id="archivoPdf"
								class="form-control"
								accept="application/pdf"
								placeholder="Ingrese un archivo PDF"
							>
						</div>

					</div>
                    <input type="hidden" id="idDocumento" name="idDocumento">
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
