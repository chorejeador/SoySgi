<?php

defined('BASEPATH') or exit('No direct script access allowed');

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

    public function filtrarUsuarios($filtro)
    {
        $queryRuta = '';
        $json = array();
        $i = 0;
        $and = '';
        if ($filtro != '') {
            $and = " and (Nombres like '%" . $filtro . "%' OR Apellidos like '%" . $filtro . "%')";
        }

        $query = $this->db->query("SELECT * FROM Usuarios WHERE Estado = 'ACTIVO' " . $and);

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $key) {
                $json[$i]["IdUsuario"] = $key["IdUsuario"];
                $json[$i]["Nombres"] = $key["Nombres"] . " " . $key["Apellidos"];
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
										where t0.IdUsuario = " . $id . "");

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
    public function getUsuario($id)
    {
        $this->db->where('IdUsuario', $id);
        $this->db->where('Estado', 'ACTIVO');
        $query = $this->db->get('Usuarios');
        return $query->row();
    }

    public function updatePassword($id, $password)
    {
        $this->db->where('IdUsuario', $id);
        return $this->db->update('Usuarios', array(
            'Clave' => $password
        ));
    }
    public function getUsuarioActivo($id)
    {
        $this->db->where('IdUsuario', $id);
        $this->db->where('Estado', 'ACTIVO');
        $query = $this->db->get('Usuarios');

        return $query->row();
    }
    public function cambiarPassword($id, $actual, $nueva)
    {
        $mensaje = array();
        $id = (int)$id;

        try {
            $usuario = $this->db
                ->where('IdUsuario', $id)
                ->where('Estado', 'ACTIVO')
                ->get('Usuarios')
                ->row();

            if (!$usuario) {
                $mensaje[0]["retorno"] = -1;
                $mensaje[0]["mensaje"] = "El usuario no existe o está inactivo";
                return $mensaje;
            }

            if (md5($actual) !== trim($usuario->Clave)) {
                $mensaje[0]["retorno"] = -1;
                $mensaje[0]["mensaje"] = "Contraseña actual incorrecta";
                return $mensaje;
            }

            $nueva_hash = md5($nueva);

            $this->db->trans_begin();

            $this->db->where('IdUsuario', $id);
            $this->db->limit(1);
            $this->db->update('Usuarios', array(
                'Clave' => $nueva_hash
            ));

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $mensaje[0]["retorno"] = -1;
                $mensaje[0]["mensaje"] = "Error al actualizar la contraseña";
                return $mensaje;
            }

            $this->db->trans_commit();
            $mensaje[0]["retorno"] = 1;
            $mensaje[0]["mensaje"] = "Contraseña actualizada correctamente";
        } catch (Exception $e) {
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            }

            $mensaje[0]["retorno"] = -1;
            $mensaje[0]["mensaje"] = "Error: " . $e->getMessage();
        }

        return $mensaje;
    }
}

/* End of file .php */
