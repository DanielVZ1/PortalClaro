<?php 
include 'views/templates/header.php';
getModal('modalsRoles', $data)

 ?>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-tag"></i> <?= $data['page_title'] ?> </h1>
            <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus" style="margin-right: 5px;"></i>Nuevo</button>
            
         </div>
        <!--<ul  class="app-breadcrumb breadcrumb">
           <li  class="breadcrumb-item"><i  class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url;?>Roles"><?= $data['page_title'] ?></a></li>
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
