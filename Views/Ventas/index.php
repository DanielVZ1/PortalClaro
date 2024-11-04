<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo Excel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <style>
        .button1, .button2 {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
        }
        .button1:hover, .button2:hover {
            background-color: #0056b3;
        }
        .file-input {
            display: inline-block;
        }
    </style>
</head>
<body>
<?php include "Views/Templates/header.php"; ?>

<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-dollar-sign"></i> <?= $data['page_title'] ?></h1>
            <div style="display: flex; align-items: center;">
                <!-- Botón Nueva Venta -->
                <button class="button" onclick="frmVentas()">
                    <span class="button_lg">
                        <span class="button_sl"></span>
                        <span class="button_text" style="cursor: pointer;">
                            <i class="fas fa-plus" style="margin-right: 5px;"></i> Nueva Venta
                        </span>
                    </span>
                </button>

                <!-- Formulario para subir archivo Excel -->
                <form id="uploadForm" enctype="multipart/form-data" style="display: flex; align-items: center;">
                    <!-- Botón Subir Archivo -->
                    <div class="file-input" style="margin-right: 10px;">
                        <label class="button1">
                            <span class="button1_lg">
                                <span class="button1_sl"></span>
                                <span class="button1_text">
                                    <i class="fas fa-upload" style="margin-right: 5px;"></i> Elegir Archivo
                                </span>
                            </span>
                            <input id="file-upload" type="file" name="dataExcel" style="display: none;" accept=".xlsx, .xls" onchange="showFileAlert()">
                        </label>
                    </div>

                    <!-- Botón Subir Excel -->
                    <button type="button" class="button2" onclick="uploadFile()">
                        <span class="button2_lg">
                            <span class="button2_sl"></span>
                            <span class="button2_text">Subir Excel</span>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
  function showFileAlert() {
    swal({
        title: "Archivo Seleccionado",
        text: "¡Has seleccionado un archivo para subir!",
        icon: "info",
        timer: 2000,
        buttons: false
    });
}

function uploadFile() {
    const formData = new FormData(document.getElementById("uploadForm"));
    showUploadAlert();

    fetch('Controllers/UploadController.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Inserta la respuesta en el contenido Ajax (opcional)
        document.getElementById("contentAjax").innerHTML = data;

        // Recargar la página después de que se haya subido el archivo
        location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
        swal("Error", "Hubo un problema al subir el archivo.", "error");
    });
}

