<!DOCTYPE html>
<html lang="es">

<head>
    <title>Crud PHP</title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

</head>

<?php
include_once('../../../Resources/Style_Function/estilo-p.php');
include_once('../../../View/Overall_Information/general.php');
?>

<body>
    <header>
        <nav class="navbar  navbar-fixed-top" id="navbar">
            <div class=" container-fluid">
                <div class="navbar-header">
                    <!-- <img src="../../resources/img/pills.png" alt=""> -->
                </div>
                <a class="nav-link" href="#"> Despacho </a>
                <a class="nav-link" href="#.php"> Citas </a>
                <a class="nav-link" href="../Administrador/indexPac.php"> Pacientes </a>
                <a class="nav-link" href="indexProd.php"> Productos </a>
                <a class="nav-link" href="../Administrador/indexMed.php"> Médicos </a>
                <a class="nav-link" href="#"> Administradores </a>
                <a class="nav-link" href="../../../index.php"> Cerrar Sesión </a>
            </div>
        </nav>
    </header>
    <section>
        <?php
        require_once('../../routingProducto.php') ?>
    </section>

</body>

</html>