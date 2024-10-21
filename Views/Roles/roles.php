<?php 
include 'views/templates/header.php';
getModal('modalsRoles', $data)

 ?>
<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-tag"></i> <?= $data['page_title'] ?> <button class="btn btn-primary" type="button" onclick="openModal();">
            <i class="fas fa-plus"></i></button></h1>
            
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
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>DESCRIPCIÓN</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
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
