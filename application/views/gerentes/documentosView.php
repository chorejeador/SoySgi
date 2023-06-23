
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
</style>
<main class="default-transition" style="margin-left:40px opacity: 5;">
<div class="container-fluid library-app">
<div class="row">
	<div class="col-12">
		<div class="mb-3">
			<h1 class="display-4 texto-header"><?php echo $datos[0]["Descripcion"]; ?></h1>
			<div class="text-zero top-right-button-container mb-4">
        <a href="javascript:history.back()" type="button" class="btn btn-primary btn-lg top-right-button mr-1">REGRESAR</a>				
			</div>		
		</div>			
	</div>
</div>

  <div class="col-12 listDocumentos">  
    <?php 
      $i= 1;   
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
              echo '
              <a href="'.base_url('index.php/documentosView/').$key["IdGestion"].'">
                <div class="card d-flex flex-row mb-2 active">
                <a class="d-flex listDocumentosImg" href="Pages.Product.Detail.html">
                  <img src="'.base_url().'assets/img/icono carpeta.png" alt="Fat Rascal" class="listDocumentosFolder list-thumbnail responsive border-0 card-img-left">
                </a>
                  <div class="d-flex flex-grow-1 min-width-zero">
                    <div
                      class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                      <p class="list-item-heading mb-0 truncate w-70 w-xs-100 text-left" href="Pages.Product.Detail.html">'.$key["Descripcion"].'</p>
                      <!--<p class="mb-0 text-small w-15 w-xs-100">Creado el: '.$key["FechaCrea"].'</p>
                      <p class="mb-0 text-small w-15 w-xs-100">Ultima actualizacion: '.$key["FechaCrea"].'</p>-->
                      <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
                          <a style="color: black;  border-color: black;" href="'.base_url('index.php/downloadFile/').$key["IdDocumento"].'" target="_blank" class="btn btn-outline-theme-3 icon-button edit-button text-black"><i class="simple-icon-arrow-down-circle"></i></a> 
                          <a style="color: black; border-color: black;" href="'.base_url('/uploads/').$key["Url"].'.'.$key["Tipo"].'" target="_blank"  class="btn btn-outline-theme-3 icon-button view-button"><i class="simple-icon-eye"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              ';          
            }
      $i++;
    ?>

  </div>
 
</div>


<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
</main>