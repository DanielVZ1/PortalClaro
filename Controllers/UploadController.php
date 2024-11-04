<?php
require __DIR__ . '/../vendor/autoload.php'; // Asegúrate de que la ruta sea correcta

use PhpOffice\PhpSpreadsheet\IOFactory;

class UploadController {
    private $con;

    public function __construct() {
        // Conexión a la base de datos
        $this->con = mysqli_connect('localhost', 'root', '', 'sistema');
        if (!$this->con) {
            die("No se ha podido conectar al Servidor: " . mysqli_connect_error());
        }
        mysqli_query($this->con, "SET SESSION collation_connection ='utf8_unicode_ci'");
    }

    public function uploadExcel() {
        // Verifica si se ha enviado un archivo
        if (!isset($_FILES['dataExcel']) || $_FILES['dataExcel']['error'] !== UPLOAD_ERR_OK) {
            $this->showAlert('Error al cargar el archivo.', 'danger');
            return;
        }

        $archivotmp = $_FILES['dataExcel']['tmp_name'];

        // Carga el archivo Excel
        $spreadsheet = IOFactory::load($archivotmp);
        $worksheet = $spreadsheet->getActiveSheet();

        $registros_importados = 0;
        $errores = 0;

        foreach ($worksheet->getRowIterator() as $i => $row) {
            if ($i === 0) continue; // Omite la primera línea (encabezados)

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $datos = [];
            foreach ($cellIterator as $cell) {
                // Asegúrate de que el valor no sea null y sea tratado como string
                $valor = $cell->getValue();
                $datos[] = mysqli_real_escape_string($this->con, $valor !== null ? (string)$valor : '');
            }

            // Verificar si el registro ya existe
            $id = $datos[0];
            $checkQuery = "SELECT * FROM ventas WHERE id = '$id'";
            $result = mysqli_query($this->con, $checkQuery);

            if (mysqli_num_rows($result) > 0) {
                // Actualizar el registro existente
                $updateQuery = "UPDATE ventas SET 
                    telefono = '{$datos[1]}', medio = '{$datos[2]}', subgerente = '{$datos[3]}', 
                    coordinador = '{$datos[4]}', supervisor = '{$datos[5]}', fecha = '{$datos[6]}', 
                    codigo = '{$datos[7]}', ubicacion = '{$datos[8]}', promotor = '{$datos[9]}', 
                    punto_venta = '{$datos[10]}', departamento = '{$datos[11]}', zona = '{$datos[12]}', 
                    distribuidor = '{$datos[13]}', proveedor = '{$datos[14]}', producto = '{$datos[15]}', 
                    perfil_plan = '{$datos[16]}', tecnologia = '{$datos[17]}', centro_venta = '{$datos[18]}', 
                    canal_rediac = '{$datos[19]}', aliado = '{$datos[20]}', estado = '{$datos[21]}'
                    WHERE id = '$id'";

                if (!mysqli_query($this->con, $updateQuery)) {
                    $errores++;
                } else {
                    $registros_importados++;
                }
            } else {
                // Insertar nuevo registro
                $insertarData = "INSERT INTO ventas (
                    id, telefono, medio, subgerente, coordinador, supervisor, fecha, codigo, ubicacion, 
                    promotor, punto_venta, departamento, zona, distribuidor, proveedor, producto, 
                    perfil_plan, tecnologia, centro_venta, canal_rediac, aliado, estado
                ) VALUES (
                    '{$datos[0]}', '{$datos[1]}', '{$datos[2]}', '{$datos[3]}', '{$datos[4]}', 
                    '{$datos[5]}', '{$datos[6]}', '{$datos[7]}', '{$datos[8]}', '{$datos[9]}', 
                    '{$datos[10]}', '{$datos[11]}', '{$datos[12]}', '{$datos[13]}', '{$datos[14]}', 
                    '{$datos[15]}', '{$datos[16]}', '{$datos[17]}', '{$datos[18]}', '{$datos[19]}', 
                    '{$datos[20]}', '{$datos[21]}'
                )";

                if (!mysqli_query($this->con, $insertarData)) {
                    $errores++;
                } else {
                    $registros_importados++;
                }
            }
        }

        // Mostrar el resultado de la operación
        if ($errores > 0) {
            $this->showAlert("Registros importados: $registros_importados. Errores: $errores.", 'danger');
        } else {
            $this->showAlert("Registros importados: $registros_importados.", 'success');
        }

        mysqli_close($this->con);
    }

    private function showAlert($message, $type) {
        echo "<div class='alert alert-$type' role='alert'>$message</div>";
    }
}

// Instancia del controlador y llamada al método
$uploadController = new UploadController();
$uploadController->uploadExcel();
?>