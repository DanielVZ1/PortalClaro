<?php
   class AsistenciaPromotores extends Controller{

   public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Tegucigalpa'); // Configurar la zona horaria
    }
    public function asistenciapromotores()
    {
        $data['title'] = 'Asistencia de Promotor';
        $this->views->getView1('AsistenciaPromotores', 'asistenciapromotores',$data);
    }

    public function VerificarCodigo($codigo) {
        // Validar el código recibido
        if (empty($codigo)) {
            echo json_encode(['msg' => 'CÓDIGO NO PUEDE ESTAR VACÍO', 'type' => 'error']);
            return;
        }
    
        // Verificar el código en la base de datos
        try {
            $verificar = $this->model->verificarCodigo($codigo);
            if (!empty($verificar)) {
                // Obtener los datos del promotor
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
    
        // Obtener los datos del promotor
        $datosPromotor = $this->model->obtenerDatosPromotor($codigo);
    
        if ($datosPromotor) {
            $data['codigo'] = $datosPromotor['codigo'];
            $data['dni'] = $datosPromotor['dni'];
            $data['nombres'] = $datosPromotor['nombre'];
            $data['apellidos'] = $datosPromotor['apellido'];
            $data['puesto'] = $datosPromotor['nombre_cargo']; // Cambiar a nombre_cargo
            $data['zona'] = $datosPromotor['nombre_zona']; // Cambiar a nombre_zona
        } else {
            // Manejo de error si no se encuentra el promotor
            $data['error'] = "Promotor no encontrado.";
        }
        
        $data['title'] = 'Registro de Asistencia';
        $this->views->getView1('AsistenciaPromotores', 'formularioAsistencia', $data);
    }

    public function guardarAsistencia() {
        // Asegúrate de que la solicitud sea POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigo = $_POST['CodigoMaestro'];
            $nombre = $_POST['nombres'];
            $apellido = $_POST['apellidos'];
            $puesto = $_POST['puesto'];
            $proveedor = $_POST['proveedor'];
            $zona = $_POST['zona'];
            $supervisor = $_POST['supervisor'];
            $coordinador = $_POST['coordinador'];
            $horaEntrada = $_POST['fechaHora'];
            $horaSalida = $_POST['fechaHoraSalida'];
            $foto = $_POST['foto']; // Asegúrate de que se envíe correctamente
            $ubicacion = $_POST['ubicacion'];
    
            // Llama al método del modelo para guardar la asistencia
            $resultado = $this->model->guardarAsistencia($codigo, $nombre, $apellido, $puesto, $proveedor, $zona, $supervisor, $coordinador, $horaEntrada, $horaSalida, $foto, $ubicacion);
    
            // Maneja la respuesta
            if ($resultado) {
                // Redirige o muestra un mensaje de éxito
                header('Location: ' . base_url . 'AsistenciaPromotores/registroExitoso'); // Cambia la URL según necesites
                exit();
            } else {
                // Manejo de error
                echo "Error al guardar la asistencia.";
            }
        }
    }
    
    
    
    
    
    
    
    
}
   
?>