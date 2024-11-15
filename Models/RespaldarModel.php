<?php
class RespaldarModel extends Query
{
    public function verificarPermiso(int $id_user, string $nombre){
        $sql = "SELECT p.id, p.permiso, d.id, u.id, d.id_permiso 
        FROM permiso_s p INNER JOIN detalle_permisos d 
        ON p.id = d.id_permiso INNER JOIN usuarios u 
        ON u.id_rol=d.id_rol WHERE u.id = $id_user AND p.permiso = '$nombre'";
        $data = $this->selectAll($sql);
        return $data;
   
    }
}
