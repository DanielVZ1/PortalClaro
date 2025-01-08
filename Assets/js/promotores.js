let tblPromotores;

//----------------------------tblPromotores--------------------------------

tblPromotores = $('#tblPromotores').DataTable({
    ajax: {
        url: base_url + "Promotores/listar",
        dataSrc: ''
    },
    columns: [
        { 'data': 'id' },
        { 'data': 'imagen' },
        { 'data': 'codigo' },
        { 'data': 'dni' },
        { 'data': 'nombre' },
        { 'data': 'apellido' },
        { 'data': 'telefono' },
        { 'data': 'profesion' },
        { 'data': 'estado_civil' },
        { 'data': 'genero' },
        { 'data': 'direccion' },
        { 'data': 'zona' },
        { 'data': 'departamento' },
        { 'data': 'municipio' },
        { 'data': 'gerencia' },
        { 'data': 'canal' },
        { 'data': 'proyecto' },
        { 'data': 'cargo' },
        { 'data': 'cv' },
        { 'data': 'antecedentes' },
        { 'data': 'contrato' },
        { 'data': 'estado' },
        { 'data': 'acciones' }
    ]
    
});

let data = {
    idUser: idUsuario,
    idObjeto: 6,
    accion: "INGRESO",
    descripcion: "SE INGRESÓ A LA PANTALLA DE PROMOTORES",
};
 url = base_url + "Bitacora/CrearEvento";
axios.post(url, data).then((res) => { console.log(res) });


//-----------------------------------Promotores--------------------------------------------------
function frmPromotor() {
    document.getElementById("title").innerHTML = "Nuevo Promotor";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmPromotor").reset();
    document.getElementById("id").value = "";
    document.getElementById("foto_actual").value = '';
    document.getElementById("cv_actual").value = '';
    document.getElementById("antecedentes_actual").value = '';
    document.getElementById("contrato_actual").value = '';
    document.getElementById("imagen").value = '';
    document.getElementById("cv").value = '';
    document.getElementById("antecedentes").value = '';
    document.getElementById("contrato").value = '';

    // Limpiar vistas previas de los archivos

    document.getElementById("cv-preview").style.display = "none";
    document.getElementById("antecedentes-preview").style.display = "none";
    document.getElementById("contrato-preview").style.display = "none";

    // Habilitar los campos
    disableFormFields(false);

    $("#nuevo_promotor").modal("show");
    deleteImg();
}


function registrarPromotor(e) {

    e.preventDefault();

    const codigo = document.getElementById("codigo");
    const dni = document.getElementById("dni");
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const telefono = document.getElementById("telefono");
    const profesion = document.getElementById("profesion");
    const id_estado_civil = document.getElementById("estado_civil");
    const id_genero = document.getElementById("genero");
    const direccion = document.getElementById("direccion");
    const id_zona = document.getElementById("zona");
    const id_departamento = document.getElementById("departamento");
    const id_municipio = document.getElementById("municipio");
    const id_gerencia = document.getElementById("gerencia");
    const id_canal = document.getElementById("canal");
    const id_proyecto = document.getElementById("proyecto");
    const id_cargo = document.getElementById("cargo");


    // Verificar si todos los campos obligatorios están llenos
    if (codigo.value == "" || dni.value == "" || nombre.value == "" || apellido.value == "" ||
        telefono.value == "" || profesion.value == "" || direccion.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios!',
            showConfirmButton: false,
            timer: 3000
        });
        return;  // Evitar que se continúe con el registro si falta información
    }

    // Si todo está correcto, enviar el formulario
    const url = base_url + "Promotores/registrar";
    const frm = document.getElementById("frmPromotor");
    const http = new XMLHttpRequest();

    http.open("POST", url, true);
    http.send(new FormData(frm));

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);  // Ver lo que realmente devuelve el servidor
            try {
                const res = JSON.parse(this.responseText);  // Intentamos analizar la respuesta como JSON
                if (res == "si") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Promotor registrado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    frm.reset();  // Limpiar formulario

                    // Limpiar campos de archivos
                    document.getElementById("foto_actual").value = '';
                    document.getElementById("cv_actual").value = '';
                    document.getElementById("antecedentes_actual").value = '';
                    document.getElementById("contrato_actual").value = '';
                    document.getElementById("imagen").value = '';
                    document.getElementById("cv").value = '';
                    document.getElementById("antecedentes").value = '';
                    document.getElementById("contrato").value = '';

                    // Limpiar vistas previas de los archivos
                    document.getElementById("img-preview").style.display = "none";
                    document.getElementById("cv-preview").style.display = "none";
                    document.getElementById("antecedentes-preview").style.display = "none";
                    document.getElementById("contrato-preview").style.display = "none";

                    $("#nuevo_promotor").modal("hide");
                    tblPromotores.ajax.reload();  // Recargar la tabla
                    let data = {
                        idUser: idUsuario,
                        idObjeto: 6,
                        accion: "REGISTRO",
                        descripcion: "SE REGISTRÓ EL PROMOTOR CON ID " + id.value,
                      };
                      let url = base_url + "Bitacora/CrearEvento";
                      axios.post(url, data).then((res) => {
                        console.log(res);
                      });
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Promotor modificado correctamente',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $("#nuevo_promotor").modal("hide");
                    tblPromotores.ajax.reload();
                    let data = {
                        idUser: idUsuario,
                        idObjeto: 6,
                        accion: "MODIFICACIÓN",
                        descripcion: "SE MODIFICÓ EL PROMOTOR CON ID " + id.value,
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
                    });
                }
            } catch (e) {
                console.error("Error al analizar JSON:", e);  // Capturamos el error si la respuesta no es un JSON válido
            }
        }
    };
}


