<div class="container">
    <h2>Registro de administrador</h2>
    <form action="?controller=administrador&&action=save" method="POST">
        <div class="form-group">
            <label for="text"></label>
            <input type="text" name="cc" class="form-control" id="cc" placeholder="Ingrese su cc">
        </div>
        <div class="form-group">
            <label for="text"></label>
            <input type="text" name="contrasena" id="contrasena" class="form-control" placeholder="Ingrese su contrasena">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>