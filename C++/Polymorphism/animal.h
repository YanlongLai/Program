#include <iostream>
using namespace std;
class animal{
    public:
        animal(){
            foot();
        }
        void foot(){
            cout<<"I have foots"<<endl;
        }
    private:
        static int number;
};
class dog: animal{
    public:
        dog(){
            cout<<"I am a dog"<<endl;
        }
        ~dog(){
            cout<<"A dog is gone"<<endl;
        }
};
class cat: animal{
    public:
        cat(){
            cout<<"I am a cat"<<endl;
        }
        ~cat(){
            cout<<"A cat is gone"<<endl;
        }
};
