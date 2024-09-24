<!-- views/promotores/index.php -->
<?php include "Views/Templates/header.php"; ?>

<ol class="breadcrumb mb-4 bg-primary">
    <li class="breadcrumb-item active text-white">
        <h4 style="color:red">Registro de Promotores</h4>
    </li>
</ol>

<!-- Botón para abrir el formulario modal -->
<button class="btn btn-primary mb-2" type="button" onclick="frmPromotor()"><i class="fas fa-plus"></i></button>

<!-- Tabla para listar los promotores -->
<table class="table table-light" id="tblPromotores">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Código Maestro</th>
            <th>DNI</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Profesión</th>
            <th>Estado Civil</th>
            <th>Género</th>
            <th>Dirección</th>
            <th>Zona</th>
            <th>Departamento</th>
            <th>Municipio</th>
            <th>Gerencia</th>
            <th>Canal</th>
            <th>Proyecto</th>
            <th>Cargo</th>
            <th>Curriculum Vitae</th>
            <th>Antecedentes</th>
            <th>Contrato</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <!-- Aquí se llenará con los datos de promotores -->
    </tbody>
</table>

<!-- Modal para registrar o modificar un promotor -->
<div id="nuevo_promotor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="title">Nuevo Promotor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmPromotor">
                    <input type="hidden" id="id" name="id">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label style="color: black;">Foto</label>
                            <div class="card border-primary">
                                <div class="card-body">
                                    <label for="imagen" id="icon-image"class="btn btn-primary"><i class="fas fa-image"></i></label>
                                    <span id = "icon-cerrar" ></span>
                                    <input id="imagen" class="d-none" type="file" name="imagen" onchange="preview(event)">
                                    <input type="hidden" id = "foto_actual" name = "foto_actual">
                                    <img class="img-thumbnail" id="img-preview">
                                </div>
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
                                <label for="dni" style="color: black;">DNI</label>
                                <input id="dni" class="form-control" type="text" name="dni" placeholder="Ingrese el número de DNI" maxlength="15"
                                        oninput="formatDNI(this)" onkeypress="return isNumber(event)" oncopy="return false" onpaste="return false">
                             </div>
                            <span id="errorDNI" class='text-danger'></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nombre" style="color: black;">Nombres</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Ingrese el nombre completo" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="apellido" style="color: black;">Apellidos</label>
                                <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Ingrese el apellido completo" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="telefono" style="color: black;">Teléfono</label>
                                <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Ingrese el número de teléfono" maxlength="8" minlength="8" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" oncopy="return false" onpaste="return false">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="profesion" style="color: black;">Profesión</label>
                                <input id="profesion" class="form-control" type="text" name="profesion" placeholder="Ingrese la profesión" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="estado_civil" style="color: black;">Estado Civil</label>
                                <select id="estado_civil" class="form-control" name="estado_civil">
                                    <?php foreach ($data['estados_civiles'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['estado_civil']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                   
                        <div class="col-6">
                            <div class="form-group">
                                <label for="genero" style="color: black;">Género</label>
                                <select id="genero" class="form-control" name="genero">
                                    <?php foreach ($data['generos'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['genero']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
              

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="direccion" style="color: black;">Dirección</label>
                                <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Ingrese la dirección domiciliar">
                            </div>
                        </div>
                    
                        <div class="col-6">
                            <div class="form-group">
                                <label for="zona" style="color: black;">Zonas</label>
                                <select id="zona" class="form-control" name="zona">
                                    <?php foreach ($data['zonas'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['zona']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="departamento" style="color: black;">Departamentos</label>
                                <select id="departamento" class="form-control" name="departamento">
                                    <?php foreach ($data['departamentos'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['departamento']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="municipio" style="color: black;">Municipios</label>
                                <select id="municipio" class="form-control" name="municipio">
                                    <?php foreach ($data['municipios'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['municipio']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>   
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="gerencia" style="color: black;">Gerencia</label>
                                <select id="gerencia" class="form-control" name="gerencia">
                                    <?php foreach ($data['gerencias'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['gerencia']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-6">
                            <div class="form-group">
                                <label for="canal" style="color: black;">Canal</label>
                                <select id="canal" class="form-control" name="canal">
                                    <?php foreach ($data['canales'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['canal']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="proyecto" style="color: black;">Proyecto</label>
                                <select id="proyecto" class="form-control" name="proyecto">
                                    <?php foreach ($data['proyectos'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['proyecto']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-6">
                            <div class="form-group">
                                <label for="cargo" style="color: black;">Cargo</label>
                                <select id="cargo" class="form-control" name="cargo">
                                    <?php foreach ($data['cargos'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['cargo']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <form action="tu_accion.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="color: black;">Curriculum Vitae</label>
                                    <div class="card border-primary">
                                        <div class="card-body">
                                            <input style="color: black;" id="fileupload" type="file" name="fileupload" accept=".pdf,.doc,.docx">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="color: black;">Antecedentes Penales y Oficiales</label>
                                    <div class="card border-primary">
                                        <div class="card-body">
                                            <label for = "fileupload"></label>
                                            <input  style="color: black;" id="fileupload; color:red;" type="file" name="fileupload" > 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color: black;">Contrato</label>
                                <div class="card border-primary">
                                    <div class="card-body">
                                        <label for = "fileupload"></label>
                                        <input  style="color: black;" id="fileupload; color:red;" type="file" name="fileupload" > 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <button class = "btn btn-primary" type="button" onclick="registrarPromotor(event)" id="btnAccion">Registrar</button>
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