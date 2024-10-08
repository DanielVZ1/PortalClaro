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
        $sql = "SELECT p.codigo, p.dni, p.nombre, p.apellido, p.id_cargo, 
                       c.cargo AS nombre_cargo, 
                       p.id_zona, z.zona AS nombre_zona
                FROM promotores p
                LEFT JOIN cargo c ON p.id_cargo = c.id
                LEFT JOIN zona z ON p.id_zona = z.id
                WHERE p.codigo = :codigo";
        $params = [':codigo' => $codigo];
        $result = $this->select1($sql, $params);
        
        //error_log(print_r($result, true)); // Para depuración
        //return $result;

        //var_dump($result); // Agrega esto para ver el resultado
        return $result;
    }
    
       
    
    
    
    
}