<?php

    function getConnection()
    {
        $host = 'sql318.main-hosting.eu';
        $db_name = 'u484426513_apireact';
        $username = 'u484426513_apireact';
        $password = '3aD+$T:ODD';
        $conn= new mysqli($host, $username, $password, $db_name);
        if ($conn->connect_error) {
            $conn= null;
        }
        return $conn;
    }


    function connect(){
        $host = 'sql318.main-hosting.eu';
        $db_name = 'u484426513_apireact';
        $username = 'u484426513_apireact';
        $password = '3aD+$T:ODD';
        $charset = "utf8mb4";
        try {
            $connection = "mysql:host=".$host.";dbname=".$db_name.";charset=".$charset;
            $option = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];

            $pdo = new PDO( $connection, $username, $password, $option );

            return $pdo;
      
        } catch (PDOException $th) {
            echo "Failed connection: ".$th->getMessage();
        }
    }
?>