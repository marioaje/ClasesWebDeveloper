<?php
  session_start();

  if ($_SESSION["Enabled"] != 1){
    header('Location: index.php');
  }
$consultaUniversales = $_REQUEST["consultaUniversales"];
//"()", "()", "()", "", "", "", ""
$universales = array ( 
    "00"=>["*89","*20","*01","*99","81","02","10","91","","","","",""],
    "01"=>["*00","*09","*11","*12","91","10","92","90","","","","",""],
    "02"=>["*18","*81","*03","*10","89","98","00","99","","","","",""],
    "03"=>["*04","*02","*17","*19","98","97","99","83","","","","",""],
    "04"=>["*16","*18","*05","*03","84","95","98","97","","","","",""],
    "05"=>["*06","*04","*86","*17","95","96","97","85","","","","",""],
    "06"=>["*87","*16","*94","*05","15","07","95","96","","","","",""],
    "07"=>["*13","*15","*08","*96","87","93","06","94","","","","",""],
    "08"=>["*09","*07","*12","*14","93","92","94","88","","","","",""],
    "09"=>["*20","*13","*01","*08","82","91","93","92","","","","",""],
    "10"=>["*02","*91","*19","*90","00","99","01","11","","","","",""],
    "11"=>["*99","*01","*72","*71","10","19","90","80","","","","",""],
    "12"=>["*01","*08","*71","*23","92","90","88","20","","","","",""],
    "13"=>["*79","*27","*09","*07","73","82","87","93","","","","",""],
    "14"=>["*08","*96","*23","*26","94","88","86","74","","","","",""],
    "15"=>["*27","*76","*07","*95","75","87","16","06","","","","",""],
    "16"=>["*75","*24","*06","*04","76","15","84","95","","","","",""],
    "17"=>["*05","*03","*25","*28","97","85","83","77","","","","",""],
    "18"=>["*24","*22","*04","*02","78","84","89","98","","","","",""],
    "19"=>["*03","*10","*28","*80","99","83","11","72","","","","",""],
    "20"=>["*21","*79","*00","*09","30","81","82","91","","","","",""],
    "21"=>["*39","*70","*89","*20","61","22","30","81","","","","","","","","",""],
    "22"=>["*63","*61","*18","*81","39","78","321","89","","","","",""],
    "23"=>["*12","*14","*69","*34","88","29","74","68","","","","",""],
    "24"=>["*36","*63","*16","*18","67","76","78","84",""],
    "25"=>["*86","*17","*66","*37","85","26","77","65","","","","",""],
    "26"=>["*14","*85","*34","*65","86","74","25","66","","","","",""],
    "27"=>["*38","*35","*13","*15","64","73","75","87","","","","",""],
    "28"=>["*17","*19","*37","*62","83","77","72","33","","","","",""],
    "29"=>["*90","*88","*31","*68","12","71","23","69","","","","",""],
    "30"=>["*61","*32","*81","*82","70","21","79","20","","","","",""],
    "31"=>["*80","*29","*60","*49","71","40","69","51","","","","",""],
    "32"=>["*50","*48","*30","*73","52","70","38","79","","","","",""],
    "33"=>["*77","*72","*54","*42","28","37","62","58","","","","",""],
    "34"=>["*23","*26","*53","*45","74","68","66","47","","","","",""],
    "35"=>["*57","*56","*27","*76","55","64","36","75","","","","",""],
    "36"=>["*55","*44","*75","*24","56","35","67","76","","","","",""],
    "37"=>["*25","*28","*46","*58","77","65","33","54","","","","",""],
    "38"=>["*52","*57","*79","*27","48","32","64","73","","","","",""],
    "39"=>["*43","*41","*78","*21","59","63","61","22","","","","",""],
    "40"=>["*72","*71","*42","*51","80","62","31","60","","","","",""],
    "41"=>["*42","*51","*39","*70","60","59","50","61","","","","","","","","",""],
    "42"=>["*33","*40","*43","*41","62","58","60","59","","","","","","","","",""],
    "43"=>["*54","*42","*67","*39","58","44","59","63","","","","","","","","",""],
    "44"=>["*46","*58","*36","*63","54","56","43","67","","","","","","","","",""],
    "45"=>["*34","*65","*57","*56","66","47","46","55","","","","","","","","",""],
    "46"=>["*66","*37","*55","*44","65","45","54","56","","","","","","","","",""],
    "47"=>["*68","*66","*48","*55","34","53","45","57","","","","","","","","",""],
    "48"=>["*49","*47","*32","*64","53","52","57","38","","","","","","","","",""],
    "49"=>["*31","*68","*50","*48","69","51","53","52","","","","","","","","",""],
    "50"=>["*60","*49","*61","*32","51","41","52","70","","","","","","","","",""],
    "51"=>["*40","*69","*41","*52","31","60","49","50","","","","","","","","",""],
    "52"=>["*51","*53","*70","*38","49","50","48","32","","","","","","","","",""],
    "53"=>["*69","*34","*52","*57","68","49","47","48","","","","","","","","",""],
    "54"=>["*65","*33","*56","*43","37","46","58","44","","","","","","","","",""],
    "55"=>["*47","*46","*64","*36","45","57","56","35","","","","","","","","",""],
    "56"=>["*45","*54","*35","*67","46","55","44","36","","","","","","","","",""],
    "57"=>["*53","*45","*38","*35","47","48","55","64","","","","","","","","",""],
    "58"=>["*37","*62","*44","*59","33","54","42","43","","","","","","","","",""],
    "59"=>["*58","*60","*63","*61","42","43","41","39","","","","","","","","",""],
    "60"=>["*62","*31","*59","*50","40","42","51","41","","","","","","","","",""],
    "61"=>["*59","*50","*22","*30","41","39","70","21","","","","","","","","",""],
    "62"=>["*28","*80","*58","*60","72","33","40","42","","","","","","","","",""],
    "63"=>["*44","*59","*24","*22","43","67","39","78","","","","","","","","",""],
    "64"=>["*48","*55","*73","*75","57","38","35","27","","","","","","","","",""],
    "65"=>["*26","*77","*45","*54","25","66","37","46","","","","","","","","",""],
    "66"=>["*74","*25","*47","*46","26","34","65","45","","","","","","","","",""],
    "67"=>["*56","*43","*76","*78","44","36","63","24","","","","","","","","",""],
    "68"=>["*29","*74","*49","*47","23","69","34","53","","","","","","","","",""],
    "69"=>["*71","*23","*51","*53","29","31","68","49","","","","","","","","",""],
    "70"=>["*41","*52","*21","*79","50","61","32","30","","","","","","","","",""],
    "71"=>["*11","*12","*40","*69","90","80","29","31","","","","","","","","",""],
    "72"=>["*83","*11","*33","*40","19","28","80","62","","","","","","","","",""],
    "73"=>["*32","*64","*82","*87","38","79","27","13","","","","","","","","",""],
    "74"=>["*88","*86","*68","*66","14","23","26","34","","","","","","","","",""],
    "75"=>["*64","*36","*87","*16","35","27","76","15","","","","","","","","",""],
    "76"=>["*35","*67","*15","*84","36","75","24","16","","","","","","","","",""],
    "77"=>["*85","*83","*65","*33","17","25","28","37","","","","","","","","",""],
    "78"=>["*67","*39","*84","*89","63","24","22","18","","","","","","","","",""],
    "79"=>["*70","*38","*20","*13","32","30","73","82","","","","","","","","",""],
    "80"=>["*19","*90","*62","*31","11","72","71","40","","","","","","","","",""],
    "81"=>["*22","*30","*02","*91","21","89","20","00","","","","","","","","",""],
    "82"=>["*30","*73","*91","*93","79","20","13","09","","","","","","","","",""],
    "83"=>["*97","*99","*77","*72","03","17","19","28","","","","","","","","",""],
    "84"=>["*76","*78","*95","*98","24","16","18","04","","","","","","","","",""],
    "85"=>["*96","*97","*26","*77","05","86","17","25","","","","","","","","",""],
    "86"=>["*94","*05","*74","*25","96","14","85","26","","","","","","","","",""],
    "87"=>["*73","*75","*93","*06","27","13","15","07","","","","","","","","",""],
    "88"=>["*92","*94","*29","*74","08","12","14","23","","","","","","","","",""],
    "89"=>["*78","*21","*98","*00","22","18","81","02","","","","","","","","",""],
    "90"=>["*10","*92","*80","*29","01","11","12","71","","","","","","","","",""],
    "91"=>["*81","*82","*10","*92","20","00","09","01","","","","","","","","",""],
    "92"=>["*91","*93","*90","*88","09","01","08","12","","","","","","","","",""],
    "93"=>["*82","*87","*92","*94","13","09","07","08","","","","","","","","",""],
    "94"=>["*93","*06","*88","*86","07","08","96","14","","","","","","","","",""],
    "95"=>["*15","*84","*96","*97","16","06","04","05","","","","","","","","",""],
    "96"=>["*07","*95","*14","*85","06","94","05","86","","","","","","","","",""],
    "97"=>["*95","*98","*85","*83","04","05","03","17","","","","","","","","",""],
    "98"=>["*84","*89","*97","*99","18","04","02","97","","","","","","","","",""],
    "99"=>["*98","*00","*83","*11","02","03","10","19","","","","","","","","",""],
    );

    if ( $consultaUniversales !== "")   {
        $td="";
        //consultaUniversales
        foreach ($universales as $key => $value) {        
            if ( $consultaUniversales == $key ){           
                $searchkey = $value;
                foreach ($searchkey as $key => $value) {   
                    $td .= "<td>".$value."</td>";
                  //  echo $valueCompleto;
                }
            }        
        }
    
        $tableUniversal = '<table class="table">
                                    <tbody>
                                        <tr>
                                            '.$td.'
                                        </tr>
                                    </tbody>
                            </table>';

    }

    
// Output "no suggestion" if no hint was found or output correct values
echo $tableUniversal === "" ? "no suggestion" : $tableUniversal;
   
?>


<script type="text/javascript">
// var myObj = { 
//     fred: { apples: 2, oranges: 4, bananas: 7, melons: 0 }, 
//     mary: { apples: 0, oranges: 10, bananas: 0, melons: 0 }, 
//     sarah: { apples: 0, oranges: 0, bananas: 0, melons: 5 } 
// }

// document.write(myObj['fred']['apples']);
</script>