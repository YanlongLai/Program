function MyObject(name, message) {
    this.name = name.toString();
    this.message = message.toString();
}
(function() {
    this.getName = function() {
        return this.name;
    };
    this.getMessage = function() {
        return this.message;
    };
}).call(MyObject.prototype);

var objA = new MyObject("John", "1001");
var objB = new MyObject("Mary", "1002");
console.log(objA.getMessage());
console.log(objB.getMessage());
