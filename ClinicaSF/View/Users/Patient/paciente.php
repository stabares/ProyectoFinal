<h1 class="page-header"> Pacientes </h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Paciente&a=Crud"> Nuevo Paciente </a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:80px;"> CC </th>
            <th style="width:180px;">Nombre</th>
            <th>Apellido</th>
            <th>Dirección </th>
            <th style="width:120px;">Teléfono</th>
            <th style="width:120px;">Contraseña</th>
            <th style="width:120px;">Activo</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    
   
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->__GET('cc'); ?></td>
            <td><?php echo $r->__GET('nombre'); ?></td>
            <td><?php echo $r->__GET('apellido'); ?></td>
            <td><?php echo $r->__GET('direccion'); ?></td>
            <td><?php echo $r->__GET('telefono'); ?></td>
            <td><?php echo $r->__GET('contrasena'); ?></td>
            <td><?php echo $r->__GET('activo'); ?></td>
            <td>
                <a href="?c=Paciente&a=Crud&cc=<?php echo $r->id; ?>"> Editar </a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este paciente?');" href="?c=Paciente&a=Eliminar&cc=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>s
</table> 
