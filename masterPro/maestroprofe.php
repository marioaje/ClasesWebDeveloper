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
      <h2>Calculo Maestro Profesor</h2>
      <p>Martes, Jueves, Sabados, Revisar Secuencias</p>
      <p>
        <ul class="">
          <li>Domingo  5</li>
          <li>Lunes 7</li>
          <li>Martes 3</li>
          <li>Miercoles 8</li>
          <li>Jueves 9</li>
          <li>Viernes 1</li>
          <li>Sabado 6</li>
        </ul>
      </p>
    </div>
    <div class="col">
      <img src="img/369.webp" class="img" alt="">
    </div>
    <div class="row justify-content-center align-items-center g-2">
      <div class="col">
        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Numero a consultar</span>                        
                        <button name="generarConversion" id="generarConversion" class="btn btn-success" href="" role="button" onclick="showHint()">Generar</button>
                        <input type="text" class="form-control" name="consultaUniversales" id="consultaUniversales" aria-describedby="helpId" placeholder="Numero">                      
                      
        </div>  
      </div>
      <div class="col">
        <div id="resultadoGenerarConversion">
        </div>
        <div id="resultadoGenerarConversionMaestro">
        </div>       
        <div id="resultadoGenerarConversionIntegral">
        </div>   
        <div id="resultadoGenerarConversionCindy">
        </div>                   
      </div>
    </div>

 
  </div>
</div>

<script>
        function showHint(){
        //resultadoGenerarConversion
        consultaUniversales
        var parametros = {
                "consultaUniversales" : $("#consultaUniversales").val()
        };
        //console.log(parametros);

        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'universalesmaestro.php', //archivo que recibe la peticion
                type:  'get', //método de envio
                beforeSend: function () {
                        $("#resultadoGenerarConversionMaestro").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultadoGenerarConversionMaestro").html(response);
                }
        });

        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'universales.php', //archivo que recibe la peticion
                type:  'get', //método de envio
                beforeSend: function () {
                        $("#resultadoGenerarConversion").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultadoGenerarConversion").html(response);
                }
        });        

        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'universalesintegrales.php', //archivo que recibe la peticion
                type:  'get', //método de envio
                beforeSend: function () {
                        $("#resultadoGenerarConversionIntegral").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultadoGenerarConversionIntegral").html(response);
                }
        }); 
        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'universalescindy.php', //archivo que recibe la peticion
                type:  'get', //método de envio
                beforeSend: function () {
                        $("#resultadoGenerarConversionCindy").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultadoGenerarConversionCindy").html(response);
                }
        });                   
      }
</script>
<?php
  require 'footer.php';
?>