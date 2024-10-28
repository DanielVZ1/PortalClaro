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
    <link href="<?php echo base_url;?>/Assets/css/styles.css" rel="stylesheet" />
    <link href="<?php echo base_url;?>/Assets/css/estilosPrincipal.Css" rel="stylesheet">
    <link href="<?php echo base_url;?>/Assets/css/estiloscheck.Css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .menu-container {
            position: relative;
            display: inline-block;
        }
        .menu-content {
            display: none; /* Inicialmente oculto */
            opacity: 0; /* Invisible */
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
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
            opacity: 1; /* Visible */
            visibility: visible; /* Permitir clics */
        }
        .menu-content.hidden {
            display: none; /* No mostrar */
            opacity: 0; /* Invisible */
            visibility: hidden; /* No permitir clics */
        }

        /* Estilos para la circunferencia */
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
            transition: transform 0.3s ease; /* Para la animación de rotación */
        }

        /* Estilos para la barra lateral */
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

        #toggleButton {
            margin-left: 20px;
            margin-right: 20px;
            background-color: #D70B0B; 
            color: white; 
            border: none; 
            border-radius: 5px; 
            padding: 10px; 
            cursor: pointer; 
            transition: background-color 0.3s; 
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        #toggleButton:hover {
            background-color: #b50a0a; 
        }

        /* Rotación del engranaje */
        .gear {
            transition: transform 0.3s ease;
        }
        .collapsed .gear {
            transform: rotate(0deg);
        }
        .expanded .gear {
            transform: rotate(90deg);
        }

    </style>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="background-color: white !important; height: 123px;">
    <a href="<?php echo base_url; ?>Principal" style="display: inline-block; cursor: pointer; margin-left: 60px;">
        <img src="Assets/img/Claro03.png" alt="Logo" style="width: 90px; border-radius: 50%;">
    </a>

    <!-- Botón para plegar/desplegar -->
    <button id="toggleButton" data-state="collapsed">
        <i class="fas fa-cog gear"></i>
    </button>

    <h1 style="color: red; width: 750px; height: 50px; margin: auto; padding: 2px; text-align: center; display: flex; justify-content: center; align-items: center;">
        SISTEMA GESTOR DE PROMOTORES
    </h1>

    <!-- Navbar -->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" height="200">
        <div class="menu-container" style="margin: auto; padding: 30px;">
            <div class="circle">
                <img src="Assets/img/Salir.png" alt="Imagen del menú">
            </div>
            <div class="menu-content">
                <a href="<?php echo base_url; ?>Usuarios/salir">Cerrar Sesión</a>
            </div>
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
                    <a href="<?php echo base_url;?>Usuarios" class="nav-link active" aria-current="page" style="margin: auto; padding: 10px; position: relative; top: 5px;">
                        <div class="circle">
                            <img src="Assets/img/Usuario.png" alt="Logo">
                        </div>
                    </a>
                    <div class="menu-container" style="margin: auto; padding: 10px; position: relative; top: -10px;">
                        <div class="circle">
                            <img src="Assets/img/ClaroConfig2.png" alt="Logo">
                        </div>
                        <div class="menu-content">
                            <li><a href="<?php echo base_url;?>Roles">Roles</a></li>
                            <li><a href="<?php echo base_url;?>Permisos">Permisos</a></li>
                            <li><a href="<?php echo base_url;?>Respaldar">Restauración de BD</a></li>
                        </div>
                    </div>
                    <div class="menu-container" style="margin: auto; padding: 10px; position: relative; top: -10px;">
                        <div class="circle">
                            <img src="Assets/img/Comunidad.png" alt="Logo" style="width: 85px">
                        </div>
                        <div class="menu-content">
                            <li><a href="<?php echo base_url;?>Promotores">Registro de Promotores</a></li>
                            <li><a href="<?php echo base_url;?>Asistencia">Asistencia</a></li>
                            <li><a href="<?php echo base_url;?>Ventas">Ventas</a></li>
                        </div>
                    </div>
                    <a href="Views/email/index.html" class="nav-link active" aria-current="page" style="margin: auto; padding: 10px; position: relative; top: -20px;">
                        <div class="circle">
                            <img src="Assets/img/email.png" alt="Logo">
                        </div>
                    </a>
                    <hr>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
    <main style="background-color: #D70B0B !important; flex-grow: 1; margin-left: -130px; margin-top: -30px;">
        <div class="container-fluid">
            <!-- Contenido -->
      
</div>

<script>
    const toggleButton = document.getElementById('toggleButton');
    const sidenav = document.getElementById('layoutSidenav_nav');

    toggleButton.addEventListener('click', () => {
        if (sidenav.style.transform === 'translateX(0px)') {
            sidenav.style.transform = 'translateX(-225px)'; // Plegar
            toggleButton.setAttribute('data-state', 'collapsed');
            toggleButton.classList.remove('expanded');
            toggleButton.classList.add('collapsed');
        } else {
            sidenav.style.transform = 'translateX(0px)'; // Desplegar
            toggleButton.setAttribute('data-state', 'expanded');
            toggleButton.classList.remove('collapsed');
            toggleButton.classList.add('expanded');
        }
    });
</script>
</body>
</html>
