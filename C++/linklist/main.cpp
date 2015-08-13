#include <iostream>
struct listNode{
    int data;
    listNode* next;
};
int main(){
    listNode A[9];
    listNode* temp = NULL;
    listNode* head = NULL;
    for(int i=0; i<10 ; i++){
        A[i].data = i;
        if(i!=9)
        A[i].next = &A[i+1];
        //else
        //A[i].next = NULL;
    }
    for(int i=0; i<10 ; i++)
        std::cout<<A[i].data<<std::endl;

        std::cout<<"Inverse"<<std::endl;
    head = &A[0];
    int i = 0;
    while(i!=9){
        temp = head;
        head = head->next;
        head->next = temp;

        //std::cout<<head->data<<head->next->data<<std::endl;
        std::cout<<A[i].data<<std::endl;
        i++;
    }
}
