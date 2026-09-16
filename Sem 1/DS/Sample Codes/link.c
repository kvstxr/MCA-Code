//Write a Code in C to do Linked List 
//Take no of elements and print them

#include <stdio.h>

struct Node { //Here is 1 NODE Structure
    int data;
    struct Node* next;
};

void printList(struct Node* n) { //Function that will print the while Linked list given the head pointer
    while (n != NULL) {
        printf("%d ", n->data);
        n = n->next;
    }
    printf("\n");
}

int main() {
    struct Node* head = NULL;// What is the user of this line? It initializes the head pointer to NULL, indicating that the linked list is empty.
    struct Node* second = NULL;
    struct Node* third = NULL;
    int n, i, value;

    printf("Enter the number of elements: ");
    scanf("%d", &n);

    // Allocate memory for nodes
    head = (struct Node*)malloc(sizeof(struct Node));
    second = (struct Node*)malloc(sizeof(struct Node));
    third = (struct Node*)malloc(sizeof(struct Node));

    // Input values for the linked list
    printf("Enter the elements:\n");
    for (i = 0; i < n; i++) {
        scanf("%d", &value);
        if (i == 0) {
            head->data = value;
            head->next = second;
        } else if (i == 1) {
            second->data = value;
            second->next = third;
        } else if (i == 2) {
            third->data = value;
            third->next = NULL;
        }
    }
    printf("The linked list is: ");

    printList(head);
    free(head);
    free(second);
    free(third);

    return 0;
}


/*Algorithm

struct Node:
    int data
    struct Node* next

main():
    Start
    Declare head, second, third as Node pointers
    Declare int n, i, value
    Read n
    (head,second,third) = (struct Node*)malloc(sizeof(struct Node))
    for i = 0 to n-1
        Read value
        if i == 0
            head->data = value
            head->next = second
        else if i == 1
            second->data = value
            second->next = third
        else if i == 2
            third->data = value
            third->next = NULL
    Call printList(head)
    Free (head, second, third)
    Stop

*/

/*Output:
Enter the elements:
1
2
3
The linked list is: 1 2 3 
*/