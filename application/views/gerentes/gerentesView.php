
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
<div class="container-fluid library-app row">

  <!--<h1 class="display-4">SISTEMA SIG</h1>
  <h2 class="">PROCESOS INTERNOS</h2>-->
  <div class="col-8 listProcesos">
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
              $button = '';
              $dropdown = '';
              if (count($keyGestiones["subgestiones"]) >0) {
                $button = '<button class="btn mr-2 btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="collapse" data-target="#collapseOne'.$keyGestiones["IdGestion"].'" aria-expanded="true" aria-controls="collapseOne'.$keyGestiones["IdGestion"].'">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>';  

                    foreach ($keyGestiones["subgestiones"] as $keySubGestiones ) {
                      $dropdown .= '<li class="list-group-item"><a href="documentosViewSubgestion/'.$keySubGestiones["IdSubGestion"].'">'.$keySubGestiones["Descripcion"].'</a></li>';
                    }
                    
              }
                          

              echo '              
                <div class="card d-flex flex-column mb-1 btn-outline-primary" style="box-shadow: 0 3px 10px rgb(0 0 0 / 10%), 0 3px 5px rgb(0 0 0 / 10%);">
                  <div id="accordion'.$keyGestiones["IdGestion"].'">                    
                  <div class="d-flex flex-grow-1 min-width-zero">
                    '.$button.'

                    <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                      <a class="w-80" href="'.base_url('index.php/documentosView/').$keyGestiones["IdGestion"].'" style="font-weight:bold;">
                      <p class="list-item-heading mb-0 w-100 w-xs-100 text-left" href="Pages.Product.Detail.html">'.$keyGestiones["Descripcion"].'</p>
                      </a>
                        <div style="font-weight:bold;" class="w-20 w-xs-100">
                          <span class="badge w-100 badge-pill badge-danger">'.strtoupper($keyGestiones["Sigla"]).'</span>
                        </div>
                    </div>
                  </div>
                  <div id="collapseOne'.$keyGestiones["IdGestion"].'" class="collapse" aria-labelledby="headingOne'.$keyGestiones["IdGestion"].'" data-parent="#accordion'.$keyGestiones["IdGestion"].'">
                      <div class="card-body">
                        <ul class="list-group">                          
                          '.$dropdown.'
                        </ul>                      
                      </div>
                    </div>
                  </div>
                </div>
              
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

  <div class="col-4 col sm-12 mapaUbicacion">
    <img id="mapaUbicacion" width="80%" src="<?php echo base_url()?>assets/img/mapa/mapa-1.png" style="width: 80%;" alt="">
  </div>
</div>
 
</div>
<script>

    function showDiv(params) {
      console.log(params);

      $('#q-1').removeClass('show');
      $('#q-2').removeClass('show');
      $('#q-3').removeClass('show');
      $('#q-4').removeClass('show');

      $('#'+params).toggleClass('show');

      if (params == 'q-1') {
        $("#mapaUbicacion").attr("src","<?php echo base_url()?>assets/img/mapa/mapa-1.png");  
      }
      if (params == 'q-2') {
        $("#mapaUbicacion").attr("src","<?php echo base_url()?>assets/img/mapa/mapa-2.png");  
      }
      if (params == 'q-3') {
        $("#mapaUbicacion").attr("src","<?php echo base_url()?>assets/img/mapa/mapa-3.png");  
      }

    }
</script>

</main>