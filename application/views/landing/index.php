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

	<!-- Google fonts-->

	<link href="<?php echo base_url() ?>assets/css/roboto.css" rel="stylesheet" type="text/css"/>
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet"/>
	<link href="<?php echo base_url() ?>assets/css/custom_landing.css" rel="stylesheet"/>
	<link href="<?php echo base_url() ?>assets/css/custom_timeline.css" rel="stylesheet"/>
	<link href="<?= base_url('assets/js/vendor/venoBox/venobox.css') ?>" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/iconsmind-s/css/iconsminds.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/simple-line-icons/css/simple-line-icons.css">
	<!--<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
	<!--<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">-->

	<style>
		#sliderHome {
			position: relative;
			width: 100%;
			height: 500px; /* Ajusta la altura según tus necesidades */
			overflow: hidden;
		}

		.slide {
			display: none;
			width: 100%;
			height: 100%;
			object-fit: cover; /* Esto asegura que las imágenes se adapten al contenedor manteniendo sus proporciones */
			object-position: center; /* Centra la imagen en el contenedor */
		}

		input[type="radio"]:nth-of-type(1):checked ~ .slide:nth-of-type(1),
		input[type="radio"]:nth-of-type(2):checked ~ .slide:nth-of-type(2),
		input[type="radio"]:nth-of-type(3):checked ~ .slide:nth-of-type(3),
		input[type="radio"]:nth-of-type(4):checked ~ .slide:nth-of-type(4) {
			display: block;
			animation: fade 1s ease-in-out;
		}

		@keyframes fade {
			from {
				opacity: 0;
			}
			to {
				opacity: 1;
			}
		}

		label {
			display: inline-block;
			cursor: pointer;
			margin: 0 5px;
		}

		label img {
			max-width: 100px;
			height: auto;
		}

	</style>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const slides = document.querySelectorAll('.slide');
			const radios = document.querySelectorAll('input[name="animate"]');
			let currentSlide = 0;
			const totalSlides = slides.length;
			const interval = 4000; // Cambia cada 3 segundos

			function showSlide(index) {
				radios[index].checked = true;
			}

			function nextSlide() {
				currentSlide = (currentSlide + 1) % totalSlides;
				showSlide(currentSlide);
			}

			setInterval(nextSlide, interval);
		});

	</script>
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
					<a class="nav-link" href="<?php echo base_url('index.php'); ?>">
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
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/trayectoria') ?>">TRAYECTORIA</a>
				</li>
				<?php
				if ($this->session->userdata("logged") == 1) {
					echo '<li style="background-color: #ffffff5c;border-radius: 18px;" class="nav-item"><a class="nav-link" href="' . base_url('index.php/gerentesView') . '">SISTEMA DE GESTIÓN INTEGRAL</a></li>';
				}
				?>
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/noticiaseventos'); ?>">NOTICIAS
						Y EVENTOS</a></li>
				<!--<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/instalaciones'); ?>">INSTALACIONES</a></li>-->
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
<!-- Masthead-->
<header class="masthead">
	<div class="box" id="sliderHome">
		<input type="radio" name="animate" id="box1"/>
		<label for="box1">
			<img src="<?php echo base_url() ?>assets/img/banner1.jpg" width="80"/>
		</label>
		<img src="<?php echo base_url() ?>assets/img/banner1.jpg" class="slide"/>

		<input type="radio" name="animate" id="box2" checked="checked"/>
		<label for="box2">
			<img src="<?php echo base_url() ?>assets/img/LQF-144.jpg" width="80"/>
		</label>
		<img src="<?php echo base_url() ?>assets/img/LQF-144.jpg" class="slide"/>

		<input type="radio" name="animate" id="box3"/>
		<label for="box3">
			<img src="<?php echo base_url() ?>assets/img/banner3.jpg" width="80"/>
		</label>
		<img src="<?php echo base_url() ?>assets/img/banner3.jpg" class="slide"/>

		<input type="radio" name="animate" id="box4"/>
		<label for="box4">
			<img src="<?php echo base_url() ?>assets/img/banner4.jpg" width="80"/>
		</label>
		<img src="<?php echo base_url() ?>assets/img/banner4.jpg" class="slide"/>
	</div>


	<div class="container">
		<div class="masthead-subheading">Sistema Integrado de Gestión</div>
		<div class="masthead-heading text-uppercase">Bienvenido!</div>
		<?php
		if ($this->session->userdata("logged") == 1) {
			echo '<a style="background-color:#023E71" class="btn btn-primary btn-xl text-uppercase" href="' . base_url('index.php/gerentesView') . '">Acceder a plataforma</a>';
		}
		?>
	</div>
</header>

