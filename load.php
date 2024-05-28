
1)A. To write a java program that uses non-recursive procedure to print the nth value in the 
Fibonacci sequence. 

import java.util.*; 
public class Fibonacci 
{ 
public static void main(String args[]) 
{ 
Scanner in = new Scanner(System.in); 
int n, a, b, i, sum; 
sum=0; 
a=0; 
b=1; 
System.out.println("Enter number of terms"); 
n=in.nextInt(); 
System.out.println("The Fibonacci sequence is "); 
if(n==1) 
System.out.print(a); 
else if(n==2) 
{ 
System.out.print(a+" "+b); 
sum=b; 
} 
else 
{ 
System.out.print(a+" "+b+" "); 
for(i=3;i<=n;i++) 
{ 
sum=a+b; 
System.out.print(sum+" "); 
a=b; 
b=sum; 
} 
} 
System.out.println("\nThe nth value in the Fibonacci sequence is "+sum); 
}  
}

1)B.Develop a java program for pay roll system for employee class with emp_name, emp_id, 
address and salary. Calculate 97% of basic pay as DA, 10 % of basic pay as HRA, 12% 
of basic pay as PF. Generate pay slip for the employee with their gross and net salary.

import java.util.*; 
public class employee 
{ 
String emp_name,address; 
int emp_id; 
double sal, da, hra, pf, gross,net; 
void input() 
{ 
Scanner in = new Scanner(System.in); 
System.out.println("Enter employee name "); 
emp_name=in.next(); 
System.out.println("Enter employee id "); 
emp_id=in.nextInt(); 
System.out.println("Enter employee address "); 
address=in.next(); 
System.out.println("Enter the basic salary "); 
sal=in.nextDouble(); 
} 
void calculate() 
{ 
da=sal*97/100; 
hra=sal*10/100; 
pf=sal*12/100; 
gross=sal+da+hra+pf; 
net=gross-pf; 
} 
void display() 
{ 
System.out.println("The gross salary is "+gross); 
System.out.println("The net salary is "+net); 
}     
public static void main(String args[]) 
{ 
employee ob = new employee(); 
ob.input(); 
ob.calculate(); 
ob.display(); 
} 
} 


2A. Write a JAVA program to accept an integer array and print the repeating 
elements. 

