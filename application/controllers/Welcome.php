<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


    function __construct()
	{
		parent::__construct();
		$this->load->model("LoginModel");
	}


	public function index()
	{
		$this->load->view('landing/index');	
	}

    function misionPolitica()
    {
        $this->load->view('landing/misionPolitica'); 
    }

    function vision(){
        $this->load->view('landing/vision'); 
    }

    function principiosValores()
    {
        $this->load->view('landing/principiosValores'); 
    }

    function trayectoria() {
        $this->load->view('landing/trayectoria');
    }
    
	public function login(){
		$this->load->view('login/login');
	}

	public function Acreditar()
    {
        $this->form_validation->set_rules('username', 'nombre', 'required');
        $this->form_validation->set_rules('pwd', 'pass', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('?error=1');
        }
        else {
            $name = $this->input->get_post('username');
            $pass = md5($this->input->get_post('pwd'));
            $data['user'] = $this->LoginModel->login($name, $pass);
            
            if (count($data['user']) == 0) {
                redirect('login');
            }
            else {
                $sessiondata = array(
                    'id' => $data['user'][0]['IdUsuario'],
                    'User' => $data['user'][0]['Usuario'],
                    'Name' => $data['user'][0]['Nombres'],
                    'Apelli' => $data['user'][0]['Apellidos'],
                    'IdArea' => $data['user'][0]['IdArea'],
                    'Area' => $data['user'][0]['Area'],
                    'logged' => 1
                );
                $this->session->set_userdata($sessiondata);

                if ($this->session->userdata) {                    
                    redirect('gerentesView');
                }
            }
        }
    }

    function salir(){
        $this->session->sess_destroy();
        $sessiondata = array('logged' => 0);
        redirect(base_url() . 'index.php', 'refresh');
    }


    public function denegado()
    {
        $this->load->view("denegado");
    }

    public function instalaciones(){
        $this->load->view('landing/instalaciones');
    }

    function contactenos(){
        $this->load->view('landing/contactenos');    
    }
    
}
