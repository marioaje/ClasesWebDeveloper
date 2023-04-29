
<?php
  require 'view/header.php';
?>

    <div id="main" class="container">
        <h1>Seccion de Consulta</h1>
        <div id="respuesta" class="center"><?php echo $this->mensaje; ?></div>
        <br>
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
        <div class="table-responsive-sm">      
            <table class="table table-light table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>IDusuario</th>
                        <th>Nombre Usuario</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th colspan="2">Acciones</th>                    
                    </tr>    
                </thead>
                <tbody id="myTable">
                    <?php
                        foreach ($this->usuarios as $row){
                            $usuario = new User();
                            $usuario = $row;                    
                    ?>            
                    <tr id="fila-<?php echo $usuario->IdUser; ?>">
                        <td><?php echo $usuario->IdUser; ?></td>
                        <td><?php echo $usuario->UserName; ?></td>
                        <td><?php echo $usuario->FirtsName; ?></td>
                        <td><?php echo $usuario->LastName; ?></td>
                        <td><?php echo $usuario->Email; ?></td>
                        <td><a name="editar" id="editar" class="btn btn-warning" href="<?php echo constant('URL').'consulta/verUsuario/'.$usuario->IdUser; ?>" role="button">Actualizar</a></td>
                        <!-- <td><a name="eliminar" id="eliminar" class="btn btn-danger" href="<?php echo constant('URL').'consulta/eliminarUsuario/'.$usuario->IdUser; ?>" role="button">Eliminar</a></td> -->
                        <td><a name="eliminar" id="eliminar" class="btn btn-danger btneliminarusuario" data-idusuario="<?php echo $usuario->IdUser; ?>" role="button">Eliminar</a></td>

                    </tr>

                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>IDusuario</th>
                        <th>Nombre Usuario</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th colspan="2">Acciones</th>
                    </tr>    
                </tfoot>
            </table>     
        </div>   
    </div>
    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>    
<?php
  require 'view/footer.php';
?>
