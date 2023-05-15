

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProcesoModel extends CI_Model
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

	public function procesosSearch($filtro){
		$queryRuta = ''; $json = array(); $i = 0;
        $and = '';
		if ($filtro!='') {
            $and = " and Descripcion like '%".$filtro."%'";
        }


		$query = $this->db->query("SELECT * FROM CatProcesos WHERE 1=1 ".$and);

         if($query->num_rows() > 0){
			 foreach ($query->result_array() as $key) {
			 	 $json["data"][$i]["IdProceso"] = $key["IdProceso"];
				 $json["data"][$i]["Descripcion"] = $key["Descripcion"];
				 $json["data"][$i]["FechaCrea"] = $key["FechaCrea"];
				 $json["data"][$i]["FechaEdita"] = $key["FechaEdita"];
                 $json["data"][$i]["Estado"] = $key["Estado"];
				 $json["data"][$i]["Editar"] = '<a class="btn btn-primary" href="'.base_url("index.php/editarProceso/").$key["IdProceso"].'">Editar</a>';
				 $json["data"][$i]["Gestiones"] = '<a class="btn btn-primary" href="'.base_url("index.php/verGestionesProceso/").$key["IdProceso"].'"><i class="simple-icon-arrow-right"></i></a>';
				 $json["data"][$i]["Agregar"] = '<a class="btn btn-primary" href="'.base_url("index.php/nuevaGestion/").$key["IdProceso"].'"><i class="simple-icon-plus"></i></a>';
				 $i++;
         	}
		}
        echo json_encode($json);
	}

	public function guardarProceso($descripcion)
	{
		$mensaje = array(); $string = '';
		try {
			if(strlen($descripcion)<5){
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "La descripción debe tener al menos 5 caracteres";
				echo json_encode($mensaje);
				return;
			}

			$insert = array(	
				'Descripcion' => $descripcion,
				'Estado' => 'ACTIVO',
				"FechaCrea" => gmdate(date("Y-m-d h:i:s")),
				'IdUsuarioCrea' => $this->session->userdata('id'),
			);

			$result = $this->db->insert('CatProcesos',$insert);
			if ($result) {
				$mensaje[0]["retorno"] = 1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "Proceso guardado correctamente";
				echo json_encode($mensaje);
				$this->db->trans_commit();
				return;
			}
		} catch (Exception $ex) {
			$this->db->rollBack();
			$mensaje[0]["retorno"] = -1;
			$mensaje[0]["tipo"] = "error";
			$mensaje[0]["mensaje"] = "Error: ".$ex;
			echo json_encode($mensaje);
			return;
		}
	}
	
	public function guardarEditarProceso($descripcion,$id,$estado)
	{
		$mensaje = array(); $string = '';
		try {
			if(strlen($descripcion)<5){
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "La descripción debe tener al menos 5 caracteres";
				echo json_encode($mensaje);
				return;
			}

			$insert = array(	
				'Descripcion' => $descripcion,
				'Estado' => $estado == 1 ? 'ACTIVO' : "INACTIVO",
				"FechaEdita" => gmdate(date("Y-m-d h:i:s")),
				'IdUsuarioEdita' => $this->session->userdata('id')
			);
			

					  $this->db->where('IdProceso',$id);
			$result = $this->db->update('CatProcesos',$insert);

			if ($result) {
				$this->db->trans_commit();
				$mensaje[0]["retorno"] = 1;
				$mensaje[0]["tipo"] = "success";
				$mensaje[0]["mensaje"] = "Proceso editado correctamente";
				echo json_encode($mensaje);
				
				return;
			}
		} catch (Exception $ex) {
			$this->db->rollBack();
			$mensaje[0]["retorno"] = -1;
			$mensaje[0]["tipo"] = "error";
			$mensaje[0]["mensaje"] = "Error: ".$ex;
			echo json_encode($mensaje);
			return;
		}
	}
	public function getProceso($id,$active = null)
	{
		$condicion = "";
		$andId = "";
		if($active != null){
			$condicion = "and t0.Estado = '".$active."'";
		}
		if ($id != null) {
			$andId =  "and t0.idProceso = ".$id;
		}

		$result =  $this->db->query("SELECT t0.*,t1.Nombres ,(SELECT COUNT(IdGestion) from CatGestion  where 1=1 ".$andId.") as cantidad 
										FROM CatProcesos t0 
										inner join Usuarios t1 on t1.IdUsuario = t0.IdUsuarioCrea
										where 1 = 1 ".$andId." ".$condicion);

		return $result->result_array();
	}

	public function getGestiones($idProeso = null){
		$and = '';

		if($idProeso != null){
			$and = " and IdProceso = ".$idProeso;
		}
		$gestiones = $this->db->query("SELECT * FROM CatGestion where Estado = 'ACTIVO' ".$and." order by sigla");
		return $gestiones->result_array();
	}

}

/* End of file .php */
