let tblUsuarios, tblPromotores;
document.addEventListener("DOMContentLoaded", function() {
    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + "Usuarios/listar",
            dataSrc: ''
        },
        columns: [
            { 'data': 'id' },
            { 'data': 'usuario' },
            { 'data': 'nombre' },
            { 'data': 'email' },
            { 'data': 'nombrerol' },  // Nombre del rol
            { 'data': 'estado' },
            { 'data': 'acciones' }
        ]
    });


//----------------------------tblROLES--------------------------------
        tblRoles = $('#tblRoles').DataTable({
            "ajax": {
                "url": base_url + "Roles/listar",  // Ruta para obtener los roles
                "type": "GET",
                "dataSrc": ""
            },
            "columns": [
                { "data": "id" },
                { "data": "nombrerol" },
                { "data": "estado" },
                { "data": "acciones" }
            ]
        });
    });


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
        ]
    });
function frmUsuario() {
    document.getElementById("title").innerHTML = "Nuevo usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevo_usuario").modal("show");
    document.getElementById("id").value = "";
}

window.addEventListener('load', function() {
    fntRolesUsuarios();
}, false);

function btnEditarUser(id) {
    const titleElement = document.getElementById("title");
    const btnAccionElement = document.getElementById("btnAccion");
    const idElement = document.getElementById("id");
    const usuarioElement = document.getElementById("usuario");
    const nombreElement = document.getElementById("nombre");
    const emailElement = document.getElementById("email");
    const rolElement = document.getElementById("rol");
    const claveElement = document.getElementById("clave");
    const confirmarElement = document.getElementById("clave");


    titleElement.innerHTML = "Actualizar usuario";
    btnAccionElement.innerHTML = "Modificar";

    const url = base_url + "Usuarios/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();

    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            idElement.value = res.id;
            usuarioElement.value = res.usuario;
            nombreElement.value = res.nombre;
            emailElement.value = res.email;
            rolElement.value = res.id_rol;  // Asignamos el rol del usuario
            document.getElementById("claves").classList.add("d-none"); // Ocultamos las claves en el formulario de edición
            $("#nuevo_usuario").modal("show");

            // Limpiar los campos de contraseña al editar
            claveElement.value = res.clave;
            confirmarElement.value = res.clave;

            // Llamamos a la función de registro con isEdit = true para evitar la validación de contraseñas
            btnAccionElement.onclick = function(e) {
                registrarUser(e, true); // Le pasamos true porque estamos editando
            };
        }
    };
}



function fntRolesUsuarios() {
    var ajaxUrl = base_url + '/Roles/getSelectRoles';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open('GET', ajaxUrl, true);
    
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector("#rol").innerHTML = request.responseText; // Cambiado a 'rol'
        }
    };
    request.send();
}


// Función para registrar o editar usuario
function registrarUser(e, isEdit = false) {
    e.preventDefault();

    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const clave = document.getElementById("clave");
    const confirmar = document.getElementById("confirmar");
    const rol = document.getElementById("rol");
    const email = document.getElementById("email");

    // Expresión regular para validar la contraseña
    const regexContraseña = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,50}$/;

    // Validación de campos vacíos
    if (usuario.value == "" || nombre.value == "" || rol.value == "" || email.value == "" || clave.value=="") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios!',
            showConfirmButton: false,
            timer: 3000
        });
    } 
    // Validación de contraseñas solo si no es un modo de edición
    else if (!isEdit) {
        if (clave.value !== confirmar.value) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Las contraseñas no coinciden!',
                showConfirmButton: false,
                timer: 3000
            });
        } else if (!regexContraseña.test(clave.value)) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'La contraseña debe tener al menos 6 caracteres, incluir una mayúscula, una minúscula, un número y un carácter especial.',
                showConfirmButton: false,
                timer: 3000
            });
        }
    }

    // Proceder con la solicitud si todo es correcto
    if (usuario.value != "" && nombre.value != "" && rol.value != "" && email.value != "" && (isEdit || (clave.value === confirmar.value && regexContraseña.test(clave.value)))) {
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario registrado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    frm.reset();
                    $("#nuevo_usuario").modal("hide");
                    tblUsuarios.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario modificado correctamente',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $("#nuevo_usuario").modal("hide");
                    tblUsuarios.ajax.reload();
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            }
        };
    }
}


