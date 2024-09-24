<?php

class Roles extends Controller
{
    public function __construct(){
        session_start();
        parent::__construct();      
      }
    public function index()
    {
      if (empty($_SESSION['activo'])){
        header("location:".base_url);
      }
      $this->views->getView($this,"index");
      
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
        //$data2 = $this->model->getRoles(1);
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Disponible</span>';

                $data[$i]['acciones'] = '<div>
                    <button class="btn btn-danger" type="button" onclick="eliminarRol(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
                    <button class="btn btn-info" type="button" onclick="editarRoles(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
                </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">No Disponible</span>';

                $data[$i]['acciones'] = '<div>
                    <!--<button class="btn btn-danger" type="button" onclick="eliminarRol(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
                    <!--<button class="btn btn-info" type="button" onclick="editarRoles(' . $data[$i]['id'] . ')"><i class="fa-solid fa-eye"></i></button>-->
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

    //metodo para registrar y modificar
    public function registrarRol()
    {
        if (isset($_POST)) {
            if (empty($_POST['roles'])) {
                $res = array('msg' => 'EL NOMBRE ES REQUERIDO', 'type' => 'warning');
            } else if (empty($_POST['numeros'])) {
                $res = array('msg' => 'EL NUMERO ES REQUERIDO', 'type' => 'warning');
            } else {
                $roles = strClean($_POST['roles']); //
                $numeros = strClean($_POST['numeros']); //

                $id = strClean($_POST['id']);
                if ($id == '') {
                    //verificar si existen los datos
                    $verificarRoles = $this->model->getValidar('DESCRIPCION', $roles, 'registrar', 0);
                    if (empty($verificarRoles)) {
                        $verificarNumeros = $this->model->getValidar('ROL', $numeros, 'registrar', 0);
                        if (empty($verificarNumeros)) {
                            $data = $this->model->registrar($roles, $numeros, 1);//##(ORIGINAL)->   $data = $this->model->registrar($roles, $numeros);     <-(ORIGINAL)##//   
                            if ($data > 0) {
                                $res = array('msg' => 'ROL REGISTRADO', 'type' => 'success');

                            } else {
                                $res = array('msg' => 'ERROR AL REGISTRAR', 'type' => 'error');
                            }
                        } else {
                            $res = array('msg' => 'EL NUMERO DEBE SER UNICO', 'type' => 'warning');
                        }
                    } else {
                        $res = array('msg' => 'EL ROL DEBE SER UNICO', 'type' => 'warning');
                    }
                } else {
                    //verificar si existen los datos (ACTUALIZAR)
                    $verificarRoles = $this->model->getValidar('DESCRIPCION', $roles, 'modificar', $id);
                    if (empty($verificarRoles)) {
                        $verificarNumeros = $this->model->getValidar('ROL', $numeros, 'modificar', $id);
                        if (empty($verificarNumeros) || $verificarNumeros == $verificarNumeros) {
                            $data = $this->model->actualizarRol($roles, $numeros, 1, $id);
                            if ($data > 0) {
                                $res = array('msg' => 'ROL ACTUALIZADO', 'type' => 'success');
                            } else {
                                $res = array('msg' => 'ERROR AL ACTUALIZAR', 'type' => 'error');
                            }
                        } else {
                            $res = array('msg' => 'EL NUMERO DEBE SER UNICO', 'type' => 'warning');
                        }
                    } else {
                        $res = array('msg' => 'EL ROL DEBE SER UNICO', 'type' => 'warning');
                    }
                }
            }
        } else {
            //$roles = strClean($_POST['roles']);
            //$numeros = strClean($_POST['numeros']);
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        // $nombre = strClean($_POST['nombre']);                                          //✅✅✅✅✅
        $permisos = (!empty($_POST['permisos'])) ? $_POST['permisos'] : null;

        $listaPermisos = ($permisos != null) ? json_encode($permisos) : null;
        $id = strClean($_POST['id']);
        $data = $this->model->actualizar($listaPermisos, $id);
        if ($data == 1) {
            $res = array('msg' => 'ROL MODIFICADO', 'type' => 'success');
        } else {
            $res = array('msg' => 'ERROR AL MODICAR', 'type' => 'error');
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

    public function editarRol($id)
    {
        $data = $this->model->editar($id);
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



///🌟🌟🌟🌟🌟🌟🌟🌟🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰
   /* public function getRoles2($id)
    {
        $data = $this->model->getRoles2($id);
        $res = array('roles' => $data, 'type' => 'success');
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }*/
///🌟🌟🌟🌟🌟🌟🌟🌟🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰
}
