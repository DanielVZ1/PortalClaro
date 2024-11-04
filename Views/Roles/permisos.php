<?php include_once 'views/templates/header.php'; ?>

<div class="card">
    <div class="card-body">

        <div>
            <div>
                <h5 class="card-title text-center"><i class="fas fa-list"></i> Listado de Permisos</h5>
                <hr>
                <form id="formulario" autocomplete="off">
                    <input type="hidden" id="id" name="id">
                    <div class="row mb-3">

                        <div class="col-md-12 mb-2">
                            <select class="form-select" onchange="seleccionarRol(value)" aria-label="Default select example">
                                <?php foreach ($data['roles'] as $rol) { ?>
                                    <option value='<?php echo $rol['id']; ?>'><?php echo $rol['ROL']; ?></option>
                                <?php } ?>
                            </select>
                            <span id="errorNombre" class="text-danger"></span>
                        </div>

                        <!--🌟🌟🌟🌟🌟🌟🌟🌟🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰
                        <div class="col-lg-4 col-sm-6 mb-2">
                            <label>Usuario</label>
                            <div class="input-group">
                                <label class="input-group-text" for="usuario"><i class="fas fa-id-card"></i></label>
                                <select class="form-select" id="usuario" name="usuario">
                                    <option value="" selected>Seleccionar</option>
                                        
                                </select>
                            </div>
                            <span id="errorRol" class='text-danger'></span>
                        </div>
                        🌟🌟🌟🌟🌟🌟🌟🌟🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰🔰-->
                        <label for="permisos"><i class="fas fa-key"></i> Permisos <span class="text-danger">*</span></label>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Modulo</th>
                                    <th>Leer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th>Escribir&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['permisos'] as $permiso) { ?>
                                    <tr>
                                        <label style="background-color:green">
                                            <td><label type="checkbox" class="listaCheck" name="permisos[]" value="<?php echo $permiso['nombre']; ?>"> <?php echo $permiso['nombre']; ?>
                                                    <input type="hidden" type="checkbox" checked="checked" class="listaCheck" name="permisos[]" value="<?php echo $permiso['nombre']; ?>"> </label> </td>
                                            <label>
                                                <td> <input type="checkbox" class="listaCheck" name="permisos[]" value="<?php echo $permiso['R']; ?>"> <?php if ($permiso['R'] == '1') /*{echo 'Permitido';}else{echo 'No Permitido';}*/ ?> </td>
                                            </label>
                                            <label>
                                                <td> <input type="checkbox" class="listaCheck" name="permisos[]" value="<?php echo $permiso['W']; ?>"> <?php if ($permiso['W'] == '1') /*{echo 'Permitido';}else{echo 'No Permitido';}*/ ?> </td>
                                            </label>
                                            <label>
                                                <td> <input type="checkbox" class="listaCheck" name="permisos[]" value="<?php echo $permiso['U']; ?>"> <?php if ($permiso['U'] == '1') /*{echo 'Permitido';}else{echo 'No Permitido';}*/ ?> </td>
                                            </label>
                                            <label>
                                                <td> <input type="checkbox" class="listaCheck" name="permisos[]" value="<?php echo $permiso['D']; ?>"> <?php if ($permiso['D'] == '1') /*{echo 'Permitido';}else{echo 'No Permitido';}*/ ?> </td>
                                            </label>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary" type="submit" id="btnAccion">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once 'views/templates/footer.php'; ?>x