<?php
	include '../config/database.php';				 
    $action = isset($_GET['action']) ? $_GET['action'] : "";
    $producto= isset($_GET['producto']) ? $_GET['producto'] : "1";
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : "";
    $cantidad = isset($_GET['cantidad']) ? $_GET['cantidad'] : "1";

?>	

<!DOCTYPE html>
<html> 
	<head>
		<title>Inversiones Biosano</title>
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
			body{
				margin-top: 2%;
			}
	        #lista{
	        	border:2px solid #cecece;
            }
            .nav-link, .navbar-brand {
            	font-size: 20px;
            	color: white;            
            }
        </style>    
    </head>

    <body>
		<?php  
            include ('nav.php');
        ?>
           
		<div class="container" id="main">			
	        <div class="container" > 
			    	<div class="row">
				        <div class="form-group col-lg-6"  id="nuevo">
				          	<div style="text-align: center;">
				          		<h1><a href="despacho.php" class="btn btn-info"> <i class="fas fa-arrow-left"></i></a> Lista de Productos</h1>
						    </div>
						    <?php									
								$query = "SELECT p.id, p.nombre, p.precio, p.activo,
									d.cantidad, d.producto
									FROM producto p 
									LEFT JOIN despacho d ON p.id = d.producto 
									WHERE p.activo = 1
								    ORDER BY p.id";								 
								$stmt = $con->prepare( $query );
								$stmt->execute();							 
								$num = $stmt->rowCount();								 
								if($num>0){ ?>
								    <table class='table table-hover table-bordered'>							     
								        <tr>
								            <th>Producto</th>
								            <th>Precio</th>
								            <th style='width:5em;'>Cantidad</th>
								            <th> </th>
								        </tr>							         
								        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
								            extract($row); ?>
									        <tr>
									            <td>
									                <div class='product-id' style='display:none;'> <?php echo $id ?> </div>
									                <div class='product-name'> <?php echo $nombre ?> </div>
									            </td>								                
									            <td>&#36; <?php echo  number_format(  $precio, 2, '.' , ',') ?> </td>
									            <?php
									                if(isset($cantidad)){
									            	?>
										            	<td>
										                    <input type='text' name='cantidad' value= <?php echo $cantidad ?> disabled class='form-control' />
										                </td>
										                <td> <button class='btn btn-success fas fa-plus' disabled> </button> </td>
										            <?php            
									                }else{
									                ?>
									                    <td>
									                        <input type='number' name='cantidad' value='1' class='form-control' />
									                    </td>
									                    <td>
									                        <button class='btn btn-primary fas fa-plus add-to-cart'> </button>
									                    </td>
									                    <?php  
									                } 
									            ?>
									        </tr>
									    <?php 
								    	} ?>							         
								    </table>
								<?php 
								}else{
						    		echo "No hay productos encontrados.";
								} 
							?>						    
						</div>

						<div class="form-group col-xs-6">								        
							<div>
						        <h1>Registro de Despachos</h1>
						    </div>
						    <div class="modal-body lista" id="lista">
							    <form role="form" method="post" action="nuevoDespacho.php">
							       	<div class="row">									
							            <div class="form-group col-xs-6">
			                                <label for="id" > Cédula</label>
			                                <select name="id" class="form-control" id="id">
						        				<?php
						        					global $conexion;
                                                    include '../include/conexion.php';
		  											$registros = mysqli_query($conexion, "SELECT * FROM paciente where activo = 1");
		  											while ($reg = mysqli_fetch_array($registros)) {
													    echo "<option value='$reg[id]'>" . "$reg[id]" . "<br/>" . "</option>";
													}
												?>
											</select>                             
			                            </div>
									    <div class="form-group col-xs-6">
			                                <label for="nombre" >Nombre completo</label>
			                                <input type='text' class="form-control" id='nombre' readonly placeholder="Nombre" />                          
			                            </div>
				        			</div>				        			
								    <div class="row">
								        <div class="form-group col-xs-6">
								            <label for="direccion"> Dirección</label>
											<input type='text' class="form-control" id='direccion' readonly placeholder="Dirección" />
								        </div>			                            								    
								        <div class="form-group col-xs-6">
								            <label for="telefono"> Teléfono</label>
								            <input type="number" class="form-control" id="telefono" readonly name="telefono" placeholder="Teléfono">
								    	</div>
								    </div>
								    <div class="row">
								        <div class="form-group col-xs-6">
								            <label for="fechaPedido"> Fecha Pedido</label>
								            <input type="date" class="form-control" id="fechaPedido" name="fechaPedido" placeholder="Fecha Pedido" required>
								        </div>
								        <div class="form-group col-xs-6">
								            <label for="fechaEntrega"> Fecha Entrega</label>
								            <input type="date" class="form-control" id="fechaEntrega" name="fechaEntrega" placeholder="Fecha Entrega" required>
								        </div>
										<?php 
											$direccion =''; $nombre =''; $apellido =''; $telefono ='';
											echo "<input type='hidden' value='$reg[id]'>" . "$reg[direccion]". "$reg[telefono]"."$reg[nombre]".  "$reg[apellido]"."<br/>";
					                        $registros = mysqli_query($conexion, "SELECT * FROM paciente where activo = 1");
				  							while ($reg = mysqli_fetch_array($registros)) {
	          									$telefono .= "<textarea id='descTel".$reg['id']."' style='display: none;' type='hidden'>".$reg['telefono']."</textarea>";
	          									echo $telefono;
	          									$direccion .= "<textarea type='hidden' id='desc".$reg['id']."' style='display: none;'>".$reg['direccion']."</textarea>";
	          									echo $direccion;
	          									$nombre .= "<textarea type='hidden' id='descNombre".$reg['id']."' style='display: none;'>".$reg['nombre']." ".$reg['apellido']."</textarea>";
	          									echo $nombre;
											} 
										?>
								        <script type="text/javascript">
										    $(function() {
										      	$('#id').change(function(e) {
											        $('#direccion').val($('#desc' + this.value).val());
											        $('#telefono').val($('#descTel' + this.value).val());
											        $('#nombre').val($('#descNombre' + this.value).val());
										        }).trigger('change');
										    });
									    </script>
								    </div>

						            <div class="">
											<?php												
												$query="SELECT p.id, p.nombre, p.precio, d.producto, d.cantidad, d.cantidad * p.precio AS subtotal  
												            FROM despacho d LEFT JOIN producto p ON d.producto = p.id"; 		 											 
												$stmt=$con->prepare( $query );
												$stmt->execute(); 
												$num=$stmt->rowCount();												 
												if($num>0){
												?>     
												    <table class='table table-hover table-bordered'> 
												        <tr>
												            <th>Producto</th>
												            <th>Precio </th>
												            <th style='width:5em;'>Cantidad</th>
												            <th>Sub Total</th>
												            <th></th>
												        </tr>												         
												    <?php
												    $total=0;												     
												    while( $row = $stmt->fetch(PDO::FETCH_ASSOC)){
												        extract($row);
												    ?>
												        <tr>
												            <td>
												                <div class='product-id' style='display:none;'><?php echo $id ?></div>
												                <div class='product-name'> <?php echo $nombre ?> </div>
												            </td>
												            <td>&#36; <?php echo number_format($precio, 2, '.', ',')  ?></td>
												            <td>
												                <div class='input-group'>
												                    <input type='number' name='cantidad' value=<?php echo $cantidad ?> class='form-control'>
												                    <span class='input-group-btn'> </span>                             
												                </div>
												            </td>
												            <td>&#36; <?php echo number_format($subtotal, 2, '.', ',') ?> </td>
												            <td>
												                <?php
												                    echo "<a href='eliminar.php?id={$id}&nombre={$nombre}' class='btn btn-danger'>";
												                    echo "<span class='glyphicon glyphicon-remove'></span>";
												                ?>
												            </td>
												        </tr>   
												        <?php          
												        $total += $subtotal;
												    }
												    ?>												     
												    <tr>
												        <td><b>Total</b></td>
												        <td></td>
												        <td></td>
												        <td>&#36; <?php echo number_format($total, 2, '.', ',') ?> </td>
												        <td>												            
												        </td>
												    </tr>												         
												</table>
												<?php
												}else{
												    ?>
												    <div class='alert alert-danger'>
												    <strong>No se han agregado productos</strong>
												    </div>
												    <?php
												}		
											?>
						            </div>
						        </form>
						        <div class="row">				             
						            <div class="modal-footer col-xs-6">
						               	<button type="submit" class="btn btn-danger btn-block col-xs-6" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
						            </div>
						            <div class="modal-footer col-xs-6">
						               	<button type="submit" class="btn btn-success btn-block  col-xs-6"><i class="far fa-check-circle"></i> Guardar</button>
						            </div>        		                    	
				                </div>	
				            </div>		              
			            </div>
		            </div>	
		        </div>	            
		   </div>
		</div>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="libs/js/bootstrap.min.js"></script>
		<script src="libs/js/holder.js"></script>
		<script>
			$(document).ready(function(){
			    $('.add-to-cart').click(function(){
			        var id = $(this).closest('tr').find('.product-id').text();
			        var nombre = $(this).closest('tr').find('.product-name').text();
			        var cantidad = $(this).closest('tr').find('input').val();
			        window.location.href = "agregar.php?id=" + id + "&nombre=" + nombre + "&cantidad=" + cantidad;
			    });
			});
		</script>
		<?php 
			$mensaje="";
			if (count($_POST)>0) {			    
				$paciente=$_POST['paciente'];
				$fechaPedido=$_POST['fechaPedido'];
				$fechaEntrega=$_POST['fechaEntrega'];
				$producto=$_POST['producto'];
				$cantidad=$_POST['cantidad'];

			    $sql="INSERT INTO despacho ( producto, cantidad, paciente, fechaPedido, fechaEntrega) 
			        VALUES ('$producto','$cantidad','$paciente','$fechaPedido','$fechaEntrega')";       
				if ($conexion->query($sql)) {
						$mensaje=""; 
				} else {
					$mensaje=""; 
					echo $sql;
					exit();
				}      
			}
		?>
	</body>
	<?php include("../include/js.php");?>

	</body>

</html>
