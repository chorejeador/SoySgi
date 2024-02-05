
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Portal SGI</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        
        <link href="<?php echo base_url() ?>assets/css/roboto.css" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url()?>assets/css/custom_landing.css" rel="stylesheet" />        
        <link rel="stylesheet" href="<?php echo base_url()?>assets/font/iconsmind-s/css/iconsminds.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/font/simple-line-icons/css/simple-line-icons.css">
        <link href="<?php echo base_url()?>assets/css/custom_timeline.css" rel="stylesheet" />
        <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">-->
        <link href="<?php echo base_url()?>assets/css/custom_carousel.css" rel="stylesheet" />
        <script src="<?php echo base_url()?>assets/js/vendor/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/datatables.css">

        <style>
          #categoryForm .form-check{
            display: flex;
            align-items: center;
          }
          .category_label{
            margin-left:7px;
            font-size: 20px;
          }         
          .text-categoria-img{
            font-size:20px;
            font-weight: bold;
          }
          .image-group {
              display: flex;
              justify-content: space-between;
              margin-bottom: 10px;
          }

        </style>
    </head>

    <body id="page-top">
        <!-- lateral menu-->
        <div class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
          <div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
            <a href="#"><img src="<?php echo base_url() ?>assets/img/twitter.png" width="26" alt=""></a>
            <a href="#"><img src="<?php echo base_url() ?>assets/img/facebook.png" width="26" alt=""></a>
            <a href="#"><img src="<?php echo base_url() ?>assets/img/instagram.png" width="26" alt=""></a>
            <a href="#"><img src="<?php echo base_url() ?>assets/img/youtube.png" width="26" alt=""></a>
          </div>
        </div>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url("index.php"); ?>">
                                <img src="<?php echo base_url() ?>assets/img/logo.png" width="100" alt="">
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php'); ?>">INICIO</a></li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-mdb-toggle="dropdown" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            CORPORACIÓN DELMOR
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/misionPolitica') ?>">Misión y política</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/vision') ?>">Visión</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/principiosValores') ?>">Principios y valores</a></li>
                          </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/quienessomos');?>">¿QUIÉNES SOMOS?</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/portafolio'); ?>">PORTAFOLIO</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/trayectoria'); ?>">TRAYECTORIA</a></li>
                        <?php 
                        if($this->session->userdata("logged") == 1){
                            echo '<li style="background-color: #ffffff5c;border-radius: 18px;" class="nav-item"><a class="nav-link" href="'.base_url('index.php/gerentesView').'">SISTEMA DE GESTIÓN INTEGRAL</a></li>';
                        }
                        ?>   
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/noticiaseventos'); ?>">NOTICIAS Y EVENTOS</a></li>
                        <!--<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/instalaciones') ?>">INSTALACIONES</a></li>-->
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/contactenos') ?>">CONTÁCTENOS</a></li>
                        <?php if($this->session->userdata("logged") == 1){
                                echo '<li class="nav-item"><a class="nav-link" href="'.base_url('index.php/docGeneral').'">Vista General</a></li>'; 
                            }
                        ?>
                        <?php
                                                        
                            if($this->session->userdata("logged") == 1){
                                echo '<li class="nav-item">
                                    <a class="p-1 nav-link btn  btn-sm text-uppercase" href="'.base_url('index.php/salir').'"> Cerrar Sesión</a>
                                </li>';
                                echo '<li class="nav-item">
                                    <a class="p-1 nav-link btn btnAcceder btn-xl text-uppercase" href="#"> 
                                        <div class="glyph-icon simple-icon-user"></div> 
                                        Bienvenido:'.$this->session->userdata("User").'
                                    </a>
                                    </li>';                                
                            }else{
                                echo '<li class="nav-item "><a class="p-1 nav-link btn btnAcceder btn-danger btn-xl text-uppercase" href="'.base_url('index.php/login').'"> ACCEDER</a></li>';
                            }
                        ?>

                    </ul>
                </div>
            </div>
        </nav>
 
               <!-- Add this code within the "about" section -->
          <section class="page-section" id="about">
              <div class="container" style="max-width:80%;">                

                <div class="row mb-5">

                  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="<?php echo base_url('assets/portafolio/banner/') ?>banner1.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="<?php echo base_url('assets/portafolio/banner/') ?>banner2.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="<?php echo base_url('assets/portafolio/banner/') ?>banner3.jpg" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                  <?php /*foreach ($categorias as $value) {

                        echo '<div class="col-2 text-center">
                            <img width="150px" src="'.base_url('assets/portafolio/iconos/').$value["Imagen"].'" class="rounded-circle">
                            <p class="text-center text-categoria-img">'.$value["Descripcion"].'</p>
                        </div>';
                  }*/?>
                  

                </div>

               <!-- Sidebar Menu -->

               <div class="row">   

                  <div class="col-md-2">
                      <form id="categoryForm">
                          <div class="mb-3 text-center">
                              <h4 for="categoryCheckbox" class="form-label">Categorias</h4>
                              <div class="col-12 border" id="medalContainer"></div>
                              <button type="button" class="btn btn-secondary text-center" id="clearFilters">Limpiar</button>
                              <div class="col-12 border"></div>
                          </div>

                          <?php 
                            foreach ($categorias as $value) {
                                echo '<div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="'.$value["IdCategoria"].'" id="category'.$value["IdCategoria"].'" name="categories[]">
                                      <label class="form-check-label category_label" for="category'.$value["IdCategoria"].'"> '.$value["Descripcion"].' </label>
                                  </div>';
                            }
                          ?>                          

                      </form>
                  </div>

                  <div class="col-md-10">
                    <table class="w-100" id="catImagenes">
                                        
                    </table>
                  </div>

                </div>
                </div>
              </div>
          </section>

        
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; DELMOR S.A <?php echo date('Y'); ?></div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/delmornic/?hl=es-la" aria-label="Twitter"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/delmornic/" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/company/industrias-delmor-s-a/?originalSubdomain=ni" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        
                    </div>
                </div>
            </div>
        </footer>       
        <!-- Bootstrap core JS-->
        <script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url()?>assets/js/scriptslanding.js"></script>
        <!--<script src="<?php echo base_url()?>assets/js/sb-forms-latest.js"></script>-->
        <script src="<?php echo base_url()?>assets/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url()?>assets/js/datatables.js"></script>
        <script src="<?php echo base_url()?>assets/js/dataTables.fixedColumns.js"></script>
    </body>
</html>
