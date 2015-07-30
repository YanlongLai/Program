var event = require( './event' );
 
module.exports = function(){
    console.log( '呼叫 do_a' );
    event.emit( 'do_a' );
};
