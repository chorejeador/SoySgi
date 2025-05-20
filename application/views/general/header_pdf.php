<?php
$CI = &get_instance();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Portal SGI</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<!--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />-->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/iconsmind-s/css/iconsminds.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/bootstrap.rtl.only.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/perfect-scrollbar.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/component-custom-switch.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/sweetalert2.css">
	<!--	<link rel="stylesheet" href="--><?php //echo base_url()?><!--assets/js/tree-view/main.css">-->
	<!--	<link rel="stylesheet" href="--><?php //echo base_url()?><!--assets/js/tree-view/tree_maker-min.css">-->
	<link rel="stylesheet"
		  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/venoBox/venobox.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
	<!--<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/sweetalert2@11.js">-->
	<!--<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/sweetalert2@11.js">-->

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/datatables.css">
	<script src="<?php echo base_url() ?>assets/js/vendor/jquery-3.3.1.min.js"></script>

	<!--<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />-->
	<?php if (isset($css) && is_array($css)): ?>
		<?php foreach ($css as $estilo): ?>
			<?= $estilo . "\n"; ?>
		<?php endforeach; ?>
	<?php endif; ?>

	<style>
		.navbar-logo .logo {
			background-image: url(<?= base_url()?>assets/img/logo.png);

			background-repeat: no-repeat !important;
			background-size: 80px 82px !important;
			padding-left: 70px !important;
			width: 80px;
			height: 82px;
		}

		.logo-mobile {
			width: 20px;
			height: 35px;
			background: url(<?= base_url()?>assets/img/logo.png) no-repeat !important;
			background-position: center center;
		}

		.btn-outline-theme-3 {
			background: unset;
			color: #184f90eb !important;
			border-color: #184f90eb !important;
		}

		.btn-outline-theme-3:hover {
			background-color: #184f90eb;
			border-color: #184f90eb;
			color: #fff !important;
		}

		.card.question {
			font-weight: bolder;
		}

		.select2-container {
			width: 100% !important;
		}

		.

		<?php
			$CI = &get_instance(); // Obtenemos la instancia de CodeIgniter
		?>
		<
		!
		DOCTYPE html >

		<
		html lang

		=
		"en"
		>

		<
		head >

		<
		meta charset

		=
		"UTF-8"
		>

		<
		title > Portal SGI

		<
		/
		title >

		<
		meta name

		=
		"viewport"
		content

		=
		"width=device-width,initial-scale=1,maximum-scale=1"
		>

		<!--
		<
		link href

		=
		"https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
		rel

		=
		"stylesheet"
		/
		>

		-->
		<
		link rel

		=
		"stylesheet"
		href

		=
		"
		<?php echo base_url()?>
		assets/font/iconsmind-s/css/iconsminds.css"
		>

		<
		link rel

		=
		"stylesheet"
		href

		=
		"
		<?php echo base_url()?>
		assets/font/simple-line-icons/css/simple-line-icons.css"
		>

		<
		link rel

		=
		"stylesheet"
		href

		=
		"
		<?php echo base_url()?>
		assets/css/vendor/bootstrap.min.css"
		>

		<
		link rel

		=
		"stylesheet"
		href

		=
		"
		<?php echo base_url()?>
		assets/css/vendor/bootstrap.rtl.only.min.css"
		>

		<
		link rel

		=
		"stylesheet"
		href

		=
		"
		<?php echo base_url()?>
		assets/css/vendor/perfect-scrollbar.css"
		>

		<
		link rel

		=
		"stylesheet"
		href

		=
		"
		<?php echo base_url()?>
		assets/css/vendor/component-custom-switch.min.css"
		>

		<
		link rel

		=
		"stylesheet"
		href

		=
		"
		<?php echo base_url()?>
		assets/css/main.css"
		>

		<
		link rel

		=
		"stylesheet"
		href

		=
		"
		<?php echo base_url()?>
		assets/css/sweetalert2.css"
		>

		<!--
		<
		link rel

		=
		"stylesheet"
		href

		=
		"-->
		<?php //echo base_url()?>
		<!--assets/js/tree-view/main.css"
		>

		-->
		<!--
		<
		link rel

		=
		"stylesheet"
		href

		=
		"-->
		<?php //echo base_url()?>
		<!--assets/js/tree-view/tree_maker-min.css"
		>

		-->
		<
		link rel

		=
		"stylesheet"
		href

		=
		"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css"
		>

		<
		link rel

		=
		"stylesheet"
		href

		=
		"
		<?php echo base_url()?>
		assets/js/vendor/venoBox/venobox.css"
		>

		<
		link rel

		=
		"stylesheet"
		href

		=
		"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
		>

		<!--
		<
		link rel

		=
		"stylesheet"
		href

		=
		"
		<?php echo base_url()?>
		assets/js/sweetalert2@11.js"
		>

		-->
		<!--
		<
		link rel

		=
		"stylesheet"
		href

		=
		"
		<?php echo base_url()?>
		assets/js/sweetalert2@11.js"
		>

		-->

		<
		link rel

		=
		"stylesheet"
		href

		=
		"
		<?php echo base_url()?>
		assets/css/datatables.css"
		>

		<
		script src

		=
		"
		<?php echo base_url()?>
		assets/js/vendor/jquery-3.3.1.min.js"
		>

		<
		/
		script >

		<!--
		<
		link rel

		=
		"stylesheet"
		href

		=
		"https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"
		type

		=
		"text/css"
		/
		>

		-->
		<?php if (isset($css) && is_array($css)): ?>
		<?php foreach ($css as $estilo): ?>
		<?= $estilo . "\n"; ?>
		<?php endforeach; ?>
		<?php endif; ?>


		<
		style >
		.navbar-logo .logo {
			background-image: url(<?= base_url()?>assets/img/logo.png);

			background-repeat: no-repeat !important;
			background-size: 80px 82px !important;
			padding-left: 70px !important;
			width: 80px;
			height: 82px;
		}

		.logo-mobile {
			width: 20px;
			height: 35px;
			background: url(<?= base_url()?>assets/img/logo.png) no-repeat !important;
			background-position: center center;
		}

		.btn-outline-theme-3 {
			background: unset;
			color: #184f90eb !important;
			border-color: #184f90eb !important;
		}

		.btn-outline-theme-3:hover {
			background-color: #184f90eb;
			border-color: #184f90eb;
			color: #fff !important;
		}

		.card.question {
			font-weight: bolder;
		}

		.select2-container {
			width: 100% !important;
		}
	</style>


