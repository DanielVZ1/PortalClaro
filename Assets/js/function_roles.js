var tableRoles;

document.addEventListener('DOMContentLoaded', function(){
    tableRoles = $('#tableRoles').DataTable({
        "processing": true,            // Corregido: de "aProcessing" a "processing".
        "serverSide": true,            // Corregido: de "aServerSide" a "serverSide".
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
            { "data": "estado" },
        ],
        "responsive": true,             // Corregido: de "resonsieve" a "responsive".
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
});


$('#tableRoles').DataTable();


function openModal(){
    $('#modalFormRol').modal('show');
}