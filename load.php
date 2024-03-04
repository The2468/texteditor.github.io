1. a. Write a C program to implement an array of fixed dimension. Perform the following 
operations inserting an element into an array and display the contents of an array. Note: user 
input is required to enter the size of an array. 
 
Program 
#include <stdio.h> 
int main()  
{    
    int n; 
    printf("Enter the size of the array:"); 
    scanf("%d",&n); 
    int arr[n]; 
     
    printf("Enter the %d values to store it in array: \n", n); 
    for(int i=0;i<n;i++) 
    { 
        scanf("%d",&arr[i]); 
    } 
    printf("The values stored in the array are: \n");     
    for(int i=0;i<n;i++) 
    { 
        printf("%d \n",arr[i]); 
    } 
 
} 
 
Sample Output 
Enter the size of the array: 4 
Enter the 4 values to store it in array: 1 
2 
3 
4 
The values stored in the array are: 
1 
2 
3 
4

1. b. Evaluate the Number Plates of Vehicles.
Write a C program to insert a vehicle registration number into an array of 1x10 array. The
objective is to apply strict conventional rules of vehicle number plate registration as follows:
The first two positions of array must be filled with state name, next two positions must be filled
with district code, followed by next two positions with serial number of characters and
penultimate with a number of a vehicle. KA-09-MN-3865. The program needs to verify the
registration of a vehicle in the same format and print the registration of a vehicle and “Accept”
else print “Reject” with a proper message.
Rules to check.
i. First two positions of an array must be a State Code.
ii. Next two positions of an array must be District Code.
iii. Next two Positions of an array must be a Serial Number of an RTO.
iv. Penultimate r positions of an array must be a vehicle number.
     
Program
#include <stdio.h>
#include <string.h>
#include <stdbool.h>
#include <ctype.h>
// Function to verify if a vehicle registration number is valid
bool verifyRegistration(char registration[])
{
    // Check if the registration number has exactly 10 characters
    if (strlen(registration) != 10)
    {
        return false;
    }
    // Check if the first two characters are alphabets (e.g., "KA" for Karnataka)
    for (int i = 0; i < 2; i++)
    {
        if(!isalpha(registration[i]))
        {
            return false;
        }
    }

    // Check if the next two characters are numbers (e.g., "09" for a specific district)
    for (int i = 2; i < 4; i++)
    {
        if (!isdigit(registration[i]))
        {
            return false;
        }
    }

    // Check if the next two characters are alphabets (e.g., "MN" for serial number)
    for (int i = 4; i < 6; i++)
    {
        if (!isalpha(registration[i]))
        {
            return false;
        }
    }
    // Check if the penultimate two characters are numbers (e.g., "3865" for vehicle number)
    for (int i = 6; i < 10; i++)
    {
        if (!isdigit(registration[i]))
        {
            return false;
        }
    }
    
    return true;
}

int main()
{
    char registration[11];
    printf("Enter a vehicle registration number: ");
    scanf("%s", registration);
    if (verifyRegistration(registration))
    {
        printf("Accept: Vehicle registration number is valid.\n");
    }
    else
    {
        printf("Reject: Vehicle registration number is invalid.\n");
    }
    
    return 0;

}

OUTPUT
Enter a vehicle registration number: KA09MN3569
Accept: Vehicle registration number is valid.

Enter a vehicle registration number: zjvcndz
Reject: Vehicle registration number is invalid.



2. a. Write a C program that multiplies two matrices, ensuring that the number of columns in 
the first matrix is equal to the number of rows in the second matrix. Display the resulting 
matrix. Note: Prompt user to enter the size of the matrix.

Program
#include<stdio.h>
int main() {
    int m, n, p, q;
 printf("Enter the number of rows and columns of the first matrix: ");
 scanf("%d %d", &m, &n);
 printf("Enter the number of rows and columns of the second matrix: ");
 scanf("%d %d", &p, &q);
 if (n != p) 
 {
    printf(" Matrix multiplication is not possible. Column of the first matrix must be equal to sthe row of the second matrix.\n ");
 return 1;
 }
 int firstMatrix[m][n], secondMatrix[p][q], resultMatrix[m][q];
 printf("Enter elements of the first matrix:\n");
 for (int i = 0; i < m; i++) {
 for (int j = 0; j < n; j++) {
 scanf("%d", &firstMatrix[i][j]);
 }
 }
 printf("Enter elements of the second matrix:\n");
 for (int i = 0; i < p; i++) {
 for (int j = 0; j < q; j++) {
 scanf("%d", &secondMatrix[i][j]);
 }
 }
 // Matrix multiplication
 for (int i = 0; i < m; i++) {
 for (int j = 0; j < q; j++) {
 resultMatrix[i][j] = 0;
 for (int k = 0; k < n; k++) 
 {
    resultMatrix[i][j] += firstMatrix[i][k] * secondMatrix[k][j];
 }
 }
 }
 printf("Resultant matrix after multiplication:\n");
 for (int i = 0; i < m; i++) {
 for (int j = 0; j < q; j++) {
 printf("%d ", resultMatrix[i][j]);
 }
 printf("\n");
 }
 return 0;
}

