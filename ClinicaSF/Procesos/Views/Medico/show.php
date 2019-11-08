<div class="container" style="margin-top:35px;">
	<h2>Lista Medicos</h2>
	<form class="form-inline" action="?controller=medico&action=search" method="post">
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
        
        <div class="form-group row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary" style="margin:5px;"> <a href="?controller=medico&action=register"> Agregar Producto </a> </button>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary" style="margin:5px;"> <a href="?controller=medico&&action=show"> Ver </a> </button>
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
                    <th>Especialidad</th>
					<th>Contraseña</th>
					<th>Accion</th>
				</tr>
				<tbody>
					<?php foreach ($listaMedicos as$medico) {?>					
					<tr>
						<td> <a href="?controller=medico&&action=updateshow&&idMedico=<?php  echo $medico->getCC()?>"> <?php echo $medico->getCC(); ?></a> </td>
						<td><?php echo $medico->getNombre(); ?></td>
                        <td><?php echo $medico->getApellido(); ?></td>
                        <td><?php echo $medico->getDireccion(); ?></td>
                        <td><?php echo $medico->getTelefono(); ?></td>
                        <td><?php echo $medico->getEspecialidad(); ?></td>
						<td><?php echo $medico->getContrasena(); ?></td>
					<td><a href="?controller=medico&&action=delete&&cc=<?php echo $medico->getCC() ?>">Eliminar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>