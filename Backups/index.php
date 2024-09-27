<?php
// Configuración de la base de datos
$host = 'localhost';
$usuario = 'root';
$contraseña = '';
$base_de_datos = 'sistema';

// Ruta donde se guardarán los archivos de respaldo
$ruta_respaldos = __DIR__ . '/Backups';

// Crear la carpeta de respaldos si no existe
if (!is_dir($ruta_respaldos)) {
    mkdir($ruta_respaldos, 0777, true);
}

// Intentar establecer la conexión a la base de datos
try {
    $conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

    if ($conexion->connect_error) {
        throw new Exception("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Obtener la fecha y hora actual
    date_default_timezone_set('America/Tegucigalpa');
    $fecha_hora = date('Y-m-d_H.i.s');

    // Nombre del archivo de respaldo
    $archivo_respaldar = "$base_de_datos" . "_$fecha_hora.sql";

    // Comando para hacer el respaldo usando la ruta completa a mysqldump
    $comando = "C:\\xampp\\mysql\\bin\\mysqldump.exe --host=$host --user=$usuario --password=$contraseña --databases $base_de_datos > $ruta_respaldos\\$archivo_respaldar 2>&1";

    // Ejecutar el comando para hacer el respaldo
    exec($comando);

    // Verificar si el respaldo se ha creado correctamente
    if (file_exists($ruta_respaldos . '\\' . $archivo_respaldar)) {
        echo json_encode(array("message" => "¡Respaldo creado correctamente en la carpeta 'Backups'!"));
    } else {
        echo json_encode(array("error" => "Error al crear el respaldo en la carpeta 'Backups'."));
    }
} catch (Exception $e) {
    // Manejar el error de conexión a la base de datos
    echo json_encode(array("error" => $e->getMessage()));
}
?>
