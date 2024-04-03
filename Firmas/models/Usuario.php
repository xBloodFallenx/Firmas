<?php

class Usuario
{

  private $pdo;
  public $idusuario;
  public $Primer_Nombre;
  public $Segundo_Nombre;
  public $Primer_Apellido;
  public $Segundo_Apellido;
  public $direccion;
  public $Telefono;
  public $Celular;
  public $Ext;
  public $Indicativo;
  public $idciudad;
  public $idcargo;
  public $Usuario;
  public $Password;
  public $Rol_code ;


  
//conexion a la base de datos
  public function __CONSTRUCT()
  {
    try {
      $this->pdo = Database::conn();
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function obtenerCargos()
  {
      try {
          $stm = $this->pdo->prepare("SELECT * FROM cargo");
          $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";{
          die($e->getMessage());
      }
  }}




    //Registrar  Nuevo Cargo

    public function RegistroCargo($nombreCargo){
      try {
          $sql = "INSERT INTO cargo (Nombre_Cargo) VALUE (?)";
  
          $this->pdo->prepare($sql)->execute([$nombreCargo]);
      } catch (Exception $e) {
          die($e->getMessage());
      }
  }


  public function Listar()
  {
      try {
          $result = array();
          $stm = $this->pdo->prepare("SELECT u.*, c.Nombre_Ciudad AS nombre_ciudad, ca.Nombre_Cargo AS nombre_cargo, r.Rol_Name AS nombre_rol 
          FROM usuario u 
          LEFT JOIN ciudad c ON u.idciudad = c.idciudad 
          LEFT JOIN cargo ca ON u.idcargo = ca.idcargo 
          LEFT JOIN rol r ON u.Rol_code = r.Rol_code 
          ORDER BY u.idusuario ASC
          ");
          $stm->execute();  
  
          $usuarios = $stm->fetchAll(PDO::FETCH_OBJ);
  
          return $usuarios;
      } catch (Exception $e) {
          die($e->getMessage());
      }
  }

  public function Obtener($id)
  {
    try {
      $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE idusuario = ?");
      $stm->execute(array($id));
      return $stm->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }


  //obtener los datos de la ciudad y el cargo 

  public function NombreCiudadPorId($idciudad)
{
    try {
        $stm = $this->pdo->prepare("SELECT nombre_ciudad FROM ciudad WHERE idciudad = ?");
        $stm->execute(array($idciudad));
        $ciudad = $stm->fetch(PDO::FETCH_ASSOC);
        return $ciudad['nombre_ciudad'];
    } catch (Exception $e) {
        die($e->getMessage());
    }

}

public function NombreCargoPorId($idcargo)
{
    try {
        $stm = $this->pdo->prepare("SELECT nombre_cargo FROM cargo WHERE idcargo = ?");
        $stm->execute(array($idcargo));
        $cargo = $stm->fetch(PDO::FETCH_ASSOC);
        return $cargo['nombre_cargo']; 
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


  //registrar solo susuario y contraseña

  public function Registro(Usuario $data){
    try {
      $sql = "INSERT INTO usuario (usuario, Password, Rol_code) 
      VALUE (?, ?, ?);";  // Agrega Rol_code a la consulta

$this->pdo->prepare($sql)
->execute(
  array(
    $data->Usuario,
    $data->Password,
    "1"  
  )
  );}
  catch (Exception $e) {
    die($e->getMessage());
  }}


  //registro Uusuarios Administrator

  public function RegisUser(Usuario $data){
    try {
      $sql = "INSERT INTO usuario (
                Primer_Nombre,
                Segundo_Nombre,
                Primer_Apellido,
                Segundo_Apellido,
                direccion,
                Telefono,
                Celular,
                Ext,
                Indicativo,
                idciudad,
                idcargo,
                Usuario,
                Password
              )
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

      $this->pdo->prepare($sql)
        ->execute(
          array(
            $data->Primer_Nombre,
            $data->Segundo_Nombre,
            $data->Primer_Apellido,
            $data->Segundo_Apellido,
            $data->direccion,
            $data->Telefono,
            $data->Celular,
            $data->Ext,
            $data->Indicativo,
            $data->idciudad,
            $data->idcargo,
            $data->Usuario,
            $data->Password
          )
        );

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }








  public function UserCreate(Usuario $data)
  {
    try {
      $sql = "INSERT INTO usuario (
                Primer_Nombre,
                Segundo_Nombre,
                Primer_Apellido,
                Segundo_Apellido,
                direccion,
                Telefono,
                Celular,
                Ext,
                Indicativo,
                idciudad,
                idcargo,
                Usuario,
                Password
              )
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

      $this->pdo->prepare($sql)
        ->execute(
          array(
            $data->Primer_Nombre,
            $data->Segundo_Nombre,
            $data->Primer_Apellido,
            $data->Segundo_Apellido,
            $data->direccion,
            $data->Telefono,
            $data->Celular,
            $data->Ext,
            $data->Indicativo,
            $data->idciudad,
            $data->idcargo,
            $data->Usuario,
            $data->Password
          )
        );

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Eliminar($id)
  {
    try {
      $stm = $this->pdo->prepare("DELETE FROM usuario WHERE idusuario = ?;");
      $stm->execute(array($id));
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Actualizar($data)
  {
    try {
      $sql = "UPDATE usuario SET
                Primer_Nombre = ?,
                Segundo_Nombre = ?,
                Primer_Apellido = ?,
                Segundo_Apellido = ?,
                direccion = ?,
                Telefono = ?,
                Celular = ?,
                Ext = ?,
                Indicativo = ?,
                idciudad = ?,
                idcargo = ?
              WHERE idusuario = ?;";

      $this->pdo->prepare($sql)
        ->execute(
          array(
            $data->Primer_Nombre,
            $data->Segundo_Nombre,
            $data->Primer_Apellido,
            $data->Segundo_Apellido,
            $data->direccion,
            $data->Telefono,
            $data->Celular,
            $data->Ext,
            $data->Indicativo,
            $data->idciudad,
            $data->idcargo,
            $data->idusuario
          )
        );
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  

}
