

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SubGestionModel extends CI_Model
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

	public function getSubGestion($id)
	{		
		$result =  $this->db->query("SELECT * ,777 as cantidad FROM CatSubGestion where IdSubGestion = ".$id);

		return $result->result_array();
	}

	public function subgestionSearch($filtro){
		$queryRuta = ''; $json = array(); $i = 0;
        $and = '';
		if ($filtro!='') {
            $and = " and Descripcion like '%".$filtro."%'";
        }


		$query = $this->db->query("SELECT t0.* FROM CatSubGestion t0 
									INNER JOIN CatGestion t1 on t1.IdGestion = t0.IdGestion
									WHERE 1=1 and t0.Estado ='ACTIVO' ".$and);//SE FILTRAR SOLO LOS ACTIVOS POR PETICION DE CLAUDIA

         if($query->num_rows() > 0){
			 foreach ($query->result_array() as $key) {
			 	 $json["data"][$i]["IdSubGestion"] = $key["IdSubGestion"];
				 $json["data"][$i]["IdGestion"] = $key["IdGestion"];
				 $json["data"][$i]["Descripcion"] = $key["Descripcion"];
				 $json["data"][$i]["Sigla"] = $key["Sigla"];
				 $json["data"][$i]["FechaCrea"] = $key["FechaCrea"];
				 $json["data"][$i]["FechaEdita"] = $key["FechaEdita"];
                 $json["data"][$i]["Estado"] = $key["Estado"];
				 $json["data"][$i]["Editar"] = '<a class="btn btn-primary" href="'.base_url("index.php/editarSubGestion/").$key["IdGestion"].'">Editar</a>';
				 $json["data"][$i]["AgregarDocumento"] = '<a class="btn btn-primary" href="'.base_url("index.php/verDocumentoSubGestion/").$key["IdSubGestion"].'">Ver Documentos</a>';
				 $json["data"][$i]["AgregarDocumento"] = '<a class="btn btn-primary" href="'.base_url("index.php/agregarDocumentoSubGestion/").$key["IdSubGestion"].'">Agregar Documentos</a>';
				 $json["data"][$i]["AgregarSubGestion"] = '<a class="btn btn-primary" href="'.base_url("index.php/agregarSubGestion/").$key["IdSubGestion"].'">Agregar Sub Gestión</a>';
				 $i++;
         	}
		}
        echo json_encode($json);
	}

	public function guardarSubGestion($descripcion,$IdGestion,$siglas)
	{

		//ECHO $IdGestion;return;
		$mensaje = array(); 
		$this->db->trans_start();
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
				'IdGestion' => $IdGestion,
				'Sigla' => $siglas,
				'Estado' => 'ACTIVO',
				"FechaCrea" => gmdate(date("Y-m-d h:i:s")),
				'IdUsuarioCrea' => $this->session->userdata('id'),
			);

			$result = $this->db->insert('CatSubGestion',$insert);
			if ($result) {
				$mensaje[0]["retorno"] = 1;
				$mensaje[0]["tipo"] = "success";
				$mensaje[0]["mensaje"] = "Sub Gestión guardada correctamente";
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

}