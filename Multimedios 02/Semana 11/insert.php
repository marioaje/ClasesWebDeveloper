<?php
    include_once 'config/config.php';
    include_once 'libs/database.php';
    include_once 'carro.php';

    $conn = new Database();

    //var_dump(  $conn->connect()->query("SELECT * FROM `carros`"));
    $query = $conn->connect()->query("SELECT * FROM `carros`");
    $items = [];

    while ($row = $query->fetch()){
        $item = new Carro();               
        $item->IdCarro = $row['IdCarro'];
        $item->IdCedula = $row['IdCedula'];
        $item->Marca = $row['Marca'];
        $item->Modelo = $row['Modelo'];
        $item->Anho = $row['Anho'];
        $item->Nombre = $row['Nombre'];
        $item->PrimerApellido = $row['PrimerApellido'];
        $item->SegundoApellido = $row['SegundoApellido'];
        $item->Placa = $row['Placa'];

        array_push($items, $item);
    }
    var_dump($items);
?>