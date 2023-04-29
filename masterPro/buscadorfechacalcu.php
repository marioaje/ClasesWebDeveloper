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
    <h1>Buscador de Fecha con Calculo</h1> 
    <div class="row justify-content-center align-items-center g-2">
      <div class="col">
        <h2>Buscador de Fecha</h2>
        <div class="mb-3">
            <label for="" class="form-label">Ingresa la Fecha</label>
            <input type="date"
                class="form-control" name="fechabuscar" id="fechabuscar" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Buscar por fecha resultados</small>
            </div>
            <div class="input-group mb-3 d-grid gap-2">
                <a name="BuscarF" id="BuscarF" class="btn btn-success" onclick="showHint()" role="button">Buscar</a>                                            
                <a name="Repetidos" id="Repetidos" class="btn btn-warning" role="button">Repetidos</a>                                        
            </div>        
      </div>
      <div class="col">
        <textarea name="" id="" cols="30" rows="10"></textarea>
      </div>
      <div class="col"></div>
    </div>
    <div >
      <div class="mb-3">
            <label for="" class="form-label">Buscador</label>           
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
        </div>   
        <div class="table-responsive">
            <table id="table" class="table table-primary">
                <thead>
                    <tr>
                        <!-- <th scope="col">Id</th> -->
                        <th class="table-info" scope="col">Fecha</th>                        
                        <th scope="col">Nica 11:00 a.m.</th>
                        <th class="table-success" scope="col">Tica 1:00 p.m.</th>
                        <th scope="col" class="table-dark">Siguiente Jugada Nica</th>
                        <th class="table-dark" scope="col">Siguiente Jugada Tica</th>
                        <th scope="col">Nica 03:00 p.m.</th>
                        <th class="table-success" scope="col">Tica 4:30 p.m.</th>
                        <th scope="col">Nica 06:00 p.m</th>
                        <th scope="col" class="table-dark">Siguiente Jugada Nica</th>
                        <th class="table-dark" scope="col">Siguiente Jugada Tica</th>                        
                        <th class="table-success" scope="col">Tica 7:30 p.m.</th>
                        <th scope="col">Nica 09:00 p.m.</th>                        
                        <th class="table-dark"scope="col">Siguiente Jugada Tica</th>
                        <th scope="col" class="table-dark">Siguiente Jugada Nica</th>
                        <!-- <th scope="col">Primera 10:00 a.m.</th>
                        <th scope="col">Primera 06:00 p.m.</th> -->
                    </tr>
                </thead>
                <tbody id="resultadoTabla">

                </tbody>
            </table>
        </div>
        
    </div>
</div>
<script>

  $(document).ready(function () {
    var now = new Date();

    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
            $("#fechabuscar").val(today);
  });

        function showHint(){
        var parametros = {
                "fechabuscar" : $("#fechabuscar").val()
        };
        //console.log(parametros);

        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'fechacalculo.php', //archivo que recibe la peticion
                type:  'get', //método de envio
                beforeSend: function () {
                        $("#resultadoTabla").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultadoTabla").html(response);
                }
        });
      }

      $("#Repetidos").click(function (e) { 
        const arregloTabla = [];
        const arregloTablaBusqueda = [];

        $("#resultadoTabla td").each(function(){
            Temporal = $(this).text();
            Temporal = Temporal.length == 2 ? arregloTablaBusqueda.push( Temporal ) : ""; 
        });   

        var arregloResultadoTabla = arregloTablaBusqueda.sort();
        var arregloResultadoTablaSecundaria = arregloTablaBusqueda.sort();
        for (let index = 0; index < arregloResultadoTabla.length; index++) {                      
            if (arregloResultadoTabla[index] === arregloResultadoTabla[index+1]){     
                // alert(arregloResultadoTabla[index]);
                // alert(arregloResultadoTabla[index].substring(1,2)+""+arregloResultadoTabla[index].substring(0,1));                
                inversion = arregloResultadoTabla[index].substring(1,2)+""+arregloResultadoTabla[index].substring(0,1);
                $("#"+arregloResultadoTabla[index]).addClass("table-warning");                    
                $("#"+inversion).addClass("table-warning");                    
            }
            else{                
                inversion = arregloResultadoTabla[index].substring(1,2)+""+arregloResultadoTabla[index].substring(0,1);
                //alert(inversion);
                for (let indexInvertido = 0; indexInvertido < arregloResultadoTablaSecundaria.length; indexInvertido++) {                      
                    if ( arregloResultadoTablaSecundaria[indexInvertido] == inversion ){
                        $("#"+inversion).addClass("table-warning"); 
                    }                  
                }
            }                
        }    

        //console.log(arregloResultadoTabla);
      });

</script>
<script src="<?php echo constant('URL'); ?>public/js/main.js"></script>

<?php
  require 'footer.php';
?>