var first_object = { 
    num: 42 
}; 
var second_object = { 
    num: 24 
}; 
                 
function multiply(mult) { 
    console.log( this.num+ "*"+ mult + "="+this.num * mult); 
} 
                           
multiply.call(first_object, 5); // returns 42 * 5 
multiply.call(second_object, 5); // returns 24 * 5 

multiply.apply(first_object, [5]); // returns 42 * 5 
multiply.apply(second_object, [5]); // returns 24 * 5 
