<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property $GeneralModel
 */
class GeneralController extends CI_Controller
{

	protected $helpers = ['form'];

	public function __construct()
	{
		parent::__construct();
//		$this->load->library('upload');
		$this->load->helper('string');
		$this->load->model('GeneralModel');
		$this->load->model('AreasModel');
		$this->load->helper(array('form', 'url'));
		if ($this->session->userdata("logged") != 1) {
			redirect(base_url() . 'index.php', 'refresh');
		}
	}

	function verDocGeneral()
	{
		$data["carpetas"] = $this->GeneralModel->getDocumentos();

		$this->load->view('general/verDocGeneral', $data);
	}


	function general()
	{
		$headerData['css'] = [
			'<link rel="stylesheet" href="' . base_url() . 'assets/fileinput/css/fileinput.min.css">',
			'<link rel="stylesheet" href="' . base_url() . 'assets/bootstrap/css/bootstrap-icons.min.css">'
		];

		$footerData['scripts'] = [
			'<script src="' . base_url() . 'assets/fileinput/js/buffer.min.js"></script>',
			'<script src="' . base_url() . 'assets/fileinput/js/fileinput.min.js"></script>',
			'<script src="' . base_url() . 'assets/fileinput/js/filetype.min.js"></script>',
			'<script src="' . base_url() . 'assets/fileinput/js/LANG.js"></script>',
			'<script src="' . base_url() . 'assets/fileinput/js/piexif.min.js"></script>',
			'<script src="' . base_url() . 'assets/fileinput/js/sortable.min.js"></script>',
		];

		$this->load->view('header/header', $headerData);
		$this->load->view('menu/menu');
		$this->load->view('general/general');
		$this->load->view('footer/footer', $footerData);
		$this->load->view('js/general/general');
	}

