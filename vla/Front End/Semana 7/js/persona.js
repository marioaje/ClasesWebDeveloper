class persona{
    constructor(cedula, nombre){
        this.cedula=cedula;
        this.nombre=nombre;
    }

    obtenerCedula(){
        return this.cedula;
    }

    obtenerNombre(){
        return this.nombre;
    }

    ajustarNombre(nombreIngresado){
        this.nombre = nombreIngresado;
    }

    ajustarCedula(cedulaIngresada){
        this.cedula = cedulaIngresada;
    }
}

var test = 123;
const datosAlmacenados = new persona("", "");

//Funciones
function almacenar(){    
    var cedula = $("cedula").val();    
    document.getElementById("cedula").value;
    var nombre = document.getElementById("nombre").value;
    

    datosAlmacenados.ajustarCedula(cedula);
    datosAlmacenados.ajustarNombre(nombre);
    console.log(datosAlmacenados);
    
}

function consultar () {  
    document.getElementById("apellido").setAttribute('value',datosAlmacenados.obtenerNombre());
   // document.getElementById("apellido").value = "My default value";
    // console.log(test);
    // document.getElementById("apellido").value = 12;
    // document.getElementById('cedula').value='text to be displayed' ; 
    // nombre = datosAlmacenados.obtenerNombre()
    // document.getElementById("nombre").value = nombre;
    // console.log(datosAlmacenados.obtenerNombre());
}