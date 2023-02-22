
#include<bits/stdc++.h>
using namespace std;
#include <ext/pb_ds/assoc_container.hpp>
#include <ext/pb_ds/tree_policy.hpp>
#define pb push_back
#define sf scanf
#define int long long
#define lcm(a,b)   a*b/__gcd(a,b)
#define endl "\n"
#define start() ios_base::sync_with_stdio(0); cin.tie(0);cout.tie(0)
#define pf printf
#define lop(i,n) for(int  i=0;i<n;i++)
#define f first
#define sec second
#define N 100005
#define file() freopen("input.txt","r",stdin);freopen("output.txt","w",stdout)
using    namespace __gnu_pbds;
//using namespace std::chrono;
typedef tree<int,null_type,less<int>,rb_tree_tag,
tree_order_statistics_node_update> ordered_set;
bool myfnc(const pair<int,int>&a,const pair<int,int>&b)
    {
         return a.sec<b.sec;
    }
bool myfnc1(const pair<int,int>&a,const pair<int,int>&b)
{
     return a.f>b.f;
}
bool sortbysec(const tuple<int, int, int>& a,
               const tuple<int, int, int>& b)
{
     if(get<0>(a) == get<0>(b)) return get<1>(a) < get<1>(b);
    return (get<0>(a) > get<0>(b));
}



bool  bit( int n, int k)
{
    if (n & (1LL << k))
           return true;
    else
        return false;
}

const int mx=1e9;
 //cin>>t;
signed  main()
{
   int t=1;
   //start();
   ios_base::sync_with_stdio(0); cin.tie(0);cout.tie(0);
     cin>>t;

     vector<int>v;
     int x=5;
     while(1){
          v.push_back(x);
          x*=5;
          if(x>1e9) break;
     }

     for(int tc=1;tc<=t;tc++){

          cout<<"Case "<<tc<<": ";
          int m;
          cin>>m;
          int l=1,r=m*5;
          while(l<r){
               int mid=(l+r)/2;
               int k=(mid/5)*5;
               int ret=0;
               for(auto &x: v){
                    ret+=(k/x);
               }
               if(ret>=m){
                    r=mid;
               }else l=mid+1;
          }

          int k=(l/5)*5;
          int ret=0;
          for(auto &x: v){
               ret+=(k/x);
          }
          if(ret==m)     cout<<k<<endl;
          else cout<<"impossible"<<endl;

     }


 return 0;
}




