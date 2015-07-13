#include <iostream>
#include <string>
#include <vector>

using namespace std;
int main (){
    vector <string> vec1;
    vector <string> ::iterator it;
    //string str1;
    string put;
    int putline=0;
    int N, M;
    cin >> N >> M ;
    //int putline;
    while( putline < N){
        cin>>put;
        vec1.push_back(put);
        /* vec1.insert(put); */
        /* cout <<" input line: "<< putline <<endl; */
        ++putline;
    }
    /* for(int i=0 ; i< vec1.size(); i++){ */
    /*     cout<<vec1[i]<<endl; */
    /* } */

    it = vec1.begin();
    for(;it != vec1.end(); ++it)
        cout << ' '<< *it;
    cout << '\n';
    //cout << << '\n';
    //while(vec1.size())

    return 0;

}
