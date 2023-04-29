<?php

class Users extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->usuarios = [];
        $this->view->mensaje = "";
        //echo "<p>Nuevo Controller Main</p>";
    }

    function render(){
        $usuarios = $this->model->get();
        $this->view->usuarios = $usuarios;
        $this->view->render('users/index');
    }

    function verUsuario($param = null){
        //var_dump($param);
        $idusuario = $param[0];
        $usuarios = $this->model->getByIdUsuario($idusuario);

        session_start();
        $_SESSION['idusuario'] = $idusuario;

        $this->view->usuario = $usuarios;
        $this->view->mensaje = "";
        $this->view->render('users/detalle');

    }

    function actualizarUsuario(){
        session_start();
        $idusuario = $_SESSION['idusuario'];        
        $nombreusuario = $_POST['nombreusuario'];
        $nombre        = $_POST['nombre'];
        $apellidos     = $_POST['apellidos'];
        $email         = $_POST['email'];
        //$password      = "1234567890";

        $arreglo = [
            'idusuario' => $idusuario,
            'nombreusuario' => $nombreusuario,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email
        ];

        //unset($_SESSION['idusuario']);

        if($this->model->updateByIdUsuario($arreglo)){    
            $usuario = new User();      

            $usuario->idusuario = $idusuario;
            $usuario->nombreusuario = $nombreusuario;
            $usuario->nombre = $nombre;
            $usuario->apellidos = $apellidos;
            $usuario->email = $email;
            //$usuario->passwords = $row['Password'];
            
            $this->view->usuario = $usuario;
            $this->view->mensaje = '<div class="center mt-4 p-1 bg-primary text-white rounded"><h1>Usuario Actualizado</h1></div>';  
        }else{          
            $this->view->mensaje = '<div class="center mt-4 p-1 bg-danger text-white rounded"><h1>Usuario no se actualizo</h1></div>';  
        }

        $this->view->render('consulta/detalle');

    }    

    function eliminarUsuario($param = null){
        //var_dump($param);
        $idusuario = $param[0];
        //echo "Se elimina ".$idusuario;
        //version ajax
        if($this->model->deleteByIdUsuario($idusuario)){    
             $mensaje = '<div class="center mt-4 p-1 bg-primary text-white rounded"><h1>Usuario Eliminado con el ID: '.$idusuario.'</h1></div>';  
             //$mensaje = "Borrado";
        }else{          
             $mensaje = '<div class="center mt-4 p-1 bg-danger text-white rounded"><h1>Usuario no se logro borrar</h1></div>';  
             //$mensaje = "No Borrado";
        }

        echo $mensaje;
        // $this->render();

        //v1
        // if($this->model->deleteByIdUsuario($idusuario)){    
        //     $this->view->mensaje = '<div class="center mt-4 p-1 bg-primary text-white rounded"><h1>Usuario Eliminado</h1></div>';  
        // }else{          
        //     $this->view->mensaje = '<div class="center mt-4 p-1 bg-danger text-white rounded"><h1>Usuario no se logro borrar</h1></div>';  
        // }

        // $this->render();
        
    }


    function registrarUsuario(){
        $nombreusuario = $_POST['nombreusuario'];
        $nombre        = $_POST['nombre'];
        $apellidos     = $_POST['apellidos'];
        $email         = $_POST['email'];
        $password      = "1234567890";

        $arreglo = [
            'idusuario' => 0,
            'nombreusuario' => $nombreusuario,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email,
            'passwords' => $password
        ];
        $mensaje = "";
        //var_dump($arreglo);
        if($this->model->insertUsuario($arreglo)){
            // $mensaje = "<br>";  
            $mensaje = '<div class="center mt-4 p-1 bg-primary text-white rounded"><h1>Usuario Creado</h1></div>';  
        }else{
            $mensaje = '<div class="center mt-4 p-1 bg-danger text-white rounded"><h1>Usuario No Creado</h1></div>';  
        }

        $this->view->mensaje = $mensaje;
        $this->render();
              
    }
}

?>