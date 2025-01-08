tblAsistencia = $('#tblAsistencia').DataTable({
    ajax: {
        url: base_url + "Asistencia/listar",
        dataSrc: ''
    },
    columns: [
        { 'data': 'id' },
        { 'data': 'codigo' },
        { 'data': 'dni' },
        { 'data': 'nombre' },
        { 'data': 'apellido' },
        { 'data': 'puesto' },
        { 'data': 'zona' },
        { 'data': 'proveedor' },
        { 'data': 'supervisor' },
        { 'data': 'coordinador' },
        { 'data': 'hora_entrada' },
        { 'data': 'hora_salida' },
        { 'data': 'imagen' },
        { 'data': 'ubicacion' },
        { 'data': 'estado' },
        { 'data': 'acciones' },
    ],
    order: [[0, 'desc']]  // Ordena la columna 'id' (índice 0) de manera descendente
});

let data = {
    idUser: idUsuario,
    idObjeto: 2,
    accion: "INGRESO",
    descripcion: "SE INGRESÓ A LA PANTALLA DE ASISTENCIAS",
};
 url = base_url + "Bitacora/CrearEvento";
axios.post(url, data).then((res) => { console.log(res) });

//-----------------------------------Asistencia--------------------------------------------------

function btnEliminarAsistencia(id) {
    Swal.fire({
        title: '¿Está seguro de eliminar?',
        text: "¡La Asistencia se eliminara de forma permanente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Asistencia/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Asistencia eliminada con éxito',
                            'success'
                        )
                        tblAsistencia.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}



function btnVerAsistencia(id) {
    document.getElementById("title").innerHTML = "Ficha asistencia";
    const url = base_url + "Asistencia/ver/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("codigo").value = res.codigo;
            document.getElementById("dni").value = res.dni;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("apellido").value = res.apellido;
            document.getElementById("puesto").value = res.puesto;
            document.getElementById("zona").value = res.zona;
            document.getElementById("proveedor").value = res.proveedor;
            document.getElementById("supervisor").value = res.supervisor;
            document.getElementById("coordinador").value = res.coordinador;
            document.getElementById("hora_entrada").value = res.hora_entrada;
            document.getElementById("hora_salida").value = res.hora_salida;
            document.getElementById("ubicacion").value = res.ubicacion;
            // Configurar la imagen en el modal
            document.getElementById("img-preview").src = base_url + 'Assets/img/FotosAsistencias/' + res.foto;

            // Actualiza el enlace para ver en el mapa
            const regex = /Lat:\s*([\d.-]+),\s*Lon:\s*([\d.-]+)/;
            const match = res.ubicacion.match(regex);
            if (match) {
                const lat = match[1];
                const lng = match[2];
                document.getElementById("map-link").href = `https://www.google.com/maps/search/?api=1&query=${lat},${lng}`;
            }

            $("#nuevo_promotor").modal("show");
        }
    };
}


$(document).ready(function () {
    $('#filtroAsistencias').change(function () {
        const filtro = $(this).val();
        filtrarAsistencias(filtro, null);
    });

    $('#fechaExacta').change(function () {
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
