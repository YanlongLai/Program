#include <stdio.h>
#include <string.h>

void my_strrev(char* begin){
    char temp;
    char* end;
    end = begin + strlen(begin)-1;

    while(end>begin){
        temp = *end;
        *end = *begin;
        *begin = temp;
        end--;
        begin++;
    } 
}

int main(){
    char string[] = "foobar12345";
    my_strrev(string);
    printf("%s\n", string);
    return 0;
}
