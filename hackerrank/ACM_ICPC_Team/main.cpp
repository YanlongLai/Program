#include <cmath>
#include <cstdio>
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
    //char A[N][M+1];

    vector <string> vec1;
    int lineNum = 0;
    string put;
    while(lineNum < N){
        cin >> put;
        vec1.push_back(put);
        lineNum++;
    }
    /* for(int i = 0 ; i<vec1.size() ; i++){ */
    /*     cout<<vec1[i]<<endl; */
    /* } */


    /* int i=0; */
    /* while(true){ */
    /*     if (i==N) { */
    /*         break; */
    /*     } */
    /*     //cout<<line<<endl; */
    /*     // some code */
    /*     getline(cin, line); */
    /*     //cout<<line<<endl; */
    /*     strcpy(A[i], line.c_str()); */
    /*     //A[i][M+1]='\0'; */
    /*     //cout<<A[i]<<endl; */
    /*     line=""; */
    /*     i++; */
    /* } */
 /* //       cout<<A[0]<<endl; */

    int score[N*M];
    int count=0;
    int runs=0;
    for(int i=0;i < N;i++){
        for(int j=0;j < N ;j++){
            for(int k=0;k < M;k++){
            if(vec1[i][k]=='1' || vec1[j][k]=='1')
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
        runs++;
        }
        //cout<<endl;
    }
    int match=0;
    for(int i=0; i< N*N; i++)
    if(score[i]==max)
    match++;
    cout<<max<<endl;
    cout<<match/2<<endl;

    return 0;
}

