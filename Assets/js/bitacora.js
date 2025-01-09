document.addEventListener("DOMContentLoaded", function () {
  let url = base_url + "Bitacora/CrearEvento";

  tblBitacora = $("#tblBitacora").DataTable({
      ajax: {
          url: base_url + "Bitacora/listar",
          dataSrc: "",
      },
      columns: [
          { data: "FECHA" },
          { data: "USUARIO" },
          { data: "OBJETOS" },
          { data: "ACCION" },
          { data: "DESCRIPCION" },
      ],
      order: [[0, "desc"]],
  });

  let data = {
      idUser: idUsuario,
      idObjeto: 4,
      accion: "INGRESO",
      descripcion: "SE INGRESÓ A LA PANTALLA DE BITÁCORA",
  };

  axios.post(url, data).then((res) => {
      console.log("Datos insertados correctamente:", res);

      // No recargues los datos aún, primero limpiar la tabla
      tblBitacora.clear(); // Limpiar las filas actuales de la tabla

      // Cargar los datos actualizados desde la API
      axios.get(base_url + "Bitacora/listar")
          .then((response) => {
              console.log("Datos cargados de la API:", response);

              // Filtrar duplicados (por ejemplo, usando un identificador único)
              let uniqueData = response.data.filter((value, index, self) =>
                  index === self.findIndex((t) => (
                      t.FECHA === value.FECHA && t.USUARIO === value.USUARIO
                  ))
              );

              // Agregar los datos únicos a la tabla
              tblBitacora.rows.add(uniqueData);
              tblBitacora.draw(); // Dibujar la tabla
          })
          .catch((error) => {
              console.error("Error al cargar los datos de la bitácora", error);
          });
  }).catch((error) => {
      console.error("Error al insertar evento en la bitácora", error);
  });
});
