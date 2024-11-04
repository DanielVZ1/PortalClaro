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
        $data['page_id'] = 3;
        $data['page_tag'] = "Roles Usuarios";
        $data['page_name'] = "rol_usuario";
        $data['page_title'] = "Roles Usuarios <small> </small>";
        $this->views->getView($this, 'roles', $data);
    }

    public function getRoles()
    {
        $arrData = $this->model->selectRoles();

        for ($i = 0; $i < count($arrData); $i++) {
            if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<span class="badge badge-success" style="color: green">Activo</span>';
            } else {
                $arrData[$i]['status'] = '<span class="badge badge-danger" style="color:red">Inactivo</span>';
            }

            // Condición para evitar acciones en el rol con id 1
            if ($arrData[$i]['id'] == 1) {
                $arrData[$i]['options'] = '<div class="text-center">
                     <button class="btn key-button btn-sm btnPermisosRol" rl="' . $arrData[$i]['id'] . '" title="Permisos" style="margin-right: 5px;">
                              <svg class="key-svgIcon" viewBox="0 0 640 512">
                                <path d="M320 0c-17.7 0-32 14.3-32 32v32H128c-17.7 0-32 14.3-32 32v32h448V64c0-17.7-14.3-32-32-32H352V32c0-17.7-14.3-32-32-32zm0 128c-8.5 0-16.4 3.4-22.6 9.4l-65.9 65.9c-12.5 12.5-12.5 32.8 0 45.3l65.9 65.9c6.2 6.2 14.1 9.4 22.6 9.4s16.4-3.2 22.6-9.4c12.5-12.5 12.5-32.8 0-45.3l-29.6-29.6 29.6-29.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-29.6 29.6-29.6-29.6c-6.2-6.2-14.1-9.4-22.6-9.4z"/>
                                </svg>
                    </button>
                </div>';
            } else {
                $arrData[$i]['options'] = '<div style="display: flex; align-items: center;">
                    <button class="btn lock-button btn-sm btnPermisosRol" rl="' . $arrData[$i]['id'] . '" title="Permisos" style="margin-right: 5px;">
                            <svg class="lock-svgIcon" viewBox="-0.5 -0.5 16 16">
                                <path
                                    d="M7.5 8.235c-0.1949375 0 -0.38187499999999996 0.0775 -0.5196875 0.2153125s-0.2153125 0.32475 -0.2153125 0.5196875v2.205c0 0.1949375 0.0775 0.38187499999999996 0.2153125 0.51975s0.32475 0.21525 0.5196875 0.21525c0.1949375 0 0.3819375 -0.07743749999999999 0.51975 -0.21525s0.21525 -0.32481250000000006 0.21525 -0.51975v-2.205c0 -0.1949375 -0.07743749999999999 -0.38187499999999996 -0.21525 -0.5196875s-0.32481250000000006 -0.2153125 -0.51975 -0.2153125Zm3.675 -2.94V3.825c0 -0.9746875 -0.3871875 -1.9094375 -1.076375 -2.598625S8.4746875 0.15 7.5 0.15c-0.9746875 0 -1.9094375 0.3871875 -2.598625 1.076375S3.825 2.8503125000000002 3.825 3.825v1.47c-0.5848125 0 -1.145625 0.23231249999999998 -1.5591875 0.6458125000000001C1.8523124999999998 6.354375 1.62 6.9152499999999995 1.62 7.5v5.145c0 0.58475 0.23231249999999998 1.145625 0.6458125000000001 1.5591875 0.41356249999999994 0.4135 0.974375 0.6458125000000001 1.5591875 0.6458125000000001h7.35c0.58475 0 1.145625 -0.23231249999999998 1.5591875 -0.6458125000000001 0.4135 -0.41356249999999994 0.6458125000000001 -0.9744375 0.6458125000000001 -1.5591875V7.5c0 -0.58475 -0.23231249999999998 -1.145625 -0.6458125000000001 -1.5591875 -0.41356249999999994 -0.4135 -0.9744375 -0.6458125000000001 -1.5591875 -0.6458125000000001ZM5.295 3.825c0 -0.5848125 0.23231249999999998 -1.145625 0.6458125000000001 -1.5591875C6.354375 1.8523124999999998 6.9152499999999995 1.62 7.5 1.62s1.145625 0.23231249999999998 1.5591875 0.6458125000000001c0.4135 0.41356249999999994 0.6458125000000001 0.974375 0.6458125000000001 1.5591875v1.47H5.295V3.825Zm6.615 8.82c0 0.1949375 -0.07743749999999999 0.3819375 -0.21525 0.51975s-0.32481250000000006 0.21525 -0.51975 0.21525H3.825c-0.1949375 0 -0.38187499999999996 -0.07743749999999999 -0.51975 -0.21525 -0.1378125 -0.1378125 -0.21525 -0.32481250000000006 -0.21525 -0.51975V7.5c0 -0.1949375 0.07743749999999999 -0.38187499999999996 0.21525 -0.5196875 0.137875 -0.1378125 0.32481250000000006 -0.2153125 0.51975 -0.2153125h7.35c0.1949375 0 0.3819375 0.0775 0.51975 0.2153125s0.21525 0.32475 0.21525 0.5196875v5.145Z"
                                    fill="#ffffff"
                                    stroke-width="1"
                                ></path>
                            </svg>
                    </button>
                    <button class="btn edit-button btn-sm btnEditRol" rl="' . $arrData[$i]['id'] . '" title="Editar" style="margin-right: 5px;">
                         <svg class="edit-svgIcon" viewBox="0 0 512 512" style="width: 1em; height: 1em; fill: currentColor;">
                              <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                          </svg>
                    </button>
                    <button class="delete-button" type="button" onclick="btnDelRol(' . $arrData[$i]['id'] . ');" title="Eliminar">
                         <svg class="delete-svgIcon" viewBox="0 0 448 512">
                    <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                  </svg>
                    </button>
                </div>';
            }
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function getRol(int $idrol)
    {
        $intIdrol = intval(strClean($idrol));
        if ($intIdrol > 0) {
            $arrData = $this->model->selectRol($intIdrol);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'No se encontraron datos');
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setRol()
    {
        $intIdrol = intval($_POST['idRol']);
        $strRol = isset($_POST['txtNombre']) ? strClean($_POST['txtNombre']) : '';
        $strDescripcion = isset($_POST['txtDescripcion']) ? strClean($_POST['txtDescripcion']) : '';
        $intStatus = isset($_POST['listStatus']) ? intval($_POST['listStatus']) : 2;

        // Logs para depurar
        error_log("ID Rol: $intIdrol");
        error_log("Nombre Rol: $strRol");
        error_log("Descripción: $strDescripcion");
        error_log("Status: $intStatus");

        if ($intIdrol == 0) {
            error_log("Insertando nuevo rol");
            $request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
            $option = 1;
        } else {
            error_log("Actualizando rol existente");
            $request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescripcion, $intStatus); // Faltaba pasar el $intIdrol
            $option = 2;
        }

        if ($request_rol > 0) {
            if ($option == 1) {
                error_log("Rol creado correctamente");
                $arrResponse = array('status' => true, 'msg' => 'Rol creado correctamente.');
            } else {
                error_log("Rol actualizado correctamente");
                $arrResponse = array('status' => true, 'msg' => 'Rol actualizado correctamente.');
            }
        } else if ($request_rol == 'exist') {
            error_log("El rol ya existe");
            $arrResponse = array('status' => false, 'msg' => 'El rol ya existe.');
        } else {
            error_log("Error al crear el rol");
            $arrResponse = array('status' => false, 'msg' => 'Error al crear el rol.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }



    public function delRol($idrol)
    {
        $RolesModel = new RolesModel();
        $resultado = $RolesModel->DeleteRol($idrol);

        if ($resultado) {
            echo json_encode("ok");
        } else {
            echo json_encode("Error al eliminar el rol");
        }
    }

    public function getSelectRoles()
    {
        $htmlOptions = "";
        $arrData = $this->model->selectRoles();
        if (count($arrData) > 0) {
            for ($i = 0; $i < count($arrData); $i++) {
                $htmlOptions .= '<option value="' . $arrData[$i]['id'] . '">' . $arrData[$i]['nombrerol'] . '</option>';
            }
        }
        echo $htmlOptions;
        die();
    }
}
