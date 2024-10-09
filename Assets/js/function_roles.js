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
        "order": [[0, "desc"]]
    });

    var formRol = document.querySelector("#formRol");
    formRol.onsubmit = function(e) {
        e.preventDefault();
    
        // Obtener los valores de los campos
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
    
                    // Recargar la tabla de roles
                    tableRoles.ajax.reload(); // Corregido: ya no se usa `.api()`
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
    var idRol = button.getAttribute("rl"); // Obtén el id del rol
    
    // Cambia la apariencia del modal
    document.querySelector('#titleModal').innerHTML = "Actualizar Rol";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    // Mostrar el modal
    $('#modalFormRol').modal('show');
}

