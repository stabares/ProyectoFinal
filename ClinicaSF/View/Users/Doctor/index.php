<!DOCTYPE html>
<html>

<head>
    <title>Inicio, Doctor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">	

    <?php
        include '../../Overall_Information/general.php'; 
        include '../../Calendar/insert.php';
        include '../../Calendar/load.php';
    ?>

    <!-- CALENDARIO -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />

    <!-- CALENDARIO -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="../../Calendar/calendario.js"></script>
</head>

<body>
 <!-- Barra del navegador -->
    <nav class="navbar navbar-expand-lg navbar-fixed-top" id="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="../../resources/img/pills.png" alt="">
        </div>
            <a class="nav-link" href="mis_citas_medico.php"> Mis Citas </a>
            <a class="nav-link" href="mis_pacientes.php"> Mis pacientes </a>
            <a class="nav-link" href="mis_despachos_medico.php"> Mis Desachos </a>
            <a class="nav-link" href="../../../index.php"> Cerrar Sesión </a>
        </div>
    </nav>


    <div>
        <div class="container">
            <div id="calendar"></div>
        </div>
    </div>
</body>

</html>