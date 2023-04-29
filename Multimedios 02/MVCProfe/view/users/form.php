 
<p>
    <label for="nombredatos">Id Personal</label><br>
    <input class="form-control" type="text" name="IdPersonal" id="IdPersonal" value="<?php echo isset($this->datos->IdPersonal)?$this->datos->IdPersonal:""; ?>" required>                                                    
</p>
<p>
    <label for="nombredatos">Nombre</label><br>
    <input class="form-control" type="text" name="FirtsName" id="FirtsName" value="<?php echo isset($this->datos->FirtsName)?$this->datos->FirtsName:""; ?>" required>                              
    <input type="hidden" name="IdUser" id="IdUser" value="<?php echo isset($this->datos->IdUser)?$this->datos->IdUser:"0"; ?>" required>                              
</p>
<p>
    <label for="nombre">Apellido</label><br>
    <input class="form-control" type="text" name="LastName" id="LastName" value="<?php echo isset($this->datos->LastName)?$this->datos->LastName:""; ?>" required>              
</p>
<p>
    <label for="email">Email</label><br>
    <input class="form-control" type="email" name="Email" id="Email" value="<?php echo isset($this->datos->Email)?$this->datos->Email:""; ?>" required>
</p>  
<p>
    <label for="nombre">User Name</label><br>
    <input class="form-control" type="text" name="UserName" id="UserName" value="<?php echo isset($this->datos->UserName)?$this->datos->UserName:""; ?>" required>              
</p>
<p>
    <div class="mb-3" id="ListRols" name="ListRols">
      
    </div>
</p>
<p>
    <div class="mb-3">
      <label for="" class="form-label">Enabled User</label>      
      <select name="EnabledUser" id="EnabledUser">
        <option value="0">Inactivo</option>
        <option value="1">Activo</option>
      </select>
    </div>
</p>
<p>
    <button type="submit" class="btn btn-primary">Enviar</button>
</p>
 
 
 
 
<script>                
        $(document).ready(function () {          
            var select_box_element_EnabledUser = document.querySelector('#EnabledUser');
            dselect(select_box_element_EnabledUser, {
                search: true
            });
 
            loadListRols();      
           
            setTimeout(loadDselects, 500);        
        });
 
        function loadDselects(){          
          var select_box_element_IdRol = document.querySelector('#IdRol');
                    dselect(select_box_element_IdRol, {
                       search: true
                    });  
        }
       
        function loadListRols(){
                $.post(
                    urlprincipal+"rols/list",
                    { //parameters
                    },
                      function(data){
                          $("#ListRols").html(data);
                    });
            }        
</script>

