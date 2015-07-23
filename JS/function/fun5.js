
function add(){
    var r = 0;
    for(var v in arguments){
        console.log("r=" + r + "+" +  Number(v));
        r += Number(v);
    }
    return r+" "+arguments.length;
}
 
 console.log(add(-3, 1, 2, 3)); //3
 console.log(add(1, 2, 3, 4, 5, 6)); //15
