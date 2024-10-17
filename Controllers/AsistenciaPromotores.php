<?php
class AsistenciaPromotores extends Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Tegucigalpa'); // Configurar la zona horaria
    }

    public function asistenciapromotores() {
        $data['title'] = 'Asistencia de Promotor';
        $this->views->getView1('AsistenciaPromotores', 'asistenciapromotores', $data);
    }

    public function VerificarCodigo($codigo) {
        if (empty($codigo)) {
            echo json_encode(['msg' => 'CÓDIGO NO PUEDE ESTAR VACÍO', 'type' => 'error']);
            return;
        }

        try {
            $verificar = $this->model->verificarCodigo($codigo);
            if (!empty($verificar)) {
                $asistenciaHoy = $this->model->verificarAsistenciaHoy($codigo);
                if ($asistenciaHoy) {
                    // Aquí se verifica si hay hora de salida
                    if ($asistenciaHoy['hora_salida'] !== null) {
                        echo json_encode([
                            'msg' => 'YA REGISTRASTE TU ASISTENCIA PARA HOY',
                            'type' => 'info',
                            'redirect' => base_url . 'AsistenciaPromotores/mostrarFormulario/' . $codigo
                        ]);
                    } else {
                        echo json_encode([
                            'msg' => 'CÓDIGO VÁLIDO',
                            'type' => 'success',
                            'redirect' => base_url . 'AsistenciaPromotores/mostrarFormulario/' . $codigo
                        ]);
                    }
                } else {
                    $datosPromotor = $this->model->obtenerDatosPromotor($codigo);
                    if ($datosPromotor) {
                        echo json_encode([
                            'msg' => 'CÓDIGO VÁLIDO',
                            'type' => 'success',
                            'redirect' => base_url . 'AsistenciaPromotores/mostrarFormulario/' . $codigo,
                            'datos' => $datosPromotor
                        ]);
                    } else {
                        echo json_encode(['msg' => 'NO SE ENCONTRARON DATOS', 'type' => 'error']);
                    }
                }
            } else {
                echo json_encode(['msg' => 'EL CÓDIGO NO ESTÁ REGISTRADO', 'type' => 'error']);
            }
        } catch (Exception $e) {
            echo json_encode(['msg' => 'ERROR AL VERIFICAR CÓDIGO', 'type' => 'error']);
            error_log($e->getMessage());
        }
    }

    public function mostrarFormulario($codigo) {
        $fechaHoraActual = date('Y-m-d\TH:i');
        $data['fechaHoraEntrada'] = $fechaHoraActual;
        $data['horaSalidaReadonly'] = false; // Definir por defecto
    
        // Obtener datos del promotor
        $datosPromotor = $this->model->obtenerDatosPromotor($codigo);
        // Verificar asistencia del día
        $asistenciaHoy = $this->model->verificarAsistenciaHoy($codigo);
    
        if ($asistenciaHoy) {
            // Obtener los datos de la asistencia
            $asistenciaData = $this->model->obtenerAsistenciaPorId($asistenciaHoy['id']);
            if ($asistenciaData) {
                // Cargar datos de la asistencia anterior
                $data['codigo'] = $codigo;
                $data['dni'] = $asistenciaData['dni'];
                $data['nombres'] = $asistenciaData['nombre'];
                $data['apellidos'] = $asistenciaData['apellido'];
                $data['puesto'] = $asistenciaData['puesto'];
                $data['zona'] = $asistenciaData['zona'];
                $data['proveedor'] = $asistenciaData['proveedor'];
                $data['supervisor'] = $asistenciaData['supervisor'];
                $data['coordinador'] = $asistenciaData['coordinador'];
                $data['foto'] = $asistenciaData['foto'];
                $data['ubicacion'] = $asistenciaData['ubicacion'];
                $data['horaEntrada'] = $asistenciaData['hora_entrada'];
                $data['horaSalida'] = !empty($asistenciaData['hora_salida']) ? date('Y-m-d\TH:i', strtotime($asistenciaData['hora_salida'])) : ''; // Captura automática
                $data['horaSalidaReadonly'] = true; // Indica que el campo es solo lectura
            }
        } else {
            // Si no hay asistencia registrada, cargar datos del promotor
            if ($datosPromotor) {
                $data['codigo'] = $datosPromotor['codigo'];
                $data['dni'] = $datosPromotor['dni'];
                $data['nombres'] = $datosPromotor['nombre'];
                $data['apellidos'] = $datosPromotor['apellido'];
                $data['puesto'] = $datosPromotor['nombre_cargo'];
                $data['zona'] = $datosPromotor['nombre_zona'];
            } else {
                $data['error'] = "Promotor no encontrado.";
            }
        }
    
        $data['title'] = 'Registro de Asistencia';
        $this->views->getView1('AsistenciaPromotores', 'formularioAsistencia', $data);
    }
    
    
    

    public function guardarAsistencia() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigo = $_POST['CodigoMaestro'];
            $dni = $_POST['dni'];
            $nombre = $_POST['nombres'];
            $apellido = $_POST['apellidos'];
            $puesto = $_POST['puesto'];
            $proveedor = $_POST['proveedor'];
            $zona = $_POST['zona'];
            $supervisor = $_POST['supervisor'];
            $coordinador = $_POST['coordinador'];
            $horaEntrada = date('Y-m-d H:i:s'); // Captura hora de entrada automáticamente
            $foto = $_POST['foto'];
            $ubicacion = $_POST['ubicacion'];
    
            // Verificar si hay asistencia hoy
            $asistenciaHoy = $this->model->verificarAsistenciaHoy($codigo);
    
            if ($asistenciaHoy) {
                $horaSalida = date('Y-m-d H:i:s'); // Captura la hora actual para salida
                // Actualizar solo la hora de salida
                $resultado = $this->model->actualizarHoraSalida($asistenciaHoy['id'], $horaSalida);
                if ($resultado) {
                    session_start();
                    $_SESSION['mensaje'] = 'Hora de salida actualizada exitosamente.';
                    header('Location: ' . base_url . 'AsistenciaPromotores/asistenciapromotores');
                    exit();
                } else {
                    echo "Error al actualizar la hora de salida.";
                }
            } else {
                // Guardar nueva asistencia
                $resultado = $this->model->guardarAsistencia($codigo, $dni, $nombre, $apellido, $puesto, $proveedor, $zona, $supervisor, $coordinador, $horaEntrada, null, $foto, $ubicacion);
                if ($resultado) {
                    session_start();
                    $_SESSION['mensaje'] = 'Asistencia guardada exitosamente.';
                    header('Location: ' . base_url . 'AsistenciaPromotores/asistenciapromotores');
                    exit();
                } else {
                    echo "Error al guardar la asistencia.";
                }
            }
        }
    }
    
    
}
?>
