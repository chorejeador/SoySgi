
<style>
  .listDocumentos .card{
    background-color: #d7d7d7;
  }
  .listDocumentos .card-body p{
    color: white!important;
    font-family:'roboto';
  }

  .listDocumentosImg .listDocumentosFolder{
    height: 50px
  }

  .listDocumentosImg{
    align-items: center;
    justify-content: center;
    padding-left:20px;
  }
  tbody td{
    vertical-align: middle!important;
  }
</style>
<main class="default-transition" style="margin-left:40px !important">
<div class="container-fluid library-app">
<div class="row">
	<div class="col-12">
		<div class="mb-3">
			<h1 class="display-4 separator"><i class="iconsminds-monitor-analytics"></i> <?php echo $datos[0]["Descripcion"]; ?></h1>
			<div class="text-zero top-right-button-container mb-4">
        <a href="javascript:history.back()" type="button" class="btn btn-primary btn-lg top-right-button mr-1">
          <i class="simple-icon-arrow-left"></i> REGRESAR
        </a>				
			</div>		
		</div>			
	</div>
</div>

<div class="row card" style="flex-direction:row!important">
    <div class="col-lg-6 listDocumentos pt-5">

    <table class="table">
       <thead class="thead-light">
          <tr style="height:70px;">
             <th style="vertical-align: middle;" scope="col"></th>
             <th style="vertical-align: middle;" scope="col"></th>
             <th style="vertical-align: middle;" scope="col">Fecha</th>
             <th style="vertical-align: middle;" scope="col">Opción</th>
          </tr>
       </thead>
       <tbody>
        <?php
            
         foreach ($archivos as $key ) {
          $img = 'default.png';
            switch ($key["Tipo"]) {
              case 'pdf':
                $img = 'pdf.png';
                break;
              case 'jpeg':
                $img = 'image.png';
                break;
              case 'jpg':
                $img = 'image.png';
                break;
              case 'png':
                  $img = 'image.png';
                  break;
              case 'xls':
                $img = 'excel.png';
                break;
              case 'xlsx':
                $img = 'excel.png';
                  break;
              case 'doc':
                $img = 'doc.png';
                break;
              case 'docx':
                $img = 'doc.png';
                break;            
              default:
                  $img = 'default.png';
                break;
            }

            echo '<tr style="border-bottom: 1px solid #dcd9d9;">
                <td><img style="height:50px;" src="'.base_url().'assets/img/documentos/'.$img.'"></td>
                <td>'.$key["Descripcion"].'</td>
                <td>'.$key["FechaCrea"].'</td>
                <td>
                    <a style="color: black;  border-color: black;" href="'.base_url('index.php/downloadFile/').$key["IdDocumento"].'/gestion" target="_blank" class="btn btn-outline-theme-3 icon-button edit-button text-black"><i class="simple-icon-arrow-down-circle"></i></a> 
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" style="color: black; border-color: black;" href="'.base_url('/uploads/').$key["Url"].'.'.$key["Tipo"].'" target="_blank"  class="btn btn-outline-theme-3 icon-button view-button"><i class="simple-icon-eye"></i></a>
                  </td>
            </tr>';
         }
       ?>
       </tbody>
    </table>
      <?php 
        $i= 1;   
          foreach ($archivos as $key ) {           
               /* echo '
                <a href="'.base_url('index.php/documentosView/').$key["IdGestion"].'">
                  <div class="card d-flex flex-row mb-2 active">
                  <a class="d-flex listDocumentosImg" href="#">
                    <img src="'.base_url().'assets/img/icono carpeta.png" alt="Fat Rascal" class="listDocumentosFolder list-thumbnail responsive border-0 card-img-left">
                  </a>
                    <div class="d-flex flex-grow-1 min-width-zero">
                      <div
                        class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                        <p class="list-item-heading mb-0 truncate w-70 w-xs-100 text-left" href="#">'.$key["Descripcion"].'</p>
                        <!--<p class="mb-0 text-small w-15 w-xs-100">Creado el: '.$key["FechaCrea"].'</p>
                        <p class="mb-0 text-small w-15 w-xs-100">Ultima actualizacion: '.$key["FechaCrea"].'</p>-->
                        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
                            <a style="color: black;  border-color: black;" href="'.base_url('index.php/downloadFile/').$key["IdDocumento"].'/gestion" target="_blank" class="btn btn-outline-theme-3 icon-button edit-button text-black"><i class="simple-icon-arrow-down-circle"></i></a> 
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" style="color: black; border-color: black;" href="'.base_url('/uploads/').$key["Url"].'.'.$key["Tipo"].'" target="_blank"  class="btn btn-outline-theme-3 icon-button view-button"><i class="simple-icon-eye"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                ';   */       
              }
        $i++;
      ?>
    </div>

    <div class="col-lg-6 col sm-12 mapaUbicacion text-center">
      <div class="card-body">
      <h1 class="lead mb-0 pb-0"><i class="iconsminds-map-marker-2 text-danger"></i>Estas aquí</h1>
      <?php
        $img = 'Mapa-1.png';
          if ($datos[0]["Imagen"]  != null) {
            $img = $datos[0]["Imagen"];
          }
       ?>
      <img id="mapaUbicacion" width="100%" src="<?php echo base_url()?>assets/img/mapa/<?php echo $img; ?>" style="width: 100%; " alt="">
      </div>
    </div>



  </div><!--end row-->
</div>
</main>