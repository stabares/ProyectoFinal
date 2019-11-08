<!-- Conexión a la base de dastos -->
<?php
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection) {
    die("Hubo un problema al conectar con la base de datos" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'clinicasf');
if (!$select_db) {
    die("Hubo un problema al conectar con la base de datos" . mysqli_error($connection));
}
?>