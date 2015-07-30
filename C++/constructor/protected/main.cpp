#include <iostream>
#include "Cubic.h"

using namespace std;

int main() {
    Cubic c1(0, 0, 0, 10, 20, 30); 

    cout << "c1 volumn: " 
        << c1.volumn() 
        << endl; 

    return 0;
}
