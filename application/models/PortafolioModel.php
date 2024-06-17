<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PortafolioModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("America/Managua");	
		
	}

	function filtrarImagenes($idCategoria = '')
	{
	    $json = array("data" => array());

	    $and = '';

	    if ($idCategoria != '') {
	        $and = 'AND idportafoliocategoria IN ('.$idCategoria.')';
	    }

	    $result = $this->db->query("SELECT * FROM PortafolioCategoriaDetalle WHERE ESTADO = 'ACT' ".$and);

	    $i = 0;
	    $groupedImages = array();

	    foreach ($result->result_array() as $value) {
	        $groupedImages[$i][] = '<div class="shadow card h-100 text-center ml-2 " >
	                                  <img style="width:200px!important;" class="card-img-top img-fluid" src="'.base_url('assets/portafolio/items/').$value["Imagen"].'">
	                              </div>';

	        if (count($groupedImages[$i]) == 4) {
	            $i++;
	        }
	    }

	    // Completar la fila actual con elementos vacíos si es necesario
	    if (isset($groupedImages[$i]) && count($groupedImages[$i]) < 4) {
	        $remainingEmptySlots = 4 - count($groupedImages[$i]);
	        for ($j = 0; $j < $remainingEmptySlots; $j++) {
	            $groupedImages[$i][] = '<div class=" h-100"></div>';
	        }
	    }

	    foreach ($groupedImages as $group) {
	        $json["data"][]["Imagen"] = '<div class="d-flex justify-content-between w-100">' . implode('', $group) . '</div>';
	    }

	    echo json_encode($json);
	    return;
	}







	function getCategorias()
	{
		$retorno = $this->db->query("SELECT * FROM PortafolioCategoria WHERE ESTADO = 'ACT'");

		return $retorno->result_array();
	}
}