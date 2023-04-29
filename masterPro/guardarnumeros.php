<?php
    session_start();

    if ($_SESSION["Enabled"] != 1){
        header('Location: index.php');
    }
    include_once('common/database.php');
    include_once('class/numerotabla.php');


    $sepparator = '-';
    $parts = explode($sepparator, $_REQUEST["fechabuscar"]);

    $anho =  substr($parts[0], 0,2) + substr($parts[0], 2,3);
    //echo $anho;
    $Codigo = $anho;
    $diames = $parts[2] + $parts[1];   
    $diames = $diames > 9 ? $diames : '0'.$diames;

    $datos["fecha"] =  $_REQUEST["fechabuscar"];
    $datos["id"] =  $_REQUEST["id"]?: 0;
    $datos["suma"] =  $diames;
    $datos["nica11"] =  $_REQUEST["nica11"];
    $datos["nica03"] =  $_REQUEST["nica03"];
    $datos["nica06"] =  $_REQUEST["nica06"];
    $datos["nica09"] =  $_REQUEST["nica09"];
    $datos["tica01"] =  $_REQUEST["tica01"];
    $datos["tica0430"] =  $_REQUEST["tica0430"];
    $datos["tica0730"] =  $_REQUEST["tica0730"];
    $datos["primera10"] =  $_REQUEST["primera10"];
    $datos["primera06"] =  $_REQUEST["primera06"];

    // $connect=connect();  

    if ( $datos["id"] == 0 ){
        echo "insert";
    }
    else{
        echo "no insert";
    }

    header("Location:".$_SERVER[HTTP_REFERER].");
    // $stringSQL = 'INSERT INTO 
    // `resultados`(`id`, `fecha`, `suma`, `nica11`, `nica03`, `nica06`, `nica09`, `tica01`, `tica0430`, `tica0730`, `primera10`, `primera06`) VALUES (:id, :fecha, :suma, :nica11, :nica03, :nica06, :nica09, :tica01, :tica0430, :tica0730, :primera10, :primera06 )';
    
    // $thearray = (array) $datos;

    // $query = $connect->prepare($stringSQL);
    
    // $result = $query->execute($thearray); //$result = true/false on success or error respectively.
    // if ($result) {
    //     sendResponse(200, $result , 'Curso Registration Successful.');
    // } else {
    //     sendResponse(404, [] ,'Curso not Registered');
    // }
 //echo $datos["id"];
//  //close connection
//$conn->close();

?>

