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
 函數聲明（Function Declaration），它模擬了面向對象語言中的函數定義方式，讓我們很自然將其想成一個「常規」的函數。但實際上，JavaScript中有與上面代碼等效的代碼：  

 ```javascript
 var add = new Function('a', 'b', 'return a + b');
 ```
 這段代碼與上一段代碼基本等效，但是很少有人這樣用。其實可以將這種定義看成是ECMAScript的「原生」定義函數的方式，而我們常用的寫法更像一種語法糖，可以讓我們用熟悉的方式定義函數而不是在編碼的時候照顧ECMAScript的「特有個性」。從這種定義方式可以很明顯看出，函數在ECMAScript中是一個Function對象，並且函數名只不過是這個對象的一個指針變量，理解這點對理解ECMAScript中函數的運作方式尤為重要。Function是一個內置（Build-in）對象，用於構造函數對象，下面本文將解讀這個Function內置對象。

 另外要明確一點，Function Object是一種特殊的Object，是Object的一個真子集，也就是說函數一定是對象，而對象不一定是函數。

 ### 函式三種表達式
 三種創建函數的方式，分別是原生Function對象構造、函數聲明和函數表達式，但三者存在等價對應關係。  
 ```javascript
 function 函數名稱(參數列表){
         //執行代碼體
 }
 //--------------------------
 var 函數名稱 = function(參數列表){
         //執行代碼體
 };
 //--------------------------
 var 函數名稱 = new Function('參數列表', '執行代碼體');   

 //在EMCA-262的正式定義方式為：  
 new Function(p1, p2, ..., pn, body);

 ```
 所以在ECMAScript標準中，只定義了原生創建方式的構造流程。ECMA-262中對Function建立函數對象的過程描述比較繁瑣，在本文中我將其簡要總結如下：  

 1、如果沒有傳遞給Function參數，則構造一個參數列表和執行代碼體均為空的函數對象。  

 2、如果只傳遞了一個參數，則構造一個參數列表為空的函數對象，其執行代碼體為其唯一傳遞過來的參數。  

 3、如果傳遞了一個以上的參數，最後一個解析為執行代碼體，剩下的參數解析為參數列表。或者說「p1 – pn」解析成參數列表，而「body」解析成代碼體。如果pi中存在字符「,」則將其解析為由「,」分割的多個參數。  

 4、以上過程中如果解析參數列表或代碼體失敗，拋出SyntaxError異常，否則以解析出的參數列表和代碼體建立一個函數對象。  

 5、將執行創建此函數對象的執行環境的作用域鏈傳入，作為此函數對象的Scope屬性。  

 6、返回此函數對象的指針。  
### Reference 參考
 - [解讀ECMAScript[2]——函數、構造器及原型] (http://www.cnblogs.com/leoo2sk/archive/2011/01/12/ecmascript-function.html)

