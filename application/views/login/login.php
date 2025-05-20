<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <title>Portal SGI</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/font/iconsmind-s/css/iconsminds.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/font/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor/bootstrap.rtl.only.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor/component-custom-switch.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/js/sweetalert2@11.js">
    
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

	<style>
		/* Ajustes mínimos para centrar el card */
		body.background {
			background-color: #f8f9fa;
		}
		main {
			min-height: 100vh;
			display: flex;
			align-items: center;
		}
		.auth-card {
			border: none;
			border-radius: 0.75rem;
			box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
		}
		.image-side {
			background: #4e73df;
			color: #fff;
			padding: 2rem;
		}
		.form-side {
			padding: 2rem;
		}
		.has-float-label {
			position: relative;
		}
		.has-float-label input {
			padding-top: 1.25rem;
			padding-bottom: .25rem;
		}
		.has-float-label span {
			pointer-events: none;
			position: absolute;
			top: 0.75rem;
			left: 1rem;
			transition: 0.2s;
			color: #6c757d;
		}
		.has-float-label input:focus + span,
		.has-float-label input:not(:placeholder-shown) + span {
			top: -0.3rem;
			font-size: 0.8rem;
			color: #4e73df;
			background: #fff;
			padding: 0 0.2rem;
		}
	</style>
</head>

<body class="background show-spinner no-footer">
<div class="fixed-background"></div>
<main>
	<div class="container">
		<div class="row h-100 align-items-center">
			<div class="col-12 col-md-8 col-lg-6 mx-auto">
				<div class="card auth-card">
					<div class="row no-gutters">
						<div class="col-md-5 image-side d-none d-md-flex flex-column justify-content-center">
							<p class="h4 font-weight-bold">SISTEMA DE GESTIÓN INTEGRAL</p>
							<p class="mb-0">Por favor usa tus credenciales para iniciar sesión.</p>
						</div>
						<div class="col-md-7 form-side">
							<h5 class="mb-4 text-primary">Iniciar Sesión</h5>
							<form action="<?php echo base_url('index.php/Acreditar')?>" method="post">
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
	<script src="<?php echo base_url()?>assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/mousetrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/dore.script.js"></script>
    <script src="<?php echo base_url()?>assets/js/scripts.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</body>

</html>
