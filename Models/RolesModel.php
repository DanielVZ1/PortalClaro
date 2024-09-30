<?php
class RolesModel extends Query{
    public function __construct() {
        parent::__construct();
    }

    public function selectRoles() {
        $sql = "SELECT * FROM rol WHERE estado != 0";
        $request = $this->selectAll($sql);
        return $request;
    }
    
}
?>