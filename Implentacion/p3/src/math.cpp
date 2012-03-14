
#include<math.hpp>

float media(lista &l)
{
    float fMedia = 0.0f;

    for(lista::iterator it = l.begin(); it != l.end(); it++)
    {
        // A medida que leemos calculamos la sumatoria de todos los datos.
        // para posteriormente calcular la media.
        fMedia += *it;
    }

    // retornamos la media.
    return fMedia/l.size();
}

int sumatoria(lista &l)
{
    int iSuma = 0;

    for(lista::iterator it = l.begin(); it != l.end(); it++)
    {
        iSuma += *it;
    }

    return iSuma;
}

int sumatoria(lista &l1, lista &l2)
{
    int iSuma = 0;

    for(lista::iterator it1 = l1.begin(), it2 = l2.begin(); it1 != l1.end(); ++it2, it1++)
    {
        iSuma += ((*it1) * (*it2));
    }

    return iSuma;
}
