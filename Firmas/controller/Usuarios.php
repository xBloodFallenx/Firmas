<?php

session_start();


require_once "models/Usuario.php"; 

class Usuarios
{
  private $model;

  public function __CONSTRUCT()
  {
    $this->model = new Usuario(); 
  }

  public function main()
  {
    
require_once "views/login_view.php";
require_once "views/module/footer.php";
  }

  public function vista()
  {
   
  
    require_once "views/registro_view.php"; 
    require_once "views/module/footer.php";
    
  }

  public function vista2(){
    require_once "views\module\header.php";
    require_once "views/formulario.php";
    require_once "views/module/footer.php";
  }

  public function vista3(){
    require_once "views\module\header.php";
    require_once "views/firma_view.php";
    require_once "views/module/footer.php";
    
  }

  public function vista4(){
    require_once "views\module\header.php";
    require_once "views/Menu_view.php";
    require_once "views/module/footer.php";
  }

  public function vista5(){
    require_once "views/module/header.php";
      require_once "views\Admin\Registrouser_view.php";
      require_once "views/module/footer.php";
  }

  
  
  
  public function Eliminar()
  {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $idUsuario = $_GET['id'];
        
        $this->model->Eliminar($idUsuario);
        
        header("Location: ?c=Usuarios&a=ListarUsuarios");
        exit; // Termina la ejecución del script después de redirigir
    } else {
        // Si no se proporcionó un ID válido, muestra un mensaje de error o maneja la situación según corresponda
        echo "Error: No se proporcionó un ID válido para eliminar el usuario.";
    }
}
  
  
  public function registroLogin(){
    $alm = new Usuario();
    $alm->Usuario = $_REQUEST['Usuario'];
    $alm->Password = $_REQUEST['Password'];
    $this->model->Registro($alm);
    
    header('Location:?c=Usuarios&a=main');
    
  }

  public function ListarUsuarios()
  {
   
      $usuarios = $this->model->Listar();
      
      require_once "views\module\header.php";
      require_once "views/Admin/manage_user.php";
      require_once "views/module/footer.php";
  }
  
  public function actualizar()
  {
      if (isset($_GET['id']) && !empty($_GET['id'])) {
          $idUsuario = $_GET['id'];
          
 
          $usuario = $this->model->Obtener($idUsuario);
          
         
          require_once "views\Admin\Actualizar.php";
      } else {
          
          echo "Error: No se proporcionó un ID válido para actualizar el usuario.";
      }
  }
  
  public function actualizarUsuario()
  {
      // Obtener los datos del formulario de actualización
      $alm = new Usuario();
      $alm->idusuario = $_REQUEST['idusuario'];
      $alm->Primer_Nombre = $_REQUEST['Primer_Nombre'];
      $alm->Segundo_Nombre = $_REQUEST['Segundo_Nombre'];
      $alm->Primer_Apellido = $_REQUEST['Primer_Apellido'];
      $alm->Segundo_Apellido = $_REQUEST['Segundo_Apellido'];
      $alm->direccion = $_REQUEST['direccion'];
      $alm->Telefono = $_REQUEST['Telefono'];
      $alm->Celular = $_REQUEST['Celular'];
      $alm->Ext = $_REQUEST['Ext'];
      $alm->Indicativo = $_REQUEST['Indicativo'];
      $alm->idciudad = $_REQUEST['idciudad'];
      $alm->idcargo = $_REQUEST['idcargo'];
  

      $this->model->Actualizar($alm);
  
      header("Location: ?c=Usuarios&a=ListarUsuarios");
  }
  


public function RegistrarUser(){
  $alm = new Usuario();
  $alm->idusuario = $_REQUEST['idusuario'];
  $alm->Primer_Nombre = $_REQUEST['Primer_Nombre'];
  $alm->Segundo_Nombre = $_REQUEST['Segundo_Nombre'];
  $alm->Primer_Apellido = $_REQUEST['Primer_Apellido'];
  $alm->Segundo_Apellido = $_REQUEST['Segundo_Apellido'];
  $alm->direccion = $_REQUEST['direccion'];
  $alm->Telefono = $_REQUEST['Telefono'];
  $alm->Celular = $_REQUEST['Celular'];
  $alm->Ext = $_REQUEST['Ext'];
  $alm->Indicativo = $_REQUEST['Indicativo'];
  $alm->idciudad = $_REQUEST['idciudad'];
  $alm->idcargo = $_REQUEST['idcargo'];
  $alm->Password = $_REQUEST['Password'];
  $alm->Usuario = $_REQUEST['Usuario'];
  
  $this->model->RegisUser($alm);



  header('Location:?c=Usuarios&a=ListarUsuarios');
}


  
  
  public function Registrar()
{
    $alm = new Usuario();
    $alm->idusuario = $_REQUEST['idusuario'];
    $alm->Primer_Nombre = $_REQUEST['Primer_Nombre'];
    $alm->Segundo_Nombre = $_REQUEST['Segundo_Nombre'];
    $alm->Primer_Apellido = $_REQUEST['Primer_Apellido'];
    $alm->Segundo_Apellido = $_REQUEST['Segundo_Apellido'];
    $alm->direccion = $_REQUEST['direccion'];
    $alm->Telefono = $_REQUEST['Telefono'];
    $alm->Celular = $_REQUEST['Celular'];
    $alm->Ext = $_REQUEST['Ext'];
    $alm->Indicativo = $_REQUEST['Indicativo'];
    $alm->idciudad = $_REQUEST['idciudad'];
    $alm->idcargo = $_REQUEST['idcargo'];

    $rutaFirma = "asset/firmas/firma_" . $alm->idusuario . ".jpeg";

    $this->crearFirma($alm, $rutaFirma);
;

    $this->model->Actualizar($alm);

    header("Location:?c=Usuarios&a=vista3");
}

