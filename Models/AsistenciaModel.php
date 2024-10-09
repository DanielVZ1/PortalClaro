<?php
    class AsistenciaModel extends Query {
        public function __construct() {
            parent::__construct();        
        }
    
        // Método para obtener todos los registros de asistencia
        public function getAsistencia() {
            $sql = "SELECT * FROM asistencia"; // Asegúrate de que el nombre de la tabla sea correcto
            return $this->selectAll($sql); // Usa selectAll para obtener todos los registros
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