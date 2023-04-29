<?php
include_once 'config/config.php';
include_once 'libs/database.php';

try {
    $conn = new Database();

    // $arreglo = [
    //     all;
    // ]

    $queryString ="INSERT INTO `user`(`IdUser`, `IdPersonal`, `FirtsName`, 
    `LastName`, `Email`, `UserName`, `Password`, `IdRol`, `CreatedAt`,  `Enabled`) 
    VALUES ( :IdUser, :IdPersonal, :FirtsName, :LastName, :Email, :UserName, :Password,
      :IdRol, :CreatedAt, :Enabled )";



} catch (\Throwable $th) {
    //throw $th;
}

?>