function btnEliminarUser(id) {
    Swal.fire({
        title: '¿Está seguro de desactivar?',
        text: "¡El usuario no se eliminara de forma permanente, solo cambiará el estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Usuario desactivado con éxito',
                            'success'
                        )
                      tblUsuarios.ajax.reload();
                    }else{ Swal.fire(
                            'Mensaje',
                            res,
                            'error'
                    )}
                }
            }
          
        }
    })
}

function btnReingresarUser(id) {
    Swal.fire({
        title: '¿Está seguro de activar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Usuario activado con éxito',
                            'success'
                        )
                      tblUsuarios.ajax.reload();
                    }else{ Swal.fire(
                            'Mensaje',
                            res,
                            'error'
                    )}
                }
            }
          
        }
    })
}

//Fin Usuarios

//-----------------------------------Promotores--------------------------------------------------
function frmPromotor() {
    document.getElementById("title").innerHTML = "Nuevo Promotor";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmPromotor").reset();
    document.getElementById("id").value = "";

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

    // Validación de que el DNI no esté duplicado
    const dniExistente = verificarDniExistente(dni.value);
    
    if (dniExistente) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'El DNI ingresado ya está registrado',
            showConfirmButton: false,
            timer: 3000
        });
        return;  // Evitar que se continúe con el registro si el DNI ya existe
    }

    // Si todo está correcto, enviar el formulario
    const url = base_url + "Promotores/registrar";
    const frm = document.getElementById("frmPromotor");
    const http = new XMLHttpRequest();
    
    http.open("POST", url, true);
    http.send(new FormData(frm));
    
    http.onreadystatechange = function() {
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
                    frm.reset();
                    $("#nuevo_promotor").modal("hide");
                    tblPromotores.ajax.reload();
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
    http.onreadystatechange = function() {
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


function btnEditarPromotor(id) {
    document.getElementById("title").innerHTML = "Actualizar promotor";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Promotores/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
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

            // Asignar valores actuales a los campos ocultos
            document.getElementById("cv_actual").value = res.cv || '';  // Establecer el valor actual del archivo de CV
            document.getElementById("antecedentes_actual").value = res.antecedentes || '';  // Establecer el valor actual del archivo de antecedentes
            document.getElementById("contrato_actual").value = res.contrato || '';  // Establecer el valor actual del archivo de contrato
            document.getElementById("foto_actual").value = res.foto || '';

            // Mostrar la imagen actual
            document.getElementById("img-preview").style.display = res.foto ? "block" : "none";
            document.getElementById("img-preview").src = res.foto ? base_url + 'Assets/imgBD/' + res.foto : '';

            // Mostrar los archivos existentes si hay alguno, de lo contrario mantener vacío
            document.getElementById("cv-preview").style.display = res.cv ? "block" : "none";
            document.getElementById("cv-preview").src = res.cv ? base_url + 'Assets/Documents/CV/' + res.cv : '';

            document.getElementById("antecedentes-preview").style.display = res.antecedentes ? "block" : "none";
            document.getElementById("antecedentes-preview").src = res.antecedentes ? base_url + 'Assets/Documents/Antecedentes/' + res.antecedentes : '';

            document.getElementById("contrato-preview").style.display = res.contrato ? "block" : "none";
            document.getElementById("contrato-preview").src = res.contrato ? base_url + 'Assets/Documents/Contrato/' + res.contrato : '';

            // Habilitar los campos
            disableFormFields(false);
            $("#nuevo_promotor").modal("show");
        }
    }
}


