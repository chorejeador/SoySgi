<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PortafolioModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set("America/Managua");
    }

    function filtrarImagenes()
    {
        $idCategoria = $this->input->post('categorias');
        $json = array("data" => array());

        $and = '';

        if ($idCategoria != '') {
            $and = ' AND IdPortafolioCategoria IN (' . $idCategoria . ')';
        }

        $result = $this->db->query("
        SELECT *
        FROM PortafolioCategoriaDetalle
        WHERE Estado = 'ACT' " . $and . "
        ORDER BY IdPortafolioCategoria, IdDetalle
    ");

        foreach ($result->result_array() as $value) {
            $json["data"][] = array(
                "Imagen" => '
                <div class="producto-card">
                    <img 
                        class="producto-img" 
                        src="' . base_url('assets/portafolio/items/') . $value["Imagen"] . '" 
                        alt="' . $value["Nombre"] . '"
                    >
                </div>
            '
            );
        }

        echo json_encode($json);
    }






    function getCategorias()
    {
        $retorno = $this->db->query("SELECT * FROM PortafolioCategoria WHERE ESTADO = 'ACT'");

        return $retorno->result_array();
    }
}
