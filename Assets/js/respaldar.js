
function realizarRespaldo() {

    // Extraer el nombre del archivo del camino (ruta)


    var xhr = new XMLHttpRequest();
    xhr.open('POST', base_url + '/Backups/index.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response && response.message === "¡Respaldo creado correctamente en la carpeta 'backup'!") {
                        mostrarAviso('success', 'Base de datos respaldada correctamente');
                        let data = {
                            idUser: idUsuario,
                            idObjeto: 5,
                            accion: "CREACIÓN",
                            descripcion: `SE CREÓ EL RESPALDO:`,
                        };

                        let url = base_url + "Bitacora/CrearEvento";
                        axios.post(url, data).then((res) => {
                          console.log(res);
                        });
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } else {
                        mostrarAviso('error', 'Error al respaldar la base de datos');
                    }
                } catch (error) {
                    mostrarAviso('error', 'Error al procesar la respuesta del servidor');
                }
            } else {
                mostrarAviso('error', 'Error en la solicitud al servidor');
            }
        }
    };

    mostrarAviso('info', 'Realizando respaldo, por favor espere...', true);
    xhr.send();
}


function mostrarAviso(icon, mensaje, recargar) {
    Swal.fire({
        icon: icon,
        title: mensaje,
        showConfirmButton: false,
        timer: 2000
    }).then((result) => {
        if (recargar) {
            location.reload();
        }
    });
}

let data = {
    idUser: idUsuario,
    idObjeto: 5,
    accion: "INGRESO",
    descripcion: "SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD",
};
 url = base_url + "Bitacora/CrearEvento";
axios.post(url, data).then((res) => { console.log(res) });


function confirmarEliminarRespaldo(archivo) {

     
    // Extraer el nombre del archivo del camino (ruta)
    let nombreArchivo = archivo.split('/').pop(); // Obtiene el nombre del archivo desde la ruta

    Swal.fire({
        title: '¿Estás seguro?',
        text: `Esta acción eliminará el respaldo "${nombreArchivo}".`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar respaldo'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: base_url + '/eliminar_respaldo.php',
                type: 'POST',
                data: { archivo: archivo },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        mostrarAviso('success', 'Respaldo eliminado exitosamente');
                        let data = {
                            idUser: idUsuario,
                            idObjeto: 5,
                            accion: "ELIMINACION",
                            descripcion: `SE ELIMINÓ EL RESPALDO: ${nombreArchivo}`,
                        };

                        let url = base_url + "Bitacora/CrearEvento";
                        axios.post(url, data).then((res) => {
                          console.log(res);
                        });

                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } else {
                        mostrarAviso('error', `Error al eliminar el respaldo. Respuesta del servidor: ${JSON.stringify(response)}`);
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    mostrarAviso('error', `Error al comunicarse con el servidor. Detalles: ${textStatus} - ${errorThrown}`);
                }
            });
        }
    });
}

// Función para mostrar un aviso (puedes reemplazarla con tu propia lógica de notificación)
function mostrarAviso(tipo, mensaje) {
    // Implementa aquí tu lógica para mostrar un aviso o notificación, por ejemplo, usando un Toast, alert, etc.
    console.log(`${tipo}: ${mensaje}`);
}




// Agregar un evento de clic al botón con el id 'btnCrearRespaldo'
document.getElementById('btnCrearRespaldo').addEventListener('click', function () {
    realizarRespaldo(); // Llamar a la función realizarRespaldo() cuando se hace clic en el botón
});


// restaurar.js

document.addEventListener('DOMContentLoaded', function () {
    var btnRestaurar = document.getElementById('btnRestaurarBaseDatos');
    var archivoRespaldo = document.getElementById('archivoRespaldo');

    btnRestaurar.addEventListener('click', function (event) {
        event.preventDefault();

        if (archivoRespaldo.files.length > 0) {
            var selectedFile = archivoRespaldo.files[0];

            // Obtener el nombre del archivo
            var nombreArchivo = selectedFile.name;

            if (esExtensionSQL(nombreArchivo)) {
                if (selectedFile.size > 0) {
                    var loadingMessage = mostrarAviso1('info', 'Restaurando Base de Datos, Espere...', true);
                    var formData = new FormData();
                    formData.append('archivoRespaldo', selectedFile);

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', base_url + '/Backups/restore.php', true);
                    xhr.onload = function () {
                        loadingMessage.close();

                        if (xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            if (response && response.message) {
                                mostrarAviso2('success', response.message);

                                let data = {
                                    idUser: idUsuario,
                                    idObjeto: 5,
                                    accion: "RESTAURACIÓN",
                                    descripcion: `SE RESTAURÓ EL SISTEMA: ` + nombreArchivo,
                                };

                                let url = base_url + "Bitacora/CrearEvento";
                                axios.post(url, data).then((res) => {
                                    console.log(res);
                                });

                            } else if (response && response.error) {
                                mostrarAviso('error', response.error);
                            } else {
                                mostrarAviso('error', 'Error inesperado en la respuesta del servidor.');
                            }
                        } else {
                            mostrarAviso('error', 'Error en la solicitud al servidor. Código de estado: ' + xhr.status);
                        }
                    };
                    xhr.send(formData);
                } else {
                    mostrarAviso('error', 'El archivo seleccionado está vacío. Por favor, seleccione un archivo con contenido.');
                }
            } else {
                mostrarAviso('error', 'Por favor, seleccione un archivo con extensión .sql');
            }
        } else {
            mostrarAviso('error', 'Por favor, seleccione un archivo antes de intentar restaurar.');
        }
    });



    function esExtensionSQL(nombreArchivo) {
        return nombreArchivo.toLowerCase().endsWith('.sql');
    }

    function mostrarAviso(icon, mensaje) {
        Swal.fire({
            icon: icon,
            title: mensaje,
            showConfirmButton: false,
            timer: 2000,
        });
    }

    function mostrarAviso1(icon, mensaje, noCerrable) {
        var config = {
            icon: icon,
            title: mensaje,
            showConfirmButton: !noCerrable,
            allowOutsideClick: !noCerrable,
        };

        if (noCerrable) {
            config.onBeforeOpen = function (modalElement) {
                modalElement.querySelector('button.swal2-confirm').disabled = true;
            };

            config.didClose = function () {
                Swal.enableButtons();
            };
        }

        return Swal.fire(config);
    }
});



function esExtensionSQL(nombreArchivo) {
    return nombreArchivo.toLowerCase().endsWith('.sql');
}

function mostrarAviso(icon, mensaje) {
    Swal.fire({
        icon: icon,
        title: mensaje,
        showConfirmButton: false,
        timer: 2000,
    });
}

function mostrarAviso2(icon, mensaje) {
    Swal.fire({
        icon: icon,
        title: mensaje,
        showConfirmButton: false,
        timer: 2000,
    }).then(function() {
        // Recargar la página después de mostrar el aviso
        location.reload();
    });
}


