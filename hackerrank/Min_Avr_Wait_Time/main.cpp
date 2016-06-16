#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
#include <string>
using namespace std;

struct client {
    long int comingTime;
    long int cookingTime;
    // int complete;
};

struct by_comingTime {
    bool operator()(client const &a, client const &b) {
        return a.comingTime < b.comingTime;
    }
};

struct by_cookingTime {
    bool operator()(client const &a, client const &b) {
        return a.cookingTime < b.cookingTime;
    }
};

int main() {
    // set
    vector<client> clients;
    vector<client> comingClients;
    vector<client> noncomingClients;
    vector <long int> vec1;
    vector <long int> vec2;
    vector <long int> result;
    // INPUT
    long int N;
    long int line = 0;
    long int time=0;
    long int wtime=0;
    cin>>N;
    while(line < N){
        client p;
        cin >> p.comingTime >> p.cookingTime;
        // p.complete = 0;
        clients.push_back(p);
        line++;
    }
    // Sort Vector
    sort(clients.begin(), clients.end(), by_comingTime());

    // Set noncomingClients
    noncomingClients = clients;

    // TEST INPUT
    // for(int i = 0; i< N ; i++) {
    //     cout<<clients[i].comingTime<<" "<< clients[i].cookingTime<<endl;
    // }

    for(int i = 0; i< N ; i++) {
        // First coming
        if(i == 0){
            // Find coming clinets
            // Put comingClents
            for(int j = 0; j< N ; j++) {
                if(clients[j].comingTime <= clients[i].comingTime) {
                    comingClients.push_back(clients[j]);
                    // noncomingClients.erase(myvector.begin()+j);
                }
            }
            // Sort by cookingTime
            sort(comingClients.begin(), comingClients.end(), by_cookingTime());
            // TEST
            // for(int j = 0; j< comingClients.size() ; j++) {
            //     cout << comingClients[j].comingTime  <<  " " << comingClients[j].cookingTime << endl;
            // }

            // compute waiting time
            wtime = comingClients[0].cookingTime * comingClients.size();
            // Edit time line
            time = comingClients[0].comingTime + comingClients[0].cookingTime;
            // Pop First Client
            comingClients.erase (comingClients.begin());
        }
        // 1~N-2
        else if (i < N - 1){
            if(comingClients.size()!=0) {
                // update comingClients
                // int noncomingClients_size = noncomingClients.size();
                for(int j = 0; j< N ; j++) {
                    if(clients[j].comingTime <= time) {
                        comingClients.push_back(clients[j]);
                        // noncomingClients.erase(noncomingClients.begin()+j);
                    }
                }

                // Sort by cookingTime
                sort(comingClients.begin(), comingClients.end(), by_cookingTime());

                // New time line
                time += comingClients[0].cookingTime;

                for(int j = 0; j< comingClients.size() ; j++) {
                    wtime += time - comingClients[j].comingTime;
                    // update wait time
                    comingClients[j].comingTime = time;
                }
            }
            else {

            }
        }
        // Last: N-1
        else {
            // set now time = pre time + cooking time
            // time += vec2[i]
        }
    }


    // long int temp;
    // for(int i = 0; i< N ; i++) {
    // for(int j = 0; j< N ; j++) {
    //     // order from small to big on coming time
    //     if(vec1[i]<vec1[j]) {
    //         temp = vec1[i];
    //         vec1[i] = vec1[j];
    //         vec1[j] = temp;
    //         temp = vec2[i];
    //         vec2[i] = vec2[j];
    //         vec2[j] = temp;
    //     }
    // }
    // }



    return 0;
}

