#include "Rectangle.h"

class Cubic : public Rectangle { 
    public: 
        Cubic() { 
            _z = 0; 
            _length = 0; 
        } 

        Cubic(int x, int y, int z, int length, int width, int height) 
            : Rectangle(x, y, width, height) , _z(z), _length(length) { 
            } 

        int length() { return _length; } 
        int volumn() { return _length*_width*_height; } 

    protected: 
        int _z; 
        int _length; 
};
