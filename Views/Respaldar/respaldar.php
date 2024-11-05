<?php include_once 'views/templates/header.php'; ?>
<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-database"></i> <?= $data['page_title'] ?>

        </div>
        <!--<ul  class="app-breadcrumb breadcrumb">
           <li  class="breadcrumb-item"><i  class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url; ?>Roles"><?= $data['page_title'] ?></a></li>
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
                        <button class="button" id="btnCrearRespaldo">
                            <span class="button_lg">
                                <span class="button_sl"></span>
                                <span class="button_text" style="cursor: pointer;">
                                    <i class="fas fa-plus" style="margin-right: 5px;"></i>Crear Nuevo Respaldo
                                </span>
                            </span>
                        </button>
                    </div>
                    <ul class="list-group" id="respaldoList">
                        <?php
                        $archivos_sql = glob('Backups/*.sql');
                        foreach ($archivos_sql as $archivo_sql) {
                            echo '<li class="list-group-item d-flex justify-content-between align-items-center">' . basename($archivo_sql) . '
        <button class="delete-button" onclick="confirmarEliminarRespaldo(\'' . $archivo_sql . '\')">
            <svg class="delete-svgIcon" viewBox="0 0 448 512">
                <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
            </svg>
        </button>
        </li>';
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
                        <button type="submit" id="btnRestaurarBaseDatos" class="button1">
                            <span class="button1_lg">
                                <span class="button1_sl"></span>
                                <span class="button1_text" style="cursor: pointer;">
                                    Restaurar Base de Datos
                                </span>
                            </span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
        <script src="<?php echo base_url; ?>Assets/js/respaldar.js"></script>
    </div>
    <?php include "Views/Respaldar/estilorespaldar.php"; ?>
    <?php include_once 'views/templates/footer.php'; ?>