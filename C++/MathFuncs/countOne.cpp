#include <iostream>
int func(int x)
{
    int countx = 0;
    while(x)
    {
        countx++;
        x = x&(x-1);
    }
    return countx;
} 
int main(){
    int x = 15;
    printf("%d的二位元有幾個1:%d\n", x, func(x));
}
