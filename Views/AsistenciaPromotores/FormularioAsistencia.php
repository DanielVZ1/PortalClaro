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
            max-width: 600px;
            width: 90%;
            position: relative;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.8);
            overflow-y: auto;
            max-height: 90vh;
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

        #capturedImage {
            object-fit: cover;
            width: 100%;
            height: 200px;
            border-radius: 8px;
            margin-top: 10px;
            border: 2px solid #ced4da;
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
            <form id="asistenciaForm" action="<?php echo base_url; ?>AsistenciaPromotores/guardarAsistencia" method="post">
                <div class="row mb-3">
                    <div class="col">
                        <label for="codigo" class="form-label">Código Maestro:</label>
                        <input class="form-control" id="codigo" name="CodigoMaestro" type="text" value="<?php echo isset($codigo) ? $codigo : ''; ?>" readonly required>
                    </div>
                    <div class="col">
                        <label for="dni" class="form-label">DNI:</label>
                        <input class="form-control" id="dni" name="dni" type="text" value="<?php echo isset($dni) ? $dni : ''; ?>" readonly required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nombres" class="form-label">Nombres:</label>
                        <input class="form-control" id="nombres" name="nombres" type="text" value="<?php echo isset($nombres) ? $nombres : ''; ?>" readonly required>
                    </div>
                    <div class="col">
                        <label for="apellidos" class="form-label">Apellidos:</label>
                        <input class="form-control" id="apellidos" name="apellidos" type="text" value="<?php echo isset($apellidos) ? $apellidos : ''; ?>" readonly required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="puesto" class="form-label">Puesto de Trabajo:</label>
                        <input class="form-control" id="puesto" name="puesto" type="text" value="<?php echo isset($puesto) ? $puesto : ''; ?>" readonly required>
                    </div>
                    <div class="col">
                        <label for="zona" class="form-label">Zona:</label>
                        <input class="form-control" id="zona" name="zona" type="text" value="<?php echo isset($zona) ? $zona : ''; ?>" readonly required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="proveedor" class="form-label">Proveedor:</label>
                        <input class="form-control" id="proveedor" name="proveedor" type="text" value="<?php echo isset($proveedor) ? $proveedor : ''; ?>" required>
                    </div>
                    <div class="col">
                        <label for="supervisor" class="form-label">Supervisor:</label>
                        <input class="form-control" id="supervisor" name="supervisor" type="text" value="<?php echo isset($supervisor) ? $supervisor : ''; ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="coordinador" class="form-label">Coordinador del Proyecto:</label>
                        <input class="form-control" id="coordinador" name="coordinador" type="text" value="<?php echo isset($coordinador) ? $coordinador : ''; ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="foto" class="form-label">Foto:</label>
                        <div style="display: flex; align-items: center;">
                            <div style="position: relative; width: 50%; padding-top: 50%; overflow: hidden; margin-right: 10px;">
                                <video id="video" class="form-control" autoplay style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;"></video>
                            </div>
                            <button type="button" id="btnCapture" class="btn btn-primary">Tomar Foto</button>
                        </div>
                        <canvas id="canvas" style="display:none;"></canvas>
                        <input type="hidden" name="foto" id="fotoInput">
                        <img id="capturedImage" style="display:none; width: 50%; height: auto; border-radius: 8px; margin-top: 10px;" />
                    </div>
                </div>
                <div class="row mb-3">
    <div class="col">
        <label for="fechaHora" class="form-label"><i class="fas fa-calendar"></i> Fecha y Hora de Entrada:</label>
        <input class="form-control" id="fechaHoraEntrada" name="fechaHora" type="datetime-local" value="<?php echo isset($horaEntrada) ? $horaEntrada : ''; ?>" readonly required>
    </div>
    <div class="col">
        <label for="horaSalida" class="form-label">Fecha y Hora de Salida:</label>
        <input class="form-control" id="horaSalida" name="horaSalida" type="datetime-local" 
            value="<?php echo isset($horaSalida) ? $horaSalida : ''; ?>" readonly>
    </div>
</div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="ubicacion" class="form-label">Ubicación:</label>
                        <input class="form-control" id="ubicacion" name="ubicacion" type="text" value="<?php echo isset($ubicacion) ? $ubicacion : ''; ?>" required>
                        <a id="ubicacionLink" href="#" target="_blank" class="mt-2 d-none">Ver en el Mapa</a>
                        <button type="button" class="btn btn-secondary mt-2" id="getLocation">Obtener Ubicación</button>
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

    <script src="<?php echo base_url; ?>Assets/js/Asistenciaformulario.js"></script>

    <script>
        document.getElementById('getLocation').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    const locationInput = document.getElementById('ubicacion');
                    locationInput.value = `Lat: ${latitude}, Lon: ${longitude}`;

                    const locationLink = document.getElementById('ubicacionLink');
                    locationLink.href = `https://www.google.com/maps?q=${latitude},${longitude}`;
                    locationLink.classList.remove('d-none');
                    locationLink.innerText = "Ver en el Mapa";
                }, function(error) {
                    console.error("Error obteniendo la ubicación:", error);
                    alert("No se pudo obtener la ubicación.");
                });
            } else {
                alert("La geolocalización no es soportada por este navegador.");
            }
        });
    </script>

</body>

</html>