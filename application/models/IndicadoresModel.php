<?php

defined('BASEPATH') or exit('No direct script access allowed');

class IndicadoresModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();

		date_default_timezone_set("America/Managua");
		if ($this->session->userdata("logged") != 1) {
			redirect(base_url() . 'index.php', 'refresh');
		}
		$this->load->model("PermisosModel");
	}

	public function search()
	{
		$request = $this->input->post();
		$draw = isset($request['draw']) ? intval($request['draw']) : 1;
		$start = isset($request['start']) ? intval($request['start']) : 0;
		$length = isset($request['length']) ? intval($request['length']) : 10;
		$filtro = $this->input->post('filtro', true);
		$areas = $this->input->post('areas') ? $this->input->post('areas') : null;

		$nombreArea = $this->session->userdata('Area');
		$idArea = $this->session->userdata('IdArea');

		$implodedAreas = null;
		if ($areas && is_array($areas) && count($areas) > 0) {
			$implodedAreas = implode(',', array_map('intval', $areas));
		}

		$columnsMap = [
			0 => 'dg.Anio',
			1 => 'dg.Mes',
			2 => 'dg.Nombre',
			3 => 'dg.Descripcion',
			4 => 'dg.FechaCrea',
			5 => 'dg.FechaEdita',
			6 => 'dg.Id',
			7 => 'ca.Descripcion'
		];

		$whereParts = ["1=1"];
		$binds = [];

		if (!$this->PermisosModel->validarPermisoUsuario(10)) {
			$whereParts[] = "dg.IdArea = ?";
			$binds[] = intval($idArea);
		}

		if ($implodedAreas) {
			$whereParts[] = "dg.IdArea IN ($implodedAreas)";
		}

		if (!empty($filtro)) {
			$f = '%' . $this->db->escape_like_str($filtro) . '%';
			$whereParts[] = "(
            dg.Nombre LIKE ? OR
            dg.Descripcion LIKE ? OR
            ca.Descripcion LIKE ? OR
            CAST(dg.Anio AS NVARCHAR(10)) LIKE ? OR
            CAST(dg.Mes AS NVARCHAR(10)) LIKE ?
        )";
			array_push($binds, $f, $f, $f, $f, $f);
		}

		$whereSql = "WHERE " . implode(" AND ", $whereParts);

		$countSql = "
        SELECT COUNT(*) as total
        FROM TblDocumentosGerentes dg
        INNER JOIN CatAreas ca ON ca.IdArea = dg.IdArea
        WHERE 1=1
    ";
		$countBinds = [];

		if (!$this->PermisosModel->validarPermisoUsuario(10)) {
			$countSql .= " AND dg.IdArea = ?";
			$countBinds[] = intval($idArea);
		}
		if ($implodedAreas) {
			$countSql .= " AND dg.IdArea IN ($implodedAreas)";
		}
		$totalRecords = intval($this->db->query($countSql, $countBinds)->row()->total);

		$filteredSql = "
        SELECT COUNT(*) as total
        FROM TblDocumentosGerentes dg
        INNER JOIN CatAreas ca ON ca.IdArea = dg.IdArea
        $whereSql
    ";
		$totalFiltered = intval($this->db->query($filteredSql, $binds)->row()->total);

		// Orden
		$orderSql = "ca.Descripcion ASC, dg.Anio DESC, dg.Mes ASC";
		if (!empty($request['order']) && is_array($request['order'])) {
			$orders = [];
			foreach ($request['order'] as $ord) {
				$colIdx = intval($ord['column']);
				$dir = (strtolower($ord['dir']) === 'asc') ? 'ASC' : 'DESC';
				if (isset($columnsMap[$colIdx])) {
					$orders[] = $columnsMap[$colIdx] . ' ' . $dir;
				}
			}
			if (count($orders)) {
				$hasNombreArea = false;
				foreach ($orders as $o) {
					if (stripos($o, 'ca.Descripcion') !== false) {
						$hasNombreArea = true;
						break;
					}
				}
				if (!$hasNombreArea) {
					array_unshift($orders, 'ca.Descripcion ASC');
				}
				$orderSql = implode(', ', $orders);
			}
		}

		// Query principal
		$dataSql = "
        SELECT
            dg.Id,
            dg.Anio,
            dg.Mes,
            dg.Nombre,
            dg.Descripcion,
            dg.FechaCrea,
            dg.FechaEdita,
            LTRIM(RTRIM(ca.Descripcion)) AS NombreArea
        FROM TblDocumentosGerentes dg
        INNER JOIN CatAreas ca ON ca.IdArea = dg.IdArea
        $whereSql
        ORDER BY $orderSql
        OFFSET ? ROWS FETCH NEXT ? ROWS ONLY
    ";

		$queryBinds = $binds;
		$queryBinds[] = $start;
		$queryBinds[] = $length;

		$query = $this->db->query($dataSql, $queryBinds);

		$data = [];
		foreach ($query->result_array() as $row) {
			$data[] = [
				"Anio" => $row["Anio"],
				"Mes" => $row["Mes"],
				"Nombre" => $row["Nombre"],
				"Descripcion" => $row["Descripcion"],
				"FechaCrea" => $row["FechaCrea"],
				"FechaEdita" => $row["FechaEdita"],
				"Opcion" => '<a style="color: black; border-color: black;" href="' . base_url('index.php/downloadFileGerente/') . $row["Id"] . '/gerente" target="_blank" class="w-100 btn btn-outline-theme-3 icon-button edit-button text-black"><i class="simple-icon-arrow-down-circle"></i></a>',
				"NombreArea" => $row["NombreArea"]
			];
		}

		echo json_encode([
			"draw" => $draw,
			"recordsTotal" => $totalRecords,
			"recordsFiltered" => $totalFiltered,
			"data" => $data
		]);
	}

	public function guardarDocumento($file_ext, $file, $id, $nombre, $descripcion, $mes, $anio, $txtIdPadre = null)
	{
		$mensaje = array();
		$this->db->trans_start();

		try {
			if (strlen($descripcion) < 5) {
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "La descripción debe tener al menos 5 caracteres";
				echo json_encode($mensaje);
				return;
			}
			if (strlen($nombre) < 5) {
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "El nombre debe tener al menos 5 caracteres";
				echo json_encode($mensaje);
				return;
			}
			if (strlen($descripcion) < 5) {
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "La descripción debe tener al menos 5 caracteres";
				echo json_encode($mensaje);
				return;
			}

			$idArea = null;
			$queryArea = $this->db->query("SELECT IdArea FROM Usuarios WHERE IdUsuario = " . $this->session->userdata('id'));

			if ($queryArea->num_rows() <= 0) {
				throw new Exception("No se encontró el área del usuario");
			}
			$idArea = $queryArea->result_array()[0]["IdArea"];

			$insert = array(
				'Nombre' => $nombre,
				'Descripcion' => $descripcion,
				'Anio' => $anio,
				'Mes' => $mes,
				'Url' => $file,
				'Tipo' => $file_ext,
				'Estado' => 'ACTIVO',
				'IdArea' => $idArea,
				"FechaCrea" => gmdate(date("Y-m-d h:i:s")),
				'IdUsuarioCrea' => $this->session->userdata('id')
			);

			//Verificar si ya existe un documento para el mes y año
			$this->db->where('Anio', $anio);
			$this->db->where('Mes', $mes);
			$this->db->where('IdArea', $idArea);

			$query = $this->db->get('TblDocumentosGerentes');

			if ($query->num_rows() > 0) {
				unset($insert['FechaCrea']);
				unset($insert['IdUsuarioCrea']);

				$insert['FechaEdita'] = gmdate(date("Y-m-d h:i:s"));
				$insert['IdUsuarioEdita'] = $this->session->userdata('id');

				$this->db->where('Anio', $anio);
				$this->db->where('Mes', $mes);
				$result = $this->db->update('TblDocumentosGerentes', $insert);

			} else {
				$result = $this->db->insert('TblDocumentosGerentes', $insert);
			}

			if ($result) {
				$this->db->trans_commit();
				$mensaje[0]["retorno"] = 1;
				$mensaje[0]["tipo"] = "success";
				$mensaje[0]["mensaje"] = "Documento guardado correctamente";
				echo json_encode($mensaje);
				return;
			}
		} catch (Exception $ex) {
			$this->db->rollBack();
			$mensaje[0]["retorno"] = -1;
			$mensaje[0]["tipo"] = "error";
			$mensaje[0]["mensaje"] = "Error: " . $ex;
			echo json_encode($mensaje);
			return;
		}
	}

	public function verificarSiYaExisteIndicador($anio, $mes)
	{
		$idArea = null;
		$queryArea = $this->db->query("SELECT IdArea FROM Usuarios WHERE IdUsuario = " . $this->session->userdata('id'));

		if ($queryArea->num_rows() <= 0) {
			throw new Exception("No se encontró el área del usuario");
		}
		$idArea = $queryArea->result_array()[0]["IdArea"];

		$this->db->where('Anio', $anio);
		$this->db->where('Mes', $mes);
		$this->db->where('IdArea', $idArea);
		$query = $this->db->get('TblDocumentosGerentes');

		if ($query->num_rows() > 0) {
			return true; // El indicador ya existe
		} else {
			return false; // No existe el indicador
		}
	}
}

/* End of file .php */
