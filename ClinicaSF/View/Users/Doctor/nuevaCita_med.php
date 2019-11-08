<?php
    global $conexion;
    include '../include/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Nueva Cita</title>
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
        <script src="libs/js/bootstrap.min.js"></script>
        <script src="libs/js/holder.js"></script>

        <style> 
            #lista{
                border:2px solid #cecece;
            }                      
        </style>    
    </head>

    <body>
        <?php  
            include ('nav.php');
        ?>
        <div class="container"  >
            <h1 style="margin-top: 5%;"> <a href="citas.php" class="btn btn-info"><i class="fas fa-arrow-left"></i></a> Nueva Cita</h1>
            <div class="row" id="lista" >
                <div class="container" style="margin-top: 2%;">
                    <form class="form" role="form" method="post" action="nuevaCita.php">
                        <div class="form-group">
                            <label for="asunto">Asunto</label>
                            <input type="text" name="asunto" required class="form-control" id="asunto" placeholder="Asunto">
                        </div>
                        <div class="row">                            
                            <div class="form-group col-xs-6">
                                <label for="paciente" >Paciente</label>
                                <select name="paciente" class="form-control" id="paciente">
                                    <?php
                                        $registros = mysqli_query($conexion, "SELECT p.id, p.nombre, p.apellido, p.activo, ci.paciente 
                                            FROM paciente p 
                                            LEFT JOIN cita ci ON p.id = ci.paciente 
                                            WHERE p.activo = 1
                                            ORDER BY p.nombre");
                                        while ($reg = mysqli_fetch_array($registros)) {
                                            echo "<option value='$reg[id]'>" . "$reg[nombre]" ." ". "$reg[apellido]" . "</option>";
                                        }
                                    ?>
                                </select>                                
                            </div>                            
                            <div class="form-group col-xs-6 ">
                                <label for="medico" >Medico</label>
                                <select name="medico" class="form-control" id="medico">
                                    <?php                                  
                                        $registros = mysqli_query($conexion, "SELECT m.id, m.nombre, m.apellido, m.activo, ci.medico 
                                            FROM medico m 
                                            LEFT JOIN cita ci ON m.id = ci.medico 
                                            WHERE m.activo = 1
                                            ORDER BY m.nombre");
                                        while ($reg = mysqli_fetch_array($registros)) {
                                            echo "<option value='$reg[id]'>" . "$reg[nombre]" ." ". "$reg[apellido]"  . "</option>";
                                        }
                                    ?>
                                </select>           
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="inicio">Fecha</label>
                                <input type="date" name="inicio" required class="form-control" id="inicio" placeholder="Fecha">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="form-group col-xs-6 ">
                                <label for="duracion">Hora inicio</label>
                                <input type="time" name="duracion" required class="form-control" id="duracion" placeholder="Duración">
                            </div>
                            <div class="form-group col-xs-6 ">                                
                                <label for="final">Hora Finalización</label>
                                <input type="time" name="final" required class="form-control" id="final" placeholder="final" >
                            </div>                             
                        </div>          
                        <div class="form-group">
                            <label for="nota" >Nota</label>
                            <textarea class="form-control" name="nota" id="nota" rows="5"></textarea>
                        </div>                                    
                        <div class="row">
                            <div class="form-group col-sm-4"> 
                                <button type="button" class="btn btn-info btn-block col-xs-6" data-dismiss="modal"> Limpiar </button>
                            </div>
                            <div class="form-group col-sm-4">
                                <button type="button" class="btn btn-danger btn-block col-xs-6" data-dismiss="modal"> Cancelar</button>
                            </div>
                            <div class="form-group col-sm-4">
                                <button type="submit" class="btn btn-success btn-block  col-xs-6"> Guardar</button>
                            </div>   
                        </div>                          
                    </form>
                </div>
            </div>
            <?php 
                $mensaje="";

                if (count($_POST)>0) {                
                    $asunto=$_POST['asunto'];
                    $paciente=$_POST['paciente'];
                    $medico=$_POST['medico'];
                    $inicio=$_POST['inicio'];
                    $duracion=$_POST['duracion'];
                    $nota=$_POST['nota'];
                   
                    $sql="INSERT INTO cita
                        (asunto,  paciente, medico, inicio, duracion, nota) VALUES ('$asunto','$paciente','$medico'
                         ,'$inicio','$duracion','$nota')";       
                    if ($conexion->query($sql)) {
                        $mensaje=""; 
                    } else {
                        $mensaje=""; 
                        echo $sql;
                        exit();
                    }                     
                }
            ?>
        </div>
    </body>
    <?php include("../include/js.php");?>
</html>