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
        $data[$i]['acciones'] = '<div>
              <button class="btn btn-danger" type="button" onclick="btnEliminarAsistencia(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
              <button class="btn btn-secondary" type="button" onclick="btnVerAsistencia(' . $data[$i]['id'] . ');"><i class="fas fa-eye"></i></button>
            <div/>';
      } else {
        $data[$i]['estado'] = '<span class="badge badge-danger" style="color:red">Inactivo</span>';
        $data[$i]['acciones'] = '<div>
              <button class="btn btn-secondary" type="button" onclick="btnVerAsistencia(' . $data[$i]['id'] . ');"><i class="fas fa-eye"></i></button>
              <button class="btn btn-danger" type="button" onclick="btnEliminarAsistencia(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
            <div/>';
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
