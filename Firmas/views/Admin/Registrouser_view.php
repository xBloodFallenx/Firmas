<!DOCTYPE html>
<html>

<head>
    <title>Generador de Firma</title>
    <link rel="stylesheet" href="asset\css\style.css" />
</head>

<body>
    <main>
        <header>
            <h1>Generador de Firma</h1>
        </header>
        <div class="container-fluid">
            <form action="?c=Usuarios&a=RegistrarUser" method="post">
                <input type="hidden" name="idusuario" value="<?php echo $_SESSION['idusuario'] ?>">
                <p>Primer Nombre</p>
                <input type="text" id="Primer_Nombre" name="Primer_Nombre" placeholder="Primer Nombre" required /><br /><br />

                <p>Segundo Nombre</p>
                <input type="text" id="Segundo_Nombre" name="Segundo_Nombre" placeholder="Segundo Nombre" /><br /><br />

                <p>Primer Apellido</p>
                <input type="text" id="Primer_Apellido" name="Primer_Apellido" placeholder="Primer Apellido" required /><br /><br />

                <p>Segundo Apellido</p>
                <input type="text" id="Segundo_Apellido" name="Segundo_Apellido" placeholder="Segundo Apellido" /><br /><br />

                <p>Dirección</p>
                <input type="text" id="direccion" name="direccion" placeholder="Dirección" required /><br /><br />
                <div class="telgrup">
                <p>Telefono</p>
                <input type="tel" id="Telefono_Cor" name="Telefono" placeholder="Teléfono Corporativo" pattern="[0-9]{0,7}" title="Por favor, ingresa exactamente 7 números" maxlength="7" /><br /><br />

                <p>Celular Corporativo</p>
                <input type="tel" id="Celular" name="Celular" placeholder="Celular Corporativo" pattern="[0-9]{0,10}" title="Por favor, ingresa exactamente 10 números" required maxlength="10" /><br /><br />

                <p>Extención</p>
                <input type="tel" id="Ext" name="Ext" placeholder="Extención" pattern="[0-9]{0,4}" title="Por favor, ingresa exactamente 4 números" maxlength="4" /><br /><br />
</div>
                <p>Selecciona Una Ciudad</p>
                <select name="idciudad" required>
                    <option disabled selected value=""></option>
                    <option value="1">Bogotá</option>
                    <option value="2">Cali</option>
                    <option value="3">Medellin</option>
                    <option value="4">Armenia</option>
                    <option value="5">Manizales</option>
                </select>
                <br /><br />
                <p>Seleccione El Indicativo</p>
                <select name="Indicativo">
                    <option disabled selected value=""></option>
                    <option value="601">Bogotá - 601</option>
                    <option value="602">Cali - 602</option>
                    <option value="604">Medellin - 604</option>
                    <option value="606">Armenia - 606</option>
                    <option value="608">Manizales - 608</option>
                </select>
                <br /><br />
    <p>Seleccione Su Cargo</p>
                <select name="idcargo" id="idcargo">
                    <option value=""></option>
                    <?php foreach ( $this->model->obtenerCargos() as $r) : ?>
                    <option value="<?php echo $r->idcargo; ?>"> <?php echo $r->Nombre_Cargo; ?>  </option>
                    <?php endforeach; ?>
                </select>
                <br /><br />
            

                <input type="text" id="Usuario" name="Usuario" placeholder="Usuario" required /><br /><br />

            <p>Contraseña</p>
            <input type="password" id="Password" name="Password" placeholder="Contraseña" required /><br /><br />

            <input type="submit" value="Registrar Usuario" />
                        
            </form>
            <a href="<?php echo ($_SESSION['Rol_code'] == 1) ? '?c=Login&a=redireccionarUser' : '?c=Login&a=redireccionarAdmin'; ?>">
    <button>Menu Principal</button>
</a>

        </div>
        
    </main>
</body>

</html>
