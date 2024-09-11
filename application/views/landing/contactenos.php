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

	<!--<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">-->
	<link href="<?php echo base_url() ?>assets/css/custom_carousel.css" rel="stylesheet"/>
	<style>
		.container-fluid {
			position: relative;
		}

		.contenedor-contacto {
			position: absolute;
			width: 100%;
			top: 10px;
			left: 15px;
		}

		.img-back {
			width: 100%;
			height: auto;
			opacity: 0.3;
		}

		.card-contact {
			height: 300px;
			padding: 15px;
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
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="quienesSomosDropdown" role="button"
					   data-bs-toggle="dropdown" aria-expanded="false">¿QUIÉNES SOMOS?</a>
					<ul class="dropdown-menu" aria-labelledby="quienesSomosDropdown">
						<li><a class="dropdown-item" href="#">Esquema organizacional</a></li>
						<li><a class="dropdown-item" href="#">Equipo de dirección</a></li>
						<li><a class="dropdown-item" href="#">Nuestras instalaciónes</a></li>
					</ul>
				</li>
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/portafolio'); ?>">PORTAFOLIO</a>
				</li>
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/trayectoria') ?>">TRAYECTORIA</a>
				</li>
				<?php
				if ($this->session->userdata("logged") == 1) {
					echo '<li style="background-color: #ffffff5c;border-radius: 18px;" class="nav-item"><a class="nav-link" href="' . base_url('index.php/gerentesView') . '">SISTEMA DE GESTIÓN INTEGRAL</a></li>';
				}
				?>
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/noticiaseventos') ?>">NOTICIAS
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

<!-- slider-->
<section class="page-sectio m-0">
	<div class="container-fluid p-lg-0">
		<img src="<?= base_url('assets/img/DSC00071.jpg') ?>" class="img-back" alt="Imagen de trabajadores Delmor.">
		<div class="contenedor-contacto ">
			<div class="row mt-5 g-0 p-4 align-items-center">
				<div class="col-lg-6">
					<div class="col-lg-8 mx-auto">
						<div class="card card-contact shadow">
							<div class="card-body">
								<h2>Contáctenos</h2>
								<p><i class="fas fa-map-marker-alt"></i> <strong>Dirección:</strong> Industrias Delmor
									S,A,
									KM7
									Carretera Sur,
									Managua, Managua 2199</p>
								<p><i class="fas fa-phone"></i> <strong>Teléfonos:</strong> (+505) 2265-1637, (+505)
									2265-2219</p>
								<p><i class="fas fa-envelope"></i> <strong>Correo:</strong> ventas_id@delmor.com.ni</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="mt-5 mt-lg-0">
						<div id="canvas-for-googlemap" style="height:300px; width:100%;max-width:100%;">
							<iframe style="height:100%;width:100%;border:0;" frameborder="0"
									src="https://www.google.com/maps/embed/v1/place?q=Industrias+Delmor+S.A,+Managua,+Nicaragua&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
						</div>
					</div>
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
