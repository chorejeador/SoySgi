<main class="default-transition" style="opacity: 1;">
    
	<div class="container-fluid">
		<div class="row app-row">
			<div class="col-12">
				<h1>Asignar Permisos</h1>
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
                                 <th scope="col">Asignar Permisos</th>
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>


  <div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Asignar Permisos a este documento:</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Cerrar"><i class="simple-icon-close"></i> </button>
        </div>
        <div class="modal-body">
          <table class="table" id="tblUsuarios">
            <thead>
                <tr>                                 
                    <th scope="col">Nombre Usuario</th>
                    <th scope="col">Área</th>
                    <th scope="col">Permiso en este archivo</th>
                    <th scope="col">Dar Permiso</th>
                </tr>
            </thead>
            <tbody>                               
            </tbody>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>     
        </div>
      </div>
    </div>
  </div>

</main>

