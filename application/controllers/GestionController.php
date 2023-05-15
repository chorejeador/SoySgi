<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionController extends CI_Controller {

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


	public function index()
	{       
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('gestion/index');
		$this->load->view('footer/footer');
        $this->load->view('js/gestion/gestionJs');
	}

    public function nuevaGestion($idProcesoParam=null)
    {

		
		$data["procesos"] = $this->ProcesoModel->getProceso(null,'ACTIVO');
		$data["idProcesoParam"] = $idProcesoParam;
        $this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('gestion/nuevaGestion',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/gestion/nuevaGestionJs');
    }

	public function editarGestion($id)
	{
		
		//$data['datos'] = $this->ProcesoModel->getProceso($id);
		$data['datos'] = $this->GestionModel->getGestion($id);
		$data["procesos"] = $this->ProcesoModel->getProceso(null,'ACTIVO');
		//echo json_encode($data["datos"]);return;
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('gestion/editarGestion',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/gestion/editarGestionJs');
	}

	public function agregarDocumentoGestion($id)
	{
		$data["datos"] = $this->GestionModel->getGestion($id);
		$data["documentos"] = $this->GestionModel->getDocumentos($id);
		//echo json_encode($data["documentos"]);
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('gestion/agregarDocumentoGestion',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/gestion/agregarDocumentoGestionJs');
	}

	public function guardarDocumento()
	{
		$mensaje = array(); 

			//upload configuration			
			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|pdf|doc|xslx|xls|docx';
            $config['max_size']             = 102400;//100 megas
            $config['detect_mime']          = true;//proteccion para injeccion
            $config['file_ext_tolower']     = true;
			$config['file_name']            = floor(microtime(true) * 1000);//nombre random

			$filename= $_FILES["archivo"]["name"];
			$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	

			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('archivo')){
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "error al subir archivo:". print_r($this->upload->display_errors());
				echo json_encode($mensaje);
				return;
            }                
			else{
                $data = array('upload_data' => $this->upload->data());
				$result = $this->GestionModel->guardarDocumento(
									$file_ext
									,$config['file_name']
									,$this->input->post('txtId')
									,$this->input->post('txtNombre')
									,$this->input->post('txtDescripcion')
									,$this->input->post('selectArea')
									,null
									,null
								);
								echo json_encode($result);return;
				if ($result[0]["retorno"] == -1) {
					unlink($data["upload_path"]."/".$config['file_name']);					
				}
				echo json_encode($result);            	
            }
	}
	public function guardarGestion()
	{
		$this->GestionModel->guardarGestion($this->input->post('descripcion'),$this->input->post('idProceso'),$this->input->post('siglas'));
	}
	
	public function guardarEditarGestion()
	{

		$this->GestionModel->guardarEditarGestion($this->input->post('descripcion'),$this->input->post('id'),$this->input->post('estado'),$this->input->post('idProceso'),$this->input->post('sigla'));
	}

    public function gestionSearch()
    {
        return $this->GestionModel->gestionSearch($this->input->post('filtro'));
    }

	public function editarDocumento($id)
	{
		$data["datos"] = $this->GestionModel->getDocumento($id);
		$data["documentos"] = $this->GestionModel->getHistorialDocumento($id);
		
		$data["areas"] = $this->AreasModel->getAreas('ACTIVO');
		///echo json_encode($data["datos"]);return;

		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('gestion/editarDocumento',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/gestion/editarDocumentoJs');
	}

	public function guardarDocumentoEditar()
	{
		$mensaje = array(); 

			//upload configuration			
			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|pdf|doc|xslx|xls|docx';
            $config['max_size']             = 102400;//100 megas
            $config['detect_mime']          = true;//proteccion para injeccion
            $config['file_ext_tolower']     = true;
			$config['file_name']            = floor(microtime(true) * 1000);//nombre random

			$filename= $_FILES["archivo"]["name"];
			$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	

			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('archivo')){
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "error al subir archivo:". print_r($this->upload->display_errors());
				echo json_encode($mensaje);
				return;
            }                
			else{
                $data = array('upload_data' => $this->upload->data());
				$result = $this->GestionModel->guardarDocumento(
									$file_ext
									,$config['file_name']
									,$this->input->post('txtId')
									,$this->input->post('txtNombre')
									,$this->input->post('txtDescripcion')
									,$this->input->post('selectArea')
									,$this->input->post('txtIdGestion')
									,$this->input->post('txtIdPadre')
								);
								echo json_encode($result);return;
				if ($result[0]["retorno"] == -1) {
					unlink($data["upload_path"]."/".$config['file_name']);					
				}
				echo json_encode($result);
            }
	}

	public function verHistorial($id)
	{		
		$data["datos"] = $this->GestionModel->getDocumento($id);
		$data["documentos"] = $this->GestionModel->getHistorialDocumento($id);
		
		
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('gestion/verHistorial',$data);
		$this->load->view('footer/footer');
        //$this->load->view('js/gestion/editarDocumentoJs');
	}
}
