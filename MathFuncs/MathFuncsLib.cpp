// MathFuncsLib.cpp
// compile with: cl /c /EHsc MathFuncsLib.cpp
// post-build command: lib MathFuncsLib.obj

 #include "MathFuncsLib.h"
 #include <iostream>
 #include <stdexcept>

 using namespace std;

 namespace MathFuncs
{
    double MyMathFuncs::Add(double a, double b)
    {
        return a + b;
    }

    double MyMathFuncs::Subtract(double a, double b)
    {
        return a - b;
    }

    double MyMathFuncs::Multiply(double a, double b)
    {
        return a * b;
    }

    double MyMathFuncs::Divide(double a, double b)
    {
        return a / b;
    }
    int factorial_i(int currentNumber, int sum) {
        if(currentNumber == 1) {
            return sum;
        } else {
            return factorial_i(currentNumber - 1, sum*currentNumber);
        }
    }

    int MyMathFuncs::factorial(int number) {
        if(number == 0) {
            return 1;
        }
        return  factorial_i(number, 1);
    }

    bool MyMathFuncs::isPrime(int p, int i=2)
    {
        if (i==p) return 1;//or better  if (i*i>p) return 1;
        if (p%i == 0) return 0;
        return isPrime (p, i+1);

    }

}
