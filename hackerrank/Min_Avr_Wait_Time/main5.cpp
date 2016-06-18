#include <cmath>
#include <cstdio>
#include <vector>
#include <deque>
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
    deque<client> clients;
    deque<client> comingClients;
    deque<client> vipClients;
    deque<client> normalClients;
    // vector<client> result;
    // vector <long int> result;

    // INPUT
    long int N;
    long int line = 0;
    long int time=0;
    long int wtime=0;
    bool isCliensAllIn = false;
    bool isNonSort = false;
    bool isDirty = false;
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
            int firstClientComingTime = clients[0].comingTime;
            for(int j = 0; j< clients.size() ; j++) {
                if(clients[j].comingTime <= firstClientComingTime) {
                    // clients[j].complete = 1;
                    comingClients.push_back(clients[j]);
                    clients.erase(clients.begin() + j);
                    j--;
                    // noncomingClients.erase(myvector.begin()+j);
                }
                else {
                    break;
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

            wtime = comingClients[0].cookingTime;
            // cout << comingClients[0].comingTime  <<  " " << comingClients[0].cookingTime << " " << comingClients[0].complete << endl;

            // Pop First Client
            // comingClients[0].complete = 1;
            // result.push_back(comingClients[0]);
            comingClients.pop_front();
        }
        // 1~N-2
        else {
            // isNewClientComing: isNewClientComing
            // bool isNewClientComing = false;
            // int comingCleints = 0;
            // update comingClients
            // int noncomingClients_size = noncomingClients.size();

            //If no clients coming so break the loop
            if(clients.size()==0) {
                isCliensAllIn = true;
                break;
            }

            // all VipClient cooktime less than the comingClients[0]
            for(int j = 0; j< clients.size() ; j++) {
                if(clients[j].comingTime <= time) {
                    if(clients[j].cookingTime <= comingClients[0].cookingTime)
                    {
                        vipClients.push_back(clients[j]);
                        clients.erase(clients.begin() + j);
                        j--;
                        // cout<< "!!!"<<endl;
                    }
                }
                else {
                    break;
                }
            }
            if(vipClients.size() > 1) {
                sort(vipClients.begin(), vipClients.end(), by_cookingTime());
            }

            if(vipClients.size() >= 1) {
                time += vipClients[0].cookingTime;
                wtime += time - vipClients[0].comingTime;
            }

            if(vipClients.size() > 1) {
                comingClients.insert(comingClients.begin(), vipClients.begin()+1, vipClients.end());
            }

            vipClients.clear();

            for(int j = 0; j< clients.size() ; j++) {
                if(clients[j].comingTime <= time) {
                    // cout << clients[j].comingTime  <<  " " << clients[j].cookingTime <<  endl;
                    // if ( clients[j].complete == 0 ) {
                        // clients[j].complete = 1;

                    // comingClients.push_back(clients[j]);
                    normalClients.push_back(clients[j]);
                    clients.erase(clients.begin() + j);
                    j--;

                    // isDirty = true;

                        // comingCleints++;
                    // }
                    // noncomingClients.erase(noncomingClients.begin()+j);
                }
                else {
                    break;
                }
            }

            if(normalClients.size()>0) {
                int normalClientsNum = normalClients.size();
                sort(normalClients.begin(), normalClients.end(), by_cookingTime());
                comingClients.insert(comingClients.begin(), normalClients.begin(), normalClients.end());
                inplace_merge(comingClients.begin(), comingClients.begin() + normalClientsNum, comingClients.end(), by_cookingTime());
            }
            normalClients.clear();

            // cout << i << ": " << comingCleints <<endl;
            // solve the free no clients
            if(comingClients.size()==0) {
                // for(int j = 0; j< clients.size() ; j++) {
                    // if(clients[j].complete == 0) {
                        // clients[j].complete = 1;
                        comingClients.push_back(clients[0]);
                        clients.pop_front();
                        time = comingClients[0].comingTime + comingClients[0].cookingTime;
                    // }
                // }
            }
            else {
                // Sort by cookingTime
                // if(isDirty)
                // sort(comingClients.begin(), comingClients.end(), by_cookingTime());
                // cout<< i<<": "<< isNewClientComing<< endl;
                // New time line
                time += comingClients[0].cookingTime;
            }
            wtime += time - comingClients[0].comingTime;

            // cout << comingClients[0].comingTime  <<  " " << comingClients[0].cookingTime << endl;

            // Pop the small cooking time client
            // result.push_back(comingClients[0]);
            comingClients.pop_front();

            // cout <<"#"<< i<< ":"<<endl;


        }
    }

    // Solve specail case: all clients have come in store
    if(isCliensAllIn)
    for(int j = 0; j< comingClients.size() ; j++) {
        time += comingClients[j].cookingTime;
        wtime += time - comingClients[j].comingTime;
    }

    // for(int i = 0; i< result.size() ; i++) {
    //     cout << result[i].comingTime  <<  " " << result[i].cookingTime << " " << result[i].complete << endl;
    //     if(i==0) {
    //         wtime = result[0].cookingTime;
    //         time = result[0].comingTime + result[0].cookingTime;
    //         // cout << wtime << endl;
    //     }
    //     else {
    //         time += result[i].cookingTime;
    //         wtime += time - result[i].comingTime;
    //         // cout << time - result[i].comingTime << endl;
    //     }
    // }
    cout << wtime/N << endl;

    return 0;
}

