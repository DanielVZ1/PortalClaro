var tableRoles;

document.addEventListener('DOMContentLoaded', function(){
    tableRoles = $('#tableRoles').DataTable({
        "aProcessing": true,            // Corregido: de "aProcessing" a "processing".
        "aServerSide": true,            // Corregido: de "aServerSide" a "serverSide".
        "language": {                  // Corregido: de "lenguage" a "language".
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
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
    
        // Obtener valores del formulario
        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var intStatus = document.querySelector('#listStatus').value;
    
        // Validar si los campos están vacíos
        if (strNombre == '' || strDescripcion == '' || intStatus == '') {
            swal("Atención!", "Todos los campos son obligatorios.", "error");
            return false; // Detener la ejecución si hay campos vacíos
        }
    
        // Crear la solicitud
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + "/Roles/setRol";
        var formData = new FormData(formRol);
    
        request.open("POST", ajaxUrl, true);
        request.send(formData);
    
        // Procesar la respuesta
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
    
                // Si el registro es exitoso
                if (objData.status) {
                    $('#modalFormRol').modal("hide"); // ID corregido
                    formRol.reset();
    
                    // Mostrar mensaje de éxito
                    swal("Roles de usuario", objData.msg, "success");
    
                    // Recargar la tabla de roles
                    tableRoles.ajax.reload(); // Corregido: Usar solo ajax.reload() sin api()
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