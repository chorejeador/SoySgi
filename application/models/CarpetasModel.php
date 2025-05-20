<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CarpetasModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("America/Managua");
	}

	public function get()
	{
		try {
			$this->db->select('*');
			$this->db->from('Carpetas');

			return $this->db->get()->result_array();

		} catch (Exception $e) {
			throw new Exception($e->getMessage(), 1);
		}
	}

	public function guardarCarpeta($nombre)
	{

		try {
			$this->db->trans_start();

			$estado = 1;
			$idUsuarioCrea = $this->session->userdata("id");
			$fechaCrea = date('Y-m-d H:i:s');

			$data = array(
				'Nombre' => $nombre,
				'Estado' => $estado,
				'IdUsuarioCrea' => $idUsuarioCrea,
				'FechaCrea' => $fechaCrea
			);

			if (!$this->db->insert('Carpetas', $data)) {
				throw new Exception("Error al guardar la carpeta", 1);
			}

			$this->db->trans_complete();

		} catch (Exception $e) {
			throw new Exception($e->getMessage(), 1);
		}
	}

	public function editarCarpeta($data)
	{
		try {

			$this->db->trans_start();
			$id = $data['id'];
			unset($data['id']);

			$result = $this->db->where('Id', $id)->update('Carpetas', $data);

//			echo $this->db->last_query();
//			 throw new Exception("Error al editar la carpeta", 1);
			if (!$result) throw new Exception("Error al editar la carpeta", 1);

			$this->db->trans_complete();

			return $result;

		} catch (Exception $e) {
			throw new Exception($e->getMessage(), 1);
		}
	}
}

/* End of file .php */



