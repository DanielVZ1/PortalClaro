

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
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"/>
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
        /* Para ocultar correctamente */
        .menu-content.hidden {
            display: none; /* No mostrar */
            opacity: 0; /* Invisible */
            visibility: hidden; /* No permitir clics */
        }
        
        /* Estilos para la circunferencia */
        .circle {
            width: 80px; /* Ajusta el tamaño según sea necesario */
            height: 80px; /* Ajusta el tamaño según sea necesario */
            border-radius: 50%;
            border: 2px solid transparent; /* Sin borde visible */
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer; /* Cambia el cursor */
            position: relative;
        }
        .circle:hover {
            border-color: #D70B0B; /* Cambia el color del borde al pasar el mouse */
        }
        .circle img {
            width: 70%; /* Ajusta el tamaño de la imagen */
            height: auto;
        }
    </style>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="background-color: white !important; height: 123px;">
    <a href="<?php echo base_url; ?>Principal" style="display: inline-block; cursor: pointer; margin-left: 60px;">
        <img src="Assets/img/Claro03.png" alt="Logo" style="width: 90px; border-radius: 50%;">
    </a>
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
    <div id="layoutSidenav_content" style="background-color: gris !important;">
        <main style="background-color: #D70B0B !important;">
            <div class="container-fluid mt-5">
                <!-- Contenido -->
