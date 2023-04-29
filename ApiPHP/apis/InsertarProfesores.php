<?php
include_once('../common/include.php');
include_once('../common/encipher.php');
//method file_get_contents() get all data send via API call.
//json_decode() decodes data as json and assign to variable $datos.

$datos = json_decode(file_get_contents("php://input"));
$datos->id=0;
//validation whether  data is having name or not. similarly email, password etc.
if(!isset($datos->cedula)){
    sendResponse(400, [] , 'Cedula Required !');  
}else if(!isset($datos->correoelectronico)){
    sendResponse(400, [] , 'Correo Electronico Required !');  
}else if(!isset($datos->telefono)){
     sendResponse(400, [] , 'Telefono Required !');        
}else if(!isset($datos->telefonocelular)){
    sendResponse(400, [] , 'Telefono Celular Required !');        
}else if(!isset($datos->fechanacimiento)){
    sendResponse(400, [] , 'Fechanacimiento Required !');        
}else if(!isset($datos->sexo)){
    sendResponse(400, [] , 'Sexo Required !');        
}else if(!isset($datos->direccion)){
    sendResponse(400, [] , 'Direccion Required !');        
}else if(!isset($datos->nombre)){
    sendResponse(400, [] , 'Nombre Required !');        
}else if(!isset($datos->apellidopaterno)){
    sendResponse(400, [] , 'Apellido Paterno Required !');        
}else if(!isset($datos->apellidomaterno)){
    sendResponse(400, [] , 'Apellido Materno Required !');        
}else if(!isset($datos->nacionalidad)){
    sendResponse(400, [] , 'Nacionalidad Required !');                        
}else if(!isset($datos->usuario)){
    sendResponse(400, [] , 'Usuario Required !');                        
}else if(!isset($datos->idCarreras)){
    sendResponse(400, [] , 'IdCarreras Required !');                        
}
else{
    //method doEncrypt() of encipher.php which convert plain text to encrypted text.
   // $password = doEncrypt($datos->password);
    $conn=getConnection();
    $connect=connect();
    if($conn==null){
        sendResponse(500, $conn, 'Server Connection Error !');
    }else{
        
       $stringSQL = 'INSERT INTO `profesor`(`id`, `cedula`, `correoelectronico`, 
       `telefono`, `telefonocelular`, `fechanacimiento`, `sexo`, `direccion`,
        `nombre`, `apellidopaterno`, `apellidomaterno`, `nacionalidad`, `usuario`, `idCarreras`) 
        VALUES (:id, :cedula, :correoelectronico, :telefono, :telefonocelular, :fechanacimiento,
        :sexo, :direccion, :nombre, :apellidopaterno, :apellidomaterno, :nacionalidad, :usuario, :idCarreras);';
       
       $query = $connect->prepare($stringSQL);

        // $sql="INSERT INTO user(id, name, email, contact)";
        // $sql .= "VALUES (0,'".$datos->name."','".$datos->email."','".$datos->contact."')";        
        
        $thearray = (array) $datos;
        //var_dump( $thearray );
       // $result = $conn->query($sql); //$result = true/false on success or error respectively.
        $result = $query->execute($thearray); //$result = true/false on success or error respectively.
        if ($result) {
            sendResponse(200, $result , 'Profesor Registration Successful.');
        } else {
            sendResponse(404, [] ,'Profesor not Registered');
        }
        //close connection
        $conn->close();
    }
}
?>