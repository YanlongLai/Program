#include <iostream> 
using namespace std; 

int foo(); 

int main() { 
    int (*ptr)() = 0; 

    ptr = foo; 

    foo(); 
    ptr(); 

    cout << "address of foo:" 
        << (size_t)foo << endl; 
    cout << "address of foo:" 
        << (size_t)ptr << endl; 

    return 0; 
} 

int foo() { 
    cout << "function point" << endl; 

    return 0; 
}
