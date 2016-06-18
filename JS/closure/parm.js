var parm = 1
var test = function(){
    parm = 20;
    }
/*
var test = (function(){
    parm = 10;
    })();
*/
test();
console.log(parm);
