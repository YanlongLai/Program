var x = 10;
var f = function(){
    console.log(this.x);
};

f(); //由於調用f函式時，前方並未有[物件.]的形式，故f內的this指向全域物件，則輸出全域變數的x(10)。
