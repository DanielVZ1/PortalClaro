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
          for ($i = 0; $i < count($data); $i++) {  
            if ($data[$i]['estado'] == 1) {
              $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarVentas('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarVentas('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
              <div/>';
            } else {
              $data[$i]['acciones'] = '<div>
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
          $departamento = $_POST['departamento'];
          $zona = $_POST['zona'];
          $distribuidor = $_POST['distribuidor'];
          $proveedor = $_POST['proveedor'];
          $producto = $_POST['producto'];
          $perfil_plan = $_POST['perfil_plan'];
          $tecnologia = $_POST['tecnologia'];
          $centro_venta = $_POST['centro_venta'];
          $canal_rediac = $_POST['canal_rediac'];
          $aliado = $_POST['aliado'];
          $id = $_POST['id'];
          if (empty($telefono) || empty($medio) || empty($subgerente) || empty($coordinador) || empty($supervisor) ||
              empty($fecha) || empty($codigo) || empty($ubicacion) || empty($promotor) || empty($punto_venta) || empty($departamento) ||
              empty($zona) || empty($distribuidor)|| empty($proveedor) || empty($producto) || empty($perfil_plan) || empty($tecnologia) ||
              empty($centro_venta) || empty($canal_rediac) || empty($aliado)) {
            $msg = "Todos los campos son obligatorios";
          }else{
              if($id == ""){ 
                 $data=  $this->model->registrarVentas($telefono,$medio,$subgerente,$coordinador,$supervisor,
                 $fecha,$codigo,$ubicacion,$promotor,$punto_venta,$departamento,$zona,$distribuidor,$proveedor,$producto,$perfil_plan,
                 $tecnologia,$centro_venta,$canal_rediac,$aliado);
                  if ($data == "ok") {
                    $msg = "si";
                  }else{
                    $msg ="Error al registrar la venta";
                  }
              }else{
                $data=  $this->model->modificarVentas($telefono,$medio,$subgerente,$coordinador,$supervisor,
                $fecha,$codigo,$ubicacion,$promotor,$punto_venta,$departamento,$zona,$distribuidor,$proveedor,$producto,$perfil_plan,
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

        public function eliminar($id) {
          $ventasModel = new VentasModel();
          $resultado = $ventasModel->eliminarVentas($id);
          
          if ($resultado) {
              echo json_encode("ok");
          } else {
              echo json_encode("Error al eliminar la venta");
          }
        }

        public function salir()
        {
            session_destroy();
            header("location: ".base_url);
        }

    }
?>