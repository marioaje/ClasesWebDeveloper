<?php
    function connect(){
   //     $host = 'sql318.main-hosting.eu';
        $host ='sql863.main-hosting.eu';
        // $db_name = 'u484426513_masterPro';
        // $username = 'u484426513_masterPro';
        // $password = '@EqaYJ9tQU0';

        $db_name = 'u484426513_masterCalcu';
        $username = 'u484426513_masterCalcu';
        $password = 's?FXMizTC6U';        
        
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

    function sendResponse($resp_code,$data,$message){
        echo json_encode(array('code'=>$resp_code,'message'=>$message,'data'=>$data));
    }
?>