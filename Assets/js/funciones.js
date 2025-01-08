

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