<?php

function getModal(string $modalsRoles, $data)
{
    $view_modal = "Views/Templates/Modals/{$modalsRoles}.php";
    require_once $view_modal;
}

function dep($data)
{
    $format = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('<pre>');
    return $format;
}

function getPermisos(int $idmodulo){
    require_once("Models/PermisosModel.php");
    $objPermisos = new PermisosModel();
    $idrol = $_SESSION['usuario']['id_rol'];
    $arrPermisos = $objPermisos->permisosModulo($idrol);
    $permisos = '';
    $permisosMod = '';

    if(count($arrPermisos) > 0 ){
        $permisos = $arrPermisos;
        $permisosMod = isset($arrPermisos[$idmodulo]) ? $arrPermisos[$idmodulo] : "";
    }

    $_SESSION['permisos'] = $permisos;
    $_SESSION['permisosMod'] = $permisosMod;
}

function strClean($cadena)
{
    $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $cadena);
    $string = trim($string);
    $string = stripslashes($string);
    $string = str_ireplace('<script>', '', $string);
    $string = str_ireplace('</script>', '', $string);
    $string = str_ireplace('<script type=>', '', $string);
    $string = str_ireplace('<script src>', '', $string);
    $string = str_ireplace('SELECT * FROM', '', $string);
    $string = str_ireplace('DELETE FROM', '', $string);
    $string = str_ireplace('INSERT INTO', '', $string);
    $string = str_ireplace('SELECT COUNT(*) FROM', '', $string);
    $string = str_ireplace('DROP TABLE', '', $string);
    $string = str_ireplace("OR '1'='1", '', $string);
    $string = str_ireplace('OR ´1´=´1', '', $string);
    $string = str_ireplace('IS NULL', '', $string);
    $string = str_ireplace('LIKE "', '', $string);
    $string = str_ireplace("LIKE '", '', $string);
    $string = str_ireplace('LIKE ´', '', $string);
    $string = str_ireplace('OR "a"="a', '', $string);
    $string = str_ireplace("OR 'a'='a", '', $string);
    $string = str_ireplace('OR ´a´=´a', '', $string);
    $string = str_ireplace('--', '', $string);
    $string = str_ireplace('^', '', $string);
    $string = str_ireplace('[', '', $string);
    $string = str_ireplace(']', '', $string);
    $string = str_ireplace('==', '', $string);
    return $string;
}



?>