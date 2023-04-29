<?php
  session_start();

  if ($_SESSION["Enabled"] != 1){
    header('Location: index.php');
  }
    $fechaActual = date("d-m-Y");    
   require 'header.php';  
?>

    <style>
        .xroja{
            background-image: url("img/xroja.jpg");
            background-repeat: no-repeat;
        }
        .xrojatabla{
            width: 290px;
            height: 270px;
        }
    </style>
    <script>
        $( document ).ready(function() {

            var now = new Date();

            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
 
            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
            $("#fecha").val(today);


            $("#Repetidos").click(function(){
                const arregloTabla = [];
                const arregloTablaBusqueda = [];
                const arregloResultado = [];
                const arregloFavoritos = {};
                var arregloRepetidoss = {                    
                 };
                var arregloRepetidos = {
                    "cero":0,
                    "uno":0,
                    "dos":0,
                    "tres":0,
                    "cuatro":0,
                    "cinco":0,
                    "seis":0,
                    "siete":0,
                    "ocho":0,
                    "nueve":0
                };

                var arregloDesempate = {
                    "cero":3,
                    "uno":1,
                    "dos":1,
                    "tres":2,
                    "cuatro":1,
                    "cinco":2,
                    "seis":1,
                    "siete":1,
                    "ocho":2,
                    "nueve":4
                }; 
                
                let arregloConversiones = {
                    "0":"5",
                    "1":"6",
                    "2":"7",
                    "3":"8",
                    "4":"9",
                    "5":"0",
                    "6":"1",
                    "7":"2",
                    "8":"3",
                    "9":"4"
                };                    
                

                $("#repetida").closest('tr').remove();

                $("#myInput td").each(function(){
                    Temporal = $(this).text();
                    Temporal = Temporal.replace( "(", '');
                    Temporal = Temporal.replace( ")", '');

                    arregloTabla.push( Temporal );
                    arregloTablaBusqueda.push( Temporal );
                    
                });
                temporalCentral = arregloTabla[9];  
                var arregloTablas = arregloTabla.sort();  
                arregloTablas = removeItemOnce(arregloTablas, temporalCentral) ;
                arregloTablas = removeItemAll(arregloTablas, '');          
                
                for (let index = 0; index < arregloTablas.length; index++) {
                    contadorRepetidos(arregloRepetidos, arregloTablas[index].substring(0,1));
                    contadorRepetidos(arregloRepetidos, arregloTablas[index].substring(1,2));                                
                }
                
                //console.log(arregloRepetidos);

                for (let index = 0; index < arregloTablas.length; index++){  
                    if (arregloTablas[index] === arregloTablas[index+1]){
                        if (arregloTablas[index]!==''){
                            arregloResultado.push(arregloTablas[index]);
                            resultado = ''+arregloTablas[index];                     
                            $('#'+resultado).addClass("table-success");                     
                        }
                    }
                    var inversion = arregloTablas[index];
                    inversion = inversion.substring(1,2)+inversion.substring(0,1);

                    for (let subindex = 0; subindex < arregloTablas.length; subindex++) {
                        if (inversion===arregloTablas[subindex]){
                            if (arregloTablas[subindex]!==''){
                                arregloResultado.push(arregloTablas[subindex]);
                                resultado = ''+arregloTablas[subindex];                                
                                $('#'+resultado).addClass("table-success");
                            }
                        }
                    }
                }
                var arregloResultadoTabla = arregloResultado.sort();

                for (let index = 0; index < arregloResultadoTabla.length; index++) {                      
                    if (arregloResultadoTabla[index] === arregloResultadoTabla[index+1]){                     
                        removeItemOnce(arregloResultadoTabla, arregloResultadoTabla[index]);                     
                    }                
                }    
                for (let index = 0; index < arregloResultadoTabla.length; index++) {                      
                    if (arregloResultadoTabla[index] === arregloResultadoTabla[index+1]){                        
                        removeItemOnce(arregloResultadoTabla, arregloResultadoTabla[index]);
                    }                
                }    
                
                if( $('#reglaDesempate').prop('checked') ) {
                    arregloRepetidos.cero = arregloRepetidos.cero + arregloDesempate.cero;
                    arregloRepetidos.uno = arregloRepetidos.uno + arregloDesempate.uno;
                    arregloRepetidos.dos = arregloRepetidos.dos + arregloDesempate.dos;
                    arregloRepetidos.tres = arregloRepetidos.tres + arregloDesempate.tres;
                    arregloRepetidos.cuatro = arregloRepetidos.cuatro + arregloDesempate.cuatro;
                    arregloRepetidos.cinco = arregloRepetidos.cinco + arregloDesempate.cinco;                arregloRepetidos.cero = arregloRepetidos.cero + arregloDesempate.cero;
                    arregloRepetidos.seis = arregloRepetidos.seis + arregloDesempate.seis;
                    arregloRepetidos.siete = arregloRepetidos.siete + arregloDesempate.siete;
                    arregloRepetidos.ocho = arregloRepetidos.ocho + arregloDesempate.ocho;
                    arregloRepetidos.nueve = arregloRepetidos.nueve + arregloDesempate.nueve;
                }
               // console.log(arregloRepetidos);
                
                // var result2 = ArraySort(arregloRepetidos, function(a,b){return a-b});
                // // ES6
                // Object.keys(arregloRepetidos).forEach(
                //     key => console.log(key, arregloRepetidos[key])
                //     );
                //     console.log("*************************");
                // Object.keys(result2).forEach(
                //     key => console.log(key, result2[key])
                // );
                    
                //console.log(result2);

                
                //console.log(arregloRepetidos);
                $("#Resultado").text("Los numeros que comprar: "+arregloResultadoTabla);                                                                        
                $("#cero").text(arregloRepetidos.cero);
                $("#uno").text(arregloRepetidos.uno);
                $("#dos").text(arregloRepetidos.dos);
                $("#tres").text(arregloRepetidos.tres);
                $("#cuatro").text(arregloRepetidos.cuatro);
                $("#cinco").text(arregloRepetidos.cinco);
                $("#seis").text(arregloRepetidos.seis);
                $("#siete").text(arregloRepetidos.siete);
                $("#ocho").text(arregloRepetidos.ocho);
                $("#nueve").text(arregloRepetidos.nueve);

                resultadoCero = arregloRepetidos.cero + arregloRepetidos.cinco;
                resultadoUno = arregloRepetidos.uno + arregloRepetidos.seis;
                resultadoDos = arregloRepetidos.dos + arregloRepetidos.siete;
                resultadoTres = arregloRepetidos.tres + arregloRepetidos.ocho;
                resultadoCuatro = arregloRepetidos.cuatro + arregloRepetidos.nueve;               
                
                arregloFavoritos[resultadoCero] = ( arregloRepetidos.cero>arregloRepetidos.cinco) ? "0" : "5";
                arregloFavoritos[resultadoUno] = ( arregloRepetidos.uno>arregloRepetidos.seis) ? "1" : "6";
                arregloFavoritos[resultadoDos] = ( arregloRepetidos.dos>arregloRepetidos.siete) ? "2" : "7";
                arregloFavoritos[resultadoTres] = ( arregloRepetidos.tres>arregloRepetidos.ocho) ? "3" : "8";
                arregloFavoritos[resultadoCuatro] = ( arregloRepetidos.cuatro>arregloRepetidos.nueve) ? "4" : "9";
                //console.log(arregloFavoritos);
                var result2 = ArraySort(arregloFavoritos, function(a,b){return a-b});
                contadorObjeto = 0;
             
                let claves = Object.keys(result2); 
                //console.log(claves, result2);
                // $("#SecretoA1").html(claves[0]);
                //  resultado = searcharregloConversiones(claves[0], arregloConversiones);                        
                // $("#SecretoB1").html(resultado);
                for(let i=0; i< claves.length; i++){
                    let clave = claves[i];


                    if ( i ==0 ){
                      $("#SecretoA1").html(result2[clave]);
                      resultado = searcharregloConversiones(result2[clave], arregloConversiones);                        
                      $("#SecretoB1").html(resultado);                        
                    }

                    if ( i ==1 ){
                      $("#SecretoA2").html(result2[clave]);
                      resultado = searcharregloConversiones(result2[clave], arregloConversiones);                        
                      $("#SecretoB2").html(resultado);                        
                    }

                    if ( i == 2 )
                    {
                        $("#menorUniversal").val(result2[clave]);
                        $("#ResultadoE1").html(result2[clave]);
                        resultado = searcharregloConversiones(result2[clave], arregloConversiones);                        
                        $("#ResultadoD3").html(resultado);                                                                        
                    }
                    if ( i == 3 )
                    {
                        $("#medioUniversal").val(result2[clave]);
                        $("#ResultadoA1").html(result2[clave]);                        
                        resultado = searcharregloConversiones(result2[clave], arregloConversiones);                        
                        $("#ResultadoC2").html(resultado);                        
                    }
                    if ( i == 4 )
                    {
                        $("#mayorUniversal").val(result2[clave]);
                        $("#ResultadoA5").html(result2[clave]);
                        resultado = searcharregloConversiones(result2[clave], arregloConversiones);                        
                        $("#ResultadoB3").html(resultado);
                    }                                        
                }
                
                $("#universal1").html($("#ResultadoA5").html()+$("#ResultadoC4").html());
                $("#universal2").html($("#ResultadoC4").html()+$("#ResultadoD3").html());
                $("#universal3").html($("#ResultadoC4").html()+$("#ResultadoE5").html());
                $("#universal4").html($("#ResultadoA5").html()+$("#ResultadoD3").html());
                $("#universal5").html($("#ResultadoA5").html()+$("#ResultadoB3").html());
                
                jugadaSecreta = $("#SecretoA1").html()+$("#SecretoA2").html() + " " +
                $("#SecretoA1").html()+$("#SecretoB1").html() + " " +
                $("#SecretoA1").html()+$("#SecretoB2").html() + " " +
                $("#SecretoA2").html()+$("#SecretoB1").html() + " " +
                $("#SecretoA2").html()+$("#SecretoB2").html() + " " +
                $("#SecretoB1").html()+$("#SecretoB2").html();
                
                $("#jugadaSecreta").html(jugadaSecreta);
                // $("#mayorUniversal").text(claves[4]);
                // $("#medioUniversal").text(claves[3]);
                // $("#menorUniversal").text(claves[2]);

                $("#resultadoCero").text( resultadoCero );//+ arregloRepetidos.cero + arregloRepetidos.cinco  );
                $("#resultadoUno").text( resultadoUno );//+ arregloRepetidos.uno + arregloRepetidos.seis );
                $("#resultadoDos").text( resultadoDos );// + arregloRepetidos.dos + arregloRepetidos.siete );
                $("#resultadoTres").text( resultadoTres );//+ arregloRepetidos.tres + arregloRepetidos.ocho );
                $("#resultadoCuatro").text( resultadoCuatro );//+ arregloRepetidos.cuatro + arregloRepetidos.nueve );

                $("#resultadoCeroCinco").text( ( arregloRepetidos.cero>arregloRepetidos.cinco) ? "0" : "5" );
                $("#resultadoUnoSeis").text( ( arregloRepetidos.uno>arregloRepetidos.seis) ? "1" : "6" );
                $("#resultadoDosSiete").text( ( arregloRepetidos.dos>arregloRepetidos.siete) ? "2" : "7" );
                $("#resultadoTresOcho").text( ( arregloRepetidos.tres>arregloRepetidos.ocho) ? "3" : "8" );
                $("#resultadoCuatroNueve").text( ( arregloRepetidos.cuatro>arregloRepetidos.nueve) ? "4" : "9" );

                //console.log(arregloRepetidos);
                            
                //console.log(arregloConversiones);
                //console.log(searcharregloConversiones("1", arregloConversiones));


            });

            // function searcharregloConversiones(dato, arregloConversiones)
            // {
            //     let search;
               
            //     Object.keys(arregloConversiones).forEach(function(key) {
            //         if(key==dato){
            //             search=arregloConversiones[key];                       
            //         }               
            //     });
            //     return search;
                
            // }
            function removeItemAll(arr, value) {
                var i = 0;
                while (i < arr.length) {
                    if (arr[i] === value) {
                        arr.splice(i, 1);
                    } else {
                        ++i;
                    }
                }
                arr.push(value);
                return arr;
            }

            function removeItemOnce(arr, value) {
                var index = arr.indexOf(value);
                if (index > -1) {
                    arr.splice(index, 1);
                }
                return arr;
            }

            function contadorRepetidos(dato, numero){
               // console.log(dato,numero);
                switch (numero) {
                    case '0':                        
                        dato.cero = dato.cero + 1;
                        break;
                    case '1':                       
                        dato.uno = dato.uno + 1; 
                        break;                
                    case '2':                       
                        dato.dos = dato.dos + 1; 
                        break;                
                    case '3':                       
                        dato.tres = dato.tres + 1; 
                        break;                
                    case '4':                       
                        dato.cuatro = dato.cuatro + 1; 
                        break;                
                    case '5':                       
                        dato.cinco = dato.cinco + 1; 
                        break;                
                    case '6':                       
                        dato.seis = dato.seis + 1; 
                        break;                
                    case '7':                       
                        dato.siete = dato.siete + 1; 
                        break;                
                    case '8':                       
                        dato.ocho = dato.ocho + 1; 
                        break;    
                    case '9':                       
                        dato.nueve = dato.nueve + 1; 
                        break;                            
                    default:
                        break;
                }                
                return dato;
            }

        });
      
        ArraySort = function(array, sortFunc){
              var tmp = [];
              var aSorted=[];
              var oSorted={};

              for (var k in array) {
                if (array.hasOwnProperty(k)) 
                    tmp.push({key: k, value:  array[k]});
              }

              tmp.sort(function(o1, o2) {
                    return sortFunc(o1.value, o2.value);
              });                     

              if(Object.prototype.toString.call(array) === '[object Array]'){
                  $.each(tmp, function(index, value){
                      aSorted.push(value.value);
                  });
                  return aSorted;                     
              }

              if(Object.prototype.toString.call(array) === '[object Object]'){
                  $.each(tmp, function(index, value){
                      oSorted[value.key]=value.value;
                  });                     
                  return oSorted;
             }               
            };

    </script>    
