<?php
  session_start();

  if ($_SESSION["Enabled"] != 1){
    header('Location: index.php');
  }
  include_once('common/database.php');
  include_once('class/numerotabla.php');

    $fechabuscar =  $_REQUEST["fechabuscar"];
    $fechabuscarfinal =  $_REQUEST["fechabuscarfinal"];

    $sepparator = '-';
    $parts = explode($sepparator, $fechabuscar);
    //echo $parts[2];//day
    //echo $parts[1];//month
    
    $anho =  substr($parts[0], 0,2) + substr($parts[0], 2,3);
    //echo $anho;
    $Codigo = $anho;
    $diames = $parts[2] + $parts[1];   
    $diames = $diames > 9 ? $diames : '0'.$diames;

///Declaraciones Universales
$universales = array ( 
    "00"=>["(69)", "(10)", "(60)", "55", "05", "09", "99", "66","11","16","19","J99","J69","J10"],
    "01"=>["(00)", "(05)", "(51)", "56", "01", "16", "60", "66","11"],
    "02"=>["(27)", "(70)", "(52)", "57", "00", "02", "05"],
    "03"=>["(38)", "(80)", "(53)", "58", "00", "03", "05"],
    "04"=>["(04)", "(49)", "(54)", "59", "00", "05", "90"],
    "05"=>["(00)", "(05)", "(55)", "50", "05", "00", "07"],
    "06"=>["(51)", "(10)", "(56)", "00", "06", "05", "61"],
    "07"=>["(05)", "(72)", "(20)", "52", "00", "07", "57"],
    "08"=>["(05)", "(83)", "(30)", "53", "00", "08", "58"],
    "09"=>["(94)", "(40)", "(59)", "54", "00", "09", "05"],
    "10"=>["(65)", "(00)", "(16)", "60", "51", "10", "05"],
    "11"=>["(66)", "(01)", "(61)", "10", "16", "16", "61","J16","J10","J77"],
    "12"=>["(10)", "(71)", "(62)", "67", "02", "16", "27"],
    "13"=>["(68)", "(81)", "(63)", "10", "03", "16", "38"],
    "14"=>["(69)", "(49)", "(64)", "10", "04", "16", "91"],
    "15"=>["(10)", "(05)", "(65)", "60", "16", "50", "01"],
    "16"=>["(10)", "(06)", "(61)", "61", "16", "61", "16"],
    "17"=>["(72)", "(21)", "(67)", "62", "10", "07", "16"],
    "18"=>["(63)", "(31)", "(68)", "10", "08", "16", "83"],
    "19"=>["(64)", "(41)", "(69)", "10", "09", "16", "94"],
    "20"=>["(05)", "(52)", "(70)", "75", "20", "00", "27"],
    "21"=>["(27)", "(62)", "(71)", "76", "20", "01", "16"],
    "22"=>["(77)", "(02)", "(27)", "20", "27", "27", "72","J70","J21","J20"],
    "23"=>["(03)", "(38)", "(82)", "78", "20", "27", "73"],
    "24"=>["(04)", "(49)", "(74)", "79", "20", "27", "92"],
    "25"=>["(20)", "(50)", "(75)", "70", "05", "27", "02"],
    "26"=>["(71)", "(12)", "(76)", "20", "06", "27", "61"],
    "27"=>["(20)", "(07)", "(77)", "72", "27", "72", "22"],
    "28"=>["(83)", "(32)", "(78)", "73", "20", "08", "27"],
    "29"=>["(09)", "(94)", "(79)", "74", "20", "27", "42"],
    "30"=>["(38)", "(05)", "(53)", "85", "30", "00", "80"],
    "31"=>["(86)", "(63)", "(81)", "30", "01", "38", "16"],
    "32"=>["(30)", "(38)", "(82)", "87", "02", "27", "73"],
    "33"=>["(88)", "(03)", "(83)", "30", "38", "38", "83","J52","J80"],
    "34"=>["(38)", "(49)", "(84)", "89", "30", "04", "93"],
    "35"=>["(30)", "(50)", "(85)", "80", "05", "38", "03"],
    "36"=>["(81)", "(13)", "(86)", "30", "06", "38", "61"],
    "37"=>["(07)", "(72)", "(23)", "82", "30", "38", "87"],
    "38"=>["(08)", "(38)", "(33)", "83", "30", "83", "88"],
    "39"=>["(09)", "(38)", "(43)", "84", "30", "94", "89"],
    "40"=>["(49)", "(05)", "(90)", "95", "40", "00", "54"],
    "41"=>["(91)", "(40)", "(49)", "96", "64", "01", "16"],               
    "42"=>["(97)", "(74)", "(27)", "92", "40", "02", "49"],
    "43"=>["(93)", "(40)", "(38)", "98", "84", "03", "49"],
    "44"=>["(99)", "(49)", "(04)", "94", "40", "49", "94","J99","J40"],
    "45"=>["(95)", "(40)", "(50)", "90", "04", "05", "49"],
    "46"=>["(96)", "(14)", "(40)", "91", "06", "49", "61"],
    "47"=>["(92)", "(97)", "(49)", "24", "40", "07", "72"],
    "48"=>["(34)", "(08)", "(83)", "93", "98", "40", "49"],
    "49"=>["(40)", "(09)", "(49)", "94", "99", "44", "94"],
    "50"=>["(00)", "(55)", "(05)", "05", "50", "05", "50"],  
    "51"=>["(06)", "(65)", "(50)", "01", "16", "50", "16"],   
    "52"=>["(75)", "(50)", "(27)", "07", "02", "02", "50"],   
    "53"=>["(85)", "(50)", "(38)", "08", "03", "30", "50"],   
    "54"=>["(95)", "(50)", "(04)", "09", "04", "50", "49"],   
    "55"=>["(00)", "(05)", "(50)", "35", "25", "15", "95","J50","J35"],   
    "56"=>["(15)", "(60)", "(50)", "01", "06", "50", "61"],   
    "57"=>["(25)", "(50)", "(72)", "02", "07", "50", "70"],   
    "58"=>["(35)", "(50)", "(83)", "03", "08", "50", "80"],   
    "59"=>["(04)", "(50)", "(50)", "09", "45", "09", "94"],   
    "60"=>["(60)", "(00)", "(61)", "15", "10", "56", "05"],   
    "61"=>["(16)", "(60)", "(01)", "11", "66", "19", "90"],
    "62"=>["(17)", "(12)", "(76)", "60", "02", "61", "27"],
    "63"=>["(18)", "(13)", "(86)", "60", "03", "61", "38"],
    "64"=>["(19)", "(14)", "(96)", "60", "04", "61", "49"],
    "65"=>["(15)", "(05)", "(50)", "10", "06", "60", "61"],
    "66"=>["(19)", "(17)", "(10)", "11", "00", "61", "21","J60","J19"],
    "67"=>["(12)", "(17)", "(26)", "60", "07", "61", "72"],
    "68"=>["(13)", "(18)", "(36)", "60", "08", "61", "83"],
    "69"=>["(14)", "(19)", "(94)", "46", "60", "09", "61"],                
    "70"=>["(25)", "(57)", "(72)", "20", "07", "00", "05"],
    "71"=>["(26)", "(21)", "(67)", "70", "01", "72", "16"],
    "72"=>["(27)", "(70)", "(21)", "72", "02", "17", "20","25","22","77"],
    "73"=>["(28)", "(23)", "(38)", "87", "70", "03", "72"],
    "74"=>["(24)", "(70)", "(49)", "29", "97", "04", "72"],
    "75"=>["(25)", "(50)", "(07)", "20", "76", "21", "17"],
    "76"=>["(17)", "(70)", "(61)", "21", "26", "06", "72"],
    "77"=>["(17)", "(20)", "(70)", "22", "11", "21", "27","J21","J22","J20"],
    "78"=>["(28)", "(08)", "(83)", "73", "37", "72", "70"],
    "79"=>["(47)", "(70)", "(94)", "24", "29", "09", "72"],
    "80"=>["(30)", "(58)", "(83)", "35", "08", "00", "05"],
    "81"=>["(36)", "(31)", "(68)", "80", "01", "83", "16"],
    "82"=>["(32)", "(80)", "(83)", "37", "78", "02", "27"],
    "83"=>["(80)", "(28)", "(18)", "38", "33", "88", "03"],
    "84"=>["(34)", "(83)", "(49)", "39", "98", "80", "04"],
    "85"=>["(35)", "(08)", "(50)", "30", "05", "83", "55"],
    "86"=>["(31)", "(36)", "(18)", "80", "06", "83", "61"],
    "87"=>["(28)", "(83)", "(72)", "32", "37", "80", "07"],   
    "88"=>["(83)", "(25)", "(28)", "33", "08", "03", "18","J33","J25"],
    "89"=>["(34)", "(39)", "(94)", "48", "80", "09", "83"],
    "90"=>["(40)", "(59)", "(94)", "45", "09", "05", "00"],
    "91"=>["(46)", "(41)", "(69)", "90", "01", "94", "16"],
    "92"=>["(47)", "(42)", "(79)", "90", "02", "94", "27"],
    "93"=>["(43)", "(03)", "(38)", "48", "89", "90", "94"],
    "94"=>["(04)", "(69)", "(46)", "49", "44", "99", "90"],   
    "95"=>["(45)", "(05)", "(35)", "40", "09", "25", "94"],
    "96"=>["(41)", "(46)", "(19)", "90", "07", "47", "72"],
    "97"=>["(42)", "(29)", "(94)", "47", "90", "07", "72"],
    "98"=>["(48)", "(39)", "(83)", "43", "90", "08", "94"],
    "99"=>["(44)", "(90)", "(94)", "09", "94", "94", "49","J00","J69","J90"]
    );



    $item = new Numerotabla();

    $queryString = "SELECT `id`, `fecha`, `suma`, `nica11`, `nica03`, `nica06`, `nica09`, `tica01`, `tica0430`,
     `tica0730`, `primera10`, `primera06` FROM `resultados` WHERE fecha >= :fechabuscar AND fecha <= :fechabuscarfinal order by fecha desc;";
    
    $query = connect()->prepare($queryString);
    //$datos["suma"] = $diames;
    $datos["fechabuscar"] = $fechabuscar;
    $datos["fechabuscarfinal"] = $fechabuscarfinal;
   //var_dump($datos);
    
    $query->execute($datos);
    $tablaResultado ="";
    try {
        if ($query->rowCount() > 0) {
            while($row = $query->fetch()) {  
                
                $tablaResultado .= 
                '<tr>                        
                        <td class="table-info">'.$row["fecha"].' Dia '.date('l', strtotime($row["fecha"])).'</td>                
                        <td id="'.$row["nica11"].'">'.$row["nica11"].'</td>
                        <td class="table-success" id="'.$row["tica01"].'">'.$row["tica01"].'</td>';
                $nica=$row["nica11"];                
                // if (is_numeric($nica)){
                //     $starts=($nica+2);
                //     $resultado2 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                //     $resultado2 = strlen($resultado2) == 1 ? "0".$resultado2 : $resultado2;                    
                //     $starts=($nica+3);
                //     $resultado3 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                //     $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;                                        
                //     //$nica = $nica." ".($nica+2)." ".($nica+3)." ";//.($nica+6)." ".($nica+9);
                //     $nica = $nica." ".$resultado2." ".$resultado3." ";//.($nica+6)." ".($nica+9);
                // }        
                $tica=$row["tica01"];
                // if (is_numeric($tica)){
                //     $starts=($tica+2);
                //     $resultado2 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                //     $resultado2 = strlen($resultado2) == 1 ? "0".$resultado2 : $resultado2;
                //     $starts=($tica+3);
                //     $resultado3 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                //     $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;                                 
                //     $tica = $tica." ".$resultado2." ".$resultado3." ";//.($tica+6)." ".($tica+9);
                // }        
                $tablaResultado .= '<td class="table-dark">'.consultaDoce($nica, $universales).'</td>'; 
                $tablaResultado .= '<td class="table-dark">'.consultaDoce($tica, $universales).'</td>';       
                $tablaResultado .= '<td id="'.$row["nica03"].'">'.$row["nica03"].'</td>
                        <td class="table-success" id="'.$row["tica0430"].'">'.$row["tica0430"].'</td>
                        <td id="'.$row["nica06"].'">'.$row["nica06"].'</td>';

                $nica=$row["nica03"];                
                // if (is_numeric($nica)){
                //     $starts=($nica+2);
                //     $resultado2 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                //     $resultado2 = strlen($resultado2) == 1 ? "0".$resultado2 : $resultado2;
                //     $starts=($nica+3);
                //     $resultado3 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                //     $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;  
                //     $nica = $nica." ".$resultado2." ".$resultado3." ";//.($nica+6)." ".($nica+9);
                //     //$nica = $nica." ".($nica+2)." ".($nica+3)." ";//.($nica+6)." ".($nica+9);
                // }    
                
                //$temporalNica = $nica;    
                $nicatemp=$row["nica06"];                
                // if (is_numeric($nica)){
                //     $starts=($nica+2);
                //     $resultado2 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                //     $resultado2 = strlen($resultado2) == 1 ? "0".$resultado2 : $resultado2;
                //     $starts=($nica+3);
                //     $resultado3 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                //     $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;  
                //     $nica = $nica." ".$resultado2." ".$resultado3." ";//.($nica+6)." ".($nica+9);
                //     //$nica = $nica." ".($nica+2)." ".($nica+3)." ";//.($nica+6)." ".($nica+9);
                // }
                // $nica = $temporalNica.$nica;    
                
                $tica=$row["tica0430"];
                // if (is_numeric($tica)){
                //     $starts=($tica+2);
                //     $resultado2 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                //     $resultado2 = strlen($resultado2) == 1 ? "0".$resultado2 : $resultado2;
                //     $starts=($tica+3);
                //     $resultado3 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                //     $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;                                 
                //     $tica = $tica." ".$resultado2." ".$resultado3." ";//.($tica+6)." ".($tica+9);
                //     //$tica = $tica." ".($tica+2)." ".($tica+3)." ";//.($tica+6)." ".($tica+9);
                // }        
                $tablaResultado .= '<td class="table-dark">'.consultaDoce($nica, $universales).'  '.consultaDoce($nicatemp, $universales).'</td>'; 
                $tablaResultado .= '<td class="table-dark">'.consultaDoce($tica, $universales).'</td>';          
                $tablaResultado .= '<td class="table-success" id="'.$row["tica0730"].'">'.$row["tica0730"].'</td>
                <td id="'.$row["nica09"].'">'.$row["nica09"].'</td>';
                $nica=$row["nica09"];                
                // if (is_numeric($nica)){
                //     $starts=($nica+2);
                //     $resultado2 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                //     $resultado2 = strlen($resultado2) == 1 ? "0".$resultado2 : $resultado2;
                //     $starts=($nica+3);
                //     $resultado3 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                //     $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;  
                //     $nica = $nica." ".$resultado2." ".$resultado3." ";//.($nica+6)." ".($nica+9);
                //     //$nica = $nica." ".($nica+2)." ".($nica+3)." " ;//.($nica+6)." ".($nica+9);
                // }    
                $tica=$row["tica0730"];
                // if (is_numeric($tica)){
                //     $starts=($tica+2);
                //     $resultado2 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                //     $resultado2 = strlen($resultado2) == 1 ? "0".$resultado2 : $resultado2;
                //     $starts=($tica+3);
                //     $resultado3 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                //     $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;                                 
                //     $tica = $tica." ".$resultado2." ".$resultado3." ";//.($tica+6)." ".($tica+9);
                //     //$tica = $tica." ".($tica+2)." ".($tica+3)." " ;//.($tica+6)." ".($tica+9);
                // }        
                $tablaResultado .= '<td class="table-dark">'.consultaDoce($nica, $universales).'</td>'; 
                $tablaResultado .= '<td class="table-dark">'.consultaDoce($tica, $universales).'</td>';  
                $tablaResultado .='</tr>'  ;
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
    
    function consultaDoce($dato, $info){

        $resultado ="";
        if ($dato != "" ){
            $resultado = $dato*12;

            if ( strlen($resultado)==3){
                $resultado .= " <br> ".substr($resultado,0,1).substr($resultado,1,1)." ".substr($resultado,1,1).substr($resultado,2,1)." ".substr($resultado,2,1).substr($resultado,0,1);
            }

            if ( strlen($resultado)==4){
                $resultado .= " <br> ".substr($resultado,0,1).substr($resultado,1,1)." ".substr($resultado,1,1).substr($resultado,2,1)." ".substr($resultado,2,1).substr($resultado,3,1)." ".substr($resultado,3,1).substr($resultado,0,1);
            }
        }
        
//        $resultado3 = strlen($resultado) > 2 ? substr($resultado,1,2) + substr($resultado,0,1) : $resultado;
  //      $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;  
        return $resultado;
    }


    function consultaUniversales($consultaDoce,$universales){
        $td= $consultaDoce;
        if ( $consultaDoce !== "")   {
           
            //consultaDoce
            foreach ($universales as $key => $value) {        
                if ( $consultaDoce == $key ){           
                    $searchkey = $value;
                    foreach ($searchkey as $key => $value) {   
                        $td .= " ".$value." ";
                      //  echo $valueCompleto;
                    }
                }        
            }
        }
        return $td ;
    }
  
    
?>