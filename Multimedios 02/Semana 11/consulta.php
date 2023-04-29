<?php
    include_once  'config/config.php';
    include_once  'libs/database.php';
    include_once  'class/user.php';

    $conn = new Database();

    $queryString = "SELECT * FROM `user`;";

    $items = [];

    $query = $conn->connect()->query($queryString);

    while ( $row = $query->fetch() ){
        $item = new User();
        $item->IdUser = $row["IdUser"];
        $item->IdPersonal = $row["IdPersonal"];
        $item->FirtsName = $row["FirtsName"];
        $item->LastName = $row["LastName"];
        $item->Email = $row["Email"];
        $item->UserName = $row["UserName"];
        $item->Password = $row["Password"];
        $item->IdRol = $row["IdRol"];
        $item->UpdatedAt = $row["UpdatedAt"];
        $item->CreatedAt= $row["CreatedAt"];
        $item->Enabled = $row["Enabled"];

        array_push($items, $item);
        
    }

    var_dump($items);

?>
       