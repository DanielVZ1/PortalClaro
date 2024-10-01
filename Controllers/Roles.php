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
    
        for($i = 0; $i < count($arrData); $i++){
    
            if($arrData[$i]['estado'] == 1) {
                $arrData[$i]['estado'] = '<span class="badge badge-success" style="color: green">Activo</span>';
            } else {
                $arrData[$i]['estado'] = '<span class="badge badge-danger" style="color:red">Inactivo</span>';
            }

            $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-secondary btn-sm btnPermisosRol" rl="'.$arrData[$i]['id'].'" title="Permisos"><i class="fas fa-key"></i></button>
                <button class="btn btn-primary btn-sm btnEditRol" rl="'.$arrData[$i]['id'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btnDelRol" rl="'.$arrData[$i]['id'].'" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
            </div>';
        }
    

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();  // Asegúrate de que 'die()' detenga el procesamiento adicional.
    }
    

}
?>
