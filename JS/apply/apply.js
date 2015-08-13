function apply01(arg){
    console.log(this+" "+arg);
    }
apply01();
apply01.apply("New Object here!", [100, 200]);
