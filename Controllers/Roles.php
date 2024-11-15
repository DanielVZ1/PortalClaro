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
                        <div>
                            <a class="btn btn-dark" href="' . base_url . 'Roles/permisos/' . $role['id'] . '"><i class="fas fa-key"></i></a>
                            <button class="btn btn-primary" type="button" onclick="btnEditarRol(' . $role['id'] . ');"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger" type="button" onclick="btnEliminarRol(' . $role['id'] . ');"><i class="fas fa-circle"></i></button>
                        </div>';
                }
            } else {
                $data[$key]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
                $data[$key]['acciones'] = '
                    <div>
                        <button class="btn btn-success" type="button" onclick="btnReingresarRol(' . $role['id'] . ');"><i class="fas fa-circle"></i></button>
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

    public function salir() {
        session_destroy();
        header("location: " . base_url);
    }
}

?>
