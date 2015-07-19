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
 ### 函式兩種呼叫方式
 傳統的面向對象語言中，function只有一種調用方式，就是作為函數調用（Invoked as a function），這是因為面向對象語言中有類（Class）的概念和語言元素。用過JavaScript的都知道，JavaScript中是沒有class關鍵字的（ECMA-262第五版中增加了class，但本系列文章討論的是第三版標準），為了能模擬「類」，ECMAScript引入了「作為構造器調用（Invoked as a
 constructor）」的函數調用方式，同時仍保留了「作為函數調用」的方式。這樣ECMAScript中就有兩種函數調用方式，而通過兩種方式調用同一個函數，目的和效果都存在本質的區別。看下面一段代碼：  
 ```javascript
 function MyFunction(){
         return 0;
 }
  
  var invokedAsFunction = MyFunction();
  var invokedAsConstructor = new MyFunction();
   
   alert(typeof invokedAsFunction); //number
   alert(invokedAsFunction); //0
   alert(typeof invokedAsConstructor); //object
 ```
 這段代碼顯示了同一個函數當做函數和構造器兩種不同方式調用的區別。  

 當直接使用函數名調用函數時，是將函數作為函數調用，它的效果和常規意義上的函數一樣，執行一段代碼並返回結果。  

 當在函數名前加上「new」關鍵字調用時，是作為構造器調用，它的效果類似面向對象語言中類的構造函數，返回一個對象。  

 作為函數調用沒有太多好說的，下面著重介紹作為構造器調用函數，因為這和JavaScript中的面向對象編程有很大聯繫。  
 ### ECMAScript中的構造器（Constructor）
 ```javascript
 function University(name, loca){
         this._name = name;
             this._loca = loca;
                 this.showInfo = function(){
                             alert(this._name + '是一所' + this._loca + '的大學');
                                 }
 }
  
  var u1 = new University('煙台大學', '山東');
  var u2 = new University('北京航空航天大學', '北京');
   
   u1.showInfo(); //煙台大學是一所山東的大學
   u2.showInfo(); //北京航空航天大學是一所北京的大學
 ```
 這裡我們使用new關鍵字後，University所做的工作就像一個構造函數一樣，生成了兩個University對象。其實在上一節我們創建新的函數時就是以構造器方式調用內置對象Function。  

 但是要記得，構造函數和函數本身沒有任何區別，決定一個函數是作為構造函數運行還是普通函數運行的是調用方式上。所以，下面的代碼也完全合法：  
 ```javascript
  var u = University('清華大學', '北京');
 ```
  此時University被當做一個普通函數調用，那麼會產生什麼效果呢？因為University本身沒有返回值，所以u的值會是「undefined」，而此時是在全局作用域中執行University，「this」指向的是全局變量window，所以其結果是此語句為全局變量window添加了兩個變量成員「_name」和「_loca」，值分別為「清華大學」和「北京」。  
### Reference 參考
 - [解讀ECMAScript[2]——函數、構造器及原型] (http://www.cnblogs.com/leoo2sk/archive/2011/01/12/ecmascript-function.html)

