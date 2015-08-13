#include <iostream>
using namespace std;
class A {
    public:
    A(){print();}
    ~A(){print();}
    virtual void print(){cout << "in A"<<endl;}
};

class B: public A{
    public:
    B(){print();}
    ~B(){print();}
    virtual void print(){cout << "in B"<<endl;}
};

  int main(void)
{
    B b ;
}
