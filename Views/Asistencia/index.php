<?php 
    include "Views/Templates/header.php";
?>

<ol class="breadcrumb mb-4 bg-primary">
    <li class="breadcrumb-item active text-white m">
        <h4 style="color:red">Asistencia</h4>
    </li>
</ol>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

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

<!-- Formulario de Búsqueda -->


<table class="table table-light" id="tblAsistencia">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Código Maestro</th>
            <th>DNI</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Puesto de trabajo</th>
            <th>Zona</th>
            <th>Proveedor</th>
            <th>Supervisor</th>
            <th>Coordinador de proyecto</th>
            <th>Hora Entrada</th>
            <th>Hora Salida</th>
            <th>Foto</th>
            <th>Ubicación</th>
            <th>Estado</th>
            <th>Acciones</th>
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

                    <button class="btn btn-danger" type="button" data-dismiss="modal" style="color:white">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php 
    include "Views/Templates/footer.php";
?>
