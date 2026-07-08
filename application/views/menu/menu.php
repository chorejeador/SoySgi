<?php
defined('BASEPATH') or exit('No direct script access allowed');

$CI = &get_instance();
$esAdministrador = (bool) $CI->PermisosModel->validarPermisoUsuario(3);
?>

<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <?php if ($esAdministrador): ?>
                    <li>
                        <a href="#dashboard"><i class="iconsminds-shop-4"></i> <span>Dashboards</span></a>
                    </li>
                    <li>
                        <a href="#procesos"><i class="iconsminds-digital-drawing"></i> <span>Procesos</span></a>
                    </li>
                    <li>
                        <a href="#general"><i class="iconsminds-digital-drawing"></i> <span>Vista General</span></a>
                    </li>
                    <li>
                        <a href="#permisos"><i class="iconsminds-air-balloon-1"></i> <span>Permisos</span></a>
                    </li>
                    <li>
                        <a href="#eventos"><i class="iconsminds-calendar-1"></i> <span>Publicar</span></a>
                    </li>
                <?php endif; ?>

                <li class="<?php echo ($this->uri->segment(2) === 'Cambiar_Password_view') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url('UsuariosController/Cambiar_Password_view'); ?>"><i class="simple-icon-lock-open"></i> <span>Contraseña</span></a>
                </li>
            </ul>
        </div>
    </div>

    <?php if ($esAdministrador): ?>
        <div class="sub-menu">
            <div class="scroll">
                <ul class="list-unstyled" data-link="dashboard" id="dashboard">
                    <li>
                        <a href="Dashboard.Default.html"><i class="simple-icon-rocket"></i> <span class="d-inline-block">Default</span></a>
                    </li>
                    <li>
                        <a href="Dashboard.Analytics.html"><i class="simple-icon-pie-chart"></i> <span class="d-inline-block">Analytics</span></a>
                    </li>
                    <li>
                        <a href="Dashboard.Ecommerce.html"><i class="simple-icon-basket-loaded"></i> <span class="d-inline-block">Ecommerce</span></a>
                    </li>
                    <li>
                        <a href="Dashboard.Content.html"><i class="simple-icon-doc"></i> <span class="d-inline-block">Content</span></a>
                    </li>
                    <li>
                        <a href="Dashboard.Content.html"><i class="simple-icon-event"></i> <span class="d-inline-block">Content</span></a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="procesos" id="procesos">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseProcesos" aria-expanded="true" aria-controls="collapseProcesos" class="rotate-arrow-icon opacity-50"><i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Administración de Procesos</span></a>
                        <div id="collapseProcesos" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="<?php echo base_url('index.php/procesos'); ?>"><i class="simple-icon-grid"></i> <span class="d-inline-block">Lista de Procesos</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/nuevoProcesos'); ?>"><i class="iconsminds-folder-add--"></i> <span class="d-inline-block">Nuevo Proceso</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseGestiones" aria-expanded="true" aria-controls="collapseGestiones" class="rotate-arrow-icon opacity-50"><i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Administración de Gestiones</span></a>
                        <div id="collapseGestiones" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="<?php echo base_url('index.php/gestiones'); ?>"><i class="simple-icon-grid"></i> <span class="d-inline-block">Lista de Gestiones</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/nuevaGestion'); ?>"><i class="iconsminds-folder-add--"></i> <span class="d-inline-block">Nueva Gestión</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseSubGestiones" aria-expanded="true" aria-controls="collapseSubGestiones" class="rotate-arrow-icon opacity-50"><i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Administración de Sub Gestiones</span></a>
                        <div id="collapseSubGestiones" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="<?php echo base_url('index.php/subGestiones'); ?>"><i class="simple-icon-grid"></i> <span class="d-inline-block">Lista de Sub Gestiones</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="general" id="general">
                    <li>
                        <a href="<?php echo base_url('index.php/administrarCarpetas'); ?>"><i class="iconsminds-folder"></i> <span class="d-inline-block">Administrar Carpetas</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/general'); ?>"><i class="simple-icon-doc"></i> <span class="d-inline-block">Administrar Documentos</span></a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="permisos" id="permisos">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapsePermisos" aria-expanded="true" aria-controls="collapsePermisos" class="rotate-arrow-icon"><i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Permisos</span></a>
                        <div id="collapsePermisos" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="<?php echo base_url('index.php/permisos'); ?>"><i class="simple-icon-layers"></i> <span class="d-inline-block">Permisos a Documentos</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="eventos" id="eventos">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseEventos" aria-expanded="true" aria-controls="collapseEventos" class="rotate-arrow-icon"><i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Eventos</span></a>
                        <div id="collapseEventos" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="<?php echo base_url('index.php/nuevapublicacion'); ?>"><i class="simple-icon-layers"></i> <span class="d-inline-block">Nueva publicación</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/publicacion'); ?>"><i class="simple-icon-layers"></i> <span class="d-inline-block">Lista de publicaciones</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</div>