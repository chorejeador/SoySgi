<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PublicacionModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("America/Managua");
		if ($this->session->userdata("logged") != 1) {
			redirect(base_url() . 'index.php', 'refresh');
		}
//		$this->load->model("PermisosModel");
	}

	public function guardarPublicacion($titulo, $descripcion, $paths)
	{
		$mensaje = array();

		try {
			$this->db->trans_start();

			if ($this->insertarPublicacion($titulo, $descripcion) == -1) throw new Exception("Error al insertar la publicación: " . $this->db->error()['message']);

			if ($this->insertarImagePaths($paths, $this->db->insert_id()) == -1) throw new Exception("Error al guardar el path de la imagen: " . $this->db->error()['message']);

			$this->db->trans_complete();

			$mensaje[0]["retorno"] = 1;
			$mensaje[0]["tipo"] = "success";
			$mensaje[0]["mensaje"] = "Publicación guardada correctamente";
			echo json_encode($mensaje);
		} catch (Exception $e) {
			$this->db->trans_rollback();

			$mensaje[0]["retorno"] = -1;
			$mensaje[0]["tipo"] = "error";
			$mensaje[0]["mensaje"] = "Error: " . $e->getMessage();


			echo json_encode($mensaje);
		}
	}

	private function insertarImagePaths($path, $insert_id)
	{
		$mensaje = array();
		try {
			$data = array();
			foreach ($path as $key => $value) {
				$data[] = array(
					"IdPublicacion" => $insert_id,
					"Path" => $value
				);
			}

			if (!$this->db->insert_batch('ImagenesPublicaciones', $data)) throw new Exception("Error al guardar el path");

			return 1;
		} catch (Exception $e) {
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

	private function insertarPublicacion($titulo, $descripcion)
	{
		try {
			$data = array(
				"Titulo" => $titulo,
				"Descripcion" => $descripcion,
				"FechaCrea" => date("Y-m-d H:i:s"),
				"Estado" => "ACTIVO",
				"IdUsuarioCrea" => $this->session->userdata("idUsuario")
			);
			$this->db->insert('Publicaciones', $data);
			return 0;
		} catch (Exception $e) {
//			$this->enviarMensaje(-1, "error", "Error: " . $e->getMessage() . " " . $this->db->error()['message']);
			return -1;
		}
	}

	public function getPublicaciones($filtro)
	{
		$publicaciones = null;
		try {
			$publicaciones = $this->obtenerPublicaciones($filtro);


			echo json_encode($publicaciones);
		} catch (Exception $e) {
			$this->enviarMensaje(-1, "error", "Error: " . $e->getMessage());
		}
		return $publicaciones;
	}

	private function obtenerPublicaciones($filtro)
	{

		$query = $filtro != '' ?
			$this->db->like('Titulo', $filtro, 'both')->get('Publicaciones')
			: $this->db->get('Publicaciones');

		return $query->result();

	}
}
