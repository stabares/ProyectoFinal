<!Doctype html>
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
        </style>    
    </head>

    <body>
       <?php  
            include ('nav.php');
       ?>

        <div class="container" id="main">
            <?php 
                include("../include/conexion.php");
                $sql= "SELECT d.id as did, d.producto, d.cantidad, d.paciente, d.fechaPedido, d.fechaEntrega, 
                pr.id as prid, pr.nombre as prnombre, 
                p.id, p.nombre, p.apellido
                FROM despacho d 
                LEFT JOIN paciente p ON d.paciente = p.id
                LEFT JOIN producto pr ON d.producto = pr.id  
                ORDER BY d.id";
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
            <h1>Historial de despachos <a href="alternativaDespacho.php" class="btn btn-info"> <i class="fas fa-plus-circle"></i> Nuevo Despacho</a> </h1>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Productos</th>
                        <th>Paciente</th>
                        <th>Cantidad</th>
                        <th>Fecha Pedido</th>
                        <th>Fecha Entrega</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($vector as $fila) {
                    ?>
                        <tr>
                            <td><?php echo $fila["did"];?></td>
                            <?php
                                echo "<td>" .  "  $fila[prnombre]" . "</td>";
                            ?>
                            <?php
                                echo "<td>" .  "$fila[nombre]" . "  $fila[apellido]" . "</td>";
                            ?>
                            <td><?php echo $fila["cantidad"];?></td>                            
                            <td><?php echo $fila["fechaPedido"];?></td>                            
                            <td><?php echo $fila["fechaEntrega"];?></td>
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