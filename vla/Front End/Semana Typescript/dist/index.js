"use strict";
let message = 'Primera clase Typescript';
message = '3';
console.log(message);
message = '34';
console.log(message);
function showdatos(datos, numero) {
    return datos;
}
let animales = ['Gallina', 'Gato', 'Perro'];
let animales2 = [];
showdatos('Hola', 3);
let numeros = [1, 2, 6];
let numeros2 = [];
let numeros3 = [];
let validacion = [];
numeros.map(x => x.toExponential);
animales.map(x => x.toLowerCase);
let tupla = [1, "Menu 1"];
const peque = 's';
const media = 'm';
const grand = 'g';
const extragrande = 'xg';
var talla;
(function (talla) {
    talla["Pequena"] = "s";
    talla["Mediana"] = "m";
    talla["Grande"] = "g";
    talla["Extragrande"] = "xg";
})(talla || (talla = {}));
;
console.log(talla.Pequena);
;
const estado = 2;
const objeto = { id: 1, nombre: '' };
const objeto2 = { id: 1, nombre: '', talla: talla.Mediana };
objeto2.id = 12;
const usuario = {
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
};
const arregloPersona = [];
//# sourceMappingURL=index.js.map