var parm = 1;
var fun = function openBook(){
        /*
        for(var i = 0; i < 10; i++){
            parm++;
        }
        */
        return function(){
            for(var i = 0; i < 10; i++){
                parm++;
            }
        }
    };
//var value = fun();
fun();
console.log(parm);
