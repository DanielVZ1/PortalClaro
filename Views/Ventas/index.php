<!-- views/promotores/index.php -->
<?php include "Views/Templates/header.php"; ?>

<ol class="breadcrumb mb-4 bg-primary">
    <li class="breadcrumb-item active text-white">
        <h4 style="color:red">Ventas de Promotores</h4>
    </li>
</ol>

<!-- Botón para abrir el formulario modal -->
<button class="btn btn-primary mb-2" type="button" onclick="frmVentas()"><i class="fas fa-plus"></i></button>

<!-- Tabla para listar los promotores -->
<table class="table table-light" id="tblVentas">
    <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>Teléfono</th>
            <th>Medio</th>
            <th>Subgerente</th>
            <th>Coordinador</th>
            <th>Supervisor</th>
            <th>Fecha</th>
            <th>Código Maestro</th>
            <th>Ubicacion</th>
            <th>Promotor</th>
            <th>Punto De Venta</th>
            <th>Departamento</th>
            <th>Zona</th>
            <th>Distribuidor</th>
            <th>Proveedor</th>
            <th>Producto</th>
            <th>Perfil Plan</th>
            <th>Tecnologia</th>
            <th>Centro De Venta</th>
            <th>Canal-Rediac</th>
            <th>Aliado</th>       
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
                                <label for="telefono" style="color: black;">Teléfono</label>
                                <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Ingrese el número de telefono" maxlength="11" minlength="11" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" oncopy="return false" onpaste="return false">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="medio" style="color: black;">Medio</label>
                                <input id="medio" class="form-control" type="text" name="medio" placeholder="Ingrese el medio" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="subgerente" style="color: black;">Subgerente</label>
                                <input id="subgerente" class="form-control" type="text" name="subgerente" placeholder="Ingrese nombre del subgerente" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="coordinador" style="color: black;">Coordinador</label>
                                <input id="coordinador" class="form-control" type="text" name="coordinador" placeholder="Ingrese nombre del coordinador"maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="supervisor" style="color: black;">Supervisor</label>
                                <input id="supervisor" class="form-control" type="text" name="supervisor" placeholder="Ingrese nombre del supervisor" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="fecha" style="color: black;">Fecha</label>
                                <input id="fecha" class="form-control" type="date" name="fecha" placeholder="Ingrese la fecha">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="codigo" style="color: black;">Código Maestro</label>
                                <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Ingrese el código maestro" maxlength="13" minlength="13" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" oncopy="return false" onpaste="return false">
                            </div>
                        </div>
                    
                        <div class="col-6">
                            <div class="form-group">
                                <label for="ubicacion" style="color: black;">Ubicación</label>
                                <input id="ubicacion" class="form-control" type="text" name="ubicacion" placeholder="Ingrese la Ubicación">
                            </div>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="promotor" style="color: black;">Promotor</label>
                                <input id="promotor" class="form-control" type="text" name="promotor" placeholder="Ingrese el nombre del promotor" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="punto_venta" style="color: black;">Punto de Venta</label>
                                <input id="punto_venta" class="form-control" type="text" name="punto_venta" placeholder="Ingrese el punto de venta">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="departamento" style="color: black;">Departamento</label>
                                <input id="departamento" class="form-control" type="text" name="departamento" placeholder="Ingrese el departamento"maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="zona" style="color: black;">Zona</label>
                                <input id="zona" class="form-control" type="text" name="zona" placeholder="Ingrese la zona"maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="distribuidor" style="color: black;">Distribuidor</label>
                                <input id="distribuidor" class="form-control" type="text" name="distribuidor" placeholder="Ingrese nombre del distribuidor">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="proveedor" style="color: black;">Proveedor</label>
                                <input id="proveedor" class="form-control" type="text" name="proveedor" placeholder="Ingrese nombre del proveedor">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="producto" style="color: black;">Producto</label>
                                <input id="producto" class="form-control" type="text" name="producto" placeholder="Ingrese el producto">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="perfil_plan" style="color: black;">Perfil del plan</label>
                                <input id="perfil_plan" class="form-control" type="text" name="perfil_plan" placeholder="Ingrese el perfil del plan">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tecnologia" style="color: black;">Tecnología</label>
                                <input id="tecnologia" class="form-control" type="text" name="tecnologia" placeholder="Ingrese la tecnología">
                            </div>
                        </div>
                    
                        <div class="col-6">
                            <div class="form-group">
                                <label for="centro_venta" style="color: black;">Centro de venta</label>
                                <input id="centro_venta" class="form-control" type="text" name="centro_venta" placeholder="Ingrese el centro de venta">
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="canal_rediac" style="color: black;">Canal_Rediac</label>
                                <input id="canal_rediac" class="form-control" type="text" name="canal_rediac" placeholder="Ingrese el canal_rediac">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="aliado" style="color: black;">Aliado</label>
                                <input id="aliado" class="form-control" type="text" name="aliado" placeholder="Ingrese nombre del aliado">
                            </div>
                        </div>
                    </div>

                    <button class = "btn btn-primary" type="button" onclick="registrarVentas(event)" id="btnAccion">Registrar</button>
                    <button class = "btn bg-danger" type="button" data-dismiss="modal" style="color:white">Cancelar</button>
                    
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