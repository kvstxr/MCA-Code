//Simple linked list in C

#include <stdio.h>
#include <stdlib.h>

struct Node {
    int data; //Data Storage of node in int
    struct Node *next; //Pointer to the next node with (Struct node type)
};

/*
struct student {
    int rollno;
    char name[20];
};
*/


int main() {
    struct Node *head, *newNode; //Head and Newnode structure declared
    //struct student s1;


    head = malloc(sizeof(struct Node)); //head gets memory of newNode that was declared above


    head->data = 10; //Data of the current declared node is set to 10 (head->data = 10 == s1.rollno = 10)
    head->next = NULL; //Next pointer of the current node is set to NULL{means its just Blank} (head->next = NULL == s1.name = NULL)

    printf("%d", head->data); //print the data from the current node whos address is stored inside the head (aka (*head.data))

    return 0;//ending
}

/*Algorithm

struct Node:
    int data
    struct Node* next

main():
    Start
    Declare head, newNode as Node pointers
    head = (struct Node*)malloc(sizeof(struct Node))
    head->data = 10
    head->next = NULL
    Print head->data
    Stop
*/