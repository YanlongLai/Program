# Program
About basic coding sheets

### Class 類別
 - 巢狀類別（Nested Classes)   
 類別可以定義在另一個類別之中，這樣的類別稱之為巢狀類別或內部類別，內部類別只被外部包裹的類別所見，當某個Slave類別完全只服務於一個 Master類別時，您可以將之設定為內部類別，如此使用Master類別的人就不用知道Slave的存在。  

 一個巢狀類別通常宣告在"private"區域，也可以宣告在"protected"或"public"區域，一個宣告的例子如下：  
 ```c++
 class OuterClass {
     private:
         class InnerClass {
             //  ....
         };
 };
 ```
