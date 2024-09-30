<?php
   class AsistenciaPromotores extends Controller{

   public function __construct()
    {
        parent::__construct();
    }
    public function asistenciapromotores()
    {
        $data['title'] = 'Asistencia de Promotor';
        $this->views->getView1('AsistenciaPromotores', 'asistenciapromotores',$data);
    }
}
?>