<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servidor = "localhost";
    $usuario = "root"; // Reemplaza con tu nombre de usuario de la base de datos
    $contrasena = ""; // Reemplaza con tu contraseña de la base de datos
    $baseDeDatos = "sistema"; // Reemplaza con el nombre de tu base de datos

    if (isset($_FILES["archivoRespaldo"]) && $_FILES["archivoRespaldo"]["error"] == UPLOAD_ERR_OK) {
        $archivoRespaldo = $_FILES["archivoRespaldo"]["tmp_name"];

        $conexion = new mysqli($servidor, $usuario, $contrasena, $baseDeDatos);

        if ($conexion->connect_error) {
            http_response_code(500);
            echo json_encode(array("error" => "Error de conexión a la base de datos: " . $conexion->connect_error));
            exit;
        }

        $queries = file_get_contents($archivoRespaldo);

        if ($conexion->multi_query($queries)) {
            do {
                if ($resultado = $conexion->store_result()) {
                    $resultado->free();
                }
            } while ($conexion->more_results() && $conexion->next_result());

            // Cerrar todas las sesiones activas
            session_start();
            session_destroy(); // Esto eliminará todas las sesiones activas

            // Devolver respuesta JSON indicando el éxito y el cierre de sesiones
            echo json_encode(array("message" => "La base de datos ha sido restaurada con éxito y todas las sesiones han sido cerradas."));
        } else {
            http_response_code(500);
            echo json_encode(array("error" => "Error en la restauración de la base de datos: " . $conexion->error));
        }
        $conexion->close();
        exit;
    } else {
        http_response_code(400);
        echo json_encode(array("error" => "No se ha proporcionado un archivo de respaldo válido."));
        exit;
    }
}
?>
