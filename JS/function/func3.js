function MyFunction(){
        return 0;
}
 
 var invokedAsFunction = MyFunction();
 var invokedAsConstructor = new MyFunction();
  
  console.log(typeof invokedAsFunction); //number
  console.log(invokedAsFunction); //0
  console.log(typeof invokedAsConstructor); //object
