<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PortafolioController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GeneralModel');
		$this->load->model('PortafolioModel');
		$this->load->helper(array('form', 'url'));
		/*if ($this->session->userdata("logged") != 1) {
            redirect(base_url() . 'index.php', 'refresh');
        }*/
	}

	function portafolio(){
		$data["categorias"] = $this->PortafolioModel->getCategorias();

		
        $this->load->view('landing/portafolio',$data);
        $this->load->view('js/general/portafolio');
    }

    function filtrarImagenes()
    {
        $this->PortafolioModel->filtrarImagenes($this->input->post('categorias'));
    }
}