<!-- Services-->
<section class="page-section p-0" id="services">
	<div class="container">
		<div class="text-left">
			<h2 class="section-heading text-uppercase text-center">Generalidades</h2>
			<h3 class="section-subheading mb-4 text-muted">
				En Nicaragua existen cerca de noventa (90) organizaciones certificadas en los diferentes Sistemas de
				Gestión. Comparando esta cantidad con el total de organizaciones activas en el país, y la cantidad de
				organizaciones Certificadas en Centro América podemos afirmar que en términos porcentuales no es
				significativo. Cabe destacar que ninguna de esta cuenta con un Sistema Integrado de Gestión con las
				normas de Calidad, Inocuidad, Seguridad y Ambiente.
			</h3>
			<h3 class="section-subheading mb-4 text-muted">
				En las investigaciones realizadas por las firmas internacionales se determinó que la principal razón del
				por qué las organizaciones no logran certificarse, es la ausencia de personas competentes que puedan
				implementar, mantener y mejorar dichos sistemas de gestión. Esto priva a las organizaciones
				nicaragüenses de obtener los beneficios que estos sistemas de gestión proponen y así mejorar su
				competitividad y la del país.
			</h3>
			<h3 class="section-subheading mb-4 text-muted">
				Siendo su base “La Calidad”, se han desarrollado diversos estudios sobre el retorno de inversión de los
				mismos. A continuación, compartimos uno de los más recientes:
			</h3>
			<h3 class="section-subheading mb-4 text-muted">
				Siendo su base “La Calidad”, se han desarrollado diversos estudios sobre el retorno de inversión de los
				mismos. A continuación, compartimos uno de los más recientes:
			</h3>
			<b>Beneficios del Sistema de Gestión Integrado (QHSE FS+ 90k)</b>
			<h3 class="section-subheading mb-4 text-muted">
				La integración de sistemas de gestión es la acción y efecto de aunar, dos o más políticas, conceptos,
				corrientes divergentes entre sí, fusionándolos en una sola que sintetice. Su principal objetivo es
				aportar valor a la organización tomando las prácticas internacionales en cuatro principales temas:
			</h3>
			<h3 class="section-subheading mb-4 text-muted">
				Gestión de la Inocuidad de los Alimentos (FSSC 22000 V5.1):
			</h3>
			<h3 class="section-subheading mb-4 text-muted">
				Asegurar la producción de alimentos inocuos que garanticen una elección segura al momento de compra.
				Gestión de la Calidad (ISO 9001:2015):<br>
				Proporcionar regularmente productos y servicios que satisfagan los requisitos del cliente y los legales
				y reglamentarios aplicables y aspirar a aumentar la satisfacción del cliente.
			</h3>
			<h3 class="section-subheading mb-4 text-muted">
				Gestión de la Seguridad y Salud en el Trabajo (ISO 45001:2018):
			</h3>
			<h3 class="section-subheading mb-4 text-muted">
				La adopción de este sistema de gestión, permite a la organización mejorar su desempeño relacionado a la
				salud y seguridad de los trabajadores y gestionar los riesgos de forma adecuada.
			</h3>
			<h3 class="section-subheading mb-4 text-muted">
				Gestión Ambiental (ISO 14001:2015):
			</h3>
			<h3 class="section-subheading mb-4 text-muted">
				Mejorar el desempeño ambiental, cumplimiento de requisitos legales u otros requisitos y lograr los
				objetivos ambientales.
				El Sistema de Gestión Integrado implementado, permite a la organización obtener:
			</h3>

			<ul style="list-style-type: disc;padding-left: 20px;" class="section-subheading mb-4 text-muted">
				<li style=" margin-bottom: 5px;">Una sola política</li>
				<li style=" margin-bottom: 5px;">Una sola documentación</li>
				<li style=" margin-bottom: 5px;">Un solo tablero de indicadores</li>
				<li style=" margin-bottom: 5px;">Un solo equipo de coordinación</li>
				<li style=" margin-bottom: 5px;">Una sola revisión por la dirección</li>
				<li style=" margin-bottom: 5px;">Una sola red de procesos</li>
			</ul>
			<h3 class="section-subheading mb-4 text-muted">
				El presente portal resume los avances alcanzados durante el proceso de implementación, mantenimiento y
				mejora del Sistema de Gestión Integrado QHSE FS+ 90k.
			</h3>
		</div>
	</div>
