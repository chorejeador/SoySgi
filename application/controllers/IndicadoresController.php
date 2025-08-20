<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndicadoresController extends CI_Controller
{

	protected $helpers = ['form'];

	public function __construct()
	{
		parent::__construct();
		$this->load->model('IndicadoresModel');
		$this->load->helper(array('form', 'url'));
		if ($this->session->userdata("logged") != 1) {
			redirect(base_url() . 'index.php', 'refresh');
		}

	}

	function misindicadores()
	{
		if (!$this->PermisosModel->validarPermisoUsuario(4) && !$this->PermisosModel->validarPermisoUsuario(5)) {
			redirect('unauthorized', 'refresh');
		}
		$this->load->view('header/header');
		//$this->load->view('menu/menu');
		$this->load->view('indicadores/index');
		$this->load->view('footer/footer');
		$this->load->view('js/indicadores/indicadoresJs');
	}

	function agregarIndicadorGerente()
	{
		$this->load->view('header/header');
		//$this->load->view('menu/menu');
		$this->load->view('indicadores/agregarIndicadorGerente');
		$this->load->view('footer/footer');
		$this->load->view('js/indicadores/agregarIndicadorGerenteJs');
	}


	function indicadoresSearch()
	{
		return $this->IndicadoresModel->search();
	}

	function subirArchivoMisIndicadores()
	{
		$mensaje = array();

		//upload configuration
		$config['upload_path'] = './uploads/gerentes';
		$config['allowed_types'] = 'xlsx|xls';
		$config['max_size'] = 102400;//100 megas
		$config['detect_mime'] = true;//proteccion para injeccion
		$config['file_ext_tolower'] = true;
		$config['file_name'] = floor(microtime(true) * 1000);//nombre random

		$filename = $_FILES["archivo"]["name"];
		$file_ext = pathinfo($filename, PATHINFO_EXTENSION);

		$doc = $this->load->library('upload', $config);

		if (!$this->upload->do_upload('archivo')) {
			$error = array('error' => $this->upload->display_errors());

			$this->session->set_flashdata('error', $error['error']);
			$mensaje[0]["retorno"] = -1;
			$mensaje[0]["tipo"] = "error";
			$mensaje[0]["mensaje"] = "error al subir archivo: " . $error['error'];
			echo json_encode($mensaje);
			return;
		} else {
			$data = array('upload_data' => $this->upload->data());
			$result = $this->IndicadoresModel->guardarDocumento(
				$file_ext
				, $config['file_name']
				, $this->input->post('txtId')
				, $this->input->post('txtNombre')
				, $this->input->post('txtDescripcion')
				, $this->input->post('mes')
				, $this->input->post('anio')
				, null
				, null
			);
			//echo json_encode($result);return;
			if ($result[0]["retorno"] == -1) {
				unlink($data["upload_path"] . "/" . $config['file_name']);
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "error al subir archivo:" . print_r($this->upload->display_errors());
				echo json_encode($mensaje);
				return;
			}
			//echo json_encode($result);
		}
	}

	public function verificarSiYaExisteIndicador()
	{
		try {
			$anio = $this->input->post('anio');
			$mes = $this->input->post('mes');

			$result = $this->IndicadoresModel->verificarSiYaExisteIndicador($anio, $mes);

			if ($result) {
				$response = array(
					'status' => 'success',
					'message' => 'El indicador ya existe para el mes y año seleccionados. Quiere actualizarlo de todos modos?',
				);
			} else {
				$response = array(
					'status' => 'not_found',
					'message' => '',
				);
			}

			echo json_encode($response);
		} catch (Exception $e) {
			$response = array(
				'status' => 'error',
				'message' => 'Error al verificar el indicador: ' . $e->getMessage()
			);
			echo json_encode($response);
		}
	}

}
