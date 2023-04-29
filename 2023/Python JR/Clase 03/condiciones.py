soyVerdarero = True
soyFalso = False
print( soyVerdarero, soyFalso)

print(soyVerdarero == soyFalso)
print("////////////////////")
a= 12
b= 14
print(a==b)
print(a>=b)
print(a<=b)
print("////////////////////")
texto1="Hola"
texto2 ="ola"
texto3="hola"
print(texto1==texto2)
print(texto1!=texto2)
print("////////////////////")
# Operador AND, es evaluar los dos terminos y ques estos cumplan con el mismo criterio
# (false false para false o verdarero verdadero para verdadero, con solo que uno sea false, su salida va hacer false)
print(True and True)
print(False and False)

edad1 = 40
edad2 = 44
edad3 = 12

nombre1 = "Mario"
nombre2 = "Isaac"
nombre3 = 'Alberto'
print("////////////////////")
print ( edad1 == edad2 )
print ( edad1 >= edad2 )
print( edad1 == edad2 and edad1 >= edad2 )

print("////////////////////")
print ( edad1 <= edad2 )
print ( edad3 <= edad2 )
print( edad1 <= edad2 and edad3 <= edad2 )

print("////////////////////")
print ( edad1 <= edad2 )
print ( edad3 == edad2 )
print( edad1 <= edad2 and edad3 == edad2 )


# Operador OR,
# Con solo que uno de sus valores sea verdadero su salida sera verdadera
#la unnica manera que aparezca false, es que todas sus condifciones deben ser false

print("////////////////////")
print ( edad1 == edad2 )
print ( edad1 >= edad2 )
print( edad1 == edad2 or edad1 >= edad2 )

print("////////////////////")
print ( edad1 <= edad2 )
print ( edad3 <= edad2 )
print( edad1 <= edad2 or edad3 <= edad2 )

print("////////////////////")
print ( edad1 <= edad2 )
print ( edad3 == edad2 )
print( edad1 <= edad2 or edad3 == edad2 )

operador = (edad1 <= edad2) or (edad3 == edad2)
print("valor de operador:",operador)

print("////////////////////")
#If evalua
if ( edad1 <= edad2 ):
    print("Es cierto que edad2 es mayor")
else:
    print("Es falso que edad2 es mayor")

print("////////////////////")
#if anidados
a=1201222
b=1201222
if ( a < b ):
    print("Es a < b  que edad2 ")
elif  ( a == b ):   
    print("Es a == b que edad2 ")
# elif  ( a > b ):   
#     print("Es a > b que edad2 ")    
else:
    print("Es a > b que edad2 ")   
    #print("No cumple con ningun termino")    


#while
#evalua que cumpla la condicion para ingresar.
print("////////////////////")
contador = 0
maximovalor = 9
while (contador < maximovalor ):
    print("Contando: ", contador)
    contador = contador + 1
print("Fn del ciclo")

print("////////////////////")
#For es un contador
for puntero in range(10):
    print(puntero)
print("Fn del ciclo")    

print("////////////////////")
#For es un contador
for inicia in range(-3, 101, 1):
    print(inicia)
print("Fn del ciclo")    