Output

Enter the number of rows and columns of the first matrix: 2
2
Enter the number of rows and columns of the second matrix: 2
2
Enter elements of the first matrix:
1
2
3
4
Enter elements of the second matrix:
5
6
7
8
Resultant matrix after multiplication:
19 22 
43 50 


3. a. A school wants to develop a student academic system to track student progress and 
generate reports for teachers and parents. The system should store the following information 
for each student: Student ID, Name, Grade, Subject, Marks. The system should also be able to 
do the following operations: 
i. Calculate the average marks for each student.
ii. Assign grades based on the average marks.
Conditions
i. Must use array of structures.
ii. Use simple structure variable to access the members of the structure.
ii. Enter marks for minimum of 5 students with subjects each.
  
Program
#include <stdio.h>
// Define the structure for a student
struct Student 
{
 int studentID;
 char name[50];
 char grade;
 float marks[5];
 float averageMarks;
};
// Function to calculate the average marks for a student
void calculateAverage(struct Student *student) 
{
 float totalMarks = 0.0;
 for (int i = 0; i < 5; i++) 
 {
 totalMarks += student->marks[i];
 }
 student->averageMarks = totalMarks / 5;
}
// Function to assign grades based on average marks
void assignGrades(struct Student *student) 
{
 if (student->averageMarks >= 90) 
 {
 student->grade = 'A';
 } 
 else if (student->averageMarks >= 80) 
 {
 student->grade = 'B';
 } 
 else if (student->averageMarks >= 70) 
 {
 student->grade = 'C';
 } 
 else if (student->averageMarks >= 60) 
 {
 student->grade = 'D';
 } 
 else 
 {
 student->grade = 'F';
 }
}
int main() 
{
 struct Student students[5];
 // Input student information
 for (int i = 0; i < 5; i++) 
 {
 printf("Enter Student ID: ");
 scanf("%d", &students[i].studentID);
 printf("Enter Name: ");
 scanf("%s", students[i].name);
 printf("Enter marks for 5 subjects:\n");
 for (int j = 0; j < 5; j++) {
 printf("Subject %d: ", j + 1);
 scanf("%f", &students[i].marks[j]);
 }
 // Calculate average marks and assign grades
 calculateAverage(&students[i]);
 assignGrades(&students[i]);
 }
 // Display student information
 printf("\nStudent Information:\n");
 for (int i = 0; i < 5; i++) 
 {
 printf("Student ID: %d\n", students[i].studentID);
 printf("Name: %s\n", students[i].name);
 printf("Average Marks: %.2f\n", students[i].averageMarks);
 printf("Grade: %c\n", students[i].grade);
 printf("\n");
 }
 return 0;
}

OUTPUT

Enter Student ID: 01
Enter Name: s1
Enter marks for 5 subjects:
Subject 1: 96
Subject 2: 56
Subject 3: 49
Subject 4: 38.5
Subject 5: 55.6
Enter Student ID: 02
Enter Name: s2
Enter marks for 5 subjects:
Subject 1: 56.5
Subject 2: 96.8
Subject 3: 78.6
Subject 4: 55
Subject 5: 85
Enter Student ID: 03
Enter Name: s3
Enter marks for 5 subjects:
Subject 1: 72.05
Subject 2: 36.8
Subject 3: 65
Subject 4: 98.4
Subject 5: 84.2
Enter Student ID: 04
Enter Name: s4
Enter marks for 5 subjects:
Subject 1: 58
Subject 2: 68.3
Subject 3: 78.6
Subject 4: 85.9
Subject 5: 22.5
Enter Student ID: 05
Enter Name: s5
Enter marks for 5 subjects:
Subject 1: 55
Subject 2: 66
Subject 3: 77
Subject 4: 88
Subject 5: 99

Student Information:
Student ID: 1
Name: s1
Average Marks: 59.02
Grade: F

Student ID: 2
Name: s2
Average Marks: 74.38
Grade: C

