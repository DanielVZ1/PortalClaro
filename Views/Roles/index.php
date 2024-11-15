<?php 
    include "Views/Templates/header.php";  // Incluye el encabezado
?>

<!-- Breadcrumb para navegación -->
<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-tag"></i> <?= $data['page_title'] ?>

        </div>
        <!--<ul  class="app-breadcrumb breadcrumb">
           <li  class="breadcrumb-item"><i  class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url; ?>Roles"><?= $data['page_title'] ?></a></li>
        </ul>-->
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<!-- Botón para abrir el modal y agregar un nuevo rol -->
<button class="btn btn-primary mb-2" type="button" onclick="frmRol();"> 
    <i class="fas fa-plus"></i> Nuevo Rol
</button>

<!-- Tabla de Roles -->
<table class="table table-light" id="tblRoles">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Aquí se cargarán los roles dinámicamente con AJAX -->
    </tbody>
</table>

<!-- Modal para Registrar/Editar Rol -->
<div id="nuevo_Rol" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="title">Nuevo Rol</h5>
                <button class="close bg-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmRol">
                    <div class="form-floating mb-3">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del rol">
                        </div>
                    </div>
                    <button class="btn btn-primary mb-2" type="button" onclick="registrarRol(event);" id="btnAccion">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
    include "Views/Templates/footer.php";  // Incluye el pie de página
?>