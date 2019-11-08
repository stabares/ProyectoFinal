<?php
	include("../include/conexion.php");
	if (count($_GET)>0) {
		$id=$_GET['id'];
		$sql="update paciente set activo = 0 where id=".$id;
	 	$mensaje="";
		if ($conexion->query($sql)) {
	 		$mensaje="";
	 	} else {
	 		echo "Problemas al actualizar: ".$sql;
	 	}
	} 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Ejemplos Bootstrap</title>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> 
  		<style>
	    	body{
	    		/*margin: 5%;*/
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
					
				$sql="select * from paciente where activo = 1 order by id asc ";				
				$consulta=$conexion->query($sql);
				$vector=array();
				if ($consulta) {
						while($data=$consulta->fetch_array()) {
						$vector[]=$data;
					}
				} else {
					echo "Hay un problema al consultar los registros";
			}?>
			<h1>Listado de Pacientes <a href="registroclientes.php" class="btn btn-info"> <i class="fas fa-plus-circle"></i> Nuevo Paciente</a> </h1>
           

			<table class="table table-bordered table-hover" style="text-align:center;">
				<thead class="thead-dark">
					<tr>
						<th>Cédula</th>
						<th>Nombres</th>
						<th>Fecha Nacimiento</th>
						<th>Sexo</th>
						<th>Dirección</th>
						<th>Teléfono</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach($vector as $fila) {
					?>
					<tr>
						<td><?php echo $fila["id"] ;?></td>
						<td><?php echo $fila["nombre"]." ".$fila["apellido"];?></td>
						<td><?php echo $fila["fechaNacimiento"] ;?></td>
						<td><?php echo $fila["sexo"] ;?></td>
						<td><?php echo $fila["direccion"];?></td>
						<td><?php echo $fila["telefono"];?></td>

						<td>
							<a class="btn btn-success btn-sm"> <i class="fab fa-readme"></i> Historial</a>
							<a data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-sm"> <i class="fas fa-edit"></i> Editar</a>
							<a href="?id=<?php echo $fila["id"];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Borrar</a> 
						</td>
					</tr>																
					<?php } ?>
				</tbody>
			</table>
		</div>
	</body>
	<?php include("../include/js.php");?>
</html>


