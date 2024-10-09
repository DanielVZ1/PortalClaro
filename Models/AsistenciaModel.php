<?php
    class AsistenciaModel extends Query {
        public function __construct() {
            parent::__construct();        
        }
    
        // Método para obtener todos los registros de asistencia
        public function getAsistencias($params) {
            $sql = "SELECT * FROM asistencia";
            $conditions = [];
    
            if (isset($params['fecha'])) {
                $fecha = $params['fecha'];
    
                if ($fecha === 'hoy') {
                    $conditions[] = "DATE(hora_entrada) = CURDATE()";
                } elseif ($fecha === 'semana') {
                    $conditions[] = "YEARWEEK(hora_entrada, 1) = YEARWEEK(CURDATE(), 1)";
                } elseif ($fecha === 'mes') {
                    $conditions[] = "YEAR(hora_entrada) = YEAR(CURDATE()) AND MONTH(hora_entrada) = MONTH(CURDATE())";
                }
            }
    
            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(' AND ', $conditions);
            }
    
            return $this->selectAll($sql);
        }

        public function eliminarAsistencia($id) {
            $sql = "DELETE FROM asistencia WHERE id = :id";
            $params = [":id" => $id];
            return $this->insert($sql, $params); // Asumiendo que insert es el método para ejecutar consultas con parámetros
        }
        
        public function filtrarAsistencias($params) {
            $sql = "SELECT * FROM asistencia WHERE DATE(hora_entrada) = :fecha";
            $fecha = $params['fecha'] ?? date('Y-m-d'); // Usa la fecha pasada o la fecha de hoy
            return $this->selectWithParams($sql, [':fecha' => $fecha]);
        }
        
    
        // Método para registrar un nuevo usuario
        /*public function registrarUsuario($data) {
            $sql = "INSERT INTO usuarios (usuario, nombre, clave, caja) VALUES (?, ?, ?, ?)";
            return $this->execute($sql, $data); // Asegúrate de que `$data` contenga los valores en el orden correcto
        }
    
        // Método para actualizar un registro de asistencia
        public function actualizarAsistencia($id, $data) {
            $sql = "UPDATE asistencia SET campo1 = ?, campo2 = ? WHERE id = ?";
            return $this->execute($sql, [...$data, $id]);
        }
    
        // Método para eliminar un registro de asistencia
        public function eliminarAsistencia($id) {
            $sql = "DELETE FROM asistencia WHERE id = ?";
            return $this->execute($sql, [$id]);
        }*/
    }
    
?>