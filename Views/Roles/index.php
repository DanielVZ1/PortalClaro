<?php include "Views/Templates/header.php"; ?>

<ol class="breadcrumb mb-4 bg-primary">
    <li class="breadcrumb-item active text-white">
        <h4 style="color:red">ROLES</h4>
    </li>
</ol>

<div class="card">
    <div class="card-body">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-roles" type="button" role="tab" aria-controls="nav-roles" aria-selected="true">Roles</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-nuevo" type="button" role="tab" aria-controls="nav-nuevo" aria-selected="false">Nuevo</button>
                <button class="nav-link" style="display: none;" id="nav-permisos-tab" data-bs-toggle="tab" data-bs-target="#nav-permisos" type="button" role="tab" aria-controls="nav-permisos" aria-selected="false">Permisos</button>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active mt-2" id="nav-roles" role="tabpanel" aria-labelledby="nav-roles-tab" tabindex="0">
            <h5 class="card-title text-center" style="color: red;"><i class="fas fa-list"></i> Listado de Roles</h5>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover nowrap" id="tblRoles" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Estado</th>
                                <th>Nombre Rol</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="tab-pane fade" id="nav-nuevo" role="tabpanel" aria-labelledby="nav-profile-tab">
                <form class="p-4" id="formulario" autocomplete="off">
                    <input type="hidden" id="id" name="id">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mb-2">
                            <label>Rol</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-list"></i></span>
                                <input type="text" id="roles" maxlength="25" onkeyup="javascript:this.value=this.value.toUpperCase();" oninput="this.value = this.value.replace(/\s{2,}/g, ' ').replace(/[^a-zA-ZñÑ\s]/g, '');" name="roles" class="form-control" placeholder="Nobre del Rol">
                            </div>
                            <span id="errorRoles" class="text-danger"></span>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-2">
                            <label>Descripción</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                <input type="text" id="numeros" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" oninput="this.value = this.value.replace(/\s{2,}/g, ' ').replace(/[^a-zA-ZñÑ\s]/g, '');" name="numeros" class="form-control" placeholder="Descripcion">
                            </div>
                            <span id="errorNumeros" class="text-danger"></span>
                        </div>


                    </div>
                    <div class="text-end">
                        <button class="btn btn-danger" type="button" id="btnNuevo">Cancelar</button>
                        <button class="btn btn-primary" type="submit" id="btnAccion">Registrar</button>
                    </div>
                </form>
            </div>

            

            
        </div>  
    </div>
</div>

<?php include_once 'views/templates/footer.php'; ?>