<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>              
</head>
<body>
    <div class="container-fluid">
        <h1>Formulario de datos</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
              <label for="" class="form-label"></label>
              <input type="text"
                class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="" required>
              <small id="helpId" class="form-text text-muted">Nombre</small>
            </div>
            <div class="mb-3">
              <label for="" class="form-label"></label>
              <input type="text"
                class="form-control" name="Apellido" id="Apellido" aria-describedby="helpId" placeholder="" required>
              <small id="helpId" class="form-text text-muted">Apellido</small>
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
        </form>
    </div>    

<?php
    if  ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $Nombre = $_REQUEST["Nombre"];
        $Apellido = $_REQUEST["Apellido"];
        if( (empty($Nombre)) || empty($Apellido) ){
            echo "Espacios en blanco";
        }else{
            echo "Mi nombre es: ".$Nombre." apellido: ".$Apellido;
        }        
    }
?>

</body>
</html>