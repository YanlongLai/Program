#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
#include <string>
using namespace std;
int prime(int n);
int rec(int N, int K);
vector <int> pvec;
vector <bool> vec3;
    int ans = 0;

int main() {
    vector <string> vec1;
    vector <string> vec2;
    vector <long int> result;
    //vector <long int> row;
    int T;
    /* int M; */
    int N;
    int K;
    int line = 0;
    int num = 0;
    cin>>T;
    string put1;
    //string ans;
    for(int i=2;i<1012;i++)
    prime(i);
        //cout<<"1012"<<endl;
    //for(int i=0;i<pvec.size();i++)
    //for(int i=0;i<20;i++)
        //cout<<pvec[i]<<endl;
    //cout<<N<<endl;
    while(line < T){
        /* cin>>M; */
        cin>>N>>K;
        //cin>>K;
        num = 0;
        //for(int i=0; i<K; i++){
        /*
        if(K>=N){
            vec3.push_back(0);
            break;
        }*/
        
        //else{
        ans=0;
        rec(N, K);
        //cout << "***ans*** = " << ans <<endl;
        if(ans==1)
            vec3.push_back(1);
        else
            vec3.push_back(0);

        //}
        line++;
    }
    for(int i=0; i<vec3.size() ;i++){
        if(vec3[i]==1)
            cout<<"Yes"<<endl;
        else
            cout<<"No"<<endl;
    }
    return 0;
}

int prime(int n)
{
    int num = 0;
    bool prime=false;
    if(n==2)
    pvec.push_back(n);
    for(int i=2;i<n ;i++){
        if(n%i==0){
            prime=false;
            break;
        }
        else{
            prime=true;
        }
    }
    if(prime)
    pvec.push_back(n);

    return prime;
}
int rec(int N, int K){
    if(K==1){
        for(int i=0; i<pvec.size() && i<= N;i++){
            if(N - pvec[i]==0)
                ans = 1;
            //cout << N << "%" << pvec[i] <<", ans="<< ans<< endl;
        }
    }
    else{
        for(int i=0; i<pvec.size() && i< N;i++){
            if(N - pvec[i] > 0){
                rec(N - pvec[i], K - 1);
                //cout<<"rec("<<N-pvec[i]<<", "<< K - 1<<")"<<endl;
            }
        }
    }
    return ans;
}
