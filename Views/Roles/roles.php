<?php
include 'views/templates/header.php';
getModal('modalsRoles', $data)

?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

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
        background-color: #ff4655;
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
</style>

<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-tag"></i> <?= $data['page_title'] ?> </h1>
            <button class="button" onclick="openModal();">
                <span class="button_lg">
                    <span class="button_sl"></span>
                    <span class="button_text" style="cursor: pointer;">
                        <i class="fas fa-plus" style="margin-right: 5px;"></i> Nuevo Rol
                    </span>
                </span>
            </button>
        </div>
        <!--<ul  class="app-breadcrumb breadcrumb">
           <li  class="breadcrumb-item"><i  class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url; ?>Roles"><?= $data['page_title'] ?></a></li>
        </ul>-->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="table-responsive">
                    <table class="table table-light" id="tableRoles">
                        <thead class="thead-dark">
                            <tr>
                                <th><i class="fas fa-id-badge"></i> ID</th>
                                <th><i class="fas fa-user-tag"></i> NOMBRE</th>
                                <th><i class="fas fa-file-alt"></i> DESCRIPCIÓN</th>
                                <th><i class="fas fa-check-circle"></i> ESTADO</th>
                                <th><i class="fas fa-cogs"></i> ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Los datos serán cargados dinámicamente por DataTables -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>


<?php include 'views/templates/footer.php'; ?>