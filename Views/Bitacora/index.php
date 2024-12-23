<?php include_once 'views/templates/header.php'; ?>

<head>
    <div id="contentAjax"></div>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fas fa-user"></i> <?= $data['page_title'] ?></h1>
            </div>
            <!--<ul  class="app-breadcrumb breadcrumb">
           <li  class="breadcrumb-item"><i  class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url; ?>Roles"><?= $data['page_title'] ?></a></li>
        </ul>-->
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<table class="table-light" id="tblBitacora">
    <thead class="thead-dark">
        <tr>
                            <th>Fecha</th>
                            <th>Usuario</th>
                            <th>Objeto</th>
                            <th>Acción</th>
                            <th>Descripción</th>
                        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script src="<?php echo base_url; ?>Assets/js/bitacora.js"></script>
<?php include_once 'views/templates/footer.php'; ?>