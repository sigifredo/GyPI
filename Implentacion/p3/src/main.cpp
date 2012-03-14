
#include<iostream>
#include<list>
#include<Regresion.hpp>

using std::cout;
using std::cin;
using std::endl;

#ifndef elif
#  define elif	else if
#endif

#define print(X)	cout << X << endl

int main()
{
    int n;

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

    Regresion r(lx, ly);
    float r2 = r.coeficienteCorrelacion();

    cout << "y = " << r.betha0() << " + " << r.betha1() << "x" << endl;
    cout << "Coeficiente de correlación: " << r2 << endl;

    if(r2 >= 0.9f)
        print("Predictive; use it with high confidence");
    elif(r2 >= 0.7f && r2 < 0.9f)
        print("Strong and can be used for planning");
    elif(r2 >= 0.5f && r2 < 0.7f)
        print("Adequate for planning but use with caution");
    elif(r2 < 0.5)
        print("Not reliable for planning purposes");

    return 0;
}
