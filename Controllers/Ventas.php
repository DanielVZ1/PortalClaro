<?php
class Ventas extends Controller
{
  public function __construct()
  {
    session_start();

    parent::__construct();
  }

  public function index()
  {
    if (!isset($_SESSION['id_usuario'])) {
      header('Location: ' . base_url . 'login');
      exit();
  }
      $id_user = $_SESSION['id_usuario'];
      $verificar = $this->model->verificarPermiso($id_user, 'Ventas');

      if ($verificar && count($verificar) > 0) {
      $data['page_id'] = 1;
      $data['page_tag'] = "Ventas";
      $data['page_name'] = "Lista_Ventas";
      $data['page_title'] = "Ventas <small> </small>";
      $this->views->getView($this, "index", $data);
    } else {
      header('Location: ' . base_url . 'Errors/permisos');
      exit();
    }
  }

  public function listar()
  {
      // Obtener los parámetros de la solicitud
      $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'todos';
      $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null;
  
      // Llamar al modelo para obtener las ventas con los filtros aplicados
      $data = $this->model->getVentas($filtro, $fecha);
  
      // Procesar las ventas obtenidas para agregar las acciones si es necesario
      for ($i = 0; $i < count($data); $i++) {
          if ($data[$i]['estado'] == 1) {
              $data[$i]['acciones'] = '<div style="display: flex; align-items: center;">
                  <button class="edit-button" type="button" onclick="btnEditarVentas(' . $data[$i]['id'] . '); " style="margin-right: 5px;">
                     <svg class="edit-svgIcon" viewBox="0 0 512 512" style="width: 1em; height: 1em; fill: currentColor;">
                              <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                          </svg>
                  </button>
                  <button class="delete-button" type="button" onclick="btnEliminarVentas(' . $data[$i]['id'] . ');">
                     <svg class="delete-svgIcon" viewBox="0 0 448 512">
                      <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                      </svg>
                  </button>
                </div>';
          }
      }
  
      // Responder con los datos filtrados
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();
  }
  
  

  public function registrar()
  {
    $telefono = $_POST['telefono'];
    $medio = $_POST['medio'];
    $subgerente = $_POST['subgerente'];
    $coordinador = $_POST['coordinador'];
    $supervisor = $_POST['supervisor'];
    $fecha = $_POST['fecha'];
    $codigo = $_POST['codigo'];
    $ubicacion = $_POST['ubicacion'];
    $promotor = $_POST['promotor'];
    $punto_venta = $_POST['punto_venta'];
    $departamento = $_POST['departamento'];
    $zona = $_POST['zona'];
    $distribuidor = $_POST['distribuidor'];
    $proveedor = $_POST['proveedor'];
    $producto = $_POST['producto'];
    $perfil_plan = $_POST['perfil_plan'];
    $tecnologia = $_POST['tecnologia'];
    $centro_venta = $_POST['centro_venta'];
    $canal_rediac = $_POST['canal_rediac'];
    $aliado = $_POST['aliado'];
    $id = $_POST['id'];
    if (
      empty($telefono) || empty($medio) || empty($subgerente) || empty($coordinador) || empty($supervisor) ||
      empty($fecha) || empty($codigo) || empty($ubicacion) || empty($promotor) || empty($punto_venta) || empty($departamento) ||
      empty($zona) || empty($distribuidor) || empty($proveedor) || empty($producto) || empty($perfil_plan) || empty($tecnologia) ||
      empty($centro_venta) || empty($canal_rediac) || empty($aliado)
    ) {
      $msg = "Todos los campos son obligatorios";
    } else {
      if ($id == "") {
        $data =  $this->model->registrarVentas(
          $telefono,
          $medio,
          $subgerente,
          $coordinador,
          $supervisor,
          $fecha,
          $codigo,
          $ubicacion,
          $promotor,
          $punto_venta,
          $departamento,
          $zona,
          $distribuidor,
          $proveedor,
          $producto,
          $perfil_plan,
          $tecnologia,
          $centro_venta,
          $canal_rediac,
          $aliado
        );
        if ($data == "ok") {
          $msg = "si";
        } else {
          $msg = "Error al registrar la venta";
        }
      } else {
        $data =  $this->model->modificarVentas(
          $telefono,
          $medio,
          $subgerente,
          $coordinador,
          $supervisor,
          $fecha,
          $codigo,
          $ubicacion,
          $promotor,
          $punto_venta,
          $departamento,
          $zona,
          $distribuidor,
          $proveedor,
          $producto,
          $perfil_plan,
          $tecnologia,
          $centro_venta,
          $canal_rediac,
          $aliado,
          $id
        );
        if ($data == "modificado") {
          $msg = "modificado";
        } else {
          $msg = "Error al modificar la venta";
        }
      }
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function editar(int $id)
  {
    $data = $this->model->editarVentas($id);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function eliminar($id)
  {
    $ventasModel = new VentasModel();
    $resultado = $ventasModel->eliminarVentas($id);

    if ($resultado) {
      echo json_encode("ok");
    } else {
      echo json_encode("Error al eliminar la venta");
    }
  }

  public function salir()
  {
    session_destroy();
    header("location: " . base_url);
  }
}
