<?php
  session_start();

  if ($_SESSION["Enabled"] != 1){
    header('Location: index.php');
  }

  require 'header.php';

$lineas = array ( 
    "Linea Romantica"  =>   ["64", "14", "04", "19", "46", "09", "06", "49"],
    "Linea RomanticaDir" => [">>>", "<<", ">>", "<<", ">>", "<<", ">>", "<<<"],
    "Linea Crazy" =>        ["35","85","05","95","25","15","65","55"],
    "Linea CrazyDir" =>     [">>>","<<",">>","<<",">>","<<",">>","<<<"],
    "Linea Ocho" =>         ["08","88","38","13, 18","28","78","98, 68, 48","58"],
    "Linea OchoDir" =>      [">>>","<<",">>","<<",   ">>","<<",">>"        ,"<<<"],
    "Linea Tres" =>         ["03","33","38","13, 18","23","73","93, 63, 43","53"],
    "Linea TresDir" =>      [">>>","<<",">>","<<",   ">>","<<",">>"        ,"<<<"]    
);
?>
</head>
<body>
<?php 
  require 'menu.php';
?>
<div id="main" class="container">
  <h1>Lineas</h1>
  <h2>Linea Romantica</h2>
  <ul>
    <li>
        <?php 
            $th = "";
            $td ="";
            foreach ($lineas["Linea Romantica"]  as $key => $value) {                
                $th .= "<th>".$value."</th>";
            }
            foreach ($lineas["Linea RomanticaDir"]  as $key => $value) {                
                $td .= "<td>".$value."</td>";
            }            
        ?>
        <table class="table">
            <thead>
                <tr>
                    <?php
                        echo $th;
                    ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                   <?php
                        echo $td;
                    ?>
                </tr>
            </tbody>
        </table>        
    </li>
  </ul>
  <h2>Linea Crazy</h2>
  <ul>
    <li>
        <?php 
            $th = "";
            $td ="";
            foreach ($lineas["Linea Crazy"]  as $key => $value) {                
                $th .= "<th>".$value."</th>";
            }
            foreach ($lineas["Linea CrazyDir"]  as $key => $value) {                
                $td .= "<td>".$value."</td>";
            }            
        ?>
        <table class="table">
            <thead>
                <tr>
                    <?php
                        echo $th;
                    ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                   <?php
                        echo $td;
                    ?>
                </tr>
            </tbody>
        </table>        
    </li>
  </ul>
  <h2>Linea Ocho</h2>
  <ul>
    <li>
        <?php 
            $th = "";
            $td ="";
            foreach ($lineas["Linea Ocho"]  as $key => $value) {                
                $th .= "<th>".$value."</th>";
            }
            foreach ($lineas["Linea OchoDir"]  as $key => $value) {                
                $td .= "<td>".$value."</td>";
            }            
        ?>
        <table class="table">
            <thead>
                <tr>
                    <?php
                        echo $th;
                    ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                   <?php
                        echo $td;
                    ?>
                </tr>
            </tbody>
        </table>        
    </li>
  </ul>
  <h2>Linea Tres</h2>
  <ul>
    <li>
        <?php 
            $th = "";
            $td ="";
            foreach ($lineas["Linea Tres"]  as $key => $value) {                
                $th .= "<th>".$value."</th>";
            }
            foreach ($lineas["Linea TresDir"]  as $key => $value) {                
                $td .= "<td>".$value."</td>";
            }            
        ?>
        <table class="table">
            <thead>
                <tr>
                    <?php
                        echo $th;
                    ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                   <?php
                        echo $td;
                    ?>
                </tr>
            </tbody>
        </table>        
    </li>
  </ul>      
</div>
<?php
  require 'footer.php';
?>