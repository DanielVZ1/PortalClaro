
<?php
    class Usuarios extends Controller{
      public function __construct(){
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


    public function listar() {
      $data = $this->model->getUsuarios();
      for ($i = 0; $i < count($data); $i++) {  
          if ($data[$i]['estado'] == 1) {
              $data[$i]['estado'] = '<span class="badge badge-success" style="color: green">Activo</span>';
              $data[$i]['acciones'] = '<div>
                  <button class="btn btn-primary" onclick="btnEditarUser('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-danger" onclick="btnEliminarUser('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
              </div>';
          } else {
              $data[$i]['estado'] = '<span class="badge badge-danger"style="color: red">Inactivo</span>';
              $data[$i]['acciones'] = '<div>
                  <button class="btn btn-success" onclick="btnReingresarUser('.$data[$i]['id'].');"><i class="fas fa-sync-alt"></i></button>
              </div>';
          }
      }
      header('Content-Type: application/json');
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();
  }
  


      public function validar() {
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
    

    public function registrar() {
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
        header("location: ".base_url);
      }
    }
?>