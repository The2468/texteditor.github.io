exp1

#include<stdio.h>
#include<stdlib.h>
#include<unistd.h>
void main(int argc,char *args[])
{
int pid;
 pid=fork();
if(pid<0)
{
printf("fork failed");
exit(1);
}
else if(pid==0)
{
execlp("date","ls",NULL );
exit(0);
}
else
{
printf("\n Process id is -%d\n",getpid());
wait(NULL);
exit(0);
}
}




exp2

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

exp3

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


exp4

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
return 0:
}


exp5
FCFS

#include<stdio.h>
int main()
{
 int n,bt[20],wt[20],tat[20],avwt=0,avtat=0,i,j;
 printf("Enter total number of processes(maximum 20):");
 scanf("%d",&n);
 printf("\nEnter Process Burst Time\n");
 for(i=0;i<n;i++)
 {
 printf("P[%d]:",i+1);
 scanf("%d",&bt[i]);
 }
 wt[0]=0; //waiting time for first process is 0
 //calculating waiting time
 for(i=1;i<n;i++)
 {
 wt[i]=0;
 for(j=0;j<i;j++)
 wt[i]= wt[i]+bt[j];
 }
 printf("\nProcess\t\tBurst Time\tWaiting Time\tTurnaround Time");
 //calculating turnaround time
 for(i=0;i<n;i++)
 {
 tat[i]=bt[i]+wt[i];
 avwt+=wt[i];
 avtat+=tat[i];
 printf("\nP[%d]\t\t%d\t\t%d\t\t%d",i+1,bt[i],wt[i],tat[i]);
 }
 avwt/=n;
 avtat/=n;
 printf("\n\nAverage Waiting Time:%d",avwt);
 printf("\nAverage Turnaround Time:%d",avtat);
 return 0;
}



SJF


#include<stdio.h>
void main()
{
 int bt[20],p[20],wt[20],tat[20],i,j,n,total=0, total1=0,pos,temp;
 float avg_wt,avg_tat;
 printf("Enter number of process:");
 scanf("%d",&n);
 printf("\nEnter Burst Time:\n");
 for(i=0;i<n;i++)
 {
 printf("p%d:",i+1);
 scanf("%d",&bt[i]);
 p[i]=i+1; //contains process number
 }
 //sorting burst time in ascending order using selection sort
 for(i=0;i<n;i++)
 {
 pos=i;
 for(j=i+1;j<n;j++)
 {
 if(bt[j]<bt[pos])
 pos=j;
 }
 temp=bt[i];
 bt[i]=bt[pos];
 bt[pos]=temp;
 temp=p[i];
 p[i]=p[pos];
 p[pos]=temp;
 }
 wt[0]=0; //waiting time for first process will be zero
 //calculate waiting time
 for(i=1;i<n;i++)
 {
 wt[i]=0;
 for(j=0;j<i;j++)
 wt[i]+=bt[j];
 total+=wt[i];
 }

 printf("\nProcess\t Burst Time \tWaiting Time\tTurnaround Time");
 for(i=0;i<n;i++)
 {
 tat[i]=bt[i]+wt[i]; //calculate turnaround time
 total+=tat[i];
 printf("\np%d\t\t %d\t\t %d\t\t\t%d",p[i],bt[i],wt[i],tat[i]);
 }
avg_wt=(float)total/n; //average waiting time
 avg_tat=(float)total1/n; //average turnaround time
 printf("\n\nAverage Waiting Time=%f",avg_wt);
 printf("\nAverage Turnaround Time=%f\n",avg_tat);
}


priority 

#include<stdio.h>
int main()
{
 int bt[20],p[20],wt[20],tat[20],pr[20],i,j,n,total=0, total1=0,pos,temp,avg_wt,avg_tat;
 printf("Enter Total Number of Process:");
 scanf("%d",&n);
 printf("\nEnter Burst Time and Priority\n");
 for(i=0;i<n;i++)
 {
 printf("\nP[%d]\n",i+1);
 printf("Burst Time:");
 scanf("%d",&bt[i]);
 printf("Priority:");
 scanf("%d",&pr[i]);
 p[i]=i+1; //contains process number
 }
 //sorting burst time, priority and process number in ascending order using selection sort
 for(i=0;i<n;i++)
 {
 pos=i;
 for(j=i+1;j<n;j++)
 {
 if(pr[j]<pr[pos])
 pos=j;
 }
 temp=pr[i];
 pr[i]=pr[pos];
 pr[pos]=temp;
 temp=bt[i];
 bt[i]=bt[pos];
 bt[pos]=temp;
 temp=p[i];
 p[i]=p[pos];
 p[pos]=temp;
 }
 wt[0]=0; //waiting time for first process is zero
 //calculate waiting time
 for(i=1;i<n;i++)
 {
 wt[i]=0;
 for(j=0;j<i;j++)
 wt[i]+=bt[j];
 total+=wt[i];
 }

 printf("\nProcess\t Burst Time \tWaiting Time\tTurnaround Time");
 for(i=0;i<n;i++)
 {
 tat[i]=bt[i]+wt[i]; //calculate turnaround time
 total1+=tat[i];
 printf("\nP[%d]\t\t %d\t\t %d\t\t\t%d",p[i],bt[i],wt[i],tat[i]);
 }
 avg_wt=total/n; //average waiting time
 avg_tat=total1/n; //average turnaround time
 printf("\n\nAverage Waiting Time=%d",avg_wt);
 printf("\nAverage Turnaround Time=%d\n",avg_tat);
 return 0;
}

roundrobin

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


semaphore

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


