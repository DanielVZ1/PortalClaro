<?php
    class Asistencia extends Controller {
      public function __construct() {
          session_start();
          if (empty($_SESSION['activo'])) {
              header("location:".base_url);
              exit;
          }
          parent::__construct();      
      }
  
      public function index() {
          $datos = $this->model->getAsistencia();
          $this->views->getView1("Asistencia", "index", $datos);
      }
  }
  
  

    
?>