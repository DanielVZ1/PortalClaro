<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url; ?>Assets/img/Claro01.png" type="image/png">
    <title>Formulario de Asistencia</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/estilo.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/styles.css">

    <style>
        body {
            background-color: transparent;
            overflow: hidden;
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
            z-index: -1;
        }

        .form-container {
            color: #000;
            border-radius: 8px;
            padding: 20px;
            max-width: 600px; /* Ancho máximo */
            width: 90%; /* Ancho del formulario */
            position: relative;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.8);
            overflow-y: auto; /* Permite desplazamiento vertical */
            max-height: 90vh; /* Altura máxima */
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
            <h2 class="text-center mb-4">Formulario de Asistencia</h2>
            <form id="asistenciaForm" action="#" method="post">
                <div class="row mb-3">
                    <div class="col">
                        <label for="codigo" class="form-label">Código Maestro:</label>
                        <input class="form-control" id="codigo" name="CodigoMaestro" type="text" required>
                    </div>
                    <div class="col">
                        <label for="dni" class="form-label">DNI:</label>
                        <input class="form-control" id="dni" name="dni" type="text" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nombres" class="form-label">Nombres:</label>
                        <input class="form-control" id="nombres" name="nombres" type="text" required>
                    </div>
                    <div class="col">
                        <label for="apellidos" class="form-label">Apellidos:</label>
                        <input class="form-control" id="apellidos" name="apellidos" type="text" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="puesto" class="form-label">Puesto de Trabajo:</label>
                        <input class="form-control" id="puesto" name="puesto" type="text" required>
                    </div>
                    <div class="col">
                        <label for="proveedor" class="form-label">Proveedor:</label>
                        <input class="form-control" id="proveedor" name="proveedor" type="text" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="zona" class="form-label">Zona:</label>
                        <input class="form-control" id="zona" name="zona" type="text" required>
                    </div>
                    <div class="col">
                        <label for="supervisor" class="form-label">Supervisor:</label>
                        <input class="form-control" id="supervisor" name="supervisor" type="text" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="coordinador" class="form-label">Coordinador del Proyecto:</label>
                        <input class="form-control" id="coordinador" name="coordinador" type="text" required>
                    </div>
                    <div class="col">
                        <label for="foto" class="form-label">Foto:</label>
                        <input class="form-control" id="foto" name="foto" type="file" accept="image/*" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="horaEntrada" class="form-label">Hora de Entrada:</label>
                        <input class="form-control" id="horaEntrada" name="horaEntrada" type="time" required>
                    </div>
                    <div class="col">
                        <label for="horaSalida" class="form-label">Hora de Salida:</label>
                        <input class="form-control" id="horaSalida" name="horaSalida" type="time" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="ubicacion" class="form-label">Ubicación:</label>
                        <input class="form-control" id="ubicacion" name="ubicacion" type="text" required>
                    </div>
                    <div class="col">
                        <label for="estado" class="form-label">Estado:</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                    <a href="<?php echo base_url; ?>" class="btn btn-light btn-lg"><i class="bx bx-arrow-back me-1"></i> Regresar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- JS -->
    <script src="<?php echo base_url; ?>Assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
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
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
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
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    </script>
</body>

</html>
