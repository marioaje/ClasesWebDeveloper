let message: number = 'Primera clase Typescript';
message = '3';
console.log(message);

message = '34';

console.log(message);

function showdatos(datos: string, numero: number){
    return datos;
}


let animales: string[] = ['Gallina', 'Gato', 'Perro'];
let animales2: string[] = [];

showdatos('Hola', 3);


let numeros: number[] = [1, 2, 6];
let numeros2: number[] = [];
let numeros3: Array<number> = [];
let validacion: boolean[] = [];

numeros.map(x => x.toExponential);
animales.map(x => x.toLowerCase);

let tupla: [number, string] = [1, "Menu 1"];

const peque = 's';
const media = 'm';
const grand = 'g';
const extragrande= 'xg';

enum talla { Pequena = 's', Mediana = 'm', Grande = 'g', Extragrande ='xg' };

console.log(talla.Pequena);

const enum LoadingState {Idle, Loading, Success, Error };

const estado = LoadingState.Success;

const objeto: {
    id: number,
    nombre: string
} = { id:1, nombre:'' };

type varios = {
    readonly id: number,
    nombre: string,
    talla: talla
};

const objeto2: varios  = { id:1, nombre:'', talla: talla.Mediana };
objeto2.id = 12;


type Direccion = {
    provincia: string,
    canton: string,
    distrito: string,
    direccionfisica: string
}

type persona = {
    id: number,
    nombre: string,
    apellido: string,
    email: string,
    direcion: Direccion
}

const usuario: persona = {
    id: 1,
    nombre: 'Mario',
    apellido: 'Jimenez',
    email: 'mario@gmail.com',
    direcion: {
        provincia: "SJ",
        canton: "SJ",
        distrito: "Sabana",
        direccionfisica: "Por aca"
    }
}

const arregloPersona: persona[] = [];
