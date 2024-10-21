<?php
class PermisosModel extends Query
{
    public $intIdpermiso;
    public $intRolid;
    public $intModuloid;
    public $r;
    public $w;
    public $u;
    public $d;


    public function __construct()
    {
        parent::__construct();
    }

    public function selectModulos()
    {
        $sql = "SELECT * FROM modulo WHERE status != 0";
        $request = $this->selectAll($sql);
        return $request;

    }

  // Selecciona los permisos de un rol
public function selectPermisosRol(int $idrol) 
{
    $this->intRolid = $idrol;
    $sql = "SELECT * FROM permisos WHERE rolid = $this->intRolid";
    $request = $this->selectAll($sql);
    return $request;
}

// Elimina los permisos del rol
public function deletePermisos(int $idrol)
{
    $this->intRolid = $idrol;
    $sql = "DELETE FROM permisos WHERE rolid = $this->intRolid";
    $request = $this->delete($sql);
    return $request;
}

// Inserta nuevos permisos
public function insertPermisos(int $idrol, int $idmodulo, int $r, int $w, int $u, int $d)
{
    $this->intRolid = $idrol;
    $this->intModuloid = $idmodulo;
    $this->r = $r;
    $this->w = $w;
    $this->u = $u;
    $this->d = $d;
    
    $query_insert = "INSERT INTO permisos(rolid,moduloid,r,w,u,d) VALUES(?,?,?,?,?,?)";
    $arrData = array($this->intRolid, $this->intModuloid, $this->r, $this->w, $this->u, $this->d);
    $request_insert = $this->insert($query_insert, $arrData);

    error_log("Consulta de inserción: " . $query_insert); // Verifica la consulta de inserción
    error_log("Datos de inserción: " . implode(', ', $arrData)); // Verifica los datos enviados

    return $request_insert; // Asegúrate de que esto retorne el número de filas afectadas o ID insertado
}

    


}

?>