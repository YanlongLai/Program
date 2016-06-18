var funA = function(){
    setTimeout(function(){ console.log("Run A in 1000ms"); }, 1000);
};
var funB = function(){
    setTimeout(function(){ console.log("Run B in 2000ms"); }, 2000);
};
var funC = function(){
    setTimeout(function(){ console.log("Run C in 3000ms"); }, 3000);
};

// funA();
// funB();
// funC();

// //AJAX B response 1000ms
// setTimeout(function()  { funB();}, 100);

// //AJAX A response 2000ms
// setTimeout(function()  { funA();}, 200);

// //AJAX C response 3000ms
// setTimeout(function()  { funC();}, 300);


var mutiVar = (function(){
    return{
        funA: function(){
                setTimeout(function(){ console.log("Run A in 1000ms"); }, 1000);
            },
        funB: function(){
                setTimeout(function(){ console.log("Run B in 2000ms"); }, 2000);
            },
        funC: function(){
                setTimeout(function(){ console.log("Run C in 3000ms"); }, 3000);
            }
        }
    });

mut1 = mutiVar();

mut1.funA();
mut1.funB();
mut1.funC();

//AJAX B response 1000ms
/*
setTimeout(function()  {
    funB();
    
    //AJAX A response 2000ms
    setTimeout(function()  {
        funA();

        //AJAX C response 3000ms
        setTimeout(function()  {funC();}, 300);

    }, 200);
    
}, 100);
*/

console.log("I am last, but I will first!");
