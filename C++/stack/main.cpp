#include <iostream>
#include "Stack.h"
int main(void){
    Stack A;
    A.Push(1);
    A.Push(2);
    A.Push(3);
    A.Push(4);
    A.Push(5);
    A.Push(6);
    printf("Top is:%d\n",A.Top());
    A.Pop();
    printf("Top is:%d\n",A.Top());
    A.Pop();
    printf("Top is:%d\n",A.Top());
    delete A;
}
