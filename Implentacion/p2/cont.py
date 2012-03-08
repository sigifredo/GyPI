#!/usr/bin/env python

from sys import argv

if(len(argv) < 2):
    print "Numero de parametros invalido.\n\nUse:\n\t" + argv[0] + " <nombre de archivo>"

    exit(-1)

def contiene(cadena, cadenaABuscar):
    from re import match

    i = cadena.find("//")
    if i >= 0:
        cadena = cadena[0:i]

    if match(cadenaABuscar, cadena):
        return True
    else:
        return False


def contar(archivo):
    f = file(archivo, "r")

    clase = False
    clases = 0
    metodos = 0
    llaves = 0
    llavesC = 0
    funciones = 0
    lineas = 0
    comentario = False

    for i in f:
        lineas += 1

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

        if clase:
            if contiene(i, "(.*)\((.*)\)(.*);"):
                metodos += 1
            if contiene(i, "}"):
                llaves -= 1;

                if llavesC == llaves:
                    clase = False

                continue

        elif contiene(i, "class") or contiene(i, "struct"):
            if contiene(i, "(.*);"):
                clases += 1
            else:
                clase = True
                clases += 1
                llavesC = llaves
        else:
            if contiene(i, "\((.*)\)"):
                if not contiene(i, "inline"):
                    funciones += 1

        if contiene(i, "{"):
            llaves += 1
        if contiene(i, "}"):
            llaves -= 1

    return lineas, clases, metodos, funciones

if __name__ == "__main__":
    lineas, clases, metodos, funciones = contar(argv[1])

    print "lineas:\t\t%d" % lineas
    print "clases:\t\t%d" % clases
    print "metodos:\t%d" % metodos
    print "funciones:\t%d" % funciones