private function crearFirma($alm, $rutaFirma)
{
   
    $ciudad = $this->model->NombreCiudadPorId($alm->idciudad);
    $cargo = $this->model->NombreCargoPorId($alm->idcargo);

    $rutaPlantilla = "asset/img/firma.jpeg";
    $imagenPlantilla = imagecreatefromjpeg($rutaPlantilla);
   
    $colorTexto = imagecolorallocate($imagenPlantilla, 18, 78, 138);
    $colorNegro = imagecolorallocate($imagenPlantilla, 0, 0, 0); 
    $colorTexto1 = imagecolorallocate($imagenPlantilla,12, 115, 188);

    $fuente = 'asset/Fonts/RobotoRegular.ttf';

    // Coordenadas iniciales Primer Nombre
    $posY1 = 40;

    $posY7 = 20;
    $posX7 = 73;
    // Coordenadas iniciales Dirección
    $posY3 = 102;

    // Coordenadas iniciales para Teléfono y Extensión
    $posY4 = 125;

    // Coordenadas iniciales para Celular
    $posY5 = 155;

    // Coordenadas iniciales para Ciudad
    $posY6 = 180;


    // Espacio entre líneas
    $espacioLinea = 25;

    // Agrega el texto del primer nombre del usuario a la imagen
    $textoNombreCompleto = $alm->Primer_Nombre . " " . $alm->Segundo_Nombre . " " . $alm->Primer_Apellido . " " . $alm->Segundo_Apellido;
    $text_length = imagettfbbox(12, 0, $fuente, $textoNombreCompleto);
    $text_width = $text_length[2] - $text_length[0];
    $posX1 = max(20, 40 - $text_width / 2); 
    imagettftext($imagenPlantilla, 12, 0, $posX1, $posY1, $colorTexto, $fuente, $textoNombreCompleto);

// Agrega Texto Para Cargo


imagettftext($imagenPlantilla, 12, 0, $posY7,$posX7, $colorTexto1, $fuente, $cargo);


    // Agrega el texto de la dirección a la imagen

// Agrega el texto de la dirección a la imagen
$textoDireccion = $alm->direccion;
$text_length = imagettfbbox(12, 0, $fuente, $textoDireccion);
$text_width = $text_length[2] - $text_length[0];
$posX3 = max(200, 790 - $text_width); 
imagettftext($imagenPlantilla, 12, 0, $posX3, $posY3, $colorNegro, $fuente, $textoDireccion);




if (!empty($alm->Telefono) && !empty($alm->Ext)) {
 
  $telefonoConPrefijo = "(+57)" . $_REQUEST['Indicativo'] . " " . $alm->Telefono . " - EXT " . $alm->Ext;
} elseif (!empty($alm->Telefono)) {
  
  $telefonoConPrefijo = "(+57)" . $_REQUEST['Indicativo'] . " " . $alm->Telefono;
} elseif (!empty($alm->Ext)) {

  $telefonoConPrefijo = "EXT " . $alm->Ext;
} else {
  $telefonoConPrefijo = "";
}
imagettftext($imagenPlantilla, 12, 0, 590, $posY4, $colorNegro, $fuente, $telefonoConPrefijo);




    // Agrega el texto del celular a la imagen
    imagettftext($imagenPlantilla, 12, 0, 702, $posY5, $colorNegro, $fuente, $alm->Celular);


$ciudad = $this->model->NombreCiudadPorId($alm->idciudad);

if (!empty($ciudad)) {
    $text_length = imagettfbbox(12, 0, $fuente, $ciudad . " - Colombia");
    $text_width = $text_length[2] - $text_length[0];

    $posX3 = max(640, 790 - $text_width);

    // Agregar el texto de la ciudad a la imagen
    imagettftext($imagenPlantilla, 12, 0, $posX3, $posY6, $colorNegro, $fuente, $ciudad . " - Colombia");
} else {
    // Si no se pudo obtener el nombre de la ciudad, muestra un mensaje de error o maneja la situación según corresponda
    echo "Error: No se pudo obtener el nombre de la ciudad.";
}

    // Guarda la imagen de la firma en la ruta especificada
    imagejpeg($imagenPlantilla, $rutaFirma);

    // Libera la memoria utilizada por la imagen
    imagedestroy($imagenPlantilla);
}

}
?>
