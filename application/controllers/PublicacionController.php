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
		$imagen = '';
		if (!empty($_FILES['imagen']['name'][0])) {
			$targetPath = SITE_ROOT . '/uploads/Publicaciones/';
			if (!file_exists($targetPath)) {
				mkdir($targetPath, 0777, true);
			}
			$imageName = $_FILES["imagen"]["name"][0];
			$extension = pathinfo($imageName, PATHINFO_EXTENSION);
			$imagen = date("YmdHis") . "." . $extension;
			$targetFile = $targetPath . $imagen;
			move_uploaded_file($_FILES['imagen']['tmp_name'][0], $targetFile);
		}
		$data = array(
			"Titulo" => $this->input->get_post('txtTitulo'),
			"Subtitulo" => $this->input->get_post("txtSubtitulo"),
			"Descripcion" => $this->input->get_post("descripcion"),
			"Estado" => true,
			"ImagePath" => $imagen,
			"FechaCrea" => date('Y-m-d H:i:s'),
			"IdUsuarioCrea" => $this->session->userdata('id'),
			"FechaEdita" => date('Y-m-d H:i:s'),
			"IdUsuarioEdita" => $this->session->userdata('id')
		);
		$result = $this->PublicacionModel->guardarPublicacion($data);
		echo json_encode($result);
		return;
	}

	public function actualizarPublicacion($idPublicacion)
	{
		$data["publicacion"] = $this->PublicacionModel->obtener_publicacion($idPublicacion);
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('publicacion/nuevaPublicacion', $data);
		$this->load->view('footer/footer');
		$this->load->view('js/publicaciones/editarPublicacionJs');
	}

	public function actualizarInformacionPublicacion()
	{
		$imagen = '';
		if (!empty($_FILES['imagen']['name'][0])) {
			$targetPath = SITE_ROOT . '/uploads/Publicaciones/';
			if (!file_exists($targetPath)) {
				mkdir($targetPath, 0777, true);
			}
			$imageName = $_FILES["imagen"]["name"][0];
			$extension = pathinfo($imageName, PATHINFO_EXTENSION);
			$imagen = date("YmdHis") . "." . $extension;
			$targetFile = $targetPath . $imagen;
			move_uploaded_file($_FILES['imagen']['tmp_name'][0], $targetFile);
		}
		$id = $this->input->get_post('id');
		$data = array(
			"Titulo" => $this->input->get_post('txtTitulo'),
			"Subtitulo" => $this->input->get_post("txtSubtitulo"),
			"Descripcion" => $this->input->get_post("descripcion"),
			"FechaEdita" => date('Y-m-d H:i:s'),
			"IdUsuarioEdita" => $this->session->userdata('id')
		);
		if ($imagen != '') {
			$data["ImagePath"] = $imagen;
		}
		$result = $this->PublicacionModel->actualizar_publicacion($id, $data);
		echo json_encode($result);
	}

	public function cambiarEstadoPublicacion()
	{
		$id = $this->input->get_post('id');
		$estado = $this->input->get_post('estado');
		$result = $this->PublicacionModel->cambiar_estado($id, $estado);
		echo json_encode($result);
	}
}
