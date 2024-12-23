let tblBitacora;

//----------------------------tblBitacora--------------------------------

    document.addEventListener("DOMContentLoaded", function () {
        let url = base_url + "Bitacora/CrearEvento";
      tblBitacora = $("#tblBitacora").DataTable({
        ajax: {
          url: base_url + "bitacora/listar",
          dataSrc: "",
        },
        columns: [
          { data: "FECHA" },
          { data: "USUARIO" },
          { data: "OBJETOS" },
          { data: "ACCION" },
          { data: "DESCRIPCION" },
        ],
        language: {
          url: base_url + "assets/js/espanol.json",
        },
        //dom,
        //buttons,
        responsive: true,
        order: [[0, "desc"]],
      });
    
      let data = {
        idUser: idUsuario,
        idObjeto: 4,
        accion: "INGRESO",
        descripcion: "SE INGRESÓ A LA PANTALLA DE BITÁCORA",
      };
      axios.post(url, data).then((res) => {
        console.log(res);
        tblBitacora.ajax.reload();
      });

    });
