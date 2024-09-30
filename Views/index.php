<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url; ?>Assets/img/Claro01.png" type="image/png">
    <title>Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/estilo.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>Assets/css/material-design-iconic-font.min.css">
    <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />

    <!-- JS -->
    <script src="<?php echo base_url; ?>Assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/popper.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

    <!-- Define base_url globally -->
    <script>
        window.base_url = '<?php echo base_url; ?>';
    </script>

    <style>
        body {
            background-color: transparent; /* Fondo transparente para que el fondo animado sea visible */
            overflow: hidden; /* Evita el desplazamiento */
            margin: 0;
            padding: 0;
            position: relative;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1; /* Asegúrate de que el fondo esté detrás del contenido */
        }

        .sample-div {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .wrap-login {
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.8); /* Fondo blanco semi-transparente para la forma */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative; /* Para asegurarse de que el contenido esté encima del fondo animado */
            z-index: 1;
        }

        .wrap-login img {
            width: 120px;
        }

        .login-form-title {
            display: block;
            text-align: center;
            margin-bottom: 20px;
            color: #000;
        }

        .form-group label {
            color: #000;
        }

        .form-control {
            background-color: #ffffff;
            border: 1px solid #ced4da;
            color: #000;
        }

        .btn-primary,
        .btn-light {
            background-color: #ffffff;
            border: 1px solid #ced4da;
            color: #000;
            font-size: 1.25rem;
            padding: 0.75rem 1.5rem;
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.2s ease;
            border-radius: 4px;
        }

        .btn-primary:hover,
        .btn-light:hover {
            background-color: #ff0000;
            border-color: #cc0000;
            color: #ffffff;
        }

        .btn-primary:active,
        .btn-light:active {
            transform: scale(0.95);
            background-color: #cc0000;
            border-color: #990000;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div id="particles-js"></div>
    <div class="sample-div">
        <div class="wrap-login">
            <form id="frmLogin">
                <div style="margin: 01px; padding: 20px;">
                    <center><img src="<?php echo base_url; ?>Assets/img/Claro03.png" alt="Logo" style="width: 110px"></center>
                </div>
                <span class="login-form-title">DISTRIBUCIÓN GESTOR DE PROMOTORES</span>
                <div class="form-group">
                    <label class="small mb-1" for="usuario"><i class="fas fa-user"></i> Usuario</label>
                    <input class="form-control py-4" id="usuario" name="usuario" type="text" placeholder="Ingresar Usuario" />
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="clave"><i class="fas fa-key"></i> Contraseña</label>
                    <div class="input-group">
                        <input class="form-control py-4" id="clave" name="clave" type="password" placeholder="Ingrese Contraseña" />
                    </div>
                    </div>
                        <div class="col-md-12 text-end"> <a href="<?php echo base_url . 'Recuperar/forgot' ?>">Olvidaste tu contraseña?</a>
                    </div>
                        <div class="col-md-12 text-end"> <a href="<?php echo base_url . 'AsistenciaPromotores/asistenciapromotores' ?>">Asistencia Promotor</a>
                    </div>
                    <label class="small mb-1" for="clave"></label>
                    <div class="alert alert-danger text-center d-none" id="alerta" role="alert"></div>
                    <div class="container-login-form-btn">
                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                            <div class="wrap-login-form-btn">
                                <div class="login-form-bgbtn"></div>
                                <button class="login-form-btn" type="submit" onclick="frmLogin(event)">Iniciar Sesión</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Script JS adicional -->
    <script>
        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 700
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": false,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": false,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": false,
                        "mode": "push"
                    },
                    "resize": true
                }
            },
            "retina_detect": true
        });
    </script>
    <script src="<?php echo base_url; ?>Assets/js/login.js"></script>
</body>

</html>
