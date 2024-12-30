








//----------------------------tblVentas--------------------------------

tblVentas = $('#tblVentas').DataTable({
    ajax: {
        url: base_url + "Ventas/listar",
        dataSrc: ''
    },
    columns: [
        { 'data': 'id' },
        { 'data': 'telefono' },
        { 'data': 'medio' },
        { 'data': 'subgerente' },
        { 'data': 'coordinador' },
        { 'data': 'supervisor' },
        { 'data': 'fecha' },
        { 'data': 'codigo' },
        { 'data': 'ubicacion' },
        { 'data': 'promotor' },
        { 'data': 'punto_venta' },
        { 'data': 'departamento' },
        { 'data': 'zona' },
        { 'data': 'distribuidor' },
        { 'data': 'proveedor' },
        { 'data': 'producto' },
        { 'data': 'perfil_plan' },
        { 'data': 'tecnologia' },
        { 'data': 'centro_venta' },
        { 'data': 'canal_rediac' },
        { 'data': 'aliado' },
        { 'data': 'acciones' }
    ]
});

//Fin Usuarios




//-----------------------------------Ventas--------------------------------------------------
function frmVentas() {
    document.getElementById("title").innerHTML = "Nueva Venta";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmVentas").reset();
    document.getElementById("id").value = "";
    $("#nueva_venta").modal("show");

}

function registrarVentas(e) {
    e.preventDefault();
    const telefono = document.getElementById("telefono");
    const medio = document.getElementById("medio");
    const subgerente = document.getElementById("subgerente");
    const coordinador = document.getElementById("coordinador");
    const supervisor = document.getElementById("supervisor");
    const fecha = document.getElementById("fecha");
    const codigo = document.getElementById("codigo");
    const ubicacion = document.getElementById("ubicacion");
    const promotor = document.getElementById("promotor");
    const punto_venta = document.getElementById("punto_venta");
    const departamento = document.getElementById("departamento");
    const zona = document.getElementById("zona");
    const distribuidor = document.getElementById("distribuidor");
    const proveedor = document.getElementById("proveedor");
    const producto = document.getElementById("producto");
    const perfil_plan = document.getElementById("perfil_plan");
    const tecnologia = document.getElementById("tecnologia");
    const centro_venta = document.getElementById("centro_venta");
    const canal_rediac = document.getElementById("canal_rediac");
    const aliado = document.getElementById("aliado");

    if (telefono.value == "" || medio.value == "" || subgerente.value == "" || coordinador.value == "" ||
        supervisor.value == "" || fecha.value == "" || codigo.value == "" || ubicacion.value == "" || promotor.value == "" ||
        punto_venta.value == "" || departamento.value == "" || zona.value == "" || distribuidor.value == "" || proveedor.value == "" || producto.value == "" ||
        perfil_plan.value == "" || tecnologia.value == "" || centro_venta.value == "" || canal_rediac.value == "" || aliado.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios!',
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        const url = base_url + "Ventas/registrar";
        const frm = document.getElementById("frmVentas");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Ventas registradas con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $("#nueva_venta").modal("hide");
                    tblVentas.ajax.reload();

                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Ventas modificadas correctamente',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nueva_venta").modal("hide");
                    tblVentas.ajax.reload();

                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }
        }
    }
}

function btnEditarVentas(id) {
    document.getElementById("title").innerHTML = "Actualizar ventas";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Ventas/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("telefono").value = res.telefono;
            document.getElementById("medio").value = res.medio;
            document.getElementById("subgerente").value = res.subgerente;
            document.getElementById("coordinador").value = res.coordinador;
            document.getElementById("supervisor").value = res.supervisor;
            document.getElementById("fecha").value = res.fecha;
            document.getElementById("codigo").value = res.codigo;
            document.getElementById("ubicacion").value = res.ubicacion;
            document.getElementById("promotor").value = res.promotor;
            document.getElementById("punto_venta").value = res.punto_venta;
            document.getElementById("departamento").value = res.departamento;
            document.getElementById("zona").value = res.zona;
            document.getElementById("distribuidor").value = res.distribuidor;
            document.getElementById("proveedor").value = res.proveedor;
            document.getElementById("producto").value = res.producto;
            document.getElementById("perfil_plan").value = res.perfil_plan;
            document.getElementById("tecnologia").value = res.tecnologia;
            document.getElementById("centro_venta").value = res.centro_venta;
            document.getElementById("canal_rediac").value = res.canal_rediac;
            document.getElementById("aliado").value = res.aliado;
            $("#nueva_venta").modal("show");
        }
    }

}

function btnEliminarVentas(id) {
    Swal.fire({
        title: '¿Está seguro de eliminar?',
        text: "¡La Venta se eliminara de forma permanente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Ventas/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Venta eliminada con éxito',
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
//Fin Ventas



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

    ]
});

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




//-----------------------------------Permisos--------------------------------------------------
function registrarPermisos(event) {
    event.preventDefault(); // Evitar el comportamiento por defecto del formulario (recarga de página)

    let formData = new FormData(document.getElementById('formulario')); // Crear un FormData con los datos del formulario

    const url = base_url + "Roles/registrarPermisos"; // La URL del controlador que maneja la asignación de permisos

    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(formData); // Enviar los datos al servidor

    // Al recibir la respuesta
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);

            if (res.icono === 'success') {
                Swal.fire({
                    title: '¡Éxito!',
                    text: res.msg,
                    icon: 'success'
                }).then(() => {
                    window.location.href = base_url + 'Roles'; // Redirigir después de guardar los permisos
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: res.msg,
                    icon: 'error'
                });
            }
        }
    };
}