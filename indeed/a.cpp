#include <cmath>
#include <cstdio>
#include <cstdlib>
#include <iostream>
#include <algorithm> 
#include <vector>
#include <string>
using namespace std;
    vector<string> S;
    vector<string> S2;

int main()
{
    // get a integer
    int N;
    cin >> N;
    // get two integers separated with half-width break
    string input;
    //S.resize(N);
    cin >> input;
    S.push_back(input);
    S2.push_back(input);
    /*
    for(int i=0; i<S.size(); i++){
    cout << S[i];
    }
    */
    //cin >> S;
    
    int M;
    cin >> M;

    int lineNum = 0;
    long int Li, Ri, Ki;
    //vector <long int> L;
    //vector <long int> R;
    //vector <long int> K;
    while(lineNum < M){
        cin >> Li >> Ri >> Ki;
        //while(Ki!=0){
        //rotate(S.begin(), S.begin()+Li-1, S.begin()+Ri-1);
        //cout << Li << " " << Ri << endl;
        //--Ki;
        //}
    int dis = Ri - Li + 1;
    for(int i=Li-1; i<=Ri-1; i++){
        int index = 0;
        int last = Ri - 1 - Ki + 1;
        if(i - Ki < Li-1){
            //S[i] = S2[i - Ki + dis];
            index = i - Ki +dis;
        }
        else{
            //S[i] = S2[i - Ki];
            index = i - Ki;
        }
        S[i] = S2[index];
        /*
        while(last<0){
            last += Ki - Ri + 1; 
        }
        S[i] = S2[last];
        */
        //cout << i << " "<< (i -Ki) << endl;
        //cout << i << " "<< index << endl;
        //cout << S[i] << " "<< S2[index] << endl;
        //index++;
    //cout << S[i] << endl;
    }
        //L.push_back(Li);
        //R.push_back(Ri);
        //K.push_back(Ki);
        lineNum++;
    }
    for(int i=0; i<S.size(); i++){
    cout << S[i] << endl;
    }
    /*
    cin >> b >> c;
    // get a string
    string s;
    cin >> s;
    // output
    cout << (a+b+c) << " " << s << endl;
    */
    return 0;
}
