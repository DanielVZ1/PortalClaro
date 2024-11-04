<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .control-label {
            color: black; /* Cambia el color de los labels a negro */
        }
    </style>
</head>
<style>
    .shadow__btn {
  padding: 5px 10px;
  border: none;
  font-size: 12px;
  color: #fff;
  border-radius: 7px;
  letter-spacing: 1px;
  font-weight: 700;
  text-transform: uppercase;
  transition: 0.5s;
  transition-property: box-shadow;
}

.shadow__btn {
  background: rgb(0,140,255);
  box-shadow: 0 0 25px rgb(0,140,255);
}

.shadow__btn:hover {
  box-shadow: 0 0 5px rgb(0,140,255),
              0 0 25px rgb(0,140,255),
              0 0 50px rgb(0,140,255),
              0 0 100px rgb(0,140,255);
}

/* From Uiverse.io by mrhyddenn */
.shadow__btn--red {
  padding: 5px 10px;
  border: none;
  font-size: 12px;
  color: #fff;
  border-radius: 7px;
  letter-spacing: 1px;
  font-weight: 700;
  text-transform: uppercase;
  transition: 0.5s;
  transition-property: box-shadow;
}

.shadow__btn--red {
  background: rgb(255,0,0); /* Rojo */
  box-shadow: 0 0 25px rgb(255,0,0); /* Rojo */
}

.shadow__btn--red:hover {
  box-shadow: 0 0 5px rgb(255,0,0), /* Rojo */
              0 0 25px rgb(255,0,0), /* Rojo */
              0 0 50px rgb(255,0,0), /* Rojo */
              0 0 100px rgb(255,0,0); /* Rojo */
}

    /* From Uiverse.io by aaronross1 */ 
    .delete-button {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: rgb(20, 20, 20);
  border: none;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
  cursor: pointer;
  transition-duration: 0.3s;
  overflow: hidden;
  position: relative;
}

.delete-svgIcon {
  width: 15px;
  transition-duration: 0.3s;
}

.delete-svgIcon path {
  fill: white;
}

.delete-button:hover {
  width: 90px;
  border-radius: 50px;
  transition-duration: 0.3s;
  background-color: rgb(255, 69, 69);
  align-items: center;
}

.delete-button:hover .delete-svgIcon {
  width: 20px;
  transition-duration: 0.3s;
  transform: translateY(60%);
  -webkit-transform: rotate(360deg);
  -moz-transform: rotate(360deg);
  -o-transform: rotate(360deg);
  -ms-transform: rotate(360deg);
  transform: rotate(360deg);
}

.delete-button::before {
  display: none;
  content: "Eliminar";
  color: white;
  transition-duration: 0.3s;
  font-size: 2px;
}

.delete-button:hover::before {
  display: block;
  padding-right: 10px;
  font-size: 13px;
  opacity: 1;
  transform: translateY(0px);
  transition-duration: 0.3s;
}

/* From Uiverse.io by aaronross1 */
.edit-button {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: rgb(20, 20, 20);
  border: none;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
  cursor: pointer;
  transition-duration: 0.3s;
  overflow: hidden;
  position: relative;
  text-decoration: none !important;
}

.edit-svgIcon {
  width: 17px;
  transition-duration: 0.3s;
}

.edit-svgIcon path {
  fill: white;
}

.edit-button:hover {
  width: 120px;
  border-radius: 50px;
  transition-duration: 0.3s;
  background-color: rgb(0, 123, 255); /* Color azul */
  align-items: center;
}

.edit-button:hover .edit-svgIcon {
  width: 20px;
  transition-duration: 0.3s;
  transform: translateY(60%);
  -webkit-transform: rotate(360deg);
  -moz-transform: rotate(360deg);
  -o-transform: rotate(360deg);
  -ms-transform: rotate(360deg);
  transform: rotate(360deg);
}

.edit-button::before {
  display: none;
  content: "Editar";
  color: white;
  transition-duration: 0.3s;
  font-size: 2px;
}

.edit-button:hover::before {
  display: block;
  padding-right: 10px;
  font-size: 13px;
  opacity: 1;
  transform: translateY(0px);
  transition-duration: 0.3s;
}

/* From Uiverse.io by MUJTABA201566 */ 
.lock-button {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: rgb(20, 20, 20);
  border: none;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
  cursor: pointer;
  transition-duration: 0.3s;
  overflow: hidden;
  position: relative;
  text-decoration: none !important;
}

.lock-svgIcon {
  width: 17px;
  transition-duration: 0.3s;
}

.lock-svgIcon path {
  fill: white;
}

.lock-button:hover {
  border-radius: 50px;
  transition-duration: 0.3s;
  background-color: rgb(255, 69, 69);
  align-items: center;
}

.lock-button:hover .lock-svgIcon {
  width: 20px;
  transition-duration: 0.3s;
  -webkit-transform: rotate(360deg);
}

.lock-button::before {
  display: none;
  color: white;
  transition-duration: 0.3s;
}

.lock-button:hover::before {
  display: block;
  opacity: 1;
  transform: translateY(0px);
  transition-duration: 0.3s;
}

</style>
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header headerRegister bg-danger">
                <h5 class="modal-title" style="color:white" id="titleModal"><i class="fas fa-tag"></i> NUEVO ROL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="tile">
                    <div class="tile-body">
                        <!-- Formulario -->
                        <form id="formRol" name="formRol" onsubmit="return validateForm(event)">
                            <!-- Nombre del Rol -->
                            <input type="hidden" id="idRol" name="idRol" value="">
                            <div class="form-group">
                                <label class="control-label"><i class="fas fa-user-tag"></i> Nombre Rol</label>
                                <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del Rol" maxlength="50" required oninput="validateInput(this, 50)">
                            </div>
                            <!-- Descripción -->
                            <div class="form-group">
                                <label class="control-label"><i class="fas fa-file-alt"></i> Descripción</label>
                                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción del Rol" maxlength="200" required oninput="validateInput(this, 200)"></textarea>
                            </div>
                            <!-- Estado -->
                            <div class="form-group">
                                <label for="listStatus" class="control-label"><i class="fas fa-check-circle"></i> Estado</label>
                                <select class="form-control" id="listStatus" name="listStatus" required>
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                            </div>
                            <!-- Modal Footer -->
                            <div class="tile-footer">
    <div style="margin-top: 20px; display: flex; gap: 15px;">
        <button class="shadow__btn" type="submit" id="btnAccion" onclick="document.getElementById('btnActionForm').click();">
            <i class="fa fa-fw fa-lg fa-check-circle"></i>
            <span id="btnText">Guardar</span>
        </button>
        <button class="shadow__btn--red" type="button" data-dismiss="modal" style="color:white">
            <i class="fa fa-fw fa-lg fa-times-circle"></i> Cancelar
        </button>
    </div>
</div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateInput(input, maxLength) {
        // Permitir solo letras, números y espacios
        let value = input.value;
        value = value.replace(/[^a-zA-Z0-9\s]/g, '');
        
        // Limitar la longitud
        if (value.length > maxLength) {
            value = value.slice(0, maxLength);
        }
        
        input.value = value;
    }

    function validateForm(event) {
        const nombre = document.getElementById('txtNombre').value;
        const descripcion = document.getElementById('txtDescripcion').value;

        if (nombre.length > 50 || descripcion.length > 200) {
            alert('Por favor, asegúrese de que el nombre no exceda 50 caracteres y la descripción no exceda 200 caracteres.');
            event.preventDefault(); // Prevenir el envío del formulario
            return false;
        }

        return true; // Permitir el envío del formulario
    }
</script>
