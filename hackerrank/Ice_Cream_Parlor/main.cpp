#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
#include <string>
using namespace std;


int main() {
    vector <string> vec1;
    vector <string> vec2;
    vector <long int> result;
    int T;
    int M;
    int N;
    int line = 0;
    cin>>T;
    string put1;
    string ans;
    //cout<<N<<endl;
    while(line < T){
        cin>>M;
        cin>>N;
        //cin.ignore();
        //cin >> noskipws >> put1;
        for(int i=0; i<N; i++){
        cin >> put1;
        vec1.push_back(put1);
        }
        /* cout<<vec1[line]<<endl; */
        /* cout<<vec2[line]<<endl; */

        //cout<<M<<endl;
        //cout<<N<<endl;
        for(int i=0; i<vec1.size(); i++){
            for(int j=0; j<vec1.size() && j!=i; j++){
                if(stoi(vec1[i])+stoi(vec1[j])==M){
                    if(j>i)
                    ans = to_string(i+1) + " " + to_string(j+1);
                    else
                    ans = to_string(j+1) + " " + to_string(i+1);
                    vec2.push_back(ans);
                    break;
                }

            }
        }
        //cout<<endl;

        vec1.clear();
        line++;
    }
        for(int i=0; i<vec2.size(); i++)
        cout<<vec2[i]<<endl;
    return 0;
}

