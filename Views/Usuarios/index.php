<?php 
    //print_r($_SESSION)
    include "Views/Templates/header.php";
?>

<head>
<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-user"></i> <?= $data['page_title'] ?> <button class="btn btn-primary mb-2" type="button" onclick="frmUsuario();"><i class="fas fa-plus"></i></button>
            
         </div>
        <!--<ul  class="app-breadcrumb breadcrumb">
           <li  class="breadcrumb-item"><i  class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url;?>Roles"><?= $data['page_title'] ?></a></li>
        </ul>-->
    </div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<table class="table table-light" id="tblUsuarios">
    <thead class="thead-dark">
        <tr>
            <th><i class="fas fa-id-badge"></i> Id</th>
            <th><i class="fas fa-user-circle"></i> Usuario</th>
            <th><i class="fas fa-id-card"></i> Nombre</th>
            <th><i class="fas fa-envelope"></i> Email</th>
            <th><i class="fas fa-user-tag"></i> Rol</th>
            <th><i class="fas fa-check-circle"></i> Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>


<div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="title"><i class="fas fa-user"></i> Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUsuario">
                    <input type="hidden" id="id" name="id">
                    
                    <div class="form-group">
                        <label for="usuario" style="color: black;"><i class="fas fa-user-circle"></i> Usuario</label>
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                    </div>
                    
                    <div class="form-group">
                        <label for="nombre" style="color: black;"><i class="fas fa-id-badge"></i> Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                    </div>

                    <div class="form-group">
                        <label for="email" style="color: black;"><i class="fas fa-envelope"></i> Email</label>
                        <input id="email" class="form-control" type="text" name="email" placeholder="Email">
                    </div>

                    <div class="row" id="claves">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="clave" style="color: black;"><i class="fas fa-lock"></i> Contraseña</label>
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="confirmar" style="color: black;"><i class="fas fa-lock"></i> Confirmar Contraseña</label>
                                <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar Contraseña">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rol" style="color: black;"><i class="fas fa-user-tag"></i> Rol</label>
                        <select id="rol" class="form-control" name="rol"> 
                            <?php foreach ($data['roles'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombrerol']; ?></option>
                            <?php } ?>  
                        </select>
                    </div>

                    <button class="btn btn-primary mt-3" type="button" onclick="registrarUser(event)" id="btnAccion">Registrar</button>
                    <button class="btn bg-danger mt-3" type="button" data-dismiss="modal" style="color:white">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
    //print_r($_SESSION)
    include "Views/Templates/footer.php";
?>
