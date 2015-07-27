var obj = {
    x: 20,
    f: function(){ console.log(this.x); }
};

var obj2 = {
    x: 30
};

obj.f.call(obj2); //利用call指派f的this為指向obj2，故輸出為30
obj.f.apply(obj2); //利用call指派f的this為指向obj2，故輸出為30
