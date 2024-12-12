Expt. 2. Write a C program to display PID and PPID using system
calls getpid () & getppid ()
Program Description:
Using fork(), create a child process. The child process prints its own process id and id of the
parent and exits. The parent process waits for the child to finish and prints its own process id and
the id of the child process and exits.
SYSTEM CALLS USED:

getpid( ): returns the process id of the current process
Syntax():
#include<unistd.h>
pid_t getpid();

getppid( ): returns the process id of the parent of the current process
Syntax():
#include<unistd.h>
pid_t getppid();

Program Code:

#include <stdio.h>
#include <sys/types.h>
#include <unistd.h>
void main()
{
int pid;
pid=fork();
if(!pid)
{
printf("Child process...");
printf("\n\nChild PID : %d",getpid());
printf("\nParent PID : %d",getppid());
printf("\n\nFinished with child\n");
}
 else
{
wait(NULL);
printf("\nParent process");
printf("\nPARENT PID : %d",getpid());
printf("\nChild PID : %d",pid);
}
}

Expt. 3. Write a C program using I/O system calls open(), read() & write() to copy contents of one file to another file

Program Description: Assume that one.txt is well defined. What we want is to create a new file
called two.txt and copy over all the contents of one.txt.
SYSTEM CALLS USED:

open(): allows you to open or create file for reading and/or writing
Syntax:
#include <fcntl.h>
int open (const char* Path, int flags [, int mode ]);
Returns: file descriptor if OK, -1 on error
The pathname is the name of the file to open or create.
Then a flag in the second parameter determine the method in which the file is to be
opened: O_RDONLY, O_WRONLY or O_RDWR.
The third argument determine the permissions of the file if it is created: S_IRUSR (Set read rights
for the owner to true), S_IWUSR (Set write rights for the owner to true)
read(): used to read data into a buffer.
syntax:
#include <unistd.h>
size_t read (int fd, void* buf, size_t cnt);
Returns the number of bytes that were read.
fd: The file descriptor of where to read the input
buf: A character array where the read content will be stored.
cnt: The number of bytes to read
write(): used to write data out of a buffer.
Syntax:
#include <unistd.h>
size_t write (int fd, void* buf, size_t cnt);
Returns: the number of bytes that were written
fd: The file descriptor of where to write the output.
Buf: A pointer to a buffer which will be written to the file.
cnt: The number of bytes to write.

Program code:
#include<stdio.h>
#include<unistd.h>
#include<sys/types.h>
#include<string.h>
#include <fcntl.h>
void main()
{
char buff;
int fd,fd1;
fd=open("one.txt",O_RDONLY);
fd1=open("two.txt",O_WRONLY|O_CREAT);
while(read(fd,&buff,1))
write(fd1,&buff,1);
printf("The copy of a file is successed");
close(fd);
close(fd1);
}

4. Write a C program to implement multithreaded program using pthreads

Program Description:
Program creates 5 threads with the pthread_create() routine. Each thread prints a Hello World
message and then terminates with a call to pthread_exit().
System Calls Used:
pthread_create(): creates a new thread and makes it executable. This routine can be called any
number of times from anywhere within your code.
Syntax:
pthread_create (thread, attr, start_routine, arg)
pthread_create arguments:
● thread: unique identifier for the new thread returned by the subroutine.
● attr: attribute object that may be used to set thread attributes. You can specify a thread
attributes object, or NULL for the default values.
● start_routine: the C routine that the thread will execute once it is created.
● arg: A single argument that may be passed to start_routine. It must be passed by reference
as a pointer cast of type void. NULL may be used if no argument is to be passed.

pthread_exit(): terminate the calling thread
Syntax():
pthread_exit(status)

Program Code:
#include <pthread.h>
#include <stdio.h>
#include <stdlib.h>
#define NUM_THREADS 5
void *PrintHello(void *threadid)
{
 long tid;
 tid = (long)threadid;
 printf("Hello World! It's me, thread #%ld!\n", tid);
 pthread_exit(NULL);
}
int main(int argc, char *argv[])
{
 pthread_t threads[NUM_THREADS];
 int rc;
 long t;
 for(t=0;t<NUM_THREADS;t++){
 printf("In main: creating thread %ld\n", t);
rc = pthread_create(&threads[t], NULL, PrintHello, (void *)t);
 if (rc){
 printf("ERROR; return code from pthread_create() is %d\n", rc);
 exit(-1);
 }
 }
 /* Last thing that main() should do */
 pthread_exit(NULL);
}

EXP 5. Round Robin

#include<stdio.h>
int main()
{
int i,tbt=0,nop,ts=0,flag[20],rem[20];
int from,wt[20],tt[20],b[20],twt=0,ttt=0;
int dur;
float awt,att;
printf("Enter no.of Processes:");
scanf("%d",&nop);
printf("Enter the time slice:");
scanf("%d",&ts);
printf("Enter the Burst times..\n");
for(i=0;i<nop;i++)
{
 wt[i]=tt[i]=0;
 printf("P%d\t:",i+1);
 scanf("%d",&b[i]); // Reading Burst Time
 rem[i]=b[i]; // Store the Burst Time in rem array
 tbt+=b[i]; // Total Burst Time
 flag[i]=0; // used to check whether the process has remaining burst time or not
}
from=0;
i=0;
printf("\n\tGantt Chart");
printf("\nProcessID \t From Time\tTo Time\n");
while(from<tbt)
{
 if(!flag[i]) //true only when process has burst time
 {
 if(rem[i]<=ts) //burst time should be equal or less than time slice
 {
 dur=rem[i];
 flag[i]=1; // make the value false
 tt[i]=dur+from;
 wt[i]=tt[i]-b[i]; // subtract
 }
 else
 dur=ts;
 printf("%7d%15d%15d\n",i+1,from,from+dur);
 rem[i]= rem[i]-dur;
 from = from+dur;
}
i=(i+1)%nop;
}
for(i=0;i<nop;i++)
{
twt+=wt[i];
ttt+=tt[i];
}
printf("\n\nProcess ID\tWaiting Time\tTurn Around Time");
for(i=0;i<nop;i++)
{
printf("\n\t%d\t\t%d\t\t%d",i+1,wt[i],tt[i]);
}
awt=(float)twt/(float)nop;
att=(float)ttt/(float)nop;
printf("\nTotal Waiting Time:%d",twt);
printf("\nTotal TurnAround Time:%d",ttt);
printf("\nAverage Waiting Time:%.2f",awt);
printf("\nAverage Turn Around Time:%.2f\n",att);
return 0;
}

