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
    //最大公因數
    if(n == 0)
        return m;
    //還有餘數，則繼續呼叫原程式
    else 
        return gcd(n, m % n); 
}
