<?php
class Usuarios extends Controller
{
    public function __construct()
    {
        session_start(); // Asegurarse de que la sesión esté iniciada
        parent::__construct();
    }

    // Método principal de vista
    public function index()
    {
      if (!isset($_SESSION['id_usuario'])) {
        header('Location: ' . base_url . 'login');
        exit();
    }
        $id_user = $_SESSION['id_usuario'];
        $verificar = $this->model->verificarPermiso($id_user, 'Usuarios');

        if ($verificar && count($verificar) > 0) {
        $data['page_id'] = 1;
        $data['page_tag'] = "Usuarios";
        $data['page_name'] = "Lista_Usuario";
        $data['page_title'] = "Usuarios <small> </small>";
        $this->views->getView($this, "index", $data);
      } else {
        header('Location: ' . base_url . 'Errors/permisos');
        exit();
      }
    }

    public function listar()
    {
      $data = $this->model->getUsuarios();
      for ($i = 0; $i < count($data); $i++) {
        if ($data[$i]['estado'] == 1) {
          $data[$i]['estado'] = '<span class="badge badge-success" style="color: green">Activo</span>';
          // Condición para evitar acciones en el usuario con id 1
          if ($data[$i]['id'] == 1) {
            $data[$i]['estado'] = '<span class="badge badge-success" style="color: gray">ADMINISTRADOR</span>';
            $data[$i]['acciones'] = '<div></div>';
          } else {
            $data[$i]['acciones'] = '<div style="display: flex; align-items: center;">
                        <button class="edit-button" onclick="btnEditarUser(' . $data[$i]['id'] . ');" style="margin-right: 5px;">
                            <svg class="edit-svgIcon" viewBox="0 0 512 512" style="width: 1em; height: 1em; fill: currentColor;">
                                <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                            </svg>
                        </button>
                        <button class="delete-button" onclick="btnEliminarUser(' . $data[$i]['id'] . ');">
                            <svg class="delete-svgIcon" xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512" style="width: 1em; height: 1em; fill: white;">
                                <path fill="#ffffff" d="M352 224l-46.5 0c-45 0-81.5 36.5-81.5 81.5c0 22.3 10.3 34.3 19.2 40.5c6.8 4.7 12.8 12 12.8 20.3c0 9.8-8 17.8-17.8 17.8l-2.5 0c-2.4 0-4.8-.4-7.1-1.4C210.8 374.8 128 333.4 128 240c0-79.5 64.5-144 144-144l80 0 0-61.3C352 15.5 367.5 0 386.7 0c8.6 0 16.8 3.2 23.2 8.9L548.1 133.3c7.6 6.8 11.9 16.5 11.9 26.7s-4.3 19.9-11.9 26.7l-139 125.1c-5.9 5.3-13.5 8.2-21.4 8.2l-3.7 0c-17.7 0-32-14.3-32-32l0-64zM80 96c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l320 0c8.8 0 16-7.2 16-16l0-48c0-17.7 14.3-32 32-32s32 14.3 32 32l0 48c0 44.2-35.8 80-80 80L80 512c-44.2 0-80-35.8-80-80L0 112C0 67.8 35.8 32 80 32l48 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L80 96z"/>
                            </svg>
                        </button>
                    </div>';
          }
        } else {
          $data[$i]['estado'] = '<span class="badge badge-danger" style="color: red">Inactivo</span>';
          $data[$i]['acciones'] = '<div style="display: flex; align-items: center;">
                        <button class="activate-button" onclick="btnReingresarUser(' . $data[$i]['id'] . ');" style="margin-right: 5px;">
                            <svg class="activate-svgIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 1em; height: 1em;">
                                <path fill="#ffffff" d="M142.9 142.9c-17.5 17.5-30.1 38-37.8 59.8c-5.9 16.7-24.2 25.4-40.8 19.5s-25.4-24.2-19.5-40.8C55.6 150.7 73.2 122 97.6 97.6c87.2-87.2 228.3-87.5 315.8-1L455 55c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2l0 128c0 13.3-10.7 24-24 24l-8.4 0c0 0 0 0 0 0L344 224c-9.7 0-18.5-5.8-22.2-14.8s-1.7-19.3 5.2-26.2l41.1-41.1c-62.6-61.5-163.1-61.2-225.3 1zM16 312c0-13.3 10.7-24 24-24l7.6 0 .7 0L168 288c9.7 0 18.5 5.8 22.2 14.8s1.7 19.3-5.2 26.2l-41.1 41.1c62.6 61.5 163.1 61.2 225.3-1c17.5-17.5 30.1-38 37.8-59.8c5.9-16.7 24.2-25.4 40.8-19.5s25.4 24.2 19.5 40.8c-10.8 30.6-28.4 59.3-52.9 83.8c-87.2 87.2-228.3 87.5-315.8 1L57 457c-6.9 6.9-17.2 8.9-26.2 5.2S16 449.7 16 440l0-119.6 0-.7 0-7.6z"/>
                            </svg>
                        </button>
                    </div>';
        }
      }
      header('Content-Type: application/json');
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();
    }

