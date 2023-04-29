<?php
    include_once  'config/config.php';
    include_once  'libs/database.php';
    include_once  'class/user.php';
    
    try {
        $conn = new Database();

        $objUser = new User();

        // $objUser->IdUser = 0;
        // $objUser->IdPersonal = '1230';
        // $objUser->FirtsName =  'Mario';
        // $objUser->LastName = 'Jimenez';
        // $objUser->Email =  'marioaje@gmail.com';
        // $objUser->UserName = 'marioaje';
        // $objUser->Password = '1234567890';
        // $objUser->IdRol = 1;
        // $objUser->CreatedAt = 'now()';
        // $objUser->UpdatedAt = "";
        // $objUser->Enabled = 1;

        $queryString = "INSERT INTO `user`(`IdUser`, `IdPersonal`, `FirtsName`, `LastName`, `Email`, `UserName`, `Password`, `IdRol`, `CreatedAt`, `Enabled`) 
        VALUES (:IdUser, :IdPersonal, :FirtsName, :LastName, :Email, :UserName, :Password, :IdRol, :CreatedAt, :Enabled)";

        $query = $conn->connect()->prepare($queryString);

       // $query->execute($objUser);

    } catch (Throwable $th) {
        echo "Error generico: ";
    }

?>