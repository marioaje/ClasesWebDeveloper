<?php

class Rols extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->datos = [];
        $this->view->mensaje = "";
        //echo "<p>Nuevo Controller Main</p>";
    }

    function render(){
        $datos = $this->model->get();
        $this->view->datos = $datos;
        $this->view->mensajeAccion = "eliminarRol";
        $this->view->render('rols/index');
    }

    function list(){
        $datos = $this->model->getList();
        $this->view->mensaje = "";
        $this->view->datos = $datos;        
        $this->view->render('rols/list');
    }

    function crear(){
        $this->view->datos = [];
        $this->view->mensaje = "";
        $this->view->render('users/crear');
    }    

    function verUsuario($param = null){
        //var_dump($param);
        $idusuario = $param[0];
        $datos = $this->model->getByIdUsuario($idusuario);

        session_start();
        $_SESSION['idusuario'] = $idusuario;

        $this->view->datos = $datos;
        $this->view->mensaje = "";
        $this->view->render('users/detalle');

    }

    function actualizarUsuario(){
        session_start();

        if($this->model->updateByIdUsuario($_POST)){    
            $datos = new User();      

            foreach ($_POST as $key => $value) {
                $datos->$key = $value;                
            }
                   
            $this->view->datos = $datos;
            
            $this->view->mensaje = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>Success </strong>Usuario Actualizado.
                                    </div>';              
        }else{          
            $this->view->mensaje = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>Error </strong>Usuario no se actualizo.
                                    </div>';  
        }

        $this->view->render('users/detalle');

    }    

    function eliminarRol($param = null){
        //var_dump($param);
        $idusuario = $param[0];
        //echo "Se elimina ".$idusuario;
        //version ajax
        if($this->model->deleteByIdUsuario($idusuario)){                 
             $mensaje = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>Success </strong>Usuario Eliminado con el ID: '.$idusuario.'
                                    </div>';  
        }else{   
            $mensaje = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Error </strong> Usuario no se logro borrar.
                        </div>';                                  
        }

        echo $mensaje;        
    }


    function registrarUsuario(){       
        $mensaje = "";
        
        if($this->model->insertUsuario($_POST)){
            // $mensaje = "<br>";              
            $mensaje = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Success </strong>Usuario registrado.
                        </div>';              
        }else{
            $mensaje = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Error </strong> No se logro realizar el registo.
                        </div>';  
        }

        $this->view->mensaje = $mensaje;
        $this->render();
              
    }
}

?>