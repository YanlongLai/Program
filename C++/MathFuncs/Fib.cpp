#include <iostream>
using namespace std;
int main(){
    int past2 = 0;
    int past1 = 1;
    int fib=0;
    for(int i = 0; i < 10; i++){
        fib = past2 + past1;
        past2 = past1;
        past1 = fib;
        cout<<fib<<endl;
    }
}
