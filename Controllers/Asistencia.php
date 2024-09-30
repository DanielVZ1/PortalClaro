<?php
    class Asistencia extends Controller{
      public function __construct(){
        session_start();
        if (empty($_SESSION['activo'])){
          header("location:".base_url);
        }
        parent::__construct();      
      }
        public function index()
        {
          $this->views->getView($this,"index");
          
        } 

        public function listar(){
          $data = $this->model->getPromotores();
          for ($i=0; $i <count($data); $i++) {  
            if ($data[$i]['estado'] == 1) {
              $data[$i]['estado'] = '<span class="badge badge-success" style="color: green">Activo</span>';
              $data[$i]['acciones'] ='<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarPromotor('.$data[$i]['id'].');">Editar</button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarPromotor('.$data[$i]['id'].');">Eliminar</i></button>
              <div/>';
            }else{
              $data[$i]['estado'] = '<span class="badge badge-danger" style="color:red">Inactivo</span>';
              $data[$i]['acciones'] ='<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarPromotor('.$data[$i]['id'].');">Reingresar</button>
              <div/>';
          }
        }  
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
      


        public function registrar()
        {
          $nombre = $_POST['nombre'];
          $apellido = $_POST['apellido'];
          $dni = $_POST['dni'];
          $telefono = $_POST['telefono'];
          $direccion = $_POST['direccion'];
          $zona = $_POST['zona'];
          $departamento = $_POST['departamento'];
          $municipio = $_POST['municipio'];
          $gerencia = $_POST['gerencia'];
          $canal = $_POST['canal'];
          $cargo = $_POST['cargo'];
          $estadoCivil = $_POST['estadoCivil'];
          $genero = $_POST['genero'];
          $profesion = $_POST['profesion'];
          $id = $_POST['id'];
          if (empty($nombre) || empty($apellido) || empty($dni) || empty($telefono) || empty($direccion) || 
            empty($zona) || empty($departamento) || empty($municipio) || empty($gerencia) || empty($canal) ||
            empty($cargo) || empty($estadoCivil) || empty($genero) || empty($profesion)) {
            $msg = "Todos los campos son obligatorios";
          }else{
              if($id == ""){
                  $data=  $this->model->registrarPromotor($nombre,$apellido,$dni,$telefono,$direccion,$zona,
                          $departamento,$municipio,$gerencia,$canal,$cargo,$estadoCivil,$genero,$profesion);
                  if ($data == "ok") {
                    $msg = "si";
                  }else if ($data =="existe"){
                    $msg ="El dni ya existe";
                  }else{
                    $msg ="Error al registrar el promotor";
                  }
              }else{
                $data=  $this->model->modificarPromotor($nombre,$apellido,$dni,$telefono,$direccion,$zona,
                $departamento,$municipio,$gerencia,$canal,$cargo,$estadoCivil,$genero,$profesion,$id);
                  if ($data == "modificado") {
                    $msg = "modificado";
                  }else{
                    $msg ="Error al modificar el promotor";
                  }

              }
          }
          echo json_encode($msg, JSON_UNESCAPED_UNICODE);
          die();
        }

        public function editar(int $id)
        {
            $data = $this->model->editarPromotor($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function eliminar(int $id)
        {
            $data = $this->model->accionPromotor(0, $id);
            if ($data == 1){
              $msg = "ok";
            }else{
              $msg = "Error al eliminar el promotor";
            }  
           echo json_encode($msg, JSON_UNESCAPED_UNICODE);
           die();
        }

        public function reingresar(int $id)
        {
            $data = $this->model->accionPromotor(1, $id);
            if ($data == 1){
              $msg = "ok";
            }else{
              $msg = "Error al reingresar el promotor";
            }  
           echo json_encode($msg, JSON_UNESCAPED_UNICODE);
           die();
        }

    }
?>