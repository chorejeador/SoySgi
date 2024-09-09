<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>
	<title>Portal SGI</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/favicon.ico"/>
	<!-- Font Awesome icons (free version)-->
	<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
	<!-- Google fonts-->

	<link href="<?php echo base_url() ?>assets/css/roboto.css" rel="stylesheet" type="text/css"/>
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet"/>
	<link href="<?php echo base_url() ?>assets/css/custom_landing.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/iconsmind-s/css/iconsminds.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/simple-line-icons/css/simple-line-icons.css">
	<link href="<?php echo base_url() ?>assets/css/custom_timeline.css" rel="stylesheet"/>
	<!--<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">-->
	<link href="<?php echo base_url() ?>assets/css/custom_carousel.css" rel="stylesheet"/>
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

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
				aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
					<a class="nav-link dropdown-toggle" data-mdb-toggle="dropdown" href="#" id="navbarDropdown"
					   role="button" data-bs-toggle="dropdown" aria-expanded="false">
						CORPORACIÓN DELMOR
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="<?php echo base_url('index.php/misionPolitica') ?>">Misión y
								política</a></li>
						<li><a class="dropdown-item" href="<?php echo base_url('index.php/vision') ?>">Visión</a></li>
						<li><a class="dropdown-item" href="<?php echo base_url('index.php/principiosValores') ?>">Principios
								y valores</a></li>
					</ul>
				</li>
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/quienessomos'); ?>">¿QUIÉNES
						SOMOS?</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/portafolio'); ?>">PORTAFOLIO</a>
				</li>
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/trayectoria'); ?>">TRAYECTORIA</a>
				</li>
				<?php
				if ($this->session->userdata("logged") == 1) {
					echo '<li style="background-color: #ffffff5c;border-radius: 18px;" class="nav-item"><a class="nav-link" href="' . base_url('index.php/gerentesView') . '">SISTEMA DE GESTIÓN INTEGRAL</a></li>';
				}
				?>
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/noticiaseventos'); ?>">NOTICIAS
						Y EVENTOS</a></li>
				<!--<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/instalaciones') ?>">INSTALACIONES</a></li>-->
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/contactenos') ?>">CONTÁCTENOS</a>
				</li>
				<?php if ($this->session->userdata("logged") == 1) {
					echo '<li class="nav-item"><a class="nav-link" href="' . base_url('index.php/docGeneral') . '">Vista General</a></li>';
				}
				?>
				<?php

				if ($this->session->userdata("logged") == 1) {
					echo '<li class="nav-item">
                                    <a class="p-1 nav-link btn  btn-sm text-uppercase" href="' . base_url('index.php/salir') . '"> Cerrar Sesión</a>
                                </li>';
					echo '<li class="nav-item">
                                    <a class="p-1 nav-link btn btnAcceder btn-xl text-uppercase" href="#"> 
                                        <div class="glyph-icon simple-icon-user"></div> 
                                        Bienvenido:' . $this->session->userdata("User") . '
                                    </a>
                                    </li>';
				} else {
					echo '<li class="nav-item "><a class="p-1 nav-link btn btnAcceder btn-danger btn-xl text-uppercase" href="' . base_url('index.php/login') . '"> ACCEDER</a></li>';
				}
				?>

			</ul>
		</div>
	</div>
</nav>
<section class="page-section" id="about">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">CRONOLOGÍA</h2>
			<!--<h3 class="section-subheading text-muted">Nuestra historia.</h3>-->
		</div>
		<ul class="timeline">
			<li>
				<div class="timeline-image">
					<div class="anio"><h3>1962</h3></div>
				</div>
				<div class="timeline-panel">
					<div class="timeline-heading">
						<!--                                <h4>1962</h4>-->
						<h4 class="subheading">Nuestros comienzos</h4>
					</div>
					<div class="timeline-body">
						<p class="text-muted">Industrias DELMOR, fue constituida legalmente; siendo su principal
							actividad la producción de embutidos y enlatados.</p>
					</div>
				</div>
			</li>
			<li class="timeline-inverted">
				<div class="timeline-image">
					<div class="anio"><h3>1972</h3></div>
				</div>
				<div class="timeline-panel">
					<div class="timeline-heading">
						<!--						<h4>2022</h4>-->
						<h4 class="subheading">La evolución de Industrias DELMOR</h4>
					</div>
					<div class="timeline-body"><p class="text-muted">Industrias DELMOR, se caracterizó por ser una
							pequeña empresa de tipo familiar; posterior al terremoto de diciembre de ese mismo año,
							inicia un proceso de transformación tecnológica que la diferencia del resto de las empresas
							competidoras Nacionales y logra incursionar en los mercados Centroamericanos y del Caribe,
							con sus líneas de Salchichas de Viena Enlatadas.</p></div>
				</div>
			</li>
			<li>
				<div class="timeline-image">
					<div class="anio"><h3>1988</h3></div>
				</div>
				<div class="timeline-panel">
					<div class="timeline-heading">
						<!--						<h4>December 2015</h4>-->
						<h4 class="subheading">DELMOR reinventa su planta industrial</h4>
					</div>
					<div class="timeline-body"><p class="text-muted">Industrias DELMOR, comienza a rehabilitar su parque
							industrial.</p></div>
				</div>
			</li>
			<li class="timeline-inverted">
				<div class="timeline-image">
					<div class="anio"><h3>2023</h3></div>
				</div>
				<div class="timeline-panel">
					<div class="timeline-heading">
						<!--						<h4>July 2020</h4>-->
						<h4 class="subheading">DELMOR eleva los estándares de calidad.</h4>
					</div>
					<div class="timeline-body"><p class="text-muted">Industrias DELMOR, se ha dedicado al mejoramiento
							de la calidad de sus productos, construyendo una imagen imperdurable entre los consumidores
							nicaragüenses. Se adquirió tecnología moderna que le permitió rediseñar nuevos empaques y
							presentaciones de sus productos, así como también reformulaciones en todos los aspectos.</p>
					</div>
				</div>
			</li>
<!--			<li class="timeline-inverted">-->
<!--				<div class="timeline-image">-->
<!--					<h4>-->
<!--						Be Part-->
<!--						<br/>-->
<!--						Of Our-->
<!--						<br/>-->
<!--						Story!-->
<!--					</h4>-->
<!--				</div>-->
<!--			</li>-->
		</ul>
	</div>
</section>


<!-- Footer-->
<footer class="footer py-4">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4 text-lg-start">Copyright &copy; DELMOR S.A <?php echo date('Y'); ?></div>
			<div class="col-lg-4 my-3 my-lg-0">
				<a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/delmornic/?hl=es-la"
				   aria-label="Twitter"><i class="fab fa-instagram"></i></a>
				<a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/delmornic/"
				   aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
				<a class="btn btn-dark btn-social mx-2"
				   href="https://www.linkedin.com/company/industrias-delmor-s-a/?originalSubdomain=ni"
				   aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<div class="col-lg-4 text-lg-end">

			</div>
		</div>
	</div>
</footer>
<!-- Bootstrap core JS-->
<script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="<?php echo base_url() ?>assets/js/scriptslanding.js"></script>
<!--<script src="<?php echo base_url() ?>assets/js/sb-forms-latest.js"></script>-->
</body>
</html>
