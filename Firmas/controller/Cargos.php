<?php

require_once "models/Usuario.php"; 

class Cargos
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Usuario(); 
    }

    public function optenercargos(){
        $cargos = $this->model->obtenerCargos();
        // Ahora puedes usar $cargos en tu vista
    }

    public function vistacargo(){
        require_once "views\module\header.php";
        require_once "views\Admin\AgregarCargos.php";
        require_once "views/module/footer.php";
    }

    public function CrearCargo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre_cargo']) && !empty($_POST['nombre_cargo'])) {
                $nombreCargo = $_POST['nombre_cargo'];
                $this->model->RegistroCargo($nombreCargo);

            ?>
          <script language='JavaScript'>
            alert("Cargo Creado");
            location.href = "?c=Login&a=redireccionarAdmin";
          </script>
          <?php

                
                exit;
            } else {
                echo "Error: No se proporcionó el nombre del cargo.";
            }
        } else {
            echo "Error: Método HTTP incorrecto.";
        }
    }
}
?>
