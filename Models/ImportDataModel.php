<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(900);

// Datos de conexión
$con = mysqli_connect(host, user, pass, db);
if (!$con) {
    die("No se ha podido conectar al Servidor: " . mysqli_connect_error());
}
mysqli_query($con, "SET SESSION collation_connection ='utf8_unicode_ci'");

// Parámetros del archivo
$tipo       = $_FILES['dataExcel']['type'];
$tamanio    = $_FILES['dataExcel']['size'];
$archivotmp = $_FILES['dataExcel']['tmp_name'];
$lineas     = file($archivotmp);

if ($lineas === false) {
    die("Error al leer el archivo.");
}

$i = 0;
$registros_importados = 0;
$errores = 0;

foreach ($lineas as $linea) {
    if ($i != 0) { // Omite la primera línea (encabezados)
        $datos = explode(";", $linea);
        
        // Extracción y limpieza de datos
        $id             = !empty($datos[0]) ? mysqli_real_escape_string($con, $datos[0]) : '';
        $telefono       = !empty($datos[1]) ? mysqli_real_escape_string($con, $datos[1]) : '';
        $medio          = !empty($datos[2]) ? mysqli_real_escape_string($con, $datos[2]) : '';
        $subgerente     = !empty($datos[3]) ? mysqli_real_escape_string($con, $datos[3]) : '';
        $coordinador    = !empty($datos[4]) ? mysqli_real_escape_string($con, $datos[4]) : '';
        $supervisor     = !empty($datos[5]) ? mysqli_real_escape_string($con, $datos[5]) : '';
        $fecha          = !empty($datos[6]) ? mysqli_real_escape_string($con, $datos[6]) : '';
        $codigo         = !empty($datos[7]) ? mysqli_real_escape_string($con, $datos[7]) : '';
        $ubicacion      = !empty($datos[8]) ? mysqli_real_escape_string($con, $datos[8]) : '';
        $promotor       = !empty($datos[9]) ? mysqli_real_escape_string($con, $datos[9]) : '';
        $punto_venta    = !empty($datos[10]) ? mysqli_real_escape_string($con, $datos[10]) : '';
        $departamento   = !empty($datos[11]) ? mysqli_real_escape_string($con, $datos[11]) : '';
        $zona           = !empty($datos[12]) ? mysqli_real_escape_string($con, $datos[12]) : '';
        $distribuidor   = !empty($datos[13]) ? mysqli_real_escape_string($con, $datos[13]) : '';
        $proveedor      = !empty($datos[14]) ? mysqli_real_escape_string($con, $datos[14]) : '';
        $producto       = !empty($datos[15]) ? mysqli_real_escape_string($con, $datos[15]) : '';
        $perfil_plan    = !empty($datos[16]) ? mysqli_real_escape_string($con, $datos[16]) : '';
        $tecnologia     = !empty($datos[17]) ? mysqli_real_escape_string($con, $datos[17]) : '';
        $centro_venta   = !empty($datos[18]) ? mysqli_real_escape_string($con, $datos[18]) : '';
        $canal_rediac   = !empty($datos[19]) ? mysqli_real_escape_string($con, $datos[19]) : '';
        $aliado         = !empty($datos[20]) ? mysqli_real_escape_string($con, $datos[20]) : '';
        $estado         = !empty($datos[21]) ? mysqli_real_escape_string($con, $datos[21]) : '';

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

        if (!mysqli_query($con, $insertarData)) {
            echo "Error en la línea $i: " . mysqli_error($con) . "<br>";
            $errores++;
        } else {
            $registros_importados++;
        }
    }
    $i++;
}

echo "Registros importados: $registros_importados<br>";
echo "Errores: $errores<br>";

mysqli_close($con);
?>
