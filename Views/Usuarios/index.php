<?php
//print_r($_SESSION)
include "Views/Templates/header.php";
?>

<head>
    <div id="contentAjax"></div>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fas fa-user"></i> <?= $data['page_title'] ?></h1>
                <button class="button" onclick="frmUsuario();">
                    <span class="button_lg">
                        <span class="button_sl"></span>
                        <span class="button_text" style="cursor: pointer;">
                            <i class="fas fa-plus" style="margin-right: 5px;"></i> Nuevo Usuario
                        </span>
                    </span>
                </button>

            </div>
            <!--<ul  class="app-breadcrumb breadcrumb">
           <li  class="breadcrumb-item"><i  class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url; ?>Roles"><?= $data['page_title'] ?></a></li>
        </ul>-->
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
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

    .button1:hover .button1_sl {
        width: calc(100% + 15px);
    }

    .shadow__btn {
        padding: 5px 10px;
        border: none;
        font-size: 12px;
        color: #fff;
        border-radius: 7px;
        letter-spacing: 1px;
        font-weight: 700;
        text-transform: uppercase;
        transition: 0.5s;
        transition-property: box-shadow;
    }

    .shadow__btn {
        background: rgb(0, 140, 255);
        box-shadow: 0 0 25px rgb(0, 140, 255);
    }

    .shadow__btn:hover {
        box-shadow: 0 0 5px rgb(0, 140, 255),
            0 0 25px rgb(0, 140, 255),
            0 0 50px rgb(0, 140, 255),
            0 0 100px rgb(0, 140, 255);
    }

    /* From Uiverse.io by mrhyddenn */
    .shadow__btn--red {
        padding: 5px 10px;
        border: none;
        font-size: 12px;
        color: #fff;
        border-radius: 7px;
        letter-spacing: 1px;
        font-weight: 700;
        text-transform: uppercase;
        transition: 0.5s;
        transition-property: box-shadow;
    }

    .shadow__btn--red {
        background: rgb(255, 0, 0);
        /* Rojo */
        box-shadow: 0 0 25px rgb(255, 0, 0);
        /* Rojo */
    }

    .shadow__btn--red:hover {
        box-shadow: 0 0 5px rgb(255, 0, 0),
            /* Rojo */
            0 0 25px rgb(255, 0, 0),
            /* Rojo */
            0 0 50px rgb(255, 0, 0),
            /* Rojo */
            0 0 100px rgb(255, 0, 0);
        /* Rojo */
    }

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
</style>
<table class="table table-light" id="tblUsuarios">
    <thead class="thead-dark">
        <tr>
            <th><i class="fas fa-id-badge"></i> Id</th>
            <th><i class="fas fa-user-circle"></i> Usuario</th>
            <th><i class="fas fa-id-card"></i> Nombre</th>
            <th><i class="fas fa-envelope"></i> Email</th>
            <th><i class="fas fa-user-tag"></i> Rol</th>
            <th><i class="fas fa-check-circle"></i> Estado</th>
            <!-- <th><i class="fas fa-cogs"></i> Acciones</th> -->
            <th><i class="fas fa-cogs"></i> Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>


<div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="title"><i class="fas fa-user"></i> Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUsuario">
                    <input type="hidden" id="id" name="id">

                    <div class="form-group">
                        <label for="usuario" style="color: black;"><i class="fas fa-user-circle"></i> Usuario</label>
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" maxlength="20" oninput="formatInput(this)">
                    </div>

                    <div class="form-group">
                        <label for="nombre" style="color: black;"><i class="fas fa-id-badge"></i> Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" maxlength="50" oninput="formatInput(this)">
                    </div>

                    <div class="form-group">
                        <label for="email" style="color: black;"><i class="fas fa-envelope"></i> Email</label>
                        <input id="email" class="form-control" type="email" name="email" placeholder="Email" maxlength="50" onblur="validateEmail(this)">
                    </div>

                    <div class="row" id="claves">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="clave" style="color: black;"><i class="fas fa-lock"></i> Contraseña</label>
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña" minlength="6" maxlength="50" onblur="validatePassword(this)">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="confirmar" style="color: black;"><i class="fas fa-lock"></i> Confirmar Contraseña</label>
                                <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar Contraseña" minlength="6" maxlength="50" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rol" style="color: black;"><i class="fas fa-user-tag"></i> Rol</label>
                        <select id="rol" class="form-control" name="rol">
                            <?php foreach ($data['roles'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombrerol']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div style="margin-top: 20px;  display: flex; gap: 15px;">
                        <button class="shadow__btn" type="button" onclick="registrarUser(event)" id="btnAccion">Registrar</button>
                        <button class="shadow__btn--red" type="button" data-dismiss="modal" style="color:white">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function formatInput(input) {
        // Obtener el valor actual del campo
        let value = input.value;

        // Eliminar caracteres no permitidos (números y caracteres especiales)
        value = value.replace(/[^a-zA-Z\s]/g, '');

        // Convertir el texto a minúsculas
        value = value.toLowerCase();

        // Capitalizar la primera letra de cada palabra
        value = value.replace(/\b\w/g, function(match) {
            return match.toUpperCase();
        });

        // Reemplazar secuencias de espacios múltiples con un solo espacio
        value = value.replace(/\s{2,}/g, ' ');

        // Establecer el valor formateado de nuevo en el campo
        input.value = value;
    }

    function validateEmail(input) {
        // Eliminar caracteres no permitidos, excepto arroba
        let value = input.value.replace(/[^a-zA-Z0-9@.]/g, '');
        input.value = value;

        const emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}$/;
        const isValid = emailPattern.test(input.value);
        if (!isValid) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Ingrese un email válido.',
                showConfirmButton: false,
                timer: 3000
            });
        }
    }
</script>


<?php
//print_r($_SESSION)
include "Views/Templates/footer.php";
?>