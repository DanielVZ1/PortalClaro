const btnAccion = document.querySelector('#btnAccion');
const correo = document.querySelector('#correo');
const wifiLoader = document.querySelector('#wifi-loader');  // Referencia al loader

document.addEventListener('DOMContentLoaded', function () {
    btnAccion.addEventListener('click', function () {
        if (correo.value == '') {
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'warning',
                title: 'EL CORREO ES REQUERIDO',
                timer: 4000
            });
        } else {
            // Mostrar el loader mientras se realiza la solicitud
            wifiLoader.style.display = 'flex';  // Mostrar el loader

            const url = base_url + 'Recuperar/enviarCorreo/' + encodeURIComponent(correo.value);
            
            // Crear una instancia del objeto XMLHttpRequest
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            
            // Procesar la respuesta cuando esté lista
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    
                    const res = JSON.parse(this.responseText);
                    
                    // Ocultar el loader una vez se recibe la respuesta
                    wifiLoader.style.display = 'none';  // Ocultar el loader
                    
                    Swal.fire({
                        toast: true,
                        position: 'top-right',
                        icon: res.type,
                        title: res.msg,
                        timer: 4000
                    });
                }
            }
        }
    })
});
