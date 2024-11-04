<?php
// Función para obtener el nombre de la base de datos (debe ser reemplazada con tu lógica real)
function obtenerNombreBaseDatos()
{
    // Podrías recuperarlo de una variable global, de una configuración, o realizar una consulta a la base de datos para obtenerlo
    $nombreBaseDatos = "nombre_base_de_datos"; // Reemplaza esto con la forma en que obtienes el nombre

    return $nombreBaseDatos;
}

// Verificar si es una solicitud POST y si se envió el parámetro 'archivo'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['archivo'])) {
    $archivo = $_POST['archivo'];

    // Obtener el nombre de la base de datos utilizando la función definida
    $nombreBaseDatos = obtenerNombreBaseDatos();

    // Ruta permitida para eliminar archivos (directorio específico)
    $rutaPermitida = 'directorio_permitido/';
    // Validar la ruta del archivo para evitar accesos no autorizados
    if (strpos(realpath($archivo), realpath($rutaPermitida)) === 0) {
        // Eliminar el archivo si está en la ruta permitida
        if (unlink($archivo)) {
            // Preparar la respuesta incluyendo el nombre de la base de datos en caso de éxito
            $response = [
                'success' => true,
                'nombreBaseDatos' => $nombreBaseDatos
            ];
            echo json_encode($response);
            exit; // Finalizar la ejecución después de enviar la respuesta
        }
    }
}

// Si la solicitud no es de tipo POST, falta el parámetro 'archivo', o la eliminación falla, enviar una respuesta de error
http_response_code(400); // Establecer código de error 400 (Solicitud incorrecta)
echo json_encode(['success' => false, 'error' => 'Error al procesar la solicitud']);
exit; // Finalizar la ejecución después de enviar la respuesta de error
