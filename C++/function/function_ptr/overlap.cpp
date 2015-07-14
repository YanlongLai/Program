#include <iostream> 
using namespace std; 

int foo(int, int); 
char foo(int, char); 

int main() { 
    int (*ptr1)(int, int) = 0; 
    char (*ptr2)(int, char) = 0; 

    ptr1 = foo; // get address of foo(int, int) 
    ptr2 = foo; // get address of foo(int, char) 

    ptr1(1, 2); 
    ptr2(3, 'c'); 

    cout << "address of foo(int, int): " 
        << &ptr1 << endl; 
    cout << "address of foo(int, char): " 
        << &ptr2 << endl; 

    return 0; 
} 

int foo(int n1, int n2) { 
    cout << "foo(int, int): " 
        << n1 << "\t" << n2 
           << endl;

    return 0; 
} 

char foo(int n, char c) { 
    cout << "foo(int, char): " 
        << n << "\t" << c 
           << endl;

    return c; 
}
