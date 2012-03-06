
#include<iostream>
#include<list>
#include<cmath>

using std::cout;
using std::cin;
using std::endl;

typedef std::list<int> lista;

int main()
{
    int n;
    float fMedia = 0.0f;
    float fDesviacion = 0.0f;

    lista l;

    cin >> n;

    // Leemos los n datos.
    for(int i = 0; i < n; i++)
    {
        int iNro;

        cin >> iNro;
        l.push_back(iNro);

        // A medida que leemos calculamos la sumatoria de todos los datos.
        // para posteriormente calcular la media.
        fMedia += iNro;
    }

    // Encontramos la media.
    fMedia /= n;

    // Recorremos la lista de los números leidos para calcular la sumatoria en
    // la ecuación de la desviacion estandar
    for(lista::iterator it = l.begin(); it != l.end(); it++)
    {
        float fX = *it;

        // Calculamos la sumatoria.
        fDesviacion += (fX - fMedia)*(fX - fMedia);
    }

    // Calculamos la desviación estandar.
    fDesviacion = std::sqrt(fDesviacion / (n-1.0f));

    // mostramos el resultado en pantalla.
    cout << "Media:\t\t" << fMedia << endl << "Desviacion:\t" << fDesviacion << endl;

    return 0;
}
