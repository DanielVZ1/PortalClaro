<div class="modal fade modalPermisos" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header  bg-danger">
          <h5 class="modal-title h4"  style="color:white"><i class="fas fa-key"></i>  PERMISOS DE USUARIO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body" style="color:black">
            <?php
            
              //dep($data);

            ?>
            <div class="col-md-12">
              <div class="tile">
                <form action="" id="formPermisos" name="formPermisos">
                 <input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol']; ?>" require="">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Modulo</th>
                          <th>Leer</th>
                          <th>Escribir</th>
                          <th>Actualizar</th>
                          <th>Eliminar</th>
                        </tr>
                      </thead>
                     <tbody>
                      <?php
                      $no = 1;
                      $modulos = $data['modulos'];
                      for ($i = 0; $i < count($modulos); $i++) {
                          // Obtener los permisos
                          $permisos = $modulos[$i]['permisos'];

                          // Verificación de los permisos (r: Leer, w: Escribir, u: Actualizar, d: Eliminar)
                          $rCheck = isset($permisos['r']) && $permisos['r'] == 1 ? " checked " : "";
                          $wCheck = isset($permisos['w']) && $permisos['w'] == 1 ? " checked " : "";
                          $uCheck = isset($permisos['u']) && $permisos['u'] == 1 ? " checked " : "";
                          $dCheck = isset($permisos['d']) && $permisos['d'] == 1 ? " checked " : "";

                          $idmod = $modulos[$i]['idmodulo'];
                      ?>
                      <tr>
                          <td>
                            <?= $no; ?>
                            <input type="hidden" name="modulos[<?= $i; ?>][idmodulo]" value="<?= $idmod ?>" required>
                          </td>
                          <td>
                            <?= $modulos[$i]['titulo']; ?>
                          </td>
                          <td>
                            <div class="toggle-flip">
                              <label>
                                <input type="checkbox" name="modulos[<?= $i; ?>][r]" <?= $rCheck ?>>
                                <span class="flip-indicator" data-toggler-on="ON" data-toggler-off="OFF"></span>
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="toggle-flip">
                              <label>
                                <input type="checkbox" name="modulos[<?= $i; ?>][w]" <?= $wCheck ?>>
                                <span class="flip-indicator" data-toggler-on="ON" data-toggler-off="OFF"></span>
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="toggle-flip">
                              <label>
                                <input type="checkbox" name="modulos[<?= $i; ?>][u]" <?= $uCheck ?>>
                                <span class="flip-indicator" data-toggler-on="ON" data-toggler-off="OFF"></span>
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="toggle-flip">
                              <label>
                                <input type="checkbox" name="modulos[<?= $i; ?>][d]" <?= $dCheck ?>>
                                <span class="flip-indicator" data-toggler-on="ON" data-toggler-off="OFF"></span>
                              </label>
                            </div>
                          </td>
                      </tr>
                      <?php
                          $no++;
                      }      
                      ?>
                    </tbody>

                    </table>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle" aria-hidden="true"></i>Guardar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="app-menu_icon fas fa-sign-out-alt" aria-hidden="true"></i>
                    Salir</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>