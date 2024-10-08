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
    
            if($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<span class="badge badge-success" style="color: green">Activo</span>';
            } else {
                $arrData[$i]['status'] = '<span class="badge badge-danger" style="color:red">Inactivo</span>';
            }

            $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-secondary btn-sm btnPermisosRol" rl="'.$arrData[$i]['id'].'" title="Permisos"><i class="fas fa-key"></i></button>
                <button class="btn btn-primary btn-sm btnEditRol" rl="'.$arrData[$i]['id'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btnDelRol" rl="'.$arrData[$i]['id'].'" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
            </div>';
        }
    

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setRol(){
        $strRol = isset($_POST['txtNombre']) ? strClean($_POST['txtNombre']) : '';
        $strDescripcion = isset($_POST['txtDescripcion']) ? strClean($_POST['txtDescripcion']) : '';
        $intStatus = isset($_POST['listStatus']) ? intval($_POST['listStatus']) : 2;
        $request_rol = $this ->model->insertRol($strRol, $strDescripcion, $intStatus);

        if($request_rol > 0)
        {

            $arrResponse = array('status' => true, 'msg' => 'Rol creado correctamente.');

        }else if($request_rol == 'exist'){

            $arrResponse = array('status' => false, 'msg' => 'El rol ya existe.');

        }else{

            $arrResponse = array('status' => false, 'msg' => 'Error al crear el rol.');

        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        
        die();
    }

}

    

?>
