<?php 
include "Views/Templates/header.php"; 
$id = $_SESSION['usuario'];
?>

<input type="hidden" value="<?php echo $id; ?>" class="text" id="id_usuario">

<div id="layoutSidenav_content" style="background-color: #D70B0B;">
    <main class="animated-background">
        <div id="particles-js" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;"></div>
        <div style="text-align: center; padding-top: 50px; margin-left: -180px; position: relative; z-index: 1;"> <!-- Cuadro de contenido -->
            <form action="#" method="post">
                <style>
                    /* Fondo animado */
                    .animated-background {
                        background: linear-gradient(270deg, #D70B0B, #FF0000);
                        background-size: 400% 400%;
                        animation: gradient 10s ease infinite;
                        font-family: 'Roboto', sans-serif;
                        padding: 50px;
                        border-radius: 10px; /* Opcional: para bordes redondeados */
                    }

                    @keyframes gradient {
                        0% { background-position: 100% 50%; } /* Empieza desde la derecha */
                        50% { background-position: 0% 50%; }   /* Se mueve a la izquierda */
                        100% { background-position: 100% 50%; } /* Vuelve a la derecha */
                    }
                </style>

                <label class="red-background" style="color: white; font-size: 2rem;">
                    BIENVENIDO: <?php echo htmlspecialchars($_SESSION['usuario']); ?>
                </label>

                <div id="current_date" class="red-background" style="color: aliceblue; font-size: 1.5rem; margin-top: 20px;">
                    <script>
                        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                        document.getElementById("current_date").innerHTML = new Date().toLocaleDateString('es-ES', options);
                    </script>
                </div>

                <div class="reloj red-background" id="reloj" style="color: aliceblue; font-size: 1.5rem; margin-top: 20px;"></div>
                <script src="Views/Reloj/Reloj.js"></script>

                <div class="d-flex flex-column flex-shrink-0 p-3" style="float: right;">
                    <svg class="bi pe-none me-2" width="40" height="32"></svg>
                </div>
            </form>
        </div>
    </main>
</div>

<?php 
include "Views/Templates/footer.php"; 
?>

<!-- Particles.js -->
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
    particlesJS("particles-js", {
        "particles": {
            "number": {
                "value": 80,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#FFFFFF"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false
            },
            "size": {
                "value": 3,
                "random": true
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#FFFFFF",
                "opacity": 0.9,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false
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
            }
        },
        "retina_detect": true
    });
</script>
