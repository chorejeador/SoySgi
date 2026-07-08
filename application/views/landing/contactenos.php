<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Portal SGI</title>

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/favicon.ico" />
	<link rel="stylesheet" href="<?php echo base_url('css/contactenos.css'); ?>?v=2">
	<!-- Iconos / Librerías externas -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/iconsmind-s/css/iconsminds.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/simple-line-icons/css/simple-line-icons.css">

	<!-- Fuentes -->
	<link href="<?php echo base_url() ?>assets/css/roboto.css" rel="stylesheet" type="text/css" />

	<!-- CSS Base -->
	<link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet" />

	<!-- CSS Personalizados -->
	<link href="<?php echo base_url() ?>assets/css/custom_landing.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/css/custom_carousel.css" rel="stylesheet" />

	<!-- Scripts (idealmente mover al final del body) -->
	<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>


</head>

<body id="page-top">
	<!-- lateral menu-->
	<div class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
		<div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
			<a href="https://www.facebook.com/delmornic/" target="_blank"><img src="<?php echo base_url() ?>assets/img/facebook.png" width="26" alt=""></a>
			<a href="https://www.instagram.com/delmornic/?hl=es-la" target="_blank"><img src="<?php echo base_url() ?>assets/img/instagram.png" width="26" alt=""></a>
			<a href="https://www.youtube.com/@delmornicaragua932/featured" target="_blank"><img src="<?php echo base_url() ?>assets/img/youtube.png" width="26" alt=""></a>
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
                                        ' . $this->session->userdata("User") . '
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

			<div class="contenedor-contacto">
				<div class="row g-4 align-items-center justify-content-center">
					<div class="col-lg-6">
						<div class="card card-contact shadow">
							<div class="card-body">
								<h2>Contáctenos</h2>

								<div class="contact-item">
									<div class="contact-icon">
										<svg viewBox="0 0 24 24">
											<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z" />
										</svg>
									</div>
									<div class="contact-text">
										<strong>Dirección</strong>
										Industrias Delmor S.A., KM 7 Carretera Sur, Managua, Managua 2199
									</div>
								</div>

								<div class="contact-item">
									<div class="contact-icon">
										<svg viewBox="0 0 24 24">
											<path d="M6.62 10.79a15.46 15.46 0 0 0 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1C10.07 21 3 13.93 3 5c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.24.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
										</svg>
									</div>
									<div class="contact-text">
										<strong>Teléfonos</strong>
										(+505) 2265-1637, (+505) 2265-2219
									</div>
								</div>

								<div class="contact-item">
									<div class="contact-icon">
										<svg viewBox="0 0 24 24">
											<path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 4-8 5L4 8V6l8 5 8-5v2z" />
										</svg>
									</div>
									<div class="contact-text">
										<strong>Correo</strong>
										<a href="mailto:ventas_id@delmor.com.ni">ventas_id@delmor.com.ni</a>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="mt-5 mt-lg-0">
							<div class="map-wrapper">
								<div id="canvas-for-googlemap">
									<iframe frameborder="0"
										src="https://www.google.com/maps/embed/v1/place?q=Industrias+Delmor+S.A,+Managua,+Nicaragua&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
								</div>
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
						aria-label="Instagram">
						<svg viewBox="0 0 24 24">
							<path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10zm-5 3.5A5.5 5.5 0 1 0 17.5 13 5.5 5.5 0 0 0 12 7.5zm0 2A3.5 3.5 0 1 1 8.5 13 3.5 3.5 0 0 1 12 9.5zm4.8-2.3a1.3 1.3 0 1 0 1.3 1.3 1.3 1.3 0 0 0-1.3-1.3z" />
						</svg>
					</a>
					<a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/delmornic/"
						aria-label="Facebook">
						<svg viewBox="0 0 24 24">
							<path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.23.19 2.23.19v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.77l-.44 2.89h-2.33v6.99A10 10 0 0 0 22 12z" />
						</svg>
					</a>
					<a class="btn btn-dark btn-social mx-2"
						href="https://www.linkedin.com/company/industrias-delmor-s-a/?originalSubdomain=ni"
						aria-label="LinkedIn">
						<svg viewBox="0 0 24 24">
							<path d="M6.94 8.5a1.56 1.56 0 1 1 0-3.12 1.56 1.56 0 0 1 0 3.12zM5.5 9.75h2.88V18H5.5V9.75zm4.69 0h2.76v1.13h.04c.38-.73 1.33-1.5 2.74-1.5 2.93 0 3.47 1.93 3.47 4.43V18h-2.88v-3.73c0-.89-.02-2.03-1.24-2.03-1.24 0-1.43.97-1.43 1.97V18h-2.88V9.75z" />
						</svg>
					</a>
				</div>
				<div class="col-lg-4 text-lg-end"></div>
			</div>
		</div>
	</footer>

	<script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

</body>

<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</html>