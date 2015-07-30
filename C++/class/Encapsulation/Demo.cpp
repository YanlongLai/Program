#include "Demo.h"
void Demo::setA(int n) {
        a = n;
}
 
void Demo::setB(int n) {
        b = n;
}
 
int Demo::getA() {
        return a;
}
 
int Demo::getB() {
        return b;
}
//do_something也要稍作改變
int Demo::do_something() {
        return getA() + getB();
}
