
    <?php require 'views/header.php'; ?>

    <div id="main" class="container col-12 col-md-8 col-lg-6 col-xl-5">
        <h1>Seccion de detalles del usuario</h1>

        <div class="center"><?php echo $this->mensaje; ?></div>
        <form  class="form-control" action="<?php echo constant('URL'); ?>consulta/actualizarUsuario" method="post">
            <p>
                <label for="nombreusuario">Nombre Usuario</label><br>
                <input class="form-control" type="text" name="nombreusuario" id="nombreusuario" value="<?php echo $this->usuario->nombreusuario; ?>" required>                              
                <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $this->usuario->idusuario; ?>" required>                              
            </p>
            <p>
                <label for="nombre">Nombre</label><br>
                <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $this->usuario->nombre; ?>" required>               
            </p>
            <p>
                <label for="apellidos">Apellidos</label><br>
                <input class="form-control" type="text" name="apellidos" id="apellidos" value="<?php echo $this->usuario->apellidos; ?>" required>
            </p>
            <p>
                <label for="email">Email</label><br>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo $this->usuario->email; ?>" required>
            </p>    
            <p>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </p>        
        </form>
    </div>

    <?php require 'views/footer.php';?>
