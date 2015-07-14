#include <iostream> 
using namespace std; 

void showpara(int); 
void showpara(int, int); 

int main() { 

    showpara(10); 
    showpara(20, 30); 

    return 0; 
} 

void showpara(int x) { 
    cout << "引數：" << x 
        << endl; 
} 

void showpara(int x, int y) { 
    cout << "引數：" << x 
        << "\t" << y 
        << endl; 
}
