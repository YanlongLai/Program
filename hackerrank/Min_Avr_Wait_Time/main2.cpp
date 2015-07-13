#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
#include <string>
using namespace std;


int main() {
    vector <long int> vec1;
    vector <long int> vec2;
    vector <long int> result;
    int N;
    int line = 0;
    cin>>N;
    //cout<<N<<endl;
    while(line < N){
        int put1;
        int put2;
        //cin.ignore();
        //cin >> noskipws >> put;
        cin >> put1 >> put2;
        vec1.push_back(put1);
        vec2.push_back(put2);
        /* cout<<vec1[line]<<endl; */
        /* cout<<vec2[line]<<endl; */
        line++;
    }
    long int time=0;
    long int wtime=0;
    long int temp;
    for(int i = 0; i< N ; i++){
    for(int j = 0; j< N ; j++){
        //if(vec1[i]<vec1[j]){
        //if((vec2[i]*N - vec1[i])<(vec2[j]*N - vec1[j])){
        temp=vec2[i];
        vec2[i]=vec2[j];
        vec2[j]=temp;
        temp=vec1[i];
        vec1[i]=vec1[j];
        vec1[j]=temp;

        //compare run and compute time
        for(int k = 0; k< N ; k++){
            if(k==0){
                wtime=vec2[k];
                time=vec1[k]+vec2[k];
                cout<<k<<" time "<<time<<", wtime "<<wtime<<endl;
            }
            else{
                //normal
                //廚師等人
                if(vec1[k]>time){
                wtime+=vec2[k];
                time=vec1[k]+vec2[k];
                cout<<k<<" time "<<time<<", wtime "<<wtime<<endl;
                }
                //人等廚師
                else{
                wtime+=(time-vec1[k])+vec2[k];
                time = time+vec2[k];
                cout<<k<<" time "<<time<<", wtime "<<wtime<<endl;
                }
            }
        }
        result.push_back(wtime/N);
        time=0;
        wtime=0;
        //
        //}
    }
    }
    long int min=0;
    for(int i=0; i < result.size() ; i++){
        //cout<<i<<" : "<<result[i]<<endl;
        if(i==0)
            min = result[i];
        if(result[i]<min)
            min = result[i];
    }
    cout<<min<<endl;
    //for(int i = 0; i< N ; i++)
    //    cout<<' '<<vec2[i];
    /*
    for(int i = 0; i<= N ; i++){
        //time+=vec2[i]*(N-i);
        //dtime+=vec1[i];
        //if(vec2[i]*())
        //time+=vec2[i]*(N-i);
        if(i==0){
                time+=vec2[i];
        }
        else{
            if(time < vec1[i])
            time+=(-vec1[i])+vec2[i];
            else
            time+=vec2[i];

        }

        
    }
    //cout<< (time-dtime)/N << endl;
    cout<< time/N << endl;

    */
    return 0;
}

