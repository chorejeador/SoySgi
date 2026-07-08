<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Portal SGI</title>

	<link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/favicon.ico" />

	<link href="<?php echo base_url() ?>assets/css/roboto.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/css/custom_landing.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/css/custom_timeline.css" rel="stylesheet" />

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/iconsmind-s/css/iconsminds.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome/font-awesome-all.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/bootstrap.rtl.only.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/perfect-scrollbar.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/component-custom-switch.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/sweetalert2.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/venoBox/venobox.css">

	<link rel="stylesheet" href="<?php echo base_url('css/noticiaseventos.css'); ?>?v=3">

	<script src="<?php echo base_url() ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
</head>

<body id="page-top">

	<!-- REDES SOCIALES -->
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
				<ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0 ">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php'); ?>">
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
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/trayectoria') ?>">TRAYECTORIA</a></li>

					<?php
					if ($this->session->userdata("logged") == 1) {
						echo '<li style="background-color: #ffffff5c; border-radius: 18px;" class="nav-item"><a class="nav-link" href="' . base_url('index.php/gerentesView') . '">SISTEMA DE GESTIÓN INTEGRAL</a></li>';
					}
					?>

					<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/noticiaseventos'); ?>">NOTICIAS Y EVENTOS</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/contactenos') ?>">CONTÁCTENOS</a></li>

					<?php
					if ($this->session->userdata("logged") == 1) {
						echo '<li class="nav-item"><a class="nav-link" href="' . base_url('index.php/docGeneral') . '">Vista General</a></li>';
					}
					?>

					<?php
					if ($this->session->userdata("logged") == 1) {
						echo '<li class="nav-item">
								<a class="p-1 nav-link btn btn-sm text-uppercase" href="' . base_url('index.php/salir') . '">Cerrar Sesión</a>
							</li>';

						echo '<li class="nav-item">
								<a class="p-1 nav-link btn btnAcceder btn-xl text-uppercase" href="#">
									<div class="glyph-icon simple-icon-user"></div>
									Bienvenido: ' . $this->session->userdata("User") . '
								</a>
							</li>';
					} else {
						echo '<li class="nav-item">
								<a class="p-1 nav-link btn btnAcceder btn-danger btn-xl text-uppercase" href="' . base_url('index.php/login') . '">ACCEDER</a>
							</li>';
					}
					?>
				</ul>
			</div>
		</div>
	</nav>

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
				$imgPath = array_values($imgPath);
				return base_url('uploads/Publicaciones/' . $imgPath[0]["Path"]);
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
					<article class="card-especial">
						<div class="card-media">
							<img src="<?= $img ?>" alt="<?= htmlspecialchars($publicacion["Titulo"]) ?>">

							<a
								class="card-zoom-btn venobox"
								data-gall="noticias"
								href="<?= $img ?>"
								title="<?= htmlspecialchars($publicacion["Titulo"]) ?>">
								<i class="fas fa-search-plus"></i>
							</a>

							<a
								href="<?= base_url("index.php/verNoticia/{$publicacion["Id"]}") ?>"
								class="card-link-full"
								aria-label="Ver noticia <?= htmlspecialchars($publicacion["Titulo"]) ?>"></a>

							<div class="card-overlay"></div>
						</div>

						<div class="card-info">
							<div class="card-about">
								<span class="card-tag">Noticia</span>
								<div class="card-time"><?= date_format($fechaCrea, "d-m-Y") ?></div>
							</div>

							<h3 class="card-title"><?= $publicacion["Titulo"] ?></h3>

							<div class="card-creator"><?= $publicacion["Subtitulo"] ?></div>

							<a href="<?= base_url("index.php/verNoticia/{$publicacion["Id"]}") ?>" class="card-footer-link">
								Ver detalle
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</article>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</section>

	<footer class="footer py-4">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-4 text-lg-start">
					Copyright &copy; DELMOR S.A <?php echo date('Y'); ?>
				</div>
			</div>
		</div>
	</footer>

	<script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/scriptslanding.js"></script>
	<script src="<?php echo base_url() ?>assets/js/venobox.min.js"></script>

	<script>
		$(document).ready(function() {
			if ($('.venobox').length) {
				$('.venobox').venobox({
					numeratio: true,
					infinigall: true,
					spinner: 'cube-grid'
				});
			}
		});
	</script>
</body>

</html>