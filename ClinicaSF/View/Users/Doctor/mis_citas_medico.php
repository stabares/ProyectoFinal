
<?php
    include '../config/database.php';                
?>


<!doctype html>
<html lang="es">
    <head>
        <title>Citas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
           
    </head>

    <body>
       <?php  
            include ('nav.php');
       ?>

        <div class="container" id="main">
            <?php 
               
            ?>
            <h1>Historial de citas <a href="nuevaCita.php" class="btn btn-info"> <i class="fas fa-plus-circle"></i> Nueva cita</a> </h1>
            <table class="table table-bordered table-hover" style="text-align:center;">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Asunto</th>
                        <th>Fecha</th>
                        <th>Hora Inicio</th>
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($vector as $fila) {
                    ?>
                        <tr>
                            <td><?php echo $fila["cid"];?></td>
                            <td><?php echo $fila["asunto"];?></td>
                            <td><?php echo $fila["inicio"];?></td>
                            <td><?php echo $fila["duracion"];?></td>
                            <?php
                                echo "<td>" .  "$fila[nombre]" . "  $fila[apellido]" . "</td>";
                            ?>
                            <?php
                                echo "<td>" .  "$fila[nm]" . "  $fila[am]" . "</td>";
                            ?>
                            <td><?php echo $fila["nota"];?></td>
                        </tr>                                             
                    <?php 
                        }
                    ?>
                </tbody>
            </table>              
        </div>                            
    </body>
    <?php include("../include/js.php");?>
</html>