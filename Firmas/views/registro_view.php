<!DOCTYPE html>
<html>

<head>
    <title>Registro</title>
    <link rel="stylesheet" href="asset\css\style.css" />
    <img  src="asset\img\prever.png" alt="encabezado">
</head>

<body>
    <header>
        <h1>Registro De Usuario Nuevo</h1>
    </header>
    <main>
        <form method="post" action="?c=Usuarios&a=registroLogin">
            <p>Usuario</p>
            <input type="text" id="Usuario" name="Usuario" placeholder="Usuario" required /><br /><br />

            <p>Contraseña</p>
            <input type="password" id="Password" name="Password" placeholder="Contraseña" required /><br /><br />

            <input type="submit" value="Registrar Usuario" />
        </form>
    </main>
</body>

</html>
