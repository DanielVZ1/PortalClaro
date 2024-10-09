<?php 
    //print_r($_SESSION)
    include "Views/Templates/header.php";
?>
<ol class="breadcrumb mb-4 bg-primary">
    <li class="breadcrumb-item active text-white m">
        <h4 style="color:red">Asistencia</h4>
    </li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmAsistencia();"><i class="fas fa-plus"></i></button>
<table class="table table-light" id="tblAsistencia">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Código</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Puesto</th>
            <th>Zona</th>
            <th>Proveedor</th>
            <th>Supervisor</th>
            <th>Coordinador</th>
            <th>Hora Entrada</th>
            <th>Hora Salida</th>
            <th>Foto</th>
            <th>Ubicación</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['id']); ?></td>
                    <td><?php echo htmlspecialchars($item['codigo']); ?></td>
                    <td><?php echo htmlspecialchars($item['dni']); ?></td>
                    <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($item['apellido']); ?></td>
                    <td><?php echo htmlspecialchars($item['puesto']); ?></td>
                    <td><?php echo htmlspecialchars($item['zona']); ?></td>
                    <td><?php echo htmlspecialchars($item['proveedor']); ?></td>
                    <td><?php echo htmlspecialchars($item['supervisor']); ?></td>
                    <td><?php echo htmlspecialchars($item['coordinador']); ?></td>
                    <td><?php echo htmlspecialchars($item['hora_entrada']); ?></td>
                    <td><?php echo htmlspecialchars($item['hora_salida']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($item['foto']); ?>" alt="Foto" style="width:50px;height:50px;"/></td>
                    <td><?php echo htmlspecialchars($item['ubicacion']); ?></td>
                    <td><?php echo htmlspecialchars($item['estado']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="15">No hay datos disponibles.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


<div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="title">Nueva Asistencia</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUsuario">
                        <div class="form-group">
                            <label for="usuario"style="color: black;">Codigo</label>
                            <input type="hidden" id="id" name="id">
                            <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Código Maestro">
                        </div>
                    
                        <div class="form-group">
                            <label for="nombre"style="color: black;">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                        </div>
                   
                <div class="row" id="claves">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="clave" style="color: black;">Contraseña</label>
                                <input id="clave" class="form-control" type="password" name="clave"
                                    placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="confirmar" style="color: black;">Confirmar Contraseña</label>
                                <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar Contraseña">
                            </div>
                        </div>
                </div>
               
                        <div class="form-group">
                            <label for="caja" style="color: black;">Caja</label>
                            <select id="caja" class="form-control" name="caja"> 
                                <?php foreach ($data['cajas'] as $row) { ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['caja']; ?></option>
                                <?php  }?>  
                            </select>
                        </div>
                        <button class = "btn btn-primary" type="button" onclick="registrarUser(event)" id="btnAccion">Registrar</button>
                        <button class = "btn bg-danger" type="button" data-dismiss="modal" style="color:white">Cancelar</button>
                    </form>
            </div>
        </div>
    </div>
</div>
<?php 
    //print_r($_SESSION)
    include "Views/Templates/footer.php";

?>