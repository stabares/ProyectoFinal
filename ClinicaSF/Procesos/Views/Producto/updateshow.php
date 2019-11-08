<div class="container">
	<h2>Actualizar producto</h2>
	<form action="?controller=producto&&action=update" method="POST">
		<input name="id" value="<?php echo $producto->getId() ?>" readonly />
		<div class="form-group">
			<label for="text">Nombre</label>
			<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $producto->getNombre() ?>">
		</div>
		<div class="form-group">
			<label for="text">Tipo</label>
			<input type="text" name="tipo" id="tipo" class="form-control" value="<?php echo $producto->getTipo(); ?>">
        </div>
        
        <div class="form-group">
			<label for="text">Cantidad</label>
			<input type="text" name="cantidad" id="cantidad" class="form-control" value="<?php echo $producto->getCantidad(); ?>">
        </div>
        
        <div class="form-group">
			<label for="text">Activo</label>
			<input type="text" name="activo" id="activo" class="form-control" value="<?php echo $producto->getActivo(); ?>">
        </div>
        
        <div class="form-group">
			<label for="text">Precio</label>
			<input type="text" name="precio" id="precio" class="form-control" value="<?php echo $producto->getPrecio(); ?>">
        </div>
        
		
		<button type="submit" class="btn btn-primary">Actualizar</button>

	</form>
</div>