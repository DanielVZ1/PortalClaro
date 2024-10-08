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
            $data['puesto'] = $datosPromotor['id_cargo'];
            $data['zona'] = $datosPromotor['id_zona'];
        } else {
            // Manejo de error si no se encuentra el promotor
            $data['error'] = "Promotor no encontrado.";
            // Aquí podrías redirigir o mostrar un mensaje en el formulario
        }
    
        $data['title'] = 'Registro de Asistencia';
        $this->views->getView1('AsistenciaPromotores', 'formularioAsistencia', $data);
    }
    
    
    
}
   
?>