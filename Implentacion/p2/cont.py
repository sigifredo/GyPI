#!/usr/bin/env python
#
# Sigifredo Escobar Gomez
#

from sys import argv


# Validamos que el numero de parametros sea correcto.
# de lo contrario, indicamos la forma de usar el programa.
#
# uso: ./cont.py <nombre del archivo a contar> 
#

if(len(argv) < 2):
    print "Numero de parametros invalido.\n\nUse:\n\t" + argv[0] + " <nombre de archivo>"

    exit(-1)

# funcion que nos permite saber si una cadenas contiene otra quitando el comentario de una linea de C/C++
def contiene(cadena, cadenaABuscar):
    from re import match

    # vemos si contiene comentario y lo eliminamos de la cadena
    i = cadena.find("//")
    if i >= 0:
        cadena = cadena[0:i]

    # retornamos verdadero si la cadena "cadena" contiene la cadena "cadenaABuscar".
    if match(cadenaABuscar, cadena):
        return True
    else:
        return False


# funcion para contar lineas, clases, miembros, metodos, y funciones
def contar(archivo):

    # Archivo con el codigo
    f = file(archivo, "r")

    # Variables de la funcion.
    clase = False
    clases = 0
    metodos = 0
    miembros = 0
    llaves = 0
    llavesC = 0
    funciones = 0
    lineas = 0
    comentario = False

    # recorremos el archivo linea por linea
    for i in f:
        lineas += 1

        # verificamos si hay varias lineas de codigo comentadas, y las obviamos
        if comentario:
            fin = i.find("*/")

            if fin >= 0:
                i = i[fin+2:len(i)]
    
                comentario = False
            else:
                continue
    
        if i.find("/*") >= 0:
            if i.find("*/") >= 0:
                inicio = i.find("/*")
                fin = i.find("*/")
                i = i[0:inicio] + i[fin+2:len(i)]
            else:
                inicio = i.find("/*")
                i = i[0:inicio]
    
                comentario = True

        # Si en el recorrido por el archivo, nos encontramos en el interior de una clase
        if clase:
            # Verificamos que tenga un metodo (jugando con expresiones regulares).
            if contiene(i, "(.*)\((.*)\)(.*);"):
                metodos += 1

            # Verificamos que tenga un miembro (jugando con expresiones regulares).
            elif contiene(i, "( *)(\w*)( *)(\w*);"):
                miembros += 1

            # vemos que la linea tenga una llave que cierra, para controlar cuando sale de la clase.
            if contiene(i, "}"):
                llaves -= 1;

                if llavesC == llaves:
                    clase = False

                continue

        # si la linea contiene la palabra reservada class o struct.
        elif contiene(i, "class") or contiene(i, "struct"):
            if contiene(i, "(.*);"):
                clases += 1
            else:
                clase = True
                clases += 1
                llavesC = llaves
        else:
            # si no estamos al interior de una clase y encontramos una funcion, la contamos.
            if contiene(i, "(.*)\((.*)\)(.*)"):
                if not contiene(i, "inline"):
                    funciones += 1

        # verificamos las llaves que abren y cierran.
        if contiene(i, "{"):
            llaves += 1
        if contiene(i, "}"):
            llaves -= 1

    # retornamos los numeros de las lineas, clases, miembros, metodos y funciones.
    return lineas, clases, miembros, metodos, funciones

if __name__ == "__main__":
    lineas, clases, miembros, metodos, funciones = contar(argv[1])

    print "lineas:\t\t%d" % lineas
    print "clases:\t\t%d" % clases
    print "miembros:\t%d" % miembros
    print "metodos:\t%d" % metodos
    print "funciones:\t%d" % funciones