EXP 6. Semaphore

#include<stdio.h>
#include<stdlib.h>
int mutex=1,full=0,empty=3,x=0;
void producer();
void consumer();
int wait(int);
int signal(int);
int main()
{
int n;
do
{
 printf("\n1.producer\n2.consumer\n3.exit\n");
 printf("\nenter ur choice");
 scanf("%d",&n);
 switch(n)
 {
 case 1:
 if((mutex==1)&&(empty!=0))
 producer();
 else
 printf("buffer is full\n");
 break;
 case 2:
 if((mutex==1)&&(full!=0))
 consumer();
 else
 printf("buffer is empty");
 break;
 case 3:
 exit(0);
 break;
 }
}while(n!=3);
return 0;
}
int wait(int s)
{
return(--s);
}
int signal(int s)
{
return(++s);
}
void producer()
{
mutex=wait(mutex);
full=signal(full);
empty=wait(empty);
x++;
printf("\nproducer produces the items%d",x);
mutex=signal(mutex);
}
void consumer()
{
mutex=wait(mutex);
full=wait(full);
empty=signal(empty);
printf("\nconsumerconsumes the item %d",x);
x--;
mutex=signal(mutex);
}

Expt 7. Bankers Algorithm

#include<stdio.h>
void main()
{
int
k=0,output[10],d=0,t=0,ins[5],i,avail[5],allocated[10][5],need[10][5],
MAX[10][5],pno,P[10],j,rz, count=0;
printf("\n Enter the number of resources : ");
scanf("%d", &rz);
printf("\n enter the max instances of each resources\n");
for(i=0;i<rz;i++)
{
avail[i]=0;
printf("%c= ",(i+97));
scanf("%d",&ins[i]);
}
printf("\n Enter the number of processes : ");
scanf("%d", &pno);
printf("\n Enter the allocation matrix \n ");
for(i=0;i<rz;i++)
printf(" %c",(i+97));
printf("\n");
for(i=0;i <pno;i++)
{
 P[i]=i;
 printf("P[%d] ",P[i]);
 for(j=0;j<rz;j++)
 {
 scanf("%d",&allocated[i][j]);
 avail[j]+=allocated[i][j];
 }
}
printf("\nEnter the MAX matrix \n ");
for(i=0;i<rz;i++)
{
 printf(" %c",(i+97));
 avail[i]=ins[i]-avail[i];
}
printf("\n");
for(i=0;i <pno;i++)
{
printf("P[%d] ",i);
for(j=0;j<rz;j++)
 scanf("%d", &MAX[i][j]);
}
printf("\n");
A: d=-1;
for(i=0;i <pno;i++)
{
 count=0; t=P[i];
 for(j=0;j<rz;j++)
 {
 need[t][j] = MAX[t][j]-allocated[t][j];
 if(need[t][j]<=avail[j])
 count++;
 }
if(count==rz)
{
 output[k++]=P[i];
 for(j=0;j<rz;j++)
 avail[j]+=allocated[t][j];
}
else
P[++d]=P[i];
}
if(d!=-1)
{
pno=d+1;
goto A;
}
printf("\t <");
for(i=0;i<k;i++)
printf(" P[%d] ",output[i]);
printf(">");
}
Exp. 8 Deadlock Detection
#include<stdio.h>
int main()
{
 int alloc[10][10], request[10][10], avail[10], work[10], n, m, i, j,k, true=1, false=0, finish[n];
 printf("Enter number of processes: \n");
 scanf("%d",&n);
 printf("Enter number of resources: \n");
 scanf("%d",&m);
 printf("Enter allocation: \n");
 for(i=0; i<n; i++)
 {
 for(j=0; j<m; j++)
 {
 scanf("%d", &alloc[i][j]);
 }
 }
 printf("Enter request: \n");
 for(i=0; i<n; i++)
 {
 for(j=0; j<m; j++)
 {
 scanf("%d", &request[i][j]);
 }
 }
 printf("Enter available: \n");
 for(i=0; i<m; i++)
 {
 scanf("%d", &avail[i]);
 }
 for(i=0; i<n; i++)
 {
 finish[i]=false;
 }
 for(i=0; i<m; i++)
 {
 work[i]=avail[i];
 }
for(j=0; j<n; j++)
 {
 for(i=0; i<n; i++)
 {
 k=0;
 if(finish[i]==false && request[i][k]<=work[k] && request[i][k+1]<=work[k+1] &&
request[i][k+2]<=work[k+2])
 {
 work[k]+=alloc[i][k];
 work[k+1]+=alloc[i][k+1];
 work[k+2]+=alloc[i][k+2];
 finish[i]=true;
 }
 }
 }
 for(i=0; i<n; i++)
 {
 if(finish[i]==false)
 {
 printf("Deadlock detected! \n");
 }
 else
 {
 printf("No deadlock! \n");
 }
 }
}
