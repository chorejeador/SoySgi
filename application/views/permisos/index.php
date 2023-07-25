<main class="default-transition" style="opacity: 1;">
    
	<div class="container-fluid">
		<div class="row app-row">
			<div class="col-12">
				<h1>Asignar permisos</h1>
				<nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
					<ol class="breadcrumb pt-0">
						<li class="breadcrumb-item"><a href="#">Home</a></li>						
					</ol>
				</nav>
				<div class="separator mb-5"></div>
			</div>
		</div>
		<div class="row">
            <div class="col-12 col-lg-12 ">
                <h5 class="mb-5">Nuevo proceso</h5>
                <div class="card mb-4">
                    <div class="card-body">                        
                        <form class="needs-validation tooltip-label-right" novalidate="">
                            <div class="form-group position-relative error-l-50">
                                <label>Buscar por tipo: </label>         
                                <select id="filtro">
                                    <option value="gestion">Gestión</option>
                                    <option value="subgestion">Sub Gestiones</option>
                                </select>
                            </div>                            
							<div>
                                <button type="button" id="btnFiltrar" class="btn btn-primary mb-0">Buscar</button>                            
							</div>
                        </form>
                    </div>
                </div>
            </div>            
		</div>        
        <div class="row">
            <div class="col-12 col-lg-12">
                <h5 class="mb-5">Nuevo proceso</h5>
                <div class="card mb-4">
                    <div class="card-body">                       
                        <table class="table" id="tblPermisos">
                           <thead>
                              <tr>                                 
                                 <th scope="col">Tipo Archivo</th>
                                 <th scope="col">Nombre Archivo</th>                                 
                                 <th scope="col">Descripción Archivo</th>
                                 <th scope="col">Asignar permisos</th>
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