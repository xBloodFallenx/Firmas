<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="asset\css\actualizar.css">
</head>
<body>
    <h1>Actualizar Usuario</h1>
    <form action="?c=Usuarios&a=actualizarUsuario" method="post">
        <input type="hidden" name="idusuario" value="<?php echo $usuario->idusuario; ?>">

        <label for="Primer_Nombre">Primer Nombre:</label>
        <input type="text" name="Primer_Nombre" value="<?php echo $usuario->Primer_Nombre; ?>"><br><br>

        <label for="Segundo_Nombre">Segundo Nombre:</label>
        <input type="text" name="Segundo_Nombre" value="<?php echo $usuario->Segundo_Nombre; ?>"><br><br>

        <label for="Primer_Apellido">Primer Apellido:</label>
        <input type="text" name="Primer_Apellido" value="<?php echo $usuario->Primer_Apellido; ?>"><br><br>

        <label for="Segundo_Apellido">Segundo Apellido:</label>
        <input type="text" name="Segundo_Apellido" value="<?php echo $usuario->Segundo_Apellido; ?>"><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="<?php echo $usuario->direccion; ?>"><br><br>

        <label for="Telefono">Teléfono:</label>
        <input type="text" name="Telefono" value="<?php echo $usuario->Telefono; ?>"><br><br>

        <label for="Celular">Celular:</label>
        <input type="text" name="Celular" value="<?php echo $usuario->Celular; ?>"><br><br>

        <label for="Ext">Ext:</label>
        <input type="text" name="Ext" value="<?php echo $usuario->Ext; ?>"><br><br>

        <p>Seleccione El Indicativo</p>
<select name="Indicativo">
    <option disabled selected value=""></option>
    <option value="601" <?php if ($usuario->Indicativo == "601") echo 'selected'; ?>>Bogotá - 601</option>
    <option value="602" <?php if ($usuario->Indicativo == "602") echo 'selected'; ?>>Cali - 602</option>
    <option value="604" <?php if ($usuario->Indicativo == "604") echo 'selected'; ?>>Medellin - 604</option>
    <option value="606" <?php if ($usuario->Indicativo == "606") echo 'selected'; ?>>Armenia - 606</option>
    <option value="608" <?php if ($usuario->Indicativo == "608") echo 'selected'; ?>>Manizales - 608</option>
</select>
<br>


        <p>Selecciona Una Ciudad</p>
                <select name="idciudad" >
                    <option disabled selected value=""></option>
                    <option value="1" <?php if($usuario->idciudad == 1) echo 'selected'; ?>>Bogotá</option>
                    <option value="2" <?php if($usuario->idciudad == 2) echo 'selected'; ?>>Cali</option>
                    <option value="3" <?php if($usuario->idciudad == 3) echo 'selected'; ?>>Medellin</option>
                    <option value="4" <?php if($usuario->idciudad == 4) echo 'selected'; ?>>Armenia</option>
                    <option value="5" <?php if($usuario->idciudad == 5) echo 'selected'; ?>>Manizales</option>
                </select>
                <br /><br />

                <p>Seleccione El Nuevo Cargo</p>
                 <select name="idcargo" id="idcargo">
                    <option value=""></option>
                    <?php foreach ( $this->model->obtenerCargos() as $r) : ?>
                    <option value="<?php echo $r->idcargo; ?>"> <?php echo $r->Nombre_Cargo; ?>  </option>
                    <?php endforeach; ?>
                </select>
                <br /><br />
        <button type="submit">Actualizar Usuario</button>

        <a href="?c=Login&a=redireccionarAdmin">
            <button>Menu Principal</button></a>
    </form>
</body>
</html>
