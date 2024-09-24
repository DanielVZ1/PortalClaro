<?php
class RolesModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function getPermisos()
    {
        $sql = "SELECT * FROM permisos";
        return $this->selectAll($sql);
    }
    public function getPermiso($idRol)
    {
        $sql = "SELECT * FROM permisos WHERE id_permisos = $idRol";
        return $this->selectAll($sql);
    }
    public function getRoles()
    {
        $sql = "SELECT * FROM rol";
        //$sql = "SELECT T1.*, T2.USUARIO FROM rol T1 INNER JOIN tbl_usuario T2 ON T1.ID_USUARIO = T2.ID_USUARIO";
        /////33%$sql = "SELECT T1.*, T2.USUARIO FROM rol T1 INNER JOIN tbl_usuario T2 ON T1.id = T2.id";
        // $sql = "SELECT T1.*, T2.USUARIO FROM rol T1 INNER JOIN tbl_usuario T2 ON T1.id = T2.id UNION ALL SELECT T3.*, NULL AS USUARIO FROM rol T3 WHERE estado = 3";
        return $this->selectAll($sql);
    }
    public function registrar($roles, $numeros, $estatus) {
        $sql = "INSERT INTO rol (rol,descripcion,rol_est+, permiso,fecha_creacion) VALUES(?,?,?,?,NOW())";
        $permisos = '["Asistencia", "Camara", "Fichas", "Geolocation", "Principal", "Promotores", "Reloj", "Usuarios", "Ventas"]';
        $array = array($roles, $numeros, $estatus, $permisos);
        return $this->save($sql, $array);
    }
    public function getValidar($campo, $valor, $accion, $id)
    {
        if ($accion == 'registrar' && $id == 0) {
            $sql = "SELECT id FROM rol WHERE $campo = '$valor'";              //✅✅✅✅✅
        }else{
            $sql = "SELECT id FROM rol WHERE $campo = '$valor' AND id != $id";    //✅✅✅✅✅
        }
        return $this->select($sql);
    }
    public function eliminar($estado, $idRol)
    {
        $rolestado = '0';
        $sql = "UPDATE rol SET estado = ?, rol_est+ = ? WHERE id = ?";
        $array = array($estado, $rolestado, $idRol);
        return $this->save($sql, $array);
    }

    public function editar($idRol)
    {
        $sql = "SELECT * FROM rol WHERE id = $idRol";
        return $this->select($sql);
    }

    public function actualizar($permisos, $id)
    {
        $sql = "UPDATE rol SET permisos=? WHERE id=?";          //✅✅✅✅✅
        $array = array($permisos, $id);
        return $this->save($sql, $array);
    }

    public function actualizarRol($roles, $numeros, $estatus, $id) {
        $sql = "UPDATE rol SET rol=?, descripcion=?,rol_est+=? WHERE id=?";
        $array = array($roles, $numeros, $estatus, $id);
        return $this->save($sql, $array);
    }

    public function restaurar($idRol)
    {
        $sql = "UPDATE rol SET estado = 1, rol_est+ = 1 WHERE id = ?";
        $array = array($idRol);
        return $this->save($sql, $array);
    }
///🌟🌟🌟🌟🌟🌟🌟🌟🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰
    /*public function getRoles2($rol)
    {
        $sql = "SELECT id, ROL, DESCRIPCION, rol_est+, FECHA_CREACION FROM rol WHERE rol_est != $rol";
        return $this->selectAll($sql);
    }*/
///🌟🌟🌟🌟🌟🌟🌟🌟🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰
}

?>