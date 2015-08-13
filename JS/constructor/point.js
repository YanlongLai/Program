function Point( x, y){
    "use strict";
    this.x = x;
    this.y = y;
}
var p = new Point(2, 2);
var p2 = new Point(3, 3);

Point.prototype.r =  function(){
    "use strict";
    console.log("console: " + Math.sqrt(
        this.x*this.x + 
        this.y*this.y
    ));
    return  "return: " + Math.sqrt(
        this.x*this.x + 
        this.y*this.y
    );
};

console.log(p.r());
console.log(p2.r());
p2 = p;
console.log(p2.r());
