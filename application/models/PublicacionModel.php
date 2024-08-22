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
	}

	public function guardarPublicacion($data, $images_name)
	{
		try {
			$this->db->trans_start();
			$this->db->insert('Publicaciones', $data);
			$id = $this->db->insert_id();
			foreach ($images_name as $image) {
				$data_imagen = array('Path' => $image, 'IdPublicacion' => $id);
				$this->db->insert('ImagenesPublicaciones', $data_imagen);
			}

			$this->db->trans_commit();
			return array(
				"status" => true,
				"text" => "La publicación ha sido guardada correctamente",
				"type" => "success"
			);
		} catch (Exception $e) {
			return array(
				"status" => false,
				"text" => "Ha ocurrido un error guardando la publicación. " . $e->getMessage(),
				"type" => "danger"
			);
		}
	}

	public function getPublicaciones($filtro)
	{
		$publicaciones = $this->obtenerPublicaciones($filtro);
		return $publicaciones;
	}

	private function obtenerPublicaciones($filtro)
	{
		if ($filtro) {
			$this->db->like("Titulo", $filtro);
			$result = $this->db->get('Publicaciones');
			if ($result->num_rows() > 0) {
				return $result->result_array();
			}
		} else {
			$result = $this->db->get('Publicaciones');
			if ($result->num_rows() > 0) {
				return $result->result_array();
			}
		}
		return array();
	}

	public function obtener_publicacion($id)
	{
		$this->db->where("Id", $id);
		$result = $this->db->get('Publicaciones');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}

	public function obtener_imagenes_publicacion($id)
	{
		$this->db->where("IdPublicacion", $id);
		$result = $this->db->get('ImagenesPublicaciones');
		if ($result->num_rows() > 0) {
			return $result->result_array();
		} else {
			return array();
		}
	}

	public function eliminar_imagen($name)
	{
		$this->db->trans_start();
		$this->db->where('Path', $name);
		$this->db->delete('ImagenesPublicaciones');
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return array("status" => true, "text" => "La imagen ha sido eliminada correctamente", "type" => "success");
		} else {
			$this->db->trans_rollback();
			return array("status" => false, "text" => "Ha ocurrido un error eliminando la imagen", "type" => "error");
		}
	}

	public function actualizar_publicacion($id, $data, $image_names)
	{
		$this->db->trans_start();
		$this->db->where("Id", $id);
		$this->db->update("Publicaciones", $data);
		foreach ($image_names as $image) {
			$data_imagen = array('Path' => $image, 'IdPublicacion' => $id);
			$this->db->insert('ImagenesPublicaciones', $data_imagen);
		}
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return array('status' => true, 'type' => "success", "text" => "Se ha actualizado la publicación correctamente");
		} else {
			$this->db->trans_rollback();
			return array('status' => false, 'type' => "error", 'text' => 'La publicación no ha sido actualizada.');
		}
	}

	public function cambiar_estado($id, $estado)
	{
		$this->db->trans_start();
		$this->db->where("Id", $id);
		$this->db->set('Estado', $estado);
		$this->db->update("Publicaciones");
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return array('status' => true, 'type' => "success", 'mensaje' => "Se ha cambiado el estado correctamente");
		} else {
			$this->db->trans_rollback();
			return array('status' => false, 'type' => 'error', 'mensaje' => 'Ha ocurrido un error al cambiar el estado.');
		}
	}

	public function publicaciones_landing()
	{
		$this->db->where('Estado', 1);
		$this->db->order_by('FechaCrea', 'desc');
		$result = $this->db->get('Publicaciones');
		if ($result->num_rows() > 0) {
			return $result->result_array();
		} else {
			return array();
		}
	}
}
