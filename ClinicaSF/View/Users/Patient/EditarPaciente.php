<h1 class="page-header">
    <?php echo $pac->__GET('cc') != null ? $pac->__GET('nombre') : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Paciente">Paciente</a></li>
    <li class="active"><?php echo $pac->__GET('cc') != null ? $pac->__GET('nombre') : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-paciente" action="?c=Paciente&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cc" value="<?php echo $pac->__GET('cc'); ?>" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $pac->__GET('nombre'); ?>" class="form-control" placeholder="Ingrese el nombre" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="apellido" value="<?php echo $pac->__GET('apellido'); ?>" class="form-control" placeholder="Ingrese el apellido" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="direccion" value="<?php echo $pac->__GET('direccion'); ?>" class="form-control" placeholder="Ingrese la dirección" data-validacion-tipo="requerido|text" />
    </div>

    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="telefono" value="<?php echo $pac->__GET('telefono'); ?>" class="form-control" placeholder="Ingrese el telefono" data-validacion-tipo="requerido|min:7" />
    </div>

    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="contrasena" value="<?php echo $pac->__GET('contrasena'); ?>" class="form-control" placeholder="Ingrese la contraseña" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $("#frm-paciente").submit(function() {
            return $(this).validate();
        });
    })
</script>