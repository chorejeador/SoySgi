<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>
	<title>Portal SGI</title><title>Portal SGI</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/favicon.ico"/>
	<!-- Font Awesome icons (free version)-->

	<!-- Google fonts-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

	<link href="<?php echo base_url() ?>assets/css/roboto.css" rel="stylesheet" type="text/css"/>
	<!-- Core theme CSS (includes Bootstrap)-->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/bootstrap.rtl.only.min.css">
	<link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet"/>
	<link href="<?php echo base_url() ?>assets/css/custom_landing.css" rel="stylesheet"/>
	<link href="<?php echo base_url() ?>assets/css/custom_timeline.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/iconsmind-s/css/iconsminds.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/simple-line-icons/css/simple-line-icons.css">
	<script src="<?php echo base_url() ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/venoBox/venobox.css">

	<!--<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
	<!--<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">-->-->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/documento_general/estilos.css">

	<style>
		.buscador-focus:focus {
			border-color: #007bff; /* Azul más estilizado */
			outline: none; /* Opcional: elimina el contorno predeterminado */
			box-shadow: 0 0 3px rgba(0, 123, 255, 0.4); /* Sombra más sutil */
		}

	</style>
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


<!-- Contact-->
<section class="page-section" id="contact">
	<div class="container">
	</div>
</section>

<!-- DOCUMENTS-->
<section class="page-section pt-15" id="documents">
	<div class="container">
		<div class="col-12">
			<div class="card mb-4">
				<div class="card-body">
					<h5 class="mb-4">CORPORATIVO</h5>

					<!-- Buscador -->
					<div class="mb-4">
						<input type="text" id="buscadorDocumentos" class="form-control buscador-focus "
							   placeholder="Buscar documentos...">
					</div>

					<!-- Listado de documentos -->
					<div id="accordion" class="row row-cols-1 row-cols-md-3 g-4">
						<?php foreach ($carpetas as $index => $value): ?>
							<?php $tieneDescripcion = !empty(trim($value["Descripcion"])); ?>
							<div class="col mb-4 documento"
								 data-nombre="<?php echo strtolower($value["Nombre"]); ?>"
								 data-descripcion="<?php echo strtolower($value["Descripcion"]); ?>">
								<div class="card h-100 shadow-sm text-center p-3">

									<!-- Imagen con redirección -->
									<div style="cursor: pointer;" class="card-click"
										 data-url="<?php echo base_url('index.php/verPdf/' . $value['id']); ?>">
										<img src="<?php echo base_url() ?>assets/img/documentos/open-folder.png"
											 style="width: 70px;" alt="Open Folder">
									</div>

									<!-- Nombre con o sin ícono -->
									<h6 class="text-uppercase small p-3 nombre-documento"
										<?php if ($tieneDescripcion): ?> style="cursor: pointer;" <?php endif; ?>>
										<strong>
											<?php echo $value["Nombre"]; ?>
											<?php if ($tieneDescripcion): ?>
												<i class="icon-dropdown fas fa-chevron-down ms-2"></i>
											<?php endif; ?>
										</strong>
									</h6>

									<!-- Descripción, inicialmente oculta -->
									<p class="descripcion text-muted mt-2 small"><?php echo $tieneDescripcion ? $value["Descripcion"] : ''; ?></p>
								</div>
							</div>
						<?php endforeach; ?>

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
		</div>
	</div>
</footer>


<!-- Bootstrap core JS-->
<script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="<?php echo base_url() ?>assets/js/scriptslanding.js"></script>
<!--<script src="<?php echo base_url() ?>assets/js/sb-forms-latest.js"></script>-->
<script>
	function show(div) {
		$("#collapse" + div).toggleClass("show");
	}
</script>
<script src="<?php echo base_url() ?>assets/js/vendor/venoBox/venobox.min.js"></script>

<!-- Script de búsqueda -->
<script>
	document.querySelectorAll('.documento').forEach(doc => {
		const url = doc.querySelector('.card-click')?.getAttribute('data-url');
		const h6 = doc.querySelector('.nombre-documento');
		if (url && h6) {
			h6.style.cursor = 'pointer';
			h6.addEventListener('click', () => {
				window.location.href = url;
			});
		}
	});

	document.getElementById('buscadorDocumentos').addEventListener('input', function () {
		const search = this.value.toLowerCase();
		const documentos = document.querySelectorAll('.documento');

		documentos.forEach(doc => {
			const nombre = doc.getAttribute('data-nombre');
			const descripcion = doc.getAttribute('data-descripcion');

			if (nombre.includes(search) || descripcion.includes(search)) {
				doc.style.display = 'block';
			} else {
				doc.style.display = 'none';
			}
		});
	});
</script>
</body>
</html>
