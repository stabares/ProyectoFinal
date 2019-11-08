<!-- Autenticación de los usuarios -->
<?php
    require('../Database/database.php');

    //Recibimos las dos variables
    $cc = $_POST["cc"];
    $contrasena = $_POST["contrasena"];

    /* Realizamos una consulta por cada tabla (de usuarios) para buscar en que tabla se encuentra el usuario que está intentando acceder */
    $paciente = ("SELECT * FROM paciente WHERE paciente.cc = '$cc' AND contrasena = '$contrasena'");
    $medico = ("SELECT * FROM medico WHERE medico.cc = '$cc' AND contrasena = '$contrasena'");
    $administrador = ("SELECT * FROM administrador WHERE administrador.cc = '$cc' AND contrasena = '$contrasena'");

    /* En el caso que se encuentre el usuario en alguna tabla se guardará en un variable que guardan nuestra consulta según el tipo de usuario */
    $result1 = mysqli_query($connection, $paciente) or die(mysqli_error($connection)); $count1 = mysqli_num_rows($result1);
    $result2 = mysqli_query($connection, $medico) or die(mysqli_error($connection)); $count2 = mysqli_num_rows($result2);
    $result3 = mysqli_query($connection, $administrador) or die(mysqli_error($connection)); $count3 = mysqli_num_rows($result3);


    /* Comprobamos que variable contiene al usuario*/
    if ($count1 == 1) {
        /*  Se crea una sesión */
        session_start();
        $_SESSION['paciente'] = "$cc";

        /* Se redirige al index según el tipo de usuario */
        header("Location: ../View/Users/Patient/index.php");
        exit();
    }

    else if ($count2 == 1) {
        session_start();
        $_SESSION['medico'] = "$cc";
        header("Location: ../View/Users/Doctor/index.php");
        exit();
    }
    
    else if ($count3 == 1) {
        session_start();
        $_SESSION['administrador'] = "$cc";
        header("Location: ../Procesos/Views/Administrador/index_admin.php");
        exit();
    } else {
        /* Si no el usuario no se encuentra en ninguna de las tres tablas muestra un mensaje */
        $noPuedeAcceder = "El usuario y/o la contraseña son incorrectos, por favor verifique y vuelva a introducirlos.";
        echo $noPuedeAcceder;

        /* Se redirige al index principal */
        header("Location: ../index.php");
    }
?>