function showUploadAlert() {
    swal({
        title: "Subiendo Archivo",
        text: "¡Tu archivo se está subiendo!",
        icon: "info",
        buttons: false
    });
}
    </script>

    <!-- Tabla para listar los promotores -->
    <table class="table table-light" id="tblVentas">
        <thead class="thead-dark">
            <tr>
                <th><i class="fas fa-id-badge"></i> id</th>
                <th><i class="fas fa-phone"></i> Teléfono</th>
                <th><i class="fas fa-comment-dots"></i> Medio</th>
                <th><i class="fas fa-user-tie"></i> Subgerente</th>
                <th><i class="fas fa-user-friends"></i> Coordinador</th>
                <th><i class="fas fa-user-check"></i> Supervisor</th>
                <th><i class="fas fa-calendar-alt"></i> Fecha</th>
                <th><i class="fas fa-barcode"></i> Código Maestro</th>
                <th><i class="fas fa-map-marker-alt"></i> Ubicación</th>
                <th><i class="fas fa-user"></i> Promotor</th>
                <th><i class="fas fa-store"></i> Punto De Venta</th>
                <th><i class="fas fa-building"></i> Departamento</th>
                <th><i class="fas fa-map"></i> Zona</th>
                <th><i class="fas fa-truck"></i> Distribuidor</th>
                <th><i class="fas fa-truck-moving"></i> Proveedor</th>
                <th><i class="fas fa-box"></i> Producto</th>
                <th><i class="fas fa-list-alt"></i> Perfil Plan</th>
                <th><i class="fas fa-cogs"></i> Tecnología</th>
                <th><i class="fas fa-store-alt"></i> Centro De Venta</th>
                <th><i class="fas fa-exchange-alt"></i> Canal-Rediac</th>
                <th><i class="fas fa-handshake"></i> Aliado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <!-- Aquí se llenará con los datos de promotores -->
        </tbody>
    </table>

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

        .button1 {
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

        .button1::before,
        .button1::after {
            content: '';
            display: block;
            position: absolute;
            right: 0;
            left: 0;
            height: calc(50% - 5px);
            border: 1px solid #7D8082;
            transition: all .15s ease;
        }

        .button1::before {
            top: 0;
            border-bottom-width: 0;
        }

        .button1::after {
            bottom: 0;
            border-top-width: 0;
        }

        .button1:active,
        .button1:focus {
            outline: none;
        }

        .button1:active::before,
        .button1:active::after {
            right: 3px;
            left: 3px;
        }

        .button1:active::before {
            top: 3px;
        }

        .button1:active::after {
            bottom: 3px;
        }

        .button1_lg {
            position: relative;
            display: block;
            padding: 10px 20px;
            color: #fff;
            background-color: #0f1923;
            overflow: hidden;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .button1_lg::before {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 2px;
            height: 2px;
            background-color: #0f1923;
        }

        .button1_lg::after {
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

        .button1_sl {
            display: block;
            position: absolute;
            top: 0;
            bottom: -1px;
            left: -8px;
            width: 0;
            background-color: #007BFF;
            transform: skew(-15deg);
            transition: all .2s ease;
        }

        .button1_text {
            position: relative;
        }

        .button1:hover {
            color: #0f1923;
        }

        .button1:hover .button1_sl {
            width: calc(100% + 15px);
        }

        .button1:hover .button1_lg::after {
            background-color: #fff;
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
  background: rgb(0,140,255);
  box-shadow: 0 0 25px rgb(0,140,255);
}

.shadow__btn:hover {
  box-shadow: 0 0 5px rgb(0,140,255),
              0 0 25px rgb(0,140,255),
              0 0 50px rgb(0,140,255),
              0 0 100px rgb(0,140,255);
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
  background: rgb(255,0,0); /* Rojo */
  box-shadow: 0 0 25px rgb(255,0,0); /* Rojo */
}

.shadow__btn--red:hover {
  box-shadow: 0 0 5px rgb(255,0,0), /* Rojo */
              0 0 25px rgb(255,0,0), /* Rojo */
              0 0 50px rgb(255,0,0), /* Rojo */
              0 0 100px rgb(255,0,0); /* Rojo */
}
.button2 {
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

        .button2::before,
        .button2::after {
            content: '';
            display: block;
            position: absolute;
            right: 0;
            left: 0;
            height: calc(50% - 5px);
            border: 1px solid #7D8082;
            transition: all .15s ease;
        }

        .button2::before {
            top: 0;
            border-bottom-width: 0;
        }

        .button2::after {
            bottom: 0;
            border-top-width: 0;
        }

        .button2:active,
        .button2:focus {
            outline: none;
        }

        .button2:active::before,
        .button2:active::after {
            right: 3px;
            left: 3px;
        }

        .button2:active::before {
            top: 3px;
        }

        .button2:active::after {
            bottom: 3px;
        }

        .button2_lg {
            position: relative;
            display: block;
            padding: 10px 20px;
            color: #fff;
            background-color: #0f1923;
            overflow: hidden;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .button2_lg::before {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 2px;
            height: 2px;
            background-color: #0f1923;
        }

        .button2_lg::after {
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

        .button2_sl {
            display: block;
            position: absolute;
            top: 0;
            bottom: -1px;
            left: -8px;
            width: 0;
            background-color: #4CAF50;
            transform: skew(-15deg);
            transition: all .2s ease;
        }

        .button2_text {
            position: relative;
        }

        .button2:hover {
            color: #0f1923;
        }

        .button2:hover .button2_sl {
            width: calc(100% + 15px);
        }

        .button2:hover .button2_lg::after {
            background-color: #fff;
        }

    </style>


    <!-- Modal para registrar o modificar un promotor -->
    <div id="nueva_venta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="title">Nueva Venta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmVentas" method="post">
                        <input type="hidden" id="id" name="id">

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="telefono" style="color: black;"><i class="fas fa-phone-alt"></i> Teléfono</label>
                                    <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Ingrese el número de telefono" maxlength="11" minlength="11" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" oncopy="return false" onpaste="return false">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="medio" style="color: black;"><i class="fas fa-paper-plane"></i> Medio</label>
                                    <input id="medio" class="form-control" type="text" name="medio" placeholder="Ingrese el medio" maxlength="50" oninput="formatInput(this)">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="subgerente" style="color: black;"><i class="fas fa-user-tie"></i> Subgerente</label>
                                    <input id="subgerente" class="form-control" type="text" name="subgerente" placeholder="Ingrese nombre del subgerente" maxlength="50" oninput="formatInput(this)">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="coordinador" style="color: black;"><i class="fas fa-user-check"></i> Coordinador</label>
                                    <input id="coordinador" class="form-control" type="text" name="coordinador" placeholder="Ingrese nombre del coordinador" maxlength="50" oninput="formatInput(this)">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="supervisor" style="color: black;"><i class="fas fa-user-shield"></i> Supervisor</label>
                                    <input id="supervisor" class="form-control" type="text" name="supervisor" placeholder="Ingrese nombre del supervisor" maxlength="50" oninput="formatInput(this)">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fecha" style="color: black;"><i class="fas fa-calendar-alt"></i> Fecha</label>
                                    <input id="fecha" class="form-control" type="date" name="fecha" placeholder="Ingrese la fecha">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="codigo" style="color: black;"><i class="fas fa-barcode"></i> Código Maestro</label>
                                    <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Ingrese el código maestro" maxlength="13" minlength="13" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" oncopy="return false" onpaste="return false">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ubicacion" style="color: black;"><i class="fas fa-map-marker-alt"></i> Ubicación</label>
                                    <input id="ubicacion" class="form-control" type="text" name="ubicacion" placeholder="Ingrese la Ubicación" maxlength="50" oninput="validateInput(this)">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="promotor" style="color: black;"><i class="fas fa-user"></i> Promotor</label>
                                    <input id="promotor" class="form-control" type="text" name="promotor" placeholder="Ingrese el nombre del promotor" maxlength="50" oninput="formatInput(this)">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="punto_venta" style="color: black;"><i class="fas fa-store"></i> Punto de Venta</label>
                                    <input id="punto_venta" class="form-control" type="text" name="punto_venta" placeholder="Ingrese el punto de venta" maxlength="50" oninput="validateInput(this)">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="departamento" style="color: black;"><i class="fas fa-building"></i> Departamento</label>
                                    <input id="departamento" class="form-control" type="text" name="departamento" placeholder="Ingrese el departamento" maxlength="50" oninput="formatInput(this)">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="zona" style="color: black;"><i class="fas fa-map"></i> Zona</label>
                                    <input id="zona" class="form-control" type="text" name="zona" placeholder="Ingrese la zona" maxlength="50" oninput="formatInput(this)">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="distribuidor" style="color: black;"><i class="fas fa-truck"></i> Distribuidor</label>
                                    <input id="distribuidor" class="form-control" type="text" name="distribuidor" placeholder="Ingrese nombre del distribuidor" maxlength="50" oninput="validateInput(this)">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="proveedor" style="color: black;"><i class="fas fa-box"></i> Proveedor</label>
                                    <input id="proveedor" class="form-control" type="text" name="proveedor" placeholder="Ingrese nombre del proveedor" maxlength="50" oninput="validateInput(this)">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="producto" style="color: black;"><i class="fas fa-cubes"></i> Producto</label>
                                    <input id="producto" class="form-control" type="text" name="producto" placeholder="Ingrese el producto" maxlength="50" oninput="validateInput(this)">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="perfil_plan" style="color: black;"><i class="fas fa-chart-line"></i> Perfil del plan</label>
                                    <input id="perfil_plan" class="form-control" type="text" name="perfil_plan" placeholder="Ingrese el perfil del plan" maxlength="50" oninput="validateInput(this)">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tecnologia" style="color: black;"><i class="fas fa-microchip"></i> Tecnología</label>
                                    <input id="tecnologia" class="form-control" type="text" name="tecnologia" placeholder="Ingrese la tecnología" maxlength="50" oninput="validateInput(this)">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="centro_venta" style="color: black;"><i class="fas fa-store-alt"></i> Centro de venta</label>
                                    <input id="centro_venta" class="form-control" type="text" name="centro_venta" placeholder="Ingrese el centro de venta" maxlength="50" oninput="validateInput(this)">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="canal_rediac" style="color: black;"><i class="fas fa-link"></i> Canal_Rediac</label>
                                    <input id="canal_rediac" class="form-control" type="text" name="canal_rediac" placeholder="Ingrese el canal_rediac" maxlength="50" oninput="validateInput(this)">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="aliado" style="color: black;"><i class="fas fa-handshake"></i> Aliado</label>
                                    <input id="aliado" class="form-control" type="text" name="aliado" placeholder="Ingrese nombre del aliado" maxlength="50" oninput="validateInput(this)">
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 20px;  gap: 15px;">
                        <button class="shadow__btn" type="button" onclick="registrarVentas(event)" id="btnAccion">Registrar</button>
                        <button class="shadow__btn--red" type="button" data-dismiss="modal" style="color:white">Cancelar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function formatInput(input) {
            let value = input.value;
            value = value.replace(/[^a-zA-Z\s]/g, '').toLowerCase();
            value = value.replace(/\b\w/g, function(match) {
                return match.toUpperCase();
            });
            value = value.replace(/\s{2,}/g, ' ');
            input.value = value;
        }

        function validateInput(input) {
            let value = input.value;
            value = value.replace(/[^a-zA-Z0-9\s]/g, '');
            if (value.length > 50) {
                value = value.slice(0, 50);
            }
            input.value = value;
        }

        function isNumber(event) {
            const charCode = (event.which) ? event.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                event.preventDefault();
            }
        }

        function registrarVentas(event) {
            // Implementar la lógica de registro de ventas aquí
            event.preventDefault(); // Evitar el comportamiento por defecto del botón
            // Aquí puedes agregar la lógica para enviar el formulario
            alert("Ventas registradas");
        }
    </script>


    <?php include "Views/Templates/footer.php"; ?>