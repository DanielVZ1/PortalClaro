<?php include "Views/Templates/header.php"; ?>

<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-users"></i> <?= $data['page_title'] ?></h1>
            <button class="button" onclick="frmPromotor()">
                <span class="button_lg">
                    <span class="button_sl"></span>
                    <span class="button_text" style="cursor: pointer;">
                        <i class="fas fa-plus" style="margin-right: 5px;"></i> Registro de Promotor
                    </span>
                </span>
            </button>

            <!-- Botón de Exportar a Excel -->
            <button id="exportExcelBtn" class="button">
                <span class="button_lg">
                    <span class="button_sl"></span>
                    <span class="button_text" style="cursor: pointer;">
                        <i class="fas fa-file-excel" style="margin-right: 5px;"></i> Exportar a Excel
                    </span>
                </span>
            </button>
        </div>
    </div>

    <!-- Mensaje de carga mientras se genera el archivo Excel -->
    <div id="loadingMessage" style="display:none; text-align:center; padding: 20px; background-color: black; border-radius: 5px;">
        <p>Generando el archivo Excel, por favor espere...</p>
        <!-- Spinner de carga -->
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

    <script>
        $('#exportExcelBtn').on('click', function() {
            var table = $('#tblPromotores').DataTable();
            var data = table.rows({
                filter: 'applied'
            }).data(); // Obtiene solo las filas filtradas

            var ws_data = [];

            // Agregar los encabezados de la tabla (sin la columna de "Acciones")
            var headers = table.columns().header().toArray().map(function(header, index) {
                // Excluir la columna de "Acciones" (que es la última columna)
                if (index !== table.columns().count() - 1) {
                    return $(header).text(); // Toma el texto del encabezado de cada columna
                }
            }).filter(function(header) {
                return header !== undefined;
            }); // Eliminar los elementos undefined
            ws_data.push(headers); // Agregar los encabezados al array de datos

            // Agregar los datos de las filas filtradas, sin las acciones HTML
            data.each(function(row) {
                // Imprimir en consola para depuración
                console.log('cv:', row.cv); // Ver lo que contiene 'cv'
                console.log('antecedentes:', row.antecedentes); // Ver lo que contiene 'antecedentes'
                console.log('contrato:', row.contrato); // Ver lo que contiene 'contrato'

                var rowData = [
                    row.id || '',
                    row.foto || '', // Si la propiedad no existe, deja vacío
                    row.codigo || '',
                    row.dni || '',
                    row.nombre || '',
                    row.apellido || '',
                    row.telefono || '',
                    row.profesion || '',
                    row.estado_civil || '',
                    row.genero || '',
                    row.direccion || '',
                    row.zona || '',
                    row.departamento || '',
                    row.municipio || '',
                    row.gerencia || '',
                    row.canal || '',
                    row.proyecto || '',
                    row.cargo || '',

                    // Verificamos si cv contiene un enlace o solo el texto
                    row.cv ? extractUrlFromText(row.cv) : '',

                    row.antecedentes ? extractUrlFromText(row.antecedentes) : '',

                    row.contrato ? extractUrlFromText(row.contrato) : '',

                    $(row.estado).text() || ''
                ];
                ws_data.push(rowData); // Agregar cada fila de datos al array
            });

            // Crear el libro de trabajo de Excel
            var ws = XLSX.utils.aoa_to_sheet(ws_data);
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Promotores");

            // Generar el archivo Excel y descargarlo
            XLSX.writeFile(wb, "Reporte_Promotores.xlsx");
        });

        // Función para extraer URL de un texto si es un enlace
        function extractUrlFromText(text) {
            var match = text.match(/href="([^"]+)"/);
            if (match) {
                return match[1]; // Extrae la URL del href
            }
            return ''; // Si no hay enlace, devuelve una cadena vacía
        }
    </script>



