<?php

class Login extends Controller{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('login/index');    
    }

    function autenticar(){
        $arreglo = [
            'Email'=>$_POST['Email'],
            'Password'=>$_POST['Password']
        ];
        var_dump($arreglo);
        $user = $this->model->autenticar($arreglo);
        var_dump($user);
        // if(isset($user->IdUser)){
        //     session_start();
        //     $_SESSION['IdUser'] = $user->IdUser;
        //     $_SESSION['FirtsName'] = $user->FirtsName;
        //     $this->view->render('main/index');
        // }else{
        //     $this->view->render('login/index');
        // }        


    }

}

?>
