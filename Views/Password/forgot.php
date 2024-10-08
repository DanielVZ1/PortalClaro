<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url; ?>Assets/img/Claro01.png" type="image/png">
    <title>Olvidaste tu Contraseña</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/estilo.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/styles.css">

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

        .form-container {
            color: #000;
            border-radius: 8px;
            padding: 20px;
            max-width: 400px;
            width: 100%;
            position: relative; /* Para asegurarse de que el contenido esté encima del fondo animado */
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco semi-transparente para la forma */
        }

        .form-container h2 {
            color: #000;
        }

        .form-container .form-label {
            color: #000;
        }

        .form-container .form-control {
            background-color: #ffffff;
            border: 1px solid #ced4da;
            color: #000;
        }

        .form-container .btn-primary,
        .form-container .btn-light {
            background-color: #ffffff;
            border: 1px solid #ced4da;
            color: #000;
            font-size: 1.25rem;
            padding: 0.75rem 1.5rem;
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.2s ease;
            border-radius: 4px;
        }

        .form-container .btn-primary:hover,
        .form-container .btn-light:hover {
            background-color: #ff0000;
            border-color: #cc0000;
            color: #ffffff;
        }

        .form-container .btn-primary:active,
        .form-container .btn-light:active {
            transform: scale(0.95);
            background-color: #cc0000;
            border-color: #990000;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div id="particles-js"></div>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-container card p-4">
            <div class="text-center mb-4">
                <img src="<?php echo base_url; ?>Assets/img/Claro03.png" alt="Logo" style="width: 120px;">
            </div>
            <h2 class="text-center mb-4">Recuperar Contraseña</h2>
            <form id="frmRecuperar" action="#" method="post">
                <div class="form-group mb-3">
                    <label for="correo" class="form-label"><i class="fas fa-user"></i> Correo Electrónico</label>
                    <input class="form-control" id="correo" name="EmailRecuperar" type="email" placeholder="Ingresar Correo" autocomplete="off" required>
                </div>
                <div class="alert alert-danger text-center d-none" id="alerta" role="alert"></div>
                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-primary btn-lg" id="btnAccion">Enviar</button>
                    <a href="<?php echo base_url; ?>" class="btn btn-light btn-lg"><i class="bx bx-arrow-back me-1"></i> Regresar</a>
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
    <script src="<?php echo base_url; ?>Assets/js/Recuperar.js"></script>
</body>

</html>
