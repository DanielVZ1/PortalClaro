<?php

class Permisos extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (empty($_SESSION['activo'])) {
            header('Location: ' .base_url);
            exit;
        }
        /*if (!verificar('roles')){
            header('Location: ' . BASE_URL . 'admin/permisos');
            exit;
        }*/
    }
    public function index()
    {
        $data['title'] = 'ROLES';
        $data['script'] = 'roles.js';
        $data['permisos'] = $this->model->getPermisos();
        $this->views->getView1('Roles', 'permisos', $data);
    }
    public function listar()
    {
        $data = $this->model->getRoles(2);
        //$data2 = $this->model->getRoles(1);
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Disponible</span>';

                $data[$i]['acciones'] = '<div>
                    <button class="btn btn-danger" type="button" onclick="eliminarRol(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
                    <button class="btn btn-info" type="button" onclick="editarRol(' . $data[$i]['id'] . ')"><i class="fa-solid fa-eye"></i></button>
                </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">No Disponible</span>';

                $data[$i]['acciones'] = '<div>
                    <!--<button class="btn btn-danger" type="button" onclick="eliminarRol(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
                    <!--<button class="btn btn-info" type="button" onclick="editarRol(' . $data[$i]['id'] . ')"><i class="fa-solid fa-eye"></i></button>-->
                    <button class="btn btn-success" type="button" onclick="restaurarRol(' . $data[$i]['id'] . ')"><i class="fa-solid fa-check-double"></i></button>
                </div>';
            }
            /*$data[$i]['acciones'] = '<div>
                <button class="btn btn-danger" type="button" onclick="eliminarRol(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
                <button class="btn btn-info" type="button" onclick="editarRol(' . $data[$i]['id'] . ')"><i class="fa-solid fa-eye"></i></button>
            </div>';*/
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function registrar()
    {
        $nombre = strClean($_POST['nombre']);
        $permisos = (!empty($_POST['permisos'])) ? $_POST['permisos'] : null;

        $id = strClean($_POST['id']);
        if (empty($nombre)) {
            $res = array('msg' => 'EL NOMBRE ES REQUERIDO', 'type' => 'warning');
        } else {
            $listaPermisos = ($permisos != null) ? json_encode($permisos) : null;
            if ($id == '') {
                $verificar = $this->model->getValidar('nombre', $nombre, 'registrar', 0);
                if (empty($verificar)) {
                    $data = $this->model->registrar($nombre, $listaPermisos);
                    if ($data > 0) {
                        $res = array('msg' => 'ROL REGISTRADO', 'type' => 'success');
                    } else {
                        $res = array('msg' => 'ERROR AL REGISTRAR', 'type' => 'error');
                    }
                } else {
                    $res = array('msg' => 'EL ROL YA EXISTE', 'type' => 'warning');
                }
            } else { /////parte a continuacion para editar un rol
                $verificar = $this->model->getValidar('nombre', $nombre, 'actualizar', $id);
                if (empty($verificar)) {
                    $data = $this->model->actualizar($nombre, $listaPermisos, $id);
                    if ($data == 1) {
                        $res = array('msg' => 'ROL MODIFICADO', 'type' => 'success');
                    } else {
                        $res = array('msg' => 'ERROR AL MODICAR', 'type' => 'error');
                    }
                } else {
                    $res = array('msg' => 'El ROL YA EXISTE', 'type' => 'warning');
                }
            }
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }




    public function eliminar($idRol)
    {
        if (isset($_GET)) {
            if (is_numeric($idRol)) {
                $data = $this->model->eliminar(0, $idRol);
                if ($data == 1) {
                    $res = array('msg' => 'ROL DADO DE BAJA', 'type' => 'success');
                } else {
                    $res = array('msg' => 'ERROR AL ELIMINAR', 'type' => 'error');
                }
            } else {
                $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar($idRol)
    {
        $data['rol'] = $this->model->editar($idRol);
        $permisos = [];
        if ($data['rol']['permisos'] != null) {
            $permisos = json_decode($data['rol']['permisos'], true);
        }
        $data['permisos'] = $permisos;
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }




    public function restaurar($idRol)
    {
        if (isset($_GET)) {
            if (is_numeric($idRol)) {
                $data = $this->model->restaurar($idRol);
                if ($data == 1) {
                    $res = array('msg' => 'ROL DADO DE ALTA', 'type' => 'success');
                } else {
                    $res = array('msg' => 'ERROR AL ACTUALIZAR', 'type' => 'error');
                }
            } else {
                $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}
