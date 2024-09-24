<?php include "Views/Templates/header.php"; ?>

<ol class="breadcrumb mb-4 bg-primary">
    <li class="breadcrumb-item active text-white">
        <h4 style="color:red">Perfil del Promotor</h4>
    </li>
</ol>

<div class="modal-body">
                <form id="frmPromotor" method="post">
                    <input type="hidden" id="id" name="id">
                    
                        <div class="form-group">
                                <input id="foto" class="form-control" type="text" name="foto" style="width: 300px; height: 300px;" placeholder="">
                            </div>
                        </div>

                    <div class="row" id="datos">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="codigo" style="color: with;">Código Maestro</label>
                                <input id="codigo" class="form-control" type="text" name="codigo" placeholder="">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="dni" style="color: with;">N° de Cedula</label>
                                <input id="dni" class="form-control" type="text" name="dni" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="row" id="datos">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nombre" style="color: with;">Nombres</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="">
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="apellido" style="color: with;">Apellidos</label>
                                <input id="apellido" class="form-control" type="text" name="apellido" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="row" id="numeros">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="telefono" style="color: with;">Teléfono</label>
                                <input id="telefono" class="form-control" type="text" name="dni" placeholder="">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="profesion" style="color: with;">Profesión</label>
                                <input id="profesion" class="form-control" type="text" name="profesion" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="row" id="lugar">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="direccion" style="color: with;">Dirección</label>
                                <input id="direccion" class="form-control" type="text" name="direccion" placeholder="">
                            </div>
                        </div>
                    
                        <div class="col-6">
                            <div class="form-group">
                                <label for="zona" style="color: with;">Zona</label>
                                <input id="zona" class="form-control" type="text" name="zona" placeholder="">
                            </div>
                        </div>
                    </div>   

                    <div class="row" id="departamento">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="departamento" style="color: with;">Departamento</label>
                                <input id="departamento" class="form-control" type="text" name="departamento" placeholder="">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="municipio" style="color: with;">Municipio</label>
                                <input id="municipio" class="form-control" type="text" name="municipio" placeholder="">
                            </div>   
                        </div>
                    </div>

                    <div class="row" id="gerencia_canal">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="gerencia" style="color: with;">Gerencia</label>
                                <input id="gerencia" class="form-control" type="text" name="gerencia" placeholder="">
                            </div>
                        </div>
                    
                        <div class="col-6">
                            <div class="form-group">
                                <label for="canal" style="color: with;">Canal</label>
                                <input id="canal" class="form-control" type="text" name="canal" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="row" id="proyecto_cargo">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="proyecto" style="color: with;">Proyecto</label>
                                <input id="proyecto" class="form-control" type="text" name="proyecto" placeholder="">
                            </div>
                        </div>
                    
                        <div class="col-6">
                            <div class="form-group">
                                <label for="cargo" style="color: with;">Cargo</label>
                                <input id="cargo" class="form-control" type="text" name="cargo" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="row" id="estadoCivil_genero">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="estado_civil" style="color: with;">Estado Civil</label>
                                <input id="estado_civil" class="form-control" type="text" name="estado_civil" placeholder="">
                            </div>
                        </div>
                   
                        <div class="col-6">
                            <div class="form-group">
                                <label for="genero" style="color: with;">Género</label>
                                <input id="genero" class="form-control" type="text" name="genero" placeholder="">
                            </div>
                        </div>
                    </div>
  
                    <div class="row" id="documentos">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="cv" style="color: with;">Curriculum Vitae</label>
                                <input id="cv" class="form-control" type="text" name="cv" placeholder="">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="antecedentes" style="color: with;">Antecedentes Penales</label>
                                <input id="antecedentes" class="form-control" type="text" name="antecedentes" placeholder="">
                            </div>
                        </div>
                    </div>
                    <button class = "btn btn-primary" type="button" onclick="descargarPromotor(event)" id="btnAccion">Descargar</button>
                    <button class = "btn bg-danger" type="button" data-dismiss="modal" style="color:white">Cancelar</button>
                    
                   </form>
            </div>
        </div>
    </div>
</div>

<?php include "Views/Templates/footer.php"; ?>