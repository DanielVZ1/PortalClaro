<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Asistencia</title> 
        <link href="Assets/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="./Assets/css/estilosModificar.Css">
        <style>
        .menu-container {
            position: relative;
            display: inline-block;
        }
        .menu-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
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
        }
    </style>
    </head>
    <body class="sb-nav-fixed">
        <!-- Lógica de carga de archivos JavaScript -->
        <script>
                async function uploadFile() {
                    // Creación de un objeto de datos de formulario y un archivo anexado a esos datos de formulario
                    let formData = new FormData(); 
                     formData.append("file", fileupload.files[0]);
                     //solicitud de red mediante el método POST de fetch
                    await fetch('PASTE_YOUR_URL_HERE', {
                         method: "POST", 
                         body: formData
                     }); 
                alert('¡Has subido el archivo con éxito!');
                }
        </script>

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="background-color: white !important; height: 153px;">
            <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" style="margin: initial; ">
                    <span class="fs-4" _msttexthash="202592" _msthash="8" style="margin: auto; padding: 32px; position: relative; top: 5px;">
	                    <img src="Assets/img/Claro02.jpg" alt="Logo" style="width: 150px; ">
	                </span>
            </a>
            
            <h1 style="color: red;width:750px; height:50px;" style="margin: auto; padding: 2px;">SISTEMA GESTOR DE PROMOTORES</h1>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" height="200">
                <div class="menu-container" style="margin: auto; padding: 30px;">
                    <img src="Assets/img/Salir.jpg" alt="Imagen del menú" style="width: 50px;">
                    <div class="menu-content">
                        <a href="Registrarse.php">Registro</a>
                        <a href="Login.php">Salir</a>
                    </div>
                </div>
            </ul> 
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion"  style="background-color: white !important;">
                    <div class="sb-sidenav-menu">
                        <div class="nav " >
                            <div class="sb-sidenav-menu-heading"></div>
                            <hr>
                            <a href="Views/email/index.html" class="nav-link active" aria-current="page" style="margin: auto; padding: 10px;position: relative; top: 50px;">
			                   <img src="Assets/img/Correo2.jpg" alt="Logo" style="width: 70px; ;">
		                    </a>
      
    
                            <a href="Views/Geolocation/index.html" class="nav-link active" aria-current="page" style="margin: auto; padding: 10px; position: relative; top: 50px;">
		                        <img src="Assets/img/Localización.jpg" alt="Logo" style="width: 80px;"> 
		                    </a>
    
     
                            <a href="Views/Camara/index.html" class="nav-link active" aria-current="page" style="margin: auto; padding: 10px; position: relative; top: 50px;">
		                        <img src="Assets/img/Camara.jpg" alt="Logo" style="width: 70px;">
		                    </a>

                            <a href="Promotores.php" class="nav-link active" aria-current="page" style="margin: auto; padding: 10px; position: relative; top: 50px;">
                                <img src="Assets/img/Comunidad.jpg" alt="Logo" style="width: 80px;">
		                    </a>
                            <hr>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                           
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content"style="background-color: #D70B0B !important; height: 700px; width: 1200px;">
            <main style="background-color: #D70B0B !important;">
                <form action="#" method="post" style="margin: auto; padding: 10px;">
                    <center><h1 style="color: white; position: relative; top: 100px;" >PROMOTORES/ASISTENCIA</h1></center>
                        <div class="container-fluid px-4" style="width: auto; position: relative; top: 0px;">
                            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                                <div class="input-group" style="position: relative; top: 80px; height: 30px; width: 400px;">
                                    <input class="form-control" type="text" style="width: 120px; height: 30px; padding: 10px" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                                    <button class="btn btn-primary" id="btnNavbarSearch" type="button" style="height: 30px"><i class="fas fa-search"></i>BUSCAR</button>
                                </div>
                            </form> 
                            <div class="card mb-4" style="color: black; position: relative; top: 100px;">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                        Tabla de datos
                                </div>
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>DNI</th>
                                                <th>NombreCompleto</th>
                                                <th>PuestoDeTrabajo</th>
                                                <th>Proveedor</th>
                                                <th>Zona</th>
                                                <th>Supervisor</th>
                                                <th>Asistencia</th>
                                                <th>Encargado</th>
                                                <th>Geolocalizacion</th>
                                            </tr> 
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                        </div>
                            <div class="col-lg-4 col-md-4 flex-container" style="width: 170px; position: relative; top: 20px; padding: 40px;">
                                <input id="fileupload" type="file" name="fileupload" style="margin: 1em; color:aliceblue;" type="submit" class="send-btn"/> 
                                <button id="upload-button" onclick="uploadFile()" style="margin: 1em; color:#fe0b0b;" type="submit" class="send-btn"> SUBIR ARCHIVO</button>
                                <button id="save-button" onclick="saveFile()" style="margin: 1em;" type="submit " class="send-btn"><a href="" >GUARDAR</a></button>
                                <button style="margin: 1em;" type="submit" class="send-btn"><a href="ListaProm.php" >SALIR</a></button>
                            </div>
                        
                </form>   
            </main>              
            </div>    
            </div>
        </div>
  </body>
</html>