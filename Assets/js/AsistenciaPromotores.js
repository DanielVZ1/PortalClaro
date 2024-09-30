const btnAccion = document.querySelector('#btnAccion');
const codigo = document.querySelector('#codigo');

document.addEventListener('DOMContentLoaded', function () {
    btnAccion.addEventListener('click', function () {
        if (codigo.value === '') {
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'warning',
                title: 'EL CODIGO MAESTRO ES REQUERIDO',
                timer: 4000
            });
        } else {
            const url = `${base_url}AsistenciaPromotores/VerificarCodigo/${encodeURIComponent(codigo.value)}`;

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(res => {
                    Swal.fire({
                        toast: true,
                        position: 'top-right',
                        icon: res.type,
                        title: res.msg,
                        timer: 4000,
                        willClose: () => {
                            if (res.type === 'success') {
                                window.location.href = res.redirect; // Redirigir a la nueva página
                            }
                        }
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        toast: true,
                        position: 'top-right',
                        icon: 'error',
                        title: 'Ocurrió un error al verificar el código',
                        timer: 4000
                    });
                });
        }
    });
});
