function do_a(){
    // 模擬一個需要長間的 function
    setTimeout( function(){
        console.log( '`do_a`: 這個需要的時間比 `do_b` 長' );
    }, 1000 );
}
           
function do_b(){
    console.log( '`do_b`: 這本來應該出現在 `do_a` 之後但是卻先出現了' );
}
do_a();
do_b();
