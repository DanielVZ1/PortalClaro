<?php
class AsistenciaPromotoresModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function verificarCodigo($codigo) 
    {
        $sql = "SELECT id FROM promotores WHERE codigo = '$codigo'";
        return $this->select($sql);
    }

}