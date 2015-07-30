#include <iostream>
#include <string>
#include <cstdlib>

using namespace std;

int main() {
  string s = "123";
  double n = atof(s.c_str());
  //int n = atoi(s.c_str());
  
  cout << n << endl;
}
