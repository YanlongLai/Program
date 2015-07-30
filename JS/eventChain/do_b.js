var event = require( './event' );
 
 module.exports = function(){
     event.on( 'do_a', function(){
         console.log( '呼叫 do_b' );
         event.emit( 'do_b' );
     });
 };
