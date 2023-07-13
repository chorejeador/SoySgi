

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
		$result =  $this->db->query("SELECT t0.*,t1.Descripcion as DescripcionPadre ,777 as cantidad FROM CatSubGestion t0 
									inner join CatGestion t1 on t1.IdGestion = t0.IdGestion
									where t0.IdSubGestion = ".$id);

		return $result->result_array();
	}

	public function getSubGestionByGestion($id)
	{		
		$result =  $this->db->query("SELECT * ,777 as cantidad FROM CatSubGestion where Estado = 'ACTIVO' and IdGestion = ".$id);

		return $result->result_array();
	}

	public function subgestionSearch($filtro){
		$queryRuta = ''; $json = array(); $i = 0;
        $and = '';
		if ($filtro!='') {
            $and = " and t0.Descripcion like '%".$filtro."%'";
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
				 $json["data"][$i]["Editar"] = '<a class="btn btn-primary" href="'.base_url("index.php/editarSubGestion/").$key["IdSubGestion"].'">Editar</a>';
				 $json["data"][$i]["AgregarDocumento"] = '<a class="btn btn-primary" href="'.base_url("index.php/agregarDocumentoSubGestion/").$key["IdSubGestion"].'">Ver Documentos</a>';
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


	public function guardarEditarSubGestion($descripcion,$id,$estado,$idGestion,$sigla)
	{
		$mensaje = array(); 
		$this->db->trans_start();
		try {
			
			if(strlen($descripcion)<5){
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "La descripción debe tener al menos 5 caracteres";
				echo json_encode($mensaje);
				$this->db->rollBack();
				return;
			}
			
			$update = array(
				'Descripcion' => $descripcion,
				'idGestion' => $idGestion,
				'Sigla' => $sigla,
				'Estado' => $estado == 1 ? 'ACTIVO' : 'INACTIVO',
				"FechaEdita" => gmdate(date("Y-m-d h:i:s")),
				'IdUsuarioEdita' => $this->session->userdata('id')
			);

			$this->db->where('IdSubGestion',$id);
			$result = $this->db->update('CatSubGestion',$update);

			if ($result) {
				$this->db->trans_commit();
				$mensaje[0]["retorno"] = 1;
				$mensaje[0]["tipo"] = "success";
				$mensaje[0]["mensaje"] = "SubGestión editada correctamente";
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

	public function getDocumentos($id)
	{
		$query = $this->db->query("SELECT * FROM TblDocumentosSubGestion where Estado = 'Activo' and IdSubGestion = ".$id);

		return $query->result_array();
	}

	public function getDocumento($id)
	{
		$query = $this->db->query("SELECT * FROM TblDocumentosSubGestion where IdDocumento = ".$id);

		return $query->result_array();
	}

	public function guardarDocumento($file_ext, $file, $id, $nombre, $descripcion, $area, $idSubGestion = null,$txtIdPadre = null)
	{
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
			if(strlen($nombre)<5){
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "El nombre debe tener al menos 5 caracteres";
				echo json_encode($mensaje);
				return;
			}
			if(strlen($descripcion)<5){
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "La descripción debe tener al menos 5 caracteres";
				echo json_encode($mensaje);
				return;
			}

			$insert = array(
				'IdSubGestion' => $id,
				'Nombre' => $nombre,
				'Descripcion' => $descripcion,
				'Url' => $file,
				'Tipo' => $file_ext,
				'Estado' => 'ACTIVO',
				'FechaCrea' => gmdate(date("Y-m-d h:i:s")),
				'IdUsuarioCrea' => $this->session->userdata('id'),
				'IdArea' => $area
			);

			if ($idSubGestion != null) {
				$insert["IdSubGestion"] = $idSubGestion;
				$insert["IdPadre"] = $txtIdPadre;

				if ($txtIdPadre == '' || $txtIdPadre == null) {
					$insert["IdPadre"] = $id;
				}				

				$this->db->query("UPDATE TblDocumentosSubGestion set Estado = 'INACTIVO', IdUsuarioEdita = ".$this->session->userdata('id').", FechaEdita = '".gmdate(date("Y-m-d h:i:s"))."' WHERE IdDocumento = ".$id );
			}


			$result = $this->db->insert('TblDocumentosSubGestion',$insert);			


			if ($result) {
				$this->db->trans_commit();
				$mensaje[0]["retorno"] = 1;
				$mensaje[0]["tipo"] = "success";
				$mensaje[0]["mensaje"] = "Archivo guardado correctamente";
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

	public function getHistorialDocumento($id)
	{
		$padre = $this->db->query("SELECT * FROM TblDocumentosSubGestion  where IdDocumento = ".$id);
		$and = "";
		if($padre->num_rows()>0 && $padre->result_array()[0]["IdPadre"] != null){
			$and = "or IdPadre = ".$padre->result_array()[0]["IdPadre"];
		}		
		$result = $this->db->query("SELECT t0.*,concat(t1.Nombres,' ',t1.Apellidos) as UsuarioCrea,concat(t2.Nombres,' ',t2.Apellidos) as UsuarioEdita
									FROM TblDocumentosSubGestion t0 
									left join Usuarios t1 on t1.IdUsuario = t0.IdUsuarioCrea
									left join Usuarios t2 on t2.IdUsuario = t0.IdUsuarioEdita
									where t0.IdPadre = ".$id."".$and." order by t0.FechaCrea desc");
		return $result->result_array();
	}

}