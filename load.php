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
} 
if (!isalpha(registration[i]))  
{ 
return false; 
} 
// Check if the next two characters are numbers (e.g., "09" for a specific district) 
for (int i = 2; i < 4; i++)  
{ 
} 
if (!isdigit(registration[i]))  
{ 
return false; 
} 
// Check if the next two characters are alphabets (e.g., "MN" for serial number) 
for (int i = 4; i < 6; i++)
