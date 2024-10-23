<?php
class AsistenciaPromotoresModel extends Query {

    public function __construct() {
        parent::__construct();
    }

    public function verificarCodigo($codigo) {
        $sql = "SELECT id, estado FROM promotores WHERE codigo = :codigo";
        $params = [':codigo' => $codigo];
    
        try {
            return $this->select1($sql, $params);
        } catch (Exception $e) {
            error_log('Error en verificarCodigo: ' . $e->getMessage());
            return null;
        }
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
        return $this->select1($sql, $params);
    }

    public function guardarAsistencia($codigo, $dni, $nombre, $apellido, $puesto, $proveedor, $zona, $supervisor, $coordinador, $horaEntrada, $horaSalida, $foto, $ubicacion) {
        // Consulta SQL para insertar los datos de asistencia
        $sql = "INSERT INTO asistencia (codigo, dni, nombre, apellido, puesto, proveedor, zona, supervisor, coordinador, hora_entrada, hora_salida, foto, ubicacion, estado) 
                VALUES (:codigo, :dni, :nombre, :apellido, :puesto, :proveedor, :zona, :supervisor, :coordinador, :horaEntrada, :horaSalida, :foto, :ubicacion, 1)";
        
        // Parámetros para la consulta
        $params = [
            ':codigo' => $codigo,
            ':dni' => $dni,
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':puesto' => $puesto,
            ':proveedor' => $proveedor,
            ':zona' => $zona,
            ':supervisor' => $supervisor,
            ':coordinador' => $coordinador,
            ':horaEntrada' => $horaEntrada,
            ':horaSalida' => $horaSalida,
            ':foto' => $foto, // Aquí se guarda el nombre de la foto
            ':ubicacion' => $ubicacion
        ];
        
        // Ejecutar la inserción y devolver el resultado
        return $this->insert($sql, $params);
    }
    

    public function verificarAsistenciaHoy($codigo) {
        $fechaHoy = date('Y-m-d');
        $sql = "SELECT id, hora_salida FROM asistencia WHERE codigo = :codigo AND DATE(hora_entrada) = :fechaHoy";
        $params = [
            ':codigo' => $codigo,
            ':fechaHoy' => $fechaHoy
        ];
        return $this->select1($sql, $params);
    }
    

    public function obtenerAsistenciaPorId($id) {
        $sql = "SELECT * FROM asistencia WHERE id = :id";
        $params = [':id' => $id];
        return $this->select1($sql, $params);
    }

    public function actualizarHoraSalida($id, $horaSalida) {
        $sql = "UPDATE asistencia SET hora_salida = :horaSalida WHERE id = :id";
        $params = [
            ':horaSalida' => $horaSalida,
            ':id' => $id
        ];
        return $this->update($sql, $params); // Asegúrate de que tienes un método update en tu modelo
    }
}
?>
