
#ifndef REGRESION_HPP
#define REGRESION_HPP

#include<math.hpp>

class Regresion
{
public:
    Regresion(lista &lx, lista &ly);

    float betha0() const;
    float betha1() const;
    float coeficienteCorrelacion() const;

protected:
    float _fB0, _fB1, _fR2;
};

inline float Regresion::betha0() const
{
    return _fB0;
}

inline float Regresion::betha1() const
{
    return _fB1;
}

inline float Regresion::coeficienteCorrelacion() const
{
    return _fR2;
}

#endif
