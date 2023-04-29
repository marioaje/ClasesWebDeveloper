<?php

class Usuarios extends Controller{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('usuarios/index');
      //  $user = $this->model->get($arreglo);


    }
}
?>