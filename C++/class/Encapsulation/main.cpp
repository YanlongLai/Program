#include <iostream>
#include "Demo.h"
 
using namespace std;
 
 
int main(void) {
    Demo t;
    t.setA(11);
    t.setB(22);

    cout << endl;
    cout << t.do_something() << endl;
    cout << endl;

    return 0;
}
