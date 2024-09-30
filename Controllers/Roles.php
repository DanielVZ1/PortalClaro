<?php

class Roles extends Controller
{
    public function __construct()
    {   session_start();
        parent::__construct();      
    }
    public function index()
    {
        $data['page_id'] = 3;
        $data['page_tag'] = "Roles Usuarios";
        $data['page_name'] = "rol_usuario";
        $data['page_title'] = "Roles Usuarios <small> </small>";
        $this->views->getView($this, 'roles', $data);
    }

    public function getRoles(){
        $arrData = $this->model->selectRoles();
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();  // Asegúrate de que 'die()' detenga el procesamiento adicional.
    }
    

}
?>
