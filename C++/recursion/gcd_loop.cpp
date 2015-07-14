#include <iostream> 
using namespace std; 

int gcd(int, int); 

int main() { 
    int m = 0;
    int n = 0; 

    cout << "輸入兩數："; 
    cin >> m >> n; 

    cout << "GCD: " 
        << gcd(m, n) << endl; 

    return 0; 
} 

int gcd(int m, int n) { 
        int r = 0; 

        while(n != 0) { 
            r = m % n; 
            m = n; 
            n = r; 
        } 

                return m; 
}
