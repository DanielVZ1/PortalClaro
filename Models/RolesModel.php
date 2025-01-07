<?php
class RolesModel extends Query {
    private $id, $nombrerol, $estado;

    public function __construct() {
        parent::__construct();
    }

    public function selectRoles()
    {
        $sql = "SELECT * FROM rol WHERE estado != 0 AND id != 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    // Obtener todos los roles
    public function getRoles() {
        $sql = "SELECT * FROM rol";
        $data = $this->selectAll($sql);
        return $data;
    }

    // Registrar un nuevo rol
    public function registrarRol(string $nombrerol) {
        $this->nombrerol = $nombrerol;
    
        // Verificar si el rol ya existe
        $verificar = "SELECT * FROM rol WHERE nombrerol = '$this->nombrerol'";
        $existe = $this->select($verificar);
    
        if (empty($existe)) {
            $sql = "INSERT INTO rol(nombrerol) VALUES (?)";
            $datos = array($this->nombrerol);
            $data = $this->save($sql, $datos);
            return $data == 1 ? "ok" : "error";
        } else {
            return "existe";
        }
    }

    // Modificar un rol existente
    public function modificarRol(string $nombrerol, int $id) {
        $this->nombrerol = $nombrerol;
        $this->id = $id;
    
        // Verificar si el rol existe
        $verificar = "SELECT * FROM rol WHERE nombrerol = '$this->nombrerol'";
        $comprobar = "SELECT * FROM rol WHERE id = '$this->id' and nombrerol = '$this->nombrerol'";
    
        $existe = $this->select($verificar);
        $exist = $this->select($comprobar);
    
        if (empty($existe) || !empty($exist)) {
            $sql = "UPDATE rol SET nombrerol = ? WHERE id = ?";
            $datos = array($this->nombrerol, $this->id);
            $data = $this->save($sql, $datos);
            return $data == 1 ? "modificado" : "error";
        } else {
            return "existe";
        }
    }
    

    // Obtener datos de un rol por ID
    public function editarRol(int $id) {
        $sql = "SELECT * FROM rol WHERE id = $id";
        return $this->select($sql);
    }

    // Actualizar el estado del rol (activo o inactivo)
    public function accionRol(int $estado, int $id) {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE rol SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        return $this->save($sql, $datos);
    }

    // Obtener los permisos disponibles
    public function getPermisos() {
        $sql = "SELECT * FROM permiso_s";
        return $this->selectAll($sql);
    }

    // Registrar permisos para un rol
    public function eliminarPermisos(int $id_rol) {
        $sql = "DELETE FROM detalle_permisos WHERE id_rol = ?";
        $datos = array($id_rol);
        return $this->save($sql, $datos) == 1 ? 'ok' : 'error';
    }
    
    // Registrar un permiso para un rol
    public function registrarPermisos(int $id_rol, int $id_permiso) {
        $sql = "INSERT INTO detalle_permisos (id_rol, id_permiso) VALUES (?, ?)";
        $datos = array($id_rol, $id_permiso);
        return $this->save($sql, $datos) == 1 ? 'ok' : 'error';
    }

    // Obtener detalles de los permisos asignados a un rol
    public function getDetallesPermisos(int $id_rol) {
        $sql = "SELECT * FROM detalle_permisos WHERE id_rol = $id_rol";
        return $this->selectAll($sql);
    }

    // Verificar permisos de un usuario
    public function verificarPermiso(int $id_user, string $nombre) {
        $sql = "SELECT p.id, p.permiso, d.id, u.id, d.id_permiso 
                FROM permiso_s p
                INNER JOIN detalle_permisos d ON p.id = d.id_permiso
                INNER JOIN usuarios u ON u.id_rol = d.id_rol
                WHERE u.id = $id_user AND p.permiso = '$nombre'";
        return $this->selectAll($sql);
    }
}

?>
