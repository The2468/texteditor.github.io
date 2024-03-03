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
