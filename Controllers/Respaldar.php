<?php
class Respaldar extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        if (!isset($_SESSION['id_usuario'])) {
            header('Location: ' . base_url . 'login');
            exit();
        }

        $id_user = $_SESSION['id_usuario'];

        // Validar si el usuario es el ID 1
        if ($id_user == 1) {
            $data['page_id'] = 2;
            $data['page_tag'] = "Gestión de Respaldos";
            $data['page_name'] = "gestion_respaldo";
            $data['page_title'] = "Gestión de Respaldos <small> </small>";
            $data['title'] = 'DATOS DE LOS RESPALDOS';
            $data['script'] = 'Assets/js/respaldar.js';
            $this->views->getView($this, 'respaldar', $data);
        } else {
            // Validar permisos para otros usuarios
            $verificar = $this->model->verificarPermiso($id_user, 'respaldar');
            if ($verificar && count($verificar) > 0) {
                $data['page_id'] = 2;
                $data['page_tag'] = "Gestión de Respaldos";
                $data['page_name'] = "gestion_respaldo";
                $data['page_title'] = "Gestión de Respaldos <small> </small>";
                $data['title'] = 'DATOS DE LOS RESPALDOS';
                $data['script'] = 'Assets/js/respaldar.js';
                $this->views->getView($this, 'respaldar', $data);
            } else {
                // Si el usuario no tiene permisos, redirigir a la página de error
                header('Location: ' . base_url . 'Errors/permisos');
                exit();
            }
        }
    }
}
