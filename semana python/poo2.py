class Students:
    studenCount = 0

    # Constructor de la clase
    #def __init__(self, nombre, apellido, telefono, grado, cedula, correo):        
    def __init__(self, nombre):        
        self.nombre = nombre
        # self.apellido = apellido
        # self.telefono = telefono
        # self.grado = grado
        # self.cedula = cedula
        # self.correo = correo
        Students.studenCount += 1

    def displayCount(self)        :
        print("total de estudiantes: ", Students.studenCount )

    def displayStudent(self):
        print (self.nombre)

    def setNombre(self, nombre):
        self.nombre = nombre
        
#Fin de la clase
# 
#        
aquiinvoco = Students('')


aquiinvoco.displayStudent()


input capturar y enviar los parametros por la funcion
aquiinvoco.setNombre('Emily')


aquiinvoco.displayStudent()


aquiinvoco.displayCount()