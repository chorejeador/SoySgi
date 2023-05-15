<style>

  /* RESET STYLES & HELPER CLASSES
  –––––––––––––––––––––––––––––––––––––––––––––––––– */
  :root {
    --level-1: #8dccad;
    --level-2: #f5cc7f;
    --level-3: #7b9fe0;
    --level-4: #f27c8d;
    --black: black;
  }

  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  ol {
    list-style: none;
  }

  body {
    margin: 50px 0 100px;
    text-align: center;
    font-family: "Inter", sans-serif;
  }

  .container {
    max-width: 1000px;
    padding: 0 10px;
    margin: 0 auto;
  }

  .rectangle {
    position: relative;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
  }


  /* LEVEL-1 STYLES
  –––––––––––––––––––––––––––––––––––––––––––––––––– */
  .level-1 {
    width: 50%;
    margin: 0 auto 40px;
    background: var(--level-1);
  }

  .level-1::before {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    width: 2px;
    height: 20px;
    background: var(--black);
  }


  /* LEVEL-2 STYLES
  –––––––––––––––––––––––––––––––––––––––––––––––––– */
  .level-2-wrapper {
    position: relative;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
  }

  .level-2-wrapper::before {
    content: "";
    position: absolute;
    top: -20px;
    left: 25%;
    width: 50%;
    height: 2px;
    background: var(--black);
  }

  .level-2-wrapper::after {
    display: none;
    content: "";
    position: absolute;
    left: -20px;
    bottom: -20px;
    width: calc(100% + 20px);
    height: 2px;
    background: var(--black);
  }

  .level-2-wrapper li {
    position: relative;
  }

  .level-2-wrapper > li::before {
    content: "";
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
    width: 2px;
    height: 20px;
    background: var(--black);
  }

  .level-2 {
    width: 70%;
    margin: 0 auto 40px;
    background: var(--level-2);
  }

  .level-2::before {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    width: 2px;
    height: 20px;
    background: var(--black);
  }

  .level-2::after {
    display: none;
    content: "";
    position: absolute;
    top: 50%;
    left: 0%;
    transform: translate(-100%, -50%);
    width: 20px;
    height: 2px;
    background: var(--black);
  }


  /* LEVEL-3 STYLES
  –––––––––––––––––––––––––––––––––––––––––––––––––– */
  .level-3-wrapper {
    position: relative;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-column-gap: 20px;
    width: 90%;
    margin: 0 auto;
  }

  .level-3-wrapper::before {
    content: "";
    position: absolute;
    top: -20px;
    left: calc(25% - 5px);
    width: calc(50% + 10px);
    height: 2px;
    background: var(--black);
  }

  .level-3-wrapper > li::before {
    content: "";
    position: absolute;
    top: 0;
    left: 50%;
    transform: translate(-50%, -100%);
    width: 2px;
    height: 20px;
    background: var(--black);
  }

  .level-3 {
    margin-bottom: 20px;
    background: var(--level-3);
  }


  /* LEVEL-4 STYLES
  –––––––––––––––––––––––––––––––––––––––––––––––––– */
  .level-4-wrapper {
    position: relative;
    width: 80%;
    margin-left: auto;
  }

  .level-4-wrapper::before {
    content: "";
    position: absolute;
    top: -20px;
    left: -20px;
    width: 2px;
    height: calc(100% + 20px);
    background: var(--black);
  }

  .level-4-wrapper li + li {
    margin-top: 20px;
  }

  .level-4 {
    font-weight: normal;
    background: var(--level-4);
  }

  .level-4::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 0%;
    transform: translate(-100%, -50%);
    width: 20px;
    height: 2px;
    background: var(--black);
  }


  /* MQ STYLES
  –––––––––––––––––––––––––––––––––––––––––––––––––– */
  @media screen and (max-width: 700px) {
    .rectangle {
      padding: 20px 10px;
    }

    .level-1,
    .level-2 {
      width: 100%;
    }

    .level-1 {
      margin-bottom: 20px;
    }

    .level-1::before,
    .level-2-wrapper > li::before {
      display: none;
    }
    
    .level-2-wrapper,
    .level-2-wrapper::after,
    .level-2::after {
      display: block;
    }

    .level-2-wrapper {
      width: 90%;
      margin-left: 10%;
    }

    .level-2-wrapper::before {
      left: -20px;
      width: 2px;
      height: calc(100% + 40px);
    }

    .level-2-wrapper > li:not(:first-child) {
      margin-top: 50px;
    }
  }

</style>


<main class="default-transition" style="margin-left:40px; opacity: 5;">
<div class="container-fluid library-app">

  <h1 class="display-4">SISTEMA SIG</h1>
  <h2 class="">PROCESOS INTERNOS</h2>
  <div class="col-12 list">

  
  <?php 
  $i= 1;
    foreach ($procesos as $key ) {
      
      echo '
      <div class="card question d-flex mb-4 edit-quesiton active" style="font-weight:bolder;">
        <div class="d-flex flex-grow-1 min-width-zero">
          <div
            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1" style="text-align:left;">
              <span class="heading-number mb-1 d-inline-block">'.$i.'</span>
              <strong class="titulo2">'.$key["Descripcion"].'</strong>
              <br>
              <span class="titulo2">Ultima actualización: '.$key["FechaCrea"].'</span>
              </div>
          </div>
          <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
              <button class="btn btn-outline-theme-3 icon-button rotate-icon-click collapsed" type="button" data-toggle="collapse" data-target="#q-'.$i.'" aria-expanded="false" aria-controls="q-'.$i.'">
                  <i class="simple-icon-arrow-down with-rotate-icon"></i>
              </button>
              </div>
        </div>
        <div class="question-collapse collapse" id="q-'.$i.'" style="">
          <div class="card-body pt-0">';
            foreach ($key["gestiones"] as $keyGestiones ) {
              echo '

              <a href="'.base_url('index.php/documentosView/').$keyGestiones["IdGestion"].'" style="font-weight:bold;">
                <div class="card d-flex flex-row mb-4 btn-outline-primary" 
                     style="box-shadow: 0 3px 10px rgb(0 0 0 / 10%), 0 3px 5px rgb(0 0 0 / 10%);">

                  <div class="d-flex flex-grow-1 min-width-zero">
                    <div
                      class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                      <i class="iconsminds-folder-add-- text-warning" style="font-size:30px;font-weight:bolder;"></i>
                      <p class="list-item-heading mb-0 truncate w-40 w-xs-100 text-left" href="Pages.Product.Detail.html">'.$keyGestiones["Descripcion"].'</p>
                      <p style="font-weight:bold;" class="mb-0 text-small w-30 w-xs-100">Ultima Actualizacion: '.$keyGestiones["FechaCrea"].'</p>
                      <div style="font-weight:bold;" class="w-15 w-xs-100"><span class="badge badge-pill badge-danger">'.strtoupper($keyGestiones["Sigla"]).'</span></div>
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


<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
</main>