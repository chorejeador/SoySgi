<div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    <li><a href="#dashboard"><i class="iconsminds-shop-4"></i> <span>Dashboards</span></a></li>
                    <li><a href="#procesos"><i class="iconsminds-digital-drawing"></i> Procesos</a></li>
                    <li><a href="#general"><i class="iconsminds-digital-drawing"></i> Vista General</a></li>
                    <li><a href="#permisos"><i class="iconsminds-air-balloon-1"></i> Permisos</a></li>
                    <li><a href="#eventos"><i class="iconsminds-museum"></i> Eventos</a></li>
                </ul>
            </div>
        </div>
        <div class="sub-menu">
            <div class="scroll">
                <ul class="list-unstyled" data-link="dashboard">
                    <li><a href="Dashboard.Default.html"><i class="simple-icon-rocket"></i> <span
                                class="d-inline-block">Default</span></a></li>
                    <li><a href="Dashboard.Analytics.html"><i class="simple-icon-pie-chart"></i> <span
                                class="d-inline-block">Analytics</span></a></li>
                    <li><a href="Dashboard.Ecommerce.html"><i class="simple-icon-basket-loaded"></i> <span
                                class="d-inline-block">Ecommerce</span></a></li>
                    <li><a href="Dashboard.Content.html"><i class="simple-icon-doc"></i> <span
                                class="d-inline-block">Content</span></a></li>
                </ul>
                <ul class="list-unstyled" data-link="procesos" id="procesos">
                    <li><a href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true"
                            aria-controls="collapseAuthorization" class="rotate-arrow-icon opacity-50"><i
                                class="simple-icon-arrow-down"></i> <span
                                class="d-inline-block">Administración de Procesos</span></a>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li><a href="<?php echo base_url('index.php/procesos') ?>"><i class="simple-icon-grid"></i> <span
                                            class="d-inline-block">Lista de Procesos</span></a></li>
                                <li><a href="<?php echo base_url('index.php/nuevoProcesos') ?>"><i class="iconsminds-folder-add--"></i> <span
                                            class="d-inline-block">Nuevo Proceso</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true"
                            aria-controls="collapseAuthorization" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i>
                            <span class="d-inline-block">Administración de Gestiones</span>
                        </a>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li><a href="<?php echo base_url('index.php/gestiones') ?>"><i class="simple-icon-grid"></i> <span
                                            class="d-inline-block">Lista de Gestiones</span></a></li>
                                <li><a href="<?php echo base_url('index.php/nuevaGestion') ?>"><i class="iconsminds-folder-add--"></i> <span
                                            class="d-inline-block">Nueva Gestión</span></a></li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true"
                            aria-controls="collapseAuthorization" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i>
                            <span class="d-inline-block">Administración de Sub Gestiones</span>
                        </a>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li><a href="<?php echo base_url('index.php/subGestiones') ?>"><i class="simple-icon-grid"></i> <span
                                            class="d-inline-block">Lista de Sub Gestiones</span></a></li>                                
                            </ul>
                        </div>
                    </li>
                </ul>
                <ul class="list-unstyled" data-link="general" id="general">
                    <ul class="list-unstyled inner-level-menu">
                        <li><a href="<?php echo base_url('index.php/general') ?>"><i class="simple-icon-grid"></i> <span
                                            class="d-inline-block">Documentos Generales</span></a></li>                        
                    </ul>
                </ul>

                <ul class="list-unstyled" data-link="permisos" id="permisos">                  
                   <li>
                      <a href="#" data-toggle="collapse" data-target="#collapseMenuDetached" aria-expanded="true" aria-controls="collapseMenuDetached" class="rotate-arrow-icon"><i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Permisos</span></a>
                      <div id="collapseMenuDetached" class="collapse show" style="">
                         <ul class="list-unstyled inner-level-menu">
                            <li><a href="<?php echo base_url('index.php/permisos')?>"><i class="simple-icon-layers"></i> <span class="d-inline-block">Permisos a Documentos</span></a></li>
                         </ul>
                      </div>
                   </li>
                </ul>

                <!--eventoxs menu-->
                <ul class="list-unstyled" data-link="eventos" id="eventos">                  
                   <li>
                      <a href="#" data-toggle="collapse" data-target="#collapseMenuDetached" aria-expanded="true" aria-controls="collapseMenuDetached" class="rotate-arrow-icon"><i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Eventos</span></a>
                      <div id="collapseMenuDetached" class="collapse show" style="">
                         <ul class="list-unstyled inner-level-menu">
                            <li><a href="<?php echo base_url('index.php/adminEventos')?>"><i class="simple-icon-layers"></i> <span class="d-inline-block">Administrar eventos</span></a></li>
                         </ul>
                      </div>
                   </li>
                </ul>
            </div>
        </div>
    </div>