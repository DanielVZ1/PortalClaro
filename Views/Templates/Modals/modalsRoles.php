<!-- Modal -->
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-center" id="exampleModalCenterTitle" style="color:white"><i class="fas fa-tag"></i> NUEVO ROL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <div class="tile">
          <div class="tile-body">
            <!-- Formulario -->
            <form id="formRol" name="formRol">
              <!-- Nombre del Rol -->
              <div class="form-group">
                <label class="control-label">Nombre Rol</label>
                <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del Rol" required>
              </div>
              <!-- Descripción -->
              <div class="form-group">
                <label class="control-label">Descripción</label>
                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción del Rol" required></textarea>
              </div>
              <!-- Estado -->
              <div class="form-group">
                <label for="listStatus" class="control-label">Estado</label>
                <select class="form-control" id="listStatus" name="listStatus" required>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option> <!-- Ajustado el valor de "Inactivo" a 0 en vez de 2 -->
                </select>
              </div>
              <!-- Modal Footer -->
              <div class="modal-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                <button class="btn bg-danger" type="button" data-dismiss="modal" style="color:white">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
