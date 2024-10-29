</div>
</main>

<!-- Contenedor de partículas -->
<div id="particles-js"></div>

</div>
</div>
<div id="cambiarPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Modificar Contraseña</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmCambiarPass" onsubmit="frmCambiarPass(event);">
                    <div class="form-group">
                        <label for="clave_actual">Contraseña Actual</label>
                        <input id="clave_actual" class="form-control" type="password" name="clave_actual" placeholder="Contraseña Actual">
                    </div>
                    <div class="form-group">
                        <label for="clave_nueva">Contraseña nueva</label>
                        <input id="clave_nueva" class="form-control" type="password" name="clave_nueva" placeholder="Nueva Contraseña">
                    </div>
                    <div class="form-group">
                        <label for="confirmar_clave">Confirmar Contraseña</label>
                        <input id="confirmar_clave" class="form-control" type="password" name="confirmar_clave" placeholder="Confirmar Contraseña">
                    </div>
                    <button class="btn btn-primary" type="submit">Modificar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url;?>Assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url;?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url;?>Assets/js/scripts.js"></script>
<!-- <script src="<?php echo base_url;?>Assets/js/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url;?>Assets/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url;?>Assets/demo/chart-bar-demo.js"></script> -->
<script src="<?php echo base_url;?>Assets/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url;?>Assets/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url;?>Assets/demo/datatables-demo.js"></script>
<script>
    const base_url = "<?php echo base_url;?>";
</script>
<script src="<?php echo base_url; ?>Assets/js/main.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/es.js"></script>
<script src="<?php echo base_url;?>Assets/js/select2.min.js"></script>
<script src="<?php echo base_url;?>Assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/chart.min.js"></script>
<script src="<?php echo base_url;?>Assets/js/sweetalert.min.js"></script>

<script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
<script src="<?php echo base_url; ?>Assets/js/function_roles.js"></script>

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

</body>
</html>
