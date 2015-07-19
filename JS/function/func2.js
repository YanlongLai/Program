var add = new Function('a', 'b', 'return a + b');
for(var i = 1 ; i<= 9; i++)
console.log(add(i, i+3));
