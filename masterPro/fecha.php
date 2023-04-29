<?php
  session_start();

  if ($_SESSION["Enabled"] != 1){
    header('Location: index.php');
  }
  include_once('common/database.php');
  include_once('class/numerotabla.php');

    $fechabuscar =  $_REQUEST["fechabuscar"];
    $sepparator = '-';
    $parts = explode($sepparator, $fechabuscar);
    //echo $parts[2];//day
    //echo $parts[1];//month
    
    $anho =  substr($parts[0], 0,2) + substr($parts[0], 2,3);
    //echo $anho;
    $Codigo = $anho;
    $diames = $parts[2] + $parts[1];   
    $diames = $diames > 9 ? $diames : '0'.$diames;

    $item = new Numerotabla();

    $queryString = "SELECT `id`, `fecha`, `suma`, `nica11`, `nica03`, `nica06`, `nica09`, `tica01`, `tica0430`,
     `tica0730`, `primera10`, `primera06` FROM `resultados` WHERE suma=:suma  order by `fecha` desc ;";
    
    $query = connect()->prepare($queryString);
    $datos["suma"] = $diames;
    
    $query->execute($datos);
    $tablaResultado ="";
    try {
        if ($query->rowCount() > 0) {
            while($row = $query->fetch()) {  
                
                $tablaResultado .= 
                '<tr>                        
                        <td >'.$row["fecha"].' Dia '.date('l', strtotime($row["fecha"])).'</td>                
                        <td id="'.$row["nica11"].'">'.$row["nica11"].'</td>
                        <td id="'.$row["nica03"].'">'.$row["nica03"].'</td>
                        <td id="'.$row["nica06"].'">'.$row["nica06"].'</td>
                        <td id="'.$row["nica09"].'">'.$row["nica09"].'</td>
                        <td id="'.$row["tica01"].'">'.$row["tica01"].'</td>
                        <td id="'.$row["tica0430"].'">'.$row["tica0430"].'</td>
                        <td id="'.$row["tica0730"].'">'.$row["tica0730"].'</td>            
                </tr>'  ;
                //<td id="'.$row["id"].'">'.$row["id"].'</td>
               //<td id="'.$row["primera10"].'">'.$row["primera10"].'</td>
              //<td id="'.$row["primera06"].'">'.$row["primera06"].'</td>     
                        //     $item->id = $row["id"];
        //     $item->fecha = $row["fecha"];
        //     $item->suma = $row["suma"];
        //     $item->nica11 = $row["nica11"];
        //     $item->nica03 = $row["nica03"];
        //     $item->nica06 = $row["nica06"];
        //     $item->nica09 = $row["nica09"];
        //     $item->tica01 = $row["tica01"];
        //     $item->tica0430 = $row["tica0430"];
        //     $item->tica0730= $row["tica0730"];
        //     $item->primera10 = $row["primera10"];
        //     $item->primera06 = $row["primera06"];          
                
                // $items = [];
                // foreach ($row as $key => $value) {                    
                //     $item->$key = $value;           
                // }           
                // array_push($items,$item);
            }
            echo $tablaResultado;
            //var_dump($items);
        }else{
            echo "Sin datos";
        }
        
        // while ( $row = $query->fetch() ){
        //     $item->id = $row["id"];
        //     $item->fecha = $row["fecha"];
        //     $item->suma = $row["suma"];
        //     $item->nica11 = $row["nica11"];
        //     $item->nica03 = $row["nica03"];
        //     $item->nica06 = $row["nica06"];
        //     $item->nica09 = $row["nica09"];
        //     $item->tica01 = $row["tica01"];
        //     $item->tica0430 = $row["tica0430"];
        //     $item->tica0730= $row["tica0730"];
        //     $item->primera10 = $row["primera10"];
        //     $item->primera06 = $row["primera06"];
        // }
       // var_dump($item);
    } catch (PDOException $th) {

        return [];
    }    
    
?>