</head>
<body>
<?php  
   require 'menu.php';  
?>
    <div class="container-fluid">
        <h1>Calc PRO</h1>
        <div class="row justify-content-center align-items-center">
            <div class="col">
                <!-- <div class="col-6 col-md-3 col-lg-3 col-xl-3 "> -->
                <form class="form-control" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
                    <div class="input-group mb-3 d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Calcular</button>                
                        <a name="Repetidos" id="Repetidos" class="btn btn-success" href="#" role="button">Repetidos</a>                                        
                        <button class="btn btn-info"><?php echo date("l");?></button>
                    </div>        
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="reglaDesempate">
                        <label class="form-check-label" for="">
                            Regla desempate
                        </label>                
                    </div>        
                </form>
            <!-- </div>         -->
            </div>
            <div class="col">
                <h2>Recordatorios</h2>    
                <p>
                    Se debe de llevar los numeros que no salen el dia de ayer, los 3 universales y las vibraciones pendientes
                </p>
            </div>
            <div class="col">
                <h2>Revisar las lineas</h2>   
                <h3>Imagen de referencia para los mas importantes del dia</h3>     
                <img src="img/repaso.png" class="img-fluid rounded-top" alt="">
            </div>
        </div>
        <div class="container">
            <?php
                $conversiones = array ( "0"=>"5", "1"=>"6", "2"=>"7", "3"=>"8", "4"=>"9", "5"=>"0", "6"=>"1", "7"=>"2", "8"=>"3", "9"=>"4");
                
                $sumamultiplicacion = array ( 
                    "1"=>["01","02"],
                    "2"=>["04","04"],
                    "3"=>["09","06"],
                    "4"=>["16","08"],
                    "5"=>["25","10"],
                    "6"=>["36","12"],
                    "7"=>["49","14"],
                    "8"=>["64","16"],
                    "9"=>["81","18"],
                    "10"=>["00", "20"],
                    "11"=>["04", "22"],
                    "12"=>["09", "24"],
                    "13"=>["16", "06"],
                    "14"=>["16", "28"],
                    "15"=>["09", "30"],
                    "16"=>["13", "06"],
                    "17"=>["21", "34"],
                    "18"=>["09", "36"],
                    "19"=>["10", "38"],
                    "20"=>["04", "40"],
                    "21"=>["09", "42"],
                    "22"=>["16", "44"],
                    "23"=>["16", "16"],
                    "24"=>["18", "48"],
                    "25"=>["13", "50"],
                    "26"=>["19", "52"],
                    "27"=>["18", "54"],
                    "28"=>["19", "56"],
                    "29"=>["13", "58"],
                    "30"=>["09", "60"],
                    "31"=>["16", "62"],
                    "32"=>["07", "46"],
                    "33"=>["18", "66"],
                    "34"=>["13", "68"],
                    "35"=>["10", "70"],
                    "36"=>["27", "09"],
                    "37"=>["19", "74"],
                    "38"=>["13", "76"],
                    "39"=>["09", "78"],
                    "40"=>["07", "80"],
                    "41"=>["16", "82"],               
                    "42"=>["18", "84"],
                    "43"=>["22", "86"],
                    "44"=>["19", "88"],
                    "45"=>["09", "90"],
                    "46"=>["10", "92"],
                    "47"=>["13", "94"],
                    "48"=>["09", "96"],
                    "49"=>["07", "98"],
                    "50"=>["07", "01"],  
                    "51"=>["09", "03"],   
                    "52"=>["13", "05"],   
                    "53"=>["19", "07"],   
                    "54"=>["18", "09"],   
                    "55"=>["40", "02"],   
                    "56"=>["13", "04"],   
                    "57"=>["18", "06"],   
                    "58"=>["16", "08"],   
                    "59"=>["16", "10"],   
                    "60"=>["09", "03"],   
                    "61"=>["13", "05"],
                    "62"=>["19", "07"],
                    "63"=>["27", "09"],
                    "64"=>["19", "11"],
                    "65"=>["13", "04"],
                    "66"=>["18", "06"],
                    "67"=>["25", "08"],
                    "68"=>["16", "10"],
                    "69"=>["18", "12"],                
                    "70"=>["13", "05"],
                    "71"=>["10", "07"],
                    "72"=>["18", "09"],
                    "73"=>["19", "11"],
                    "74"=>["22", "13"],
                    "75"=>["18", "06"],
                    "76"=>["25", "08"],
                    "77"=>["25", "10"],
                    "78"=>["18", "12"],
                    "79"=>["13", "14"],
                    "80"=>["10", "07"],
                    "81"=>["18", "09"],
                    "82"=>["19", "11"],
                    "83"=>["31", "13"],
                    "84"=>["18", "15"],
                    "85"=>["16", "08"],
                    "86"=>["25", "20"],
                    "87"=>["27", "12"],   
                    "88"=>["22", "14"],
                    "89"=>["19", "16"],
                    "90"=>["09", "90"],
                    "91"=>["19", "11"],
                    "92"=>["22", "13"],
                    "93"=>["27", "15"],
                    "94"=>["25", "17"],   
                    "95"=>["16", "10"],
                    "96"=>["18", "12"],
                    "97"=>["22", "14"],
                    "98"=>["19", "16"],
                    "99"=>["18", "18"]
                    );


                if  ($_SERVER["REQUEST_METHOD"] == "POST"){
                    $fecha = $_POST["fecha"];
                    $Codigo = $_POST["Codigo"];

                    if ( ( empty($fecha) ) || ( empty($Codigo) ==42 ) ){
                        echo '    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>Alerta</strong> Selecciona la fecha
                                </div>';
                    }
                    else{
                        $sepparator = '-';
                        $parts = explode($sepparator, $fecha);
                        //echo $parts[2];//day
                        //echo $parts[1];//month
                        
                        $anho =  substr($parts[0], 0,2) + substr($parts[0], 2,3);
                        //echo $anho;
                        $Codigo = $anho;
                        $diames = $parts[2] + $parts[1];   
                        $diames = $diames > 9 ? $diames : '0'.$diames;
                        $mensajerepetidos = "";
                        if ( ($diames == "00") || ($diames == "11") || ($diames == "22") || ($diames == "33") || ($diames == "44") || ($diames == "55") || ($diames == "66") || ($diames == "77") || ($diames == "88")  || ($diames == "99")  ){
                            $mensajerepetidos = "Hoy se juegan repetidos";
                        }

                        $centralnumero = $diames+$Codigo;                    
                        $subcentralnumero = substr($centralnumero, 0, 1) + substr($centralnumero, 1, 1);
                        // $subcentralnumero = str_pad($subcentralnumero,2, "0", STR_PAD_LEFT);
                        $tercentralnumero = 0;
                        $tercentralnumero = (int)substr($subcentralnumero, 0, 1) + (int)substr($subcentralnumero, 1, 1); 
                        $tercentralnumeroizquierdo = str_pad($tercentralnumero,2, "0", STR_PAD_LEFT);
                        $tercentralnumeroizquierdosegundo = ConvertirPosicion($tercentralnumero, 1);
                        $tercentralnumeroizquierdosegundo = str_pad($tercentralnumeroizquierdosegundo,2, "0", STR_PAD_LEFT);


                        $ocultarFila = $subcentralnumero == $tercentralnumero ? "hidden id='repetida' " : "";
                        
                        $ConvertirCentralnumero = Convertir($centralnumero);
                        $ConvertirSubcentralnumero = Convertir($subcentralnumero);

                        $numeroSecreto = substr($centralnumero, 1, 1).$tercentralnumero;


                        $resultadodiacodigo = $diames + $Codigo;
                        $resultadodiacodigoa = substr($resultadodiacodigo,0,1) + substr($resultadodiacodigo,1,1);

                        // if ($resultadodiacodigoa < 10){
                        //     $resultadodiacodigoab = '0'.$resultadodiacodigoa;
                        // }

                        $resultadodiacodigoab = $resultadodiacodigoa < 10 ? '0'.$resultadodiacodigoa : $resultadodiacodigoa;

                        $Convertirdiames = Convertir($diames);
                        $ConvertirCodigo = Convertir($Codigo);
                        $resultadodiacodigosecundario = substr($Convertirdiames,0,1) + substr($Convertirdiames,1,1) + substr($ConvertirCodigo,0,1) + substr($ConvertirCodigo,1,1);
                        $resultadodiacodigosecundarioa = substr($resultadodiacodigosecundario,0,1) + substr($resultadodiacodigosecundario,1,1);
                        // if ($resultadodiacodigosecundarioa < 10){
                        //     $resultadodiacodigosecundarioa = '0'.$resultadodiacodigosecundarioa;
                        // }
                        
                        $resultadodiacodigosecundarioa = $resultadodiacodigosecundarioa < 10 ? '0'.$resultadodiacodigosecundarioa : $resultadodiacodigosecundarioa;

                        // $subcentralnumero = str_pad($subcentralnumero,2, "0", STR_PAD_LEFT);
                        echo '<h1>Fecha '.$fecha .' ' .$mensajerepetidos.'</h1>';
                        echo '<table class="table table-striped table-warning"
                                <tr class="table-danger">
                                    <td></td>
                                    <td></td>
                                    <td>'.$resultadodiacodigo.'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                    <td>'.$resultadodiacodigoab.'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                    '.EncuentraConversionIndividual($resultadodiacodigoa).'
                                </tr>                                       
                                <tr class="table-warning">
                                    <td></td>
                                    <td></td>
                                    <td>'.$resultadodiacodigosecundario.'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                    <td>'.$resultadodiacodigosecundarioa.'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                    '.EncuentraConversionIndividual($resultadodiacodigosecundarioa).'
                                </tr>
                                </table>    ';
                        echo '    <table class="table table-striped" id="myInput">
                                    <thead>
                                        <tr>
                                            <th>A</th>
                                            <th>B</th>
                                            <th>C</th>
                                            <th>D</th>
                                            <th>E</th>
                                            <th>F</th>
                                        </tr>
                                    </thead>                                
                                    <tbody>
                           
                                                                         
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td id="'.$diames.'">'.$diames.'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                            <td></td>
                                            <td id="'.$Codigo.'">'.$Codigo.'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td id="'.Convertir($diames).'">'.Convertir($diames).'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                            <td id="'.$numeroSecreto.'">'.$numeroSecreto.'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                            <td id="'.Convertir($Codigo).'">'.Convertir($Codigo).'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td id="">';
                                            
                                           // echo ConvertirPosicion($ConvertirCentralnumero, 0).'">'.ConvertirPosicion($ConvertirCentralnumero, 0);
                                            echo '</td>
                                            <td id="'.ConvertirPosicion($ConvertirCentralnumero, 1).'">'.ConvertirPosicion($ConvertirCentralnumero, 1).'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                            <td id="'.$ConvertirCentralnumero.'">'.$ConvertirCentralnumero.'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                            <td id="'.$centralnumero.'">'.$centralnumero.'<input class="form-check-input" type="checkbox" value="" id=""></td>'.
                                            EncuentraConversion($centralnumero).'
                                        </tr>
                                        <tr '.$ocultarFila.'>';
                                            //<td id="'.ConvertirPosicion($ConvertirSubcentralnumero, 0).'">'.ConvertirPosicion($ConvertirSubcentralnumero, 0).'</td>
                                            echo "<td></td>";
                                            echo '<td id="'.ConvertirPosicion($ConvertirSubcentralnumero, 1).'">'.ConvertirPosicion($ConvertirSubcentralnumero, 1).'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                            <td id="'.$ConvertirSubcentralnumero.'">'.$ConvertirSubcentralnumero.'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                            <td id="'.$subcentralnumero.'">'.$subcentralnumero.'<input class="form-check-input" type="checkbox" value="" id=""></td>'.
                                            EncuentraConversion($subcentralnumero).'
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td id="'.$tercentralnumeroizquierdosegundo.'">'.$tercentralnumeroizquierdosegundo.'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                            <td id="'.$tercentralnumeroizquierdo.'">'.$tercentralnumeroizquierdo.'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                            <td id="'.$tercentralnumero.'">('.$tercentralnumero.')<input class="form-check-input" type="checkbox" value="" id=""></td>'.
                                            EncuentraConversion($tercentralnumero).'
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td id="'.Convertir($tercentralnumeroizquierdosegundo).'">'.Convertir($tercentralnumeroizquierdosegundo).'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                            <td id="'.InversionUnico($tercentralnumeroizquierdo).'">'.InversionUnico($tercentralnumeroizquierdo).'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                            <td id="'.Convertir($tercentralnumero).'">'.Convertir($tercentralnumero).'<input class="form-check-input" type="checkbox" value="" id=""></td>
                                            <td></td>
                                            <td></td>
                                        </tr>            
                                    </tbody>
                                </table>';
                    }
                }

                function Convertir(string $dato){
                    $dato = Conversion(substr($dato, 0, 1)).Conversion(substr($dato, 1, 1));                
                    return $dato;
                }

                function ConvertirPosicion(string $dato , int $posicion){
                    if ( $posicion == 1 ){
                        $dato = Conversion(substr($dato, 0, 1)).substr($dato, 1, 1);
                    }else{
                        $dato = substr($dato, 0, 1).Conversion(substr($dato, 1, 1));  
                    }             
                    return $dato;
                }         
                
                function InversionUnico($dato){
                    $dato =  substr($dato, 1, 2).Conversion(substr($dato, 1, 2));
                    return $dato;
                }

                function Conversion(string $dato){               
                    foreach( $GLOBALS['conversiones'] as $key => $value) {
                        if ( $key == $dato ){
                            $dato = $value;
                            break;
                        }
                    }    
                    return $dato;
                }

                function EncuentraConversion($dato){                
                    $returndato = "";                
                    //print_r($GLOBALS['sumamultiplicacion']);
                    
                    foreach( $GLOBALS['sumamultiplicacion'] as $key => $value) {     
                        //print_r(  $value[0].'-'.$value[1] );                
                        if ( $key == $dato ){
                            $returndato = '<td id="'.$value[0].'">'.$value[0].'<input class="form-check-input" type="checkbox" value="" id=""></td><td id="'.$value[1].'">'.$value[1].'<input class="form-check-input" type="checkbox" value="" id=""></td>';
                            
                            break;
                        }
                    }                   
                    return $returndato;
                }
                function EncuentraConversionIndividual($dato){                
                    $returndato = "";                
                    //print_r($GLOBALS['sumamultiplicacion']);
                    
                    foreach( $GLOBALS['sumamultiplicacion'] as $key => $value) {     
                        //print_r(  $value[0].'-'.$value[1] );                
                        if ( $key == $dato ){
                            $returndato = '<td>'.$value[0].'<input class="form-check-input" type="checkbox" value="" id=""></td><td>'.$value[1].'<input class="form-check-input" type="checkbox" value="" id=""></td>';
                            
                            break;
                        }
                    }                   
                    return $returndato;
                }
            ?>            
        </div>
        <div>
            <div class="list-group">
                <li href="#" class="list-group-item list-group-item-action list-group-item-primary active"><h1 id="Resultado" class="bg-success"></h1></li>
                <li href="#" class="list-group-item list-group-item-action list-group-item">
                    <h2>Numeros Repetidos</h2> 
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>N~</th>
                                    <th>Cantidad</th>
                                    <th>N~</th>
                                    <th>Cantidad</th>
                                    <th>Resultado</th>
                                    <th>Favorito</th>
                                </tr>
                                <tr>
                                    <td>0=</td>
                                    <td id="cero">0</td>
                                    <td>5=</td>
                                    <td id="cinco">0</td>     
                                    <td id="resultadoCero"></td>
                                    <td id="resultadoCeroCinco"></td>                       
                                </tr>
                                <tr>                                
                                    <td>1=</td>
                                    <td id="uno">0</td>
                                    <td>6=</td>
                                    <td id="seis">0</td>
                                    <td id="resultadoUno"></td>
                                    <td id="resultadoUnoSeis"></td>                                
                                </tr>
                                <tr>                                
                                    <td>2=</td>
                                    <td id="dos">0</td>
                                    <td>7=</td>
                                    <td id="siete">0</td>                                
                                    <td id="resultadoDos"></td>
                                    <td id="resultadoDosSiete"></td>
                                </tr>
                                <tr>                                
                                    <td>3=</td>
                                    <td id="tres">0</td>
                                    <td>8=</td>
                                    <td id="ocho">0</td>
                                    <td id="resultadoTres"></td>
                                    <td id="resultadoTresOcho"></td>
                                </tr>
                                <tr>                                
                                    <td>4=</td>
                                    <td id="cuatro">0</td>
                                    <td>9=</td>
                                    <td id="nueve">0</td>
                                    <td id="resultadoCuatro"></td>
                                    <td id="resultadoCuatroNueve"></td>
                                </tr>                                                                                    
                            </tbody>
                        </table> 
                    </div>                   
                </li>          
                <li href="#" class="list-group-item list-group-item-action list-group-item-warning text-white">
                  <div class="row">
                    <div class="col">
                        <h1 id="ResultadoUniversales" class="bg-success">Universales</h1>
                        <div class="table-responsive">
                            <table class="table xroja xrojatabla">
                                <tbody>
                                    <tr>
                                        <td id="ResultadoA1">A</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td id="ResultadoE1">E</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td id="ResultadoC2">C</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td id="ResultadoB3">B</td>
                                        <td></td>
                                        <td id="ResultadoD3">D</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td id="ResultadoC4"><?php echo ConvertirPosicion($tercentralnumero, 1); ?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td id="ResultadoA5">A</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td id="ResultadoE5"><?php echo $tercentralnumero; ?></td>
                                    </tr>                                                                                                                
                                </tbody>
                            </table>
                        </div>    
                        <h2 class="bg-success">El Secreto</h2> 
                        <h3 class="bg-success" id="jugadaSecreta"></h3> 
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td id="SecretoA1"></td>
                                        <td id="SecretoA2"></td>
                                    </tr>
                                    <tr>
                                        <td id="SecretoB1"></td>
                                        <td id="SecretoB2"></td>
                                    </tr>                                                                                                                                               
                                </tbody>
                            </table>
                        </div>                   
                    </div>
                 
                    <div class="col">
                        <div class="table-responsive">
                        <h1 id="ResultadoUniversales" class="bg-success">Los Universales</h1>
                            <table class="table">             
                                <tbody>
                                    <tr>
                                        <td>                                        
                                            <input type="text" class="form-control" name="mayorUniversal" id="mayorUniversal" placeholder="">                                            
                                        </td>
                                        <td id="inversoMayorUniversal"></td>                                        
                                    </tr>
                                    <tr>                                        
                                        <td >
                                            <input type="text" class="form-control" name="medioUniversal" id="medioUniversal" aria-describedby="helpId" placeholder="">
                                        </td>
                                        <td id="inversoMedioUniversal"></td>    
                                    </tr>
                                    <tr>                                        
                                        <td >
                                            <input type="text" class="form-control" name="menorUniversal" id="menorUniversal" aria-describedby="helpId" placeholder="">
                                        </td>
                                        <td id="inversoMenorUniversal"></td>    
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="secretoUniversal1" id="secretoUniversal1" aria-describedby="helpId" placeholder="">
                                        </td>
                                        <td>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="secretoUniversal2" id="secretoUniversal2" aria-describedby="helpId" placeholder="">    
                                        </td>
                                        <td>

                                        </td>                                        
                                    </tr>
                                </tbody>
                            </table>
                            <h2 class="bg-primary">Los mejores del dia</h2>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">1</th>
                                            <th scope="col">2</th>
                                            <th scope="col">3</th>
                                            <th scope="col">4</th>
                                            <th scope="col">5</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="universal1"></td>
                                            <td id="universal2"></td>
                                            <td id="universal3"></td>
                                            <td id="universal4"></td>
                                            <td id="universal5"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            

                            <!-- <button name="generarConversion" id="generarConversion" class="btn btn-warning" href="" role="button" onclick="recalcularUniversal()">Recalcular</button> -->
                            <a name="recalcularUniversal" id="recalcularUniversal" class="btn btn-primary" role="button" onclick="recalcularUniversal()"   >Recalcular</a>                                                                    
                        </div>
                    </div>
                </div>
                  
                </li>      
                <li href="#" class="list-group-item list-group-item-action list-group-item-warning text-white">
                    
                    <h1 id="ResultadoUniversales" class="bg-success">Consultado Conversion</h1>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Numero a consultar #1 Revisar la Primera 10:00 a.m. y Revisar NY 8:30 p.m.</span>                        
                        <button name="generarConversion" id="generarConversion" class="btn btn-warning" href="" role="button" onclick="showHint()">Generar</button>
                        <input type="text" class="form-control" name="consultaUniversales" id="consultaUniversales" aria-describedby="helpId" placeholder="Numero">                      
                        <button name="generarConversion" id="generarConversion" class="btn btn-warning" href="" role="button" onclick="showHint()">Generar</button>
                    </div>                 
                    <div class="mb-3">
                      <div id="resultadoGenerarConversion">
                      </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Numero a consultar #2 Nica 11:00 a.m. Revisar la Nica de ayer 9:00 p.m.</span>                        
                        <button name="generarConversion" id="generarConversion" class="btn btn-secondary" href="" role="button" onclick="showHint2()">Generar</button>
                        <input type="text" class="form-control" name="consultaUniversales2" id="consultaUniversales2" aria-describedby="helpId" placeholder="Numero">                      
                        <button name="generarConversion" id="generarConversion" class="btn btn-secondary" href="" role="button" onclick="showHint2()">Generar</button>
                    </div>                       
                    <div class="mb-3">
                      <div id="resultadoGenerarConversion2">
                      </div>
                    </div>                    
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Numero a consultar #3 Tica 12:55 p.m. Revisar la Tica de ayer 7:30 p.m.</span> 
                        <button name="generarConversion" id="generarConversion" class="btn btn-light" href="" role="button" onclick="showHint3()">Generar</button>
                        <input type="text" class="form-control" name="consultaUniversales3" id="consultaUniversales3" aria-describedby="helpId" placeholder="Numero">                      
                        <button name="generarConversion" id="generarConversion" class="btn btn-light" href="" role="button" onclick="showHint3()">Generar</button>
                    </div>                       
                    <div class="mb-3">
                      <div id="resultadoGenerarConversion3">
                      </div>
                    </div>  
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Numero a consultar #4 Nica 3:00 p.m. Revisar la Nica 11:00 a.m.</span>                        
                        <button name="generarConversion" id="generarConversion" class="btn btn-primary" href="" role="button" onclick="showHint4()">Generar</button>
                        <input type="text" class="form-control" name="consultaUniversales4" id="consultaUniversales4" aria-describedby="helpId" placeholder="Numero">                      
                        <button name="generarConversion" id="generarConversion" class="btn btn-primary" href="" role="button" onclick="showHint4()">Generar</button>
                    </div>                       
                    <div class="mb-3">
                      <div id="resultadoGenerarConversion4">
                      </div>
                    </div>  
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Numero a consultar #5 Tica 4:30 p.m. Revisar la Nica 12:55 p.m. y Nica 3:00 p.m.</span>                        
                        <button name="generarConversion" id="generarConversion" class="btn btn-dark" href="" role="button" onclick="showHint5()">Generar</button>
                        <input type="text" class="form-control" name="consultaUniversales5" id="consultaUniversales5" aria-describedby="helpId" placeholder="Numero">                      
                        <button name="generarConversion" id="generarConversion" class="btn btn-dark" href="" role="button" onclick="showHint5()">Generar</button>
                    </div>                       
                    <div class="mb-3">
                      <div id="resultadoGenerarConversion5">
                      </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Numero a consultar #1 Revisar la Primera 6:00 p.m.</span>                        
                        <button name="generarConversion" id="generarConversion" class="btn btn-warning" href="" role="button" onclick="showHint9()">Generar</button>
                        <input type="text" class="form-control" name="consultaUniversales9" id="consultaUniversales9" aria-describedby="helpId" placeholder="Numero">                      
                        <button name="generarConversion" id="generarConversion" class="btn btn-warning" href="" role="button" onclick="showHint9()">Generar</button>
                    </div>                 
                    <div class="mb-3">
                      <div id="resultadoGenerarConversion9">
                      </div>
                    </div>                      
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Numero a consultar #6 Nica 6:00 p.m. Revisar Tica 4:30 p.m. y Nica 3:00 p.m.</span>                        
                        <button name="generarConversion" id="generarConversion" class="btn btn-success" href="" role="button" onclick="showHint6()">Generar</button>
                        <input type="text" class="form-control" name="consultaUniversales6" id="consultaUniversales6" aria-describedby="helpId" placeholder="Numero">                      
                        <button name="generarConversion" id="generarConversion" class="btn btn-success" href="" role="button" onclick="showHint6()">Generar</button>
                    </div>                       
                    <div class="mb-3">
                      <div id="resultadoGenerarConversion6">
                      </div>
                    </div>  
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Numero a consultar #7 Tica 7:30 p.m. Revisar Tica 4:30 p.m. y Tica 12:55 p.m.</span>                        
                        <button name="generarConversion" id="generarConversion" class="btn btn-danger" href="" role="button" onclick="showHint7()">Generar</button>
                        <input type="text" class="form-control" name="consultaUniversales7" id="consultaUniversales7" aria-describedby="helpId" placeholder="Numero">                      
                        <button name="generarConversion" id="generarConversion" class="btn btn-danger" href="" role="button" onclick="showHint7()">Generar</button>
                    </div>                       
                    <div class="mb-3">
                      <div id="resultadoGenerarConversion7">
                      </div>
                    </div>  
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Numero a consultar #8 Nica 9:00 p.m. Revisar Nica 3:00 p.m., 6:00 p.m. Tica 7:30 p.m.</span>                        
                        <button name="generarConversion" id="generarConversion" class="btn btn-info" href="" role="button" onclick="showHint8()">Generar</button>
                        <input type="text" class="form-control" name="consultaUniversales8" id="consultaUniversales8" aria-describedby="helpId" placeholder="Numero">                      
                        <button name="generarConversion" id="generarConversion" class="btn btn-info" href="" role="button" onclick="showHint8()">Generar</button>
                    </div>                       
                    <div class="mb-3">
                      <div id="resultadoGenerarConversion8">
                      </div>
                    </div>                                                                                                                           
                </li>
            </div>
        </div>
    </div>
    <script>


        let arregloConversiones = {
            "0":"5",
            "1":"6",
            "2":"7",
            "3":"8",
            "4":"9",
            "5":"0",
            "6":"1",
            "7":"2",
            "8":"3",
            "9":"4"
        };                    


      var alertList = document.querySelectorAll('.alert');
      alertList.forEach(function (alert) {
        new bootstrap.Alert(alert)
      })

      function searcharregloConversiones(dato, arregloConversiones)
        {
            let search;
            
            Object.keys(arregloConversiones).forEach(function(key) {
                if(key==dato){
                    search=arregloConversiones[key];                       
                }               
            });
            return search;
            
        }

      function showHint(){
        //resultadoGenerarConversion
        consultaUniversales
        var parametros = {
                "consultaUniversales" : $("#consultaUniversales").val()
        };
        //console.log(parametros);

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
      }

      function showHint2(){
        //resultadoGenerarConversion
        consultaUniversales
        var parametros = {
                "consultaUniversales" : $("#consultaUniversales2").val()
        };
        //console.log(parametros);

        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'universales.php', //archivo que recibe la peticion
                type:  'get', //método de envio
                beforeSend: function () {
                        $("#resultadoGenerarConversion2").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultadoGenerarConversion2").html(response);
                }
        });
      }

      function showHint3(){
        //resultadoGenerarConversion
        consultaUniversales
        var parametros = {
                "consultaUniversales" : $("#consultaUniversales3").val()
        };
        //console.log(parametros);

        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'universales.php', //archivo que recibe la peticion
                type:  'get', //método de envio
                beforeSend: function () {
                        $("#resultadoGenerarConversion3").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultadoGenerarConversion3").html(response);
                }
        });
      }      

      function showHint4(){
        //resultadoGenerarConversion
        consultaUniversales
        var parametros = {
                "consultaUniversales" : $("#consultaUniversales4").val()
        };
        //console.log(parametros);

        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'universales.php', //archivo que recibe la peticion
                type:  'get', //método de envio
                beforeSend: function () {
                        $("#resultadoGenerarConversion4").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultadoGenerarConversion4").html(response);
                }
        });
      }      

      function showHint5(){
        //resultadoGenerarConversion
        consultaUniversales
        var parametros = {
                "consultaUniversales" : $("#consultaUniversales5").val()
        };
        //console.log(parametros);

        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'universales.php', //archivo que recibe la peticion
                type:  'get', //método de envio
                beforeSend: function () {
                        $("#resultadoGenerarConversion5").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultadoGenerarConversion5").html(response);
                }
        });
      }      
      
      function showHint6(){
        //resultadoGenerarConversion
        consultaUniversales
        var parametros = {
                "consultaUniversales" : $("#consultaUniversales6").val()
        };
        //console.log(parametros);

        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'universales.php', //archivo que recibe la peticion
                type:  'get', //método de envio
                beforeSend: function () {
                        $("#resultadoGenerarConversion6").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultadoGenerarConversion6").html(response);
                }
        });
      }      
      
      function showHint7(){
        //resultadoGenerarConversion
        consultaUniversales
        var parametros = {
                "consultaUniversales" : $("#consultaUniversales7").val()
        };
        //console.log(parametros);

        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'universales.php', //archivo que recibe la peticion
                type:  'get', //método de envio
                beforeSend: function () {
                        $("#resultadoGenerarConversion7").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultadoGenerarConversion7").html(response);
                }
        });
      }      
      
      function showHint8(){
        //resultadoGenerarConversion
        consultaUniversales
        var parametros = {
                "consultaUniversales" : $("#consultaUniversales8").val()
        };
        //console.log(parametros);

        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'universales.php', //archivo que recibe la peticion
                type:  'get', //método de envio
                beforeSend: function () {
                        $("#resultadoGenerarConversion8").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultadoGenerarConversion8").html(response);
                }
        });
      }      
      
      function showHint9(){
        //resultadoGenerarConversion
        consultaUniversales
        var parametros = {
                "consultaUniversales" : $("#consultaUniversales9").val()
        };
        //console.log(parametros);

        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'universales.php', //archivo que recibe la peticion
                type:  'get', //método de envio
                beforeSend: function () {
                        $("#resultadoGenerarConversion9").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultadoGenerarConversion9").html(response);
                }
        });
      }      
          


      function recalcularUniversal(){    
           // debugger;        
            mayoruniversal = $("#mayorUniversal").val();                       
            $("#ResultadoA5").html(mayoruniversal);
            resultado = searcharregloConversiones(mayoruniversal, arregloConversiones);                                    
            $("#ResultadoB3").html(resultado);

            medioUniversal=$("#medioUniversal").val();
            $("#ResultadoA1").html(medioUniversal);
            resultado = searcharregloConversiones(medioUniversal, arregloConversiones);                                    
            $("#ResultadoC2").html(resultado);                   

            menorUniversal=$("#menorUniversal").val();
            $("#ResultadoE1").html(menorUniversal);
            resultado = searcharregloConversiones(menorUniversal, arregloConversiones);                                    
            $("#ResultadoD3").html(resultado); 

            secretoUniversal1 =$("#secretoUniversal1").val();
            $("#SecretoA1").html(secretoUniversal1);
            resultado = searcharregloConversiones(secretoUniversal1, arregloConversiones);                        
            $("#SecretoB1").html(resultado);                        
            secretoUniversal2 =$("#secretoUniversal2").val();
            $("#SecretoA2").html(secretoUniversal2);
            resultado = searcharregloConversiones(secretoUniversal2, arregloConversiones);                        
            $("#SecretoB2").html(resultado);        



            $("#universal1").html($("#ResultadoA5").html()+$("#ResultadoC4").html());
            $("#universal2").html($("#ResultadoC4").html()+$("#ResultadoD3").html());
            $("#universal3").html($("#ResultadoC4").html()+$("#ResultadoE5").html());            
            $("#universal4").html($("#ResultadoA5").html()+$("#ResultadoD3").html());
            $("#universal5").html($("#ResultadoA5").html()+$("#ResultadoB3").html());

            jugadaSecreta = $("#SecretoA1").html()+$("#SecretoA2").html() + " " +
                $("#SecretoA1").html()+$("#SecretoB1").html() + " " +
                $("#SecretoA1").html()+$("#SecretoB2").html() + " " +
                $("#SecretoA2").html()+$("#SecretoB1").html() + " " +
                $("#SecretoA2").html()+$("#SecretoB2").html() + " " +
                $("#SecretoB1").html()+$("#SecretoB2").html();
                
            $("#jugadaSecreta").html(jugadaSecreta);
     }

    </script>    
    
<?php
  require 'footer.php';
?> 