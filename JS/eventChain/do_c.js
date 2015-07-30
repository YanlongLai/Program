var event = require( './event' );
 
 module.exports = function(){
     event.on( 'do_b', function(){
         console.log( '呼叫 do_c' );
         event.emit( 'do_c' );
     });
 };
