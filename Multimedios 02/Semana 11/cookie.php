<?php
    $cookie_Name = "usuario";
    $cookie_Value = "mario"; 

    setcookie( $cookie_Name, $cookie_Value, time() + ( 86400 * 30 ), "/" );


    if ( !isset( $_COOKIE[ $cookie_Name] ) ){
        echo "Cookie: name ".$cookie_Name." sin datos";  
    }else{
        echo "Cookie: name ".$cookie_Name." tiene datos <br>";  
        echo "Value: ". $_COOKIE[ $cookie_Name];
    }
?>