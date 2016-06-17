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
    int complete;
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
    vector<client> result;
    // vector <long int> result;
    // INPUT
    long int N;
    long int line = 0;
    long int time=0;
    long int wtime=0;
    cin>>N;
    while(line < N){
        client p;
        cin >> p.comingTime >> p.cookingTime;
        p.complete = 0;
        clients.push_back(p);
        line++;
    }
    // Sort Vector
    sort(clients.begin(), clients.end(), by_comingTime());

    // Set noncomingClients
    // noncomingClients = clients;

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
                    clients[j].complete = 1;
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

            // // compute waiting time
            // wtime = comingClients[0].cookingTime * comingClients.size();

            // Edit time line
            time = comingClients[0].comingTime + comingClients[0].cookingTime;

            // Pop First Client
            // comingClients[0].complete = 1;
            result.push_back(comingClients[0]);
            comingClients.erase(comingClients.begin());
        }
        // 1~N-2
        else {
            // update comingClients
            // int noncomingClients_size = noncomingClients.size();
            for(int j = 0; j< N ; j++) {
                if(clients[j].comingTime <= time && clients[j].complete == 0) {
                    clients[j].complete = 1;
                    comingClients.push_back(clients[j]);
                    // cout << clients[j].comingTime  <<  " " << clients[j].cookingTime << " " << clients[j].complete << endl;
                    // noncomingClients.erase(noncomingClients.begin()+j);
                }
            }

            // Sort by cookingTime
            sort(comingClients.begin(), comingClients.end(), by_cookingTime());

            // New time line
            time += comingClients[0].cookingTime;

            // Pop the small cooking time client
            result.push_back(comingClients[0]);
            comingClients.erase(comingClients.begin());

            // cout <<"#"<< i<< ":"<<endl;


        }
    }

    for(int i = 0; i< result.size() ; i++) {
        cout << result[i].comingTime  <<  " " << result[i].cookingTime << " " << result[i].complete << endl;
        if(i==0) {
            wtime = result[i].cookingTime;
            time = result[i].comingTime + result[i].cookingTime;
            // cout << wtime << endl;
        }
        else {
            time += result[i].cookingTime;
            wtime += time - result[i].comingTime;
            // cout << time - result[i].comingTime << endl;
        }
    }
    cout << wtime/3 << endl;

    return 0;
}

