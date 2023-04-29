<?php
include_once 'class/user.php';

class UsersModel extends Model {
    public function __construct(){
        parent::__construct();
    }

    public function insertUsuario($datos){
        $datos["Password"] = md5(123);
        try{
            $stringSQL = 'INSERT INTO `user`(`IdUser`, `IdPersonal`, `FirtsName`, `LastName`, `Email`, `UserName`, `Password`, `IdRol`, `CreatedAt`, `EnabledUser`) VALUES ( :IdUser, :IdPersonal, :FirtsName, :LastName, :Email, :UserName, :Password, :IdRol, now(), :EnabledUser);';
            
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute($datos);
            return true;
        }catch(PDOException $e){
            //print_r('Error connection: ' . $e->getMessage());
            return false;
        }    
    }

    public function get(){
        $items = [];
        try{
            $stringSQL = "SELECT * FROM `user`";
            $query = $this->db->connect()->query($stringSQL);
           
            while ($row = $query->fetch()){
                $item = new Users();
                
                foreach ($row as $key => $value) {
                    $item->$key = $value; 
                }

                array_push($items, $item);
            }
            
            return $items;

        }catch(PDOException $e){
            return [];
        }

    }

    public function getByIdUsuario($id){
        $item = new Users();

        $stringSQL = "SELECT * FROM `user` WHERE `IdUser` = :IdUser";
        $query = $this->db->connect()->prepare($stringSQL);
        
        try {
            $query->execute(['IdUser'=>$id]);

            while ($row = $query->fetch()){
                foreach ($row as $key => $value) {
                    $item->$key = $value; 
                }
            }

            return $item;
        }catch(PDOException $e){
            return [];
        }
    }

    public function updateByIdUsuario($datos){
        try{
            
            $stringSQL = "UPDATE `user` SET `FirtsName`=:FirtsName,`LastName`=:LastName,`Email`=:Email, `IdPersonal`=:IdPersonal  WHERE IdUser=:IdUser;";
            
            $query = $this->db->connect()->prepare($stringSQL);
            
            $query->execute($datos);
            return true;
        }catch(PDOException $e){
            //print_r('Error connection: ' . $e->getMessage());
            return false;
        }
    }

    public function deleteByIdUsuario($id){
        try{
            $stringSQL = "DELETE FROM `user` WHERE `IdUser`= :IdUser;";
            $query = $this->db->connect()->prepare($stringSQL);
            
            $query->execute(['IdUser'=>$id]);
            return true;
        }catch(PDOException $e){
            //print_r('Error connection: ' . $e->getMessage());
            return false;
        }
    }   
}


?>