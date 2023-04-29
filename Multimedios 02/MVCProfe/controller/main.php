<?php

class Main extends Controller{

    function __construct(){
        parent::__construct();     
       // $this->render('login/index');  ;
        parent::connectionSession();
    }

    function render(){ 
      //  session_start();
        
      //  if (isset($_SESSION['IdUser'] )){
            $this->view->render('main/index');       
     //   }
    //    else{
    //        $this->view->render('login/index');       
    //    }
        
    }

}

?>