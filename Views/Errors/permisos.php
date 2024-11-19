<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="<?php echo base_url; ?>assets/img/Claro03.png" type="image/png" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sin Accesos</title>
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/estilo.css">
    <style>
        /* Definir los colores principales basados en la paleta Claro */
        :root {
            --color-principal: #E60012; /* Rojo Claro Claro */
            --color-secundario: #F4F4F4; /* Gris Claro */
            --color-fondo: #FFFFFF; /* Fondo blanco */
            --color-texto: #333333; /* Texto principal en negro */
            --color-error: #FF4C4C; /* Color para el mensaje de error */
            --color-sombra: rgba(0, 0, 0, 0.1); /* Sombra suave */
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--color-secundario);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: var(--color-texto);
        }

        .content {
            text-align: center;
            background-color: var(--color-fondo);
            padding: 40px 60px;
            border-radius: 10px;
            box-shadow: 0 4px 12px var(--color-sombra);
            width: 80%;
            max-width: 600px;
        }

        .content a.pagina {
            font-size: 28px;
            font-weight: bold;
            color: var(--color-fondo);
            text-decoration: none;
            background-color: var(--color-principal);
            padding: 12px 20px;
            border-radius: 8px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .content a.pagina:hover {
            background-color: #C5000A; /* Rojo más oscuro */
        }

        hr {
            margin: 20px auto;
            width: 60%;
            border: 0;
            border-top: 2px solid #eaeaea;
        }

        .tags {
            display: block;
            font-size: 20px;
            font-weight: bold;
            margin-top: 30px;
            color: var(--color-error);
        }

        .content p {
            font-size: 16px;
            color: #777;
            margin-top: 20px;
        }

        .content img {
            width: 100%;
            max-width: 400px; /* Tamaño máximo de la imagen */
            height: auto;
            margin-bottom: 20px;
            object-fit: contain; /* Asegura que la imagen se ajuste sin perder proporción */
        }
    </style>
</head>

<body>

    <div class="content">
        <a href="<?php echo base_url; ?>Principal" class="pagina">SISTEMA DE GESTIÓN DE PROMOTORES</a>
        <hr>
        <span class="tags">No tienes permiso</span>
        <p>El administrador no te dio accesos, ponte en contacto con el administrador.</p>
    </div>

</body>

</html>
