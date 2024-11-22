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

<table class="table-light" id="tblUsuarios">
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
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña" minlength="6" maxlength="50">
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
                        </select>
                    </div>
                    <div style="margin-top: 20px; display: flex; gap: 15px;">
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
include "Views/Usuarios/estilousuarios.php";
?>

<?php
//print_r($_SESSION)
include "Views/Templates/footer.php";
?>