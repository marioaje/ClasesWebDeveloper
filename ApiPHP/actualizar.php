<?php 
  include_once('menu.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>API React</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
    <div class="container-fluid">
        <h1>API React Actualizar</h1>
        <?php
            echo $menu;
        ?>    
        <div class="card text-start">          
          <div class="card-body">
            <h4 class="card-title">Mario Jimenez</h4>
            <p class="card-text">Full Stack Developer</p>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
          <h4 class="card-title">apis/ActualizarEstudiantes.php</h4>
            <blockquote class="blockquote mb-0">
              <p>
                {
                  "id":2,
                  "cedula" : "8128128",
                  "correoelectronico":"marioaje@",
                  "telefono":"1212" ,
                  "telefonocelular":"616161",
                  "fechanacimiento": "12-02-2002",
                  "sexo": "Masculino",
                  "direccion": "Mi casa" ,
                  "nombre" : "Mari", 
                  "apellidopaterno":"1primer", 
                  "apellidomaterno": "2segundo",
                  "nacionalidad": "Costa Rica" ,
                  "idCarreras": "1", 
                  "usuario":"profesor Mario"
                }
              </p>   
            </blockquote>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
          <h4 class="card-title">apis/ActualizarProfesores.php</h4>
            <blockquote class="blockquote mb-0">
              <p>
                {
                  "id":2,
                  "cedula" : "8128128",
                  "correoelectronico":"marioaje@",
                  "telefono":"1212" ,
                  "telefonocelular":"616161",
                  "fechanacimiento": "12-02-2002",
                  "sexo": "Masculino",
                  "direccion": "Mi casa" ,
                  "nombre" : "Mari", 
                  "apellidopaterno":"1primer", 
                  "apellidomaterno": "2segundo",
                  "nacionalidad": "Costa Rica" , 
                  "usuario":"profesor Mario"
                }
              </p>   
            </blockquote>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
          <h4 class="card-title">apis/ActualizarCursos.php</h4>
            <blockquote class="blockquote mb-0">
              <p>
               {
                  "id":3,
                  "nombre":"React 22",
                  "descripcion":"React Junior",
                  "tiempo":"10 Meses", 
                  "usuario":"profesor Mario"
                }
              </p>   
            </blockquote>
          </div>
        </div>                
    </div>
    
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>