var event, dos;
 
 event = require( './event' );
 todos = [ './do_d', './do_c', './do_b', './do_a' ];
  
 event.on( 'do_a', function(){
     console.log( '我可以在外部加入需要做的事情到 do_a 裡面' );
 });
   
event.on( 'do_b', function(){
    console.log( '我可以在外部加入需要做的事情到 do_b 裡面' );
});
    
event.on( 'do_c', function(){
    console.log( '我可以在外部加入需要做的事情到 do_c 裡面' );
});
     
event.on( 'do_d', function(){
    console.log( '我可以在外部加入需要做的事情到 do_d 裡面' );
});
      
todos.forEach( function( name ){
    require( name )();
});
