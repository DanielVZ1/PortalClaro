<?php
class AsistenciaPromotoresModel extends Query {
    public function __construct() {
        parent::__construct();
    }

    public function verificarCodigo($codigo) {
        $sql = "SELECT id FROM promotores WHERE codigo = :codigo";
        $params = [':codigo' => $codigo];
        return $this->select1($sql, $params);
    }

    public function obtenerDatosPromotor($codigo) {
        $sql = "SELECT codigo, dni, nombre, apellido, id_cargo, id_zona FROM promotores WHERE codigo = :codigo";
        $params = [':codigo' => $codigo];
        return $this->select1($sql, $params);
    }
    
}
