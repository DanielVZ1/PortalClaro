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

    // Imprimir los datos antes de insertar
    error_log("Insertando permisos: rolid = $this->intRolid, moduloid = $this->intModuloid, r = $this->r, w = $this->w, u = $this->u, d = $this->d");

    // Insertamos los nuevos permisos
    $query_insert = "INSERT INTO permisos(rolid,moduloid,r,w,u,d) VALUES(?,?,?,?,?,?)";
    $arrData = array($this->intRolid, $this->intModuloid, $this->r,  $this->w, $this->u, $this->d);
    $request_insert = $this->insert($query_insert, $arrData);
    return  $request_insert;
}

public function permisosModulo(int $idrol) {
    $this->intRolid = $idrol;
    $sql = "SELECT p.rolid,
                p.moduloid,
                m.titulo as modulo,
                p.r,
                p.w,
                p.u,
                p.d
            FROM permisos p
            INNER JOIN modulo m ON p.moduloid = m.idmodulo
            WHERE p.rolid = $this->intRolid";
    $request = $this->selectAll($sql); // Se espera que esto retorne un array

    $arrPermisos = array(); // Inicializa el array vacío
    for ($i = 0; $i < count($request); $i++) {
        $arrPermisos[$request[$i]['moduloid']] = $request[$i]; // Asigna cada permiso
    }
    
    return $arrPermisos; // Devuelve el array de permisos
}


}

?>