function btnEliminarPromotor(id) {
    Swal.fire({
        title: '¿Está seguro de rechazar este promotor?',
        text: "¡El promotor no se rechazara de forma permanente, solo cambiará el estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Promotores/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Promotor rechazado con éxito',
                            'success'
                        )
                      tblPromotores.ajax.reload();
                    }else{ Swal.fire(
                            'Mensaje',
                            res,
                            'error'
                    )}
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
            const url = base_url + "Promotores/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Promotor contratado con éxito',
                            'success'
                        )
                      tblPromotores.ajax.reload();
                    }else{ Swal.fire(
                            'Mensaje',
                            res,
                            'error'
                    )}
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
    http.onreadystatechange = function() {
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
function preview(e){
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
    document.getElementById("foto_actual").value= '';
   
}


//Fin Promotores


//-----------------------------------Ventas--------------------------------------------------
function frmVentas() {
    document.getElementById("title").innerHTML="Nueva Venta";
    document.getElementById("btnAccion").innerHTML="Registrar";
    document.getElementById("frmVentas").reset();
    document.getElementById("id").value = "";
    $("#nueva_venta").modal("show");

}

function registrarVentas(e){
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
    
    if (telefono.value =="" || medio.value == "" || subgerente.value =="" || coordinador.value == "" ||  
        supervisor.value =="" || fecha.value == "" || codigo.value == "" || ubicacion.value == "" || promotor.value =="" || 
        punto_venta.value == ""|| departamento.value == ""  || zona.value == "" || distribuidor.value =="" || proveedor.value == "" || producto.value == "" ||  
        perfil_plan.value == "" || tecnologia.value =="" || centro_venta.value == "" || canal_rediac.value == "" || aliado.value ==""){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios!',
            showConfirmButton: false,
            timer: 3000
        })
    }else{
        const url = base_url + "Ventas/registrar";
        const frm = document .getElementById("frmVentas");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState ==4 && this.status==200){
                const res = JSON.parse(this.responseText);
                if (res == "si"){
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

                }else if(res=="modificado"){
                    Swal.fire({
                        position:'top-end',
                        icon: 'success',
                        title: 'Ventas modificadas correctamente',
                        showConfirmButton: false,
                        timer: 3000
                    }) 
                    $("#nueva_venta").modal("hide");
                    tblVentas.ajax.reload();

                }else{
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
    document.getElementById("title").innerHTML="Actualizar ventas";
    document.getElementById("btnAccion").innerHTML="Modificar";
    const url = base_url + "Ventas/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
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
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Venta eliminada con éxito',
                            'success'
                        )
                        tblAsistencia.ajax.reload();
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



//-----------------------------------Asistencia--------------------------------------------------

function btnEliminarAsistencia(id) {
    Swal.fire({
        title: '¿Está seguro de eliminar?',
        text: "¡La Asistencia se eliminara de forma permanente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Asistencia/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Asistencia eliminada con éxito',
                            'success'
                        )
                        tblAsistencia.ajax.reload();
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

tblAsistencia = $('#tblAsistencia').DataTable({
    ajax: {
        url: base_url + "Asistencia/listar",
        dataSrc: ''
    },
    columns: [
        { 'data': 'id' },
        { 'data': 'codigo' },
        { 'data': 'dni' },
        { 'data': 'nombre' },
        { 'data': 'apellido' },
        { 'data': 'puesto' },
        { 'data': 'zona' },
        { 'data': 'proveedor' },
        { 'data': 'supervisor' },
        { 'data': 'coordinador' },
        { 'data': 'hora_entrada' },
        { 'data': 'hora_salida' },
        { 'data': 'imagen' },
        { 'data': 'ubicacion' },
        { 'data': 'estado' },
        { 'data': 'acciones' },

    ]
});

function btnVerAsistencia(id) {
    document.getElementById("title").innerHTML = "Ficha asistencia";
    const url = base_url + "Asistencia/ver/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("codigo").value = res.codigo;
            document.getElementById("dni").value = res.dni;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("apellido").value = res.apellido;
            document.getElementById("puesto").value = res.puesto;
            document.getElementById("zona").value = res.zona;
            document.getElementById("proveedor").value = res.proveedor;
            document.getElementById("supervisor").value = res.supervisor;  
            document.getElementById("coordinador").value = res.coordinador;
            document.getElementById("hora_entrada").value = res.hora_entrada;
            document.getElementById("hora_salida").value = res.hora_salida;
            document.getElementById("ubicacion").value = res.ubicacion;
            // Configurar la imagen en el modal
            document.getElementById("img-preview").src = base_url + 'Assets/img/FotosAsistencias/' + res.foto;

            // Actualiza el enlace para ver en el mapa
            const regex = /Lat:\s*([\d.-]+),\s*Lon:\s*([\d.-]+)/;
            const match = res.ubicacion.match(regex);
            if (match) {
                const lat = match[1];
                const lng = match[2];
                document.getElementById("map-link").href = `https://www.google.com/maps/search/?api=1&query=${lat},${lng}`;
            }

            $("#nuevo_promotor").modal("show");
        }
    };
}


$(document).ready(function() {
    $('#filtroAsistencias').change(function() {
        const filtro = $(this).val();
        filtrarAsistencias(filtro, null);
    });

    $('#fechaExacta').change(function() {
        const fecha = $(this).val();
        filtrarAsistencias(null, fecha);
    });

    function filtrarAsistencias(filtro, fecha) {
        let url = base_url + "Asistencia/listar";

        if (filtro) {
            url += "?filtro=" + filtro;
        } else if (fecha) {
            url += "?fecha=" + fecha;
        }

        tblAsistencia.ajax.url(url).load();
    }
});



function frmRol() {
    document.getElementById("title").innerHTML = "Nuevo Rol";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmRol").reset();
    document.getElementById("id").value = ""; 
    $("#nuevo_Rol").modal("show");
}

// Función para registrar un nuevo rol o actualizar uno existente
function registrarRol(event) {
    event.preventDefault(); // Prevenir envío por defecto del formulario

    // Recoger los datos del formulario
    let id = document.getElementById('id').value;
    let nombrerol = document.getElementById('nombre').value;

    // Verificar si el campo de nombre está vacío
    if (nombrerol.trim() === '') {
        Swal.fire('Error', 'El nombre del rol es obligatorio', 'error');
        return;
    }

    // Datos a enviar al controlador
    let formData = new FormData();
    formData.append('nombrerol', nombrerol);
    formData.append('id', id);

    // URL para el controlador
    let url = base_url + "Roles/registrar"; // Esta URL manejará tanto la creación como la modificación
    let http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);

            if (res === "si") {
                // Si la respuesta es 'si', significa que se modificó el rol correctamente
                Swal.fire('Éxito', 'El rol ha sido modificado correctamente', 'success').then(() => {
                    location.reload();  // Recargar toda la página para reflejar el cambio
                });
            } else {
                // Si hay un error, mostrar el mensaje de error
                if (res.msg) {
                    Swal.fire(res.msg, '', res.icono);
                } else {
                    Swal.fire('Error', 'Hubo un problema al modificar el rol', 'error');
                }
            }
        }
    };
    http.send(formData); // Enviar datos al servidor
}


