//Menu Driven Program to perform following array operations:
//a) Insert an element to a perticular location
//b) Delete an element from a perticular location
//c) Traverse



int main() {
    int arr[50], n, ch, i, pos, element;

    printf("Enter the Array Size: ");
    scanf("%d", &n);

    printf("Enter %d elements:\n", n);
    for (i = 0; i < n; i++) {
        scanf("%d", &arr[i]);
    }

    do {
        printf("\nMenu:\n");
        printf("1. Insert an element at a particular location\n");
        printf("2. Delete an element from a particular location\n");
        printf("3. Traverse the array\n");
        printf("4. Exit\n");
        printf("Enter your choice: ");
        scanf("%d", &ch);

        switch (ch) {
            case 1:
                printf("Enter the position to insert (0 to %d): ", n);
                scanf("%d", &pos);
                if (pos < 0 || pos > n) {
                    printf("Invalid position!\n");
                    break;
                }
                printf("Enter the element to insert: ");
                scanf("%d", &element);
                for (i = n; i > pos; i--) {
                    arr[i] = arr[i - 1];
                }
                arr[pos] = element;
                n++;
                break;

            case 2:
                printf("Enter the position to delete (0 to %d): ", n - 1);
                scanf("%d", &pos);
                if (pos < 0 || pos >= n) {
                    printf("Invalid position!\n");
                    break;
                }
                for (i = pos; i < n - 1; i++) {
                    arr[i] = arr[i + 1];
                }
                n--;
                break;

            case 3:
                printf("Array elements are:\n");
                for (i = 0; i < n; i++) {
                    printf("%d ", arr[i]);
                }
                printf("\n");
                break;

            case 4:
                printf("Exiting...\n");
                break;

            default:
                printf("Invalid choice! Please try again.\n");
        }
    } while (ch != 4);
    return 0;
}

/*Algorithm

main():
    1.Start
    2.Declare variables arr, n, ch, i, pos, element
    3.Read the array size from user
    4.Read the elements of the array from user
    5.Display the menu
    6.Read the choice from user
        if choice is 1: call insert() to insert an element at a particular location
        if choice is 2: call delete() to delete an element from a particular location
        if choice is 3: call traverse() to display the array elements
        if choice is 4: exit the program
    7.Repeat steps 5 and 6 until user chooses to exit
    8.Stop

insert(int arr[], int *n, int pos, int element):
    1.Start
    2.Check if the position is valid (0 to *n)
    3.If valid, shift all elements to the right of the position by one place
    4.Insert the new element at the specified position
    5.Increment the array size by one
    6.Stop

delete(int arr[], int *n, int pos):
    1.Start
    2.Check if the position is valid (0 to *n - 1)
    3.If valid, shift all elements to the left of the position by one place
    4.Decrement the array size by one
    5.Stop

traverse(int arr[], int n):
    1.Start
    2.Print all elements of the array
    3.Stop

*/
/*
Output:
*/