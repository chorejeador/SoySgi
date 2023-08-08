<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['salir'] = 'welcome/salir';

/*****procesos */
$route['procesos'] = 'ProcesoController/index';
$route['procesosSearch'] = 'ProcesoController/procesosSearch';
$route['nuevoProcesos'] = 'ProcesoController/nuevoProcesos';
$route['guardarProceso'] = 'ProcesoController/guardarProceso';
$route['editarProceso/(:any)'] = 'ProcesoController/editarProceso/$1';
$route['verGestionesProceso/(:any)'] = 'ProcesoController/verGestionesProceso/$1';
$route['guardarEditarProceso'] = 'ProcesoController/guardarEditarProceso';

/*****rutas landing *****/
$route['instalaciones'] = 'welcome/instalaciones';
$route['contactenos'] = 'welcome/contactenos';
/***gestiones */

$route['gestiones'] = 'GestionController/index';
$route['nuevaGestion/(:any)'] = 'GestionController/nuevaGestion/$1';
$route['nuevaGestion'] = 'GestionController/nuevaGestion';
$route['guardarGestion'] = 'GestionController/guardarGestion';
$route['gestionSearch'] = 'GestionController/gestionSearch';
$route['editarGestion/(:any)'] = 'GestionController/editarGestion/$1';
$route['guardarEditarGestion'] = 'GestionController/guardarEditarGestion';
$route['agregarDocumentoGestion/(:any)'] = 'GestionController/agregarDocumentoGestion/$1';
$route['guardarDocumento'] = 'GestionController/guardarDocumento';
$route['editarDocumento/(:any)'] = 'GestionController/editarDocumento/$1';
$route['guardarDocumentoEditar'] = 'GestionController/guardarDocumentoEditar';
$route['verHistorial/(:any)'] = 'GestionController/verHistorial/$1';
$route['login'] = 'Welcome/login';
$route["Acreditar"] = "Welcome/Acreditar";
$route["salir"] = "Welcome/salir";

/***subgestiones****/
$route['subGestiones'] = 'SubGestionController/subGestiones';
$route['agregarSubGestion/(:any)'] = 'SubGestionController/agregarSubGestion/$1';
$route['guardarSubGestion'] = 'SubGestionController/guardarSubGestion';
$route['subgestionSearch'] = 'SubGestionController/subgestionSearch';
$route['editarSubGestion/(:any)'] = 'SubGestionController/editarSubGestion/$1';
$route['verDocumentoSubGestion/(:any)'] = 'SubGestionController/verDocumentoSubGestion/$1';
$route['guardarEditarSubGestion'] = 'SubGestionController/guardarEditarSubGestion';
$route['agregarDocumentoSubGestion/(:any)'] = 'SubGestionController/agregarDocumentoSubGestion/$1';
$route['guardarDocumentoSubGestion'] = 'SubGestionController/guardarDocumentoSubGestion';
$route['editarDocumentoSubGestion/(:any)'] = 'SubGestionController/editarDocumentoSubGestion/$1';
$route['guardarDocumentoSubGestionEditar'] = 'SubGestionController/guardarDocumentoSubGestionEditar';
$route['documentosViewSubgestion/(:any)'] = 'SubGestionController/documentosViewSubgestion/$1';

/*****vistas de gerentes */
$route["gerentesView"] = "GerentesController/gerentesView";
$route["documentosView/(:any)"] = "GerentesController/documentosView/$1";
$route["downloadFile/(:any)/(:any)"] = "GerentesController/downloadFile/$1/$2";

/*******permisos*******/
$route["permisos"] = "PermisosController";
$route["asignarPermisos"] = "PermisosController";
$route["filtrarUsuarios"] = "UsuariosController/filtrarUsuarios";
$route["cargarPermisosUsuarios"] = "PermisosController/cargarPermisosUsuarios";
$route["asignarPermiso"] = "PermisosController/asignarPermiso";
$route["cargarDocumentosPermiso"] = "PermisosController/cargarDocumentosPermiso";
$route["cargarUsuariosDocumentos"] = "PermisosController/cargarUsuariosDocumentos";
$route["asignarPermisoDocumento"] = "PermisosController/asignarPermisoDocumento";

/*paginas web planas*/
$route["misionPolitica"] = "welcome/misionPolitica";
$route["vision"] = "welcome/vision";
$route["principiosValores"] = "welcome/principiosValores";
$route["trayectoria"] = "welcome/trayectoria";
$route["portafolio"] = "welcome/portafolio";
$route["noticiaseventos"] = "welcome/noticiaseventos";

/******acceso denegado permiso */
$route["unauthorized"] = "welcome/unauthorized";


/***vista general de documentos****/
$route["docGeneral"] = "GeneralController/verDocGeneral";
$route["general"] = "GeneralController/general";
$route["generalSearch"] = "GeneralController/generalSearch";
$route["crearDocGeneral"] = "GeneralController/crearDocGeneral";
$route["guardarDocGeneral"] = "GeneralController/guardarDocGeneral";
$route["bajaDocumentoGeneral"] = "GeneralController/bajaDocumentoGeneral";