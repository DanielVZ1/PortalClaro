<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php echo base_url; ?>assets/img/Claro03.png" type="image/png" />
    <!-- loader-->
    <link href="<?php echo base_url; ?>assets/css/pace.min.css" rel="stylesheet" />
    <script src="<?php echo base_url; ?>assets/js/pace.min.js"></script>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="<?php echo base_url; ?>assets/css/app.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>assets/css/icons.css" rel="stylesheet">
    <title>Nueva Contraseña</title>
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <div class="authentication-reset-password d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-lg-5 border-end">
                                <div class="card-body">
                                    <div class="p-4">
                                        <div class="text-start">
                                            <img src="<?php echo base_url; ?>assets/img/Claro05.png" width="200" alt="">
                                        </div>
                                        <input type="hidden" id="token" value="<?php echo $data['seguridad']['RESETEO_CLANZ']; ?>">
                                        <h4 class="mt-3 font-weight-bold">Generar Nueva Contraseña</h4>
                                        <p class="text-muted">Recibimos su solicitud de restablecimiento de contraseña. ¡Por favor ingresa tu nueva contraseña!</p>
                                        <div class="mb-3 mt-3">
                                            <label class="form-label">Nueva Contraseña <span class="text-danger fw-bold">*</span></label>
                                            <input type="password" onkeydown="return /^\S+$/i.test(event.key)" maxlength="80" class="form-control" id="nueva_Clave" placeholder="Ingresar nueva contraseña" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirmar Nueva Contraseña <span class="text-danger fw-bold">*</span></label>
                                            <input type="password" onkeydown="return /^\S+$/i.test(event.key)" maxlength="80" class="form-control" id="confirmar_Clave" placeholder="Confirmar contraseña" />
                                        </div>
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-primary flex-grow-1" id="btnAccion">Cambiar la contraseña</button>
                                            <a href="<?php echo base_url; ?>" class="btn btn-light flex-grow-1 text-center"><i class='bx bx-arrow-back mr-1'></i>Atrás para iniciar sesión</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <img src="<?php echo base_url; ?>assets/img/login-images/restablecer-ilustracion-concepto-contrasena.png" class="card-img login-img h-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
    <script>
        const base_url = '<?php echo base_url; ?>';
    </script>

    <script src="<?php echo base_url; ?>assets/js/sweetalert2.all.min.js"></script>

    <!-- Bootstrap 5 Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url . 'assets/js/Restablecer.js?'; ?><?php echo time(); ?>"></script>

</body>

</html>