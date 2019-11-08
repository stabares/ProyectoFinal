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
					
				$sql="select * from producto where activo = 1 order by id asc ";
				$consulta=$conexion->query($sql);
				$vector=array();
				if ($consulta) {
						while($data=$consulta->fetch_array()) {
						$vector[]=$data;
					}
				} else {
					echo "Hay un problema al consultar los registros";
			}?>
			<h1>Listado de Productos <a data-toggle="modal" data-target="#modalNuevo" class="btn btn-info"> <i class="fas fa-plus-circle"></i> Nuevo Producto</a> </h1>
           

			<table class="table table-bordered table-hover" style="text-align:center;">
				<thead class="thead-dark">
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach($vector as $fila) {
					?>
					<tr>
						<td><?php echo $fila["id"] ;?></td>
						<td><?php echo $fila["nombre"] ;?></td>
						<td><?php echo $fila["descripcion"] ;?></td>
						<td><?php echo $fila["id"];?></td>
						<td><?php echo $fila["precio"];?></td>

						<td>
							<a data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-sm"> <i class="fas fa-edit"></i> Editar</a>
							<a href="?id=<?php echo $fila["id"];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Borrar</a> 
						</td>
					</tr>																
					<?php } ?>
				</tbody>
			</table>
		</div>

		<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
			        <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
				        </button>
			        </div>
					<div class="modal-body">
						<form role="form" id="container" method="post" action="../agregarProducto.php">
						    <div class="row">					            
							    <div class="form-group col-xs-6">
							        <label for="nombre"><strong> Nombre</strong></label>
							        <input type="text" class="form-control" name="nombre" id="nombre"  required>
							    </div>
							    <div class="form-group col-xs-6">		    
									<label for="descripcion"><strong> Descripción</strong></label>
									<input type="text" class="form-control" id="descripcion" name="descripcion" required>
								</div>
							</div>
							<div class="row">
						        <div class="form-group col-xs-6">       
						            <label for="cantidad"><strong> Cantidad </strong></label>
						            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
						        </div>					            
							    <div class="form-group col-xs-6">
							        <label for="precio"><strong> Precio </strong></label>
							        <input type="text" class="form-control" name="precio" id="precio"  required>
							    </div>
							</div>
							<div class="row">				             
							    <div class="modal-footer col-xs-6">
								    <button type="button" class="btn btn-danger btn-block col-xs-6" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
								</div>
								<div class="modal-footer col-xs-6">
								    <button type="submit" class="btn btn-success btn-block  col-xs-6"><i class="far fa-check-circle"></i> Guardar</button>
								</div>	                    	
							</div>
						</form>
					</div>
					<div class="modal-footer">
					    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					    <button type="button" class="btn btn-primary">Guardar</button>
					</div>
			    </div>
		    </div>
		</div>

	</body>
	<?php include("../include/js.php");?>
</html>


