var a =function (num) {
    "use strict";
    return function(i){
         console.log(num+i);
    };
}(3);
a(5);
