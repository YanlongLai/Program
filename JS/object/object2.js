function MyObject(name, message) {
    this.name = name.toString();
    this.message = message.toString();
}
MyObject.prototype.getName = function() {
    return this.name;
};
MyObject.prototype.getMessage = function() {
    return this.message;
};
var objA = new MyObject("Tom", "1001");
console.log(objA.getMessage()+", "+ objA.getName() );
console.log(objA.getName);
