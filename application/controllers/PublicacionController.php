<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PublicacionController extends CI_Controller
{
	protected $helpers = ['form'];

	public function __construct()
	{
		parent::__construct();

		// Cargar la biblioteca de subida de CodeIgniter
		$this->load->library('upload');
		$this->load->model('PublicacionModel');
		$this->load->helper(array('form', 'url', 'date'));


		if ($this->session->userdata("logged") != 1) {
			redirect(base_url() . 'index.php', 'refresh');
		}
	}

	public function index()
	{
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('publicacion/publicaciones');
		$this->load->view('footer/footer');
		$this->load->view('js/publicaciones/publicacionesJs');

	}

	public function nuevaPublicacion()
	{
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('publicacion/nuevaPublicacion');
		$this->load->view('footer/footer');
		$this->load->view('js/publicaciones/nuevaPublicacionJs');

	}

	public function getPublicaciones()
	{
//		$this->load->model('PublicacionModel');
//		$publicaciones = $this->PublicacionModel->getPublicaciones();
//		echo json_encode($publicaciones);

	}

	public function guardarPublicacion()
	{
		try {
			if (!$this->input->is_ajax_request()) throw new Exception("Error en la petición AJAX");

			$titulo = $this->input->get_post('txtTitulo');
			$txtDescripcion = $this->input->get_post('txtDescripcion');

			$path = $this->guardarImagenPublicaciones();

			if ($path === null || $path === false || (is_array($path) && empty($path))) {
				throw new Exception("Error al guardar la imagen");
			}

			// Llamar al método de tu modelo para guardar la publicación
			$this->PublicacionModel->guardarPublicacion($titulo, $txtDescripcion, $path);

		} catch (Exception $e) {
			$mensaje[0]["retorno"] = -1;
			$mensaje[0]["tipo"] = "error";
			$mensaje[0]["mensaje"] = "Error: " . $e->getMessage();
			echo json_encode($mensaje);
		}
	}

	private function guardarImagenPublicacion()
	{
		$path = 'uploads/publicaciones/';

		// Verificar si el directorio existe, si no, intentar crearlo
		if (!is_dir($path)) {
			if (!mkdir($path, 0777, true)) {
				// Error al crear el directorio
				echo json_encode(array('status' => 'error', 'message' => 'No se pudo crear el directorio para guardar la imagen'));
				return false;
			}
		}

		$config = [
			'upload_path' => $path,
			'allowed_types' => "jpg|png|jpeg",
			'file_name' => 'PUBLICACION_' . floor(microtime(true) * 1000)
		];

		// Cargar la librería de subida de archivos con la configuración
		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		// Intentar subir el archivo
		if ($this->upload->do_upload('imagen')) {
			$uploadData = $this->upload->data();
			return $path . $uploadData['file_name'];  // Devolver el nombre del archivo subido
		} else {
			// Manejar el error de la subida
			echo json_encode(array('status' => 'error', 'message' => $this->upload->display_errors()));
			return false;
		}
	}

	private function guardarImagenPublicaciones()
	{
		try {
			$path = 'uploads/publicaciones/';
			$paths = array();

			// Verificar si el directorio existe, si no, intentar crearlo
			if (!is_dir($path)) {
				if (!mkdir($path, 0777, true)) {
					// Error al crear el directorio
					echo json_encode(array('status' => 'error', 'message' => 'No se pudo crear el directorio para guardar la imagen'));
					return false;
				}
			}

			$count = count($_FILES['imagen']['name']);

			for ($i = 0; $i < $count; $i++) {
				// Crear un array temporal para cada archivo
				$file = array(
					'name' => $_FILES['imagen']['name'][$i],
					'type' => $_FILES['imagen']['type'][$i],
					'tmp_name' => $_FILES['imagen']['tmp_name'][$i],
					'error' => $_FILES['imagen']['error'][$i],
					'size' => $_FILES['imagen']['size'][$i]
				);

				// Configurar los parámetros de carga
				$config = [
					'upload_path' => $path,
					'allowed_types' => "jpg|png|jpeg",
					'file_name' => "PUBLICACION_" . floor(microtime(true) * 1000) . "_" . $i,
				];

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				$_FILES['temp_imagen'] = $file;

				if (!$this->upload->do_upload('temp_imagen')) {
					throw new Exception($this->upload->display_errors());
				}

				$uploadData = $this->upload->data();
				$paths[] = $path . $uploadData['file_name'];
			}

			return $paths;
		} catch (Exception $e) {
			$this->enviarMensaje("-1", "Error", $e->getMessage());
			return -1;
		}
	}

	private function enviarMensaje($retorno, $tipo, $mensaje)
	{
		$respuesta = array(
			"etorno" => $retorno,
			"tipo" => $tipo,
			"mensaje" => $mensaje
		);
		echo json_encode(array($respuesta));
	}

}
