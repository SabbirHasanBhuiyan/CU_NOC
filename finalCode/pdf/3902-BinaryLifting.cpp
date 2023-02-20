#include<bits/stdc++.h>
using namespace std;
int table[17][100000];
  //this is binary lifting
  void build(int n,int a[])
  {

       //trying to implement sparse table for RMQ
         for(int i=0;i<n;i++)
         {
              table[0][i]=a[i];
         }
     int l=0,R=0;
         for(int i=1;i<=17;i++)
         {
                for(int j=0;j<n;j++)
                {
                     int mask=(1<<(i-1));
                                     l=j+mask;
                                   if(l>n)
                                   {
                                      l=n-1;
                                   }

                    table[i][j]=min(table[i-1][j],table[i-1][l]);

                }
         }
  }
  int query(int L,int R)
  {
       int ans=INT_MAX;

        while(L<R)
        {
             //6   13
             //4 2 1
             //
        }
        return ans;
  }

  int main()
  {
         int a[]={4,7,1,4,0,11,56,2};
         build(8,a);



       return 0;
  }
