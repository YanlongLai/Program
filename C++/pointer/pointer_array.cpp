#include <iostream> 
using namespace std; 

int main() {
    const int length = 10;
    int arr[length] = {0}; 
    int *ptr = arr; 

    for(int i = 0; i < length; i++) { 
        cout << "&arr[" << i << "]: " << &arr[i]; 
        cout << "\tptr+" << i << ": " << ptr+i; 
        cout << endl; 
    } 

    return 0; 
}
