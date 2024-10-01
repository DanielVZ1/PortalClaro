<?php
    class Usuarios extends Controller{
      public function __construct(){
        session_start();
        parent::__construct();      
      }

      public function index()
      {
        if (empty($_SESSION['activo'])){
          header("location:".base_url);
        }
        $data['cajas'] = $this->model->getCajas();
        $this->views->getView($this,"index",$data);
      } 

      public function listar(){
        $data = $this->model->getUsuarios();
        for ($i = 0; $i < count($data); $i++) {  
          if ($data[$i]['estado'] == 1) {
            $data[$i]['estado'] = '<span class="badge badge-success" style="color: green">Activo</span>';
            $data[$i]['acciones'] = '<div>
              <button class="btn btn-primary" type="button" onclick="btnEditarUser('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button>
              <button class="btn btn-danger" type="button" onclick="btnEliminarUser('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <div/>';
          } else {
            $data[$i]['estado'] = '<span class="badge badge-danger" style="color:red">Inactivo</span>';
            $data[$i]['acciones'] = '<div>
              <button class="btn btn-success" type="button" onclick="btnReingresarUser('.$data[$i]['id'].');"><i class="fas fa-sync-alt"></i></button>
            <div/>';
          }
        }
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
    

      public function registrar()
      {
        $usuario = strClean($_POST['usuario']);
        $nombre = strClean($_POST['nombre']);
        $email = strClean($_POST['email']); // Se añade el email
        $clave = strClean($_POST['clave']);
        $confirmar = strClean($_POST['confirmar']);
        $caja = strClean($_POST['caja']);
        $id = strClean($_POST['id']);
        $hash = password_hash($clave, PASSWORD_DEFAULT);

        if (empty($usuario) || empty($nombre) || empty($email) || empty($caja)) {
          $msg = "Todos los campos son obligatorios";
        } else {
          if ($id == "") {
            if ($clave != $confirmar) {
              $msg = "Las contraseñas no coinciden";
            } else {
              $data = $this->model->registrarUsuario($usuario, $nombre, $hash, $email, $caja);
              if ($data == "ok") {
                $msg = "si";
              } else if ($data == "existe") {
                $msg = "El usuario ya existe";
              } else {
                $msg = "Error al registrar el usuario";
              }
            }
          } else {
            $data = $this->model->modificarUsuario($usuario, $nombre, $email, $caja, $id); // Modificar con email
            if ($data == "modificado") {
              $msg = "modificado";
            } else {
              $msg = "Error al modificar el usuario";
            }
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
      public function permisos($id)
      {
        if (empty($_SESSION['activo'])){
          header("location:" . base_url);
        }
        $data['datos']= $this->model->getPermisos();
        $data['id_usuario']= $id;
        $this->views->getView($this,"permisos",$data);
      }
      public function registrarPermisos()
      {
        $id_user = $_POST['id_usuario'];
        $eliminar = $this->model->eliminarPermisos($id_user);
        foreach($_POST['permisos'] as $id_permiso){
          $this->model->registrarPermisos($id_user, $id_permiso);

        }
      }
      public function salir()
      {
        session_destroy();
        header("location: ".base_url);
      }
    }
?>