    // Validar el login de usuario
    public function validar()
    {
        $msg = ""; // Mensaje de respuesta
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $msg = "¡Los campos están vacíos!";
        } else {
            $usuario = strClean($_POST['usuario']);
            $clave = strClean($_POST['clave']);
  
            // Obtener el usuario de la base de datos sin la contraseña
            $data = $this->model->getUsuario($usuario);
  
            if ($data) {
                // Verificar si el usuario está activo (estado = 1)
                if ($data['estado'] == 0) {
                    $msg = "¡El usuario está inactivo!";
                } else {
                    // Comparar la contraseña ingresada con el hash almacenado
                    if (password_verify($clave, $data['clave'])) {
                        $_SESSION['id_usuario'] = $data['id'];
                        $_SESSION['usuario'] = $data['usuario'];
                        $_SESSION['nombre'] = $data['nombre'];
                        $_SESSION['activo'] = true;
                        $msg = "ok"; // Respuesta de éxito
                    } else {
                        $msg = "¡Usuario o contraseña incorrecta!";
                    }
                }
            } else {
                $msg = "¡Usuario o contraseña incorrecta!";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE); // Respuesta JSON
        die(); // Terminar el script
    }

    public function registrar()
    {
      $usuario = strClean($_POST['usuario']);
      $nombre = strClean($_POST['nombre']);
      $email = strClean($_POST['email']);
      $clave = strClean($_POST['clave']);
      $confirmar = strClean($_POST['confirmar']);
      $id_rol = strClean($_POST['rol']); // Cambiado
      $id = isset($_POST['id']) ? strClean($_POST['id']) : ""; // Capturamos el ID si existe
      $hash = password_hash($clave, PASSWORD_DEFAULT);
  
      if (empty($usuario) || empty($nombre) || empty($email) || empty($id_rol) || empty($clave)) {
        $msg = "Todos los campos son obligatorios";
      } else {
        if ($id == "") {
          if ($clave != $confirmar) {
            $msg = "Las contraseñas no coinciden";
          } else {
            $data = $this->model->registrarUsuario($usuario, $nombre, $hash, $email, $id_rol);
            $msg = $data == "ok" ? "si" : ($data == "existe" ? "El usuario ya existe" : "Error al registrar el usuario");
          }
        } else {
          $data = $this->model->modificarUsuario($usuario, $nombre, $email, $id_rol, $id); // Cambiado
          $msg = $data == "modificado" ? "modificado" : "Error al modificar el usuario";
        }
      }
      echo json_encode($msg, JSON_UNESCAPED_UNICODE);
      die();
    }
  

    // Editar un usuario
    public function editar(int $id)
    {
        // Obtener los roles y los datos del usuario a editar
        //$roles = $this->model->getRoles(); 
        $data = $this->model->editarUser($id);  // Método para obtener los datos del usuario

        // Pasar los roles y los datos del usuario a la vista
        //$data['roles'] = $roles;
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    // Eliminar usuario
    public function eliminar(int $id)
    {
        $data = $this->model->accionUser(0, $id);
        $msg = $data == 1 ? "ok" : "Error al eliminar el usuario";
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    // Reingresar usuario
    public function reingresar(int $id)
    {
        $data = $this->model->accionUser(1, $id);
        $msg = $data == 1 ? "ok" : "Error al reingresar el usuario";
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    // Cerrar sesión
    public function salir()
    {
        session_destroy();
        header("location: " . base_url);
    }
}
?>
