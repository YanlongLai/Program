#include <iostream> 
using namespace std; 

int main() {
    const int length = 5;
    int arr[length] = {10, 20, 30, 40, 50}; 
    int *ptr = arr; 

    // 以指標方式存取資料 
    for(int i = 0; i < length; i++) {
        cout << "*(ptr+" << i << "): " << *(ptr+i)
                                            << endl;
    }
    cout << endl;

    // 以陣列方式存取資料 
    for(int i = 0; i < length; i++) {
        cout << "ptr[" << i << "]: " << ptr[i]
            << endl;
    }
    cout << endl;

    // 以指標方式存取資料 
    for(int i = 0; i < length; i++) {
        cout << "*(arr+" << i << "): " << *(arr+i)
                                            << endl;
    }
    cout << endl;

    // 以陣列方式存取資料 
    for(int i = 0; i < length; i++) {
        cout << "arr[" << i << "]: " << arr[i]
            << endl;
    }
    cout << endl;

    return 0; 
}
