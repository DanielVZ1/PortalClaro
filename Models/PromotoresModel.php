<?php
class PromotoresModel extends Query
{
    private $codigo, $dni, $nombre, $apellido, $telefono, $profesion, $id_estado_civil, $id_genero, $direccion,
        $id_zona, $id_departamento, $id_municipio, $id_gerencia, $id_canal, $id_proyecto, $id_cargo, $id, $estado, $img,
        $cv, $antecedentes, $contrato;
    public function __construct()
    {
        parent::__construct();
    }

    public function getEstados_Civiles()
    {
        $sql = "SELECT * FROM estado_civil WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getGeneros()
    {
        $sql = "SELECT * FROM genero WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getZonas()
    {
        $sql = "SELECT * FROM zona WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getDepartamentos()
    {
        $sql = "SELECT * FROM departamento WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getMunicipios()
    {
        $sql = "SELECT * FROM municipio WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getGerencias()
    {
        $sql = "SELECT * FROM gerencia WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getCanales()
    {
        $sql = "SELECT * FROM canal WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getProyectos()
    {
        $sql = "SELECT * FROM proyecto WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getCargos()
    {
        $sql = "SELECT * FROM cargo WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }


    public function getPromotores()
    {
        $sql = "SELECT p.*, e.id AS id_estado_civil, e.estado_civil,
                            g.id AS id_genero, g.genero, 
                            z.id As id_zona, z.zona, 
                            d.id AS id_departamento, d.departamento, 
                            m.id AS id_municipio, m.municipio, 
                            n.id AS id_gerencia, n.gerencia, 
                            c.id AS id_canal, c.canal, 
                            y.id AS id_proyecto, y.proyecto, 
                            r.id AS id_cargo, r.cargo
        FROM promotores p 
        INNER JOIN estado_civil e ON  p.id_estado_civil = e.id
        INNER JOIN genero g ON  p.id_genero = g.id
        INNER JOIN zona z ON  p.id_zona = z.id
        INNER JOIN departamento d ON  p.id_departamento = d.id
        INNER JOIN municipio m ON  p.id_municipio = m.id
        INNER JOIN gerencia n ON  p.id_gerencia = n.id
        INNER JOIN canal c ON  p.id_canal = c.id
        INNER JOIN proyecto y ON  p.id_proyecto = y.id
        INNER JOIN cargo r ON  p.id_cargo = r.id";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarPromotor(
        string $codigo,
        string $dni,
        string $nombre,
        string $apellido,
        string $telefono,
        string $profesion,
        int $id_estado_civil,
        int $id_genero,
        string $direccion,
        int $id_zona,
        int $id_departamento,
        int $id_municipio,
        int $id_gerencia,
        int $id_canal,
        int $id_proyecto,
        int $id_cargo,
        string $img,
        string $cv,
        string $antecedentes,
        string $contrato
    ) {
        $this->codigo = $codigo;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->profesion = $profesion;
        $this->id_estado_civil = $id_estado_civil;
        $this->id_genero = $id_genero;
        $this->direccion = $direccion;
        $this->id_zona = $id_zona;
        $this->id_departamento = $id_departamento;
        $this->id_municipio = $id_municipio;
        $this->id_gerencia = $id_gerencia;
        $this->id_canal = $id_canal;
        $this->id_proyecto = $id_proyecto;
        $this->id_cargo = $id_cargo;
        $this->img = $img;
        $this->cv = $cv;
        $this->antecedentes = $antecedentes;
        $this->contrato = $contrato;

        $verificar = "SELECT * FROM promotores WHERE codigo = '$this->codigo'";
        $existe = $this->select($verificar);

        if (empty($existe)) {
            $sql = "INSERT INTO promotores(codigo, dni, nombre, apellido, telefono, profesion, id_estado_civil, 
                    id_genero, direccion, id_zona, id_departamento, id_municipio, id_gerencia, id_canal, id_proyecto, id_cargo, 
                    foto, cv, antecedentes, contrato) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $datos = array(
                $this->codigo,
                $this->dni,
                $this->nombre,
                $this->apellido,
                $this->telefono,
                $this->profesion,
                $this->id_estado_civil,
                $this->id_genero,
                $this->direccion,
                $this->id_zona,
                $this->id_departamento,
                $this->id_municipio,
                $this->id_gerencia,
                $this->id_canal,
                $this->id_proyecto,
                $this->id_cargo,
                $this->img,
                $this->cv,
                $this->antecedentes,
                $this->contrato
            );
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
        } else {
            $res = "existe";
        }
        return $res;
    }

    public function modificarPromotor(
        string $codigo,
        string $dni,
        string $nombre,
        string $apellido,
        string $telefono,
        string $profesion,
        int $id_estado_civil,
        int $id_genero,
        string $direccion,
        int $id_zona,
        int $id_departamento,
        int $id_municipio,
        int $id_gerencia,
        int $id_canal,
        int $id_proyecto,
        int $id_cargo,
        string $img,
        string $cv,
        string $antecedentes,
        string $contrato,
        int $id
    ) {
        $this->codigo = $codigo;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->profesion = $profesion;
        $this->id_estado_civil = $id_estado_civil;
        $this->id_genero = $id_genero;
        $this->direccion = $direccion;
        $this->id_zona = $id_zona;
        $this->id_departamento = $id_departamento;
        $this->id_municipio = $id_municipio;
        $this->id_gerencia = $id_gerencia;
        $this->id_canal = $id_canal;
        $this->id_proyecto = $id_proyecto;
        $this->id_cargo = $id_cargo;
        $this->img = $img;
        $this->cv = $cv;
        $this->antecedentes = $antecedentes;
        $this->contrato = $contrato;
        $this->id = $id;

        $sql = "UPDATE promotores SET codigo = ?, dni = ?, nombre = ?, apellido = ?, telefono = ?, profesion = ?, id_estado_civil = ?, 
                id_genero = ?, direccion = ?, id_zona = ?, id_departamento = ?, id_municipio = ?, id_gerencia = ?, 
                id_canal = ?, id_proyecto = ?, id_cargo = ?, foto = ?, cv = ?, antecedentes = ?, contrato = ? 
                WHERE id = ?";
        $datos = array(
            $this->codigo,
            $this->dni,
            $this->nombre,
            $this->apellido,
            $this->telefono,
            $this->profesion,
            $this->id_estado_civil,
            $this->id_genero,
            $this->direccion,
            $this->id_zona,
            $this->id_departamento,
            $this->id_municipio,
            $this->id_gerencia,
            $this->id_canal,
            $this->id_proyecto,
            $this->id_cargo,
            $this->img,
            $this->cv,
            $this->antecedentes,
            $this->contrato,
            $this->id
        );
        $data = $this->save($sql, $datos);
        if ($data == 1) {
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
        $data = $this->save($sql, $datos);
        //$sql = "DELETE  FROM Promotors WHERE id = $id";
        //$data = $this->select($sql);
        return $data;
    }

    public function verPromotor(int $id)
    {
        $sql = "SELECT * FROM promotores WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    
    public function verificarPermiso(int $id_user, string $nombre){
        $sql = "SELECT p.id, p.permiso, d.id, u.id, d.id_permiso FROM permiso_s p INNER JOIN detalle_permisos d ON p.id = d.id_permiso INNER JOIN usuarios u ON u.id_rol=d.id_rol WHERE u.id = $id_user AND p.permiso = '$nombre'";
        $data = $this->selectAll($sql);
        return $data;
   
    }

    public function verificarDNI($dni)
    {
        // Ajustamos la consulta para usar el valor de $dni directamente en la SQL
        $sql = "SELECT COUNT(*) as total FROM promotores WHERE dni = '$dni'"; // Usamos directamente el DNI en la consulta
    
        // Ejecutamos la consulta con el método select
        $result = $this->select($sql);
        
        // Verificamos si el resultado tiene más de 0, lo que indica que el DNI ya está registrado
        return $result['total'] > 0;
    }
    


    
}
