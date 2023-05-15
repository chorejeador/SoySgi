<main class="default-transition" style="opacity: 1;">
<div class="container-fluid">
	<div class="row app-row">
		<div class="col-12 survey-app">
			<div class="mb-2">
				<h1>Developer Survey</h1>
				<div class="text-zero top-right-button-container"><button type="button"
						class="btn btn-lg btn-outline-primary dropdown-toggle dropdown-toggle-split top-right-button top-right-button-single"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ACTIONS</button>
					<div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a> <a
							class="dropdown-item" href="#">Another action</a></div>
				</div>
			</div>
			<ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
				<li class="nav-item"><a class="nav-link active" id="first-tab" data-toggle="tab" href="#first"
						role="tab" aria-controls="first" aria-selected="true">DETALLE DE GESTION: <?php echo $proceso[0]["Descripcion"]?></a></li>				
			</ul>
			<div class="tab-content mb-4">
				<div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
					<div class="row">
						<div class="col-lg-4 col-12 mb-4">
							<div class="card mb-4">
								<div class="position-absolute card-top-buttons"><button
										class="btn btn-header-light icon-button"><i
											class="simple-icon-pencil"></i></button></div>
								<div class="card-body">
									<p class="list-item-heading mb-4">Resumen</p>
									<p class="text-muted text-small mb-2">Descripción</p>
									<p class="mb-3"><?php echo $proceso[0]["Descripcion"]?></p>
									<p class="text-muted text-small mb-2">Creado por:</p>
									<p class="mb-3"><?php echo $proceso[0]["Nombres"]?></p>
									<p class="text-muted text-small mb-2">Fecha de Creación</p>
									<p class="mb-3">12.05.2018 - 18.05.2018</p>
									<p class="text-muted text-small mb-2">Labels</p>
									<div>
										<p class="d-sm-inline-block mb-1"><a href="#"><span
													class="badge badge-pill badge-outline-theme-3 mb-1">Proceso</span></a>
										</p>										
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-8">
							<div class="sortable-survey">
                                
                                    
                                
								<div draggable="false" class="" style="">
								<?php foreach ($gestiones as $key ) {
									echo '<div class="card question d-flex mb-4 edit-quesiton">
										<div class="d-flex flex-grow-1 min-width-zero">
											<div
												class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
												<div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1"><span
														class="heading-number d-inline-block">'.$key["Sigla"].' </span>'.$key["Descripcion"].'</div>
											</div>
											<div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
												<a href="'.base_url("index.php/editarGestion/").$key["IdGestion"].'" class="btn btn-outline-theme-3 icon-button view-button">
													<i class="simple-icon-eye"></i>
												</a>
											</div>
										</div>
									</div>';
								} ?>
								</div>								
							</div>
							<div class="text-center">
								<a href="<?php echo base_url('index.php/nuevaGestion/').$proceso[0]["IdProceso"]; ?>" class="btn btn-outline-primary btn-sm mb-2">
									<i class="simple-icon-plus btn-group-icon"></i> Agregar más gestiones
								</a>
							</div>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>
</main>