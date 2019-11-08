<!DOCTYPE html>
<html lang="es">

<head>
    <title>BioSano</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        include '../../../View/Overall_Information/general.php'; 
    ?>

</head>

<body>
    <nav class="navbar  navbar-fixed-top" id="navbar">
        <div class=" container-fluid">
            <div class="navbar-header">
                <!-- <img src="../../resources/img/pills.png" alt=""> -->
            </div>
            <a class="nav-link" href="despacho.php"> Despacho </a>
            <a class="nav-link" href="citas.php"> Citas </a>
            <a class="nav-link" href="indexPac.php"> Pacientes </a>
            <a class="nav-link" href="indexProd.php"> Productos </a>
            <a class="nav-link" href="indexMed.php"> Médicos </a>
            <a class="nav-link" href="#"> Administradores </a>
            <a class="nav-link" href="../../../index.php"> Cerrar Sesión </a>
        </div>
    </nav>
    <center>
        <div style="padding: 8%;">
            <div class="form-group col-6 col-md-4">
                <a class="fas fa-home fa-9x" href="index.php"> </a>
            </div>
            <div class="form-group col-6 col-md-4">
                <a class="fas fa-file-prescription fa-9x" href="php/despacho.php"> </a>
            </div>
            <div class="form-group col-6 col-md-4">
                <a class="fas fa-calendar-alt fa-9x" href="php/citas.php"> </a>
            </div>
        </div>
        <div style="padding: 8%;">
            <div class="form-group col-6 col-md-4">
                <a class="fas fa-users fa-9x" href="php/clientes.php"> </a>
            </div>
            <div class="form-group col-6 col-md-4">
                <a class="fas fa-tablets fa-9x" href="php/productos.php"> </a>
            </div>
            <div class="form-group col-6 col-md-4">
                <a class="fas fa-user-md fa-9x" href="php/medicos.php"> </a>
            </div>
        </div>
    </center>

</body>

</html>