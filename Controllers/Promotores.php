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
    if (!isset($_SESSION['id_usuario'])) {
      header('Location: ' . base_url . 'login');
      exit();
  }
    $id_user = $_SESSION['id_usuario'];
    $verificar = $this->model->verificarPermiso($id_user, 'Promotores');

    if ($verificar && count($verificar) > 0) {
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
      } else {
        // Si el usuario no tiene permisos, redirigir a la página de error
        header('Location: ' . base_url . 'Errors/permisos');
        exit(); // Asegúrate de que el script se detenga después de la redirección
    }
  }

  public function listar()
  {
    $data = $this->model->getPromotores();
    for ($i = 0; $i < count($data); $i++) {
      $data[$i]['imagen'] = '<img class= "img-thumbnail" src ="' . base_url . "Assets/imgBD/" . $data[$i]['foto'] . '" width = "100">';
       // Verificar si los documentos existen y generar enlaces
        // Verificar si los documentos existen y generar enlaces con el nombre del archivo limpio
        if (!empty($data[$i]['cv'])) {
          // Eliminar la numeración al principio del nombre del archivo (por ejemplo, 6733d35e639f6-)
          $cleanedCvName = preg_replace('/^\w{13}-/', '', $data[$i]['cv']); // Esto elimina la numeración
          $data[$i]['cv'] = '<a href="' . base_url . 'Assets/Documents/CV/' . $data[$i]['cv'] . '" target="_blank">' . $cleanedCvName . '</a>';
      } else {
          $data[$i]['cv'] = 'No disponible';
      }

      if (!empty($data[$i]['antecedentes'])) {
          // Eliminar la numeración al principio del nombre del archivo
          $cleanedAntecedentesName = preg_replace('/^\w{13}-/', '', $data[$i]['antecedentes']);
          $data[$i]['antecedentes'] = '<a href="' . base_url . 'Assets/Documents/Antecedentes/' . $data[$i]['antecedentes'] . '" target="_blank">' . $cleanedAntecedentesName . '</a>';
      } else {
          $data[$i]['antecedentes'] = 'No disponible';
      }

      if (!empty($data[$i]['contrato'])) {
          // Eliminar la numeración al principio del nombre del archivo
          $cleanedContratoName = preg_replace('/^\w{13}-/', '', $data[$i]['contrato']);
          $data[$i]['contrato'] = '<a href="' . base_url . 'Assets/Documents/Contrato/' . $data[$i]['contrato'] . '" target="_blank">' . $cleanedContratoName . '</a>';
      } else {
          $data[$i]['contrato'] = 'No disponible';
      }
      if ($data[$i]['estado'] == 1) {
        $data[$i]['estado'] = '<span class="badge badge-success" style="color: green">Activo</span>';
        $data[$i]['acciones'] = '<div style="display: flex; align-items: center;">
                <button class="edit-button" type="button" onclick="btnEditarPromotor(' . $data[$i]['id'] . ');">
                      <svg class="edit-svgIcon" viewBox="0 0 512 512" style="width: 1em; height: 1em; fill: currentColor;">
                      <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                      </svg>
                </button>
                <button class="delete-button" type="button" onclick="btnEliminarPromotor(' . $data[$i]['id'] . ');">
                      <svg class="delete-svgIcon" xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512" style="width: 1em; height: 1em; fill: white;">
                      <path fill="#ffffff" d="M352 224l-46.5 0c-45 0-81.5 36.5-81.5 81.5c0 22.3 10.3 34.3 19.2 40.5c6.8 4.7 12.8 12 12.8 20.3c0 9.8-8 17.8-17.8 17.8l-2.5 0c-2.4 0-4.8-.4-7.1-1.4C210.8 374.8 128 333.4 128 240c0-79.5 64.5-144 144-144l80 0 0-61.3C352 15.5 367.5 0 386.7 0c8.6 0 16.8 3.2 23.2 8.9L548.1 133.3c7.6 6.8 11.9 16.5 11.9 26.7s-4.3 19.9-11.9 26.7l-139 125.1c-5.9 5.3-13.5 8.2-21.4 8.2l-3.7 0c-17.7 0-32-14.3-32-32l0-64zM80 96c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l320 0c8.8 0 16-7.2 16-16l0-48c0-17.7 14.3-32 32-32s32 14.3 32 32l0 48c0 44.2-35.8 80-80 80L80 512c-44.2 0-80-35.8-80-80L0 112C0 67.8 35.8 32 80 32l48 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L80 96z"/>
                      </svg>
                </button>
                <button class="visualize-button" type="button" onclick="btnVerPromotor(' . $data[$i]['id'] . ');">
                      <svg class="visualize-svgIcon" viewBox="0 0 24 24">
                      <path d="M12 4.5C6.5 4.5 2 12 2 12s4.5 7.5 10 7.5 10-7.5 10-7.5S17.5 4.5 12 4.5zm0 12c-2.8 0-5-2.2-5-5s2.2-5 5-5 5 2.2 5 5-2.2 5-5 5zm0-8c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3z"/>
                      </svg>
                </button>
              <div/>';
      } else {
        $data[$i]['estado'] = '<span class="badge badge-danger" style="color:red">Inactivo</span>';
        $data[$i]['acciones'] = '<div style="display: flex; align-items: center;">
                <button class="activate-button" type="button" onclick="btnReingresarPromotor(' . $data[$i]['id'] . ');">
                      <svg class="activate-svgIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 1em; height: 1em;">
                      <path fill="#ffffff" d="M142.9 142.9c-17.5 17.5-30.1 38-37.8 59.8c-5.9 16.7-24.2 25.4-40.8 19.5s-25.4-24.2-19.5-40.8C55.6 150.7 73.2 122 97.6 97.6c87.2-87.2 228.3-87.5 315.8-1L455 55c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2l0 128c0 13.3-10.7 24-24 24l-8.4 0c0 0 0 0 0 0L344 224c-9.7 0-18.5-5.8-22.2-14.8s-1.7-19.3 5.2-26.2l41.1-41.1c-62.6-61.5-163.1-61.2-225.3 1zM16 312c0-13.3 10.7-24 24-24l7.6 0 .7 0L168 288c9.7 0 18.5 5.8 22.2 14.8s1.7 19.3-5.2 26.2l-41.1 41.1c62.6 61.5 163.1 61.2 225.3-1c17.5-17.5 30.1-38 37.8-59.8c5.9-16.7 24.2-25.4 40.8-19.5s25.4 24.2 19.5 40.8c-10.8 30.6-28.4 59.3-52.9 83.8c-87.2 87.2-228.3 87.5-315.8 1L57 457c-6.9 6.9-17.2 8.9-26.2 5.2S16 449.7 16 440l0-119.6 0-.7 0-7.6z"/>
                      </svg>
                </button>
                <button class="visualize-button" type="button" onclick="btnVerPromotor(' . $data[$i]['id'] . ');">
                      <svg class="visualize-svgIcon" viewBox="0 0 24 24">
                      <path d="M12 4.5C6.5 4.5 2 12 2 12s4.5 7.5 10 7.5 10-7.5 10-7.5S17.5 4.5 12 4.5zm0 12c-2.8 0-5-2.2-5-5s2.2-5 5-5 5 2.2 5 5-2.2 5-5 5zm0-8c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3z"/>
                      </svg>
                </button>
              <div/>';
      }
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function registrar()
  {
      // Obtener datos del formulario
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
  
      // Si el ID está vacío, significa que estamos creando un nuevo registro
      if ($id == "") {
          // Verificar si el DNI ya existe
          $existeDNI = $this->model->verificarDNI($dni); // Asegúrate de tener esta función en tu modelo
          if ($existeDNI) {
              // Si el DNI ya existe, retornar un mensaje de error
              $msg = "El DNI ya está registrado en el sistema.";
              echo json_encode($msg, JSON_UNESCAPED_UNICODE);
              die();  // Detener la ejecución
          }
      }
  
      // Archivos
      $img = $_FILES['imagen'];
      $cv = $_FILES['cv'];  // Archivo curriculum
      $antecedentes = $_FILES['antecedentes'];  // Archivo antecedentes
      $contrato = $_FILES['contrato'];  // Archivo contrato
  
      // Variables de imagen y archivos
      $name = $img['name'];
      $tmpname = $img['tmp_name'];
      $fecha = date("YmdHis");
  
      // Inicialización de nombres de archivos
      $cvName = $antecedentesName = $contratoName = "";
  
      // Validación de campos obligatorios
      if (empty($codigo) || empty($dni) || empty($nombre) || empty($apellido) || empty($telefono) || empty($profesion) || empty($direccion)) {
          $msg = "Todos los campos son obligatorios";
      } else {
          // Manejo de la imagen
          if (!empty($name)) {
              // Para un nuevo registro, si hay una foto previa, se elimina
              if ($id == "") {
                  // Solo intentamos eliminar la foto si es un registro de edición y la foto actual no es la predeterminada
                  if (isset($_POST['foto_actual']) && $_POST['foto_actual'] != "default.png") {
                      $fotoActualPath = "Assets/imgBD/" . $_POST['foto_actual'];
  
                      // Verificar si es un archivo y existe antes de intentar eliminarlo
                      if (is_file($fotoActualPath)) {
                          unlink($fotoActualPath); // Eliminar foto anterior
                      } else {
                          // Si no existe o es un directorio, eliminar el enlace en la base de datos
                          $_POST['foto_actual'] = ''; // Limpiar el nombre del archivo en la base de datos
                      }
                  }
              }
  
              // Generar un nombre único para la imagen y moverla
              $imgNombre = $fecha . ".png";
              $destino = "Assets/imgBD/" . $imgNombre;
              move_uploaded_file($tmpname, $destino); // Mover la nueva foto
          } else {
              // Si no hay una nueva imagen, se usa la foto actual si existe
              $imgNombre = !empty($_POST['foto_actual']) ? $_POST['foto_actual'] : "default.png";
          }
  
          // Verificar si los documentos ya existen (si no se sube nuevo, mantener los existentes)
          if (empty($cv['name'])) {
              $cvName = isset($_POST['cv_actual']) ? $_POST['cv_actual'] : "";
          } else {
              $cvName = uniqid() . '-' . $cv['name'];
          }
  
          if (empty($antecedentes['name'])) {
              $antecedentesName = isset($_POST['antecedentes_actual']) ? $_POST['antecedentes_actual'] : "";
          } else {
              $antecedentesName = uniqid() . '-' . $antecedentes['name'];
          }
  
          if (empty($contrato['name'])) {
              $contratoName = isset($_POST['contrato_actual']) ? $_POST['contrato_actual'] : "";
          } else {
              $contratoName = uniqid() . '-' . $contrato['name'];
          }
  
          // Si el ID está vacío, significa que es un nuevo registro
          if ($id == "") {
              // Registrar Promotor
              $data = $this->model->registrarPromotor(
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
                  $cvName,
                  $antecedentesName,
                  $contratoName
              );
  
              if ($data == "ok") {
                  $msg = "si";
                  // Mover los archivos, solo si se subió uno nuevo
                  if (!empty($cv['name'])) {
                      if (!empty($_POST['cv_actual'])) {
                          unlink("Assets/Documents/CV/" . $_POST['cv_actual']);
                      }
                      move_uploaded_file($cv['tmp_name'], "Assets/Documents/CV/" . $cvName); // Para el CV
                  }
                  if (!empty($antecedentes['name'])) {
                      if (!empty($_POST['antecedentes_actual'])) {
                          unlink("Assets/Documents/Antecedentes/" . $_POST['antecedentes_actual']);
                      }
                      move_uploaded_file($antecedentes['tmp_name'], "Assets/Documents/Antecedentes/" . $antecedentesName); // Para los antecedentes
                  }
                  if (!empty($contrato['name'])) {
                      if (!empty($_POST['contrato_actual'])) {
                          unlink("Assets/Documents/Contrato/" . $_POST['contrato_actual']);
                      }
                      move_uploaded_file($contrato['tmp_name'], "Assets/Documents/Contrato/" . $contratoName); // Para el contrato
                  }
                  // Limpiar campos de archivos en el formulario después de modificar
                  $_POST['foto_actual'] = '';
                  $_POST['cv_actual'] = '';
                  $_POST['antecedentes_actual'] = '';
                  $_POST['contrato_actual'] = '';
                  $_POST['imagen'] = '';
                  $_POST['cv-preview'] = '';
                  $_POST['antecedentes-preview'] = '';
                  $_POST['contrato-preview'] = '';
                  $_POST['cv'] = '';
                  $_POST['antecedentes'] = '';
                  $_POST['contrato'] = '';
  
              } else if ($data == "existe") {
                  $msg = "El Promotor ya existe";
              } else {
                  $msg = "Error al registrar el Promotor";
              }
          } else {
              // Actualizar los datos del promotor en la base de datos
              $data = $this->model->modificarPromotor(
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
                  $cvName,
                  $antecedentesName,
                  $contratoName,
                  $id
              );
  
              if ($data == "modificado") {
                  if (!empty($name)) {
                      if ($_POST['foto_actual'] != "default.png") {
                          unlink("Assets/imgBD/" . $_POST['foto_actual']);
                      }
                      move_uploaded_file($tmpname, $destino); // Para la foto
                  }
  
                  // Verificar y mover los documentos (CV, antecedentes, contrato)
                  if (!empty($cv['name'])) {
                      if (!empty($_POST['cv_actual'])) {
                          $cvActualPath = "Assets/Documents/CV/" . $_POST['cv_actual'];
                          if (is_file($cvActualPath)) {
                              unlink($cvActualPath); // Eliminar archivo anterior
                          } else {
                              // Si el archivo no existe, eliminar el nombre en la base de datos
                              $_POST['cv_actual'] = '';
                          }
                      }
                      move_uploaded_file($cv['tmp_name'], "Assets/Documents/CV/" . $cvName); // Para el CV
                  }
  
                  if (!empty($antecedentes['name'])) {
                      if (!empty($_POST['antecedentes_actual'])) {
                          $antecedentesActualPath = "Assets/Documents/Antecedentes/" . $_POST['antecedentes_actual'];
                          if (is_file($antecedentesActualPath)) {
                              unlink($antecedentesActualPath); // Eliminar archivo anterior
                          } else {
                              // Si el archivo no existe, eliminar el nombre en la base de datos
                              $_POST['antecedentes_actual'] = '';
                          }
                      }
                      move_uploaded_file($antecedentes['tmp_name'], "Assets/Documents/Antecedentes/" . $antecedentesName); // Para los antecedentes
                  }
  
                  if (!empty($contrato['name'])) {
                      if (!empty($_POST['contrato_actual'])) {
                          $contratoActualPath = "Assets/Documents/Contrato/" . $_POST['contrato_actual'];
                          if (is_file($contratoActualPath)) {
                              unlink($contratoActualPath); // Eliminar archivo anterior
                          } else {
                              // Si el archivo no existe, eliminar el nombre en la base de datos
                              $_POST['contrato_actual'] = '';
                          }
                      }
                      move_uploaded_file($contrato['tmp_name'], "Assets/Documents/Contrato/" . $contratoName); // Para el contrato
                  }
  
                  // Limpiar campos de archivos en el formulario después de modificar
                  $_POST['foto_actual'] = '';
                  $_POST['cv_actual'] = '';
                  $_POST['antecedentes_actual'] = '';
                  $_POST['contrato_actual'] = '';
                  $_POST['imagen'] = '';
                  $_POST['cv-preview'] = '';
                  $_POST['antecedentes-preview'] = '';
                  $_POST['contrato-preview'] = '';
                  $_POST['cv'] = '';
                  $_POST['antecedentes'] = '';
                  $_POST['contrato'] = '';
  
                  $msg = "modificado";
              } else {
                  $msg = "Error al modificar el Promotor";
              }
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
