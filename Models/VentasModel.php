<?php
    class VentasModel extends Query{
        private $telefono,$medio,$subgerente,$coordinador,$supervisor,
        $fecha,$codigo,$ubicacion,$promotor,$punto_venta,$departamento,$zona,$distribuidor,$proveedor,$producto,$perfil_plan,
        $tecnologia,$centro_venta,$canal_rediac,$aliado,$id,$estado;
        public function __construct(){
           parent::__construct();        
        }
     
    public function getVentas()
    {
        $sql = "SELECT * FROM ventas WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarVentas(string $telefono, string $medio, string $subgerente, string $coordinador,string $supervisor,
    string $fecha,string $codigo,string $ubicacion,string $promotor,string $punto_venta,string $departamento,string $zona,string $distribuidor,
    string $proveedor, string $producto,string $perfil_plan,string $tecnologia, string $centro_venta,string $canal_rediac,string $aliado)
    {
        $this->telefono = $telefono;
        $this->medio = $medio;
        $this->subgerente = $subgerente;
        $this->coordinador = $coordinador;
        $this->supervisor = $supervisor;
        $this->fecha = $fecha;
        $this->codigo = $codigo;
        $this->ubicacion = $ubicacion;
        $this->promotor = $promotor;
        $this->punto_venta = $punto_venta;
        $this->departamento = $departamento;
        $this->zona = $zona;
        $this->distribuidor = $distribuidor;
        $this->proveedor = $proveedor;
        $this->producto = $producto;
        $this->perfil_plan = $perfil_plan;
        $this->tecnologia = $tecnologia;
        $this->centro_venta = $centro_venta;
        $this->canal_rediac = $canal_rediac;
        $this->aliado = $aliado;
            $vericar = "SELECT * FROM ventas WHERE codigo = '$this->codigo'";
            $existe = $this->select($vericar);
            if (empty($existe)) {
            $sql = "INSERT INTO ventas(telefono,medio,subgerente,coordinador,supervisor,fecha,codigo,ubicacion,
            promotor,punto_venta,departamento,zona,distribuidor,proveedor,producto,perfil_plan,tecnologia,centro_venta,canal_rediac,aliado)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $datos = array($this->telefono,$this->medio,$this->subgerente,$this->coordinador,$this->supervisor,$this->fecha ,
            $this->codigo,$this->ubicacion,$this->promotor,$this->punto_venta,$this->departamento, $this->zona,$this->distribuidor,
            $this->proveedor, $this->producto,$this->perfil_plan,$this->tecnologia,$this->centro_venta,$this->canal_rediac,$this->aliado);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            }else{
                $res = "error";
           }
            }else{
            $res = "existe";
           }
            return $res;
        }

     public function modificarVentas(string $telefono, string $medio, string $subgerente, string $coordinador,string $supervisor,
     string $fecha,string $codigo,string $ubicacion,string $promotor,string $punto_venta,string $departamento ,string $zona,string $distribuidor,
     string $proveedor,string $producto,string $perfil_plan,string $tecnologia, string $centro_venta,string $canal_rediac,string $aliado, int $id)
    {
        $this->telefono = $telefono;
        $this->medio = $medio;
        $this->subgerente = $subgerente;
        $this->coordinador = $coordinador;
        $this->supervisor = $supervisor;
        $this->fecha = $fecha;
        $this->codigo = $codigo;
        $this->ubicacion = $ubicacion;
        $this->promotor = $promotor;
        $this->punto_venta = $punto_venta;
        $this->departamento = $departamento;
        $this->zona = $zona;
        $this->distribuidor = $distribuidor;
        $this->proveedor = $proveedor;
        $this->producto = $producto;
        $this->perfil_plan = $perfil_plan;
        $this->tecnologia = $tecnologia;
        $this->centro_venta = $centro_venta;
        $this->canal_rediac = $canal_rediac;
        $this->aliado = $aliado;
        $sql = "UPDATE ventas SET telefono = ?,medio= ?,subgerente= ?,coordinador= ?,supervisor= ?,fecha= ?,codigo= ?,ubicacion= ?,
                promotor= ?,punto_venta= ?,departamento= ?,zona= ?,distribuidor= ?,proveedor= ?,producto= ?,perfil_plan= ?,tecnologia= ?,centro_venta= ?,canal_rediac= ?,aliado= ? WHERE id = ?";
        $datos = array($this->telefono,$this->medio,$this->subgerente,$this->coordinador,$this->supervisor,$this->fecha ,
        $this->codigo,$this->ubicacion,$this->promotor,$this->punto_venta,$this->departamento,$this->zona,$this->distribuidor,
        $this->proveedor,$this->producto,$this->perfil_plan,$this->tecnologia,$this->centro_venta,$this->canal_rediac,$this->aliado, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1 ) {
            $res = "modificado";
        } else {
            $res = "error";
        }   
        return $res;
    }
    

    public function editarUser(int $id)
    {
        $sql = "SELECT * FROM ventas WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function accionVentas(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE ventas SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql,$datos);
        //$sql = "DELETE  FROM ventas WHERE id = $id";
        //$data = $this->select($sql);
        return $data;
    }
} 
?>