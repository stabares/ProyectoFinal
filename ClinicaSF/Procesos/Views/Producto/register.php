<div class="container">
    <h2>Registro de producto</h2>
    <form action="?controller=producto&&action=save" method="POST">

        <div class="form-group">
            <label for="text"></label>
            <input type="text" name="id" class="form-control" id="id" placeholder="Ingrese su cc">
        </div>

        <div class="form-group">
            <label for="text">Nombre </label>
            <input type="text" class="form-control" id="nombre" placeholder="Ingrese su Nombre" name="nombre">
        </div>

        <div class="form-group">
            <label for="text">Tipo</label>
            <input type="text" name="tipo" id="tipo" class="form-control" placeholder="Ingrese el tipo">
        </div>

        <div class="form-group">
            <label for="text">Cantidad</label>
            <input type="text" name="cantidad" id="cantidad" class="form-control" placeholder="Ingrese la cantidad">
        </div>


        <div class="form-group">
            <label for="text">Activo</label>
            <input type="text" name="activo" id="activo"class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="text">Precio</label>
            <input type="text" name="precio" id="precio" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>