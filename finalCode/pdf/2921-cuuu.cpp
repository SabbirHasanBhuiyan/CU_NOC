#include <bits/stdc++.h>
using namespace std;
const int N=100010;
vector<int> path[N][21],adj[N];
int par[N][20],h[N];
vector<int> me(vector<int> u,vector<int> v){
	u.insert(u.end(),v.begin(),v.end());
	sort(u.begin(),u.end());
	if(u.size()>10)u.resize(10);
	return u;
}
void dfs(int c,int p=0){
	int i,x;
	h[c]=h[p]+1;
	par[c][0]=p;
	path[c][1]=path[p][0];
	for(i=1;i<20;++i){
		x=par[c][i-1];
		if(par[x][i-1]==0)break;
		par[c][i]=par[x][i-1];
		path[c][i+1]=me(path[c][i],path[x][i]);
	}
	for(i=0;i<adj[c].size();++i)
		if(adj[c][i]!=p) dfs(adj[c][i],c);
}
int main(){
	int a,b,n,m,i,q;scanf("%d%d%d",&n,&m,&q);
	for(i=0;i<n-1;++i)
		scanf("%d%d",&a,&b),adj[a].push_back(b),adj[b].push_back(a);
	for(i=1;i<=m;++i){
		scanf("%d",&a);
		if(path[a][0].size()<10) path[a][0].push_back(i);
	}
	dfs(1);
	for(i=0;i<q;++i){
		int u,v,k;scanf("%d%d%d",&u,&v,&k);
		if(h[u]>h[v])swap(u,v);
		int diff=h[v]-h[u],i;
		vector<int> a=path[v][0];
		for(i=0;i<20;++i)
			if(diff&(1<<i)){
				a=me(a,path[v][i+1]);
				v=par[v][i];
			}
		if(u!=v){
			a=me(a,path[u][0]);
			for(i=19;i>=0;--i){
				if(par[u][i]!=par[v][i]){
					a=me(path[u][i+1],a);
					a=me(path[v][i+1],a);
					u=par[u][i];
					v=par[v][i];
				}
			}
			u=par[u][0];
			a=me(a,path[u][0]);
		}
		k=min(k,(int)a.size());
		printf("%d ",k);
		for(i=0;i<k;++i)
			printf("%d ",a[i]);
		putchar('\n');
	}
	return 0;
}
