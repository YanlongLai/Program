#include <iostream> 
using namespace std; 

int main() {
    int p = 10; 
    int *ptr = &p; 

    cout << "p的值：" << p 
        << endl; 
    cout << "p的記憶體位置: " << &p 
        << endl;
    cout << "*ptr參照的值: " << *ptr 
        << endl; 

    cout << "ptr儲存的位址值: " << ptr 
        << endl; 
    cout << "ptr的記憶體位置: " << &ptr 
        << endl; 

    return 0; 
}
