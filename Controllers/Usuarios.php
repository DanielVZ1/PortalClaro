
<?php
class Usuarios extends Controller
{
  public function __construct()
  {
    session_start();
    parent::__construct();
  }
  public function index()
  {
    $data['page_id'] = 1;
    $data['page_tag'] = "Usuarios";
    $data['page_name'] = "Lista_Usuario";
    $data['page_title'] = "Usuarios <small> </small>";
    $this->views->getView($this, "index", $data);
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
                          <svg class="delete-svgIcon" viewBox="0 0 640 512" style="width: 1em; height: 1em; fill: white;">
                              <path d="M320 256c-70.7 0-128 57.3-128 128s57.3 128 128 128 128-57.3 128-128-57.3-128-128-128zm0 224c-52.9 0-96-43.1-96-96s43.1-96 96-96 96 43.1 96 96-43.1 96-96 96zm224-224c0-119-97-216-216-216S16 113 16 232c0 48.8 16.8 94.1 44.6 130.8l-18.6 72.4c-3.2 12.6 8.6 23.1 21.6 19.3l73.1-18.6c36.6 27.6 81.5 44.8 130.5 44.8 119 0 216-97 216-216zM224 16c-119 0-216 97-216 216 0 32.2 6.6 62.7 18.4 90.1l-18.4 72.4c-3.2 12.6 8.6 23.1 21.6 19.3l73.1-18.6c36.6 27.6 81.5 44.8 130.5 44.8 119 0 216-97 216-216S343 16 224 16z"></path>
                          </svg>
                      </button>
                  </div>';
              }
          } else {
              $data[$i]['estado'] = '<span class="badge badge-danger" style="color: red">Inactivo</span>';
            $data[$i]['acciones'] = '<div style="display: flex; align-items: center;">
                <button class="activate-button" onclick="btnReingresarUser(' . $data[$i]['id'] . ');" style="margin-right: 5px;">
                    <svg class="activate-svgIcon" viewBox="0 0 512 512" style="width: 1em; height: 1em;">
                        <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256 256-114.6 256-256S397.4 0 256 0zm0 480c-123.7 0-224-100.3-224-224S132.3 32 256 32s224 100.3 224 224-100.3 224-224 224zm112-256c0 13.3-10.7 24-24 24h-40v40c0 13.3-10.7 24-24 24s-24-10.7-24-24v-40h-40c-13.3 0-24-10.7-24-24s10.7-24 24-24h40v-40c0-13.3 10.7-24 24-24s24 10.7 24 24v40h40c13.3 0 24 10.7 24 24z" fill="white"></path>
                    </svg>
                </button>
            </div>';
          }
      }
      header('Content-Type: application/json');
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();
  }
  
  
  
  public function validar()
  {
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
      $msg = "¡Los campos están vacíos!";
    } else {
      $usuario = $_POST['usuario'];
      $clave = $_POST['clave'];

      // Obtiene el usuario de la base de datos sin la contraseña
      $data = $this->model->getUsuario($usuario);

      if ($data) {
        // Compara la contraseña ingresada con el hash almacenado
        if (password_verify($clave, $data['clave'])) {
          $_SESSION['id_usuario'] = $data['id'];
          $_SESSION['usuario'] = $data['usuario'];
          $_SESSION['nombre'] = $data['nombre'];
          $_SESSION['activo'] = true;
          $msg = "ok";
        } else {
          $msg = "¡Usuario o contraseña incorrecta!";
        }
      } else {
        $msg = "¡Usuario o contraseña incorrecta!";
      }
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
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

    if (empty($usuario) || empty($nombre) || empty($email) || empty($id_rol)) {
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


  public function editar(int $id)
  {
    $data = $this->model->editarUser($id);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function eliminar(int $id)
  {
    $data = $this->model->accionUser(0, $id);
    if ($data == 1) {
      $msg = "ok";
    } else {
      $msg = "Error al eliminar el usuario";
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function reingresar(int $id)
  {
    $data = $this->model->accionUser(1, $id);
    if ($data == 1) {
      $msg = "ok";
    } else {
      $msg = "Error al reingresar el usuario";
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
  }
  public function salir()
  {
    session_destroy();
    header("location: " . base_url);
  }
}


?>