<?php

require_once "models\DataBase.php";
class Login
{
  private $pdo;

  public function __construct()
  {
    try {
      $this->pdo = DataBase::conn();
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function redireccionarUser(){
    require_once "views/module/header.php";
      require_once "views\Menu_view.php";
      require_once "views/module/footer.php";
  }

  public function redireccionarAdmin(){
    require_once "views/module/header.php";
      require_once "views\Admin\admin_home.php";
      require_once "views/module/footer.php";
  }


  //redirecicono al controlador main
  public function main()
  {
      if (session_start() == true) {
          session_unset();
          session_destroy();
      }
    require_once "views/login_view.php";
    require_once "views/module/footer.php";
  }

  public function login()
  {
    if ($_POST) {
      session_start();

      try {
        $user = $_POST['Usuario'];
        $pass = $_POST['Password'];

        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE Usuario = :user AND Password = :pass");
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

   

        if ($usuario) { 
          $_SESSION['idusuario'] = $usuario['idusuario'];
          $_SESSION['Rol_code'] = $usuario['Rol_code'];

          if (intval($_SESSION['Rol_code']) === 1) {
            header('location: ?c=Login&a=redireccionarUser');
            
          } else {
            header('location: ?c=Login&a=redireccionarAdmin');
         
          }
        } else {
          ?>
          <script language='JavaScript'>
            alert("Acceso denegado");
            location.href = "?c=Usuarios&a=main";
          </script>
          <?php
        }
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }
  }

  
 

}

?>
