<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> San Francisco </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="Resources/Style_Function/Css/estilo.css">
    <link rel="stylesheet" href="Resources/Style_Function/Css/estilos.css">

    <?php
        include 'Resources/Style_Function/estilo-p.php'
    ?>

    <style>
        html,
        body {
            background-color: #fff;
            color: darkblue;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>

<body>
    <!-- Navbar de inicio -->
    <div class="flex-center position-ref full-height" >
        <div class="content">
            <div class="title m-b-md">
            <div>
            <img src="Resources/Img/pills.png" alt="">
                Clínica San Francisco
            </div>
            </div>
            <div class="links">
                <a href="#"> Inicio </a>
                <a href="View/Overall_Information/sobreNosotros.php"> Sobre Nosotros </a>
                <a href="View/Overall_Information/proyectos.php"> Responsabilidad Social </a>
                <a href="View/Overall_Information/proyectos.php"> Noticias </a>
                <a href="View/Overall_Information/servicios.php"> Servicios </a>
                <a class="nav-link" href="#" id="btn-abrir-popup">> Ingresa </a>
            </div>
        </div>
    </div>

    <!-- Pop up de inicio de sesión o ingreso -->
    <div class="contenedor">
        <div class="overlay" id="overlay">
            <div class="popup" id="popup">
                <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i>X</a>
                <h3> INGRESA </h3>
                <!-- Formulario de ingreso del administrador -->
                <form id="formulario" action="login/sesion.php" method="POST" style="margin-top:10px;">
                    <div class="contenedor-inputs">
                        <input type="text" placeholder="Cédula" id="cc" name="cc" require>
                        <input type="password" placeholder="Contraseña" id="contrasena" name="contrasena" require>
                    </div>
                    <input type="submit" class="btn-submit" value="Ingreso">
                </form>
            </div>
        </div>
    </div>

    <!-- Script del pop up de inicio de sesión -->
    <script src="Resources/Style_Function/Js/popup.js"></script>

    <!-- Script del contactenos en el footer -->
    <script src="Resources/Style_Function/Js/index.js"></script>

    <!-- Script de registro y login -->
    <script type="text/javascript" src="jquery-1.11.3.min.js"></script>
    <script type="text/javascript" language="javascript" src="login.js"></script>

    <!-- Scrips de Boostrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>