<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="<?php echo base_url; ?>assets/img/Claro03.png" type="image/png" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistema Gestor de Promotores</title>
    <link href="<?php echo base_url; ?>/Assets/css/styles.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>/Assets/css/estilosPrincipal.Css" rel="stylesheet">
    <link href="<?php echo base_url; ?>/Assets/css/estiloscheck.Css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        .menu-container {
            position: relative;
            display: inline-block;
        }

        .menu-content {
            display: none;
            opacity: 0;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .menu-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .menu-content a:hover {
            background-color: #f1f1f1;
        }

        .menu-container:hover .menu-content {
            display: block;
            opacity: 1;
            visibility: visible;
        }

        .menu-content.hidden {
            display: none;
            opacity: 0;
            visibility: hidden;
        }

        .circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 2px solid transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            position: relative;
        }

        .circle:hover {
            border-color: #D70B0B;
        }

        .circle img {
            width: 70%;
            height: auto;
            transition: transform 0.3s ease;
        }

        #layoutSidenav {
            display: flex;
            height: 100vh;
        }

        #layoutSidenav #layoutSidenav_nav {
            flex-basis: 150px;
            flex-shrink: 0;
            transition: transform 0.3s ease-in-out;
            z-index: 1038;
            transform: translateX(-225px);
        }

        #layoutSidenav #layoutSidenav_content {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            min-width: 0;
            flex-grow: 1;
            min-height: calc(100vh - 56px);
            margin-left: 0;
            background-color: gris !important;
        }

        #particles-js {
            position: fixed;
            /* Cambiado a fixed */
            top: 0;
            /* Asegura que cubra desde la parte superior */
            left: 0;
            /* Asegura que cubra desde la parte izquierda */
            width: 100vw;
            /* Asegura que cubra todo el ancho */
            height: 100vh;
            /* Asegura que cubra toda la altura */
            z-index: -1;
        }

        #checkbox {
            display: none;
        }

        .switch {
            position: relative;
            width: 70px;
            height: 70px;
            background-color: rgb(200, 50, 50);
            /* Color rojo */
            border-radius: 50%;
            z-index: 0;
            /* Asegúrate de que esté detrás */
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgb(126, 126, 126);
            box-shadow: 0px 0px 3px rgb(2, 2, 2) inset;
        }

        .switch svg {
            width: 1.2em;
        }

        .switch svg path {
            fill: rgb(255, 255, 255);
            /* Blanco para contraste */
        }

        /* Efecto al pasar el cursor */
        .switch:hover {
            box-shadow: 0px 0px 1px rgb(255, 100, 100) inset,
                0px 0px 2px rgb(255, 100, 100) inset,
                0px 0px 10px rgb(255, 100, 100) inset,
                0px 0px 40px rgb(255, 100, 100),
                0px 0px 100px rgb(255, 100, 100),
                0px 0px 5px rgb(255, 100, 100);
            border: 2px solid rgb(255, 255, 255);
            background-color: rgb(255, 70, 70);
            /* Color más claro al pasar el cursor */
        }

        #checkbox:checked+.switch {
            box-shadow: 0px 0px 1px rgb(255, 100, 100) inset,
                0px 0px 2px rgb(255, 100, 100) inset,
                0px 0px 10px rgb(255, 100, 100) inset,
                0px 0px 40px rgb(255, 100, 100),
                0px 0px 100px rgb(255, 100, 100),
                0px 0px 5px rgb(255, 100, 100);
            border: 2px solid rgb(255, 255, 255);
            background-color: rgb(255, 70, 70);
            /* Color más claro al estar activado */
        }

        #checkbox:checked+.switch svg {
            filter: drop-shadow(0px 0px 5px rgb(255, 100, 100));
        }

        #checkbox:checked+.switch svg path {
            fill: rgb(255, 255, 255);
        }

        /* From Uiverse.io by gagan-gv */
        .btn1 {
            width: 150px;
            height: 50px;
            border-radius: 5px;
            border: none;
            transition: all 0.5s ease-in-out;
            font-size: 20px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 600;
            display: flex;
            align-items: center;
            background: #ff3b30;
            /* Rojo */
            color: #f5f5f5;
            position: relative;
            overflow: hidden;
        }

        .btn1:hover {
            background: #c62828;
            /* Rojo más oscuro */
            box-shadow: 0 0 20px rgba(46, 46, 46, 0.3);
        }

        .btn1 .icon {
            position: absolute;
            height: 40px;
            width: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.5s;
        }

        .btn1 .text {
            transform: translateX(55px);
        }

        .btn1:hover .icon {
            width: 175px;
        }

        .btn1:hover .text {
            transition: all 0.5s;
            opacity: 0;
        }

        .btn1:focus {
            outline: none;
        }

        .btn1:active .icon {
            transform: scale(0.85);
        }

