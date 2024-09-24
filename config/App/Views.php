<?php
    class Views{
       public function getView($controlador, $vista, $data = "")
       {
          $controlador = get_class($controlador);
          if ($controlador == "Home") {
              $vista = "Views/".$vista.".php";
            }else {
                $vista = "Views/".$controlador."/".$vista.".php";
              
            }
            require $vista;
       }

       public function getView1($ruta, $nombre, $data = "")
  {
    if ($ruta == 'principal') {
        $vista = 'views/' . $nombre . '.php';
    }else {
        $vista = 'views/' . $ruta . '/' . $nombre . '.php';
    }
    require $vista;
  }
    }
?>