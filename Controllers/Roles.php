<?php
class Roles extends Controller {

        public function __construct() {
            session_start();
            parent::__construct();
        }
    
        public function index() {

            if (!isset($_SESSION['id_usuario'])) {
                header('Location: ' . base_url . 'login');
                exit();
            }
    
            // Obtener el id del usuario desde la sesión
            $id_user = $_SESSION['id_usuario'];
    
            // Verificar si el usuario tiene permisos para acceder a "Roles"
            $verificar = $this->model->verificarPermiso($id_user, 'Roles');
    
            // Si el usuario tiene permisos, cargar la vista
            if ($verificar && count($verificar) > 0) {
                $data['page_id'] = 2;
                $data['page_tag'] = "Roles";
                $data['page_name'] = "Roles_Lista";
                $data['page_title'] = "Roles <small> </small>";
                $data['permisos'] = $this->model->getPermisos();
                $this->views->getView($this, "index", $data);
            } else {
                // Si el usuario no tiene permisos, redirigir a la página de error
                header('Location: ' . base_url . 'Errors/permisos');
                exit(); // Asegúrate de que el script se detenga después de la redirección
            }
        }
    

    public function listar() {
        $data = $this->model->getRoles(); // Obtiene los roles desde el modelo
        
        // Recorrer los roles para añadir estado y acciones
        foreach ($data as $key => $role) {
            // Verificar el estado y agregar etiquetas HTML
            if ($role['estado'] == 1) {
                $data[$key]['estado'] = '<span class="badge bg-success">Activo</span>';
                // Acciones, solo editable para los roles que no son el ID 1 (Administrador)
                if ($role['id'] == 1) {
                    $data[$key]['acciones'] = '<div><span class="badge bg-primary">Administrador</span></div>';
                } else {
                    $data[$key]['acciones'] = '
                        <div style="display: flex; align-items: center;">
                            
                             <a class="permiso-button" href="' . base_url . 'Roles/permisos/' . $role['id'] . '">
                      <svg class="permiso-svgIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="14" width="15.75">
                      <path fill="#ffffff" d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17l0 80c0 13.3 10.7 24 24 24l80 0c13.3 0 24-10.7 24-24l0-40 40 0c13.3 0 24-10.7 24-24l0-40 40 0c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z"/></svg>
                </a>
                            <button class="edit-button" type="button" onclick="btnEditarRol(' . $role['id'] . ');">
                      <svg class="edit-svgIcon" viewBox="0 0 512 512" style="width: 1em; height: 1em; fill: currentColor;">
                      <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                      </svg>
                </button>
                             <button class="delete-button" type="button" onclick="btnEliminarRol(' . $role['id'] . ');">
                      <svg class="delete-svgIcon" xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512" style="width: 1em; height: 1em; fill: white;">
                      <path fill="#ffffff" d="M352 224l-46.5 0c-45 0-81.5 36.5-81.5 81.5c0 22.3 10.3 34.3 19.2 40.5c6.8 4.7 12.8 12 12.8 20.3c0 9.8-8 17.8-17.8 17.8l-2.5 0c-2.4 0-4.8-.4-7.1-1.4C210.8 374.8 128 333.4 128 240c0-79.5 64.5-144 144-144l80 0 0-61.3C352 15.5 367.5 0 386.7 0c8.6 0 16.8 3.2 23.2 8.9L548.1 133.3c7.6 6.8 11.9 16.5 11.9 26.7s-4.3 19.9-11.9 26.7l-139 125.1c-5.9 5.3-13.5 8.2-21.4 8.2l-3.7 0c-17.7 0-32-14.3-32-32l0-64zM80 96c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l320 0c8.8 0 16-7.2 16-16l0-48c0-17.7 14.3-32 32-32s32 14.3 32 32l0 48c0 44.2-35.8 80-80 80L80 512c-44.2 0-80-35.8-80-80L0 112C0 67.8 35.8 32 80 32l48 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L80 96z"/>
                      </svg>
                </button>
                        </div>';
                }
            } else {
                $data[$key]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
                $data[$key]['acciones'] = '
                    <div>
                        <button class="activate-button" type="button" onclick="btnReingresarRol(' . $role['id'] . ');">
                      <svg class="activate-svgIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 1em; height: 1em;">
                      <path fill="#ffffff" d="M142.9 142.9c-17.5 17.5-30.1 38-37.8 59.8c-5.9 16.7-24.2 25.4-40.8 19.5s-25.4-24.2-19.5-40.8C55.6 150.7 73.2 122 97.6 97.6c87.2-87.2 228.3-87.5 315.8-1L455 55c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2l0 128c0 13.3-10.7 24-24 24l-8.4 0c0 0 0 0 0 0L344 224c-9.7 0-18.5-5.8-22.2-14.8s-1.7-19.3 5.2-26.2l41.1-41.1c-62.6-61.5-163.1-61.2-225.3 1zM16 312c0-13.3 10.7-24 24-24l7.6 0 .7 0L168 288c9.7 0 18.5 5.8 22.2 14.8s1.7 19.3-5.2 26.2l-41.1 41.1c62.6 61.5 163.1 61.2 225.3-1c17.5-17.5 30.1-38 37.8-59.8c5.9-16.7 24.2-25.4 40.8-19.5s25.4 24.2 19.5 40.8c-10.8 30.6-28.4 59.3-52.9 83.8c-87.2 87.2-228.3 87.5-315.8 1L57 457c-6.9 6.9-17.2 8.9-26.2 5.2S16 449.7 16 440l0-119.6 0-.7 0-7.6z"/>
                      </svg>
                </button>
                    </div>';
            }
        }
    
        // Devolver la respuesta JSON con la estructura correcta
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar() {
        $nombrerol = $_POST['nombrerol'];
        $id = $_POST['id'];
    
        if (empty($nombrerol)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            if ($id == "") {
                // Registro de nuevo rol
                $data = $this->model->registrarRol($nombrerol);
                $msg = $data == "ok" ? "si" : ($data == "existe" ? array('msg' => 'El Rol ya existe', 'icono' => 'error') : "error");
            } else {
                // Modificación de rol
                $data = $this->model->modificarRol($nombrerol, $id);
                if ($data == "modificado") {
                    $msg = "si"; // Se modificó correctamente
                } elseif ($data == "existe") {
                    $msg = array('msg' => 'El Rol ya existe', 'icono' => 'error');
                } else {
                    $msg = array('msg' => 'Error al modificar el Rol', 'icono' => 'error');
                }
            }
        }
    
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id) {
        $data = $this->model->editarRol($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);  // Devolver los datos del rol
        die();
    }

    public function eliminar(int $id) {
        $data = $this->model->accionRol(0, $id);
        $msg = $data == 1 ? "ok" : "Error al desactivar";
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id) {
        $data = $this->model->accionRol(1, $id);
        $msg = $data == 1 ? "ok" : "error al reingresar";
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function permisos($id) {
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }
        $data['datos'] = $this->model->getPermisos();
        $permisos = $this->model->getDetallesPermisos($id);
        $data['asignados'] = array();
        foreach ($permisos as $permiso) {
            $data['asignados'][$permiso['id_permiso']] = true;
        }
        $data['id_rol'] = $id;
        $this->views->getView($this, "permisos", $data);
    }

    public function registrarPermisos() {
        // Verificar si los permisos fueron enviados
        if (isset($_POST['permisos']) && !empty($_POST['permisos'])) {
            $id_rol = $_POST['id_rol'];
            $permisos = $_POST['permisos']; // Array de permisos seleccionados
    
            // Eliminar los permisos existentes del rol
            $eliminar = $this->model->eliminarPermisos($id_rol);
    
            if ($eliminar == 'ok') {
                // Registrar los nuevos permisos para el rol
                foreach ($permisos as $id_permiso) {
                    $msg = $this->model->registrarPermisos($id_rol, $id_permiso);
                }
    
                if ($msg == 'ok') {
                    $msg = array('msg' => 'Permisos asignados con éxito', 'icono' => 'success');
                } else {
                    $msg = array('msg' => 'Error al asignar permisos', 'icono' => 'error');
                }
            } else {
                $msg = array('msg' => 'Error al eliminar permisos existentes', 'icono' => 'error');
            }
    
            // Devolver una respuesta JSON
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        } else {
            // Si no hay permisos seleccionados
            echo json_encode(array('msg' => 'No se seleccionaron permisos', 'icono' => 'error'));
            die();
        }
    }

    public function getSelectRoles()
    {
        $htmlOptions = "";
        $arrData = $this->model->selectRoles();
        if (count($arrData) > 0) {
            for ($i = 0; $i < count($arrData); $i++) {
                $htmlOptions .= '<option value="' . $arrData[$i]['id'] . '">' . $arrData[$i]['nombrerol'] . '</option>';
            }
        }
        echo $htmlOptions;
        die();
    }

    public function salir() {
        session_destroy();
        header("location: " . base_url);
    }


}

?>
