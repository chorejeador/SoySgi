<main class="default-transition" style="opacity: 5;">
<div class="container-fluid library-app">	
	<div class="row">		
		<div class="col-12 col-xl-12 list disable-text-selection" data-check-all="checkAll">
            <div class="d-inline-block"><h5 class="d-inline">Historial del documento: <?php echo $datos[0]["Nombre"]; ?></h5></div>
			<div class="row">

                <?php
				if (count($documentos) == 0) {
					echo '<div class="col-12" data-check-all="checkAll"><br><br>
								<h4 class="align-middle d-inline-block">Sin archivos actualmente...</h4>
								</div>';
				}
                    foreach ($documentos as $key) {
                        echo '
                        <div class="col-xxl-12 col-xl-12 col-12">
                            <div class="card d-flex flex-row mb-4 media-thumb-container">
								<a class="d-flex align-self-center media-thumbnail-icon" href="'.base_url('/uploads/').$key["Url"].'.'.$key["Tipo"].'">
									<i class="iconsminds-data-download"></i>
								</a>
                                <div class="d-flex flex-grow-1 min-width-zero">
                                    <div
                                        class="card-body align-self-center d-flex flex-column justify-content-between min-width-zero align-items-lg-center">
                                        <a href="'.base_url("index.php/editarDocumento/").$key["IdDocumento"].'" class="w-100">
                                            <p class="list-item-heading mb-1 ">'.$key["Nombre"].'</p>
                                        </a>
                                        <p class="mb-1 text-muted text-small w-100 ">Creado: '.rtrim($key["FechaCrea"],'.000').' <strong>Por:</strong> '.$key["UsuarioCrea"].'</p>
										<p class="mb-1 text-muted text-small w-100 ">Actualizado: '.rtrim($key["FechaEdita"],'.000').' <strong>Por:</strong> '.$key["UsuarioEdita"].'</p>
										
                                    </div>
                                    <div class="pl-1 align-self-center">
										<label class="custom-control custom-checkbox mb-0">
											<input type="checkbox" class="custom-control-input"> 
											<span class="custom-control-label"></span>
										</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                ?>			
								
			</div>
		</div>
	</div>
</div>


<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
</main>