</main>
<!-- Tabla para listar los promotores -->
<table class="table-light" id="tblPromotores">
    <thead class="thead-dark">
        <tr>
            <th><i class="fas fa-id-badge"></i> ID</th>
            <th><i class="fas fa-image"></i> Foto</th>
            <th><i class="fas fa-code-branch"></i> Código Maestro</th>
            <th><i class="fas fa-id-card"></i> DNI</th>
            <th><i class="fas fa-user"></i> Nombres</th>
            <th><i class="fas fa-user"></i> Apellidos</th>
            <th><i class="fas fa-phone"></i> Teléfono</th>
            <th><i class="fas fa-user-graduate"></i> Profesión</th>
            <th><i class="fas fa-venus-mars"></i> Estado Civil</th>
            <th><i class="fas fa-venus-mars"></i> Género</th>
            <th><i class="fas fa-home"></i> Dirección</th>
            <th><i class="fas fa-map"></i> Zona</th>
            <th><i class="fas fa-map-marker-alt"></i> Departamento</th>
            <th><i class="fas fa-map-marker"></i> Municipio</th>
            <th><i class="fas fa-building"></i> Gerencia</th>
            <th><i class="fas fa-sitemap"></i> Canal</th>
            <th><i class="fas fa-project-diagram"></i> Proyecto</th>
            <th><i class="fas fa-briefcase"></i> Cargo</th>
            <th><i class="fas fa-file-alt"></i> Curriculum Vitae</th>
            <th><i class="fas fa-file-invoice"></i> Antecedentes</th>
            <th><i class="fas fa-file-contract"></i> Contrato</th>
            <th><i class="fas fa-check-circle"></i> Estado</th>
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
                <form method="post" id="frmPromotor" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label style="color: black;"><i class="fas fa-image"></i> Foto</label>
                            <div class="card border-primary">
                                <div class="card-body">
                                    <label for="imagen" id="icon-image" class="btn btn-primary"><i class="fas fa-image"></i></label>
                                    <span id="icon-cerrar"></span>
                                    <input id="imagen" class="d-none" type="file" accept=".jpg, .jpeg, .png" name="imagen" onchange="preview(event)">
                                    <input type="hidden" id="foto_actual" name="foto_actual">
                                    <img class="img-thumbnail" id="img-preview">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="codigo" style="color: black;"><i class="fas fa-id-card"></i> Código Maestro</label>
                                <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Ingrese el código maestro" maxlength="13" minlength="13" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" oncopy="return false" onpaste="return false">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="dni" style="color: black;"><i class="fas fa-user"></i> DNI</label>
                                <input id="dni" class="form-control" type="text" name="dni" placeholder="Ingrese el número de DNI" maxlength="15" oninput="formatDNI(this)" onkeypress="return isNumber(event)" oncopy="return false" onpaste="return false">
                            </div>
                            <span id="errorDNI" class='text-danger'></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nombre" style="color: black;"><i class="fas fa-user-alt"></i> Nombres</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Ingrese el nombre completo" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="apellido" style="color: black;"><i class="fas fa-user-tag"></i> Apellidos</label>
                                <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Ingrese el apellido completo" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="telefono" style="color: black;"><i class="fas fa-phone"></i> Teléfono</label>
                                <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Ingrese el número de teléfono" maxlength="8" minlength="8" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" oncopy="return false" onpaste="return false">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="profesion" style="color: black;"><i class="fas fa-briefcase"></i> Profesión</label>
                                <input id="profesion" class="form-control" type="text" name="profesion" placeholder="Ingrese la profesión" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="estado_civil" style="color: black;"><i class="fas fa-heart"></i> Estado Civil</label>
                                <select id="estado_civil" class="form-control" name="estado_civil">
                                    <?php foreach ($data['estados_civiles'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['estado_civil']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="genero" style="color: black;"><i class="fas fa-venus-mars"></i> Género</label>
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
                                <label for="direccion" style="color: black;"><i class="fas fa-map-marker-alt"></i> Dirección</label>
                                <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Ingrese la dirección domiciliar">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="zona" style="color: black;"><i class="fas fa-th"></i> Zonas</label>
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
                                <label for="departamento" style="color: black;"><i class="fas fa-building"></i> Departamentos</label>
                                <select id="departamento" class="form-control" name="departamento">
                                    <?php foreach ($data['departamentos'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['departamento']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="municipio" style="color: black;"><i class="fas fa-city"></i> Municipios</label>
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
                                <label for="gerencia" style="color: black;"><i class="fas fa-sitemap"></i> Gerencia</label>
                                <select id="gerencia" class="form-control" name="gerencia">
                                    <?php foreach ($data['gerencias'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['gerencia']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="canal" style="color: black;"><i class="fas fa-share-alt"></i> Canal</label>
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
                                <label for="proyecto" style="color: black;"><i class="fas fa-project-diagram"></i> Proyecto</label>
                                <select id="proyecto" class="form-control" name="proyecto">
                                    <?php foreach ($data['proyectos'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['proyecto']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="cargo" style="color: black;"><i class="fas fa-user-tag"></i> Cargo</label>
                                <select id="cargo" class="form-control" name="cargo">
                                    <?php foreach ($data['cargos'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['cargo']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color: black;"><i class="fas fa-file-alt"></i> Curriculum Vitae</label>
                                <div class="card border-primary">
                                    <div class="card-body">
                                        <!-- Campo de archivo para subir un nuevo CV, solo archivos PDF -->
                                        <input style="color: black;" id="cv" type="file" name="cv" accept=".pdf" onchange="validateFileType(event)">

                                        <!-- Vista previa del archivo (si se sube uno nuevo) -->
                                        <iframe id="cv-preview" width="100%" height="400px" style="display:none;"></iframe>

                                        <!-- Campo oculto para almacenar el archivo actual del CV (si existe) -->
                                        <input type="hidden" id="cv_actual" name="cv_actual" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color: black;"><i class="fas fa-file"></i> Antecedentes Penales y Oficiales</label>
                                <div class="card border-primary">
                                    <div class="card-body">
                                        <!-- Campo de archivo para subir nuevos antecedentes, solo archivos PDF -->
                                        <input style="color: black;" id="antecedentes" type="file" name="antecedentes" accept=".pdf" onchange="validateFileType1(event, 'antecedentes')">

                                        <!-- Vista previa del archivo (si se sube uno nuevo) -->
                                        <iframe id="antecedentes-preview" width="100%" height="400px" style="display:none;"></iframe>

                                        <!-- Campo oculto para almacenar el archivo actual de antecedentes (si existe) -->
                                        <input type="hidden" id="antecedentes_actual" name="antecedentes_actual" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color: black;"><i class="fas fa-file-contract"></i> Contrato</label>
                                <div class="card border-primary">
                                    <div class="card-body">
                                        <!-- Campo de archivo para subir un nuevo contrato, solo archivos PDF -->
                                        <input style="color: black;" id="contrato" type="file" name="contrato" accept=".pdf" onchange="validateFileType2(event, 'contrato')">

                                        <!-- Vista previa del archivo (si se sube uno nuevo) -->
                                        <iframe id="contrato-preview" width="100%" height="400px" style="display:none;"></iframe>

                                        <!-- Campo oculto para almacenar el archivo actual del contrato (si existe) -->
                                        <input type="hidden" id="contrato_actual" name="contrato_actual" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 20px;  display: flex; gap: 15px;">
                        <button class="shadow__btn" type="button" onclick="registrarPromotor(event)" id="btnAccion">Registrar</button>
                        <button class="shadow__btn--red" type="button" data-dismiss="modal" style="color:white">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function validateFileType(event) {
        var file = event.target.files[0];
        if (file) {
            var fileType = file.type; // El tipo MIME del archivo
            if (fileType !== 'application/pdf') {
                alert('Por favor, selecciona un archivo PDF.');
                event.target.value = ''; // Limpia el campo de entrada
            } else {
                // Si es un archivo PDF, muestra una vista previa (si lo deseas)
                var reader = new FileReader();
                reader.onload = function(e) {

                    document.getElementById('cv-preview').src = e.target.result;
                    document.getElementById('cv-preview').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }
    }


    function validateFileType1(event) {
        var file = event.target.files[0];
        if (file) {
            var fileType = file.type; // El tipo MIME del archivo
            if (fileType !== 'application/pdf') {
                alert('Por favor, selecciona un archivo PDF.');
                event.target.value = ''; // Limpia el campo de entrada
            } else {
                // Si es un archivo PDF, muestra una vista previa (si lo deseas)
                var reader = new FileReader();
                reader.onload = function(e) {

                    document.getElementById('antecedentes-preview').src = e.target.result;
                    document.getElementById('antecedentes-preview').style.display = 'block';

                };
                reader.readAsDataURL(file);
            }
        }
    }

    function validateFileType2(event) {
        var file = event.target.files[0];
        if (file) {
            var fileType = file.type; // El tipo MIME del archivo
            if (fileType !== 'application/pdf') {
                alert('Por favor, selecciona un archivo PDF.');
                event.target.value = ''; // Limpia el campo de entrada
            } else {
                // Si es un archivo PDF, muestra una vista previa (si lo deseas)
                var reader = new FileReader();
                reader.onload = function(e) {

                    document.getElementById('contrato-preview').src = e.target.result;
                    document.getElementById('contrato-preview').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }
    }
</script>

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
<?php include "Views/Promotores/estilopromotores.php"; ?>
<?php include "Views/Templates/footer.php"; ?>