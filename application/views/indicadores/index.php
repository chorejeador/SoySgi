<main class="default-transition ml-4" style="opacity: 1;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h1>Mis  indicadores</h1>				
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
                                <!-- Aquí va tu formulario -->
                                <form class="form-inline">
                                    <label class="sr-only" for="filtro">Name</label> 
                                    <input type="text" class="form-control mb-2 mr-sm-2" id="filtro" placeholder="Descripción">                                                             
                                    <button type="button" id="btnBuscar" class="btn btn-sm btn-outline-primary mb-2">Buscar</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <!-- Este div ocupa las 4 columnas restantes y contiene el botón "Agregar" -->
                                <div class="text-md-right mb-2">
                                    <a type="button" href="<?php echo base_url('index.php/agregarIndicadorGerente') ?>"  class="btn btn-sm btn-outline-primary">Agregar indicadores</a>
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
                        <table id="tblDocumentos" class="table table-bordered">
                            <thead>
                                <tr>                                    
                                    <th scope="col">Mes</th>
                                    <th scope="col">Año</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>                                    
                                    <th scope="col">Fecha Creación</th>                                    
                                    <th scope="col">Descargar</th>
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