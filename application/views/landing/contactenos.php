
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url()?>assets/css/custom_landing.css" rel="stylesheet" />        
        <link rel="stylesheet" href="<?php echo base_url()?>assets/font/iconsmind-s/css/iconsminds.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/font/simple-line-icons/css/simple-line-icons.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/css/custom_carousel.css" rel="stylesheet" />
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
                            <a class="nav-link" href="#services">
                                <img src="<?php echo base_url() ?>assets/img/logo.png" width="100" alt="">
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#services">CORPORACION DELMOR</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="quienesSomosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">QUIENES SOMOS</a>
                            <ul class="dropdown-menu" aria-labelledby="quienesSomosDropdown">
                                <li><a class="dropdown-item" href="#">Esquema organizacional</a></li>
                                <li><a class="dropdown-item" href="#">Equipo de dirección</a></li>                            
                                <li><a class="dropdown-item" href="#">Nuestras instalaciónes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">PORTAFOLIO</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/trayectoria') ?>">TRAYECTORIA</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="sgiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">SISTEMA DE GESTIÓN INTEGRAL</a>
                            <ul class="dropdown-menu" aria-labelledby="sgiDropdown">
                                <li><a class="dropdown-item" href="#">Generalidades</a></li>
                                <li><a class="dropdown-item" href="#">Documento de presentación del SGI</a></li>                                
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/noticiasEventos') ?>">NOTICIAS Y EVENTOS</a></li>
                        <!--<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/instalaciones') ?>">INSTALACIONES</a></li>-->
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/contactenos') ?>">CONTÁCTENOS</a></li>                        
                        <?php
                            if($this->session->userdata("logged") == 1){
                                echo '<li class="nav-item"><a class="nav-link" href="'.base_url('index.php/gerentesView').'">SGC</a></li>';
                            }                            
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

        <!-- slider-->        
       <section class="page-section">            
            <div class="container" style="max-width: 95%;">
                <div class="row">
                    <div class="col-lg-9 col-sm-12">
                        <div style="overflow:hidden;margin: auto; margin-top: 20px; max-width:100%;width:90%;height:500px;text-align: center;"><div id="canvas-for-googlemap" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Industrias+Delmor+S.A,+Managua,+Nicaragua&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="code-for-google-map" rel="nofollow" href="https://www.bootstrapskins.com/themes" id="make-map-data">premium bootstrap themes</a><style>#canvas-for-googlemap img{max-width:none!important;background:none!important;font-size: inherit;font-weight:inherit;}</style></div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="phones">
                            <h3 class="mb-0" style="color:white;">(505) 2265-1637</h3>
                            <h3 class="mb-0" style="color:white;">(505) 2265-2219</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; DELMOR S.A 2022</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url()?>assets/js/scriptslanding.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
