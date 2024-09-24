<?php
// Configuración de la base de datos
$host = 'localhost';
$usuario = 'root';
$contraseña = '';
$base_de_datos = 'sistema';

// Ruta donde se guardarán los archivos de respaldo (en la carpeta 'backup' dentro del directorio actual)
$ruta_respaldos = __DIR__ . '/Backups';


// Intentar establecer la conexión a la base de datos
try {
    $conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

    if ($conexion->connect_error) {
        throw new Exception("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Obtener la fecha y hora actual
    date_default_timezone_set('America/Tegucigalpa');
    $fecha_hora = date('Y-m-d_H.i.s');

    // Nombre del archivo de respaldo con nombre de la base de datos y fecha y hora
    $archivo_respaldar = str_replace('Backups', '', "$base_de_datos" . "_$fecha_hora.sql");

    // Comando para hacer el respaldo usando mysqldump con la ruta y nombre de archivo personalizados
    $comando = "mysqldump --host=$host --user=$usuario --password=$contraseña --databases $base_de_datos > $ruta_respaldos$archivo_respaldar";

    // Ejecutar el comando para hacer el respaldo
    exec($comando);

    // Verificar si el respaldo se ha creado correctamente
    if (file_exists($ruta_respaldos . $archivo_respaldar)) {
        echo json_encode(array("message" => "¡Respaldo creado correctamente en la carpeta 'backup'!"));
    } else {
        echo json_encode(array("error" => "Error al crear el respaldo en la carpeta 'backup'."));
    }
} catch (Exception $e) {
    // Manejar el error de conexión a la base de datos
    echo json_encode(array("error" => $e->getMessage()));
}
?>
