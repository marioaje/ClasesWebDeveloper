<?php
  session_start();

  if ($_SESSION["Enabled"] != 1){
    header('Location: index.php');
  }
  require 'header.php';  
  require 'menu.php';
?>
</head>
<body>
    <div class="container-fluid">
<div id="main" class="container">
  <h1>Registro Numeros</h1> 

  <div class="row justify-content-center align-items-center g-2">
    <div class="col">
        <form>
        <div class="mb-3">
                    <label for="" class="form-label"></label>
                    <input type="number"
                        class="form-control" name="Codigo" id="Codigo" aria-describedby="helpId" placeholder="" value="42">
                    <small id="helpId" class="form-text text-muted">Codigo</small>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"></label>
                        <input type="date" class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="" >
                        <small id="helpId" class="form-text text-muted">Fecha</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <div class="col"></div>
    <div class="col"></div>
  </div>
</div>
<?php
  require 'footer.php';
?>