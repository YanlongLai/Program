var x = 10;
var obj = {
    x: 20,
    f: function(){ console.log(this.x); }
};

obj.f(); // (1)

var fOut = obj.f;
fOut(); //(2)

var obj2 = {
    x: 30,
    f: obj.f
}

obj2.f(); // (3)
