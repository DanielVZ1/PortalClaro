<?php include "Views/Templates/header.php"; ?>

<style>
    /* From Uiverse.io by varoonrao */
    .checkbox-con {
        margin: 20px auto;
        /* Centra el contenedor de checkbox y añade espacio */
        display: flex;
        align-items: center;
        /* Centra el contenido verticalmente */
        justify-content: center;
        /* Centra el contenido horizontalmente */
        color: white;
    }

    .checkbox-con input[type="checkbox"] {
        appearance: none;
        width: 80px;
        /* Tamaño del checkbox */
        height: 45px;
        /* Tamaño del checkbox */
        border: 3px solid #ff0000;
        /* Grosor del borde */
        border-radius: 30px;
        /* Bordes redondeados */
        background: #f1e1e1;
        position: relative;
        box-sizing: border-box;
    }

    .checkbox-con input[type="checkbox"]::before {
        content: "";
        width: 25px;
        /* Tamaño del círculo interno */
        height: 25px;
        /* Tamaño del círculo interno */
        background: rgba(234, 7, 7, 0.5);
        border: 3px solid #ea0707;
        /* Grosor del borde */
        border-radius: 50%;
        position: absolute;
        top: 50%;
        /* Centrado vertical */
        left: 5%;
        /* Alineación ajustada para que no se salga */
        transform: translateY(-50%);
        /* Centrado verticalmente */
        transition: all 0.3s ease-in-out;
    }

    .checkbox-con input[type="checkbox"]::after {
        content: url("data:image/svg+xml,%3Csvg xmlns='://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30' fill='none'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M6.55021 5.84315L17.1568 16.4498L16.4497 17.1569L5.84311 6.55026L6.55021 5.84315Z' fill='%23EA0707' fill-opacity='0.89'/%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M17.1567 6.55021L6.55012 17.1568L5.84302 16.4497L16.4496 5.84311L17.1567 6.55021Z' fill='%23EA0707' fill-opacity='0.89'/%3E%3C/svg%3E");
        position: absolute;
        top: 50%;
        /* Centrado vertical de la "fechita" */
        left: 20px;
        /* Ajuste horizontal de la "fechita" */
        transform: translate(-50%, -50%);
        /* Centrado total */
    }

    .checkbox-con input[type="checkbox"]:checked {
        border: 3px solid #02c202;
        background: #e2f1e1;
    }

    .checkbox-con input[type="checkbox"]:checked::before {
        background: rgba(2, 194, 2, 0.5);
        border: 3px solid #02c202;
        /* Borde verde */
        transform: translate(133%, -50%);
        /* Movimiento del círculo al estar seleccionado */
        transition: all 0.3s ease-in-out;
    }

    .checkbox-con input[type="checkbox"]:checked::after {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 20 20' fill='none'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M14.8185 0.114533C15.0314 0.290403 15.0614 0.605559 14.8855 0.818454L5.00187 12.5L0.113036 6.81663C-0.0618274 6.60291 -0.0303263 6.2879 0.183396 6.11304C0.397119 5.93817 0.71213 5.96967 0.886994 6.18339L5.00187 11L14.1145 0.181573C14.2904 -0.0313222 14.6056 -0.0613371 14.8185 0.114533Z' fill='%2302C202' fill-opacity='0.9'/%3E%3C/svg%3E");
        position: absolute;
        top: 70%;
        /* Centrado vertical de la "fechita" cuando esté checked */
        left: 25%;
        /* Ajuste horizontal de la "fechita" cuando esté checked */
        transform: translate(-50%, -50%);
        /* Centrado total de la "fechita" */
    }

    .checkbox-con label {
        margin-left: 10px;
        /* Espacio entre el checkbox y la etiqueta */
        cursor: pointer;
        user-select: none;
        font-size: 18px;
        /* Aumento del tamaño de la fuente */
    }
</style>
<div class="col-md-9 mx-auto">
    <div class="card">
        <!-- Banda superior de color rojo -->
        <div class="card-header text-center bg-danger text-white">
            <!-- Título en color negro -->
            <span style="color: white;">Asignar Permisos</span>
        </div>
        <div class="card-body">
            <form id="formulario" onsubmit="registrarPermisos(event)">
                <div class="row">
                    <?php foreach ($data['datos'] as $row) { ?>
                        <div class="col-md-2 text-center text-capital" style="color: black">
                            <!-- Cambié 'descripcion' por 'permiso' -->
                            <label for=""><?php echo $row['permiso']; ?> </label><br>
                            <div class="checkbox-con">
                                <input id="checkbox-<?php echo $row['id']; ?>" type="checkbox" name="permisos[]" value="<?php echo $row['id']; ?>" <?php echo isset($data['asignados'][$row['id']]) ? 'checked' : ''; ?>>
                                <label for="checkbox-<?php echo $row['id']; ?>"></label>
                            </div>
                        </div>
                    <?php } ?>
                    <input type="hidden" value="<?php echo $data['id_rol']; ?>" name="id_rol">
                </div>
                <button type="submit" class="btn btn-outline-primary">Asignar Permisos</button>
                <a class="btn btn-outline-danger" href="<?php echo base_url; ?>Roles">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<?php include "Views/Templates/footer.php"; ?>