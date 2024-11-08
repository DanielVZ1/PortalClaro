<?php
class Asistencia extends Controller
{
  public function __construct()
  {
    session_start();
    if (empty($_SESSION['activo'])) {
      header("location:" . base_url);
    }
    parent::__construct();
  }

  public function index()
  {
    $data['page_id'] = 6;
    $data['page_tag'] = "Asistencias";
    $data['page_name'] = "asistencias_prom";
    $data['page_title'] = "Asistencias <small> </small>";
    $this->views->getView($this, "index", $data);
  }

  public function listar()
  {
    $filtro = $_GET['filtro'] ?? null;
    $fecha = $_GET['fecha'] ?? null;
    $data = $this->model->getAsistencias($filtro, $fecha);
    for ($i = 0; $i < count($data); $i++) {
      $data[$i]['imagen'] = '<img class= "img-thumbnail" src ="' . base_url . "Assets/img/FotosAsistencias/" . $data[$i]['foto'] . '" width = "100">';
      if ($data[$i]['estado'] == 1) {
        $data[$i]['estado'] = '<span class="badge badge-success" style="color: green">Activo</span>';
        $data[$i]['acciones'] = '<div style="display: flex; align-items: center;">
               <button class="delete-button" onclick="btnEliminarAsistencia(' . $data[$i]['id'] . ');">
                         <svg class="delete-svgIcon" viewBox="0 0 448 512">
                    <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                  </svg>
                      </button>
<button class="visualize-button" type="button" onclick="btnVerAsistencia(' . $data[$i]['id'] . ');">
  <svg class="visualize-svgIcon" viewBox="0 0 24 24">
    <path d="M12 4.5C6.5 4.5 2 12 2 12s4.5 7.5 10 7.5 10-7.5 10-7.5S17.5 4.5 12 4.5zm0 12c-2.8 0-5-2.2-5-5s2.2-5 5-5 5 2.2 5 5-2.2 5-5 5zm0-8c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3z"/>
  </svg>
</button>

            <div/>';
      } else {
        $data[$i]['estado'] = '<span class="badge badge-danger" style="color:red">Inactivo</span>';
        $data[$i]['acciones'] = '<div>
              <button class="btn btn-secondary" type="button" onclick="btnVerAsistencia(' . $data[$i]['id'] . ');"><i class="fas fa-eye"></i></button>
              <button class="btn btn-danger" type="button" onclick="btnEliminarAsistencia(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
            </div>';
      }
      if ($data[$i]['hora_salida'] == null) {
        $data[$i]['hora_salida'] = 'Hora No Registrada';
      };
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function eliminar($id)
  {
    $asistenciaModel = new AsistenciaModel();
    $resultado = $asistenciaModel->eliminarAsistencia($id);

    if ($resultado) {
      echo json_encode("ok");
    } else {
      echo json_encode("Error al eliminar la asistencia");
    }
  }

  public function ver(int $id)
  {
    $data = $this->model->verAsistencia($id);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
  }
}
