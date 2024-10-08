<?php
class Query extends Conexion {
    private $pdo, $con, $sql, $datos;
    
    public function __construct() {
        $this->pdo = new Conexion();
        $this->con = $this->pdo->conect();
    }
    
    public function select(string $sql) {
        $this->sql = $sql;
        $resul = $this->con->prepare($this->sql);
        $resul->execute();
        $data = $resul->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function select1(string $sql, array $params = []) {
        $this->sql = $sql;
        $resul = $this->con->prepare($this->sql);
        $resul->execute($params); // Ejecuta la consulta con los parámetros
        return $resul->fetch(PDO::FETCH_ASSOC); // Obtiene solo un resultado
    }
    
    

    public function selectAll(string $sql) {
        $this->sql = $sql;
        $resul = $this->con->prepare($this->sql);
        $resul->execute();
        $data = $resul->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function save(string $sql, array $datos) {
        $this->sql = $sql;
        $this->datos = $datos;
        $insert = $this->con->prepare($this->sql);
        $data = $insert->execute($this->datos);
        return $data ? 1 : 0;
    }
    
    public function insertar($sql, $array)
    {
        $result = $this->con->prepare($sql);
        $data = $result->execute($array);
        if ($data){
            $res = $this->con->lastInsertId();
        }else {
            $res = 0;
        }
        return $res;
    }

    public function insert(string $sql, array $params = []) {
        $this->sql = $sql;
        $stmt = $this->con->prepare($this->sql);
        return $stmt->execute($params); // Devuelve true si la inserción fue exitosa
    }
    

    public function selectWithParams(string $sql, array $params) {
        $this->sql = $sql;
        $resul = $this->con->prepare($this->sql);
        $resul->execute($params);
        $data = $resul->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>
