#include <iostream>
#include <string>

using namespace std;

using std::cin;
using std::cout;
using std::endl;
using std::getline;
using std::string;

int main(int argc, char *argv[]) {

    string line;
    int i=1;
    char lineArray[5][100];
    while (true) {
        getline(cin, line);
        if (line.empty()) {
            break;
        }
       strcpy(lineArray[i] ,line.c_str());
    cout<<line<<endl;
        // some code
        //cout >> line.c_str() >> endl;
        i++;
    }
    /*
    do{
    cout<<lineArray[i]<<endl;
    i++;
    }while(i<=6);
    */
    return 0;
}