/* From Uiverse.io by gharsh11032000 */
.menu {
    font-size: 16px;
    line-height: 1.6;
    color: #000000;
    width: fit-content;
    display: flex;
    list-style: none;
    background-color: #ffffff; /* Fondo blanco para el menú */
    padding: 10px; /* Opcional: padding para el menú */
    border-radius: 16px; /* Opcional: bordes redondeados */
}

.menu a {
    text-decoration: none;
    color: inherit;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}

.menu .link {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    padding: 12px 36px;
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.48s cubic-bezier(0.23, 1, 0.32, 1);
}

.menu .link::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #7d7d7d; /* Color gris */
    z-index: -1;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.48s cubic-bezier(0.23, 1, 0.32, 1);
}

.menu .link svg {
    width: 14px;
    height: 14px;
    fill: #000000;
    transition: all 0.48s cubic-bezier(0.23, 1, 0.32, 1);
}

.menu .item {
    position: relative;
}

.menu .item .submenu {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: absolute;
    top: 100%;
    border-radius: 0 0 16px 16px;
    left: 0;
    width: 100%;
    overflow: hidden;
    border: 1px solid #cccccc;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-12px);
    transition: all 0.48s cubic-bezier(0.23, 1, 0.32, 1);
    z-index: 1;
    pointer-events: none;
    list-style: none;
    background-color: #ffffff; /* Fondo blanco para el submenú */
}

.menu .item:hover .submenu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    pointer-events: auto;
    border-top: transparent;
    border-color: #7d7d7d; /* Color gris */
}

.menu .item:hover .link {
    color: #ffffff;
    border-radius: 16px 16px 0 0;
}

.menu .item:hover .link::after {
    transform: scaleX(1);
    transform-origin: right;
}

.menu .item:hover .link svg {
    fill: #ffffff;
    transform: rotate(-180deg);
}

.submenu .submenu-item {
    width: 100%;
    transition: all 0.48s cubic-bezier(0.23, 1, 0.32, 1);
}

.submenu .submenu-link {
    display: block;
    padding: 12px 24px;
    width: 100%;
    position: relative;
    text-align: center;
    transition: all 0.48s cubic-bezier(0.23, 1, 0.32, 1);
}

.submenu .submenu-item:last-child .submenu-link {
    border-bottom: none;
}

.submenu .submenu-link::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    transform: scaleX(0);
    width: 100%;
    height: 100%;
    background-color: #7d7d7d; /* Color gris */
    z-index: -1;
    transform-origin: left;
    transition: transform 0.48s cubic-bezier(0.23, 1, 0.32, 1);
}

.submenu .submenu-link:hover:before {
    transform: scaleX(1);
    transform-origin: right;
}

.submenu .submenu-link:hover {
    color: #ffffff;
}


    </style>
</head>

