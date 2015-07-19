# Program
About basic coding sheets

### JavaScript
 - Function
 ```javascript

 function FuncA(){
         return new function(){
                     alert('Is it strange?');
                         }
 }
  
  var f1 = FuncA;
  var f2 = f1();
  
  //Output
  f2(); //Is it strange?
 ```
 在C#中「function is a part of Object」，也就是說C#在語義上將function與Object定義為從屬關係，對於C#或Java程序員來說，這種想法已經深入骨髓了。在JS中，function IS A KIND OF Object。

 `在ECMAScript中聲明或創建一個函數實際等同於創建了一個Object，而函數名只是指向這個函數對象的一個指標變量。`   

 JavaScript可以直接返回一個函數或者將函數名賦給變量了，因為函數本身是一個對象，而函數名本身就是一個變量。在ECMAScript中，對函數變量的正式名稱是「Function Object」。  
 之所以很難意識到JavaScript中的函數實際是對象，是因為語法層面的封裝。例如，我們已經習慣了這樣創建函數：  

 ```javascript
 function add(a, b){
         return a + b;
 }
 ```
 函數聲明（Function Declaration），它模擬了面向對象語言中的函數定義方式，讓我們很自然將其想成一個「常規」的函數。  
 但實際上，JavaScript中有與上面代碼等效的代碼：  

 ```javascript
 var add = new Function('a', 'b', 'return a + b');
 ```
 這段代碼與上一段代碼基本等效，但是很少有人這樣用。其實可以將這種定義看成是ECMAScript的「原生」定義函數的方式，而我們常用的寫法更像一種語法糖，可以讓我們用熟悉的方式定義函數而不是在編碼的時候照顧ECMAScript的「特有個性」。從這種定義方式可以很明顯看出，函數在ECMAScript中是一個Function對象，並且函數名只不過是這個對象的一個指針變量，理解這點對理解ECMAScript中函數的運作方式尤為重要。Function是一個內置（Build-in）對象，用於構造函數對象，下面本文將解讀這個Function內置對象。

 另外要明確一點，Function Object是一種特殊的Object，是Object的一個真子集，也就是說函數一定是對象，而對象不一定是函數。

### Reference 參考
 [解讀ECMAScript[2]——函數、構造器及原型] (http://www.cnblogs.com/leoo2sk/archive/2011/01/12/ecmascript-function.html)

