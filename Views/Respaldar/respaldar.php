<?php include_once 'views/templates/header.php'; ?>

<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-database"></i> <?= $data['page_title'] ?>
            
         </div>
        <!--<ul  class="app-breadcrumb breadcrumb">
           <li  class="breadcrumb-item"><i  class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url;?>Roles"><?= $data['page_title'] ?></a></li>
        </ul>-->
    </div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



<div>
    <div class="row">
        <!-- Sección de Respaldos -->
        <div class="col-md-6">
            <div class="mb-4">
                <h2 style="font-size: 24px;">Respaldos de Base de Datos</h2>
                <div class="mb-4">
                    <button class="btn btn-success" id="btnCrearRespaldo">Crear Nuevo Respaldo</button>
                </div>
                <ul class="list-group" id="respaldoList">
                    <?php
                    $archivos_sql = glob('Backups/*.sql');
                    foreach ($archivos_sql as $archivo_sql) {
                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">' . basename($archivo_sql) . ' <button class="btn btn-danger btnEliminar ml-auto" data-archivo="' . $archivo_sql . '" onclick="confirmarEliminarRespaldo(\'' . $archivo_sql . '\')">Eliminar</button></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

        <!-- Sección de Restauración de Base de Datos -->
        <div class="col-md-6">
            <div>
                <h2>Restauración de Base de Datos</h2>
                <form enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label for="archivoRespaldo" class="form-label">Selecciona el archivo de respaldo:</label>
                        <input class="form-control" type="file" id="archivoRespaldo" name="archivoRespaldo" accept=".sql" required>
                    </div>
                    <button type="submit" id="btnRestaurarBaseDatos" class="btn btn-primary">Restaurar Base de Datos</button>
                </form>
            </div>
        </div>

    </div>
    <script src="<?php echo base_url; ?>Assets/js/respaldar.js"></script>
</div>
<?php include_once 'views/templates/footer.php'; ?>
