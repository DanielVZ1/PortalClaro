<?php
   class AsistenciaPromotores extends Controller{

   public function __construct()
    {
        parent::__construct();
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
                // Redirigir al formulario
                echo json_encode([
                    'msg' => 'CÓDIGO VÁLIDO',
                    'type' => 'success',
                    'redirect' => base_url . 'AsistenciaPromotores/mostrarFormulario/' . $codigo
                ]);
            } else {
                echo json_encode(['msg' => 'EL CÓDIGO NO ESTÁ REGISTRADO', 'type' => 'error']);
            }
        } catch (Exception $e) {
            // Manejo de excepciones
            echo json_encode(['msg' => 'ERROR AL VERIFICAR CÓDIGO', 'type' => 'error']);
            error_log($e->getMessage());
        }
    }
    
    
    
    public function mostrarFormulario($codigo) {
        $data['codigo'] = $codigo; // Puedes pasar el código si lo necesitas
        $data['title'] = 'Registro de Asistencia';
        $this->views->getView1('AsistenciaPromotores', 'formularioAsistencia', $data);
    }
    
}
   
?>