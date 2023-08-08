<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProcesoController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProcesoModel');		
		if ($this->session->userdata("logged") != 1) {
            redirect(base_url() . 'index.php', 'refresh');
        }
        if (!$this->PermisosModel->validarPermisoUsuario(3)) {
            redirect('unauthorized', 'refresh');
        }
	}


	public function index()
	{       

		if (!$this->PermisosModel->validarPermisoUsuario(3)) {
            redirect('unauthorized', 'refresh');
        }
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('proceso/index');
		$this->load->view('footer/footer');
        $this->load->view('js/procesos/procesosJs');
	}

    public function nuevoProcesos()
    {
    	if (!$this->PermisosModel->validarPermisoUsuario(3)) {
            redirect('unauthorized', 'refresh');
        }
        $this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('proceso/nuevoProceso');
		$this->load->view('footer/footer');
        $this->load->view('js/procesos/nuevoProcesosJs');
    }

	public function editarProceso($id)
	{
		if (!$this->PermisosModel->validarPermisoUsuario(3)) {
            redirect('unauthorized', 'refresh');
        }
		$data['datos'] = $this->ProcesoModel->getProceso($id,null);
		//echo json_encode($data);//return;
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('proceso/editarProceso',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/procesos/editarProcesosJs');
	}

	public function guardarProceso()
	{
		$this->ProcesoModel->guardarProceso($this->input->post('descripcion'));
	}
	
	public function guardarEditarProceso()
	{
		$this->ProcesoModel->guardarEditarProceso($this->input->post('descripcion'),$this->input->post('id'),$this->input->post('estado'));
	}

    public function procesosSearch()
    {
        return $this->ProcesoModel->procesosSearch($this->input->post('filtro'));
    }

	public function verGestionesProceso($id)
	{
		if (!$this->PermisosModel->validarPermisoUsuario(3)) {
            redirect('unauthorized', 'refresh');
        }
		$data["proceso"] = $this->ProcesoModel->getProceso($id,null);
		$data["gestiones"] = $this->ProcesoModel->getGestiones($id,null);
		
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('proceso/verGestiones',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/procesos/nuevoProcesosJs');
	}

	
}
