#include <iostream> 
using namespace std; 
int main(int argc, char *argv[]) { 
    for(int i = 1; i < argc; i++) { 
        char *arg = argv[i]; 

        switch(arg[0]) { 
            case '-': 
                // 處理參數，設定執行選項，例如-o、-p、-r等等 
                cout << "處理參數" << endl;
            default: 
                // 執行對應功能
                cout << "一般" << endl;
        }
        switch(arg[1]) { 
            case 'o': 
                // 選項o的處理 
                cout << "o" << endl;
                break; 
            case 'p': 
                // 選項p的處理 
                cout << "p" << endl;
                break; 
            case 'r': 
                // 選項r的處理 
                cout << "r" << endl;
                break; 
            default: 
                // 選項錯誤處理或其它處理 
                cout << "default" << endl;
        }
    }
}
