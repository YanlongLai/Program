#include <cmath>
#include <cstdio>
#include <cstdlib>
#include <vector>
#include <iostream>
#include <algorithm>
#include <string>
using namespace std;


int main() {
    /* Enter your code here. Read input from STDIN. Print output to STDOUT */   
    int N, M;
    string line;
    cin>>N>>M;
    char A[N][M+1];
    //cin.ignore();
    int i=0;
    cin.getline(A[i][M+1],M+1);
    /*
    while(cin.getline(A[i],M+1)){
    //cin.ignore();
     cout<<i;   
        if (i<N) {
            break;
        }
    
        //cout<<line<<endl;
        // some code
        //getline(cin, line);
        //cout<<line<<endl;
        //cin.getline(A[i],M);
        //strcpy(A[i], line.c_str());
        A[i][M+1]='\0';
        cout<<A[i];
        //line="";
        i++;
    //cin.ignore();
    }
 //       cout<<A[0]<<endl;
    int score[N*M];
    int count=0;
    int runs=0;
    for(int i=0;i < N;i++){
        for(int j=0;j < N ;j++){
            for(int k=0;k < M;k++){
            if(A[i][k]!='0' || A[j][k]!='0')
            count++;
            }
            score[runs]=count;
            //cout<<i<<" and "<<j<<" is "<<score[runs]<<"\t";
            count=0;
            runs++;
        }
        //cout<<endl;
    }
    int max=0;
    runs=0;
    for(int i=0;i < N;i++){
        for(int j=0;j < N;j++){
            //cout<<i<<" and "<<j<<" is "<<score[i*M+j]<<"\t";
            if(score[runs]>max)
                max=score[runs];
        }
        runs++;
        //cout<<endl;
    }
    int match=0;
    for(int i=0; i< N*N; i++)
    if(score[i]==max)
    match++;
    //cout<<max<<endl;
    //cout<<match/2<<endl;
    */
    return 0;
}

