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
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/iconsmind-s/css/iconsminds.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/simple-line-icons/css/simple-line-icons.css">
	<script src="<?php echo base_url()?>assets/js/vendor/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/js/vendor/venoBox/venobox.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/fot-awesome-all.min.css">

	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor/bootstrap.rtl.only.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor/perfect-scrollbar.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor/component-custom-switch.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/sweetalert2.css">
	<style>
		#sliderHome {
			position: relative;
			width: 100%;
			height: 500px;
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

		:root {
			font-size: 16px;
			--card-img-height: 200px;
		}

		.card-container {
			width: 100%;
			/*height: 100vh;*/
			display: flex;
			flex-flow: row wrap;
			justify-content: center;
			align-items: center;
			gap: 2rem;
			padding: 1rem;
			transition: all 200ms ease-in-out;
			background-color: #f4f5f7;
		}

		.card-especial {
			align-self: flex-start;
			position: relative;
			width: 325px;
			min-width: 275px;
			min-height: 400px;
			margin: 1.25rem 0.75rem;
			background: white;
			border-radius: 10px;
			overflow: hidden;
			box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
			transition: all 300ms ease-in-out;
		}

		.card-img {
			width: 100%;
			height: var(--card-img-height);
			background-repeat: no-repeat;
			background-position: center center;
			background-size: cover;
			visibility: visible;
		}

		.card-img-hovered {
			background-repeat: no-repeat;
			background-position: center center;
			background-size: cover;
			width: 100%;
			position: absolute;
			height: var(--card-img-height);
			top: 0;
			transition: all 350ms ease-in-out;
			background: rgba(0, 0, 0, 0.3);
		}

		.card-info {
			position: relative;
			padding: 1rem;
			transition: all 200ms ease-in-out;
			background-color: white;
			z-index: 1;
		}

		.card-about {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 0.5rem;
			transition: all 200ms ease-in-out;
		}

		.card-tag {
			padding: 0.2rem 0.5rem;
			font-size: 12px;
			text-align: center;
			text-transform: uppercase;
			letter-spacing: 1px;
			border-radius: 3px;
			background: #505f79;
			color: #fff;
		}

		.card-title {
			font-size: 1.5rem;
			color: #333;
			margin-bottom: 0.5rem;
			transition: all 350ms ease-in-out;
		}

		.card-creator {
			color: #777;
			font-size: 0.875rem;
			transition: all 250ms ease-in-out;
		}

		.card-especial:hover {
			cursor: pointer;
			box-shadow: 0px 15px 35px rgba(0, 0, 0, 0.15);
			transform: scale(1.025);

			.card-img-hovered {
				background: rgba(0, 0, 0, 0.5);
				height: 100%;
			}

			.card-info {
				background-color: transparent;
			}

			.card-title {
				color: #fff;
				transform: translate(0, 20px);
			}

			.card-about, .card-creator {
				opacity: 0;
			}
		}
	</style>

	<script>
		// document.addEventListener('DOMContentLoaded', function () {
		// 	// const slides = document.querySelectorAll('.slide');
		// 	const radios = document.querySelectorAll('input[name="animate"]');
		// 	let currentSlide = 0;
		// 	const totalSlides = slides.length;
		// 	const interval = 4000; // Cambia cada 3 segundos
		//
		// 	function showSlide(index) {
		// 		// todo: Comentado temporalmente
		// 		radios[index].checked = true;
		// 	}
		//
		// 	function nextSlide() {
		// 		currentSlide = (currentSlide + 1) % totalSlides;
		// 		// showSlide(currentSlide);
		// 	}
		//
		// 	setInterval(nextSlide, interval);
		// });

	</script>
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
<!--<header class="masthead">-->
<!--	<div class="box" id="sliderHome">-->
<!--		<input type="radio" name="animate" id="box1"/>-->
<!--		<label for="box1">-->
<!--			<img src="--><?php //echo base_url() ?><!--assets/img/banner1.jpg" width="80"/>-->
<!--		</label>-->
<!--		<img src="--><?php //echo base_url() ?><!--assets/img/banner1.jpg" class="slide"/>-->
<!---->
<!--		<input type="radio" name="animate" id="box2" checked="checked"/>-->
<!--		<label for="box2">-->
<!--			<img src="--><?php //echo base_url() ?><!--assets/img/banner2.jpg" width="80"/>-->
<!--		</label>-->
<!--		<img src="--><?php //echo base_url() ?><!--assets/img/banner2.jpg" class="slide"/>-->
<!---->
<!--		<input type="radio" name="animate" id="box3"/>-->
<!--		<label for="box3">-->
<!--			<img src="--><?php //echo base_url() ?><!--assets/img/banner3.jpg" width="80"/>-->
<!--		</label>-->
<!--		<img src="--><?php //echo base_url() ?><!--assets/img/banner3.jpg" class="slide"/>-->
<!---->
<!--		<input type="radio" name="animate" id="box4"/>-->
<!--		<label for="box4">-->
<!--			<img src="--><?php //echo base_url() ?><!--assets/img/banner4.jpg" width="80"/>-->
<!--		</label>-->
<!--		<img src="--><?php //echo base_url() ?><!--assets/img/banner4.jpg" class="slide"/>-->
<!--	</div>-->
<!--</header>-->
<section class="page-section bg-light pt-5" id="portfolio">

	<div class="text-center mt-5 pt-5">
		<h2 class="section-heading text-uppercase">Noticias y eventos</h2>
	</div>
	<?php
	function obtenerImagenPublicacion($idPublicacion, $imagenes)
	{
		$imgPath = array_filter($imagenes, function ($imagen) use ($idPublicacion) {
			return $imagen["IdPublicacion"] == $idPublicacion;
		});

		if (count($imgPath) > 0) {
			$randomImage = $imgPath[array_rand($imgPath)];
			return '../uploads/Publicaciones/' . $randomImage["Path"];
		}

		return base_url("assets/img/landing/6.jpg");
	}

	?>

	<div class="card-container">
		<?php if ($publicaciones): ?>
			<?php foreach ($publicaciones as $publicacion):
				$img = obtenerImagenPublicacion($publicacion["Id"], $imagenes);
				$fechaCrea = date_create($publicacion["FechaCrea"]);
				?>
				<div class="card-especial card-1" onclick="location.href= '<?= base_url("index.php/verNoticia/{$publicacion["Id"]}") ?>'">
					<div class="card-img" style='background-image:url("<?= $img ?>")'></div>
					<a href="<?= base_url("index.php/verNoticia/{$publicacion["Id"]}") ?>" class="card-link">
						<div class="card-img-hovered"></div>
					</a>
					<div class="card-info">
						<div class="card-about">
							<a class="card-tag tag-news">Noticia</a>
							<div class="card-time"><?= date_format($fechaCrea, "d-m-Y") ?></div>
						</div>
						<h1 class="card-title"><?= $publicacion["Titulo"] ?></h1>
						<div class="card-creator"><?= $publicacion["Subtitulo"] ?></div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>

<!-- Footer-->
<footer class="footer py-4">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4 text-lg-start">Copyright &copy; DELMOR S.A
<?php echo date('Y'); ?></div>
			<div class="col-lg-4 my-3 my-lg-0">
				<a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/delmornic/?hl=es-la"
				   aria-label="Twitter"><i class="fab fa-instagram"></i></a>
				<a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/delmornic/"
				   aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
				<a class="btn btn-dark btn-social mx-2"
				   href="https://www.linkedin.com/company/industrias-delmor-s-a/?originalSubdomain=ni"
				   aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
			</div>
		</div>
	</div>
</footer>
<script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/scriptslanding.js"></script>
<script src="<?php echo base_url() ?>assets/js/vendor/venoBox/venobox.min.js"></script>

</body>
</html>
