<?php 
    include "Views/Templates/header.php";
?>

<ol class="breadcrumb mb-4 bg-primary">
    <li class="breadcrumb-item active text-white m">
        <h4 style="color:red">Asistencia</h4>
    </li>
</ol>

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
                <form method="post" id="frmPromotor">
                    <input type="hidden" id="id" name="id">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label style="color: black;">Foto</label>
                            <div class="card border-primary">
                                <div class="card-body">
                                    <input type="hidden" id="foto_actual" name="foto_actual"readonly>
                                    <img class="img-thumbnail" id="img-preview" src="" alt="Vista previa de la foto">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="codigo" style="color: black;">Código Maestro</label>
                                <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Ingrese el código maestro" maxlength="13" minlength="13" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" oncopy="return false" onpaste="return false"readonly>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="dni" style="color: black;">DNI</label>
                                <input id="dni" class="form-control" type="text" name="dni" placeholder="Ingrese el número de DNI" maxlength="15" oninput="formatDNI(this)" onkeypress="return isNumber(event)" oncopy="return false" onpaste="return false"readonly>
                             </div>
                            <span id="errorDNI" class='text-danger'></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nombre" style="color: black;">Nombres</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Ingrese el nombre completo" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)"readonly>
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="apellido" style="color: black;">Apellidos</label>
                                <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Ingrese el apellido completo" maxlength="50" oninput="formatInput(this)" onkeyup="formatInput(this)"readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="puesto" style="color: black;">Puesto</label>
                                <input id="puesto" class="form-control" type="text" name="puesto" placeholder="Ingrese el puesto" maxlength="50"readonly>
                            </div>
                        </div>
                    
                        <div class="col-6">
                            <div class="form-group">
                                <label for="zona" style="color: black;">Zonas</label>
                                <input id="zona" class="form-control" type="text" name="zona" placeholder="Ingrese la zona"readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="proveedor" style="color: black;">Proveedor</label>
                                <input id="proveedor" class="form-control" type="text" name="proveedor" placeholder="Ingrese el proveedor"readonly>
                            </div>
                        </div>
                    
                        <div class="col-6">
                            <div class="form-group">
                                <label for="supervisor" style="color: black;">Supervisor</label>
                                <input id="supervisor" class="form-control" type="text" name="supervisor" placeholder="Ingrese el supervisor"readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="coordinador" style="color: black;">Coordinador</label>
                                <input id="coordinador" class="form-control" type="text" name="coordinador" placeholder="Ingrese el coordinador"readonly>
                            </div>
                        </div>
                    
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hora_entrada" style="color: black;">Hora de Entrada</label>
                                <input id="hora_entrada" class="form-control" type="time" name="hora_entrada"readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hora_salida" style="color: black;">Hora de Salida</label>
                                <input id="hora_salida" class="form-control" type="time" name="hora_salida"readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ubicacion" style="color: black;">Ubicación</label>
                                <input id="ubicacion" class="form-control" type="text" name="ubicacion" placeholder="Ingrese la ubicación"readonly>
                            </div>
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
