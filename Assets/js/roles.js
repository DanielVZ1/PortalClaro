//----------------------------tblROLES--------------------------------

tblRoles = $('#tblRoles').DataTable({
    "ajax": {
        "url": base_url + "Roles/listar",  // Ruta para obtener los roles
        "type": "GET",
        "dataSrc": ""
    },
    "columns": [
        { "data": "id" },
        { "data": "nombrerol" },
        { "data": "estado" },
        { "data": "acciones" }
    ]

});

let data = {
    idUser: idUsuario,
    idObjeto: 3,
    accion: "INGRESO",
    descripcion: "SE INGRESÓ A LA PANTALLA ROLES",
};
 url = base_url + "Bitacora/CrearEvento";
axios.post(url, data).then((res) => { console.log(res) });

function frmRol() {
    document.getElementById("title").innerHTML = "Nuevo Rol";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmRol").reset();
    document.getElementById("id").value = "";
    $("#nuevo_Rol").modal("show");
}

// Función para registrar un nuevo rol o actualizar uno existente
function registrarRol(event) {
    event.preventDefault(); // Prevenir envío por defecto del formulario

    // Recoger los datos del formulario
    let id = document.getElementById('id').value;
    let nombrerol = document.getElementById('nombre').value;

    // Verificar si el campo de nombre está vacío
    if (nombrerol.trim() === '') {
        Swal.fire('Error', 'El nombre del rol es obligatorio', 'error');
        return;
    }

    // Datos a enviar al controlador
    let formData = new FormData();
    formData.append('nombrerol', nombrerol);
    formData.append('id', id);

    // URL para el controlador
    let url = base_url + "Roles/registrar"; // Esta URL manejará tanto la creación como la modificación
    let http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);

            if (res === "si") {
                // Si la respuesta es 'si', significa que se modificó el rol correctamente
                Swal.fire('Éxito', 'El rol ha sido modificado correctamente', 'success').then(() => {
                    location.reload();  // Recargar toda la página para reflejar el cambio
                });

                let data = {
                    idUser: idUsuario,
                    idObjeto: 3,
                    accion: "MODIFICACIÓN",
                    descripcion: "SE HA MODIFICADO EL ROL " + nombrerol,
                };
                 url = base_url + "Bitacora/CrearEvento";
                axios.post(url, data).then((res) => { console.log(res) });
            } else {
                // Si hay un error, mostrar el mensaje de error
                if (res.msg) {
                    Swal.fire(res.msg, '', res.icono);
                } else {
                    Swal.fire('Error', 'Hubo un problema al modificar el rol', 'error');
                }
            }
        }
    };
    http.send(formData); // Enviar datos al servidor
}


// Función para editar un rol
function btnEditarRol(id) {
    document.getElementById("title").innerHTML = "Editar Rol";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + "Roles/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id; // Cargar el ID del rol
            document.getElementById("nombre").value = res.nombrerol; // Cargar el nombre del rol
            $("#nuevo_Rol").modal("show"); // Mostrar el modal para editar
        }
    };
}

// Función para eliminar un rol
function btnEliminarRol(id) {
    Swal.fire({
        title: '¿Está seguro de desactivar?',
        text: "¡El Rol se desactivará!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Roles/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Rol desactivado con éxito',
                            'success'
                        );
                        tblRoles.ajax.reload();  // Recarga los roles
                    } else {
                        Swal.fire(res.msg, res, res.icono);
                    }
                }
            };
        }
    });
}

// Función para reingresar un rol (habilitarlo nuevamente)
function btnReingresarRol(id) {
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Roles/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Rol activado con éxito',
                            'success'
                        );
                        tblRoles.ajax.reload();  // Recarga los roles
                    } else {
                        Swal.fire(res.msg, res, res.icono);
                    }
                }
            };
        }
    });
}