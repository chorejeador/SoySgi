

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AreasModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("America/Managua");	
	}

		public function getAreas($estado)
	{
		$query = "";
		if ($estado != null) {
			$query = " and Estado = '".$estado."'";
		}
		

		$result = $this->db->query("SELECT * FROM CatAreas where 1= 1 ".$query);

		return $result->result_array();
	}
	
}

/* End of file .php */
