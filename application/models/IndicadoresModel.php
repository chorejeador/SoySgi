<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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

	public function search($filtro){
		$queryRuta = ''; $json = array(); $i = 0;
        $and = '';

		if ($filtro!='') {
            $and = " and IdUsuarioCrea  = ".$this->session->userdata('id')."";
        }
        if (!$this->PermisosModel->validarPermisoUsuario(5)) {
            $and = " and (IdUsuarioCrea  = ".$this->session->userdata('id').")";
        }


		$query = $this->db->query("SELECT * FROM TblDocumentosGerentes WHERE 1=1 ".$and);

         if($query->num_rows() > 0){
			 foreach ($query->result_array() as $key) {
			 	 $json["data"][$i]["Anio"] = $key["Anio"];
				 $json["data"][$i]["Mes"] = $key["Mes"];
				 $json["data"][$i]["Nombre"] = $key["Nombre"];
				 $json["data"][$i]["Descripcion"] = $key["Descripcion"];
				 $json["data"][$i]["FechaCrea"] = $key["FechaCrea"];
				 $json["data"][$i]["Opcion"] = '<a style="color: black;  border-color: black;" href="'.base_url('index.php/downloadFileGerente/').$key["Id"].'/gerente" target="_blank" class="btn btn-outline-theme-3 icon-button edit-button text-black"><i class="simple-icon-arrow-down-circle"></i></a>';
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
				'Nombre' => $nombre,
				'Descripcion' => $descripcion,
				'Anio' => $anio,
				'Mes' => $mes,
				'Url' => $file,
				'Tipo' => $file_ext,
				'Estado' => 'ACTIVO',
				"FechaCrea" => gmdate(date("Y-m-d h:i:s")),
				'IdUsuarioCrea' => $this->session->userdata('id')				
			);		

			$result = $this->db->insert('TblDocumentosGerentes',$insert);


			if ($result) {				
				$this->db->trans_commit();
				$mensaje[0]["retorno"] = 1;
				$mensaje[0]["tipo"] = "success";
				$mensaje[0]["mensaje"] = "Documento guardado correctamente";
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

}

/* End of file .php */
