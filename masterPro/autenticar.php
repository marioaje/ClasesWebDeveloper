<?php

session_start();

include_once('common/database.php');
include_once('class/user.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $item = new User();

    $queryString = "SELECT `IdUser`, `IdPersonal`, `FirtsName`, `LastName`, `Email`, 
    `UserName`, `IdRol`, `CreatedAt`, `UpdateAt`, `EnabledUser` FROM `user`
     WHERE `Email` = :Email AND `Password` = :Password  AND `EnabledUser` = 1 ;";
    //var_dump($datos);
    $query = connect()->prepare($queryString);
    $datos["Password"] = md5($_REQUEST["Password"]);
    $datos["Email"] = $_REQUEST["Email"];
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
            $item->UpdatedAt = $row["UpdateAt"];
            $item->CreatedAt= $row["CreatedAt"];
            $item->Enabled = $row["EnabledUser"];
        }
        if ( $item->Enabled == Null){
            header('Location: index.php');
        }else{
            $_SESSION["Enabled"] = $item->Enabled;
            header('Location: main.php');
        }

        return $item;
    } catch (PDOException $th) {

        return [];
    }


}

?>