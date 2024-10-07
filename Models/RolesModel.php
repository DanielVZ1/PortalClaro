<?php
class RolesModel extends Query
{
    public $intIdrol;
    public $strRol;
    public $strDescripcion;
    public $intStatus;


    public function __construct() {
        parent::__construct();
    }


    public function selectRoles()
    {
        $sql = "SELECT * FROM rol WHERE status != 0";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function insertRol(string $rol, string $descripcion, int $status){
        $return = "";
        $this->strRol =  $rol;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;

        $sql  = "SELECT *  FROM rol WHERE nombrerol = '{$this->strRol}' ";
        $request = $this->selectAll($sql);
        if (empty($request)) {
            $query_insert = "INSERT INTO rol(nombrerol, descripcion, status) VALUES (?,?,?)";
            $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
            $request_insert = $this->insertar($query_insert, $arrData);
            $return = $request_insert;
        }else{
            $return = "exist";
        }
        return $return;


    }




}
?>