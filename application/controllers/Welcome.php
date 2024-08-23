<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


    function __construct()
	{
		parent::__construct();
		$this->load->model("LoginModel");
        $this->load->model("PortafolioModel");
		$this->load->model('PublicacionModel');
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


    function noticiaseventos()
    {
		$data["publicaciones"] = $this->PublicacionModel->publicaciones_landing();
		$data["imagenes"] = $this->PublicacionModel->imagenes_landing();
        $this->load->view('landing/noticiaseventos', $data);
    }

	function verNoticia($id)
	{
		$data["publicacion"] = $this->PublicacionModel->obtener_publicacion($id);
		$data["imagenes"] = $this->PublicacionModel->obtener_imagenes_publicacion($id);
		$this->load->view('landing/verNoticia', $data);
		$this->load->view('js/publicaciones/verNoticiaJs');
	}

	public function login(){
		$this->load->view('login/login');
	}

    function quienessomos()
    {
        $this->load->view('landing/quienessomos');   
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
            }else {
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


    public function unauthorized()
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
