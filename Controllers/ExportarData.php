<?php
// Incluir autoload de Composer para cargar PhpSpreadsheet
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportarData {

    public function exportarPromotores() {
        // Conexión a la base de datos MySQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sistemas";  // Aquí usamos el nombre de la base de datos correcta

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta SQL para obtener los datos de los promotores
        $sql = "SELECT id, codigo, nombre, apellido, dni, telefono, direccion, id_zona, id_departamento, id_municipio, 
                id_gerencia, id_canal, id_proyecto, id_cargo, id_estado_civil, id_genero, profesion, foto, cv, 
                antecedentes, contrato, id_asistencia, id_ventas, estado 
                FROM promotores";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Crear un nuevo objeto Spreadsheet
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Establecer los encabezados de las columnas
            $sheet->setCellValue('A1', 'ID');
            $sheet->setCellValue('B1', 'Código');
            $sheet->setCellValue('C1', 'Nombre');
            $sheet->setCellValue('D1', 'Apellido');
            $sheet->setCellValue('E1', 'DNI');
            $sheet->setCellValue('F1', 'Teléfono');
            $sheet->setCellValue('G1', 'Dirección');
            $sheet->setCellValue('H1', 'Zona');
            $sheet->setCellValue('I1', 'Departamento');
            $sheet->setCellValue('J1', 'Municipio');
            $sheet->setCellValue('K1', 'Gerencia');
            $sheet->setCellValue('L1', 'Canal');
            $sheet->setCellValue('M1', 'Proyecto');
            $sheet->setCellValue('N1', 'Cargo');
            $sheet->setCellValue('O1', 'Estado Civil');
            $sheet->setCellValue('P1', 'Género');
            $sheet->setCellValue('Q1', 'Profesión');
            $sheet->setCellValue('R1', 'Foto');
            $sheet->setCellValue('S1', 'CV');
            $sheet->setCellValue('T1', 'Antecedentes');
            $sheet->setCellValue('U1', 'Contrato');
            $sheet->setCellValue('V1', 'Asistencia');
            $sheet->setCellValue('W1', 'Ventas');
            $sheet->setCellValue('X1', 'Estado');  // Corregido a 'estado'

            // Llenar el archivo Excel con los datos de la base de datos
            $row = 2; // Comenzamos desde la segunda fila
            while($row_data = $result->fetch_assoc()) {
                $sheet->setCellValue('A' . $row, $row_data['id']);
                $sheet->setCellValue('B' . $row, $row_data['codigo']);
                $sheet->setCellValue('C' . $row, $row_data['nombre']);
                $sheet->setCellValue('D' . $row, $row_data['apellido']);
                $sheet->setCellValue('E' . $row, $row_data['dni']);
                $sheet->setCellValue('F' . $row, $row_data['telefono']);
                $sheet->setCellValue('G' . $row, $row_data['direccion']);
                $sheet->setCellValue('H' . $row, $row_data['id_zona']);
                $sheet->setCellValue('I' . $row, $row_data['id_departamento']);
                $sheet->setCellValue('J' . $row, $row_data['id_municipio']);
                $sheet->setCellValue('K' . $row, $row_data['id_gerencia']);
                $sheet->setCellValue('L' . $row, $row_data['id_canal']);
                $sheet->setCellValue('M' . $row, $row_data['id_proyecto']);
                $sheet->setCellValue('N' . $row, $row_data['id_cargo']);
                $sheet->setCellValue('O' . $row, $row_data['id_estado_civil']);
                $sheet->setCellValue('P' . $row, $row_data['id_genero']);
                $sheet->setCellValue('Q' . $row, $row_data['profesion']);
                $sheet->setCellValue('R' . $row, $row_data['foto']);
                $sheet->setCellValue('S' . $row, $row_data['cv']);
                $sheet->setCellValue('T' . $row, $row_data['antecedentes']);
                $sheet->setCellValue('U' . $row, $row_data['contrato']);
                $sheet->setCellValue('V' . $row, $row_data['id_asistencia']);
                $sheet->setCellValue('W' . $row, $row_data['id_ventas']);
                $sheet->setCellValue('X' . $row, $row_data['estado']);  // Corregido a 'estado'
                $row++;
            }

            // Crear un objeto Writer para escribir el archivo Excel
            $writer = new Xlsx($spreadsheet);

            // Establecer las cabeceras para descargar el archivo
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="promotores.xlsx"');
            header('Cache-Control: max-age=0');

            // Escribir el archivo a la salida (force download)
            $writer->save('php://output');
        } else {
            echo "No hay datos para exportar.";
        }

        // Cerrar la conexión
        $conn->close();
    }
}

// Verificar si se envió la solicitud para exportar
if (isset($_POST['exportar']) && $_POST['exportar'] == 'excel') {
    $exportar = new ExportarData();
    $exportar->exportarPromotores();
}
?>
