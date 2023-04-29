#Clase persona, atributos y funciones
class Persona:

    def __init__(self, Identificacion, Nombre, FechaNacimiento, ApellidoPaterno, ApellidoMaterno, Direccion ) :
        self.Identificacion = Identificacion 
        self.Nombre = Nombre
        self.FechaNacimiento = FechaNacimiento
        self.ApellidoPaterno = ApellidoPaterno
        self.ApellidoMaterno = ApellidoMaterno
        self.Direccion = Direccion

# Metodos para obtener informacion o los get
    def ObtenerNombre ( self ):
        print ( self.Nombre ) 

    def ObtenerNombreCompleto ( self ):
        print ( self.Nombre, self.ApellidoPaterno )          

    def ObtenerApellidoPaterno( self ):
        print ( self.ApellidoPaterno )   

#Metodos para realizar ajustes de informacion o los set
    def AjustarApellidoPaterno ( self, ApellidoPaterno ):
        self.ApellidoPaterno =  ApellidoPaterno


# Fin de la clase

# Inicia la aplicacion
Usuario = Persona ("1312122", "Mario", "12-02-80",
 "Espinoza", "ApellidoMaterno", "Direccion")

Usuario.ObtenerNombre()
Usuario.ObtenerApellidoPaterno()

Usuario.AjustarApellidoPaterno("Jimenez")

Usuario.ObtenerApellidoPaterno()

Usuario.ObtenerNombreCompleto()
