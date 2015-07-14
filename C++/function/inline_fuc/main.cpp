#include <iostream>
#include "math.h"
using namespace std;

int main() {
    int num = 0;
    int power = 0; 

    cout << "輸入數值："; 
    cin >> num; 

    cout << "輸入平方："; 
    cin >> power; 

    cout << num << "平方：" 
        << pow2(num) << endl; 
    cout << num << "的" << power << "次方：" 
        << pow(num, power) 
        << endl; 

    return 0;
}
