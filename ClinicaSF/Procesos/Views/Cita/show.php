

<div class="container">
	<h2>Lista pacientes</h2>
	<form class="form-inline" action="?controller=paciente&action=search" method="post">
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
					<th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dirección</th>
					<th>Teléfono</th>
					<th>Contraseña</th>
					<th>Accion</th>
				</tr>
				<tbody>
					<?php foreach ($listaPacientes as$paciente) {?>

					
					<tr>
						<td> <a href="?controller=paciente&&action=updateshow&&idPaciente=<?php  echo $paciente->getCC()?>"> <?php echo $paciente->getCC(); ?></a> </td>
						<td><?php echo $paciente->getNombre(); ?></td>
                        <td><?php echo $paciente->getApellido(); ?></td>
                        <td><?php echo $paciente->getDireccion(); ?></td>
						<td><?php echo $paciente->getTelefono(); ?></td>
						<td><?php echo $paciente->getContrasena(); ?></td>
					<td><a href="?controller=paciente&&action=delete&&cc=<?php echo $paciente->getCC() ?>">Eliminar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>