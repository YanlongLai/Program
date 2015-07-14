# C++
About basic coding sheets

### Pointer

 - constant 

 被const宣告的變數一但被指定值，就不能再改變變數的值，您也無法對該變數如下取值：  
 const int var = 10; 
 var = 20; // error, assignment of read-only variable `var' 
 int *ptr = &var; // error,  invalid conversion from `const int*' to `int*' 

 - constant pointer

 用const宣告的變數，必須使用對應的const型態指標才可以： 
 const int var = 10;  
 const int *vptr = &var;  

 同樣的vptr所指向的記憶體中的值一但指定，就不能再改變記憶體中的值，您不能如下試圖改變所指向記憶體中的資料：  
 *vptr = 20; // error, assignment of read-only location   

 另外還有指標常數，也就是您一旦指定給指標值，就不能指定新的記憶體位址值給它，例如：  
 int x = 10;  
 int y = 20;  
 int* const vptr = &x;  
 vptr = &x;  // error,  assignment of read-only variable `vptr'  
