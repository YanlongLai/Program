#include <iostream> 
using namespace std; 

int main() {
    char *str[][2] = {"professor", "Justin", 
        "teacher", "Momor", 
        "student", "Caterpillar"}; 

    for(int i = 0; i < 3; i++) {
        cout << str[i][0] << ": " 
            << str[i][1] << endl; 
    }

    return 0; 
}
