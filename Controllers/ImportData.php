<?php
class ImportadorVentas {
    private $conexion;

    public function __construct($host, $user, $pass, $db) {
        $this->conexion = $this->conectar($host, $user, $pass, $db);
    }

    private function conectar($host, $user, $pass, $db) {
        $con = mysqli_connect($host, $user, $pass, $db);
        if (!$con) {
            die("No se ha podido conectar al Servidor: " . mysqli_connect_error());
        }
        mysqli_query($con, "SET SESSION collation_connection ='utf8_unicode_ci'");
        return $con;
    }

    public function importarDatosDesdeExcel($archivoExcel) {
        $tipo = $archivoExcel['type'];
        $tamanio = $archivoExcel['size'];
        $archivotmp = $archivoExcel['tmp_name'];
        $lineas = file($archivotmp);

        if ($lineas === false) {
            die("Error al leer el archivo.");
        }

        $i = 0;
        $registros_importados = 0;
        $errores = 0;

        foreach ($lineas as $linea) {
            if ($i != 0) { // Omite la primera línea (encabezados)
                $datos = explode(";", $linea);
                $resultado = $this->insertarDatos($datos);

                if ($resultado['error']) {
                    echo "Error en la línea $i: " . $resultado['mensaje'] . "<br>";
                    $errores++;
                } else {
                    $registros_importados++;
                }
            }
            $i++;
        }

        echo "Registros importados: $registros_importados<br>";
        echo "Errores: $errores<br>";

        $this->cerrarConexion();
    }

    private function insertarDatos($datos) {
        // Extracción y limpieza de datos
        $id = !empty($datos[0]) ? mysqli_real_escape_string($this->conexion, $datos[0]) : '';
        $telefono = !empty($datos[1]) ? mysqli_real_escape_string($this->conexion, $datos[1]) : '';
        $medio = !empty($datos[2]) ? mysqli_real_escape_string($this->conexion, $datos[2]) : '';
        $subgerente = !empty($datos[3]) ? mysqli_real_escape_string($this->conexion, $datos[3]) : '';
        $coordinador = !empty($datos[4]) ? mysqli_real_escape_string($this->conexion, $datos[4]) : '';
        $supervisor = !empty($datos[5]) ? mysqli_real_escape_string($this->conexion, $datos[5]) : '';
        $fecha = !empty($datos[6]) ? mysqli_real_escape_string($this->conexion, $datos[6]) : '';
        $codigo = !empty($datos[7]) ? mysqli_real_escape_string($this->conexion, $datos[7]) : '';
        $ubicacion = !empty($datos[8]) ? mysqli_real_escape_string($this->conexion, $datos[8]) : '';
        $promotor = !empty($datos[9]) ? mysqli_real_escape_string($this->conexion, $datos[9]) : '';
        $punto_venta = !empty($datos[10]) ? mysqli_real_escape_string($this->conexion, $datos[10]) : '';
        $departamento = !empty($datos[11]) ? mysqli_real_escape_string($this->conexion, $datos[11]) : '';
        $zona = !empty($datos[12]) ? mysqli_real_escape_string($this->conexion, $datos[12]) : '';
        $distribuidor = !empty($datos[13]) ? mysqli_real_escape_string($this->conexion, $datos[13]) : '';
        $proveedor = !empty($datos[14]) ? mysqli_real_escape_string($this->conexion, $datos[14]) : '';
        $producto = !empty($datos[15]) ? mysqli_real_escape_string($this->conexion, $datos[15]) : '';
        $perfil_plan = !empty($datos[16]) ? mysqli_real_escape_string($this->conexion, $datos[16]) : '';
        $tecnologia = !empty($datos[17]) ? mysqli_real_escape_string($this->conexion, $datos[17]) : '';
        $centro_venta = !empty($datos[18]) ? mysqli_real_escape_string($this->conexion, $datos[18]) : '';
        $canal_rediac = !empty($datos[19]) ? mysqli_real_escape_string($this->conexion, $datos[19]) : '';
        $aliado = !empty($datos[20]) ? mysqli_real_escape_string($this->conexion, $datos[20]) : '';
        $estado = !empty($datos[21]) ? mysqli_real_escape_string($this->conexion, $datos[21]) : '';

        // Inserción en la tabla ventas
        $insertarData = "INSERT INTO ventas (
            id, telefono, medio, subgerente, coordinador, supervisor, fecha, codigo, ubicacion, 
            promotor, punto_venta, departamento, zona, distribuidor, proveedor, producto, 
            perfil_plan, tecnologia, centro_venta, canal_rediac, aliado, estado
        ) VALUES (
            '$id', '$telefono', '$medio', '$subgerente', '$coordinador', '$supervisor', '$fecha', '$codigo', 
            '$ubicacion', '$promotor', '$punto_venta', '$departamento', '$zona', '$distribuidor', 
            '$proveedor', '$producto', '$perfil_plan', '$tecnologia', '$centro_venta', '$canal_rediac', 
            '$aliado', '$estado'
        )";

        if (!mysqli_query($this->conexion, $insertarData)) {
            return ['error' => true, 'mensaje' => mysqli_error($this->conexion)];
        }
        return ['error' => false];
    }

    private function cerrarConexion() {
        mysqli_close($this->conexion);
    }
}

// Uso del controlador
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['dataExcel'])) {
    $importador = new ImportadorVentas('localhost', 'root', '', 'sistema');
    $importador->importarDatosDesdeExcel($_FILES['dataExcel']);
}
?>