<body class="sb-nav-fixed">
    <!-- Contenedor de partículas -->
    <div id="particles-js"></div>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="background-color: white !important; height: 123px;">
        <button class="btn1" id="btn1" data-state="collapsed">
            <span class="icon">
                <i class="fas fa-cog" style="font-size: 20px; color: #f0f0f0;"></i>
            </span>
            <span class="text">Menu</span>
        </button>

        <h1 style="color: red; width: 750px; height: 50px; margin: auto; padding: 2px; text-align: center; display: flex; justify-content: center; align-items: center;">
            SISTEMA GESTOR DE PROMOTORES
        </h1>

        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" height="200">
            <div class="menu-container" style="margin: auto; padding: 30px;">
                <a href="<?php echo base_url; ?>Principal" style="display: inline-block; cursor: pointer; margin-left: 60px;">
                    <img src="Assets/img/Claro03.png" alt="Logo" style="width: 90px; border-radius: 50%;">
                </a>
            </div>
        </ul>
    </nav>


    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: white !important;">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"></div>
                        <hr>
                        <a href="<?php echo base_url; ?>Usuarios" class="nav-link active" aria-current="page" style="margin: auto; padding: 10px; position: relative; top: 5px;">
                            <div class="circle">
                                <img src="Assets/img/Usuario.png" alt="Logo">
                            </div>
                        </a>
                        <div class="menu">
                            <div class="item">
                                <a href="#" class="link">
                                    <div class="circle">
                                        <img src="Assets/img/ClaroConfig2.png" alt="Logo" style="width: 60px">
                                    </div>
                                    <!-- Se eliminó el span con el texto "Our Services" -->
                                    <svg viewBox="0 0 360 360" xml:space="preserve">
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                id="XMLID_225_"
                                                d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"></path>
                                        </g>
                                    </svg>
                                </a>
                                <div class="submenu">
                                    <div class="submenu-item">
                                        <a href="<?php echo base_url; ?>Roles" class="submenu-link">Roles</a>
                                    </div>
                                    <div class="submenu-item">
                                        <a href="<?php echo base_url; ?>Respaldar" class="submenu-link">Gestión de Respaldos</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="menu">
                            <div class="item">
                                <a href="#" class="link">
                                    <div class="circle">
                                        <img src="Assets/img/Comunidad.png" alt="Logo" style="width: 85px">
                                    </div>
                                    <!-- Se eliminó el span con el texto "Our Services" -->
                                    <svg viewBox="0 0 360 360" xml:space="preserve">
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                id="XMLID_225_"
                                                d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"></path>
                                        </g>
                                    </svg>
                                </a>
                                <div class="submenu">
                                    <div class="submenu-item">
                                        <a href="<?php echo base_url; ?>Promotores" class="submenu-link">Registro de Promotores</a>
                                    </div>
                                    <div class="submenu-item">
                                        <a href="<?php echo base_url; ?>Asistencia" class="submenu-link">Asistencia</a>
                                    </div>
                                    <div class="submenu-item">
                                        <a href="<?php echo base_url; ?>Ventas" class="submenu-link">Ventas</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="menu-container" style="margin: auto; position: relative; top: 20px;">
                            <input id="checkbox" type="checkbox" style="display: none;" onclick="window.location.href='<?php echo base_url; ?>Usuarios/salir';" />
                            <label class="switch" for="checkbox" style="cursor: pointer; padding: 10px; position: relative; top: 5px;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="slider">
                                    <path
                                        d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V256c0 17.7 14.3 32 32 32s32-14.3 32-32V32zM143.5 120.6c13.6-11.3 15.4-31.5 4.1-45.1s-31.5-15.4-45.1-4.1C49.7 115.4 16 181.8 16 256c0 132.5 107.5 240 240 240s240-107.5 240-240c0-74.2-33.8-140.6-86.6-184.6c-13.6-11.3-33.8-9.4-45.1 4.1s-9.4 33.8 4.1 45.1c38.9 32.3 63.5 81 63.5 135.4c0 97.2-78.8 176-176 176s-176-78.8-176-176c0-54.4 24.7-103.1 63.5-135.4z"></path>
                                </svg>

                            </label>
                        </div>

                        </ul>
                        <hr>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main style="flex-grow: 1; margin-left: -130px; margin-top: -30px;">
                <div class="container-fluid">
                    <!-- Contenido -->

                </div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Inicializar partículas
                        particlesJS("particles-js", {
                            particles: {
                                number: {
                                    value: 80,
                                    density: {
                                        enable: true,
                                        value_area: 800
                                    }
                                },
                                color: {
                                    value: "#ffffff"
                                },
                                shape: {
                                    type: "circle",
                                    stroke: {
                                        width: 0,
                                        color: "#000000"
                                    },
                                    polygon: {
                                        nb_sides: 5
                                    },
                                },
                                opacity: {
                                    value: 0.5,
                                    random: false,
                                    anim: {
                                        enable: false,
                                        speed: 1,
                                        opacity_min: 0.1,
                                        sync: false
                                    },
                                },
                                size: {
                                    value: 5,
                                    random: true,
                                    anim: {
                                        enable: false,
                                        speed: 40,
                                        size_min: 0.1,
                                        sync: false
                                    },
                                },
                                line_linked: {
                                    enable: true,
                                    distance: 150,
                                    color: "#ffffff",
                                    opacity: 0.4,
                                    width: 1,
                                },
                                move: {
                                    enable: true,
                                    speed: 6,
                                    direction: "none",
                                    random: false,
                                    straight: false,
                                    out_mode: "out",
                                    bounce: false,
                                    attract: {
                                        enable: false,
                                        rotateX: 600,
                                        rotateY: 1200
                                    },
                                },
                            },
                            interactivity: {
                                detect_on: "canvas",
                                events: {
                                    onhover: {
                                        enable: false,
                                        mode: "repulse"
                                    },
                                    onclick: {
                                        enable: false,
                                        mode: "push"
                                    },
                                    resize: true,
                                },
                                modes: {
                                    grab: {
                                        distance: 400,
                                        line_linked: {
                                            opacity: 1
                                        }
                                    },
                                    bubble: {
                                        distance: 400,
                                        size: 40,
                                        duration: 2,
                                        opacity: 8,
                                        speed: 3
                                    },
                                    repulse: {
                                        distance: 200,
                                        duration: 0.4
                                    },
                                    push: {
                                        particles_nb: 4
                                    },
                                    remove: {
                                        particles_nb: 2
                                    },
                                },
                            },
                            retina_detect: true,
                        });
                    });

                    // Código para el botón de colapsar/expandir el menú
                    const btn1 = document.getElementById('btn1');
                    const sidenav = document.getElementById('layoutSidenav_nav');

                    btn1.addEventListener('click', () => {
                        if (sidenav.style.transform === 'translateX(0px)') {
                            sidenav.style.transform = 'translateX(-225px)'; // Plegar
                            btn1.setAttribute('data-state', 'collapsed');
                            btn1.classList.remove('expanded');
                            btn1.classList.add('collapsed');
                        } else {
                            sidenav.style.transform = 'translateX(0px)'; // Desplegar
                            btn1.setAttribute('data-state', 'expanded');
                            btn1.classList.remove('collapsed');
                            btn1.classList.add('expanded');
                        }
                    });
                </script>
</body>

</html>