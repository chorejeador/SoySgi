<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubGestionController extends CI_Controller {

	protected $helpers = ['form'];

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GestionModel');			
		$this->load->model('SubGestionModel');
		$this->load->model('AreasModel');		
		$this->load->helper(array('form', 'url'));
		if ($this->session->userdata("logged") != 1) {
            redirect(base_url() . 'index.php', 'refresh');
        }
	}

	function subGestiones()
	{
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('subgestion/index');
		$this->load->view('footer/footer');
        $this->load->view('js/subgestion/subgestionJs');
	}

	function editarSubGestion($id)
	{		
		
		$data['datos'] = $this->SubGestionModel->getSubGestion($id);		
		$data["gestion"] = $this->db->query("SELECT * FROM CatGestion where IdGestion = (SELECT IdGestion FROM CatSubGestion where IdSubGestion = ".$id.")")->result_array();

		
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('gestion/editarGestion',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/gestion/editarGestionJs');
	}

	function guardarSubGestion() {
		$this->SubGestionModel->guardarSubGestion($this->input->post('descripcion'),$this->input->post('idProceso'),$this->input->post('siglas'));
	}

	function subgestionSearch()
	{
		return $this->SubGestionModel->subgestionSearch($this->input->post('filtro'));	
	}

	function agregarSubGestion($id=null) {
		$data["datos"] = $this->GestionModel->getGestion($id);
		$data["idProcesoParam"] = $id;

		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('subGestion/agregarSubGestion',$data);
		$this->load->view('js/subGestion/agregarSubGestion');
		$this->load->view('footer/footer');
	}

	

}