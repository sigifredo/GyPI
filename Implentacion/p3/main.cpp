
#include<iostream>
#include<list>
#include<cmath>

using std::cout;
using std::cin;
using std::endl;

typedef std::list<int> lista;

float media(const lista &l);
int sumatoria(const lista &l);
int sumatoria(const lista &l1, const lista &l2);

int main()
{
    int n;
    float xm, ym;
    int x2, y2, xy;

float betha0, betha1, yk;

    lista lx, ly;

    cin >> n;

    // Leemos los n datos.
    for(int i = 0; i < n; i++)
    {
        int iX, iY;

        cin >> iX >> iY;
        lx.push_back(iX);
        ly.push_back(iY);
    }

    xm = media(lx);
    ym = media(ly);

    x2 = sumatoria(lx, lx);
    y2 = sumatoria(ly, ly);
    xy = sumatoria(lx, ly);

    betha1 = (xy - (n*xm*ym)) / (x2 - (n*xm*xm));
    betha0 = ym - betha1*xm;

    yk = betha0 + betha1*xk;

    return 0;
}


float media(const lista &l)
{
    float fMedia = 0.0f;

    for(lista::iterator it = l.begin(); it != l.end(); it++)
    {
        // A medida que leemos calculamos la sumatoria de todos los datos.
        // para posteriormente calcular la media.
        fMedia += *it;
    }

    // retornamos la media.
#warning "Ver si si es size"
    return fMedia/l.size();
}

int sumatoria(const lista &l)
{
    int iSuma = 0;

    for(lista::iterator it = l.begin(); it != l.end(); it++)
    {
        iSuma += *it;
    }

    return iSuma;
}

int sumatoria(const lista &l1, const lista &l2)
{
    int iSuma = 0;

    for(lista::iterator it1 = l1.begin(), it2 = l2.begin(); it1 != l1.end(); ++it2, it1++)
    {
        iSuma += ((*it1) * (*it2));
    }

    return iSuma;
}
