<?php
defined('BASEPATH') or exit('No direct script access allowed');
define('SITE_ROOT', realpath(dirname(__FILE__) . '/../../'));

class PublicacionController extends CI_Controller
{
	protected $helpers = ['form'];

	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
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
		$filtro = $this->input->get_post('filtro');
		$result = $this->PublicacionModel->getPublicaciones($filtro);
		echo json_encode($result);
	}

	public function guardarPublicacion()
	{
		$image_names = [];
		if (!empty($_FILES['file']['name'][0])) {
			$image_names = $this->guardarImagen($_FILES['file']);
		}
		$data = array(
			"Titulo" => $this->input->get_post('txtTitulo'),
			"Subtitulo" => $this->input->get_post("txtSubtitulo"),
			"Descripcion" => $this->input->get_post("descripcion"),
			"Estado" => true,
			"FechaCrea" => date('Y-m-d H:i:s'),
			"IdUsuarioCrea" => $this->session->userdata('id'),
			"FechaEdita" => date('Y-m-d H:i:s'),
			"IdUsuarioEdita" => $this->session->userdata('id')
		);
		$result = $this->PublicacionModel->guardarPublicacion($data, $image_names);
		echo json_encode($result);
		return;
	}

	private function guardarImagen($files)
	{
		$targetPath = SITE_ROOT . '/uploads/Publicaciones/';
		if (!file_exists($targetPath)) {
			mkdir($targetPath, 0777, true);
		}
		$data = array();
		foreach ($files['name'] as $key => $name) {
			$imageName = $name;
			$extension = pathinfo($imageName, PATHINFO_EXTENSION);
			$image = uniqid() . "." . $extension;
			$targetFile = $targetPath . $image;
			move_uploaded_file($files['tmp_name'][$key], $targetFile);
			array_push($data, $image);
		}
		return $data;
	}

	public function actualizarPublicacion($idPublicacion)
	{
		$data["publicacion"] = $this->PublicacionModel->obtener_publicacion($idPublicacion);
		$data["imagenes"] = $this->PublicacionModel->obtener_imagenes_publicacion($idPublicacion);
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('publicacion/nuevaPublicacion', $data);
		$this->load->view('footer/footer');
		$this->load->view('js/publicaciones/editarPublicacionJs');
	}

	public function actualizarInformacionPublicacion()
	{
		$image_names = [];
		if (!empty($_FILES['file']['name'][0])) {
			$image_names = $this->guardarImagen($_FILES['file']);
		}
		$id = $this->input->get_post('id');
		$data = array(
			"Titulo" => $this->input->get_post('txtTitulo'),
			"Subtitulo" => $this->input->get_post("txtSubtitulo"),
			"Descripcion" => $this->input->get_post("descripcion"),
			"FechaEdita" => date('Y-m-d H:i:s'),
			"IdUsuarioEdita" => $this->session->userdata('id')
		);
		$result = $this->PublicacionModel->actualizar_publicacion($id, $data, $image_names);
		echo json_encode($result);
	}

	public function eliminarImagen()
	{
		$name = $this->input->get_post('name');
		if (is_writable(SITE_ROOT . '/uploads/Publicaciones/' . $name)) {
			unlink(SITE_ROOT . '/uploads/Publicaciones/' . $name);
			$response = $this->PublicacionModel->eliminar_imagen($name);
		} else {
			$response = array("status" => false, "text" => "No se puede eliminar el archivo", "type" => "error");
		}
		echo json_encode($response);
	}

	public function cambiarEstadoPublicacion()
	{
		$id = $this->input->get_post('id');
		$estado = $this->input->get_post('estado');
		$result = $this->PublicacionModel->cambiar_estado($id, $estado);
		echo json_encode($result);
	}
}
