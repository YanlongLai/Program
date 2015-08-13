function tail(o){
    for(; o.next; o = o.next){
    console.log("1");
    }
}
var o = {x:1, y:2, z:3};
var a = [], i = 0;
for (a[i++] in o)
    console.log(a[i-1]+":"+o[a[i-1]]);
