<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermisosController extends CI_Controller {

	protected $helpers = ['form'];

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('PermisosModel');		
		$this->load->helper(array('form', 'url'));

		if ($this->session->userdata("logged") != 1) {
            redirect(base_url() . 'index.php', 'refresh');
        }
	}

	public function index()
	{       
		$data["permisos"] = $this->PermisosModel->getPermisos();

		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('permisos/index', $data);
		$this->load->view('footer/footer');
        $this->load->view('js/permisos/permisos');
	}

	public function getAreas($estado)
	{
		return $this->AreasModel->getAreas($estado);
	}

	public function cargarPermisosUsuarios()
	{
		$this->PermisosModel->cargarPermisosUsuarios($this->input->post("id"));
	}

	public function asignarPermiso()
	{
		$this->PermisosModel->asignarPermiso(
			$this->input->post('idPermiso'),
			$this->input->post('idUsuario')
		);
	}

	public function cargarDocumentosPermiso()
	{
		$filtro = $this->input->post("filtro");

		if (empty($filtro)) {
			$filtro = 'gestion';
		}

		$this->PermisosModel->cargarDocumentosPermiso($filtro);
	}

	public function cargarUsuariosDocumentos()
	{
		$id   = $this->input->post("id");
		$tipo = $this->input->post("tipo");

		if (empty($id) || empty($tipo)) {
			header('Content-Type: application/json');
			echo json_encode(array("data" => array()));
			return;
		}

		$this->PermisosModel->cargarUsuariosDocumentos($id, $tipo);
	}

	public function asignarPermisoDocumento()
	{
		$this->PermisosModel->asignarPermisoDocumento(
			$this->input->post("idDocumento"),
			$this->input->post("idUsuario"),
			$this->input->post("tipo"),
			$this->input->post("estado")
		);
	}

	public function procesar_masivo()
{
    $idDocumento = $this->input->post('documento');
    $usuarios    = $this->input->post('usuarios');
    $tipo        = $this->input->post('tipo');

    if (empty($idDocumento) || empty($tipo) || empty($usuarios) || !is_array($usuarios)) {
        header('Content-Type: application/json');
        echo json_encode(array(
            "tipo" => "error",
            "mensaje" => "Datos incompletos para procesar permisos masivos"
        ));
        return;
    }

    $res = $this->PermisosModel->autorizarLoteUsuarios($idDocumento, $usuarios, $tipo);

    header('Content-Type: application/json');

    if ($res) {
        echo json_encode(array(
            "tipo" => "success",
            "mensaje" => "Permisos asignados correctamente"
        ));
    } else {
        echo json_encode(array(
            "tipo" => "error",
            "mensaje" => "No se pudieron asignar los permisos"
        ));
    }
}

public function revocar_masivo()
{
    $idDocumento = $this->input->post('documento');
    $usuarios    = $this->input->post('usuarios');
    $tipo        = $this->input->post('tipo');

    if (empty($idDocumento) || empty($tipo) || empty($usuarios) || !is_array($usuarios)) {
        header('Content-Type: application/json');
        echo json_encode(array(
            "tipo" => "error",
            "mensaje" => "Datos incompletos para revocar permisos masivos"
        ));
        return;
    }

    $res = $this->PermisosModel->revocarLoteUsuarios($idDocumento, $usuarios, $tipo);

    header('Content-Type: application/json');

    if ($res) {
        echo json_encode(array(
            "tipo" => "success",
            "mensaje" => "Permisos revocados correctamente"
        ));
    } else {
        echo json_encode(array(
            "tipo" => "error",
            "mensaje" => "No se pudieron revocar los permisos"
        ));
    }
}



}