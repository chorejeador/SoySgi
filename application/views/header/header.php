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
    
    <!--<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />-->

    <style>

        .navbar-logo .logo {
            background-image: url(<?= base_url()?>assets/img/logos/LOGO_SIG.png);
            background-position: 20px 50%;
            background-repeat: no-repeat !important;
            background-size: 200px 70px !important;
            padding-left: 50px !important;
            width: 200px;
            height: 69px;
        }

        .logo-mobile {
            width: 20px;
            height: 35px;
            background: url(<?= base_url()?>assets/img/logos/LOGO_SIG.png) no-repeat !important;
            background-position: center center;
        }

        .btn-outline-theme-3 {
            background: unset;
            color: #184f90eb !important;
            border-color: #184f90eb!important;
        }

        .btn-outline-theme-3:hover {
            background-color: #184f90eb;
            border-color: #184f90eb;
            color: #fff !important;
        }

        .card.question{
            font-weight:bolder;
        }
        
    </style>


</head>

<body id="app-container" class="menu-default show-spinner">
    <nav class="navbar fixed-top" style="background-color:white;">
        <div class="d-flex align-items-center navbar-left"><a href="#" class="menu-button d-none d-md-block"><svg
                    class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg> <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg> </a><a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none"><svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg></a>
            <!--<div class="search" data-search-path="Pages.Search03d2.html?q="><input placeholder="Search..."> <span
                    class="search-icon"><i class="simple-icon-magnifier"></i></span></div><a
                class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block"
                href="https://1.envato.market/5kAb">&nbsp;BUY&nbsp;</a>-->
        </div><a class="navbar-logo" href="Dashboard.Default.html"><span class="logo d-none d-xs-block"></span> <span
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
                                        src="<?php echo base_url()?>assets/img/profiles/l-2.jpg" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle"></a>
                                <div class="pl-3"><a href="#">
                                        <p class="font-weight-medium mb-1">Joisse Kaycee just sent a new comment!</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a></div>
                            </div>
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom"><a href="#"><img
                                        src="<?php echo base_url()?>assets/img/notifications/1.jpg" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle"></a>
                                <div class="pl-3"><a href="#">
                                        <p class="font-weight-medium mb-1">1 item is out of stock!</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a></div>
                            </div>
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom"><a href="#"><img
                                        src="<?php echo base_url()?>assets/img/notifications/2.jpg" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle"></a>
                                <div class="pl-3"><a href="#">
                                        <p class="font-weight-medium mb-1">New order received! It is total $147,20.</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a></div>
                            </div>
                            <div class="d-flex flex-row mb-3 pb-3"><a href="#"><img src="<?php echo base_url()?>assets/img/notifications/3.jpg"
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
                    aria-haspopup="true" aria-expanded="false"><span class="name"><?php echo $this->session->userdata("Name")?></span> 
                    <span><img alt="Profile Picture" src="<?php echo base_url()?>assets/img/profiles/l-1.jpg"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right mt-3">
                        <a href="<?php echo base_url('index.php/procesos'); ?>" class="dropdown-item" href="#">Administración</a>
                        <a href="<?php echo base_url('index.php/gerentesView'); ?>" class="dropdown-item" href="#">Vista general</a>
                        <a class="dropdown-item" href="<?php echo base_url('index.php/salir'); ?>">Salir</a>
                </div>
            </div>
        </div>
    </nav>