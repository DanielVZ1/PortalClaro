<?php include_once 'views/Templates/Modals/estiloroles.php'; ?>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

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