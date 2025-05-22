<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CarpetasController extends CI_Controller
{

	protected $helpers = ['form'];

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CarpetasModel');
		$this->load->model('AreasModel');
		$this->load->helper(array('form', 'url'));
		if ($this->session->userdata("logged") != 1) {
			redirect(base_url() . 'index.php', 'refresh');
		}
	}

	public function getCarpetas()
	{
		$result = $this->CarpetasModel->get();

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(['data' => $result]));
	}

	public function index()
	{
		if (!$this->PermisosModel->validarPermisoUsuario(3)) {
			redirect('unauthorized', 'refresh');
		}

		$headerData['css'] = [
			'<link rel="stylesheet" href="' . base_url() . 'assets/css/adimistrarCarpetas/adiministrarCarpetas.css">',
		];

		$this->load->view('header/header', $headerData);
		$this->load->view('menu/menu');
		$this->load->view('carpetas/administrarCarpetas');
		$this->load->view('footer/footer');
		$this->load->view('js/carpeta/carpetaJs');

	}

	public function guardarCarpeta()
	{
		try {
			$nombre = $this->input->post('nombre');

			$this->CarpetasModel->guardarCarpeta($nombre);

			echo json_encode(['success' => 'Carpeta guardada con éxito']);

		} catch (Exception $e) {
			echo json_encode(['error' => $e->getMessage()]);
		}
	}

	public function editarCarpeta()
	{
		try {
			$data = $this->input->post('data');
			$data['IdUsuarioEdita'] = $this->session->userdata('id');
			$data['FechaEdita'] = date('Y-m-d H:i:s');

			$result = $this->CarpetasModel->editarCarpeta($data);

			echo json_encode($result ?
				['success' => 'Carpeta editada con éxito'] :
				['error' => 'Error al editar la carpeta']);

		} catch (Exception $e) {
			$this->output->set_status_header(500);
			echo json_encode(['error' => $e->getMessage()]);
		}
	}
}
