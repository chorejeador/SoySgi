<?php

defined('BASEPATH') or exit('No direct script access allowed');

class GestionModel extends CI_Model
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

    public function GestionSearch($filtro)
    {
        $queryRuta = '';
        $json = array();
        $i = 0;
        $and = '';

        if ($filtro != '') {
            $and = " and Descripcion like '%" . $filtro . "%'";
        }

        $query = $this->db->query("SELECT * FROM CatGestion WHERE 1=1 and Estado ='ACTIVO' " . $and);

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $key) {
                $json["data"][$i]["IdProceso"] = $key["IdProceso"];
                $json["data"][$i]["IdGestion"] = $key["IdGestion"];
                $json["data"][$i]["Eliminar"] = '<button class="btn btn-danger" onclick="eliminarGestion(' . $key["IdGestion"] . ')">Eliminar</button>';
                $json["data"][$i]["Descripcion"] = $key["Descripcion"];
                $json["data"][$i]["FechaCrea"] = $key["FechaCrea"];
                $json["data"][$i]["FechaEdita"] = $key["FechaEdita"];
                $json["data"][$i]["Estado"] = $key["Estado"];
                $json["data"][$i]["Editar"] = '<a class="btn btn-primary" href="' . base_url("index.php/editarGestion/") . $key["IdGestion"] . '">Editar</a>';
                $json["data"][$i]["AgregarDocumento"] = '<a class="btn btn-primary btn-sm me-2" href="' . base_url("index.php/agregarDocumentoGestion/") . $key["IdGestion"] . '"><i class="fas fa-file-upload me-1"></i> Documentos </a>';
                $json["data"][$i]["AgregarSubGestion"] = '<a class="btn btn-success btn-sm" href="' . base_url("index.php/agregarSubGestion/") . $key["IdGestion"] . '"><i class="fas fa-layer-group me-1"></i> Sub Gestión</a>';

                $i++;
            }
        }

        echo json_encode($json);
    }

    public function guardarGestion($descripcion, $idProceso, $siglas)
    {
        $mensaje = array();

        $this->db->trans_begin();

        try {
            if (strlen($descripcion) < 5) {
                $mensaje[0]["retorno"] = -1;
                $mensaje[0]["tipo"] = "error";
                $mensaje[0]["mensaje"] = "La descripción debe tener al menos 5 caracteres";
                echo json_encode($mensaje);
                $this->db->trans_rollback();
                return;
            }

            $insert = array(
                'Descripcion'   => $descripcion,
                'IdProceso'     => $idProceso,
                'Sigla'         => $siglas,
                'Estado'        => 'ACTIVO',
                'FechaCrea'     => date("Y-m-d H:i:s"),
                'IdUsuarioCrea' => $this->session->userdata('id'),
            );

            $result = $this->db->insert('CatGestion', $insert);

            if ($result) {
                $this->db->trans_commit();

                $mensaje[0]["retorno"] = 1;
                $mensaje[0]["tipo"] = "success";
                $mensaje[0]["mensaje"] = "Gestión guardada correctamente";
                echo json_encode($mensaje);
                return;
            }

            $this->db->trans_rollback();
            $mensaje[0]["retorno"] = -1;
            $mensaje[0]["tipo"] = "error";
            $mensaje[0]["mensaje"] = "No se pudo guardar la gestión";
            echo json_encode($mensaje);
        } catch (Exception $ex) {
            $this->db->trans_rollback();
            $mensaje[0]["retorno"] = -1;
            $mensaje[0]["tipo"] = "error";
            $mensaje[0]["mensaje"] = "Error: " . $ex->getMessage();
            echo json_encode($mensaje);
        }
    }

    public function guardarEditarGestion($descripcion, $id, $estado, $idProceso, $sigla)
    {
        $mensaje = array();

        $this->db->trans_begin();

        try {
            if (strlen($descripcion) < 5) {
                $mensaje[0]["retorno"] = -1;
                $mensaje[0]["tipo"] = "error";
                $mensaje[0]["mensaje"] = "La descripción debe tener al menos 5 caracteres";
                echo json_encode($mensaje);
                $this->db->trans_rollback();
                return;
            }

            $update = array(
                'Descripcion'     => $descripcion,
                'IdProceso'       => $idProceso,
                'Sigla'           => $sigla,
                'Estado'          => $estado == 1 ? 'ACTIVO' : 'INACTIVO',
                'FechaEdita'      => date("Y-m-d H:i:s"),
                'IdUsuarioEdita'  => $this->session->userdata('id')
            );

            $this->db->where('IdGestion', $id);
            $result = $this->db->update('CatGestion', $update);

            if ($result) {
                $this->db->trans_commit();

                $mensaje[0]["retorno"] = 1;
                $mensaje[0]["tipo"] = "success";
                $mensaje[0]["mensaje"] = "Gestión editada correctamente";
                echo json_encode($mensaje);
                return;
            }

            $this->db->trans_rollback();
            $mensaje[0]["retorno"] = -1;
            $mensaje[0]["tipo"] = "error";
            $mensaje[0]["mensaje"] = "No se pudo editar la gestión";
            echo json_encode($mensaje);
        } catch (Exception $ex) {
            $this->db->trans_rollback();
            $mensaje[0]["retorno"] = -1;
            $mensaje[0]["tipo"] = "error";
            $mensaje[0]["mensaje"] = "Error: " . $ex->getMessage();
            echo json_encode($mensaje);
        }
    }

    public function getGestion($id)
    {
        $result = $this->db->query("SELECT *, 777 as cantidad FROM CatGestion WHERE IdGestion = " . $id);
        return $result->result_array();
    }

    public function getGestionByProceso($id)
    {
        $result = $this->db->query("SELECT *, 777 as cantidad FROM CatGestion WHERE Estado = 'ACTIVO' AND IdProceso = " . $id);
        return $result->result_array();
    }

    public function getDocumentos($id)
    {
        $result = $this->db->query("
            SELECT t0.*
            FROM TblDocumentos t0
            WHERE t0.IdGestion = " . $id . "
            AND t0.Estado = 'ACTIVO'
            ORDER BY t0.FechaCrea DESC, t0.IdDocumento DESC
        ");

        return $result->result_array();
    }

    public function guardarDocumento($file_ext, $file, $id, $nombre, $descripcion, $area, $idGestion = null, $txtIdPadre = null)
    {
        $mensaje = array();

        $this->db->trans_begin();

        try {
            if (strlen($descripcion) < 5 || strlen($nombre) < 5) {
                $mensaje[0]["retorno"] = -1;
                $mensaje[0]["tipo"] = "error";
                $mensaje[0]["mensaje"] = "El nombre y descripción deben tener al menos 5 caracteres";
                echo json_encode($mensaje);
                $this->db->trans_rollback();
                return;
            }

            $insert = array(
                'IdGestion'      => $id,
                'Nombre'         => $nombre,
                'Descripcion'    => $descripcion,
                'Url'            => $file,
                'Tipo'           => $file_ext,
                'Estado'         => 'ACTIVO',
                'FechaCrea'      => date("Y-m-d H:i:s"),
                'IdUsuarioCrea'  => $this->session->userdata('id'),
                'IdArea'         => $area
            );

            if ($idGestion != null) {
                $insert["IdGestion"] = $idGestion;
                $insert["IdPadre"] = $txtIdPadre;

                if ($txtIdPadre == '' || $txtIdPadre == null) {
                    $insert["IdPadre"] = $id;
                }

                $this->db->query("
                    UPDATE TblDocumentos
                    SET Estado = 'INACTIVO',
                        IdUsuarioEdita = " . $this->session->userdata('id') . ",
                        FechaEdita = '" . date("Y-m-d H:i:s") . "'
                    WHERE IdDocumento = " . $id . "
                ");
            }

            $result = $this->db->insert('TblDocumentos', $insert);

            if ($result) {
                $this->db->trans_commit();

                $mensaje[0]["retorno"] = 1;
                $mensaje[0]["tipo"] = "success";
                $mensaje[0]["mensaje"] = "Documento guardado correctamente";
                echo json_encode($mensaje);
                return;
            }

            $this->db->trans_rollback();
            $mensaje[0]["retorno"] = -1;
            $mensaje[0]["tipo"] = "error";
            $mensaje[0]["mensaje"] = "No se pudo guardar el documento";
            echo json_encode($mensaje);
        } catch (Exception $ex) {
            $this->db->trans_rollback();
            $mensaje[0]["retorno"] = -1;
            $mensaje[0]["tipo"] = "error";
            $mensaje[0]["mensaje"] = "Error: " . $ex->getMessage();
            echo json_encode($mensaje);
        }
    }

    public function getDocumento($id)
    {
        $result = $this->db->query("
            SELECT t0.*, t3.IdArea, t3.Descripcion as DescripcionArea
            FROM TblDocumentos t0
            INNER JOIN CatGestion t1 ON t1.IdGestion = t0.IdGestion
            LEFT JOIN CatAreas t3 ON t3.IdArea = t0.IdArea
            WHERE t0.IdDocumento = " . $id . "
        ");

        return $result->result_array();
    }

    public function getHistorialDocumento($id)
    {
        $padre = $this->db->query("SELECT * FROM TblDocumentos WHERE IdDocumento = " . $id);
        $and = "";

        if ($padre->num_rows() > 0 && $padre->result_array()[0]["IdPadre"] != null) {
            $and = " OR IdPadre = " . $padre->result_array()[0]["IdPadre"];
        }

        $result = $this->db->query("
            SELECT t0.*, 
                   CONCAT(t1.Nombres,' ',t1.Apellidos) as UsuarioCrea,
                   CONCAT(t2.Nombres,' ',t2.Apellidos) as UsuarioEdita
            FROM TblDocumentos t0
            INNER JOIN Usuarios t1 ON t1.IdUsuario = t0.IdUsuarioCrea
            LEFT JOIN Usuarios t2 ON t2.IdUsuario = t0.IdUsuarioEdita
            WHERE (t0.IdPadre = " . $id . " " . $and . ")
            ORDER BY t0.FechaCrea DESC
        ");

        return $result->result_array();
    }

    public function downloadFile($id, $tipo, $path = "")
    {
        if ($this->session->userdata("logged") != 1) {
            redirect('unauthorized', 'refresh');
        }

        if (($tipo != 'general' && $tipo != 'gerente') && !$this->PermisosModel->validarPermiso($id, $tipo)) {
            redirect('unauthorized', 'refresh');
        }

        $this->load->helper('download');

        if ($tipo == 'gerente') {
            $fileInfo = $this->db->query("SELECT * FROM TblDocumentosGerentes WHERE Id = " . $id);
        } elseif ($tipo == 'general') {
            $fileInfo = $this->db->query("SELECT * FROM TblDocumentosGenerales WHERE Estado = 'ACTIVO' AND IdDocumento = " . $id);
        } else {
            $fileInfo = $this->db->query("SELECT * FROM TblDocumentos WHERE IdDocumento = " . $id);
        }

        if ($fileInfo->num_rows() == 0) {
            return null;
        }

        $row = $fileInfo->row();
        $file = 'uploads/' . $path . $row->Url . "." . $row->Tipo;

        force_download($row->Nombre . "." . $row->Tipo, file_get_contents($file));
    }

    public function eliminarDocumento($id, $idUsuario)
    {
        $mensaje = array();

        try {
            $id = (int)$id;
            $idUsuario = (int)$idUsuario;

            if ($id <= 0) {
                $mensaje[0]["retorno"] = -1;
                $mensaje[0]["tipo"] = "error";
                $mensaje[0]["mensaje"] = "ID inválido.";
                return $mensaje;
            }

            $documento = $this->db->query(
                "SELECT IdDocumento, Estado FROM TblDocumentos WHERE IdDocumento = ?",
                array($id)
            )->row();

            if (!$documento) {
                $mensaje[0]["retorno"] = -1;
                $mensaje[0]["tipo"] = "error";
                $mensaje[0]["mensaje"] = "El documento no existe.";
                return $mensaje;
            }

            if ($documento->Estado == 'INACTIVO') {
                $mensaje[0]["retorno"] = -1;
                $mensaje[0]["tipo"] = "error";
                $mensaje[0]["mensaje"] = "El documento ya está inactivo.";
                return $mensaje;
            }

            $this->db->trans_begin();

            $this->db->where('IdDocumento', $id);
            $this->db->where('Estado', 'ACTIVO');
            $this->db->limit(1);
            $this->db->update(
                'TblDocumentos',
                array(
                    'Estado' => 'INACTIVO',
                    'FechaEdita' => date("Y-m-d H:i:s"),
                    'IdUsuarioEdita' => $idUsuario
                )
            );

            $afectados = $this->db->affected_rows();

            if ($afectados !== 1) {
                $this->db->trans_rollback();

                $mensaje[0]["retorno"] = -1;
                $mensaje[0]["tipo"] = "error";
                $mensaje[0]["mensaje"] = "No se pudo inactivar el documento correctamente.";
                return $mensaje;
            }

            $this->db->trans_commit();

            $mensaje[0]["retorno"] = 1;
            $mensaje[0]["tipo"] = "success";
            $mensaje[0]["mensaje"] = "Documento inactivado correctamente.";
        } catch (Exception $e) {
            $this->db->trans_rollback();

            $mensaje[0]["retorno"] = -1;
            $mensaje[0]["tipo"] = "error";
            $mensaje[0]["mensaje"] = "Excepción: " . $e->getMessage();
        }

        return $mensaje;
    }
}