Student ID: 3
Name: s3
Average Marks: 71.29
Grade: C

Student ID: 4
Name: s4
Average Marks: 62.66
Grade: D

Student ID: 5
Name: s5
Average Marks: 77.00
Grade: C




 3. b. A school wants to develop a student academic system to track student progress and 
generate reports for teachers and parents. The system should store the following information 
for each student: Student ID, Name, Grade, Subject, Marks. The system should also be able to 
do the following operations: 
i. Calculate the average marks for each student.
ii. Assign grades based on the average marks.
Conditions
i. Must use array of structures.
ii. Use pointer to structure to access the members of the structure.
ii. Enter marks for minimum of 5 students with subjects each.
Instructions to Faculties
If needed, please take extra lab hours in subsequent week to complete this experiment in detail. 
The concepts discussed in this experiment will make solid foundation for the forthcoming 
experiments namely (stack using linked list, queue using linked list, singly linked list, doubly 
linked list, circular linked list). 

  
Program

#include<stdio.h>

// Define the structure for a student
struct Student 
{
 int studentID;
 char name[50];
 char grade;
 float marks[5];
 float averageMarks;
};
// Function to calculate the average marks for a student
void calculateAverage(struct Student *student) 
{
 float totalMarks = 0.0;
 for (int i = 0; i < 5; i++) 
 {
 totalMarks += student->marks[i];
 }
 student->averageMarks = totalMarks / 5;
}
// Function to assign grades based on average marks
void assignGrades(struct Student *student) 
{
 if (student->averageMarks >= 90) 
 {
 student->grade = 'A';
 } 
 else if (student->averageMarks >= 80) 
 {
 student->grade = 'B';
 } 
 else if (student->averageMarks >= 70) 
 {
 student->grade = 'C';
 } 
 else if (student->averageMarks >= 60) 
 {
 student->grade = 'D';
 } 
 else 
 {
 student->grade = 'F';
 }
}
int main() 
{
 struct Student students[5];
 struct Student *studentPtr = students;
 // Input student information
 for (int i = 0; i < 5; i++) 
 {
 printf("Enter Student ID: ");
 scanf("%d", &studentPtr->studentID);
 printf("Enter Name: ");
 scanf("%s", studentPtr->name);
 printf("Enter marks for 5 subjects:\n");
 for (int j = 0; j < 5; j++) 
 {
 printf("Subject %d: ", j + 1);
 scanf("%f", &studentPtr->marks[j]);
 }
 // Calculate average marks and assign grades
 calculateAverage(studentPtr);
 assignGrades(studentPtr);
 // Move to the next student in the array
 studentPtr++;
 }

 // Reset the pointer to the beginning of the array
 studentPtr = students;
 // Display student information
 printf("\nStudent Information:\n");
 for (int i = 0; i < 5; i++) 
 {
 printf("Student ID: %d\n", studentPtr->studentID);
 printf("Name: %s\n", studentPtr->name);
 printf("Average Marks: %.2f\n", studentPtr->averageMarks);
 printf("Grade: %c\n", studentPtr->grade);
 printf("\n");
 // Move to the next student in the array
 studentPtr++;
 }
 return 0;
}

OUTPUT

Enter Student ID: 1
Enter Name: jkl
Enter marks for 5 subjects:
Subject 1: 90
Subject 2: 89
Subject 3: 78
Subject 4: 98
Subject 5: 76
Enter Student ID: 2
Enter Name: ghj
Enter marks for 5 subjects:
Subject 1: 45
Subject 2: 56
Subject 3: 67
Subject 4: 89
Subject 5: 67
Enter Student ID: 3
Enter Name: asd
Enter marks for 5 subjects:
Subject 1: 98
Subject 2: 87
Subject 3: 76
Subject 4: 67
Subject 5: 89
Enter Student ID: 4
Enter Name: xyz
Enter marks for 5 subjects:
Subject 1: 65
Subject 2: 67
Subject 3: 89
Subject 4: 96
Subject 5: 59
Enter Student ID: 5
Enter Name: 90
Enter marks for 5 subjects:
Subject 1: 78
Subject 2: 95
Subject 3: 56
Subject 4: 86
Subject 5: 68

Student Information:
Student ID: 1
Name: jkl
Average Marks: 86.20
Grade: B

Student ID: 2
Name: ghj
Average Marks: 64.80
Grade: D

Student ID: 3
Name: asd
Average Marks: 83.40
Grade: B

Student ID: 4
Name: xyz
Average Marks: 75.20
Grade: C

