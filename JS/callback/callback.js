function basic( callback ){
    console.log( '作些事情' );

    var result = '我是等會要被傳送給 `do something` 的 callback 的函式結果';

    // 如果 callback 存在的話就執行他
    callback && callback( result );
}
                
function callbacks_with_call( arg1, arg2, callback ){
    console.log( '作些事情' );

    var result1 = arg1.replace( 'argument', 'result' ),
        result2 = arg2.replace( 'argument', 'result' );

    this.data = '這等會可以讓 callback 函式用 `this` 來調用';

    // 如果 callback 存在的話就執行他
    callback && callback.call( this, result1, result2 );
}
                                    
// 這個和 `callbacks_with_call` 很相像
// 唯一不同點是將 `call` 換成了 `apply`
// 所以參數只能傳陣列
function callbacks_with_apply( arg1, arg2, callback ){
    console.log( '作些事情' );

    var result1 = arg1.replace( 'argument', 'result' ),
        result2 = arg2.replace( 'argument', 'result' );

    this.data = '這等會可以讓 callback 函式用 `this` 來調用';

    // 如果 callback 存在的話就執行他
    callback && callback.apply( this, [ result1, result2 ]);
}
                                                        
basic( function( result ){
    console.log( '這個 callback 函式會在 terminal 上列出 `basic` 函式執行的結果' );
    console.log( result );
});
                                                             
console.log( '--------------------------------------------------------------------------------------' );
 
( function(){
    var arg1 = '我是 argument1',
    arg2 = '我是 argument2';

callbacks_with_call( arg1, arg2, function( result1, result2 ){
    console.log( '這一個 callback 函式將會列出 `callbacks_with_call` 的執行結果' );
    console.log( 'result1: ' + result1 );
    console.log( 'result2: ' + result2 );
    console.log( 'data from `callbacks_with_call`: ' + this.data );
});
})();
                                                                                            
console.log( '--------------------------------------------------------------------------------------' );
 
( function(){
    var arg1 = '我是 argument1',
    arg2 = '我是 argument2';

callbacks_with_apply( arg1, arg2, function( result1, result2 ){
    console.log( '這一個 callback 函式將會列出 `callbacks_with_apply` 的執行結果' );
    console.log( 'result1: ' + result1 );
    console.log( 'result2: ' + result2 );
    console.log( 'data from `callbacks_with_apply`: ' + this.data );
});
})();
