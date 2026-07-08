<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Portal SGI</title>
	<link rel="stylesheet" href="<?php echo base_url('css/vernoticia.css'); ?>?v=4">

	<link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/favicon.ico" />

	<link href="<?php echo base_url() ?>assets/css/roboto.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/css/custom_landing.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/css/custom_carousel.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/iconsmind-s/css/iconsminds.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome/all.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/venoBox/venobox.css">
	
</head>

<body id="page-top">
	<div class="card setting-toggle">
		<div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
			<a href="https://www.facebook.com/delmornic/" target="_blank" rel="noopener noreferrer">
				<img src="<?php echo base_url() ?>assets/img/facebook.png" width="26" alt="Facebook">
			</a>
			<a href="https://www.instagram.com/delmornic/?hl=es-la" target="_blank" rel="noopener noreferrer">
				<img src="<?php echo base_url() ?>assets/img/instagram.png" width="26" alt="Instagram">
			</a>
			<a href="https://www.youtube.com/@delmornicaragua932/featured" target="_blank" rel="noopener noreferrer">
				<img src="<?php echo base_url() ?>assets/img/youtube.png" width="26" alt="YouTube">
			</a>
		</div>
	</div>

	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
		<div class="container">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
				aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars ms-1"></i>
			</button>

			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url("index.php"); ?>">
							<img src="<?php echo base_url() ?>assets/img/logo.png" width="100" alt="Logo">
						</a>
					</li>

					<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php'); ?>">INICIO</a></li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
							CORPORACIÓN DELMOR
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="<?php echo base_url('index.php/misionPolitica') ?>">Misión y política</a></li>
							<li><a class="dropdown-item" href="<?php echo base_url('index.php/vision') ?>">Visión</a></li>
							<li><a class="dropdown-item" href="<?php echo base_url('index.php/principiosValores') ?>">Principios y valores</a></li>
						</ul>
					</li>

					<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/quienessomos'); ?>">¿QUIÉNES SOMOS?</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/portafolio'); ?>">PORTAFOLIO</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/trayectoria'); ?>">TRAYECTORIA</a></li>

					<?php
					if ($this->session->userdata("logged") == 1) {
						echo '<li style="background-color: #ffffff5c;border-radius: 18px;" class="nav-item"><a class="nav-link" href="' . base_url('index.php/gerentesView') . '">SISTEMA DE GESTIÓN INTEGRAL</a></li>';
					}
					?>

					<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/noticiaseventos'); ?>">NOTICIAS Y EVENTOS</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/contactenos') ?>">CONTÁCTENOS</a></li>

					<?php if ($this->session->userdata("logged") == 1) {
						echo '<li class="nav-item"><a class="nav-link" href="' . base_url('index.php/docGeneral') . '">Vista General</a></li>';
					} ?>

					<?php
					if ($this->session->userdata("logged") == 1) {
						echo '<li class="nav-item">
								<a class="p-1 nav-link btn btn-sm text-uppercase" href="' . base_url('index.php/salir') . '">Cerrar Sesión</a>
							</li>';

						echo '<li class="nav-item">
								<a class="p-1 nav-link btn btnAcceder btn-xl text-uppercase" href="#">
									<div class="glyph-icon simple-icon-user"></div>
									' . $this->session->userdata("User") . '
								</a>
							</li>';
					} else {
						echo '<li class="nav-item"><a class="p-1 nav-link btn btnAcceder btn-danger btn-xl text-uppercase" href="' . base_url('index.php/login') . '">ACCEDER</a></li>';
					}
					?>
				</ul>
			</div>
		</div>
	</nav>

	<section class="detalle-publicacion">
		<div class="container">
			<div class="detalle-card">
				<div class="detalle-head">
					<div class="detalle-badge">Noticia</div>
					<h1 class="detalle-titulo"><?= htmlspecialchars($publicacion->Titulo) ?></h1>
					<div class="detalle-subtitulo"><?= htmlspecialchars($publicacion->Subtitulo) ?></div>
					<div class="detalle-meta">
						<span><i class="fas fa-newspaper"></i> Publicación DELMOR</span>
						<?php if (!empty($publicacion->FechaCrea)): ?>
							<span><i class="fas fa-calendar-alt"></i> <?= date('d-m-Y', strtotime($publicacion->FechaCrea)) ?></span>
						<?php endif; ?>
					</div>
				</div>

				<div class="galeria-grid">
					<?php if (!empty($imagenes)): ?>
						<?php foreach ($imagenes as $imagen): ?>
							<?php $imgPath = base_url('uploads/Publicaciones/' . $imagen['Path']); ?>
							<a class="galeria-item venobox"
								data-gall="myGallery-<?= (int)$publicacion->Id ?>"
								href="<?= $imgPath ?>"
								title="<?= htmlspecialchars($publicacion->Titulo) ?>">
								<img src="<?= $imgPath ?>" alt="<?= htmlspecialchars($publicacion->Titulo) ?>">
								<div class="galeria-overlay"></div>
								<span class="galeria-zoom">
									<i class="fas fa-search-plus"></i>
								</span>
							</a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>

				<div class="detalle-body">
					<?= $publicacion->Descripcion ?>
				</div>

				<div class="detalle-frase">
					“SABOR, MUCHO SABOR CON DELMOR”.
				</div>

				<div class="detalle-footer">
					<div class="detalle-copy">
						Copyright &copy; DELMOR S.A <?= date('Y'); ?>
					</div>

					<div class="detalle-social">
						<a href="https://www.instagram.com/delmornic/?hl=es-la" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="white">
								<path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10zm-5 3.5A5.5 5.5 0 1 0 17.5 13 5.5 5.5 0 0 0 12 7.5zm0 2A3.5 3.5 0 1 1 8.5 13 3.5 3.5 0 0 1 12 9.5zm4.8-2.3a1.3 1.3 0 1 0 1.3 1.3 1.3 1.3 0 0 0-1.3-1.3z" />
							</svg>
						</a>
						<a href="https://www.facebook.com/delmornic/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="white">
								<path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.23.19 2.23.19v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.77l-.44 2.89h-2.33v6.99A10 10 0 0 0 22 12z" />
							</svg>
						</a>
						<a href="https://www.linkedin.com/company/industrias-delmor-s-a/?originalSubdomain=ni" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="white">
								<path d="M6.94 8.5a1.56 1.56 0 1 1 0-3.12 1.56 1.56 0 0 1 0 3.12zM5.5 9.75h2.88V18H5.5V9.75zm4.69 0h2.76v1.13h.04c.38-.73 1.33-1.5 2.74-1.5 2.93 0 3.47 1.93 3.47 4.43V18h-2.88v-3.73c0-.89-.02-2.03-1.24-2.03-1.24 0-1.43.97-1.43 1.97V18h-2.88V9.75z" />
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="<?php echo base_url() ?>assets/js/jquery-3.7.1.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/venobox.min.js"></script>

	<script>
		$(function() {
			if (typeof $.fn.venobox !== 'undefined' && $('.venobox').length) {
				$('.venobox').venobox({
					numeratio: true,
					infinigall: true,
					share: false,
					spinner: 'cube-grid'
				});
			}
		});
	</script>

</body>

</html>