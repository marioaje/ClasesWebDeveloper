<?php
include_once('../common/include.php');
include_once('../class/estudiantes.php');
//get connection from database.php
$conn=getConnection();

if($conn==null){
    //send response if connection error occurred.
    sendResponse(500,$conn,'Server Connection Error');
}else{
    $sql = "SELECT `id`, `cedula`, `correoelectronico`, `telefono`, `telefonocelular`, `fechanacimiento`, `sexo`, `direccion`, `nombre`, `apellidopaterno`, `apellidomaterno`, `nacionalidad`, `idCarreras`,usuario FROM `estudiante` order by  `id` desc ;";
    $result = $conn->query($sql);
    
    //check if user list available 
    if ($result->num_rows > 0) { 
        $items = [];
        while($row = $result->fetch_assoc()) {
            $item = new Estudiante();
            foreach ($row as $key => $value) {
                $item->$key = $value; 
            }
           
            array_push($items,$item);
        }
        sendResponse(200,$items,'Estudiante Lista');
    } else {
        sendResponse(404,[],'Estudiante not available');
    }
    //closing connection
    $conn->close();
}
?>