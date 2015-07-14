# C++
About basic coding sheets

### Pointer

 - constant 

 被const宣告的變數一但被指定值，就不能再改變變數的值，您也無法對該變數如下取值：  
 ```c++
 const int var = 10; 
 var = 20; // error, assignment of read-only variable 'var' 
 int *ptr = &var; // error,  invalid conversion from 'const int*' to 'int*' 
 ```

 - constant pointer

 用const宣告的變數，必須使用對應的const型態指標才可以： 
 ```c++
 const int var = 10;  
 const int *vptr = &var;  
 ```

 同樣的vptr所指向的記憶體中的值一但指定，就不能再改變記憶體中的值，您不能如下試圖改變所指向記憶體中的資料：  
 ```c++
 *vptr = 20; // error, assignment of read-only location   
 ```
 另外還有指標常數，也就是您一旦指定給指標值，就不能指定新的記憶體位址值給它，例如：  
 ```c++
 int x = 10;  
 int y = 20;  
 int* const vptr = &x;  
 vptr = &x;  // error,  assignment of read-only variable `vptr'  
 ```

 - new & delete

 使用new運算子動態配置的空間，在整個程式結束前並不會自動歸還給記憶體，您必須使用delete將這個空間還給記憶體，如上面的程式在結束前所作的動 作，在這個程式中，雖然顯示完畢後程式也就結束，但這邊還是示範delete的用法，而這也是個好習慣，日後您的程式在持續執行過程中若大量使用new而 沒有適當的使用delete的話，由於空間一直沒有歸還，最後將導致整個記憶體空間用盡。  

 接下來看一個簡單的動態記憶體配置的應用，您知道陣列使用的一個缺點，就是陣列的大小必須事先決定好，然而有時候您無法知道我們會使用多大的陣列，或者希 望由使用者自行決定陣列大小，這時候您就可以使用動態記憶體配置加上指標運算來解決這個問題，先說明陣列動態配置的方式，如下所示：  
```c++
 int *arr = new int[1000];
```
 這段程式碼動態配置了1000個int大小的空間，並傳回空間的第一個位址，配置後的空間資料是未知的，沒有方法在動態配置陣列空間後同時宣告元素初值。  

 同樣的，使用new配置得來的空間，在不使用時應該使用delete歸還給記憶體，方法如下：   
```c++
 delete [] arr;
```
 注意在使用delete歸還陣列空間給記憶體時，我們必須加上[ ]，表示歸還的是整個陣列空間。  

 - ptr to String

 額外補充一點，下面兩個宣告的作用雖然類似，但其實意義不同：   
 ```c++
 char *str1[] = {"professor", "Justin", "etc."}; 
 char str2[3][10] = {"professor", "Justin", "etc."};
 ```
 第一個宣告是使用指標陣列，每一個指標元素指向一個字串常數，只要另外指定字串常數給某個指標，該指標指向的記憶體位址就不同了，而第二個宣告則是配置連 續的3x10的字元陣列空間，字串是直接儲存在這個空間，每個字串的位址是固定的，而使用的空間也是固定的（也就是含空字元會是10個字元）。   
