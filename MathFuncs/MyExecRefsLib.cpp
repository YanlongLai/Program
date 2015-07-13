// MyExecRefsLib.cpp
// compile with: cl /EHsc MyExecRefsLib.cpp /link MathFuncsLib.lib

 #include <iostream>

 #include "MathFuncsLib.h"

 using namespace std;
 using namespace MathFuncs;

 int main()
{
    double a = 7.4;
    int b = 99;

    cout << "a + b = " <<
        MathFuncs::MyMathFuncs::Add(a, b) << endl;
    cout << "a - b = " <<
        MathFuncs::MyMathFuncs::Subtract(a, b) << endl;
    cout << "a * b = " <<
        MathFuncs::MyMathFuncs::Multiply(a, b) << endl;
    cout << "a / b = " <<
        MathFuncs::MyMathFuncs::Divide(a, b) << endl;
    cout << "factorial(3) " <<
        MathFuncs::MyMathFuncs:: factorial(3) << endl;

    for(int i =2; i<=10000000; i++){
        if(MyMathFuncs::isPrime(i,2))
            cout << i<< endl;
    }

    return 0;
}
