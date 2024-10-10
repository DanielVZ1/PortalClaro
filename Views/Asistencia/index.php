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

<?php 
    include "Views/Templates/footer.php";
?>
