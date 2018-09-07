//印出因數 -->解法，表示餘數% 為0
function printFactor(n) {
	for(var i = 1; i<=n;i++){   //（修改）寫 i<=n 會比寫 i<n+1 直覺
		if(n%i === 0){
			console.log(i)
		};
	}
}
//test case
printFactor(10);
printFactor(7);