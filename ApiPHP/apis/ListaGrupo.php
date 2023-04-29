<?php
include_once('../common/include.php');
include_once('../class/grupos.php');
//get connection from database.php
$conn=getConnection();

if($conn==null){
    //send response if connection error occurred.
    sendResponse(500,$conn,'Server Connection Error');
}else{
    $sql = "SELECT `id`, `nombre` FROM `grupo` ;";
    $result = $conn->query($sql);
    
    //check if user list available 
    if ($result->num_rows > 0) {

        $items = [];
        while($row = $result->fetch_assoc()) {
            $item = new Grupos();
            foreach ($row as $key => $value) {
                $item->$key = $value; 
            }           
            array_push($items,$item);
        }
        sendResponse(200,$items,'Grupo Lista');
    } else {
        sendResponse(404,[],'Grupo not available');
    }
    //closing connection
    $conn->close();
}
?>