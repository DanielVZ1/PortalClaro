<?php 
    include "Views/Templates/header.php";  // Incluye el encabezado
?>

<style>
/* From Uiverse.io by aaronross1 */
.delete-button {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: rgb(20, 20, 20);
        border: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
        cursor: pointer;
        transition-duration: 0.3s;
        overflow: hidden;
        position: relative;
    }

    .delete-svgIcon {
        width: 15px;
        transition-duration: 0.3s;
    }

    .delete-svgIcon path {
        fill: white;
        /* Asegúrate de que el ícono sea blanco */
    }

    .delete-button:hover {
        width: 100px;
        border-radius: 50px;
        transition-duration: 0.3s;
        background-color: rgb(255, 69, 69);
        align-items: center;
    }

    .delete-button:hover .delete-svgIcon {
        width: 20px;
        transition-duration: 0.3s;
        transform: translateY(60%);
        transform: rotate(360deg);
        /* Simplificado */
    }

    .delete-button::before {
        display: none;
        content: "Desactivar";
        color: white;
        transition-duration: 0.3s;
        font-size: 2px;
    }

    .delete-button:hover::before {
        display: block;
        padding-right: 10px;
        font-size: 13px;
        opacity: 1;
        transform: translateY(0px);
        transition-duration: 0.3s;
    }

    /* From Uiverse.io by aaronross1 */
    .edit-button {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: rgb(20, 20, 20);
        border: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
        cursor: pointer;
        transition-duration: 0.3s;
        overflow: hidden;
        position: relative;
        text-decoration: none !important;
    }

    .edit-svgIcon {
        width: 17px;
        transition-duration: 0.3s;
    }

    .edit-svgIcon path {
        fill: white;
    }

    .edit-button:hover {
        width: 120px;
        border-radius: 50px;
        transition-duration: 0.3s;
        background-color: rgb(0, 123, 255);
        /* Color azul */
        align-items: center;
    }

    .edit-button:hover .edit-svgIcon {
        width: 20px;
        transition-duration: 0.3s;
        transform: translateY(60%);
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
    }

    .edit-button::before {
        display: none;
        content: "Editar";
        color: white;
        transition-duration: 0.3s;
        font-size: 2px;
    }

    .edit-button:hover::before {
        display: block;
        padding-right: 10px;
        font-size: 13px;
        opacity: 1;
        transform: translateY(0px);
        transition-duration: 0.3s;
    }

    /* Estilo para el botón de activar usuario */
    .activate-button {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: rgb(20, 20, 20);
        /* Color de fondo predeterminado */
        border: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
        cursor: pointer;
        transition-duration: 0.3s;
        overflow: hidden;
        position: relative;
    }

    .activate-svgIcon {
        width: 15px;
        transition-duration: 0.3s;
    }

    .activate-svgIcon path {
        fill: white;
        /* Asegúrate de que el ícono sea blanco */
    }

    .activate-button:hover {
        width: 95px;
        border-radius: 50px;
        transition-duration: 0.3s;
        background-color: rgb(0, 200, 0);
        /* Color más claro al hacer hover */
        align-items: center;
    }

    .activate-button:hover .activate-svgIcon {
        width: 20px;
        transition-duration: 0.3s;
        transform: translateY(60%);
        transform: rotate(360deg);
        /* Simplificado */
    }

    .activate-button::before {
        display: none;
        content: "Activar";
        color: white;
        transition-duration: 0.3s;
        font-size: 2px;
    }

    .activate-button:hover::before {
        display: block;
        padding-right: 10px;
        font-size: 13px;
        opacity: 1;
        transform: translateY(0px);
        transition-duration: 0.3s;
    }


        /* Estilo para el botón de activar usuario */
        .permiso-button {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: rgb(20, 20, 20);
        /* Color de fondo predeterminado */
        border: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
        cursor: pointer;
        transition-duration: 0.3s;
        overflow: hidden;
        position: relative;
    }

    .permiso-svgIcon {
        width: 15px;
        transition-duration: 0.3s;
    }

    .permiso-svgIcon path {
        fill: white;
        /* Asegúrate de que el ícono sea blanco */
    }

    .permiso-button:hover {
        width: 95px;
        border-radius: 50px;
        transition-duration: 0.3s;
        background-color: rgb(169, 169, 169);
        /* Color más claro al hacer hover */
        align-items: center;
    }

    .permiso-button:hover .permiso-svgIcon {
        width: 20px;
        transition-duration: 0.3s;
        transform: translateY(60%);
        transform: rotate(360deg);
        /* Simplificado */
    }

    .permiso-button::before {
        display: none;
        content: "Permisos";
        color: white;
        transition-duration: 0.3s;
        font-size: 2px;
    }

    .permiso-button:hover::before {
        display: block;
        padding-right: 10px;
        font-size: 13px;
        opacity: 1;
        transform: translateY(0px);
        transition-duration: 0.3s;
    }

    /* From Uiverse.io by mrhyddenn */
    .button {
        -moz-appearance: none;
        -webkit-appearance: none;
        appearance: none;
        border: none;
        background: none;
        color: #0f1923;
        cursor: pointer;
        position: relative;
        padding: 8px;
        margin-bottom: 20px;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 14px;
        transition: all .15s ease;
    }

    .button::before,
    .button::after {
        content: '';
        display: block;
        position: absolute;
        right: 0;
        left: 0;
        height: calc(50% - 5px);
        border: 1px solid #7D8082;
        transition: all .15s ease;
    }

    .button::before {
        top: 0;
        border-bottom-width: 0;
    }

    .button::after {
        bottom: 0;
        border-top-width: 0;
    }

    .button:active,
    .button:focus {
        outline: none;
    }

    .button:active::before,
    .button:active::after {
        right: 3px;
        left: 3px;
    }

    .button:active::before {
        top: 3px;
    }

    .button:active::after {
        bottom: 3px;
    }

    .button_lg {
        position: relative;
        display: block;
        padding: 10px 20px;
        color: #fff;
        background-color: #0f1923;
        overflow: hidden;
        box-shadow: inset 0px 0px 0px 1px transparent;
    }

    .button_lg::before {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 2px;
        height: 2px;
        background-color: #0f1923;
    }

    .button_lg::after {
        content: '';
        display: block;
        position: absolute;
        right: 0;
        bottom: 0;
        width: 4px;
        height: 4px;
        background-color: #0f1923;
        transition: all .2s ease;
    }

    .button_sl {
        display: block;
        position: absolute;
        top: 0;
        bottom: -1px;
        left: -8px;
        width: 0;
        background-color: #ff4655;
        transform: skew(-15deg);
        transition: all .2s ease;
    }

    .button_text {
        position: relative;
    }

    .button:hover {
        color: #0f1923;
    }

    .button:hover .button_sl {
        width: calc(100% + 15px);
    }

    .button:hover .button_lg::after {
  background-color: #fff;
}

</style>

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

<button class="button" onclick="frmRol();">
                    <span class="button_lg">
                        <span class="button_sl"></span>
                        <span class="button_text" style="cursor: pointer;">
                            <i class="fas fa-plus" style="margin-right: 5px;"></i> Nuevo Rol
                        </span>
                    </span>
                </button>

<!-- Tabla de Roles -->
<table class="table-light" id="tblRoles">
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
                <button class="close" data-dismiss="modal" aria-label="Close">
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

