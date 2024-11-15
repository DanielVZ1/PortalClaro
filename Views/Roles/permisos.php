<?php include "Views/Templates/header.php"; ?>
<div class="col-md-9 mx-auto">
    <div class="card">
        <!-- Banda superior de color rojo -->
        <div class="card-header text-center bg-danger text-white">
            <!-- Título en color negro -->
            <span style="color: white;">Asignar Permisos</span>
        </div>
        <div class="card-body">
            <form id="formulario" onsubmit="registrarPermisos(event)">
                <div class="row">
                    <?php foreach ($data['datos'] as $row) { ?>
                        <div class="col-md-3 text-center text-capitalize p-2" style="color: black">
                            <!-- Cambié 'descripcion' por 'permiso' -->
                            <label for=""><?php echo $row['permiso']; ?> </label><br>
                            <input type="checkbox" name="permisos[]" value="<?php echo $row['id']; ?>" <?php echo isset($data['asignados'][$row['id']]) ? 'checked' : ''; ?>>
                        </div>
                    <?php } ?>
                    <input type="hidden" value="<?php echo $data['id_rol']; ?>" name="id_rol">
                </div>
                <button type="submit" class="btn btn-outline-primary">Asignar Permisos</button>
                <a class="btn btn-outline-danger" href="<?php echo base_url; ?>Roles">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<?php  include "Views/Templates/footer.php";?>