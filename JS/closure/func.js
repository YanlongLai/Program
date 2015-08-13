var a =  function(i){
    //for(var j=0 ; j<i ; j++ ){
    tmp ="";
    return function(num){
        tmp = tmp +" "+ num;
        console.log(tmp);
        }(i);
    //}
};
a(10);
a();
a(20);
