<!DOCTYPE html>
<html>
<head>
 <title>Firma Digital</title>
 <link rel="stylesheet" href="asset\css\firma.css" />
</head>
<body>
 <main>
  <header>
   <h1>Firma Digital</h1>
  </header>

  <div class="container-fluid">
   <div class="alert alert-success" role="alert">
  
   </div>
   


   <img src="asset/firmas/firma_<?php echo $_SESSION['idusuario']; ?>.JPEG" alt="Firma digital">

    <a href="asset/firmas/firma_<?php echo $_SESSION['idusuario']; ?>.JPEG" download="firma_<?php echo $_SESSION['idusuario']; ?>.JPEG">
    <button> Descargar Firma </button></a>

    <a href="?c=Usuarios&a=vista4">
            <button>Menu Principal</button></a>
  </div>
 </main>
</body>
</html>
