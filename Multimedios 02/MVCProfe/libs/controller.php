<?php

class Controller extends Sesion {

    function __construct(){       
        parent::__construct();     
        $this->view = new View();
    }

    function loadModel($model){
        $url = 'model/'.$model.'model.php';
        if(file_exists($url)){
            require $url;

            $modelName = $model.'Model';
         
            $this->model = new $modelName();
        }

    }
}

?>