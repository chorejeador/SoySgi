<?php
class LoginModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($name,$pass)
    {
        if ($name != FALSE && $pass != FALSE) {
            $this->db->where('Usuario', $name);
            $this->db->where('Clave', $pass);
            $this->db->get('Usuarios');
      
            $query = $this->db->query("SELECT *, t1.Descripcion as Area FROM Usuarios t0 
                            LEFT JOIN CatAreas t1 on t1.IdArea = t0.IdArea 
                            where t0.Estado = 'ACTIVO' and t0.Clave = '".$pass."' and Usuario = '".$name."'");

            if ($query->num_rows() == 1) {
                return $query->result_array();
            }
            return 0;
        }
    }  

   
}
?>