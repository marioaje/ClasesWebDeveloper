<?php
include_once 'class/user.php';

class UsersModel extends Model {
    public function __construct(){
        parent::__construct();
    }

    public function insertUsuario($datos){
        try{
            $query = $this->db->connect()->prepare('INSERT INTO `usuarios`(`IdUsuario`, `Nombreusuario`, `Nombre`, `Apellidos`, `Email`, `Password`) VALUES (:idusuario, :nombreusuario, :nombre, :apellidos, :email, :passwords)');
            $query->execute($datos);
            return true;
        }catch(PDOException $e){
            //print_r('Error connection: ' . $e->getMessage());
            return false;
        }
        
        // $query->execute(['idusuario' => $datos['idusuario'],
        //                 'nombreusuario' => $datos['nombreusuario'],
        //                        'nombre' => $datos['nombre'],
        //                     'apellidos' => $datos['apellidos'],
        //                         'email' => $datos['email'],
        //                      'passwords' => $datos['passwords']]
        //                     );
                          
        // var_dump($datos);
        
        
        //echo "Insertar de datos Usuario";
    }



    public function get(){

        $items = [];
        try{
            $query = $this->db->connect()->query("SELECT * FROM `user`");
           
            while ($row = $query->fetch()){
                $item = new Users();
                
                $item->IdUser = $row["IdUser"];
                $item->IdPersonal = $row["IdPersonal"];
                $item->FirtsName = $row["FirtsName"];
                $item->LastName = $row["LastName"];
                $item->Email = $row["Email"];
                $item->UserName = $row["UserName"];
                $item->IdRol = $row["IdRol"];
                $item->UpdatedAt = $row["UpdatedAt"];
                $item->CreatedAt= $row["CreatedAt"];
                $item->Enabled = $row["Enabled"];

                array_push($items, $item);
            }
            
            return $items;

        }catch(PDOException $e){
            return [];
        }

    }

    public function getByIdUsuario($id){
        $item = new Users();

        $query = $this->db->connect()->prepare("SELECT * FROM `usuarios` WHERE `IdUsuario` = :idusuario");
        
        try {
            $query->execute(['idusuario'=>$id]);

            while ($row = $query->fetch()){
                                
                $item->idusuario = $row['IdUsuario'];
                $item->nombreusuario = $row['Nombreusuario'];
                $item->nombre = $row['Nombre'];
                $item->apellidos = $row['Apellidos'];
                $item->email = $row['Email'];
                $item->passwords = $row['Password'];
            }

            return $item;
        }catch(PDOException $e){
            return [];
        }
    }

    public function updateByIdUsuario($datos){
        try{
            $query = $this->db->connect()->prepare('UPDATE `usuarios` SET `Nombreusuario`= :nombreusuario,`Nombre`= :nombre,`Apellidos`= :apellidos,`Email`= :email WHERE `IdUsuario`= :idusuario;');
            
            $query->execute($datos);
            return true;
        }catch(PDOException $e){
            //print_r('Error connection: ' . $e->getMessage());
            return false;
        }
    }

    public function deleteByIdUsuario($id){
        try{
            $query = $this->db->connect()->prepare('DELETE FROM `usuarios` WHERE `IdUsuario`= :idusuario;');
            
            $query->execute(['idusuario'=>$id]);
            return true;
        }catch(PDOException $e){
            //print_r('Error connection: ' . $e->getMessage());
            return false;
        }
    }   
}


?>