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

    public function search($filtro)
    {
        $json = array();
        $i = 0;

        $queryArea = $this->db->query("SELECT IdArea FROM Usuarios WHERE IdUsuario = " . $this->session->userdata('id'));

        if ($queryArea->num_rows() <= 0) {
            echo json_encode($json);
            return;
        }

        $idArea = $queryArea->result_array()[0]["IdArea"];

        $and = "";

        // Si no tiene permiso global, solo ve los de su área
        if (!$this->PermisosModel->validarPermisoUsuario(5)) {
            $and = " AND dg.IdArea = " . $idArea;
        }

        $query = $this->db->query("
        SELECT dg.*, ca.Descripcion as NombreArea 
        FROM TblDocumentosGerentes dg
        INNER JOIN CatAreas ca ON ca.IdArea = dg.IdArea
        WHERE dg.Estado = 'ACTIVO' " . $and . "
        ORDER BY dg.FechaCrea DESC, dg.Id DESC
    ");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $key) {
                $json["data"][$i]["Anio"] = $key["Anio"];
                $json["data"][$i]["Mes"] = $key["Mes"];
                $json["data"][$i]["Nombre"] = $key["Nombre"];
                $json["data"][$i]["Descripcion"] = $key["Descripcion"];
                $json["data"][$i]["FechaCrea"] = $key["FechaCrea"];
                $json["data"][$i]["Opcion"] = '<a style="color: black; border-color: black;" href="' . base_url('index.php/downloadFileGerente/') . $key["Id"] . '/gerente" target="_blank" class="w-100 btn btn-outline-theme-3 icon-button edit-button text-black"><i class="simple-icon-arrow-down-circle"></i></a>';
                $json["data"][$i]["FechaEdita"] = $key["FechaEdita"];
                $i++;
            }
        }

        echo json_encode($json);
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

            $queryArea = $this->db->query("SELECT IdArea FROM Usuarios WHERE IdUsuario = " . $this->session->userdata('id'));

            if ($queryArea->num_rows() <= 0) {
                throw new Exception("No se encontró el área del usuario");
            }

            $idArea = $queryArea->result_array()[0]["IdArea"];


            $this->db->where('IdArea', $idArea);
            $this->db->where('Estado', 'ACTIVO');
            $this->db->update('TblDocumentosGerentes', array(
                'Estado' => 'INACTIVO',
                'FechaEdita' => date("Y-m-d H:i:s"),
                'IdUsuarioEdita' => $this->session->userdata('id')
            ));


            $insert = array(
                'Nombre' => $nombre,
                'Descripcion' => $descripcion,
                'Anio' => $anio,
                'Mes' => $mes,
                'Url' => $file,
                'Tipo' => $file_ext,
                'Estado' => 'ACTIVO',
                'IdArea' => $idArea,
                'FechaCrea' => date("Y-m-d H:i:s"),
                'IdUsuarioCrea' => $this->session->userdata('id')
            );

            $result = $this->db->insert('TblDocumentosGerentes', $insert);

            if ($result) {
                $this->db->trans_commit();
                $mensaje[0]["retorno"] = 1;
                $mensaje[0]["tipo"] = "success";
                $mensaje[0]["mensaje"] = "Documento guardado correctamente";
                echo json_encode($mensaje);
                return;
            }
        } catch (Exception $ex) {
            $this->db->trans_rollback();
            $mensaje[0]["retorno"] = -1;
            $mensaje[0]["tipo"] = "error";
            $mensaje[0]["mensaje"] = "Error: " . $ex->getMessage();
            echo json_encode($mensaje);
            return;
        }
        echo 'Usuario sesión: ' . $this->session->userdata('id');
        exit;
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
            return true;
        } else {
            return false;
        }
    }
}

/* End of file .php */
