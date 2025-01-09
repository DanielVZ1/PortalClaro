//----------------------------tblVentas--------------------------------

tblVentas = $('#tblVentas').DataTable({
    ajax: {
        url: base_url + "Ventas/listar",
        dataSrc: ''
    },
    columns: [
        { 'data': 'id' },
        { 'data': 'telefono' },
        { 'data': 'medio' },
        { 'data': 'subgerente' },
        { 'data': 'coordinador' },
        { 'data': 'supervisor' },
        { 'data': 'fecha' },
        { 'data': 'codigo' },
        { 'data': 'ubicacion' },
        { 'data': 'promotor' },
        { 'data': 'punto_venta' },
        { 'data': 'departamento' },
        { 'data': 'zona' },
        { 'data': 'distribuidor' },
        { 'data': 'proveedor' },
        { 'data': 'producto' },
        { 'data': 'perfil_plan' },
        { 'data': 'tecnologia' },
        { 'data': 'centro_venta' },
        { 'data': 'canal_rediac' },
        { 'data': 'aliado' },
        { 'data': 'acciones' }
    ],

    order: [[0, 'desc']]
});

let data = {
    idUser: idUsuario,
    idObjeto: 7,
    accion: "INGRESO",
    descripcion: "SE INGRESÓ A LA PANTALLA DE VENTAS",
};
 url = base_url + "Bitacora/CrearEvento";
axios.post(url, data).then((res) => { console.log(res) });


//-----------------------------------Ventas--------------------------------------------------
function frmVentas() {
    document.getElementById("title").innerHTML = "Nueva Venta";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmVentas").reset();
    document.getElementById("id").value = "";
    $("#nueva_venta").modal("show");

}

function registrarVentas(e) {
    e.preventDefault();
    const telefono = document.getElementById("telefono");
    const medio = document.getElementById("medio");
    const subgerente = document.getElementById("subgerente");
    const coordinador = document.getElementById("coordinador");
    const supervisor = document.getElementById("supervisor");
    const fecha = document.getElementById("fecha");
    const codigo = document.getElementById("codigo");
    const ubicacion = document.getElementById("ubicacion");
    const promotor = document.getElementById("promotor");
    const punto_venta = document.getElementById("punto_venta");
    const departamento = document.getElementById("departamento");
    const zona = document.getElementById("zona");
    const distribuidor = document.getElementById("distribuidor");
    const proveedor = document.getElementById("proveedor");
    const producto = document.getElementById("producto");
    const perfil_plan = document.getElementById("perfil_plan");
    const tecnologia = document.getElementById("tecnologia");
    const centro_venta = document.getElementById("centro_venta");
    const canal_rediac = document.getElementById("canal_rediac");
    const aliado = document.getElementById("aliado");

    if (telefono.value == "" || medio.value == "" || subgerente.value == "" || coordinador.value == "" ||
        supervisor.value == "" || fecha.value == "" || codigo.value == "" || ubicacion.value == "" || promotor.value == "" ||
        punto_venta.value == "" || departamento.value == "" || zona.value == "" || distribuidor.value == "" || proveedor.value == "" || producto.value == "" ||
        perfil_plan.value == "" || tecnologia.value == "" || centro_venta.value == "" || canal_rediac.value == "" || aliado.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios!',
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        const url = base_url + "Ventas/registrar";
        const frm = document.getElementById("frmVentas");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Ventas registradas con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $("#nueva_venta").modal("hide");
                    tblVentas.ajax.reload();

                    let data = {
                        idUser: idUsuario,
                        idObjeto: 7,
                        accion: "REGISTRO",
                        descripcion: "SE REGISTRÓ LA VENTA CON ID " + id.value,
                      };
                      let url = base_url + "Bitacora/CrearEvento";
                      axios.post(url, data).then((res) => {
                        console.log(res);
                      });

                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Ventas modificadas correctamente',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nueva_venta").modal("hide");
                    tblVentas.ajax.reload();

                    let data = {
                        idUser: idUsuario,
                        idObjeto: 7,
                        accion: "MODIFICACIÓN",
                        descripcion: "SE MODIFICÓ LA VENTA CON ID " + id.value,
                      };
                      let url = base_url + "Bitacora/CrearEvento";
                      axios.post(url, data).then((res) => {
                        console.log(res);
                      });

                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }
        }
    }
}

function btnEditarVentas(id) {
    document.getElementById("title").innerHTML = "Actualizar ventas";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Ventas/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("telefono").value = res.telefono;
            document.getElementById("medio").value = res.medio;
            document.getElementById("subgerente").value = res.subgerente;
            document.getElementById("coordinador").value = res.coordinador;
            document.getElementById("supervisor").value = res.supervisor;
            document.getElementById("fecha").value = res.fecha;
            document.getElementById("codigo").value = res.codigo;
            document.getElementById("ubicacion").value = res.ubicacion;
            document.getElementById("promotor").value = res.promotor;
            document.getElementById("punto_venta").value = res.punto_venta;
            document.getElementById("departamento").value = res.departamento;
            document.getElementById("zona").value = res.zona;
            document.getElementById("distribuidor").value = res.distribuidor;
            document.getElementById("proveedor").value = res.proveedor;
            document.getElementById("producto").value = res.producto;
            document.getElementById("perfil_plan").value = res.perfil_plan;
            document.getElementById("tecnologia").value = res.tecnologia;
            document.getElementById("centro_venta").value = res.centro_venta;
            document.getElementById("canal_rediac").value = res.canal_rediac;
            document.getElementById("aliado").value = res.aliado;
            $("#nueva_venta").modal("show");
        }
    }

}

function btnEliminarVentas(id) {
    Swal.fire({
        title: '¿Está seguro de eliminar?',
        text: "¡La Venta se eliminara de forma permanente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Ventas/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Venta eliminada con éxito',
                            'success'
                        )
                        tblVentas.ajax.reload();
                        
                    let data = {
                        idUser: idUsuario,
                        idObjeto: 7,
                        accion: "ELIMINACIÓN",
                        descripcion: "SE ELIMINÓ LA VENTA CON ID " + id,
                      };
                      let url = base_url + "Bitacora/CrearEvento";
                      axios.post(url, data).then((res) => {
                        console.log(res);
                      });
                    } else {
                        Swal.fire(
                            'Mensaje',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}
//Fin Ventas

