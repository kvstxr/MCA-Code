// To implement the following operations on a singly linked list
// i. Creation,
// ii. Insert a new node at front
// iii. Insert an element after a particular node
// iv. Insert a new node at end
// v. Searching
// vi. Traversal.


int main() {
    int choice, data, key;
    struct Node* head = NULL;

    while (1) {
        printf("\nMenu:\n");
        printf("1. Create List\n");
        printf("2. Insert at Front\n");
        printf("3. Insert After a Node\n");
        printf("4. Insert at End\n");
        printf("5. Search\n");
        printf("6. Traverse\n");
        printf("7. Exit\n");
        printf("Enter your choice: ");
        scanf("%d", &choice);

        switch (choice) {
            case 1:
                // Code to create list
                break;
            case 2:
                // Code to insert at front
                break;
            case 3:
                // Code to insert after a node
                break;
            case 4:
                // Code to insert at end
                break;
            case 5:
                // Code to search
                break;
            case 6:
                // Code to traverse
                break;
            case 7:
                exit(0);
            default:
                printf("Invalid choice! Please try again.\n");
        }
    }

    return 0;
}