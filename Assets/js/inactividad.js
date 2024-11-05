let timeout;
let timeoutLimit = 10 * 60 * 1000;

function handleInactivity() {
    swal({
        title: "¡Tu sesión ha expirado!",
        text: "No has interactuado en mucho tiempo.",
        icon: "warning",
        buttons: false,
        timer: 3000  
    }).then(() => {
        window.location.href = 'Usuarios/salir';
    });
}

function resetInactivityTimer() {
    clearTimeout(timeout);
    timeout = setTimeout(handleInactivity, timeoutLimit);
}

window.onload = function() {
    document.body.addEventListener("mousemove", resetInactivityTimer);
    document.body.addEventListener("keydown", resetInactivityTimer);
    document.body.addEventListener("click", resetInactivityTimer);
    resetInactivityTimer();
};