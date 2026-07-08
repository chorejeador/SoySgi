<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsuariosController extends CI_Controller
{

    protected $helpers = ['form'];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UsuariosModel');
        $this->load->helper(array('form', 'url'));
        if ($this->session->userdata("logged") != 1) {
            redirect(base_url() . 'index.php', 'refresh');
        }
    }


    public function index()
    {
        $this->load->view('header/header');
        $this->load->view('menu/menu');
        $this->load->view('permisos/index');
        $this->load->view('footer/footer');
        $this->load->view('js/gestion/gestionJs');
    }

    public function getAreas($estado)
    {
        return $this->AreasModel->getAreas($estado);
    }

    function filtrarUsuarios()
    {
        //echo $this->input->post("filtro");

        //echo json_encode($this->input->post("filtro"));
        $this->UsuariosModel->filtrarUsuarios($this->input->post("filtro"));
    }


    public function Cambiar_Password_view()
    {
        $this->load->view('header/header');
        $this->load->view('menu/menu');
        $this->load->view('Usuarios/Cambiar_Password');
        $this->load->view('footer/footer');
    }

    public function cambiar_password()
    {
        header('Content-Type: application/json; charset=utf-8');

        $id = $this->session->userdata('id');
        $actual    = trim($this->input->post('password_actual'));
        $nueva     = trim($this->input->post('password_nueva'));
        $confirmar = trim($this->input->post('password_confirmar'));

        if (!$id) {
            echo json_encode([[
                "retorno" => -1,
                "mensaje" => "Sesión no válida"
            ]]);
            return;
        }

        if (empty($actual) || empty($nueva) || empty($confirmar)) {
            echo json_encode([[
                "retorno" => -1,
                "mensaje" => "Todos los campos son obligatorios"
            ]]);
            return;
        }

        if ($nueva !== $confirmar) {
            echo json_encode([[
                "retorno" => -1,
                "mensaje" => "Las contraseñas nuevas no coinciden"
            ]]);
            return;
        }

        if (strlen($nueva) < 8) {
            echo json_encode([[
                "retorno" => -1,
                "mensaje" => "La contraseña debe tener al menos 8 caracteres"
            ]]);
            return;
        }

        $res = $this->UsuariosModel->cambiarPassword($id, $actual, $nueva);

        if (isset($res[0]["retorno"]) && (int)$res[0]["retorno"] === 1) {

            $this->session->sess_destroy();


            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(
                    session_name(),
                    '',
                    time() - 42000,
                    $params["path"],
                    $params["domain"],
                    $params["secure"],
                    $params["httponly"]
                );
            }

            $res[0]["redirect"] = base_url('login');
        }

        echo json_encode($res);
    }
}
