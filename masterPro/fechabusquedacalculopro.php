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

    $item = new Numerotabla();

    $conversiones = array ( "0"=>"5", "1"=>"6", "2"=>"7", "3"=>"8", "4"=>"9", "5"=>"0", "6"=>"1", "7"=>"2", "8"=>"3", "9"=>"4");

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
                if (is_numeric($nica)){
                    //Suma paralela
                    $starts=($nica+10);
                    $resultado10 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado10 = strlen($resultado10) == 1 ? "0".$resultado10 : $resultado10;  

                    $starts=($nica+20);
                    $resultado20 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado20 = strlen($resultado20) == 1 ? "0".$resultado20 : $resultado20;  

                    $starts=($nica+30);
                    $resultado30 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado30 = strlen($resultado30) == 1 ? "0".$resultado30 : $resultado30;  

                    $resultadoparalelo = $resultado10.' '.$resultado20.' '.$resultado30;

                    $tempConversion = "".Conversion(substr($nica, 0, 1)).substr($nica, 1, 1);
                    $starts=($nica+2);
                    $resultado2 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado2 = strlen($resultado2) == 1 ? "0".$resultado2 : $resultado2;                    
                    $starts=($nica+3);
                    $resultado3 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;                                        
                    //$nica = $nica." ".($nica+2)." ".($nica+3)." ";//.($nica+6)." ".($nica+9);
                    $nica = $nica." ".$resultado2." ".$resultado3." ";//.($nica+6)." ".($nica+9);
                    $nica = $resultadoparalelo." ".$tempConversion." ".$nica;
                    $secreto1 = substr($starts,0,1);
                    $secreto2 = substr($starts,1,1);
                    $secreto3 = substr($starts,0,1);
                    $secreto4 = substr($starts,1,1);
                    
                }        
                $tica=$row["tica01"];
                if (is_numeric($tica)){
                    $starts=($tica+10);
                    $resultado10 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado10 = strlen($resultado10) == 1 ? "0".$resultado10 : $resultado10;  

                    $starts=($tica+20);
                    $resultado20 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado20 = strlen($resultado20) == 1 ? "0".$resultado20 : $resultado20;  

                    $starts=($tica+30);
                    $resultado30 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado30 = strlen($resultado30) == 1 ? "0".$resultado30 : $resultado30;  

                    $resultadoparalelo = $resultado10.' '.$resultado20.' '.$resultado30;

                    $tempConversion = "".Conversion(substr($tica, 0, 1)).substr($tica, 1, 1);
                    $starts=($tica+2);
                    $resultado2 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado2 = strlen($resultado2) == 1 ? "0".$resultado2 : $resultado2;
                    $starts=($tica+3);
                    $resultado3 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;                                 
                    $tica = $tica." ".$resultado2." ".$resultado3." ";//.($tica+6)." ".($tica+9);
                    $tica = $resultadoparalelo." ".$tempConversion." ".$tica;
                    $secreto1 .= substr($starts,0,1);
                    $secreto2 .= substr($starts,1,1);
                    $secreto4 .= substr($starts,0,1);
                    $secreto3 .= substr($starts,1,1);                    
                }        
                $tablaResultado .= '<td class="table-dark">'.$nica.'</td>'; 
                $tablaResultado .= '<td class="table-dark">'.$tica.'<h3>'.$secreto1.' '.$secreto2.' '.$secreto3.' '.$secreto4.'</h3></td>';       
                $tablaResultado .= '<td id="'.$row["nica03"].'">'.$row["nica03"].'</td>
                        <td class="table-success" id="'.$row["tica0430"].'">'.$row["tica0430"].'</td>
                        <td id="'.$row["nica06"].'">'.$row["nica06"].'</td>';

                $nica=$row["nica03"];                
                if (is_numeric($nica)){
                    $starts=($nica+10);
                    $resultado10 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado10 = strlen($resultado10) == 1 ? "0".$resultado10 : $resultado10;  

                    $starts=($nica+20);
                    $resultado20 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado20 = strlen($resultado20) == 1 ? "0".$resultado20 : $resultado20;  

                    $starts=($nica+30);
                    $resultado30 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado30 = strlen($resultado30) == 1 ? "0".$resultado30 : $resultado30;  

                    $resultadoparalelo = $resultado10.' '.$resultado20.' '.$resultado30;

                    $tempConversion = "".Conversion(substr($nica, 0, 1)).substr($nica, 1, 1);
                    $starts=($nica+2);
                    $resultado2 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado2 = strlen($resultado2) == 1 ? "0".$resultado2 : $resultado2;
                    $starts=($nica+3);
                    $resultado3 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;  
                    $nica = $nica." ".$resultado2." ".$resultado3." ";//.($nica+6)." ".($nica+9);
                    //$nica = $nica." ".($nica+2)." ".($nica+3)." ";//.($nica+6)." ".($nica+9);
                    $nica = $resultadoparalelo." ".$tempConversion." ".$nica;
                    $secreto1 = substr($starts,0,1);
                    $secreto2 = substr($starts,1,1);
                    $secreto3 = substr($starts,0,1);
                    $secreto4 = substr($starts,1,1);
                }    
                
                $temporalNica = $nica;    
                $nica=$row["nica06"];                
                if (is_numeric($nica)){
                    $starts=($nica+10);
                    $resultado10 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado10 = strlen($resultado10) == 1 ? "0".$resultado10 : $resultado10;  

                    $starts=($nica+20);
                    $resultado20 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado20 = strlen($resultado20) == 1 ? "0".$resultado20 : $resultado20;  

                    $starts=($nica+30);
                    $resultado30 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado30 = strlen($resultado30) == 1 ? "0".$resultado30 : $resultado30;  

                    $resultadoparalelo = $resultado10.' '.$resultado20.' '.$resultado30;

                    $tempConversion = "".Conversion(substr($nica, 0, 1)).substr($nica, 1, 1);
                    $starts=($nica+2);
                    $resultado2 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado2 = strlen($resultado2) == 1 ? "0".$resultado2 : $resultado2;
                    $starts=($nica+3);
                    $resultado3 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;  
                    $nica = $nica." ".$resultado2." ".$resultado3." ";//.($nica+6)." ".($nica+9);
                    //$nica = $nica." ".($nica+2)." ".($nica+3)." ";//.($nica+6)." ".($nica+9);
                    $nica = $resultadoparalelo." ".$tempConversion." ".$nica;
                }
                $nica = $temporalNica.$nica;    
                
                $tica=$row["tica0430"];
                if (is_numeric($tica)){
                    $starts=($tica+10);
                    $resultado10 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado10 = strlen($resultado10) == 1 ? "0".$resultado10 : $resultado10;  

                    $starts=($tica+20);
                    $resultado20 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado20 = strlen($resultado20) == 1 ? "0".$resultado20 : $resultado20;  

                    $starts=($tica+30);
                    $resultado30 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado30 = strlen($resultado30) == 1 ? "0".$resultado30 : $resultado30;  

                    $resultadoparalelo = $resultado10.' '.$resultado20.' '.$resultado30;

                    $tempConversion = "".Conversion(substr($tica, 0, 1)).substr($tica, 1, 1);
                    $starts=($tica+2);
                    $resultado2 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado2 = strlen($resultado2) == 1 ? "0".$resultado2 : $resultado2;
                    $starts=($tica+3);
                    $resultado3 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;                                 
                    $tica = $tica." ".$resultado2." ".$resultado3." ";//.($tica+6)." ".($tica+9);
                    //$tica = $tica." ".($tica+2)." ".($tica+3)." ";//.($tica+6)." ".($tica+9);
                    $tica = $resultadoparalelo." ".$tempConversion." ".$tica;
                    $secreto1 .= substr($starts,0,1);
                    $secreto2 .= substr($starts,1,1);
                    $secreto4 .= substr($starts,0,1);
                    $secreto3 .= substr($starts,1,1);        
                }        
                $tablaResultado .= '<td class="table-dark">'.$nica.'</td>'; 
                $tablaResultado .= '<td class="table-dark">'.$tica.'<h3>'.$secreto1.' '.$secreto2.' '.$secreto3.' '.$secreto4.'</h3></td>';      
                $tablaResultado .= '<td class="table-success" id="'.$row["tica0730"].'">'.$row["tica0730"].'</td>
                <td id="'.$row["nica09"].'">'.$row["nica09"].'</td>';
                $nica=$row["nica09"];                
                if (is_numeric($nica)){
                    $starts=($nica+10);
                    $resultado10 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado10 = strlen($resultado10) == 1 ? "0".$resultado10 : $resultado10;  

                    $starts=($nica+20);
                    $resultado20 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado20 = strlen($resultado20) == 1 ? "0".$resultado20 : $resultado20;  

                    $starts=($nica+30);
                    $resultado30 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado30 = strlen($resultado30) == 1 ? "0".$resultado30 : $resultado30;  

                    $resultadoparalelo = $resultado10.' '.$resultado20.' '.$resultado30;

                    $tempConversion = "".Conversion(substr($nica, 0, 1)).substr($nica, 1, 1);
                    $starts=($nica+2);
                    $resultado2 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado2 = strlen($resultado2) == 1 ? "0".$resultado2 : $resultado2;
                    $starts=($nica+3);
                    $resultado3 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;  
                    $nica = $nica." ".$resultado2." ".$resultado3." ";//.($nica+6)." ".($nica+9);
                    //$nica = $nica." ".($nica+2)." ".($nica+3)." " ;//.($nica+6)." ".($nica+9);
                    $nica = $resultadoparalelo." ".$tempConversion." ".$nica;
                    $secreto1 = substr($starts,0,1);
                    $secreto2 = substr($starts,1,1);
                    $secreto3 = substr($starts,0,1);
                    $secreto4 = substr($starts,1,1);
                }    
                $tica=$row["tica0730"];
                if (is_numeric($tica)){
                    $starts=($tica+10);
                    $resultado10 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado10 = strlen($resultado10) == 1 ? "0".$resultado10 : $resultado10;  

                    $starts=($tica+20);
                    $resultado20 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado20 = strlen($resultado20) == 1 ? "0".$resultado20 : $resultado20;  

                    $starts=($tica+30);
                    $resultado30 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado30 = strlen($resultado30) == 1 ? "0".$resultado30 : $resultado30;  

                    $resultadoparalelo = $resultado10.' '.$resultado20.' '.$resultado30;

                    $tempConversion = "".Conversion(substr($tica, 0, 1)).substr($tica, 1, 1);
                    $starts=($tica+2);
                    $resultado2 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado2 = strlen($resultado2) == 1 ? "0".$resultado2 : $resultado2;
                    $starts=($tica+3);
                    $resultado3 = strlen($starts) > 2 ? substr($starts,1,2) + substr($starts,0,1) : $starts;
                    $resultado3 = strlen($resultado3) == 1 ? "0".$resultado3 : $resultado3;                                 
                    $tica = $tica." ".$resultado2." ".$resultado3." ";//.($tica+6)." ".($tica+9);
                    //$tica = $tica." ".($tica+2)." ".($tica+3)." " ;//.($tica+6)." ".($tica+9);
                    $tica = $resultadoparalelo." ".$tempConversion." ".$tica;
                    $secreto1 .= substr($starts,0,1);
                    $secreto2 .= substr($starts,1,1);
                    $secreto4 .= substr($starts,0,1);
                    $secreto3 .= substr($starts,1,1);        
                }                       
                $tablaResultado .= '<td class="table-dark">'.$tica.'</td>'; 
                $tablaResultado .= '<td class="table-dark">'.$nica.'<h3>'.$secreto1.' '.$secreto2.' '.$secreto3.' '.$secreto4.'</h3></td>';                   
                $tablaResultado .='</tr>'  ;     
            }
            echo $tablaResultado;

        }else{
            echo "Sin datos";
        }     
    } catch (PDOException $th) {

        return [];
    }    
    
    function Conversion(string $dato){               
        foreach( $GLOBALS['conversiones'] as $key => $value) {
            if ( $key == $dato ){
                $dato = $value;
                break;
            }
        }    
        return $dato;
    }
?>