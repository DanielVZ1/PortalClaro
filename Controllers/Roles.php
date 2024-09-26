<?php

class Roles extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();      
    }

    public function index()
    {
        if (empty($_SESSION['activo'])) {
            header("location:" . base_url);
        }
        $this->views->getView($this, "index");
    }

    public function permisos()
    {
        $data['title'] = 'ROLES';
        $data['script'] = 'permisosMante.js';
        $data['roles'] = $this->model->getRoles(1);
        $data['permisos'] = $this->model->getPermisos();
        $this->views->getView('roles', 'permisos', $data);
    }

    public function listar()
    {
        $data = $this->model->getRoles();
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['estado'] = ($data[$i]['estado'] == 1) 
                ? '<span class="badge bg-success">Disponible</span>'
                : '<span class="badge bg-danger">No Disponible</span>';

            $data[$i]['acciones'] = ($data[$i]['estado'] == 1)
                ? '<button class="btn btn-danger" onclick="eliminarRol(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
                   <button class="btn btn-info" onclick="editarRoles(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>'
                : '<button class="btn btn-success" onclick="restaurarRol(' . $data[$i]['id'] . ')"><i class="fa-solid fa-check-double"></i></button>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrarRol()
    {
        if (isset($_POST['roles']) && isset($_POST['numeros'])) {
            $roles = strClean($_POST['roles']);
            $numeros = strClean($_POST['numeros']);
            $id = strClean($_POST['id']);

            if ($id == '') {
                $verificarRoles = $this->model->getValidar('DESCRIPCION', $roles, 'registrar', 0);
                $verificarNumeros = $this->model->getValidar('ROL', $numeros, 'registrar', 0);

                if (empty($verificarRoles) && empty($verificarNumeros)) {
                    $data = $this->model->registrar($roles, $numeros, 1);
                    $res = ($data > 0)
                        ? array('msg' => 'ROL REGISTRADO', 'type' => 'success')
                        : array('msg' => 'ERROR AL REGISTRAR', 'type' => 'error');
                } else {
                    $res = array('msg' => 'EL ROL O NUMERO DEBE SER UNICO', 'type' => 'warning');
                }
            } else {
                $verificarRoles = $this->model->getValidar('DESCRIPCION', $roles, 'modificar', $id);
                $verificarNumeros = $this->model->getValidar('ROL', $numeros, 'modificar', $id);

                if (empty($verificarRoles) && (empty($verificarNumeros) || $verificarNumeros == $verificarNumeros)) {
                    $data = $this->model->actualizarRol($roles, $numeros, 1, $id);
                    $res = ($data > 0)
                        ? array('msg' => 'ROL ACTUALIZADO', 'type' => 'success')
                        : array('msg' => 'ERROR AL ACTUALIZAR', 'type' => 'error');
                } else {
                    $res = array('msg' => 'EL ROL O NUMERO DEBE SER UNICO', 'type' => 'warning');
                }
            }
        } else {
            $res = array('msg' => 'LOS CAMPOS SON OBLIGATORIOS', 'type' => 'warning');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar($idRol)
    {
        if (is_numeric($idRol)) {
            $data = $this->model->eliminar(0, $idRol);
            $res = ($data == 1)
                ? array('msg' => 'ROL DADO DE BAJA', 'type' => 'success')
                : array('msg' => 'ERROR AL ELIMINAR', 'type' => 'error');
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar($idRol)
    {
        $data['rol'] = $this->model->editar($idRol);
        $permisos = (!empty($data['rol']['permisos'])) ? json_decode($data['rol']['permisos'], true) : [];
        $data['permisos'] = $permisos;
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function restaurar($idRol)
    {
        if (is_numeric($idRol)) {
            $data = $this->model->restaurar($idRol);
            $res = ($data == 1)
                ? array('msg' => 'ROL DADO DE ALTA', 'type' => 'success')
                : array('msg' => 'ERROR AL ACTUALIZAR', 'type' => 'error');
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}
