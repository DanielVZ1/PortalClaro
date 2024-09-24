
window.addEventListener('DOMContentLoaded', event => {

    // Alternar la navegación lateral
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        //Descomentar A continuación para conservar la barra lateral alternar entre actualizaciones
        //if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});
