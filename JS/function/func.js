function FuncA(){
    var res = function(){
        console.log('Is it strange?');
    };
    return res;
}
 
 var f1 = FuncA;
 var f2 = f1();
 f2();
