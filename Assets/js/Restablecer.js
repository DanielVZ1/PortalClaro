const btnAccion = document.querySelector('#btnAccion');
const nueva_Clave = document.querySelector('#nueva_Clave');
const confirmar_Clave = document.querySelector('#confirmar_Clave');
const token = document.querySelector('#token');

document.addEventListener('DOMContentLoaded', function () {
    btnAccion.addEventListener('click', function () {
        if (nueva_Clave.value == '' || confirmar_Clave.value == '') {
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'warning',
                title: 'TODOS LOS CAMPOS CON * SON REQUERIDOS',
                timer: 4000
            })
        } 
        else {
            if (nueva_Clave.value != confirmar_Clave.value) {
                Swal.fire({
                    toast: true,
                    position: 'top-right',
                    icon: 'warning',
                    title: 'LAS CONTRASEÑAS NO COINCIDEN',
                    timer: 4000
                })
                
            } 
            else if(nueva_Clave.value <6 ) {
                Swal.fire({
                    toast: true,
                    position: 'top-right',
                    icon: 'warning',
                    title: 'LAS CONTRASEÑAS DEBE SER MAYOR A 6 CARACTERES',
                    timer: 4000
                })
            } 
            else {
                const url = base_url + 'Recuperar/cambiarClave';
                //hacer una instancia del objeto XMLHttpRequest
                const http = new XMLHttpRequest();
                //Abrir una conexion - POST - GET
                http.open('POST', url, true);
                //Enviar Datos
                http.send(JSON.stringify({
                    nueva: nueva_Clave.value,
                    confirmar: confirmar_Clave.value, 
                    token: token.value,
                }));
                //Verificar estados
                http.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText)
                        const res = JSON.parse(this.responseText);
                        Swal.fire({
                            toast: true,
                            position: 'top-right',
                            icon: res.type,
                            title: res.msg,
                            timer: 3000
                        })
                        if (res.type == 'success') {
                            setTimeout(() =>{
                                window.location = base_url;
                            }, 3000);
                        }
                    }

                }
            }
        }
    })
})