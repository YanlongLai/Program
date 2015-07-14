#include <iostream> 
using namespace std; 

int main() {
    int size = 0; 

    cout << "請輸入陣列長度："; 
    cin >> size; 
    int *arr = new int[size]; 

    cout << "指定元素值：" << endl; 
    for(int i = 0; i < size; i++) { 
        cout << "arr[" << i << "] = "; 
        cin >> *(arr+i); 
    } 

    cout << "顯示元素值：" << endl; 
    for(int i = 0; i < size; i++) {
        cout << "arr[" << i << "] = " << *(arr+i)
            << endl; 
    } 

    delete [] arr; 

    return 0; 
}
