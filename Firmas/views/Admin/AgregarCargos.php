<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset\css\actualizar.css">
    <title>Crear Nuevo Cargo</title>
</head>
<body>
    <h1>Crear Nuevo Cargo</h1>
    <form action="?c=Cargos&a=CrearCargo" method="POST">
        <label for="nombre_cargo">Nombre del Cargo:</label><br>
        <input type="text" id="nombre_cargo" name="nombre_cargo" ><br><br>
        <button type="submit">Crear Cargo</button>
        
       
    </form>
    <a href="?c=Login&a=redireccionarAdmin">
            <button>Menu Principal</button></a>
    
</body>
</html>