</section>
<!-- Portfolio Grid-->
<section class="page-section bg-light pt-5" id="portfolio">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">CERTIFICACIÓN</h2>
			<h3 class="section-subheading text-muted">Galeria certificación.</h3>
		</div>
		<div class="row">
			<div class="col-lg-4 col-sm-6 mb-4">
				<!-- Portfolio item 1-->
				<div class="portfolio-item modal-variedad" data-type="variedad">
					<a class="portfolio-link " href="#portfolioModal1">
						<div class="portfolio-hover">
							<div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
						</div>
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/landing/1.jpg" alt="..."/>
					</a>
					<div class="portfolio-caption">
						<div class="portfolio-caption-heading">Variedad</div>
						<div class="portfolio-caption-subheading text-muted">Calidad artesanal</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 mb-4">
				<!-- Portfolio item 2-->
				<div class="portfolio-item modal-variedad" data-type="equipo-delmor">
					<a class="portfolio-link" href="#portfolioModal2">
						<div class="portfolio-hover">
							<div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
						</div>
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/landing/2.jpg" alt="..."/>
					</a>
					<div class="portfolio-caption">
						<div class="portfolio-caption-heading">Equipo Delmor</div>
						<div class="portfolio-caption-subheading text-muted">Compromiso con la Calidad</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 mb-4">
				<!-- Portfolio item 3-->
				<div class="portfolio-item modal-variedad" data-type="sabor-delmor">
					<a class="portfolio-link" href="#portfolioModal3">
						<div class="portfolio-hover">
							<div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
						</div>
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/landing/3.jpg" alt="..."/>
					</a>
					<div class="portfolio-caption">
						<div class="portfolio-caption-heading">Sabor Delmor</div>
						<div class="portfolio-caption-subheading text-muted">Tradición y Frescura</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
				<!-- Portfolio item 4-->
				<div class="portfolio-item modal-variedad" data-type="creatividad-gastronomica">
					<a class="portfolio-link" href="#portfolioModal4">
						<div class="portfolio-hover">
							<div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
						</div>
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/landing/4.jpg" alt="..."/>
					</a>
					<div class="portfolio-caption">
						<div class="portfolio-caption-heading">Creatividad Gastronómica</div>
						<div class="portfolio-caption-subheading text-muted">Para Niños y Adultos</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
				<!-- Portfolio item 5-->
				<div class="portfolio-item modal-variedad" data-type="tradicion-nicaraguense">
					<a class="portfolio-link" href="#portfolioModal5">
						<div class="portfolio-hover">
							<div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
						</div>
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/landing/5.jpg" alt="..."/>
					</a>
					<div class="portfolio-caption">
						<div class="portfolio-caption-heading">Tradición Nicaragüense</div>
						<div class="portfolio-caption-subheading text-muted">Sabores Auténticos</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<!-- Portfolio item 6-->
				<div class="portfolio-item modal-variedad" data-type="ambiente-familiar">
					<a class="portfolio-link" href="#portfolioModal6">
						<div class="portfolio-hover">
							<div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
						</div>
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/landing/6.jpg" alt="..."/>
					</a>
					<div class="portfolio-caption">
						<div class="portfolio-caption-heading">Ambiente Familiar</div>
						<div class="portfolio-caption-subheading text-muted">Calidad y Confort</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Team-->
<!--<section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Nuestro equipo</h2>
                    <h3 class="section-subheading text-muted">“SABOR, MUCHO SABOR CON DELMOR”..</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="<?php echo base_url(); ?>assets/img/landing/zacarias.jpg" alt="..." />
                            <h4>Gerente</h4>
                            <p class="text-muted">Zacarias Mondragon</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="<?php echo base_url(); ?>assets/img/landing/yahoska.jpg" alt="..." />
                            <h4>Yahoska</h4>
                            <p class="text-muted">RRHH</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="<?php echo base_url(); ?>assets/img/landing/old.jpg" alt="..." />
                            <h4>Adminsitración</h4>
                            <p class="text-muted">...</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>               
            </div>
        </section>-->

