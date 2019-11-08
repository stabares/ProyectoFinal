<!DOCTYPE html>
<html lang="es">

<head>
    <?php
        include 'general.php'    
    ?>
    <title> Sobre Nosotros </title>
</head>

<body>
    <!-- Barra del navegador -->
    <?php  
            include '../nav.php';
       ?>

    <!-- Información de la organización -->
   <!-- Información de la organización -->
<center class="flex-center position-ref" style="margin-top: 50px">
    <div id="info">
        <h1 class="titulo" style="color: #5E7DE3">Información corporativa</h1>
        <p>Somos un centro clínico de medicina alternativa dedicado a brindar servicios de Medicina general y
            venta de medicamentos naturales
        </p>
    </div>

    <div id="mision">
       <h2 style="color: #5E7DE3">Misión</h2>
       <p>Existimos para prestar servicios integrales de salud con calidad, </p>
       <h2 style="color: #5E7DE3">Visión</h2>
       <p>Ser reconocidos al 2020 por la calidad en la atención y los mejores resultados clínicos</p>

   </div>

   <div id="valores">
     <h2 style="color: #5E7DE3">Valores</h2>
     <p>
        <li>Compromiso</li>
        <li>Respeto</li>
        <li>Eficiencia</li>
        <li>Liderazgo</li>
    </p>
</div>

</center>

    <!-- Pop up con información de los creadores  -->
    <!-- <center>
        <a class="nav-link" href="#" id="btn-abrir-popup"> Creadores </a>
        <div class="contenedor">
            <div class="overlay" id="overlay">
                <div class="popup" id="popup">
                    <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                    <h3> Sobre Nosotros </h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <center>
                                    <img id="img1" src="../recursos/2.PNG" height="200" width="150">
                                    <h4>Karol J. Santos</h4>
                                    <h5>Planear, diseñar y desarrollar proyectos de software. Ofrecer apoyo cuando se
                                        requiera resolver problemas técnicos de programa y hardware. </h5>
                                </center>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card">
                                <center>
                                    <img id="img1" src="../recursos/3.PNG" height="200" width="150">
                                    <h4>Stefania Tabares</h4>
                                    <h5>Proponer ideas y analizar los requerimientos para llevarlas acabo. Responsable
                                        de hacer el seguimiento de su propio progreso, ejecutar y dar mantenimiento a
                                        los proyectos de software realizados.</h5>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center> -->

    <!-- Pie de página con información de contacto-->
    

    <!-- Script del pop up del contenido sobre los creadores -->
    <script src="../js/popup.js"></script>

    <!-- Script del contactenos en el footer -->
    <script src="../index.js"></script>


    <!-- Script de registro y login -->
    <script type="text/javascript" src="jquery-1.11.3.min.js"></script>
    <script type="text/javascript" language="javascript" src="login.js"></script>

    <!-- Scrips de Boostrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>