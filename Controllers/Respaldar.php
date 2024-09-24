<?php
   class Respaldar extends Controller{
    public function __construct(){
      parent::__construct();  
        session_start();
            
      }
      public function index()
      {
        $data['title'] = 'DATOS DE LOS RESPALDOS';
        $data['script'] = 'respaldar.js';
        $this->views->getView1('Respaldar', 'respaldar', $data);
      }
   }
?>