#include <iostream> 
using namespace std; 

int main() {
    char *str[] = {"professor", "teacher", 
        "student", "etc."}; 

    for(int i = 0; i < 4; i++) 
        cout << str[i] << endl; 

    return 0; 
}