<!-- Contact-->
<section class="page-section" id="contact">
	<div class="container">

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
<!-- Portfolio Modals-->
<!-- Portfolio item 1 modal popup-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-6">
						<a class="my-image-links" data-gall="gallery01"
						   href="<?= base_url('assets/img/img-certificacion/ambiente-familiar/1.jpg') ?>">
							<img class="img-fluid"
								 src="<?= base_url('assets/img/img-certificacion/ambiente-familiar/1.jpg') ?>">
						</a>
					</div>
					<div class="col-6">
						<a class="my-image-links" data-gall="gallery01"
						   href="<?= base_url('assets/img/img-certificacion/ambiente-familiar/2.jpg') ?>">
							<img class="img-fluid"
								 src="<?= base_url('assets/img/img-certificacion/ambiente-familiar/2.jpg') ?>">
						</a>
					</div>
					<div class="col-6">
						<a class="my-image-links" data-gall="gallery01"
						   href="<?= base_url('assets/img/img-certificacion/ambiente-familiar/3.jpg') ?>">
							<img class="img-fluid"
								 src="<?= base_url('assets/img/img-certificacion/ambiente-familiar/3.jpg') ?>">
						</a>
					</div>
					<div class="col-6">
						<a class="my-image-links" data-gall="gallery01"
						   href="<?= base_url('assets/img/img-certificacion/ambiente-familiar/4.jpg') ?>">
							<img class="img-fluid"
								 src="<?= base_url('assets/img/img-certificacion/ambiente-familiar/4.jpg') ?>">
						</a>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal"/>
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="modal-body">
							<!-- Project details-->
							<h2 class="text-uppercase">Todo título</h2>
							<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
							<img class="img-fluid d-block mx-auto"
								 src="<?php echo base_url(); ?>assets/img/landing/tia.jpg" alt="..."/>
							<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
								adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
								repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
								nostrum, reiciendis facere nemo!</p>
							<ul class="list-inline">
								<li>
									<strong>Client:</strong>
									Threads
								</li>
								<li>
									<strong>Category:</strong>
									Illustration
								</li>
							</ul>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Portfolio item 2 modal popup-->
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal"/>
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="modal-body">
							<!-- Project details-->
							<h2 class="text-uppercase">Name</h2>
							<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
							<img class="img-fluid d-block mx-auto"
								 src="<?php echo base_url(); ?>assets/img/landing/all.jpg" alt="..."/>
							<p>Use this area to describe your Lorem ipsum dolor sit amet, consectetur adipisicing elit.
								Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi
								sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere
								nemo!</p>
							<ul class="list-inline">
								<li>
									<strong>Client:</strong>
									Explore
								</li>
								<li>
									<strong>Category:</strong>
									Graphic Design
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Portfolio item 3 modal popup-->
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal"/>
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="modal-body">
							<!-- Project details-->
							<h2 class="text-uppercase">Todo título</h2>
							<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
							<img class="img-fluid d-block mx-auto"
								 src="<?php echo base_url(); ?>assets/img/landing/winnie-pooh.jpg" alt="..."/>
							<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
								adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
								repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
								nostrum, reiciendis facere nemo!</p>
							<ul class="list-inline">
								<li>
									<strong>Client:</strong>
									Finish
								</li>
								<li>
									<strong>Category:</strong>
									Identity
								</li>
							</ul>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Portfolio item 4 modal popup-->
<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal"/>
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="modal-body">
							<!-- Project details-->
							<h2 class="text-uppercase">Todo título</h2>
							<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
							<img class="img-fluid d-block mx-auto"
								 src="<?php echo base_url(); ?>assets/img/landing/planta1.jpg" alt="..."/>
							<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
								adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
								repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
								nostrum, reiciendis facere nemo!</p>
							<ul class="list-inline">
								<li>
									<strong>Client:</strong>
									Lines
								</li>
								<li>
									<strong>Category:</strong>
									Branding
								</li>
							</ul>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Portfolio item 5 modal popup-->
<div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal"/>
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="modal-body">
							<!-- Project details-->
							<h2 class="text-uppercase">Todo título</h2>
							<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
							<img class="img-fluid d-block mx-auto"
								 src="<?php echo base_url(); ?>assets/img/landing/planta2.jpg" alt="..."/>
							<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
								adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
								repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
								nostrum, reiciendis facere nemo!</p>
							<ul class="list-inline">
								<li>
									<strong>Client:</strong>
									Southwest
								</li>
								<li>
									<strong>Category:</strong>
									Website Design
								</li>
							</ul>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Portfolio item 6 modal popup-->
<div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal"/>
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="modal-body">
							<!-- Project details-->
							<h2 class="text-uppercase">Todo título</h2>
							<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
							<img class="img-fluid d-block mx-auto"
								 src="<?php echo base_url(); ?>assets/img/landing/planta3.jpg" alt="..."/>
							<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
								adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
								repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
								nostrum, reiciendis facere nemo!</p>
							<ul class="list-inline">
								<li>
									<strong>Client:</strong>
									Window
								</li>
								<li>
									<strong>Category:</strong>
									Photography
								</li>
							</ul>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Bootstrap core JS-->
<script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="<?= base_url('assets/js/jquery-3.7.0.min.js') ?>"></script>
<script src="<?= base_url('assets/js/vendor/venoBox/venobox.min.js') ?>"></script>
<script src="<?php echo base_url() ?>assets/js/scriptslanding.js"></script>
<!--<script src="<?php echo base_url() ?>assets/js/sb-forms-latest.js"></script>-->

</body>
</html>
