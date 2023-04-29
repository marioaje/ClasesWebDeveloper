<?php
include_once('../common/include.php');
include_once('../class/cursos.php');
include_once('../common/encipher.php');
//method file_get_contents() get all data send via API call.
//json_decode() decodes data as json and assign to variable $datos.

$datos = json_decode(file_get_contents("php://input"));

if(!isset($datos->id)){
    sendResponse(400, [] , 'id Required !');  
}else{
    $conn=getConnection();
    $connect=connect();
    if($conn==null){
        //send response if connection error occurred.
        sendResponse(500,$conn,'Server Connection Error');
    }else{
        $stringSQL = 'SELECT `id`, `nombre`, `descripcion`, `tiempo`, `usuario` FROM `curso` where `id` = :id;';
       
        $query = $connect->prepare($stringSQL);

         $thearray = (array) $datos;
         $result = $query->execute($thearray); //$result = true/false on success or error respectively.  
         $item = new Cursos();
         
        //check if user list available 
        if ($query->rowCount() > 0) {
            //PDO::FETCH_ASSOC
            while($row = $query->fetch()) {            
                $items = [];
                foreach ($row as $key => $value) {                    
                    $item->$key = $value;           
                }           
                array_push($items,$item);
            }
            sendResponse(200,$items,'Cursos Lista');
        } else {
            sendResponse(404,[],'Cursos not available');
        }
        //closing connection
        $conn->close();
    }
}
?>