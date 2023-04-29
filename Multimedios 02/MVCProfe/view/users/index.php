
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
                        foreach ($this->datos as $row){
                            $datos = new User();
                            $datos = $row;                    
                    ?>            
                    <tr id="fila-<?php echo $datos->IdUser; ?>">
                        <td><?php echo $datos->IdUser; ?></td>
                        <td><?php echo $datos->UserName; ?></td>
                        <td><?php echo $datos->FirtsName; ?></td>
                        <td><?php echo $datos->LastName; ?></td>
                        <td><?php echo $datos->Email; ?></td>
                        <td><a name="editar" id="editar" class="btn btn-warning" href="<?php echo constant('URL').'users/verUsuario/'.$datos->IdUser; ?>" role="button">Actualizar</a></td>
                        <!-- <td><a name="eliminar" id="eliminar" class="btn btn-danger" href="<?php echo constant('URL').'users/eliminarUsuario/'.$datos->IdUser; ?>" role="button">Eliminar</a></td> -->
                        <td><a name="eliminar" id="eliminar" class="btn btn-danger " onclick="eliminar(<?php echo $datos->IdUser; ?>)" role="button">Eliminar</a></td>
                        <!-- <td><a name="eliminar" id="eliminar" class="btn btn-danger btneliminaruser" data-ids="<?php echo $datos->IdUser; ?>" role="button" data-bs-toggle="modal" data-bs-target="#modelId">Eliminar</a></td> -->
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
    <!-- Modal -->
    <!-- <div class="modal fade" id="modelId" name="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title ">Proceso de confirmar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Desea eliminar el siguiente registro <h2 id="ids">...</h2> <label for="" id="names"></label>
                    <input id="idsdelete" type="hidden" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" onclick="eliminarDatosGeneral('users/eliminarUsuario/')">Si</button>
                </div>
            </div>
        </div>
    </div> -->
    <script>
        // function eliminarUsuario(ids){
        //     var myModal = new bootstrap.Modal(document.getElementById('modelId'));
        //     myModal.show();
        //     $("#ids").text(ids);
        //     $("#idsdelete").val(ids);                 
        // }

        // function eliminarDatosGeneral(action){
        //     const idsdelete = $("#idsdelete").val();            
        //     //alert(urlprincipal+action);
        //     httpRequest(urlprincipal+action+idsdelete, function(){                
        //         const tbody = document.querySelector("#myTable");
        //         const fila = document.querySelector("#fila-"+idsdelete);                
        //         tbody.removeChild(fila);
        //     });    
        //     //var myModal = new bootstrap.Modal(document.getElementById('modelId'));
        //     // var myModal = new bootstrap.Modal(document.getElementById('modelId'))
        //     // myModal.disponse();
        //     var myModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('modelId'));
        //     myModal.hide();
        // }
        
    </script>
    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>    
<?php
  require 'view/misc/modalDelete.php';
  require 'view/footer.php';
?>
