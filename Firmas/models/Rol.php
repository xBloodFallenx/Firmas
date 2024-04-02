<?php
class Rol{
    private $dbh;
    private $RolCode;
    private $RolName;


    public function __construct(){
        try {
            $this->dbh = DataBase::connection();
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this, $f = '__construct' . $i)) {
                call_user_func_array(array($this, $f), $a);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        } 
    }

    
    public function __construct2($RolCode, $RolName){
        $this->RolCode = $RolCode;
        $this->RolName = $RolName;
    }
    // Métodos set() y get()        
    # rolCode: set()
    public function setRolCode($RolCode){
        $this->RolCode = $RolCode;
    }
    # rolCode: get()
    public function getRolCode(){
        return $this->RolCode;
    }        
    # rolName: set()
    public function setRolName($RolName){
        $this->RolName = $RolName;
    }
    # rolName: get()
    public function getRolName(){
        return $this->RolName;
    }

    public function getRolById($RolCode){
        try {
            $sql = "SELECT * FROM ROL WHERE Rol_code=:rolCode";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('RolCode', $RolCode);
            $stmt->execute();                
            $rolDb = $stmt->fetch();                
            $rol = new Rol(
                $rolDb['Rol_code'],
                $rolDb['Rol_name']
            );                
            return $rol;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}



?>