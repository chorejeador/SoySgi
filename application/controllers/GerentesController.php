<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GerentesController extends CI_Controller
{

	protected $helpers = ['form'];

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GestionModel');
		$this->load->model('ProcesoModel');
		$this->load->model('SubGestionModel');
		$this->load->model('AreasModel');
		$this->load->helper(array('form', 'url'));
		if ($this->session->userdata("logged") != 1) {
			redirect(base_url() . 'index.php', 'refresh');
		}
	}

	public function gerentesView()
	{
		$data["procesos"] = $this->ProcesoModel->getProceso(null, 'ACTIVO');
		$i = 0;
		foreach ($data["procesos"] as $key) {
			$data["procesos"][$i]["gestiones"] = array();
			$data["procesos"][$i]["gestiones"] = $this->GestionModel->getGestionByProceso($key["IdProceso"]);

			$e = 0;
			foreach ($data["procesos"][$i]["gestiones"] as $key2) {
				$data["procesos"][$i]["gestiones"][$e]['subgestiones'] = array();
				$data["procesos"][$i]["gestiones"][$e]['subgestiones'] = $this->SubGestionModel->getSubGestionByGestion($key2["IdGestion"]);
				$e++;
			}
			$i++;
		}
		//echo json_encode($data);return;
		$this->load->view('header/header');
		$this->load->view('gerentes/gerentesView', $data);
		$this->load->view('footer/footer');
		//$this->load->view('js/gestion/gestionJs');
	}

	public function getProcesos()
	{
		$tree = [];
		$procesoIndex = 1;
		$procesos = $this->ProcesoModel->getProceso(null, 'ACTIVO');
		$data = $this->ProcesoModel->getProceso(null, 'ACTIVO');
		$contadorGeneral = count($procesos) + 1;
		foreach ($procesos as $proceso) {
			$gestiones = $this->GestionModel->getGestionByProceso($proceso['IdProceso']);
			foreach ($gestiones as $gestion) {
				$subgestiones = $this->SubGestionModel->getSubGestionByGestion($gestion['IdGestion']);
				if (!empty($subgestiones)) {
					$tree[$procesoIndex][$contadorGeneral] = [];
					foreach ($subgestiones as $subgestion) {
						$contadorGeneral++;
						$tree[$procesoIndex][$contadorGeneral] = '';
					}
				} else {
					$tree[$procesoIndex][$contadorGeneral] = '';
				}
				$contadorGeneral++;
			}
			$procesoIndex++;
		}
		$i = 0;
		foreach ($data as $key) {
			$data[$i]["gestiones"] = array();
			$data[$i]["gestiones"] = $this->GestionModel->getGestionByProceso($key["IdProceso"]);

			$e = 0;
			foreach ($data[$i]["gestiones"] as $key2) {
				$data[$i]["gestiones"][$e]['subgestiones'] = array();
				$data[$i]["gestiones"][$e]['subgestiones'] = $this->SubGestionModel->getSubGestionByGestion($key2["IdGestion"]);
				$e++;
			}
			$i++;
		}
		echo json_encode(array("tree" => $tree, "data" => $data));
	}

	public function documentosView($id)
	{

		$data["datos"] = $this->GestionModel->getGestion($id);
		$data["archivos"] = $this->GestionModel->getDocumentos($id);
		//echo json_encode($this->session->userdata());	return;
		//echo json_encode($data["datos"]);	return;

		$this->load->view('header/header');
		$this->load->view('gerentes/documentosView', $data);
		$this->load->view('footer/footer');
		$this->load->view('js/gestion/gestionJs');
	}

	public function downloadFileGerente($id, $tipo)
	{
		if (!empty($id)) {
			$this->GestionModel->downloadFile($id, $tipo, "gerentes/");
		}
	}

	public function downloadFile($id, $tipo)
	{
		if (!empty($id)) {
			$this->GestionModel->downloadFile($id, $tipo);
		}
	}

}
