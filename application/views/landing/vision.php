
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
        <!--<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">-->-->
        <link href="<?php echo base_url()?>assets/css/custom_carousel.css" rel="stylesheet" />
    </head>

    <body id="page-top">
        <!-- lateral menu-->
        <div class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
          <div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
            
            <a href="https://www.facebook.com/delmornic/"  target="_blank"><img src="<?php echo base_url() ?>assets/img/facebook.png" width="26" alt=""></a>
            <a href="https://www.instagram.com/delmornic/?hl=es-la" target="_blank"><img src="<?php echo base_url() ?>assets/img/instagram.png" width="26" alt=""></a>
            <a href="https://www.youtube.com/@delmornicaragua932/featured" target="_blank"><img src="<?php echo base_url() ?>assets/img/youtube.png" width="26" alt=""></a>
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
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">VISIÓN DEL SGI</h2>
                    <p class="color-red text-start mt-5">La construcción del futuro de DELMOR se fundamenta en cuatro ejes claves de acción:</p>

                    <P class="text-start">1. Mantener el liderazgo y la competitividad en el procesamiento y distribución de productos cárnicos integrando talento humano y tecnología de punta para lograr mayor productividad, eficiencia y rentabilidad empresarial.</P>
                    <P class="text-start">2. Fortalecer cadenas de abastecimiento y redes de alianzas estratégicas a mediano y largo plazo con clientes, proveedores y demás empresas e instituciones relacionadas con nuestra actividad.</P>
                    <P class="text-start">3. Incursionar en nuevos mercados de Centro América, el Caribe y USA, con el objetivo de aprovechar las oportunidades de tratados y acuerdos que Nicaragua suscriba con otros países y organismos internacionales.</P>
                    <P class="text-start">4. Consolidar Nuestra Cultura en Responsabilidad Social Empresarial, para contribuir en el desarrollo humano de nuestros colaboradores y en el progreso socioeconómico del país, a partir de la mejora continua de Industrias DELMOR, S.A.</P>
                </div>
                <div class="row text-center">
                    
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
    </body>
</html>
