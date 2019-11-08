
<?php
    include '../config/database.php';                
?>


<!doctype html>
<html lang="es">
    <head>
        <title>Citas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>        
        <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet"/>
        <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> 

        <style>
            body{
                padding: 1%;
            }  
            th{
                text-align: center;
            }         
        </style>    
    </head>

    <body>
       <?php  
            include ('nav.php');
       ?>

        <div class="container" id="main">
            <?php 
                include("../include/conexion.php");
                $sql= "SELECT ci.id as cid, ci.asunto, ci.inicio, ci.duracion, ci.paciente, ci.medico, ci.nota, 
                p.id, p.nombre, p.apellido,
                m.id, m.nombre as nm, m.apellido as am
                FROM cita ci  
                LEFT JOIN paciente p ON ci.paciente = p.id
                LEFT JOIN medico m ON ci.medico = m.id  
                ORDER BY ci.id";
                $consulta=$conexion->query($sql);
                $vector=array();
                if ($consulta) {
                    while($data=$consulta->fetch_array()) {
                        $vector[]=$data;
                    }
                } else {
                    echo "Hay un problema al consultar los registros";
                }
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