# 1.Crear una calculadora con python por medio del terminal en visual code. 100 puntos.
# Dos entradas de datos, que sean tipo numérico.
# Sean enviado a las funciones ( Suma(a,b), Resta(a,b), Multiplicación(a,b), División(a,b), Porcentaje(a,b) )

def suma (a, b):
    resultado = a + b
    texto = "El resultado de la operacion es", resultado
    print ( texto )

def resta (a, b):
    resultado = a - b
    texto = "El resultado de la operacion es", resultado
    print ( texto )


# Captura de valores
dato1 = int( input("Ingrese el primer valor: ") )
dato2 = int( input("Ingrese el segundo valor: ") )

seleccion = int( input("Ingrese el numero que corresponda a la funcion a utilizar: 1-Sumar, 2-Restar, 3-Multiplicar, 4-Dividir, 5-Porcentaje") )

#if ( seleccion )


suma( dato1, dato2 )