<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralController extends CI_Controller {

	protected $helpers = ['form'];

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GeneralModel');
		$this->load->model('AreasModel');
		$this->load->helper(array('form', 'url'));
		if ($this->session->userdata("logged") != 1) {
            redirect(base_url() . 'index.php', 'refresh');
        }
	}

	function verDocGeneral()
	{
		$data["docs"] = $this->GeneralModel->getDocumentos();
		$this->load->view('general/verDocGeneral',$data);
	}


	function general()
	{		
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('general/general');
		$this->load->view('footer/footer');
        $this->load->view('js/general/general');
	}

	function generalSearch()
	{
		$this->GeneralModel->generalSearch('ACTIVO',$this->input->post("filtro"));
	}

	function crearDocGeneral()
	{
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('general/crearGeneral');
		$this->load->view('footer/footer');
        $this->load->view('js/general/crearDocGeneral');			
	}


	public function guardarDocGeneral()
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
	

			$doc = $this->load->library('upload', $config);

			
			if ( ! $this->upload->do_upload('archivo')){
				$error = array('error' => $this->upload->display_errors());
         		
         		$this->session->set_flashdata('error',$error['error']);
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "error al subir archivo: ". $error['error'];
				echo json_encode($mensaje);
				return;
            }
			else{
                $data = array('upload_data' => $this->upload->data());
				$result = $this->GeneralModel->guardarDocumento(
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

	function bajaDocumentoGeneral()
	{
		$this->GeneralModel->bajaDocumentoGeneral($_POST['id'],$_POST['estado']);
	}


	
}