Student ID: 5
Name: 90
Average Marks: 76.60
Grade: C



4. a. Write a C program to create a stack data structure using a linked list instead of an array 
and implement push, pop and isEmpty operations accordingly

Program
#include <stdio.h>
#include <stdlib.h>
// Define a structure for a node in the linked list
struct Node {
 int data;
 struct Node* next;
};
// Define a structure for the stack
struct Stack {
 struct Node* top;
};
// Function to create an empty stack
struct Stack* createStack() {
 struct Stack* stack = (struct Stack*)malloc(sizeof(struct Stack));
 stack->top = NULL;
 return stack;
}
// Function to check if the stack is empty
int isEmpty(struct Stack* stack) {
 return (stack->top == NULL);
}
// Function to push an element onto the stack
void push(struct Stack* stack, int data) {
 struct Node* newNode = (struct Node*)malloc(sizeof(struct Node));
 newNode->data = data;
 newNode->next = stack->top;
 stack->top = newNode;
 printf("%d pushed to the stack\n", data);
}
// Function to pop an element from the stack
int pop(struct Stack* stack) {
 if (isEmpty(stack)) {
 printf("Stack is empty. Cannot pop.\n");
 return -1; // Return an invalid value
 }
 struct Node* temp = stack->top;
 int poppedData = temp->data;
 stack->top = temp->next;
 free(temp);
 return poppedData;
}
int main() {
 struct Stack* stack = createStack();
 push(stack, 10);
 push(stack, 20);
 push(stack, 30);
 printf("%d popped from the stack\n", pop(stack));
 printf("%d popped from the stack\n", pop(stack));
 printf("%d popped from the stack\n", pop(stack));
 printf("%d popped from the stack\n", pop(stack)); // Trying to pop from an empty stack
 return 0;
}

OUTPUT
/tmp/fF1ovaKyXO.o
10 pushed to the stack
20 pushed to the stack
30 pushed to the stack
30 popped from the stack
20 popped from the stack
10 popped from the stack
Stack is empty. Cannot pop.
-1 popped from the stack





 5. a. Write a C program to implement a queue data structure using a singly linked list. Your 
program should provide the following functionalities:
1. Initialize an empty queue.
2. Enqueue (add) an element to the rear of the queue.
3. Dequeue (remove) an element from the front of the queue.
4. Display the elements of the queue.
You need to define suitable functions to perform these operations and demonstrate their usage 
in your program. Ensure that you handle edge cases such as queue underflow (when trying to 
dequeue from an empty queue).

Program
#include <stdio.h>
#include <stdlib.h>

// Structure to represent a node in the linked list
struct Node 
{
 int data;
 struct Node* next;
};

// Structure to represent a queue
struct Queue 
{
 struct Node* front;
 struct Node* rear;
};

// Function to initialize an empty queue
struct Queue* createQueue() 
{
 struct Queue* queue = (struct Queue*)malloc(sizeof(struct Queue));
 queue->front = queue->rear = NULL;
 return queue;
}

// Function to check if the queue is empty
int isEmpty(struct Queue* queue) 
{
 return (queue->front == NULL);
}

// Function to enqueue an element to the rear of the queue
void enqueue(struct Queue* queue, int data) 
{
 struct Node* newNode = (struct Node*)malloc(sizeof(struct Node));
 newNode->data = data;
 newNode->next = NULL;
 
 if (isEmpty(queue)) 
 {
 queue->front = queue->rear = newNode;
 } else 
 {
 queue->rear->next = newNode;
 queue->rear = newNode;
 }
}
// Function to dequeue an element from the front of the queue
int dequeue(struct Queue* queue) 
{
 if (isEmpty(queue)) 
 {
 printf("Queue underflow: Cannot dequeue from an empty queue.\n");
 return -1; // Error value
 }
 
 struct Node* temp = queue->front;
 int data = temp->data;
 queue->front = queue->front->next;
 
 free(temp);
 
 return data;
}
// Function to display the elements of the queue
void display(struct Queue* queue) 
{
 if (isEmpty(queue)) 
 {
 printf("Queue is empty.\n");
 return;
 }
 
 struct Node* current = queue->front;
 printf("Queue elements: ");
 
 while (current != NULL) 
 {
 printf("%d ", current->data);
 current = current->next;
 }
 
 printf("\n");
}
int main() 
{
 struct Queue* queue = createQueue();
 enqueue(queue, 10);
 enqueue(queue, 20);
 enqueue(queue, 30);
 display(queue);
 printf("Dequeued element: %d\n", dequeue(queue));
 
 display(queue);
 printf("Is the queue empty? %s\n", isEmpty(queue) ? "Yes" : "No");
 return 0;
}

