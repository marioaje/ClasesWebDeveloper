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

        $user = $this->model->autenticar($arreglo);

        if(isset($user->IdUser)){
            session_start();
            $_SESSION['IdUser'] = $user->IdUser;
            $_SESSION['FirtsName'] = $user->FirtsName;
            $this->view->render('main/index');
        }else{
            $this->view->render('login/index');
        }   
    }

    function logout(){
        session_start();
        session_destroy();
        $this->view->render('login/index');
    }

}

?>
