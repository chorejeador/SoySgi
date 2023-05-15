<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GerentesController extends CI_Controller {

	protected $helpers = ['form'];

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GestionModel');	
		$this->load->model('ProcesoModel');		
		$this->load->model('AreasModel');		
		$this->load->helper(array('form', 'url'));
		if ($this->session->userdata("logged") != 1) {
            redirect(base_url() . 'index.php', 'refresh');
        }
	}

    public function gerentesView(){       
        
		$data["procesos"] = $this->ProcesoModel->getProceso(null,'ACTIVO');
		$i= 0;
		foreach ($data["procesos"] as $key) {
			$data["procesos"][$i]["gestiones"] = array();
			$data["procesos"][$i]["gestiones"] = $this->GestionModel->getGestionByProceso($key["IdProceso"]);
			
			$e = 0;
			foreach ($data["procesos"][$i]["gestiones"] as $key2) {
				$data["procesos"][$i]["gestiones"][$e]["documentos"] = array();
				$data["procesos"][$i]["gestiones"][$e]["documentos"] = $this->GestionModel->getDocumentos($key2["IdGestion"]);
				$e++;
			}
			$i++;
		}


		/*echo json_encode($data["procesos"]);
		return;*/
        $this->load->view('header/header');
		//$this->load->view('menu/menu');
		$this->load->view('gerentes/gerentesView',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/gestion/gestionJs');
    }

	public function documentosView($id)
	{

		$data["datos"] = $this->GestionModel->getGestion($id);
		$data["archivos"] = $this->GestionModel->getDocumentos($id);
		//echo json_encode($this->session->userdata());	return;
		//echo json_encode($data["datos"]);	return;

        $this->load->view('header/header');
		$this->load->view('gerentes/documentosView',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/gestion/gestionJs');
	}

	public function downloadFile($id)
	{
		if (!empty($id)) {
			$this->GestionModel->downloadFile($id);
		}
	}

}