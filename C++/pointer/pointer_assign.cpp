#include <iostream> 
using namespace std; 

int main() { 
    int var = 30; 
    int *ptr = &var ; 
    //int *ptr; 
    //ptr = &var ; 

    cout << "變數var的位址：" << &var 
        << endl; 
    cout << "指標ptr指向的位址：" << ptr 
        << endl; 

    return 0; 
}
