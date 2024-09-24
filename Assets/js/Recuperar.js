const btnAccion = document.querySelector('#btnAccion');
const correo = document.querySelector('#correo');
document.addEventListener('DOMContentLoaded', function () {
    btnAccion.addEventListener('click', function () {
        if (correo.value == '') {
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'warning',
                title: 'EL CORREO ES REQUERIDO',
                timer: 4000
            })
        } else {
            const url = base_url + 'Recuperar/enviarCorreo/' + encodeURIComponent(correo.value);
            //hacer una instancia del objeto XMLHttpRequest
            const http = new XMLHttpRequest();
            //Abrir una conexion - POST - GET
            http.open('GET', url, true);
            //Enviar Datos
            http.send();
            //Verificar estados
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    Swal.fire({
                        toast: true,
                        position: 'top-right',
                        icon: res.type,
                        title: res.msg,
                        timer: 4000
                    })
                }

            }
        }
    })
})