#include <iostream> 
using namespace std; 

//void count(); 

int main() { 
    int a = 10; 
    for(int i = 0; i < 100; i++)  {
        a++;
    }
    cout << a << endl;
    extern double someVar;

    cout << someVar << endl;

    return 0; 
}
