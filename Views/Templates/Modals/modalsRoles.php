<!-- Modal -->
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-hidden="true">
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
              <!-- Usuario -->
              <div class="form-group">
                <label class="control-label">Usuario</label>
                <input class="form-control" id="txtnombre" name="txtnombre" type="text" placeholder="Nombre del Rol" required="">
              </div>
              <!-- Descripcion -->
              <div class="form-group">
                <label class="control-label">Descripcion</label>
                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" row="2" placeholder="Descripcion del Rol" required=""></textarea>
              </div>
              <!-- Estado -->
              <div class="form-group">
              <label for="txtnombre" class="control-label" style="color:black">Estado</label>
                <select class="form-control" id="liststatus" name="liststatus" required="">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success"  type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a
                class="btn btn-danger" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
