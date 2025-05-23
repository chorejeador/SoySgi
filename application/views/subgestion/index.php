<main class="default-transition" style="opacity: 1;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h1>Listado de Sub Gestiónes</h1>
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
                        <h5 class="mb-4">Filtros</h5>
                        <label class="sr-only" for="filtro">Name</label> 
                        <input type="text"class="form-control mb-2 mr-sm-2" id="filtro" placeholder="Descripción">                                                             
                        <button type="button" id="btnBuscar" class="btn btn-sm btn-outline-primary mb-2">Buscar</button>
                        
                    </div>
                </div>                
            </div>	
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Resultados</h5>
                        <table id="catSubProcesos" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Sigla</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Fecha Creación</th>
                                    <th scope="col">Última Actualización</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Agregar Documentos</th>                                    
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