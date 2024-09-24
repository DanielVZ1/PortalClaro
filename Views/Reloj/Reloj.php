<!DOCTYPE html>
<!-- Especifica que este documento sigue el estándar HTML5 -->
<html lang="es">
<!-- Define el idioma del contenido de la página como español -->
<head>
    <meta charset="UTF-8">
    <!-- Establece la codificación de caracteres para el documento a UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Asegura que la página sea responsiva y se vea bien en todos los dispositivos -->
    <title>Reloj Digital</title>
    <!-- Define el título de la página, que aparece en la pestaña del navegador -->
    <link rel="stylesheet" href="./Assets/css/estilosPrincipal.Css">
    <!-- Vincula el documento de estilos CSS externo, donde se definen los estilos visuales de la página -->
</head>
<body>
    <!-- Contenido principal de la página -->
    <div class="reloj" id="reloj"></div>
    <!-- Un elemento div que muestra el reloj digital. 
         Tiene una clase 'reloj' para aplicarle estilos específicos definidos en CSS,
         y un ID 'reloj' para poder ser referenciado por el código JavaScript. -->
    <script src="Views/Reloj/Reloj.js"></script>
    <!-- Vincula el documento JavaScript externo que contiene la lógica para actualizar la hora mostrada en el reloj digital -->
</body>
</html>