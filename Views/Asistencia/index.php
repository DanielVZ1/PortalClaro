<?php
include "Views/Templates/header.php";
?>

<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-check-circle"></i> <?= $data['page_title'] ?>

        </div>
        <!--<ul  class="app-breadcrumb breadcrumb">
           <li  class="breadcrumb-item"><i  class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url; ?>Roles"><?= $data['page_title'] ?></a></li>
        </ul>-->
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
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

        /* From Uiverse.io by aaronross1 */
        .visualize-button {
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

        .visualize-svgIcon {
            width: 24px;
            transition-duration: 0.3s;
        }

        .visualize-svgIcon path {
            fill: white;
        }

        .visualize-button:hover {
            width: 90px;
            border-radius: 50px;
            transition-duration: 0.3s;
            background-color: rgb(169, 169, 169);
            align-items: center;
        }

        .visualize-button:hover .visualize-svgIcon {
            width: 24px;
            transition-duration: 0.3s;
            transform: translateY(60%);
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }

        .visualize-button::before {
            display: none;
            content: "Ver";
            color: white;
            transition-duration: 0.3s;
            font-size: 2px;
        }

        .visualize-button:hover::before {
            display: block;
            padding-right: 10px;
            font-size: 13px;
            opacity: 1;
            transform: translateY(0px);
            transition-duration: 0.3s;
        }


        .shadow__btn--red {
            padding: 5px 10px;
            border: none;
            font-size: 12px;
            color: #fff;
            border-radius: 7px;
            letter-spacing: 1px;
            font-weight: 700;
            text-transform: uppercase;
            transition: 0.5s;
            transition-property: box-shadow;
        }

        .shadow__btn--red {
            background: rgb(255, 0, 0);
            /* Rojo */
            box-shadow: 0 0 25px rgb(255, 0, 0);
            /* Rojo */
        }

        .shadow__btn--red:hover {
            box-shadow: 0 0 5px rgb(255, 0, 0),
                /* Rojo */
                0 0 25px rgb(255, 0, 0),
                /* Rojo */
                0 0 50px rgb(255, 0, 0),
                /* Rojo */
                0 0 100px rgb(255, 0, 0);
            /* Rojo */
        }
    </style>

    <div class="row mb-4">
        <div class="col-md-6">
            <select id="filtroAsistencias" class="form-control">
                <option value="todos">Todos</option>
                <option value="hoy">Hoy</option>
                <option value="ayer">Ayer</option>
                <option value="semana">Esta Semana</option>
                <option value="mes">Este Mes</option>
                <option value="hace_semanas">Hace una Semana</option>
                <option value="hace_meses">Hace un Mes</option>
            </select>
        </div>
        <div class="col-md-6">
            <input type="date" id="fechaExacta" class="form-control" />
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#filtroAsistencias').change(function() {
                const filtro = $(this).val();
                filtrarAsistencias(filtro, null);
            });

            $('#fechaExacta').change(function() {
                const fecha = $(this).val();
                filtrarAsistencias(null, fecha);
            });

            function filtrarAsistencias(filtro, fecha) {
                let url = base_url + "Asistencia/listar";

                if (filtro) {
                    url += "?filtro=" + filtro;
                } else if (fecha) {
                    url += "?fecha=" + fecha;
                }

                tblAsistencia.ajax.url(url).load();
            }
        });
    </script>

    <!-- Formulario de Búsqueda -->


    <table class="table table-light" id="tblAsistencia">
        <thead class="thead-dark">
            <tr>
                <th><i class="fas fa-id-badge"></i> Id</th>
                <th><i class="fas fa-code-branch"></i> Código Maestro</th>
                <th><i class="fas fa-id-card"></i> DNI</th>
                <th><i class="fas fa-user"></i> Nombres</th>
                <th><i class="fas fa-user"></i> Apellidos</th>
                <th><i class="fas fa-briefcase"></i> Puesto de trabajo</th>
                <th><i class="fas fa-map"></i> Zona</th>
                <th><i class="fas fa-truck"></i> Proveedor</th>
                <th><i class="fas fa-user-tie"></i> Supervisor</th>
                <th><i class="fas fa-user-friends"></i> Coordinador de proyecto</th>
                <th><i class="fas fa-clock"></i> Hora Entrada</th>
                <th><i class="fas fa-clock"></i> Hora Salida</th>
                <th><i class="fas fa-image"></i> Foto</th>
                <th><i class="fas fa-map-marker-alt"></i> Ubicación</th>
                <th><i class="fas fa-check-circle"></i> Estado</th>
                <th><i class="fas fa-cogs"></i> Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>


    <div id="nuevo_promotor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="title">Ficha Asistencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <input type="hidden" id="id" name="id">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color: black;"><i class="fas fa-camera"></i> Foto</label>
                                <div class="card border-primary">
                                    <div class="card-body">
                                        <input type="hidden" id="foto_actual" name="foto_actual" readonly>
                                        <img class="img-thumbnail" id="img-preview" src="" alt="Vista previa de la foto">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="codigo" style="color: black;"><i class="fas fa-id-card"></i> Código Maestro</label>
                                    <input id="codigo" class="form-control" type="text" name="codigo" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" oncopy="return false" onpaste="return false" readonly>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dni" style="color: black;"><i class="fas fa-id-card-alt"></i> DNI</label>
                                    <input id="dni" class="form-control" type="text" name="dni" oninput="formatDNI(this)" onkeypress="return isNumber(event)" oncopy="return false" onpaste="return false" readonly>
                                </div>
                                <span id="errorDNI" class='text-danger'></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nombre" style="color: black;"><i class="fas fa-user"></i> Nombres</label>
                                    <input id="nombre" class="form-control" type="text" name="nombre" oninput="formatInput(this)" onkeyup="formatInput(this)" readonly>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="apellido" style="color: black;"><i class="fas fa-user"></i> Apellidos</label>
                                    <input id="apellido" class="form-control" type="text" name="apellido" oninput="formatInput(this)" onkeyup="formatInput(this)" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="puesto" style="color: black;"><i class="fas fa-briefcase"></i> Puesto</label>
                                    <input id="puesto" class="form-control" type="text" name="puesto" readonly>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="zona" style="color: black;"><i class="fas fa-map"></i> Zona</label>
                                    <input id="zona" class="form-control" type="text" name="zona" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="proveedor" style="color: black;"><i class="fas fa-store"></i> Proveedor</label>
                                    <input id="proveedor" class="form-control" type="text" name="proveedor" readonly>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="supervisor" style="color: black;"><i class="fas fa-user-tie"></i> Supervisor</label>
                                    <input id="supervisor" class="form-control" type="text" name="supervisor" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="coordinador" style="color: black;"><i class="fas fa-users"></i> Coordinador</label>
                                    <input id="coordinador" class="form-control" type="text" name="coordinador" readonly>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="hora_entrada" style="color: black;"><i class="fas fa-clock"></i> Hora de Entrada</label>
                                    <input id="hora_entrada" class="form-control" type="datetime-local" name="hora_entrada" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="hora_salida" style="color: black;"><i class="fas fa-clock"></i> Hora de Salida</label>
                                    <input id="hora_salida" class="form-control" type="datetime-local" name="hora_salida" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ubicacion" style="color: black;"><i class="fas fa-map-marker-alt"></i> Ubicación</label>
                                    <input id="ubicacion" class="form-control" type="text" name="ubicacion" placeholder="Ingrese la ubicación" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <a id="map-link" href="#" target="_blank" style="color: blue;"><i class="fas fa-map"></i> Ver en el mapa</a>
                            </div>
                        </div>
                        <div style="margin-top: 20px;">
                            <button class="shadow__btn--red" type="button" data-dismiss="modal" style="color:white">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <?php
    include "Views/Templates/footer.php";
    ?>