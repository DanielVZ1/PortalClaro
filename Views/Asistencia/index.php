<?php 
    include "Views/Templates/header.php";
?>

<ol class="breadcrumb mb-4 bg-primary">
    <li class="breadcrumb-item active text-white m">
        <h4 style="color:red">Asistencia</h4>
    </li>
</ol>

<!-- Formulario de Búsqueda -->
<div class="mb-3">
    <label for="fechaBusqueda" style="color: black;">Buscar por Fecha:</label>
    <input type="date" id="fechaBusqueda" class="form-control" onchange="filtrarPorFecha()">
    
    <select id="rangoFechas" class="form-control mt-2" onchange="filtrarPorRango()">
        <option value="todos">Todos</option>
        <option value="hoy">Hoy</option>
        <option value="semana">Esta Semana</option>
        <option value="mes">Este Mes</option>
    </select>
</div>

<button class="btn btn-primary mb-2" type="button" onclick="frmAsistencia();"><i class="fas fa-plus"></i></button>

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

<script>
// Cargar todas las asistencias al iniciar la página
document.addEventListener('DOMContentLoaded', function() {
    cargarAsistencias({}); // Carga todas al inicio
});

function filtrarPorFecha() {
    const fecha = document.getElementById('fechaBusqueda').value;
    cargarAsistencias({ fecha });
}

function filtrarPorRango() {
    const rango = document.getElementById('rangoFechas').value;
    let params = {};

    if (rango === 'todos') {
        params = {}; // Sin filtros
    } else if (rango === 'hoy') {
        params.fecha = 'hoy';
    } else if (rango === 'semana') {
        params.fecha = 'semana';
    } else if (rango === 'mes') {
        params.fecha = 'mes';
    }

    cargarAsistencias(params);
}


function cargarAsistencias(params) {
    const url = base_url + "Asistencia/filtrar";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.setRequestHeader("Content-Type", "application/json");
    http.send(JSON.stringify(params));
    
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const datos = JSON.parse(this.responseText);
            actualizarTabla(datos);
        }
    };
}

function actualizarTabla(datos) {
    const tbody = document.querySelector('#tblAsistencia tbody');
    tbody.innerHTML = ''; 

    datos.forEach(row => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${row.id}</td>
            <td>${row.codigo}</td>
            <td>${row.dni}</td>
            <td>${row.nombre}</td>
            <td>${row.apellido}</td>
            <td>${row.puesto}</td>
            <td>${row.zona}</td>
            <td>${row.proveedor}</td>
            <td>${row.supervisor}</td>
            <td>${row.coordinador}</td>
            <td>${row.hora_entrada}</td>
            <td>${row.hora_salida}</td>
            <td>${row.foto ? `<img src="${row.foto}" style="width: 50px; height: auto;">` : 'Sin foto'}</td>
            <td>${row.ubicacion}</td>
            <td>${row.estado === 1 ? '<span style="color: green;">Activo</span>' : '<span style="color: red;">Inactivo</span>'}</td>
            <td>
                <button class="btn btn-primary" type="button" onclick="btnEditarUser(${row.id});"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="confirmarEliminacion(${row.id});"><i class="fas fa-trash-alt"></i></button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}
</script>

<?php 
    include "Views/Templates/footer.php";
?>
