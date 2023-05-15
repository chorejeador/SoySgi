<?PHP
header('Access-Control-Allow-Origin: *');
?>

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
						</div>
						<div class="form-side">
							<div class="text-center">
								<h6 class="mb-4">Ooops... parece que no tienes autorización!</h6>
								<p class="mb-0 text-muted text-small mb-0">Código error</p>
								<p class="display-1 font-weight-bold mb-5">403</p>
								<a href="javascript:history.back()" class="btn btn-primary btn-lg btn-shadow">REGRESAR</a>
							</div>
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