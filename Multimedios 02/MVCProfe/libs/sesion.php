<?php 

class Sesion{

    function __construct(){
       //         
    }

    function connectionSession(){
        //session_start();

        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        if (isset($_SESSION['IdUser'] )){
         //   echo 'COnectados';
         //   $this->view->render('main/index');       
        }
        else{
            echo 'DesCOnectados';

            echo "<script>alert('Redirrecionando'); 
            window.location='login'; </script>";
            //redirect('login/index');
          //  header('Location: login/index');
            //$this->view->render('login/index');       
        }
    }

}

?>
