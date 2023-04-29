<?php

include_once 'class/user.php';

class LoginModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function autenticar($datos){
    
        $item = new User();

        $queryString = "SELECT `IdUser`, `IdPersonal`, `FirtsName`, `LastName`, `Email`, 
        `UserName`, `IdRol`, `CreatedAt`, `UpdatedAt`, `Enabled` FROM `user`
         WHERE `Email` = :Email AND `Password` = :Password  AND `Enabled` = 1 ;";
        
        $query = $this->db->connect()->prepare($queryString);

        $query->execute($datos);

        try {
            while ( $row = $query->fetch() ){
                $item->IdUser = $row["IdUser"];
                $item->IdPersonal = $row["IdPersonal"];
                $item->FirtsName = $row["FirtsName"];
                $item->LastName = $row["LastName"];
                $item->Email = $row["Email"];
                $item->UserName = $row["UserName"];
                $item->IdRol = $row["IdRol"];
                $item->UpdatedAt = $row["UpdatedAt"];
                $item->CreatedAt= $row["CreatedAt"];
                $item->Enabled = $row["Enabled"];
            }

            return $item;
        } catch (PDOException $th) {
            return [];
        }


    }

}

?>

<!-- SELECT `IdUser`, `IdPersonal`, `FirtsName`, `LastName`, `Email`, 
`UserName`, `IdRol`, `CreatedAt`, `UpdatedAt`, `Enabled` FROM `user`
 WHERE `UserName` = '' AND `Password` = ''1 AND `Enabled` -->