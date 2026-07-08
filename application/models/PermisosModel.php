

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
    $json["data"] = array();
    $i = 0;

    $consulta = "SELECT t0.*,
    ISNULL((
        SELECT Estado FROM PermisosDocumentosUsuario
        WHERE PermisosDocumentosUsuario.IdDocumento = ".$id." 
        AND PermisosDocumentosUsuario.IdUsuario = t0.IdUsuario
        AND PermisosDocumentosUsuario.Tipo = '".$tipo."'
    ),'NO AUTORIZADO') AS PERMISO, 
    t2.Descripcion as Area
    FROM Usuarios t0
    LEFT JOIN CatAreas t2 ON t2.IdArea = t0.IdArea
    WHERE t0.Estado = 'ACTIVO'";

    $result = $this->db->query($consulta);

    foreach ($result->result_array() as $key) {
        $json["data"][$i]["Nombre"] = $key["Nombres"]." ".$key["Apellidos"];
        $json["data"][$i]["Area"] = $key["Area"];
     if ($key["PERMISO"] == 'AUTORIZADO') {
    $json["data"][$i]["Descripcion"] = '
        <span class="estado-glow ok">
            AUTORIZADO
        </span>';
} else {
    $json["data"][$i]["Descripcion"] = '
        <span class="estado-glow no">
             NO AUTORIZADO
        </span>';
}     $json["data"][$i]["Opcion"] = '
            <div class="text-center">
                <input type="checkbox" class="user-checkbox" value="'.$key["IdUsuario"].'">
                <br><br>
                <a href="javascript:void(0)" onclick="asignar('.$key["IdUsuario"].', \''.$key["PERMISO"].'\', '.$id.')" class="btn btn-primary btn-sm text-uppercase">
                    <i class="iconsminds-key-lock"></i>
                </a>
            </div>
        ';
        $i++;
    }

    header('Content-Type: application/json');
    echo json_encode($json);
    return;
}

	function asignarPermisoDocumento($idDocumento,$idUsuario,$tipo,$estado)
	{
		$mensaje = array();
        $i = 0;
		$this->db->trans_begin();
		try {
			$estadoUp = 'AUTORIZADO';
			if ($estado == 'AUTORIZADO') {
				$estadoUp = 'NO AUTORIZADO';
			}
			$existe = $this->db->query("SELECT * FROM PermisosDocumentosUsuario WHERE IdDocumento = ".$idDocumento." and IdUsuario =".$idUsuario." and Tipo = '".$tipo."'");
			
			if ($existe->num_rows()>0) {
				$this->db->query("UPDATE PermisosDocumentosUsuario SET Estado = '".$estadoUp."' where Id = ".$existe->result_array()[0]["Id"]);
			}else{
				$insert = array(
                "IdDocumento" => $idDocumento,
                "IdUsuario" => $idUsuario,
                "Tipo" => $tipo,
                "Estado" => $estadoUp
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
		$permiso = $this->db->query("SELECT * FROM PermisosDocumentosUsuario WHERE Estado = 'AUTORIZADO' AND  IdDocumento = ".$id." AND Tipo = '".$tipo."'");
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
	
	public function autorizarLoteUsuarios($idDocumento, $usuarios, $tipo)
{
    $this->db->trans_begin();

    try {
        foreach ($usuarios as $idUsuario) {

            $existe = $this->db->query("
                SELECT * 
                FROM PermisosDocumentosUsuario 
                WHERE IdDocumento = ".$idDocumento." 
                AND IdUsuario = ".$idUsuario." 
                AND Tipo = '".$tipo."'
            ");

            if ($existe->num_rows() > 0) {
                $this->db->query("
                    UPDATE PermisosDocumentosUsuario 
                    SET Estado = 'AUTORIZADO'
                    WHERE Id = ".$existe->result_array()[0]["Id"]
                );
            } else {
                $insert = array(
                    "IdDocumento" => $idDocumento,
                    "IdUsuario"   => $idUsuario,
                    "Tipo"        => $tipo,
                    "Estado"      => "AUTORIZADO"
                );

                $this->db->insert("PermisosDocumentosUsuario", $insert);
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }

    } catch (Exception $e) {
        $this->db->trans_rollback();
        return false;
    }
}
public function revocarLoteUsuarios($idDocumento, $usuarios, $tipo)
{
    $this->db->trans_begin();

    try {
        foreach ($usuarios as $idUsuario) {

            $existe = $this->db->query("
                SELECT * 
                FROM PermisosDocumentosUsuario 
                WHERE IdDocumento = ".$idDocumento." 
                AND IdUsuario = ".$idUsuario." 
                AND Tipo = '".$tipo."'
            ");

            if ($existe->num_rows() > 0) {
                $this->db->query("
                    UPDATE PermisosDocumentosUsuario 
                    SET Estado = 'NO AUTORIZADO'
                    WHERE Id = ".$existe->result_array()[0]["Id"]
                );
            } else {
                $insert = array(
                    "IdDocumento" => $idDocumento,
                    "IdUsuario"   => $idUsuario,
                    "Tipo"        => $tipo,
                    "Estado"      => "NO AUTORIZADO"
                );

                $this->db->insert("PermisosDocumentosUsuario", $insert);
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }

    } catch (Exception $e) {
        $this->db->trans_rollback();
        return false;
    }
}




}

/* End of file .php */
