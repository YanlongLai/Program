var event = require( './event' );
 
 module.exports = function(){
     event.on( 'do_c', function(){
         console.log( '呼叫 do_d' );
         event.emit( 'do_d' );
     });
 };
