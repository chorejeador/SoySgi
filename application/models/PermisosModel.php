

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PermisosModel extends CI_Model
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

	public function getPermisos(){
		
		$query = $this->db->query("SELECT * FROM permisos where Estado = 'ACTIVO'");

		return $query->result_array();
	}

	function cargarPermisosUsuarios($id)
	{
		$query = $this->db->query("
									SELECT t0.*,
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

	
}

/* End of file .php */
