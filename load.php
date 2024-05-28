
1)A. To write a java program that uses non-recursive procedure to print the nth value in the 
Fibonacci sequence. 

import java.util.*;

public class Fibonacci {
    public static void main(String args[]) {
        Scanner in = new Scanner(System.in);
        System.out.println("Enter number of terms");
        int n = in.nextInt();
        
        int a = 0, b = 1, sum = 0;
        
        System.out.println("The Fibonacci sequence is");
        if (n >= 1) System.out.print(a);
        if (n >= 2) System.out.print(" " + b);
        
        for (int i = 3; i <= n; i++) {
            sum = a + b;
            System.out.print(" " + sum);
            a = b;
            b = sum;
        }
        
        if (n > 2) sum = a + b; // Ensure sum holds the nth value if n > 2
        System.out.println("\nThe nth value in the Fibonacci sequence is " + sum);
    }
}

1)B.Develop a java program for pay roll system for employee class with emp_name, emp_id, 
address and salary. Calculate 97% of basic pay as DA, 10 % of basic pay as HRA, 12% 
of basic pay as PF. Generate pay slip for the employee with their gross and net salary.




2A. Write a JAVA program to accept an integer array and print the repeating 
elements. 

import java.util.*;

public class Array {
    void repeat(int[] a) {
        System.out.println("Repeated elements with frequency:");
        for (int i = 0; i < a.length; i++) {
            int count = 1;
            while (i + 1 < a.length && a[i] == a[i + 1]) {
                i++;
                count++;
            }
            if (count > 1) {
                System.out.println(a[i] + " --> " + count);
            }
        }
    }

    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        System.out.print("Enter array size: ");
        int size = in.nextInt();
        int[] arr = new int[size];
        System.out.println("Enter array elements:");
        for (int i = 0; i < size; i++) {
            arr[i] = in.nextInt();
        }
        Arrays.sort(arr);
        Array ob = new Array();
        ob.repeat(arr);
    }
}         

2B. Java program to accept 2 integer arrays as parameters and print common elements 
across both the arrays. 


import java.util.*; 
public class Array2 
{                           
 void common(int a[], int b[]) 
{ 
int i,j; 
System.out.println("The common elements are "); 
for(i=0;i<a.length;i++) 
{ 
for(j=0;j<b.length;j++) 
{ 
if(a[i]==b[j]) 
System.out.println(a[i]); 
} 
} 
} 
public static void main(String args[]) 
{ 
int a1[] = {100,200,400,300}; 
int b1[] = {100,400,250}; 
Array2 ob = new Array2(); 
ob.common(a1,b1); 
} 
} 
1 Dept. of CSE, 