	function generalSearch()
	{
		$this->GeneralModel->generalSearch('ACTIVO', $this->input->post("filtro"));
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
		try {

			$nombre = $this->input->post('nombre');
			$descripcion = $this->input->post('descripcion');
			$idCarpeta = $this->input->post('idCarpeta');

			//upload configuration
			$config['upload_path'] = './uploads/docs/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 20480; // 20 megas
			$config['detect_mime'] = true;
			$config['file_ext_tolower'] = true;
			$config['file_name'] = floor(microtime(true) * 1000);//nombre random

			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0755, true); // true para crear carpetas recursivamente
			}

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('archivoPdf')) throw new Exception($this->upload->display_errors());

			$dataArchivo = $this->upload->data();
			$rutaArchivo = base_url('uploads/docs/' . $dataArchivo['file_name']);


			$data = array(
				'Nombre' => $nombre,
				'Descripcion' => $descripcion,
				'IdCarpeta' => $idCarpeta,
				'Estado' => 'ACTIVO',
				'Tipo' => $dataArchivo['file_ext'],
				'Directorio' => 'uploads/docs/',
				// Solo el nombre sin la extension
				'Url' => pathinfo($dataArchivo['file_name'], PATHINFO_FILENAME),
				'IdUsuarioCrea' => $this->session->userdata("id"),
				'FechaCrea' => gmdate("Y-m-d H:i:s"),
			);

			$this->GeneralModel->guardarDocumento($data);

			echo json_encode(['success' => 'Documento guardado con éxito']);

		} catch (Exception $e) {
			$this->output->set_status_header(500);
			echo json_encode(['error' => $e->getMessage()]);
		}

	}

	function bajaDocumentoGeneral()
	{
		$this->GeneralModel->bajaDocumentoGeneral($_POST['id'], $_POST['estado']);
	}

	public function verPdf($idCarpeta)
	{
		$select = "
		   Carpetas.Nombre AS NombreCarpeta,
		   TblDocumentosGenerales.Url,
		   TblDocumentosGenerales.Tipo,
		   TblDocumentosGenerales.IdDocumento,
		   TblDocumentosGenerales.Nombre AS NombreDocumento
		";
		$join = "
			INNER JOIN Carpetas ON Carpetas.id = TblDocumentosGenerales.IdCarpeta
		";
		$where = "
			TblDocumentosGenerales.Estado = 'ACTIVO'
			and  Carpetas.id = " . $idCarpeta ."
		";

		$documentos = $this->GeneralModel->getDocumentosWith($select, $join, $where);
		$data['documentos'] = $documentos;

		$headerData['css'] = [
			'<link rel="stylesheet" href="' . base_url() . 'assets/css/pdf/pdfEstilos.css">'
		];

		$footerData['scripts'] = [
			'<script>
				window.addEventListener("load", function () {
					const iframe = document.getElementById("pdfIframe");
					iframe.style.height = iframe.contentWindow.document.body.scrollHeight + "px";
				});
			</script>'
		];

		$this->load->view('header/header', $headerData);
		$this->load->view('pdf/visorPdf', $data);
		$this->load->view('footer/footer', $footerData);
		$this->load->view('js/general/pdfjs');
	}

	public function obtenerPdf($archivo)
	{

		$path = FCPATH . 'uploads/docs/' . $archivo;

		if (file_exists($path)) {
			// Sirve el PDF como solo lectura, sin forzar descarga
			header('Content-Type: application/pdf');
			header('Content-Disposition: inline; filename="' . basename($archivo) . '"');
			header('Content-Length: ' . filesize($path));
			readfile($path);
		} else {
			show_404();
		}
	}

	public function getDocumentoById()
	{
		$id = $this->input->get('id');
		$result = $this->GeneralModel->getDocumentoById($id);

		if ($result) {
			echo json_encode($result);
		} else {
			echo json_encode(['error' => 'Documento no encontrado']);
		}
	}

	public function actualizarDocGeneral()
	{
		try {
			$data = array();
			$id = $this->input->post('idDocumento');
			$nombre = $this->input->post('nombre');
			$descripcion = $this->input->post('descripcion');
			$idCarpeta = $this->input->post('idCarpeta');

			// Verificar si el archivo está vacío
			if (empty($_FILES['archivoPdf']['name'])) {
				$data = array(
					'Nombre' => $nombre,
					'Descripcion' => $descripcion,
					'IdCarpeta' => $idCarpeta,
					'Directorio' => 'uploads/docs/',
					'IdUsuarioEdita' => $this->session->userdata("id"),
					'FechaEdita' => gmdate("Y-m-d H:i:s"),
				);
				$this->actualizarSinDocumento($id, $data);
				return;
			}

			$config = $this->initDocGeneralUpload();

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('archivoPdf')) throw new Exception($this->upload->display_errors());

			$dataArchivo = $this->upload->data();

			$data = array(
				'Nombre' => $nombre,
				'Descripcion' => $descripcion,
				'IdCarpeta' => $idCarpeta,
				'Directorio' => 'uploads/docs/',
				'IdUsuarioEdita' => $this->session->userdata("id"),
				'FechaEdita' => gmdate("Y-m-d H:i:s"),
				'Tipo' => $dataArchivo['file_ext'],
				// Solo el nombre sin la extension
				'Url' => pathinfo($dataArchivo['file_name'], PATHINFO_FILENAME),
			);

			$this->GeneralModel->actualizarDocumento($id, $data);

			echo json_encode(['success' => 'Documento actualizado con éxito']);

		} catch (Exception $e) {
			$this->output->set_status_header(500);
			echo json_encode(['error' => $e->getMessage()]);
		}

	}

	private function actualizarSinDocumento($id, array $data)
	{
		try {

			$this->GeneralModel->actualizarDocumento($id, $data);

			echo json_encode(['success' => 'Documento actualizado con éxito']);
		} catch (Exception $e) {
			$this->output->set_status_header(500);
			echo json_encode(['error' => $e->getMessage()]);
		}
	}

	private function initDocGeneralUpload()
	{
		//upload configuration
		$config['upload_path'] = './uploads/docs/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 20480; // 20 megas
		$config['detect_mime'] = true;
		$config['file_ext_tolower'] = true;
		$config['file_name'] = floor(microtime(true) * 1000);//nombre random

		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0755, true); // true para crear carpetas recursivamente
		}

		return $config;
	}
}
