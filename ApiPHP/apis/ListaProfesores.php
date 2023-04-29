<?php
include_once('../common/include.php');
include_once('../class/profesores.php');
//get connection from database.php
$conn=getConnection();

if($conn==null){
    //send response if connection error occurred.
    sendResponse(500,$conn,'Server Connection Error');
}else{
    $sql = "SELECT `id`, `cedula`, `correoelectronico`, `telefono`, `telefonocelular`, `fechanacimiento`, `sexo`, `direccion`, `nombre`, `apellidopaterno`, `apellidomaterno`, `nacionalidad`, usuario, idCarreras  FROM `profesor` order by  `id` desc ;";
    $result = $conn->query($sql);
    
    //check if user list available 
    if ($result->num_rows > 0) {

        $items = [];
        while($row = $result->fetch_assoc()) {
            $item = new Profesor();
            foreach ($row as $key => $value) {
                $item->$key = $value; 
            }           
            array_push($items,$item);
        }
        sendResponse(200,$items,'Profesor Lista');
    } else {
        sendResponse(404,[],'Profesor not available');
    }
    //closing connection
    $conn->close();
}
?>