<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <title>Dore jQuery</title>
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
</head>

<body class="background show-spinner no-footer">
	<div class="fixed-background"></div>
	<main>
		<div class="container">
			<div class="row h-100">
				<div class="col-12 col-md-10 mx-auto my-auto">
					<div class="card auth-card">
						<div class="position-relative image-side">
							<p class="text-white h2">SISTEMA DE GESTIÓN INTEGRAL</p>
							<p class="white mb-0">Por favor use sus credecianles para iniciar sesion.<br>
                            
						</div>
						<div class="form-side"><a href="Dashboard.Default.html"><span class="logo-single"></span></a>
							<h6 class="mb-4">Iniciar</h6>
							<form action="<?php echo base_url('index.php/Acreditar')?>" method="post">
								<label class="form-group has-float-label mb-4">
									<input type="text" name="username" class="form-control">
									<span>Usuario</span></label> 
									<label class="form-group has-float-label mb-4">
									<input class="form-control" name="pwd" type="password" placeholder="">
									<span>Contraseña</span>
								</label>
								<div class="d-flex justify-content-between align-items-center"><a href="#">Olvido su contraseña?</a> <button class="btn btn-primary btn-lg btn-shadow"
										type="submit">LOGIN</button></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script src="<?php echo base_url()?>assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/mousetrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/dore.script.js"></script>
    <script src="<?php echo base_url()?>assets/js/scripts.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</body>

</html>