</head>

<body id="app-container" class="menu-default show-spinner">
<nav class="navbar fixed-top" style="background-color:#C41818!important;">
	<div class="d-flex align-items-center navbar-left"><a href="#" class="menu-button d-none d-md-block">
			<!--<div class="search" data-search-path="Pages.Search03d2.html?q="><input placeholder="Search..."> <span
					class="search-icon"><i class="simple-icon-magnifier"></i></span></div><a
				class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block"
				href="https://1.envato.market/5kAb">&nbsp;BUY&nbsp;</a>-->
	</div>
	<a class="navbar-logo" href="<?php echo base_url('index.php') ?>"><span class="logo d-none d-xs-block"></span> <span
			class="logo-mobile d-block d-xs-none"></span></a>
	<div class="navbar-right">
		<div class="header-icons d-inline-block align-middle">
			<!--<div class="d-none d-md-inline-block align-text-bottom mr-3">
				<div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1"
					data-toggle="tooltip" data-placement="left" title="Dark Mode"><input class="custom-switch-input"
						id="switchDark" type="checkbox" checked="checked"> <label class="custom-switch-btn"
						for="switchDark"></label></div>
			</div>
			<div class="position-relative d-none d-sm-inline-block"><button class="header-icon btn btn-empty"
					type="button" id="iconMenuButton" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="false"><i class="simple-icon-grid"></i></button>
				<div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="iconMenuDropdown"><a
						href="#" class="icon-menu-item"><i class="iconsminds-equalizer d-block"></i>
						<span>Settings</span> </a><a href="#" class="icon-menu-item"><i
							class="iconsminds-male-female d-block"></i> <span>Users</span> </a><a href="#"
						class="icon-menu-item"><i class="iconsminds-puzzle d-block"></i> <span>Components</span>
					</a><a href="#" class="icon-menu-item"><i class="iconsminds-bar-chart-4 d-block"></i>
						<span>Profits</span> </a><a href="#" class="icon-menu-item"><i
							class="iconsminds-file d-block"></i> <span>Surveys</span> </a><a href="#"
						class="icon-menu-item"><i class="iconsminds-suitcase d-block"></i> <span>Tasks</span></a>
				</div>
			</div>-->
			<!--<div class="position-relative d-inline-block"><button class="header-icon btn btn-empty" type="button"
                        id="notificationButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="simple-icon-bell"></i> <span class="count">3</span></button>
                    <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                        <div class="scroll">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom"><a href="#"><img
                                        src="<?php echo base_url() ?>assets/img/profiles/l-2.jpg" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle"></a>
                                <div class="pl-3"><a href="#">
                                        <p class="font-weight-medium mb-1">Joisse Kaycee just sent a new comment!</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a></div>
                            </div>
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom"><a href="#"><img
                                        src="<?php echo base_url() ?>assets/img/notifications/1.jpg" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle"></a>
                                <div class="pl-3"><a href="#">
                                        <p class="font-weight-medium mb-1">1 item is out of stock!</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a></div>
                            </div>
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom"><a href="#"><img
                                        src="<?php echo base_url() ?>assets/img/notifications/2.jpg" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle"></a>
                                <div class="pl-3"><a href="#">
                                        <p class="font-weight-medium mb-1">New order received! It is total $147,20.</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a></div>
                            </div>
                            <div class="d-flex flex-row mb-3 pb-3"><a href="#"><img src="<?php echo base_url() ?>assets/img/notifications/3.jpg"
                                        alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle"></a>
                                <div class="pl-3"><a href="#">
                                        <p class="font-weight-medium mb-1">3 items just added to wish list by a user!
                                        </p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div><button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button"
                    id="fullScreenButton"><i class="simple-icon-size-fullscreen"></i> <i
                        class="simple-icon-size-actual"></i></button>-->
		</div>
		<div class="user d-inline-block">
			<button class="btn btn-empty p-0" type="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">
				<span class="name" style="color:white;"><?php echo $this->session->userdata("Name") ?></span>
				<span><img alt="Profile Picture" src="<?php echo base_url() ?>assets/img/notifications/1.jpg"></span>
			</button>
			<div class="dropdown-menu dropdown-menu-right mt-3">
				<?php if ($CI->PermisosModel->validarPermisoUsuario(3)) {
					echo '<a href="' . base_url('index.php/procesos') . '" class="dropdown-item">Administración</a>';
				}
				?>

				<?php if ($CI->PermisosModel->validarPermisoUsuario(4) || $CI->PermisosModel->validarPermisoUsuario(5)) {
					echo '<a href="' . base_url('index.php/misIndicadores') . '" class="dropdown-item">Indicadores</a>';
				}
				?>
				<a href="<?php echo base_url('index.php/gerentesView'); ?>" class="dropdown-item">Vista de procesos</a>
				<a href="<?php echo base_url('index.php/welcome'); ?>" class="dropdown-item">Inicio</a>
				<a class="dropdown-item" href="<?php echo base_url('index.php/salir'); ?>">Salir</a>
			</div>
		</div>
	</div>
</nav>

