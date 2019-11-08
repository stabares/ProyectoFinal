<div class="container">
	<h2>Actualizar administrador</h2>
	<form action="?controller=administrador&&action=update" method="POST">
		<div class="form-group">
			<label for="text">CC</label>
			<input type="text" name="cc" id="cc" class="form-control" value="<?php echo $administrador->getCC() ?>" readonly>
		</div>        
        <div class="form-group">
			<label for="text">Contraseña</label>
			<input type="text" name="contrasena" id="contrasena" class="form-control" value="<?php echo $administrador->getContrasena(); ?>">
        </div>		
		<button type="submit" class="btn btn-primary">Actualizar</button>

	</form>
</div>