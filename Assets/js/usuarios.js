let tblUsuarios;


document.addEventListener("DOMContentLoaded", function () {
    let url = base_url + "Bitacora/CrearEvento";
tblUsuarios = $('#tblUsuarios').DataTable({
    ajax: {
        url: base_url + "Usuarios/listar",
        dataSrc: ''
    },
    columns: [
        { 'data': 'id' },
        { 'data': 'usuario' },
        { 'data': 'nombre' },
        { 'data': 'email' },
        { 'data': 'nombrerol' },  // Nombre del rol
        { 'data': 'zona' },
        { 'data': 'estado' },
        { 'data': 'acciones' }
    ],

    order: [[0, 'desc']],
});

    let data = {
        idUser: idUsuario,
        idObjeto: 1,
        accion: "INGRESO",
        descripcion: "SE INGRESÓ A LA PANTALLA DE USUARIO",
      };
      axios.post(url, data).then((res) => {
        console.log(res);
      });

});

function frmUsuario() {
    document.getElementById("title").innerHTML = "Nuevo usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevo_usuario").modal("show");
    document.getElementById("id").value = "";
}

window.addEventListener('load', function () {
    fntRolesUsuarios();
}, false);

function btnEditarUser(id) {
    const titleElement = document.getElementById("title");
    const btnAccionElement = document.getElementById("btnAccion");
    const idElement = document.getElementById("id");
    const usuarioElement = document.getElementById("usuario");
    const nombreElement = document.getElementById("nombre");
    const emailElement = document.getElementById("email");
    const rolElement = document.getElementById("rol");
    const zonaElement = document.getElementById("zona");
    const claveElement = document.getElementById("clave");
    const confirmarElement = document.getElementById("clave");


    titleElement.innerHTML = "Actualizar usuario";
    btnAccionElement.innerHTML = "Modificar";

    const url = base_url + "Usuarios/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            idElement.value = res.id;
            usuarioElement.value = res.usuario;
            nombreElement.value = res.nombre;
            emailElement.value = res.email;
            rolElement.value = res.id_rol;  // Asignamos el rol del usuario
            zonaElement.value = res.id_zona;
            document.getElementById("claves").classList.add("d-none"); // Ocultamos las claves en el formulario de edición
            $("#nuevo_usuario").modal("show");

            // Limpiar los campos de contraseña al editar
            claveElement.value = res.clave;
            confirmarElement.value = res.clave;

            // Llamamos a la función de registro con isEdit = true para evitar la validación de contraseñas
            btnAccionElement.onclick = function (e) {
                registrarUser(e, true); // Le pasamos true porque estamos editando
            };
        }
    };
}



function fntRolesUsuarios() {
    var ajaxUrl = base_url + '/Roles/getSelectRoles';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open('GET', ajaxUrl, true);

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector("#rol").innerHTML = request.responseText; // Cambiado a 'rol'
        }
    };
    request.send();
}


// Función para registrar o editar usuario
function registrarUser(e, isEdit = false) {

    e.preventDefault();

    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const clave = document.getElementById("clave");
    const confirmar = document.getElementById("confirmar");
    const rol = document.getElementById("rol");
    const id_zona = document.getElementById("zona");
    const email = document.getElementById("email");

    // Expresión regular para validar la contraseña
    const regexContraseña = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,50}$/;

    // Validación de campos vacíos
    if (usuario.value == "" || nombre.value == "" || rol.value == "" || email.value == "" || clave.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios!',
            showConfirmButton: false,
            timer: 3000
        });
    }
    // Validación de contraseñas solo si no es un modo de edición
    else if (!isEdit) {
        if (clave.value !== confirmar.value) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Las contraseñas no coinciden!',
                showConfirmButton: false,
                timer: 3000
            });
        } else if (!regexContraseña.test(clave.value)) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'La contraseña debe tener al menos 6 caracteres, incluir una mayúscula, una minúscula, un número y un carácter especial.',
                showConfirmButton: false,
                timer: 3000
            });
        }
    }

    // Proceder con la solicitud si todo es correcto
    if (usuario.value != "" && nombre.value != "" && rol.value != "" && email.value != "" && (isEdit || (clave.value === confirmar.value && regexContraseña.test(clave.value)))) {
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
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
                        title: 'Usuario registrado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    frm.reset();
                    $("#nuevo_usuario").modal("hide");
                    tblUsuarios.ajax.reload();
                    let data = {
                        idUser: idUsuario,
                        idObjeto: 1,
                        accion: "REGISTRO",
                        descripcion: "SE REGISTRÓ EL USUARIO CON ID " + id.value, // Asegúrate de que usuario.value tenga valor
                    };
                    let url = base_url + "Bitacora/CrearEvento";
                    axios.post(url, data).then((res) => {
                        console.log(res);
                    });
                    
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario modificado correctamente',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $("#nuevo_usuario").modal("hide");
                    tblUsuarios.ajax.reload();

                    let data = {
                        idUser: idUsuario,
                        idObjeto: 1,
                        accion: "MODIFICACIÓN",
                        descripcion: "SE MODIFICÓ EL USUARIO CON ID " + id.value,
                      };
                      let url = base_url + "Bitacora/CrearEvento";
                      axios.post(url, data).then((res) => {
                        console.log(res);
                      });

                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            }
        };
    }
}


function btnEliminarUser(id) {
    Swal.fire({
        title: '¿Está seguro de desactivar?',
        text: "¡El usuario no se eliminara de forma permanente, solo cambiará el estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Usuario desactivado con éxito',
                            'success'
                        )
                        tblUsuarios.ajax.reload();
                        let data = {
                            idUser: idUsuario,
                            idObjeto: 1,
                            accion: "DESACTIVAR",
                            descripcion: "SE DESACTIVÓ EL USUARIO CON ID " + id,
                          };
                          let url = base_url + "Bitacora/CrearEvento";
                          axios.post(url, data).then((res) => {
                            console.log(res);
                          });
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

function btnReingresarUser(id) {
    Swal.fire({
        title: '¿Está seguro de activar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Usuario activado con éxito',
                            'success'
                        )
                        tblUsuarios.ajax.reload();
                        let data = {
                            idUser: idUsuario,
                            idObjeto: 1,
                            accion: "ACTIVAR",
                            descripcion: "SE ACTIVÓ AL USUARIO CON ID " + id,
                          };
                          let url = base_url + "Bitacora/CrearEvento";
                          axios.post(url, data).then((res) => {
                            console.log(res);
                          });
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