// Función para verificar si el DNI ya está registrado
function verificarDniExistente(dni) {
    let isDniExistente = false;

    // Realizar una llamada AJAX para verificar si el DNI ya existe
    const http = new XMLHttpRequest();
    http.open("GET", base_url + "Promotores/verificarDni/" + dni, false); // Llamada sincrónica
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const response = this.responseText;
            if (response == "existe") {
                isDniExistente = true;  // El DNI ya está registrado
            }
        }
    };
    http.send();

    return isDniExistente;
}


function checkFileExistence(url) {
    return fetch(url, { method: 'HEAD' })  // Usamos HEAD para verificar solo la existencia sin descargar el archivo
        .then(response => response.status !== 403)  // Si la respuesta no es 404, el archivo existe
        .catch(() => false);  // Si hay un error en la solicitud, significa que no existe
}

function btnEditarPromotor(id) {
    document.getElementById("title").innerHTML = "Actualizar promotor";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    document.getElementById("foto_actual").value = '';
    document.getElementById("cv_actual").value = '';
    document.getElementById("antecedentes_actual").value = '';
    document.getElementById("contrato_actual").value = '';
    document.getElementById("imagen").value = '';
    document.getElementById("cv").value = '';
    document.getElementById("antecedentes").value = '';
    document.getElementById("contrato").value = '';

    // Limpiar vistas previas de los archivos
    document.getElementById("img-preview").style.display = "none";
    document.getElementById("cv-preview").style.display = "none";
    document.getElementById("antecedentes-preview").style.display = "none";
    document.getElementById("contrato-preview").style.display = "none";
    const url = base_url + "Promotores/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("codigo").value = res.codigo;
            document.getElementById("dni").value = res.dni;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("apellido").value = res.apellido;
            document.getElementById("telefono").value = res.telefono;
            document.getElementById("profesion").value = res.profesion;
            document.getElementById("estado_civil").value = res.id_estado_civil;
            document.getElementById("genero").value = res.id_genero;
            document.getElementById("direccion").value = res.direccion;
            document.getElementById("zona").value = res.id_zona;
            document.getElementById("departamento").value = res.id_departamento;
            document.getElementById("municipio").value = res.id_municipio;
            document.getElementById("gerencia").value = res.id_gerencia;
            document.getElementById("canal").value = res.id_canal;
            document.getElementById("proyecto").value = res.id_proyecto;
            document.getElementById("cargo").value = res.id_cargo;

            // Asignar valores actuales a los campos de archivo
            document.getElementById("cv_actual").value = res.cv || '';
            document.getElementById("antecedentes_actual").value = res.antecedentes || '';
            document.getElementById("contrato_actual").value = res.contrato || '';
            document.getElementById("foto_actual").value = res.foto || '';

            // Asignar rutas de archivos para las vistas previas
            const imgPath = res.foto ? base_url + 'Assets/imgBD/' + res.foto : '';
            const cvPath = res.cv ? base_url + 'Assets/Documents/CV/' + res.cv : '';
            const antecedentesPath = res.antecedentes ? base_url + 'Assets/Documents/Antecedentes/' + res.antecedentes : '';
            const contratoPath = res.contrato ? base_url + 'Assets/Documents/Contrato/' + res.contrato : '';

            // Mostrar vistas previas de los archivos si existen
            checkFileExistence(imgPath).then(exists => {
                if (exists) {
                    document.getElementById("img-preview").style.display = "block";
                    document.getElementById("img-preview").src = imgPath;
                } else {
                    document.getElementById("img-preview").style.display = "none";
                }
            });

            checkFileExistence(cvPath).then(exists => {
                if (exists) {
                    document.getElementById("cv-preview").style.display = "block";
                    document.getElementById("cv-preview").src = cvPath;
                } else {
                    document.getElementById("cv-preview").style.display = "none";
                }
            });

            checkFileExistence(antecedentesPath).then(exists => {
                if (exists) {
                    document.getElementById("antecedentes-preview").style.display = "block";
                    document.getElementById("antecedentes-preview").src = antecedentesPath;
                } else {
                    document.getElementById("antecedentes-preview").style.display = "none";
                }
            });

            checkFileExistence(contratoPath).then(exists => {
                if (exists) {
                    document.getElementById("contrato-preview").style.display = "block";
                    document.getElementById("contrato-preview").src = contratoPath;
                } else {
                    document.getElementById("contrato-preview").style.display = "none";
                }
            });

            // Habilitar los campos del formulario
            disableFormFields(false);
            $("#nuevo_promotor").modal("show");
        }
    }
}



