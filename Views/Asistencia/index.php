<?php
include "Views/Templates/header.php";
?>

<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-check-circle"></i> <?= $data['page_title'] ?>

        </div>
        <!--<ul  class="app-breadcrumb breadcrumb">
           <li  class="breadcrumb-item"><i  class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url; ?>Roles"><?= $data['page_title'] ?></a></li>
        </ul>-->
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>



    <div class="row mb-4">
        <div class="col-md-6">
            <select id="filtroAsistencias" class="form-control">
                <option value="todos">Todos</option>
                <option value="hoy">Hoy</option>
                <option value="ayer">Ayer</option>
                <option value="semana">Esta Semana</option>
                <option value="mes">Este Mes</option>
                <option value="hace_semanas">Hace una Semana</option>
                <option value="hace_meses">Hace un Mes</option>
            </select>
        </div>
        <div class="col-md-6">
            <input type="date" id="fechaExacta" class="form-control" />
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#filtroAsistencias').change(function() {
                const filtro = $(this).val();
                filtrarAsistencias(filtro, null);
            });

            $('#fechaExacta').change(function() {
                const fecha = $(this).val();
                filtrarAsistencias(null, fecha);
            });

            function filtrarAsistencias(filtro, fecha) {
                let url = base_url + "Asistencia/listar";

                if (filtro) {
                    url += "?filtro=" + filtro;
                } else if (fecha) {
                    url += "?fecha=" + fecha;
                }

                tblAsistencia.ajax.url(url).load();
            }
        });
    </script>

    <div>
    <button type="button" id="exportExcelBtn" class="button">
                        <span class="button_lg">
                            <span class="button_sl"></span>
                            <span class="button_text">
                            <i class="fas fa-file-excel" style="margin-right: 5px;"></i>Reporte Excel</span>
                        </span>
                    </button>
    </div>

    <!-- Formulario de Búsqueda -->


    <table class="table table-light" id="tblAsistencia">
        <thead class="thead-dark">
            <tr>
                <th><i class="fas fa-id-badge"></i> Id</th>
                <th><i class="fas fa-code-branch"></i> Código Maestro</th>
                <th><i class="fas fa-id-card"></i> DNI</th>
                <th><i class="fas fa-user"></i> Nombres</th>
                <th><i class="fas fa-user"></i> Apellidos</th>
                <th><i class="fas fa-briefcase"></i> Puesto de trabajo</th>
                <th><i class="fas fa-map"></i> Zona</th>
                <th><i class="fas fa-truck"></i> Proveedor</th>
                <th><i class="fas fa-user-tie"></i> Supervisor</th>
                <th><i class="fas fa-user-friends"></i> Coordinador de proyecto</th>
                <th><i class="fas fa-clock"></i> Hora Entrada</th>
                <th><i class="fas fa-clock"></i> Hora Salida</th>
                <th><i class="fas fa-image"></i> Foto</th>
                <th><i class="fas fa-map-marker-alt"></i> Ubicación</th>
                <th><i class="fas fa-check-circle"></i> Estado</th>
                <th><i class="fas fa-cogs"></i> Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>


    <div id="nuevo_promotor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="title">Ficha Asistencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <input type="hidden" id="id" name="id">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color: black;"><i class="fas fa-camera"></i> Foto</label>
                                <div class="card border-primary">
                                    <div class="card-body">
                                        <input type="hidden" id="foto_actual" name="foto_actual" readonly>
                                        <img class="img-thumbnail" id="img-preview" src="" alt="Vista previa de la foto">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="codigo" style="color: black;"><i class="fas fa-id-card"></i> Código Maestro</label>
                                    <input id="codigo" class="form-control" type="text" name="codigo" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" oncopy="return false" onpaste="return false" readonly>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dni" style="color: black;"><i class="fas fa-id-card-alt"></i> DNI</label>
                                    <input id="dni" class="form-control" type="text" name="dni" oninput="formatDNI(this)" onkeypress="return isNumber(event)" oncopy="return false" onpaste="return false" readonly>
                                </div>
                                <span id="errorDNI" class='text-danger'></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nombre" style="color: black;"><i class="fas fa-user"></i> Nombres</label>
                                    <input id="nombre" class="form-control" type="text" name="nombre" oninput="formatInput(this)" onkeyup="formatInput(this)" readonly>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="apellido" style="color: black;"><i class="fas fa-user"></i> Apellidos</label>
                                    <input id="apellido" class="form-control" type="text" name="apellido" oninput="formatInput(this)" onkeyup="formatInput(this)" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="puesto" style="color: black;"><i class="fas fa-briefcase"></i> Puesto</label>
                                    <input id="puesto" class="form-control" type="text" name="puesto" readonly>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="zona" style="color: black;"><i class="fas fa-map"></i> Zona</label>
                                    <input id="zona" class="form-control" type="text" name="zona" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="proveedor" style="color: black;"><i class="fas fa-store"></i> Proveedor</label>
                                    <input id="proveedor" class="form-control" type="text" name="proveedor" readonly>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="supervisor" style="color: black;"><i class="fas fa-user-tie"></i> Supervisor</label>
                                    <input id="supervisor" class="form-control" type="text" name="supervisor" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="coordinador" style="color: black;"><i class="fas fa-users"></i> Coordinador</label>
                                    <input id="coordinador" class="form-control" type="text" name="coordinador" readonly>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="hora_entrada" style="color: black;"><i class="fas fa-clock"></i> Hora de Entrada</label>
                                    <input id="hora_entrada" class="form-control" type="datetime-local" name="hora_entrada" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="hora_salida" style="color: black;"><i class="fas fa-clock"></i> Hora de Salida</label>
                                    <input id="hora_salida" class="form-control" type="datetime-local" name="hora_salida" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ubicacion" style="color: black;"><i class="fas fa-map-marker-alt"></i> Ubicación</label>
                                    <input id="ubicacion" class="form-control" type="text" name="ubicacion" placeholder="Ingrese la ubicación" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <a id="map-link" href="#" target="_blank" style="color: blue;"><i class="fas fa-map"></i> Ver en el mapa</a>
                            </div>
                        </div>
                        <div style="margin-top: 20px;">
                            <button class="shadow__btn--red" type="button" data-dismiss="modal" style="color:white">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

    <script>
    $('#exportExcelBtn').on('click', function() {
        var table = $('#tblAsistencia').DataTable();

        // Aplicar los filtros adicionales antes de obtener los datos
        applyFilters(table);

        // Obtener solo las filas filtradas
        var data = table.rows({ filter: 'applied' }).data();  // Solo las filas visibles tras aplicar filtros

        var ws_data = [];

        // Agregar los encabezados de la tabla
        var headers = table.columns().header().toArray().map(function (header, index) {
            // Excluir la columna de "Acciones" (suponiendo que sea la última columna)
            if (index !== table.columns().count() - 1) {
                return $(header).text(); // Toma el texto del encabezado de cada columna
            }
        }).filter(function (header) { return header !== undefined; }); // Eliminar los elementos undefined
        ws_data.push(headers); // Agregar los encabezados al array de datos

        // Agregar los datos de las filas filtradas
        data.each(function (row) {
            var rowData = [
                row.id || '',           // Si la propiedad no existe, deja vacío
                row.codigo || '',
                row.dni || '',
                row.nombre || '',
                row.apellido || '',
                row.puesto || '',
                row.zona || '',
                row.proveedor || '',
                row.supervisor || '',
                row.coordinador || '',
                row.hora_entrada || '',
                row.hora_salida || '',
                row.foto || '',
                row.ubicacion || '',
                $(row.estado).text() || ''  // Extraer solo el texto del estado, sin HTML
            ];
            ws_data.push(rowData);  // Agregar cada fila de datos al array
        });

        // Crear el libro de trabajo de Excel
        var ws = XLSX.utils.aoa_to_sheet(ws_data);
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Asistencia");

        // Generar el archivo Excel y descargarlo
        XLSX.writeFile(wb, "Reporte_Asistencia.xlsx");
    });

    // Función para aplicar los filtros adicionales de fecha y rango
    function applyFilters(table) {
        var filtroAsistencia = $('#filtroAsistencia').val();  // Obtener el valor seleccionado en el filtro de asistencia
        var fechaExacta = $('#fechaExactaAsistencia').val();   // Obtener el valor de la fecha exacta

        // Filtro adicional: Filtrar por fecha exacta
        if (fechaExacta) {
            table.column(11).search(fechaExacta).draw();  // Suponiendo que la columna de fecha está en la columna 11, ajusta si es necesario
        } else {
            table.column(11).search('').draw();  // Limpiar el filtro de fecha si no se seleccionó nada
        }

        // Filtro adicional: Filtrar por el rango de fechas predefinidos (Hoy, Ayer, etc.)
        if (filtroAsistencia !== 'todos') {
            var today = new Date();
            var filterDate = '';
            switch (filtroAsistencia) {
                case 'hoy':
                    filterDate = formatDate(today);
                    break;
                case 'ayer':
                    today.setDate(today.getDate() - 1);
                    filterDate = formatDate(today);
                    break;
                case 'semana':
                    today.setDate(today.getDate() - today.getDay());  // Inicio de la semana
                    filterDate = formatDate(today);
                    break;
                case 'mes':
                    today.setMonth(today.getMonth() - 1);  // Hace un mes
                    filterDate = formatDate(today);
                    break;
                case 'hace_semanas':
                    today.setDate(today.getDate() - 7);
                    filterDate = formatDate(today);
                    break;
                case 'hace_meses':
                    today.setMonth(today.getMonth() - 1);  // Hace un mes
                    filterDate = formatDate(today);
                    break;
            }

            // Aplicar el filtro en la columna de fecha
            if (filterDate) {
                table.column(11).search(filterDate).draw();  // Filtrar por la columna de fecha
            }
        } else {
            // Limpiar el filtro de rango si es "todos"
            table.column(11).search('').draw();
        }
    }

    // Función para formatear la fecha en formato 'YYYY-MM-DD'
    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('-');
    }
</script>


    <?php
    include "Views/Asistencia/estiloasistencia.php";
    ?>
    <?php
    include "Views/Templates/footer.php";
    ?>