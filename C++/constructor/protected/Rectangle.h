class Rectangle { 
    public: 
        Rectangle() { 
            _x = 0;
            _y = 0; 
            _width = 0;
            _height = 0; 
        } 

        Rectangle(int x, int y, int width, int height)
            : _x(x), _y(y), _width(width), _height(height){ 
            } 

        int x() { return _x; } 
        int y() { return _y; } 
        int width() { return _width; } 
        int height() { return _height; } 
        int area() { return _width*_height; } 

        // 受保護的member 
    protected: 
        int _x;
        int _y; 
        int _width;
        int _height; 
}; 
