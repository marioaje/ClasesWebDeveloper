
<?php
  require 'view/header.php';
  require 'view/menu.php';
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
                        <th>Id Rol</th>
                        <th>Name Rol</th>
                        <th>Id Menu</th>
                        <th>CreatedAt</th>  
                        <th>EnabledRol</th>                      
                        <th colspan="2">Acciones</th>                    
                    </tr>    
                </thead>
                <tbody id="myTable">
                    <?php
                        foreach ($this->datos as $row){
                            $datos = new Rol();
                            $datos = $row;                    
                    ?>            
                    
                    <tr id="fila-<?php echo $datos->IdRol; ?>">
                        <td><?php echo $datos->IdRol; ?></td>
                        <td><?php echo $datos->NameRol; ?></td>
                        <td><?php echo $datos->IdMenu; ?></td>
                        <td><?php echo $datos->CreatedAt; ?></td>
                        <td><?php echo $datos->EnabledRol; ?></td>
                        <td><a name="editar" id="editar" class="btn btn-warning" href="<?php echo constant('URL').'users/verUsuario/'.$datos->IdRol; ?>" role="button">Actualizar</a></td>
                        <td><a name="eliminar" id="eliminar" class="btn btn-danger " onclick="eliminar(<?php echo $datos->IdRol; ?>)" role="button">Eliminar</a></td>
                    </tr>

                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id Rol</th>
                        <th>Name Rol</th>
                        <th>Id Menu</th>
                        <th>CreatedAt</th>                       
                        <th>EnabledRol</th>                       
                        <th colspan="2">Acciones</th>             
                    </tr>    
                </tfoot>
            </table>     
        </div>   
    </div>
    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>    
<?php
  require 'view/misc/modalDelete.php';
  require 'view/footer.php';
?>
