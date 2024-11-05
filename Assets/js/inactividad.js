let timeout;
let timeoutLimit = 10 * 60 * 1000;  // 1 minuto (en milisegundos)

// Función para manejar la inactividad
function handleInactivity() {
    swal({
        title: "¡Tu sesión ha expirado!",
        text: "No has interactuado en mucho tiempo.",
        icon: "warning",  // Tipo de alerta: warning
        buttons: false,  // No mostrar botones
        timer: 3000  // La alerta permanecerá visible durante 3 segundos
    }).then(() => {
        window.location.href = 'Usuarios/salir';  // Redirigir al cierre de sesión
    });
}

// Restablecer el temporizador cada vez que el usuario interactúa
function resetInactivityTimer() {
    clearTimeout(timeout);  // Limpiar el temporizador anterior
    timeout = setTimeout(handleInactivity, timeoutLimit);  // Iniciar un nuevo temporizador
}

// Detectar interacciones del usuario (movimiento del mouse, teclas presionadas, clics)
window.onload = function() {
    document.body.addEventListener("mousemove", resetInactivityTimer);
    document.body.addEventListener("keydown", resetInactivityTimer);
    document.body.addEventListener("click", resetInactivityTimer);
    resetInactivityTimer();  // Inicializar el temporizador al cargar la página
};