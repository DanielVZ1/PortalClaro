<?php

class Permisos extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function getPermisosRol(string $idrol)
    {
        $rolid = intval($idrol);
        if ($rolid > 0) {
            // Obtén todos los módulos
            $arrModulos = $this->model->selectModulos();

            // Verifica si realmente obtuviste datos de módulos
            if (empty($arrModulos)) {
                die('No se encontraron módulos.');
            }

            // Obtén los permisos del rol actual
            $arrPermisosRol = $this->model->selectPermisosRol($rolid);

            // Inicializa un array de permisos vacíos
            $arrPermisosDefault = ['r' => 0, 'w' => 0, 'u' => 0, 'd' => 0];

            // Asigna permisos a cada módulo
            foreach ($arrModulos as &$modulo) {
                // Inicializa con permisos vacíos
                $permisos = $arrPermisosDefault;

                // Verifica que el módulo actual tenga un 'idmodulo'
                if (!isset($modulo['idmodulo'])) {
                    die('El módulo no tiene un idmodulo definido.');
                }

                // Busca los permisos del módulo actual
                foreach ($arrPermisosRol as $permisoRol) {
                    if ($modulo['idmodulo'] == $permisoRol['moduloid']) {
                        // Asigna esos valores si hay permisos
                        $permisos = [
                            'r' => $permisoRol['r'],
                            'w' => $permisoRol['w'],
                            'u' => $permisoRol['u'],
                            'd' => $permisoRol['d'],
                        ];
                        break; // Sale del bucle una vez que encuentra los permisos
                    }
                }

                // Asigna los permisos al módulo
                $modulo['permisos'] = $permisos;
            }

            // Asigna los módulos con permisos al array principal
            $arrPermisoRol = ['idrol' => $rolid, 'modulos' => $arrModulos];

            // Genera el modal con los permisos cargados
            $html = getModal("modalPermisos", $arrPermisoRol);

            // Asegúrate de que el modal se imprima correctamente
            echo $html;
            return; // Asegúrate de salir de la función después de generar el modal
        }

        die('ID de rol inválido.');
    }


    public function setPermisos()
    {
        if ($_POST) {
            $intIdrol = intval($_POST['idrol']);
            $modulos = $_POST['modulos'];

            $this->model->deletePermisos($intIdrol);
            foreach ($modulos as $modulo) {
                $idModulo = $modulo['idmodulo'];
                $r = empty($modulo['r']) ? 0 : 1;
                $w = empty($modulo['w']) ? 0 : 1;
                $u = empty($modulo['u']) ? 0 : 1;
                $d = empty($modulo['d']) ? 0 : 1;
                $requestPermiso = $this->model->insertPermisos($intIdrol, $idModulo, $r, $w, $u, $d);
            }
            if ($requestPermiso > 0) {
                $arrResponse = array('status' => true, 'msg'  => 'Permisos asignados correctemente.');
            } else {
                $arrResponse = array("status" => false, "msg"  => 'No es posible asignar permisos');
            }
            echo  json_encode($arrResponse,  JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
