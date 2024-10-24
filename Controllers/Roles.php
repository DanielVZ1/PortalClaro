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
                <button class="btn btn-danger" type="button" onclick="btnDelRol('.$arrData[$i]['id'].');" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
            </div>';
        }
    

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getRol(int $idrol)
    {
        $intIdrol = intval(strClean($idrol));
        if ($intIdrol > 0) 
        {
            $arrData = $this->model->selectRol($intIdrol);
            if(empty($arrData))
            {
                $arrResponse = array('status' => false, 'msg' => 'No se encontraron datos');
            }else{
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }   
        die();
    }

    public function setRol() {
        $intIdrol = intval($_POST['idRol']);
        $strRol = isset($_POST['txtNombre']) ? strClean($_POST['txtNombre']) : '';
        $strDescripcion = isset($_POST['txtDescripcion']) ? strClean($_POST['txtDescripcion']) : '';
        $intStatus = isset($_POST['listStatus']) ? intval($_POST['listStatus']) : 2;
    
        // Logs para depurar
        error_log("ID Rol: $intIdrol");
        error_log("Nombre Rol: $strRol");
        error_log("Descripción: $strDescripcion");
        error_log("Status: $intStatus");
    
        if($intIdrol == 0) {
            error_log("Insertando nuevo rol");
            $request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
            $option = 1;
        } else {
            error_log("Actualizando rol existente");
            $request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescripcion, $intStatus); // Faltaba pasar el $intIdrol
            $option = 2;
        }
    
        if($request_rol > 0) {
            if($option == 1) {
                error_log("Rol creado correctamente");
                $arrResponse = array('status' => true, 'msg' => 'Rol creado correctamente.');
            } else {
                error_log("Rol actualizado correctamente");
                $arrResponse = array('status' => true, 'msg' => 'Rol actualizado correctamente.');
            }
        } else if($request_rol == 'exist') {
            error_log("El rol ya existe");
            $arrResponse = array('status' => false, 'msg' => 'El rol ya existe.');
        } else {
            error_log("Error al crear el rol");
            $arrResponse = array('status' => false, 'msg' => 'Error al crear el rol.');
        }
    
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
    


    public function delRol($idrol) {
        $RolesModel = new RolesModel();
        $resultado = $RolesModel->DeleteRol($idrol);
        
        if ($resultado) {
            echo json_encode("ok");
        } else {
            echo json_encode("Error al eliminar el rol");
        }
      }

      public function getSelectRoles()
      {
          $htmlOptions = "";
          $arrData = $this->model->selectRoles();
          if(count($arrData) > 0)
          {
              for ($i=0; $i < count($arrData); $i++) {
                  $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['nombrerol'].'</option>';
              }            
          }
          echo $htmlOptions;
          die();
  
      }
  

}
?>
