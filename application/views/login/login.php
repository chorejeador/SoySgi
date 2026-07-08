<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Portal SGI</title>
	<link rel="stylesheet" href="<?php echo base_url('css/login.css'); ?>?v=2">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/iconsmind-s/css/iconsminds.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/perfect-scrollbar.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/component-custom-switch.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">


	<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />



</head>
<style>
	body.loading {
		visibility: hidden;
		opacity: 0;
	}

	body.ready {
		visibility: visible;
		opacity: 1;
		transition: opacity 0.3s ease;
	}
</style>

<body class="background no-footer loading">
	<div class="fixed-background"></div>
	<main>
		<div class="container">
			<div class="row h-100 align-items-center">
				<div class="col-12 col-md-8 col-lg-6 mx-auto">
					<div class="card auth-card">
						<div class="row no-gutters">
							<div class="col-md-5 image-side d-none d-md-flex flex-column justify-content-center">
								<p class="h4 font-weight-bold">SISTEMA DE GESTIÓN INTEGRAL</p>
								<p class="mb-1">Por favor usa tus credenciales para iniciar sesión.</p>
							</div>
							<div class="col-md-7 form-side">
								<h5 class="mb-4 text-primary">Iniciar Sesión</h5>
								<form action="<?php echo base_url('index.php/Acreditar') ?>" method="post">
									<div class="form-group has-float-label mb-4">
										<input type="text" name="username" class="form-control" placeholder=" " required>
										<span>Usuario</span>
									</div>
									<div class="form-group has-float-label mb-4">
										<input type="password" name="pwd" class="form-control" placeholder=" " required>
										<span>Contraseña</span>
									</div>
									<button class="btn btn-primary btn-block btn-lg" type="submit">
										<i class="simple-icon-login"></i> LOGIN
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script>
		const BASE_URL = "<?php echo base_url(); ?>";
	</script>
	<script src="<?php echo base_url() ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/vendor/perfect-scrollbar.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/vendor/mousetrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/dore.script.js"></script>
	<script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
	<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url() ?>assets/js/sweetalert2@11.js"></script>
	<script>
		window.addEventListener("load", function() {
			document.body.classList.remove("loading");
			document.body.classList.add("ready");
		});
	</script>
</body>

</html>