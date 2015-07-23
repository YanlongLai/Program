function Computer(){
}
 
Computer.prototype.powerOn = function(){
    console.log('Power on!');
}
  
Computer.prototype.powerOff = function(){
    console.log('Power off!');
}
   
function Notebook(){
}
    
Notebook.prototype = new Computer(); //繼承了Computer
 
 Notebook.prototype.powerOn = function(useBattery){
     if(useBattery){
         console.log('Notebook power on with battery!');
     }else{
         console.log('Notebook power on!');
     }
 }
  
  var o = new Notebook();
  o.powerOn(true); //Notebook power on with battery!
  o.powerOn(false); //Notebook power on!
  o.powerOn(); //Power on!
  o.powerOff(); //Power off!
