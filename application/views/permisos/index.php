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
                            <div class="form-group position-relative error-l-50"><label>Buscar</label> 
                                <!--<input type="text" id="filtro" class="form-control" required="" value="" >-->
                                <!--<input type="hidden" id="filtro"  class="form-control col-8 col-md-8 col-sm-12" />-->

                                <select id="filtro"></select>
                            </div>                            
							<div>
                            <button type="button" id="btnGuardar" class="btn btn-primary mb-0">Editar</button>
                            <a href="<?php echo base_url('index.php/procesos') ?>" class="btn btn-danger mb-0">Cancelar</a>
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
                                 
                                 <th scope="col">Nombre</th>
                                 <th scope="col">Descripción</th>                                 
                                 <th scope="col">Opción</th>
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