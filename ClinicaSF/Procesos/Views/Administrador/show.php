<div class="container">
	<h2>Lista Administradores</h2>
	<form class="form-inline" action="?controller=administrador&action=search" method="post">
		<div class="form-group row">
			<div class="col-xs-4">
				<input class="form-control" id="cc" name="cc" type="text" placeholder="Busqueda por ID">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-search"> </span> Buscar</button>
			</div>
		</div>
	</form>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Contraseña</th>
					<th>Accion</th>
				</tr>
				<tbody>
					<?php foreach ($listaAdministradores as$administrador) {?>					
					<tr>
						<td> <a href="?controller=administrador&&action=updateshow&&idAdministrador=<?php  echo $administrador->getCC()?>"> <?php echo $administrador->getCC(); ?></a> </td>
						<td><?php echo $administrador->getNombre(); ?></td>
                      	<td><?php echo $administrador->getContrasena(); ?></td>
					<td><a href="?controller=administrador&&action=delete&&cc=<?php echo $administrador->getCC() ?>">Eliminar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>