// Función para editar un rol
function btnEditarRol(id) {
    document.getElementById("title").innerHTML = "Editar Rol";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + "Roles/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id; // Cargar el ID del rol
            document.getElementById("nombre").value = res.nombrerol; // Cargar el nombre del rol
            $("#nuevo_Rol").modal("show"); // Mostrar el modal para editar
        }
    };
}

// Función para eliminar un rol
function btnEliminarRol(id) {
    Swal.fire({
        title: '¿Está seguro de desactivar?',
        text: "¡El Rol se desactivará!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Roles/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Rol desactivado con éxito',
                            'success'
                        );
                        tblRoles.ajax.reload();  // Recarga los roles
                    } else {
                        Swal.fire(res.msg, res, res.icono);
                    }
                }
            };
        }
    });
}

// Función para reingresar un rol (habilitarlo nuevamente)
function btnReingresarRol(id) {
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Roles/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje',
                            'Rol activado con éxito',
                            'success'
                        );
                        tblRoles.ajax.reload();  // Recarga los roles
                    } else {
                        Swal.fire(res.msg, res, res.icono);
                    }
                }
            };
        }
    });
}
//-----------------------------------Permisos--------------------------------------------------
function registrarPermisos(event) {
    event.preventDefault(); // Evitar el comportamiento por defecto del formulario (recarga de página)

    let formData = new FormData(document.getElementById('formulario')); // Crear un FormData con los datos del formulario

    const url = base_url + "Roles/registrarPermisos"; // La URL del controlador que maneja la asignación de permisos

    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(formData); // Enviar los datos al servidor

    // Al recibir la respuesta
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);

            if (res.icono === 'success') {
                Swal.fire({
                    title: '¡Éxito!',
                    text: res.msg,
                    icon: 'success'
                }).then(() => {
                    window.location.href = base_url + 'Roles'; // Redirigir después de guardar los permisos
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: res.msg,
                    icon: 'error'
                });
            }
        }
    };
}