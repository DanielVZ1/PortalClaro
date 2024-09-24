<?php
    class FichasModel extends Query{
        private $codigoMaestro,$nombre,$apellido,$dni,$telefono,$direccion,$zona,$departamento,$municipio,
        $gerencia,$canal,$proyecto,$cargo,$estadoCivil,$genero,$profesion,$foto,$id,$estado;
        public function __construct(){
           parent::__construct();        
        }
     
    public function getPromotores()
    {
        $sql = "SELECT * FROM promotores";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarPromotor(string $codigoMaestro,string $nombre, string $apellido, int $dni, string $telefono,
    string $direccion, string $zona, string $departamento, string $municipio, string $gerencia,string $canal, 
    string $proyecto,string $cargo, string $estadoCivil, string $genero, string $profesion,string $foto)
    {
        $this->codigoMaestro = $codigoMaestro;
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
        $this->proyecto = $proyecto;
        $this->cargo = $cargo;
        $this->estadoCivil = $estadoCivil;
        $this->genero = $genero;
        $this->profesion = $profesion;
        $this->foto = $foto;
            $verificar = "SELECT * FROM promotores WHERE dni = '$this->dni'";
            $existe = $this->select($verificar);
            if (empty($existe)) {
                $sql = "INSERT INTO promotores(codigoMaestro,nombre,apellido,dni,telefono,direccion,zona,departamento,
                        municipio,gerencia,canal,proyecto,cargo,estadoCivil,genero,profesion, foto) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $datos = array($this->codigoMaestro, $this->nombre, $this->apellido, $this->dni, $this->telefono,$this->direccion, 
                        $this->zona, $this->departamento, $this->municipio, $this->gerencia, $this->canal, $this->proyecto, 
                         $this->cargo, $this->estadoCivil, $this->genero, $this->profesion, $this->foto);
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

     public function modificarPromotor(string $codigoMaestro,string $nombre, string $apellido, int $dni,
     string $telefono, string $direccion, string $zona, string $departamento, string $municipio, string $gerencia, 
     string $canal, string $proyecto, string $cargo, string $estadoCivil, 
     string $genero, string $profesion, string $foto, int $id)
    {
        $this->codigoMaestro = $codigoMaestro;
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
        $this->proyecto = $proyecto;
        $this->cargo = $cargo;
        $this->estadoCivil = $estadoCivil;
        $this->genero = $genero;
        $this->profesion = $profesion;
        $this->foto = $foto;
        $this->id = $id;
        $sql = "UPDATE promotores SET codigoMaestro, nombre = ?, apellido = ?, dni = ?, telefono = ?, direccion = ?, zona = ?,
        departamento = ?, municipio = ?, gerencia = ?,canal = ?, proyecto = ?, cargo = ?, estadoCivil = ?, genero = ?, profesion = ?, foto = ? WHERE id = ?";
        $datos = array($this->codigoMaestro,$this->nombre, $this->apellido, $this->dni, $this->telefono,$this->direccion, 
        $this->zona, $this->departamento, $this->municipio, $this->gerencia, $this->canal, $this->proyecto,  
        $this->cargo, $this->estadoCivil, $this->genero, $this->profesion, $this->foto, $this->id);
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