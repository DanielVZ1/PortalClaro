<?php

class Permisos extends Controller
{
    public function __construct()
    {   session_start();
        parent::__construct();      
    }

    public function getPermisosRol(int $idrol)
    {
        $rolid = intval($idrol);
        if($rolid > 0)
        {
            $arrModulos = $this->model->selectModulos();
            $arrPermisoRol = $this->model->selectPermisosRol($rolid);
            $arrPermisos = array('r' => 0, 'w' => 0,'u' => 0,'d' => 0);
            $arrPermisoRol = array('idrol' => $rolid);

            if( empty ($arrPermisosRol))
            {
                for ($i = 0; $i < count($arrModulos) ; $i++){

                    $arrModulos [$i]['permisos'] = $arrPermisos;
                }
            }else{
                for ($i = 0; $i < count($arrModulos) ; $i++){

                    $arrPermisos = array('r' => $arrPermisoRol[$i]['r'],
                                         'w' => $arrPermisoRol[$i]['w'],
                                         'u' => $arrPermisoRol[$i]['u'],
                                         'd' => $arrPermisoRol[$i]['d']
                                        );
                    if($arrModulos[$i]['idmodulos'] == $arrPermisosRol[$i]['moduloid'])
                    {
                        $arrModulos[$i]['permisos'] = $arrPermisos;
                    }
                }
            }
            $arrPermisoRol['modulos'] = $arrModulos;
            $html = getModal("modalPermisos",$arrPermisoRol);
        }
        die();

    }

    public function setPermisos()
    {
        if ($_POST) {
            // Capturamos el ID del rol
            $intIdrol = intval($_POST['idrol']);
            error_log("ID del rol recibido: " . $intIdrol);  // Verificamos que el ID se reciba correctamente
    
            if ($intIdrol > 0) {
                $modulos = $_POST['modulos'];
                $this->model->deletePermisos($intIdrol); // Eliminar permisos anteriores
                
                // Inicializamos una variable para verificar si alguna inserción falla
                $insertSuccess = true;
    
                foreach ($modulos as $modulo) {
                    $idModulo = intval($modulo['idmodulo']);
                    $r = empty($modulo['r']) ? 0 : 1;
                    $w = empty($modulo['w']) ? 0 : 1;
                    $u = empty($modulo['u']) ? 0 : 1;
                    $d = empty($modulo['d']) ? 0 : 1;
    
                    // Intentamos insertar los permisos
                    $requestPermiso = $this->model->insertPermisos($intIdrol, $idModulo, $r, $w, $u, $d);
                    error_log("Resultado de inserción para módulo $idModulo: " . $requestPermiso); // Verificamos el resultado de cada inserción
    
                    if ($requestPermiso <= 0) {
                        $insertSuccess = false;
                        break;
                    }
                }
    
                // Generamos la respuesta
                if ($insertSuccess) {
                    $arrResponse = array('status' => true, 'msg' => 'Permisos asignados correctamente.');
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'No se pudieron asignar todos los permisos.');
                }
            } else {
                $arrResponse = array('status' => false, 'msg' => 'El ID del rol no es válido.');
            }
    
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    


}
?>