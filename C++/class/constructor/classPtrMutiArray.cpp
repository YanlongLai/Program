#include <iostream> 
#include "SafeArray.h"
using namespace std; 

int main() {
    SafeArray arrs[] = {SafeArray(5), SafeArray(10), SafeArray(15)};

    for(int i = 0; i < 3; i++) {
        SafeArray *safeArray = arrs + i;
        for(int j = 0; j < safeArray->length; j++) {
            safeArray->set(j, (j + 1) * 10);
        }
    }

    for(int i = 0; i < 3; i++) {
        SafeArray *safeArray = arrs + i;
        for(int j = 0; j < safeArray->length; j++) {
            cout << safeArray->get(j) << " ";
        }
        cout << endl;
    }

    return 0; 
}
