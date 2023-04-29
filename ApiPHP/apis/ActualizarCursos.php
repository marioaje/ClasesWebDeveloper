<?php
include_once('../common/include.php');
include_once('../common/encipher.php');
//method file_get_contents() get all data send via API call.
//json_decode() decodes data as json and assign to variable $datos.

$datos = json_decode(file_get_contents("php://input"));

//validation whether  data is having name or not. similarly email, password etc.
if(!isset($datos->nombre)){
    sendResponse(400, [] , 'Nombre Required !');  
}else if(!isset($datos->descripcion)){
    sendResponse(400, [] , 'Descripcion Required !');  
}else if(!isset($datos->tiempo)){
     sendResponse(400, [] , 'Tiempo Required !');        
}else if(!isset($datos->id)){
    sendResponse(400, [] , 'Id Required !');        
}else if(!isset($datos->usuario)){
    sendResponse(400, [] , 'Usuario Required !');                        
}
else{
    //method doEncrypt() of encipher.php which convert plain text to encrypted text.
   // $password = doEncrypt($datos->password);
    $conn=getConnection();
    $connect=connect();
    if($conn==null){
        sendResponse(500, $conn, 'Server Connection Error !');
    }else{
        
       $stringSQL = 'UPDATE `curso` SET `nombre`=:nombre,`descripcion`=:descripcion,`tiempo`=:tiempo,`usuario`=:usuario WHERE `id`=:id;';
       
       $query = $connect->prepare($stringSQL);

        // $sql="INSERT INTO user(id, name, email, contact)";
        // $sql .= "VALUES (0,'".$datos->name."','".$datos->email."','".$datos->contact."')";        
        
        $thearray = (array) $datos;
        //var_dump( $thearray );
       // $result = $conn->query($sql); //$result = true/false on success or error respectively.
        $result = $query->execute($thearray); //$result = true/false on success or error respectively.
        if ($result) {
            sendResponse(200, $result , 'Curso Updated Successful.');
        } else {
            sendResponse(404, [] ,'Curso not Updated');
        }
        //close connection
        $conn->close();
    }
}
?>