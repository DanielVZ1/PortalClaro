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

    <style>
        .button {
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            border: none;
            background: none;
            color: #0f1923;
            cursor: pointer;
            position: relative;
            padding: 8px;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
            transition: all .15s ease;
        }

        .button::before,
        .button::after {
            content: '';
            display: block;
            position: absolute;
            right: 0;
            left: 0;
            height: calc(50% - 5px);
            border: 1px solid #7D8082;
            transition: all .15s ease;
        }

        .button::before {
            top: 0;
            border-bottom-width: 0;
        }

        .button::after {
            bottom: 0;
            border-top-width: 0;
        }

        .button:active,
        .button:focus {
            outline: none;
        }

        .button:active::before,
        .button:active::after {
            right: 3px;
            left: 3px;
        }

        .button:active::before {
            top: 3px;
        }

        .button:active::after {
            bottom: 3px;
        }

        .button_lg {
            position: relative;
            display: block;
            padding: 10px 20px;
            color: #fff;
            background-color: #0f1923;
            overflow: hidden;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .button_lg::before {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 2px;
            height: 2px;
            background-color: #0f1923;
        }

        .button_lg::after {
            content: '';
            display: block;
            position: absolute;
            right: 0;
            bottom: 0;
            width: 4px;
            height: 4px;
            background-color: #0f1923;
            transition: all .2s ease;
        }

        .button_sl {
            display: block;
            position: absolute;
            top: 0;
            bottom: -1px;
            left: -8px;
            width: 0;
            background-color: #4CAF50;
            transform: skew(-15deg);
            transition: all .2s ease;
        }

        .button_text {
            position: relative;
        }

        .button:hover {
            color: #0f1923;
        }

        .button:hover .button_sl {
            width: calc(100% + 15px);
        }

        .button:hover .button_lg::after {
            background-color: #fff;
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

        .button1 {
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            border: none;
            background: none;
            color: #0f1923;
            cursor: pointer;
            position: relative;
            padding: 8px;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
            transition: all .15s ease;
        }

        .button1::before,
        .button1::after {
            content: '';
            display: block;
            position: absolute;
            right: 0;
            left: 0;
            height: calc(50% - 5px);
            border: 1px solid #7D8082;
            transition: all .15s ease;
        }

        .button1::before {
            top: 0;
            border-bottom-width: 0;
        }

        .button1::after {
            bottom: 0;
            border-top-width: 0;
        }

        .button1:active,
        .button1:focus {
            outline: none;
        }

        .button1:active::before,
        .button1:active::after {
            right: 3px;
            left: 3px;
        }

        .button1:active::before {
            top: 3px;
        }

        .button1:active::after {
            bottom: 3px;
        }

        .button1_lg {
            position: relative;
            display: block;
            padding: 10px 20px;
            color: #fff;
            background-color: #0f1923;
            overflow: hidden;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .button1_lg::before {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 2px;
            height: 2px;
            background-color: #0f1923;
        }

        .button1_lg::after {
            content: '';
            display: block;
            position: absolute;
            right: 0;
            bottom: 0;
            width: 4px;
            height: 4px;
            background-color: #0f1923;
            transition: all .2s ease;
        }

        .button1_sl {
            display: block;
            position: absolute;
            top: 0;
            bottom: -1px;
            left: -8px;
            width: 0;
            background-color: #007BFF;
            transform: skew(-15deg);
            transition: all .2s ease;
        }

        .button1_text {
            position: relative;
        }

        .button1:hover {
            color: #0f1923;
        }

        .button1:hover .button1_sl {
            width: calc(100% + 15px);
        }

        .button1:hover .button1_lg::after {
            background-color: #fff;
        }
    </style>

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
    <?php include_once 'views/templates/footer.php'; ?>