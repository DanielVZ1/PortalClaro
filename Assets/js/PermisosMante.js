let tblRoles;
const btnAccion = document.querySelector('#btnAccion');
const btnNuevo = document.querySelector('#btnNuevo');
const formulario = document.querySelector('#formulario');

const usuario = document.querySelector("#usuario");     ///🌟🌟🌟🌟🌟🌟🌟🌟🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰

const id = document.querySelector('#id');

// const errorNombre = document.querySelector('#errorNombre');
let listaCheck = document.querySelectorAll('.listaCheck');

document.addEventListener('DOMContentLoaded', function () {

///✅✅✅✅✅✅✅✅✅✅✅✅✅✅✅✅✅✅✅
    //console.log(permisosUsuario);
    let permisosPantalla = obtenerPermisos("Permisos", permisosUsuario)

    if(!permisosPantalla.consultar) {
      window.location.replace(base_url+'admin');
    }
///✅✅✅✅✅✅✅✅✅✅✅✅✅✅✅✅✅✅✅
    ///🌟🌟🌟🌟🌟🌟🌟🌟🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰
    seleccionarRol(1); // Cargar permisos del administrador
    //cargar datos con el plugin datatables
    tblRoles = $('#tblRoles').DataTable({
        ajax: {
            url: base_url + 'roles/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'estado' },
            { data: 'nombre' },
            { data: 'USUARIO' },
            { data: 'acciones' }
        ],
        language: {
            url: base_url + 'assets/js/espanol.json'
        },
        dom,
        buttons,
        responsive: true,
        order: [[0, 'desc']],
    });

    let data = {
        idUser: idUsuario,
        idObjeto: 1,
        accion: "INGRESO",
        descripcion: "SE INGRESÓ A LA PANTALLA DE PERMISOS",
    };
    url = base_url + "Bitacora/CrearEvento";
    axios.post(url, data).then((res) => { console.log(res) });

    //enviar datos
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        const url = base_url + 'roles/registrar';
        insertarRegistrosPermisos(url, this, tblRoles, btnAccion, false);
    });
})

function eliminarRol(idRol) {
    const url = base_url + 'roles/eliminar/' + idRol;
    eliminarRegistros(url, tblRoles);
}

function seleccionarRol(idRol) {
  console.log('prueba')
    // errorNombre.textContent = '';
    const url = base_url + 'roles/editar/' + idRol;
    //hacer una instancia del objeto XMLHttpRequest 
    const http = new XMLHttpRequest();
    //Abrir una Conexion - POST - GET
    http.open('GET', url, true);
    //Enviar Datos
    http.send();
    //verificar estados
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let arreglo = res.permisos;
            for (let i = 0; i < listaCheck.length; i++) {
                listaCheck[i].removeAttribute('checked');
                let result = arreglo.includes(listaCheck[i].value);
                //let result = arreglo.filter(element => element == listaCheck[i].value);
                if (result) {
                    listaCheck[i].setAttribute('checked', 'checked');
                }
            }
            id.value = res.rol.id;
            // nombre.value = res.rol.nombre;
            btnAccion.textContent = 'Actualizar';
            //////🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃
            /*pagina='admin/permisos';
            window.location.href=(pagina);*/
            //////🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃🎃


            ///////
            // const firstTabEl = document.querySelector("#nav-tab button:nth-last-child(1)");
            // const firstTab = new bootstrap.Tab(firstTabEl);
            // firstTab.show();
            //firstTab.show()
        }
    }
}





function restaurarRol(idRol) {
    const url = base_url + 'roles/restaurar/' + idRol;

    restaurarRegistros(url, tblRoles);

}