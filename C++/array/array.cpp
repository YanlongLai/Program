#include <iostream> 
using namespace std; 
//#define row 10

int main() { 
    const int row = 5;
    const int column = 10;
    int iarr[row][column]; 

    for(int i = 0; i < row; i++) 
        for(int j = 0; j < column; j++) 
            iarr[i][j] = (i+1) * (j+1); 

    for(int i = 0; i < row; i++) { 
        for(int j = 0; j < column; j++) 
            cout << iarr[i][j] << "\t"; 
        cout << endl; 
    } 
    //row = 10;
    return 0; 
}
