#include <iostream> 
#include <vector>
using namespace std; 

int main() { 
    int iarr[] = {1, 2, 3, 4, 5};

    vector<int> ivector(iarr + 0, iarr + 10);
    ivector.push_back(6);
    for(int i = 0; i < ivector.size(); i++) {
        cout << ivector[i] << " ";
    }
    cout << endl;

    return 0; 
}
