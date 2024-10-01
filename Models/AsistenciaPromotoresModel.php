<?php
class AsistenciaPromotoresModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function verificarCodigo($codigo) 
    {
        $sql = "SELECT id FROM promotores WHERE codigo = :codigo"; // Usa un marcador de posición
        $params = [':codigo' => $codigo]; // Crea un array de parámetros
        return $this->select1($sql, $params); // Pasa los parámetros aquí
    }
    
    

}