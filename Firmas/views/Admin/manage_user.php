<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuarios</title>
  <link rel="stylesheet" href="asset\css\manager.css">
</head>
<body>
  <h1>Usuarios</h1>

  <?php if (!empty($usuarios)): ?>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Usuario</th>
          <th>Primer Nombre</th>
          <th>Segundo Nombre</th>
          <th>Primer Apellido</th>
          <th>Segundo Apellido</th>
          <th>Dirección</th>
          <th>Telefono</th>
          <th>Celular</th>
          <th>Ext</th>
          <th>Indicativo</th>
          <th>Ciudad</th>
          <th>Cargo</th>
          <th>Rol</th>
          <th>Actualizar</th>
          <th>Eliminar</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
      <td><?php echo $usuario->idusuario; ?></td>
      <td><?php echo $usuario->Usuario; ?></td>
      <td><?php echo $usuario->Primer_Nombre; ?></td>
      <td><?php echo $usuario->Segundo_Nombre; ?></td>
      <td><?php echo $usuario->Primer_Apellido; ?></td>
      <td><?php echo $usuario->Segundo_Apellido; ?></td>
      <td><?php echo $usuario->direccion; ?></td>
      <td><?php echo $usuario->Telefono; ?></td>
      <td><?php echo $usuario->Celular; ?></td>
      <td><?php echo $usuario->Ext; ?></td>
      <td><?php echo $usuario->Indicativo; ?></td>
   
      <td><?php echo $usuario->nombre_ciudad; ?></td> 
      <td><?php echo $usuario->nombre_cargo; ?></td> 
      <td><?php echo $usuario->nombre_rol; ?></td> 
      
      <td><a href="?c=Usuarios&a=actualizar&id=<?php echo $usuario->idusuario; ?>" class="btn btn-warning">Actualizar</a></td> 
      <td><a href="?c=Usuarios&a=eliminar&id=<?php echo $usuario->idusuario; ?>" class="btn btn-danger">Eliminar</a></td> 
        </td>

        
        <?php endforeach; ?>
      </tbody>
    </table>
    <a href="?c=Login&a=redireccionarAdmin">
            <button>Menu Principal</button></a>
  <?php else: ?>
    <p>No se encontraron usuarios.</p>
  <?php endif; ?>

</body>
</html>
