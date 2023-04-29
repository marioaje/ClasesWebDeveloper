<?php

class App {

    function __construct(){

       $url = isset($_GET['url']) ? $_GET['url']: null;
               // if ( vacio) verdadero usa geturl,  sino es null
       $url = rtrim( $url, '/');

       $url = explode('/', $url);

        // paginas/admin/create/
        // 0 admin/ 1 create/

        if(empty($url[0])){
            $archivoController = 'controller/main.php';
            require_once $archivoController;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }

        $archivoController = 'controller/'.$url[0].'.php';


        if(file_exists($archivoController)){
            require_once $archivoController;
              
            $controller = new $url[0];   
            $controller->loadModel($url[0]);
    // paginas/admin/create/
    
    //1/mario/jimenez/mario/43/3443/4
            $nparam = sizeof($url);

            if($nparam > 1){
                if($nparam > 2){
                    $param = [];
                    for($i = 2; $i < $nparam; $i++){
                        array_push($param, $url[$i]);
                    }
                    // paginas/admin/create/
                    // 0 admin/ 1 create/                    
                    $controller->{$url[1]}($param);
                                //{ create ($datos) }
                }else{
                    $controller->{$url[1]}();
                }
            }else{
                $controller->render();
            }

        }
        else{
            require_once 'controller/error.php';
            $controller = new Errores();
        }

    }

}


?>