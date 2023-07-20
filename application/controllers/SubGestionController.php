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
		
		$datos = $this->SubGestionModel->getSubGestion($id);;
		$data['datos'] = $datos;


		$data["gestiones"] = $this->db->query("SELECT * FROM CatGestion WHERE Estado = 'ACTIVO' OR IdGestion = ".$datos[0]["IdGestion"])->result_array();

		//echo json_encode($data["datos"]);return
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('subgestion/editarSubGestion',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/subgestion/editarSubGestionJs');
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

	public function guardarEditarSubGestion()
	{

		$this->SubGestionModel->guardarEditarSubGestion($this->input->post('descripcion'),$this->input->post('id'),$this->input->post('estado'),$this->input->post('idGestion'),$this->input->post('sigla'));
	}

	function agregarDocumentoSubGestion($id)
	{
		$datos = $this->SubGestionModel->getSubGestion($id);
		$data["documentos"] = $this->SubGestionModel->getDocumentos($id);
		$data["datos"] = $datos;

		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('subGestion/agregarDocumentoSubGestion',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/subGestion/agregarDocumentoSubGestionJs');
	}


	function verDocumentoSubGestion($id)
	{
		
	}

	function guardarDocumentoSubGestion()
	{
		$mensaje = array(); 

			//upload configuration
			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|pdf|doc|xlsx|xls|docx|mp4|jpeg';
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
				$result = $this->SubGestionModel->guardarDocumento(
									$file_ext
									,$config['file_name']
									,$this->input->post('txtId')
									,$this->input->post('txtNombre')
									,$this->input->post('txtDescripcion')
									,$this->input->post('selectArea')
									,null
									,null
								);
								//echo json_encode($result);return;
				if ($result[0]["retorno"] == -1) {
					unlink($data["upload_path"]."/".$config['file_name']);
					$mensaje[0]["retorno"] = -1;
					$mensaje[0]["tipo"] = "error";
					$mensaje[0]["mensaje"] = "error al subir archivo:". print_r($this->upload->display_errors());
					echo json_encode($mensaje);
					return;
				}
				//echo json_encode($result);            	
            }
	}

	function editarDocumentoSubGestion($id)
	{
		$data["datos"] = $this->SubGestionModel->getDocumento($id);
		$data["documentos"] = $this->SubGestionModel->getHistorialDocumento($id);
		
		$data["areas"] = $this->AreasModel->getAreas('ACTIVO');
		///echo json_encode($data["datos"]);return;

		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('subGestion/editarDocumentoSubGestion',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/subGestion/editarDocumentoSubGestionJs');
	}

	function guardarDocumentoSubGestionEditar()
	{
		$mensaje = array(); 

			//upload configuration			
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc|xlsx|xls|docx|mp4|jpeg';
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
				$result = $this->SubGestionModel->guardarDocumento(
					$file_ext
					,$config['file_name']
					,$this->input->post('txtId')
					,$this->input->post('txtNombre')
					,$this->input->post('txtDescripcion')
					,$this->input->post('selectArea')
					,$this->input->post('txtIdGestion')
					,$this->input->post('txtIdPadre')
				);								
			if ($result[0]["retorno"] == -1) {
				unlink($data["upload_path"]."/".$config['file_name']);					
			}				
		}
	}

	function documentosViewSubgestion($id)
	{
		$data["datos"] = $this->SubGestionModel->getSubGestion($id);

		$data["archivos"] = $this->SubGestionModel->getDocumentos($id);

		$this->load->view('header/header');
		$this->load->view('gerentes/documentosViewSubgestion',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/gestion/gestionJs');
	}

}