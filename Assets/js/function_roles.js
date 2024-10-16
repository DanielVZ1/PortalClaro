var tableRoles;

document.addEventListener('DOMContentLoaded', function(){
    tableRoles = $('#tableRoles').DataTable({
        "aProcessing": true,            // Corregido: de "aProcessing" a "processing".
        "aServerSide": true,            // Corregido: de "aServerSide" a "serverSide".
        "language": {                  // Corregido: de "lenguage" a "language".
        },
        "ajax": {
            "url": base_url + "/Roles/getRoles",  // Espacio corregido antes de `base_url`.
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            { "data": "nombrerol" },    // Asegúrate de que los nombres coincidan con tu base de datos.
            { "data": "descripcion" },
            { "data": "status" },
            { "data": "options" }
        ],
        "resonsieve": true,             // Corregido: de "resonsieve" a "responsive".
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "asc"]]
    });

    var formRol = document.querySelector("#formRol");
    formRol.onsubmit = function(e) {
        e.preventDefault();
    
        // Obtener los valores de los campos
        var  intIdrol = document.querySelector("#idRol").value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var intStatus = document.querySelector('#listStatus').value;
    
        // Validar si los campos están vacíos
        if (strNombre == '' || strDescripcion == '' || intStatus == '') {
            swal("Atención!", "Todos los campos son obligatorios.", "error");
            return false; // Detener la ejecución si hay campos vacíos
        }
    
        // Crear la solicitud XMLHttpRequest
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + "/Roles/setRol"; // URL del controlador
        var formData = new FormData(formRol); // Enviar los datos del formulario
    
        request.open("POST", ajaxUrl, true);
        request.send(formData);
    
        // Manejo de la respuesta
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
    
                if (objData.status) {
                    // Cerrar el modal y limpiar el formulario
                    $('#modalFormRol').modal("hide"); // Corregido el ID del modal
                    formRol.reset();
    
                    // Mostrar mensaje de éxito
                    swal("Roles de usuario", objData.msg, "success");

                    tableRoles.ajax.reload(function(){
                        fntEditRol();
                    });

                } else {
                    // Mostrar mensaje de error
                    swal("Error", objData.msg, "error");
                }
            }
        }
    }
 

    
});

$('#tableRoles').DataTable();

// Función para abrir el modal
function openModal() {
    $('#modalFormRol').modal('show');
}

document.addEventListener('click', function(e) {
    // Verifica si el elemento clicado o su padre tiene la clase btnEditRol
    var button = e.target.closest('.btnEditRol');
    if (button) {
        fntEditRol(button);
    }
});


function fntEditRol(button) {
    // Cambia el título y la apariencia del modal
    document.querySelector('#titleModal').innerHTML = "Actualizar Rol";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    var idRol = button.getAttribute("rl"); // Obtén el id del rol

    // Crear la solicitud XMLHttpRequest para obtener los datos del rol
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Roles/getRol/' + idRol;
    request.open('GET', ajaxUrl, true);
    request.send();

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                // Llenar los campos con los datos del rol
                document.querySelector("#idRol").value = objData.data.id;
                document.querySelector("#txtNombre").value = objData.data.nombrerol;
                document.querySelector("#txtDescripcion").value = objData.data.descripcion;

                var optionSelect = (objData.data.status == 1)
                    ? '<option value="1" selected class="notBlock">Activo</option>'
                    : '<option value="2" selected class="notBlock">Inactivo</option>';

                var htmlSelect = `
                    ${optionSelect}
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                `;
                document.querySelector("#listStatus").innerHTML = htmlSelect;

                // Mostrar el modal
                $('#modalFormRol').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function btnDelRol(idrol) {
    Swal.fire({
        title: '¿Está seguro de Rol?',
        text: "¡El rol se eliminara de forma permanente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Roles/delRol/" + idrol;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Rol eliminado con éxito',
                            'success'
                        )
                        tableRoles.ajax.reload();
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


