#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
#include <string>
using namespace std;

void printArray(int p[], int n, int &con)
{

        for (int i = 0; i < n; i++){
            if(p[i]!=2 && p[i]!=3 && p[i]!=7 )
                return;
        }
    
    
    
    int num=0;
    for (int i = 0; i < n; i++){
        cout << p[i] << " ";
        if(p[i]==2 || p[i]==3 || p[i]==7)
            num++;
    }
    if(num == n)
        con++;
    cout << endl;
    
}

void printAllUniqueParts(int n, int &con)
{
    int p[n];
    int k = 0;
    p[k] = n;
    while (true)
    {
        printArray(p, k + 1, con);
        int rem_val = 0;
        while (k >= 0 && p[k] == 1)
        {
            rem_val += p[k];
            k--;
        }
        if (k < 0)
            return;
        p[k]--;
        rem_val++;
        while (rem_val > p[k])
        {
            p[k+1] = p[k];
            rem_val = rem_val - p[k];
            k++;
        }
        p[k+1] = rem_val;
        k++;
    }
}


int main() {
    int value;
    int con=0;
    //while(1)
    //{
        //cout<<"Enter an Integer(0 to exit): ";
        cin>>value;
        //if (value == 0)
            //break;
        //cout << "All Unique Partitions of "<<value<<endl;
        printAllUniqueParts(value, con);
        cout<<con<<endl;
    //}
    return 0;
 }
