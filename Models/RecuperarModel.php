<?php
class RecuperarModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function verificarCorreo($correo) 
    {
        $sql = "SELECT id FROM usuarios WHERE email = '$correo'";
        return $this->select($sql);
    }

    public function registrarToken($token, $correo) 
    {
        $sql = "UPDATE usuarios SET RESETEO_CLANZ = ? WHERE email = ? ";
        $array = array($token, $correo);
        return $this->save($sql, $array);
    }

    public function verificarToken($token) 
    {
        $sql = "SELECT id, RESETEO_CLANZ  FROM usuarios WHERE RESETEO_CLANZ = '$token'";
        return $this->select($sql);
    }

    /*public function modificarClave($clave, $token)
    {
        $sql = "UPDATE usuarios SET clave = ?, RESETEO_CLANZ = ? WHERE RESETEO_CLANZ = ?";
        $datos = array($clave, null, $token); // Accede a los parámetros directamente
        $data = $this->save($sql, $datos);
        
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }   
        
        return $res;
    }*/

    public function modificarClave($clave, $token)
    {
        $sql = "UPDATE usuarios SET clave = ?, RESETEO_CLANZ = ? WHERE RESETEO_CLANZ = ?";
        $array = array($clave, null, $token);
        return $this->save($sql, $array);
    }
    
    
    public function getUsuario($token)
    {
        $sql = "SELECT id, usuario, nombre, clave, email, id_caja, estado FROM usuarios WHERE RESETEO_CLANZ = '$token'";
        return $this->select($sql);
    }

    
}