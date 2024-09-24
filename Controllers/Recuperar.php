<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
class Recuperar extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function forgot()
    {
        $data['title'] = 'Olvidaste tu Contraseña';
        $this->views->getView1('Password', 'forgot',$data);
    }
    public function reset($token)
    {
        $data['title'] = 'Restablecer Contraseña';
        $data['seguridad'] = $this->model->verificarToken($token);
        if ($data['seguridad']['RESETEO_CLANZ'] != $token || empty($token) || $data['seguridad']['RESETEO_CLANZ'] == null) {
            header('Location: ' . base_url);
            exit;
        }
        $this->views->getView1('Password', 'reset', $data);
    }
    public function enviarCorreo($correo)
{
    // Verificar si el correo está registrado
    $verificar = $this->model->verificarCorreo($correo);
    if (!empty($verificar)) {
        $mail = new PHPMailer(true);
        $fecha = date('YmdHis');
        $token = md5($fecha);
        try {
            // Configuraciones del servidor SMTP
            $mail->SMTPDebug = 0; // Desactivar depuración
            $mail->isSMTP(); // Usar SMTP
            $mail->Host       = HOST_SMTP; // Servidor SMTP
            $mail->SMTPAuth   = true; // Autenticación SMTP
            $mail->Username   = USER_SMTP; // Usuario SMTP
            $mail->Password   = CLAVE_SMTP; // Contraseña SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Cifrado TLS
            $mail->Port       = PUERTO_SMTP; // Puerto SMTP

            // Configuración del destinatario
            $mail->setFrom('Claro@gmail.com', 'Claro');
            $mail->addAddress($correo);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8'; // Codificación
            $mail->Subject = 'Restablecer Contraseña - ' . TITLE;
            $template = file_get_contents(__DIR__.'/../views/templates/email.html');
            $template = str_replace('[titulo]', 'Restablecer Contraseña', $template);
            $template = str_replace('[mensaje]', '<p>Has solicitado restablecer tu contraseña, si no has sido tú omite este mensaje
            </p><p>Para cambiar <a href="'.base_url.'Recuperar/reset/'.$token.'">CLICK AQUÍ</a></p>', $template);
            $mail->msgHTML($template);

            // Enviar correo
            $mail->send();

            // Registrar token
            $verificarToken = $this->model->registrarToken($token, $correo);
            if ($verificarToken == 1) {
                $res = array('msg' => 'CORREO ENVIADO CON UN TOKEN DE SEGURIDAD', 'type' => 'success');
            } else {
                $res = array('msg' => 'ERROR AL REGISTRAR EL TOKEN', 'type' => 'error');
            }

        } catch (Exception $e) {
            // Manejo de errores
            $res = array('msg' => 'ERROR AL ENVIAR EL CORREO: ' . $mail->ErrorInfo, 'type' => 'error');
        }
    } else {
        $res = array('msg' => 'EL CORREO NO ESTÁ REGISTRADO', 'type' => 'warning');
    }

    // Enviar respuesta en formato JSON
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
    die();
}

    public function cambiarClave()
    {
        $json = file_get_contents('php://input');
        $datos = json_decode($json, true);
        $nueva = strClean($datos['nueva']);
        $confirmar = strClean($datos['confirmar']);
        $token = strClean($datos['token']);

        // Requerimientos de contraseña
        $hasNumber = preg_match('/\d/', $nueva);           // Al menos un número
        $hasSpecialChar = preg_match('/[^a-zA-Z0-9]/', $nueva); // Al menos un carácter especial
        $hasUppercase = preg_match('/[A-Z]/', $nueva);       // Al menos una letra mayúscula
        $hasLowercase = preg_match('/[a-z]/', $nueva);       // Al menos una letra minúscula

        // Check if passwords meet the minimum length requirement
        if (strlen($nueva) < 6) {
            $res = array('msg' => 'LA CONTRASEÑA DEBE TENER AL MENOS 6 CARACTERES', 'type' => 'warning');
        } elseif (empty($nueva) || empty($confirmar)) {
            $res = array('msg' => 'TODOS LOS CAMPOS CON * SON REQUERIDOS', 'type' => 'warning');
        } elseif ($nueva != $confirmar) {
            $res = array('msg' => 'LAS CONTRASEÑAS NO COINCIDEN', 'type' => 'warning');
        } elseif (!$hasNumber) {
            $res = array('msg' => 'LA CONTRASEÑA DEBE TENER AL MENOS UN NÚMERO', 'type' => 'warning');
        } elseif (!$hasSpecialChar) {
            $res = array('msg' => 'LA CONTRASEÑA DEBE TENER AL MENOS UN CARACTER ESPECIAL', 'type' => 'warning');
        } elseif (!$hasUppercase) {
            $res = array('msg' => 'LA CONTRASEÑA DEBE TENER AL MENOS UNA LETRA MAYÚSCULA', 'type' => 'warning');
        } elseif (!$hasLowercase) {
            $res = array('msg' => 'LA CONTRASEÑA DEBE TENER AL MENOS UNA LETRA MINÚSCULA', 'type' => 'warning');
        } else {
            // Rest of your code remains unchanged
            $hash = password_hash($nueva, PASSWORD_DEFAULT);
            //$usuario = $this->model->getUsuario($token);
            $data = $this->model->modificarClave($hash, $token);
            if ($data == 1) {
                // Activar usuario
                $res = array('msg' => 'CONTRASEÑA MODIFICADA', 'type' => 'success');
            } else {
                $res = array('msg' => 'ERROR AL MODIFICAR', 'type' => 'error');
            }
        }
    
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
    
}