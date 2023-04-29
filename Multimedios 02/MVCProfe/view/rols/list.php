<?php echo $this->mensaje; ?>
<label for="" class="form-label">Rol</label>
      <select name="IdRol" id="IdRol">
          <?php
          foreach ($this->datos as $row){
                  $datos = new Rol();
                  $datos = $row;                    
          ?>            
            <option value="<?php echo $datos->IdRol; ?>"><?php echo $datos->NameRol; ?></option>          
          <?php
              }
          ?>
      </select>