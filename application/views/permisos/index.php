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
        <select id="filtro" class="form-control">
        <option value="gestion">Gestión</option>
        <option value="subgestion">Sub Gestiones</option>
        </select>
          </div>                            
				<div class="mt-3">
                  <button type="button" id="btnFiltrar" class="btn btn-primary mb-0">
                     Buscar
                </button>                            
					</div>
                  </form>
             </div>
            </div>
            </div>            
		</div>        

        <div class="row">
            <div class="col-12 col-lg-12">
                <h5 class="mb-5">Listado de documentos</h5>
                <div class="card mb-4">
                    <div class="card-body">                       
                        <table class="table table-bordered" id="tblPermisos">
                           <thead>
                              <tr>                                 
                                 <th scope="col">Tipo Archivo</th>
                                 <th scope="col">Nombre Archivo</th>                                 
                                 <th scope="col">Descripción Archivo</th>
                                 <th scope="col">Asignar Permisos</th>
                              </tr>
                           </thead>
                           <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>            
        </div>       

	</div> 

  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Asignar Permisos a este documento:</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered" id="tblUsuarios">
                    <thead>
                        <tr>
                            <th scope="col">Nombre Usuario</th>
                            <th scope="col">Área</th>
                            <th scope="col">Permiso en este archivo</th>
                            <th scope="col" class="text-center">
                                <input type="checkbox" id="checkAllUsers"> Todos
                            </th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" id="btnRevocarMasivo" class="btn btn-danger">
                    Revocar permiso
                </button>

                <button type="button" id="btnMasivo" class="btn btn-success">
                    Dar permiso
                </button>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cerrar
                </button>
            </div>

        </div>
    </div>
</div>
        <div class="modal-footer">

           
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Cerrar
          </button>     

        </div>
      </div>
    </div>
  </div>

</main>
<style>
.estado-glow {
    padding: 6px 16px;
    border-radius: 999px;
    font-size: 12.5px;
    font-weight: 600;
    letter-spacing: 0.4px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.3s ease;
}

.estado-glow.ok {
    background: linear-gradient(135deg, #208b39, #289441);
    color: #fff;
    box-shadow: 0 4px 12px rgba(40, 167, 69, 0.35);
}


.estado-glow.no {
    background: linear-gradient(135deg, #dc3545, #ff4d5a);
    color: #fff;
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.35);
}


.estado-glow:hover {
    transform: translateY(-2px) scale(1.03);
    filter: brightness(1.05);
}


.estado-glow.ok::before,
.estado-glow.no::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 999px;
    opacity: 0.15;
    filter: blur(6px);
    z-index: -1;
}


.estado-glow {
    position: relative;
}
</style>