<?php
include_once('../common/include.php');
include_once('../common/encipher.php');
//method file_get_contents() get all data send via API call.
//json_decode() decodes data as json and assign to variable $user.

$user = json_decode(file_get_contents("php://input"));
$user->id=0;
//validation whether user data is having name or not. similarly email, password etc.
if(!$user->name){
    sendResponse(400, [] , 'Name Required !');  
}else if(!$user->email){
    sendResponse(400, [] , 'Email Required !');  
// }//else if(!$user->password){
//     sendResponse(400, [] , 'Password Required !');        
}else if(!$user->contact){
    sendResponse(400, [] , 'Contact Required !');  
}else{
    //method doEncrypt() of encipher.php which convert plain text to encrypted text.
   // $password = doEncrypt($user->password);
    $conn=getConnection();
    $connect=connect();
    if($conn==null){
        sendResponse(500, $conn, 'Server Connection Error !');
    }else{
        
       $stringSQL = 'INSERT INTO `user`(`id`, `name`, `email`, `contact`) VALUES ( :id , :name, :email, :contact );';
        
       $query = $connect->prepare($stringSQL);

        // $sql="INSERT INTO user(id, name, email, contact)";
        // $sql .= "VALUES (0,'".$user->name."','".$user->email."','".$user->contact."')";        
        
        $thearray = (array) $user;
        //var_dump( $thearray );
       // $result = $conn->query($sql); //$result = true/false on success or error respectively.
        $result = $query->execute($thearray); //$result = true/false on success or error respectively.
        if ($result) {
            sendResponse(200, $result , 'User Registration Successful.');
        } else {
            sendResponse(404, [] ,'User not Registered');
        }
        //close connection
        $conn->close();
    }
}
?>