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
    <h1>Registro de Fecha</h1> 
    <form method="POST" action="guardarnumeros.php">
    <div class="row justify-content-center align-items-center g-2">
      <div class="col">
        <h2>Registro de Fecha</h2>
        <div class="mb-3">
            <label for="" class="form-label">Ingresa la Fecha</label>
            <input type="date"
                class="form-control" name="fechabuscar" id="fechabuscar" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Ingresa la Fecha</small>
            </div>
            <div class="input-group mb-3 d-grid gap-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a name="BuscarF" id="BuscarF" class="btn btn-info" onclick="showHint()" role="button">Cargar</a>                                                                                                                                                                                                
            </div>        
      </div>
      <div class="col">
        <div id="resultadoTabla"></div>
        <h2>Nica</h2>
        <div class="mb-3">
          <label for="" class="form-label">11:00 a.m.</label>
          <input type="hidden"
            class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
          <input type="number"
            class="form-control" name="nica11" id="nica11" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">11:00 a.m.</small>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">03:00 p.m.</label>
          <input type="number"
            class="form-control" name="nica03" id="nica03" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">03:00 p.m.</small>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">06:00 p.m.</label>
          <input type="number"
            class="form-control" name="nica06" id="nica06" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">06:00 p.m.</small>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">09:00 p.m.</label>
          <input type="number"
            class="form-control" name="nica09" id="nica09" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">09:00 p.m.</small>
        </div>                        
      </div>
      <div class="col">
        <h2>Tica</h2>
        <div class="mb-3">
          <label for="" class="form-label">01:00 p.m.</label>
          <input type="number"
            class="form-control" name="tica01" id="tica01" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">01:00 p.m.</small>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">04:30 p.m.</label>
          <input type="number"
            class="form-control" name="tica0430" id="tica0430" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">04:30 p.m.</small>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">07:30 p.m.</label>
          <input type="number"
            class="form-control" name="tica0730" id="tica0730" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">07:30 p.m.</small>
        </div>        
      </div>
      <div class="col">
        <h2>Primera</h2>
        <div class="mb-3">
          <label for="" class="form-label">10:00 a.m.</label>
          <input type="number"
            class="form-control" name="primera10" id="primera10" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">10:00 a.m.</small>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">06:00 p.m.</label>
          <input type="number"
            class="form-control" name="primera06" id="primera06" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">06:00 p.m.</small>
        </div>
      </div>
    </div>
    <div>
    </form>
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
                url:   'cargarnumeros.php', //archivo que recibe la peticion
                type:  'get', //método de envio
                beforeSend: function () {
                        $("#resultadoTabla").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                  const obj = JSON.parse(response);  
                  console.log(obj.data[0].id); 
                  $("#id").val(obj.data[0].id);               
                  $("#nica11").val(obj.data[0].nica11);
                  $("#nica03").val(obj.data[0].nica03);
                  $("#nica06").val(obj.data[0].nica06);
                  $("#nica09").val(obj.data[0].nica09);
                  $("#tica01").val(obj.data[0].tica01);
                  $("#tica0430").val(obj.data[0].tica0430);
                  $("#tica0730").val(obj.data[0].tica0730);
                  $("#primera10").val(obj.data[0].primera10);
                  $("#primera06").val(obj.data[0].primera06);                  
                  //console.log(obj.data[0]);
                       // $("#resultadoTabla").html(response);
                  $("#resultadoTabla").html("");
                }                
        });
        
      }

      // $("#Repetidos").click(function (e) { 
      //   const arregloTabla = [];
      //   const arregloTablaBusqueda = [];

      //   $("#resultadoTabla td").each(function(){
      //       Temporal = $(this).text();
      //       Temporal = Temporal.length == 2 ? arregloTablaBusqueda.push( Temporal ) : ""; 
      //   });   

      //   var arregloResultadoTabla = arregloTablaBusqueda.sort();
      //   var arregloResultadoTablaSecundaria = arregloTablaBusqueda.sort();
      //   for (let index = 0; index < arregloResultadoTabla.length; index++) {                      
      //       if (arregloResultadoTabla[index] === arregloResultadoTabla[index+1]){     
      //           // alert(arregloResultadoTabla[index]);
      //           // alert(arregloResultadoTabla[index].substring(1,2)+""+arregloResultadoTabla[index].substring(0,1));                
      //           inversion = arregloResultadoTabla[index].substring(1,2)+""+arregloResultadoTabla[index].substring(0,1);
      //           $("#"+arregloResultadoTabla[index]).addClass("table-warning");                    
      //           $("#"+inversion).addClass("table-warning");                    
      //       }
      //       else{                
      //           inversion = arregloResultadoTabla[index].substring(1,2)+""+arregloResultadoTabla[index].substring(0,1);
      //           //alert(inversion);
      //           for (let indexInvertido = 0; indexInvertido < arregloResultadoTablaSecundaria.length; indexInvertido++) {                      
      //               if ( arregloResultadoTablaSecundaria[indexInvertido] == inversion ){
      //                   $("#"+inversion).addClass("table-warning"); 
      //               }                  
      //           }
      //       }                
      //   }    

        //console.log(arregloResultadoTabla);
      //});

</script>


<?php
  require 'footer.php';
?>