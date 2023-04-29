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
  <h1>Main</h1> 

  <div class="row justify-content-center align-items-center g-2">
    <div class="col">
      <h2>Informacion</h2>
      <p>Martes, Jueves, Sabados, tiende a repetir numeros</p>
    </div>
    <div class="col"></div>
    <div class="col"></div>
  </div>
</div>
<?php
  require 'footer.php';
?>