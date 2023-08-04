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
		$this->load->view('permisos/index',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/permisos/permisos');
	}

	public function getAreas($estado)
	{
		return $this->AreasModel->getAreas($estado);
	}


	function cargarPermisosUsuarios()
	{

		$this->PermisosModel->cargarPermisosUsuarios($this->input->post("id"));
	}

	function asignarPermiso()
	{
		$this->PermisosModel->asignarPermiso($this->input->post('idPermiso'),$this->input->post('idUsuario'));
	}

	function cargarDocumentosPermiso() {
		$this->PermisosModel->cargarDocumentosPermiso($this->input->post("filtro"));
	}

	function cargarUsuariosDocumentos()
	{
		$this->PermisosModel->cargarUsuariosDocumentos($this->input->post("id"),$this->input->post("tipo"));
	}

	function asignarPermisoDocumento()
	{
		$this->PermisosModel->asignarPermisoDocumento($this->input->post("idDocumento"),$this->input->post("idUsuario"),$this->input->post("tipo"),$this->input->post("estado"));
	}
}
