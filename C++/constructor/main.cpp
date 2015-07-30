#include <iostream> 
using namespace std; 

class Foo1 { 
    public: 
        Foo1() { 
            cout << "Foo1建構函式" << endl; 
        } 

        ~Foo1() { 
            cout << "Foo1解構函式" << endl; 
        } 
}; 

class Foo2 : public Foo1 { 
    public: 
        Foo2() { 
            cout << "Foo2建構函式" << endl; 
        } 

        ~Foo2() { 
            cout << "Foo2解構函式" << endl; 
        } 
}; 

int main() { 
    Foo2 f; 

    cout << endl; 

    return 0;
}
