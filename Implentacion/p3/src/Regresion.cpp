
// STD
#include<cmath>

// Own
#include<Regresion.hpp>

#include<iostream>
using namespace std;

Regresion::Regresion(lista &lx, lista &ly)
{
    float xm, ym;
    int n, x2, y2, xy, x, y;

    n = lx.size();

    xm = media(lx);
    ym = media(ly);

    x2 = sumatoria(lx, lx);
    y2 = sumatoria(ly, ly);
    xy = sumatoria(lx, ly);

    _fB1 = (xy - (n*xm*ym)) / (x2 - (n*xm*xm));
    _fB0 = ym - _fB1*xm;

    // Calculamos r2
    x = sumatoria(lx);
    y = sumatoria(ly);

    _fR2 = n*xy - x*y; // Calculamos numerador
    _fR2 /= std::sqrt((1.0f*(n*x2 - x*x)) * (1.0f*(n*y2 - y*y))); // dividimos por el denominador

    _fR2 = _fR2*_fR2;
}
