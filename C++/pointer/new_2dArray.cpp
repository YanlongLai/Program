#include <iostream> 
using namespace std; 

int main() {
    int m = 0;
    int n = 0; 

    cout << "輸入二維陣列維度："; 
    cin >> m >> n; 

    int *ptr = new int[m*n]; 

    for(int i = 0; i < m; i++) {
        for(int j = 0; j < n; j++) {
            *(ptr + n*i + j) = i+j; 
        }
    }

    for(int i = 0; i < m; i++) { 
        for(int j = 0; j < n; j++) {
            cout << *(ptr+n*i+j) << "\t"; 
        } 
        cout << endl; 
    } 

    delete [] ptr; 

    return 0; 
}
