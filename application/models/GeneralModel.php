


<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("America/Managua");	
	}

	public function generalSearch($estado,$filtro)
	{

		$and = '';

		if ($filtro != '') {
			$and .= "And (t0.Nombre like '%".$filtro."%' or t0.Descripcion like '%".$filtro."%')";
		}
		$query = $this->db->query("
									SELECT t0.*
									FROM TblDocumentosGenerales t0
									where 1 = 1".$and);

        $json = array();
        $i = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $key) {
                $json["data"][$i]["IdDocumento"] = $key["IdDocumento"];
                $json["data"][$i]["Nombre"] = $key["Nombre"];
                $json["data"][$i]["Descripcion"] = $key["Descripcion"];
                $json["data"][$i]["FechaCrea"] = $key["FechaCrea"];
                $json["data"][$i]["FechaEdita"] = $key["FechaEdita"];
                $json["data"][$i]["Ver"] = '<a href="'.base_url('/uploads/').$key["Url"].'.'.$key["Tipo"].'" class="btn btn-primary btn-sm text-uppercase"><i class="fa fa-eye"></i></a>';

                $estado = 1;
                if ($key["Estado"] == "INACTIVO") {
                	$estado = 0;                	
                }
                $json["data"][$i]["Opcion"] = $json["data"][$i]["Opcion"] = '<a href="javascript:void(0)" onclick="baja('.$key["IdDocumento"].','.$estado.')" class="btn btn-primary btn-sm text-uppercase"><i class="fa fa-add">ACTIVAR</i></a>';
                if ($key["Estado"] == 'ACTIVO') {
                	$json["data"][$i]["Opcion"] = '<a href="javascript:void(0)" onclick="baja('.$key["IdDocumento"].','.$estado.')" class="btn btn-primary btn-sm text-uppercase"><i class="fa fa-add">INACTIVAR</i></a>';
                }
                
                $i++;
            }
            echo json_encode($json);
            return;
        }
        echo json_encode($json);
        //return;
	}


	public function guardarDocumento($file_ext, $file, $id, $nombre, $descripcion, $area, $txtIdPadre = null)
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
				'Url' => $file,
				'Tipo' => $file_ext,
				'Estado' => 'ACTIVO',
				"FechaCrea" => gmdate(date("Y-m-d h:i:s")),
				'IdUsuarioCrea' => $this->session->userdata('id')				
			);		

			$result = $this->db->insert('TblDocumentosGenerales',$insert);


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
	


	function getDocumentos()
	{
		$results = $this->db->query("SELECT * FROM TblDocumentosGenerales where Estado = 'ACTIVO'");

		return $results->result_array();
	}

	function bajaDocumentoGeneral($id,$estado)
	{

		$mensaje = array(); 
		$this->db->trans_start();

		try {
			$estadoDes = 'ACTIVO';
			if ($estado == 1) {
				$estadoDes = 'INACTIVO';
			}

			$this->db->where("IdDocumento",$id);
			$result = $this->db->update('TblDocumentosGenerales',array('Estado'=>$estadoDes));

			if ($result) {				
				$this->db->trans_commit();
				$mensaje[0]["retorno"] = 1;
				$mensaje[0]["tipo"] = "success";
				$mensaje[0]["mensaje"] = "Documento cambiado a ".$estadoDes." correctamente";				
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