import java.util.*; 
public class Array 
{ 
void repeat(int a[], int n) 
{ 
int i,j,count; 
System.out.println("These elements are repeated along with its frequency-"); 
for(i=0;i<n;i++) 
{ 
count=1; 
for(j=i+1;j<n;j++) 
{ 
if(a[j]==a[i]) 
count++; 
else 
break; 
} 
i=j-1; 
if(count>1) 
System.out.println(a[i] + " --> " + count); 
} 
} 
public static void main(String args[])  
{ 
int size,i; 
Scanner in = new Scanner(System.in); 
System.out.println("Enter the array size"); 
size=in.nextInt(); 
int arr[] = new int[size]; 
System.out.println("Enter the array elements"); 
for(i=0;i<size;i++) 
arr[i]=in.nextInt(); 
Arrays.sort(arr); 
Array ob = new Array(); 
ob.repeat(arr,size); 
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

3A. Write a program to create an abstract class named shape that contains two integers 
and an empty method named print Area(). Provide three classes named Rectangle, 
Triangle and Circle such that each one of the classes extends the class shape. Each one of 
the class contains only the method print Area() that print the area of the given shape. 
             
import java.util.*; 
abstract class Shape  
{ 
abstract void area(double x, double y); 
abstract void area(double z); 
} 
class Rectangle extends Shape  
{ 
void area(double x, double y)  
{ 
System.out.println("Area of rectangle is :" + (x * y)); 
} 
@Override void area(double z) 
{ 
} 
} 
class Circle extends Shape  
{ 
@Override void area(double x, double y) 
{ 
} 
void area(double z)  
{ 
System.out.println("Area of circle is :" + (Math.PI * z * z)); 
} 
} 
class Triangle extends Shape  
{ 
void area(double x, double y)  
{ 
System.out.println("Area of triangle is :" + (0.5 * x * y)); 
} 
@Override void area(double z) 
{ 
} 
} 
public class AbstractDemo  
{ 
public static void main(String[] args)  
{ 
Rectangle r = new Rectangle(); 
r.area(5, 10); 
Circle c = new Circle(); 
c.area(5); 
Triangle t = new Triangle(); 
t.area(5, 10); 
} 
} 

3B. Write a Java program to create an employee class by inheriting Person class. 
    
class Person  
{ 
String name; 
int age; 
Person(int age, String name)  
{ 
this.name = name; 
this.age = age; 
} 
} 
class Employee extends Person  
{ 
int emp_id; 
int emp_salary; 
Employee(int id, String name, int age, int salary)  
{ 
super(age,name); 
emp_id = id; 
emp_salary = salary; 
} 
void printEmployeeDetails()  
{ 
System.out.println("Employee ID : "+emp_id); 
System.out.println("Employee Name : "+name); 
System.out.println("Employee Age : "+age); 
System.out.println("Employee Salary : "+emp_salary); 
} 
} 
public class Main  
{ 
public static void main(String[] args)  
{ 
Employee emp = new Employee(05,"Suvika",30,50000); 
emp.printEmployeeDetails(); 
} 
} 

4A. Write a Java program to implement multilevel inheritance 
    
class Person 
{ 
Person() 
{ 
System.out.println("Person constructor"); 
} 
void nationality() 
{ 
System.out.println("Indian"); 
} 
void place()  
{ 
System.out.println("Mumbai"); 
} 
} 
class Emp extends Person 
{ 
Emp() 
{ 
System.out.println("Emp constructor"); 
} 
void organization() 
{ 
System.out.println("IBM"); 
} 
void place() 
{ 
System.out.println("New York"); 
} 
} 
class Manager extends Emp 
{ 
Manager() 
{ 
System.out.println("Manager constructor"); 
} 
void subordinates() 
{ 
System.out.println(12); 
} 
void place() 
{ 
System.out.println("London"); 
} 
} 
class Check 
{ 
public static void main(String args[]) 
{ 
Manager m=new Manager(); 
m.nationality(); 
m.organization(); 
m.subordinates(); 
m.place(); 
} 
} 

4B. Create a java program that calculates the area and volume of rectangle using an 
interface class.  
    
interface getdata 
{ 
public void input(); 
} 
interface calculate 
{ 
public void area(); 
public void volume(); 
} 
class rectangle implements getdata, calculate 
{ 
int l,b,h,a,v; 
public void input() 
{ 
l=10; 
b=20; 
h=15; 
} 
public void area() 
{ 
a=l*b; 
System.out.println("Area "+a); 
} 
public void volume() 
{ 
v=l*b*h; 
System.out.println("Volume "+v); 
} 
} 
public class p4b 
{ 
public static void main(String args[]) 
{ 
rectangle r = new rectangle(); 
r.input(); 
r.area(); 
r.volume(); 
} 
} 

5. Write a program to generate the following abnormal conditions in main(): and 
Enable a catch block for each and see whether you are able to catch the exceptions. Print 
the stack trace and verify. 
    
**NullPointerException** 
import java.util.*; 
class P5a 
{ 
public static void main (String[] args) 
{ 
String ptr = null; 
try 
{ 
if (ptr.equals("java")) 
System.out.print("Same"); 
else 
System.out.print("Not Same"); 
} 
catch(NullPointerException e) 
{ 
System.out.print("NullPointerException Caught"); 
e.printStackTrace(); 
} 
} 
} 

 
**OutOfMemoryErrorException** 
 
import java.util.*; 
class P5b 
{ 
    public void CreateArray(int size) 
    { 
     try 
     { 
      int a[]=new int[size]; 
     } 
     catch(Exception e) 
     { 
      System.out.print("OutOfMemoryErrorException Caught"); 
      e.printStackTrace(); 
     } 
    } 
    public static void main (String[] args) 
    { 
     P5b ob=new P5b(); 
     ob.CreateArray(1000*1000); 
    } 
}
 
 
**NumberFormatException** 
import java.io.*; 
class P5c1 
{ 
    public static void main (String[] args) 
    { 
     try 
     { 
      String s="1 2 3"; 
      System.out.println(Integer.parseInt(s)); 
     } 
     catch(NumberFormatException e) 
     { 
      System.out.print("NumberFormatException Caught"); 
      System.out.println(e.getMessage()); 
      e.printStackTrace(); 
     } 
     } 
} 
**NumberFormatException (Date)** 
import java.util.*; 
class P5c2 
{ 
    public static void main (String[] args) 
    { 
     try 
     { 
      Date day = new Date(); 
      String s=day.toString(); 
      System.out.println(Integer.parseInt(s)); 
     } 
     catch(NumberFormatException e) 
     { 
      System.out.print("NumberFormatException Caught"); 
      System.out.println(e.getMessage()); 
      e.printStackTrace(); 
     } 
    } 
} 

import java.util.*; 
class P5d1 
{ 
    public static void main (String[] args) 
    { 
     try 
     { 
      Object o = new Object(); 
      String s = (String)o; 
      System.out.println(s); 
     } 
     catch(ClassCastException e) 
     { 
    System.out.print("ClassCastException Caught"); 
    System.out.println(e.getMessage()); 
    e.printStackTrace(); 
     } 
    } 
}

import java.util.*; 
class P5d2 
{ 
    public static void main (String[] args) 
    { 
     try 
     { 
      String s = "Suvika"; 
      Object o = (Object)s; 
      System.out.println(o); 
     } 
     catch(ClassCastException e) 
     {    
 System.out.print("ClassCastException Caught"); 
    System.out.println(e.getMessage()); 
    e.printStackTrace(); 
    } 
    } 
}

6A. Write a JAVA program that creates threads by extending Thread class. First thread 
display “Good Morning “every 1 sec, the second thread displays “Hello “every 2 seconds 
and the third display “Welcome” every 3 seconds. 
    
import java.io.*; 
class A extends Thread 
{ 
synchronized public void run() 
{ 
try 
{ 
while(true) 
{ 
sleep(1000); 
System.out.println("good morning"); 
} 
} 
catch(Exception e) 
{ } 
} 
} 
class B extends Thread 
{ 
synchronized public void run() 
{ 
try 
{ 
while(true) 
{ 
sleep(2000); 
System.out.println("hello"); 
} 
} 
catch(Exception e) 
{ } 
} 
} 

class C extends Thread 
{ 
synchronized public void run() 
{ 
try 
{ 
while(true) 
{ 
sleep(3000); 
System.out.println("welcome"); 
} 
} 
catch(Exception e) 
{ } 
} 
} 
class Threadmsgs 
{ 
public static void main(String args[]) 
{ 
A t1=new A(); 
B t2=new B(); 
C t3=new C(); 
t1.start(); 
t2.start(); 
t3.start(); 
} 
} 

6B. Write a program illustrating isAlive and join ()  
 
public class AliveJoin extends Thread  
{  
 public void run()  
  {  
    System.out.println("university ");  
    try  
    {  
      Thread.sleep(300);  
    }  
    catch (InterruptedException ie)  
    { }  
    System.out.println("dayananda sagar");  
  }  
  public static void main(String[] args)  
  {   
    AliveJoin c1 = new AliveJoin();  
    AliveJoin c2 = new AliveJoin();  
    c1.start();  
    c2.start(); 
    System.out.println(c1.isAlive()); 
    System.out.println(c2.isAlive()); 
    try  
    {  
      c1.join(); // Waiting for c1 to finish  
    }  
    catch (InterruptedException ie)  
    { }  
  }  
}
