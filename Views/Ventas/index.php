<!-- views/promotores/index.php -->
<?php include "Views/Templates/header.php"; ?>

<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-dollar-sign"></i> <?= $data['page_title'] ?> <button class="btn btn-primary mb-2" type="button" onclick="frmVentas()"><i class="fas fa-plus"></i></button>
            
         </div>
        <!--<ul  class="app-breadcrumb breadcrumb">
           <li  class="breadcrumb-item"><i  class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url;?>Roles"><?= $data['page_title'] ?></a></li>
        </ul>-->
    </div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
                                <input id="medio" class="form-control" type="text" name="medio" placeholder="Ingrese el medio" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="subgerente" style="color: black;"><i class="fas fa-user-tie"></i> Subgerente</label>
                                <input id="subgerente" class="form-control" type="text" name="subgerente" placeholder="Ingrese nombre del subgerente" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="coordinador" style="color: black;"><i class="fas fa-user-check"></i> Coordinador</label>
                                <input id="coordinador" class="form-control" type="text" name="coordinador" placeholder="Ingrese nombre del coordinador" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="supervisor" style="color: black;"><i class="fas fa-user-shield"></i> Supervisor</label>
                                <input id="supervisor" class="form-control" type="text" name="supervisor" placeholder="Ingrese nombre del supervisor" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
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
                                <input id="ubicacion" class="form-control" type="text" name="ubicacion" placeholder="Ingrese la Ubicación">
                            </div>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="promotor" style="color: black;"><i class="fas fa-user"></i> Promotor</label>
                                <input id="promotor" class="form-control" type="text" name="promotor" placeholder="Ingrese el nombre del promotor" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="punto_venta" style="color: black;"><i class="fas fa-store"></i> Punto de Venta</label>
                                <input id="punto_venta" class="form-control" type="text" name="punto_venta" placeholder="Ingrese el punto de venta">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="departamento" style="color: black;"><i class="fas fa-building"></i> Departamento</label>
                                <input id="departamento" class="form-control" type="text" name="departamento" placeholder="Ingrese el departamento" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="zona" style="color: black;"><i class="fas fa-map"></i> Zona</label>
                                <input id="zona" class="form-control" type="text" name="zona" placeholder="Ingrese la zona" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="distribuidor" style="color: black;"><i class="fas fa-truck"></i> Distribuidor</label>
                                <input id="distribuidor" class="form-control" type="text" name="distribuidor" placeholder="Ingrese nombre del distribuidor">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="proveedor" style="color: black;"><i class="fas fa-box"></i> Proveedor</label>
                                <input id="proveedor" class="form-control" type="text" name="proveedor" placeholder="Ingrese nombre del proveedor">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="producto" style="color: black;"><i class="fas fa-cubes"></i> Producto</label>
                                <input id="producto" class="form-control" type="text" name="producto" placeholder="Ingrese el producto">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="perfil_plan" style="color: black;"><i class="fas fa-chart-line"></i> Perfil del plan</label>
                                <input id="perfil_plan" class="form-control" type="text" name="perfil_plan" placeholder="Ingrese el perfil del plan">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tecnologia" style="color: black;"><i class="fas fa-microchip"></i> Tecnología</label>
                                <input id="tecnologia" class="form-control" type="text" name="tecnologia" placeholder="Ingrese la tecnología">
                            </div>
                        </div>
                    
                        <div class="col-6">
                            <div class="form-group">
                                <label for="centro_venta" style="color: black;"><i class="fas fa-store-alt"></i> Centro de venta</label>
                                <input id="centro_venta" class="form-control" type="text" name="centro_venta" placeholder="Ingrese el centro de venta">
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="canal_rediac" style="color: black;"><i class="fas fa-link"></i> Canal_Rediac</label>
                                <input id="canal_rediac" class="form-control" type="text" name="canal_rediac" placeholder="Ingrese el canal_rediac">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="aliado" style="color: black;"><i class="fas fa-handshake"></i> Aliado</label>
                                <input id="aliado" class="form-control" type="text" name="aliado" placeholder="Ingrese nombre del aliado">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="button" onclick="registrarVentas(event)" id="btnAccion">Registrar</button>
                    <button class="btn bg-danger" type="button" data-dismiss="modal" style="color:white">Cancelar</button>
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

    function formatDNI(input) {
        // Obtener el valor actual del campo
        let value = input.value;

        // Eliminar caracteres no numéricos
        value = value.replace(/\D/g, '');

        // Formatear el número en el formato XXXX-XXXX-XXXXX
        if (value.length > 13) {
            value = value.slice(0, 13);
        }
        if (value.length > 8) {
            value = value.replace(/(\d{4})(\d{4})(\d{0,5})/, '$1-$2-$3');
        } else if (value.length > 4) {
            value = value.replace(/(\d{4})(\d{0,4})/, '$1-$2');
        }

        // Actualizar el valor del campo
        input.value = value;
    }

    function isNumber(event) {
        // Permitir solo números (0-9) y la tecla de retroceso (backspace)
        const charCode = (event.which) ? event.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            event.preventDefault();
        }
    }
    </script>

<?php include "Views/Templates/footer.php"; ?>