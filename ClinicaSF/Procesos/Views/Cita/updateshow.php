<div class="container">
	<h2>Actualizar paciente</h2>
	<form action="?controller=paciente&&action=update" method="POST">
		<input type="hidden" name="cc" value="<?php echo $paciente->getCC() ?>" >
		<div class="form-group">
			<label for="text">Nombres</label>
			<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $paciente->getNombre() ?>">
		</div>
		<div class="form-group">
			<label for="text">Apellidos</label>
			<input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $paciente->getApellido(); ?>">
        </div>
        
        <div class="form-group">
			<label for="text">Direccion</label>
			<input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $paciente->getDireccion(); ?>">
        </div>
        
        <div class="form-group">
			<label for="text">Telefono</label>
			<input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $paciente->getTelefono(); ?>">
        </div>
        
        <div class="form-group">
			<label for="text">Contraseña</label>
			<input type="text" name="contrasena" id="contrasena" class="form-control" value="<?php echo $paciente->getContrasena(); ?>">
        </div>
        
		
		<button type="submit" class="btn btn-primary">Actualizar</button>

	</form>
</div>