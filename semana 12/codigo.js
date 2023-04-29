$(document).ready(function () {
            
    $("#Suma").click(function (e) { 
 
        PrimerDato = $("#PrimerDato").val();
        SegundoDato = $("#SegundoDato").val();
        Resultado = parseInt(PrimerDato) + parseInt(SegundoDato);

        $("#ResultadoOperacion").text("El resultado es: " + Resultado);//Este en el div
    });

    $("#Resta").click(function (e) { 
       alert("Resta");    
    });

    $("#Multiplicacion").click(function (e) { 
       alert("Multiplicacion");    
    });            

    $("#Division").click(function (e) { 
       alert("Division");    
    });      

    $("#Potencia").click(function (e) { 
       alert("Potencia");    
    });      

    $("#Porcentaje").click(function (e) { 
       alert("Porcentaje");    
    });      
});


function printTextName(){
    
    var Nombre = document.getElementById("Nombre").value;       
    document.getElementById("Resultado").innerHTML = Nombre;
}
