#include <iostream>
 
class Demo {
    public:
        Demo() {
            std::cout << "constructor called.." << std::endl;
            count++;
        }

        static int getCount() {
            return count;
        }

    private:
        static int count;
};
 
int Demo::count = 0;
 
int main(void) {
    Demo d1;
    std::cout << Demo::getCount() << std::endl;
    Demo d2;
    std::cout << d2.getCount() << std::endl;
    Demo d3;
    std::cout << d3.getCount() << std::endl;

    return 0;
}
