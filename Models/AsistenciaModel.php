<?php
class AsistenciaModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    // Método para obtener todos los registros de asistencia
    public function getAsistencias($filtro = null, $fecha = null)
    {
        $sql = "SELECT * FROM asistencia";
        $params = [];

        if ($filtro) {
            // Aquí se construye la consulta según el filtro
            switch ($filtro) {
                case 'hoy':
                    $sql .= " WHERE DATE(hora_entrada) = CURDATE()";
                    break;
                case 'ayer':
                    $sql .= " WHERE DATE(hora_entrada) = CURDATE() - INTERVAL 1 DAY";
                    break;
                case 'semana':
                    $sql .= " WHERE YEARWEEK(hora_entrada, 1) = YEARWEEK(CURDATE(), 1)";
                    break;
                case 'mes':
                    $sql .= " WHERE MONTH(hora_entrada) = MONTH(CURDATE()) AND YEAR(hora_entrada) = YEAR(CURDATE())";
                    break;
                case 'hace_semanas':
                    $sql .= " WHERE DATE(hora_entrada) < CURDATE() - INTERVAL 1 WEEK";
                    break;
                case 'hace_meses':
                    $sql .= " WHERE DATE(hora_entrada) < CURDATE() - INTERVAL 1 MONTH";
                    break;
            }
        } elseif ($fecha) {
            $sql .= " WHERE DATE(hora_entrada) = :fecha";
            $params = [':fecha' => $fecha];
        }

        return $this->selectWithParams($sql, $params);
    }


    public function eliminarAsistencia($id)
    {
        // Primero, obtener el nombre de la foto asociada
        $sql = "SELECT foto FROM asistencia WHERE id = :id";
        $params = [":id" => $id];
        $fotoData = $this->selectWithParams($sql, $params);

        // Verifica si se encontró la foto
        if (!empty($fotoData) && isset($fotoData[0]['foto'])) {
            $nombreFoto = $fotoData[0]['foto'];
            $rutaFoto = "Assets/img/FotosAsistencias/" . $nombreFoto;

            // Eliminar el archivo de la ruta
            if (file_exists($rutaFoto)) {
                unlink($rutaFoto);
            }
        }

        // Ahora, proceder a eliminar el registro de la base de datos
        $sql = "DELETE FROM asistencia WHERE id = :id";
        $params = [":id" => $id];

        return $this->insert($sql, $params); // Asumiendo que insert es el método para ejecutar consultas con parámetros
    }


    public function filtrarAsistencias($params)
    {
        $sql = "SELECT * FROM asistencia WHERE DATE(hora_entrada) = :fecha";
        $fecha = $params['fecha'] ?? date('Y-m-d'); // Usa la fecha pasada o la fecha de hoy
        return $this->selectWithParams($sql, [':fecha' => $fecha]);
    }

    public function verAsistencia(int $id)
    {
        $sql = "SELECT * FROM asistencia WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
}
