<?php
    class AsistenciaModel extends Query{
        private $nombre,$apellido,$dni,$telefono,$direccion,$zona,$departamento,$municipio,
        $gerencia,$canal,$cargo,$estadoCivil,$genero,$profesion,$id,$estado;
        public function __construct(){
           parent::__construct();        
        }
     
    public function getPromotores()
    {
        $sql = "SELECT * FROM promotores";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarPromotor(string $nombre, string $apellido, int $dni, int $telefono,
    string $direccion, string $zona, string $departamento, string $municipio, string $gerencia, 
    string $canal, string $cargo, string $estadoCivil, 
    string $genero, string $profesion)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->zona = $zona;
        $this->departamento = $departamento;
        $this->municipio = $municipio;
        $this->gerencia = $gerencia;
        $this->canal = $canal;
        $this->cargo = $cargo;
        $this->estadoCivil = $estadoCivil;
        $this->genero = $genero;
        $this->profesion = $profesion;
            $verificar = "SELECT * FROM promotores WHERE dni = '$this->dni'";
            $existe = $this->select($verificar);
            if (empty($existe)) {
                $sql = "INSERT INTO promotores(nombre,apellido,dni,telefono,direccion,zona,departamento,
                        municipio,gerencia,canal,cargo,estadoCivil,genero,profesion;) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $datos = array($this->nombre, $this->apellido, $this->dni, $this->telefono,$this->direccion, 
                        $this->zona, $this->departamento, $this->municipio, $this->gerencia, $this->canal,  
                         $this->cargo, $this->estadoCivil, $this->genero, $this->profesion);
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

     public function modificarPromotor(string $nombre, string $apellido, int $dni, int $telefono,
     string $direccion, string $zona, string $departamento, string $municipio, string $gerencia, 
     string $canal, string $cargo, string $estadoCivil, 
     string $genero, string $profesion, int $id)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->zona = $zona;
        $this->departamento = $departamento;
        $this->municipio = $municipio;
        $this->gerencia = $gerencia;
        $this->canal = $canal;
        $this->cargo = $cargo;
        $this->estadoCivil = $estadoCivil;
        $this->genero = $genero;
        $this->profesion = $profesion;
        $this->id = $id;
        $sql = "UPDATE promotores SET nombre = ?, apellido = ?, dni = ?, telefono = ?, direccion = ?, zona = ?,
        departamento = ?, municipio = ?, gerencia = ?,canal = ?, cargo = ?, estadoCivil = ?, genero = ?, profesion = ? WHERE id = ?";
        $datos = array($this->nombre, $this->apellido, $this->dni, $this->telefono,$this->direccion, 
        $this->zona, $this->departamento, $this->municipio, $this->gerencia, $this->canal,  
        $this->cargo, $this->estadoCivil, $this->genero, $this->profesion, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1 ) {
            $res = "modificado";
        } else {
            $res = "error";
        }   
        return $res;
    }
    
    public function editarPromotor(int $id)
    {
        $sql = "SELECT * FROM promotores WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function accionPromotor(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE promotores SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql,$datos);
        //$sql = "DELETE  FROM usuarios WHERE id = $id";
        //$data = $this->select($sql);
        return $data;
    }

} 
?>