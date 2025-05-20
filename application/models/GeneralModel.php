<?php

defined('BASEPATH') or exit('No direct script access allowed');

class GeneralModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("America/Managua");
	}

	public function generalSearch()
	{
		$filtro = $this->input->post('filtro');

		$and = '';
		if ($filtro != '') {
			$and .= "AND (t0.Nombre LIKE '%"
				. $filtro . "%' OR t0.Descripcion LIKE '%" . $filtro . "%'
				OR t1.Nombre LIKE '%" . $filtro . "%')";
		}

		$query = $this->db->query("
		SELECT t0.*,t1.Nombre as NombreCarpeta
		FROM TblDocumentosGenerales t0
        inner join Carpetas t1 on t0.IdCarpeta = t1.id
		WHERE 1=1 $and
		ORDER BY t1.Nombre, t0.IdDocumento
	");

		$data = [];
		foreach ($query->result_array() as $key) {
			$estado = ($key["Estado"] == "INACTIVO") ? 0 : 1;

			$data[] = [
				"IdDocumento" => $key["IdDocumento"],
				"IdCarpeta" => $key["IdCarpeta"],
				"NombreCarpeta" => $key["NombreCarpeta"],
				"Nombre" => $key["Nombre"],
				"Descripcion" => $key["Descripcion"],
				"Url" => $key["Url"],
				"Tipo" => $key["Tipo"],
				"FechaCrea" => $key["FechaCrea"],
				"FechaEdita" => $key["FechaEdita"],
				"Ver" => '<a href="' . base_url('/uploads/docs/') . $key["Url"] . $key["Tipo"] . '" target="_blank" class="btn btn-success btn-sm  btn-fixed-width d-flex align-items-center justify-content-center" style="width: 120px; height: 40px; text-align: center; gap: 10px;"><i class="fa fa-eye"></i><span>Ver</span></a>', "Opcion" => (
				$estado == 0
					? '<a href="#" class="btn btn-danger btn-sm btn-accion btn-fixed-width d-flex align-items-center justify-content-center" style="width: 120px; height: 40px; text-align: center; gap: 10px;" data-id="' . $key["IdDocumento"] . '" data-estado="0"><span>Inactivo</span></a>'
					: '<a href="#" class="btn btn-success btn-sm btn-accion btn-fixed-width d-flex align-items-center justify-content-center" style="width: 120px; height: 40px; text-align: center; gap: 10px;" data-id="' . $key["IdDocumento"] . '" data-estado="1"><span>Activo</span></a>'
				)
			];
		}

		echo json_encode(["data" => $data]);
	}


	public function guardarDocumento($data)
	{
		$this->db->trans_start();
		try {
			$result = $this->db->insert('TblDocumentosGenerales', $data);

			if (!$result) {
				throw new Exception("Error al guardar el documento", 1);
			}

			$this->db->trans_complete();

		} catch (Exception $ex) {
			$this->db->trans_rollback();
			throw new Exception($ex->getMessage());
		}
	}


	function getDocumentos()
	{
		$results = $this->db->query("
		SELECT distinct Nombre ,Descripcion, id
		
		FROM Carpetas
		where Estado = 1
		
		order by id desc
			");

		return $results->result_array();
	}

	function getDocumentosWith($select, $join, $where)
	{
		$results = $this->db->query("
		SELECT $select
		FROM TblDocumentosGenerales
		$join
		WHERE $where
			");

		return $results->result_array();
	}

	function bajaDocumentoGeneral($id, $estado)
	{

		$mensaje = array();
		$this->db->trans_start();

		try {
			$estadoDes = 'ACTIVO';
			if ($estado == 1) {
				$estadoDes = 'INACTIVO';
			}

			$this->db->where("IdDocumento", $id);
			$result = $this->db->update('TblDocumentosGenerales', array('Estado' => $estadoDes));

			if ($result) {
				$this->db->trans_commit();
				$mensaje[0]["retorno"] = 1;
				$mensaje[0]["tipo"] = "success";
				$mensaje[0]["mensaje"] = "Documento cambiado a " . $estadoDes . " correctamente";
				echo json_encode($mensaje);
				return;
			}
		} catch (Exception $ex) {
			$this->db->trans_rollback();
			$mensaje[0]["retorno"] = -1;
			$mensaje[0]["tipo"] = "error";
			$mensaje[0]["mensaje"] = "Error: " . $ex;
			echo json_encode($mensaje);
			return;
		}
	}

	public function getDocumentoById($id)
	{
		$this->db->select('*');
		$this->db->from('TblDocumentosGenerales');
		$this->db->where('IdDocumento', $id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}

	public function actualizarDocumento($id, $data)
	{
		try {
			$this->db->trans_start();

			$this->db->where("IdDocumento", $id);
			$result = $this->db->update('TblDocumentosGenerales', $data);

			if (!$result) {
				throw new Exception("Error al actualizar el documento", 1);
			}

			$this->db->trans_complete();
		} catch (Exception $ex) {
			$this->db->trans_rollback();
			throw new Exception($ex->getMessage());
		}
	}
}

/* End of file .php */



