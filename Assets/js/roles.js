let tblRoles;
const btnAccion = document.querySelector('#btnAccion');
const btnNuevo = document.querySelector('#btnNuevo');
const formulario = document.querySelector('#formRol');

const roles = document.querySelector("#roles");
const numeros = document.querySelector("#numeros");
const id = document.querySelector("#id");

// Elementos para mostrar errores
const errorRoles = document.querySelector("#errorRoles");
const errorNumeros = document.querySelector("#errorNumeros");
let permisosPantalla;

document.addEventListener('DOMContentLoaded', function () {
    // Obtener permisos de pantalla
    permisosPantalla = obtenerPermisos("Roles", permisosUsuario);

    // Verificar permisos de consulta
    if (!permisosPantalla.consultar) {
        window.location.replace(base_url + 'admin');
    }

    // Cargar roles con DataTables
    tblRoles = $('#tablaRoles').DataTable({
        ajax: {
            url: base_url + 'roles/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'ROL' },
            { data: 'estado' },
            { data: 'acciones' }
        ],
        language: {
            url: base_url + 'assets/js/espanol.json'
        },
        responsive: true,
        order: [[0, 'desc']]
    });

    // Registrar evento en bitácora
    let data = {
        idUser: idUsuario,
        idObjeto: 1,
        accion: "INGRESO",
        descripcion: "SE INGRESÓ A LA PANTALLA DE ROLES",
    };
    let url = base_url + "Bitacora/CrearEvento";
    axios.post(url, data).then((res) => { console.log(res) });

    // Botón para nuevo rol
    btnNuevo.addEventListener('click', function () {
        limpiarCampos();
    });

    // Enviar formulario
    formulario.addEventListener("submit", function (e) {
        e.preventDefault();
        errorRoles.textContent = '';
        errorNumeros.textContent = '';

        // Verificar permisos de creación
        if (!permisosPantalla.crear) {
            Swal.fire({
                toast: true,
                position: "top-right",
                icon: "info",
                title: "NO TIENE PERMISO DE CREAR",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (roles.value == "") {
            errorRoles.textContent = "EL NOMBRE ES REQUERIDO";
        } else if (numeros.value == "") {
            errorNumeros.textContent = "EL NÚMERO ES REQUERIDO";
        } else {
            const url = base_url + "roles/registrarRol";
            const data = new FormData(this);
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(data);

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    Swal.fire({
                        toast: true,
                        position: "top-right",
                        icon: res.type,
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    if (res.type == "success") {
                        limpiarCampos();
                        tblRoles.ajax.reload();
                    }
                }
            };
        }
    });
});

// Eliminar rol
function eliminarRol(idRol) {
    if (!permisosPantalla.eliminar) {
        Swal.fire({
            toast: true,
            position: "top-right",
            icon: "info",
            title: "NO TIENE PERMISO DE ELIMINAR",
            showConfirmButton: false,
            timer: 1500,
        });
    } else if (idRol == 1) {
        Swal.fire({
            toast: true,
            position: "top-right",
            icon: 'info',
            title: 'No se puede eliminar el rol administrador',
            showConfirmButton: false,
            timer: 2000,
        });
    } else {
        const url = base_url + 'roles/eliminar/' + idRol;
        eliminarRegistros(url, tblRoles);
    }
}

// Editar rol
function editarRoles(idRoles) {
    if (!permisosPantalla.actualizar) {
        Swal.fire({
            toast: true,
            position: "top-right",
            icon: "info",
            title: "NO TIENE PERMISO DE ACTUALIZAR",
            showConfirmButton: false,
            timer: 1500,
        });
    } else if (idRoles != 1) {
        const url = base_url + "roles/editarRol/" + idRoles;
        const http = new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();

        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                id.value = res.id;
                roles.value = res.ROL;
                numeros.value = res.DESCRIPCION;
                btnAccion.textContent = "Actualizar";

                const firstTabEl = document.querySelector("#nav-tab button:nth-last-child(2)");
                const firstTab = new bootstrap.Tab(firstTabEl);
                firstTab.show();
            }
        };
    } else {
        Swal.fire({
            toast: true,
            position: "top-right",
            icon: 'info',
            title: 'No se puede editar el rol administrador',
            showConfirmButton: false,
            timer: 2000,
        });
    }
}

// Limpiar campos del formulario
function limpiarCampos() {
    id.value = "";
    btnAccion.textContent = "Registrar";
    formulario.reset();
    roles.focus();
}

// Restaurar rol
function restaurarRol(idRol) {
    const url = base_url + 'roles/restaurar/' + idRol;
    restaurarRegistros(url, tblRoles);
}
