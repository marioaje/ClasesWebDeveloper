
    <?php require 'view/header.php'; ?>
    <?php require 'view/menu.php'; ?>

    <div id="main" class="container col-12 col-md-8 col-lg-6 col-xl-5">
        <h1>Seccion de detalles del usuario</h1>

        <div class="center"><?php echo $this->mensaje; ?></div>
        <form  class="form-control" action="<?php echo constant('URL'); ?>users/actualizarUsuario" method="post">
            <?php require 'form.php'; ?>                
        </form>
    </div>

    <?php require 'view/footer.php';?>
