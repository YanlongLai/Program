#include <iostream>
int func(int x)
{
    if( (x&(x-1)) == 0 )
        return 1;
    else
        return (x&(x-1));
}

int main()
{
    int x = 6;
    printf("%d\n", func(x));
}
