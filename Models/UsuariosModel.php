<?php
    class UsuariosModel extends Query{
        private $usuario, $nombre, $clave, $email, $id_caja, $id, $estado;
        
        public function __construct(){
            parent::__construct();        
        }

        public function getUsuario(string $usuario) {
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $data = $this->select($sql);
            return $data;
        }
        

        public function getCajas()
        {
            $sql = "SELECT * FROM caja WHERE estado = 1";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function getUsuarios()
        {
            $sql = "SELECT u.*, c.id as id_caja, c.caja FROM usuarios u INNER JOIN caja c where u.id_caja = c.id";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function registrarUsuario(string $usuario, string $nombre, string $clave, string $email, int $id_caja)
        {
            $this->usuario = $usuario;
            $this->nombre = $nombre;
            $this->clave = $clave;
            $this->email = $email;
            $this->id_caja = $id_caja;
            
            $verificar = "SELECT * FROM usuarios WHERE usuario = '$this->usuario'";
            $existe = $this->select($verificar);
            
            if (empty($existe)) {
                $sql = "INSERT INTO usuarios(usuario, nombre, clave, email, id_caja) VALUES (?,?,?,?,?)";
                $datos = array($this->usuario, $this->nombre, $this->clave, $this->email, $this->id_caja);
                $data = $this->save($sql, $datos);
                
                if ($data == 1) {
                    $res = "ok";
                } else {
                    $res = "error";
                }
            } else {
                $res = "existe";
            }
            
            return $res;
        }

        public function modificarUsuario(string $usuario, string $nombre, string $email, int $id_caja, int $id)
        {
            $this->usuario = $usuario;
            $this->nombre = $nombre;
            $this->email = $email;
            $this->id = $id;
            $this->id_caja = $id_caja;
            
            $sql = "UPDATE usuarios SET usuario = ?, nombre = ?, email = ?, id_caja = ? WHERE id = ?";
            $datos = array($this->usuario, $this->nombre, $this->email, $this->id_caja, $this->id);
            $data = $this->save($sql, $datos);
            
            if ($data == 1) {
                $res = "modificado";
            } else {
                $res = "error";
            }   
            
            return $res;
        }

        public function editarUser(int $id)
        {
            $sql = "SELECT * FROM usuarios WHERE id = $id";
            $data = $this->select($sql);
            return $data;
        }

        public function accionUser(int $estado, int $id)
        {
            $this->id = $id;
            $this->estado = $estado;
            $sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
            $datos = array($this->estado, $this->id);
            $data = $this->save($sql, $datos);
            return $data;
        }
        public function modificarClave($clave, $id)
    {
        $sql = "UPDATE usuarios SET clave = ?, RESETEO_CLANZ = ? WHERE id = ?";
        $array = array($clave, null, $id);
        return $this->save($sql, $array);
    }
        function verificar(string $email) {
            $this->email = $email;
            $sql = "SELECT id FROM usuarios WHERE email = ? LIMIT 1";
            $data = $this->select($sql, [$this->email]);
            return !empty($data);
        }
        
    
        function reemplazar(string $codigo, string $email) {
            $sql = "UPDATE usuarios SET clave = :codigo WHERE email = :email";
            $params = [':codigo' => $codigo, ':email' => $email];
            return $this->save($sql, $params);
        }
        public function getPermisos()
        {
            $sql = "SELECT * FROM permisos";
            $data = $this->selectAll($sql);
            return $data;
        }


        public function registrarPermisos(int $id_user, int $id_permiso)
        {
            $sql = "INSERT INTO detalle_permisos(id_usuario, id_permiso) VALUES (?,?) ";
            $datos = array($id_user, $id_permiso);
            $data = $this->save($sql, $datos);
            return $data;

        }
        public function eliminarPermisos(int $id_user)
        {
            $sql = "DELETE FROM detalle_permisos WHERE id_usuario = ?";
            $datos = array($id_user);
            $data = $this->save($sql, $datos);
            return $data;

        }
    } 
    
?>
