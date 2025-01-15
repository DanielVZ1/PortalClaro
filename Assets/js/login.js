function frmLogin(e){
    e.preventDefault();
    const usuario = document .getElementById("usuario");
    const clave = document .getElementById("clave");
    if (usuario.value ==""){
        clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    }else if(clave.value==""){
        usuario.classList.remove("is-invalid");
        clave.classList.add("is-invalid");
        clave.focus();
    }else {
        const url = base_url + "Usuarios/validar";
        const frm = document .getElementById("frmLogin");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function()
        {
            if(this.readyState ==4 && this.status==200){
                console.log(this.responseText)
                const res = JSON.parse(this.responseText);
                console.log(res)
                if (res == "ok"){
                    let data = {
                        idUser: res.id_usuario,
                        idObjeto: 8,
                        accion: "INGRESO",
                        descripcion: "HA INICIADO SESIÓN EN EL SISTEMA",
                    };
                    const url = base_url + "Bitacora/CrearEvento";
                    axios.post(url, data).then((res) => {console.log(res)});
                    window.location = base_url + "Principal";
                }else{
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").innerHTML = res;
                }

            }
        }
    }
}
