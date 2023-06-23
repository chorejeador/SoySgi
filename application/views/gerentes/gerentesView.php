
<style>
  .listProcesos .card{
    background-color: #d7d7d7;
    color: black!important;    
  }

  .listProcesos .card .titulo2{
    text-align:center;
  }

  .listProcesos .card .question-collapse.show{
    left: calc(100% + 10px);
    position: absolute;
    width: 90%;
    padding: 26px;
    padding-top:0px!important;    
    border-radius: 50px;
    transition: visibility 0s, opacity 0.5s linear!important;

  }
  .listProcesos .card .question-collapse.show .card-body{
    margin: 0px!important;
    padding: 0px!important;
  }
  .listProcesos .card .question-collapse.show .card-body.pt-0{
    background-color: #d7d7d7;
    padding: 20px!important;
    border-radius: 50px;
  }
  .listProcesos .card .question-collapse.show .card-body .card{
    box-shadow: none!important;
  }
  .listProcesos .card .question-collapse.show .card{
    padding:8px!important;
  }

  .question-collapse.collapse.show{
    cursor: auto!important;
  }
  .question-collapse.collapse.show .btn-outline-primary:active,.question-collapse.collapse.show .btn-outline-primary:hover{
    background-color: #c1baba!important;
  }

</style>
<main class="default-transition" style="margin-left:40px; opacity: 5;">
<div class="container-fluid library-app">

  <!--<h1 class="display-4">SISTEMA SIG</h1>
  <h2 class="">PROCESOS INTERNOS</h2>-->
  <div class="col-12 listProcesos">
    <?php 
    $i= 1;
    foreach ($procesos as $key ) {
      
      echo '
      <div class="card w-50 question d-flex mb-4 edit-quesiton active" style="font-weight:bolder;cursor:pointer;" onClick="showDiv('."'q-".$i."'".')">
        <div class="d-flex flex-grow-1 min-width-zero">
          <div
            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1" style="text-align:left;">              
              <strong class="titulo2">'.$key["Descripcion"].'</strong>              
            </div>
          </div>
          <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
              <!--<button class="btn btn-outline-theme-3 icon-button rotate-icon-click collapsed" type="button" data-toggle="collapse" data-target="#q-'.$i.'" aria-expanded="false" aria-controls="q-'.$i.'">
                  <i class="simple-icon-arrow-down with-rotate-icon"></i>
              </button>-->
              </div>
        </div>
        <div class="question-collapse collapse" id="q-'.$i.'" style="">
          <div class="card-body pt-0">';
            foreach ($key["gestiones"] as $keyGestiones ) {
              echo '

              <a href="'.base_url('index.php/documentosView/').$keyGestiones["IdGestion"].'" style="font-weight:bold;">
                <div class="card d-flex flex-row mb-1 btn-outline-primary" 
                     style="box-shadow: 0 3px 10px rgb(0 0 0 / 10%), 0 3px 5px rgb(0 0 0 / 10%);">

                  <div class="d-flex flex-grow-1 min-width-zero">
                    <div
                      class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                      <!--<i class="iconsminds-folder-add-- text-warning" style="font-size:30px;font-weight:bolder;"></i>-->
                      <p class="list-item-heading mb-0 w-80 w-xs-100 text-left" href="Pages.Product.Detail.html">'.$keyGestiones["Descripcion"].'</p>
                      <!--<p style="font-weight:bold;" class="mb-0 text-small w-30 w-xs-100">Ultima Actualizacion: '.$keyGestiones["FechaCrea"].'</p>-->
                      <div style="font-weight:bold;" class="w-20 w-xs-100"><span class="badge w-100 badge-pill badge-danger">'.strtoupper($keyGestiones["Sigla"]).'</span></div>
                    </div>
                  </div>
                </div>
              </a>
              ';
            }
          echo '</div>
        </div>
      </div>
      ';
      $i++;
    }
  
  ?>

  </div>
 
</div>
<script>

    function showDiv(params) {

      $('#q-1').removeClass('show');
      $('#q-2').removeClass('show');
      $('#q-3').removeClass('show');
      $('#q-4').removeClass('show');

      $('#'+params).toggleClass('show');
    }
</script>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
</main>