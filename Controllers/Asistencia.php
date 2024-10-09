<?php
    class Asistencia extends Controller {
      public function __construct() {
          session_start();
          if (empty($_SESSION['activo'])) {
              header("location:" . base_url);
          }
          parent::__construct();
      }
  
      public function index() {
          $this->views->getView1("Asistencia", "index");
      }
  

      public function eliminar($id) {
        $asistenciaModel = new AsistenciaModel();
        $resultado = $asistenciaModel->eliminarAsistencia($id);
        
        if ($resultado) {
            echo json_encode("ok");
        } else {
            echo json_encode("Error al eliminar la asistencia");
        }
    }
    
    public function filtrar() {
      $params = json_decode(file_get_contents("php://input"), true);
      $asistencias = $this->model->getAsistencias($params);
      echo json_encode($asistencias);
  }
  
  }
  
  

    
?>