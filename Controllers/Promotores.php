<?php
class Promotores extends Controller
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
    $data['page_id'] = 4;
    $data['page_tag'] = "Promotores";
    $data['page_name'] = "promotores";
    $data['page_title'] = "Promotores <small> </small>";
    $data['estados_civiles'] = $this->model->getEstados_Civiles();
    $data['generos'] = $this->model->getGeneros();
    $data['zonas'] = $this->model->getZonas();
    $data['departamentos'] = $this->model->getDepartamentos();
    $data['municipios'] = $this->model->getMunicipios();
    $data['gerencias'] = $this->model->getGerencias();
    $data['canales'] = $this->model->getCanales();
    $data['proyectos'] = $this->model->getProyectos();
    $data['cargos'] = $this->model->getCargos();
    $this->views->getView($this, "index", $data);
  }

  public function listar()
  {
    $data = $this->model->getPromotores();
    for ($i = 0; $i < count($data); $i++) {
      $data[$i]['imagen'] = '<img class= "img-thumbnail" src ="' . base_url . "Assets/imgBD/" . $data[$i]['foto'] . '" width = "100">';
      if ($data[$i]['estado'] == 1) {
        $data[$i]['estado'] = '<span class="badge badge-success" style="color: green">Activo</span>';
        $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarPromotor(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarPromotor(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
                <button class="btn btn-secondary" type="button" onclick="btnVerPromotor(' . $data[$i]['id'] . ');"><i class="fas fa-eye"></i></button>

              <div/>';
      } else {
        $data[$i]['estado'] = '<span class="badge badge-danger" style="color:red">Inactivo</span>';
        $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarPromotor(' . $data[$i]['id'] . ');"><i class="fas fa-sync-alt"></i></button>
                <button class="btn btn-secondary" type="button" onclick="btnVerPromotor(' . $data[$i]['id'] . ');"><i class="fas fa-eye"></i></button>

              <div/>';
      }
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function registrar()
  {
    $codigo = $_POST['codigo'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $profesion = $_POST['profesion'];
    $estado_civil = $_POST['estado_civil'];
    $genero = $_POST['genero'];
    $direccion = $_POST['direccion'];
    $zona = $_POST['zona'];
    $departamento = $_POST['departamento'];
    $municipio = $_POST['municipio'];
    $gerencia = $_POST['gerencia'];
    $canal = $_POST['canal'];
    $proyecto = $_POST['proyecto'];
    $cargo = $_POST['cargo'];
    $id = $_POST['id'];
    $img = $_FILES['imagen'];
    $name = $img['name'];
    $tmpname = $img['tmp_name'];
    $fecha = date("YmdHis");
    if (
      empty($codigo) || empty($dni) || empty($nombre) || empty($apellido) || empty($telefono)
      || empty($profesion) || empty($direccion)
    ) {
      $msg = "Todos los campos son obligatorios";
    } else {
      if (!empty($name)) {
        $imgNombre = $fecha . ".png";
        $destino = "Assets/imgBD/" . $imgNombre;
      } else if (!empty($_POST['foto_actual']) && empty($name)) {
        $imgNombre = $_POST['foto_actual'];
      } else {
        $imgNombre = "default.png";
      }
      if ($id == "") {
        $data =  $this->model->registrarPromotor(
          $codigo,
          $dni,
          $nombre,
          $apellido,
          $telefono,
          $profesion,
          $estado_civil,
          $genero,
          $direccion,
          $zona,
          $departamento,
          $municipio,
          $gerencia,
          $canal,
          $proyecto,
          $cargo,
          $imgNombre
        );
        if ($data == "ok") {
          if (!empty($name)) {
            move_uploaded_file($tmpname, $destino); //Para la foto
          }
          $msg = "si";
        } else if ($data == "existe") {
          $msg = "El Promotor ya existe";
        } else {
          $msg = "Error al registrar el Promotor";
        }
      } else {
        //if($_POST['foto_actual'] != $_POST['foto_delete']){
        $imgDelete = $this->model->editarPromotor($id);
        if ($imgDelete['foto'] != 'default.png' || $imgDelete['foto'] != "") {
          if (file_exists("Assets/imgBD/" . $imgDelete['foto'])) {
            unlink("Assets/imgBD/" . $imgDelete['foto']);
          }
        }
        $data =  $this->model->modificarPromotor(
          $codigo,
          $dni,
          $nombre,
          $apellido,
          $telefono,
          $profesion,
          $estado_civil,
          $genero,
          $direccion,
          $zona,
          $departamento,
          $municipio,
          $gerencia,
          $canal,
          $proyecto,
          $cargo,
          $imgNombre,
          $id
        );
        if ($data == "modificado") {
          if (!empty($name)) {
            move_uploaded_file($tmpname, $destino); //Para la foto
          }
          $msg = "modificado";
        } else {
          $msg = "Error al modificar el Promotor";
        }
        //}
      }
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function editar(int $id)
  {
    $data = $this->model->editarPromotor($id);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function eliminar(int $id)
  {
    $data = $this->model->accionPromotor(0, $id);
    if ($data == 1) {
      $msg = "ok";
    } else {
      $msg = "Error al rechazar el Promotor";
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function reingresar(int $id)
  {
    $data = $this->model->accionPromotor(1, $id);
    if ($data == 1) {
      $msg = "ok";
    } else {
      $msg = "Error al contratar el Promotor";
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function ver(int $id)
  {
    $data = $this->model->verPromotor($id);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
  }


  public function salir()
  {
    session_destroy();
    header("location: " . base_url);
  }
}
