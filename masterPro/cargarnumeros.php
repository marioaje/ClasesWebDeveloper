<?php
    session_start();

    if ($_SESSION["Enabled"] != 1){
        header('Location: index.php');
    }
    include_once('common/database.php');
    include_once('class/numerotabla.php');


    $fecha = '2022-09-01';
    //$fecha =  $_REQUEST["fechabuscar"];
    $queryString = "SELECT `id`, `fecha`, `suma`, `nica11`, `nica03`, `nica06`, `nica09`, `tica01`, `tica0430`,
    `tica0730`, `primera10`, `primera06` FROM `resultados` WHERE fecha=:fecha  ;";

    $query = connect()->prepare($queryString);
    $datos["fecha"] = $fecha;
    
    $query->execute($datos);

    try {
        if ($query->rowCount() > 0) {
            $items = [];
            while ($row = $query->fetch()) {
            $item = new Numerotabla();
                foreach ($row as $key => $value) {
                    $item->$key = $value;
                    
                }
                array_push($items,$item);
            //var_dump( $items );
            }
            sendResponse(200,$items,'Numeros');
        }   
        else{
            sendResponse(400,$items,'Sin numeros');
        } 
    } catch (PDOException $th) {

        return [];
    }       
?>