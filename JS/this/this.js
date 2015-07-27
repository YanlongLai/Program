var obj = {
    x: 20,
    f: function(){ console.log(this.x); }
};

obj.f(); //由於調用f函式時，點前面物件為obj，故f內的this指向obj，則輸出為20。

obj.innerobj = {
    x: 30,
    f: function(){ console.log(this.x); }
};

obj.innerobj.f(); //由於調用f函式時，點前面物件為obj.innerobj，故f內的this指向obj.innerobj，則輸出為30。
