<?php
   class Respaldar extends Controller{
    public function __construct(){
        session_start();
        parent::__construct();      
      }
    public function index()
    {
      if (empty($_SESSION['activo'])){
        header("location:".base_url);
      }
      $this->views->getView($this,"respaldar");
      
    } 
   }
?>