<div class="container" style="margin-top:35px;">
    <h2>Lista productos</h2>
    <form class="form-inline" action="?controller=producto&action=search" method="post">
        <div class="form-group row">
            <div class="col-xs-4">
                <input class="form-control" id="cc" name="cc" type="text" placeholder="Busqueda por ID">
            </div>
        </div>


        <div class="form-group row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"> </span> Buscar</button>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary" style="margin:5px;"> <a href="?controller=producto&action=register"> Agregar Producto </a> </button>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary" style="margin:5px;"> <a href="?controller=producto&&action=show"> Ver </a> </button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Activo</th>
                    <th>Precio</th>
                    <th>Accion</th>
                </tr>
            <tbody>
                <?php foreach ($listaProductos as $producto) { ?>
                    <tr>
                        <td> <a href="?controller=producto&&action=updateshow&&idProducto=<?php echo $producto->getId() ?>"> <?php echo $producto->getId(); ?></a> </td>
                        <td><?php echo $producto->getNombre(); ?></td>
                        <td><?php echo $producto->getTipo(); ?></td>
                        <td><?php echo $producto->getCantidad(); ?></td>
                        <td><?php echo $producto->getActivo(); ?></td>
                        <td><?php echo $producto->getPrecio(); ?></td>
                        <td><a href="?controller=producto&&action=delete&&id=<?php echo $producto->getId() ?>">Eliminar</a> </td>
                    </tr>
                <?php } ?>
            </tbody>

            </thead>
        </table>

    </div>

</div>