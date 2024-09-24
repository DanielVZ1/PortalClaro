<?php
    class Ventas extends Controller{
      public function __construct(){
        session_start();
        
        parent::__construct();      
      }
        public function index()
        {
          if (empty($_SESSION['activo'])){
            header("location:".base_url);
          }
      
          $this->views->getView($this,"index");
          
        } 

        public function listar(){
          $data = $this->model->getVentas();
          for ($i=0; $i <count($data); $i++) {  
            if ($data[$i]['estado'] == 1) {
              $data[$i]['estado'] = '<span class="badge badge-success" style="color: green">Activo</span>';
              $data[$i]['acciones'] ='<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarVentas('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarVentas('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
              <div/>';
            }else{
              $data[$i]['estado'] = '<span class="badge badge-danger" style="color:red">Inactivo</span>';
              $data[$i]['acciones'] ='<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarVentas('.$data[$i]['id'].');"><i class="fas fa-sync-alt"></i></button>
              <div/>';
          } 
        } 
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function registrar()
        {
          $telefono = $_POST['telefono'];
          $medio = $_POST['medio'];
          $subgerente = $_POST['subgerente'];
          $coordinador = $_POST['coordinador'];
          $supervisor = $_POST['supervisor'];
          $fecha = $_POST['fecha'];
          $codigo = $_POST['codigo'];
          $ubicacion = $_POST['ubicacion'];
          $promotor = $_POST['promotor'];
          $punto_venta = $_POST['punto_venta'];
          $zona_supervisor = $_POST['zona_supervisor'];
          $distribuidor = $_POST['distribuidor'];
          $producto = $_POST['producto'];
          $perfil_plan = $_POST['perfil_plan'];
          $tecnologia = $_POST['tecnologia'];
          $centro_venta = $_POST['centro_venta'];
          $canal_rediac = $_POST['canal_rediac'];
          $aliado = $_POST['aliado'];
          $id = $_POST['id'];
          if (empty($telefono) || empty($medio) || empty($subgerente) || empty($coordinador) || empty($supervisor) ||
              empty($fecha) || empty($codigo) || empty($ubicacion) || empty($promotor) || empty($punto_venta) ||
              empty($zona_supervisor) || empty($distribuidor) || empty($producto) || empty($perfil_plan) || empty($tecnologia) ||
              empty($centro_venta) || empty($canal_rediac) || empty($aliado)) {
            $msg = "Todos los campos son obligatorios";
          }else{
              if($id == ""){ 
                 $data=  $this->model->registrarVentas($telefono,$medio,$subgerente,$coordinador,$supervisor,
                 $fecha,$codigo,$ubicacion,$promotor,$punto_venta,$zona_supervisor,$distribuidor,$producto,$perfil_plan,
                 $tecnologia,$centro_venta,$canal_rediac,$aliado);
                  if ($data == "ok") {
                    $msg = "si";
                  }else if ($data =="existe"){
                    $msg ="La venta ya existe";
                  }else{
                    $msg ="Error al registrar la venta";
                  }
              }else{
                $data=  $this->model->modificarVentas($telefono,$medio,$subgerente,$coordinador,$supervisor,
                $fecha,$codigo,$ubicacion,$promotor,$punto_venta,$zona_supervisor,$distribuidor,$producto,$perfil_plan,
                $tecnologia,$centro_venta,$canal_rediac,$aliado,$id);
                  if ($data == "modificado") {
                    $msg = "modificado";
                  }else{
                    $msg ="Error al modificar la venta";
                  }

              }
          }
          echo json_encode($msg, JSON_UNESCAPED_UNICODE);
          die();
        }

        public function editar(int $id)
        {
            $data = $this->model->editarVentas($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function eliminar(int $id)
        {
            $data = $this->model->accionVentas(0, $id);
            if ($data == 1){
              $msg = "ok";
            }else{
              $msg = "Error al eliminar la venta";
            }  
           echo json_encode($msg, JSON_UNESCAPED_UNICODE);
           die();
        }

        public function reingresar(int $id)
        {
            $data = $this->model->accionVentas(1, $id);
            if ($data == 1){
              $msg = "ok";
            }else{
              $msg = "Error al reingresar la venta";
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