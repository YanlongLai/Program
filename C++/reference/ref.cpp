#include <iostream>
using namespace std;

int main() {
    int var = 10;
    int &ref = var;

    cout << "var: " << var 
        << endl;
    cout << "ref: " << ref
        << endl;

    ref = 20;

    cout << "var: " << var 
        << endl;
    cout << "ref: " << ref
        << endl;

    return 0;
}
