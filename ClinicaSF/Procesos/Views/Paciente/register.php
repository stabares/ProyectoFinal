<div class="container">
    <h2>Registro de Paciente</h2>
    <form action="?controller=paciente&&action=save" method="POST">

        <div class="form-group">
            <label for="text"></label>
            <input type="text" name="cc" class="form-control" id="cc" placeholder="Ingrese su cc">
        </div>

        <div class="form-group">
            <label for="text">Nombre </label>
            <input type="text" class="form-control" id="nombre" placeholder="Ingrese su Nombre" name="nombre">
        </div>

        <div class="form-group">
            <label for="text"></label>
            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese su apellido">
        </div>

        <div class="form-group">
            <label for="text"></label>
            <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese su direccion">
        </div>


        <div class="form-group">
            <label for="text"></label>
            <input type="text" name="telefono" id="telefono"class="form-control" placeholder="Ingrese su telefono">
        </div>

        <div class="form-group">
            <label for="text"></label>
            <input type="text" name="contrasena" id="contrasena" class="form-control" placeholder="Ingrese su contrasena">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>