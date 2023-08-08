

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PermisosModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("America/Managua");	
		
	}

	public function getPermisos(){
		
		$query = $this->db->query("SELECT * FROM permisos where Estado = 'ACTIVO'");

		return $query->result_array();
	}

	function cargarPermisosUsuarios($id)
	{
		$query = $this->db->query("SELECT t0.*,
									CASE WHEN (SELECT IdUsuario FROM PERMISOSUSUARIOS WHERE IdUsuario = ".$id." and Estado = 'ACTIVO' and IdPermiso =t0.IdPermiso) IS NULL THEN 'INACTIVO' ELSE 'ACTIVO' END AS ESTADOUSUARIO
									FROM permisos t0
									where t0.Estado = 'ACTIVO'");

        $json = array();
        $i = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $key) {
                $json["data"][$i]["IdPermiso"] = $key["IdPermiso"];
                $json["data"][$i]["Nombre"] = $key["Nombre"];
                $json["data"][$i]["Descripcion"] = $key["Descripcion"];
                $json["data"][$i]["Opcion"] = '<a href="javascript:void(0)" onclick="asignar('.$key["IdPermiso"].','.$id.')" class="btn btn-primary btn-sm text-uppercase"><i class="fa fa-trash-o">'.$key["ESTADOUSUARIO"].'</i></a>';
                if ($key["ESTADOUSUARIO"] == null) {
                	$json["data"][$i]["Opcion"] = '<a href="javascript:void(0)" onclick="asignar('.$key["IdPermiso"].','.$id.')" class="btn btn-primary btn-sm text-uppercase"><i class="fa fa-add">'.$key["ESTADOUSUARIO"].'</i></a>';
                }
                
                $i++;
            }
            echo json_encode($json);
            return;
        }
        echo 0;
        return;
	}

	function asignarPermiso($idPermiso,$idUsuario)
	{	
		$mensaje = array();

		$this->db->trans_begin();
		try {
			$insert = array();
			$existe = $this->db->query("SELECT * FROM PermisosUsuarios WHERE IdUsuario = ".$idUsuario." AND IdPermiso = ".$idPermiso);

			if ($existe->num_rows()>0) {
				$estado = $existe->result_array()[0]["Estado"] == 'ACTIVO' ? 'INACTIVO' : 'ACTIVO';
				$update = array("Estado" => $estado);

				$this->db->where("IdUsuario",$idUsuario);
				$this->db->where("IdPermiso",$idPermiso);
				$this->db->update("PermisosUsuarios",$update);

				$this->db->trans_commit();
				$mensaje[0]["tipo"] = "success";
				$mensaje[0]["mensaje"] = "Permiso cambiado a ".$estado;
				echo json_encode($mensaje);
				return;
			}else{
				$insert = array(
					"IdPermiso" => $idPermiso,
					"IdUsuario" => $idUsuario,
					"Estado"  => 'ACTIVO'
				);
				$this->db->insert("PermisosUsuarios",$insert);				
				$this->db->trans_commit();

				$mensaje[0]["tipo"] = "success";
				$mensaje[0]["mensaje"] = "Permiso asignado correctamente";
				echo json_encode($mensaje);
				return;
			}
			
		} catch (Exception $e) {
			$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "Error intentelo nuevamente ". $e->getMessage();
				echo json_encode($mensaje);
				
			$this->db->rollBack();
			return;
		}

	}

	function cargarDocumentosPermiso($tipo) {
		$json = array();
        $i = 0;

		$query = $this->db->query("SELECT 'Gestion' as Tipo,* FROM TblDocumentos WHERE Estado = 'ACTIVO'");

		if ($tipo == 'subgestion') {
			$query = $this->db->query("SELECT 'Sub Gestion' as Tipo, * FROM TblDocumentosSubGestion WHERE Estado = 'ACTIVO'");
		}	

		foreach ($query->result_array() as $key) {
            $json["data"][$i]["Tipo"] = $key["Tipo"];
            $json["data"][$i]["Nombre"] = $key["Nombre"];
            $json["data"][$i]["Descripcion"] = $key["Descripcion"];
            $json["data"][$i]["Opcion"] = '<a href="javascript:void(0)" onclick="ver('.$key["IdDocumento"].')" class="btn btn-primary btn-md text-uppercase"><i class="iconsminds-key-lock"></i></a>';                            
        	$i++;
        }
            
		echo json_encode($json);
        return;
	}

	function cargarUsuariosDocumentos($id,$tipo)
	{
		$json = array();
        $i = 0;
		$consulta = "SELECT t0.*,CASE WHEN t1.Id IS NOT NULL THEN 'AUTORIZADO' ELSE 'NO AUTORIZADO' END AS PERMISO,
		t2.Descripcion as Area
		FROM Usuarios t0
		left join CatAreas t2 on t2.IdArea = t0.IdArea
		LEFT JOIN PermisosDocumentosUsuario t1 on t1.IdUsuario = T0.IdUsuario and t1.Estado = 'Activo'
		and t1.Tipo = '".$tipo."'
		where t0.Estado = 'ACTIVO'";

			//echo $consulta;return;
		$result = $this->db->query($consulta);

		foreach ($result->result_array() as $key) {
            $json["data"][$i]["Nombre"] = $key["Nombres"]." ".$key["Apellidos"];
            $json["data"][$i]["Area"] = $key["Area"];
            $json["data"][$i]["Descripcion"] = $key["PERMISO"];
            $json["data"][$i]["Opcion"] = '<a href="javascript:void(0)" onclick="asignar('. $key["IdUsuario"] . ', \'' . $key["PERMISO"] . '\')" class="btn btn-primary btn-md text-uppercase"><i class="iconsminds-key-lock"></i></a>';
        	$i++;
        }

		echo json_encode($json);
        return;
	}

	function asignarPermisoDocumento($idDocumento,$idUsuario,$tipo,$estado)
	{
		$mensaje = array();
        $i = 0;
		$this->db->trans_begin();
		try {
			$estadoUp = 'ACTIVO';
			if ($estado == 'AUTORIZADO') {
				$estadoUp = 'INACTIVO';
			}
			$existe = $this->db->query("SELECT * FROM PermisosDocumentosUsuario WHERE IdDocumento = ".$idDocumento." and IdUsuario =".$idUsuario." and Tipo = '".$tipo."'");
			
			if ($existe->num_rows()>0) {
				$this->db->query("UPDATE PermisosDocumentosUsuario SET Estado = '".$estadoUp."' where Id = ".$existe->result_array()[0]["Id"]);
			}else{
				$insert = array(
					"IdDocumento" => $idDocumento,
					"IdUsuario" => $idUsuario,
					"Tipo" => $tipo,
					"Estado" => $estado
				);
				$this->db->insert("PermisosDocumentosUsuario", $insert);
			}

			$this->db->trans_commit();
			$mensaje[0]["tipo"] = "success";
            $mensaje[0]["mensaje"] = "Permiso modificado correctamente, se cambio permiso a: ".$estadoUp;
            echo json_encode($mensaje);
            return;
		}catch(Exception $e){
			$this->db->rollBack();
			$mensaje[0]["tipo"] = "error";
            $mensaje[0]["mensaje"] = "Ha ocurrido un error, intentelo nuevamente".$ex->getMessage();
            echo json_encode($mensaje);
            return;
		}
	}


	function validarPermiso($id,$tipo)
	{		
		$permiso = $this->db->query("SELECT * FROM PermisosDocumentosUsuario WHERE Estado = 'ACTIVO' AND  IdDocumento = ".$id." AND Tipo = '".$tipo."'");
		if ($permiso->num_rows()>0) {
			return true;
		}

		return false;
	}

	function validarPermisoUsuario($id)
	{
		$permiso = $this->db->query("SELECT * FROM PermisosUsuarios WHERE IdPermiso = $id And IdUsuario = ".$this->session->userdata("id"));
		
		if ($permiso->num_rows()>0) {
			return true;
		}

		return false;
	}
	
}

/* End of file .php */
