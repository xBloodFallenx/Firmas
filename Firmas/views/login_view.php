<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="asset\css\login.css">
    <img  src="asset\img\prever.png" alt="encabezado">
</head>

<body>


            <form action="?c=Login&a=login" method="post" class="box">
                <h1>login</h1>
                <input type="text" name="Usuario" placeholder="Nombre De Usuario" required />
                <input type="Password" name="Password" placeholder="Contraseña" required />
                <input type="submit" value="Login" name="submit" />
                
            </form>
        </div>
        <p>Si es La primera Vez Que Ingresa, Registrese por favor</p>

        <a href="?c=Usuarios&a=vista">
            <button>Registro</button></a>


</body>

</html>