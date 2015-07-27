var x = 10;
var obj = {
    x: 20,
    f: function(){
        console.log(this.x);
        var foo = function(){ console.log(this.x); }
        foo(); // (2)
    }
};

obj.f();  // (1)
