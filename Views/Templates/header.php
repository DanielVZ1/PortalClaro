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

        .circle1 {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 2px solid transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            position: relative;
            left: -12px;
            /* Desplaza el círculo hacia la izquierda */
        }


        .circle1:hover {
            border-color: #D70B0B;
        }

        .circle1 img {
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
            background-color: rgb(255, 0, 0);
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
            background-color: #ffffff;
            /* Fondo blanco para el menú */
            padding: 10px;
            /* Opcional: padding para el menú */
            border-radius: 16px;
            /* Opcional: bordes redondeados */
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
            gap: -10px;
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
            background-color: #7d7d7d;
            /* Color gris */
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
            width: 80%;
            overflow: hidden;
            border: 1px solid #cccccc;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-12px);
            transition: all 0.48s cubic-bezier(0.23, 1, 0.32, 1);
            z-index: 1;
            pointer-events: none;
            list-style: none;
            background-color: #ffffff;
            /* Fondo blanco para el submenú */
        }

        .menu .item:hover .submenu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            pointer-events: auto;
            border-top: transparent;
            border-color: #7d7d7d;
            /* Color gris */
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
            background-color: #7d7d7d;
            /* Color gris */
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

        /* From Uiverse.io by devkatyall */
        /* The design is inspired from Galahhad*/

        .popup {
    --burger-line-width: 1.5em; /* Aumento moderado del grosor de las líneas */
    --burger-line-height: 0.2em; /* Aumento moderado de la altura de las líneas */
    --burger-offset: 0.875em; /* Aumento moderado del espacio entre las líneas */
    --burger-bg: #ff0000;
    --burger-color: #333;
    --burger-line-border-radius: 0.2em; /* Aumento moderado del radio del borde */
    --burger-diameter: 4em; /* Aumento moderado del diámetro del botón */
    --burger-btn-border-radius: calc(var(--burger-diameter) / 2); /* Aumento moderado del radio del borde del botón */
    --burger-line-transition: 0.3s;
    --burger-transition: all 0.1s ease-in-out;
    --burger-hover-scale: 1.15; /* Aumento moderado del tamaño en hover */
    --burger-active-scale: 0.97; /* Aumento moderado del tamaño en estado activo */
    --burger-enable-outline-color: var(--burger-bg);
    --burger-enable-outline-width: 0.15em; /* Aumento moderado del grosor del borde de enfoque */
    --burger-enable-outline-offset: var(--burger-enable-outline-width);

    /* nav */
    --nav-padding-x: 0.375em; /* Aumento moderado del padding horizontal */
    --nav-padding-y: 0.75em; /* Aumento moderado del padding vertical */
    --nav-border-radius: 0.5em; /* Aumento moderado del radio del borde */
    --nav-border-color: #ccc;
    --nav-border-width: 0.1em; /* Aumento moderado del grosor del borde */
    --nav-shadow-color: rgba(0, 0, 0, 0.25); /* Aumento moderado de la opacidad de la sombra */
    --nav-shadow-width: 0 1.5px 8px; /* Aumento moderado de la extensión de la sombra */
    --nav-bg: #eee;
    --nav-font-family: "Poppins", sans-serif;
    --nav-default-scale: 0.9; /* Aumento moderado del tamaño por defecto */
    --nav-active-scale: 1.1; /* Aumento moderado del tamaño cuando está activo */
    --nav-position-left: 0;
    --nav-position-right: unset;

    /* title */
    --nav-title-size: 0.75em; /* Aumento moderado del tamaño del texto del título */
    --nav-title-color: #777;
    --nav-title-padding-x: 1.25rem; /* Aumento moderado del padding horizontal del título */
    --nav-title-padding-y: 0.375em; /* Aumento moderado del padding vertical del título */

    /* nav button */
    --nav-button-padding-x: 1.25rem; /* Aumento moderado del padding horizontal del botón */
    --nav-button-padding-y: 0.45em; /* Aumento moderado del padding vertical del botón */
    --nav-button-border-radius: 0.45em; /* Aumento moderado del radio del borde del botón */
    --nav-button-font-size: 18px; /* Aumento moderado del tamaño de la fuente del botón */
    --nav-button-hover-bg: #00bf63;
    --nav-button-hover-text-color: #fff;
    --nav-button-distance: 1em; /* Aumento moderado de la distancia entre los botones */

    /* underline */
    --underline-border-width: 0.1em; /* Aumento moderado del grosor de la línea subrayada */
    --underline-border-color: #ccc;
    --underline-margin-y: 0.375em; /* Aumento moderado del margen vertical */
}



        /* popup settings 👆 */

        .popup {
            display: inline-block;
            text-rendering: optimizeLegibility;
            position: relative;
        }

        .popup input {
            display: none;
        }

        .burger {
            display: flex;
            position: relative;
            align-items: center;
            justify-content: center;
            background: var(--burger-bg);
            width: var(--burger-diameter);
            height: var(--burger-diameter);
            border-radius: var(--burger-btn-border-radius);
            border: none;
            cursor: pointer;
            overflow: hidden;
            transition: var(--burger-transition);
            outline: var(--burger-enable-outline-width) solid transparent;
            outline-offset: 0;
        }

        .popup-window {
            transform: scale(var(--nav-default-scale));
            visibility: hidden;
            opacity: 0;
            position: absolute;
            padding: var(--nav-padding-y) var(--nav-padding-x);
            background: var(--nav-bg);
            font-family: var(--nav-font-family);
            color: var(--nav-text-color);
            border-radius: var(--nav-border-radius);
            box-shadow: var(--nav-shadow-width) var(--nav-shadow-color);
            border: var(--nav-border-width) solid var(--nav-border-color);
            top: calc(var(--burger-diameter) + var(--burger-enable-outline-width) + var(--burger-enable-outline-offset));
            left: var(--nav-position-left);
            right: var(--nav-position-right);
            transition: var(--burger-transition);
            margin-top: 10px;
        }

        .popup-window legend {
            padding: var(--nav-title-padding-y) var(--nav-title-padding-x);
            margin: 0;
            color: var(--nav-title-color);
            font-size: var(--nav-title-size);
            text-transform: uppercase;
        }

        .popup-window ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .popup-window ul button {
            outline: none;
            width: 100%;
            border: none;
            background: none;
            display: flex;
            align-items: center;
            color: var(--burger-color);
            font-size: var(--nav-button-font-size);
            padding: var(--nav-button-padding-y) var(--nav-button-padding-x);
            white-space: nowrap;
            border-radius: var(--nav-button-border-radius);
            cursor: pointer;
            column-gap: var(--nav-button-distance);
        }

        .popup-window ul li:nth-child(1) svg,
        .popup-window ul li:nth-child(2) svg {
            color: #00bf63;
        }

        .popup-window ul li:nth-child(4) svg,
        .popup-window ul li:nth-child(5) svg {
            color: rgb(153, 153, 153);
        }

        .popup-window ul li:nth-child(7) svg {
            color: red;
        }

        .popup-window hr {
            margin: var(--underline-margin-y) 0;
            border: none;
            border-bottom: var(--underline-border-width) solid var(--underline-border-color);
        }

        /* actions */

        .popup-window ul button:hover,
        .popup-window ul button:focus-visible,
        .popup-window ul button:hover svg,
        .popup-window ul button:focus-visible svg {
            color: var(--nav-button-hover-text-color);
            background: var(--nav-button-hover-bg);
        }

        .burger:hover {
            transform: scale(var(--burger-hover-scale));
        }

        .burger:active {
            transform: scale(var(--burger-active-scale));
        }

        .burger:focus:not(:hover) {
            outline-color: var(--burger-enable-outline-color);
            outline-offset: var(--burger-enable-outline-offset);
        }

        .popup input:checked+.burger span:nth-child(1) {
            top: 50%;
            transform: translateY(-50%) rotate(45deg);
        }

        .popup input:checked+.burger span:nth-child(2) {
            bottom: 50%;
            transform: translateY(50%) rotate(-45deg);
        }

        .popup input:checked+.burger span:nth-child(3) {
            transform: translateX(calc(var(--burger-diameter) * -1 - var(--burger-line-width)));
        }

        .popup input:checked~nav {
            transform: scale(var(--nav-active-scale));
            visibility: visible;
            opacity: 1;
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
                    <img src="Assets/img/Claro04.ico" alt="Logo" style="width: 90px; border-radius: 50%;">

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
                                <label class="popup">

                                    <div tabindex="0" class="burger">
                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="white"
                                            height="30"
                                            width="80"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 2c2.757 0 5 2.243 5 5.001 0 2.756-2.243 5-5 5s-5-2.244-5-5c0-2.758 2.243-5.001 5-5.001zm0-2c-3.866 0-7 3.134-7 7.001 0 3.865 3.134 7 7 7s7-3.135 7-7c0-3.867-3.134-7.001-7-7.001zm6.369 13.353c-.497.498-1.057.931-1.658 1.302 2.872 1.874 4.378 5.083 4.972 7.346h-19.387c.572-2.29 2.058-5.503 4.973-7.358-.603-.374-1.162-.811-1.658-1.312-4.258 3.072-5.611 8.506-5.611 10.669h24c0-2.142-1.44-7.557-5.631-10.647z"></path>
                                        </svg>
                                    </div>
                                </label>
                            </div>

                        </a>
                        <div class="menu">
                            <div class="item">
                                <a href="#" class="link">
                                    <div class="circle1">
                                        <label class="popup">
                                            <div tabindex="0" class="burger">
                                                <!-- SVG ajustado a tamaño mayor -->
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 30px; width: 30px;">
    <!-- Font Awesome Free 6.7.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
    <path fill="#ffffff" d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4l54.1 0 109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109 0-54.1c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7L352 176c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
</svg>

                                            </div>
                                        </label>
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
                                        <a href="<?php echo base_url; ?>Respaldar" class="submenu-link">Respaldos</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="menu">
                            <div class="item">
                                <a href="#" class="link">
                                    <div class="circle1">
                                        <label class="popup">
                                            <div tabindex="0" class="burger">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="height: 30px; width: 30px;">
    <!-- Font Awesome Free 6.7.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
    <path fill="#ffffff" d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z" />
</svg>

                                            </div>
                                        </label>
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
                                        <a href="<?php echo base_url; ?>Promotores" class="submenu-link">Promotores</a>
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
                <script src="Assets/js/inactividad.js"></script>
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