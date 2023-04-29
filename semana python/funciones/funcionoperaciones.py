#def=palabra reservada, mensajepersonalizado= el nomrbre de la funcion 
#en ( datos que vaya a recibir la funcion)
#version Fernanda
def suma(datorecibido1, datorecibido2):    
    print("La suma de: ", datorecibido1 + datorecibido2 )

#version Santiago    
def resta(datorecibido1, datorecibido2):
    print("La resta de: ",datorecibido1-datorecibido2)

#version Dayanna
def multiplicacion(datorecibido1,datorecibido2):
    resultado = datorecibido1*datorecibido2
    print("La multiplicacion de datorecibido1: ", datorecibido1, " * ", datorecibido2, " es:", resultado)

#version Justin
def division(datorecibido1, datorecibido2):
    resultado = datorecibido1/datorecibido2
    print("La division de datorecibido1: ", datorecibido1, " / ", datorecibido2, " es:", resultado)

#version Arnoldo
def datospersonales(nombre, apellido):
    datos = nombre + " " + apellido
    print("Su nombre es:", datos)

#version Antonio i = v/r
def conElec(voltage, resistencia):
    op=voltage/resistencia
    print("Su resistencia es: ", op)

#version Emily 2*2*2    
def cubo(dato):
    resultado = dato * dato * dato
    print("El calculo del cubo es: ", resultado)

suma(1, 6)
resta(10, 3)
multiplicacion(10, 8)
division(100, 20)
datospersonales('Mario', 'Jimenez')
conElec(120, 10)
cubo(2)
cubo(9)

#Antes de empezar la funcion, 
#el sistema indica al usuario que debe realizar

#Debe ser capaz de capturar los
#valores requeridos para cada funcion

#Mejorar los mensaje de los prints