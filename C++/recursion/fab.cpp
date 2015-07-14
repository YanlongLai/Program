#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <iostream>
 
using namespace std;
 
int main()
{
    int n;
    double constant_a = (1 + sqrt(5)) / 2;
    double constant_b = (1 - sqrt(5)) / 2;
    double constant_c = sqrt(5) / 5;
    double value_1 = 0;
    int value_2 = 0;
    cout << "輸入您想要輸出的fab個數：";
    scanf("%d",&n);
    if(n > 0)
    {
        for (int i = 0; i < n; i++)
        {
            value_1 = constant_c * (pow(constant_a , i) - pow(constant_b , i));
            value_2 = (int)value_1;
            printf("%d\n", value_2);
        }
        do {
            cout << "\nPress the Enter key to continue." << endl;
        } while (cin.get() != '\n');
        return 0;
    }
    else
    {
        do {
            cout << "Press the Enter key to continue."<<endl;
        } while (cin.get() != '\n');
        return -1;
    }
}
