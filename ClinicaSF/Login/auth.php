<?php
require('../db/bdd.php');

if (isset($_POST['cc']) and isset($_POST['contrasena'])) {

    // Assigning POST values to variables.
    $cc = $_POST['cc'];
    $contrasena = $_POST['contrasena'];

    // CHECK FOR THE RECORD FROM TABLE
    $query = "SELECT * FROM `administrador` WHERE cc='$cc' and contrasena ='$contrasena'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if ($count == 1) {

        //echo "Login Credentials verified";
        echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
    } else {
        echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
        //echo "Invalid Login Credentials";
    }
}
?>