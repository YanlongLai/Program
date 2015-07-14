# Program
About basic coding sheets

### Function
程式在執行時，函式本身在記憶體中也佔有一個空間，而函式名稱本身也就是指向該空間位址的參考名稱，當呼叫函式名稱時，程式就會去執行該函式名稱所指向的 記憶體空間中之指令。  

您可以宣告函式指標，並讓它與某個函式指向相同的空間，函式指標的宣告方式如下所示：  
傳 回值型態 (\*指標名稱)(傳遞參數); 

一個函式型態由傳回值型態與參數列決定，不包括函式名稱，一個函式指標可指向具有相同型態的函式，也就是具有相同傳回值型態和參數列的函式。  

下面這個程式是個簡單的示範，它以函式指標ptr來取得函式foo()的位址，使用它來呼叫函式，將與使用foo()來呼叫函式具有相同的作用，程式以整 數方式顯示兩個的記憶體空間是相同的：  

```c++
#include <iostream> 
using namespace std; 

int foo(); 

int main() { 
    int (*ptr)() = 0; 

    ptr = foo; 

    foo(); 
    ptr(); 

    cout << "address of foo:" 
        << (int)foo << endl; 
    cout << "address of foo:" 
        << (int)ptr << endl; 

    return 0; 
} 

int foo() { 
    cout << "function point" << endl; 

    return 0; 
}
```

執行結果：  

```c++
function point
function point
address of foo:4199502
address of foo:4199502
```
