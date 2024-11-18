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
            background-color: transparent;
            /* Fondo transparente para que el fondo animado sea visible */
            overflow: hidden;
            /* Evita el desplazamiento */
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
            /* Asegúrate de que el fondo esté detrás del contenido */
        }

        .form-container {
            color: #000;
            border-radius: 8px;
            padding: 20px;
            max-width: 400px;
            width: 100%;
            position: relative;
            /* Para asegurarse de que el contenido esté encima del fondo animado */
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.8);
            /* Fondo blanco semi-transparente para la forma */
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

        /* From Uiverse.io by mobinkakei */ 

/* Asegúrate de que el contenedor principal tenga un alto y ancho de 100% */
body {
    height: 100vh; /* Usa el 100% del alto de la ventana */
    margin: 0; /* Elimina el margen por defecto */
    padding: 0; /* Elimina el padding por defecto */
    display: flex; /* Usa Flexbox */
    justify-content: center; /* Centra horizontalmente */
    align-items: center; /* Centra verticalmente */
    position: relative; /* Para asegurar que los elementos en el body no se desborden */
    background-color: transparent; /* Deja el fondo transparente para mostrar el fondo animado */
}

/* Asegúrate de que el loader esté oculto inicialmente */
#wifi-loader {
    display: none; /* Lo ocultamos al inicio */
    position: absolute; /* Lo posicionamos sobre el body */
    justify-content: center; /* Centra los círculos dentro del loader */
    align-items: center; /* Centra los círculos dentro del loader */
    z-index: 9999; /* Lo coloca encima de otros elementos */
    flex-direction: column;
    padding: 80px; /* Aumentamos el padding para hacer el cuadro más grande */
    background: rgba(0, 0, 0, 0); /* Fondo oscuro con algo de transparencia */
    border-radius: 12px; /* Bordes redondeados */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Sombra más pronunciada */
    backdrop-filter: blur(10px); /* Efecto difuminado detrás del cuadro */
}

/* Añadir un fondo oscuro difuminado detrás del loader */
#wifi-loader::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.3); /* Fondo oscuro difuminado */
    z-index: -1; /* Lo coloca detrás del loader */
    border-radius: 12px; /* Bordes redondeados para coincidir con el cuadro */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* Sombra difusa detrás */
}

/* Estilos del loader */
#wifi-loader svg {
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
}

#wifi-loader svg circle {
    position: absolute;
    fill: none;
    stroke-width: 6px;
    stroke-linecap: round;
    stroke-linejoin: round;
    transform: rotate(-100deg);
    transform-origin: center;
}

#wifi-loader svg circle.back {
    stroke: var(--back-color, #c3c8de); /* Color de fondo */
}

#wifi-loader svg circle.front {
    stroke: var(--front-color, #ff0000); /* Color principal */
}

#wifi-loader svg.circle-outer {
    height: 86px;
    width: 86px;
}

#wifi-loader svg.circle-outer circle {
    stroke-dasharray: 62.75 188.25;
}

#wifi-loader svg.circle-outer circle.back {
    animation: circle-outer135 1.8s ease infinite 0.3s;
}

#wifi-loader svg.circle-outer circle.front {
    animation: circle-outer135 1.8s ease infinite 0.15s;
}

#wifi-loader svg.circle-middle {
    height: 60px;
    width: 60px;
}

#wifi-loader svg.circle-middle circle {
    stroke-dasharray: 42.5 127.5;
}

#wifi-loader svg.circle-middle circle.back {
    animation: circle-middle6123 1.8s ease infinite 0.25s;
}

#wifi-loader svg.circle-middle circle.front {
    animation: circle-middle6123 1.8s ease infinite 0.1s;
}

#wifi-loader svg.circle-inner {
    height: 34px;
    width: 34px;
}

#wifi-loader svg.circle-inner circle {
    stroke-dasharray: 22 66;
}

#wifi-loader svg.circle-inner circle.back {
    animation: circle-inner162 1.8s ease infinite 0.2s;
}

#wifi-loader svg.circle-inner circle.front {
    animation: circle-inner162 1.8s ease infinite 0.05s;
}

/* Texto que aparece debajo del loader */
#wifi-loader .text {
    position: absolute;
    bottom: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-transform: lowercase;
    font-weight: 500;
    font-size: 14px;
    letter-spacing: 0.2px;
}

#wifi-loader .text::before,
#wifi-loader .text::after {
    content: attr(data-text);
}

#wifi-loader .text::before {
    color: var(--text-color, #414856); /* Color del texto */
}

#wifi-loader .text::after {
    color: var(--front-color, #ff0000); /* Color del texto animado */
    animation: text-animation76 3.6s ease infinite;
    position: absolute;
    left: 0;
}

/* Animaciones para los círculos del loader */
@keyframes circle-outer135 {
    0% {
        stroke-dashoffset: 25;
    }
    25% {
        stroke-dashoffset: 0;
    }
    65% {
        stroke-dashoffset: 301;
    }
    80% {
        stroke-dashoffset: 276;
    }
    100% {
        stroke-dashoffset: 276;
    }
}

@keyframes circle-middle6123 {
    0% {
        stroke-dashoffset: 17;
    }
    25% {
        stroke-dashoffset: 0;
    }
    65% {
        stroke-dashoffset: 204;
    }
    80% {
        stroke-dashoffset: 187;
    }
    100% {
        stroke-dashoffset: 187;
    }
}

@keyframes circle-inner162 {
    0% {
        stroke-dashoffset: 9;
    }
    25% {
        stroke-dashoffset: 0;
    }
    65% {
        stroke-dashoffset: 106;
    }
    80% {
        stroke-dashoffset: 97;
    }
    100% {
        stroke-dashoffset: 97;
    }
}

@keyframes text-animation76 {
    0% {
        clip-path: inset(0 100% 0 0);
    }
    50% {
        clip-path: inset(0);
    }
    100% {
        clip-path: inset(0 0 0 100%);
    }
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


    <!-- Diseño de Carga (Loader) -->
<div id="wifi-loader" style="display:none;">
    <svg class="circle-outer" viewBox="0 0 86 86">
        <circle class="back" cx="43" cy="43" r="40"></circle>
        <circle class="front" cx="43" cy="43" r="40"></circle>
        <circle class="new" cx="43" cy="43" r="40"></circle>
    </svg>
    <svg class="circle-middle" viewBox="0 0 60 60">
        <circle class="back" cx="30" cy="30" r="27"></circle>
        <circle class="front" cx="30" cy="30" r="27"></circle>
    </svg>
    <svg class="circle-inner" viewBox="0 0 34 34">
        <circle class="back" cx="17" cy="17" r="14"></circle>
        <circle class="front" cx="17" cy="17" r="14"></circle>
    </svg>
    <div class="text" data-text="Cargando"></div>
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