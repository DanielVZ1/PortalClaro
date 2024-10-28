<?php
   class Respaldar extends Controller{
    public function __construct(){
      parent::__construct();  
        session_start();
            
      }
      public function index()
      {
        $data['page_id'] = 2;
        $data['page_tag'] = "Gestión de Respaldos";
        $data['page_name'] = "gestion_respaldo";
        $data['page_title'] = "Gestión de Respaldos <small> </small>";
        $data['title'] = 'DATOS DE LOS RESPALDOS';
        $data['script'] = 'Assets/js/respaldar.js';
        $this->views->getView1('Respaldar', 'respaldar', $data);
      }
   }
?>