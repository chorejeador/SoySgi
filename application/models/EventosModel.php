


<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EventosModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("America/Managua");	
	}

    function getEventos() {
        return $this->db->query("SELECT * FROM Eventos")->result_array();        
    }

    
}
?>