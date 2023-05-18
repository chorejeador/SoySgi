

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model
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

	public function filtrarUsuarios($filtro){
		$queryRuta = ''; $json = array(); $i = 0;
        $and = '';
		if ($filtro!='') {
            $and = " and (Nombres like '%".$filtro."%' OR Apellidos like '%".$filtro."%')";
        }

		$query = $this->db->query("SELECT * FROM Usuarios WHERE Estado = 'ACTIVO' ".$and);

         if($query->num_rows() > 0){
			 foreach ($query->result_array() as $key) {
			 	 $json[$i]["IdUsuario"] = $key["IdUsuario"];
				 $json[$i]["Nombres"] = $key["Nombres"]." ".$key["Apellidos"];
				 $i++;
         	}
		}

        echo json_encode($json);
	}

	function cargarPermisosUsuarios($id)
	{
		$query = $this->db->query("SELECT t2.* 
										FROM Usuarios t0
										inner join PermisosUsuarios t1 on t1.IdUsuario = T0.IdUsuario
										inner join Permisos t2 on t2.IdPermiso = T1.IdPermiso
										where t0.IdUsuario = ".$id."");
       
        $json = array();
        $i = 0;
        if ($query->num_rows() > 0) {            
            foreach ($query->result_array() as $key) {
                $json["data"][$i]["IdPermiso"] = $key["IdPermiso"];
                $json["data"][$i]["Nombre"] = $key["Nombre"];
                $json["data"][$i]["Descripcion"] = $key["Descripcion"];
                $json["data"][$i]["Opcion"] = '
                <a href="javascript:void(0)" class="btn btn-xs btn-danger rowDelete"><i class="fa fa-trash-o"></i></a>';
                $i++;
            }
            echo json_encode($json);
            return;
        }
        echo 0;
        return;
	}

	
}

/* End of file .php */