OUTPUT

Queue elements: 10 20 30 
Dequeued element: 10
Queue elements: 20 30 
Is the queue empty? No



6. a. Write a C program to implement a singly linked list. The program should allow the user 
to perform the following operations:
i. Insert a node at the beginning of the list.
ii. Insert a node at the end of the list.
iii. Delete a node by value.
iv. Display the linked list.
Additionally, ensure that you handle edge cases gracefully, such as an empty list or attempting 
to delete a node that does not exist.

 
Program
#include <stdio.h>
#include <stdlib.h>
// Define a structure for a node in the linked list
struct Node {
 int data;
 struct Node* next;
};
// Function to insert a node at the beginning of the list
struct Node* insertAtBeginning(struct Node* head, int value) {
 struct Node* newNode = (struct Node*)malloc(sizeof(struct Node));
 if (newNode == NULL) {
 printf("Memory allocation failed.\n");
 return head;
 }
 newNode->data = value;
 newNode->next = head;
 return newNode;
}
// Function to insert a node at the end of the list
struct Node* insertAtEnd(struct Node* head, int value) {
 struct Node* newNode = (struct Node*)malloc(sizeof(struct Node));
 if (newNode == NULL) {
 printf("Memory allocation failed.\n");
 return head;
 }
 newNode->data = value;
 newNode->next = NULL;
 if (head == NULL) {
 return newNode;
 }
 struct Node* current = head;
 while (current->next != NULL) {
 current = current->next;
 }
 current->next = newNode;
 return head;
}
// Function to delete a node by value
struct Node* deleteByValue(struct Node* head, int value) {
 if (head == NULL) {
 printf("List is empty. Cannot delete.\n");
 return head;
 }
 if (head->data == value) {
 struct Node* temp = head;
 head = head->next;
 free(temp);
 return head;
 }
 struct Node* current = head;
 while (current->next != NULL && current->next->data != value) {
 current = current->next;
 }
 if (current->next == NULL) {
 printf("Value not found in the list. Cannot delete.\n");
 return head;
 }
 struct Node* temp = current->next;
 current->next = current->next->next;
 free(temp);
 return head;
}
// Function to display the linked list
void displayList(struct Node* head) 
{
 printf("Linked List: ");
 struct Node* current = head;
 while (current != NULL) {
 printf("%d -> ", current->data);
 current = current->next;
 }
 printf("NULL\n");
}
int main() {
 struct Node* head = NULL;
 int choice, value;
 while (1) {
 printf("\nMenu:\n");
 printf("1. Insert at the beginning\n");
 printf("2. Insert at the end\n");
 printf("3. Delete by value\n");
 printf("4. Display\n");
 printf("5. Exit\n");
 printf("Enter your choice: ");
 scanf("%d", &choice);
 switch (choice) {
 case 1:
 printf("Enter a value to insert: ");
 scanf("%d", &value);
 head = insertAtBeginning(head, value);
 break;
 case 2:
 printf("Enter a value to insert: ");
 scanf("%d", &value);
 head = insertAtEnd(head, value);
 break;
 case 3:
 printf("Enter a value to delete: ");
 scanf("%d", &value);
 head = deleteByValue(head, value);
 break;
 case 4:
 displayList(head);
 break;
 case 5:
 // Clean up and exit
 while (head != NULL) {
 struct Node* temp = head;
 head = head->next;
 free(temp);
 }
 return 0;
 default:
 printf("Invalid choice. Please try again.\n");
 }
 }
 return 0;
}

OUTPUT

/tmp/fF1ovaKyXO.o

Menu:
1. Insert at the beginning
2. Insert at the end
3. Delete by value
4. Display
5. Exit
Enter your choice: 1
Enter a value to insert: 5

Menu:
1. Insert at the beginning
2. Insert at the end
3. Delete by value
4. Display
5. Exit
Enter your choice: 2
Enter a value to insert: 8

Menu:
1. Insert at the beginning
2. Insert at the end
3. Delete by value
4. Display
5. Exit
Enter your choice: 3
Enter a value to delete: 8

Menu:
1. Insert at the beginning
2. Insert at the end
3. Delete by value
4. Display
5. Exit
Enter your choice: 4
Linked List: 5 -> NULL

Menu:
1. Insert at the beginning
2. Insert at the end
3. Delete by value
4. Display
5. Exit
Enter your choice: 5