function btnEliminarPromotor(id) {
    Swal.fire({
        title: '¿Está seguro de desactivar este promotor?',
        text: "¡El promotor no se eliminara de forma permanente, solo cambiará el estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Promotores/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Promotor desactivado con éxito',
                            'success'
                        )
                        tblPromotores.ajax.reload();
                        let data = {
                            idUser: idUsuario,
                            idObjeto: 6,
                            accion: "DESACTIVAR",
                            descripcion: "SE DESACTIVÓ EL PROMOTOR CON ID " + id,
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

function btnReingresarPromotor(id) {
    Swal.fire({
        title: '¿Está seguro de contratar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Promotores/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Promotor contratado con éxito',
                            'success'
                        )
                        tblPromotores.ajax.reload();
                        let data = {
                            idUser: idUsuario,
                            idObjeto: 6,
                            accion: "ACTIVAR",
                            descripcion: "SE ACTIVÓ EL PROMOTOR CON ID " + id,
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

function btnVerPromotor(id) {
    document.getElementById("title").innerHTML = "Ficha promotor";
    document.getElementById("btnAccion").innerHTML = "Imprimir";
    const url = base_url + "Promotores/ver/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("codigo").value = res.codigo;
            document.getElementById("dni").value = res.dni;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("apellido").value = res.apellido;
            document.getElementById("telefono").value = res.telefono;
            document.getElementById("profesion").value = res.profesion;
            document.getElementById("estado_civil").value = res.id_estado_civil;
            document.getElementById("genero").value = res.id_genero;
            document.getElementById("direccion").value = res.direccion;
            document.getElementById("zona").value = res.id_zona;
            document.getElementById("departamento").value = res.id_departamento;
            document.getElementById("municipio").value = res.id_municipio;
            document.getElementById("gerencia").value = res.id_gerencia;
            document.getElementById("canal").value = res.id_canal;
            document.getElementById("proyecto").value = res.id_proyecto;
            document.getElementById("cargo").value = res.id_cargo;
            document.getElementById("img-preview").src = base_url + 'Assets/imgBD/' + res.foto;
            document.getElementById("cv-preview").style.display = "block";
            document.getElementById("cv-preview").src = base_url + 'Assets/Documents/CV/' + res.cv;

            document.getElementById("antecedentes-preview").style.display = "block";
            document.getElementById("antecedentes-preview").src = base_url + 'Assets/Documents/Antecedentes/' + res.antecedentes;

            document.getElementById("contrato-preview").style.display = "block";
            document.getElementById("contrato-preview").src = base_url + 'Assets/Documents/Contrato/' + res.contrato;


            // Deshabilitar todos los campos del formulario
            disableFormFields(true);

            $("#nuevo_promotor").modal("show");
        }
    }
}

// Función para habilitar o deshabilitar los campos del formulario
function disableFormFields(disable) {
    const fields = [
        "codigo", "dni", "nombre", "apellido", "telefono", "profesion",
        "estado_civil", "genero", "direccion", "zona", "departamento",
        "municipio", "gerencia", "canal", "proyecto", "cargo", "cv", "antecedentes"
        , "contrato", "img-preview", "imagen", "icon-cerrar"
    ];

    fields.forEach(field => {
        document.getElementById(field).disabled = disable;
    });
}



//Funciones para las fotos
function preview(e) {
    const url = e.target.files[0];
    const urlTmp = URL.createObjectURL(url);
    document.getElementById("img-preview").src = urlTmp;
    document.getElementById("icon-image").classList.add("d-none");
    document.getElementById("icon-cerrar").innerHTML = ` 
    <button class="btn btn-danger" onclick="deleteImg()"><i class="fas fa-times"></i></button>
   ${url['name']}`;
}

function deleteImg() {
    document.getElementById("icon-cerrar").innerHTML = '';
    document.getElementById("icon-image").classList.remove("d-none");
    document.getElementById("img-preview").src = '';
    document.getElementById("imagen").value = '';
    document.getElementById("foto_actual").value = '';

}


//Fin Promotores
